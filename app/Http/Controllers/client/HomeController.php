<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    //
    function home(){
        $title="Trang chủ";

        $tinmoinhat = Post::with('user','categories')
        ->where('status','accept')->
        orderByDesc('created_at')->
        limit(6)->
        get();

        $tin_slider = Post::with('user','categories')
        ->where('status','accept')->
        orderByDesc('created_at')->
        limit(3)->
        get();

        $tin_hot = Post::with('user', 'categories')
        ->where('status', 'accept')
        ->orderByDesc('views')
        ->limit(3)
        ->get();

        $tinxemnhieu = Post::with('user', 'categories')
        ->where('status', 'accept')
        ->orderByDesc('views')
        ->limit(9)
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

        return view('client.pages.home.home', compact(
            'tinmoinhat',
            'title',
            'tin_slider',
            'tin_hot',
            'tinxemnhieu',
            'tinrandom',
            'categoriesPerPage',
            'tinchoban'
    ));
    }
}