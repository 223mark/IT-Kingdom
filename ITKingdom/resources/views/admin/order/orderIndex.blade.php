@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col my-2">
                <div class="col d-flex justify-content-between ">
                    <div class="">
                        <h6 class="text-success">Order History</h6>
                    </div>
                    <form action="{{ route('admin#filteredOrders') }}" method="POST" class="form-group d-flex">
                        @csrf
                        <select name="filtered" class=" form-control ">
                            <option value="">Filterd Orders</option>
                            <option value="Processing">Processing</option>
                            <option value="Delievered">Delievered</option>
                        </select>
                        <button class="btn btn-sm btn-success ">Filter</button>
                    </form>
                    <form action="{{ route('admin#ordersearchUser') }}" method="POST">
                        @csrf
                        <input type="text" name="searchUser" class=" form-control h-75 w-75 d-inline-block"
                            placeholder="Search User">
                        <button class="btn btn-sm btn-primary" type="submit">Search</button>
                    </form>

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
                                        <form action="{{ route('admin#setOrderStatus', $order->order_id) }}" method="POST">
                                            @csrf
                                            <select name="orderStatus" class="form-control w-75 d-inline-block">
                                                @if ($order->deli_status != null)
                                                    <option selected value="{{ $order->deli_status }}">
                                                        {{ $order->deli_status }}</option>
                                                @endif
                                                <option value="">Choose Status</option>
                                                <option value="Processing">Processing</option>
                                                <option value="Delievered">Delievered</option>
                                            </select>
                                            <button class="btn btn-sm btn-primary">Set</button>
                                        </form>
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
