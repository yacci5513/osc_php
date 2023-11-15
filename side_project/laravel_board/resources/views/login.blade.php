@extends('layout.layout')

@section('title','Login')

@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <form method="POST" action="{{ route('user.login.post') }}" style="width: 400px;">
        @include('layout.errorlayout')
        @csrf
        <div class="mb-3">
            <label for="u_id" class="form-label">이메일</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="u_pw" class="form-label">비밀번호</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
            <button type="submit" class="btn btn-dark">로그인</button>
    </form>
</main>
@endsection