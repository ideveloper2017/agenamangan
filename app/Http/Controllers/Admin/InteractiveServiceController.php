<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Interactive_serviceRequest;

use App\Models\Interactive_service;

class InteractiveServiceController extends Controller
{
    public function index()
    {
        $interactive_service = Interactive_service::all();
        return view('backend.interactive_service.interactive_service', compact('interactive_service'));
    }


    public function create()
    {
        return view('backend.interactive_service.interactive_service_create');
    }


    public function store(Interactive_serviceRequest $interactive_serviceRequest)
    {
        $data = $interactive_serviceRequest->validated();
         Interactive_service::create($data);
        return redirect()->route('admin.interactive_services.index')->with('message', 'Post successfully create.');
    }


    public function destroy($id)
    {
        $request = request()->merge(['id' => $id]);
        $request->validate(['id' => 'required|exists:interactive_services,id']);
        $post = Interactive_service::find($id);
        $post->delete();
        return redirect()->route('admin.interactive_services.index')->with('message', 'Post successfully delete.');
    }
}
