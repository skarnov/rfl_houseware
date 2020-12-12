<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialController extends Controller
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
        $data['title'] = 'Add Soical';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = DB::table('categories')->where('fk_category_id', 0)->orderBy('category_serial', 'ASC')->paginate(10);
        $data['home'] = view('social/add_social', $data );
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
            'icon_class' => 'required',
            'website_url' => 'required'
        ]);

        $Social = new Social;
        $Social->icon_class = $request->icon_class; 
        $Social->website_url = $request->website_url; 
        $Social->save(); 
     
        return redirect('list_social')->with('message', 'Category Updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\social  $social
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data['social'] = DB::table('social')->select('*')->get(); 
        $data['title'] = 'List Soical';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = DB::table('categories')->where('fk_category_id', 0)->orderBy('category_serial', 'ASC')->paginate(10);
        $data['home'] = view('social/list_social', $data );
        return view('admin/master', $data);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['social'] = Social::find($id);
        $data['title'] = 'Edit Social';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = DB::table('categories')->where('fk_category_id', 0)->orderBy('category_serial', 'ASC')->paginate(10);
        $data['home'] = view('social/edit_social', $data );
        return view('admin/master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, social $social)
    {
        request()->validate([
            'icon_class' => 'required',
            'website_url' => 'required'
        ]);

        $Social = Social::find($request->id);
        $Social->icon_class = $request->icon_class; 
        $Social->website_url = $request->website_url; 
        $Social->save(); 
     
        return redirect('list_social')->with('message', 'Category Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Social::where('id', $id)->delete();
        if ($result) {
            return redirect('list_social')->with('message', 'Item Deleted!');
        } else {
            return redirect('list_social')->with('error', 'Item Not Deleted!');
        }
    }
}
