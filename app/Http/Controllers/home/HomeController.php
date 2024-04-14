<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Post;
use App\Models\Room;
use App\Models\RoomImage;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cities = City::pluck('name');
        $cities = $cities->merge(Room::groupBy('village')->pluck('village'));
        $roomImages = RoomImage::inRandomOrder()->limit(6)->get();
        $rooms = Room::latest()->limit(6)->get();
        $posts = Post::where('published' , 1)->latest()->limit(3)->get();

        return view('home.index' , compact('rooms' , 'roomImages' , 'cities' , 'posts'));
    }
    public function posts()
    {
        $posts = Post::where('published' , 1)->latest()->paginate(6)->withQueryString();;
        return view('home.posts' , compact('posts'));
    }
    public function show_post(Post $post)
    {
        return view('home.post' , compact('post'));
    }
    public function getPostByTag(Tag $tag)
    {
        $posts = Post::whereHas('tags', function (Builder $query) use ($tag) {
            $query->where('name',  $tag->name);
        })->where('published' , 1)->paginate(6)->withQueryString();

        return view('home.posts' , compact('posts'));
    }
    public function getPostByCategory(Category $category)
    {
        $posts = Post::whereHas('category', function (Builder $query) use ($category) {
            $query->where('name',  $category->name);
        })->where('published' , 1)->paginate(6)->withQueryString();

        return view('home.posts' , compact('posts'));
    }
}
