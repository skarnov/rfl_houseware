<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\ContatMall;
/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', 'HomeController@index');
Route::get('/find_categories/{id}', 'HomeController@find_categories');
Route::get('/find_products/{id}', 'HomeController@find_products');
Route::get('/subcategory_products/{id}', 'HomeController@subcategory_products');
Route::get('/item_listing/{id}', 'HomeController@item_listing');
Route::get('/category_listing/{id}', 'HomeController@category_listing');
Route::get('/listing_product_ajax/{id}', 'HomeController@listing_product_ajax');
Route::get('/product_details/{id}', 'HomeController@product_details');
Route::get('/product_sorting/', 'HomeController@product_sorting');
Route::get('/product_search/', 'HomeController@product_search');
Route::post('/save_newsletter', 'HomeController@save_newsletter');
Route::get('/blog/', 'HomeController@blog');
Route::get('/blog_details/{id}', 'HomeController@blog_details');
Route::get('/about/', 'HomeController@about');
Route::get('/our-brands/', 'HomeController@our_brands');
Route::get('/global-presence/', 'HomeController@global_presence');
Route::get('/quality-compliance/', 'HomeController@quality_compliance');
Route::get('/factories/', 'HomeController@factories');
Route::get('/achievements/', 'HomeController@achievements');
Route::get('/contact/', 'HomeController@contact');
Route::get('/FAQ/', 'HomeController@faq');
Route::get('/partners/', 'HomeController@partners');
Route::get('/terms-of-use/', 'HomeController@terms_of_use');
Route::get('/privacy-policy/', 'HomeController@privacy_policy');
Route::get('/catalog/', 'HomeController@catalog');
Route::get('/sustainability/', 'HomeController@sustainability');
Route::get('/news/', 'HomeController@news');
Route::get('/news_details/{id}', 'HomeController@news_details');
Route::get('/event/', 'HomeController@event');
Route::get('/event_details/{id}', 'HomeController@event_details');
Route::get('/photo/', 'HomeController@photo_album');
Route::get('/image_gallery/{id}', 'HomeController@image_gallery');
Route::get('/video/', 'HomeController@video_album');
Route::get('/video_gallery/{id}', 'HomeController@video_gallery');
Route::get('/sitemap/', 'HomeController@sitemap');
Route::get('/bestbuyoutlets', 'HomeController@bestbuy');
Route::get('/exclusiveoutlets', 'HomeController@exclusive');
Route::get('/carnivaoutlets', 'HomeController@carniva');


Route::get('send-mail', function () {
    $details = [
        'name' => $_GET['name'],
        'email' => $_GET['email'],
        'mobile' => $_GET['mobile'],
        'message' => $_GET['message']
    ];
    \Mail::to('info@rflhouseware.com')->send(new \App\Mail\MyTestMail($details));
    $mail           = new ContatMall;
    $mail ->name    = $_GET['name'];
    $mail ->last_name    = $_GET['last_name'];
    $mail ->email   = $_GET['email'];
    $mail ->phone   = $_GET['mobile'];
    $mail ->country_id   = $_GET['country_id'];
    $mail ->category_id   = $_GET['category_id'];
    $mail ->message = $_GET['message'];
    $mail->save();
    return redirect('/success');
});
Route::get('/success', 'HomeController@success');

Auth::routes(['register' => false]);

Route::get('/settings', 'AdminController@settings')->middleware('auth');
Route::post('/update_settings', 'AdminController@update_settings')->middleware('auth');
Route::post('/update_image_settings', 'AdminController@update_image_settings')->middleware('auth');
Route::post('/send-mail', 'HomeController@update_settings')->middleware('auth');

Route::get('/admin', 'AdminController@index')->middleware('auth');
Route::get('/manage_admins', 'AdminController@manage_admins')->middleware('auth');
Route::get('/add_admin', 'AdminController@add_admin')->middleware('auth');
Route::post('/save_admin', 'AdminController@save_admin')->middleware('auth');
Route::get('/edit_admin/{id}', 'AdminController@edit_admin')->middleware('auth');
Route::post('/update_admin', 'AdminController@update_admin')->middleware('auth');
Route::get('/delete_admin/{id}', 'AdminController@delete_admin')->middleware('auth');

Route::get('/manage_subscriptions', 'AdminController@manage_subscriptions')->middleware('auth');
Route::get('/delete_subscription/{id}', 'AdminController@delete_subscription')->middleware('auth');

Route::get('/content', 'ContentController@index')->middleware('auth');
Route::get('/manage_inner_pages', 'ContentController@innerindex')->middleware('auth');
Route::get('/add_page', 'ContentController@add_page')->middleware('auth');
Route::get('/add_featured_slider/{id}', 'ContentController@add_featured_slider')->middleware('auth');
Route::post('/save_featured_slider', 'ContentController@save_featured_slider')->middleware('auth');
Route::get('/edit_featured_slider/{id}', 'ContentController@edit_featured_slider')->middleware('auth');
Route::get('/edit_inner_pages/{id}', 'ContentController@edit_innerpages')->middleware('auth');
Route::post('/update_featured_slider', 'ContentController@update_featured_slider')->middleware('auth');
Route::post('/update_inner_pages', 'ContentController@update_inner_pages')->middleware('auth');
Route::get('/delete_featured_slider/{id}', 'ContentController@delete_featured_slider')->middleware('auth');

Route::post('/save_page', 'ContentController@save_page')->middleware('auth');
Route::get('/edit_page/{id}', 'ContentController@edit_page')->middleware('auth');
Route::post('/update_page', 'ContentController@update_page')->middleware('auth');
Route::post('/update_page_attr', 'ContentController@update_page_attr')->middleware('auth');
Route::post('/update_page_tab', 'ContentController@update_page_tab')->middleware('auth');
Route::get('/delete_page/{id}', 'ContentController@delete_page')->middleware('auth');

Route::get('/manage_image_albums', 'ContentController@manage_image_albums')->middleware('auth');
Route::get('/add_image_album', 'ContentController@add_image_album')->middleware('auth');
Route::post('/save_image_album', 'ContentController@save_image_album')->middleware('auth');
Route::get('/view_image_album/{id}', 'ContentController@view_image_album')->middleware('auth');
Route::get('/edit_image_album/{id}', 'ContentController@edit_image_album')->middleware('auth');
Route::post('/update_image_album', 'ContentController@update_image_album')->middleware('auth');
Route::get('/delete_image_album/{id}', 'ContentController@delete_image_album')->middleware('auth');

Route::get('/add_image', 'ContentController@add_image')->middleware('auth');
Route::post('/save_image', 'ContentController@save_image')->middleware('auth');
Route::get('/edit_image/{id}', 'ContentController@edit_image')->middleware('auth');
Route::post('/update_image', 'ContentController@update_image')->middleware('auth');
Route::get('/delete_image/{id}', 'ContentController@delete_image')->middleware('auth');

Route::get('/manage_video_albums', 'ContentController@manage_video_albums')->middleware('auth');
Route::get('/add_video_album', 'ContentController@add_video_album')->middleware('auth');
Route::post('/save_video_album', 'ContentController@save_video_album')->middleware('auth');
Route::get('/view_video_album/{id}', 'ContentController@view_video_album')->middleware('auth');
Route::get('/edit_video_album/{id}', 'ContentController@edit_video_album')->middleware('auth');
Route::post('/update_video_album', 'ContentController@update_video_album')->middleware('auth');
Route::get('/delete_video_album/{id}', 'ContentController@delete_video_album')->middleware('auth');

Route::get('/add_video', 'ContentController@add_video')->middleware('auth');
Route::post('/save_video', 'ContentController@save_video')->middleware('auth');
Route::get('/edit_video/{id}', 'ContentController@edit_video')->middleware('auth');
Route::post('/update_video', 'ContentController@update_video')->middleware('auth');
Route::get('/delete_video/{id}', 'ContentController@delete_video')->middleware('auth');

Route::get('/manage_offers', 'ContentController@manage_offers')->middleware('auth');
Route::get('/add_offer', 'ContentController@add_offer')->middleware('auth');
Route::post('/save_offer', 'ContentController@save_offer')->middleware('auth');
Route::get('/edit_offer/{id}', 'ContentController@edit_offer')->middleware('auth');
Route::post('/update_offer', 'ContentController@update_offer')->middleware('auth');
Route::get('/delete_offer/{id}', 'ContentController@delete_offer')->middleware('auth');

Route::get('/manage_sliders', 'ContentController@manage_sliders')->middleware('auth');
Route::get('/manage_image_sliders', 'ContentController@manage_image_sliders')->middleware('auth');
Route::get('/add_slider', 'ContentController@add_slider')->middleware('auth');
Route::post('/save_slider', 'ContentController@save_slider')->middleware('auth');
Route::get('/edit_slider/{id}', 'ContentController@edit_slider')->middleware('auth');
Route::post('/update_slider', 'ContentController@update_slider')->middleware('auth');
Route::get('/delete_slider/{id}', 'ContentController@delete_slider')->middleware('auth');

Route::get('/manage_blogs', 'BlogController@manage_blogs')->middleware('auth');
Route::get('/add_blog', 'BlogController@add_blog')->middleware('auth');
Route::post('/save_blog', 'BlogController@save_blog')->middleware('auth');
Route::get('/edit_blog/{id}', 'BlogController@edit_blog')->middleware('auth');
Route::post('/update_blog', 'BlogController@update_blog')->middleware('auth');
Route::get('/delete_blog/{id}', 'BlogController@delete_blog')->middleware('auth');

Route::get('/manage_events', 'EventController@manage_events')->middleware('auth');
Route::get('/add_event', 'EventController@add_event')->middleware('auth');
Route::post('/save_event', 'EventController@save_event')->middleware('auth');
Route::get('/edit_event/{id}', 'EventController@edit_event')->middleware('auth');
Route::post('/update_event', 'EventController@update_event')->middleware('auth');
Route::get('/delete_event/{id}', 'EventController@delete_event')->middleware('auth');

Route::get('/manage_news', 'NewsController@manage_news')->middleware('auth');
Route::get('/add_news', 'NewsController@add_news')->middleware('auth');
Route::post('/save_news', 'NewsController@save_news')->middleware('auth');
Route::get('/edit_news/{id}', 'NewsController@edit_news')->middleware('auth');
Route::post('/update_news', 'NewsController@update_news')->middleware('auth');
Route::get('/delete_news/{id}', 'NewsController@delete_news')->middleware('auth');

Route::get('/manage_stores', 'OutletController@manage_stores')->middleware('auth');
Route::get('/add_store', 'OutletController@add_store')->middleware('auth');
Route::post('/save_store', 'OutletController@save_store')->middleware('auth');
Route::get('/edit_store/{id}', 'OutletController@edit_store')->middleware('auth');
Route::post('/update_store', 'OutletController@update_store')->middleware('auth');
Route::get('/delete_store/{id}', 'OutletController@delete_store')->middleware('auth');

Route::get('/manage_categories', 'StockController@manage_categories')->middleware('auth');
Route::get('/add_category', 'StockController@add_category')->middleware('auth');
Route::post('/save_category', 'StockController@save_category')->middleware('auth');
Route::get('/edit_category/{id}', 'StockController@edit_category')->middleware('auth');
Route::post('/update_category', 'StockController@update_category')->middleware('auth');
Route::get('/delete_category/{id}', 'StockController@delete_category')->middleware('auth');

Route::get('/manage_subcategories', 'StockController@manage_subcategories')->middleware('auth');
Route::get('/filter_subcategory', 'StockController@filter_subcategory')->middleware('auth');
Route::get('/add_subcategory', 'StockController@add_subcategory')->middleware('auth');
Route::post('/save_subcategory', 'StockController@save_subcategory')->middleware('auth');
Route::get('/edit_subcategory/{id}', 'StockController@edit_subcategory')->middleware('auth');
Route::post('/update_subcategory', 'StockController@update_subcategory')->middleware('auth');
Route::get('/delete_subcategory/{id}', 'StockController@delete_subcategory')->middleware('auth');

Route::get('/manage_items', 'StockController@manage_items')->middleware('auth');
Route::get('/filter_item', 'StockController@filter_item')->middleware('auth');
Route::get('/add_item', 'StockController@add_item')->middleware('auth');
Route::post('/save_item', 'StockController@save_item')->middleware('auth');
Route::get('/edit_item/{id}', 'StockController@edit_item')->middleware('auth');
Route::post('/update_item', 'StockController@update_item')->middleware('auth');
Route::get('/delete_item/{id}', 'StockController@delete_item')->middleware('auth');

Route::get('/manage_products', 'StockController@manage_products')->middleware('auth');
Route::get('/filter_products', 'StockController@filter_products')->middleware('auth');
Route::get('/ajax_subcategories/{id}', 'StockController@ajax_subcategories')->middleware('auth');
Route::get('/ajax_items/{id}', 'StockController@ajax_items')->middleware('auth');
Route::get('/add_product', 'StockController@add_product')->middleware('auth');
Route::post('/save_product', 'StockController@save_product')->middleware('auth');
Route::get('/edit_product/{id}', 'StockController@edit_product')->middleware('auth');
Route::post('/update_product', 'StockController@update_product')->middleware('auth');
Route::get('/delete_product/{id}', 'StockController@delete_product')->middleware('auth');

Route::get('/manage_catalogs', 'CatalogController@manage_catalogs')->middleware('auth');
Route::get('/add_catalog', 'CatalogController@add_catalog')->middleware('auth');
Route::post('/save_catalog', 'CatalogController@save_catalog')->middleware('auth');
Route::get('/edit_catalog/{id}', 'CatalogController@edit_catalog')->middleware('auth');
Route::get('/view_catalog/{id}', 'CatalogController@view_catalog')->middleware('auth');
Route::post('/update_catalog', 'CatalogController@update_catalog')->middleware('auth');
Route::get('/delete_catalog/{id}', 'CatalogController@delete_catalog')->middleware('auth');

Route::get('/manage_awards', 'AwardController@manage_awards')->middleware('auth');
Route::get('/add_award', 'AwardController@add_award')->middleware('auth');
Route::post('/save_award', 'AwardController@save_award')->middleware('auth');
Route::get('/edit_award/{id}', 'AwardController@edit_award')->middleware('auth');
Route::get('/view_award/{id}', 'AwardController@view_award')->middleware('auth');
Route::post('/update_award', 'AwardController@update_award')->middleware('auth');
Route::get('/delete_award/{id}', 'AwardController@delete_award')->middleware('auth');

Route::get('/add_featured', 'FeaturedSlider@brands_index')->middleware('auth');
Route::post('/save_featured', 'FeaturedSlider@store')->middleware('auth');
Route::get('/manage_featured', 'FeaturedSlider@manage_featured')->middleware('auth');
Route::get('/edit_featured/{id}', 'FeaturedSlider@edit')->middleware('auth');
Route::post('/update_featured', 'FeaturedSlider@update_featured')->middleware('auth');
Route::get('/delete_featured/{id}', 'FeaturedSlider@destroy')->middleware('auth');

Route::get('/add_divison', 'DivisionController@index')->middleware('auth');
Route::post('/save_divison', 'DivisionController@store')->middleware('auth');

Route::get('/add_district', 'DistrctsContoller@index')->middleware('auth');
Route::post('/save_district', 'DistrctsContoller@store')->middleware('auth');


Route::get('/add_upazila', 'UpazilasContoller@index')->middleware('auth');
Route::get('/all_upazila', 'UpazilasContoller@all_upazila')->middleware('auth');
Route::post('/save_upazila', 'UpazilasContoller@store')->middleware('auth');
Route::get('/delete_upazila/{id}', 'UpazilasContoller@destroy')->middleware('auth');
Route::get('/edit_upazila/{id}', 'UpazilasContoller@edit_upazila')->middleware('auth');
Route::post('/update_upazila', 'UpazilasContoller@update_upazila')->middleware('auth');

Route::get('/add_outlets', 'OutletsContoller@index')->middleware('auth');
Route::get('/list_outlet', 'OutletsContoller@outlet_view')->middleware('auth');
Route::get('/delete_outlet/{id}', 'OutletsContoller@destroy')->middleware('auth');
Route::get('/edit_outlets/{id}', 'OutletsContoller@edit')->middleware('auth');
Route::post('/save_outlet', 'OutletsContoller@store')->middleware('auth');
Route::post('/update_outlet', 'OutletsContoller@update')->middleware('auth');

Route::post('/update_outlet', 'OutletsContoller@update')->middleware('auth');

Route::get('/address', 'AddressController@index')->middleware('auth');
Route::get('/add_address', 'AddressController@create')->middleware('auth');
Route::post('/save_address', 'AddressController@store')->middleware('auth');
Route::get('/edit_address/{id}', 'AddressController@edit')->middleware('auth');
Route::post('/update_address', 'AddressController@update')->middleware('auth');
Route::get('/delete_address/{id}', 'AddressController@destroy')->middleware('auth');

Route::get('/socialmedia', 'SocialController@index')->middleware('auth');
Route::post('/save_social', 'SocialController@store')->middleware('auth');
Route::get('/list_social', 'SocialController@list')->middleware('auth');
Route::get('/edit_social/{id}', 'SocialController@edit')->middleware('auth');
Route::post('/social_update', 'SocialController@update')->middleware('auth');
Route::get('/delete_social/{id}', 'SocialController@destroy')->middleware('auth');

Route::get('/all_mail', 'MailController@index')->middleware('auth');


Route::get('/productsortinglist', function(){
    
    $type = request()->query('type');
    $filter_products = DB::select(DB::raw("SELECT * FROM products WHERE product_attribute = '$type'  AND product_status = 'active' ORDER BY product_id ASC"));

    // return Response::json($districts);
    return $filter_products;
});



Route::get('/districts', function(){
    
    $division_id = request()->query('division_id');
    $districts = App\District::where('division_id', '=', $division_id)->get();
    
    // return Response::json($districts);
    return $districts;
});

Route::get('/upazilas', function(){
    
    $district_id = request()->query('district_id');
    $upazilas = App\Upazilas::where('district_id', '=', $district_id)->get();
    
    // return Response::json($districts);
    return $upazilas;
});



Route::get('/outlets_bestbuy', function(){
    
    $upazila_id = request()->query('upazila_id');
    $outlets_list = App\Outlet::where([
        'upazila_id' => $upazila_id,
        'outlet_category' => 'bestbuy',
    ])->orderBy('name')->get();
    
    // return Response::json($districts);
    return $outlets_list;
});

Route::get('/outlets_exclusive', function(){
    
    $upazila_id = request()->query('upazila_id');
    $outlets_list = App\Outlet::where([
        'upazila_id' => $upazila_id,
        'outlet_category' => 'exclusive',
    ])->orderBy('name')->get();
    
    // return Response::json($districts);
    return $outlets_list;
});
Route::get('/outlets_carniva', function(){
    
    $upazila_id = request()->query('upazila_id');
    $outlets_list = App\Outlet::where([
        'upazila_id' => $upazila_id,
        'outlet_category' => 'carniva',
    ])->orderBy('name')->get();
    
    // return Response::json($districts);
    return $outlets_list;
});



Route::get('/outlets_list_default', function(){
    $outlets_list = App\Outlet::where([
        'upazila_id' => 1,
        'outlet_category' => 'bestbuy',
    ])->orderBy('name')->take(5)->get();
    
    // return Response::json($districts);
    return $outlets_list;
});


Route::get('/outlets_exclusive_default', function(){
    $outlets_list = App\Outlet::where([
        'upazila_id' => 2,
        'outlet_category' => 'exclusive',
    ])->orderBy('name')->take(5)->get();
    
    // return Response::json($districts);
    return $outlets_list;
});

Route::get('/outlets_carniva_default', function(){
    $outlets_list = App\Outlet::where([
        'upazila_id' => 2,
        'outlet_category' => 'carniva',
    ])->orderBy('name')->take(5)->get();
    
    // return Response::json($districts);
    return $outlets_list;
});

Route::get('/add_sticky', 'StockyContentController@index')->middleware('auth');
Route::post('/save_sticky', 'StockyContentController@store')->middleware('auth');
Route::get('/list_sticky', 'StockyContentController@show')->middleware('auth');
Route::get('/delete_sitcky/{id}', 'StockyContentController@destroy')->middleware('auth');
Route::get('/edit_sticky/{id}', 'StockyContentController@edit')->middleware('auth');
Route::post('/update_sticky', 'StockyContentController@update')->middleware('auth');

Route::get('/add_popup_image', 'PopupController@index')->middleware('auth');
Route::get('/manage_popup_image', 'PopupController@view')->middleware('auth');
Route::post('/create_popup_image', 'PopupController@store')->middleware('auth');
Route::post('/create_popup_image', 'PopupController@store')->middleware('auth');
Route::get('/delete_popup/{id}', 'PopupController@destroy')->middleware('auth');
Route::get('/edit_popup_image/{id}', 'PopupController@edit')->middleware('auth');
Route::post('/update_popup_image', 'PopupController@update')->middleware('auth');