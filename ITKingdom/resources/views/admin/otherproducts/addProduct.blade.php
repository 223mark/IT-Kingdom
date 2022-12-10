@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="card w-75">
                <div class="row ">
                    <div class="  d-flex justify-content-end  mt-2 ">
                        <a href="{{ route('admin#accessoriesIndex') }}">
                            <button class="btn btn-sm  btn-primary text-white px-4 py-1">List</button>
                        </a>
                    </div>
                </div>
                <div class="card-header text-center">
                    <h6>Product Information</h6>

                </div>
                <form action="{{ route('admin#addProduct') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" name="productName" class="form-control"
                                        placeholder="Enter Product Name">
                                    @error('productName')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Product Type</label>
                                    <select name="productType" class="form-control">
                                        <option value="">Choose Product Type</option>
                                        @foreach ($typeData as $product)
                                            <option value="{{ $product->productType_id }}">{{ $product->productType_name }}
                                            </option>
                                        @endforeach
                                        @error('productType')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Brand</label>
                                    <input type="text" name="brand" class="form-control" placeholder="Enter Brand">
                                </div>

                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label for=""> Description</label>
                                    <textarea cols="30" rows="5" class="form-control" name="description"> </textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="Enter Price">
                                    @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Product Count</label>
                                    <input type="text" name="productCount" class="form-control"
                                        placeholder="Enter Product Count">
                                    @error('productCount')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="card-footer px-5">
                        <button class="btn btn-success w-100" type="submit">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
