<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('website.home.index', [
            'blogs' => Blog::where('status', 1)->orderBy('id', 'desc')->take(4)->get(),
        ]);
    }

    public function detail($id)
    {
        return view('website.blog.index', ['blog' => Blog::find($id)]);
    }
}
