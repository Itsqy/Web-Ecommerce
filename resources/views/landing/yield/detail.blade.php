@extends('landing.template')

@section('content')

    <main class="container ">
        <div style="margin-top: 15px;">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('landing') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
        @if (Session::get('Success'))
            <div style="margin-top: -10px;">
                <div class="alert alert-success" role="alert">
                    <strong>{{ Session::get('Success') }}</strong>
                </div>
            </div>
        @endif

        <div class="row mt-4">
            <div class="col -md-6 mt-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ url('storage/' . $produk->img) }}" class="img-fluid" alt="...">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <h3>{{ $produk->nama }}</h3>
                <h4>RP.{{ number_format($produk->harga) }}</h4>
                <form action="{{ route('landing.tambah') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id" value="{{ $produk->id }}">
                    <input type="hidden" name="nama" value="{{ $produk->nama }}">
                    <input type="hidden" name="harga" value="{{ $produk->harga }}">
                    <input type="hidden" name="berat" value="{{ $produk->berat }}">


                    <table class="table">

                        <tbody>
                            <tr>
                                <td>ketersediaan</td>
                                <td>:</td>
                                <td>
                                    @if ($produk->sedia == 'Available')
                                        <span class="badge bg-success"><i class="fas fa-check"></i> Available</span>
                                    @else
                                        <span class="badge bg-danger"><i class="fas fa-times"></i> Unavailable</span>
                                    @endif
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                            <tr>
                                <td>kategori</td>
                                <td>:</td>
                                <td>{{ $produk->kategori->nama_kategori }}</td>
                                <td></td>
                            </tr>
                            <tr>

                                <td>Berat</td>
                                <td>:</td>
                                <td colspan="2">{{ $produk->berat }} kg</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td>:</td>
                                <td colspan="3"><input name="jumlah" type="number">
                                </td>

                                <td></td>

                            </tr>


                            <tr>
                                <td>Catatan</td>
                                <td>:</td>
                                <td colspan="55"><textarea type="text" name="catatan" class="form-control mt-2"
                                        style="height: 139px;"></textarea></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td style="border-bottom: none">
                                    @guest
                                        <p class="text-center"> <a href="{{ route('login') }}">login</a> dulu kak !</p>
                                    @else
                                        @if ($produk->sedia == 'Available')
                                            <button class="btn btn-primary btn-block" type="submit" style="width:100%"><i
                                                    class="fas fa-shopping-cart">&nbsp; keranjang</i> </button>
                                        @else
                                            <button disabled class="btn btn-dark btn-block" type="button"
                                                style="width:100%">{{ $produk->nama }}
                                                tidak tersedia</button>
                                        @endif
                                    @endguest
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </form>



            </div>
        </div>
    </main>

@endsection
