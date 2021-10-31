<div class="form-button-action">




    <button class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task" data-toggle="modal" data-target="#addRowModal">
        <i class="fa fa-edit"></i>
    </button>


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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="small">Tambahkan data pada list!</p>
                        <form action="dataproduk/update" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Nama Produk</label>
                                        <input id="addName" type="text" name="namaproduk" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group form-group-default">
                                        <label>Harga</label>
                                        <input id="addPosition" type="text" name="harga" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Sedia</label>
                                        <input id="addOffice" type="text" name="sedia" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group form-group-default">
                                        <label>Berat</label>
                                        <input id="addPosition" type="text" name="berat" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Gambar</label>
                                        <input id="addOffice" type="file" name="image" required="required" class="form-control">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" id="addRowButton" class="btn btn-primary">Ubah Data</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>