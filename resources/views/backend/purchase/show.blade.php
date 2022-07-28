@extends('backend.app')

@section('title')
    Purchase Details
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/purchase" class="btn btn-outline-info">Back</a>
                </div>
                <div class="card-body">
                   <table class="table" id="myTable">
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                    </tr>
                    
                    @foreach ($purchase_items as $purchase_item)
                    <tr>
                        <td>{{$purchase_item->id}}</td>
                        <td>{{$purchase_item->name}}</td>
                        <td>{{$purchase_item->qty}}</td>
                        <td>{{$purchase_item->unit}}</td>
                    </tr>   
                                    
                    @endforeach
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
