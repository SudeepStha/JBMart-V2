@extends('backend.app')

@section('title')
    Policies
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-none">
                    <div class="card-header">
                        <a href="/shipping_policy/create" class="btn btn-outline-info">Add Shipping Policy</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($shipping_policies as $shipping_policy)
                            <tr>
                                <td>
                                    {{$shipping_policy->id}}
                                </td>
                                <td>
                                    {{$shipping_policy->title}}
                                </td>
                                <td>
                                    <textarea name="" id="editor">
                                                {{$shipping_policy->description}}
                                            </textarea>
                                </td>
                                <td>
                                    <a href="/shipping_policy/{{$shipping_policy->id}}/edit" class="badge bg-info btn">Edit</a>
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