@extends('backend.app')

@section('title')
    Advertisements
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/ad/create" class="btn btn-outline-info">Add Advertise</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Advertise Name</th>
                            <th>Image</th>
                            <th>URL link</th>
                            <th>Expire Date</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($ads as $ad)
                        <tr>
                            <td>{{$ad->id}}</td>
                            <td>{{$ad->ad_name}}</td>
                            <td>
                                <img src="{{asset($ad->image)}}" alt="" width="40">
                            </td>
                            <td>{{$ad->url}}</td>
                            <td>{{date('d-m-Y', strtotime($ad->expire_date))}}

                            </td>
                            <td>
                                <a href="/ad/{{$ad->id}}/edit" class="btn badge bg-info">edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection