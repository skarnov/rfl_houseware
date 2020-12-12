<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Image;

class AwardController extends Controller {
    
    protected $data = [];

    public function __construct() {
        $this->data['product_count'] = DB::table('products')->count();
        $this->data['categories_count'] = DB::table('categories')->count();
        $this->data['catalogs_count'] = DB::table('contents')->where('content_slug', 'catalog')->count();
    }

    /**
     * Resources
     * 001. Awards
     */
    /* 001. Awards */

    public function manage_awards() {
        $data = array();
        $data['title'] = 'Award Management';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_awards'] = DB::table('contents')->where('content_slug', 'award')->orderBy('content_id', 'DESC')->paginate(10);
        $data['home'] = view('award/manage_awards', $data);
        return view('admin/master', $data);
    }

    public function add_award() {
        $data = array();
        $data['title'] = 'Add Award';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['home'] = view('award/add_award', $data);
        return view('admin/master', $data);
    }

    public function save_award(Request $request) {
        $data = array();
        $data['content_slug'] = 'award';
        $data['content_title'] = $request->input('name');
        $data['content_serial'] = $request->input('serial');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'award_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
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
        $data['content_status'] = $request->input('status');
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;
        DB::table('contents')->insert($data);
        return redirect('manage_awards')->with('success', 'Award Saved!');
    }

    public function edit_award($id) {
        $data = array();
        $data['title'] = 'Edit Award';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['award_info'] = DB::table('contents')->where('content_slug', 'award')->where('content_id', $id)->first();
        $data['home'] = view('award/edit_award', $data);
        return view('admin/master', $data);
    }

    public function update_award(Request $request) {
        $data = array();
        $data['content_title'] = $request->input('name');
        $data['content_serial'] = $request->input('serial');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'award_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
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
        $data['content_status'] = $request->input('status');
        $data['modify_time'] = current_time();
        $data['modify_date'] = current_date();
        $data['modified_by'] = Auth::user()->id;
        DB::table('contents')
                ->where('content_id', $request->input('id'))
                ->update($data);
        return redirect('manage_awards')->with('success', 'Award Updated!');
    }

    public function delete_award($id) {
        $award_info = DB::table('contents')
                ->where('content_slug', 'award')
                ->where('content_id', $id)
                ->first();

        $path = public_path() . "/uploads/files/thumbnails/" . $award_info->featured_image;
        if ($path) {
            @unlink($path);
        }

        $path_thumbnails = public_path() . "/uploads/files/thumbnails/" . $award_info->featured_image;
        if ($path_thumbnails) {
            @unlink($path_thumbnails);
        }

        $result = DB::table('contents')->where('content_slug', 'award')->where('content_id', $id)->delete();

        if ($result) {
            return redirect('manage_awards')->with('success', 'Award Deleted!');
        } else {
            return redirect('manage_awards')->with('error', 'Award Not Deleted!');
        }
    }
}