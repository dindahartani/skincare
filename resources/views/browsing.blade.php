@extends('layouts.app')

@section('namepage')
Halaman Browsing
@endsection

@section('content')

<div class="row text-center">
    <div class="card border-warning col-lg-4 mb-3 mx-4" style="width: 18rem; height:9rem"> 
        <div class="card-body">
          <h5 class="card-title">Produk Skincare</h5>
          <p class="card-text">Jumlah : {{ $data['jumlahskincare'] }}</p>
          <a href="{{route('produkshow')}}" class="btn btn-warning">Tampilkan</a>
        </div>
      </div>
    
      <div class="card border-warning col-lg-4 mb-3 mx-4" style="width: 18rem; height:9rem">
        <div class="card-body">
          <h5 class="card-title">Merek Skincare</h5>
          <p>Jumlah : {{ $data['jumlahmerek'] }}</p>
          <a href="{{ route('totalmerek')}}" class="btn btn-warning">Tampilkan</a>
        </div>
      </div>

      <div class="card border-warning col-lg-4 mb-3 mx-4" style="width: 18rem; height:9rem">
        <div class="card-body">
          <h5 class="card-title">Jenis Skincare</h5>
          <p>Jumlah : {{ $data['jumlahjenis'] }}</p>
          <a href="{{ route('totaljenis')}}" class="btn btn-warning">Tampilkan</a>
        </div>
      </div>
    
      <div class="card border-warning col-lg-4 mb-3 mx-4" style="width: 18rem; height:9rem">
        <div class="card-body">
          <h5 class="card-title">Rentang Usia</h5>
          <p>Jumlah : {{ $data['jumlahusia'] }}</p>
          <a href="{{ route('totalusia')}}" class="btn btn-warning">Tampilkan</a>
        </div>
      </div>
    
      <div class="card border-warning col-lg-4 mb-3 mx-4" style="width: 18rem; height:9rem">
        <div class="card-body">
          <h5 class="card-title">Masalah Kulit</h5>
          <p>Jumlah : {{ $data['jumlahmk'] }}</p>
          <a href="{{ route('totalmk')}}" class="btn btn-warning">Tampilkan</a>
        </div>
      </div>
   
    
    <div class="card border-warning col-lg-4 mb-3 mx-4" style="width: 18rem; height:9rem">
        <div class="card-body">
          <h5 class="card-title">Tipe Kulit</h5>
          <p>Jumlah : {{ $data['jumlahtk'] }}</p>
          <a href="{{ route('totaltipekulit')}}" class="btn btn-warning">Tampilkan</a>
        </div>
      </div>

    <div class="card border-warning col-lg-4 mb-3 mx-4" style="width: 18rem; height:9rem">
        <div class="card-body">
          <h5 class="card-title">Waktu Penggunaan</h5>
          <p>Jumlah : {{ $data['jumlahwp'] }}</p>
          <a href="{{ route('totalwp')}}" class="btn btn-warning">Tampilkan</a>
        </div>
      </div>
    </div>

@endsection