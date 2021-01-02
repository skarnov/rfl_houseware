<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="rfl - HTML Template">
        <meta name="keywords" content="rfl,template,technology">
        <meta name="author" content="rfl">
        <title>RFL Houseware</title>
        <link rel="icon" href="{{ URL('/assets/favicon.ico') }}" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/animate.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/lightcase.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/swiper.min.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/style.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/css/sustainability.css') }}">
    </head>

    <body id="top-page" class="sustainability">
        <div class="mobile-menu-container d-lg-none">
            <div class="mobile-menu-header d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a class="navbar-brand" href="{{ URL('/') }}"><img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $logo[1]->image_value }}" alt="RFL Logo"></a>
                </div>
                <div class="global"><a href="global.rflhouseware.com"><img src="{{ URL('/assets/frontend/images/globe.gif') }}" alt="Globel RFL"></a></div>
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
                            if (isset($all_categories)) {
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
                    </ul>
                </div>
            </div>
            <div class="outlet-area-mm">
                <div class="rfl-outlet-content-mm">
                    <a href="{{ URL('/bestbuyoutlets') }}" class="rfl-outlet-item">
                        <img src="{{ URL('/assets/frontend/images/rfl-outlet/best-buy.png') }}" alt="outlet">
                    </a>
                    <a href="{{ URL('/exclusiveoutlets') }}" class="rfl-outlet-item">
                        <img src="{{ URL('/assets/frontend/images/rfl-outlet/rfl.png') }}" alt="outlet">
                    </a>
                    <a href="{{ URL('/carnivaoutlets') }}" class="rfl-outlet-item">
                        <img src="{{ URL('/assets/frontend/images/rfl-outlet/carniva.png') }}" alt="outlet">
                    </a>
                </div>
            </div>
        </div>

        <!-- header section start -->
        <header class="header style2">
            <!-- main menu area -->
            <div id="mainNav" class="axsis-main-menu-area animated">
                <div class="container">
                    <div class="row m-0 align-items-center mega">
                        <div class="col-lg-2 p-0 d-flex justify-content-between align-items-center">
                            <div class="logo">
                                <a class="navbar-brand" href="{{ URL('/') }}"><img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $logo[1]->image_value }}" alt="{{ $settings['project_name']??'' }}"></a>
                            </div>
                            <div class="menu-bar d-lg-none">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="op-mobile-menu col-lg-10 d-none p-0 d-lg-flex align-items-center justify-content-end">
                            <div class="m-menu-header d-none justify-content-between align-items-center d-lg-none">
                                <a href="{{ URL('/') }}" class="logo"><img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $logo[1]->image_value }}" alt="logo"></a>
                                <span class="close-button">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </div>
                            <form action="{{url('/product_search')}}" class="search d-none d-lg-block">
                                <input type="text" name="search_text" value="@isset($search_text){{$search_text}}@endif"  placeholder="Search Here">
                                <button class="search-close"><i class="fas fa-times"></i></button>
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
                                <li class="shop ml--20"><a class="shop-btn" href="https://othoba.com/rfl"  target="_blank"><span><i class="fas fa-shopping-cart"></i>Shop Online</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header section end -->

        <section class="section-part1 scene2 animateThis">
            <div class="right-shape">
                <img class=" animateThis fadeInRightSlow slow" src="{{ URL('/assets/frontend/images/sustainability/right-shape.png') }}" alt="shape">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="text-part">
                            <h4 class="animateThis fadeInleftSlow slow">Know Your</h4>
                            <h2 class="animateThis fadeInRightSlow slow">Plastics</h2>
                            <p class="animateThis zoomIn slow">If we asked you to differentiate between the good and bad polymers, would you succeed? Well, most of the people can’t tell how is former any different than the latter. That’s where brands must step in.</p>
                            <p class="animateThis zoomIn slow">It is the responsibility of the brand to educate the consumers about such safety-related information.</p>
                            <p class="animateThis zoomIn slow">All Polymer material manufacturers as well as brand owners must test their products before offering for sale and must ensure that it complies with the national and international safety norms</p>
                        </div>
                    </div>
                    <div class="col-lg-7 d-fex justify-content-end pl-xl-5">
                        <div class="image-part image-part1">
                            <div class="image image1"data-depth="0.50">
                                <div class="homeCir animateThis zoomIn slow">
                                    <img  data-depth="1" src="{{ URL('/assets/frontend/images/sustainability/part1/01.png') }}" alt="">
                                </div>
                            </div>

                            <div class="image image2"data-depth="0.80">
                                <div class="homeCir animateThis fadeInleftSlow slow">
                                    <img  data-depth="0.001" src="{{ URL('/assets/frontend/images/sustainability/part1/02.png') }}" alt="">
                                </div>
                            </div>

                            <div class="image image3"data-depth="1">
                                <div class="homeCir animateThis fadeInRightSlow slow">
                                    <img  data-depth="0.001" src="{{ URL('/assets/frontend/images/sustainability/part1/03.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-part2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="text-part">
                            <h4 class="animateThis fadeInleftSlow slow go">What is</h4>
                            <h2 class="animateThis fadeInRightSlow slow go">Plastics</h2>
                            <p class="animateThis zoomIn slow go">The word plastic is derived from Greek word ‘plastics’, which means make. Alexander Parkes of England invented plastic in 1862.</p>
                            <p class="animateThis zoomIn slow go">Plastic is also often referred as Polymer, a group of many organic units. A slight difference is that all plastics are polymers, but not all polymers are plastics</p>
                        </div>
                    </div>
                    <div class="col-lg-7 d-fex justify-content-end pl-xl-5">
                        <div class="image-part image-part2 js-tilt">
                            <div class="image-layer1 animateThis zoomIn go">
                                <div class="image-layer2 animateThis zoomIn go">
                                    <img class="animateThis zoomIn go" src="{{ URL('/assets/frontend/images/sustainability/part2/01.png') }}" alt="man">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-part3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 order-lg-last">
                        <div class="text-part  pl-xl-5">
                            <h4 class="animateThis fadeInleftSlow slow go">Origin of</h4>
                            <h2 class="animateThis fadeInRightSlow slow go">Plastics</h2>
                            <p class="animateThis zoomIn slow go">Most of the plastics are made from<br> majorly these three raw materials</p>
                            <ul>
                                <li class="animateThis fadeIn slow go">PETROLEUM</li>
                                <li class="animateThis fadeIn slow go">COAL</li>
                                <li class="animateThis fadeIn slow go">CELLULOSE</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 d-fex justify-content-end pl-xl-5 order-lg-first">
                        <div class="image-part image-part3 animateThis fadeInleftSlow slow go">
                            <img src="{{ URL('/assets/frontend/images/sustainability/part3/01.png') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-part4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="text-part">
                            <h4 class="animateThis fadeInleftSlow slow go">Origin of</h4>
                            <h2 class="animateThis fadeInRightSlow slow go">Plastics</h2>
                            <p class="animateThis zoomIn slow go">Most of the plastics are made from<br> majorly these three raw materials</p>
                            <div class="rfl-accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card animateThis fadeInleftSlow slow go">
                                        <div class="card-header" id="headingOne">
                                            <button class="btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                PLASTIC – industrial SECTOR
                                                <span class="arrow-icon">
                                                    <i class="fas fa-angle-right"></i>
                                                </span>
                                            </button>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                Annually, 600 billion pounds of plastic is consumed and is 
                                                growing at 5% a year. Owing to its low cost, ease of manufacturing, versatility, and imperviousness of water, plastic is used across 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card animateThis fadeInRightSlow slow go">
                                        <div class="card-header" id="headingTwo">
                                            <button class="btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                PLASTIC – MODERN WORLD
                                                <span class="arrow-icon">
                                                    <i class="fas fa-angle-right"></i>
                                                </span>
                                            </button>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                Annually, 600 billion pounds of plastic is consumed and is 
                                                growing at 5% a year. Owing to its low cost, ease of manufacturing, versatility, and imperviousness of water, plastic is used across  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-fex justify-content-end pl-xl-5">
                        <div data-depth="0.3">
                            <div class="image-part image-part4 animateThis zoomIn slow go">
                                <img src="{{ URL('/assets/frontend/images/sustainability/part4/01.png') }}" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-part5">
            <div class="left-shape">
                <img class=" animateThis fadeInleftSlow slow" src="{{ URL('/assets/frontend/images/sustainability/left-shape.png') }}" alt="shape">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="text-part">
                            <h4 class="animateThis fadeInleftSlow slow go">Say Yes to</h4>
                            <h2 class="animateThis fadeInRightSlow slow go">RFL Plastics</h2>
                            <p class="animateThis zoomIn slow go">RFL Houseware is committed to 
                                offering only the best products to our customers. We adhere to the highest safety standards to conserve our 
                                environment and ensure your good health.RFL Houseware is committed to 
                                offering only the best products to our customers. We adhere to the highest safety standards to conserve our </p>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="rfl-process-box">
                            <div class="process-container">
                                <div class="process-item animateThis fadeInleftSlow slow go">
                                    <div class="process-icon">
                                        <div class="process-icon-inner js-tilt">
                                            <img src="{{ URL('/assets/frontend/images/sustainability/icon/sheild.png') }}" alt="icon">
                                        </div>
                                    </div>
                                    <p>Product Performance and Safety</p>
                                </div>

                                <div class="process-item animateThis fadeInRightSlow slow go">
                                    <div class="process-icon">
                                        <div class="process-icon-inner js-tilt">
                                            <img src="{{ URL('/assets/frontend/images/sustainability/icon/feedback.png') }}" alt="icon">
                                        </div>
                                    </div>
                                    <p>Customer Feedback</p>
                                </div>

                                <div class="process-item animateThis fadeInleftSlow slow go">
                                    <div class="process-icon">
                                        <div class="process-icon-inner js-tilt">
                                            <img src="{{ URL('/assets/frontend/images/sustainability/icon/r&d.png') }}" alt="icon">
                                        </div>
                                    </div>
                                    <p>R&D</p>
                                </div>

                                <div class="process-item animateThis fadeInRightSlow slow go">
                                    <div class="process-icon">
                                        <div class="process-icon-inner js-tilt">
                                            <img src="{{ URL('/assets/frontend/images/sustainability/icon/04.png') }}" alt="icon">
                                        </div>
                                    </div>
                                    <p>Incoming Inspection</p>
                                </div>
                                <div class="process-item animateThis fadeInleftSlow slow go">
                                    <div class="process-icon">
                                        <div class="process-icon-inner js-tilt">
                                            <img src="{{ URL('/assets/frontend/images/sustainability/icon/setting.png') }}" alt="icon">
                                        </div>
                                    </div>
                                    <p>In Progress Inspection</p>
                                </div>

                                <div class="process-item animateThis fadeInRightSlow slow go">
                                    <div class="process-icon">
                                        <div class="process-icon-inner js-tilt">
                                            <img src="{{ URL('/assets/frontend/images/sustainability/icon/06.png') }}" alt="icon">
                                        </div>
                                    </div>
                                    <p>FG Inspection</p>
                                </div>
                            </div>
                            <div class="delight-box">
                                <div class="delight-box-step2 js-tilt">
                                    <div class="delight-box-root animateThis zoomIn go">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path fill-rule="evenodd" d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683z"/>
                                        <path d="M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                                        </svg>
                                        <p class="delight-text">
                                            CUSTOMER<br>
                                            DELIGHT
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="left-arrow-sign animateThis fadeIn slow go">
                                <img src="{{ URL('/assets/frontend/images/sustainability/icon/left-arrow.png') }}" alt="icon">
                            </div>
                            <div class="right-arrow-sign animateThis fadeIn slow go">
                                <img src="{{ URL('/assets/frontend/images/sustainability/icon/right-arrow.png') }}" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-part6">
            <div class="container position-relative">
                <div class="sample-image1">
                    <img class="animateThis zoomIn go" src="{{ URL('/assets/frontend/images/sustainability/img1.png') }}" alt="image">
                </div>
                <div class="sample-image2">
                    <img class="animateThis zoomIn go" src="{{ URL('/assets/frontend/images/sustainability/img2.png') }}" alt="image">
                </div>
                <div class="text-action text-center animateThis fadeIn slow go">
                    <h3 class="mb-4">Lorem ipsum dolor sit amet,<br>
                        adipiscing elit. Aenean commodo ligula </h3>
                    <a href="#" class="action-btn">Good Plastic</a>
                </div>
            </div>
        </section>

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
                <div class="container">
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
        <script src="{{ URL('/assets/frontend/js/jquery-easeing.min.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/scroll-nav.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/jquery.zoom.min.js') }}"></script>
        <script src="{{ URL('/assets/frontend/js/product-display.js') }}"></script>
        <script src='{{ URL('/assets/frontend/js/tilt.jquery.min.js') }}'></script>
        <script src="{{ URL('/assets/frontend/js/functions.js') }}"></script>
        <script src='{{ URL('/assets/frontend/js/sustainablity.js') }}'></script>
    </body>
</html>