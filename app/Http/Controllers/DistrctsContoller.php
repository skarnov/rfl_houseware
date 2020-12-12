<?php

namespace App\Http\Controllers;
use App\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DistrctsContoller extends Controller
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
        $data['title'] = 'Add District';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = DB::table('categories')->where('fk_category_id', 0)->orderBy('category_serial', 'ASC')->paginate(10);
        $data['division'] = DB::table('divisions')->select('*')->get(); 
        $data['home'] = view('outlet/add_district', $data );
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
            'division_id' => 'required',
            'name' => 'required'
        ]);

        $District = new District;
        $District->name = $request->name; 
        $District->division_id = $request->division_id; 
        $District->save(); 
     
        return redirect('add_district')->with('message', 'Category Updated!');
    }

}
