@extends('backend.app')
@section('title')
    Total Sales
@endsection
@section('content')
    <div class="container py-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/sales/create" class="btn btn-outline-primary">Create Sales</a>
                    </div>
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>S.N</th>
                                    <th>Date</th>
                                    <th>Customer Name</th>
                                    <th>Store Name</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-sm">View</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection