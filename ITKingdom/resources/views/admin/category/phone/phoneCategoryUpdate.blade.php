@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="mb-2">
            <a href="{{ route('admin#phoneCategory') }}">
                <button class="btn btn-dark btn-sm">Back</button>
            </a>
        </div>
        <div class="row">

            <div class="col-lg-3">
                <form action="{{ route('admin#phoneCategoryUpdate', $brandData->phonebrand_id) }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h6>Update Phone</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Brand</label>
                                <input type="text" name="brand" placeholder="Update Brand Name" class="form-control">
                                @error('brand')
                                    <small class="text-danger mt-2">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success w-100">Upate</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-9">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Brand Id</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Updated Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{ $brandData->phonebrand_id }}</th>
                            <td>{{ $brandData->brand_name }}</td>
                            <td>{{ $brandData->created_at->format('d/m/Y') }}</td>
                            <td>{{ $brandData->updated_at->format('d/m/Y') }}</td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
