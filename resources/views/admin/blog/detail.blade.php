@extends('admin.master')

@section('body')

    <section class="py-5 bg-warning">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card border-dark shadow">
                        <div class="card-header display-6 font-monospace text-center bg-light">Add Blog Form</div>
                        <div class="card-body">
                            <p class="text-success text-center fw-bold shadow">{{Session::get('message')}}</p>
                            <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <tr>
                                    <th>Blog Id</th>
                                    <td>{{$blog->id}}</td>
                                </tr>
                                <tr>
                                    <th>Blog Title</th>
                                    <td>{{$blog->title}}</td>
                                </tr>
                                <tr>
                                    <th>Blog Author</th>
                                    <td>{{$blog->author}}</td>
                                </tr>
                                <tr>
                                    <th>Blog Description</th>
                                    <td>{{$blog->description}}</td>
                                </tr>
                                <tr>
                                    <th>Blog Image</th>
                                    <td><img src="{{asset($blog->image)}}" alt="" height="130" width="130"/></td>
                                </tr>
                                <tr>
                                    <th>Blog sPublished Status</th>
                                    <td>{{$blog->status == 1 ? 'Blog Published' : 'Not Available'}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
