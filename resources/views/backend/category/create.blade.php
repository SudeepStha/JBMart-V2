@extends('backend.app')

@section('title')
    Create Category
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/category" class="btn btn-outline-info">Back</a>
                </div>
                <div class="card-body">
                    <form action="/category" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input id="name" class="form-control" type="text" name="name"
                                placeholder="Create Category Name (Food, Vegetable)">
                        </div>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input id="image" class="form-control-file" type="file" name="image"
                                onchange="readURL(this);">
                            <img id="blah" src="" class="my-2" />
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
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