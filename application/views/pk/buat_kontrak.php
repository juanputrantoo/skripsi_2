<div class="content">
    <div class="container">
        <?php
        foreach ($detail as $detail) : ?>
            <div class="card shadow w-75 mx-auto">
                <form method="POST" action="<?php echo base_url('pk/penawaran/createKontrak/' . $detail['idPekerjaLepas'] . '/' . $detail['idTawaran']); ?>" enctype="multipart/form-data">
                    <div class="card-header text-center">
                        <h3>Surat Kontrak Kerja</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <p>Yang bertanda tangan di bawah ini:</p>
                        </div>
                        <div class="form-group">
                            <div class="row mx-auto">
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
                            <div class="row mx-auto">
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
                                            adalah <i><?php echo $detail['pekerjaan']; ?></i>. <input type="hidden" class="border-0" name="pekerjaan" value="<?php echo $detail['pekerjaan']; ?>">
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
                                                                        $tanggaNew = date('d-m-Y', strtotime($tanggal));
                                                                        echo $tanggaNew; ?> <input type="hidden" class="border-0" name="date" value="<?php $tanggal = $detail['tanggalDeadline'];
                                                                                                                                                                                                                                                    $tanggaNew = date('d-m-Y', strtotime($tanggal));
                                                                                                                                                                                                                                                    echo $tanggaNew; ?>">
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
                                            <b>PIHAK PERTAMA</b>, dengan jumlah Rp <?php echo $detail['harga']; ?> <input type="hidden" class="border-0" name="harga" value="<?php echo $detail['harga']; ?>"> yang akan dibayarkan sebelum <b>PIHAK KEDUA</b>
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
                    <div class="card-footer text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo base_url('pk/penawaran/terima'); ?>" class="btn btn-secondary w-100">Kembali</a>
                            </div>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-primary w-100" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>