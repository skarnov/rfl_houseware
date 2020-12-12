<style>
    .page-header {
        background-image : url("{{ URL::to('/uploads/') }}{{'/'}}{{ $page_info->image }}");
    }
    .contact-form input,.contact-form select,.contact-form textarea {
        width: 100%;
        outline: none;
        padding: 13px 20px;
        margin-bottom: 35px;
        border: 1px solid #ececec;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
    }
    .contact-form input:active, .contact-form input:focus, .contact-form select:active, .contact-form select:focus, .contact-form textarea:active, .contact-form textarea:focus {
        border-color: #dd0f24;
    }
    .address-title{
        font-size:19px;
        color:#fff;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
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
<section class="page-content contacty-page pt--60 pb--60 pt_lg--120 pb_lg--120">
    <div class="container">
        <div class="row contact-area">
            <div class="contact-info-area col-lg-4 p-0 order-lg-last d-flex align-items-center">
                <div class="contact-info">
                    @foreach ($address as $value)
                    @if ($value->address)
                    <span class="address-title">{{ $value->title }}</span>
                    <div class="contact-item pt--20 pb--20">
                        <div class="contact-icon">
                            <i class="far fa-map"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="name">Address</h6>
                            <p>{{ $value->address }}</p>
                        </div>
                    </div>
                    @endif
                    @if ($value->phone)
                    <div class="contact-item pt--20 pb--20">
                        <div class="contact-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="name">CAll Us</h6>
                            <p>{{ $value->phone }}</p>
                        </div>
                    </div>
                    @endif
                    @if ($value->email)
                    <div class="contact-item pt--20 pb--20">
                        <div class="contact-icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="name">Email</h6>
                            <p>{{ $value->email }}</p>
                        </div>
                    </div>
                    <hr><br>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="contact-form-area col-lg-8 p-0 order-lg-first d-flex align-items-center">
                <form method="get" action="send-mail" class="contact-form">
                    <input type="text"  name="name" required placeholder="First Name*">
                    <input type="text" name="last_name" required placeholder="Last Name*">
                    <input type="number" name="mobile" required placeholder="Phone*">
                    <input type="text" name="email" required placeholder="Email*">
                    <select name="country_id" style="color:#888787"   id="country_id">
                        <option  value="">Select Country..</option>
                        @foreach($country as $country)
                        <option  value="{{$country->country_id}}">{{$country->country_name}}</option>
                        @endforeach
                    </select>
                    <br/>
                    <select name="category_id"   style="color:#888787" required id="category_id">
                        <option value="">Select Category..</option>
                        @foreach($categories as $categories)
                        <option  value="{{$categories->category_id}}">{{$categories->category_name}}</option>
                        @endforeach
                    </select>
                    <br/>
                    <textarea name="message" required placeholder="Message"></textarea>
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