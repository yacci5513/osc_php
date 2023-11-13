{{-- 상속 --}}
@extends('inc.layout')

{{-- section : 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title', '자식2 타이틀')

@section('main')
{{-- 구구단 실습 --}}
    @for($i=1; $i<10; $i++)
        <span>{{$i.'단'}}</span>
        <br>
        @for($j=1; $j<10; $j++)
            <span>{{$i.' x '.$j. '=' .($i*$j)}}</span>
            <br>
        @endfor
    @endfor

    <hr>
@endsection