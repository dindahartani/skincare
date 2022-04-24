@extends('layouts.app')

@section('namepage')
Detail Produk {{$nama}}
@endsection


@section('content')
@if($jumlah > 0)
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-8">
    <div class="card border-warning mb-3" style="width: auto;">
      <div class="card-header text-center">Tentang {{ $nama }}</div>
      <div class="card-body text-dark">
        <div class="row">
          <div class="col">
            <p><b>Berdasarkan Object Property</b></p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <table class="table">
              <tbody>
                <tr>
                  <td class="col">Merek</td>
                  <td>:</td>
                  <td><a href="{{ url('/merekskincare/'.$skincare[0]['merek'].'/') }}">{{ $skincare[0]['merek'] }}</a></td>
                </tr>
                <tr>
                  <td class="col">Jenis</td>
                  <td>:</td>
                  <td><a href="{{ url('/jenisskincare/'.$skincare[0]['jenis'].'/') }}">{{ $skincare[0]['jenis'] }}</a></td>
                </tr>
                <tr>
                  <td class="col">Tipe Kulit</td>
                  <td>:</td>
                  <td>
                  @for($n = 0; $n < $jumlahtk; $n++)
                    <a href="{{ url('/tipekulit/'.$skincaretk[$n]['tipekulit'].'/') }}">{{ $skincaretk[$n]['tipekulit'] }}</a>
                    @if($jumlahtk > 1)
                      @if(($n + 1) == ($jumlahtk - 1))
                        dan
                      @elseif(($n + 1) < ($jumlahtk - 1))
                        ,
                      @endif
                    @endif
                  @endfor
                  </td>
                </tr>
                <tr>
                  <td class="col">Masalah Kulit</td>
                  <td>:</td>
                  <td>
                  @for($n = 0; $n < $jumlah; $n++)
                    <a href="{{ url('/masalahkulit/'.$skincare[$n]['masalahkulit'].'/') }}">{{ $skincare[$n]['masalahkulit'] }}</a>
                    @if($jumlah > 1)
                      @if(($n + 1) == ($jumlah - 1))
                        dan
                      @elseif(($n + 1) < ($jumlah - 1))
                        ,
                      @endif
                    @endif
                  @endfor
                  </td>
                </tr>
                <tr>
                  <td class="col">Usia</td>
                  <td>:</td>
                  <td><a href="{{ url('/usia/'.$skincareu[0]['usia'].'/') }}">{{ $skincareu[0]['usia'] }}</a></td>
              
                </tr>
                <!-- <tr>
                  <td class="col">Sistem Bahan Bakar</td>
                  <td>:</td>
                  <td></td>
                </tr> -->
                <tr>
                  <td class="col">Waktu Pengunaan</td>
                  <td>:</td>
                  <td>
                  @for($n = 0; $n < $jumlahwp; $n++)
                    <a href="{{ url('/waktupenggunaan/'.$skincarewp[$n]['waktupenggunaan'].'/') }}">{{ $skincarewp[$n]['waktupenggunaan'] }}</a>
                    @if($jumlahwp > 1)
                      @if(($n + 1) == ($jumlahwp - 1))
                        dan
                      @elseif(($n + 1) < ($jumlahwp - 1))
                        ,
                      @endif
                    @endif
                  @endfor
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p><b>Berdasarkan Data Property</b></p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <table class="table">
              <tbody>
                <div class="col-sm-12">
                <tr>
                  <td>Harga</td>
                  <td>:</td>
                  <td>{{ $skincare[0]['harga'] }}</td>
                </tr>
                <tr>
                  <td>Volume</td>
                  <td>:</td>
                  <td>{{ $skincare[0]['volume'] }}</td>
                </tr>
                <tr>
                  <td>Deskripsi</td>
                  <td>:</td>
                  <td>{{ $skincare[0]['deskripsi'] }}</td>
                </tr>
                <tr>
                  <td>Kandungan</td>
                  <td>:</td>
                  <td>{{ $skincare[0]['kandungan'] }}</td>
                </tr>
                </div>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="col col-lg-4">
      <div class="row">
        <div class="col col-lg-12">
          <div class="card border-warning mb-3" style="width: auto;">
            <div class="card-header text-center">Gambar {{ $nama }}</div>
            <div class="card-body text-center">
              <img src="/image/skincare/{{  $skincare[0]['gambar'] }}.jpg" class="img-thumbnail rounded"> 
            </div>
          </div>
        </div>
      </div>
  </div>

</div>


@else
<div class="container-fluid">
  <h5 style="color: red;">Data Skincare {{ $nama }} tidak ada</h5>
</div>
@endif

@endsection