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

    {{var_dump($data)}}
    <p class="card-text">{{$data->b_id}}</p>
    <p class="card-text">{{$data->b_title}}</p>
    <p class="card-text">{{$data->b_content}}</p>
    <p class="card-text">{{$data->b_hits}}</p>
    <p class="card-text">{{$data->created_at}}</p>
    <p class="card-text">{{$data->updated_at}}</p>
    <p class="card-text">{{$data->deleted_at}}</p>
</main>
@endsection