@extends('layouts.app')

@section('content')
<div class="row">
    <div class="about_image">
        <img src="{{ asset('../images/about-us.jpg') }}" alt="">
        <div class="about_title">
            <p>About Us</p>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-6">
            <div class="about_image" style="height: 460px;">
                <img src="{{ asset('../images/about-us.jpg') }}" alt="">
            </div>
        </div>
        <div class="col-6">
            <p class="about_description" style="text-align:justify;">
                Welcome to Noble Nests, the ultimate online destination for luxury and premium real estate. Our platform
                is designed to bring you a seamless and sophisticated experience, whether you're looking to buy, sell,
                or explore exclusive properties.<br />

                At Noble Nests, we understand that finding the perfect home is about more than just location—it's about
                lifestyle, comfort, and the right investment. That's why we've curated a diverse selection of the finest
                homes in prime locations, from opulent villas and modern penthouses to historic estates and beachfront
                properties. <br />

                Our website is equipped with advanced search features, allowing you to filter properties by location,
                price, amenities, and more. With high-quality images, detailed descriptions, and virtual tours, you can
                explore each property from the comfort of your home. <br />

                For sellers, our platform offers a unique opportunity to showcase your property to a global audience of
                discerning buyers. We provide all the tools you need to present your home in the best light, from
                professional photography to comprehensive listing details. <br />

                Whether you're a buyer seeking your dream home or a seller looking to connect with serious buyers, Noble
                Nests is your trusted partner in the luxury real estate market. We are committed to providing
                exceptional service and making your real estate journey as smooth and enjoyable as possible.<br />

                Explore our website today and discover the home of your dreams.
            </p>
        </div>
    </div>
    <div class="row about_text_box mt-5">
        <div class="col-6">
            <p class="about_sub_title">
                Our Mission
            </p>
            <p class="about_description">
                At NobleNests, our mission is to provide an unparalleled real estate experience for
                both sellers and buyers. We strive to offer a platform where sellers can showcase their exquisite
                properties
                and buyers can discover their dream homes effortlessly.
            </p>
        </div>
        <div class="col-6 d-flex justify-content-center align-items-center">
            <img src="{{ asset('../images/mission.png') }}" alt="">
        </div>
    </div>
    <div class="row about_text_box mt-5">
        <div class="col-6 d-flex justify-content-center align-items-center">
            <img src="{{ asset('../images/commitment.png') }}" alt="">
        </div>
        <div class="col-6">
            <p class="about_sub_title">
                Our Commitment
            </p>
            <p class="about_description">
                We are committed to maintaining the highest standards of integrity, professionalism, and
                customer satisfaction. Our goal is to build long-lasting relationships with our clients by consistently
                delivering exceptional service and results.
        </div>
        </p>
    </div>
    <div class="row mt-5">
        <div>
            <p class="about_sub_title">
                Why Choose Us
            </p>
            <ul>
                <li class="about_description"><strong>Exquisite Listings:</strong> Our curated selection of luxury and
                    premium homes includes some
                    of the most
                    desirable properties in prime locations. Each listing is carefully vetted to ensure it meets our
                    high standards of quality and exclusivity.</li>
                <li class="about_description"><strong>Seamless Experience:</strong> Our user-friendly website design and
                    advanced search
                    functionality make it easy
                    for buyers to find properties that match their preferences. Whether you're looking for a modern
                    penthouse, a beachfront villa, or a historic mansion, we have something for every taste.</li>
                <li class="about_description"><strong>Professional Guidance:</strong> We work with experienced real
                    estate agents and property
                    experts who are
                    dedicated to assisting you throughout your buying journey. From initial inquiry to closing the deal,
                    our team is here to provide personalized support and expert advice.</li>
                <li class="about_description"><strong>Direct Communication:</strong> We facilitate direct communication
                    between buyers and sellers
                    or their agents,
                    ensuring a transparent and efficient process. Our platform enables you to contact property owners or
                    agents directly to schedule viewings, ask questions, and negotiate terms.</li>
            </ul>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <p class="about_description">
                Thank you for choosing NobleNests as your trusted partner in the luxury real estate market. We
                look
                forward to helping you find your dream home.
            </p>
            <span><strong>Contact Us</strong></span>
            <p class="about_description">
                For more information or to get started, please contact us at <strong>noblenests@gmail.com</strong>. Our
                team is
                here to
                assist you with any questions or inquiries you may have.
            </p>
        </div>

    </div>
</div>
@endsection