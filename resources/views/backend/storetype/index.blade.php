@extends('backend.app')

@section('title')
    Storetypes
@endsection

@section('content')
    <div class="container py-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-none">
                    <div class="card-header">
                        <a href="/stores/create" class="btn btn-outline-info">Add Store Type</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>S.N</th>
                                <th>Icon</th>
                                <th>Store Type</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($storetypes as $storetype)
                                <tr>
                                    <td>{{ $storetype->id }}</td>
                                    <td><img src="{{ $storetype->image }}" width="30" alt=""></td>
                                    <td>{{ $storetype->name }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                <a href="/stores/{{ $storetype->id }}/edit" class="badge badge-info">Edit</a>
                                            </div>
                                            <div class="col">
                                                <form action="/stores/{{$storetype->id}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn badge bg-danger">Delete</button>
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