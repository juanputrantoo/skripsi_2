<div class="content">
    <div class="container penawaran">
        <div class="sub-judul">
            <i class="fas fa-file-contract" style="font-size: 20px;"></i>
            <p class="mb-0 ml-1 my-auto">Dalam proses kontrak</p>
        </div>
        <?php if (count($detail) < 1) {
            echo '
            <div class="card bg-light h-75 border-0">
            <div class="card-body text-center d-flex" style="color: gray;">
                <div class="my-auto mx-auto">
                    <span>
                        <i class="fas fa-meh" style="font-size: 100px;"></i>
                    </span>
                    <p class="m-3"><b>Belum ada lagi di proses kontrak</b></p>
                </div>
            </div>
        </div>
        ';
        } ?>
        <?php foreach ($detail as $detail) : ?>
            <div class="card m-2 shadow" style="border: 1px solid #2c3e50;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center my-auto">
                            <img style="width: 60px; height: 60px;" class="rounded-circle" src="<?php echo base_url('upload/profil/' . $detail['fotoProfilPL']); ?>">
                        </div>
                        <div class="col-md-3 text-center my-auto">
                            <?php echo $detail['namaPL']; ?>
                        </div>
                        <div class="col-md-3 text-center my-auto">
                            Menunggu Konfirmasi
                        </div>
                        <div class="col-md-3 text-center my-auto">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deskripsi<?php echo $detail['idKontrak']; ?>">
                                <i class="fas fa-eye"></i>
                                Kontrak
                            </button>
                        </div>
                    </div>
                    <div class="modal fade" id="deskripsi<?php echo $detail['idKontrak']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Kontrak</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <p>Yang bertanda tangan di bawah ini:</p>
                                    </div>
                                    <div class="form-group">
                                        <div class="row m-auto">
                                            <div class="col-md-4">
                                                <p>Nama</p>
                                                <p>Nomor KTP</p>
                                                <p>Email</p>
                                                <p>Nomor Telepon</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p>: <?php echo $detail['namaPK']; ?></p>
                                                <p>: <?php echo $detail['nomorKTPPK']; ?></p>
                                                <p>: <?php echo $detail['emailPK']; ?></p>
                                                <p>: <?php echo $detail['nomorTeleponPK']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p>Dalam hal ini bertindak untuk dan atas nama dirinya sendiri, yang selanjutnya disebut sebagai <b>PIHAK PERTAMA</b>.</p>
                                        <hr class="w-50">
                                    </div>
                                    <div class="form-group">
                                        <div class="row m-auto">
                                            <div class="col-md-4 align-center">
                                                <p>Nama</p>
                                                <p>Nomor KTP</p>
                                                <p>Alamat</p>
                                                <p>Email</p>
                                                <p>Nomor Telepon</p>
                                                <p>Media Sosial</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p>: <?php echo $detail['namaPL']; ?></p>
                                                <p>: <?php echo $detail['nomorKTPPL']; ?></p>
                                                <p>: <?php echo $detail['alamatPL']; ?></p>
                                                <p>: <i>(Bisa terlihat ketika proses kontrak sudah selesai)</i></p>
                                                <p>: <i>(Bisa terlihat ketika proses kontrak sudah selesai)</i></p>
                                                <p>: <i>(Bisa terlihat ketika proses kontrak sudah selesai)</i></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p>Dalam hal ini bertindak untuk dan atas nama dirinya sendiri, yang selanjutnya disebut sebagai <b>PIHAK KEDUA</b>.</p>
                                        <hr class="w-50">
                                    </div>
                                    <div class="mt-5 mb-5">
                                        <div class="form-group">
                                            <div class="row mx-auto">
                                                <div class="col-md-12 text-center">
                                                    <h5 class="mb-0"><b>PASAL 1</b></h5>
                                                    <h5><b>PERNYATAAN-PERNYATAAN</b></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row mx-auto">
                                                <div class="col-md-12">
                                                    <p class="mb-0"><b>Ayat 1</b></p>
                                                    <p class="ml-4"><b>PIHAK PERTAMA</b> telah menyatakan persetujuannya untuk mempekerjakan PIHAK KEDUA
                                                        selaku pekerja lepas.
                                                    </p>
                                                    <p class="mb-0"><b>Ayat 2</b></p>
                                                    <p class="ml-4"><b>PIHAK KEDUA</b> meyatakan ketersediaannya selaku pekerja lepas untuk bekerja dan memenuhi
                                                        keinginan <b>PIHAK PERTAMA</b> sesuai penawaran pekerjaan.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 mb-5">
                                        <div class="form-group">
                                            <div class="row mx-auto">
                                                <div class="col-md-12 text-center">
                                                    <h5 class="mb-0"><b>PASAL 2</b></h5>
                                                    <h5><b>RUANG LINGKUP PEKERJAAN
                                                        </b></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row mx-auto">
                                                <div class="col-md-12">
                                                    <p class="mb-0"><b>Ayat 1</b></p>
                                                    <p class="ml-4">Pekerjaan yang harus dilakukan <b>PIHAK KEDUA</b> selaku pekerja lepas pada <b>PIHAK PERTAMA</b>
                                                        adalah <i><?php echo $detail['pekerjaan']; ?></i>.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 mb-5">
                                        <div class="form-group">
                                            <div class="row mx-auto">
                                                <div class="col-md-12 text-center">
                                                    <h5 class="mb-0"><b>PASAL 3</b></h5>
                                                    <h5><b>MASA BERLAKU PERJANJIAN KERJA
                                                        </b></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row mx-auto">
                                                <div class="col-md-12">
                                                    <p class="mb-0"><b>Ayat 1</b></p>
                                                    <p class="ml-4">Perjanjian kerja ini berlaku terhitung sejak tanggal penandatanganan surat perjanjian kerja ini dan
                                                        akan berakhir pada tanggal <?php $tanggal = $detail['tanggalDeadline'];
                                                                                    $tanggalBaru = date("d-m-Y", strtotime($tanggal));
                                                                                    echo $tanggalBaru; ?>.
                                                    </p>
                                                    <p class="mb-0"><b>Ayat 2</b></p>
                                                    <p class="ml-4">Setelah berakhirnya jangka waktu tersebut dan pekerjaan masih belum selesai, maka kedua belah
                                                        pihak dapat membuat pembaruan perjanjian kembali.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 mb-5">
                                        <div class="form-group">
                                            <div class="row mx-auto">
                                                <div class="col-md-12 text-center">
                                                    <h5 class="mb-0"><b>PASAL 4</b></h5>
                                                    <h5><b>UPAH DAN PEMBAYARAN</b></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row mx-auto">
                                                <div class="col-md-12">
                                                    <p class="mb-0"><b>Ayat 1</b></p>
                                                    <p class="ml-4"><b>PIHAK KEDUA</b> berhak atas upah atau pembayaran dari pekerjaan yang dilakukannya, dari
                                                        <b>PIHAK PERTAMA</b>, dengan jumlah Rp <?php echo $detail['harga']; ?>, yang akan dibayarkan sebelum <b>PIHAK KEDUA</b>
                                                        melakukan pekerjaannya.
                                                    </p>
                                                    <p class="mb-0"><b>Ayat 2</b></p>
                                                    <p class="ml-4"><b>PIHAK PERTAMA</b> wajib membayarkan upah atau pembayaran kepada <b>PIHAK KEDUA</b>
                                                        sebagaimana tersebut pada ayat 1 pasal ini, dengan tidak mengesampingkan kondisi-kondisi
                                                        tertentu yang mungkin terjadi dimana <b>PIHAK PERTAMA</b> membutuhkan kerjasama dan kesadaran
                                                        <b>PIHAK KEDUA</b>.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 mb-5">
                                        <div class="form-group">
                                            <div class="row mx-auto">
                                                <div class="col-md-12 text-center">
                                                    <h5 class="mb-0"><b>PASAL 5</b></h5>
                                                    <h5><b>KEADAAN DARURAT</b></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row mx-auto">
                                                <div class="col-md-12">
                                                    <p class="ml-4">Perjanjian kerja ini batal dengan sendirinya jika karena keadaan atau situasi yang memaksa,
                                                        seperti: bencana alam, pemberontakan, perang, huru-hara, kerusuhan, Peraturan Pemerintah atau
                                                        apapun yang mengakibatkan perjanjian kerja ini tidak mungkin lagi untuk diwujudkan.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 mb-5">
                                        <div class="form-group">
                                            <div class="row mx-auto">
                                                <div class="col-md-12 text-center">
                                                    <h5 class="mb-0"><b>PASAL 6</b></h5>
                                                    <h5><b>PENYELESAIAN PERSELISIHAN</b></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row mx-auto">
                                                <div class="col-md-12">
                                                    <p class="mb-0"><b>Ayat 1</b></p>
                                                    <p class="ml-4">Apabila terjadi perselisihan antara kedua belah pihak, akan diselesaikan secara musyawarah untuk
                                                        mencapai mufakat.
                                                    </p>
                                                    <p class="mb-0"><b>Ayat 2</b></p>
                                                    <p class="ml-4">Apabila dengan cara ayat 1 pasal ini tidak tercapai kata sepakat, maka kedua belah pihak sepakat
                                                        untuk menyelesaikan permasalahan tersebut dilakukan melalui prosedur hukum, yang akan
                                                        dibantu oleh pihak YUGAWE.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 mb-5">
                                        <div class="form-group">
                                            <div class="row mx-auto">
                                                <div class="col-md-12 text-center">
                                                    <h5 class="mb-0"><b>PASAL 7</b></h5>
                                                    <h5><b>PENUTUP</b></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row mx-auto">
                                                <div class="col-md-12">
                                                    <p class="ml-4">Demikianlah perjanjian ini dibuat, disetujui, dan ditandatangani oleh kedua pihak secara online di
                                                        website YUGAWE pada tanggal <?php $tanggal = mdate("%Y-%m-%d");
                                                                                    $tanggalBaru = date('d-m-Y', strtotime($tanggal));
                                                                                    echo $tanggalBaru; ?> dalam bentuk file PDF.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 text-center">
                                                <p><b>PIHAK PERTAMA</b></p>
                                                <img style="width: 50%" src="<?php echo base_url('upload/TTD/' . $detail['fotoTTDPK']); ?>" />
                                                <p><?php echo $detail['namaPK']; ?></p>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <p><b>PIHAK KEDUA</b></p>
                                                <img style="width: 50%" src="<?php echo base_url('upload/TTD/' . $detail['fotoTTDPL']); ?>" />
                                                <p><?php echo $detail['namaPL']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>