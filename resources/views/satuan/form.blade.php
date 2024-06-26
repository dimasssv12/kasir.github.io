<div class="modal fade" id="form-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fas fa-plus-circle mr-2"></i> Tambah Data Satuan Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->level}}/satuan/store" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nama">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i>Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
