@extends('backend.app')

@section('title')
    Featured Products
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/product/create" class="btn btn-outline-info">Add Product</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Unit</th>
                            <th>Discount</th>
                            <th>Is Featured</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($featured_products as $featured_product)
                        <tr>
                            <td>{{ $featured_product->id }}</td>
                            <td>{{ $featured_product->name }}</td>
                            <td>
                                <img src="{{asset($featured_product->featured_image)}}" width="30" alt="">
                            </td>
                            <td>
                                Rs. {{$featured_product->price}}
                            </td>
                            <td>
                                {{$featured_product->unit->name}}
                            </td>
                            <td>
                                {{$featured_product->Discount ?? '----'}}
                            </td>
                            <td>
                                @if ($featured_product->is_featured == 1 )
                                <span class="badge btn bg-info">Yes</span>
                                @else
                                <p class="badge btn bg-danger">No</p>
                                @endif
                            </td>
                            <td>
                                <a href="/featured_product/{{$featured_product->id}}/edit"
                                    class="badge btn bg-info">Edit</a>
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