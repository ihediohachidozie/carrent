<!doctype html>
<html lang="en">

    @include('pages.subs.header')



<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <div class="site-wrap" id="home-section">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>



        <header class="site-navbar site-navbar-target" role="banner">

            <div class="container">
                <div class="row align-items-center position-relative">

                    <div class="col-3 ">
                        <div class="site-logo">
                            <a href="\">CarRent</a>
                        </div>
                    </div>

                    <div class="col-9  text-right">


                        <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-0 text-white"><span class="icon-menu h3 text-white"></span></a></span>

                        @include('pages.subs.nav')
                    </div>


                </div>
            </div>

        </header>

        <div class="ftco-blocks-cover-1">
            <div class="ftco-cover-1 overlay" style="background-image: url('assets/carrent/images/hero_1.jpg')">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="feature-car-rent-box-1">
                                <h3>Range Rover S7</h3>
                                <ul class="list-unstyled">
                                    <li>
                                        <span>Doors</span>
                                        <span class="spec">4</span>
                                    </li>
                                    <li>
                                        <span>Seats</span>
                                        <span class="spec">6</span>
                                    </li>
                                    <li>
                                        <span>Lugage</span>
                                        <span class="spec">2 Suitcase/2 Bags</span>
                                    </li>
                                    <li>
                                        <span>Transmission</span>
                                        <span class="spec">Automatic</span>
                                    </li>
                                    <li>
                                        <span>Minium age</span>
                                        <span class="spec">Automatic</span>
                                    </li>
                                </ul>
                                <div class="d-flex align-items-center bg-light p-3">
                                    <span>$150/day</span>
                                    <a href="#cars" class="ml-auto btn btn-primary">Rent Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section bg-light" id="cars">
            <div class="container">
                @if($errors->any())
                <div class="alert alert-success">
                    <p>{{$errors->first()}}</p>
                </div>

                @endif
                <div class="row">
                    @foreach($vehicles as $vehicle)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="item-1">
                            <a href="#"><img src="{{asset('assets/img/vehicles/'.$vehicle->img_url)}}" alt="Image" class="img-fluid"></a>
                            <div class="item-1-contents">
                                <div class="text-center">
                                    <h3><a href="#">Range Rover S64 Coupe</a></h3>
                                    <div class="rating">
                                        <span class="icon-star text-warning"></span>
                                        <span class="icon-star text-warning"></span>
                                        <span class="icon-star text-warning"></span>
                                        <span class="icon-star text-warning"></span>
                                        <span class="icon-star text-warning"></span>
                                    </div>
                                    <div class="rent-price"><span>@money($vehicle->cost)/</span>day</div>
                                </div>
                                <div class="d-flex action">
                                    <a href="{{route('book', ['id' => $vehicle->id])}}" class="btn btn-primary">Rent Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="site-section section-3" style="background-image: url('assets/carrent/images/hero_2.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <h2 class="text-white">Our services</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="service-1">
                            <span class="service-1-icon">
                                <span class="flaticon-car-1"></span>
                            </span>
                            <div class="service-1-contents">
                                <h3>Repair</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service-1">
                            <span class="service-1-icon">
                                <span class="flaticon-traffic"></span>
                            </span>
                            <div class="service-1-contents">
                                <h3>Car Accessories</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service-1">
                            <span class="service-1-icon">
                                <span class="flaticon-valet"></span>
                            </span>
                            <div class="service-1-contents">
                                <h3>Own a Car</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container site-section mb-5">
            <div class="row justify-content-center text-center">
                <div class="col-7 text-center mb-5">
                    <h2>How it works</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda, dolorum necessitatibus eius earum voluptates sed!</p>
                </div>
            </div>
            <div class="how-it-works d-flex">

                <div class="step">
                    <span class="number"><span>01</span></span>
                    <span class="caption">Pick a Car</span>
                </div>
                <div class="step">
                    <span class="number"><span>02</span></span>
                    <span class="caption">Details</span>
                </div>
                <div class="step">
                    <span class="number"><span>03</span></span>
                    <span class="caption">Payment</span>
                </div>
                <div class="step">
                    <span class="number"><span>04</span></span>
                    <span class="caption">Payment Confirmation</span>
                </div>
                <div class="step">
                    <span class="number"><span>05</span></span>
                    <span class="caption">Thank You</span>
                </div>
            </div>
        </div>


        <div class="site-section bg-light">
            <div class="container">
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-7 text-center mb-5">
                        <h2>Customer Testimony</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda, dolorum necessitatibus eius earum voluptates sed!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="testimonial-2">
                            <blockquote class="mb-4">
                                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
                            </blockquote>
                            <div class="d-flex v-card align-items-center">
                                <img src="{{asset('assets/carrent/images/person_1.jpg')}}" alt="Image" class="img-fluid mr-3">
                                <span>Mike Fisher</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="testimonial-2">
                            <blockquote class="mb-4">
                                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
                            </blockquote>
                            <div class="d-flex v-card align-items-center">
                                <img src="{{asset('assets/carrent/images/person_2.jpg')}}" alt="Image" class="img-fluid mr-3">
                                <span>Jean Stanley</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="testimonial-2">
                            <blockquote class="mb-4">
                                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
                            </blockquote>
                            <div class="d-flex v-card align-items-center">
                                <img src="{{asset('assets/carrent/images/person_3.jpg')}}" alt="Image" class="img-fluid mr-3">
                                <span>Katie Rose</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="site-section bg-white">
            <div class="container">
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-7 text-center mb-5">
                        <h2>Our Blog</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda, dolorum necessitatibus eius earum voluptates sed!</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="post-entry-1 h-100">
                            <a href="single.html">
                                <img src="{{asset('assets/carrent/images/post_1.jpg')}}" alt="Image" class="img-fluid">
                            </a>
                            <div class="post-entry-1-contents">

                                <h2><a href="single.html">The best car rent in the entire planet</a></h2>
                                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="post-entry-1 h-100">
                            <a href="single.html">
                                <img src="{{asset('assets/carrent/images/img_2.jpg')}}" alt="Image" class="img-fluid">
                            </a>
                            <div class="post-entry-1-contents">

                                <h2><a href="single.html">The best car rent in the entire planet</a></h2>
                                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="post-entry-1 h-100">
                            <a href="single.html">
                                <img src="{{asset('assets/carrent/images/img_3.jpg')}}" alt="Image" class="img-fluid">
                            </a>
                            <div class="post-entry-1-contents">

                                <h2><a href="single.html">The best car rent in the entire planet</a></h2>
                                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        @include('pages.subs.foot')

    </div>





    @include('pages.subs.footer')


</body>

</html>