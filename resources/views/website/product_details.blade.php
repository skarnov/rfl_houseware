<!-- innerpage section start -->
<section class="page-content pt--60 pb--60 pt_lg--80 pb_lg--80">
    <div class="container">
        <div class="main">
            <div class="product-detail">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="product-popup">
                           @if( $category_name === 'Household' )
                           <div class="tab-content style2" id="nav-tabContent">
                                    @if ($product_info->product_image)
                                    <div class="tab-pane fade show active" id="nav-prduct1" role="tabpanel" aria-labelledby="nav-prduct1-tab">
                                        <span id="ex1" class="zoom"><img src="{{ URL::to('/uploads') }}{{'/'}}{{ $product_info->product_image }}" alt="thumb"></span>
                                    </div>
                                    @endif

                                    @if ($product_info->additional_image)
                                    <div class="tab-pane fade" id="nav-product2" role="tabpanel" aria-labelledby="nav-product2-tab">
                                        <span id="ex2" class="zoom"><img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $product_info->additional_image }}" alt="thumb"></span>
                                    </div>
                                    @endif

                                    @if ($product_info->extra_image)
                                    <div class="tab-pane fade" id="nav-product3" role="tabpanel" aria-labelledby="nav-product3-tab">
                                        <span id="ex3" class="zoom"><img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $product_info->extra_image }}" alt="thumb"></span>
                                    </div>
                                    @endif

                                </div>

                                <div class="nav justify-content-between" id="nav-tab" role="tablist">
                                    @if ($product_info->product_image)
                                    <a class="active" id="nav-prduct1-tab" data-toggle="tab" href="#nav-prduct1" role="tab" aria-controls="nav-prduct1" aria-selected="true"><img src="{{ URL::to('/uploads') }}{{'/'}}{{ $product_info->product_image }}" alt="thumb"></a>
                                    @endif
                                    @if ($product_info->additional_image)
                                    <a id="nav-product2-tab" data-toggle="tab" href="#nav-product2" role="tab" aria-controls="nav-product2" aria-selected="false"><img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $product_info->additional_image }}" alt="thumb"></a>
                                    @endif
                                    @if ($product_info->extra_image)
                                    <a id="nav-product3-tab" data-toggle="tab" href="#nav-product3" role="tab" aria-controls="nav-product3" aria-selected="false"><img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $product_info->extra_image }}" alt="thumb"></a>
                                    @endif
                                </div>
 
                            @else 
                               
                            <div class="view_thumb style1" id="view_thumb">
                                <div class="img_large"><img id="imgfile01_eq" src="{{ URL::to('/uploads') }}{{'/'}}{{ $product_info->product_image }}" style="border-width:0px;" /></div>
                                
                                <div class="imgs_thumb">
                                    <a href="#"><img id="imgfile01"   src="{{ URL::to('/uploads/') }}{{'/'}}{{ $product_info->product_image }}" style="border-width:0px;" /></a>
                                    @if ($product_info->additional_image)
                                    <a href="#"><img id="imgfile02"   src="{{ URL::to('/uploads/') }}{{'/'}}{{ $product_info->additional_image }}" style="border-width:0px;" /></a>
                                    @endif
                                    @if ($product_info->extra_image)
                                    <a href="#"><img id="imgfile03"   src="{{ URL::to('/uploads/') }}{{'/'}}{{ $product_info->extra_image }}" style="border-width:0px;" /></a>
                                    @endif
                                    @if ($product_info->supplementary_image)
                                    <a href="#"><img id="imgfile04"   src="{{ URL::to('/uploads/') }}{{'/'}}{{ $product_info->supplementary_image }}" style="border-width:0px;" /></a>
                                    @endif
                                    @if ($product_info->auxiliary_image)
                                    <a href="#"><img id="imgfile05"   src="{{ URL::to('/uploads/') }}{{'/'}}{{ $product_info->auxiliary_image }}" style="border-width:0px;" /></a>
                                    @endif
                                </div>

                            </div>
                            @endif                           
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="prodcut-details-info">
                            <div class="catagory">{{ $category_name }}</div>
                            <h2 class="product-name">{{ $product_info->product_name }}</h2>
                            <h6 class="p-desc">Product Summary</h6>
                            <p>{{ $product_info->product_summary }}</p>
                            <ul class="list-unstyled pl-0">
                                <li>
                                    <strong>Capacity</strong><span> {{ $product_info->product_unit }}</span>
                                </li>
                                <li>
                                    <strong>L*W*H</strong><span>{{ $product_info->product_dimension }}</span>
                                </li>
                            </ul>
                            <!----
                            <div class="price-quantity">
                                <div class="price">
                                    @if($product_info->promotional_price)
                                    <strike>{{ $product_info->product_price }}</strike>
                                    TK {{ $product_info->promotional_price }} 
                                    @else
                                    TK {{ $product_info->product_price }} 
                                    @endif
                                </div>
                            </div> !---->

                            <div class="color-variation">
                                <h6>Color:</h6>
                                <?php
                                $colors = $product_info->product_colors;
                                foreach ($colors as $color) {
                                    ?>
                                    <a class="color" href="#" style="background-color: <?php echo $color ?>"></a>
                                    <?php
                                }
                                ?>
                            </div>
                             <div class="d-flex flex-wrap">
                                 @if($product_info->discount)
								<div class="offer">
                                    <span>{{ $product_info->discount }}% Discount</span>
                                </div>
                                @endif
                                <a href="{{ $product_info->external_link }}" target="b_blank" class="buy-othoba"><span><i class="fas fa-shopping-cart"></i>Buy Now</span></a>
                                    
                             </div>

                            <div class="share-area">
                                <h6>Share</h6>
                                <a href="http://www.facebook.com/sharer.php?u={{ URL('/product_details/') }}/{{ $product_info->url_slug }}_{{ $product_info->product_id }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;"><i class="fab fa-facebook-f"></i></a>

                                <a href="https://twitter.com/share?url={{ URL('/product_details/') }}/{{ $product_info->url_slug }}_{{ $product_info->product_id }}" onclick="javascript:window.open(this.href,
                                                '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');
                                        return false;"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ URL('/product_details/') }}/{{ $product_info->url_slug }}_{{ $product_info->product_id }}" onclick="javascript:window.open(this.href,
                                                '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');
                                        return false;"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://accounts.google.com/ServiceLogin?service=blogger&hl=bn&continue=https://www.blogger.com/start?successUrlhttps://www.linkedin.com/sharing/share-offsite/?url={{ URL('/product_details/') }}/{{ $product_info->url_slug }}_{{ $product_info->product_id }}" onclick="javascript:window.open(this.href,
                                                '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');
                                        return false;"><i class="fab fa-blogger-b"></i></a>

                                <a href="http://pinterest.com/pin/create/button/?url={{ URL('/product_details/') }}/{{ $product_info->url_slug }}_{{ $product_info->product_id }}" onclick="javascript:window.open(this.href,
                                                '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');
                                        return false;"><i class="fab fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- product-additional-info-->
            <div class="product-addi-info mb--60">
                <ul class="product-addi-info-tab nav justify-content-center justify-content-lg-start" id="myTab" role="tablist">
                    <li class="mb-4 mb-lg-0">
                        <a class=" active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                    </li>
                    <li>
                        <a id="addinfo-tab" data-toggle="tab" href="#addinfo" role="tab" aria-controls="addinfo" aria-selected="false">Material Information</a>
                    </li>
                    <li>
                        <a id="care-tab" data-toggle="tab" href="#care" role="tab" aria-controls="care" aria-selected="false">Product Care Instruction</a>
                    </li>
                    <li>
                        <a id="bar-tab" data-toggle="tab" href="#bar" role="tab" aria-controls="bar" aria-selected="false">SKU / Barcode</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                        {!! $product_info->product_description !!}
                        <!--<iframe class="mb--25" width="100%" height="481" src="{!! $product_info->product_video !!}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                    </div>
                    <div class="tab-pane fade" id="addinfo" role="tabpanel" aria-labelledby="addinfo-tab">                        
                        {!! $product_info->product_material !!}
                    </div>
                    <div class="tab-pane fade" id="care" role="tabpanel" aria-labelledby="care-tab">
                        {!! $product_info->product_care !!}
                    </div>
                    <div class="tab-pane fade" id="bar" role="tabpanel" aria-labelledby="bar-tab">
                        {!! $product_info->barcode_info !!}
                    </div>
                </div>
            </div>

            <!-- related product -->
            <div class="related-product">
                <h4>Related Product</h4>
                <div class="product-list">
                    <div class="row">
                        @foreach ($related_products as $product)
                        <div class="col-md-4">
                            <div class="product-item">
                                <div class="product-thumb">
                                    <a href="{{ URL('/product_details/') }}/{{ $product->url_slug }}_{{ $product->product_id }}"><img src="{{ URL::to('/uploads/thumbnails') }}{{'/'}}{{ $product->product_image }}" alt="{{ $product->product_name }}"></a>
                                </div>
                                <div class="product-content">
                                    <h6 class="product-name"><a href="{{ URL('/product_details/') }}/{{ $product->url_slug }}_{{ $product->product_id }}">{{ $product->product_name }}</a></h6>
                                    <a href="{{ URL('/product_details/') }}/{{ $product->url_slug }}_{{ $product->product_id }}" class="product-btn">Details</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- innerpage section end -->