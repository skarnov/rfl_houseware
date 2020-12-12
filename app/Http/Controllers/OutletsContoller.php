<?php

namespace App\Http\Controllers;

use App\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutletsContoller extends Controller
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
    public function index()
    {
        $data['title'] = 'Add Outlets';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = DB::table('categories')->where('fk_category_id', 0)->orderBy('category_serial', 'ASC')->paginate(10);
        $data['upazilas'] = DB::table('upazilas')->select('*')->get(); 
        $data['home'] = view('outlet/add_outlets', $data );
        return view('admin/master', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function outlet_view()
    {

        $data['title'] = 'List Outlets';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = DB::table('categories')->where('fk_category_id', 0)->orderBy('category_serial', 'ASC')->paginate(10);
        $data['all_outlet'] = Outlet::join('upazilas', 'upazilas.id', '=', 'outlets.upazila_id')
            ->select('outlets.*', 'upazilas.name as Uname')
            ->get();
        $data['home'] = view('outlet/list_outlets', $data );
        return view('admin/master', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'outlet_category' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'upazilas_id' => 'required',
        ]);

        $Outlet = new Outlet;
        $Outlet->name = $request->name; 
        $Outlet->address = $request->address; 
        $Outlet->phone = $request->phone; 
        $Outlet->outlet_category = $request->outlet_category; 
        $Outlet->latitude = $request->latitude; 
        $Outlet->longitude = $request->longitude; 
        $Outlet->upazila_id = $request->upazilas_id; 
        $Outlet->save(); 
     
        return redirect('add_outlets')->with('message', 'Category Updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['outlet'] = Outlet::find($id);
        $data['title'] = 'Add Outlets';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = DB::table('categories')->where('fk_category_id', 0)->orderBy('category_serial', 'ASC')->paginate(10);
        $data['upazilas'] = DB::table('upazilas')->select('*')->get(); 
        $data['home'] = view('outlet/edit_outlets', $data );
        return view('admin/master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $Outlet = Outlet::find($request->id);
        request()->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'outlet_category' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'upazilas_id' => 'required',
        ]);

        $Outlet->name = $request->name; 
        $Outlet->address = $request->address; 
        $Outlet->phone = $request->phone; 
        $Outlet->outlet_category = $request->outlet_category; 
        $Outlet->latitude = $request->latitude; 
        $Outlet->longitude = $request->longitude; 
        $Outlet->upazila_id = $request->upazilas_id; 
        $Outlet->save(); 
        return redirect('list_outlet')->with('message', 'Item Deleted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Outlet::where('id', $id)->delete();
        if ($result) {
            return redirect('list_outlet')->with('message', 'Item Deleted!');
        } else {
            return redirect('list_outlet')->with('error', 'Item Not Deleted!');
        }
    }
}
