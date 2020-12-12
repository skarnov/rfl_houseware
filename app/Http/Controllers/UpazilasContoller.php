<?php

namespace App\Http\Controllers;

use App\Upazilas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpazilasContoller extends Controller
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
        $data['title'] = 'Add Upazila';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = DB::table('categories')->where('fk_category_id', 0)->orderBy('category_serial', 'ASC')->paginate(10);
        $data['district'] = DB::table('districts')->select('*')->get(); 
        $data['home'] = view('outlet/add_upazila', $data );
        return view('admin/master', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all_upazila()
    {
        $data['title'] = 'All Upazila';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = DB::table('categories')->where('fk_category_id', 0)->orderBy('category_serial', 'ASC')->paginate(10);
        $data['upazilas'] = DB::table('upazilas')->join('districts', 'districts.id', '=', 'upazilas.district_id')->select('upazilas.*', 'districts.name as Dname')->paginate(15); 
        $data['home'] = view('outlet/list_upazila', $data );
        return view('admin/master', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_upazila($id)
    {
        $data['upazilas'] = Upazilas::find($id);
        $data['title'] = 'Edit Upazila';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = DB::table('categories')->where('fk_category_id', 0)->orderBy('category_serial', 'ASC')->paginate(10);
        $data['district'] = DB::table('districts')->select('*')->get(); 
        $data['home'] = view('outlet/edit_upazila', $data );
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
        request()->validate([
            'districts_id' => 'required',
            'name' => 'required'
        ]);

        $Upazilas = new Upazilas;
        $Upazilas->name = $request->name; 
        $Upazilas->district_id = $request->districts_id; 
        $Upazilas->save(); 
     
        return redirect('add_upazila')->with('message', 'Category Updated!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_upazila(Request $request)
    {
        request()->validate([
            'districts_id' => 'required',
            'name' => 'required'
        ]);

        $Upazilas = Upazilas::find($request->id);
        $Upazilas->name = $request->name; 
        $Upazilas->district_id = $request->districts_id; 
        $Upazilas->save(); 
     
        return redirect('all_upazila')->with('message', 'Category Updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Upazilas  $upazilas
     * @return \Illuminate\Http\Response
     */
    public function show(Upazilas $upazilas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Upazilas  $upazilas
     * @return \Illuminate\Http\Response
     */
    public function edit(Upazilas $upazilas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Upazilas  $upazilas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upazilas $upazilas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Upazilas  $upazilas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Upazilas::where('id', $id)->delete();
        if ($result) {
            return redirect('all_upazila')->with('message', 'Item Deleted!');
        } else {
            return redirect('all_upazila')->with('error', 'Item Not Deleted!');
        }
    }
}
