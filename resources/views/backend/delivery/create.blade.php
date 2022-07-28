@extends('backend.app')

@section('title')
    Create Delivery
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
                    <form action="/delivery" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input id="name" class="form-control" type="text" name="name">
                                </div>
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                           

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="address">Address <span class="text-danger">*</span></label>
                                    <input id="address" class="form-control" type="text" name="address">
                                </div>
                                @error('address')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="contact">Contact <span class="text-danger">*</span></label>
                                        <input id="contact" class="form-control" type="text" name="contact">
                                    </div>
                                    @error('contact')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="gender">Gender <span class="text-danger">*</span></label>
                                        <select id="gender" class="form-control" name="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
        
                                   
        
                            </div>
                        <button type="submit" class="btn btn-outline-success">Save Record</button>
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