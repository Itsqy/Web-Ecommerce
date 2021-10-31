

   @extends('landing.template')

   @section('content')

   {{-- biar carousel nya cuma ad pas di index doang , makanya dimasukin di index,blade ny aja , di panggil dsini --}}

   @include('landing.include.carousel')


   <section class="container mt-5 mb-5">
      {{-- PILIH LIGA  --}}
      {{-- <section class="pilih-liga mt-4"> --}}
       <h3><strong>Berdasarkan Kategori</strong></h3>

       <div class="row mt-4">
        <div class="col-sm-12 col-md-6">
            <form class="form" method="get" action="{{ route('search') }}">
                <div class="form-group w-100 mb-3">
                    <label for="search" class="d-block mr-2 ">Pencarian</label>
                    <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                </div>
            </form>
           </div>
       </div>
    {{-- </section> --}}
       <!-- card title -->


       <div class="row mt-3 ">
           @foreach ($produk as $pro)
           <div class="col-md-3">
               <div class="card"    >
                   <div class="card-body text-center">
               <img src="{{url('storage/'.$pro->img)}}" class="img-fluid" alt="...">
                       <div class="row mt-2">
                           <h5 class="card-title">{{$pro->nama}}</h5>
                           <p class="card-text">  Rp.{{number_format($pro->harga)}}</p>
                           <a href="{{route('produk.detail',$pro->slug)}}" class="btn btn-primary">Order now! </a>
                       </div>
                   </div>
               </div>
           </div>
           @endforeach
       </div>


   </section>
   @endsection
