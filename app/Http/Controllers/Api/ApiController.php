<?php

namespace App\Http\Controllers\Api;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ApiController extends Controller
{

    public function get()
    {
        $select = (new Item())->get();
        return $select;
    }

    public function show(Request $request, $id)
    {
        $select = (new Item())->show($request, $id);
        return $select;       
    }


    public function store(Request $request)
    {
        $user = (new Item())->store($request);
        return response()->json($user);
    }


    public function update(Request $request, $id)
    {
        $update = (new Item())->newUpdate($request, $id);
        return response()->json($update);
    }

    public function delete($id)
    {
        $user = (new Item())->delete_users($id);
        return response()->json($user);
    }
}
