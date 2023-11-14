<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    public function index() {
        // -------------
        // 쿼리빌더
        // -------------
        // $result = DB::select('select * from boards limit 10');
        // $result = DB::select('select * from boards limit :no offset :no2', ['no' => 1, 'no2' => 2]);
        // $result = DB::select('select * from boards limit ? offset ?', [2, 10]);

        // 카테고리가 4, 7, 8 인 게시글의 수를 출력해 주세요.
        // $arr =[4,7,8];
        // $result = DB::select('SELECT COUNT(id) FROM boards WHERE categories_no =? OR categories_no =? OR categories_no =?', $arr);
        // return var_dump($result);

        // 카테고리별 게시글 개수를 출력해주세요
        // $result = DB::select('SELECT COUNT(categories_no), categories_no FROM boards GROUP BY categories_no');
        // return var_dump($result);

        // 카테고리별 게시글 개수 + 카테고리 명도 같이 출력해주세요
        // 1. 
        // $result = DB::select(
        //     'SELECT
        //         ca.no
        //         ,ca.name
        //         ,COUNT(ca.no) as cnt
        //     FROM boards bo
        //         JOIN categories ca
        //             ON bo.categories_no = ca.no
        //     GROUP BY ca.no, ca.name');
        // return var_dump($result);

        // 2.
        // $result = DB::select(
        //     'SELECT count(b.categories_no),c.name FROM (boards AS b JOIN categories AS c ON b.categories_no = c.no) GROUP BY b.categories_no,c.name');
        // return var_dump($result);

        // 3.
        // $result = DB::select(
        //     'SELECT
        //     cate.no
        //     ,cc.cnt
        //     ,cate.name
        //     FROM categories AS cate
        //     JOIN (select count(bo.categories_no) AS cnt, bo.categories_no
        //     from boards AS bo
        //     group by bo.categories_no) AS cc
        //     ON cate.no = cc.categories_no');
        // return var_dump($result);

        // -------------
        // insert
        // -------------
        // $sql =
        //     'INSERT INTO boards(title, content, created_at, updated_at, categories_no)'
        //     .'VALUES(?, ?, ?, ?, ?)';

        // $arr = [
        //     '제목1'
        //     ,'내용내용1'
        //     ,now()
        //     ,now()
        //     ,'0'
        // ];
        // DB::beginTransaction();
        // DB::insert($sql, $arr);
        // DB::commit();

        // $result = DB::select('SELECT * FROM boards ORDER BY id DESC LIMIT 1');

        // return var_dump($result);

        // -------------
        // update
        // -------------
        // $result = DB::select('SELECT * FROM boards ORDER BY id DESC LIMIT 1');
        // DB::beginTransaction();
        // DB::update('UPDATE boards SET title = ?, content = ? WHERE id = ?', ['업데이트한제목', '업데이트한내용', $result[0]->id]);
        // DB::commit();
        // $result1 = DB::select('SELECT * FROM boards ORDER BY id DESC LIMIT 5');
        // return var_dump($result1);

        // -------------
        // delete
        // -------------
        // $result = DB::select('SELECT * FROM boards ORDER BY id DESC LIMIT 1');
        // DB::beginTransaction();
        // DB::delete('DELETE FROM boards WHERE id = ?', [$result[0]->id]);
        // DB::commit();

        // $result1 = DB::select('SELECT * FROM boards ORDER BY id DESC LIMIT 5');
        // return var_dump($result1);

        // -------------
        // 쿼리 빌더 체이닝
        // -------------
        // select * from boards where id = 300;
        // $result = 
        //     DB::table('boards')
        //     ->where('id', '=', 300)
        //     ->get();
        // return var_dump($result);

        // select * from boards where id = 300 or id = 400 order by id DESC;
        $result = 
        DB::table('boards')
            ->where('id', '=', 300)
            ->orWhere('id', '=', 400)
            ->orderBy('id', 'desc')
            ->get();
        
        // select * from categories where no in (?, ?, ?);
        $result =
        DB::table('categories')
            ->whereIn('no',[1,2,3])
            ->get();

        // select * from categories where no not in (?, ?, ?);
        $result =
        DB::table('categories')
            ->whereNotIn('no',[1,2,3])
            ->get();

        // first() : limit1하고 비슷하게 동작
        $result= DB::table('boards')
            ->orderBy('id','desc')
            ->first();

        // count() : 결과의 레코드 수를 반환
        $result= DB::table('boards')
            ->orderBy('id','desc')
            ->count();
        
        // max() : 해당 컬럼의 최대값
        $result = DB::table('categories')->max('no');

        //타이틀, 내용, 카테고리명 까지 출력 100개
        $result = DB::table('boards')
            ->select('boards.title','boards.content', 'categories.name')
            ->join('categories', 'categories.no', 'boards.categories_no')
            ->limit(100)
            ->get();
        

        //카테고리별 게시글 갯수와 카테고리명을 출력해주세요.
        // $result = DB::select(
        //     'SELECT
        //         ca.no
        //         ,ca.name
        //         ,COUNT(ca.no) as cnt
        //     FROM boards bo
        //         JOIN categories ca
        //             ON bo.categories_no = ca.no
        //     GROUP BY ca.no, ca.name');
        // return var_dump($result);

        $result = DB::table('boards')
            ->select('categories.no','categories.name', DB::raw('count(categories.no) as cnt'))
            ->join('categories', 'categories.no', 'boards.categories_no')
            ->groupBy('categories.no', 'categories.name')
            ->get();
            
        return var_dump($result);
    }
}