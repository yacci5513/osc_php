@extends('layout.layout')

@section('title','Detail')

@section('main')
<main>
    
    {{-- @forelse ($data as $item)
    <p class="card-text">{{$item->b_id}}</p>
    <p class="card-text">{{$item->b_title}}</p>
    <p class="card-text">{{$item->b_content}}</p>
    <p class="card-text">{{$item->b_hits}}</p>
    <p class="card-text">{{$item->created_at}}</p>
    <p class="card-text">{{$item->updated_at}}</p>
    <p class="card-text">{{$item->deleted_at}}</p>
    @empty
        <div>게시글 없음</div>
    @endforelse --}}
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <p>글번호</p>
                <p class="card-text">{{$data->b_id}}</p>
            </div>
            <div class="mb-3">
                <p>제목</p>
                <p class="card-text">{{$data->b_title}}</p>
            </div>
            <div class="mb-3">
                <p>내용</p>
                <p class="card-text">{{$data->b_content}}</p>
            </div>
            <div class="mb-3">
                <p>조회수</p>
                <p class="card-text">{{$data->b_hits}}</p>
            </div>
            <div class="mb-3">
                <p>작성일</p>
                <p class="card-text">{{$data->created_at}}</p>
            </div>
            <div class="mb-3">
                <p>수정일</p>
                <p class="card-text">{{$data->updated_at}}</p>
            </div>
        </div>
        <div class="card-footer">
            <form class="mt-5 mb-5" method="POST" action="{{ route('board.destroy', ['board' => $data->b_id]) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">삭제</button>
            </form>
        </div>
    </div>
    
</main>
@endsection