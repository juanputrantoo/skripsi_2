<div class="card shadow mb-4">
  <div class="card-header py-4 d-flex">
    <h6 class="m-0 font-weight-bold text-primary mt-auto mb-auto">Kontrak Pekerjaan</h6>
  </div>
  <form class="mb-0" method="POST" action="<?php echo base_url('admin/kontrakPekerjaan/cariTanggal'); ?>" enctype="multipart/form-data">
    <div class="card-header d-flex justify-content-center p-2">
      <div class="input-group w-25">
        <input class="form-control datepicker text-center" id="tanggal_dari" name="tanggal_dari" placeholder="DD-MM-YYYY" type="text" autocomplete="off" required>
        <div class="input-group-append">
          <span class="input-group-text">
            <i class="fas fa-calendar fa-sm"></i>
          </span>
        </div>
      </div>
      <span class="my-auto m-2"><b>-</b></span>
      <div class="input-group w-25">
        <input class="form-control datepicker text-center" id="tanggal_hingga" name="tanggal_hingga" placeholder="DD-MM-YYYY" type="text" autocomplete="off" required>
        <div class="input-group-append">
          <span class="input-group-text">
            <i class="fas fa-calendar fa-sm"></i>
          </span>
        </div>
        <div class="input-group-append">
          <button class="btn btn-info" type="submit">
            <i class="fas fa-search fa-sm"></i>
          </button>
        </div>
      </div>
    </div>
  </form>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered m-auto" id="dataTable" cellspacing="0">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Nama Pemberi Kerja</th>
            <th>Nama Pekerja Lepas</th>
            <th>Tanggal Kontrak</th>
            <th>Status</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1;
          foreach ($detail as $detail) : ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $detail['namaPK']; ?></td>
              <td><?php echo $detail['namaPL']; ?></td>
              <td><?php $tanggal = $detail['tanggalBuat'];
                  $tanggalBaru = date('d-m-Y', strtotime($tanggal));
                  echo $tanggalBaru; ?></td>
              <td>
                <?php if ($detail['statusKontrak'] == 0) {
                  echo 'Belum dikonfirmasi';
                } else if ($detail['statusKontrak'] == 1) {
                  echo 'Sudah dikonfirmasi';
                } ?>
              </td>
              <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kontrak<?php echo $detail['idKontrak']; ?>">
                  <i class="fas fa-eye"></i>
                </button>
              </td>
              <td>
                <?php if ($detail['statusKontrak'] == 0) {
                  echo '-';
                } else if ($detail['statusKontrak'] == 1) {
                  echo '<a href="' . base_url('admin/cetak/' . $detail['idKontrak']) . '" class="btn btn-primary" target="_blank"><i class="fas fa-file-pdf"></i></a>';
                } ?>
              </td>
              <div class="modal fade" id="kontrak<?php echo $detail['idKontrak']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <p>: <?php echo $detail['emailPL']; ?></p>
                            <p>: <?php echo $detail['nomorTeleponPL']; ?></p>
                            <p>: <?php echo $detail['mediaSosialPL']; ?></p>
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
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>