<div class="content detail-pekerja">
    <div class="container detail-pengalaman">
        <div class="card shadow detail-card">
            <div class="card-body bg-light">
                <?php if (count($detailKontrak) < 1) {
                    echo '<div class="card bg-light h-75 border-0">
                            <div class="card-body text-center d-flex" style="color: gray;">
                                <div class="my-auto mx-auto">
                                    <span>
                                        <i class="fas fa-user-slash" style="font-size: 100px;"></i>
                                    </span>
                                    <p class="m-3"><b>Belum ada pengalaman di Yugawe</b></p>
                                </div>
                            </div>
                        </div>';
                } ?>
                <?php foreach ($detailKontrak as $detail) : ?>
                    <div class="card p-2">
                        <div class="w-50 mx-auto m-2" style="border: 3px solid #2c3e50;"></div>
                        <div class="card-body p-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-0">Nama Pemberi Kerja</p>
                                </div>
                                <div class="col-md-6">
                                    <?php echo ': ' . $detail['namaPK']; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-0">Tanggal</p>
                                </div>
                                <div class="col-md-6">
                                    <?php $tanggal = $detail['tanggalBuat'];
                                    $tangalBaru = date("d-m-Y", strtotime($tanggal));
                                    echo ': ' . $tangalBaru; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-0">Pekerjaan</p>
                                </div>
                                <div class="col-md-6">
                                    <?php echo ': ' . $detail['pekerjaan']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>