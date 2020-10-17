<div class="row" id="tambahModal">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <!-- Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Paket Baru</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                    <div class="modal-body">
                        <!-- ============================================================== -->
                        <!-- basic form -->
                        <!-- ============================================================== -->
                        <form action="{{ route('katalog.store') }}" method="POST" id="basicform"
                            data-parsley-validate="">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Nama Paket <span class="text-danger">*</span> :</label>
                                <!-- <input type="text" class="form-control" id="nama_ukuran" name="nama_ukuran" placeholder="Jenis Ukuran" required> -->
                                <input type="text" class="form-control" name="nama_paket" placeholder="Nama Paket" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Deskripsi Paket <span class="text-danger">*</span> :</label>
                                <input type="text" class="form-control" name="singkatan_ukuran" placeholder="Deskripsi Paket" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Harga Paket <span class="text-danger">*</span> :</label>
                                <input type="numeric" class="form-control"  name="harga_paket" placeholder="Harga Paket">
                            </div>
                            <div class="row">
                                <div class="ml-3">
                                    <p class="text-left">
                                        <button type="submit" class="btn btn-space btn-success">Simpan</button>
                                        <button class="btn btn-space btn-secondary" data-dismiss="modal">Batal</button>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end basic form -->
                <!-- ============================================================== -->
            </div>
            {{-- <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
            </div> --}}
        </div>
    </div>
</div>