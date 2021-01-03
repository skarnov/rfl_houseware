<style>
    .page-header {
        background-image : url("{{ URL::to('/uploads/') }}{{'/'}}{{ $page_info->image }}");
    }
</style>
<!-- page header start -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h3>News</h3>
            <p>{{ $page_info->page_short_description }}</p>
        </div>
        <ul class="breadcrumb">
            <li><a href="{{ URL('/') }}">Home</a></li>
            <li><a href="{{ URL('/news') }}">News</a></li>
            <li>{{ $news_info->content_title }}</li>
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
                            <img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $news_info->featured_image }}" alt="{{ $news_info->content_title }}">
                        </div>
                        <div class="post-content">
                            <h1 class="title">{{ $news_info->content_title }}</h1>
                            <ul class="meta-post border-style d-flex flex-wrap list-unstyled">
                                <li>{{ date('F j, Y', strtotime($news_info->create_date)) }}</li>
                            </ul>
                            <p>{!! $news_info->content_description !!}</p>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col-lg-3 sidebar">
                <div class="widget">
                    <h5 class="widget-title">Latest News</h5>
                    <div class="widget-wrapper">
                        <div class="latest-news-list">

                            @foreach ($all_news as $news)
                            <div class="post-item d-flex">
                                <div class="post-thumb">
                                    <a href="{{ URL('/news_details/') }}/{{ $news->content_id }}"><img src="{{ URL::to('/uploads/thumbnails') }}{{'/'}}{{ $news->featured_image }}" alt="{{ $news->content_title }}"></a>
                                </div>
                                <div class="post-content">
                                    <a class="title" href="{{ URL('/news_details/') }}/{{ $news->content_id }}">{{ $news->content_title }}</a>
                                    <ul class="meta-post list-unstyled pl-0 d-flex">
                                        <li>
                                            <span class="meta-content">{{ date('F j, Y', strtotime($news->create_date)) }}</span>
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
        $('#media_center').addClass('active');
        /*End Active Class*/
    });
</script>