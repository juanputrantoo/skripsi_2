<div class="content">
    <div class="row profile">
        <div class="col-md-12 profile-diri">
            <div class="card m-2">
                <div class="card-header d-flex justify-content-between bg-white">
                    <h5 class="my-auto"><strong>Informasi Profile</strong></h5>
                    <a href="<?php echo base_url('pl/profileHarga/edit/' . $this->session->userdata('id')); ?>" class="btn btn-edit"><i class="fa fa-pen mr-1"></i>Edit Harga</a>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <?php foreach ($detailPLKategori as $kategori) : ?>
                                <tr>
                                    <td>
                                        <label><small><?php echo $kategori['nama']; ?></small></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="harga" name="harga[]" value="<?php echo $kategori['harga']; ?>" readonly>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>