<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserController extends Controller
{
    public function loginget() {
        // 로그인 한 유저는 보드 리스트로 이동
        if(Auth::check()) {
            return redirect()->route('board.index');
        }

        return view('login');
    }

    public function loginpost(Request $request) {
        // // 유효성 검사
        // $validator = Validator::make(
        //     $request->only('email', 'password')
        //     , [
        //         'email'     => 'required|email|max:50'
        //         ,'password' => 'required'
        //     ]
        // );

        // // 유효성 검사 실패 메시지 처리
        // if($validator->fails()){
        //     return view('login')->withErrors($validator->errors());
        // }

        // 유저 정보 습득
        $result = User::where('email', $request->email)->first();
        //결과가 없거나 비밀번호가 맞지않을때
        if(!$result || !(Hash::check($request->password, $result->password))){
            $errorMsg = '아이디와 비밀번호를 다시 확인해 주세요.';
            return view('login')->withErrors($errorMsg);
        }

        //유저 인증
        Auth::login($result);
        if(Auth::check()){
            session($result->only('id'));
        } else {
            $errorMsg= "인증 에러가 발생했습니다.";
            return view('login')->withErrors($errorMsg);
        }
        return redirect()->route('board.index');
    }

    public function registrationget() {
        return view('registration');
    }

    public function registrationpost(Request $request) {
        // // 유효성 검사
        // $validator = Validator::make(
        //     $request->only('email', 'password', 'passwordchk', 'name')
        //     , [
        //         'email'     => 'required|email|max:50'
        //         ,'name'     => 'required|regex:/^[a-zA-Z가-힣]+$/|min:2|max:50'
        //         ,'password' => 'required|same:passwordchk'
        //     ]
        // );
        
        // // 유효성 검사 실패 메시지 처리
        // if($validator->fails()){
        //     return view('registration')->withErrors($validator->errors());
        // }

        // 필요한 데이터 획득
        $data = $request->only('email', 'password', 'name');

        // 비밀번호 암호화
        $data['password'] = Hash::make($data['password']);

        // 데이터 DB 저장
        $result = User::create($data);

        return redirect()->route('user.login.get');
    }


    public function logoutget() {
        Session::flush(); //세션 파기
        Auth::logout(); //로그아웃
        return redirect()->route('user.login.get');
    }
}
