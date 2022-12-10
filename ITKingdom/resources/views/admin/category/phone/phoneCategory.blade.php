@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="mb-2">
            <a href="{{ route('admin#category') }}">
                <button class="btn btn-dark btn-sm">Back</button>
            </a>
        </div>
        <div class="row">

            <div class="col-lg-3">
                <form action="{{ route('admin#addphoneCategory') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h6>Phone Category</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Brand</label>
                                <input type="text" name="brand" placeholder="Enter Brand" class="form-control">
                                @error('brand')
                                    <small class="text-danger mt-2">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary w-100">Add</button>
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
                        @if (count($brandData) == 0)
                            <tr>
                                <td class="h6 text-muted">There is no Category</td>
                            </tr>
                        @endif
                        @foreach ($brandData as $brand)
                            <tr>
                                <th scope="row">{{ $brand->phonebrand_id }}</th>
                                <td>{{ $brand->brand_name }}</td>
                                <td>{{ $brand->created_at->format('d/m/Y') }}</td>
                                <td>{{ $brand->updated_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('admin#phoneCategoryUpdatePage', $brand->phonebrand_id) }}">
                                        <button class="btn btn-dark"> Edit </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
