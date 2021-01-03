<style>
    .page-header {
        background-image : url("{{ URL::to('/uploads/') }}{{'/'}}{{ $page_info->image }}");
    }
</style>
<!-- page header start -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h3>Sitemap</h3>
            <p>{{ $page_info->page_short_description }}</p>
        </div>
        <ul class="breadcrumb">
            <li><a href="{{ URL('/') }}">Home</a></li>
            <li>Sitemap</li>
        </ul>
    </div>
</section>
<!-- page header end -->

<!-- innerpage section start -->
<section class="page-content sitemap-page pt--60 pb--60 pt_lg--120 pb_lg--120">
    <div class="heading text-center pt-5 pb-5">
        <h1>Site Map</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <h5>Our Brands</h5>
                <ul class="pl-0 list-unstyled">
                    <li><a href="#">Brand</a></li>
                    <li><a href="#">Innovation</a></li>
                    <li><a href="#">Product Safety</a></li>
                    <li><a href="#">Ingredients</a></li>
                    <li><a href="#">Fragrance Ingredients</a></li>
                </ul>
            </div>

            <div class="col-md-6 col-lg-3">
                <h5>Our Impact</h5>
                <ul class="pl-0 list-unstyled">
                    <li><a href="#">Doing What's Right</a></li>
                    <li><a href="#">Sustainability</a></li>
                    <li><a href="#">Community Impact</a></li>
                    <li><a href="#">Gender Equality</a></li>
                    <li><a href="#">Diversity & Inclusion</a></li>
                    <li><a href="#">Responsible Beauty</a></li>
                    <li><a href="#">Take On Race</a></li>
                    <li><a href="#">LGBTQ-Visibility</a></li>
                    <li><a href="#">Our COVID-19 Response</a></li>
                </ul>
            </div>

            <div class="col-md-6 col-lg-3">
                <h5>Our Story</h5>
                <ul class="pl-0 list-unstyled">
                    <li><a href="#">Who We Are</a></li>
                    <li><a href="#">P&G History</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Anual Report</a></li>
                    <li><a href="#">Citizenship Report</a></li>
                </ul>
            </div>

            <div class="col-md-6 col-lg-3">
                <h5><a href="#">Rewards and Offers</a></h5>
            </div>
        </div>
    </div>
</section>
<!-- innerpage section end -->
<script>
    jQ.push(function () {
        /*Start Active Class*/
        $('#sitemap').css('color', 'white');
        /*End Active Class*/
    });
</script>