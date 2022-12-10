@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="mb-2">
            <a href="{{ route('admin#postCategoryIndex') }}">
                <button class="btn btn-dark btn-sm">Back</button>
            </a>
        </div>
        <div class="row">

            <div class="col-lg-3">
                <form action="{{ route('admin#updatePostCategory', $post->postCategory_id) }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h6>Update PostCategory</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Post Category</label>
                                <input type="text" name="postCategory" placeholder="Update Brand Name"
                                    class="form-control">
                                @error('brand')
                                    <small class="text-danger mt-2">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success w-100">Upate</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-9">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Post Category Id</th>
                            <th scope="col">Post Category Name</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Updated Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{ $post->postCategory_id }}</th>
                            <td>{{ $post->postCategory_name }}</td>
                            <td>{{ $post->created_at->format('d/m/Y') }}</td>
                            <td>{{ $post->updated_at->format('d/m/Y') }}</td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
