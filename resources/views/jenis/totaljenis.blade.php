@extends('layouts.app')

@section('namepage')
Kriteria Jenis Skincare
@endsection

@section('content')
<div class="row">
    @foreach($jenis as $item)
    <div class="card border-warning text-dark my-2 mx-4 " style="width: 18rem; height:12rem">
        <img src="/image/{{ $item['namajenis']}}.jpg" class="card-img-top" style="height : 70%; width : 100%;">
        <div class="card-footer text-center">
            <a class="card-title  btn btn-sm btn-warning" href="{{ route('jenisshow', [$item['id']]) }}">{{ $item['namajenis'] }}  <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
        </div>
    </div>
    @endforeach
</div>


@endsection