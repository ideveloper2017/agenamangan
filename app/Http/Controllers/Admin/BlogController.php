<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Traits\FileUpload;

class BlogController extends Controller
{
    use  FileUpload;
    public function index()
    {
        $blog = Blog::all();
        return view('backend.blog.blog', compact('blog'));
    }
    public function create()
    {
        return view('backend.blog.blog_create');
    }

    public function store(BlogRequest $blogRequest)
    {

        $data = $blogRequest->validated();
        $data = $this->fileUpload($data);
        Blog::create($data);
        return redirect()->route('admin.blog.index')->with('message', 'Post successfully create.');
    }


    public function edit($id)
    {
        $blog_edit = Blog::find($id);
        return view('backend.blog.blog_edit', compact('blog_edit'));
    }


    public function update(BlogRequest $blogRequest, $id)
    {
        $data = $blogRequest->validated();
        $post = Blog::find($id);
        if (isset($data['image'])) {
            $data = $this->fileUpload($data);
        }
        $post->update($data);

        return redirect()->route('admin.blog.index')->with('message', 'Post successfully update.');
    }


    public function destroy($id)
    {
        $request = request()->merge(['id' => $id]);
        $request->validate(['id' => 'required|exists:blogs,id']);
        $post = Blog::find($id);
        unlink('storage/images/' . $post->image);
        $post->delete();
        return redirect()->route('admin.blog.index')->with('message', 'Post successfully delete.');
    }
}
