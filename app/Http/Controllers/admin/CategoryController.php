<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $title = 'Quản Lý Danh Mục';
        $category = Category::all();

        return view('admin.pages.category.index', compact(
            'category',
            'title',
        ));
        
    }

    public function create() {
        $title = " Thêm mới danh mục";
        return view('admin.pages.category.create', compact(
            'title',
        ));
    }


    public function store(StoreCategoryRequest $request){
        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'meta_keyword' => $request->meta_keyword,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description
        ]);
        if($category){
            toastr()->success('Thêm danh mục thành công');
            return redirect()->route('admin.category');
        }else{
            toastr()->success('Thêm danh mục thất bại');
            return redirect()->route('admin.category');
        }
          
    }
    //copy
    public function delete($id){
        $category = Category::findOrFail($id);
        if( $category->posts->count() == 0){
            $category->delete();
            toastr()->success('Xóa thành công danh mục!');
            return redirect()->back();
        }
        toastr()->error('Không thể xóa danh mục này vì có chưa bài viết!!!');
        return redirect()->back();
        
       
    }
    public function edit($id){
        $title = 'Chỉnh sửa danh mục';
        $category = DB::table('categories')->find($id);

        return view('admin.pages.category.edit', compact(
            'title',
            'category'
        ));
    }
    public function update(Request $request, $id){
        $request->validate([
            "name"=> "required"
           
        ],[
            'name.required'=>"Trường tên danh mục này không được để trống"
                    
        ]);
        $categoryUpdate = Category::find($id);
        $categoryUpdate -> name = $request->name;
        $categoryUpdate -> meta_keyword = $request->meta_keyword;
        $categoryUpdate -> meta_title = $request->meta_title;
        $categoryUpdate -> meta_description = $request->meta_description;

        $categoryUpdate->save();
        
        toastr()->success('Cập nhật danh mục thành công');
        return back();
    
}
function list(){
    return view('client.category');
}

}