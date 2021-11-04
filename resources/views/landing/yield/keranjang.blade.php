@extends('landing.template')

@section('content')

    <main class="container ">
        <div style="margin-top: 15px;">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('landing') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">keranjang</li>
                </ol>
            </nav>
        </div>
        @if (Session::get('Success'))
            <div style="margin-top: -10px;">
                <div class="alert alert-danger" role="alert">
                    <strong>{{ Session::get('Success') }}</strong>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Gambar</td>
                            <td>Keterangan</td>
                            <td> Jumlah</td>
                            <td>Harga</td>
                            <td>Total Harga</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($details as $d)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <img src="{{ url('storage/' . $d->produk->img) }}" class="img-fluid" width="200">
                                </td>
                                <td>{{ $d->produk->nama }}</td>
                                <td>{{ $d->jumlah_pesanan }}</td>
                                <td>RP.{{ number_format($d->produk->harga) }}</td>
                                <td><strong>RP.{{ number_format($d->harga) }}</strong></td>
                                <td>
                                    <form action="{{ route('landing.destroy', $d->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn text-center"><i class="fas fa-trash text-danger"
                                                style="cursor:pointer;">
                                            </i></button>
                                    </form>

                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7 " text-align="center">
                                    data kosong
                                </td>
                                </a>

                            </tr>
                        @endforelse

                        @if (!empty($pesanan))
                            <tr>
                                <td colspan="6" text-align="right"><strong>Total Harga:</strong></td>
                                <td>RP.{{ number_format($pesanan->total_harga) }}</td>
                                <td></td>
                            </tr>

                            <tr>
                                <td colspan="6" text-align="right"><strong>Kode Unik:</strong></td>
                                <td>RP.{{ number_format($pesanan->kode_unik) }}</td>
                                <td></td>
                            </tr>

                            <tr>
                                <td colspan="6" text-align="right"><strong>Total Yang Harus Dibayarkan : </strong></td>
                                <td>RP.{{ number_format($pesanan->total_harga + $pesanan->kode_unik) }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6" text-align="right">
                                <td>
                                    <a href="{{ route('landing.bayar') }}"><button type="button"
                                            class="btn btn-primary">Checkout</button></a>

                                </td>
                                </a>

                            </tr>

                        @endif

                    </tbody>


                </table>
            </div>
        </div>
    </main>

@endsection
