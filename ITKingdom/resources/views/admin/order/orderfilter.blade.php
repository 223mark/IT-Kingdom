@extends('admin.layout.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col my-2">
                <div class="col d-flex justify-content-between ">
                    <div class="">
                        <h6 class="text-success">Order History</h6>
                    </div>
                    <div class="">
                        @foreach ($data as $order)
                            @if ($order->deli_status == 'Delievered')
                                <a href="{{ route('admin#delieveredAlldelete') }}">
                                    <button class="btn btn-sm btn-danger">Delete All</button>
                                </a>
                            @endif
                            @if ($order->deli_status == 'Processing')
                                <button class="btn btn-sm btn-primary">All Set Delivered</button>
                            @endif
                        @endforeach
                        <a href="{{ route('admin#getOrder') }}">
                            <button class="btn btn-sm btn-warning">Back</button>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">User Name </th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                                <th scope="col">Address</th>
                                <th scope="col">Process</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data) == 0)
                                <tr class="text-center">
                                    <td colspan="5" class="text-muted py-2">There is no item</td>
                                </tr>
                            @endif
                            @foreach ($data as $order)
                                <tr>
                                    <td>{{ $order->name }}

                                    </td>
                                    <td>{{ $order->product_name }}</td>
                                    <td>{{ $order->price }} Ks</td>
                                    <td>{{ $order->total_price }} Ks</td>
                                    <td class="text-center">{{ $order->address }}</td>
                                    <td>
                                        {{ $order->deli_status }}
                                    </td>
                                    <td>
                                        @if ($order->deli_status == 'Delievered')
                                            <form action="{{ route('admin#orderDelete', $order->order_id) }}">
                                                @csrf
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </button>
                                            </form>
                                        @else
                                            <button class="btn btn-sm btn-danger" hidden>
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <div class=" d-flex justify-content-end">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
