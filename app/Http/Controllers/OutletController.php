<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OutletController extends Controller {
    
    protected $data = [];

    public function __construct() {
        $this->data['product_count'] = DB::table('products')->count();
        $this->data['categories_count'] = DB::table('categories')->count();
        $this->data['catalogs_count'] = DB::table('contents')->where('content_slug', 'catalog')->count();
    }

    /**
     * Resources
     * 001. Store Locator
     */
    /* 001. Store Locator */

    public function manage_stores() {
        $data = array();
        $data['title'] = 'Store Management';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_stores'] = DB::table('markers')->paginate(10);
        $data['home'] = view('store/manage_stores', $data);
        return view('admin/master', $data);
    }

    public function add_store() {
        $data = array();
        $data['title'] = 'Add Store';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['home'] = view('store/add_store', $data);
        return view('admin/master', $data);
    }

    public function save_store(Request $request) {
        $data = array();
        $data['name'] = $request->input('name');
        $data['phone'] = $request->input('phone');
        $data['latitude'] = $request->input('latitude');
        $data['longitude'] = $request->input('longitude');
        $data['city'] = $request->input('city');
        $data['address'] = $request->input('address');
        $data['status'] = 'active';
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        $data['created_by'] = Auth::user()->id;
        DB::table('markers')->insert($data);
        return redirect('manage_stores')->with('success', 'Store Saved!');
    }

    public function edit_store($id) {
        $data = array();
        $data['title'] = 'Edit Store';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['store_info'] = DB::table('markers')->where('storelocator_id', $id)->first();
        $data['home'] = view('store/edit_store', $data);
        return view('admin/master', $data);
    }

    public function update_store(Request $request) {
        $data = array();
        $data['name'] = $request->input('name');
        $data['phone'] = $request->input('phone');
        $data['latitude'] = $request->input('latitude');
        $data['longitude'] = $request->input('longitude');
        $data['city'] = $request->input('city');
        $data['address'] = $request->input('address');
        $data['modify_time'] = current_time();
        $data['modify_date'] = current_date();
        $data['modified_by'] = Auth::user()->id;
        DB::table('markers')->where('storelocator_id', $request->input('id'))->update($data);
        return redirect('manage_stores')->with('success', 'Store Updated!');
    }

    public function delete_store($id) {
        $result = DB::table('markers')->where('storelocator_id', $id)->delete();
        if ($result) {
            return redirect('manage_stores')->with('success', 'Store Deleted!');
        } else {
            return redirect('manage_stores')->with('error', 'Store Not Deleted!');
        }
    }
}