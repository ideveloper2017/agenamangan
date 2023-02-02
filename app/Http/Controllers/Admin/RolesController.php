<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RolesController extends Controller
{


    public function index(Request $request): mixed
    {
        try {
            $permissions = Permission::pluck('name', 'id');

            return view('backend.role.roles', compact('permissions'));
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    public function getRoleList(Request $request): mixed
    {
        $data = Role::get();
        $hasManageRoles = Auth::user()->can('manage_roles');

        return Datatables::of($data)
            ->addColumn('permissions', function ($data) {
                if ($data->name == 'Super Admin') {
                    return '<span class="badge badge-success m-1">All permissions</span>';
                }
                $badges = '';
                $roles = $data->permissions()->get();
                foreach ($roles as $key => $role) {
                    $badges .= '<span class="badge badge-warning m-1">' . $role->name . '</span>';
                }

                return $badges;
            })
            ->addColumn('action', function ($data) use ($hasManageRoles) {
                $output = '';
//                if ($hasManageRoles && $data->name != 'Super Admin') {
                    $output = '
                                    <a href="' . url('admin/roles/edit/' . $data->id) . '" ><i class="fa fa-edit f-16 mr-15 text-green"></i></a>
                                    <a href="' . url('admin/roles/delete/' . $data->id) . '"  ><i class="fa fa-trash-o f-16 text-red"></i></a>
                                ';
//                }

                return $output;
            })
            ->rawColumns(['permissions', 'action'])
            ->make(true);
    }

    public function create(Request $request): RedirectResponse
    {
        try {
            $role = Role::create(['name' => $request->name]);
            $role->syncPermissions($request->permissions);

            if ($role) {
                return redirect('roles')->with('success', 'Role created succesfully!');
            }

            return redirect('admin/roles')->with('error', 'Failed to create role! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    public function edit($id): mixed
    {
        $role = Role::where('id', $id)->first();

        if ($role) {
            $role_permission = $role->permissions()->pluck('id')->toArray();

            $permissions = Permission::pluck('name', 'id');

            return view('backend.role.edit-roles', compact('role', 'role_permission', 'permissions'));
        }

        return redirect('404');
    }

    /**
     * update role
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->messages()->first());
        }

        try {
            $role = Role::find($request->id);

            $update = $role->update([
                'name' => $request->name,
            ]);

            // Sync role permissions
            $role->syncPermissions($request->permissions);

            return redirect('admin/roles')->with('success', 'Role info updated succesfully!');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }


    public function delete($id): RedirectResponse
    {
        if ($role = Role::find($id)) {
            $delete = $role->delete();
            $perm = $role->permissions()->delete();

            return redirect('admin/roles')->with('success', 'Role deleted!');
        }

        return redirect('404');
    }
}
