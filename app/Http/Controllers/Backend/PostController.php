<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostRequest  $request
     * @return RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $post = Post::create(['user_id' => auth()->user()->id] + $request->all());

        if ($request->file('image')) {
            $post->image = $request->file('image')->store('posts', 'public');
        }

        $post->save();
        return back()->with('status', 'Creado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return Application|Factory|View
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostRequest  $request
     * @param  Post  $post
     * @return RedirectResponse
     */
    public function update(PostRequest $request, Post $post)
    {
        if ($request->file('image')) {
            Storage::disk('public')->delete($post->image);
            $post->image = $request->file('image')->store('posts', 'public');
        }

        $post->update($request->validated());
        $post->save();
        return back()->with('status', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     * @param  Post  $post
     * @return RedirectResponse
     */
    public function destroy(Post $post)
    {
        Storage::disk('public')->delete($post->image);
        $post->delete();

        return back()->with('status', 'Eliminado correctamente');
    }
}
