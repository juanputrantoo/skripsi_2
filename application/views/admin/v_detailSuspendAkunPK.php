<div class="card shadow mb-4">
    <?php if (isset($detailAkunPK)) : ?>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Lengkap</label>
                            <input class="form-control" type="text" value="<?php echo $detailAkunPK['namaLengkap']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nomor KTP</label>
                            <input class="form-control" type="text" value="<?php echo $detailAkunPK['nomorKTP']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Email</label>
                            <input class="form-control" type="text" value="<?php echo $detailAkunPK['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Foto Tanda Tangan</label><br>
                            <img style="width: 40%" src="<?php echo base_url('upload/TTD/' . $detailAkunPK['fotoTTD']); ?>" />
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Foto Profil</label><br>
                            <img style="width: 40%" src="<?php echo base_url('upload/profil/' . $detailAkunPK['fotoProfil']); ?>" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nomor Telepon</label>
                            <input class="form-control" type="text" value="<?php echo $detailAkunPK['nomorTelepon']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tanggal Daftar</label>
                            <input class="form-control" type="text" value="<?php $tanggal = $detailAkunPK['tanggalDaftar'];
                                                                            $tanggalBaru = date("d-m-Y", strtotime($tanggal));
                                                                            echo $tanggalBaru; ?>" readonly>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row m-3">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#modal-suspend">Aktifkan Kembali Akun</button>
                </div>
            </div>
            <form method="POST" action="<?php echo base_url('admin/unSuspendPK/' . $detailAkunPK['id']); ?>">
                <div class="modal fade" id="modal-suspend" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body pb-0">
                                <h5>Anda yakin untuk <strong>mengembalikan</strong> akun <?php echo $detailAkunPK['namaLengkap']; ?>?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                <input class="btn btn-primary" type="submit" value="Ya">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php endif; ?>
</div>