@extends('layouts.app')

@section('namepage')
Kriteria Merek Skincare
@endsection

@section('content')
<div class="row">
    @foreach($merek as $item)
    <div class="card border-warning text-dark my-2 mx-4 " style="width: 18rem; height:12rem">
        <img src="/image/{{ $item['namamerek']}}.jpg" class="card-img-top" style="height : 70%; width : 100%;">
        <div class="card-footer text-center">
            <a class="card-title  btn btn-sm btn-warning" href="{{ route('merekshow', [$item['namamerek']]) }}">{{ $item['namamerek'] }}  <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
        </div>
    </div>
    @endforeach
</div>


@endsection