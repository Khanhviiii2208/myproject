<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    //
    function index(){
        $roles = Role::all();
        return view('admin.pages.role.index', compact('roles'));
    }
    function create(){
        $title="Tạo vai trò";
        $permissions = Permission::all();
        return view('admin.pages.role.create', compact('permissions','title'));
    }
    function store(Request $request){
        $request->validate([
            'name' =>'required|unique:roles,name',
        ],[
            'name.required' => 'Vui lòng nhập tên vai trò',
            'name.unique' => 'Tên vai trò đã tồn tại',
        ]);
        
        $role = Role::create(['name' => $request->name]);
        
        if($request->has('permissions'))
        {
            $role->syncPermissions($request->permissions);
        }

        toastr()->success('Tạo vai trò thành công');

        return redirect()->route('admin.role');
    }
    public function edit($id) {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('admin.pages.role.edit', compact(
            'permissions',
            'role'
        ));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id,
            'permissions' => 'array'
        ]);

        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        toastr()->success('Cập nhật vai trò thành công');
        return redirect()->route('admin.role');
    }

    public function delete($id) {
        $role = Role::findOrFail($id);
        $role->delete();
        toastr()->success('Xóa vai trò thành công');
        return redirect()->route('admin.role');
    }
}