@extends('layouts.app')

@section('namepage', 'Halaman Beranda')
    
@section('content')
<div class="text-center">
    <h1>Halo.. Selamat datang di website Skincare</h1>
    <h6>Melalui website ini, kalian dapat melakukan <br>penjelajahan dan pencarian skincare sesuai kriteria yang kalian inginkan. 
        <br>Website ini dibangun dengan menggunakan ontologi sebagai tulang punggungnya.</h6>

    <!--Card style-->
    <div class="row">
        <div class="d-flex justify-content-center">
        <div class="card mt-4 mb-0 mx-4" style="width: 20rem">
            <img class="col card-img-top" src="{{asset('image/browinglog.jpg')}}" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Jelajahi produk skincare sesuai kriteria yang tersedia</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('browsing')}}" class="btn btn-warning">Browsing Sekarang</a>
            </div>
          </div>
          <div class="card mt-4 mb-0" style="width: 20rem">
            <img class="col card-img-top" src="{{asset('image/searchinglog.jpg')}}" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Lakukan pencarian produk skincare dan atur kriteria sesuai keinginan</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('searching')}}" class="btn btn-warning">Searching Sekarang</a>
            </div>
          </div>
        </div>
    </div>
    <!-- end card style -->
</div>
@endsection