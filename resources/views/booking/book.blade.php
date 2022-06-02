<!DOCTYPE html>
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


            <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>



            @include('pages.subs.nav')
          </div>


        </div>
      </div>

    </header>

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-2 overlay innerpage" style="background-image: url('{{asset('assets/img/vehicles/'.$vehicle->img_url)}}')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <h1>Booking Details</h1>
              <p>Carefully complete the form below and click on rent now to proceed with payment.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section pt-0 pb-0 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12">
            @if($errors->any())
            <div class="alert alert-danger">
              <p>{{$errors->first()}}</p>
            </div>

            @endif
            <form class="trip-form" method="post" action="{{route('store.transaction')}}">
              @csrf
              <div class="row align-items-center mb-4">
                <div class="col-md-6">
                  <h3 class="m-0">Booking form</h3>
                </div>
                <div class="col-md-6 text-md-right">
                  <span class="text-primary">32</span> <span>cars available</span></span>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="cf-3">Start date</label>
                  <input type="text" id="from" name="start_date" class="form-control px-3 @error('start_date') is-invalid @enderror" placeholder="Your start date" autocomplete="off">
                  @error('start_date')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-3">
                  <label for="cf-4">End date</label>
                  <input type="text" id="to" name="end_date" class="form-control px-3 @error('end_date') is-invalid @enderror" placeholder="Your end date" autocomplete="off">
                  @error('end_date')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-3">
                  <label for="cf-1">First Name</label>
                  <input type="text" id="cf-1" name="firstName" placeholder="Your first name" class="form-control @error('firstName') is-invalid @enderror" value="{{ old('firstName') }}">
                  @error('firstName')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-3">
                  <label for="cf-2">Last Name</label>
                  <input type="text" id="cf-2" name="lastName" placeholder="Your last name" class="form-control @error('lastName') is-invalid @enderror" value="{{ old('lastName') }}">
                  @error('lastName')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

              </div>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="cf-1">Email</label>
                  <input type="email" id="cf-1" name="email" placeholder="Your email address" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-3">
                  <label for="cf-2">Phone</label>
                  <input type="text" id="cf-2" name="phone" placeholder="Your phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                  @error('phone')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="cf-3">Address</label>
                  <input type="text" id="from" name="address" placeholder="Your address" class="form-control px-3 @error('address') is-invalid @enderror" value="{{ old('address') }}" autocomplete="off">
                  @error('address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <input type="hidden" name="vehicle_id" value="{{$vehicle->id}}">
                <input type="hidden" name="amount" value="{{$vehicle->cost}}">

              </div>
              <div class="row">
                <div class="col-lg-6">
                  <input type="submit" value="Rent Now" class="btn btn-primary">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>



    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center section-2-title">

        </div>

      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <img src="{{asset('assets/img/vehicles/'.$vehicle->img_url)}}" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 ml-auto">
            <h2>Our History</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit suscipit, repudiandae similique accusantium eius nulla quam laudantium sequi.</p>
            <p>Debitis voluptates corporis saepe molestias tenetur ab quae, quo earum commodi, laborum dolore, fuga aliquid delectus cum ipsa?</p>
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
  @include('partials.book.bookeddays')
  @include('pages.subs.footer')

</body>


</html>