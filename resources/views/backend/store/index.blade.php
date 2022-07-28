@extends('backend.app')

@section('title')
    Stores
@endsection

@section('content')
    <div class="container py-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-none">
                    <div class="card-header">
                        @unless($store->store)
                            <a href="/profiles/create" class="btn btn-outline-info">Add Store Profile</a>
                            @else
                            <h3>Store Profile</h3>
                        @endunless

                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>S.N</th>
                                <th>Store name</th>
                                <th>Store Type</th>
                                <th>Address</th>
                                <th>Minumum Order(Rs)</th>
                                <th>Contact</th>
                                <th>Action</th>
                            </tr>
 
                           <tr>
                            <td>{{ $store->store->id ?? '' }}</td>
                            <td>{{ $store->store->store_name ?? '' }}</td>
                            <td>{{ $store->store->store_type->name ?? '' }}</td>
                            <td>{{ $store->store->address ?? '' }}</td>
                            <td>{{ $store->store->minimum_order ?? '' }} </td>
                            <td>{{ $store->store->contact ?? '' }}</td>
                            <td>
                                <a href="/profiles/{{ $store->store->id ?? '' }}/edit" class="badge badge-info">Edit</a>
                            </td>
                           </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection