@extends('user.template')
@section('content')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">{{$title}}</h4>
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
                    <a href="#">{{$title}}</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">{{$title}}</div>
                    </div>
                    <div class="card-body">
                        @foreach($data_produk as $dp)
                        <form action="/dataproduk/update" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}


                            <div class="row">
                                <div class="col-md-1"></div>

                                <div class="col-md-6">

                                    <div class="form">

                                        <div class="form-group form-show-notify row">
                                            <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                <label>Nama Produk:</label>
                                            </div>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" name="namaproduk" value="{{$dp->nama_produk}}" class="form-control input-fixed" id="exampleInputPassword1">
                                            </div>
                                        </div>

                                        <div class="form-group form-show-notify row">
                                            <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                <label>Harga :</label>
                                            </div>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" name="harga" value="{{$dp->harga}}" class="form-control input-fixed" id="exampleInputPassword1">
                                            </div>
                                        </div>

                                        <div class="form-group form-show-notify row">
                                            <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                <label>Sedia :</label>
                                            </div>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" name="sedia" value="{{$dp->sedia}}" class="form-control input-fixed" id="exampleInputPassword1">
                                            </div>>
                                        </div>

                                        <div class="form-group form-show-notify row">
                                            <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                <label>Berat :</label>
                                            </div>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" name="berat" value="{{$dp->berat}}" class="form-control input-fixed" id="exampleInputPassword1">
                                            </div>
                                        </div>


                                        <div class="form-group form-show-notify row">
                                            <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                <label>Gambar :</label>
                                            </div>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group form-show-notify row">
                                            <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                            </div>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="file" name="gambar">
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
                                            <button id="displayNotif" type="submit" class="btn btn-primary">Save
                                                Profile</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                    </div>

                </div>
                </form>
                @endforeach
            </div>
        </div>

    </div>
</div>


@endsection