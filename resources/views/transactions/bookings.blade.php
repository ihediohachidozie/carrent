@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 center">
    <h1 class="mt-4">Bookings</h1>

    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Booking details

                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Transaction ID</th>
                                <th>Vehicle & Model</th>
                                <th>Days Booked</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Transaction ID</th>
                                <th>Vehicle & Model</th>
                                <th>Days</th>
                            </tr>
                        </tfoot>
                        <tbody>
                         
                            @for($i = 0; $i < count($booking); $i++)
                            <tr>
                                <td>{{$booking[$i]->id}}</td>
                                <td>{{$booking[$i]->transaction->id}}</td>
                                
                                <td>{{$booking[$i]->vehicle->brand}} {{' '}} {{$booking[$i]->vehicle->model}} </td>
                                <td>{{$booking[$i]->days}}</td>
                 
                                
  
                            </tr>

                            @endfor
                            
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection