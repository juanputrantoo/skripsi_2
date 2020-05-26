<?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger">Username dan password salah!</div>
<?php endif; ?>
<div class="content">
    <div class="container">
        <div class="card mb-3 card-login">
            <div class="row">
                <div class="col-md-6 img-login">
                    <div class="card-header">
                        <h3>Mari bersama Yugawe</h3>
                    </div>
                    <div class="card-body">
                        <section class="carousel">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block" src="<?php echo base_url('assets/image/carousel-login/money.svg'); ?>" alt="First slide">
                                        <h4 class="caption">Harga Fix</h4>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block" src="<?php echo base_url('assets/image/carousel-login/users.svg'); ?>" alt="First slide">
                                        <h4 class="caption">Banyak Pilihan Pekerja</h4>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block" src="<?php echo base_url('assets/image/carousel-login/kontrak.svg'); ?>" alt="Third slide">
                                        <h4 class="caption">Dapatkan Kontrak</h4>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="col-md-6 form-login">
                    <div class="card-header">
                        <img src="<?php echo base_url('assets/image/logo.svg'); ?>">
                    </div>
                    <div class="card-body">
                        <h3 class="text-center text-login">Login</h3>
                        <form method="POST" action="<?php echo base_url() . 'user/login'; ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <div class="input-group" id="show_hide_password">
                                    <input class="form-control" type="password" placeholder="Password" id="inputPassword" name="password">
                                    <div class="input-group-text">
                                        <i class="fa fa-eye-slash toggle-password" aria-hidden="true" onclick="showPassword(this)"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <p>Belum punya akun?<a href="<?php echo base_url() . 'signup'; ?>"> Signup!</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>