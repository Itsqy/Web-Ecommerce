@extends('landing.template')

@section('content')

    {{-- biar carousel nya cuma ad pas di index doang , makanya dimasukin di index,blade ny aja , di panggil dsini --}}

    <section class="section container mt-5 d-flex justify-content-center">
        <form action="{{ route('landing.cari') }}">
            <div class="input-group mb-3">
                <input value="{{ $keyword }}" type="text" class="form-control" name="cari"
                    placeholder="ccari aku .. ikeh a" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button class="btn btn-primary" type="submit" id="basic-addon2">search</button>
            </div>
        </form>
    </section>



    <section class="container mt-5 mb-5">
        <h3 class="d-flex justify-content-between">
            <strong>search dulu</strong>
        </h3>
        <!-- card title -->


        <div class="row mt-3 ">
            @foreach ($produk as $pro)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="{{ $pro->img }}" class="img-fluid" alt="...">
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
