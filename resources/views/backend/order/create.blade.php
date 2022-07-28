@extends('backend.app')

@section('title')
    Create Order
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/order" class="btn btn-outline-info">Back</a>
                </div>
                <div class="card-body">
                    <form action="/order" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Order Name</label>
                                    <input id="" class="form-control" type="text" name="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Order Date</label>
                                    <input id="date" class="form-control" type="datetime-local" name="date">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success">Save Record</button>
                        @if (session('message'))
                        <div class="my-3 alert alert-success">
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