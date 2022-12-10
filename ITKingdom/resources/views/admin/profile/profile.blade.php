@extends('admin.layout.app')
@section('content')
    <div class="col-8 offset-3 mt-2">
        <div class="col-md-9">
            {{-- alert --}}
            {{-- alert end --}}
            <div class="card">
                <div class="card-header p-2">
                    <legend class="text-center">User Profile</legend>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <form action="{{ route('admin#profileUpdate') }}" method="POST" class="form-horizontal">
                                @csrf
                                <div class="form-group row mt-2">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Name"
                                            value="{{ $userData->name }}" name="name">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mt-2">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email"
                                            value="{{ $userData->email }}" name="email">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mt-2">
                                    <label for="Phone" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="Phone" placeholder="Phone"
                                            value="{{ $userData->phone }}" name="phone">
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mt-2">
                                    <label for="Gender" class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10">
                                        @if ($userData->gender == 'male')
                                            <select name="gender" id="Gender" class=" form-control">
                                                <option value="">Choose Gender</option>
                                                <option value="male" selected>Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            @error('gender')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        @elseif ($userData->gender == 'female')
                                            <select name="gender" id="Gender" class=" form-control">
                                                <option value="">Choose Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female" selected>Female</option>
                                            </select>
                                            @error('gender')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        @else
                                            <select name="gender" id="Gender" class=" form-control">
                                                <option value="">Choose Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            @error('gender')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mt-2">
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <textarea name="address" id="address" cols="30" rows="3" class="form-control" placeholder="Address">{{ $userData->address }}</textarea>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-sm ">Update</button>
                                    </div>
                                </div>

                            </form>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10 d-flex justify-content-end">
                                    <a href="{{ route('admin#passwordChangePage') }}">
                                        <button class="btn btn-danger btn-sm">Change Password</button>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
