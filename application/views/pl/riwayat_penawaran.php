<div class="content">
    <div class="container">
        <div class="card p-3">
            <div class="card-header bg-white m-1 border-0">
                <div class="row">
                    <div class="col-md-4 text-center m-auto">
                        <h5 class="shadow p-2"><b>Penawaran</b></h5>
                    </div>
                    <div class="col-md-8">
                        <p>Cari Berdasarkan Tanggal:</p>
                        <div class="form-group">
                            <form method="POST" action="<?php echo base_url('pl/riwayatPenawaran/cariTanggal/' . $this->session->userdata('id')); ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input class="form-control datepicker" id="tanggal_dari" name="tanggal_dari" placeholder="DD-MM-YYYY" type="text" autocomplete="off" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar" type="button"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 text-center m-auto">
                                        <i class="fas fa-arrow-right" style="font-size: 18px;"></i>

                                    </div>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input class="form-control datepicker" id="tanggal_hingga" name="tanggal_hingga" placeholder="DD-MM-YYYY" type="text" autocomplete="off" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar" type="button"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 m-auto">
                                        <button type="submit" name="search" id="search" class="btn btn-info">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nama Pemberi Kerja</th>
                        <th scope="col">Tanggal Penawaran</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detail as $detail) : ?>
                        <tr>
                            <td class="align-middle"><img style="width: 60px; height: 60px;" class="rounded-circle" src="<?php echo base_url('upload/profil/' . $detail['fotoProfilPK']); ?>"></td>
                            <td class="align-middle"><?php echo $detail['namaPK']; ?></td>
                            <td class="align-middle"><?php $tanggal = $detail['tanggalBuat'];
                                                        $tanggalBaru = date("d-m-Y / H:i", strtotime($tanggal));
                                                        echo $tanggalBaru; ?></td>
                            <td class="align-middle">
                                <button class="btn btn-success" data-toggle="modal" data-target="#deskripsi<?php echo $detail['idTawaran']; ?>">
                                    <i class="fas fa-eye"></i>
                                    Tawaran
                                </button>
                            </td>
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
                                                    <div class="input-group-text">
                                                        <p class="mb-0"><strong>Rp</strong></p>
                                                    </div>
                                                    <input class="form-control text-center" type="text" id="hargaPekerjaan" name="harga" value="<?php echo $detail['harga']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Dibutuhkan untuk Tanggal:</label>
                                                <div class="input-group w-75 mx-auto">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar" type="button"></i></span>
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
                            <div class="modal fade" id="cancel<?php echo $detail['idTawaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tawaran Dibatalkan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Alasan
                                                    <u>
                                                        <?php if ($detail['statusTawaran'] == 4) {
                                                            echo 'Pemberi Kerja';
                                                        } else if ($detail['statusTawaran'] == 5) {
                                                            echo 'Pekerja Lepas';
                                                        } ?>
                                                    </u>
                                                    :
                                                </label>
                                                <textarea class="form-control" readonly><?php echo $detail['alasanBatal']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <td class="align-middle">
                                <?php if ($detail['statusTawaran'] == 0) {
                                    echo 'Belum Anda Konfirmasi';
                                } else if ($detail['statusTawaran'] == 1) {
                                    echo 'Diterima (Sedang Proses Kontrak)';
                                } else if ($detail['statusTawaran'] == 2) {
                                    echo 'Ditolak';
                                } else if ($detail['statusTawaran'] == 3) {
                                    echo 'Diterima (Hingga Kontrak)';
                                } else if ($detail['statusTawaran'] == 4) {
                                    echo '<button class="btn btn-info" data-toggle="modal" data-target="#cancel' . $detail['idTawaran'] . '">Dibatalkan</button>';
                                } else if ($detail['statusTawaran'] == 5) {
                                    echo '<button class="btn btn-info" data-toggle="modal" data-target="#cancel' . $detail['idTawaran'] . '">Dibatalkan</button>';
                                } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if (count($detail) < 1) {
                echo '
                    <div class="card bg-light h-75 border-0">
                        <div class="card-body text-center d-flex" style="color: gray;">
                            <div class="my-auto mx-auto">
                                <span>
                                    <i class="far fa-sticky-note" style="font-size: 100px;"></i>
                                </span>
                                <p class="m-3"><b>Kosong</b></p>
                            </div>
                        </div>
                    </div>
                        ';
            } ?>
        </div>
    </div>
</div>