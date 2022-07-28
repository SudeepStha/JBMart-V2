@extends('backend.app')

@section('title')
Purchase
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                  @role('Seller')
                    <a href="/purchase/create" class="btn btn-outline-info">Add Purchase Order</a>
                  @endrole
                </div>
                <div class="card-body">
                    <table class="table">

                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            @role('Admin')
                            <th>Store Name</th>
                            @endrole
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($purchases as $purchase)
                            <tr>
                                <td>{{$purchase->id}}</td>
                                <td>{{$purchase->date}}</td>
                                @role('Admin')
                                    <td>{{$purchase->store->store_name}}</td>
                                @endrole
                                <td>{{$purchase->status}}</td>
                                <td>{{$purchase->remarks}}</td>
                                <td>
                                    <a href="/purchase/{{$purchase->id}}" class="badge badge-info">View</a>
                                    @role('Admin')
                                    <a href="/purchase/{{$purchase->id}}/edit" class="badge badge-info">Edit</a>
                                    @endrole
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