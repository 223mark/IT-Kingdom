@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-3">
                <form action="{{ route('admin#createPost') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h6>Post Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Post Title</label>
                                <input type="text" name="postTitle" placeholder="Enter Post Title" class="form-control">
                                @error('postTitle')
                                    <small class="text-danger mt-2">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Post Description</label>
                                <input type="text" name="postDescription" placeholder="Enter Post Description"
                                    class="form-control">
                                @error('postDescription')
                                    <small class="text-danger mt-2">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Post Category</label>
                                <select name="postCategory" id="" class="form-control">
                                    <option value="">Choose Category</option>
                                    @foreach ($postCategory as $category)
                                        <option value="{{ $category->postCategory_id }}">{{ $category->postCategory_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('postCategory')
                                    <small class="text-danger mt-2">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Post Image</label>
                                <input type="file" name="postImage" class="form-control">
                                @error('postImage')
                                    <small class="text-danger mt-2">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary w-100">Add</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-9">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Category</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @if (count($postData) == 0)
                            <tr>
                                <td class="h6 text-muted">There is no Post</td>
                            </tr>
                        @endif
                        @foreach ($postData as $brand)
                            <tr>
                                <th>{{ $brand->postCategory_name }}</th>
                                <th class="col-2" style="max-height: 50px">
                                    <img src="{{ asset('postImage/' . $brand->image) }}" class=" img-thumbnail w-100 h-100">
                                </th>
                                <td>{{ $brand->title }}</td>
                                <th>{{ $brand->description }}</th>
                                <td>
                                    <a href="{{ route('admin#postEdit', $brand->post_id) }}">
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
