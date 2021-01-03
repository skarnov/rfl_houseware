<style>
    .page-header {
        background-image : url("{{ URL::to('/uploads/') }}{{'/'}}{{ $page_info->image }}");
    }
</style>
<!-- page header start -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h3>Catalog</h3>
            <p>{{ $page_info->page_short_description }}</p>
        </div>
        <ul class="breadcrumb">
            <li><a href="{{ URL('/') }}">Home</a></li>
            <li>Catalog Page</li>
        </ul>
    </div>
</section>
<!-- page header end -->

<!-- innerpage section start -->
<section class="page-content catalog-page pt--60 pb--60 pt_lg--100 pb_lg--90">
    <div class="container">
        <div class="row">
            @foreach ($all_catalogs as $catalog)
            <div class="col-md-6 col-lg-3">
                <div class="catalog-item">
                    <div class="catalog-thumb">
                        <a href="uploads/files/{{ $catalog->additional_info }}" target="_blank">
                            @if ($catalog->featured_image)
                            <img src="{{ URL::to('/uploads/files/thumbnails') }}{{'/'}}{{ $catalog->featured_image }}" alt="{{ $catalog->content_title }}">
                            @else
                            <img src="{{ URL::to('/assets/noImage.png') }}" alt="{{ $catalog->content_title }}">
                            @endif
                        </a>
                    </div>
                    <div class="catalog-content">
                        <h5><a href="uploads/files/{{ $catalog->additional_info }}" target="_blank">{{ $catalog->content_title }}</a></h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            {{ $all_catalogs->links() }}
        </div>
    </div>
</section>
<!-- innerpage section end -->