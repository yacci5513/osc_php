<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// 추가
use App\Models\Board;
use Illuminate\Support\Facades\DB;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['name' => '고양이', 'img' => '/img/cat.jpg', 'likes' => 0, 'content' => '고양고양', 'created_at' => date('ymdhis'), 'updated_at' => date('ymdhis'),'deleted_at'=> NULL]
            ,['name' => '말', 'img' => '/img/horse.jpg', 'likes' => 0, 'content' => '말말말말', 'created_at' => date('ymdhis'), 'updated_at' => date('ymdhis'),'deleted_at'=> NULL]
            ,['name' => '미어캣', 'img' => '/img/meerkat.jpg', 'likes' => 0, 'content' => '미어미어', 'created_at' => date('ymdhis'), 'updated_at' => date('ymdhis'),'deleted_at'=> NULL]
        ];
        Board::insert($data);
    }
}
