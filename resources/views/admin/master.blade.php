<!DOCTYPE html>

<html lang="en">
    <head>
        <title>{{$title}}</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="description" content="3DEVs Admin Template">
        <meta name="author" content="3DEVs IT Ltd.">
        <!-- FAVICON -->
        <link rel="icon" href="{{ URL('/assets/favicon.ico') }}" type="image/x-icon">
        <!-- VENDOR CSS -->
        <link rel="stylesheet" href="{{ URL('/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/vendor/chartist/css/chartist.min.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/vendor/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/vendor/dropify/css/dropify.min.css') }}">

        <link rel="stylesheet" href="{{ URL('/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/vendor/multi-select/css/multi-select.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/vendor/summernote/summernote.css') }}">

        <!-- THEME CSS -->
        <link rel="stylesheet" href="{{ URL('/assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/css/color_skins.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/css/custom.css') }}">
    </head>

    <body class="theme-orange">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="{{ URL('/assets/images/logo_load.png') }}" width="48" height="48" alt="Admin Logo"></div>
                <p>Please wait...</p>        
            </div>
        </div>
        <script>
            var jQ = new Array();
        </script>
        <div id="wrapper">
            <nav class="navbar navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-btn">
                        <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                    </div>
                    <div class="navbar-brand">
                        <a href="{{ URL('/admin') }}"><img src="{{ URL('/assets/images/logo.png') }}" alt="Admin Logo" class="img-responsive logo"></a>                
                    </div>
                    <div class="navbar-right">
                        <div id="navbar-menu">
                            <ul class="nav navbar-nav">
                                <li><a href="javascript:;" class="logout icon-menu"><i class="icon-login"></i></a></li>                        
                            </ul>
                        </div> 
                    </div>
                </div>
            </nav>
            <div id="left-sidebar" class="sidebar">
                <div class="sidebar-scroll">
                    <div class="user-account">
<!--                        <img src="{{ URL('/assets/images/user.png') }}" class="rounded-circle user-photo" alt="User Profile Picture">-->
                        <div class="dropdown">
                            <span>Welcome,</span>
                            <a href="javascript:void(0);" class="user-name"><strong>{{ Auth::user()->name }}</strong></a>                    
<!--                            <ul class="dropdown-menu dropdown-menu-right account animated flipInY">
                                <li><a href="{{ URL::to('/admin/edit_admin/') }}/{{ Auth::user()->id }}"><i class="icon-user"></i>My Profile</a></li>
                                <li><a href="{{ URL::to('/settings') }}"><i class="icon-settings"></i>Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="javascript:;" class="logout"><i class="icon-power"></i>Logout</a></li>
                            </ul>-->
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <h6>{{ $categories_count }}</h6>
                                <small>Category</small>                        
                            </div>
                            <div class="col-4">
                                <h6>{{ $product_count }}</h6>
                                <small>Products</small>                        
                            </div>
                            <div class="col-4">                        
                                <h6>{{ $catalogs_count }}</h6>
                                <small>Catalogs</small>
                            </div>
                        </div>
                    </div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a id="product" class="nav-link" data-toggle="tab" href="#hr_menu">Product</a></li>
                        <li class="nav-item"><a id="content" class="nav-link" data-toggle="tab" href="#project_menu">Content</a></li>
                        <li class="nav-item"><a id="appSetting" class="nav-link" data-toggle="tab" href="#setting"><i class="icon-settings"></i></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content p-l-0 p-r-0">
                        <div class="tab-pane animated fadeIn active" id="hr_menu">
                            <nav class="sidebar-nav">
                                <ul class="main-menu metismenu">
                                    <li id="categoryArea">
                                        <a href="javascrpt:;" class="has-arrow" aria-expanded="true"><i class="icon-grid"></i><span>Manage Category</span></a>
                                        <ul>
                                            <li id="categoryList"><a href="{{ URL::to('/manage_categories') }}">Category List</a></li>
                                            <li id="addCategory"><a href="{{ URL::to('/add_category') }}">Add Category</a></li>
                                            <li id="subcategoryList"><a href="{{ URL::to('/manage_subcategories') }}">Subcategories List</a></li>
                                            <li id="addSubcategory"><a href="{{ URL::to('/add_subcategory') }}">Add Subcategory</a></li>
                                            <li id="itemList"><a href="{{ URL::to('/manage_items') }}">Items List</a></li>
                                            <li id="addItem"><a href="{{ URL::to('/add_item') }}">Add Item</a></li>
                                        </ul>
                                    </li>
                                    <li id="productArea">
                                        <a href="javascrpt:;" class="has-arrow"><i class="icon-briefcase"></i><span>Manage Products</span></a>
                                        <ul>
                                            <li id="productList"><a href="{{ URL::to('/manage_products') }}">Product List</a></li>
                                            <li id="addProduct"><a href="{{ URL::to('/add_product') }}">Add New Product</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="tab-pane animated fadeIn" id="project_menu">
                            <nav class="sidebar-nav">
                                <ul class="main-menu metismenu">
                                    <li id="listPages">
                                        <a href="javascrpt:;" class="has-arrow"><i class="icon-volume-2"></i><span>Pages</span></a>
                                        <ul>
                                            <li id="pages"><a href="{{ URL::to('/content') }}">Pages</a></li>
                                            <li id="innerpages"><a href="{{ URL::to('/manage_inner_pages') }}">Inner Pages</a></li>
                                            <li id="addfeatured"><a href="{{ URL::to('/add_featured') }}">Featured</a></li>
                                        </ul>
                                    </li>
                                    <li id="newsArea">
                                        <a href="javascrpt:;" class="has-arrow"><i class="icon-speech"></i><span>Manage News</span></a>
                                        <ul>
                                            <li id="newsList"><a href="{{ URL::to('/manage_news') }}">News List</a></li>
                                            <li id="addNews"><a href="{{ URL::to('/add_news') }}">Add News</a></li>
                                        </ul>
                                    </li>
                                    <li id="eventArea">
                                        <a href="javascrpt:;" class="has-arrow"><i class="icon-speech"></i><span>Manage Event</span></a>
                                        <ul>
                                            <li id="eventList"><a href="{{ URL::to('/manage_events') }}">Event List</a></li>
                                            <li id="addEvent"><a href="{{ URL::to('/add_event') }}">Add Event</a></li>
                                        </ul>
                                    </li>
                                    <li id="imageGallery">
                                        <a href="javascrpt:;" class="has-arrow"><i class="icon-camera"></i><span>Image Gallery</span></a>
                                        <ul>
                                            <li id="imageAlbumList"><a href="{{ URL::to('/manage_image_albums') }}">Album List</a></li>
                                            <li id="imageAlbum"><a href="{{ URL::to('/add_image_album') }}">Add Album</a></li>
                                            <li id="addImage"><a href="{{ URL::to('/add_image') }}">Add Image</a></li>
                                        </ul>
                                    </li>
                                    <li id="videoGallery">
                                        <a href="javascrpt:;" class="has-arrow"><i class="icon-camcorder"></i><span>Video Gallery</span></a>
                                        <ul>
                                            <li id="videoAlbumList"><a href="{{ URL::to('/manage_video_albums') }}">Album List</a></li>
                                            <li id="videoAlbum"><a href="{{ URL::to('/add_video_album') }}">Add Album</a></li>
                                            <li id="addVideo"><a href="{{ URL::to('/add_video') }}">Add Video</a></li>
                                        </ul>
                                    </li>
                                    <li id="awardArea">
                                        <a href="javascrpt:;" class="has-arrow"><i class="icon-doc"></i><span>Manage Awards</span></a>
                                        <ul>
                                            <li id="awardList"><a href="{{ URL::to('/manage_awards') }}">Awards List</a></li>
                                            <li id="addAward"><a href="{{ URL::to('/add_award') }}">Add Award</a></li>
                                        </ul>
                                    </li>
                                    <li id="offerArea">
                                        <a href="javascrpt:;" class="has-arrow"><i class="icon-volume-2"></i><span>Manage Offer</span></a>
                                        <ul>
                                            <li id="offerList"><a href="{{ URL::to('/manage_offers') }}">Offer List</a></li>
                                            <li id="addOffer"><a href="{{ URL::to('/add_offer') }}">Add Offer</a></li>
                                        </ul>
                                    </li>
                                    <li id="sliderArea">
                                        <a href="javascrpt:;" class="has-arrow"><i class="icon-star"></i><span>Manage Slider</span></a>
                                        <ul>
                                            <li id="sliderList"><a href="{{ URL::to('/manage_sliders') }}">Video Slider</a></li>
                                            <li id="sliderImage"><a href="{{ URL::to('/manage_image_sliders') }}">Image Slider</a></li>
                                        </ul>
                                    </li>
                                    <li id="blogArea">
                                        <a href="javascrpt:;" class="has-arrow"><i class="icon-speech"></i><span>Manage Blog</span></a>
                                        <ul>
                                            <li id="blogList"><a href="{{ URL::to('/manage_blogs') }}">Blog List</a></li>
                                            <li id="addBlog"><a href="{{ URL::to('/add_blog') }}">Add Blog</a></li>
                                        </ul>
                                    </li>
                                    <li id="storeArea">
                                        <a href="javascrpt:;" class="has-arrow"><i class="icon-graph"></i><span>Manage Stores</span></a>
                                        <ul>
                                            <li id="storeList"><a href="{{ URL::to('/manage_stores') }}">Stores List</a></li>
                                            <li id="addStore"><a href="{{ URL::to('/add_store') }}">Add Store</a></li>
                                        </ul>
                                    </li>
                                    <li id="catalogArea">
                                        <a href="javascrpt:;" class="has-arrow"><i class="icon-doc"></i><span>Manage Catalogs</span></a>
                                        <ul>
                                            <li id="catalogList"><a href="{{ URL::to('/manage_catalogs') }}">Catalogs List</a></li>
                                            <li id="addCatalog"><a href="{{ URL::to('/add_catalog') }}">Add Catalog</a></li>
                                        </ul>
                                    </li>
                                    <li id="outletarea">
                                        <a href="javascrpt:;" class="has-arrow"><i class="icon-briefcase"></i><span>Outlet</span></a>
                                        <ul>
                                            <li id="add_upazila"><a href="{{ URL::to('/add_upazila') }}">Upazila</a></li>
                                            <li id="list_outlet"><a href="{{ URL::to('/list_outlet') }}">List Outlet</a></li>
                                            <li id="add_outlets"><a href="{{ URL::to('/add_outlets') }}">Outlets</a></li>
                                        </ul>
                                    </li>   
                                    <li id="sticky">
                                        <a href="javascrpt:;" class="has-arrow"><i class="icon-briefcase"></i><span>Sticky Content</span></a>
                                        <ul>
                                            <li id="list_sticky"><a href="{{ URL::to('/list_sticky') }}">List Sticky Content</a></li>
                                            <li id="add_sticky"><a href="{{ URL::to('/add_sticky') }}">Add Sticky Content</a></li>
                                        </ul>
                                    </li> 
                                    <li id="popup">
                                        <a href="javascrpt:;" class="has-arrow"><i class="icon-briefcase"></i><span>Popup Image</span></a>
                                        <ul>
                                            <li id="add_popup"><a href="{{ URL::to('/edit_popup_image/4') }}">Edit Popup Image</a></li>
                                            <li id="list_popup"><a href="{{ URL::to('/manage_popup_image') }}">List Popup Image</a></li>
                                        </ul>
                                    </li> 
                                    <li id="Mail">
                                        <a href="{{ URL::to('/all_mail') }}"><i class="icon-briefcase"></i><span>e-Mail</span></a>
                                    </li> 
                                    <li id="address">
                                        <a href="{{ URL::to('/address') }}"><i class="icon-briefcase"></i><span>Address</span></a>
                                    </li> 
                                    <li id="SoicalMedia">
                                        <a href="javascrpt:;" class="has-arrow"><i class="icon-briefcase"></i><span>Social Media</span></a>
                                        <ul>
                                            <li id="add_social"><a href="{{ URL::to('/socialmedia') }}">Social Media</a></li>
                                            <li id="list_social"><a href="{{ URL::to('/list_social') }}">List Social</a></li>
                                        </ul>
                                    </li> 
                                </ul>
                            </nav>                    
                        </div>
                        <div class="tab-pane animated fadeIn" id="setting">
                            <nav class="sidebar-nav">
                                <ul class="main-menu metismenu">
                                    <li id="basicInfo"><a href="{{ URL::to('/settings') }}"><i class="icon-list"></i><span> Basic Info</span></a></li>                     
                                    <li id="AdminList"><a href="{{ URL::to('/manage_admins') }}"><i class="icon-user"></i><span> Manage Admins</span></a></li>        
                                    <li id="subscriptionList"><a href="{{ URL::to('/manage_subscriptions') }}"><i class="icon-envelope"></i><span> Manage Subscriptions</span></a></li>
                                </ul>                        
                            </nav>
                        </div>             
                    </div>          
                </div>
            </div>
            {!!$home!!}
        </div>
        <script src="{{ URL('/assets/bundles/libscripts.bundle.js') }}"></script>
        <script src="{{ URL('/assets/bundles/vendorscripts.bundle.js') }}"></script>
        <script src="{{ URL('/assets/bundles/chartist.bundle.js') }}"></script>
        <script src="{{ URL('/assets/bundles/knob.bundle.js') }}"></script>
        <script src="{{ URL('/assets/bundles/mainscripts.bundle.js') }}"></script>
        <script src="{{ URL('/assets/vendor/toastr/toastr.js') }}"></script>
        <script src="{{ URL('/assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
        <!-- Color Picker -->

        <script src="{{ URL('/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
        <script src="{{ URL('/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
        <script src="{{ URL('/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ URL('/assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
        <script src="{{ URL('/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
        <script src="{{ URL('/assets/vendor/summernote/summernote.js') }}"></script>

        <!-- Dropify -->
        <script src="{{ URL('/assets/vendor/dropify/js/dropify.min.js') }}"></script>
        <script src="{{ URL('/assets/js/pages/forms/dropify.js') }}"></script>
        <!-- Bootbox -->
        <script src="{{ URL('/assets/vendor/bootbox/bootbox.min.js') }}"></script>
        <script src="{{ URL('/assets/js/index.js') }}"></script>
        <!-- TinyMCE -->        
        <script src="{{ URL('/vendor/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
        <script>
            for (var i in jQ) {
                jQ[i]();
            }

            $('.logout').on("click", function () {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('logout') }}",
                    success: function ()
                    {
                        window.location.href = "{{ URL('/') }}";
                    }
                });
            });

            function findSubcategories(Id) {
                $.ajax({
                    url: "{{ URL('/ajax_subcategories/') }}/" + Id,
                    type: "GET",
                    success: function (data) {
                        $("#selectedSubcategories").html(data);
                    }
                });
            }

            function findSubcategoryItems(Id) {
                $.ajax({
                    url: "{{ URL('/ajax_items/') }}/" + Id,
                    type: "GET",
                    success: function (data) {
                        $("#selectedItems").html(data);
                    }
                });
            }
        </script>
    </body>
</html>