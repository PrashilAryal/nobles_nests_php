@extends('layouts.app')

@section('content')
<div class="row">
    <div class="about_image">
        <img src="{{ asset('../images/about-us.jpg') }}" alt="">
        <div class="about_title">
            <p>Contact Us</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <p class="about_description">
                We are here to assist you with any inquiries, questions, or concerns you may have. Whether you're a
                buyer
                looking for your dream home, a seller wanting to list your property, or you need more information about
                our
                services, we're just a message or call away.
            </p>
            <p class="about_description">
                For immediate assistance, please call our customer support hotline at 9876543210. Our dedicated support
                team is available to help you with any urgent matters.
            </p>
            <p class="about_description">
                Your feedback is important to us. Please share your experience, suggestions, or any issues you
                encountered. We are committed to improving our services and ensuring your satisfaction.

                Thank you for choosing NobleNests. We look forward to hearing from you!
            </p>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <p class="about_sub_title">
                Business Hours
            </p>
            <p class="about_description">
            <ul>
                <li>Monday - Friday: 9:00 AM - 6:00 PM
                </li>
                <li>Saturday: 10:00 AM - 4:00 PM</li>
                <li>Sunday: Closed</li>
            </ul>
            </p>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <p class="about_sub_title">
                Visit Our Office
            </p>
            <p class="about_description">
                Feel free to visit our office during business hours. Our team will be delighted to meet you and assist
                with any real estate needs.
            </p>
            <span>
                <strong>Office Address:</strong>
                Jalpa Chowk, Baniyatar</span>
        </div>
    </div>
</div>
<section class="contactSection mt-5">
    <div class="contactContainer">
        <div class="contactInfo">
            <div>
                <h2>Contact Info</h2>
                <ul class="info">
                    <li>
                        <span><img src="{{ asset('../images/location.png') }}" alt=""></span>
                        <span>
                            Jalpa Chowk, Baniyatar<br>
                            Ward no. 1 <br>
                            Kathmandu, Nepal
                        </span>
                    </li>
                    <li>
                        <span><img src="{{ asset('../images/mail.png') }}" alt=""></span>
                        <span>noblenests@gmail.com</span>
                    </li>
                    <li>
                        <span><img src="{{ asset('../images/phone-call.png') }}" alt=""></span>
                        <span>9876543210</span>
                    </li>
                </ul>
            </div>
            <!-- <ul class="contactSocialMedia">
                <li><a href="#"><img src="{{ asset('../images/location.png') }}" alt=""></a></li>
                <li><a href="#"><img src="{{ asset('../images/location.png') }}" alt=""></a></li>
                <li><a href="#"><img src="{{ asset('../images/location.png') }}" alt=""></a></li>
                <li><a href="#"><img src="{{ asset('../images/location.png') }}" alt=""></a></li>
                <li><a href="#"><img src="{{ asset('../images/location.png') }}" alt=""></a></li>
            </ul> -->
        </div>
        <form action="{{route('send_message')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="contactForm">
                <h2>Send a message</h2>
                @if(Session::has('success'))
                <div class="messageSentSuccess">
                    <span class="">{{Session::get('success')}}</span><br>
                </div>
                @endif
                {{-- @if($errors->any())
                        <span>{{$error}}</span>
                @endif --}}
                <div class="contactFormBox">
                    <div class="contactInputBox w50">
                        <input type="text" name="user_firstname" id="user_firstname" autocomplete="off" required>
                        <span>First Name</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" name="user_lastname" id="user_lastname" autocomplete="off" required>
                        <span>Last Name</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="email" name="user_email" id="user_email" autocomplete="off" required>
                        <span>Email Address</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" name="user_subject" id="user_subject" autocomplete="off" required>
                        <span>Subject</span>
                    </div>
                    <div class="contactInputBox w100">
                        <textarea name="user_message" id="user_message" autocomplete="off" required></textarea>
                        <span>Write your message here...</span>
                    </div>
                    <div class="contactInputBox w50">
                        <button type="submit" class="button button-primary">
                            <a class="button-text">Send</a>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection