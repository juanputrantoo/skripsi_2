<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary mt-auto mb-auto">Kategori Pekerjaan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered m-auto" id="dataTable" cellspacing="0" style="width: 50%;">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Nama Kategori</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1;
          foreach ($kategoriPekerjaan as $kategori) : ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $kategori->nama; ?></td>
              <td>
                <a class="" href="" data-toggle="modal" data-target="#modalDeleteKategori<?php echo $kategori->id; ?>"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            <div class="modal fade" id="modalDeleteKategori<?php echo $kategori->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <form method="POST" action="<?php echo base_url('admin/kategoriPekerjaan/delete') . $kategori->id; ?>">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-body pb-0">
                      <h5>Anda yakin untuk <strong>menghapus</strong> kategori <strong><?php echo $kategori->nama; ?></strong>?</h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                      <input class="btn btn-primary" type="submit" value="Ya">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<a class="btn btn-dark tambah-kategori" href="" data-toggle="modal" data-target="#modal-tambah-kategori">
  <i class="fas fa-plus"></i>
</a>
<div class="modal fade" id="modal-tambah-kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <form method="POST" action="<?php echo base_url() . 'admin/kategoriPekerjaan/create'; ?>">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Kategori Pekerjaan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Masukkan Kategori Baru:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Save">
        </div>
      </div>
    </div>
  </form>
</div>