@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col my-3 d-flex justify-content-between">
                <h6>Order Status</h6>
                <a href="{{ route('admin#userList') }}">
                    <button class="btn btn-sm btn-warning ">Back</button>
                </a>
            </div>
            <table class="table hover col-10 mx-auto">

                <thead>
                    <tr>
                        <th scope="col">User Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Total</th>
                        <th scope="col">Order Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($orderData) == 0)
                        <tr class="text-center">
                            <td colspan="5" class="text-muted h6 py-2">There is no order that user ordered</td>
                        </tr>
                    @endif
                    @foreach ($orderData as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->product_name }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->total_price }}</td>

                            <td>
                                @if ($user->deli_status == null)
                                    <a href="{{ route('admin#getOrder') }}">
                                        <button class="btn btn-sm btn-primary">Set Status</button>
                                    </a>
                                @endif
                                {{ $user->deli_status }}
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
