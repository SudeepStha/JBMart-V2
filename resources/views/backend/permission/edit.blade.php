@extends('backend.app')

@section('title')
    Edit Permission
@endsection

@section('content')
    <div class="container py-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-none">
                    <div class="card-body">
                       <form action="/permission/{{ $permission->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Permission <span class="text-danger">*</span></label>
                            <input id="name" class="form-control" type="text" name="name" placeholder="eg edit article" value="{{ $permission->name }}">
                        </div>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <button type="submit" class="btn btn-outline-success">Update Record</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-none">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Permission</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td><a href="/permission/{{ $permission->id }}/edit" class="badge badge-info">Edit</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection