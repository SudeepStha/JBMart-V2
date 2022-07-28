@extends('backend.app')

@section('title')
    Edit Order
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/order" class="btn btn-outline-info">Back</a>
                </div>
                <div class="card-body">
                    <form action="/order/create" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-10 mx-auto">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h3 class="mb-0 h4"><strong>JB MART DHARAN</strong></h3>
                                        <small class="text-danger">Dharan 10</small>
                                        <p>Groceries</p>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-flushed table-sm border-bottom">
                                            @foreach ($orders as $order)
                                            <tr>
                                                <th style="max-width: 120px">ORDER NO.</th>
                                                <td style="width: 50%">{{$order->id}}</td>
                                                <td style="width: 10%">Date:</td>
                                                <td>{{$order->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <th style="max-width: 120px">Customer:</th>
                                                <td style="width: 50%">{{$order->user->name}}</td>
                                                <td style="width: 10%">Contact:</td>
                                                <td>{{$order->user->mobile}}</td>
                                            </tr>
                                            <tr>
                                                <td style="max-width: 120px">Address:</td>
                                                <td style="width: 50%" colspan="3">{{$order->address->city}}</td>
                                            </tr>
                                            <tr>
                                                <td style="max-width: 120px">Seller:</td>
                                                <td style="width: 50%" colspan="3">{{$order->store->store_name}}</td>
                                            </tr>
                                            @endforeach

                                           

                                            <table class="table border-bottom my-3 table-sm">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>Item</th>
                                                        <th>Qty</th>
                                                        <th>Rate</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @foreach ($order_detail as $details)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $details->product->name }}</td>
                                                        <td>{{ $details->qty }}</td>
                                                        <td>{{ $details->rate }}</td>
                                                        <td>{{ $details->amount }}</td>
                                                    </tr>   
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="4" style="text-align: end">Total:</td>
                                                        <td class="text-center">200</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" style="text-align: end">Delivery Charge:</td>
                                                        <td class="text-center">200</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" style="text-align: end">Net Total:</td>
                                                        <td class="text-center">200</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select class="form-select form-control"
                                                        aria-label="Default select example">
                                                        <option selected>Status</option>
                                                        <option value="1">Pending</option>
                                                        <option value="2">Approved</option>
                                                        <option value="3">Delivered</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="py-1">
                                                        <label for="">Collected By:</label>
                                                        <span class="text-danger">Delivery Name</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <button type="submit"
                                                        class="btn btn-outline-danger w-50">Save</button>
                                                </div>
                                            </div>

                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection