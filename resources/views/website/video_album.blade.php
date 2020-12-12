<!-- page header start -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h3>Video Gallery</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
        </div>
        <ul class="breadcrumb">
            <li><a href="{{ URL('/') }}">Home</a></li>
            <li>Media</li>
        </ul>
    </div>
</section>
<!-- page header end -->

<!-- innerpage section start -->
<section class="page-content sitemap-page pt--60 pb--60 pt_lg--120 pb_lg--120">
    <div class="container">
        <div class="row">
            @foreach ($all_album as $album)
            <div class="col-md-6 col-lg-4">
                <div class="album-item">
                    <div class="album-thumb">
                        <a href="{{ URL('/video_gallery/') }}/{{ $album->content_id }}"><img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $album->featured_image }}" alt="{{ $album->content_title }}"></a>
                    </div>
                    <h5><a href="{{ URL('/video_gallery/') }}/{{ $album->content_id }}">{{ $album->content_title }}</a></h5>
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
        $('#media').css('color', 'white');
        /*End Active Class*/
    });
</script>
<script>
    jQ.push(function () {        
        /*Start Active Class*/
        $('#media_center').addClass('active');
        /*End Active Class*/
    });
</script>