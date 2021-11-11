@extends('landing.template')

@section('content')

    {{-- biar carousel nya cuma ad pas di index doang , makanya dimasukin di index,blade ny aja , di panggil dsini --}}



    <section class="container mt-5 mb-5">
        <h3 class="d-flex justify-content-between">
            <strong>semua dah</strong>
        </h3>
        <!-- card title -->


        <div class="row mt-3 ">
            @foreach ($produk as $pro)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="{{  $pro->img) }}" class="img-fluid" alt="...">
                            <div class="row mt-2">
                                <h5 class="card-title">{{ $pro->nama }}</h5>
                                <p class="card-text"> Rp.{{ number_format($pro->harga) }}</p>
                                <a href="{{ route('produk.detail', $pro->slug) }}" class="btn btn-primary">Order now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
