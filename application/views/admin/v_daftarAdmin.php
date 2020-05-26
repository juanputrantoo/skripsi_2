<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary mt-auto mb-auto">Daftar Admin</h6>
        <button class="btn btn-info" data-toggle="modal" data-target="#modal-tambah-admin"><i class="fas fa-plus"></i></button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered m-auto w-75" id="dataTable" cellspacing="0" style="width: 50%;">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Username</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($admin as $adm) : ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $adm['username']; ?></td>
                            <td>
                                <a class="" href="" data-toggle="modal" data-target="#modal-delete-admin<?php echo $adm['id'];?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <div class="modal fade" id="modal-delete-admin<?php echo $adm['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <form method="POST" action="<?php echo base_url('admin/daftarAdmin/delete/') . $adm['id']; ?>">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body pb-0">
                                            <h5>Anda yakin untuk <strong>menghapus</strong> admin <strong><?php echo $adm['username'];?></strong></h5>
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
                    <div class="modal fade" id="modal-tambah-admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form method="POST" action="<?php echo base_url('admin/daftarAdmin/tambah'); ?>">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header pb-0">
                                        <h5>Tambah Admin</h5>
                                    </div>
                                    <div class="modal-body pb-0 m-2">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                        <input class="btn btn-primary" type="submit" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</div>