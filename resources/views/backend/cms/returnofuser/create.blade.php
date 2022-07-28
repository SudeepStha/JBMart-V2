@extends('backend.app')

@section('title')
    Create Return
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/return_policy" class="btn btn-outline-info">Back</a>
                </div>
                <div class="card-body">
                    <form action="/return_policy" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Title <span class="text-danger">*</span></label>
                            <input id="name" class="form-control" type="text" name="title"
                                placeholder="Return of User Policy">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Store Description -->
                        <div class="form-group">
                            <label for="short_description">Short description</label>
                            <textarea class="form-control" id="editor" name="description" rows="3"></textarea>
                            @error('description')
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