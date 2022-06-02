@extends('layouts.home')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Currently Booked {{$dailybookings}} </div>

                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('home.dailybookings')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Warning Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Success Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Danger Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i>
                    {{date('Y')}} Monthly Revenue in Pie Chart
                </div>
                <div class="card-body"><canvas id="myPieChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    {{date('Y')}} Monthly Revenue in Bar Chart
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Ambulance Operational Status
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

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Brand Name</th>
                        <th>Model</th>
                        <th>Description</th>
                        <th>Cost</th>
                        <th>Status</th>
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

                    </tr>

                    @endforeach
                    @else
                    @endif
                </tbody>
            </table>
            
        </div>
    </div>
</div>

@endsection

