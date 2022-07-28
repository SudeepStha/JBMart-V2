@extends('backend.app')

@section('title')
    Delivery Account
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/delivery/create" class="btn btn-outline-info">Create Delivery</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Contact</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($deliveries as $keys=> $delivery)
                        <tr>
                            <td>{{++$keys}}</td>
                            <td>{{$delivery->name}}</td>
                            <td>{{$delivery->address}}</td>
                            <td>{{$delivery->gender}}</td>
                            <td>{{$delivery->contact}}</td>
                            <td>
                                <form action="/delivery/{{$delivery->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="/delivery/{{$delivery->id}}/edit" class="badge btn bg-info">Edit</a>
                                    <button type="submit" class="badge btn bg-danger">Delete</button>
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