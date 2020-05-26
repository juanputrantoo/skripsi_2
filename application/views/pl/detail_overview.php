<div class="content detail-pekerja">
    <div class="container detail-overview">
        <div class="card shadow detail-card">
            <div class="card-body bg-light">
                <?php if (isset($detailPekerja)) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <h5 class="sub-judul"><strong><?php echo $detailPekerja['judulPekerjaan']; ?></strong></h5>
                                <textarea class="overview-textarea" readonly><?php echo $detailPekerja['deskripsiPekerjaan']; ?></textarea>
                            </div>
                            <div>
                                <h5 class="sub-judul"><strong>Kategori Pekerjaan</strong></h5>
                                <div class="form-group d-flex justify-content-center">
                                    <?php foreach ($detailPekerjaKategori as $kat) : ?>
                                        <div class="card text-center shadow m-1 w-100" style="border: 1px solid #95afc0;">
                                            <div class="card-body py-2">
                                                <h6 class="card-title mb-0"><?php echo $kat['namaKategori']; ?></h6>
                                                <p class="card-text"><?php echo $kat['hargaKategori']; ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>