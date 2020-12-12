<!-- page header start -->
<section class="page-header style2">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ URL('/') }}">Home</a></li>
            <li><a href="{{ URL('/event') }}">Events</a></li>
            <li>{{ $event_info->content_title }}</li>
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
                            <img src="{{ URL::to('/uploads/') }}{{'/'}}{{ $event_info->featured_image }}" alt="{{ $event_info->content_title }}">
                        </div>
                        <div class="post-content">
                            <h1 class="title">{{ $event_info->content_title }}</h1>
                            <ul class="meta-post border-style d-flex flex-wrap list-unstyled">
                                <li>{{ date('F j, Y', strtotime($event_info->create_date)) }}</li>
                            </ul>
                            <p>{!! $event_info->content_description !!}</p>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col-lg-3 sidebar">
                <div class="widget">
                    <h5 class="widget-title">Latest Events</h5>
                    <div class="widget-wrapper">
                        <div class="latest-news-list">
                            
                            
                            @foreach ($all_events as $event)
                            <div class="post-item d-flex">
                                <div class="post-thumb">
                                    <a href="{{ URL('/event_details/') }}/{{ $event->content_id }}"><img src="{{ URL::to('/uploads/thumbnails') }}{{'/'}}{{ $event->featured_image }}" alt="{{ $event->content_title }}"></a>
                                </div>
                                <div class="post-content">
                                    <a class="title" href="{{ URL('/event_details/') }}/{{ $event->content_id }}">{{ $event->content_title }}</a>
                                    <ul class="meta-post list-unstyled pl-0 d-flex">
                                        <li>
                                            <span class="meta-content">{{ date('F j, Y', strtotime($event->create_date)) }}</span>
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