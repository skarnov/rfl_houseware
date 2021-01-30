<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="rfl - HTML Template">
        <meta name="keywords" content="rfl,template,technology">
        <meta name="author" content="rfl">
        <title>{{ $settings['project_name'] }}</title>
        <link rel="icon" href="{{ URL('/assets/favicon.ico') }}" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/animate.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/lightcase.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/swiper.min.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/style.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/slider.css') }}">
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
        @if( !$sitcky->isEmpty() )
        <div class="mar-container short">
            <div class="mar-block animate">
                @foreach($sitcky as $content )
                {{ $content->text}}
                @endforeach
            </div>
        </div>
        @endif

        <!-- mobile-menu-start -->
        <div class="mobile-menu-container d-lg-none">
            <div class="mobile-menu-header d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a class="navbar-brand" href="{{ URL('/') }}"><img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $logo[0]->image_value }}" alt="{{ $settings['project_name'] }}"></a>
                </div>
                @if(Request::getHost() == 'beta.rflhouseware.com')
                <div class="global"><a target="b_blank" href="https://global.rflhouseware.com"><img src="{{ URL('/assets/frontend/images/globe.gif') }}" alt="globe"></a></div>
                @endif
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
        <header class="header style3">
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
                                <a class="navbar-brand" href="{{ URL('/') }}"><img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $logo[0]->image_value }}" alt="{{ $settings['project_name'] }}"></a>
                            </div>
                            <div class="menu-bar d-lg-none">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="op-mobile-menu col-lg-10 d-none p-0 d-lg-flex align-items-center justify-content-end">
                            <div class="m-menu-header d-flex justify-content-between align-items-center d-lg-none">
                                <a href="{{ URL('/') }}" class="logo"><img src="{{ URL('/assets/frontend/images/logo.png') }}" alt="{{ $settings['project_name'] }}"></a>
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
                                <li class="nav-item active"><a href="{{ URL('/') }}">Home</a></li>

                                <li class="nav-item dropdown"><a href="{{ URL('/about') }}">About<i class="fas fa-caret-down"></i></a>
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

                                <li class="nav-item mega-menu"><a href="javascript:;">Product<i class="fas fa-caret-down"></i></a>
                                    <div class="megamenu-contaier">
                                        <div class="mega-heading">
                                            <div class="nav justify-content-start" id="mainNav-tab" role="tablist">
                                                <?php
                                                foreach ($all_categories as $key => $category) {
                                                    ?>
                                                    <a class="<?php echo ($key == 0) ? 'active' : '' ?>" id="mainNav-mc<?php echo $category->category_id ?>-tab" data-toggle="tab" href="#mainNav-mc<?php echo $category->category_id ?>" role="tab" aria-controls="mainNav-mc<?php echo $category->category_id ?>" aria-selected="true"><?php echo $category->category_name ?></a>
                                                    <?php
                                                }
                                                ?>
                                                <a href="{{ URL('/catalog') }}">Catalog</a>
                                            </div>
                                        </div>
                                        <div class="mega-content">
                                            <div class="tab-content" id="mainNav-tabContent">
                                                <?php
                                                foreach ($all_categories as $key => $category) {
                                                    ?>
                                                    <div class="tab-pane fade <?php echo ($key == 0) ? 'show active' : '' ?>" id="mainNav-mc<?php echo $category->category_id ?>" role="tabpanel" aria-labelledby="mainNav-mc<?php echo $category->category_id ?>-tab">
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
                                <li class="nav-item"><a href="{{ URL('/sustainability') }}">Sustainability</a></li>
                                <li class="nav-item dropdown"><a href="javascript:;">Media<i class="fas fa-caret-down"></i></a>
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
                                <li class="nav-item"><a href="{{ URL('/blog') }}">Blog</a></li>
                            </ul>
                            <ul class="menu-action list-unstyled d-flex align-items-center">
                                <li class="search-option"><i class="fas fa-search"></i></li>
                                @if(Request::getHost() == 'beta.rflhouseware.com')
                                <li class="global"><a href="https://global.rflhouseware.com" target="_blank"><img src="{{ URL('/assets/frontend/images/globe.gif') }}" alt="RFL Global"></a></li>
                                @endif
                                <li class="shop ml--20"><a class="shop-btn" href="https://othoba.com/rfl"  target="_blank"><span><i class="fas fa-shopping-cart"></i>Shop Online</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header section end -->

        <!-- banner-section start -->
        @if (isset($all_sliders->content_slug) == 'video-slider')
        <section class="banner-slider">
            <div class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="banner-section video-bg d-flex align-items-center">
                            <div class="video">
                                <video style="width:100%;" muted="" playsinline="" autoplay="" loop="">
                                    <source src="{{ URL::to('/uploads/') }}{{'/'}}{{ $all_sliders->featured_image }}" type="video/mp4">
                                </video>
                            </div>
                            <div class="container pt--80">
                                <div class="banner-content">
                                    <h2>{!! $all_sliders->additional_info !!}</h2>
                                    <p>{!! $all_sliders->content_description !!}</p>
                                    <a href="{!! $all_sliders->external_link !!}" class="banner-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @else
        <section class="banner-slider">
            <div id="rflSliderControl" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $i = 0 ?>
                    @foreach ($all_sliders as $slider)
                    <li data-target="#rflSliderControl" data-slide-to="<?php echo $i ?>"  <?php echo ($i == 0) ? 'class="active"' : '' ?>></li>
                    <?php $i++ ?>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    <?php $i = 0 ?>
                    @foreach ($all_sliders as $slider)
                    <div class="carousel-item  <?php echo ($i == 0) ? 'active' : '' ?>">
                        <div style="background-image: url('<?php echo '../uploads/' . $slider->featured_image ?>')" class="banner-section d-flex align-items-center">
                            <div class="container pt--80">
                                <div class="banner-content">
                                    <h2>{!! $slider->additional_info !!}</h2>
                                    <p>{!! $slider->content_description !!}</p>
                                    <a href="{!! $slider->external_link !!}" class="banner-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++ ?>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        <!-- banner-section end -->

        <!-- about rfl section start -->
        <section class="about-section pt--60 pb--60 pt_lg--120 pb_lg--120">
            <div class="container">
                <div class="section-header text-center mb--60 mb_lg--120">
                    <h6 class="sub-titletop">{{ $page_description->page_title }}</h6>
                    <h2 class="title"><span>{{ $page_description->page_subtitle }} <b>{{ $page_description->page_subtitle_bold }}</b></span></h2>
                    <p class="sub-title">{{ $page_description->page_description }}</p>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <?php $i = 1; ?>
                    @foreach ($home_tab as $value)
                    <div class="col-md-6 col-lg-3 <?php if ($i == 2 || $i == 3) echo 'translatetop50' ?>">
                        <div class="af-item text-center">
                            <div class="icon">
                                <img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $value->featured_image }}" alt="icon">
                            </div>
                            <h6>{{ $value->page_title}}</h6>
                            <p>{{ $value->page_description}}</p>
                            <a href="{{ $value->page_subtitle}}" class="af-btn">Read More</a>
                        </div>
                    </div>
                    <?php $i++ ?>
                    @endforeach
                </div>
            </div>
            <div class="container">
                <div class="about-image text-center">
                    <img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $page_description->featured_image }}" alt="about">
                </div>
            </div>
        </section>
        <!-- about rfl section end -->

        <!-- product-display-section start -->
        <section class="product-sliding-section pt--60 pb--60 pt_lg--100 pb_lg--100">
            <?php
            $i = 1;
            foreach ($featured_categories as $featured_category) {
                ?>
                <div class="container pt_lg--30 pb_lg--30">
                    <div class="product-sliding-container psc-<?php echo ($i % 2 == 0) ? 'right' : 'left' ?>">
                        <div class="swiper-wrapper">
                            <?php
                            foreach ($featured_sliders as $featured_slider) {
                                if ($featured_slider->content_subtitle == $featured_category->content_subtitle) {
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="psc-item">
                                            <div class="psc-thumb">
                                                <img src="{{ URL::to('/uploads') }}{{'/'}}{{ $featured_slider->featured_image }}" alt="psc">
                                            </div>
                                            <div class="psc-content">
                                                <div class="psc-content-inner">
                                                    <h6 class="catagory">{{ $featured_slider->content_subtitle }}</h6>
                                                    <h4>{!! $featured_slider->content_misc !!}</h4>
                                                    <p>{{ $featured_slider->content_description }}</p>
                                                    <a href="{{ $featured_slider->external_link }}" class="psc-btn">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="psc-controller">
                            <div class="swiper-pagination"></div>
                            <!-- Add Arrows -->
                            <div class="psc-button-next"><</div>
                            <div class="psc-button-prev">></div>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
            }
            ?>
        </section>
        <!-- product-display-section end -->

        <!-- product filter section start -->
        <section class="product-filter-section pt--120 pb--120" id="featuredItems">
            <div class="patarn-image1">
                <img src="{{ URL('/assets/frontend/images/pattern-image1.png') }}" alt="">
            </div>
            <div class="patarn-image2">
                <img src="{{ URL('/assets/frontend/images/pattern-image2.png') }}" alt="">
            </div>
            <div class="patarn-image3">
                <img src="{{ URL('/assets/frontend/images/pattern-image3.png') }}" alt="">
            </div>
            <div class="container">
                <div class="section-header text-center mb--70">
                    <h6 class="sub-titletop">{{ $product_section_one->page_title }}</h6>
                    <h2 class="title"><span>{{ $product_section_one->page_subtitle }} <b>{{ $product_section_one->page_subtitle_bold }}</b></span></h2>
                </div>
            </div>

            <div class="container">
                <ul class="product-filter-catagory list-unstyled pl-0 mb--40 d-flex flex-wrap justify-content-center">
                    <?php
                    foreach ($all_categories as $key => $category) {
                        ?>
                        <li class="productFilterArea" id="cat-<?php echo $category->category_id ?>" onclick="productAndCategory(<?php echo $category->category_id ?>);"><?php echo $category->category_name ?></li>
                        <?php
                    }
                    ?>
                </ul>
                <div class="filter-input-radio-group flex-wrap d-flex list-unstyled" id="desireCategories">
                    <?php
                    foreach ($featured_subcategories as $subcategory) {
                        ?>
                        <div class="filter-custom-radio">
                            <input type="radio" id="customRadioInline<?php echo $subcategory->category_id ?>" name="featured" onclick="subcategoryProducts(<?php echo $subcategory->category_id ?>)" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline<?php echo $subcategory->category_id ?>"><?php echo $subcategory->subcategory_name ?></label>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="filter-product-container mt--70">
                    <div class="swiper-wrapper" id="desireProducts">
                        @foreach ($featured_products as $product)
                        <div class="swiper-slide">
                            <div class="product-item">
                                <div class="product-thumb">
                                    <a href="{{ URL('/product_details/') }}/{{ $product->url_slug }}_{{ $product->product_id }}"><img src="{{ URL::to('/uploads') }}{{'/'}}{{ $product->product_image }}" alt="{{ $product->product_name }}"></a>
                                </div>
                                <div class="product-content">
                                    <h6 class="product-name"><a href="{{ URL('/product_details/') }}/{{ $product->url_slug }}_{{ $product->product_id }}">{{ $product->product_name }}</a></h6>
                                    <a href="{{ URL('/product_details/') }}/{{ $product->url_slug }}_{{ $product->product_id }}" class="product-btn">Details</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- pagination -->
                    <div class="swiper-pagination" id="desireProductPagination"></div>
                    
                </div>
            </div>
        </section>
        <!-- product filter section end -->

        <!-- download catalogue-section start -->
        <section class="download-catalogue-section pt--90 pb--90">
            <div class="dcs-content">
                <h4>{{ $catalog_info->page_title }}</h4>
                <p>{{ $catalog_info->page_subtitle }}</p>
                <a href="{{ URL('/catalog') }}" class="dcs-btn">Download Catalogue</a>
            </div>
        </section>
        <!-- download catalogue-section end -->

        <!-- latest-item-sections start -->
        <section class="latest-item-section pt--60 pb--60 pt_lg--100 pb_lg--100">
            <div class="container">
                <div class="section-header text-center mb--70">
                    <h6 class="sub-titletop">{{ $product_section_two->page_title }}</h6>
                    <h2 class="title"><span>{{ $product_section_two->page_subtitle }}<b>{{ $product_section_two->page_subtitle_bold }}</b></span></h2>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($new_products as $product)
                    <div class="col-md-6 col-lg-3">
                        <div class="product-item">
                            <div class="product-thumb">
                                <a href="{{ URL('/product_details/') }}/{{ $product->url_slug }}_{{ $product->product_id }}"><img src="{{ URL::to('/uploads') }}{{'/'}}{{ $product->product_image }}" alt="{{ $product->product_name }}"></a>
                            </div>
                            <div class="product-content">
                                <h6 class="product-name"><a href="{{ URL('/product_details/') }}/{{ $product->url_slug }}_{{ $product->product_id }}">{{ $product->product_name }}</a></h6>
                                <a href="{{ URL('/product_details/') }}/{{ $product->url_slug }}_{{ $product->product_id }}" class="product-btn">Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-12 text-center pt--10 pt_lg--60">
                        <a href="{{ $product_section_two->featured_image }}" class="view-more">View More</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- latest-item-sections end -->

        <!-- client-section start   -->
        <section class="client-section pt--60 pb--10 pt_lg--100 pb_lg--100">
            <div class="container text-center mb--30 mb_lg--60">
                <h3 class="section-title"><span>Awards</span></h3>
            </div>
            <div class="container">
                <div class="client-logo-container">
                    <div class="swiper-wrapper">
                        @foreach ($awards as $award)
                        <div class="swiper-slide">
                            <div class="client-item">
                                <a href="{{ URL('/achievements') }}"><img src="{{ URL::to('/uploads/files') }}{{'/'}}{{ $award->featured_image }}" alt="{{ $award->content_title }}"></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- client-section end  -->

        <!-- newsletter-section start -->
        <section id="newsletter" class="newsleter-section pt--60 pb--60 pt_lg--60 pb_lg--100">
            <div class="container">
                <div class="newsleter-container text-center">
                    <div class="newsletter-content mb--35">
                        <h4>Subscribe for ger exclusive news & offer</h4>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success mt-2">
                        {{ session('success') }}
                    </div>
                    @endif
                    <!-- Show Error -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- End of Show Error -->
                    <form method="POST" action="{{url('/save_newsletter')}}" class="newsletter-form">
                        @csrf
                        <input type="email" name="email" placeholder="Your Email">
                        <button>Subscribe</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- newsletter-section end -->

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
                                        <?php
                                        foreach ($all_categories as $key => $category) {
                                            ?>
                                            <li><a href="{{ URL('/category_listing/') }}/<?php echo strtolower($category->category_name) ?>" id="<?php echo strtolower($category->category_name) ?>" class="text-capitalize"><?php echo $category->category_name ?></a></li>
                                            <?php
                                        }
                                        ?>
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
                            <p>Copyright &copy; {{ $settings['copyright_info'] }}.</p>
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

        @if($popup_image->status == 'active')
        <div id="popup" class="popup" style="display: none">
            <div class="popup-overlay"></div>
            <div class="popup-wrapper">
                <div class="popupbox">
                    <a href="https://www.google.com/"><img src="{{ URL::to('/uploads/popup') }}{{'/'}}{{ $popup_image->image }}" alt="popup"></a>
                    <button class="popup-close"><img src="{{ URL('/assets/frontend/images/popup-close.png') }}" alt="popup-close"></button>
                </div>
            </div>
        </div>
        @endif

        <script src="{{ URL('/assets/frontend/js/jquery.min.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/swiper.min.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/waypoints.min.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/isotope.min.js') }}"></script>        
        <script src="{{ URL('/assets/frontend/js/lightcase.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/wow.min.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/jquery-easeing.min.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/scroll-nav.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/jquery.zoom.min.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/simpleParallax.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/functions.js') }}"></script>
        <script>
            for (var i in jQ) {
                jQ[i]();
            }

            function productAndCategory(iD) {
                $('.productFilterArea').removeClass('active');
                $("#cat-" + iD).addClass('active');

                $.ajax({
                    type: 'GET',
                    url: "{{ URL('/find_categories') }}/" + iD,
                    beforeSend: function () {
                        $("#desireCategories").html('<h3>Searching...</h3>');
                    },
                    success: function (data) {
                        $("#desireCategories").html(data);
                    }
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ URL('/find_products') }}/" + iD,
                    beforeSend: function () {
                        $("#desireCategories").html('<h3>Searching...</h3>');
                    },
                    success: function (data) {
                        if(!data){
                            $("#desireProducts").html('<h3>Not Found...</h3>');
                            $("#desireProductPagination").hide();
                        } else{
                            $("#desireProducts").html(data);
                            $("#desireProductPagination").show();
                        }
                    }
                });

                $('#mainNav-mc1-tab').click();
            }

            function subcategoryProducts(iD) {
                $.ajax({
                    type: 'GET',
                    url: "{{ URL('/subcategory_products') }}/" + iD,
                    success: function (data) {
                        $("#desireProducts").html(data);
                    }
                });
            }
        </script>
    </body>
</html>