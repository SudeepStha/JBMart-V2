@extends('backend.app')

@section('title')
    Banner
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/banner/create" class="btn btn-outline-info">Add Banner</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Slider Name</th>
                            <th>Image</th>
                            <th>URL link</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($banners as $banner)
                        <tr>
                            <td>{{$banner->id}}</td>
                            <td>{{$banner->slider_name}}</td>
                            <td>
                                <img src="{{asset($banner->image)}}" alt="" width="35">
                            </td>
                            <td>{{$banner->url}}</td>
                            <td>{{$banner->user->name}}</td>
                            <td>
                                <form action="/banner/{{$banner->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="/banner/{{$banner->id}}/edit" class="badge bg-info btn">Edit</a>
                                    <button type="submit" class="btn badge bg-danger">Delete</button>
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