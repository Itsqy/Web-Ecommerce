@extends('user.template')
@section('content')


    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                        <h5 class="text-white op-7 mb-2">Selamat Datang Kembali, {{ Auth::user()->name }}</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                        <a href="#" class="btn btn-secondary btn-round">Add Customer</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">{{ $title }}</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    {{ $title }}
                                </button>
                            </div>
                        </div>
                        {{-- <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left mt-2">
                                <h2>Laravel 8 CRUD - Manajemen User</h2>
                            </div>
                            <div class="float-right my-2">
                                <a class="btn btn-success" href="#"> Create New User</a>
                            </div>
                        </div>
                    </div> --}}
                        <!-- Start kode untuk form pencarian -->
                        <div class="col-sm-12 col-md-6">
                            <form class="form" method="get" action="{{ route('search') }}">
                                <div class="form-group w-100 mb-3">
                                    <label for="search" class="d-block mr-2 ">Pencarian</label>
                                    <input type="text" name="search" class="form-control w-75 d-inline" id="search"
                                        placeholder="Masukkan keyword">
                                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                                </div>
                            </form>
                        </div>
                        <!-- allert succes -->
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">
                                                    Tambah Data</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">Tambahkan data pada list!</p>

                                            <form action="{{ route('produk.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nama Produk</label>
                                                            <input id="addName" type="text" name="nama" required="required"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Harga</label>
                                                            <input id="addPosition" type="text" name="harga"
                                                                required="required" class="form-control">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default ">
                                                            <label>kategori</label>
                                                            {{-- <input id="addOffice" type="text" name="sedia" required="required" class="form-control"> --}}
                                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                                <select
                                                                    class="@error('kategori_id') is invalid @enderror form-control input-fixed"
                                                                    name="kategori_id">
                                                                    <option value="">Select kategori</option>
                                                                    @foreach ($kategori as $k)
                                                                        <option value="{{ $k->id }}">
                                                                            {{ $k->nama_kategori }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default ">
                                                            <label>Sedia</label>
                                                            {{-- <input id="addOffice" type="text" name="sedia" required="required" class="form-control"> --}}
                                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                                <select
                                                                    class="@error('sedia') is invalid @enderror form-control input-fixed"
                                                                    name="sedia" id="">
                                                                    <option value="">Select status</option>
                                                                    <option value="Available" @if (old('sedia')) == "Available") selected="selected" @endif>
                                                                        Tersedia</option>
                                                                    <option value="Unavailable"
                                                                        (old('sedia'))=="Unavailable" ? 'selected' : '' }}>
                                                                        Kosong</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Berat</label>
                                                            <input id="addPosition" type="text" name="berat"
                                                                required="required" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Gambar</label>
                                                            <input id="addOffice" type="text" name="img" required="required"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>

                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>kategori</th>
                                            <th>Berat</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (!$kategori)
                                            @foreach ($produk as $p)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>
                                                        <img src="{{ $p->img }}" alt=""
                                                            style="max-width: 100px !important; border-radius:5px;">
                                                    </td>
                                                    <td>{{ $p->nama }}</td>
                                                    <td> Rp. {{ number_format($p->harga) }}</td>
                                                    <td>{{ $p->sedia }}</td>

                                                    <td>{{ $p->berat }} Kg</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a href="{{ route('produk.edit', $p->id) }}"><button
                                                                    type="button" data-toggle="tooltip" title=""
                                                                    class="btn btn-link btn-primary"
                                                                    data-original-title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button></a>

                                                            <form action="{{ route('produk.destroy', $p->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" data-toggle="tooltip" title=""
                                                                    class="btn btn-link btn-danger">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            @foreach ($produk as $p)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>
                                                        <img src="{{ $p->img }}" alt=""
                                                            style="max-width: 100px !important; border-radius:5px;">

                                                    </td>
                                                    <td>{{ $p->nama }}</td>
                                                    <td> Rp. {{ number_format($p->harga) }}</td>
                                                    <td>{{ $p->sedia }}</td>
                                                    <td>{{ $p->kategori->nama_kategori }}</td>
                                                    <td>{{ $p->berat }} Kg</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a href="{{ route('produk.edit', $p->id) }}"><button
                                                                    type="button" data-toggle="tooltip" title=""
                                                                    class="btn btn-link btn-primary"
                                                                    data-original-title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </button></a>

                                                            <form action="{{ route('produk.destroy', $p->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" data-toggle="tooltip" title=""
                                                                    class="btn btn-link btn-danger">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="add-row_info" role="status" aria-live="polite">
                                            Showing &nbsp; <strong>{{ $produk->firstItem() }}</strong> &nbsp;
                                            to &nbsp; <strong>{{ $produk->lastItem() }}</strong> &nbsp;
                                            of &nbsp; <strong>{{ $produk->total() }}</strong> &nbsp; entries
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate">
                                            {{ $produk->links('pagination::bootstrap-4') }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
