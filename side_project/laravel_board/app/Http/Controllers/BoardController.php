<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Board;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* del 231116 미들웨어로 이관
        // 로그인 체크
        if(!Auth::check()){
            return redirect()->route('user.login.get');
        }
        */
        
        // 게시글 획득
        $result = Board::get();
        return view('list')->with('data', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $result = Board::insert([
        //     'b_title' => $request->b_title
        //     ,'b_content' => $request->b_content
        // ]);
        // return redirect()->route('board.index');

        $data = $request->only('b_title', 'b_content');
        $result = Board::create($data);
        return redirect()->route('board.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* del 231116 미들웨어로 이관
        // 로그인 체크
        if(!Auth::check()){
            return redirect()->route('user.login.get');
        }
        */
        $result = 
            // Board::where('b_id', '=', $id)->get();
            Board::find($id);
            
        // 조회수 올리기
        // $result->b_hits++;
        $result->increment('b_hits', 1);
        $result->timestamps = false;

        // 업데이트 처리
        $result->save();

        return view('detail')->with('data', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Log::debug("-----------삭제처리 시작 -----------");
        // try{
        //     DB::beginTransaction();
        //     Log::debug("트랜잭션 시작");
        //     Board::destroy($id);
        //     Log::debug("삭제 완료");
        //     DB::commit();
        //     Log::debug("커밋 완료 ");
        // } catch (Exception $e) {
        //     DB::rollback();
        //     Log::debug("예외 발생 : 롤백 완료 ");
        //     return redirect()->route('error')->withErrors($e->getMessage());
        // } finally {
        //     Log::debug("-----------삭제처리 종료 ----------- ");
        // }

        // $result = Board::find($id)->delete();
        $result = Board::destroy($id);
        return redirect()->route('board.index');
    }
}
