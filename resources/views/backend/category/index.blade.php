@extends('backend.app')

@section('title')
    Categories
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/category/create" class="btn btn-outline-info">Add Category</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Icon</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($categories as $key=> $category)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td><img src="{{ $category->image }}" width="30" alt=""></td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <form action="/category/{{ $category->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="/category/{{ $category->id }}/edit" class="badge badge-info">Edit</a>
                                    <button type="submit" class="badge bg-danger btn">Delete</button>
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