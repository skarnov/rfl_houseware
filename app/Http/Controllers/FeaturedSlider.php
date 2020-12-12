<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Image;
use App\FeaturedImage;

class FeaturedSlider extends Controller
{

    protected $data = [];

    public function __construct() {
        $this->data['product_count'] = DB::table('products')->count();
        $this->data['categories_count'] = DB::table('categories')->count();
        $this->data['catalogs_count'] = DB::table('contents')->where('content_slug', 'catalog')->count();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function brands_index()
    {
        $data['title'] = 'Add Brands';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = DB::table('categories')->where('fk_category_id', 0)->orderBy('category_serial', 'ASC')->paginate(10);
        $data['home'] = view('featured/add_featured', $data );
        return view('admin/master', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_featured()
    {
        $data = array();
        $data['title'] = 'Featured Management';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_featured'] = DB::table('featured_slider')->paginate(10);
        $data['home'] = view('featured/manage_featured', $data);
        return view('admin/master', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $data['title'] = $request->input('title');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'featured_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads/files'), $imageName);

            /* End Image Upload */

            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/files/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/files/thumbnails/' . $imageName));
            /* End Image Thumbnail */

            $data['featured_image'] = $imageName;
        }
        $data['status'] = $request->input('status');
        $data['pages'] = $request->input('pages');
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;
        DB::table('featured_slider')->insert($data);
        return redirect('manage_featured')->with('success', 'Featured Saved!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array();
        $data['title'] = 'Edit Featured';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['featured_info'] = FeaturedImage::find($id);
        $data['home'] = view('featured/edit_featured', $data);
        return view('admin/master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_featured(Request $request)
    {
        $data = array();
        $data['title'] = $request->input('title');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'featured_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads/files'), $imageName);
            /* End Image Upload */

            $data['featured_image'] = $imageName;

            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/files/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/files/thumbnails/' . $imageName));
            /* End Image Thumbnail */

            /* Start Delete Image */
            $path = public_path() . '/uploads/' . $request->input('previous_image');
            if ($path) {
                @unlink($path);
            }

            $path_thumbnails = public_path() . '/uploads/thumbnails/' . $request->input('previous_image');
            if ($path_thumbnails) {
                @unlink($path_thumbnails);
            }
            /* End Delete Image */
        }
        $data['status'] = $request->input('status');
        $data['pages'] = $request->input('pages');
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;
        DB::table('featured_slider') ->where('id', $request->input('id'))->update($data);
        return redirect('manage_featured')->with('success', 'Featued Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $featured_info = DB::table('featured_slider')
        ->where('id', $id)
        ->first();

        $path = public_path() . "/uploads/files/thumbnails/" . $featured_info->featured_image;
        if ($path) {
            @unlink($path);
        }

        $path_thumbnails = public_path() . "/uploads/files/thumbnails/" . $featured_info->featured_image;
        if ($path_thumbnails) {
            @unlink($path_thumbnails);
        }

        $result = DB::table('featured_slider')->where('id', $id)->delete();

        if ($result) {
            return redirect('manage_featured')->with('success', 'Featured Deleted!');
        } else {
            return redirect('manage_featured')->with('error', 'Featured Not Deleted!');
        }
        
    }
    
}
