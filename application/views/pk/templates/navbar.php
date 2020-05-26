<?php
$id = $this->session->userdata('id');
$this->load->model('m_pemberiKerja');
$this->load->model('m_tawaranPekerjaan');
$this->load->model('m_kontrak');
$akun = $this->m_pemberiKerja->detailAkun($id);
$notifPenawaranBaru = $this->m_tawaranPekerjaan->detailByStatusPK($id, 0);
$notifPenawaranBaru = count($notifPenawaranBaru);
$notifPenawaranTerima = $this->m_tawaranPekerjaan->detailByStatusPK($id, 1);
$notifPenawaranTerima = count($notifPenawaranTerima);
$notifProsesKontrak = $this->m_kontrak->detailByStatusPK($id, 0);
$notifProsesKontrak = count($notifProsesKontrak);
?>
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
                    <a class="nav-link" href="<?php echo base_url() . 'pk/home'; ?>">Beranda</a>
                </li>
                <li class="nav-item <?php if ($this->uri->segment(2) == "cariPekerja" || $this->uri->segment(2) == "searchCariPekerja") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="<?php echo base_url() . 'pk/cariPekerja'; ?>">Cari Pekerja</a>
                </li>
                <li class="nav-item dropright <?php if ($this->uri->segment(3) == "baru" || $this->uri->segment(3) == "terima" || $this->uri->segment(3) == "kontrak") {
                                                    echo "active";
                                                } ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Penawaran Pekerjaan
                        <?php if ($notifPenawaranBaru > 0 || $notifPenawaranTerima > 0 || $notifProsesKontrak > 0) : ?>
                            <i class="fas fa-bell notification-navbar"></i>
                        <?php endif; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-dark <?php if ($this->uri->segment(3) == "baru") {
                                                                echo "active";
                                                            } ?>" href="<?php echo base_url() . 'pk/penawaran/baru'; ?>"><i class="fas fa-paper-plane mr-2"></i>
                            Baru Diajukan
                            <?php if ($notifPenawaranBaru > 0) : ?>
                                <span class="notification" align="center">
                                    <b><?php echo $notifPenawaranBaru; ?></b>
                                </span>
                            <?php endif; ?>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-dark <?php if ($this->uri->segment(3) == "terima") {
                                                                echo "active";
                                                            } ?>" href="<?php echo base_url() . 'pk/penawaran/terima'; ?>"><i class="fas fa-clipboard-check mr-2"></i>
                            Diterima
                            <?php if ($notifPenawaranTerima > 0) : ?>
                                <span class="notification" align="center">
                                    <b><?php echo $notifPenawaranTerima; ?></b>
                                </span>
                            <?php endif; ?>
                        </a>
                        <a class="dropdown-item text-dark <?php if ($this->uri->segment(3) == "kontrak") {
                                                                echo "active";
                                                            } ?>" href="<?php echo base_url() . 'pk/penawaran/kontrak'; ?>"><i class="fas fa-file-contract mr-2"></i>
                            Proses Kontrak
                            <?php if ($notifProsesKontrak > 0) : ?>
                                <span class="notification" align="center">
                                    <b><?php echo $notifProsesKontrak; ?></b>
                                </span>
                            <?php endif; ?>
                        </a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown no-arrow <?php if ($this->uri->segment(2) == "profile" || $this->uri->segment(2) == "riwayatPenawaran" || $this->uri->segment(2) == "riwayatKontrak") {
                                                            echo "active";
                                                        } ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-none d-lg-inline text-gray-600"><strong><?php echo $akun['email']; ?></strong></span>
                        <img class="img-profile rounded-circle" src="<?php echo base_url('upload/profil/' . $akun['fotoProfil']); ?>" style="width: 30px; height: 30px; margin-right: 0;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item text-dark <?php if ($this->uri->segment(2) == "profile") {
                                                                echo "active";
                                                            } ?>" href="<?php echo base_url('pk/profile/' . $this->session->userdata("id")); ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-dark <?php if ($this->uri->segment(2) == "riwayatPenawaran") {
                                                                echo "active";
                                                            } ?>" href="<?php echo base_url('pk/riwayatPenawaran/' . $this->session->userdata('id')); ?>">
                            <i class="fas fa-table fa-sm fa-fw mr-2 text-gray-400"></i>
                            Riwayat Penawaran
                        </a>
                        <a class="dropdown-item text-dark <?php if ($this->uri->segment(2) == "riwayatKontrak") {
                                                                echo "active";
                                                            } ?>" href="<?php echo base_url('pk/riwayatKontrak/' . $this->session->userdata('id')); ?>">
                            <i class="fas fa-file-contract fa-sm fa-fw mr-2 text-gray-400"></i>
                            Riwayat Kontrak
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