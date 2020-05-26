<nav class="navbar fixed-top navbar-expand-lg">
    <div class="container">
        <img src="<?php echo base_url('assets/image/logo.svg'); ?>">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if ($this->uri->segment(2) == "home") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="<?php echo base_url() . 'tempPL/home'; ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Lihat Pekerja Lain</a>
                </li>
                <li class="nav-item dropright">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tawaran Pekerjaan
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown no-arrow <?php if ($this->uri->segment(2) == "profileDiri" || $this->uri->segment(2) == "profileKategori" || $this->uri->segment(2) == "profileHarga" || $this->uri->segment(2) == "profilePortofolio") {
                                                            echo "active";
                                                        } ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-none d-lg-inline text-gray-600"><strong><?php echo $this->session->userdata("email"); ?></strong></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item text-dark" href="">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-dark" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-fw mr-2 text-gray-800"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 2000;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your
                current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?php echo base_url() . 'logout'; ?>">Logout</a>
            </div>
        </div>
    </div>
</div>