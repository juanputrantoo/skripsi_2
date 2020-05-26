<div class="content sidebar-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-body m-0 p-0">
                        <div class="list-group">
                            <a href="<?php echo base_url('pk/cariPekerja/overview/' . $detailPekerja['id']); ?>" class="d-flex list-group-item list-group-item-action <?php if ($this->uri->segment(3) == "overview") {
                                                                                                                                                                            echo "active";
                                                                                                                                                                        } ?>">
                                <i class="fa fa-eye my-auto mr-3"></i>
                                Overview
                            </a>
                            <a href="<?php echo base_url('pk/cariPekerja/portofolio/' . $detailPekerja['id']); ?>" class="d-flex list-group-item list-group-item-action <?php if ($this->uri->segment(3) == "portofolio") {
                                                                                                                                                                            echo "active";
                                                                                                                                                                        } ?>">
                                <i class="fa fa-briefcase my-auto mr-3"></i>
                                Portofolio
                            </a>
                            <a href="<?php echo base_url('pk/cariPekerja/pengalaman/' . $detailPekerja['id']); ?>" class="d-flex list-group-item list-group-item-action <?php if ($this->uri->segment(3) == "pengalaman") {
                                                                                                                                                                            echo "active";
                                                                                                                                                                        } ?>">
                                <i class="fa fa-handshake my-auto mr-3"></i>
                                Pengalaman di Yugawe
                            </a>
                            <a href="<?php echo base_url('pk/cariPekerja/komentar/' . $detailPekerja['id']); ?>" class="d-flex list-group-item list-group-item-action <?php if ($this->uri->segment(3) == "komentar") {
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
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <?php if (count($tawaran) > 0 || count($tawaranTerima) > 0 || count($kontrak) > 0) {
                                    echo '<button class="btn btn-dark" style="width: 100%;" data-toggle="modal" data-target="#modal-tawaran" disabled><strike>Tawarkan Pekerjaan</strike></button>';
                                } else {
                                    echo '<button class="btn btn-tawarkan" style="width: 100%;" data-toggle="modal" data-target="#modal-tawaran">Tawarkan Pekerjaan</button>';
                                }
                                ?>
                                <p style="margin-top: 10px; margin-bottom: 0;"><small><i>Untuk melihat kontak pekerja lepas</i></small></p>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-tawaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <?php if (isset($detailPekerja)) : ?>
                                <form method="POST" action="<?php echo base_url('pk/cariPekerja/createTawaran/' . $detailPekerja['id']); ?>" enctype="multipart/form-data">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tawarkan Pekerjaan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Pilih Pekerjaan</label>
                                                    <select class="form-control w-75 mx-auto" name="pekerjaan" id="pekerjaan" onchange=getHarga(this) required>
                                                        <option disabled selected value>Pilih satu kategori...</option>
                                                        <?php foreach ($detailPekerjaKategori as $row) : ?>
                                                            <option><?php echo $row['namaKategori']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Harga Pekerjaan</label>
                                                    <div class="input-group w-75 mx-auto" id="show_hide_password">
                                                        <div class="input-group-text">
                                                            <p class="mb-0"><strong>Rp</strong></p>
                                                        </div>
                                                        <input class="form-control text-center" type="text" id="hargaPekerjaan" name="harga" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Dibutuhkan untuk Tanggal:</label>
                                                    <div class="input-group w-75 mx-auto">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-calendar" type="button"></i></span>
                                                        </div>
                                                        <input class="form-control text-center" id="date" name="date" placeholder="MM-DD-YYYY" type="text" data-date-start-date="+0d" autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Deksripsikan Tawaran Anda</label>
                                                    <textarea style="height: 100px;" class="w-100 p-2 form-control" name="deskripsi" placeholder="Berikan deksripsi selengkap-lengkapnya." required></textarea>
                                                </div>
                                                <div class="form-group text-center" style="border: 1px solid #e74c3c;">
                                                    <div class="p-2">
                                                        <small>Tawaran ini hanya berlaku selama <u>1 hari</u>. Jika pekerja lepas tidak melakukan konfirmasi apapun, maka tawaran otomatis akan ditolak.</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                <input type="submit" class="btn btn-primary" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php endif; ?>
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