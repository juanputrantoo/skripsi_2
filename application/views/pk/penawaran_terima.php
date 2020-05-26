<div class="content">
    <div class="container penawaran">
        <div class="sub-judul">
            <i class="fas fa-clipboard-check" style="font-size: 20px;"></i>
            <p class="mb-0 ml-1 my-auto">Penawaran yang sudah diterima</p>
        </div>
        <?php if (count($detail) < 1) {
            echo '
            <div class="card bg-light h-75 border-0">
            <div class="card-body text-center d-flex" style="color: gray;">
                <div class="my-auto mx-auto">
                    <span>
                        <i class="fas fa-meh" style="font-size: 100px;"></i>
                    </span>
                    <p class="m-3"><b>Belum ada lagi yang menerima tawaran Anda</b></p>
                </div>
            </div>
        </div>
        ';
        } ?>
        <?php foreach ($detail as $detail) : ?>
            <div class="card m-2 shadow" style="border: 1px solid #2c3e50;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center my-auto">
                            <img style="width: 60px; height: 60px;" class="rounded-circle" src="<?php echo base_url('upload/profil/' . $detail['fotoProfilPL']); ?>">
                        </div>
                        <div class="col-md-3 text-center my-auto">
                            <?php echo $detail['namaPL']; ?>
                        </div>
                        <div class="col-md-3 text-center my-auto">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deskripsi<?php echo $detail['idTawaran']; ?>">
                                <i class="fas fa-eye"></i>
                                Tawaran
                            </button>
                        </div>
                        <div class="col-md-3 text-center my-auto">
                            <a href="<?php echo base_url('pk/penawaran/terima/buatKontrak/' . $detail['idPekerjaLepas']); ?>" class="btn btn-orange">
                                <i class="fas fa-file"></i>Buat Kontrak
                            </a>
                        </div>
                    </div>
                    <div class="modal fade" id="deskripsi<?php echo $detail['idTawaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Deskripsi Tawaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Pekerjaan:</label>
                                        <input class="form-control text-center w-75 mx-auto" type="text" id="hargaPekerjaan" name="harga" value="<?php echo $detail['pekerjaan']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Pekerjaan:</label>
                                        <div class="input-group w-75 mx-auto" id="show_hide_password">
                                            <div class="input-group-text p-2 bg-white border-0">
                                                <p class="mb-0"><strong>Rp</strong></p>
                                            </div>
                                            <input class="form-control text-center" type="text" id="hargaPekerjaan" name="harga" value="<?php echo $detail['harga']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Dibutuhkan untuk Tanggal:</label>
                                        <div class="input-group w-75 mx-auto">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-white border-0"><i class="fa fa-calendar" type="button"></i></span>
                                            </div>
                                            <input class="form-control text-center" type="text" id="hargaPekerjaan" name="harga" value="<?php $tanggal = $detail['tanggalDeadline'];
                                                                                                                                        $tanggalNew = date('d-m-Y', strtotime($tanggal));
                                                                                                                                        echo $tanggalNew; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Deksripsi Tawaran:</label>
                                        <textarea style="height: 100px;" class="w-100 p-2 form-control" name="deskripsi" readonly><?php echo $detail['deskripsi']; ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>