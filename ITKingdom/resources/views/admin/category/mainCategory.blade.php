@extends('admin.layout.app')

@section('content')
    <div class="container " style="padding: 150px">
        <div class="row">
            <div class="col-12 text-center">
                <h5 class="">Choose Category Type</h5>
            </div>
            <div class="col-12 mt-5 d-flex justify-content-center align-items-center">
                <div class="mx-3">
                    <a href="{{ route('admin#phoneCategory') }}">
                        <button class="btn btn-success">Phone</button>
                    </a>
                </div>
                <div class="mx-3">
                    <a href="{{ route('admin#laptopCategoryPage') }}">
                        <button class="btn btn-danger">Laptop</button>
                    </a>
                </div>
                <div class="mx-3">
                    <a href="{{ route('admin#postCategoryIndex') }}">
                        <button class="btn btn-primary">Post</button>
                    </a>
                </div>
                <div class="mx-3">
                    <a href="{{ route('admin#productTypeIndex') }}">
                        <button class="btn btn-warning">Others</button>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
