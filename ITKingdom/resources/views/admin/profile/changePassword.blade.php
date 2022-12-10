@extends('admin.layout.app')
@section('content')
    <div class="col-8 offset-3 mt-2">
        <div class="col-md-9">
            {{-- alert --}}
            @if (Session::has('updateSuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('updateSuccess') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            {{-- alert end --}}
            <div class="card">
                <div class="card-header p-2">
                    <legend class="text-center">Change Password</legend>
                </div>
            </div>

            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <form action="{{ route('admin#passwordChange') }} " method="POST" class="form-horizontal">
                            @csrf
                            <div class="form-group row mt-2">
                                <label for="CurrentPsw" class="col-sm-12 col-form-label ">Current Password</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" id="CurrentPsw"
                                        placeholder="Current Password" name="currentPassword">
                                    @error('currentPassword')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    @if (Session::has('PswnotMatch'))
                                        <small class="text-danger">{{ Session::get('PswnotMatch') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="inputEmail" class="col-sm-12 col-form-label">New Password</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" id="CurrentPsw" placeholder="New Password"
                                        name="newPassword">
                                </div>
                                @error('newPassword')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group row mt-2">
                                <label for="Phone" class="col-sm-12 col-form-label">Confirm Password</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" id="CurrentPsw"
                                        placeholder="Confirm Password" name="confirmPassword">
                                </div>
                                @error('confirmPassword')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class=" col-sm-12 mb-2 ">
                                <button class="btn btn-success w-100">Change</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
