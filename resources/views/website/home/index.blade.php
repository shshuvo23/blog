@extends('website.master')


@section('body')

    <div class="maincontent-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Blogs</h2>
                        <div class="product-carousel">
                            @foreach($blogs as $blog)
                            <div class="single-product">
                                <div class="product-f-image h-100">
                                    <img src="{{asset($blog->image)}}" alt="" height="350"/>
                                    <div class="product-hover">
                                        <a href="{{route('detail', ['id' => $blog->id])}}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h3>Blog Title: {{$blog->title}}</h3>
                                <div class="product-carousel-price">
                                    {{$blog->author}}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->

@endsection
