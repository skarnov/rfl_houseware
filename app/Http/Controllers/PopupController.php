<?php

namespace App\Http\Controllers;

use App\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class PopupController extends Controller
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
        $data['title'] = 'Add Popup Image';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['home'] = view('popup/add_popup_image', $data );
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
        $Popup = new Popup;

        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'popup_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath);
            $img->save(public_path('uploads/popup/' . $imageName));
            /* End Image Thumbnail */
            /* End Image Upload */
            $Popup->image = $imageName;
        }
        $Popup->link = $request->link;
        $Popup->status = $request->status;
        $Popup->save();
        return redirect('manage_popup_image')->with('success', 'Added Item');

    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $data['title'] = 'List Popup Image';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];

        $data['all_popup'] = Popup::select('*')->get();
        $data['home'] = view('popup/manage_popup_image', $data );
        return view('admin/master', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function show(Popup $popup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Edit Popup Image';
        $data['product_count'] = $this->data['product_count'];
        $data['categories_count'] = $this->data['categories_count'];
        $data['catalogs_count'] = $this->data['catalogs_count'];
        $data['image_info'] =  Popup::find($id);
        $data['home'] = view('popup/edit_popup_image', $data );
        return view('admin/master', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Popup $popup)
    {
        $prev_image = $request->previous_image;
        if( $prev_image ){
            $thumbnails_path = public_path() . "/uploads/popup/" . $prev_image;
            $path = public_path() . "/uploads/" . $prev_image;
            @unlink($thumbnails_path);
            @unlink($path);
        }
        $Popup = Popup::find($request->id);

        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = 'popup_thumbnail_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath);
            $img->save(public_path('uploads/popup/' . $imageName));
            /* End Image Thumbnail */
            /* End Image Upload */
            $Popup->image = $imageName;
        }
        $Popup->link = $request->link;
        $Popup->status = $request->status;
        $Popup->save();
        return redirect('manage_popup_image')->with('success', 'Added Item');        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image =  Popup::find($id);
        $thumbnails_path = public_path() . "/uploads/popup/" . $image->image;
        $path = public_path() . "/uploads/" . $image->image;
        @unlink($thumbnails_path);
        @unlink($path);

        $result = Popup::where('id', $id)->delete();
        if ($result) {
            return redirect('manage_popup_image')->with('message', 'Item Deleted!');
        } else {
            return redirect('manage_popup_image')->with('error', 'Item Not Deleted!');
        }
    }
    
}
