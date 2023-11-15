@extends('layout.layout')

@section('title','Registration')

@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <form method="POST" action="{{ route('user.registration.post') }}" style="width: 400px;">
        @include('layout.errorlayout')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">이름</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
        <label for="u_id" class="form-label">이메일</label>
        <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
        <label for="password" class="form-label">비밀번호</label>
        <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
        <label for="passwordchk" class="form-label">비밀번호확인</label>
        <input type="password" class="form-control" id="passwordchk" name="passwordchk">
        </div>
        <button type="submit" class="btn btn-dark float-end">회원가입</button>
        <a class="btn btn-secondary" href="{{ route('user.login.get')}}">취소</a>
    </form>
</main>
@endsection