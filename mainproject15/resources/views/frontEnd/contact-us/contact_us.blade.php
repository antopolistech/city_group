@extends('frontEnd.master')

@section('title')
Contact Us
@endsection

@section('mainContent')

<!-- Banner Start -->
<section class="banner-area contact-us-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!--<h1 class="text-uppercase text-center">Contact Us</h1>-->
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->

<!--Social Page Links Area Start-->
@include('frontEnd.includes.social')
<!--Social Page Links Area End-->

<!-- Contact Us Area Start -->
<section class="contact-us-area text-center section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <h3>Write to us</h3>
                <!--Contact Form Start-->
                <div class="col-sm-12 text-center">
                    <span class="text-success" id="after_success_send_mail" style="padding-bottom: 20px;display: block;"></span>
                </div>
                <form action="{{route('contact-us.store')}}" method="post" id="contact_mail_frm">
                    @csrf
                    <div class="form-group col-sm-6">
                        <input type="text" name="name" class="form-control" id="contact_name" placeholder="Name">
                        <span class="text-danger error-contact_name"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="text" name="phone" class="form-control" id="contact_phone" placeholder="Phone">
                        <span class="text-danger error-contact_phone"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="email" name="email" class="form-control" id="contact_email" placeholder="Email">
                        <span class="text-danger error-contact_email"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="text" name="subject" class="form-control" id="contact_subject" placeholder="Subject">
                        <span class="text-danger error-contact_subject"></span>
                    </div>
                    <div class="form-group col-sm-12">
                        <textarea name="msg" placeholder="Type your Message" id="contact_msg"></textarea>
                        <span class="text-danger error-contact_msg"></span>
                    </div>

                    <span class="text-danger" id="google_recaptcha_error" style="padding-bottom: 20px;display: block;"></span>

                    <div class="col-sm-12 text-center">
                        <div class="g-recaptcha" data-sitekey="6LcgaVgUAAAAAONIksQOrtTfWjgbRmuWHtEvbhHB"></div>
                    </div>

                    
                    <div class="form-group col-sm-12">
                        <div class="know-more-button">
                            <button class="button" type="submit" name="submit"><span>Send </span></button>
                        </div>
                    </div>
                </form>
                <!--Contact Form End-->
            </div>
            <div class="col-sm-7 padding-zero">
                <div class="address-part-area">
                    <h3>Our Contact info</h3>
                    <div class="col-sm-4 single-address-box">
                        <i class="fa fa-map-marker"></i>
                        <h4>Find us at:</h4>
                        <p> City House,<br>
                            Plot # NW (J) 06,<br>
                            Road # 51, Gulshan - 02,
                            Dhaka-1212, Bangladesh</p>
                    </div>
                    <div class="col-sm-3 single-address-box">
                        <i class="fa fa-phone"></i>
                        <h4>Call us on:</h4>
                        <p>
                            <span>Reception:</span>
                            <a href="tel:+8809611611777">+880-9611 611 777</a><br>
                            <span>Marketing:</span>
                            <a href="tel:+8809611611333">+880-9611 611 333</a>
                        </p>
                    </div>
                    <div class="col-sm-5 single-address-box">
                        <i class="fa fa-envelope-o"></i>
                        <h4>E-Mail us on:</h4>
                        <p>
                            <!--<span>General:</span>-->
                            <a href="mailto:corporate@citygroupbd.com">corporate@citygroupbd.com</a><br>
                            <!--<span>Career:</span>-->
                            <a href="mailto:career@citygroupbd.com">career@citygroupbd.com</a>
                            <!--<span>Sales:</span>-->
                            <a href="mailto:marketing@citygroupbd.com">marketing@citygroupbd.com</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <!--Google Map Start-->
                <div class="map-area">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14051.743226051201!2d90.40525325040821!3d23.788311066714368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c709da8a2dfd%3A0x9e0057bdb03e3142!2sCity+Group!5e0!3m2!1sen!2sbd!4v1510141944279" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Us Area End -->

@endsection


@section('script')

<!--  silder add & validation using ajax -->
$('#contact_mail_frm').submit(function( event ) {
    event.preventDefault();
    var url =  $(this).attr('action');
    var method =  $(this).attr('method');

    $(".error-contact_name").text('');
    $(".error-contact_phone").text('');
    $(".error-contact_email").text('');
    $(".error-contact_subject").text('');
    $(".error-contact_msg").text('');

$.ajax({
    type: method,
    url: url,
    enctype: 'multipart/form-data',
    contentType: false,
    processData: false,
    data: new FormData(this),
    success: function(response){
    console.log(response);
    if(response.msg){
        $('#after_success_send_mail').text(response.msg);
    }
    if(response.msg2){
        $('#google_recaptcha_error').text(response.msg2);
    }
        $('#contact_name').val('');
        $('#contact_phone').val('');
        $('#contact_email').val('');
        $('#contact_subject').val('');
        $('#contact_msg').val('');
        if (window.grecaptcha) {
            grecaptcha.reset();
         }
    },
    error: function(response){
        
    console.log(response.responseJSON.errors);
        if(response.responseJSON.errors){
            $(".error-contact_name").text(response.responseJSON.errors.name);
            $(".error-contact_phone").text(response.responseJSON.errors.phone);
            $(".error-contact_email").text(response.responseJSON.errors.email);
            $(".error-contact_subject").text(response.responseJSON.errors.subject);
            $(".error-contact_msg").text(response.responseJSON.errors.msg);
        }
    }
    });
});

@endsection
