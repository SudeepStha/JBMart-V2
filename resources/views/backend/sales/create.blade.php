@extends('backend.app')

@section('title')
Create Sales
@endsection

@section('content')
    <div class="container py-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-none">
                    <div class="card-header">
                        <a href="/sales" class="btn btn-outline-info">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="customer">Customer Name<span class="text-danger">*</span></label>
                                        <input id="customer" class="form-control" type="text" name="customer">
                                        @error('customer')
                                        <p><b class="text-danger">{{$message}}</b></p>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="store">Store Name<span class="text-danger">*</span></label>
                                        <input id="store" class="form-control" type="text" name="store">
                                        @error('store')
                                        <p><b class="text-danger">{{$message}}</b></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="name">Product Name<span class="text-danger">*</span></label>
                                        <input id="name" class="form-control" type="text" name="name">
                                        @error('name')
                                        <p><b class="text-danger">{{$message}}</b></p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="name">Quantity<span class="text-danger">*</span></label>
                                        <input id="name" class="form-control" type="text" name="name">
                                        @error('name')
                                        <p><b class="text-danger">{{$message}}</b></p>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="unit">Unit<span class="text-danger">*</span></label>
                                        <input id="unit" class="form-control" type="text" name="unit">
                                        @error('unit')
                                        <p><b class="text-danger">{{$message}}</b></p>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="date">Date<span class="text-danger">*</span></label>
                                        <input id="date" class="form-control" type="date" name="date">
                                        @error('date')
                                        <p><b class="text-danger">{{$message}}</b></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="total">Total<span class="text-danger">*</span></label>
                                        <input id="total" class="form-control" type="text" name="total">
                                        @error('total')
                                        <p><b class="text-danger">{{$message}}</b></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline-success" type="submit">Save Record</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection