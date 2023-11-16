@extends('layout.layout')

@section('title','create')

@section('main')
<main>
    <form class="mt-5 mb-5" method="POST" action="{{ route('board.store')}}">
        @csrf
        <div class="mb-3">
            <label for="b_title" class="form-label">제목</label>
            <input type="text" class="form-control" id="b_title" placeholder="제목을 입력하세요" name="b_title">
        </div>
        <div class="mb-3">
            <label for="b_content" class="form-label">내용</label>
            <textarea class="form-control" id="b_content" cols="30" rows="10" placeholder="내용을 입력하세요" name="b_content"></textarea>
            <br>
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('board.index') }}">취소</a>
            <button type="sumbit" class="btn btn-primary" data-bs-dismiss="modal">작성</button>
        </div>
    </form>
</main>
@endsection