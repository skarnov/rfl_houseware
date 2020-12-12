<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContatMall;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
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
        $data['title'] = 'All Mall';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['all_categories'] = DB::table('categories')->where('fk_category_id', 0)->orderBy('category_serial', 'ASC')->paginate(10);
        $data['messages'] = ContatMall::select('*')->get(); 
        $data['home'] = view('mail/index', $data );
        return view('admin/master', $data);
    }

}
