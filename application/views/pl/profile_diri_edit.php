<div class="content">
    <div class="row profile">
        <div class="col-md-12 profile-diri">
            <div class="card m-2">
                <div class="card-header d-flex justify-content-between bg-white">
                    <h5 class="my-auto"><strong>Informasi Profile</strong></h5>
                    <a href="<?php echo base_url('pl/profileDiri/' . $this->session->userdata('id')); ?>" class="btn"><i class="fa fa-arrow-left mr-1"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <?php if (isset($detailPL)) : ?>
                        <form method="POST" action="<?php echo base_url('pl/editDiri/' . $this->session->userdata('id')); ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <img class="shadow rounded-circle image-profile" style="width: 200px; height: 200px;" src="<?php echo base_url('upload/profil/' . $detailPL['fotoProfil']); ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th class="align-middle text-center">
                                                    <i class="fa fa-user-circle icon"></i>
                                                </th>
                                                <td>
                                                    <label><small>Nama Lengkap</small></label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama" name="namaLengkap" value="<?php echo $detailPL['namaLengkap']; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="align-middle text-center">
                                                    <i class="fa fa-address-card icon"></i>
                                                </th>
                                                <td>
                                                    <label><small>Nomor KTP</small></label>
                                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nomor KTP" name="nomorKTP" value="<?php echo $detailPL['nomorKTP']; ?>" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="align-middle text-center">
                                                    <i class="fa fa-envelope icon"></i>
                                                </th>
                                                <td>
                                                    <label><small>Email</small></label>
                                                    <input type="email" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $detailPL['email']; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="align-middle text-center">
                                                    <i class="fa fa-mobile icon"></i>
                                                </th>
                                                <td>
                                                    <label><small>Nomor Telepon</small></label>
                                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0818XXXXXX" name="nomorTelepon" value="<?php echo $detailPL['nomorTelepon']; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="align-middle text-center">
                                                    <i class="fab fa-twitter icon"></i>
                                                </th>
                                                <td>
                                                    <label><small>Media Sosial</small></label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="media sosial" name="mediaSosial" value="<?php echo $detailPL['mediaSosial']; ?>">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th class="align-middle text-center">
                                                    <i class="fa fa-map-marker-alt icon"></i>
                                                </th>
                                                <td>
                                                    <label><small>Alamat Tinggal</small></label>
                                                    <textarea class="form-control" name="alamat"><?php echo $detailPL['alamat']; ?></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="align-middle text-center">
                                                    <i class="fa fa-bookmark icon"></i>
                                                </th>
                                                <td>
                                                    <label><small>Judul Pekerjaan</small></label>
                                                    <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="judulPekerjaan"><?php echo $detailPL['judulPekerjaan']; ?></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="align-middle text-center">
                                                    <i class="fa fa-book icon"></i>
                                                </th>
                                                <td>
                                                    <label><small>Deskripsi Pekerjaan</small></label>
                                                    <textarea class="form-control" name="deskripsiPekerjaan"><?php echo $detailPL['deskripsiPekerjaan']; ?></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="align-middle text-center">
                                                    <i class="fa fa-file-image icon"></i>
                                                </th>
                                                <td>
                                                    <label><small>Foto Tanda Tangan</small></label><br>
                                                    <img style="width: 50%;" src="<?php echo base_url('upload/TTD/' . $detailPL['fotoTTD']); ?>">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center w-50">
                                    <input type="submit" class="btn btn-dark" value="Update">
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>