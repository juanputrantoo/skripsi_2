<div class="card shadow mb-4">
    <?php if (isset($detailRegisPL)) : ?>
        <div class="card-body">
            <form>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail-biodata-diri">
                    Detail Biodata Diri
                </button>
                <div class="modal fade" id="detail-biodata-diri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Biodata Diri</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Nama Lengkap</label>
                                            <input class="form-control" type="text" value="<?php echo $detailRegisPL['namaLengkap']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Nomor KTP</label>
                                            <input class="form-control" type="text" value="<?php echo $detailRegisPL['nomorKTP']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Email</label>
                                            <input class="form-control" type="text" value="<?php echo $detailRegisPL['email']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Nomor Telepon</label>
                                            <input class="form-control" type="text" value="<?php echo $detailRegisPL['nomorTelepon']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Media Sosial</label>
                                            <input class="form-control" type="text" value="<?php echo $detailRegisPL['mediaSosial']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Foto Tanda Tangan</label><br>
                                            <img style="width: 40%" src="<?php echo base_url('upload/TTD/' . $detailRegisPL['fotoTTD']); ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Alamat Tinggal</label>
                                            <textarea class="form-control" type="text" readonly><?php echo $detailRegisPL['alamat']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Tanggal Daftar</label>
                                            <input class="form-control" type="text" value="<?php $tanggal = $detailRegisPL['tanggalDaftar'];
                                                                                            $tanggalBaru = date("d-m-Y", strtotime($tanggal));
                                                                                            echo $tanggalBaru; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Judul Pekerjaan</label>
                                            <input class="form-control" type="text" value="<?php echo $detailRegisPL['judulPekerjaan']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Deskripsi Pekerjaan</label>
                                            <textarea class="form-control" type="text" readonly><?php echo $detailRegisPL['deskripsiPekerjaan']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Foto Profil</label><br>
                                            <img style="width: 40%" src="<?php echo base_url('upload/profil/' . $detailRegisPL['fotoProfil']); ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-12 text-center">
                        <label for="formGroupExampleInput">Kategori Pekerjaan</label>
                        <div class="form-group d-flex justify-content-center">
                            <?php foreach ($detailRegisPLKategori as $kat) : ?>
                                <div class="card text-center shadow m-1 w-100">
                                    <div class="card-body py-2">
                                        <h6 class="card-title mb-0"><?php echo $kat['namaKategori']; ?></h6>
                                        <p class="card-text"><?php echo $kat['hargaKategori']; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <label for="formGroupExampleInput">Portofolio</label>
                    <div class="gallery-admin">
                        <div class="form-group">
                            <?php $images = explode(",", $detailRegisPLPorto['porto']); ?>
                            <?php foreach ($images as $img) : ?>
                                <img src="<?php echo base_url('upload/portofolio/') . $img; ?>" />
                            <?php endforeach; ?>
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
            <form method="POST" action="<?php echo base_url('admin/terimaPekerjaanPL/' . $detailRegisPL['id']); ?>">
                <div class="modal fade" id="modal-terima" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body pb-0">
                                <h5>Anda yakin untuk <strong>menerima</strong> biodata pekerjaan <strong>'<?php echo $detailRegisPL['namaLengkap']; ?>'</strong>?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                <input class="btn btn-primary" type="submit" value="Ya">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form method="POST" action="<?php echo base_url('admin/tolakPekerjaanPL/' . $detailRegisPL['id']); ?>">
                <div class="modal fade" id="modal-tolak" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body pb-0">
                                <h5>Anda yakin untuk <strong>menolak</strong> biodata pekerjaan <strong>'<?php echo $detailRegisPL['namaLengkap']; ?>'</strong>?</h5>
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