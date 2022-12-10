@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="card w-75">
                <div class="  d-flex justify-content-end px-5 my-2">
                    <div class=" ">
                        <a href="{{ route('admin#laptopIndex') }}">
                            <button class="btn btn-sm  btn-warning text-white" style="width:120px">
                                List
                            </button>

                        </a>
                    </div>
                </div>
                <div class="card-header text-center">
                    <h6>Product Information </h6>

                </div>
                <form action="{{ route('admin#updateLaptop', $laptopData->laptop_id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="">
                                    <img src="{{ asset('laptopImage/' . $laptopData->image) }}" alt=""
                                        class=" " width="80px" height="70px">
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image" class="form-control"
                                        value="{{ $laptopData->image }}">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="">Phone Model</label>
                                    <input type="text" name="model" class="form-control"
                                        value="{{ $laptopData->model }}">
                                    @error('model')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Brand</label>
                                    <select name="brand" id="" class="form-control">

                                        <option value="{{ $laptopData->brand }}" selected>{{ $laptopData->brand_name }}
                                        </option>
                                        @foreach ($categoryData as $category)
                                            <option value="{{ $category->laptopbrand_id }}">{{ $category->brand_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('brand')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="">Selfie Camera</label>
                                    <input type="text" name="selfieCamera" class="form-control"
                                        value="{{ $laptopData->selfie_camera }}">
                                    @error('selfieCamera')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Screen Size</label>
                                    <input type="text" name="screenSize" class="form-control"
                                        value="{{ $laptopData->screen_size }}">
                                    @error('screenSize')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="">Laptop Cpu</label>
                                    <input type="text" name="cpu" class="form-control"
                                        value="{{ $laptopData->cpu }}">
                                    @error('cpu')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Battery</label>
                                    <input type="text" name="battery" class="form-control"
                                        value="{{ $laptopData->battery }}">
                                    @error('battery')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" name="price" class="form-control"
                                        value="{{ $laptopData->price }} ">
                                    @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Color</label>
                                    <input type="text" name="color" class="form-control"
                                        value="{{ $laptopData->color }}">
                                    @error('color')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <input type="text" name="statusCount" class="form-control"
                                        value="{{ $laptopData->status }}">
                                    @error('statusCount')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="card-footer px-5">
                        <button class="btn btn-primary w-100" type="submit">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
