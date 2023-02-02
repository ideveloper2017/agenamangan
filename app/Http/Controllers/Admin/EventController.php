<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\EventRequest;
use App\Models\Blog;
use App\Models\Events;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class EventController extends Controller
{
    use  FileUpload;
    public function index()
    {
        $event = Events::all();
        return view('backend.event.events', compact('event'));
    }
    public function create()
    {
        return view('backend.event.events_create');
    }

    public function store(EventRequest $eventRequest)
    {

        $data = $eventRequest->validated();
        $data = $this->fileUpload($data);
        Events::create($data);
        return redirect()->route('admin.event.index')->with('message', 'Post successfully create.');
    }


    public function edit($id)
    {
        $event_edit = Events::find($id);
        return view('backend.event.events_edit', compact('event_edit'));
    }


    public function update(EventRequest $eventRequest, $id)
    {
        $data = $eventRequest->validated();
        $post = Events::find($id);
        if (isset($data['image'])) {
            $data = $this->fileUpload($data);
        }
        $post->update($data);

        return redirect()->route('admin.event.index')->with('message', 'Post successfully update.');
    }


    public function destroy($id)
    {
        $request = request()->merge(['id' => $id]);
        $request->validate(['id' => 'required|exists:events,id']);
        $post = Events::find($id);
        unlink('storage/images/' . $post->image);
        $post->delete();
        return redirect()->route('admin.event.index')->with('message', 'Post successfully delete.');
    }
}
