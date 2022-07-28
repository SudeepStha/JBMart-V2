@extends('backend.app')

@section('title')
    Create Unit
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-body">
                    <form action="/unit" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Unit <span class="text-danger">*</span></label>
                            <input id="name" class="form-control" type="text" name="name" placeholder="eg Kg, Pkt">
                        </div>
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <button type="submit" class="btn btn-outline-success my-4">Save Record</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Unit</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($units as $key=>$unit)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{ $unit->name }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-1">
                                        <a href="/unit/{{ $unit->id }}/edit" class="badge badge-info" >Edit</a>
                                    </div>
                                    <div class="col-1">
                                        <form action="/unit/{{$unit->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button href="" type="submit" class="badge bg-danger btn">Delete</button>
                                        </form>
                                    </div>
                                </div>
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