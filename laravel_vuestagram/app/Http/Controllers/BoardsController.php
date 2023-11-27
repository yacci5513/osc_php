<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

//추가
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Exception;

class BoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Board::limit(3)->orderBy('id', 'desc')->get();
        foreach($result as $item) {
            $item->img = asset($item->img);
            // $item->img = 'data:image/*;base64, '.base64_encode(file_get_contents(public_path($item->img)));
        }
        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validator = Validator::make(
            $req->only('img', 'name', 'content')
            ,[
            'img' => 'required|image|mimes:jpeg,png,jpg,gif',
            'name' => 'required|min:2|max:10|regex:/^[가-힣]+$/u',
            'content' => 'required|max:100|not_regex:/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/u',
            ]
        );
        if($validator->fails()){
            throw new Exception('E01');
        };
        
        //사진 폴더에 저장하는 방법
        $imgName = Str::uuid().'.'.$req->img->extension();
        // extension: 확장자명
        $req->img->move(public_path('img'), $imgName);

        // 데이터베이스에 사진 저장
        $board = new Board();
        $board->img = '/img/'.$imgName;
        $board->name = $req->name;
        $board->likes = 0;
        $board->content = $req->content;
        // $board->filter = $req->filter;
        $board->save();
        $board->img = asset($board->img);
        return $board;

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($board)
    {
        if(!is_numeric($board)){
            throw new Exception('E01');
        }

        $result = Board::where('id', '<', $board)->orderBy('id', 'desc')->first();
        if(!empty($result) && $result->count() >= 1) {
            $result->img = asset($result->img);
        }
        return $result;
    }
}
