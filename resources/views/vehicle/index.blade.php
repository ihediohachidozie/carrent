@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 center">
    <h1 class="mt-4">Ambulance</h1>

    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-ambulance me-1"></i>
                    Fleet Information
                    <a class="btn btn-dark float-end" href="{{route('vehicle.create')}}">Add</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Brand Name</th>
                                <th>Model</th>
                                <th>Description</th>
                                <th>Cost</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Brand Name</th>
                                <th>Model</th>
                                <th>Description</th>
                                <th>Cost</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($vehicles) > 0)
                            @foreach($vehicles as $vehicle)
                            <tr>
                                <td>{{$vehicle->brand}}</td>
                                <td>{{$vehicle->model}}</td>
                                <td>{{$vehicle->description}}</td>
                                <td>@money($vehicle->cost)</td>
                                <td>{{$vehicle->status}}</td>
                                <td class="text-center">
                                    <a class="btn btn-dark" href="{{route('vehicle.edit', [$vehicle])}}">
                                        edit

                                    </a>
                                </td>

                            </tr>

                            @endforeach
                            @else
                            <tr>
                                <td class="text-center" colspan="6"> No record found </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection