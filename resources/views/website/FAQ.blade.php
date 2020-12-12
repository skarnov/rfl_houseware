<style>
    .page-header {
        background-image : url("{{ URL::to('/uploads/') }}{{'/'}}{{ $page_info->image }}");
    }
</style>
<!-- page header start -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h3>FAQ</h3>
            <p>{{ $page_info->page_short_description }}</p>
        </div>
        <ul class="breadcrumb">
            <li><a href="{{ URL('/') }}">Home</a></li>
            <li>Faq</li>
        </ul>
    </div>
</section>
<!-- page header end -->

<!-- innerpage section start -->
  <section class="page-content contacty-page pt--60 pb--60 pt_lg--120 pb_lg--120">
        <div class="container">
            @php echo $page_info->page_description; @endphp
        </div>
    </section>
<!-- innerpage section end -->
<script>
    jQ.push(function () {
        /*Start Active Class*/
        $('#about').addClass('active');
        $('#faq').css('color', 'white');
        /*End Active Class*/
    });
</script>