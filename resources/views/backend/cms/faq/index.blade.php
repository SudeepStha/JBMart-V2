@extends('backend.app')

@section('title')
    F&Q
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/faq/create" class="btn btn-outline-info">Add FAQ</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($faqs as $faq)
                        <tr>
                            <td>{{$faq->id}}</td>
                            <td style="width: 100px">
                                {{$faq->title}}
                            </td>
                            <td>
                                <textarea name="" id="editor">
                                        {{$faq->description}}
                                    </textarea>
                            </td>
                            <td>
                                <a href="/faq/{{$faq->id}}/edit" class="badge bg-info btn">Edit</a>
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