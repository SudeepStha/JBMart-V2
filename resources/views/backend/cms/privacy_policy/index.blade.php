@extends('backend.app')

@section('title')
    Policies
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/privacy_policy/create" class="btn btn-outline-info">Add Privacy and Policy</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($privacy_policies as $privacy_policy)
                        <tr>
                            <td>{{$privacy_policy->id}}</td>
                            <td >
                                {{$privacy_policy->title}}
                            </td>
                            <td>
                                <textarea name="" id="editor">
                                        {{$privacy_policy->description}}
                                    </textarea>
                            </td>
                            <td>
                                <a href="/privacy_policy/{{$privacy_policy->id}}/edit" class="badge bg-info btn">Edit</a>
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