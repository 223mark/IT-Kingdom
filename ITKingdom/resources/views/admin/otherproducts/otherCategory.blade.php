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
                <form action="{{ route('admin#addProductType') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h6>Product Catagory</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Brand</label>
                                <input type="text" name="productType" placeholder="Enter Product Type"
                                    class="form-control">
                                @error('productType')
                                    <small class="text-danger mt-2">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary w-100" type="submit">Add</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-9">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">ProductType </th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Updated Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($productType) == 0)
                            <tr>
                                <td class="h6 text-muted">There is no Category</td>
                            </tr>
                        @endif
                        @foreach ($productType as $brand)
                            <tr>
                                <th scope="row">{{ $brand->productType_id }}</th>
                                <td class="bold text-danger">{{ $brand->productType_name }}</td>
                                <td>{{ $brand->created_at->format('d/m/Y') }}</td>
                                <td>{{ $brand->updated_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="">
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
