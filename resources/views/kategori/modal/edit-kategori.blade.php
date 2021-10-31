 <!-- Modal Edit -->
 <div class="modal fade" id="addRowModal1{{$k->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        {{-- Edit Data {{$k->nama_kategori}}</span> --}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{route('kategori.update', $k->id)}}" role="form">
                @csrf
                @method('PUT')
            <div class="modal-body">
                <p class="small">Edit Data {{$k->nama_kategori}}</p>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Nama Produk </label>
                                <input id="kategori" type="text"  value="{{$k->nama_kategori}}" name="nama_kategori" required="required" class="form-control">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer no-bd">
                <button type="submit" id="addRowButton" class="btn btn-primary">edit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>

        </div>
    </div>
</div>
