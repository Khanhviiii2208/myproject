<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovePost;
class PostController extends Controller
{
    public function index(){
    $title = "Quản Lý Bài Viết";
    $post = Post::with('user')->get(); 
    return view("admin.pages.post.index", compact(
        "post",
        'title'
    ));
    }
    public function create(){
        $title="Thêm bài viết";
        $categories= Category::all();
        return view('admin.pages.post.create',compact(
            'title',
            'categories'
        ));
    }

    public function edit($id) {
        $title = 'Chỉnh sửa bài viết';
        $post = Post::find($id);
        $categories = Category::all();
        $data = $post->categories;
    
         
        return view('admin.pages.post.edit', compact('title','post', 'categories', 'data'));
    }

    public function store(Request $request){
        $request->validate([
            "name"=> "required|unique:posts",
            'category_id'=>"required",
            "short_content"=> "required",
            "thumbnail"=> "required",
            "content"=> "required",
        ],[
            'name.required'=>"Trường tên bài viết này không được để trống",
            'name.min' => 'Tên phải có ít nhất 10 ký tự',   
            'category_id.required'=>"Trường tên danh mục này không được để trống",        
            'short_content.required' => 'Vui lòng nhập nội dung ngắn',
            'thumbnail.required' => 'Vui lòng chọn ảnh',
            'content.required' => 'Vui lòng nhập nội dung bài viết',     
        ]);
        $post = new Post;
        $post->name = $request->name;
        $post->slug = Str::slug($request->name, '-');
        $post->short_content = $request->short_content;
        $post->content = $request->content;
        $post->thumbnail = $request->thumbnail;
        // $post->status = $request->status;
        $post->user_id = Auth::user()->id;

        $post->meta_keyword = $request->meta_keyword;
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        
        $post->save();
        foreach($request->category_id as $category){
            $post->categories()->attach($category);
        }
        toastr()->success('Thêm bài viết thành công');
        // $post->save();
        return to_route('admin.post');
        // dd($request->all);
    }
    public function delete($id){
        $post = Post::find($id);
        $post->categories()->detach();
        //xóa mối quan hệ giữa bài viết (Post) và các danh mục (categories) 
        $post->delete();
        toastr()->success('Xóa bài viết thành công');
        return back();
    }

    public function update(Request $request, $id){
        $request->validate([
            "name"=> "required|unique:posts,name,".$id,
            'category_id'=>"required",
            "short_content"=> "required",
            "thumbnail"=> "required",
            "content"=> "required"
        ],[
            'name.required'=>"Trường tên bài viết này không được để trống",
            'name.min' => 'Tên phải có ít nhất 10 ký tự',   
            'category_id.required'=>"Trường tên danh mục này không được để trống",        
            'short_content.required' => 'Vui lòng nhập nội dung ngắn',
            'thumbnail.required' => 'Vui lòng chọn ảnh',
            'content.required' => 'Vui lòng nhập nội dung bài viết'  
        ]);
        $post = Post::find($id);
        $post->name = $request->name;
        $post->slug = Str::slug($request->name, '-');
        $post->short_content = $request->short_content;
        $post->content = $request->content;
        $post->thumbnail = $request->thumbnail;
        $post->status == 'pending';       
        $post->user_id = Auth::user()->id;
        $post->meta_keyword = $request->meta_keyword;
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;

        $post->save();
         
        foreach($request->category_id as $category){
            $post->categories()->sync($category);
        }

        toastr()->success('Cập nhật bài viết thành công');
        return to_route('admin.post');

}
//QUẢN LÝ BÀI VIẾT

public function indexApprove(){
    $title="Duyệt bài viết";
    $posts = Post::where('status', 'pending')->get();

    return view('admin.pages.post.approve.index',compact(
        'title',
        'posts'
    ));
}
public function viewApprove($slug){
    $title = "Chi tiết bài viết";

    $post = Post::where('slug',$slug)->first(); 
        // dd($post);
    return view('admin.pages.post.approve.view',compact(
        'title',
        'post'
    ));
}
public function statusApprove(Request $request, $id, $status){
    $post = Post::find($id);
    $post->status = $status;
    $comment = $request->query('comment');
    $post->save();
    if($status == 'accept'){
        $notice = "Bài viết của bạn đã được duyệt!!!";
        Mail::to($post->user->email)->send(new approvePost($post,$notice,$comment));  
        toastr()->success('Duyệt bài viết thành công');
    }else{
        $notice = "Bài viết của bạn đã bị từ chối!!!";
        Mail::to($post->user->email)->send(new approvePost($post,$notice,$comment));  
        toastr()->success('Từ chối viết thành công');
    }
    
    return back();
}

}