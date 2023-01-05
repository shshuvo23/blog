<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Blog extends Model
{
    use HasFactory;

    private static $blog, $image, $extension, $directory, $imageName, $imageUrl, $message;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$extension;
        self::$directory = 'blog-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newBlog($request)
    {
        self::$blog = new Blog();
        self::$blog->title       = $request->title;
        self::$blog->author      = Auth::user()->name;
        self::$blog->description = $request->description;
        self::$blog->image       = self::getImageUrl($request);
        self::$blog->status      = $request->status;
        self::$blog->save();
    }

    public static function updateBlog($request, $id)
    {
        self::$blog = Blog::find($id);
        if($request->file('image'))
        {
            if (file_exists(self::$blog->image))
            {
                unlink(self::$blog->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$blog->image;
        }
        self::$blog->title       = $request->title;
        self::$blog->author      = Auth::user()->name;
        self::$blog->description = $request->description;
        self::$blog->image       = self::$imageUrl;
        self::$blog->status      = $request->status;
        self::$blog->save();
    }

    public static function updateBlogStatus($id)
    {
        self::$blog = Blog::find($id);
        if (self::$blog->status == 1)
        {
            self::$blog->status = 0;
            self::$message = "Blog info Unpublish successfully";
        }
        else
        {
            self::$blog->status = 1;
            self::$message = "Blog info publish successfully";
        }
        self::$blog->save();
        return self::$message;
    }

    public static function deleteBlog($id)
    {
        self::$blog = Blog::find($id);
        if (file_exists(self::$blog->image))
        {
            unlink(self::$blog->image);
        }
        self::$blog->delete();

    }
}
