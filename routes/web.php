<?php

use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\loginController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\CheckLoginAdminMiddleware;
use App\Http\Controllers\admin\PostController;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;

use App\Http\Controllers\client\ArticleController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\CommentController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\Category_Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
// Import the ProfileController class
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthenticatedSessionController::class, 'create'])
->name('login');

Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
->name('logout');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 



// ...

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/admin/login', [loginController::class,'index'])->name('admin.login.index')->middleware(CheckLoginAdminMiddleware::class);
Route::post('/admin/doLogin', [loginController::class,'login'])->name('admin.login.doLogin');
Route::get('/admin/doLogout', [loginController::class,'doLogout'])->name('admin.doLogout');

Route::get('/admin/dashboard', [DashboardController::class,'index'])
        ->name('admin.dashboard')->middleware(AuthMiddleware::class);



// QL user
Route::prefix('/admin/user')->group(function (){
    Route::get('/', [UserController::class,'index'])->name('admin.user')->middleware('Permission:view post');
    Route::get('/create', [UserController::class,'create'])->name('admin.user.create')->middleware('Permission:create user');
    Route::post('/store', [UserController::class,'store'])->name('admin.user.store')->middleware('Permission:create user');
    Route::get('/edit/{id}', [UserController::class,'edit'])->name('admin.user.edit')->middleware('Permission:edit user');
    Route::post('/update/{id}', [UserController::class,'update'])->name('admin.user.update')->middleware('Permission:edit user');
    Route::get('/delete/{id}', [UserController::class,'delete'])->name('admin.user.delete')->middleware('Permission:delete user');
})->middleware(AuthMiddleware::class);

// QL category
Route::prefix('/admin/category')->group(function (){
    Route::get('/', [CategoryController::class,'index'])->name('admin.category')->middleware('Permission:view category');
    Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create')->middleware('Permission:create category');
    Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store')->middleware('Permission:create category');
    Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('admin.category.edit')->middleware('Permission:edit category');
    Route::post('/update/{id}', [CategoryController::class,'update'])->name('admin.category.update')->middleware('Permission:edit category');
    Route::get('/delete/{id}', [CategoryController::class,'delete'])->name('admin.category.delete')->middleware('Permission:delete category');
})->middleware(AuthMiddleware::class);

// QL Post
Route::prefix('/admin/post')->group(function (){
    Route::get('/', [PostController::class,'index'])->name('admin.post')->middleware('Permission:view post');
    Route::get('/create', [PostController::class,'create'])->name('admin.post.create')->middleware('Permission:create post');
    Route::post('/store', [PostController::class,'store'])->name('admin.post.store')->middleware('Permission:create post');
    Route::get('/edit/{id}', [PostController::class,'edit'])->name('admin.post.edit')->middleware('Permission:edit post');
    Route::post('/update/{id}', [PostController::class,'update'])->name('admin.post.update')->middleware('Permission:edit post');
    Route::get('/delete/{id}', [PostController::class,'delete'])->name('admin.post.delete')->middleware('Permission:delete post');
});

Route::prefix('/admin/role')->group(function (){
    Route::get('/', [RoleController::class,'index'])->name('admin.role')->middleware('Permission:view role');
    Route::get('/create', [RoleController::class,'create'])->name('admin.role.create')->middleware('Permission:create role');
    Route::post('/store', [RoleController::class,'store'])->name('admin.role.store')->middleware('Permission:create role');
    Route::get('/edit/{id}', [RoleController::class,'edit'])->name('admin.role.edit')->middleware('Permission:edit role');
    Route::post('/update/{id}', [RoleController::class,'update'])->name('admin.role.update')->middleware('Permission:edit role');
    Route::get('/delete/{id}', [RoleController::class,'delete'])->name('admin.role.delete')->middleware('Permission:delete role');
})->middleware(AuthMiddleware::class);

Route::get('/home',[HomeController::class,'home'])->name('home');

Route::get('/contact',[ContactController::class, 'contact'])->name('contact');
Route::get('/articles/detail/{slug}',[ArticleController::class,'detail'])->name('article_detail');
Route::get('/category',[Category_Controller::class,'list'])->name('category');
Route::get('/article/cate/{slug}',[ArticleController::class,'cate_article'])->name('cate_article');
Route::get('/search',[ArticleController::class,'search'])->name('search_article');
Route::post('/comment',[CommentController::class,'store'])->name('comment');
Route::post('/comment/update',[CommentController::class,'update'])->name('comment.update');
Route::get('/comment/delete/{id}',[CommentController::class,'destroy'])->name('comment.delete');
Route::post('/comment/reply',[CommentController::class,'reply'])->name('comment.reply');
//duyệt POST

Route::prefix('/admin/approves-post')->group(function(){
    Route::get('/', [PostController::class,'indexApprove'])->name('admin.approve-post');
    Route::get('/view/{slug}', [PostController::class,'viewApprove'])->name('admin.approve-post.view');
    Route::get('/update/{id}/{status}', [PostController::class,'statusApprove'])->name('admin.approve-post.update');
})->middleware(AuthMiddleware::class);
//