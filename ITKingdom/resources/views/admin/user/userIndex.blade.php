@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col my-2 d-flex justify-content-between">
                <h6>User and Order Status</h6>
                <form action="{{ route('admin#searchUser') }}" method="POST">
                    @csrf
                    <input type="text" name="searchUser" class=" form-control h-75 w-50 d-inline-block"
                        placeholder="Search User">
                    <button class="btn btn-sm btn-primary">Search</button>
                </form>
            </div>
            <table class="table hover col-10 mx-auto">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Order</th>

                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>
                                <a href="{{ route('admin#userOrder', $user->id) }}">
                                    <button class="btn btn-sm btn-primary">Orders</button>
                                </a>
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
