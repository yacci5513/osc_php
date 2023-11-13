{{-- 상속 --}}
{{--extends 안에 폴더의 경로를 적어준다 루트 시작은 views폴더 --}}
@extends('inc.layout')

{{-- @section : 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title', '자식1 타이틀')
{{-- @section ~ @endsection : 처리해야 할 코드가 많을 경우 --}}
@section('main')
    <h2>자식1 화면입니다</h2>
    <p>여러 데이터를 표시합니다.</p>
    <hr>
    {{-- 조건문 --}}
    @if($gender === '0')
        <span>성별 : 남자</span>
    @elseif($gender === '1')
        <span>성별 : 여자</span>
    @else
        <span>기타성별</span>
    @endif

    <hr>
    {{-- 반복문 --}}
    @for($i=0; $i<5; $i++)
        <span>{{$i}}</span>
    @endfor
    <hr>
    <h3>foreach문</h3>
    @foreach($data as $key => $val)
        {{-- $data의 카운트를 알고 싶을떄
            <p>{{$loop->count}}</p>
            <p>{{count($data)}}</p>
        --}}
        
        {{-- 현재 몇번째 루프를 돌고 있는지 확인하고 싶을때 --}}
        <p> {{$loop->iteration}}</p>
        <span>{{$key.' : '.$val}}</span>
        <br>
    @endforeach
    <hr>

    <h3>foreach문</h3>
    @forelse($data2 as $key => $val)
        <span>{{$key.' : '.$val}}</span>
        <br>
    @empty
        <span>빈배열입니다.</span>
    @endforelse
@endsection
{{-- 부모 show 테스트 용 --}}
@section('show1')
    <h2>자식1 show입니다.</h2>
@endsection