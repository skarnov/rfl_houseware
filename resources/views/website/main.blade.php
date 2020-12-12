<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="RFL Houseware">
        <meta name="keywords" content="RFL Houseware">
        <meta name="author" content="RFL Houseware">
        <title>{{ $settings['project_name']?? '' }}</title>
        <link rel="icon" href="{{ URL('/assets/favicon.ico') }}" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/animate.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/lightcase.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/swiper.min.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/style.css?ver=1.0.0') }}">
        <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5efc43f86e69f70012dc1283&product=inline-share-buttons&cms=sop' async='async'></script>
    </head>

    <body id="top-page">
        <script>
            var jQ = new Array();
        </script>
        <div class="outlet-area">
            <div class="rfl-outlet-title">
                <h2>RFL-Outlets</h2>
            </div>
            <div class="rfl-outlet-content">
                <a href="{{ URL('/bestbuyoutlets') }}" class="rfl-outlet-item">
                    <img src="{{ URL('/assets/frontend/images/rfl-outlet/best-buy.png') }}" alt="RFL Outlet">
                    <span>RFL Bestbuy</span>
                </a>

                <a href="{{ URL('/exclusiveoutlets') }}" target="b_blank" class="rfl-outlet-item">
                    <img src="{{ URL('/assets/frontend/images/rfl-outlet/rfl.png') }}" alt="RFL Outlet">
                    <span>RFL Exclusive</span>
                </a>

                <a href="{{ URL('/carnivaoutlets') }}" target="b_blank" class="rfl-outlet-item">
                    <img src="{{ URL('/assets/frontend/images/rfl-outlet/carniva.png') }}" alt="RFL Outlet">
                    <span>RFL Carniva</span>
                </a>
            </div>
        </div>
        @if( isset($sitcky) && !$sitcky->isEmpty() )
        <div class="mar-container short">
            <div class="mar-block animate">
                @foreach($sitcky as $main )
                 {{ $main->text}}
                @endforeach
            </div>
        </div>
        @endif

        <!-- mobile-menu-start -->
        <div class="mobile-menu-container d-lg-none">
            <div class="mobile-menu-header d-flex justify-content-between align-items-center">
                <div class="logo">
                     <a class="navbar-brand" href="{{ URL('/') }}"><img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $logo[1]->image_value }}" alt="{{ $settings['project_name']??'' }}"></a>
                </div>
              <!---  <div class="global"><a target="b_blank" href="http://global.rflhouseware.com"><img src="{{ URL('/assets/frontend/images/globe.gif') }}" alt="globe"></a></div> !--->
                <div class="close-btn">
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div class="mobile-menu-wrapper">
                <div class="mobile-search">
                    <form method="GET" action="{{url('/product_search')}}">
                        <input type="text" name="search_text" value="@isset($search_text){{$search_text}}@endif" placeholder="search here">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu">
                    <ul class="nav-menu d-lg-flex flex-wrap list-unstyled mr_lg--20  mb-0 justify-content-center">
                        <li class="nav-item active"><a href="{{ URL('/') }}">Home</a></li>
                        <li class="nav-item mobile-dropdown"><a href="javascript:;">About</a>
                            <ul class="mobile-submenu">
                                <li><a href="{{ URL('/about') }}">About Us</a></li>
                                <li><a href="{{ URL('/our-brands') }}">Our Brands</a></li>
                                <li><a href="{{ URL('/global-presence') }}">Global Presence</a></li>
                                <li><a href="{{ URL('/quality-compliance') }}">Quality & Compliance</a></li>
                                <li><a href="{{ URL('/factories') }}">Factories</a></li>
                                <li><a href="{{ URL('/achievements') }}">Achievements</a></li>
                                <li><a href="{{ URL('/contact') }}">Contact</a></li>
                                <li><a href="{{ URL('/FAQ') }}">FAQs</a></li>
                                <li><a href="{{ URL('/partners') }}">Partners</a></li>
                            </ul>
                        </li>
                        <li class="nav-item mobile-dropdown"><a href="javascript:;">Product</a>
                            <?php
                            if(isset($all_categories)){
                            foreach ($all_categories as $key => $category) {
                                ?>
                                <ul class="mobile-submenu">
                                    <li class="mobile-dropdown"><a href="javascript:;"><?php echo $category->category_name ?></a>
                                        <ul class="mobile-submenu">
                                            <?php
                                            foreach ($all_subcategories as $subcategory) {
                                                if ($subcategory->fk_category_id == $category->category_id) {
                                                    ?>
                                                    <li class="mobile-dropdown">
                                                        <a href="#"><?php echo $subcategory->subcategory_name ?></a>
														<ul class="mobile-submenu">
																<?php
																foreach ($all_items as $item) {
																	if ($item->fk_item_id == $subcategory->category_id) {
																		?>
																		<li><a href="{{ URL('/item_listing/') }}/<?php echo $item->url_slug ?>"><?php echo $item->item_name ?></a></li>
																		<?php
																	}
																}
																?>
														</ul>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                                <?php
                            }
                            }
                            ?>
                        </li>
                        <li class="nav-item"><a href="{{ URL('/sustainability') }}">Sustainability</a></li>
                        <li class="nav-item mobile-dropdown"><a href="javascript:;">Media</a>
                            <ul class="mobile-submenu">
                                <li><a href="{{ URL('/news') }}">News</a></li>
                                <li><a href="{{ URL('/event') }}">Events</a></li>
                                <li class="mobile-dropdown"><a href="javascript:;">Gallery</a>
                                    <ul class="mobile-submneu">
                                        <li><a href="{{ URL('/photo') }}">Photos</a></li>
                                        <li><a href="{{ URL('/video') }}">Videos</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="{{ URL('/blog') }}">Blog</a></li>
                        <li class="nav-item mobile-dropdown"><a href="#">Outlets</a>
                            <ul class="mobile-submenu">
                                <li><a href="{{ URL('/bestbuyoutlets') }}" class="rfl-outlet-item">
                                   RFL Best Buy
                                </a></li>
                                <li><a href="{{ URL('/exclusiveoutlets') }}" class="rfl-outlet-item">
                                    RFL Carnival
                                </a></li>
                                <li><a href="{{ URL('/carnivaoutlets') }}" class="rfl-outlet-item">
                                    RFL Exclusive
                                </a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="share-area d-flex justify-content-center pt-4">
                        @foreach($social as $socials)
                            <a href="{{ $socials->website_url }}" target="b_blank"><i class="{{ $socials->icon_class }}"></i></a>
                        @endforeach
                    </div>
                </div>
                <div class="outlet-area-mm">
                    <div class="rfl-outlet-content-mm">
                       <a class="buy-online">Buy Online</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile-menu-end -->

        <!-- header section start -->
        <header class="header style2">
            <div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <ul class="site-info d-flex list-unstyled pl-0 mb-0">
                                <li><a href="#"><i class="fas fa-phone"></i>{{ $address[0]->phone }}</a></li>
                                <li><a href="#"><i class="far fa-envelope"></i>{{ $address[0]->email }}</a></li>
                            </ul>
                        </div> 
                        <div class="col-lg-6">
                            <ul class="social-media-list d-flex justify-content-center justify-content-lg-end m-0 p-0 list-unstyled">
                                @foreach($social as $socials)
                                    <li><a href="{{ $socials->website_url }}" target="b_blank"><i class="{{ $socials->icon_class }}"></i></a></li>
                                @endforeach
                            </ul>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- main menu area -->
            <div id="mainNav" class="axsis-main-menu-area animated">
                <div class="container">
                    <div class="row m-0 align-items-center mega">
                        <div class="col-lg-2 p-0 d-flex justify-content-between align-items-center">
                            <div class="logo">
                                <a class="navbar-brand" href="{{ URL('/') }}"><img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $logo[1]->image_value }}" alt="{{ $settings['project_name']??''}}"></a>
                            </div>
                            <div class="menu-bar d-lg-none">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="op-mobile-menu col-lg-10 d-none p-0 d-lg-flex align-items-center justify-content-end">
                            <div class="m-menu-header d-flex justify-content-between align-items-center d-lg-none">
                                <a href="{{ URL('/') }}" class="logo"><img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $logo[1]->image_value }}" alt="{{ $settings['project_name']??'' }}"></a>
                                <span class="close-button">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </div>
                            <form method="GET" action="{{url('/product_search')}}" class="search d-none d-lg-block">
                                <input type="text" name="search_text" value="@isset($search_text){{$search_text}}@endif" placeholder="Search Here">
                                <a class="search-close"><i class="fas fa-times"></i></a>
                            </form>
                            <ul class="nav-menu d-lg-flex flex-wrap list-unstyled mr_lg--20  mb-0 justify-content-center">
                                <li class="nav-item"><a href="{{ URL('/') }}">Home</a></li>

                                <li class="nav-item dropdown" id="about"><a href="{{ URL('/about') }}">About<i class="fas fa-caret-down"></i></a>
                                    <ul class="submenu list-unstyled pl-0 mb-0">
                                        <li><a href="{{ URL('/about') }}">About Us</a></li>
                                        <li><a href="{{ URL('/our-brands') }}">Our Brands</a></li>
                                        <li><a href="{{ URL('/global-presence') }}">Global Presence</a></li>
                                        <li><a href="{{ URL('/quality-compliance') }}">Quality & Compliance</a></li>
                                        <li><a href="{{ URL('/factories') }}">Factories</a></li>
                                        <li><a href="{{ URL('/achievements') }}">Achievements</a></li>
                                        <li><a href="{{ URL('/contact') }}">Contact</a></li>
                                        <li><a href="{{ URL('/FAQ') }}">FAQs</a></li>
                                        <li><a href="{{ URL('/partners') }}">Partners</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item mega-menu" id="product"><a href="javascript:;">Product<i class="fas fa-caret-down"></i></a>
                                    <div class="megamenu-contaier">
                                        <div class="mega-heading">
                                            <div class="nav justify-content-start" id="nav-tab" role="tablist">
                                                <?php
                                                foreach ($all_categories as $key => $category) {
                                                    ?>
                                                    <a class="<?php echo ($key == 0) ? 'active' : '' ?>" id="nav-mc<?php echo $category->category_id ?>-tab" data-toggle="tab" href="#nav-mc<?php echo $category->category_id ?>" role="tab" aria-controls="nav-mc<?php echo $category->category_id ?>" aria-selected="true"><?php echo $category->category_name ?></a>
                                                    <?php
                                                }
                                                ?>
                                                <a href="{{ URL('/catalog') }}">Catalog</a>
                                            </div>
                                        </div>
                                        <div class="mega-content">
                                            <div class="tab-content" id="nav-tabContent">
                                                <?php
                                                foreach ($all_categories as $key => $category) {
                                                    ?>
                                                    <div class="tab-pane fade <?php echo ($key == 0) ? 'show active' : '' ?>" id="nav-mc<?php echo $category->category_id ?>" role="tabpanel" aria-labelledby="nav-mc<?php echo $category->category_id ?>-tab">
                                                        <div class="row">
                                                            <?php
                                                            foreach ($all_subcategories as $subcategory) {
                                                                if ($subcategory->fk_category_id == $category->category_id) {
                                                                    ?>
                                                                    <div class="col-lg-3">
                                                                        <div class="mega-catagory-item">
                                                                            <h6><?php echo $subcategory->subcategory_name ?></h6>
                                                                            <ul class="list-unstyled pl-0">
                                                                                <?php
                                                                                foreach ($all_items as $item) {
                                                                                    if ($item->fk_item_id == $subcategory->category_id) {
                                                                                        ?>
                                                                                        <li><a href="{{ URL('/item_listing/') }}/<?php echo $item->url_slug ?>"><?php echo $item->item_name ?></a></li>
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </div>                                                        
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item" id="sustainability"><a href="{{ URL('/sustainability') }}">Sustainability</a></li>
                                <li class="nav-item dropdown" id="media_center"><a href="javascript:;">Media<i class="fas fa-caret-down"></i></a>
                                    <ul class="submenu list-unstyled pl-0 mb-0">
                                        <li><a href="{{ URL('/news') }}">News</a></li>
                                        <li><a href="{{ URL('/event') }}">Events</a></li>
                                        <li class="dropdown"><a href="javascript:;">Gallery<i class="fas fa-caret-down"></i></a>
                                            <ul class="submenu list-unstyled pl-0 mb-0">
                                                <li><a href="{{ URL('/photo') }}">Photos</a></li>
                                                <li><a href="{{ URL('/video') }}">Videos</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item" id="blog"><a href="{{ URL('/blog') }}">Blog</a></li>
                            </ul>
    						 <ul class="menu-action list-unstyled d-flex align-items-center">
                                <li class="search-option"><i class="fas fa-search"></i></li>
                          <!---      <li class="global"><a href="http://global.rflhouseware.com"  target="_blank"><img src="{{ URL('/assets/frontend/images/globe.gif') }}" alt="globe"></a></li> !---->
                                <li class="shop ml--20"><a class="shop-btn" href="https://othoba.com/rfl"  target="_blank"><span><i class="fas fa-shopping-cart"></i>Shop Online</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header section end -->

        {!! $content !!}

        <!-- footer-area start -->
        <footer class="footer-area">
            <div class="footer-main pt--60 pb--40">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-widget">
                                <h6 class="widget-title">Address</h6>
                                <div class="widge-wrapper">
                                    <address>
                                    {{ $address[0]->address }}
                                    </address>
                                    <ul class="list-unstyled pl-0">
                                        <li>{{ $address[0]->phone }}</li>
                                        <li>{{ $address[0]->email }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-widget">
                                <h6 class="widget-title">Products</h6>
                                <div class="widge-wrapper">
                                    <ul class="widget-links list-unstyled pl-0">
                                        <li><a href="{{ URL('/category_listing/') }}/household" id="households">Households</a></li>
                                        <li><a href="{{ URL('/category_listing/') }}/furniture" id="furniture">Furniture</a></li>
                                        <li><a href="{{ URL('/category_listing/') }}/industrial" id="industrial">Industrial</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-widget">
                                <h6 class="widget-title">Helps</h6>
                                <div class="widge-wrapper">
                                    <ul class="widget-links list-unstyled pl-0">
                                        <li><a href="{{ URL('/contact') }}" id="contact">Contact</a></li>
                                        <li><a href="{{ URL('/video') }}" id="media">Media</a></li>
                                        <li><a href="{{ URL('/sitemap') }}" id="sitemap">Sitemap</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="footer-widget">
                                <h6 class="widget-title">Quick Links</h6>
                                <div class="widge-wrapper">
                                    <ul class="widget-links list-unstyled pl-0">
                                        <li><a href="{{ URL('/privacy-policy') }}" id="privacy_policy">Privacy policy</a></li>
                                        <li><a href="{{ URL('/terms-of-use') }}" id="terms_of_use">Terms of use</a></li>
                                        <li><a href="{{ URL('/FAQ') }}" id="faq">FAQs</a></li>
                                        <li><a href="{{ URL('/bestbuyoutlets') }}" id="outlet">BestBuy</a></li>
                                        <li><a href="{{ URL('/exclusiveoutlets') }}" id="outlet">Exclusive</a></li>
                                        <li><a href="{{ URL('/carnivaoutlets') }}" id="outlet">Carniva</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container border-top">
                    <div class="row">
                        <div class="col-lg-6">
                            <p>Copyright &copy; {{ $settings['copyright_info'] ?? ''}}.</p>
                        </div>
                        <div class="col-lg-6">
                            <ul class="social-media-list d-flex justify-content-end m-0 p-0 list-unstyled">
                                @foreach($social as $socials)
                                    <li><a href="{{ $socials->website_url }}" target="b_blank"><i class="{{ $socials->icon_class }}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-area end -->
        <a href="#top-page" class="to-top"><span class="ti-angle-up"></span></a>

        <script src="{{ URL('/assets/frontend/js/jquery.min.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/swiper.min.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/waypoints.min.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/isotope.min.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/lightcase.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/wow.min.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/jquery-easeing.min.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/jquery.zoom.min.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/scroll-nav.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/product-display.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/simpleParallax.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/functions.js') }}"></script>
        <script>
            for (var i in jQ) {
                jQ[i]();
            }
            function subcategoryProducts(iD) {
                $.ajax({
                    type: 'GET',
                    url: "{{ URL('/listing_product_ajax') }}/" + iD,
                    success: function (data) {
                        $("#desireProducts").html(data);
                    }
                });
            }

            function productAttribute(type, id) {
                $.ajax({
                    type: 'GET',
                    url: "{{ URL('/product_sorting') }}/" + type + "/" + id,
                    success: function (data) {
                        $("#desireProducts").html(data);
                    }
                });
            }
        </script>
    </body>
</html>