<div class="modal fade" id="form-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fas fa-plus-circle mr-2"></i> Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{auth()->user()->level}}/barang/store" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control" value="{{$kode}}" name="kode" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="custom-select" name="kategori_id">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $kategoriItem)
                                    <option value="{{ $kategoriItem->id }}">{{ $kategoriItem->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <select class="custom-select" name="satuan_id">
                                    <option value="">Pilih Satuan</option>
                                    @foreach ($satuan as $satuanItem)
                                    <option value="{{ $satuanItem->id }}">{{ $satuanItem->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga_beli">Harga Beli</label>
                                <input type="text" class="form-control jumlah" id="harga-beli" name="harga_beli">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga_jual">Harga Jual</label>
                                <input type="text" class="form-control jumlah" id="harga-jual" name="harga_jual">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control jumlah" name="stok">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="diskon">Diskon</label>
                                <div class="input-group">
                                    <input type="text" class="form-control jumlah" name="diskon" id="diskon" value="0" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i>Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
