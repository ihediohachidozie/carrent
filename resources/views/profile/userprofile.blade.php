@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">User Profile</h1>

    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-user me-1"></i>
                    User Information
                </div>
                <div class="card-body">
                    <form action="{{route('user.name', [auth()->user()])}}" method="post">

                        @method('PUT')

                        <div class="col-md">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{auth()->user()->email}}" disabled>
                                <label for="floatingInputGrid">Email address</label>
                            </div>
                        </div>
                        <div class="col-md mt-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" value="{{strtoupper(auth()->user()->name)}}">
                                <label for="floatingSelectGrid">Full Name</label>
                            </div>
                        </div>
                        @csrf

                        <div class="d-grid gap-2 mt-3">
                            <button class="btn btn-primary" type="submit">Update</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-key me-1"></i>
                    Change Password
                </div>
                <div class="card-body">
                    <form action="{{route('user.password', [auth()->user()])}}" method="post">
                        @method('PUT')

                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input class="form-control @error('currentpassword') is-invalid @enderror" id="password" type="password" name="currentpassword" placeholder="Current Password" autocomplete="current-password" />
                                <label for="inputEmail">Password</label>
                                @error('currentpassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="New Password" autocomplete="new-password" />
                                        <label for="inputEmail">Password</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input class="form-control @error('password-confirm') is-invalid @enderror" id="password-confirm" type="password" placeholder="Repeat New Password" name="password_confirmation" autocomplete="new-password" />
                                        <label for="inputEmail">Confirm Password</label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf

                        <div class="d-grid gap-2 mt-2">
                            <button class="btn btn-primary" type="submit">Reset Password</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (session('name'))
    <div class="alert alert-success mt-2" role="alert">
        {{ session('name') }}
    </div>
    @elseif(session('password'))
    <div class="alert alert-success mt-2" role="alert">
        {{ session('password') }}
    </div>
    @endif



</div>

@endsection