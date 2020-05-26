<div class="content">
    <div class="row profile">
        <div class="col-md-12 profile-diri">
            <div class="card m-2">
                <div class="card-header d-flex justify-content-between bg-white">
                    <h5 class="my-auto"><strong>Informasi Profile</strong></h5>
                    <a href="<?php echo base_url('pl/profileHarga/' . $this->session->userdata('id')); ?>" class="btn btn-edit"><i class="fa fa-arrow-left mr-1"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo base_url('pl/editHarga'); ?>" enctype="multipart/form-data">
                        <table class="table table-borderless">
                            <tbody>
                                <?php foreach ($detailPLKategori as $kategori) : ?>
                                    <tr>
                                        <td>
                                            <label><small><?php echo $kategori['nama']; ?></small></label>
                                            <input type="text" class="form-control harga" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan harga" name="harga[]" id="harga" value="<?php echo $kategori['harga']; ?>" required>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <input type="submit" class="btn btn-secondary" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>