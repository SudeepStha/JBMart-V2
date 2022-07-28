@extends('backend.app')

@section('title')
    Terms
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/termsofuser/create" class="btn btn-outline-info">Add Terms Of User</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($termsofusers as $termsofuser)
                            <tr>
                                <td>
                                    {{$termsofuser->id}}
                                </td>
                                <td>
                                    {{$termsofuser->title}}
                                </td>
                                <td >
                                    <textarea name="" id="editor" >
                                        {{$termsofuser->description}}
                                    </textarea>
                                </td>
                                <td>
                                    <a href="/termsofuser/{{$termsofuser->id}}/edit" class="badge bg-info btn">Edit</a>
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