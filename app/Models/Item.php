<?php

namespace App\Models;



use Illuminate\Http\Request;;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;



class Item extends Model
{
    protected $fillable = ['name'];
    protected $table = 'items';


    public function store(Request $request)
    {

        $out = ['success' => false, 'data' => null, 'message' => []];

        try {

            $name = $request->post('name');

            if(empty($name)){
                $out['data'] = 'Name tidak di temukkan';
                return $out;
            }

            $data = [
                'name' => $name,
            ];
        
            if($name){
                $save = Item::Create($data);
                if ($save) {
                    $out['success'] = true;
                    $out['data'] = $save;
                    $out['message'] = 'Data Berhasil di insert';
                } else {
                    return response()->json("gagal di insert");
                }
            }
            
        } catch (\Exception $th) {
            $out =  array('message' => $th->getMessage());
        }
        return $out;
    }


    public function get()
    {

        $out = [
            'success' => false,
            'data' => null,
            'message' => []
        ];

        try {
            $select = Item::all();

            if (count($select) > 0) {
                $out['success'] = true;
                $out['data'] = $select;
                $out['message'] = 'Data di temukkan';
            }else{
                $out['message'] = 'data kosong';
                return $out;
            }

        } catch (\Exception $th) {
            $out =  array('message' => $th->getMessage());
            $out['message'] = ['Error: ' . $th];
        }

        return $out;
    }


    public function show(Request $request, $id)
    {

        $out = ['success' => false, 'data' => null, 'message' => []];

        try {
            $users = Item::find($id); //responsenya object true/false
            if ($users) {
                $out['success'] = true;
                $out['data']    = $users;
                $out['message'] = ['Data ditemukan'];
            } else {
                $out['message'] = ['Data tidak ditemukan'];
            }
        } catch (\Exception $th) {
            $message = $th->getMessage();
            $out['message'] = ['Error: ' . $message];
        }
        return $out;
    }


    public function newUpdate(Request $request, $id)
    {

        $out = ['success' => false, 'data' => null, 'message' => []];

        try {
            $name = $request->post('name');

            if(empty($name)){
                $out['message'] = "Name null/kosong tidak di temukkan";
                return $out;
            }

            $data = [
                'name' => $name,
            ];

            $checkUser = Item::find($id);
            
            if ($checkUser) {
                $update = Item::where('id', $id)
                    ->update($data);

                if ($update) {
                    $out['success'] = true;
                    $out['data']    = $checkUser;
                    $out['message'] = ['Data Berhasil di update'];
                    return $out;
                } else {
                    $out['message'] = ['Data tidak ditemukan'];
                }
            } else {
                return response()->json("Data tidak ada");
            }
        } catch (\Exception $th) {
            $out =  array('message' => $th->getMessage());
            return $out;
        }
    }

    public function delete_users($id)
    {
        $out = ['success' => false, 'data' => null, 'message' => []];

        try {
            $check_item = Item::find($id);

            if (!$check_item) {
                $out['message'] = ['Data tidak ditemukan'];
                return $out;
            }

            // $delete = DB::table('items')->where('id', $id)->delete();
            $delete = Item::where('id', $id)->delete();


            if ($delete) {
                $out['success'] = true;
                $out['data'] = $check_item;
                $out['message'] = ['Data berhasil dihapus'];
            } else {
                $out['message'] = ['Data gagal dihapus'];
            }
        } catch (\Exception $th) {
            $out['message'] = ['Error: ' . $th->getMessage()];
        }

        return $out;
    }
}
