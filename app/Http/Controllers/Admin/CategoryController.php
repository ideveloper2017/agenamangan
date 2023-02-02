<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Language;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categories::with('posts')->latest()->get();
        $langs=   Language::pluck('code','code');
        return view('backend.category.index',compact('categories','langs'));
    }


    public function create()
    {
        $langs=   Language::pluck('code','code');
        return view('backend.category.create',compact('langs'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:categories'
        ]);

//      get form image
        $image = $request->file('image');
        $slug = $request->name;
        if (isset($image))
        {
//         make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check category dir is exists
            if (!Storage::disk('public')->exists('category'))
            {
                Storage::disk('public')->makeDirectory('category');
            }
//            resize image for category and upload
//            $category = Image::make($image)->resize(1600,479)->save();
//            Storage::disk('public')->put('category/'.$imagename,$category);

            //            check category slider dir is exists
            if (!Storage::disk('public')->exists('category/slider'))
            {
                Storage::disk('public')->makeDirectory('category/slider');
            }
            //            resize image for category slider and upload
//            $slider = Image::make($image)->resize(500,333)->save();
//            Storage::disk('public')->put('category/slider/'.$imagename,$slider);

        } else {
            $imagename = "default.png";
        }

        $category = new Categories();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->lang =  $request->lang;
        $category->image = $imagename;
        $category->lang=$request->lang;
        $category->save();
        Toastr::success('Category Successfully Saved :)' ,'Success');
        return redirect()->route('admin.category.index');

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Categories::find($id);
        return view('backend.category.edit',compact('category'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        // get form image
        $image = $request->file('image');
        $slug = $request->name;
        $category = Categories::find($id);
        if (isset($image))
        {
//            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check category dir is exists
            if (!Storage::disk('public')->exists('category'))
            {
                Storage::disk('public')->makeDirectory('category');
            }
//            delete old image
            if (Storage::disk('public')->exists('category/'.$category->image))
            {
                Storage::disk('public')->delete('category/'.$category->image);
            }
//            resize image for category and upload
//            $categoryimage = Image::make($image)->resize(1600,479)->save();
//            Storage::disk('public')->put('category/'.$imagename,$categoryimage);

            //            check category slider dir is exists
            if (!Storage::disk('public')->exists('category/slider'))
            {
                Storage::disk('public')->makeDirectory('category/slider');
            }
            //            delete old slider image
            if (Storage::disk('public')->exists('category/slider/'.$category->image))
            {
                Storage::disk('public')->delete('category/slider/'.$category->image);
            }
            //            resize image for category slider and upload
//            $slider = Image::make($image)->resize(500,333)->save();
//            Storage::disk('public')->put('category/slider/'.$imagename,$slider);

        } else {
            $imagename = $category->image;
        }

        $category->name = $request->name;
        $category->slug = $slug;
        $category->image = $imagename;
        $category->save();
        Toastr::success('Category Successfully Updated :)' ,'Success');
        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        $category = Categories::find($id);
        if (Storage::disk('public')->exists('category/'.$category->image))
        {
            Storage::disk('public')->delete('category/'.$category->image);
        }

        if (Storage::disk('public')->exists('category/slider/'.$category->image))
        {
            Storage::disk('public')->delete('category/slider/'.$category->image);
        }
        $category->delete();
        Toastr::success('Category Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
