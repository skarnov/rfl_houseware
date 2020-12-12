<style>
    .page-header {
        background-image : url("{{ URL::to('/uploads/') }}{{'/'}}{{ $page_info->image }}");
    }
</style>
<!-- page header start -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h3>About</h3>
            <p>{{ $page_info->page_short_description }}</p>
        </div>
        <ul class="breadcrumb">
            <li><a href="{{ URL('/') }}">Home</a></li>
            <li>About</li>
        </ul>
    </div>
</section>
<!-- page header end -->

<!-- innerpage section start -->
<section class="page-content static-page">
    <div class="pt--60 pb--20">
        <div class="container">
            @php echo $page_info->page_description; @endphp
        </div>

        <!-- newsletter-section start -->
        <section id="newsletter" class="newsleter-section pt--60 pb--60 pt_lg--60 pb_lg--100">
            <div class="container">
                <div class="newsleter-container text-center">
                    <div class="newsletter-content mb--35">
                        <h4>Subscribe for ger exclusive news & offer</h4>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success mt-2">
                        {{ session('success') }}
                    </div>
                    @endif
                    <!-- Show Error -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- End of Show Error -->
                    <form method="POST" action="{{url('/save_newsletter')}}" class="newsletter-form">
                        @csrf
                        <input type="email" name="email" placeholder="Your Email">
                        <button>Subscribe</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- newsletter-section end -->
    </div>
</section>
<!-- innerpage section end -->
<script>
    jQ.push(function () {
        /*Start Active Class*/
        $('#about').addClass('active');
        /*End Active Class*/
    });
</script>