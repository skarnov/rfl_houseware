<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

    protected $data = [];

    public function __construct() {
        $this->data['product_count'] = DB::table('products')->count();
        $this->data['categories_count'] = DB::table('categories')->count();
        $this->data['catalogs_count'] = DB::table('contents')->where('content_slug', 'catalog')->count();
    }

    /**
     * Resources
     * 001. Admin Dashboard
     * 002. Settings
     * 003. Admins
     */
    /* 001. Admin Dashboard */
    public function index() {
        $data = array();
        $data['title'] = 'Admin Panel';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['home'] = view('admin/home', $data);
        return view('admin/master', $data);
    }

    /* 002. Settings */

    public function settings() {
        $data = array();
        $data['title'] = 'Settings';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['config'] = DB::table('configurations')->get();
        $data['image_settings'] = DB::table('image_configurations')->get();
        $data['home'] = view('admin/settings', $data);
        return view('admin/master', $data);
    }

    public function update_settings() {
        foreach ($_POST as $key => $value) {
            DB::table('configurations')
                    ->where('config_name', $key)
                    ->update(array('config_setting' => $value));
        }
        return redirect('settings')->with('success', 'Settings Updated!');
    }

    public function update_image_settings(Request $request) {
        $data = array();
        $data['image_name'] = 'home-logo';

        if ($request->hasFile('home_logo')) {
            /* Start Image Upload */
            request()->validate([
                'home_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);
            $imageName = time() . 'home-logo.' . request()->home_logo->getClientOriginalExtension();
            request()->home_logo->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            $data['image_value'] = $imageName;

            $path = public_path() . '/uploads/' . $request->input('previous_home_logo');
            if ($path) {
                @unlink($path);
            }
        }

        DB::table('image_configurations')
                ->where('image_name', 'home-logo')
                ->update($data);

        $data = array();
        $data['image_name'] = 'inner-logo';

        if ($request->hasFile('inner_logo')) {
            /* Start Image Upload */
            request()->validate([
                'inner_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);
            $imageName = time() . 'home-logo.' . request()->inner_logo->getClientOriginalExtension();
            request()->inner_logo->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            $data['image_value'] = $imageName;

            $path = public_path() . '/uploads/' . $request->input('previous_inner_logo');
            if ($path) {
                @unlink($path);
            }
        }

        DB::table('image_configurations')
                ->where('image_name', 'inner-logo')
                ->update($data);

        return redirect('settings')->with('success', 'Settings Updated!');
    }

    /* 003. Admins */

    public function manage_admins() {
        $data = array();
        $data['title'] = 'Admin Management';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_users'] = DB::table('users')->paginate(10);
        $data['home'] = view('admin/manage_admins', $data);
        return view('admin/master', $data);
    }

    public function add_admin() {
        $data = array();
        $data['title'] = 'Add Admin';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['home'] = view('admin/add_admin', $data);
        return view('admin/master', $data);
    }

    public function save_admin(Request $request) {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        $data = array();
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['password'] = Hash::make($request->input('password'));
        $data['created_at'] = new \DateTime();
        DB::table('users')->insert($data);
        return redirect('manage_admins')->with('success', 'Admin Saved!');
    }

    public function edit_admin($id) {
        $data = array();
        $data['title'] = 'Edit Admin';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['admin_info'] = DB::table('users')->where('id', $id)->first();
        $data['home'] = view('admin/edit_admin', $data);
        return view('admin/master', $data);
    }

    public function update_admin(Request $request) {
        $id = $request->input('id');
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        $data = array();
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        if ($request->input('password')):
            $data['password'] = Hash::make($request->input('password'));
        endif;
        $data['updated_at'] = new \DateTime();
        DB::table('users')
                ->where('id', $id)
                ->update($data);
        return redirect('manage_admins')->with('success', 'Admin Updated!');
    }

    public function delete_admin($id) {
        $result = DB::table('users')->where('id', $id)->delete();
        if ($result) {
            return redirect('manage_admins')->with('success', 'Admin Deleted!');
        } else {
            return redirect('manage_admins')->with('error', 'Admin Not Deleted!');
        }
    }

    public function manage_subscriptions() {
        $data = array();
        $data['title'] = 'Subscriptions Management';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_subscriptions'] = DB::table('newsletters')->paginate(10);
        $data['home'] = view('admin/manage_subscriptions', $data);
        return view('admin/master', $data);
    }

    public function delete_subscription($id) {
        $result = DB::table('newsletters')->where('newsletter_id', $id)->delete();
        if ($result) {
            return redirect('manage_subscriptions')->with('success', 'Newsletter Deleted!');
        } else {
            return redirect('manage_subscriptions')->with('error', 'Newsletter Not Deleted!');
        }
    }

}
