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
                        <form action="{{route('update-pass', Auth::user()->username)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <div class="row">
                                <div class="col-md-1"></div>

                                <div class="col-md-6">
                                    @if(Session::get('Success'))
                                    <div class="alert alert-succsess alert-dismissible fade show" role="alert">
                                        {{Session::get('Success')}}
                                    </div>
                                    @endif
                                    @if(Session::get('Failed'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{Session::get('Failed')}}
                                    </div>
                                    @endif
                                    <div class="form">

                                        <div class="form-group form-show-notify row">
                                            <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                <label>Password Lama :</label>
                                            </div>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="password" name="old_password" class="form-control input-fixed 
                                                    @error('old_password') is-invalid @enderror" id="passnow">
                                                @error('old_password')
                                                <div class="invalid-feedback">
                                                    <strong>{{$message}}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group form-show-notify row">
                                            <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                <label>Password Baru :</label>
                                            </div>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="password" name="password" class="form-control input-fixed 
                                                    @error('password') is-invalid @enderror" id="passnow">
                                                @error('password')
                                                <div class="invalid-feedback">
                                                    <strong>{{$message}}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group form-show-notify row">
                                            <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                <label>Ulangi Password :</label>
                                            </div>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="password" name="password_confirmation" class="form-control input-fixed 
                                                    @error('password_confirmation') is-invalid @enderror"
                                                    style="margin: left 35px;" id="passnow">
                                                @error('password_confirmation')
                                                <div class="invalid-feedback"
                                                    style="margin-left: 35px; width: 30px !important;" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>



                                    <div class="col-md-1"></div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="form">
                                    <div class="form-group from-show-notify row">
                                        <div class="col-lg-3 col-md-3 col-sm-12">

                                        </div>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <button id="displayNotif" type="submit" class="btn btn-primary">Save
                                                Passwod</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    @endsection