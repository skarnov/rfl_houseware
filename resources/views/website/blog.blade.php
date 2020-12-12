<!-- page header start -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h3>Blog</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
        </div>
        <ul class="breadcrumb">
            <li><a href="{{ URL('/') }}">Home</a></li>
            <li>Blog</li>
        </ul>
    </div>
</section>
<!-- page header end -->

<!-- innerpage section start -->
<div class="container">
    <div class="row">
        <section class="page-content blog-page pt--60 pb--60 pt_lg--120 pb_lg--120">
            <div class="container">
                <div class="row">
                    @foreach ($all_blogs as $blog)
                    <div class="col-lg-6">
                        <div class="post-item">
                            <div class="post-thumb">
                                <a href="{{ URL('/blog_details/') }}/{{ $blog->content_id }}"><img src="{{ URL::to('/uploads/thumbnails') }}{{'/'}}{{ $blog->featured_image }}" alt="{{ $blog->content_title }}"></a>
                            </div>
                            <div class="post-content">
                                <div class="post-content-inner">
                                    <h6 class="title"><a href="{{ URL('/blog_details/') }}/{{ $blog->content_id }}">{{ $blog->content_title }}</a></h6>
                                    <ul class="meta-post border-style d-flex flex-wrap list-unstyled">
                                        <li>{{ date('F j, Y', strtotime($blog->create_date)) }}</li>
                                    </ul>
                                    <a href="{{ URL('/blog_details/') }}/{{ $blog->content_id }}" class="blog-btn">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    {{ $all_blogs->links() }}
                </div>
            </div>
        </section>
    </div>
</div>
<!-- innerpage section end -->
<script>
    jQ.push(function () {        
        /*Start Active Class*/
        $('#blog').addClass('active');
        /*End Active Class*/
    });
</script>