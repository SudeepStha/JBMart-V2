@extends('backend.app')

@section('title')
    Create store
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
                       <form action="/profiles" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="storeNname">Store Name <span class="text-danger">*</span></label>
                            <input id="storeNname" class="form-control" type="text" name="storeName" placeholder="Store Name" value="{{ old('storeName') }}">
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
                                            <option value="{{ $storetype->id }}">{{ $storetype->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address">Store Address <span class="text-danger">*</span></label>
                                    <input id="address" class="form-control" type="text" name="address" placeholder="Store Address" value="{{ old('address') }}">
                                </div>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="minimum_order">Set Minimum Order(Rs) <span class="text-danger">*</span></label>
                                    <input id="minimum_order" class="form-control" type="number" name="minimum_order" placeholder="Minimum Order" value="{{ old('minimum_order') }}">
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
                                    <input id="contact" class="form-control" type="text" name="contact" placeholder="Store Contact" value="{{ old('contact') }}">
                                </div>
                                @error('contact')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website">Store website </label>
                                    <input id="website" class="form-control" type="text" name="website" placeholder="Website" value="{{ old('website') }}">
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
                                        <img id="blah" src="" class="my-2"  />
                                    </div>
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="featured_image">Featured Image <span class="text-danger">*</span></label>
                                    <input id="featured_image" class="form-control-file" type="file" name="featured_image">
                                </div>
                                @error('featured_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                         <!-- Office Hour -->
                <div class="lead my-4 text-primary fw-bold">Store Opening and Closing Time</div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="sunday">SUNDAY</label>
                            <input id="sunday" class="form-control" type="text" name="sunday" value="07:00am - 11:00pm">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="monday">MONDAY</label>
                            <input id="monday" class="form-control" type="text" name="monday" value="07:00am - 11:00pm">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tuesday">TUESDAY</label>
                            <input id="tuesday" class="form-control" type="text" name="tuesday" value="07:00am - 11:00pm">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="wednesday">WEDNESDAY</label>
                            <input id="wednesday" class="form-control" type="text" name="wednesday" value="07:00am - 11:00pm">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="thursday">THURSDAY</label>
                            <input id="thursday" class="form-control" type="text" name="thursday" value="07:00am - 11:00pm">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="friday">FRIDAY</label>
                            <input id="friday" class="form-control" type="text" name="friday" value="07:00am - 11:00pm">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="saturday">SATURDAY</label>
                            <input id="saturday" class="form-control" type="text" name="saturday" value="07:00am - 11:00pm">
                        </div>
                    </div>

                </div>

                <!-- Store Description -->
                <div class="form-group">
                    <label for="store_description">Store description</label>
                    <textarea  id="store_description" class="form-control" name="store_description" rows="3"></textarea>
                </div>

                        <button type="submit" class="btn btn-outline-success">Save Record</button>
                    </form>
            </div>
        </div>
    </div>
@endsection