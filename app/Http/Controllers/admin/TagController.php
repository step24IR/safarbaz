<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tag.index' , compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(TagRequest $request)
    {
        Tag::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.tag.index');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit' , compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.tag.index');
    }
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
}
