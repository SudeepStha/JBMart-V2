@extends('backend.app')

@section('title')
    About Us
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/about/create" class="btn btn-outline-info">Add About Us</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($abouts as $about)
                            <tr>
                                <td>{{$about->id}}</td>
                                <td style="width: 100px">
                                    {{$about->title}}
                                </td>
                                <td>
                                    <textarea name="" id="editor" readonly>
                                        {{$about->description}}
                                    </textarea>
                                </td>
                                <td>
                                    <a href="/about/{{$about->id}}/edit" class="badge bg-info btn">Edit</a>
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