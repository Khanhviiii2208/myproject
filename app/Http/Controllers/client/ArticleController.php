<?php

namespace App\Http\Controllers\client;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    function detail($slug){
        $slug = str_replace(".html","", $slug);

        $post= Post::with('user','categories')->where('slug', $slug)->where('status','accept')->first();

        $post->increment('views');

        $title=$post->name;

        $id_cate=$post->categories()->first()->id;

        $post_related=Category::with('posts')->find($id_cate);

        $metaKeywordsArray = json_decode($post->meta_keyword, true);

        $tin_hot = Post::with('user', 'categories')
        ->where('status', 'accept')
        ->orderByDesc('views')
        ->limit(3)
        ->get();

        $tinrandom=Post::with('user', 'categories')
        ->inRandomOrder()
        ->where('status', 'accept')
        ->limit(9)
        ->get();
        
        $sotrangdm=ceil(count(Category::all())/4);

        $categoriesPerPage = [];
        for ($i = 0; $i < $sotrangdm; $i++) {
            $offset = 4 * $i;
            $categoriesPerPage[$i] = Category::offset($offset)->limit(4)->get();
        }

        $tinchoban=Post::with('user', 'categories')
        ->inRandomOrder()
        ->where('status', 'accept')
        ->limit(8)
        ->get();

        return view('client.pages.article.detail', compact(
            'post',
            'metaKeywordsArray',
            'post_related',
            'title',
            'tin_hot',
            'tinrandom',
            'categoriesPerPage',
            'tinchoban'
        ));
    }

    function cate_article($slug){
        $slug = str_replace('.html','',$slug);
        $danhmuc= Category::limit(5)->get();
        $category = Category::with('posts')->where('slug',$slug)->first();
        $rest_cate= Category::orderby('id')->limit(PHP_INT_MAX)->offset(5)->get();
        $title=$category->name;

        $tin_hot = Post::with('user', 'categories')
        ->where('status', 'accept')
        ->orderByDesc('views')
        ->limit(3)
        ->get();

        $tinrandom=Post::with('user', 'categories')
        ->inRandomOrder()
        ->where('status', 'accept')
        ->limit(9)
        ->get();
        
        $sotrangdm=ceil(count(Category::all())/4);

        $categoriesPerPage = [];
        for ($i = 0; $i < $sotrangdm; $i++) {
            $offset = 4 * $i;
            $categoriesPerPage[$i] = Category::offset($offset)->limit(4)->get();
        }

        $tinchoban=Post::with('user', 'categories')
        ->inRandomOrder()
        ->where('status', 'accept')
        ->limit(8)
        ->get();

        if($category == null){
            return abort(403,'DANH MỤC KHÔNG TỒN TẠI');
        }
        $cate_article=$category->posts->where('status','=','accept');
        return view('client.pages.category.category', 
        compact(
            'cate_article',
            'danhmuc','title',
            'rest_cate',
            'tin_hot',
            'tinrandom',
            'categoriesPerPage',
            'tinchoban'
        ));
    }
    public function search(){
        $rest_cate= Category::orderby('id')->limit(PHP_INT_MAX)->offset(5)->get();

        $danhmuc= Category::limit(5)->get();

        $search = $_GET['search'] ? $_GET['search'] : '';

        $posts_search = Post::with('user', 'categories')
        ->where('name','LIKE','%'.$search.'%')
        ->orWhere('short_content', 'LIKE', '%'.$search.'%')
        ->where('status','=','accept')->get();
        $tin_hot = Post::with('user', 'categories')
        ->where('status', 'accept')
        ->orderByDesc('views')
        ->limit(3)
        ->get();

        $tinrandom=Post::with('user', 'categories')
        ->inRandomOrder()
        ->where('status', 'accept')
        ->limit(9)
        ->get();
        
        $sotrangdm=ceil(count(Category::all())/4);

        $categoriesPerPage = [];
        for ($i = 0; $i < $sotrangdm; $i++) {
            $offset = 4 * $i;
            $categoriesPerPage[$i] = Category::offset($offset)->limit(4)->get();
        }

        $tinchoban=Post::with('user', 'categories')
        ->inRandomOrder()
        ->where('status', 'accept')
        ->limit(8)
        ->get();

        $title=$search;

        return view('client.pages.search.search',compact(
            'posts_search',
            'search',
            'danhmuc',
            'rest_cate',
            'tin_hot',
            'tinrandom',
            'categoriesPerPage',
            'tinchoban',
            'title',
        ));
    }
 
}