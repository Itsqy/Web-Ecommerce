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
                        <a href="#">Tables</a>
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
                            <h4 class="card-title">{{ $title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table  table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Number Phone</th>
                                            <th>Create At</th>
                                            <th>gambar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        @foreach ($user as $users)
                                            <tr>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $users->username }}</td>
                                                        <td>{{ $users->name }}</td>
                                                        <td>{{ $users->email }}</td>
                                                        <td>{{ $users->address }}</td>
                                                        <td>{{ $users->number_phone }}</td>
                                                        <td>{{ $users->created_at }}</td>
                                                        <td>
                                                            <img src="{{ url('storage/' . $users->image) }}" alt=""
                                                                style="max-width: 100px !important; border-radius:5px;">

                                                        </td>
                                                    </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
