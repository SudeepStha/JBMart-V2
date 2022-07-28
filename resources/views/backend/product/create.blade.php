@extends('backend.app')

@section('title')
    Create Product
@endsection

@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <a href="/product" class="btn btn-outline-info">Back</a>
                </div>
                <div class="card-body">
                    <form action="/product" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sku">SKU (Stock Keeping Unit) <span class="text-danger">*</span></label>
                                    <input id="sku" class="form-control" type="text" name="sku"
                                        placeholder="Stock Keeping Unit" value="{{old('sku')}}">
                                </div>
                                @error('sku')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">Product Name <span class="text-danger">*</span></label>
                                    <input id="name" class="form-control" type="text" name="name"
                                        placeholder="Create Product Name" value="{{old('name')}}">
                                </div>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                           
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Price <span class="text-danger">*</span></label>
                                    <input id="price" class="form-control" type="text" name="price" placeholder="" value="{{old('price')}}">
                                </div>
                                @error('price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="unit_id">Unit</label>
                                    <select id="unit_id" class="form-control" name="unit_id">
                                        @foreach ($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="offer">Offer</label>
                                    <input id="offer" class="form-control" type="text" name="offer" placeholder="">
                                </div>
                            </div>    
                            --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="f_price">Final Price <span class="text-danger">*</span></label>
                                    <input id="f_price" class="form-control" type="text" name="final_price"
                                        placeholder="" value="{{old('final_price')}}">
                                </div>
                                @error('final_price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                           {{--
                                 <div class="col-md-4">
                                <div class="form-group">
                                    <label for="d_price">Discount<span class="text-danger">*</span></label>
                                    <input id="d_price" class="form-control" type="text" name="isDiscount"
                                        placeholder="">
                                </div>
                                @error('isDiscount')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="special_price">Special Price<span class="text-danger">*</span></label>
                                    <input id="special_price" class="form-control" type="text" name="special_price"
                                        placeholder="">
                                </div>
                                @error('special_price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            --}}
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fe_price">Product is featured<span class="text-danger">*</span></label>
                                    <select name="isFeatured" id="" class="form-control">
                                        <option value=1>TRUE</option>
                                        <option value=0>False</option>
                                    </select>
                                </div>
                                @error('isDiscount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Status<span class="text-danger">*</span></label>
                                <select id="status" class="form-control" name="status">
                                    <option value=1>TRUE</option>
                                    <option value=0>False</option>
                                </select>
                            </div>
                            @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div> --}}
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="category_id">Category </label>
                        <select id="category_id" class="form-control" name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="image">Featured Image</label>
                        <input id="image" class="form-control-file" type="file" name="image" onchange="readURL(this);">
                        <img id="blah" src="" class="my-2" />
                    </div>
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="short_description">Short description</label>
                        <textarea class="form-control" id="editor" name="description" rows="3" >{{old('description')}}</textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-success">Save Record</button>
            @if (session('message'))
            <div class="my-3 alert alert-success text-center">
                <span>{{session('message')}}</span>
            </div>
            @endif
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection