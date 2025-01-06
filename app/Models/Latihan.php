<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    protected $fillable = ['name', 'class', 'mapel'];
    protected $table = 'latihans';


    public function index()
    {
        $out = ['success' => false, 'data' => null, 'message' => []];

        try {
            $select = Latihan::all();
            if($select){
                $out['success'] = true;
                $out['data'] = $select;
                $out['message'] = 'Data berhasil di select';
            }else{
                $out['message'] = 'Data berhasil di select';
            }
        } catch (\Exception $th) {
            $message = $th->getMessage();
            $out['message'] = ['Error' . $message];
        }
        return $out;
    }

    public function store(Request $request)
    {

        $out = ['success' => false, 'data' => null, 'message' => []];


        try {
            $name = $request->post('name');
            $class = $request->post('class');
            $mapel = $request->post('mapel');

            $data = [
                'name' => $name,
                'class' => $class,
                'mapel' => $mapel,
            ];

            if ($data) {
                $store = Latihan::create($data);
                if ($store) {
                    $out['success'] = true;
                    $out['data'] = $data;
                    $out['message'] = 'Data berhasil di insert ke table latihan';
                } else {
                    $out['message'] = 'Data Gagal di insert';
                }
            }
        } catch (\Exception $th) {
            $message = $th->getMessage();
            $out['message'] = ['Error: ' . $message];
        }

        return $out;
    }



    public function updateLatihan(Request $request, $id)
    {
        $out = [
            'success' => false,
            'data' => null,
            'message' => []
        ];

        try {
            $name = $request->post('name');
            $class = $request->post('class');
            $mapel = $request->post('mapel');

            $data = [
                'name' => $name,
                'class' => $class,
                'mapel' => $mapel,
            ];

            $checkUser = Latihan::find($id);

            if ($checkUser) {
                $update = Latihan::where('id', $id)
                    ->update($data);

                if ($update) {
                    $out['success'] = true;
                    $out['data'] = $checkUser;
                    $out['message'] = 'Data  berhasil di update';
                } else {
                    $out['message'] = 'Data  gagal di update';
                }
            } else {
                return "Data tidak di temukkan";
            }
        } catch (\Exception $th) {
            $message = $th->getMessage();
            $out['message'] = ['Error: ' . $message];
        }
        return $out;
    }

    public function show(Request $request, $id)
    {
        $out = [
            'success' => false,
            'data' => null,
            'message' => []
        ];

        $checkUser = Latihan::find($id);

    try {
            if ($checkUser) {
                $show = Latihan::where('id', $id)->get();
                if ($show) {
                    $out['success'] = true;
                    $out['data'] = $show;
                    $out['message'] = 'Data  berhasil select';
                } else {
                    $out['message'] = 'Data  gagal di select';
                }
            } else {
                return "Data tidak di temukan";
            }
        } catch (\Exception $th) {
            $message = $th->getMessage();
            $out['message'] = ['Error: ' . $message];
        }

        return $out;
    }

    public function deleteLatihan($id){
        $out = ['success' => false, 'data' => null, 'message' => []];

        try {

            $checkUser = Latihan::find($id);
            if(!$checkUser){
                return "Data tidak ada";
            }
            $delete = $checkUser->delete();

            if($delete){
                $out['success'] = true;
                $out['data'] = $checkUser;
                $out['message'] = 'Data  berhasil dihapus';
            }else{
                $out['message'] = ['Data gagal dihapus'];
            }
            
        } catch (\Exception $th) {
            $message = $th->getMessage();
            $out['message'] = ['Error' . $message]; 
        }
        return $out;

    }
}
