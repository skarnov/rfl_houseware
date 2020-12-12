<style>
    .page-header {
        background-image : url("{{ URL::to('/uploads/') }}{{'/'}}{{ $page_info->image }}");
    }
</style>
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h3>Contact Us</h3>
            <p>{{ $page_info->page_short_description }}</p>
        </div>
        <ul class="breadcrumb">
            <li><a href="{{ URL('/') }}">Home</a></li>
            <li>Contact Page</li>
        </ul>
    </div>
</section>
<!-- page header end -->

<!-- innerpage section start -->
<section class="page-content contacty-page pt--60 pb--60 pt_lg--120 pb_lg--120">
    <div class="container">
        <div class="row contact-area">
            <div class="contact-info-area col-lg-4 p-0 order-lg-last d-flex align-items-center">
			<div class="contact-info">
				<span style="font-size:19px;color:#fff;font-weight: 600;text-transform: uppercase;letter-spacing: 2px;">Europe</span>
                    <div class="contact-item pt--20 pb--20">
                        <div class="contact-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="name">CAll Us</h6>
                            <p>+880 1844 660251</p>
                        </div>
                    </div>

                    <div class="contact-item pt--20 pb--20">
                        <div class="contact-icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="name">Email</h6>
                            <p>dpl.op79@rflgroupbd.com</p>
                        </div>
                    </div>
					<hr /><br />
                   
					<span style="font-size:19px;color:#fff;font-weight: 600;text-transform: uppercase;letter-spacing: 2px;">Africa, Australia, North America, South America</span>
                    <div class="contact-item pt--20 pb--20">
                        <div class="contact-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="name">CAll Us</h6>
                            <p>+880 1841 357 698</p>
                        </div>
                    </div>

                    <div class="contact-item pt--20 pb--20">
                        <div class="contact-icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="name">Email</h6>
                            <p>export95@rflgroupbd.com</p>
                        </div>
                    </div>
					<hr /><br />
                   
					<span style="font-size:19px;color:#fff;font-weight: 600;text-transform: uppercase;letter-spacing: 2px;"> Asia</span>
                    <div class="contact-item pt--20 pb--20">
                        <div class="contact-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="name">CAll Us</h6>
                            <p>+8801844608771</p>
                        </div>
                    </div>

                    <div class="contact-item pt--20 pb--20">
                        <div class="contact-icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="name">Email</h6>
                            <p>rfl448@rflgroupbd.com</p>
                        </div>
                    </div>
                </div>
              <!---  <div class="contact-info">
				<h1></h1>
                    <div class="contact-item pt--20 pb--20">
                        <div class="contact-icon">
                            <i class="far fa-map"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="name">Address</h6>
                            <p>{{ $address[0]->address }}</p>
                        </div>
                    </div>

                    <div class="contact-item pt--20 pb--20">
                        <div class="contact-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="name">CAll Us</h6>
                            <p>{{ $address[0]->phone }}</p>
                        </div>
                    </div>

                    <div class="contact-item pt--20 pb--20">
                        <div class="contact-icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="name">Email</h6>
                            <p>{{ $address[0]->email }}</p>
                        </div>
                    </div>
                </div> !--->
            </div>
		
            <div class="contact-form-area col-lg-8 p-0 order-lg-first d-flex align-items-center">
                  <form method="GET" action="send-mail" class="contact-form">
                     <!--<form method="" action="" class="contact-form"> -->
                    <input type="text" name="name" placeholder="Name*">
                    <input type="text" name="email" placeholder="Email*">
                    <input type="number" name="mobile" placeholder="Phone*">
                    <textarea name="message"></textarea>
                   <input type="submit" class="submit" value="Send">
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    jQ.push(function () {
        /*Start Active Class*/
        $('#contact').css('color', 'white');
        /*End Active Class*/
    });
</script>