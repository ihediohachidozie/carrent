@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 center">
    <h1 class="mt-4">Add Ambulance</h1>

    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-ambulance me-1"></i>
                    Fleet Information

                </div>
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <p>{{$errors->first()}}</p>
                    </div>

                    @endif
  
                    <form class="row g-3" method="post" action="{{route('vehicle.store')}}" enctype="multipart/form-data">
                        @include('vehicle.form')
                        <div class="col-12">
                        <a href="{{route('vehicle.index')}}" class="btn btn-dark float-start">Back</a>
                            <button type="submit" class="btn btn-dark float-end">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


</div>
@endsection