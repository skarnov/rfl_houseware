<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SickyContent;
use App\District;
use App\Division;
use App\Outlet;
use App\Address;
use App\Social;

class HomeController extends Controller {

    /**
     * Resources
     * 001. Home
     * 002. Find Categories
     * 003. Find Products
     * 004. Find Subcategory Products
     * 005. Item Listing
     * 006. Product Details
     * 007. Product Sorting
     * 008. Product Search
     * 009. Newsletter
     * 010. Blog
     * 011. About
     * 012. Catalog
     * 013. Sustainability
     * 014. News
     * 015. Event
     * 016. Photo
     * 017. Video
     * 018. Sitemap
     * 019. Success
     * 020. Product Listing
     * 021. Store Locator
     */
    protected $data = [];

    public function __construct() {
        /* Grub Settings */
        $settings = DB::table('configurations')->get();
        $setting = array();
        foreach ($settings as $value) {
            $setting[$value->config_name] = $value->config_setting;
        }
        $this->data['settings'] = $setting;

        $all_categories = DB::table('categories')
                ->select('category_id', 'category_name', 'url_slug')
                ->where('fk_category_id', '0', '')
                ->where('category_status', 'active')
                ->orderBy('category_serial', 'ASC')
                ->get();
        $this->data['all_categories'] = $all_categories;

        $all_subcategories = DB::select(DB::raw("SELECT
                    L1.category_id,
                    L1.fk_category_id,
                    L1.category_name AS subcategory_name,
                    L1.url_slug AS url_slug
                FROM
                    categories AS L0 
                        LEFT JOIN categories AS L1 ON L0.category_id = L1.fk_category_id
                        LEFT JOIN categories AS L2 ON L1.category_id = L2.fk_category_id
                        LEFT JOIN categories AS L3 ON L2.category_id = L3.fk_category_id
                WHERE L0.fk_category_id = 0  AND L1.category_status = 'active' GROUP BY L1.category_name ORDER BY L1.category_serial ASC"));
        $this->data['all_subcategories'] = $all_subcategories;

        $all_items = DB::select(DB::raw("SELECT
                    L2.category_id AS pk_item_id,
                    L2.fk_category_id AS fk_item_id,
                    L2.category_name AS item_name,
                    L2.url_slug AS url_slug
                FROM
                    categories AS L0 
                        LEFT JOIN categories AS L1 ON L0.category_id = L1.fk_category_id
                        LEFT JOIN categories AS L2 ON L1.category_id = L2.fk_category_id
                        LEFT JOIN categories AS L3 ON L2.category_id = L3.fk_category_id
                WHERE L0.fk_category_id = 0 AND L2.category_status = 'active' ORDER BY L2.category_serial ASC"));
        $this->data['all_items'] = $all_items;
    }

    /* 001. Home */

    public function index() {
        $video_slider = DB::table('contents')
                ->where('content_slug', 'video-slider')
                ->where('content_status', 'active')
                ->first();

        if (!$video_slider):
            $all_sliders = DB::table('contents')
                    ->where('content_slug', 'slider')
                    ->where('content_status', 'active')
                    ->orderBy('content_serial', 'asc')
                    ->get();
        endif;

        $featured_categories = DB::table('contents')
                ->where('content_slug', 'featured-slider')
                ->where('content_status', 'active')
                ->orderBy('content_serial', 'ASC')
                ->groupBy('content_subtitle')
                ->get();

        $featured_sliders = DB::table('contents')
                ->where('content_status', 'active')
                ->where('content_slug', 'featured-slider')
                ->orderBy('content_serial', 'ASC')
                ->get();

        $first_category = $this->data['all_categories'][0]->category_id;

        $featured_products = DB::table('products')
                ->where('products.category_id', $first_category)
                ->where('products.product_attribute', 'featured')
                ->where('products.product_status', 'active')
                ->orderBy('products.product_id', 'DESC')
                ->get();

        $featured_subcategories = DB::select(DB::raw("SELECT
                    L1.category_id,
                    L1.fk_category_id,
                    L1.category_name AS subcategory_name,
                    L1.url_slug AS url_slug
                FROM
                    categories AS L0 
                        LEFT JOIN categories AS L1 ON L0.category_id = L1.fk_category_id
                        LEFT JOIN categories AS L2 ON L1.category_id = L2.fk_category_id
                        LEFT JOIN categories AS L3 ON L2.category_id = L3.fk_category_id
                WHERE L0.fk_category_id = 0 AND L1.fk_category_id = '$first_category' AND L1.category_status = 'active' GROUP BY L1.category_name ORDER BY L1.category_serial ASC"));

        $new_products = DB::select(DB::raw("SELECT
                    products.product_id, 
                    products.url_slug, 
                    products.product_image, 
                    products.product_name
                FROM
                    products
                    LEFT JOIN categories AS category ON category.category_id = products.category_id
                WHERE 
                products.product_attribute = 'new-arrival' AND
                products.product_status = 'active' AND 
                category.category_status = 'active'
                ORDER BY products.product_id DESC LIMIT 24"));

        $awards = DB::table('contents')
                ->orderBy('content_serial', 'ASC')
                ->where('content_slug', 'award')
                ->where('content_status', 'active')
                ->get();

        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();

        $popup = DB::table('popup_image')->select('*')
                ->orderByDesc('id')
                ->first();

        $data = array();
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['all_sliders'] = $video_slider ? $video_slider : $all_sliders;
        $data['new_products'] = $new_products;
        $data['awards'] = $awards;
        $data['featured_categories'] = $featured_categories;
        $data['featured_sliders'] = $featured_sliders;
        $data['featured_products'] = $featured_products;
        $data['featured_subcategories'] = $featured_subcategories;
        $data['sitcky'] = $sitcky;
        $data['popup_image'] = $popup;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['page_description'] = DB::table('page_attribute')->where('attribute_name', 'page-description')->first();
        $data['home_tab'] = DB::table('page_attribute')->where('attribute_name', 'home-tab')->get();
        $data['product_section_one'] = DB::table('page_attribute')->where('attribute_name', 'product-section-one')->first();
        $data['product_section_two'] = DB::table('page_attribute')->where('attribute_name', 'product-section-two')->first();
        return view('website/home', $data);
    }

    /* 002. Find Categories */

    public function find_categories($id) {
        $all_subcategories = DB::select(DB::raw("SELECT
                    L1.category_id,
                    L1.fk_category_id,
                    L1.category_name AS subcategory_name,
                    L1.url_slug AS url_slug
                FROM
                    categories AS L0 
                        LEFT JOIN categories AS L1 ON L0.category_id = L1.fk_category_id
                        LEFT JOIN categories AS L2 ON L1.category_id = L2.fk_category_id
                        LEFT JOIN categories AS L3 ON L2.category_id = L3.fk_category_id
                WHERE L0.fk_category_id = 0 AND L1.fk_category_id = '$id' AND L1.category_status = 'active' GROUP BY L1.category_name ORDER BY L1.category_serial ASC"));
        $data = array();
        $data['all_subcategories'] = $all_subcategories;
        echo view('website/find_categories', $data);
    }

    /* 003. Find Products */

    public function find_products($id) {
        $all_products = DB::table('products')
                ->where('category_id', $id)
                ->where('product_attribute', 'featured')
                ->where('product_status', 'active')
                ->orderBy('product_id', 'DESC')
                ->get();

        $data = array();
        $data['all_products'] = $all_products;
        echo view('website/find_products', $data);
    }

    /* 004. Find Subcategory Products */

    public function subcategory_products($id) {
        $all_products = DB::table('products')
                ->where('subcategory_id', $id)
                ->where('product_status', 'active')
                ->orderBy('product_id', 'DESC')
                ->get();
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['all_products'] = $all_products;
        $data['sitcky'] = $sitcky;
        echo view('website/find_products', $data);
    }

    /* 005. Item Listing */

    public function item_listing($item_slug) {
        $item_info = DB::table('categories')
                ->where('url_slug', $item_slug)
                ->first();

        $item_id = $item_info->category_id;

        $products = DB::table('products')
                ->where('item_id', $item_id)
                ->where('product_status', 'active')
                ->orderBy('product_id', 'DESC')
                ->paginate(12);

        $subcategory_id = DB::table('categories')->where('category_id', $item_id)->where('category_status', 'active')->first('fk_category_id')->fk_category_id;
        $subcategory_name = DB::table('categories')->where('category_id', $subcategory_id)->first('category_name')->category_name;

        $subcategory_info = DB::table('categories')->where('category_id', $subcategory_id)->first();
        $category_name = DB::table('categories')->where('category_id', $subcategory_info->fk_category_id)->first('category_name')->category_name;

        $related_category = DB::table('products')
                ->where('subcategory_id', $subcategory_id)
                ->where('product_status', 'active')
                ->whereNotIn('item_id', array($item_id))
                ->orderBy('product_id', 'DESC')
                ->limit(5)
                ->get();
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Products';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['item_info'] = $item_info;
        $data['all_products'] = $products;
        $data['category_name'] = $category_name;
        $data['subcategory_name'] = $subcategory_name;
        $data['item_name'] = $item_info->category_name;
        $data['item_id'] = $item_id;
        $data['item_slug'] = $item_slug;
        $data['related_category'] = $related_category;
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/product_listing', $data);
        return view('website/main', $data);
    }

    public function listing_product_ajax($id) {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $all_products = DB::table('products')
                ->where('subcategory_id', $id)
                ->where('product_status', 'active')
                ->orderBy('product_id', 'DESC')
                ->get();
        $data = array();
        $data['all_products'] = $all_products;
        $data['sitcky'] = $sitcky;
        echo view('website/listing_products', $data);
    }

    /* 006. Product Details */

    public function product_details($url_slug) {
        $product_id = explode('_', $url_slug)[1];

        $product_info = DB::table('products')
                ->where('product_id', $product_id)
                ->first();

        $category_name = DB::table('categories')->where('category_id', $product_info->category_id)->first('category_name')->category_name;
        $subcategory_name = DB::table('categories')->where('category_id', $product_info->subcategory_id)->first('category_name')->category_name;

        $related_products = DB::table('products')
                ->where('item_id', $product_info->item_id)
                ->where('product_status', 'active')
                ->whereNotIn('product_id', array($product_info->product_id))
                ->orderBy('product_id', 'DESC')
                ->limit(4)
                ->get();

        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();

        $data = array();
        $data['title'] = 'Product Details';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['product_info'] = $product_info;
        $data['category_name'] = $category_name;
        $data['subcategory_name'] = $subcategory_name;
        $additional_images = $data['product_info']->additional_images;
        $additional_image = json_decode($additional_images);
        $data['product_info']->additional_image = isset($additional_image->additional_image) ? $additional_image->additional_image : '';
        $data['product_info']->extra_image = isset($additional_image->extra_image) ? $additional_image->extra_image : '';
        $data['product_info']->supplementary_image = isset($additional_image->supplementary_image) ? $additional_image->supplementary_image : '';
        $data['product_info']->auxiliary_image = isset($additional_image->auxiliary_image) ? $additional_image->auxiliary_image : '';
        $data['product_info']->product_sizes = implode(',', json_decode($data['product_info']->product_sizes));
        $data['product_info']->product_colors = json_decode($data['product_info']->product_colors);
        $data['related_products'] = $related_products;
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/product_details', $data);
        return view('website/main', $data);
    }

    /* 007. Product Sorting */

    public function product_sorting() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $param = implode(',', $_GET['items']);
        $filter_products = DB::select(DB::raw("SELECT * FROM products WHERE item_id IN ($param) AND product_status = 'active' ORDER BY product_id ASC"));
        $data = array();
        $data['sitcky'] = $sitcky;
        $data['all_products'] = $filter_products;
        echo view('website/listing_products', $data);
    }

    /* 008. Product Search */

    public function product_search() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $search_text = filter_input(INPUT_GET, 'search_text');
        $search_text = preg_replace("/\s{2,}/", " ", $search_text);

        $products = DB::table('products')
                ->where('product_status', 'active')
                ->whereNotNull('category_id')
                ->whereNotNull('subcategory_id')
                ->whereNotNull('item_id')
                ->when($search_text, function ($query, $search_text) {
                    return $query->where('product_name', 'like', "%$search_text%");
                })
                ->orderBy('product_id', 'DESC')
                ->paginate(12);

        $data = array();
        $data['title'] = 'Products';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['search_text'] = $search_text;
        $data['all_products'] = $products;
        $data['subcategory_name'] = 'Product Search';
        $data['item_slug'] = 'Product Search';
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/product_search', $data);
        return view('website/main', $data);
    }

    /* 009. Newsletter */

    public function save_newsletter(Request $request) {
        request()->validate([
            'email' => 'required|email|unique:newsletters',
        ]);
        $data = array();
        $data['email'] = $request->input('email');
        $data['create_time'] = current_time();
        $data['create_date'] = current_date();
        DB::table('newsletters')->insert($data);
        return redirect('/#newsletter')->with('success', 'Thanks For Subscribe!');
    }

    /* 010. Blog */

    public function blog() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();

        $data = array();
        $data['title'] = 'Blog';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['all_blogs'] = DB::table('contents')->where('content_slug', 'blog')->where('content_status', 'active')->orderBy('content_serial', 'ASC')->paginate(10);
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/blog', $data);
        return view('website/main', $data);
    }

    public function blog_details($blog_id) {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Blog Details';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['all_blogs'] = DB::table('contents')->where('content_slug', 'blog')->limit(10)->get();
        $data['blog_info'] = DB::table('contents')->where('content_slug', 'blog')->where('content_id', $blog_id)->first();
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/blog_details', $data);
        return view('website/main', $data);
    }

    /* 011. About */

    public function about() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'About';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['page_info'] = DB::table('pages')->where('page_slug', 'about')->first();
        $data['content'] = view('website/about', $data);
        return view('website/main', $data);
    }

    public function our_brands() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Our Brands';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['page_info'] = DB::table('pages')->where('page_slug', 'our-brands')->first();
        $data['featured_image'] = DB::table('featured_slider')->where('pages', 'our-brands')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/our_brands', $data);
        return view('website/main', $data);
    }

    public function global_presence() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Global Presence';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['page_info'] = DB::table('pages')->where('page_slug', 'global-presence')->first();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/global_presence', $data);
        return view('website/main', $data);
    }

    public function quality_compliance() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Quality Compliance';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['page_info'] = DB::table('pages')->where('page_slug', 'quality-compliance')->first();
        $data['content'] = view('website/quality_compliance', $data);
        return view('website/main', $data);
    }

    public function factories() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Factories';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['page_info'] = DB::table('pages')->where('page_slug', 'factories')->first();
        $data['content'] = view('website/factories', $data);
        return view('website/main', $data);
    }

    public function achievements() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Achievements';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['page_info'] = DB::table('pages')->where('page_slug', 'achievements')->first();
        $data['content'] = view('website/achievements', $data);
        return view('website/main', $data);
    }

    public function contact() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Contact';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['sitcky'] = $sitcky;
        $data['social'] = Social::select('*')->get();
        $data['address'] = Address::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['page_info'] = DB::table('pages')->where('page_slug', 'contact')->first();
        $data['country'] = DB::table('country')
                ->where('status', 'Active')
                ->get();
        $data['categories'] = DB::table('categories')
                ->where('category_status', 'active')
                ->where('fk_category_id', 0)
                ->get();
        $data['content'] = view('website/contact', $data);
        return view('website/main', $data);
    }

    public function faq() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'FAQ';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['page_info'] = DB::table('pages')->where('page_slug', 'faq')->first();
        $data['content'] = view('website/FAQ', $data);
        return view('website/main', $data);
    }

    public function partners() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Partners';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['featured_image'] = DB::table('featured_slider')->where('pages', 'partners')->get();
        $data['page_info'] = DB::table('pages')->where('page_slug', 'partners')->first();
        $data['content'] = view('website/partners', $data);
        return view('website/main', $data);
    }

    public function terms_of_use() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Terms of Use';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/terms_of_use', $data);
        return view('website/main', $data);
    }

    public function privacy_policy() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Privacy Policy';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/privacy_policy', $data);
        return view('website/main', $data);
    }

    /* 012. Catalog */

    public function catalog() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Catalog';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['all_catalogs'] = DB::table('contents')->where('content_slug', 'catalog')->paginate(16);
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/catalog', $data);
        return view('website/main', $data);
    }

    /* 013. Sustainability */

    public function sustainability() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Catalog';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        return view('website/sustainability', $data);
    }

    /* 014. News */

    public function news() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'News';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['all_news'] = DB::table('contents')->where('content_slug', 'news')->where('content_status', 'active')->orderBy('content_serial', 'ASC')->paginate(10);
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/news', $data);
        return view('website/main', $data);
    }

    public function news_details($news_id) {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'News Details';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['all_news'] = DB::table('contents')->where('content_slug', 'news')->limit(10)->get();
        $data['news_info'] = DB::table('contents')->where('content_slug', 'news')->where('content_id', $news_id)->first();
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/news_details', $data);
        return view('website/main', $data);
    }

    /* 015. Event */

    public function event() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Event';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['all_events'] = DB::table('contents')->where('content_slug', 'event')->where('content_status', 'active')->orderBy('content_serial', 'ASC')->paginate(10);
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/event', $data);
        return view('website/main', $data);
    }

    public function event_details($event_id) {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Event Details';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['all_events'] = DB::table('contents')->where('content_slug', 'event')->limit(10)->get();
        $data['event_info'] = DB::table('contents')->where('content_slug', 'event')->where('content_id', $event_id)->first();
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/event_details', $data);
        return view('website/main', $data);
    }

    /* 016. Photo */

    public function photo_album() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $photo_album = DB::table('contents')
                ->select('content_id', 'content_title', 'featured_image')
                ->where('fk_content_id', '=', 0)
                ->where('content_slug', 'image-album')
                ->where('content_status', 'active')
                ->orderBy('content_serial', 'ASC')
                ->get();

        $data = array();
        $data['title'] = 'Photo Album';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['all_album'] = $photo_album;
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/photo_album', $data);
        return view('website/main', $data);
    }

    public function image_gallery($album_id) {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $image_gallery = DB::table('contents')
                ->where('fk_content_id', $album_id)
                ->get();

        $image_album = DB::table('contents')
                ->select('content_title')
                ->where('content_id', $album_id)
                ->first();

        $data = array();
        $data['title'] = 'Image Gallery';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['image_album'] = $image_album;
        $data['image_gallery'] = $image_gallery;
        $data['sitcky'] = $sitcky;
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/image_gallery', $data);
        return view('website/main', $data);
    }

    /* 017. Video */

    public function video_album() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $video_album = DB::table('contents')
                ->select('content_id', 'content_title', 'featured_image')
                ->where('fk_content_id', '=', 0)
                ->where('content_slug', 'video-album')
                ->where('content_status', 'active')
                ->orderBy('content_id', 'DESC')
                ->get();

        $data = array();
        $data['title'] = 'Video Album';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['all_album'] = $video_album;
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/video_album', $data);
        return view('website/main', $data);
    }

    public function video_gallery($album_id) {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $video_gallery = DB::table('contents')
                ->where('fk_content_id', $album_id)
                ->get();

        $video_album = DB::table('contents')
                ->select('content_title')
                ->where('content_id', $album_id)
                ->where('content_status', 'active')
                ->orderBy('content_id', 'DESC')
                ->first();

        $data = array();
        $data['title'] = 'Video Gallery';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['video_album'] = $video_album;
        $data['video_gallery'] = $video_gallery;
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/video_gallery', $data);
        return view('website/main', $data);
    }

    /* 018. Sitemap */

    public function sitemap() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Sitemap';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['sitcky'] = $sitcky;
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['address'] = Address::select('*')->get();
        $data['content'] = view('website/sitemap', $data);
        return view('website/main', $data);
    }

    /* 019. Success */

    public function success() {
        $data = array();
        $data['title'] = 'Success';
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['sitcky'] = $sitcky;
        $data['address'] = Address::select('*')->get();
        $data['social'] = Social::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/success', $data);
        return view('website/main', $data);
    }

    /* 020. Product Listing */

    public function category_listing($category_slug) {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $category_info = DB::table('categories')
                ->where('url_slug', $category_slug)
                ->first();

        $category_id = $category_info->category_id;

        $products = DB::table('products')
                ->where('category_id', $category_id)
                ->where('product_status', 'active')
                ->orderBy('product_id', 'DESC')
                ->paginate(12);

        $related_category = DB::table('products')
                ->where('category_id', $category_id)
                ->where('product_status', 'active')
                ->orderBy('product_id', 'DESC')
                ->limit(5)
                ->get();

        $data = array();
        $data['title'] = 'Products';
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['item_info'] = $category_info;
        $data['all_products'] = $products;
        $data['category_name'] = $category_info->category_name;
        $data['subcategory_name'] = 'Main Category';
        $data['item_name'] = 'Sub Category';
        $data['item_id'] = $category_id;
        $data['item_slug'] = $category_slug;
        $data['related_category'] = $related_category;
        $data['sitcky'] = $sitcky;
        $data['social'] = Social::select('*')->get();
        $data['address'] = Address::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/product_listing', $data);
        return view('website/main', $data);
    }

    public function bestbuy() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Storelocator';
        $data['divisions'] = Division::all();
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['sitcky'] = $sitcky;
        $data['social'] = Social::select('*')->get();
        $data['address'] = Address::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/bestbuy', $data);
        return view('website/main', $data);
    }

    public function exclusive() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Exclusive';
        $data['divisions'] = Division::all();
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['sitcky'] = $sitcky;
        $data['social'] = Social::select('*')->get();
        $data['address'] = Address::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/exclusive', $data);
        return view('website/main', $data);
    }

    public function carniva() {
        $sitcky = DB::table('sticky_content_footer')
                ->where('status', 'on')
                ->get();
        $data = array();
        $data['title'] = 'Carniva';
        $data['divisions'] = Division::all();
        $data['settings'] = $this->data['settings'];
        $data['all_categories'] = $this->data['all_categories'];
        $data['all_subcategories'] = $this->data['all_subcategories'];
        $data['all_items'] = $this->data['all_items'];
        $data['sitcky'] = $sitcky;
        $data['social'] = Social::select('*')->get();
        $data['address'] = Address::select('*')->get();
        $data['logo'] = DB::table('image_configurations')->get();
        $data['content'] = view('website/carniva', $data);
        return view('website/main', $data);
    }

    public function product_sort($type, $id) {
        echo $type;
    }

}
