<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'meta_keyword',
        'meta_title',
        'meta_description'
    ];

    protected $table = "categories";
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class,'category_id');
    }
}