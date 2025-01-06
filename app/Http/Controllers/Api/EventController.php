<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{

    public function getLimit(Request $request){

        $select = (new Post())->getPosts($request);
        return $select;

    }

    public function limit(Request $request)
    {
        $page = $request->post('page');
        $limit = $request->post('limit');
        $offset = $limit * $page;

        $data = [
            'page' => $page,
            'limit' => $limit,
            'offset' => $offset,
            'rumus offset' => "page $page * limit $limit = offset $offset",
        ];


        return response()->json($data);
    }

}