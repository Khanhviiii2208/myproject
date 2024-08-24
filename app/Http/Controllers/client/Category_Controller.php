<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class Category_Controller extends Controller
{
    //
    function list(){
            $title="Tất cả tin";
            $category = Category::orderby('id')->limit(5)->get();
            $post=Post::all()->where('status','accept');
            $rest_cate= Category::orderby('id')->limit(PHP_INT_MAX)->offset(5)->get();
           
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
            
            return view('client.pages.category.all_article', 
            compact('category',
                    'post',
                    'title',
                    'rest_cate',
                    'tin_hot',
                    'tinrandom',
                    'categoriesPerPage',
                    'tinchoban'
                ));
    }

   
}