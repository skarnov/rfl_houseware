<!-- page header start -->
<?php
if ($item_info->category_image) {
    ?>
    <section class="page-header" style="background-image: url('<?php echo '../uploads/category/' . $item_info->category_image ?>')">
        <?php
    } else {
        ?>
        <section class="page-header" style="background-image: url('../assets/frontend/images/page-header-bg.jpg')">
            <?php
        }
        ?>
        <div class="container">
            <div class="page-header-content">
                <h3>{{ $item_info->category_name }}</h3>
                <?php echo $item_info->subnews; ?>
            </div>
            <ul class="breadcrumb">
                <li><a href="{{ URL('/') }}">Home</a></li>
                <li><a href="{{ URL('/') }}">{{ $subcategory_name }}</a></li>
                <li class="text-capitalize">{{ $item_slug }}</li>
            </ul>
        </div>
    </section>
    <!-- page header end -->

    <!-- innerpage section start -->
    <section class="page-content pt--60 pb--60 pt_lg--100 pb_lg--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 sidebar">
                    <a class="drawer d-lg-none">
                        <i class="right fas fa-angle-right"></i>
                        <i class="left fas fa-angle-left"></i>
                    </a>

                    <form id="filterForm">
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Categories</h3>
                            <div class="widget-wrapper">
                                <ul class="catagory-menu">
                                    <?php
                                    foreach ($all_categories as $key => $category) {
                                        ?>
                                        <li class="catagory-dropdown <?php echo ($category_name == $category->category_name) ? 'open' : '' ?>">
                                            <a href="#"><?php echo $category->category_name ?><span class="plus-minus"></span></a>
                                            <ul class="catagory-submenu">
                                                <?php
                                                foreach ($all_subcategories as $key => $subcategory) {
                                                    if ($subcategory->fk_category_id == $category->category_id) {
                                                        ?>
                                                        <li class="catagory-dropdown <?php echo ($subcategory_name == $subcategory->subcategory_name) ? 'open' : '' ?>">
                                                            <a href="#"><?php echo $subcategory->subcategory_name ?> <span class="plus-minus"></span></a>
                                                            <ul class="filter-checkbox catagory-submenu list-unstyled">
                                                                <?php
                                                                foreach ($all_items as $item) {
                                                                    if ($item->fk_item_id == $subcategory->category_id) {
                                                                        ?>
                                                                        <li class="checkbox-item">
                                                                            <input type="checkbox" name="items[]" value="<?php echo $item->pk_item_id ?>" <?php echo ($item_name == $item->item_name) ? 'checked' : '' ?> class="filterDropDown">
                                                                            <span class="checkbox"></span>
                                                                            <span class="label"><?php echo $item->item_name ?></span>
                                                                        </li>
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
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </form>
              
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Related Categories</h3>
                        <div class="widget-wrapper">
                            <div class="small-post-list">
                                @foreach ($related_category as $product)
                                <div class="small-post-item d-flex flex-wrap align-items-center">
                                    <div class="thumb">
                                        <a href="{{ URL('/product_details/') }}/{{ $product->url_slug }}_{{ $product->product_id }}"><img src="{{ URL::to('/uploads') }}{{'/'}}{{ $product->product_image }}" alt="{{ $product->product_name }}"></a>
                                    </div>
                                    <div class="content">
                                        <p class="name">{{ $product->product_name }}</p>
                                        <h6 class="price">
                                            @if($product->promotional_price)
                                            <strike>{{ $product->product_price }}</strike>
                                            TK {{ $product->promotional_price }} 
                                            @else
                                            TK {{ $product->product_price }} 
                                            @endif
                                        </h6>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 main">
                    <div class="product-catagory-filter d-none d-lg-flex flex-wrap justify-content-end mb--40">
                        <div class="select-item">
                            <span>Attribute</span>
                            <select name="attribute" id="productSort">
                                <option value="new-arrival">New-Arrival</option>
                                <option value="featured">Featured</option>
                                <option value="top-sale">Top-sale</option>
                            </select>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row" id="desireProducts">
                            @foreach ($all_products as $product)
                            <div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-thumb">
                                        <a href="{{ URL('/product_details/') }}/{{ $product->url_slug }}_{{ $product->product_id }}"><img src="{{ URL::to('/uploads/thumbnails') }}{{'/'}}{{ $product->product_image }}" alt="product"></a>
                                    </div>
                                    <div class="product-content">
                                        <h6 class="product-name"><a href="{{ URL('/product_details/') }}/{{ $product->url_slug }}_{{ $product->product_id }}">{{ $product->product_name }}</a></h6>
                                        <a href="{{ URL('/product_details/') }}/{{ $product->url_slug }}_{{ $product->product_id }}" class="product-btn">Details</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            {{ $all_products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- innerpage section end -->
    <script>
        jQ.push(function () {   
            // catagory menu javascript
            $('.catagory-menu>li>a,.catagory-menu ul.catagory-submenu>li>a').on('click', function(e) {
                var element = $(this).parent('li');
                event.preventDefault()
                if (element.hasClass('open')) {
                    element.removeClass('open');
                    element.find('li').removeClass('open');
                    element.find('ul').slideUp(1500,"swing");
                }
                else {
                    element.addClass('open');
                    element.children('ul').slideDown(1500,"swing");
                    element.siblings('li').children('ul').slideUp(1500,"swing");
                    element.siblings('li').removeClass('open');
                    element.siblings('li').find('li').removeClass('open');
                    element.siblings('li').find('ul').slideUp(1500,"swing");
                }
            });

            // $menu = $('.catagory-menu').find('.catagory-dropdown');
            // $($menu).on('click', function(){
            //     $(this).addClass('open').siblings().removeClass('open');
            // });     
            /*Start Active Class*/
            <?php if($item_slug == 'household') { ?>
                $('#households').css('color', 'white');
            <?php }elseif($item_slug == 'furniture'){ ?>
                $('#furniture').css('color', 'white');
            <?php }elseif($item_slug == 'industrial'){ ?>
                $('#industrial').css('color', 'white');
            <?php } ?>
            /*End Active Class*/
        });
    </script>
    <script>
        jQ.push(function () {

        var $form = $('#filterForm'),
                hideShow = function () {
                    $("#filterResult").html('');
                    $("#desireProducts").html('');
                    $.ajax({
                    type: 'GET',
                    url: "{{ URL('/product_sorting') }}/",
                    data: $('#filterForm').serialize(),
                    beforeSend: function () {
                    $("#desireProducts").html('<h1>Searching...</h1>');
                    },
                    success: function (data)
                    {
                    $("#desireProducts").html(data);
                    }
                    });
                };
        $form.find('.filterDropDown').on('change', hideShow);
        $form.find('.filterText').on('keyup', hideShow);
        
        $("#productSort").on("change", function(c) {
            $("#desireProducts").empty();
                $.get("/productsortinglist?type=" + c.target.value, function(c) {
                    $.each(c, function(c, f) {
                        console.log(f);
                        var base_url = "{{ URL::to('/uploads/thumbnails') }}"; 
                        var image = base_url + '/' + f.product_image;
                        var url = "{{ URL('/product_details/') }}" + "/" +  f.url_slug + "_" + f.product_id;
                        $("#desireProducts").append(`<div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-thumb">
                                        <a href="`+ url +`"><img src="`+ image +`" alt="product"></a>
                                    </div>
                                    <div class="product-content">
                                        <h6 class="product-name"><a href="`+ url  +`">Trash Bin</a></h6>
                                        <a href="`+ url +`" class="product-btn">Details</a>
                                    </div>
                                </div>
                            </div>`);
                    })
                })
            });

        });
    </script>
    
    <script>
        jQ.push(function () {
            /*Start Active Class*/
            $('#product').addClass('active');
            /*End Active Class*/
        });
    </script>