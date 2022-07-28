@extends('backend.app')

@section('title')
    Returns
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/return_policy/create" class="btn btn-outline-info">Add Return of User Policy</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($return_policies as $return_policy)
                            <tr>
                                <td>
                                    {{$return_policy->id}}
                        </td>
                        <td>
                            {{$return_policy->title}}
                        </td>
                        <td>
                            <textarea name="" id="editor">
                                                {{$return_policy->description}}
                                            </textarea>
                        </td>
                        <td>
                            <a href="/return_policy/{{$return_policy->id}}/edit" class="badge bg-info btn">Edit</a>
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