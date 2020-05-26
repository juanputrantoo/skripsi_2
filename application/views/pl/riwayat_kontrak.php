<div class="content">
    <div class="container">
        <div class="card p-3">
            <div class="card-header bg-white m-1 border-0">
                <div class="row">
                    <div class="col-md-4 text-center m-auto">
                        <h5 class="shadow p-2"><b>Kontrak</b></h5>
                    </div>
                    <div class="col-md-8">
                        <p>Cari Berdasarkan Tanggal:</p>
                        <div class="form-group">
                            <form method="POST" action="<?php echo base_url('pl/riwayatKontrak/cariTanggal/' . $this->session->userdata('id')); ?>" enctype="multipart/form-data">
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
                        <th scope="col">Tanggal Kontrak</th>
                        <th scope="col">Status</th>
                        <th scope="col">Kontrak (PDF)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detail as $detail) : ?>
                        <tr>
                            <td class="align-middle"><img style="width: 60px; height: 60px;" class="rounded-circle" src="<?php echo base_url('upload/profil/' . $detail['fotoProfilPK']); ?>"></td>
                            <td class="align-middle"><?php echo $detail['namaPK']; ?></td>
                            <td class="align-middle"><?php $tanggal = $detail['tanggalBuat'];
                                                        $tanggalBaru = date("d-m-Y", strtotime($tanggal));
                                                        echo $tanggalBaru; ?>
                            </td>
                            <td class="align-middle">
                                <?php if ($detail['statusKontrak'] == 0) {
                                    echo 'Belum Anda Terima';
                                } else if ($detail['statusKontrak'] == 1) {
                                    echo 'Diterima';
                                } ?>
                            </td>
                            <td class="align-middle">
                                <?php if ($detail['statusKontrak'] == 0) {
                                    echo '-';
                                } else if ($detail['statusKontrak'] == 1) {
                                    echo '<a href="' . base_url('pl/cetak/' . $detail['idKontrak']) . '" class="btn btn-success" target="_blank"><i class="fas fa-file-pdf"></i></a>';
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