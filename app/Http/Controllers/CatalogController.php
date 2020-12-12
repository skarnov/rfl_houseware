<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Image;

class CatalogController extends Controller {
    
    protected $data = [];

    public function __construct() {
        $this->data['product_count'] = DB::table('products')->count();
        $this->data['categories_count'] = DB::table('categories')->count();
        $this->data['catalogs_count'] = DB::table('contents')->where('content_slug', 'catalog')->count();
    }

    /**
     * Resources
     * 001. Catalogs
     */
    /* 001. Catalogs */

    public function manage_catalogs() {
        $data = array();
        $data['title'] = 'Catalog Management';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_catalogs'] = DB::table('contents')->where('content_slug', 'catalog')->paginate(10);
        $data['home'] = view('catalog/manage_catalogs', $data);
        return view('admin/master', $data);
    }

    public function add_catalog() {
        $data = array();
        $data['title'] = 'Add Catalog';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['home'] = view('catalog/add_catalog', $data);
        return view('admin/master', $data);
    }

    public function save_catalog(Request $request) {
        $data = array();
        $data['content_slug'] = 'catalog';
        $data['content_title'] = $request->input('name');
        $data['content_serial'] = $request->input('serial');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'catalog_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads/files'), $imageName);
            /* End Image Upload */

            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/files/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/files/thumbnails/' . $imageName));
            /* End Image Thumbnail */

            $path = public_path() . '/uploads/files/' . $imageName;
            if ($path) {
                @unlink($path);
            }

            /* End Image Upload */
            $data['featured_image'] = $imageName;
        }

        if ($request->hasFile('file')) {
            /* Start File Upload */
            request()->validate([
                'file' => 'required|mimes:pdf|max:2048',
            ]);
            $fileName = 'catalog_' . time() . '.' . request()->file->getClientOriginalExtension();
            request()->file->move(public_path('uploads/files/'), $fileName);
            /* End File Upload */

            $data['additional_info'] = $fileName;
        }

        $data['content_status'] = $request->input('status');
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;
        DB::table('contents')->insert($data);
        return redirect('manage_catalogs')->with('success', 'Catalog Saved!');
    }

    public function edit_catalog($id) {
        $data = array();
        $data['title'] = 'Edit Catalog';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['catalog_info'] = DB::table('contents')->where('content_slug', 'catalog')->where('content_id', $id)->first();
        $data['home'] = view('catalog/edit_catalog', $data);
        return view('admin/master', $data);
    }

    public function update_catalog(Request $request) {
        $data = array();
        $data['content_title'] = $request->input('name');
        $data['content_serial'] = $request->input('serial');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'catalog_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
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

            /* Start Delete Image */
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
        return redirect('manage_catalogs')->with('success', 'Catalog Updated!');
    }

    public function delete_catalog($id) {
        $catalog_info = DB::table('contents')
                ->where('content_slug', 'catalog')
                ->where('content_id', $id)
                ->first();

        $thumbnails_path = public_path() . "/uploads/files/thumbnails/" . $catalog_info->featured_image;
        $path = public_path() . "/uploads/files/" . $catalog_info->additional_info;
        @unlink($thumbnails_path);
        @unlink($path);

        $result = DB::table('contents')->where('content_slug', 'catalog')->where('content_id', $id)->delete();

        if ($result) {
            return redirect('manage_catalogs')->with('success', 'Catalog Deleted!');
        } else {
            return redirect('manage_catalogs')->with('error', 'Catalog Not Deleted!');
        }
    }
}