@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Reset Password</h3>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-floating mb-3">
                            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" placeholder="name@example.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                            <label for="inputEmail">Email address</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password" />
                            <label for="inputEmail">Password</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control @error('password-confirm') is-invalid @enderror" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <label for="inputEmail">Confirm Password</label>

                        </div>

                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                            <button type="submit" class="btn btn-primary">
                                {{ __('Reset Password') }}
                            </button>
                            <!-- <a class="btn btn-primary" href="login.html">Reset Password</a> -->
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection