@extends('backend.app')

@section('title')
    Edit Store
@endsection

@section('content')
    <div class="container py-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-none">
                    <div class="card-header">
                        <a href="/profiles" class="btn btn-outline-info">Back</a>
                    </div>
                    <div class="card-body">
                       <form action="/profiles/{{ $store->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="storeName">Store Name <span class="text-danger">*</span></label>
                            <input id="storeName" class="form-control" type="text" name="storeName" placeholder="Store Name" value="{{ $store->store_name }}">
                        </div>
                        @error('store_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                       

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="store_type_id">Store Type <span class="text-danger">*</span></label>
                                    <select id="store_type_id" class="form-control" name="store_type_id">
                                        @foreach ($storetypes as $storetype)
                                            <option value="{{ $storetype->id }}" {{ $storetype->id == $store->store_type_id ? 'selected' : '' }}>{{ $storetype->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address">Store Address <span class="text-danger">*</span></label>
                                    <input id="address" class="form-control" type="text" name="address" placeholder="Store Address" value="{{ $store->address }}">
                                </div>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="minimum_order">Set Minimum Order(Rs) <span class="text-danger">*</span></label>
                                    <input id="minimum_order" class="form-control" type="number" name="minimum_order" placeholder="Minimum Order" value="{{ $store->minimum_order }}">
                                </div>
                                @error('minimum_order')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact">Contact <span class="text-danger">*</span></label>
                                    <input id="contact" class="form-control" type="text" name="contact" placeholder="Store Contact" value="{{ $store->contact }}">
                                </div>
                                @error('contact')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website">Store website</label>
                                    <input id="website" class="form-control" type="text" name="website" placeholder="Website" value="{{ $store->website }}">
                                </div>
                                @error('website')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            
                        </div>

                        <div class="row">
                            
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="logo">Logo <span class="text-danger">*</span></label>
                                        <input id="logo" class="form-control-file" type="file" name="logo" onchange="readURL(this);">
                                        <img class="my-2" src="{{ asset($store->logo) }}" width="120" alt="">
                                       
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="featured_image">Featured Image <span class="text-danger">*</span></label>
                                        <input id="featured_image" class="form-control-file" type="file" name="featured_image">
                                        <img src="{{ asset($store->featured_image) }}" width="120" alt="">
                                    </div>
                                </div>
                        </div>

                         <!-- Office Hour -->
                            <div class="lead my-4 text-primary fw-bold">Store Opening and Closing Time</div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="sunday">SUNDAY</label>
                                        <input id="sunday" class="form-control" type="text" name="sunday" value="{{ $store->sunday }}">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="monday">MONDAY</label>
                                        <input id="monday" class="form-control" type="text" name="monday" value="{{ $store->monday }}">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="tuesday">TUESDAY</label>
                                        <input id="tuesday" class="form-control" type="text" name="tuesday" value="{{ $store->tuesday }}">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="wednesday">WEDNESDAY</label>
                                        <input id="wednesday" class="form-control" type="text" name="wednesday" value="{{ $store->wednesday }}">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="thursday">THURSDAY</label>
                                        <input id="thursday" class="form-control" type="text" name="thursday" value="{{ $store->thursday }}">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="friday">FRIDAY</label>
                                        <input id="friday" class="form-control" type="text" name="friday" value="{{ $store->friday }}">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="saturday">SATURDAY</label>
                                        <input id="saturday" class="form-control" type="text" name="saturday" value="{{ $store->saturday }}">
                                    </div>
                                </div>

                            </div>

                            <!-- Store Description -->
                            <div class="form-group">
                                <label for="short_description">Short description</label>
                                <textarea class="form-control" id="editor" name="store_description" rows="3">{{ $store->store_description }}</textarea>
                            </div>

                        <button type="submit" class="btn btn-outline-success">Save Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection