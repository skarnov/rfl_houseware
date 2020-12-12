@foreach ($all_products as $product)
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