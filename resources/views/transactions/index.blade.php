@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 center">
    <h1 class="mt-4">Transactions</h1>

    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Transaction details

                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>ID</th>
                                <th>Amount</th>
                                <th>Customer</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Reference</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>ID</th>
                                <th>Amount</th>
                                <th>Customer</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Reference</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($transactions) > 0)
                            @foreach($transactions as $transaction)
                            <tr>
                                <td>{{$transaction->created_at}}</td>
                                <td>{{$transaction->id}}</td>
                                <td>@money($transaction->amount)</td>
                                <td>{{$transaction->firstname}} {{' '}} {{$transaction->lastname}}</td>
                                <td>{{$transaction->address}}</td>
                                <td>{{$transaction->email}}</td>
                                <td>{{$transaction->phone}}</td>
                                <td>{{$transaction->reference}}</td>
                                <td>
                                    <a href="{{route('transaction.show', [$transaction])}}">
                                    {{$transaction->status}}
                                    </a>
                                </td>
                                
                            </tr>

                            @endforeach
                            @else
                            <tr>
                                <td class="text-center" colspan="9"> No record found </td>
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