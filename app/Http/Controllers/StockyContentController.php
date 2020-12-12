<?php

namespace App\Http\Controllers;

use App\SickyContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockyContentController extends Controller
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
        $data['title'] = 'Add Sticky';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['home'] = view('sticky/add_sticky', $data );
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
            'text' => 'required',
        ]);
        $SickyContent = new SickyContent;
        $SickyContent->text = $request->text; 
        $SickyContent->status = $request->status; 
        $SickyContent->save(); 
     
        return redirect('add_sticky')->with('message', 'Category Updated!');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SickyContent  $sickyContent
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $SickyContent = new SickyContent;
        $data['title'] = 'List Sticky';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['list_sticky'] = SickyContent::select('*')->get();
        $data['home'] = view('sticky/list_sticky', $data );
        return view('admin/master', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SickyContent  $sickyContent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Edit Sticky';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['sicky_items'] = SickyContent::find($id);
        $data['home'] = view('sticky/edit_sticky', $data );
        return view('admin/master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SickyContent  $sickyContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $sticky = SickyContent::find($request->id);
        $sticky->text = $request->text;
        $sticky->status = $request->status;
        $sticky->save();
        return redirect('list_sticky')->with('message', 'Item Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SickyContent  $sickyContent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = SickyContent::where('id', $id)->delete();
        if ($result) {
            return redirect('list_sticky')->with('message', 'Item Deleted!');
        } else {
            return redirect('list_sticky')->with('error', 'Item Not Deleted!');
        }
    }
}
