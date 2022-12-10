@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">

        <div class="row mx-2 mb-3 mt-2">
            <div class="col-lg-6 mt-1">
                <a href="{{ route('admin#addProductPage') }}">
                    <button class="btn btn-success">Add Product</button>
                </a>
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
                <form class="" action="{{ route('admin#searchAccessories') }}" method="POST">
                    @csrf
                    <input type="text" name="accSearch" placeholder="Search.." class="form-control w-50 d-inline-block">
                    <button class="btn  btn-primary">Search</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) == 0)
                            <tr>
                                <th scope="row" class="text-muted">There is no Items!</th>
                            </tr>
                        @endif
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $item->product_name }}</th>
                                <td>
                                    <img src="{{ asset('accressoriesImage/' . $item->image) }}" alt=""
                                        class=" " width="80px" height="70px">
                                </td>
                                <td>
                                    @if ($item->brand == null)
                                        no brand item
                                    @else
                                        {{ $item->brand }}
                                    @endif
                                </td>

                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->status }}</td>
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
