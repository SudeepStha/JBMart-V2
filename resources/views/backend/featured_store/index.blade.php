@extends('backend.app')

@section('title')
    Featured Stores
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/featured_store" class="btn btn-outline-info">Add Store Profile</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Store name</th>
                            <th>Store Type</th>
                            <th>Address</th>
                            <th>Minumum Order</th>
                            <th>Contact</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($featured_stores as $featured_store)
                        <tr>
                            <td>{{ $featured_store->id ?? '' }}</td>
                            <td>{{ $featured_store->store_name ?? '' }}</td>
                            <td>{{ $featured_store->store_type->name ?? '' }}</td>
                            <td>{{ $featured_store->address ?? '' }}</td>
                            <td>{{ $featured_store->minimum_order ?? '' }} </td>
                            <td>{{ $featured_store->contact ?? '' }}</td>
                            <td>
                                <a href="/profiles/{{ $featured_store->id ?? '' }}/edit"
                                    class="badge badge-info">Edit</a>
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