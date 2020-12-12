<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Image;

class NewsController extends Controller {
    
    protected $data = [];

    public function __construct() {
        $this->data['product_count'] = DB::table('products')->count();
        $this->data['categories_count'] = DB::table('categories')->count();
        $this->data['catalogs_count'] = DB::table('contents')->where('content_slug', 'catalog')->count();
    }

    /**
     * Resources
     * 001. News
     */
    /* 001. News */

    public function manage_news() {
        $news = DB::table('contents')->where('content_slug', 'news')->orderBy('content_id', 'DESC')->paginate(10);
        $data = array();
        $data['title'] = 'News Management';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_news'] = $news;
        $data['home'] = view('news/manage_news', $data);
        return view('admin/master', $data);
    }

    public function add_news() {
        $data = array();
        $data['title'] = 'Add News';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['home'] = view('news/add_news', $data);
        return view('admin/master', $data);
    }

    public function save_news(Request $request) {
        $data = array();
        $data['content_slug'] = 'news';
        $data['content_title'] = $request->input('name');
        $data['content_description'] = $request->input('news');
        $data['content_serial'] = $request->input('serial');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'news_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(540, 332, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $imageName));
            /* End Image Thumbnail */
            /* End Image Upload */
            $data['featured_image'] = $imageName;
        }
        $data['content_status'] = $request->input('status');
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;
        DB::table('contents')->insert($data);
        return redirect('manage_news')->with('success', 'News Saved!');
    }

    public function edit_news($id) {
        $news_info = DB::table('contents')->where('content_slug', 'news')->where('content_id', $id)->first();
        $data = array();
        $data['title'] = 'Edit News';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['news_info'] = $news_info;
        $data['home'] = view('news/edit_news', $data);
        return view('admin/master', $data);
    }

    public function update_news(Request $request) {
        $data = array();
        $data['content_title'] = $request->input('name');
        $data['content_description'] = $request->input('news');
        $data['content_serial'] = $request->input('serial');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'news_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(540, 332, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $imageName));
            /* End Image Thumbnail */
            /* End Image Upload */
            $data['featured_image'] = $imageName;

            $path = public_path() . '/uploads/' . $request->input('previous_image');
            if ($path) {
                @unlink($path);
            }

            $path_thumbnails = public_path() . '/uploads/thumbnails/' . $request->input('previous_image');
            if ($path_thumbnails) {
                @unlink($path_thumbnails);
            }
        }
        $data['content_status'] = $request->input('status');
        $data['modify_time'] = current_time();
        $data['modify_date'] = current_date();
        $data['modified_by'] = Auth::user()->id;

        DB::table('contents')
                ->where('content_id', $request->input('id'))
                ->update($data);

        return redirect('manage_news')->with('success', 'News Updated!');
    }

    public function delete_news($id) {
        $news_info = DB::table('contents')->where('content_slug', 'news')->where('content_id', $id)->first();

        $thumbnails_path = public_path() . "/uploads/thumbnails/" . $news_info->featured_image;
        $path = public_path() . "/uploads/" . $news_info->featured_image;
        @unlink($thumbnails_path);
        @unlink($path);

        $result = DB::table('contents')->where('content_slug', 'news')->where('content_id', $id)->delete();

        if ($result) {
            return redirect('manage_news')->with('success', 'News Deleted!');
        } else {
            return redirect('manage_news')->with('error', 'News Not Deleted!');
        }
    }
}