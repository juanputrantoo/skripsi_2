<div class="card shadow mb-4">
    <?php if (isset($detailAkunPL)) : ?>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Lengkap</label>
                            <input class="form-control" type="text" value="<?php echo $detailAkunPL['namaLengkap']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nomor KTP</label>
                            <input class="form-control" type="text" value="<?php echo $detailAkunPL['nomorKTP']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Email</label>
                            <input class="form-control" type="text" value="<?php echo $detailAkunPL['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nomor Telepon</label>
                            <input class="form-control" type="text" value="<?php echo $detailAkunPL['nomorTelepon']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Media Sosial</label>
                            <input class="form-control" type="text" value="<?php echo $detailAkunPL['mediaSosial']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Foto Tanda Tangan</label><br>
                            <img style="width: 40%" src="<?php echo base_url('upload/TTD/' . $detailAkunPL['fotoTTD']); ?>" />
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Foto Profil</label><br>
                            <img style="width: 40%" src="<?php echo base_url('upload/profil/' . $detailAkunPL['fotoProfil']); ?>" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Alamat Tinggal</label>
                            <textarea class="form-control" type="text" readonly><?php echo $detailAkunPL['alamat']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tanggal Daftar</label>
                            <input class="form-control" type="text" value="<?php $tanggal = $detailAkunPL['tanggalDaftar'];
                                                                            $tanggalBaru = date("d-m-Y", strtotime($tanggal));
                                                                            echo $tanggalBaru; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Judul Pekerjaan</label>
                            <input class="form-control" type="text" value="<?php echo $detailAkunPL['judulPekerjaan']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Deskripsi Pekerjaan</label>
                            <textarea class="form-control" type="text" readonly><?php echo $detailAkunPL['deskripsiPekerjaan']; ?></textarea>
                        </div>

                        <label for="formGroupExampleInput">Kategori Pekerjaan</label>
                        <div class="form-group d-flex justify-content-center">
                            <?php foreach ($detailAkunPLKategori as $kat) : ?>
                                <div class="card text-center shadow m-1 w-100">
                                    <div class="card-body py-2">
                                        <h6 class="card-title mb-0"><?php echo $kat['namaKategori']; ?></h6>
                                        <p class="card-text"><?php echo $kat['hargaKategori']; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <label for="formGroupExampleInput">Portofolio</label>
                        <div class="gallery-admin">
                            <div class="form-group">
                                <?php $images = explode(",", $detailAkunPLPorto['porto']); ?>
                                <?php foreach ($images as $img) : ?>
                                    <img src="<?php echo base_url('upload/portofolio/') . $img; ?>" />
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row m-3">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#modal-suspend">Suspend</button>
                </div>
            </div>
            <form method="POST" action="<?php echo base_url('admin/suspendPL/' . $detailAkunPL['id']); ?>">
                <div class="modal fade" id="modal-suspend" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body pb-0">
                                <h5>Anda yakin untuk <strong>suspend</strong> akun tersebut?</h5>
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