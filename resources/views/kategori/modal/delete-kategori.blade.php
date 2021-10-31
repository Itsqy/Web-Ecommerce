<!-- Modal -->
<form action="{{route('kategori.delete', $k->id)}}" method="POST">
    @csrf
    @method('DELETE')
<div class="modal fade" id="delkategori{{$k->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Tambah kategori</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <p class="small">Tambahkan kategori untuk produk!</p>
                    <div class="row">
                        <div class="col-sm-12">

                               <p>hapus data {{$k->nama_kategori}}</p>

                        </div>
                    </div>
            </div>
            <div class="modal-footer no-bd">
                <button type="submit" id="addRowButton" class="btn btn-primary">hapus</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
            </div>


        </div>
    </div>
</div>
</form>
