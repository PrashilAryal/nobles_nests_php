<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noble Nests</title>
    <!-- <link rel="stylesheet" href="{{ asset('/css/app.css') }}"> -->
    <link rel="stylesheet" href="{{ url('../../../../css/app.css') }}">
    <link rel="stylesheet" href="{{ url('../../../../css/contactUs.css') }}">
    <link rel="stylesheet" href="{{ url('../../../../css/aboutUs.css') }}">
    <link rel="stylesheet" href="{{ url('../../../../css/carousel.css') }}">
    <link rel="stylesheet" href="{{ url('../../../../css/blog.css') }}">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    </body>
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('partials.navbar1')

    <div class="">
        @yield('content')
    </div>
    @include('partials.footer')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script>
        (function() {
            "use strict";

            // Helper function to select an element
            const select = (el, all = false) => {
                el = el.trim();
                if (all) {
                    return [...document.querySelectorAll(el)];
                } else {
                    return document.querySelector(el);
                }
            };

            // Helper function to listen for events
            const on = (type, el, listener, all = false) => {
                let selectEl = select(el, all);
                if (selectEl) {
                    if (all) {
                        selectEl.forEach(e => e.addEventListener(type, listener));
                    } else {
                        selectEl.addEventListener(type, listener);
                    }
                }
            };

            // // Navbar scroll change
            // let selectHNavbar = select('.navbar-default');
            // if (selectHNavbar) {
            //     window.addEventListener('scroll', () => {
            //         if (window.scrollY > 100) {
            //             selectHNavbar.classList.add('navbar-reduce');
            //             selectHNavbar.classList.remove('navbar-trans');
            //         } else {
            //             selectHNavbar.classList.remove('navbar-reduce');
            //             selectHNavbar.classList.add('navbar-trans');
            //         }
            //     });
            // }

            let body = select('body');
            on('click', '.navbar-toggle-box', function(e) {
                e.preventDefault();
                body.classList.add('box-collapse-open');
                body.classList.remove('box-collapse-closed');
            });

            on('click', '.close-box-collapse', function(e) {
                e.preventDefault();
                body.classList.remove('box-collapse-open');
                body.classList.add('box-collapse-closed');
            });

            document.addEventListener('DOMContentLoaded', function() {
                // Property carousel
                new Swiper('#property-carousel', {
                    speed: 600,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false
                    },
                    slidesPerView: 'auto',
                    pagination: {
                        el: '.carousel-pagination',
                        type: 'bullets',
                        clickable: true
                    },
                    breakpoints: {
                        320: {
                            slidesPerView: 1,
                            spaceBetween: 20
                        },
                        1200: {
                            slidesPerView: 3,
                            spaceBetween: 20
                        }
                    }
                });

                // Property single carousel
                new Swiper('#property-single-carousel', {
                    speed: 600,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false
                    },
                    pagination: {
                        el: '.property-single-carousel-pagination',
                        type: 'bullets',
                        clickable: true
                    }
                });
            });
            document.addEventListener('DOMContentLoaded', function() {
                const navLinks = document.querySelectorAll('.nav-link-t');
                const currentUrl = window.location.href;

                // Function to remove 'active' class from all links
                function removeActiveClass() {
                    navLinks.forEach(link => {
                        link.classList.add('navbar-reduce');
                        link.classList.remove('navbar-trans');
                        link.classList.remove('active');
                    });
                }

                // Add event listeners to each nav link
                navLinks.forEach(link => {
                    // Set the active class based on URL
                    if (link.href === currentUrl) {
                        link.classList.add('active');
                        localStorage.setItem('activeLink', link
                            .href); // Save the active link to localStorage
                    }

                    link.addEventListener('click', function() {
                        removeActiveClass(); // Remove 'active' from all links
                        this.classList.add('active'); // Add 'active' to the clicked link
                        this.classList.add('navbar-reduce');
                        this.classList.remove('navbar-trans');
                        localStorage.setItem('activeLink', this
                            .href); // Save the active link to localStorage
                    });
                });

                // Load the active link from localStorage on page load
                const activeLink = localStorage.getItem('activeLink');
                if (activeLink) {
                    removeActiveClass();
                    navLinks.forEach(link => {
                        if (link.href === activeLink) {
                            link.classList.add('active');
                        }
                    });
                }
            });

        })();
    </script>
</body>

</html>