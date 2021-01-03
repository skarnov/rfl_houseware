<style>
    .page-header {
        background-image : url("{{ URL::to('/uploads/') }}{{'/'}}{{ $page_info->image }}");
    }
</style>
<!-- page header start -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h3>Blogs</h3>
            <p>{{ $page_info->page_short_description }}</p>
        </div>
        <ul class="breadcrumb">
            <li><a href="{{ URL('/') }}">Home</a></li>
            <li><a href="{{ URL('/blog') }}">Blogs</a></li>
            <li>{{ $blog_info->content_title }}</li>
        </ul>
    </div>
</section>
<!-- page header end -->

<!-- innerpage section start -->
<section class="page-content single-page pt--60 pb--60">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 main-content">
                <div class="row">
                    <div class="entry-content">
                        <div class="entry-header">
                            <img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $blog_info->featured_image }}" alt="{{ $blog_info->content_title }}">
                        </div>
                        <div class="post-content">
                            <h1 class="title">{{ $blog_info->content_title }}</h1>
                            <ul class="meta-post border-style d-flex flex-wrap list-unstyled">
                                <li>{{ date('F j, Y', strtotime($blog_info->create_date)) }}</li>
                            </ul>
                            <p>{!! $blog_info->content_description !!}</p>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col-lg-3 sidebar">
                <div class="widget">
                    <h5 class="widget-title">Latest Blogs</h5>
                    <div class="widget-wrapper">
                        <div class="latest-news-list">


                            @foreach ($all_blogs as $blog)
                            <div class="post-item d-flex">
                                <div class="post-thumb">
                                    <a href="{{ URL('/blog_details/') }}/{{ $blog->content_id }}"><img src="{{ URL::to('/uploads/thumbnails') }}{{'/'}}{{ $blog->featured_image }}" alt="{{ $blog->content_title }}"></a>
                                </div>
                                <div class="post-content">
                                    <a class="title" href="{{ URL('/blog_details/') }}/{{ $blog->content_id }}">{{ $blog->content_title }}</a>
                                    <ul class="meta-post list-unstyled pl-0 d-flex">
                                        <li>
                                            <span class="meta-content">{{ date('F j, Y', strtotime($blog->create_date)) }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- innerpage section end -->
<script>
    jQ.push(function () {
        /*Start Active Class*/
        $('#blog').addClass('active');
        /*End Active Class*/
    });
</script>