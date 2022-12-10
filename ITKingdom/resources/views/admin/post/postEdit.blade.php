@extends('admin.layout.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin#postIndex') }}">
            <button class="btn btn-sm btn-dark">Back</button>
        </a>
        <hr>
        <div class="row">
            <div class="col-12 mb-3 ">
                <h5 class="text-primary bold ms-3">Post Information</h5>
            </div>
            <div class="col-6 px-4 py-2" style="height: 300px">
                <img src="{{ asset('postImage/' . $postData->image) }}" alt="" class=" w-100 img-thumbnail h-100">
            </div>
            <div class="col-6">
                <div class="card w-100">
                    <div class="card-header">
                        <h5>{{ $postData->title }}</h5>
                    </div>
                    <div class="card-body px-4 py-2 shadow-sm" style="height: 200px">
                        <small>{{ $postData->description }}</small>
                    </div>
                    <div class="row d-flex ">
                        <div class="col-6  text-center">
                            <small>{{ $postData->postCategory_name }}</small>
                        </div>
                        <div class="col-6 text-center">
                            <small>{{ $postData->created_at }}</small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success w-100">Update</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
