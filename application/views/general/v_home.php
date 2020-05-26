<div class="content">
    <?php if (isset($_GET['msg'])) : ?>
        <div class="d-flex">
            <div class="alert-sukses">
                <p>Signup biodata diri Anda berhasil!<br>Silahkan tunggu maksimal 24 jam untuk konfirmasi selanjutnya.<br>Terima Kasih.</p>
            </div>
        </div>
    <?php endif; ?>
    <section class="carousel">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo base_url('assets/image/carousel/car1.jpg'); ?>" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url('assets/image/carousel/car2.jpg'); ?>" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url('assets/image/carousel/car3.jpg'); ?>" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <h1 class="judul">Simple, Bukan?</h1>
    <section class="langkah">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="icon-langkah">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Daftar Akun</h5>
                        <p class="card-text">
                            Daftarkan akun Anda dengan kelengkapan yang sudah ditentukan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="icon-langkah">
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Cari Pekerja Lepas</h5>
                        <p class="card-text">
                            Cari Pekerja Lepas yang ingin Anda pekerjakan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="icon-langkah">
                        <i class="fa fa-file-contract"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Dapatkan Kontrak</h5>
                        <p class="card-text">
                            Dapatkan kontrak dengan pekerja yang Anda pekerjakan ketika semua proses sudah selesai.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>