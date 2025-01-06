<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'slug', 'status']; // tambahkan $fillable

    public function getPosts(Request $request){
        $page = $request->post('page');
        $limit = 20;
        $offset = $page * $limit;

        $getLimit = Post::offset($offset)->take($limit)->get();
        return response()->json($getLimit);      
    }
}
