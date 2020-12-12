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