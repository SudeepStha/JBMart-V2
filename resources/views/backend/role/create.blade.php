@extends('backend.app')

@section('title')
    Create Role
@endsection

@section('content')
    <div class="container py-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-none">
                    <div class="card-body">
                       <form action="/role" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Role <span class="text-danger">*</span></label>
                            <input id="name" class="form-control" type="text" name="name" placeholder="eg Admin, Seller">
                        </div>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        @foreach ($permissions  as $permission)
                        <div class="form-check">
                            <input class="form-check-input" name="permission[]" multiple type="checkbox" value="{{ $permission->id }}" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              {{ $permission->name }}
                            </label>
                          </div>
                        @endforeach

                        <button type="submit" class="btn btn-outline-success my-4">Save Record</button>
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
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td><a href="/role/{{ $role->id }}/edit" class="badge badge-info">Edit</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection