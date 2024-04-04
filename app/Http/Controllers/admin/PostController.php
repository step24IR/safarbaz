<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\TagRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.post.index' , compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create' , compact('tags' , 'categories'));
    }

    public function store(PostRequest $request)
    {
//        dd($request->image);
        try {
            DB::beginTransaction();

            $imageName = generateFileName($request->image->getClientOriginalName());
            $request->image->move(public_path(env('BLOG_IMAGES_UPLOAD_PATH')), $imageName);

            $post = Post::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'text' => $request->text,
                'image' => $imageName,
                'category_id' => $request->category_id,
                'user_id' => auth()->user()->id,
                'published' => $request->has('published') ? 1 : 0,
            ]);

            $post->tags()->attach($request->tags);

            DB::commit();
        }
        catch (Exception $e)
        {
            DB::rollBack();
            dd($e->getMessage());
            return back()->with('message','اطلاعات ثبت نشد.');
        }

        return redirect()->route('admin.post.index');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit' , compact('post','tags' , 'categories'));
    }

    public function show(Post $post)
    {
        return view('admin.post.show' , compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'text' => 'required',
            'image' => 'nullable',
            'category_id' => 'required',
            'published' => 'nullable'

        ]);
        try {
            DB::beginTransaction();

            if($request->has('image') && $request->image !== null){
                $imageName = generateFileName($request->image->getClientOriginalName());
                $request->image->move(public_path(env('BLOG_IMAGES_UPLOAD_PATH')), $imageName);
            }

            $post->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'text' => $request->text,
                'image' => ($request->image !== null) ? $imageName : $post->image,
                'category_id' => $request->category_id,
                'user_id' => auth()->user()->id,
                'published' => $request->has('published') ? 1 : 0,
            ]);

            $post->tags()->sync($request->tags);

            DB::commit();
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return back()->with('message','اطلاعات ثبت نشد.');
        }

        return redirect()->route('admin.post.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
