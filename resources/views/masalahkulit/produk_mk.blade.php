@extends('layouts.app')

@section('namepage')
Skincare untuk Masalah Kulit {{str_replace("_"," ",$mk)}}
@endsection

@section('content')
@if($jumlah > 0)
          <div class="row">
            @foreach($skincare as $item)
              <div class="card border-warning text-dark my-2 mx-4 " style="width: 18rem; height:19rem">
                <img src="/image/skincare/{{ $item['gambar']}}.jpg" class="card-img-top" style="height : 70%; width : 100%;" alt="Gambar {{ $item['namaprod'] }}.jpg">
                <div class="card-footer text-center">
                    <a class="card-title  btn btn-sm btn-warning" href="{{ route('detailproduk', [$item['id']]) }}">{{ $item['namaprod'] }}</a>
                </div>
            </div>

            @endforeach
          </div>
        @else
          <p class="font-weight-normal ml-3">Tidak ada data Skincare untuk mengatasi masalah kulit {{ $mk }}</p>
        @endif

@endsection