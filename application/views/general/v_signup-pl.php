<div class="content signup-pl">
    <div class="container">
        <?php if ($this->session->flashdata('captcha_msg')) : ?>
            <div class="alert alert-danger">Captcha belum diisi atau Email Salah!</div>
        <?php endif; ?>
        <form method="post" action="<?php echo base_url() . 'signup/pekerjaLepas'; ?>" enctype="multipart/form-data">
            <div class="card w-100">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 judul-signup">
                            <h3 class="text-center text-login" style="color:#54a0ff">Signup</h3>
                            <h5 class="text-center text-login">sebagai Pekerja Lepas</h5>
                        </div>
                        <div class="col-md-4">
                            <img src="<?php echo base_url('assets/image/logo.svg'); ?>">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center judul-biodata">
                            <h5><strong>Biodata Diri</strong></h5>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" name="namaLengkap" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor KTP</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor KTP" name="nomorKTP" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" name="email" required>
                                        <span id="email_result"></span>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputPassword1">Password</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input class="form-control" type="password" placeholder="Password" id="inputPassword" name="password" required>
                                            <div class="input-group-text">
                                                <i class="fa fa-eye-slash toggle-password" aria-hidden="true" onclick="showPassword(this)"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Telepon</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0818XXXXXX" name="nomorTelepon" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Media Sosial <small>(instagram,
                                        facebook, twitter)</small></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Media Sosial" name="mediaSosial" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat Tinggal</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" required></textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleFormControlTextarea1">Foto Scan Tanda Tangan</label><br>
                                        <img id="imgTTD" src="<?php echo base_url('assets/image/sign-up/upload-here.svg'); ?>" style="width: 150px;">
                                        <input class="" type="file" name="fotoTTD" onchange="showImageTTD(this);" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleFormControlTextarea1">Foto Diri</label><br>
                                        <img id="imgProfil" src="<?php echo base_url('assets/image/sign-up/upload-here.svg'); ?>" style="width: 150px;">
                                        <input class="" type="file" name="fotoProfil" onchange="showImageProfil(this);" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 text-center">
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul Pekerjaan</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ex: Design disini Murah Meriah loh! Buruan Cek!" name="judulPekerjaan" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Gambarkan Diri Kamu sebagai Pekerja Lepas Sebaik Mungkin</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsiPekerjaan" required></textarea>
                            </div>
                            <div class="form-group d-flex">
                                <div class="m-auto">
                                    <?php echo $recaptcha_html; ?>
                                    <?php echo form_error('g-recaptcha-response'); ?>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary submit ml-auto mr-auto" data-toggle="modal" data-target="#modal-yakin">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-yakin" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body pb-0">
                            <h5>Anda yakin biodata diri sudah lengkap dan benar?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cek Kembali</button>
                            <input class="btn btn-primary" type="submit" value="Ya">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>