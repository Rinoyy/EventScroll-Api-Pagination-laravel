<?php

namespace App\Http\Controllers;

use App\Models\Latihan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function get(){
        $select = (new Latihan())->index();
        return response()->json($select);
    }


    public function store(Request $request){
        $store = (new Latihan())->store($request);
        return response()->json($store);
    }


    public function update(Request $request, $id){
        $store = (new Latihan())->updateLatihan($request, $id);
        return response()->json($store);
    }

    public function show(Request $request, $id){
        $store = (new Latihan())->show($request, $id);
        return response()->json($store);
    }
    public function delete($id){
        $store = (new Latihan())->deleteLatihan($id);
        return response()->json($store);
    }
}
