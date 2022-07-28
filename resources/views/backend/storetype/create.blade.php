@extends('backend.app')

@section('title')
    Create Storetype
@endsection

@section('content')
    <div class="container py-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-none">
                    <div class="card-header">
                        <a href="/stores" class="btn btn-outline-info">Back</a>
                    </div>
                    <div class="card-body">
                       <form action="/stores" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input id="name" class="form-control" type="text" name="name" placeholder="Store Type (eg Restaurant,Bakery)">
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input id="image" class="form-control-file" type="file" name="image" onchange="readURL(this);">
                            <img id="blah" src="" class="my-2"  />
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