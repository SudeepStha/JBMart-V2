@extends('backend.app')

@section('title')
    Edit Unit
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/unit/create" class="btn btn-outline-info">Back</a>
                </div>
                <div class="card-body">
                    <form action="/unit/{{$unit->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Unit <span class="text-danger">*</span></label>
                            <input id="name" class="form-control" type="text" name="name" placeholder="eg Kg, Pkt" value="{{$unit->name}}">
                        </div>
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <button type="submit" class="btn btn-outline-success my-4">Update Record</button>
                        @if (session('message'))
                            <div class="my-3 alert alert-success text-center">
                                <span >{{session('message')}}</span>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection