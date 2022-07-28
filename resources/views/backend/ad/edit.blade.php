@extends('backend.app')

@section('title')
    Edit Ads
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/ad" class="btn btn-outline-info">Back</a>
                </div>
                <div class="card-body">
                    <form action="/ad/{{$ad->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Advertise Name <span class="text-danger">*</span></label>
                                    <input id="name" class="form-control" type="text" name="ad_name"
                                        value="{{$ad->ad_name}}">
                                    @error('ad_name')
                                    <p><b class="text-danger">{{$message}}</b></p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="url">URL Link</label>
                                    <input id="url" class="form-control" type="text" name="url" value="{{$ad->url}}">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="expire">Expire Date <span class="text-danger">*</span></label>
                                    <input id="expire" class="form-control" type="date" name="expire_date"
                                        value="{{$ad->expire_date}}">
                                    @error('expire_date')
                                    <p><b class="text-danger">{{$message}}</b></p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ad">Advertise Run Time <span class="text-danger">*</span></label>
                                    <input id="ad" class="form-control" type="number" name="ad_run"
                                        value="{{$ad->run_ad_for}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image <span class="text-danger">*</span></label>
                                    <input id="image" class="form-control-file" type="file" name="image"
                                        accept="image/*" onchange="readURL(this);">
                                    <img src="" alt="" srcset="" id="blah" width="120">
                                    @error('image')
                                    <p><b class="text-danger">{{$message}}</b></p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success">Update Record</button>
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