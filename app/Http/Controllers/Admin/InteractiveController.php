<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InteractiveRequest;
use App\Models\Galereya;
use App\Models\Interactiv;
use App\Models\Interactive_service;
use Illuminate\Http\Request;
use App\Traits\PdfUpload;

class InteractiveController extends Controller
{
    use PdfUpload;

    public function index()
    {
        $interactive = Interactiv::all();
        return view('backend.interactive.interactive', compact('interactive'));
    }


    public function create()
    {
        $interactive_service = Interactive_service::all();

        return view('backend.interactive.interactive_create', compact('interactive_service'));
    }


    public function store(InteractiveRequest $interactiveRequest)
    {

        $data = $interactiveRequest->validated();
        $data = $this->pdfUpload($data);
        Interactiv::create($data);
        return redirect()->route('admin.interactive.index')->with('message', 'Post successfully create.');

    }


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('posts.edit', compact('categories', 'post'));
    }


    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:App\Models\Category,id',
        ]);
        $post->title = $request->title;
        $post->slug = \Str::slug($request->slug);
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->save();

        return redirect()->route('posts.index')->with('status', 'Post Updated Successfully');
    }


    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('status', 'Post Delete Successfully');
    }
}
