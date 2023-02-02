<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Traits\FileUpload;

class ContactController extends Controller
{
    use  FileUpload;

    public function index()
    {
        $contact = Contact::all();
        return view('backend.contacts.contact', compact('contact'));
    }

    public function create()
    {
        return view('backend.contacts.contact_create');
    }


    public function store(ContactRequest $contactRequest)
    {

        $data = $contactRequest->validated();
        $data = $this->fileUpload($data);
        Contact::create($data);
        return redirect()->route('backend.contacts.index')->with('message', 'Post successfully create.');
    }


    public function edit($id)
    {
        $contact_edit = Contact::find($id);
        return view('.backend.contacts.contact_edit', compact('contact_edit'));
    }


    public function update(ContactRequest $contactRequest, $id)
    {
        $data = $contactRequest->validated();
        $post = Contact::find($id);
        if (isset($data['image'])) {
            $data = $this->fileUpload($data);

        }
        $post->update($data);

        return redirect()->route('backend.contacts.index')->with('message', 'Post successfully update.');
    }


    public function destroy($id)
    {
        $request = request()->merge(['id' => $id]);
        $request->validate(['id' => 'required|exists:contacts,id']);
        $post = Contact::find($id);
        unlink('storage/images/' . $post->image);
        $post->delete();
        return redirect()->route('backend.contacts.index')->with('message', 'Post successfully delete.');
    }
}
