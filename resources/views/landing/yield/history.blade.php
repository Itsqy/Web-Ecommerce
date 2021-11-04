@extends('landing.template')

@section('content')


    <div class="container history">

        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item"><a href="#">Checkout</a></li>

                        <li class="breadcrumb-item active" aria-current="page">History</li>

                    </ol>
                </nav>
            </div>
        </div>

        <div class="row flash mb-2">
            <div class="col-md-12">
                <div class="alert alert-success">
                    Berhasil menambahkan produk !
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="#" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Tanggal Pesan</td>
                                <td>Kode Pemesanan</td>
                                <td>Pesanan</td>
                                <td>Status</td>
                                <td><strong>Total Harga</strong></td>
                                <td></td>
                            </tr>
                        </thead>

                        <tbody>
                            fore
                            <tr>
                                <td>1</td>
                                <td>2021-09-08 13:49:48</td>
                                <td>8957501u19jxcbnjkb</td>
                                <td>
                                    <img src="img/produk/baju-1.jpg" class="img-fluid" width="50">
                                    Baju
                                    <br>
                                </td>
                                <td>Lunas</td>
                                <td><strong>Rp. 200.312</strong></td>
                                <td></td>
                            </tr>

                            <!-- <tr>
                          <td colspan="7">Data Kosong</td>
                        </tr>             -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-4">

            <div class="col">
                <div class="card shadow py-3 px-3">
                    <div class="card-body">
                        <p>Untuk konfirmasi pembayaran silahkan hubungi admin melalui : </p>
                        <div class="media">
                            <img class="mr-3" src="icon/wa.png" alt="Logo WhatsApp" width="60">
                            <div class="media-body mt-2">
                                <h5 class="mt-0">WhatsApp</h5>
                                +62 821-9117-0349 <br>
                                <div class="mt-2">
                                    <a target="_blank" href="https://api.whatsapp.com/send?phone=6282191170349"
                                        class="btn btn-success btn-sm">Hubungi Admin di WhatsApp</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow py-3 px-3">
                    <div class="card-body">
                        <p>Untuk konfirmasi pembayaran silahkan hubungi admin melalui : </p>
                        <div class="media">
                            <img class="mr-3" src="icon/tel.png" alt="Bank BRI" width="40">
                            <div class="media-body mt-2">
                                <h5 class="mt-0">Telegram</h5>
                                +62 821-9117-0349 <br>
                                <div class="mt-2">
                                    <a target="_blank" href="https://t.me/fbrynryn" class="btn btn-success btn-sm">Hubungi
                                        Admin di Telegram</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-5">
            <div class="col">
                <div class="shadow alert alert-success" role="alert">
                    <h6><strong>*Saat konfirmasi silahkan lampirkan :</strong></h6>
                    <p><strong>1. Struk bukti transfer diikuti dengan kode unik pada total harga</strong></p>
                </div>
            </div>
        </div>

    </div>





@endsection
