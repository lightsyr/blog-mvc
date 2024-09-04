<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy("created_at", "desc")->paginate(10);
        return view("post.index", ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("post.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => ['required', 'string'],
            'cover' => ['required', 'extensions:jpg,png'],
            'content' => ['required', 'string']
        ]);

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $requestImage = $request->cover;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path("img/posts/"), $imageName);
            $validated["cover_image_path"] = $imageName;
        }

        $post = Post::create($validated);

        return to_route('post.show', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("post.show", ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("post.edit", ["post" => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'cover' => ['required', 'extensions:jpg,png'],
            'content' => ['required', 'string']
        ]);

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $requestImage = $request->cover;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path("img/posts/"), $imageName);
            $validated["cover_image_path"] = $imageName;
        }

        $post = Post::update($validated);

        return to_route('post.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('post.index');
    }
}
