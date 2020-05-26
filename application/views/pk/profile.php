<div class="content profile">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-2">
                <div class="card-header d-flex justify-content-between bg-white">
                    <h5 class="my-auto"><strong>Informasi Profile</strong></h5>
                    <a href="<?php echo base_url('pk/profile/edit/' . $pk['id']); ?>" class="btn"><i class="fa fa-pen mr-1"></i>Edit Data Diri</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 pr-0">
            <div class="card shadow rounded-0 border-right-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-center mx-auto">
                            <img class="rounded-circle image-profile mb-3" src="<?php echo base_url('upload/profil/' . $pk['fotoProfil']); ?>">
                            <form method="POST" action="<?php echo base_url('pk/profile/editFotoProfil/' . $pk['id']); ?>" enctype="multipart/form-data">
                                <input type="file" class="mb-3" name="fotoProfil" id="editProfil">
                                <input type="submit" class="btn btn-dark" id="submitProfil" name="submitProfil">
                            </form>
                        </div>
                        <div class="col-md-6 d-flex my-auto justify-content-center">
                            <p>Bergabung Sejak:<br> <?php $tanggal = $pk['tanggalDaftar'];
                                                    $tanggalBaru = date("d-m-Y", strtotime($tanggal));
                                                    echo $tanggalBaru; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7 pl-0">
            <div class="card shadow rounded-0">
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th class="align-middle text-center">
                                    <i class="fa fa-user-circle icon"></i>
                                </th>
                                <td>
                                    <label><small>Nama Lengkap</small></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama" name="namaLengkap" value="<?php echo $pk['namaLengkap']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle text-center">
                                    <i class="fa fa-address-card icon"></i>
                                </th>
                                <td>
                                    <label><small>Nomor KTP</small></label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nomor KTP" name="nomorKTP" value="<?php echo $pk['nomorKTP']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle text-center">
                                    <i class="fa fa-envelope icon"></i>
                                </th>
                                <td>
                                    <label><small>Email</small></label>
                                    <input type="email" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $pk['email']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle text-center">
                                    <i class="fa fa-mobile icon"></i>
                                </th>
                                <td>
                                    <label><small>Nomor Telepon</small></label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0818XXXXXX" name="nomorTelepon" value="<?php echo $pk['nomorTelepon']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle text-center">
                                    <i class="fa fa-file-image icon"></i>
                                </th>
                                <td>
                                    <label><small>Foto Tanda Tangan</small></label><br>
                                    <img style="width: 50%;" src="<?php echo base_url('upload/TTD/' . $pk['fotoTTD']); ?>">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>