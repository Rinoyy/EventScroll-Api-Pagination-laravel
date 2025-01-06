<?php

namespace Database\Seeders;
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;



class DummyDataSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        
        for ($i = 1; $i <= 1000; $i++) {
            $data[] = [
                'id' => $i,
                'nama' => 'Item ' . $i, 
                'kelas' => 'kelas', 
            ];
        }

        DB::table('posts')->insert($data);
    }
}

