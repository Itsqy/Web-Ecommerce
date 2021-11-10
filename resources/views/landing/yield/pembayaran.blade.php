@extends('landing.template')

@section('content')


    {{-- biar nomer telpon ama alamat user nya auto sync --}}
    <?php $user = Illuminate\Support\Facades\Auth::user(); ?>
    <!-- Main -->
    <main class="container ">
        <div style="margin-top: 15px;">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('landing') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <a
                            href="{{ route('landing.keranjang') }}">keranjang</a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
        <!-- flash -->
        <div style="margin-top: -10px;">
            <div class="alert alert-success" role="alert">
                <strong>Berhasil menambahkan produk!</strong>
            </div>
        </div>
        <!-- buttom kuning -->
        <section>
            <div class="row">
                <div class="col">
                    <a href="#" class="btn btn-sm btn-warning "><i class="fas fa-arrow-left"></i></a>

                </div>
            </div>
        </section>



        <!-- info bsi -->
        <div class="row mt-4">

            <div class="col-md-6">
                <h4>Informasi Pembayaran</h4>
                <hr>
                <p>untuk pembayaran silahkan transfer ke nomer ini sebesar :
                    <strong>RP.{{ number_format($pesanan->total_harga + $pesanan->kode_unik) }}</strong>
                </p>
                <table width="100%">
                    <tr>
                        <td>
                            <img src="img/w1.webp" width="80">
                        </td>
                        <td>
                            <div class="mt-3">
                                <h5><strong>BSI PEMBAYARAN</strong></h5>
                                <p>pmbayarn lke nomer rekening: 12139297482 a.n/ rifqi syatria</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/w1.webp" width="80">
                        </td>
                        <td>
                            <div class="mt-3">
                                <h5><strong>BSI PEMBAYARAN</strong></h5>
                                <p>pmbayarn lke nomer rekening: 12139297482 a.n/ rifqi syatria</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/w1.webp" width="80">
                        </td>
                        <td>
                            <div class="mt-3">
                                <h5><strong>BSI PEMBAYARAN</strong></h5>
                                <p>pmbayarn lke nomer rekening: 12139297482 a.n/ rifqi syatria</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/w1.webp" width="80">
                        </td>
                        <td>
                            <div class="mt-3">
                                <h5><strong>BSI PEMBAYARAN</strong></h5>
                                <p>pmbayarn lke nomer rekening: 12139297482 a.n/ rifqi syatria</p>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-md-6">
                <h4>Informasi Pengiriman</h4>
                <hr>
                <form action="{{ route('landing.addressupdate') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="form-group mb-3">
                        <label for="">No. Hp</label>
                        <input readonly value="{{ $user->number_phone }}" type="text" class="form-control mt-2">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Alamat</label>
                        <textarea name="address" type="text" class="form-control mt-2"
                            style="height: 139px;">{{ $user->address }}</textarea>
                    </div>

                    {{-- <tr>
                        <td colspan="7 " align="right" >
                            <a href="{{route('landing.checkout')}}"> <button type="button" class="btn btn-primary">Checkout</button></td>
                            </a>
                    </tr> --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Bayar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Alamat</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Yakin Mau Ubah bayar ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Gajadi</button>
                                    <button href="{{ route('landing.history') }}" type="submit"
                                        class="btn btn-primary">Yakin</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </main>



@endsection
