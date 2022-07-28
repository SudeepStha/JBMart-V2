@extends('backend.app')

@section('title')
Products
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
                            <th>SKU</th>
                            <th>Name</th>
                            <th>Product Image</th>
                            <th>Unit</th>
                            <th>Price</th>
                            {{--<th>Discount</th>--}}
                            <th>Action</th>
                        </tr>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                <img src="{{$product->featured_image}}" width="30" alt="">
                            </td>
                            <td>
                                {{$product->unit->name}}
                            </td>
                            <td>
                                Rs. {{$product->price}}
                            </td>
                           {{--
                             <td>
                                {{$product->is_discount==0? '-': $product->is_discount}}
                            </td>
                            --}}
                            <td>
                                <div class="row">
                                    <div class="col-3">
                                        <a href="/product/{{ $product->id }}/edit" class="badge badge-info">Edit</a>
                                    </div>
                                    <div class="col-3">
                                       <form action="/product/{{$product->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="badge badge-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                
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