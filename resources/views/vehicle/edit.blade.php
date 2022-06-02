@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 center">
    <h1 class="mt-4">Edit Ambulance</h1>

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
            <!--      @if(session('msg'))
            {{ session('msg') }}
            @endif -->
            <form class="row g-3" action="{{route('vehicle.update', $vehicle)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @include('vehicle.form')


                <div class="col-12">
                    <div class="form-check form-switch">
                        @if($vehicle->status == 'Available')
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status">
                        @elseif($vehicle->status == 'Unavailable')
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" checked>

                        @endif
                        <label class="form-check-label" for="flexSwitchCheckChecked">Unavailable for maintenance</label>
                    </div>
                </div>

                <div class="col-12">
                   <a href="{{route('vehicle.index')}}" class="btn btn-dark float-start">Back</a>

                    <button type="submit" class="btn btn-dark float-end">Update</button>
                </div>
            </form>
                </div>
            </div>
        </div>

    </div>


</div>
@endsection