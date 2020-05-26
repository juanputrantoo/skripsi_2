<div class="card shadow mb-4">
  <div class="card-header py-4 d-flex justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary mt-auto mb-auto">Penawaran Pekerjaan</h6>
  </div>
  <form class="mb-0" method="POST" action="<?php echo base_url('admin/penawaranPekerjaan/cariTanggal'); ?>" enctype="multipart/form-data">
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
            <th>Waktu Penawaran</th>
            <th>Status</th>
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
                  $tanggalBaru = date('d-m-Y / H:i', strtotime($tanggal));
                  echo $tanggalBaru; ?></td>
              <td>
                <?php if ($detail['statusTawaran'] == 0) {
                  echo 'Belum dikonfirmasi Pekerja Lepas';
                } else if ($detail['statusTawaran'] == 1) {
                  echo 'Diterima (Masuk ke Proses Kontrak)';
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
              <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#penawaran<?php echo $detail['idTawaran']; ?>">
                  <i class="fas fa-eye"></i>
                </button>
              </td>
              <div class="modal fade" id="penawaran<?php echo $detail['idTawaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Deskripsi Tawaran</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <textarea style="height: 300px;" class="w-100 p-2" name="deskripsi" readonly><?php echo $detail['deskripsi']; ?></textarea>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>