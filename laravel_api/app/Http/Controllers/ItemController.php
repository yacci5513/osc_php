<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    public function index() {
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => []
        ];
        $result = Item::OrderBy('created_at', 'desc')->get();
        if($result->count() < 1) {
            $responseData['code'] = 'E01';
            $responseData['msg'] = 'No Data.';
        } else {
            $responseData['data'] = $result;
        }

        return $responseData;
    }

        //게시글 작성
    public function store(Request $request) {
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => []
        ];
        
        $result = Item::create($request->data);

        $responseData['data'] = $result;
        return $responseData;

    }

    public function update(Request $request, $id) {

        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => []
        ];

        $result = Item::find($id);
        // 예외처리(데이터 없음)
        if(!$result) {
            $responseData['code'] = 'E01';
            $responseData['msg'] = 'No Data.';
        } else {
        // 정상처리
            $result->completed = $request->data['completed'];
            $result->completed_at = $request->data['completed'] === '1' ? Carbon::now() : null;
            $result->save();
            $responseData['data'] = $result;
        }

        return $responseData;
    }

    public function destroy($id) {

        $responseData = [
            'code' => '0'
            ,'msg' => ''
        ];

        $result = Item::find($id);
        // 예외처리(데이터 없음)
        if(!$result) {
            $responseData['code'] = 'E01';
            $responseData['msg'] = 'No Data.';
        } else {
        // 정상처리
            $result->delete();
        }
        
        return $responseData;
    }
}