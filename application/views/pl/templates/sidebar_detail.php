<div class="content sidebar-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-body m-0 p-0">
                        <div class="list-group">
                            <a href="<?php echo base_url('pl/cariPekerja/overview/' . $detailPekerja['id']); ?>" class="d-flex list-group-item list-group-item-action <?php if ($this->uri->segment(3) == "overview") {
                                                                                                                                                                            echo "active";
                                                                                                                                                                        } ?>">
                                <i class="fa fa-eye my-auto mr-3"></i>
                                Overview
                            </a>
                            <a href="<?php echo base_url('pl/cariPekerja/portofolio/' . $detailPekerja['id']); ?>" class="d-flex list-group-item list-group-item-action <?php if ($this->uri->segment(3) == "portofolio") {
                                                                                                                                                                            echo "active";
                                                                                                                                                                        } ?>">
                                <i class="fa fa-briefcase my-auto mr-3"></i>
                                Portofolio
                            </a>
                            <a href="<?php echo base_url('pl/cariPekerja/pengalaman/' . $detailPekerja['id']); ?>" class="d-flex list-group-item list-group-item-action <?php if ($this->uri->segment(3) == "pengalaman") {
                                                                                                                                                                            echo "active";
                                                                                                                                                                        } ?>">
                                <i class="fa fa-handshake my-auto mr-3"></i>
                                Pengalaman di Yugawe
                            </a>
                            <a href="<?php echo base_url('pl/cariPekerja/komentar/' . $detailPekerja['id']); ?>" class="d-flex list-group-item list-group-item-action <?php if ($this->uri->segment(3) == "komentar") {
                                                                                                                                                                            echo "active";
                                                                                                                                                                        } ?>">
                                <i class="fa fa-comment-dots my-auto mr-3"></i>
                                Komentar dari Pemberi Kerja
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            </div>
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-header m-0 p-0 bg-white">
                        <div class="row">
                            <div class="col-md-4 my-auto">
                                <img class="rounded-circle image-detail-pekerja" src="<?php echo base_url('upload/profil/' . $detailPekerja['fotoProfil']); ?>">
                            </div>
                            <div class="col-md-8 my-auto">
                                <h6><strong><?php echo $detailPekerja['namaLengkap']; ?></strong></h6>
                                <p><small>Bergabung Sejak:<br> <?php $tanggal = $detailPekerja['tanggalDaftar'];
                                                                $tanggalBaru = date("d-m-Y", strtotime($tanggal));
                                                                echo $tanggalBaru; ?></small></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><small>Email</small></p>
                                <p><small>No. Telepon</small></p>
                                <p><small>Media Sosial</small></p>
                            </div>
                            <div class="col-md-6 text-center">
                                <p><small>xxxxxx</small></p>
                                <p><small>xxxxxx</small></p>
                                <p><small>xxxxxx</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function getHarga() {
        var select_kategori = document.getElementById('pekerjaan').value;
        var dataPekerjaan = <?php echo json_encode($detailPekerjaKategori); ?>;
        for (var i = 0; i < dataPekerjaan.length; i++) {
            // console.log(dataPekerjaan[i]['namaKategori']);
            if (dataPekerjaan[i]['namaKategori'] === select_kategori) {
                document.getElementById('hargaPekerjaan').value = dataPekerjaan[i]['hargaKategori'];
                break;
            }
        }
    }
</script>