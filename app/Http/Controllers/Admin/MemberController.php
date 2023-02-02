<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\MembersRequest;
use App\Models\Contact;
use App\Models\Members;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    use  FileUpload;

    public function index()
    {
        $employeess = Members::all();
        return view('backend.member.members', compact('employeess'));
    }


    public function create()
    {
        return view('backend.member.members_create');
    }


    public function store(MembersRequest $membersRequest)
    {

        $data = $membersRequest->validated();
        $data = $this->fileUpload($data);
        Members::create($data);
        return redirect()->route('admin.members.index')->with('message', 'Post successfully create.');
    }


    public function edit($id)
    {
        $employees_edit = Members::find($id);
        return view('admin.member.members_edit', compact('employees_edit'));
    }


    public function update(MembersRequest $employeesRequest, $id)
    {
        $data = $employeesRequest->validated();
        $post = Members::find($id);
        if (isset($data['image'])) {
            $data = $this->fileUpload($data);

        }
        $post->update($data);

        return redirect()->route('admin.members.index')->with('message', 'Post successfully update.');
    }


    public function destroy($id)
    {
        $request = request()->merge(['id' => $id]);
        $request->validate(['id' => 'required|exists:employees,id']);
        $post = Members::find($id);
        unlink('storage/images/' . $post->image);
        $post->delete();
        return redirect()->route('admin.members.index')->with('message', 'Post successfully delete.');
    }
}
