<div class="row" id="tambahModal">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <!-- Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Custom Print Baru</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                    <div class="modal-body">
                        <!-- ============================================================== -->
                        <!-- basic form -->
                        <!-- ============================================================== -->
                        <form action="{{ route('custom-print.store') }}" method="POST" id="basicform"
                            data-parsley-validate="">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Sisi Print <span class="text-danger">*</span> :</label>
                                <select name="sisi_print" id="nama" class="form-control">
                                    <option value="" disabled selected>--Select Sisi Print--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Jenis Jahit <span class="text-danger">*</span> :</label>
                                <select name="jenis_jahit" id="detil" class="form-control">
                                <option value="" disabled selected>--Select Jenis Jahit--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Jenis Ukuran <span class="text-danger">*</span> :</label>
                                <select name="nama_ukuran" id="short" class="form-control">
                                <option value="" disabled selected>--Select Jenis Ukuran--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Harga <span class="text-danger">*</span> :</label>
                                <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga">
                            </div>
                            <div class="row">
                                <div class="ml-3">
                                    <p class="text-left">
                                        <button type="submit" class="btn btn-space btn-primary">Simpan</button>
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