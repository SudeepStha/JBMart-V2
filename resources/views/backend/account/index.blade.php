@extends('backend.app')

@section('title')
    Accounts
@endsection

@section('content')
    <div class="container py-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-none">
                    <div class="card-header">
                        <a href="/accounts/create" class="btn btn-outline-info">Add User</a>
                        <a href="/accounts/create" class="btn btn-primary btn-sm">Create System User</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Account Name</th> 
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Store</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                            
                            @foreach ($accounts as $account)
                                <tr>
                                    <td>{{ $account->id }}</td>
                                    <td>{{ $account->name }}</td>
                                    <td>{{ $account->email }}</td>
                                    <td>{{ $account->mobile }}</td>
                                    <td>{{ $account->store->store_name ?? 'N/A' }}</td>
                                    <td>
                                        @foreach ($account->roles as $role)
                                            {{ $role->name }} @unless($loop->last), @endunless 
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="/accounts/{{ $account->id }}/edit" class="badge badge-info">Edit</a>
                                        
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