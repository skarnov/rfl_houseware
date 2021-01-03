<style>
    .page-header {
        background-image : url("{{ URL::to('/uploads/') }}{{'/'}}{{ $page_info->image }}");
    }
</style>
<!-- page header start -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h3>Video Gallery</h3>
            <p>{{ $page_info->page_short_description }}</p>
        </div>
        <ul class="breadcrumb">
            <li><a href="{{ URL('/') }}">Home</a></li>
            <li>Media</li>
        </ul>
    </div>
</section>
<!-- page header end -->

<!-- innerpage section start -->
<section class="page-content video-gallery-page pt--60 pb--60 pt_lg--120 pb_lg--120">
    <div class="container">
        <div class="row">
            <div class="col-12  mb-2 mb-lg-5">
                <h2>'{{ $video_album->content_title }}' Video Gallery</h2>
            </div>

            @foreach ($video_gallery as $gallery)
            <div class="col-md-6 col-lg-4">
                <div class="video-gallery-item">
                    <div class="video-gallery-thumb">
                        <a href="#"><img src="{{ URL::to('/uploads/thumbnails/') }}{{'/'}}{{ $gallery->featured_image }}" alt="{{ $gallery->content_title }}"></a>
                        <a href="{{ $gallery->additional_info }}" data-rel="lightcase" class="play-button">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- innerpage section end -->
<script>
    jQ.push(function () {        
        /*Start Active Class*/
        $('#media_center').addClass('active');
        /*End Active Class*/
    });
</script>