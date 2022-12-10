@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">

        <div class="row mx-2 mb-3 mt-2">
            <div class="col-lg-6">
                <a href="{{ route('admin#addLaptopPage') }}">
                    <button class="btn btn-success">Add Laptop</button>
                </a>
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
                <form class="" action="{{ route('admin#searchLaptop') }}" method="POST">
                    @csrf
                    <input type="text" name="laptopSearch" placeholder="Search.."
                        class="form-control w-50  d-inline-block">
                    <button class="btn  btn-primary ">Search</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Model</th>
                            <th scope="col">Image</th>
                            <th scope="col">Brand</th>
                            <th scope="col">FrontCamera</th>
                            <th scope="col">Cpu</th>
                            <th scope="col">Battery</th>
                            <th scope="col">Color</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($laptopData) == 0)
                            <tr>
                                <th scope="row" class="text-muted">There is no items!</th>
                            </tr>
                        @endif
                        @foreach ($laptopData as $item)
                            <tr>
                                <th scope="row">{{ $item->model }}</th>
                                <td>
                                    <img src="{{ asset('laptopImage/' . $item->image) }}" alt="" class=" "
                                        width="80px" height="70px">
                                </td>
                                <td> {{ $item->brand_name }}</td>

                                <td>{{ $item->selfie_camera }}</td>
                                <td>{{ $item->cpu }}</td>
                                <td>{{ $item->battery }}</td>
                                <td>{{ $item->color }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="{{ route('admin#editlaptopPage', $item->laptop_id) }}">
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
