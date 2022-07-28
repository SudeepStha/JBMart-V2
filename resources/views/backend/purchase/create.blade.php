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
                    <form action="/purchase" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card p-4">
                            <div class="store-name">
                                <h3 class="text-primary fw-bold">{{ $store->store->store_name ?? '' }}</h3>
                                <p class="mb-0">{{ $store->store->address ?? '' }}</p>
                                <small>{{ $store->store->contact ?? '' }}</small>
                            </div>
                            <div class="title py-3">
                                <p class="display-4 fw-bold">Purchase Order</p>
                            </div>

                            <div class="form-group">
                                <label for="date">Date <span class="text-danger">*</span></label>
                                <input id="date" class="form-control" type="date" name="date" value="{{ old('date') }}">
                            </div>

{{--                       
                           <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select name="status" id="status">
                                @foreach ($statuses as $status)
                                    <option value="{{$status}}" @if(old('status')==$status) selected @endif>{{$status}}</option>
                                @endforeach
                            </select>
                            </div> --}}

                     

                            <div class="form-group">
                                <label for="remarks">Remarks <span class="text-danger">*</span></label>
                                <input id="remarks" class="form-control" type="text" name="remarks" value="{{ old('remarks') }}">
                            </div>

                           
                         

                            <table class="table" id="myTable">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th>Action</th>
                                </tr>
                            </table>

                            <div class="row">
                                <div class="col">
                                    <span onclick="myCreateFunction()" class="btn btn-secondary">Add items</span>
                                </div>
                            </div>

                            <hr>
                          
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <button type="submit" class="btn btn-success">Order</button>
                            </div>
                        </div>
                        @if (session('message'))
                        <div class="my-3 alert alert-success">
                            <span>{{session('message')}}</span>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let num = 0;
    function myCreateFunction() {
      const table = document.getElementById("myTable");
      
      const row = table.insertRow(-1);
      const randomID = Math.random();
      row.setAttribute('id',randomID);
      const cell1 = row.insertCell(0);
      const cell2 = row.insertCell(1);
      const cell3 = row.insertCell(2);
      const cell4 = row.insertCell(3);
      cell1.innerHTML = `<input type="text" placeholder="Rice" name=items[${num}][name]>`;
      cell2.innerHTML = `<input type="text" placeholder="50" name=items[${num}][qty]>`;
      cell3.innerHTML = `<input type="text" placeholder="Kg" name=items[${num}][unit]>`;
      cell4.innerHTML = `<button class="btn btn-outline-danger" onclick="myDeleteFunction(${randomID})">Delete item</button>`;
      num++;
    }
    
    function myDeleteFunction(id) {
      document.getElementById(id).remove();
    }
</script>
@endsection