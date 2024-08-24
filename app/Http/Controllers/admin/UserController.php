<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{ 
    public function index(){
        $title = "Quản Lý Thành Viên";
        $users = User::all();       
        return view("admin.pages.user.index", compact(
            "users",
            'title'
        ));
    }

    public function delete($id){
        $user = User::findOrFail($id);
       
        if($user->posts->count() == 0){
            $user->delete();
        
            toastr()->success('Xóa thành công!');
            return redirect()->back();
        }else{
            toastr()->error('Không thể xóa thành viên này vì người dùng đã đăng bài viết');
            return redirect()->back();
        }
        
    }
    public function create(){
        $roles=Role::all();
        $title = "Thêm mới thành viên";
        return view("admin.pages.user.create_edit", compact('title', 'roles'));

    }
    public function edit($id){
        $title = 'Chỉnh sửa thành viên';
        $roles=Role::all();
        $user = User::find($id);

        return view('admin.pages.user.edit', compact(
            'title',
            'user',
            'roles'
        ));
    }

    public function update(UpdateUserRequest $request, $id){
        $userUpdate = User::find($id);
        $roles=Role::all();
        $userUpdate -> name = $request->name;
        $userUpdate -> role = $request->role;
        $userUpdate -> status = $request->status;

        $userUpdate -> save();
        $userUpdate ->syncRoles($request->role);
        
        toastr()->success('Cập nhật thành công');
        return redirect()->back();

        // dd($request->all());
    }


    public function store(StoreUserRequest $request){
        $user= new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->status=$request->status;
        $user->assignRole($request->role);
        $user->save();

        if($user){
            toastr()->success('Thêm thành viên thành công');
            return redirect()->route('admin.user');
        }else{
            toastr()->error('Thêm thành viên thất bại');
            return redirect()->back();
        }
    }
}