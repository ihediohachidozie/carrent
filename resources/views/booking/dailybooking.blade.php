@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 center">
    <h1 class="mt-4">Booking details for {{date('Y-m-d')}}</h1>

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
                                <th>Vehicle</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Address</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Transaction ID</th>
                                <th>Vehicle</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Address</th> 
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($dailybookings) > 0)

                            @for($i = 0; $i < count($dailybookings); $i++)
                            <tr>
                                <td>{{$dailybookings[$i]->id}}</td>
                                <td>{{$dailybookings[$i]->transaction->id}}</td>
                                <td>{{$dailybookings[$i]->vehicle->brand}} {{' '}} {{$dailybookings[$i]->vehicle->model}} </td>
                                <td>{{$dailybookings[$i]->transaction->firstname}}{{' '}}{{$dailybookings[$i]->transaction->lastname}}</td>
                                <td>{{$dailybookings[$i]->transaction->address}}</td>
                                <td>{{$dailybookings[$i]->transaction->phone}}</td>
                                
                 
                                
  
                            </tr>

                            @endfor

                          
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