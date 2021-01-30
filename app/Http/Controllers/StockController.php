<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Image;

class StockController extends Controller {

    protected $data = [];

    public function __construct() {
        $this->data['product_count'] = DB::table('products')->count();
        $this->data['categories_count'] = DB::table('categories')->count();
        $this->data['catalogs_count'] = DB::table('contents')->where('content_slug', 'catalog')->count();
    }

    /**
     * Resource.
     * 001. Categories
     * 002. Products
     */
    /* 001. Categories */
    public function manage_categories() {
        $data = array();
        $data['title'] = 'Categories';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = DB::table('categories')->where('fk_category_id', 0)->orderBy('category_serial', 'ASC')->paginate(10);
        $data['home'] = view('stock/manage_categories', $data);
        return view('admin/master', $data);
    }

    public function add_category() {
        $data = array();
        $data['title'] = 'Add Category';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['home'] = view('stock/add_category', $data);
        return view('admin/master', $data);
    }

    public function save_category(Request $request) {
        request()->validate([
            'category_name' => 'required|unique:categories'
        ]);
        $data = array();
        $data['fk_category_id'] = 0;
        $data['category_serial'] = $request->input('serial');
        $data['category_name'] = $request->input('category_name');
        $data['url_slug'] = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($request->input('category_name'))));
        $data['category_status'] = $request->input('status');
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;
        DB::table('categories')->insert($data);
        return redirect('manage_categories')->with('success', 'Category Saved!');
    }

    public function edit_category($id) {
        $data = array();
        $data['title'] = 'Edit Category';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['category_info'] = DB::table('categories')->where('category_id', $id)->first();
        $data['home'] = view('stock/edit_category', $data);
        return view('admin/master', $data);
    }

    public function update_category(Request $request) {
        $id = $request->input('id');
        request()->validate([
            'category_name' => 'unique:categories,category_name,' . $id . ',category_id',
        ]);
        $data = array();
        $data['category_serial'] = $request->input('serial');
        $data['category_name'] = $request->input('category_name');
        $data['url_slug'] = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($request->input('category_name'))));
        $data['category_status'] = $request->input('status');
        $data['modify_time'] = current_time();
        $data['modify_date'] = current_date();
        $data['modified_by'] = Auth::user()->id;
        DB::table('categories')
                ->where('category_id', $request->input('id'))
                ->update($data);

        if ($data['category_status'] == 'inactive') {

            /* Inactive Subcategory */
            $inactive_subcategory = array();
            $inactive_subcategory['category_status'] = 'inactive';
            $inactive_subcategory['modify_time'] = current_time();
            $inactive_subcategory['modify_date'] = current_date();
            $inactive_subcategory['modified_by'] = Auth::user()->id;
            DB::table('categories')
                    ->where('fk_category_id', $id)
                    ->update($inactive_subcategory);

            /* Inactive Subcategory Item */
            $subcategory_id = DB::table('categories')->where('fk_category_id', $id)->first('category_id')->category_id;

            $inactive_item = array();
            $inactive_item['category_status'] = 'inactive';
            $inactive_item['modify_time'] = current_time();
            $inactive_item['modify_date'] = current_date();
            $inactive_item['modified_by'] = Auth::user()->id;

            DB::table('categories')
                    ->where('fk_category_id', $subcategory_id)
                    ->update($inactive_item);
        }

//        else if ($data['category_status'] == 'active') {
//            /* Inactive Subcategory */
//            $inactive_subcategory = array();
//            $inactive_subcategory['category_status'] = 'active';
//            $inactive_subcategory['modify_time'] = current_time();
//            $inactive_subcategory['modify_date'] = current_date();
//            $inactive_subcategory['modified_by'] = Auth::user()->id;
//            DB::table('categories')
//                    ->where('fk_category_id', $id)
//                    ->update($inactive_subcategory);
//
//            /* Inactive Subcategory Item */
//            $subcategory_id = DB::table('categories')->where('fk_category_id', $id)->first('category_id')->category_id;
//
//            $inactive_item = array();
//            $inactive_item['category_status'] = 'active';
//            $inactive_item['modify_time'] = current_time();
//            $inactive_item['modify_date'] = current_date();
//            $inactive_item['modified_by'] = Auth::user()->id;
//
//            DB::table('categories')
//                    ->where('fk_category_id', $subcategory_id)
//                    ->update($inactive_item);
//        }

        return redirect('manage_categories')->with('success', 'Category Updated!');
    }

    public function delete_category($id) {

        $result['category'] = DB::table('categories')->where('category_id', $id)->delete();
        $result['subcategory'] = DB::table('categories')->where('fk_category_id', $id)->delete();

//        if ($result['category']) {
        return redirect('manage_categories')->with('success', 'Category, Associate Subcategories and Items has beed deleted.');
//        } else {
//            return redirect('manage_categories')->with('message', 'Error!');
//        }



        /* Inactive Category */

//        $data = array();
//        $data['category_status'] = 'inactive';
//        $data['modify_time'] = current_time();
//        $data['modify_date'] = current_date();
//        $data['modified_by'] = Auth::user()->id;
//        DB::table('categories')
//                ->where('category_id', $id)
//                ->update($data);

        /* Inactive Subcategory */

//        $inactive_subcategory = array();
//        $inactive_subcategory['category_status'] = 'inactive';
//        $inactive_subcategory['modify_time'] = current_time();
//        $inactive_subcategory['modify_date'] = current_date();
//        $inactive_subcategory['modified_by'] = Auth::user()->id;
//        DB::table('categories')
//                ->where('fk_category_id', $id)
//                ->update($inactive_subcategory);

        /* Inactive Subcategory Item */

//        $subcategory_id = DB::table('categories')->where('fk_category_id', $id)->first('category_id')->category_id;
//
//        $inactive_item = array();
//        $inactive_item['category_status'] = 'inactive';
//        $inactive_item['modify_time'] = current_time();
//        $inactive_item['modify_date'] = current_date();
//        $inactive_item['modified_by'] = Auth::user()->id;
//
//        DB::table('categories')
//                ->where('fk_category_id', $subcategory_id)
//                ->update($inactive_item);
    }

    public function manage_subcategories() {
        $all_subcategory = DB::table('categories AS L0')
                ->leftJoin('categories AS L1', 'L0.category_id', '=', 'L1.fk_category_id')
                ->leftJoin('categories AS L2', 'L1.category_id', '=', 'L2.fk_category_id')
                ->leftJoin('categories AS L3', 'L2.category_id', '=', 'L3.fk_category_id')
                ->where('L0.fk_category_id', 0)
                ->whereNotNull('L1.category_name')
                ->groupBy('L1.category_name')
                ->orderBy('L1.category_serial', 'ASC')
                ->select('L0.category_name AS category_name', 'L1.category_id AS subcategory_id', 'L1.category_name AS subcategory_name', 'L1.category_serial AS subcategory_serial', 'L1.category_status AS subcategory_status')
                ->paginate(10);
        $data = array();
        $data['title'] = 'Subcategories';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_subcategories'] = $all_subcategory;
        $data['all_categories'] = DB::table('categories')->where('category_status', 'active')->where('fk_category_id', 0)->get();
        $data['home'] = view('stock/manage_subcategories', $data);
        return view('admin/master', $data);
    }

    public function filter_subcategory() {
        $name = filter_input(INPUT_GET, 'name');
        $category_id = filter_input(INPUT_GET, 'category_id');
        $all_subcategory = DB::table('categories AS L0')
                ->leftJoin('categories AS L1', 'L0.category_id', '=', 'L1.fk_category_id')
                ->leftJoin('categories AS L2', 'L1.category_id', '=', 'L2.fk_category_id')
                ->leftJoin('categories AS L3', 'L2.category_id', '=', 'L3.fk_category_id')
                ->where('L0.fk_category_id', 0)
                ->whereNotNull('L1.category_name')
                ->when($name, function ($query, $name) {
                    return $query->where('L1.category_name', 'like', $name);
                })
                ->when($category_id, function ($query, $category_id) {
                    return $query->where('L0.category_id', '=', $category_id);
                })
                ->groupBy('L1.category_name')
                ->orderBy('L1.category_serial', 'ASC')
                ->select('L0.category_name AS category_name', 'L1.category_id AS subcategory_id', 'L1.category_name AS subcategory_name', 'L1.category_serial AS subcategory_serial', 'L1.category_status AS subcategory_status')
                ->get();
        $data = array();
        $data['all_subcategories'] = $all_subcategory;
        echo view('stock/filter_subcategory', $data);
    }

    public function add_subcategory() {
        $data = array();
        $data['title'] = 'Add Subcategory';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = DB::table('categories')->where('category_status', 'active')->where('fk_category_id', 0)->get();
        $data['home'] = view('stock/add_subcategory', $data);
        return view('admin/master', $data);
    }

    public function save_subcategory(Request $request) {
        request()->validate([
            'category_name' => 'required|unique:categories'
        ]);
        $data = array();
        $data['fk_category_id'] = $request->input('category_id');
        $data['category_serial'] = $request->input('serial');
        $data['category_name'] = $request->input('category_name');
        $data['url_slug'] = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($request->input('category_name'))));
        $data['category_status'] = $request->input('status');
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;
        DB::table('categories')->insert($data);
        return redirect('manage_subcategories')->with('success', 'Subcategory Saved!');
    }

    public function edit_subcategory($id) {
        $data = array();
        $data['title'] = 'Edit Category';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = DB::table('categories')->where('category_status', 'active')->where('fk_category_id', 0)->get();
        $data['subcategory_info'] = DB::table('categories')->where('category_id', $id)->first();
        $data['home'] = view('stock/edit_subcategory', $data);
        return view('admin/master', $data);
    }

    public function update_subcategory(Request $request) {
        $id = $request->input('id');
        request()->validate([
            'category_name' => 'unique:categories,category_name,' . $id . ',category_id',
        ]);
        $data = array();
        $data['fk_category_id'] = $request->input('category_id');
        $data['category_serial'] = $request->input('serial');
        $data['category_name'] = $request->input('category_name');
        $data['url_slug'] = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($request->input('category_name'))));
        $data['category_status'] = $request->input('status');
        $data['modify_time'] = current_time();
        $data['modify_date'] = current_date();
        $data['modified_by'] = Auth::user()->id;
        DB::table('categories')
                ->where('category_id', $request->input('id'))
                ->update($data);

        /* Inactive Subcategory Item */
        if ($data['category_status'] == 'inactive') {
            $inactive_item = array();
            $inactive_item['category_status'] = 'inactive';
            $inactive_item['modify_time'] = current_time();
            $inactive_item['modify_date'] = current_date();
            $inactive_item['modified_by'] = Auth::user()->id;

            DB::table('categories')
                    ->where('fk_category_id', $id)
                    ->update($inactive_item);
        }

//        else if ($data['category_status'] == 'active') {
//            $inactive_item = array();
//            $inactive_item['category_status'] = 'active';
//            $inactive_item['modify_time'] = current_time();
//            $inactive_item['modify_date'] = current_date();
//            $inactive_item['modified_by'] = Auth::user()->id;
//
//            DB::table('categories')
//                    ->where('fk_category_id', $id)
//                    ->update($inactive_item);
//        }

        return redirect('manage_subcategories')->with('success', 'Subcategory & Associate Items Are Updated!');
    }

    public function delete_subcategory($id) {

        $result['subcategory'] = DB::table('categories')->where('category_id', $id)->delete();
        $result['item'] = DB::table('categories')->where('fk_category_id', $id)->delete();





        /* Inactive Subcategory Item */

//        $subcategory_id = DB::table('categories')->where('category_id', $id)->first('fk_category_id')->fk_category_id;
//
//        $data = array();
//        $data['category_status'] = 'inactive';
//        $data['modify_time'] = current_time();
//        $data['modify_date'] = current_date();
//        $data['modified_by'] = Auth::user()->id;
//
//        DB::table('categories')
//                ->where('fk_category_id', $subcategory_id)
//                ->update($data);

        /* Inactive Subcategory Item */

//        if ($data['category_status'] == 'inactive') {
//            $inactive_item = array();
//            $inactive_item['category_status'] = 'inactive';
//            $inactive_item['modify_time'] = current_time();
//            $inactive_item['modify_date'] = current_date();
//            $inactive_item['modified_by'] = Auth::user()->id;
//
//            DB::table('categories')
//                    ->where('fk_category_id', $id)
//                    ->update($inactive_item);
//        }
//
//        DB::table('categories')
//                ->where('fk_category_id', $id)
//                ->update($data);

        return redirect('manage_subcategories')->with('success', 'Sub-Category, Associate Items has beed deleted!');
    }

    public function manage_items() {
        $all_subcategory = DB::table('categories AS L0')
                ->leftJoin('categories AS L1', 'L0.category_id', '=', 'L1.fk_category_id')
                ->leftJoin('categories AS L2', 'L1.category_id', '=', 'L2.fk_category_id')
                ->leftJoin('categories AS L3', 'L2.category_id', '=', 'L3.fk_category_id')
                ->where('L0.fk_category_id', 0)
                ->whereNotNull('L1.category_name')
                ->groupBy('L1.category_name')
                ->orderBy('L1.category_serial', 'ASC')
                ->select('L0.category_name AS category_name', 'L1.category_id AS subcategory_id', 'L1.category_name AS subcategory_name', 'L1.category_serial AS subcategory_serial', 'L1.category_status AS subcategory_status')
                ->get();
        $all_items = DB::table('categories AS L0')
                ->leftJoin('categories AS L1', 'L0.category_id', '=', 'L1.fk_category_id')
                ->leftJoin('categories AS L2', 'L1.category_id', '=', 'L2.fk_category_id')
                ->leftJoin('categories AS L3', 'L2.category_id', '=', 'L3.fk_category_id')
                ->where('L0.fk_category_id', 0)
                ->whereNotNull('L2.category_name')
                ->orderBy('L2.category_serial', 'ASC')
                ->select('L1.category_name AS subcategory_name', 'L2.category_id AS item_id', 'L2.category_name AS item_name', 'L2.category_serial AS item_serial', 'L2.category_status AS item_status')
                ->paginate(10);
        $data = array();
        $data['title'] = 'Items';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_items'] = $all_items;
        $data['all_subcategories'] = $all_subcategory;
        $data['home'] = view('stock/manage_items', $data);
        return view('admin/master', $data);
    }

    public function filter_item() {
        $name = filter_input(INPUT_GET, 'name');
        $subcategory_id = filter_input(INPUT_GET, 'subcategory_id');
        $all_items = DB::table('categories AS L0')
                ->leftJoin('categories AS L1', 'L0.category_id', '=', 'L1.fk_category_id')
                ->leftJoin('categories AS L2', 'L1.category_id', '=', 'L2.fk_category_id')
                ->leftJoin('categories AS L3', 'L2.category_id', '=', 'L3.fk_category_id')
                ->whereNotNull('L2.category_name')
                ->when($name, function ($query, $name) {
                    return $query->where('L2.category_name', 'like', $name);
                })
                ->when($subcategory_id, function ($query, $subcategory_id) {
                    return $query->where('L1.category_id', '=', $subcategory_id);
                })
                ->orderBy('L1.category_serial', 'ASC')
                ->select('L1.category_name AS subcategory_name', 'L2.category_id AS item_id', 'L2.category_name AS item_name', 'L2.category_serial AS item_serial', 'L2.category_status AS item_status')
                ->get();
        $data = array();
        $data['all_items'] = $all_items;
        echo view('stock/filter_item', $data);
    }

    public function add_item() {
        $all_subcategory = DB::table('categories AS L0')
                ->leftJoin('categories AS L1', 'L0.category_id', '=', 'L1.fk_category_id')
                ->leftJoin('categories AS L2', 'L1.category_id', '=', 'L2.fk_category_id')
                ->leftJoin('categories AS L3', 'L2.category_id', '=', 'L3.fk_category_id')
                ->where('L0.fk_category_id', 0)
                ->whereNotNull('L1.category_name')
                ->groupBy('L1.category_name')
                ->orderBy('L1.category_serial', 'ASC')
                ->select('L0.category_name AS category_name', 'L1.category_id AS subcategory_id', 'L1.category_name AS subcategory_name', 'L1.category_serial AS subcategory_serial', 'L1.category_status AS subcategory_status')
                ->get();

        $data = array();
        $data['title'] = 'Add Item';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_subcategories'] = $all_subcategory;
        $data['home'] = view('stock/add_item', $data);
        return view('admin/master', $data);
    }

    public function save_item(Request $request) {
        request()->validate([
            'subcategory_id' => 'required',
            'category_name' => 'required|unique:categories'
        ]);
        $data = array();
        $data['fk_category_id'] = $request->input('subcategory_id');
        $data['category_serial'] = $request->input('serial');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'category_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads/category'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/category/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/category/thumbnails/' . $imageName));
            /* End Image Thumbnail */
            /* End Image Upload */
            $data['category_image'] = $imageName;
        }
        $data['category_name'] = $request->input('category_name');
        $data['url_slug'] = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($request->input('category_name'))));
        $data['category_status'] = $request->input('status');
        $data['subnews'] = $request->input('subnews');
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;
        DB::table('categories')->insert($data);
        return redirect('manage_items')->with('success', 'Item Saved!');
    }

    public function edit_item($id) {
        $all_subcategory = DB::table('categories AS L0')
                ->leftJoin('categories AS L1', 'L0.category_id', '=', 'L1.fk_category_id')
                ->leftJoin('categories AS L2', 'L1.category_id', '=', 'L2.fk_category_id')
                ->leftJoin('categories AS L3', 'L2.category_id', '=', 'L3.fk_category_id')
                ->where('L0.fk_category_id', 0)
                ->whereNotNull('L1.category_name')
                ->groupBy('L1.category_name')
                ->orderBy('L1.category_serial', 'ASC')
                ->select('L0.category_name AS category_name', 'L1.category_id AS subcategory_id', 'L1.category_name AS subcategory_name', 'L1.category_serial AS subcategory_serial', 'L1.category_status AS subcategory_status')
                ->get();

        $data = array();
        $data['title'] = 'Edit Item';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_subcategories'] = $all_subcategory;
        $data['item_info'] = DB::table('categories')->where('category_id', $id)->first();
        $data['home'] = view('stock/edit_item', $data);
        return view('admin/master', $data);
    }

    public function update_item(Request $request) {
        $id = $request->input('id');
        request()->validate([
            'category_name' => 'unique:categories,category_name,' . $id . ',category_id',
        ]);
        $data = array();
        $data['fk_category_id'] = $request->input('subcategory_id');
        $data['category_serial'] = $request->input('serial');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'category_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads/category'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/category/' . $imageName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/category/thumbnails/' . $imageName));
            /* End Image Thumbnail */
            /* End Image Upload */
            $data['category_image'] = $imageName;
        }
        $data['category_name'] = $request->input('category_name');
        $data['url_slug'] = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($request->input('category_name'))));
        $data['category_status'] = $request->input('status');
        $data['subnews'] = $request->input('subnews');
        $data['modify_time'] = current_time();
        $data['modify_date'] = current_date();
        $data['modified_by'] = Auth::user()->id;
        DB::table('categories')
                ->where('category_id', $request->input('id'))
                ->update($data);
        return redirect('manage_items')->with('success', 'Item Updated!');
    }

    public function delete_item($id) {
        $result = DB::table('categories')->where('category_id', $id)->delete();
        if ($result) {
            return redirect('manage_items')->with('success', 'Item Deleted!');
        } else {
            return redirect('manage_items')->with('error', 'Item Not Deleted!');
        }
    }

    /* 002. Products */

    public function manage_products() {
        $products = DB::table('products')
                ->leftJoin('categories', 'categories.category_id', '=', 'products.category_id')
                ->orderBy('product_id', 'DESC')
                ->paginate(10);
        $data = array();
        $data['title'] = 'Products';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = DB::table('categories')->where('fk_category_id', 0)->where('category_status', 'active')->get();
        $data['all_products'] = $products;
        $data['home'] = view('stock/manage_products', $data);
        return view('admin/master', $data);
    }

    public function filter_products() {
        $category = filter_input(INPUT_GET, 'category');
        $name = filter_input(INPUT_GET, 'name');
        $attribute = filter_input(INPUT_GET, 'attribute');

        $products = DB::table('products')
                ->leftJoin('categories', 'categories.category_id', '=', 'products.category_id')
                ->when($category, function ($query, $category) {
                    return $query->where('products.category_id', '=', $category);
                })
                ->when($name, function ($query, $name) {
                    return $query->where('products.product_name', 'like', "$name%");
                })
                ->when($attribute, function ($query, $attribute) {
                    return $query->where('products.product_attribute', '=', $attribute);
                })
                ->orderBy('product_id', 'DESC')
                ->paginate(10);
        $data = array();
        $data['title'] = 'Products';
        $data['all_products'] = $products;
        $data['all_categories'] = DB::table('categories')->where('category_status', 'active')->where('fk_category_id', 0)->paginate(10);
        echo view('stock/filter_products', $data);
    }

    public function ajax_subcategories($category_id) {
        $all_subcategory = DB::table('categories AS L0')
                ->leftJoin('categories AS L1', 'L0.category_id', '=', 'L1.fk_category_id')
                ->leftJoin('categories AS L2', 'L1.category_id', '=', 'L2.fk_category_id')
                ->leftJoin('categories AS L3', 'L2.category_id', '=', 'L3.fk_category_id')
                ->where('L0.fk_category_id', 0)
                ->where('L1.category_status', 'active')
                ->where('L0.category_id', $category_id)
                ->whereNotNull('L1.category_name')
                ->groupBy('L1.category_name')
                ->orderBy('L1.category_id', 'DESC')
                ->select('L1.category_id AS subcategory_id', 'L1.category_name AS subcategory_name')
                ->get();
        $data = array();
        $data['all_subcategories'] = $all_subcategory;
        echo view('stock/subcategories', $data);
    }

    public function ajax_items($category_id) {
        $all_item = DB::table('categories AS L0')
                ->leftJoin('categories AS L1', 'L0.category_id', '=', 'L1.fk_category_id')
                ->leftJoin('categories AS L2', 'L1.category_id', '=', 'L2.fk_category_id')
                ->leftJoin('categories AS L3', 'L2.category_id', '=', 'L3.fk_category_id')
                ->where('L0.fk_category_id', 0)
                ->where('L2.category_status', 'active')
                ->where('L1.category_id', $category_id)
                ->whereNotNull('L2.category_name')
                ->orderBy('L2.category_id', 'DESC')
                ->select('L2.category_id AS item_id', 'L2.category_name AS item_name')
                ->get();
        $data = array();
        $data['all_items'] = $all_item;
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        echo view('stock/items', $data);
    }

    public function add_product() {
        $all_category = DB::table('categories')->where('fk_category_id', 0)->where('category_status', 'active')->get();
        $data = array();
        $data['title'] = 'Add Product';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = $all_category;
        $data['home'] = view('stock/add_product', $data);
        return view('admin/master', $data);
    }

    public function save_product(Request $request) {
        request()->validate([
            'product_name' => 'required|unique:products'
        ]);
        $data = array();
        $data['category_id'] = $request->input('category_id');
        $data['subcategory_id'] = $request->input('subcategory_id');
        $data['item_id'] = $request->input('item_id');
        $data['product_name'] = $request->input('product_name');
        $data['url_slug'] = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($request->input('product_name'))));
        $data['product_sizes'] = json_encode(explode(',', $request->input('sizes')));
        $data['product_dimension'] = $request->input('dimension');
        $data['product_unit'] = $request->input('unit');
//        $data['product_barcode'] = $request->input('barcode');
        $data['product_colors'] = json_encode(explode(',', $request->input('colors')));
        $data['product_summary'] = $request->input('summary');
        /* Start Image Upload */
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('uploads'), $imageName);

        /* Start Image Thumbnail */
        $imagePath = public_path('uploads/' . $imageName);
        $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save(public_path('uploads/thumbnails/' . $imageName));
        /* End Image Thumbnail */

        /* End Image Upload */
        $data['product_image'] = $imageName;
        /* Start Additional Image Upload */
        $images = array();
        if ($request->hasFile('additional_image')) {
            /* Start Image Upload */
            request()->validate([
                'additional_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $additionalName = 'additional_image_' . time() . '.' . request()->additional_image->getClientOriginalExtension();
            request()->additional_image->move(public_path('uploads'), $additionalName);
            /* End Image Upload */

            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $additionalName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $additionalName));
            /* End Image Thumbnail */

            $images['additional_image'] = $additionalName;
        }

        if ($request->hasFile('extra_image')) {
            /* Start Image Upload */
            request()->validate([
                'extra_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $extraName = 'extra_image_' . time() . '.' . request()->extra_image->getClientOriginalExtension();
            request()->extra_image->move(public_path('uploads'), $extraName);
            /* End Image Upload */

            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $extraName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $extraName));
            /* End Image Thumbnail */
            $images['extra_image'] = $extraName;
        }

        if ($request->hasFile('supplementary_image')) {
            /* Start Image Upload */
            request()->validate([
                'supplementary_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $supplementaryName = 'supplementary_image_' . time() . '.' . request()->supplementary_image->getClientOriginalExtension();
            request()->supplementary_image->move(public_path('uploads'), $supplementaryName);
            /* End Image Upload */

            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $supplementaryName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $supplementaryName));
            /* End Image Thumbnail */

            $images['supplementary_image'] = $supplementaryName;
        }

        if ($request->hasFile('auxiliary_image')) {
            /* Start Image Upload */
            request()->validate([
                'auxiliary_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $auxiliaryName = 'auxiliary_image_' . time() . '.' . request()->auxiliary_image->getClientOriginalExtension();
            request()->auxiliary_image->move(public_path('uploads'), $auxiliaryName);
            /* End Image Upload */

            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $auxiliaryName);
            $img = Image::make($imagePath)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $auxiliaryName));
            /* End Image Thumbnail */

            $images['auxiliary_image'] = $auxiliaryName;
        }

        $data['additional_images'] = json_encode($images);
        /* End of Additional Image Upload */

        $data['product_material'] = $request->input('material');
        $data['product_care'] = $request->input('care');
//        $data['product_video'] = $request->input('video');
        $data['external_link'] = $request->input('external_link');
        $data['product_price'] = $request->input('price');
        $data['promotional_price'] = $request->input('promotional_price');
        $data['product_description'] = $request->input('description');
        $data['barcode_info'] = $request->input('barcode');
        $data['product_attribute'] = $request->input('attribute');
        $data['discount'] = $request->input('discount');
        $data['product_status'] = $request->input('status');
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;

        DB::table('products')->insert($data);
        return redirect('manage_products')->with('success', 'Product Saved!');
    }

    public function edit_product($id) {
        $all_category = DB::table('categories')->where('fk_category_id', 0)->where('category_status', 'active')->get();
        $product_info = DB::table('products AS p')
                ->leftJoin('categories AS c', 'c.category_id', '=', 'p.category_id')
                ->leftJoin('categories AS s', 's.category_id', '=', 'p.subcategory_id')
                ->leftJoin('categories AS i', 'i.category_id', '=', 'p.item_id')
                ->where('p.product_id', $id)
                ->select('c.category_id AS category_id', 'c.category_name AS category_name', 's.category_id AS subcategory_id', 's.category_name AS subcategory_name', 'i.category_id AS item_id', 'i.category_name AS item_name', 'p.*')
                ->first();
        $data = array();
        $data['title'] = 'Edit Product';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = $all_category;
        $data['product_info'] = $product_info;
        $additional_images = $data['product_info']->additional_images;
        $additional_image = json_decode($additional_images);
        $data['product_info']->additional_image = isset($additional_image->additional_image) ? $additional_image->additional_image : '';
        $data['product_info']->extra_image = isset($additional_image->extra_image) ? $additional_image->extra_image : '';
        $data['product_info']->supplementary_image = isset($additional_image->supplementary_image) ? $additional_image->supplementary_image : '';
        $data['product_info']->auxiliary_image = isset($additional_image->auxiliary_image) ? $additional_image->auxiliary_image : '';
        $data['product_info']->product_sizes = implode(',', json_decode($data['product_info']->product_sizes));
        $data['product_info']->product_colors = implode(',', json_decode($data['product_info']->product_colors));
        $data['home'] = view('stock/edit_product', $data);
        return view('admin/master', $data);
    }

    public function update_product(Request $request) {
        $id = $request->input('id');
        request()->validate([
            'product_name' => 'unique:products,product_name,' . $id . ',product_id',
        ]);
        $data = array();
        $data['category_id'] = $request->input('category_id');
        $data['subcategory_id'] = $request->input('subcategory_id');
        $data['item_id'] = $request->input('item_id');
        $data['product_name'] = $request->input('product_name');
        $data['url_slug'] = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($request->input('product_name'))));
        $data['product_sizes'] = json_encode(explode(',', $request->input('sizes')));
        $data['product_dimension'] = $request->input('dimension');
        $data['product_unit'] = $request->input('unit');
//        $data['product_barcode'] = $request->input('barcode');
        $data['product_colors'] = json_encode(explode(',', $request->input('colors')));
        $data['product_summary'] = $request->input('summary');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(340, 237, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $imageName));
            /* End Image Thumbnail */
            /* End Image Upload */
            $data['product_image'] = $imageName;

            $path = public_path() . '/uploads/' . $request->input('previous_image');
            if ($path) {
                @unlink($path);
            }

            $path_thumbnails = public_path() . '/uploads/thumbnails/' . $request->input('previous_image');
            if ($path_thumbnails) {
                @unlink($path_thumbnails);
            }
        }

        /* Start Additional Image Upload */
        $images = array();
        if ($request->hasFile('additional_image')) {
            /* Start Image Upload */
            request()->validate([
                'additional_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $additionalName = 'additional_image_' . time() . '.' . request()->additional_image->getClientOriginalExtension();
            request()->additional_image->move(public_path('uploads'), $additionalName);
            /* End Image Upload */

            $path = public_path() . '/uploads/' . $request->input('previous_additional_image');
            if ($path) {
                @unlink($path);
            }

            $path_thumbnails = public_path() . '/uploads/thumbnails/' . $request->input('previous_additional_image');
            if ($path_thumbnails) {
                @unlink($path_thumbnails);
            }
        }

        $images['additional_image'] = isset($additionalName) ? $additionalName : $request->input('previous_additional_image');

        if ($request->hasFile('extra_image')) {
            /* Start Image Upload */
            request()->validate([
                'extra_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $extraName = 'extra_image_' . time() . '.' . request()->extra_image->getClientOriginalExtension();
            request()->extra_image->move(public_path('uploads'), $extraName);
            /* End Image Upload */

            $path = public_path() . '/uploads/' . $request->input('previous_extra_image');
            if ($path) {
                @unlink($path);
            }

            $path_thumbnails = public_path() . '/uploads/thumbnails/' . $request->input('previous_extra_image');
            if ($path_thumbnails) {
                @unlink($path_thumbnails);
            }
        }

        $images['extra_image'] = isset($extraName) ? $extraName : $request->input('previous_extra_image');

        if ($request->hasFile('supplementary_image')) {
            /* Start Image Upload */
            request()->validate([
                'supplementary_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $supplementaryName = 'supplementary_image_' . time() . '.' . request()->supplementary_image->getClientOriginalExtension();
            request()->supplementary_image->move(public_path('uploads'), $supplementaryName);
            /* End Image Upload */

            $path = public_path() . '/uploads/' . $request->input('previous_supplementary_image');
            if ($path) {
                @unlink($path);
            }

            $path_thumbnails = public_path() . '/uploads/thumbnails/' . $request->input('previous_supplementary_image');
            if ($path_thumbnails) {
                @unlink($path_thumbnails);
            }
        }
        $images['supplementary_image'] = isset($supplementaryName) ? $supplementaryName : $request->input('previous_supplementary_image');

        if ($request->hasFile('auxiliary_image')) {
            /* Start Image Upload */
            request()->validate([
                'auxiliary_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $auxiliaryName = 'auxiliary_image_' . time() . '.' . request()->auxiliary_image->getClientOriginalExtension();
            request()->auxiliary_image->move(public_path('uploads'), $auxiliaryName);
            /* End Image Upload */

            $path = public_path() . '/uploads/' . $request->input('previous_auxiliary_image');
            if ($path) {
                @unlink($path);
            }

            $path_thumbnails = public_path() . '/uploads/thumbnails/' . $request->input('previous_auxiliary_image');
            if ($path_thumbnails) {
                @unlink($path_thumbnails);
            }
        }
        $images['auxiliary_image'] = isset($auxiliaryName) ? $auxiliaryName : $request->input('previous_auxiliary_image');

        $data['additional_images'] = json_encode($images);
        /* End of Additional Image Upload */

        $data['product_material'] = $request->input('material');
        $data['product_care'] = $request->input('care');
//        $data['product_video'] = $request->input('video');
        $data['external_link'] = $request->input('external_link');
        $data['product_price'] = $request->input('price');
        $data['promotional_price'] = $request->input('promotional_price');
        $data['product_description'] = $request->input('description');
        $data['barcode_info'] = $request->input('barcode');
        $data['product_attribute'] = $request->input('attribute');
        $data['discount'] = $request->input('discount');
        $data['product_status'] = $request->input('status');
        $data['modify_time'] = current_time();
        $data['modify_date'] = current_date();
        $data['modified_by'] = Auth::user()->id;
        DB::table('products')
                ->where('product_id', $id)
                ->update($data);
        return redirect('manage_products')->with('success', 'Product Updated!');
    }

    public function delete_product($id) {
        $product_info = DB::table('products')
                ->where('product_id', $id)
                ->first();

        $additional_images = $product_info->additional_images;
        $additional_image = json_decode($additional_images);

        $main_additional_image = isset($additional_image->additional_image) ? $additional_image->additional_image : '';
        $extra_image = isset($additional_image->extra_image) ? $additional_image->extra_image : '';
        $supplementary_image = isset($additional_image->supplementary_image) ? $additional_image->supplementary_image : '';
        $auxiliary_image = isset($additional_image->auxiliary_image) ? $additional_image->auxiliary_image : '';

        $path = public_path() . "/uploads/" . $product_info->product_image;
        $path_thumbnails = public_path() . "/uploads/thumbnails/" . $product_info->product_image;
        @unlink($path);
        @unlink($path_thumbnails);

        $path = public_path() . "/uploads/" . $main_additional_image;
        $path_thumbnails = public_path() . "/uploads/thumbnails/" . $main_additional_image;
        @unlink($path);
        @unlink($path_thumbnails);

        $path = public_path() . "/uploads/" . $extra_image;
        $path_thumbnails = public_path() . "/uploads/thumbnails/" . $extra_image;
        @unlink($path);
        @unlink($path_thumbnails);

        $path = public_path() . "/uploads/" . $supplementary_image;
        $path_thumbnails = public_path() . "/uploads/thumbnails/" . $supplementary_image;
        @unlink($path);
        @unlink($path_thumbnails);

        $path = public_path() . "/uploads/" . $auxiliary_image;
        $path_thumbnails = public_path() . "/uploads/thumbnails/" . $auxiliary_image;
        @unlink($path);
        @unlink($path_thumbnails);

        $result = DB::table('products')->where('product_id', $id)->delete();
        if ($result) {
            return redirect('manage_products')->with('success', 'Product Deleted!');
        } else {
            return redirect('manage_products')->with('success', 'Product Not Deleted!');
        }
    }

}
