<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Image;

class ContentController extends Controller {

    protected $data = [];

    public function __construct() {
        $this->data['product_count'] = DB::table('products')->count();
        $this->data['categories_count'] = DB::table('categories')->count();
        $this->data['catalogs_count'] = DB::table('contents')->where('content_slug', 'catalog')->count();
    }

    /**
     * Resources
     * 001. Pages
     * 002. Sliders
     * 003. Offers
     * 004. Image Albums
     * 005. Video Albums
     */
    /* 001. Pages */
    public function index() {
        $data = array();
        $data['title'] = 'Page Management';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_pages'] = DB::table('pages')->where('page_slug', 'home')->get();
        $data['home'] = view('content/manage_pages', $data);
        return view('admin/master', $data);
    }

    public function innerindex() {
        $data = array();
        $data['title'] = 'Page Management';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_pages'] = DB::table('pages')->where('page_id', '!=', 1)->get();
        $data['home'] = view('content/manage_inner_pages', $data);
        return view('admin/master', $data);
    }

    public function add_page() {
        $data = array();
        $data['title'] = 'Add Page';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['home'] = view('content/add_page', $data);
        return view('admin/master', $data);
    }

    public function save_page(Request $request) {
        $slug = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($request->input('name'))));
        $data = array();
        $data['page_slug'] = $slug;
        $data['page_name'] = $request->input('name');
        $data['page_type'] = 'additional';
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;
        DB::table('pages')->insert($data);
        return redirect('content')->with('success', 'Page Saved!');
    }

    public function edit_page($id) {
        $page_info = DB::table('pages')->where('page_id', $id)->first();

        $data = array();

        if ($page_info->page_slug == 'home'):
            $featured_sliders = DB::table('contents')
                    ->where('content_slug', 'featured-slider')
                    ->paginate(10);
            $data['id'] = $id;
            $data['page_attribute'] = DB::table('page_attribute')->where('fk_page_id', $id)->first();
            $data['product_section_one'] = DB::table('page_attribute')->where('attribute_name', 'product-section-one')->first();
            $data['product_section_two'] = DB::table('page_attribute')->where('attribute_name', 'product-section-two')->first();
            $data['featured_sliders'] = $featured_sliders;
            $data['home_tab'] = DB::table('page_attribute')->where('attribute_name', 'home-tab')->get();
        endif;

        $data['title'] = 'Edit Page';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['page_info'] = $page_info;
        $data['home'] = view('content/edit_page', $data);
        return view('admin/master', $data);
    }

    public function update_page_attr(Request $request) {
        $description = array();
        $description['page_title'] = $request->input('page_title');
        $description['page_subtitle'] = $request->input('page_subtitle');
        $description['page_subtitle_bold'] = $request->input('page_subtitle_bold');
        $description['page_description'] = $request->input('page_description');

        if ($request->hasFile('intro_image')) {
            /* Start Image Upload */
            request()->validate([
                'intro_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);
            $imageName = time() . '.' . request()->intro_image->getClientOriginalExtension();
            request()->intro_image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            $description['featured_image'] = $imageName;

            $path = public_path() . '/uploads/' . $request->input('previous_image');
            if ($path) {
                @unlink($path);
            }
        }

        $description['modify_time'] = current_time();
        $description['modify_date'] = current_date();
        $description['modified_by'] = Auth::user()->id;

        DB::table('page_attribute')
                ->where('attribute_name', 'page-description')
                ->update($description);

        $product_section_one = array();
        $product_section_one['page_title'] = $request->input('product_section_one_title');
        $product_section_one['page_subtitle'] = $request->input('product_section_one_subtitle');
        $product_section_one['page_subtitle_bold'] = $request->input('product_section_one_subtitle_bold');

        DB::table('page_attribute')
                ->where('attribute_name', 'product-section-one')
                ->update($product_section_one);

        $product_section_two = array();
        $product_section_two['page_title'] = $request->input('product_section_two_title');
        $product_section_two['page_subtitle'] = $request->input('product_section_two_subtitle');
        $product_section_two['page_subtitle_bold'] = $request->input('product_section_two_subtitle_bold');
        $product_section_two['featured_image'] = $request->input('product_section_two_page_link');

        DB::table('page_attribute')
                ->where('attribute_name', 'product-section-two')
                ->update($product_section_two);

        return redirect('edit_page/' . $request->input('id'))->with('success', 'Page Updated!');
    }

    public function update_page_tab(Request $request) {
        $tab_1 = array();
        $tab_1['attribute_name'] = 'home-tab';

        if ($request->hasFile('tab_icon_1')) {
            /* Start Image Upload */
            request()->validate([
                'tab_icon_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);
            $imageName = time() . '1.' . request()->tab_icon_1->getClientOriginalExtension();
            request()->tab_icon_1->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            $tab_1['featured_image'] = $imageName;

            $path = public_path() . '/uploads/' . $request->input('tab_previous_image_1');
            if ($path) {
                @unlink($path);
            }
        }

        $tab_1['page_title'] = $request->input('tab_title_1');
        $tab_1['page_description'] = $request->input('short_summery_1');
        $tab_1['page_subtitle'] = $request->input('button_link_1');

        $tab_1['modify_time'] = current_time();
        $tab_1['modify_date'] = current_date();
        $tab_1['modified_by'] = Auth::user()->id;

        DB::table('page_attribute')
                ->where('attribute_id', $request->input('id_1'))
                ->update($tab_1);

        $tab_2 = array();
        $tab_2['attribute_name'] = 'home-tab';

        if ($request->hasFile('tab_icon_2')) {
            /* Start Image Upload */
            request()->validate([
                'tab_icon_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);
            $imageName = time() . '2.' . request()->tab_icon_2->getClientOriginalExtension();
            request()->tab_icon_2->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            $tab_2['featured_image'] = $imageName;

            $path = public_path() . '/uploads/' . $request->input('tab_previous_image_2');
            if ($path) {
                @unlink($path);
            }
        }

        $tab_2['page_title'] = $request->input('tab_title_2');
        $tab_2['page_description'] = $request->input('short_summery_2');
        $tab_2['page_subtitle'] = $request->input('button_link_2');

        $tab_2['modify_time'] = current_time();
        $tab_2['modify_date'] = current_date();
        $tab_2['modified_by'] = Auth::user()->id;

        DB::table('page_attribute')
                ->where('attribute_id', $request->input('id_2'))
                ->update($tab_2);

        $tab_3 = array();
        $tab_3['attribute_name'] = 'home-tab';

        if ($request->hasFile('tab_icon_3')) {
            /* Start Image Upload */
            request()->validate([
                'tab_icon_3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);
            $imageName = time() . '3.' . request()->tab_icon_3->getClientOriginalExtension();
            request()->tab_icon_3->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            $tab_3['featured_image'] = $imageName;

            $path = public_path() . '/uploads/' . $request->input('tab_previous_image_3');
            if ($path) {
                @unlink($path);
            }
        }

        $tab_3['page_title'] = $request->input('tab_title_3');
        $tab_3['page_description'] = $request->input('short_summery_3');
        $tab_3['page_subtitle'] = $request->input('button_link_3');

        $tab_3['modify_time'] = current_time();
        $tab_3['modify_date'] = current_date();
        $tab_3['modified_by'] = Auth::user()->id;

        DB::table('page_attribute')
                ->where('attribute_id', $request->input('id_3'))
                ->update($tab_3);

        $tab_4 = array();
        $tab_4['attribute_name'] = 'home-tab';

        if ($request->hasFile('tab_icon_4')) {
            /* Start Image Upload */
            request()->validate([
                'tab_icon_4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);
            $imageName = time() . '4.' . request()->tab_icon_4->getClientOriginalExtension();
            request()->tab_icon_4->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            $tab_4['featured_image'] = $imageName;

            $path = public_path() . '/uploads/' . $request->input('tab_previous_image_4');
            if ($path) {
                @unlink($path);
            }
        }

        $tab_4['page_title'] = $request->input('tab_title_4');
        $tab_4['page_description'] = $request->input('short_summery_4');
        $tab_4['page_subtitle'] = $request->input('button_link_4');

        $tab_4['modify_time'] = current_time();
        $tab_4['modify_date'] = current_date();
        $tab_4['modified_by'] = Auth::user()->id;

        DB::table('page_attribute')
                ->where('attribute_id', $request->input('id_4'))
                ->update($tab_4);

        return redirect('edit_page/1')->with('success', 'Page Updated!');
    }

    public function add_featured_slider($id) {
        $data = array();
        $data['title'] = 'Add Featured Slider';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['id'] = $id;
        $data['all_categories'] = DB::table('categories')->where('fk_category_id', 0)->where('category_status', 'active')->get();
        $data['home'] = view('content/add_featured_slider', $data);
        return view('admin/master', $data);
    }

    public function save_featured_slider(Request $request) {
        $data = array();
        $data['content_slug'] = 'featured-slider';
        $data['content_misc'] = $request->input('title');
        $data['content_title'] = $request->input('area');
        $data['content_subtitle'] = $request->input('category');
        $data['content_description'] = $request->input('description');
        $data['external_link'] = $request->input('link');
        $data['additional_info'] = $request->input('offer');
        $data['content_status'] = $request->input('status');

        /* Start Image Upload */
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'image_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */

            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $imageName));
            /* End Image Thumbnail */

            $data['featured_image'] = $imageName;
        }
        /* End of Image Upload */

        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;

        DB::table('contents')->insert($data);
        return redirect('edit_page/' . $request->input('id'))->with('message', 'Content Saved!');
    }

    public function edit_featured_slider($slider_id) {
        $featured_sliders_info = DB::table('contents')
                ->where('content_id', $slider_id)
                ->where('content_slug', 'featured-slider')
                ->first();

        $data = array();
        $data['title'] = 'Edit Featured Slider';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['featured_sliders_info'] = $featured_sliders_info;
        $data['all_categories'] = DB::table('categories')->where('fk_category_id', 0)->where('category_status', 'active')->get();
        $data['home'] = view('content/edit_featured_slider', $data);
        return view('admin/master', $data);
    }

    public function edit_innerpages($page_id) {
        $page_info = DB::table('pages')
                ->where('page_id', '=', $page_id)
                ->first();

        $data = array();
        $data['title'] = 'Edit Inner Page';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['page_info'] = $page_info;
        $data['all_categories'] = DB::table('categories')->where('fk_category_id', 0)->where('category_status', 'active')->get();
        $data['home'] = view('content/edit_inner_pages', $data);
        return view('admin/master', $data);
    }

    public function update_featured_slider(Request $request) {
        $id = $request->input('id');

        $data = array();
        $data['content_misc'] = $request->input('title');
        $data['content_title'] = $request->input('area');
        $data['content_subtitle'] = $request->input('category');
        $data['content_description'] = $request->input('description');
        $data['external_link'] = $request->input('link');
        $data['additional_info'] = $request->input('offer');
        $data['content_status'] = $request->input('status');

        /* Start Additional Image Upload */
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);

            $path = public_path() . '/uploads/' . $request->input('previous_image');
            if ($path) {
                @unlink($path);
            }

            $path_thumbnails = public_path() . '/uploads/thumbnails/' . $request->input('previous_image');
            if ($path_thumbnails) {
                @unlink($path_thumbnails);
            }
        }

        $data['featured_image'] = isset($imageName) ? $imageName : $request->input('previous_image');

        /* End of Additional Image Upload */

        $data['modify_time'] = current_time();
        $data['modify_date'] = current_date();
        $data['modified_by'] = Auth::user()->id;
        DB::table('contents')
                ->where('content_id', $id)
                ->update($data);
        return redirect('edit_page/1')->with('success', 'Update Featured Slider');
    }

    public function update_inner_pages(Request $request) {
        $id = $request->input('id');

        $data = array();
        $data['page_short_description'] = $request->input('page_short_description');
        $data['page_description'] = $request->input('page_description');

        /* Start Additional Image Upload */
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);

            $path = public_path() . '/uploads/' . $request->input('previous_image');
            if ($path) {
                @unlink($path);
            }

            $path_thumbnails = public_path() . '/uploads/thumbnails/' . $request->input('previous_image');
            if ($path_thumbnails) {
                @unlink($path_thumbnails);
            }
        }

        $data['image'] = isset($imageName) ? $imageName : $request->input('previous_image');

        /* End of Additional Image Upload */

        $data['modify_time'] = current_time();
        $data['modify_date'] = current_date();
        $data['modified_by'] = Auth::user()->id;
        DB::table('pages')
                ->where('page_id', $id)
                ->update($data);
        return redirect('edit_inner_pages/' . $id)->with('success', 'Update pages');
    }

    public function delete_featured_slider($id) {
        $images = DB::table('contents')
                ->where('content_id', $id)
                ->where('content_slug', 'featured-slider')
                ->first();

        $main_image = $images->featured_image;

        $path = public_path() . "/uploads/" . $main_image;
        $path_thumbnails = public_path() . "/uploads/thumbnails/" . $main_image;
        @unlink($path);
        @unlink($path_thumbnails);

        $result = DB::table('contents')->where('content_id', $id)->where('content_slug', 'featured-slider')->delete();

        if ($result) {
            return redirect('edit_page/1')->with('success', 'Slider Deleted!');
        } else {
            return redirect('edit_page/1')->with('error', 'Slider Not Deleted!');
        }
    }

    public function update_page(Request $request) {
        if ($request->input('slug') == 'home'):

            $slider = array();
            $slider['content_id'] = $request->input('slider_id');
            $slider['modify_time'] = current_time();
            $slider['modify_date'] = current_date();
            $slider['modified_by'] = Auth::user()->id;
            DB::table('content_relations')
                    ->where('page_section', 'slider')
                    ->update($slider);

            $header = array();
            if ($request->hasFile('image')) {
                /* Start Image Upload */
                request()->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                ]);
                $imageName = time() . '.' . request()->image->getClientOriginalExtension();
                request()->image->move(public_path('uploads'), $imageName);
                /* End Image Upload */
                /* Start Image Thumbnail */
                $imagePath = public_path('uploads/' . $imageName);
                $img = Image::make($imagePath)->resize(100, 100, function($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path('uploads/thumbnails/' . $imageName));
                /* End Image Thumbnail */
                $header['featured_image'] = $imageName;

                $path = public_path() . '/uploads/' . $request->input('previous_image');
                if ($path) {
                    @unlink($path);
                }

                $path_thumbnails = public_path() . '/uploads/thumbnails/' . $request->input('previous_image');
                if ($path_thumbnails) {
                    @unlink($path_thumbnails);
                }
            }
            $header['content_title'] = $request->input('first_title');
            $header['content_subtitle'] = $request->input('second_title');
            $header['content_description'] = $request->input('description');
            $header['external_link'] = $request->input('external_link');
            $header['create_time'] = current_time();
            $header['create_date'] = current_date();
            $header['created_by'] = Auth::user()->id;
            DB::table('contents')
                    ->where('content_slug', 'header')
                    ->update($header);

            $offer = array();
            $offer['content_id'] = $request->input('offer_id');
            $offer['modify_time'] = current_time();
            $offer['modify_date'] = current_date();
            $offer['modified_by'] = Auth::user()->id;
            DB::table('content_relation')
                    ->where('page_section', 'offer')
                    ->update($offer);
        endif;
        $slug = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($request->input('name'))));
        $data = array();
        $data['page_slug'] = $slug;
        $data['page_name'] = $request->input('name');
        $data['modify_time'] = current_time();
        $data['modify_date'] = current_date();
        $data['modified_by'] = Auth::user()->id;
        DB::table('pages')
                ->where('page_id', $request->input('id'))
                ->update($data);
        return redirect('content')->with('success', 'Page Updated!');
    }

    public function delete_page($id) {
        $result = DB::table('pages')->where('page_id', $id)->where('page_type', 'additional')->delete();
        if ($result) {
            return redirect('content')->with('success', 'Page Deleted!');
        } else {
            return redirect('content')->with('error', 'You Can Not Delete Default Page!');
        }
    }

    /* 002. Sliders */

    public function manage_sliders() {
        $sliders = DB::table('contents')->where('content_slug', 'slider')->where('content_id', '33')->paginate(10);
        $data = array();
        $data['title'] = 'Slider Management';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_sliders'] = $sliders;
        $data['home'] = view('content/manage_sliders', $data);
        return view('admin/master', $data);
    }
    
    public function manage_image_sliders() {
        $sliders = DB::table('contents')->where('content_slug', 'slider')->paginate(10);
        $data = array();
        $data['title'] = 'Slider Management';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_sliders'] = $sliders;
        $data['home'] = view('content/manage_image_sliders', $data);
        return view('admin/master', $data);
    }

    public function add_slider() {
        $data = array();
        $data['title'] = 'Add Slider';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['home'] = view('content/add_slider', $data);
        return view('admin/master', $data);
    }

    public function save_slider(Request $request) {
        $data = array();
        $data['content_slug'] = 'slider';
        $data['additional_info'] = $request->input('name');
        $data['content_description'] = $request->input('description');
        $data['content_serial'] = $request->input('serial');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'slider_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $imageName));
            /* End Image Thumbnail */
            /* End Image Upload */
            $data['featured_image'] = $imageName;
        }
        $data['external_link'] = $request->input('external_link');
        $data['content_status'] = $request->input('status');
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;
        DB::table('contents')->insert($data);
        return redirect('manage_image_sliders')->with('success', 'Slider Saved!');
    }

    public function edit_slider($id) {
        $slider_info = DB::table('contents')->where('content_slug', 'slider')->where('content_id', $id)->first();
        $data = array();
        $data['title'] = 'Edit Slider';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['slider_info'] = $slider_info;
        $data['home'] = view('content/edit_slider', $data);
        return view('admin/master', $data);
    }

    public function update_slider(Request $request) {
        $data = array();
        $data['additional_info'] = $request->input('name');
        $data['content_description'] = $request->input('description');
        $data['content_serial'] = $request->input('serial');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'slider_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
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
        if ($request->hasFile('video')) {
            $imageName = 'slider_video_' . time() . '.' . request()->video->getClientOriginalName();
            request()->video->move(public_path('uploads'), $imageName);

            /* End Image Upload */
            $data['featured_image'] = $imageName;

            $path = public_path() . '/uploads/' . $request->input('previous_image');
            if ($path) {
                @unlink($path);
            }
        }
        $data['external_link'] = $request->input('external_link');
        $data['content_status'] = $request->input('status');
        $data['modify_time'] = current_time();
        $data['modify_date'] = current_date();
        $data['modified_by'] = Auth::user()->id;

        DB::table('contents')
                ->where('content_id', $request->input('id'))
                ->update($data);

        return redirect('manage_sliders')->with('success', 'Slider Updated!');
    }

    public function delete_slider($id) {
        $slider_info = DB::table('contents')->where('content_id', $id)->first();

        $thumbnails_path = public_path() . "/uploads/thumbnails/" . $slider_info->featured_image;
        $path = public_path() . "/uploads/" . $slider_info->featured_image;
        @unlink($thumbnails_path);
        @unlink($path);

        $result = DB::table('contents')->where('content_id', $id)->delete();

        if ($result) {
            return redirect('manage_image_sliders')->with('success', 'Sliders Deleted!');
        } else {
            return redirect('manage_image_sliders')->with('error', 'Sliders Not Deleted!');
        }
    }

    /* 003. Pages */

    public function manage_offers() {
        $offers = DB::table('contents')->where('content_slug', 'offer')->paginate(10);
        $data = array();
        $data['title'] = 'Offer Management';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_offers'] = $offers;
        $data['home'] = view('content/manage_offers', $data);
        return view('admin/master', $data);
    }

    public function add_offer() {
        $data = array();
        $data['title'] = 'Add Offer';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['home'] = view('content/add_offer', $data);
        return view('admin/master', $data);
    }

    public function save_offer(Request $request) {
        $data = array();
        $data['content_slug'] = 'offer';
        $data['content_title'] = $request->input('name');
        $data['content_serial'] = $request->input('serial');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'offer_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $imageName));
            /* End Image Thumbnail */
            /* End Image Upload */
            $data['featured_image'] = $imageName;
        }
        $data['external_link'] = $request->input('external_link');
        $data['content_status'] = $request->input('status');
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;
        DB::table('contents')->insert($data);
        return redirect('manage_offers')->with('success', 'Offer Saved!');
    }

    public function edit_offer($id) {
        $offer_info = DB::table('contents')->where('content_slug', 'offer')->where('content_id', $id)->first();
        $data = array();
        $data['title'] = 'Edit Offer';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['offer_info'] = $offer_info;
        $data['home'] = view('content/edit_offer', $data);
        return view('admin/master', $data);
    }

    public function update_offer(Request $request) {
        $data = array();
        $data['content_title'] = $request->input('name');
        $data['content_serial'] = $request->input('serial');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'offer_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
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
        $data['external_link'] = $request->input('external_link');
        $data['content_status'] = $request->input('status');
        $data['modify_time'] = current_time();
        $data['modify_date'] = current_date();
        $data['modified_by'] = Auth::user()->id;

        DB::table('contents')
                ->where('content_id', $request->input('id'))
                ->update($data);

        return redirect('manage_offers')->with('success', 'Offer Updated!');
    }

    public function delete_offer($id) {
        $offer_info = DB::table('contents')->where('content_id', $id)->first();

        $thumbnails_path = public_path() . "/uploads/thumbnails/" . $offer_info->featured_image;
        $path = public_path() . "/uploads/" . $offer_info->featured_image;
        @unlink($thumbnails_path);
        @unlink($path);

        $result = DB::table('contents')->where('content_id', $id)->delete();

        if ($result) {
            return redirect('manage_offers')->with('success', 'Offers Deleted!');
        } else {
            return redirect('manage_offers')->with('error', 'Offers Not Deleted!');
        }
    }

    /* 004. Image Albums */

    public function manage_image_albums() {
        $data = array();
        $data['title'] = 'Image Albums Management';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_albums'] = DB::table('contents')->where('content_slug', 'image-album')->where('fk_content_id', 0)->orderBy('content_id', 'DESC')->paginate(10);
        $data['home'] = view('content/manage_image_albums', $data);
        return view('admin/master', $data);
    }

    public function add_image_album() {
        $data = array();
        $data['title'] = 'Add Image Albums';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['home'] = view('content/add_image_album', $data);
        return view('admin/master', $data);
    }

    public function save_image_album(Request $request) {
        $data = array();
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'album_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $imageName));
            /* End Image Thumbnail */
            /* End Image Upload */
            $data['featured_image'] = $imageName;
        }
        $data['fk_content_id'] = 0;
        $data['content_slug'] = 'image-album';
        $data['content_title'] = $request->input('name');
        $data['content_status'] = $request->input('status');
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;
        DB::table('contents')->insert($data);
        return redirect('manage_image_albums')->with('success', 'Album Saved!');
    }

    public function view_image_album($id) {
        $album_info = DB::table('contents')->where('content_slug', 'image-album')->where('content_id', $id)->first();
        $album_images = DB::table('contents')->where('fk_content_id', $id)->paginate(10);
        $data = array();
        $data['title'] = 'Edit Image Album';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['album_info'] = $album_info;
        $data['all_images'] = $album_images;
        $data['home'] = view('content/view_image_album', $data);
        return view('admin/master', $data);
    }

    public function edit_image_album($id) {
        $album_info = DB::table('contents')->where('content_slug', 'image-album')->where('content_id', $id)->first();
        $data = array();
        $data['title'] = 'Edit Image Album';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['album_info'] = $album_info;
        $data['home'] = view('content/edit_image_album', $data);
        return view('admin/master', $data);
    }

    public function update_image_album(Request $request) {
        $data = array();
        $data['content_title'] = $request->input('name');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'album_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $imageName));
            /* End Image Thumbnail */
            $data['featured_image'] = $imageName;

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
        return redirect('manage_image_albums')->with('success', 'Album Updated!');
    }

    public function delete_image_album($id) {
        $album_info = DB::table('contents')->where('content_id', $id)->first();
        $album_images = DB::table('contents')->where('fk_content_id', $id)->get();

        foreach ($album_images as $v) :
            $thumbnails_path = public_path() . "/uploads/thumbnails/" . $v->featured_image;
            $path = public_path() . "/uploads/" . $v->featured_image;
            @unlink($thumbnails_path);
            @unlink($path);
        endforeach;

        $thumbnails_path = public_path() . "/uploads/thumbnails/" . $album_info->featured_image;
        $path = public_path() . "/uploads/" . $album_info->featured_image;
        @unlink($thumbnails_path);
        @unlink($path);

        $result['images'] = DB::table('contents')->where('fk_content_id', $id)->delete();
        $result['album'] = DB::table('contents')->where('content_id', $id)->delete();

        if ($result) {
            return redirect('manage_image_albums')->with('success', 'Album Deleted!');
        } else {
            return redirect('manage_image_albums')->with('error', 'Album Not Deleted!');
        }
    }

    public function add_image() {
        $albums = DB::table('contents')
                ->where('fk_content_id', '0')
                ->where('content_slug', 'image-album')
                ->get();
        $data = array();
        $data['title'] = 'Add Image';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_albums'] = $albums;
        $data['home'] = view('content/add_image', $data);
        return view('admin/master', $data);
    }

    public function save_image(Request $request) {
        $data = array();
        $data['fk_content_id'] = $request->input('album_id');
        $data['content_title'] = $request->input('name');

        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'image_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $imageName));
            /* End Image Thumbnail */
            /* End Image Upload */
            $data['featured_image'] = $imageName;
        }
        $data['content_slug'] = 'image';
        $data['content_status'] = 'active';
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;
        DB::table('contents')->insert($data);
        return redirect('view_image_album/' . $data['fk_content_id'])->with('success', 'Image Saved!');
    }

    public function edit_image($id) {
        $image_info = DB::table('contents')
                ->where('content_slug', 'image')
                ->where('content_id', $id)
                ->first();
        $data = array();
        $data['title'] = 'Edit Image';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['image_info'] = $image_info;
        $data['home'] = view('content/edit_image', $data);
        return view('admin/master', $data);
    }

    public function update_image(Request $request) {
        $data = array();
        $data['fk_content_id'] = $request->input('album_id');
        $data['content_title'] = $request->input('name');

        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'image_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $imageName));
            /* End Image Thumbnail */
            /* End Image Upload */
            $data['featured_image'] = $imageName;

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
        $data['content_slug'] = 'image';
        $data['content_status'] = 'active';
        $data['modify_time'] = current_time();
        $data['modify_date'] = current_date();
        $data['modified_by'] = Auth::user()->id;
        DB::table('contents')
                ->where('content_id', $request->input('id'))
                ->update($data);
        return redirect('manage_image_albums')->with('success', 'Image Updated!');
    }

    public function delete_image($id) {
        $image_info = DB::table('contents')
                ->where('content_slug', 'image')
                ->where('content_id', $id)
                ->first();

        $thumbnails_path = public_path() . "/uploads/thumbnails/" . $image_info->featured_image;
        $path = public_path() . "/uploads/" . $image_info->featured_image;
        @unlink($thumbnails_path);
        @unlink($path);

        $result = DB::table('contents')->where('content_id', $id)->delete();
        if ($result) {
            return redirect('manage_image_albums')->with('success', 'Image Deleted!');
        } else {
            return redirect('manage_image_albums')->with('error', 'Image Not Deleted!');
        }
    }

    /* 005. Video Albums */

    public function manage_video_albums() {
        $data = array();
        $data['title'] = 'Video Albums Management';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_albums'] = DB::table('contents')->where('content_slug', 'video-album')->where('fk_content_id', 0)->orderBy('content_id', 'DESC')->paginate(10);
        $data['home'] = view('content/manage_video_albums', $data);
        return view('admin/master', $data);
    }

    public function add_video_album() {
        $data = array();
        $data['title'] = 'Add Video Albums';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['home'] = view('content/add_video_album', $data);
        return view('admin/master', $data);
    }

    public function save_video_album(Request $request) {
        $data = array();
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'album_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $imageName));
            /* End Image Thumbnail */
            /* End Image Upload */
            $data['featured_image'] = $imageName;
        }
        $data['fk_content_id'] = 0;
        $data['content_slug'] = 'video-album';
        $data['content_title'] = $request->input('name');
        $data['content_status'] = $request->input('status');
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;
        DB::table('contents')->insert($data);
        return redirect('manage_video_albums')->with('success', 'Album Saved!');
    }

    public function view_video_album($id) {
        $album_info = DB::table('contents')->where('content_slug', 'video-album')->where('content_id', $id)->first();
        $album_videos = DB::table('contents')->where('fk_content_id', $id)->paginate(10);
        $data = array();
        $data['title'] = 'Edit Video Album';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['album_info'] = $album_info;
        $data['all_videos'] = $album_videos;
        $data['home'] = view('content/view_video_album', $data);
        return view('admin/master', $data);
    }

    public function edit_video_album($id) {
        $album_info = DB::table('contents')->where('content_slug', 'video-album')->where('content_id', $id)->first();
        $data = array();
        $data['title'] = 'Edit Video Album';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['album_info'] = $album_info;
        $data['home'] = view('content/edit_video_album', $data);
        return view('admin/master', $data);
    }

    public function update_video_album(Request $request) {
        $data = array();
        $data['content_title'] = $request->input('name');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'album_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $imageName));
            /* End Image Thumbnail */
            /* End Image Upload */
            $data['featured_image'] = $imageName;

            /* Start Delete Video */
            $path = public_path() . '/uploads/' . $request->input('previous_video');
            if ($path) {
                @unlink($path);
            }

            $path_thumbnails = public_path() . '/uploads/thumbnails/' . $request->input('previous_video');
            if ($path_thumbnails) {
                @unlink($path_thumbnails);
            }
            /* End Delete Video */
        }
        $data['content_status'] = $request->input('status');
        $data['modify_time'] = current_time();
        $data['modify_date'] = current_date();
        $data['modified_by'] = Auth::user()->id;
        DB::table('contents')
                ->where('content_id', $request->input('id'))
                ->update($data);
        return redirect('manage_video_albums')->with('success', 'Album Updated!');
    }

    public function delete_video_album($id) {
        $album_info = DB::table('contents')->where('content_id', $id)->first();

        $thumbnails_path = public_path() . "/uploads/thumbnails/" . $album_info->featured_image;
        $path = public_path() . "/uploads/" . $album_info->featured_image;
        @unlink($thumbnails_path);
        @unlink($path);

        $result['videos'] = DB::table('contents')->where('fk_content_id', $id)->delete();
        $result['album'] = DB::table('contents')->where('content_id', $id)->delete();

        if ($result) {
            return redirect('manage_video_albums')->with('success', 'Album Deleted!');
        } else {
            return redirect('manage_video_albums')->with('error', 'Album Not Deleted!');
        }
    }

    public function add_video() {
        $albums = DB::table('contents')
                ->where('fk_content_id', '0')
                ->where('content_slug', 'video-album')
                ->get();
        $data = array();
        $data['title'] = 'Add Video';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_albums'] = $albums;
        $data['home'] = view('content/add_video', $data);
        return view('admin/master', $data);
    }

    public function save_video(Request $request) {
        $data = array();
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'video_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $imageName));
            /* End Image Thumbnail */
            /* End Image Upload */
            $data['featured_image'] = $imageName;
        }
        $data['fk_content_id'] = $request->input('album_id');
        $data['additional_info'] = $request->input('name');
        $data['content_slug'] = 'video';
        $data['content_status'] = 'active';
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;
        DB::table('contents')->insert($data);
        return redirect('view_video_album/' . $data['fk_content_id'])->with('success', 'Video Saved!');
    }

    public function edit_video($id) {
        $albums = DB::table('contents')
                ->where('fk_content_id', '0')
                ->where('content_slug', 'video-album')
                ->get();

        $video_info = DB::table('contents')
                ->where('content_slug', 'video')
                ->where('content_id', $id)
                ->first();
        $data = array();
        $data['title'] = 'Edit Video';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_albums'] = $albums;
        $data['video_info'] = $video_info;
        $data['home'] = view('content/edit_video', $data);
        return view('admin/master', $data);
    }

    public function update_video(Request $request) {
        $data = array();
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'video_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $imageName));
            /* End Image Thumbnail */
            /* End Image Upload */
            $data['featured_image'] = $imageName;

            /* Start Delete Video */
            $path = public_path() . '/uploads/' . $request->input('previous_video');
            if ($path) {
                @unlink($path);
            }

            $path_thumbnails = public_path() . '/uploads/thumbnails/' . $request->input('previous_video');
            if ($path_thumbnails) {
                @unlink($path_thumbnails);
            }
            /* End Delete Video */
        }
        $data['fk_content_id'] = $request->input('album_id');
        $data['additional_info'] = $request->input('name');
        $data['content_slug'] = 'video';
        $data['content_status'] = 'active';
        $data['modify_time'] = current_time();
        $data['modify_date'] = current_date();
        $data['modified_by'] = Auth::user()->id;
        DB::table('contents')
                ->where('content_id', $request->input('id'))
                ->update($data);
        return redirect('manage_video_albums')->with('success', 'Video Updated!');
    }

    public function delete_video($id) {
        $video_info = DB::table('contents')
                ->where('content_slug', 'video')
                ->where('content_id', $id)
                ->first();

        $thumbnails_path = public_path() . "/uploads/thumbnails/" . $video_info->featured_image;
        $path = public_path() . "/uploads/" . $video_info->featured_image;
        @unlink($thumbnails_path);
        @unlink($path);

        $result = DB::table('contents')->where('content_id', $id)->delete();
        if ($result) {
            return redirect('manage_video_albums')->with('success', 'Video Deleted!');
        } else {
            return redirect('manage_video_albums')->with('error', 'Video Not Deleted!');
        }
    }

}
