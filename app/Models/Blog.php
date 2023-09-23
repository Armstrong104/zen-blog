<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    public static $blog, $image, $imageName, $imgUrl, $directory, $slug;
    public static function saveBlog($request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'category_id' => 'required',
        //     'description' => 'required',
        //     'image' => 'required | image',
        // ]);

        self::$blog = new Blog();
        self::$blog->title = $request->title;
        self::$blog->slug = self::makeSlug($request);
        self::$blog->category_id = $request->category_id;
        self::$blog->description = $request->description;
        self::$blog->image = self::getImage($request);
        self::$blog->save();
    }

    private static function getImage($request)
    {
        self::$image = $request->file('image');
        self::$imageName = rand() . '.' . self::$image->getClientOriginalExtension();
        self::$directory = 'blog-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imgUrl = self::$directory . self::$imageName;
        return self::$imgUrl;
    }

    private static function makeSlug($request)
    {
        if ($request->slug) {

            self::$slug = Str::slug($request->slug, '-');
        }else{
            self::$slug = Str::slug($request->title, '-');
        }
        return self::$slug;
    }

    public function category()
    {

        return $this->belongsTo(Category::class);
    }
}
