<section class="section-property section-t8 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-box">
                    <h4 class="title-a">Popular Properties</h4>
                </div>
            </div>
        </div>

        <div id="property-carousel" class="swiper">
            <div class="swiper-wrapper">
                @foreach($properties as $property)
                @if(!$property->is_deleted)
                <div class="carousel-item-b swiper-slide ">
                    <div class="card-box card-shadow">
                        <div class="img-box">
                            <img src="{{asset('/uploads'.'/'.$property->photos->first()->path_name)}}" alt="" class="img-a img-fluid">
                        </div>
                        <div class="card-overlay ">
                            <div class="card-overlay-content">
                                <div class="card-detail">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <a
                                                href="{{ route('properties.show', $property->id) }}">{{ $property->title }}</a>
                                        </h3>
                                    </div>
                                    <div>
                                        <h4 class="text-white fw-bold"> $
                                            {{ number_format($property->booking_price, 2) }}
                                        </h4>
                                        <!-- <Button class="button button-secondary">
                                            <span class="button-text">
                                                Book
                                            </span>
                                        </Button> -->
                                        <a href="{{ route('properties.show', $property->id) }}" class="link-a">View
                                            Details
                                            <span class="bi bi-chevron-right"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-footer-a">
                                    <ul class="card-info d-flex justify-content-around">
                                        <li>
                                            <h4 class="card-info-title">Area (sq.ft.)</h4>
                                            <span>{{ $property->area }}
                                            </span>
                                        </li>
                                        <li>
                                            <h4 class="card-info-title">Beds</h4>
                                            <span>{{ $property->bedrooms }}</span>
                                        </li>
                                        <!-- <li>
                                            <h4 class="card-info-title">Baths</h4>
                                            <span>4</span>
                                        </li> -->
                                        <li>
                                            <h4 class="card-info-title">Kitchens</h4>
                                            <span>{{ $property->kitchens }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="property-carousel-pagination carousel-pagination"></div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('#property-carousel', {
            speed: 600,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            slidesPerView: 'auto',
            pagination: {
                el: '.property-carousel-pagination', // Ensure this matches the HTML
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
    });
</script>