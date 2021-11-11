@extends('user.template')
@section('content')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ $title }}</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ $title }}</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">{{ $title }} </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('produk.update', $produk->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="row">
                                    <div class="col-md-1"></div>

                                    <div class="col-md-6">

                                        <div class="form">

                                            <div class="form-group form-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                    <label>Nama :</label>
                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                    <input type="text" name="nama" value="{{ $produk->nama }}"
                                                        class="form-control input-fixed" id="exampleInputPassword1">
                                                </div>
                                            </div>

                                            <div class="form-group form-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                    <label>Harga :</label>
                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                    <input type="text" name="harga" value="{{ $produk->harga }}"
                                                        class="form-control input-fixed" id="exampleInputPassword1">
                                                </div>
                                            </div>



                                            <div class="form-group form-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                    <label>status :</label>
                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-8">

                                                    {{-- bisa pake ini --}}
                                                    {{-- <select class="@error('sedia') is invalid @enderror form-control input-fixed" name="sedia" id="">
                                                    <option value="">Select sedia</option>
                                                    <option value="Available" @if (old('sedia')) == "Available") selected="selected" @endif>Available</option>
                                                    <option value="Unavailable" (old('sedia')) == "Unavailable" ? 'selected' : '' }}>Unavailable</option>
                                                </select> --}}
                                                    <select class="form-control input-fixed" name="sedia">
                                                        @if ($produk->sedia == 'Available')
                                                            <option value="">Select Status</option>
                                                            <option value="Available" selected>Available</option>
                                                            <option value="Unavailable">Unavailable</option>
                                                        @else
                                                            <option value="">Select Status</option>
                                                            <option value="Available">Available</option>
                                                            <option value="Unavailable" selected>Unavailable</option>
                                                        @endif
                                                        {{-- <option value=""></option> --}}
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group form-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                    <label>kategori :</label>
                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                    <select
                                                        class="@error('kategori_id') is invalid @enderror form-control input-fixed"
                                                        name="kategori_id">
                                                        <option value="">Select kategori</option>
                                                        @foreach ($kategori as $k)
                                                            <option value="{{ $k->id }}" @if ($k->id == $produk->kategori_id) selected="selected" @endif>
                                                                {{ $k->nama_kategori }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group form-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                    <label>Berat :</label>
                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                    <input type="text" name="berat" value="{{ $produk->berat }}"
                                                        class="form-control input-fixed" id="exampleInputPassword1">
                                                </div>
                                            </div>

                                            <div class="form-group form-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                    <label>Gambar :</label>
                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                    <img src="{{ $produk->img }}" alt=""
                                                        style="max-width: 100px !important; border-radius:5px;">
                                                </div>
                                                <div class="form-group form-show-notify row">
                                                    <div class="col-lg-3 col-md-3 col-sm-4 text-right">

                                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                                            <input type="text" name="img">
                                                        </div>
                                                    </div>

                                                </div>



                                            </div>

                                        </div>




                                    </div>



                                    <div class="card-footer">
                                        <div class="form">
                                            <div class="form-group from-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-12">

                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                    <button id="displayNotif" type="submit" class="btn btn-primary">Simpan
                                                        Perubahan</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
