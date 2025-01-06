<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DataController extends Controller
{
    public function data()
    {
        return view('main');
    }

    public function getData(Request $request)
    {
        $limit = $request->post('limit');
        $page = $request->post('page');

        //skip itu ofset 
        //take itu limit
        // $data = DB::table('items')->skip(15)->take(5)->get();
       
    }
}
