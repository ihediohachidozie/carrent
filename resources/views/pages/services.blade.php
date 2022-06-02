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
                            <a href="index.html">CarRent</a>
                        </div>
                    </div>

                    <div class="col-9  text-right">


                        <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>


                        @include('pages.subs.nav')
                    </div>


                </div>
            </div>

        </header>

        <div class="ftco-blocks-cover-1">
            <div class="ftco-cover-1 overlay innerpage" style="background-image: url('{{asset('assets/carrent/images/hero_2.jpg')}}')">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h1>Our Services</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4 mb-lg-5">
                        <div class="service-1 dark">
                            <span class="service-1-icon">
                                <span class="flaticon-car"></span>
                            </span>
                            <div class="service-1-contents">
                                <h3>Car Key</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-5">
                        <div class="service-1 dark">
                            <span class="service-1-icon">
                                <span class="flaticon-valet-1"></span>
                            </span>
                            <div class="service-1-contents">
                                <h3>Car Key</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-5">
                        <div class="service-1 dark">
                            <span class="service-1-icon">
                                <span class="flaticon-key"></span>
                            </span>
                            <div class="service-1-contents">
                                <h3>Car Key</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-5">
                        <div class="service-1 dark">
                            <span class="service-1-icon">
                                <span class="flaticon-car-1"></span>
                            </span>
                            <div class="service-1-contents">
                                <h3>Repair</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-5">
                        <div class="service-1 dark">
                            <span class="service-1-icon">
                                <span class="flaticon-traffic"></span>
                            </span>
                            <div class="service-1-contents">
                                <h3>Car Accessories</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-5">
                        <div class="service-1 dark">
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



        @include('pages.subs.foot')

    </div>
    @include('pages.subs.footer')

</body>

</html>