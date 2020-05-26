<div class="content">
    <div class="row profile">
        <div class="col-md-12 profile-diri">
            <div class="card m-2">
                <div class="card-header d-flex justify-content-between bg-white">
                    <h5 class="my-auto"><strong>Informasi Profile</strong></h5>
                    <a href="<?php echo base_url('pl/profileKategori/edit/' . $this->session->userdata('id')); ?>" class="btn btn-edit"><i class="fa fa-pen mr-1"></i>Edit Kategori</a>
                </div>
                <div class="card-body w-50 mx-auto">
                    <?php foreach ($detailPLKategori as $kat) : ?>
                        <div class="card p-2 m-3 shadow">
                            <div class="card-header d-flex justify-content-between bg-white border-0 p-1">
                                <label class="my-auto"><?php echo $kat['namaKategori']; ?></label>

                                <?php if (count($detailPLKategori) > 1) {
                                    echo '<a type="button" data-toggle="modal" data-target="#delKat', $kat['idKategoriPekerjaan'], '"><i class="fas fa-trash" style="font-size: 25px; cursor:pointer;"></i></a>';
                                } ?>
                            </div>
                            <div class="card-body p-0">
                                <div class="form-group">
                                    <div class="input-group" id="show_hide_password">
                                        <div class="input-group-text bg-white border-0">
                                            <p class="mb-0"><strong>Rp</strong></p>
                                        </div>
                                        <input type="text" class="form-control harga" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan harga" name="harga[]" id="harga" value="<?php echo $kat['hargaKategori']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="delKat<?php echo $kat['idKategoriPekerjaan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form method="POST" action="<?php echo base_url('pl/deleteKategori/' . $kat['idKategoriPekerjaan']); ?>" enctype="multipart/form-data">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="mb-0">Anda yakin untuk menghapus kategori <b><?php echo $kat['namaKategori']; ?></b> ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                            <input type="submit" class="btn btn-primary" value="Yakin">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>