@extends('backend.app')

@section('title')
Orders
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <button class="btn btn-outline-primary">Latest Orders</button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Order No.</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Seller</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>{{ $order->address->city }}</td>
                            <td>{{ $order->user->mobile }}</td>
                            <td>{{ $order->store->store_name}}</td>
                            <td>{{ $order->grand_total }}</td>
                            <td>
                                <form action="" method="post">
                                    <a href="/order/{{ $order->id }}/edit" class="btn badge bg-warning">View</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection