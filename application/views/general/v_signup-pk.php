<div class="content signup-pk">
    <div class="container">
        <?php if ($this->session->flashdata('captcha_msg')) : ?>
            <div class="alert alert-danger">Captcha belum diisi atau Email Salah!</div>
        <?php endif; ?>
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 judul-signup">
                        <h3 class="text-center text-login" style="color:#54a0ff">Signup</h3>
                        <h5 class="text-center text-login">sebagai Pemberi Kerja</h5>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo base_url('assets/image/logo.svg'); ?>">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url() . 'signup/pemberiKerja'; ?>" enctype="multipart/form-data">
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
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" required>
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
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleFormControlTextarea1">Foto Scan Tanda Tangan</label><br>
                                <img id="imgTTD" src="<?php echo base_url('assets/image/sign-up/upload-here.svg'); ?>" style="max-width: 150px;">
                                <input class="btn btn-upload" type="file" name="fotoTTD" onchange="showImageTTD(this);" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleFormControlTextarea1">Foto Diri</label><br>
                                <img id="imgProfil" src="<?php echo base_url('assets/image/sign-up/upload-here.svg'); ?>" style="max-width: 150px;">
                                <input class="btn btn-upload" type="file" name="fotoProfil" onchange="showImageProfil(this);" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <div class="m-auto">
                            <?php echo $recaptcha_html; ?>
                            <?php echo form_error('g-recaptcha-response'); ?>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>