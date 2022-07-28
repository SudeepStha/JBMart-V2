@extends('backend.app')

@section('title')
    Edit Role
@endsection

@section('content')
    <div class="container py-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-none">
                    <div class="card-body">
                       <form action="/role/{{ $role->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Role <span class="text-danger">*</span></label>
                            <input id="name" class="form-control" type="text" name="name" placeholder="eg Admin, Seller" value="{{ $role->name }}">
                        </div>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                            <label for="permission">Assign Permission</label>
                           <div class="row">
                               @foreach ($permissions as $permission)
                                  <div class="col-md-2">
                                    <label for="permission">{{ $permission->name }}</label>
                                    <input type="checkbox" name="permission[]" multiple id="" value="{{ $permission->id }}">
                                  </div>
                               @endforeach
                           </div>
                        </div>

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