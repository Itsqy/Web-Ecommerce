@extends('landing.template')

@section('content')

<main class="container ">
    <div style="margin-top: 15px;">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route("landing")}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
      </nav>
    </div>
    <div style="margin-top: -10px;">
      <div class="alert alert-success" role="alert">
        <strong>Berhasil menambahkan produk!</strong>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col -md-6 mt-3">
        <div class="card">
          <div class="card-body text-center">
            <img src="{{url('storage/'.$produk->img)}}" class="img-fluid" alt="...">
          </div>
        </div>
      </div>

<div class="col-md-6">
    <h3>{{$produk->nama}}</h3>
    <h4>RP.{{number_format($produk->harga)}}


    </h4>
    <table class="table">

      <tbody>
        <tr>
          <td>ketersediaan</td>
          <td>:</td>
          <td> @if ($produk->sedia =='Available')
            <span class="badge bg-success"><i class="fas fa-check"></i> Available</span>
            @else
            <span class="badge bg-danger"><i class="fas fa-times"></i> Unavailable</span>
            @endif</td>
          <td></td>
        </tr>
        <tr>
        <tr>
          <td>kategori</td>
          <td>:</td>
          <td>{{$produk->kategori->nama_kategori}}</td>
          <td></td>
        </tr>
        <tr>

          <td>Berat</td>
          <td>:</td>
          <td colspan="2">{{$produk->berat}} kg</td>
          <td></td>
        </tr>
        <tr>
          <td>Jumlah</td>
          <td colspan="3"><input type="number">
          </td>

          <td></td>

        </tr>


            <tr>

              <td>Catatan</td>
              <td colspan="55"><input type="text"></td>
              <td></td>
            </tr>
            <tr>
              <td>keranjang</td>
              <td></td>
            </tr>
          </tbody>

        </table>
        <a href="keranjang.html" class="btn btn-primary">keranjang</a>
      </div>
    </div>
  </main>

@endsection

