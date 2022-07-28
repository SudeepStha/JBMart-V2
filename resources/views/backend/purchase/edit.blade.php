@extends('backend.app')

@section('title')
Create Purchase Order
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/purchase" class="btn btn-outline-info">Back</a>
                </div>
                <div class="card-body">
                    <form action="/purchase/{{$purchase->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <table class="table table-bordered">
                            <tr>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Remarks</th>
                            </tr>
                            <tr>
                                <td> {{ $purchase->date }}</td>
                                <td>
                                    @can('set purchase order status')
                                    <div class="form-group">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select name="status" id="status">
                                            @foreach ($statuses as $status)
                                                <option value="{{$status}}" @if(old('status')==$status) selected @endif>{{$status}}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                    @endcan
                                </td>
                                <td>{{ $purchase->remarks }}</td>
                            </tr>
                        </table>
                        
                      

                       

                      
                           

                     

                        <div class="row">
                            <div class="col text-right">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                          
                            
                                                      
                  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection