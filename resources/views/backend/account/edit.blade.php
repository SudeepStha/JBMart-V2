@extends('backend.app')

@section('title')
    Edit Account
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/accounts" class="btn btn-outline-info">Back</a>
                </div>
                <div class="card-body">
                    <form action="/accounts/{{ $account->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input id="name" class="form-control" type="text" name="name"
                                        placeholder="Full Name" value="{{ $account->name }}">
                                </div>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mobile">Mobile <span class="text-danger">*</span></label>
                                    <input id="mobile" class="form-control" type="tel" name="mobile"
                                        placeholder="mobile" value="{{ $account->mobile }}">
                                </div>
                                @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">email <span class="text-danger">*</span></label>
                                    <input id="email" class="form-control" type="email" name="email" placeholder="Email"
                                        value="{{ $account->email }}">
                                </div>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select id="role" class="form-control select2" name="role[]" multiple>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ $role->id == $account->role ? 'selected' : '' }}>{{ $role->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success">Update Record</button>
                        @if (session('message'))
                        <div class="my-3 alert alert-success text-center">
                            <span>{{session('message')}}</span>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection