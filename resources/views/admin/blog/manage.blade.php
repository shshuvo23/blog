@extends('admin.master')
@section('title')
    Manage Blog
@endsection
@section('body')
    <section class="py-5 bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-dark shadow">
                        <div class="card-header display-6 font-monospace text-center bg-light">All Blog Information</div>
                        <div class="card-body">
                            <p class="text-success text-center fw-bold display-6 shadow">{{Session::get('message')}}</p>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Blog Title</th>
                                    <th>Author</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->author}}</td>
                                        <td><img src="{{ asset( $blog->image) }}" alt="" height="50" width="70"></td>
                                        <td>{{ $blog->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{route('blog.edit' , ['id' => $blog->id])}} " class="btn btn-info btn-sm">Edit</a>
                                            <a href="{{route('blog.detail' , ['id' => $blog->id])}}" class="btn btn-info btn-sm">Detail</a>
                                            <a href="{{route('blog.update-status' , ['id' => $blog->id])}}" class="btn btn-success btn-sm">status</a>
                                            <a href="" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
