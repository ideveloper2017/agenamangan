<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Requests\PermissionRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class PermissionController extends Controller
{
    /**
     * Show Role List
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request): mixed
    {
        try {
            $roles = Role::pluck('name', 'id');

            return view('backend.permission.index', compact('roles'));
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Show Role List with associate permission
     * Server side list view using yajra datatables
     *
     * @param Request $request
     * @return mixed
     */

    public function getPermissionList(Request $request): mixed
    {
        $data = Permission::get();
        $hasManagePermission = Auth::user()->can('manage_permission');

        return Datatables::of($data)
            ->addColumn('roles', function ($data) {
                $roles = $data->roles()->get();
                $badges = '';
                foreach ($roles as $key => $role) {
                    $badges .= '<span class="badge badge-dark m-1">' . $role->name . '</span>';
                }

                return $badges;
            })
            ->addColumn('action', function ($data) use ($hasManagePermission) {
                $output = '';
//                if ($hasManagePermission) {
                    $output = '
                                    <a href="' . url('admin/permission/delete/' . $data->id) . '"><i class="fa fa-trash-o f-16 text-red"></i></a>
                                ';
//                }

                return $output;
            })
            ->rawColumns(['roles', 'action'])
            ->make(true);
    }

    /**
     * Store new roles with assigned permission
     * Associate permissions will be stored in table
     *
     * @param PermissionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function create(PermissionRequest $request): RedirectResponse
    {
        try {
            $permission = Permission::create(['name' => $request->name]);
            $permission->syncRoles($request->roles);

            if ($permission) {
                return redirect('/admin/permission')->with('success', 'Permission created succesfully!');
            }

            return redirect('/admin/permission')->with('error', 'Failed to create permission! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * update permission table
     *
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request): mixed
    {
        //
        $permission = Permission::find($request->id);
        $permission->name = $request->name;
        $permission->save();

        return $permission;
    }

    /**
     * delete permission
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        if ($permission = Permission::find($id)) {
            $delete = $permission->delete();
            $perm = $permission->roles()->delete();

            return redirect('permission')->with('success', 'Permission deleted!');
        }

        return redirect('404');
    }

    /**
     * get permission badges by role
     *
     * @param Request $request
     * @return mixed
     */
    public function getPermissionBadgeByRole(Request $request): mixed
    {
        $badges = '';
        if ($request->id) {
            $role = Role::find($request->id);
            $permissions = $role->permissions()->pluck('name', 'id');
            foreach ($permissions as $key => $permission) {
                $badges .= '<span class="badge badge-dark m-1">' . $permission . '</span>';
            }
        }

        if ($role->name == 'Super Admin') {
            $badges = ' Super Admin has all the permissions!';
        }

        return $badges;
    }
}
