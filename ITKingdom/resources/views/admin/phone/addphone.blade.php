@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="card w-75">
                <div class=" d-flex justify-content-end  my-2 px-5">
                    <a href="{{ route('phoneList#index') }}">
                        <button class="btn btn-sm  btn-warning text-white  py-1" style="width: 120px">List</button>
                    </a>
                </div>
                <div class="card-header text-center">
                    <h6>Product Information</h6>

                </div>
                <form action="{{ route('admin#addPhone') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Phone Model</label>
                                    <input type="text" name="model" class="form-control"
                                        placeholder="Enter Phone Model">
                                    @error('model')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Brand</label>
                                    <select name="brand" id="" class="form-control">
                                        <option value="">Choose Brand</option>
                                        @foreach ($categoryData as $category)
                                            <option value="{{ $category->phonebrand_id }}">{{ $category->brand_name }}
                                            </option>
                                        @endforeach
                                        @error('brand')
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
                                    <label for="">Screen Size</label>
                                    <input type="text" name="screenSize" class="form-control" placeholder="6.2 etc..">
                                    @error('screenSize')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Front Camera</label>
                                    <input type="text" name="frontCamera" class="form-control" placeholder="**MP">
                                    @error('frontCamera')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Selfie Camera</label>
                                    <input type="text" name="selfieCamera" class="form-control" placeholder="**MP">
                                    @error('selfieCamera')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="">Phone Cpu</label>
                                    <input type="text" name="cpu" class="form-control" placeholder="Enter Phone Cpu">
                                    @error('cpu')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Battery</label>
                                    <input type="text" name="battery" class="form-control"
                                        placeholder="Enter Battery Capicity">
                                    @error('battery')
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
                                    <label for="">Color</label>
                                    <input type="text" name="color" class="form-control" placeholder="Enter Color">
                                    @error('color')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <input type="text" name="statusCount" class="form-control"
                                        placeholder="Enter Count Status">
                                    @error('statusCount')
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
