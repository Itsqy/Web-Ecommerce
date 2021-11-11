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
                            @foreach ($pesanan as $pesan)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $pesan->created_at }}</td>
                                    <td>{{ $pesan->kode_pemesanan }}</td>

                                    <td>
                                        <?php $detail = App\Models\DetailPesanan::where('pesanan_id', $pesan->id)->get(); ?>
                                        @foreach ($detail as $row)
                                            <img src="{{ $row->produk->img }}" class="img-fluid" width="200">
                                            {{ $row->produk->nama }}
                                            <br>
                                        @endforeach

                                    </td>
                                    <td>
                                        @if ($pesan->status == 1)
                                            <span class="badge bg-warning"> <i class="fas fa-history">pending</i></span>
                                        @else
                                            <span class="badge bg-success"> <i class="fas fa-check">lunas</i></span>
                                        @endif

                                    </td>
                                    <td><strong>RP.{{ number_format($pesan->total_harga + $pesan->kode_unik) }}</strong>
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach




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
