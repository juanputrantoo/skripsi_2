<div class="card shadow mb-4">
    <?php if (isset($detailRegisPK)) : ?>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Lengkap</label>
                            <input class="form-control" type="text" value="<?php echo $detailRegisPK['namaLengkap']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nomor KTP</label>
                            <input class="form-control" type="text" value="<?php echo $detailRegisPK['nomorKTP']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Email</label>
                            <input class="form-control" type="text" value="<?php echo $detailRegisPK['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Foto Tanda Tangan</label><br>
                            <img style="width: 40%" src="<?php echo base_url('upload/TTD/' . $detailRegisPK['fotoTTD']); ?>" />
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Foto Profil</label><br>
                            <img style="width: 40%" src="<?php echo base_url('upload/profil/' . $detailRegisPK['fotoProfil']); ?>" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nomor Telepon</label>
                            <input class="form-control" type="text" value="<?php echo $detailRegisPK['nomorTelepon']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tanggal Daftar</label>
                            <input class="form-control" type="text" value="<?php $tanggal = $detailRegisPK['tanggalDaftar'];
                                                                            $tanggalBaru = date("d-m-Y", strtotime($tanggal));
                                                                            echo $tanggalBaru; ?>" readonly>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#modal-terima">Terima</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-danger w-100" data-toggle="modal" data-target="#modal-tolak">Tolak</button>
                </div>
            </div>
            <form method="POST" action="<?php echo base_url('admin/terimaPK/' . $detailRegisPK['id']); ?>">
                <div class="modal fade" id="modal-terima" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body pb-0">
                                <h5>Anda yakin untuk <strong>menerima</strong> akun <strong>'<?php echo $detailRegisPK['namaLengkap']; ?>'</strong>?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                <input class="btn btn-primary" type="submit" value="Ya">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form method="POST" action="<?php echo base_url('admin/tolakPK/' . $detailRegisPK['id']); ?>">
                <div class="modal fade" id="modal-tolak" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body pb-0">
                                <h5>Anda yakin untuk <strong>menolak</strong> akun <strong>'<?php echo $detailRegisPK['namaLengkap']; ?>'</strong>?</h5>
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