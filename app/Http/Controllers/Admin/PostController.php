<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Post;
use App\Models\Tags;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('backend.post.index',compact('posts'));
    }

    public function create()
    {
        $categories = Categories::all();
        $tags = Tags::all();
        return view('backend.post.create',compact('categories','tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'categories' => 'required',
            'body' => 'required',
        ]);
        $image = $request->file('image');
        $slug = $request->title;
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('post'))
            {
                Storage::disk('public')->makeDirectory('post');
            }

//            $postImage = Image::make($image)->resize(1600,1066)->save();
//            Storage::disk('public')->put('post/'.$imageName,$postImage);

        } else {
            $imageName = "default.png";
        }
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        if(isset($request->status))
        {
            $post->status = true;
        }else {
            $post->status = false;
        }
        $post->is_approved = true;
        $post->save();

        $post->categories()->attach($request->categories);
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        // Toastr::success('Post Successfully Saved :)','Success');
        return redirect()->route('admin.post.index');
    }


    public function show(Post $post)
    {
        return view('backend.post.show',compact('post'));
    }


    public function edit(Post $post)
    {
        $categories = Categories::all();
        $tags = Tags::all();
        return view('backend.post.edit',compact('post','categories','tags'));
    }


    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'title' => 'required',
            'categories' => 'required',
            'body' => 'required',
        ]);
        $image = $request->file('image');
        $slug = $request->title;
        if(isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('post'))
            {
                Storage::disk('public')->makeDirectory('post');
            }
            if(Storage::disk('public')->exists('post/'.$post->image))
            {
                Storage::disk('public')->delete('post/'.$post->image);
            }
            $postImage = Image::make($image)->resize(1600,1066)->save();
            Storage::disk('public')->put('post/'.$imageName,$postImage);

        } else {
            $imageName = $post->image;
        }

        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        if(isset($request->status))
        {
            $post->status = true;
        }else {
            $post->status = false;
        }
        $post->is_approved = true;
        $post->save();

        $post->categories()->sync($request->categories);
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        Toastr::success('Post Successfully Updated :)','Success');
        return redirect()->route('admin.post.index');
    }

    public function pending()
    {
        $posts = Post::where('is_approved',false)->get();
        return view('admin.post.pending',compact('posts'));
    }

//    public function approval($id)
//    {
//        $post = Post::find($id);
//        if ($post->is_approved == false)
//        {
//            $post->is_approved = true;
//            $post->save();
//            $post->user->notify(new AuthorPostApproved($post));
//
//            $subscribers = Subscriber::all();
//            foreach ($subscribers as $subscriber)
//            {
//                Notification::route('mail',$subscriber->email)
//                    ->notify(new NewPostNotify($post));
//            }
//
//            Toastr::success('Post Successfully Approved :)','Success');
//        } else {
//            Toastr::info('This Post is already approved','Info');
//        }
//        return redirect()->back();
//    }


    public function destroy(Post $post)
    {
        if (Storage::disk('public')->exists('post/'.$post->image))
        {
            Storage::disk('public')->delete('post/'.$post->image);
        }
        $post->categories()->detach();
//        if ($post->tags()) {
//            $post->tags()->detach();
//        }
        $post->delete();
        Toastr::success('Post Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
