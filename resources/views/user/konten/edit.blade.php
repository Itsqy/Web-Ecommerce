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
                            <div class="card-title">{{ $title }} {{ $User->name }}</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update', Auth::user()->username) }}" method="POST"
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
                                                    <input type="text" name="name" value="{{ $User->name }}"
                                                        class="form-control input-fixed" id="exampleInputPassword1">
                                                </div>
                                            </div>

                                            <div class="form-group form-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                    <label>Username :</label>
                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                    <input type="text" name="username" value="{{ $User->username }}"
                                                        class="form-control input-fixed" id="exampleInputPassword1">
                                                </div>
                                            </div>

                                            <div class="form-group form-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                    <label>Email :</label>
                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                    <input type="text" name="email" value="{{ $User->email }}"
                                                        class="form-control input-fixed" id="exampleInputPassword1">
                                                </div>
                                            </div>

                                            <div class="form-group form-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                    <label>Phone Numer :</label>
                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                    <input type="text" name="number_phone"
                                                        value="{{ $User->number_phone }}" class="form-control input-fixed"
                                                        id="exampleInputPassword1">
                                                </div>
                                            </div>

                                            <div class="form-group form-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                    <label>Address :</label>
                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                    <input type="text" name="address" value="{{ $User->address }}"
                                                        class="form-control input-fixed" id="exampleInputPassword1">
                                                </div>
                                            </div>

                                            <div class="form-group form-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                    <label>Photo :</label>
                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="form-group form-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                    <input type="text" name="img">
                                                </div>
                                            </div>



                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="card card-dark bg-secondary-gradient">
                                            <div class="card-body skew-shadow">
                                                <!-- <img src="../assets/img/visa.svg" height="12.5" alt="Visa Logo"> -->
                                                <h2 style="font-weight: bold; font-style: italic; font-size: medium;">MEMBER
                                                </h2>
                                                <h2 class="py-4 mb-0">{{ $User->email }}</h2>
                                                <div class="row">
                                                    <div class="col-8 pr-0">
                                                        <h3 class="fw-bold mb-1">{{ $User->name }}</h3>
                                                        <div class="text-small text-uppercase fw-bold op-8">Since</div>
                                                    </div>
                                                    <div class="col-4 pl-0 text-right">
                                                        <h3 class="fw-bold mb-1">4/26</h3>
                                                        <div class="text-small text-uppercase fw-bold op-8">
                                                            {{ \carbon\carbon::parse($User->create_at)->translatedformat('l,d F Y') }}
                                                        </div>
                                                    </div>
                                                </div>
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
                                            Profile</button>
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
