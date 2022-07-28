@extends('backend.app')

@section('title')
    Edit Delivery
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/delivery" class="btn btn-outline-info">Back</a>
                </div>
                <div class="card-body">
                    <form action="/delivery/{{$delivery->id}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" class="form-control" type="text" name="name"
                                        value="{{$delivery->name}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input id="address" class="form-control" type="text" name="address"
                                        value="{{$delivery->address}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select id="gender" class="form-control" name="gender" value="{{$delivery->gender}}">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input id="contact" class="form-control" type="text" name="contact"
                                        value="{{$delivery->contact}}">
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