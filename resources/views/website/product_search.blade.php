<!-- page header start -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h3>Product Search</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
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
<section class="page-content pt--120 pb--120">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 sidebar">
                <div class="sidebar-widget">
                    <h3 class="widget-title">{{ $subcategory_name }}</h3>
                    <div class="widget-wrapper">
                        <div class="rflfilter-accordion" id="rflfilter-accordion">
                            <?php
                            foreach ($all_subcategories as $key => $subcategory) {
                                ?>
                                <div class="rfl-card">
                                    <div class="rfl-card-header" id="rflheading<?php echo $subcategory->category_id ?>">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#rflcollapse<?php echo $subcategory->category_id ?>" aria-expanded="true" aria-controls="rflcollapse<?php echo $subcategory->category_id ?>">
                                            <?php echo $subcategory->subcategory_name ?>
                                            <span class="plus-minus"></span>
                                        </button>
                                    </div>
                                    <div id="rflcollapse<?php echo $subcategory->category_id ?>" class="collapse <?php echo ($key == 0) ? 'show' : '' ?>" aria-labelledby="rflheading<?php echo $subcategory->category_id ?>" data-parent="#rflfilter-accordion">
                                        <div class="rfl-card-body">
                                            <ul class="filter-checkbox list-unstyled">
                                                <?php
                                                foreach ($all_items as $item) {
                                                    if ($item->fk_item_id == $subcategory->category_id) {
                                                        ?>
                                                        <li class="checkbox-item">
                                                            <input type="checkbox" onclick="subcategoryProducts(<?php echo $subcategory->category_id ?>)">
                                                            <span class="checkbox"></span>
                                                            <span class="label"><?php echo $item->item_name ?></span>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 main">
                <div class="product-catagory-filter d-flex justify-content-end mb--40">
                    <div class="select-item">
                        <span>Attribute</span>
                        <select name="attribute" onchange="productAttribute(this.value)">
                            <option value="new-arrival">New-Arrival</option>
                            <option value="featured">Featured</option>
                            <option value="top-sale">Top-sale</option>
                        </select>
                    </div>
                </div>
                <div class="product-list">
                    <div class="row" id="desireProducts">
                        @forelse ($all_products as $product)
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
                        @empty
                        <div class="col-md-12">
                            <div class="product-item">
                                <h3 class="text-danger">Not Found</h3>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- innerpage section end -->