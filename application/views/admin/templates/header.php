<?php
$pk = $this->m_pemberiKerja->akun(0);
$pl_biodata = $this->m_pekerjaLepas->akun(0, 0);
$pl_pekerjaan = $this->m_pekerjaLepas->akun(1, 1);
$notif_pk = count($pk);
$notif_pl_biodata = count($pl_biodata);
$notif_pl_pekerjaan = count($pl_pekerjaan);
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $judul; ?></title>
    <link href="<?php echo base_url('assets/adminStyle/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?php echo base_url('assets/adminStyle/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/adminStyle/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/adminStyle/css/style.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap-datepicker3.css'); ?>" />
    <script src="<?php echo base_url('assets/adminStyle/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/adminStyle/js/customJS.js'); ?>"></script>
    <script src="<?php echo base_url('assets/adminStyle/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/adminStyle/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/adminStyle/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/adminStyle/js/sb-admin-2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-datepicker.min.js'); ?>"></script>
</head>
<body id="page-top" onload="startTime()">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">Admin YUGAWE</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item <?php if ($this->uri->segment(2) == "dashboard") {
                                    echo "active";
                                } ?>">
                <a class="nav-link" href="<?php echo base_url() . 'admin/dashboard'; ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Pengajuan Akun
            </div>
            <li class="nav-item <?php if ($this->uri->segment(2) == "pengajuanAkunPK") {
                                    echo "active";
                                } ?>">
                <a class="nav-link" href="<?php echo base_url() . 'admin/pengajuanAkunPK'; ?>">
                    <i class="fas fa-user-plus"></i>
                    <span>Pemberi Kerja</span>
                    <?php if ($notif_pk != 0) : ?>
                        <span class="badge badge-danger badge-counter position-static m-3">
                            <?php echo $notif_pk; ?>
                        </span>
                    <?php endif; ?>
                </a>
            </li>
            <li class="nav-item <?php if ($this->uri->segment(2) == "pengajuanAkunBiodataPL" || $this->uri->segment(2) == "pengajuanAkunPekerjaanPL") {
                                    echo "active";
                                } ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user-plus"></i>
                    <span>Pekerja Lepas</span>
                    <?php if ($notif_pl_biodata != 0 || $notif_pl_pekerjaan != 0) : ?>
                        <span class="badge badge-danger badge-counter position-static m-3">
                            <i class="fas fa-ellipsis-h m-0 text-white"></i>
                        </span>
                    <?php endif; ?>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if ($this->uri->segment(2) == "pengajuanAkunBiodataPL") {
                                                    echo "active";
                                                } ?>" href="<?php echo base_url() . 'admin/pengajuanAkunBiodataPL'; ?>">Biodata Diri
                            <?php if ($notif_pl_biodata != 0) : ?>
                                <span class="badge badge-danger badge-counter position-static">
                                    <?php echo $notif_pl_biodata; ?>
                                </span>
                            <?php endif; ?>
                        </a>
                        <a class="collapse-item <?php if ($this->uri->segment(2) == "pengajuanAkunPekerjaanPL") {
                                                    echo "active";
                                                } ?>" href="<?php echo base_url() . 'admin/pengajuanAkunPekerjaanPL'; ?>">Mengenai Pekerjaan
                            <?php if ($notif_pl_pekerjaan != 0) : ?>
                                <span class="badge badge-danger badge-counter position-static">
                                    <?php echo $notif_pl_pekerjaan; ?>
                                </span>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Akun
            </div>
            <li class="nav-item <?php if ($this->uri->segment(2) == "validAkunPK" || $this->uri->segment(2) == "validAkunPL") {
                                    echo "active";
                                } ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user"></i>
                    <span>Daftar Akun</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sebagai:</h6>
                        <a class="collapse-item <?php if ($this->uri->segment(2) == "validAkunPK") {
                                                    echo "active";
                                                } ?>" href="<?php echo base_url() . 'admin/validAkunPK'; ?>">Pemberi Kerja</a>
                        <a class="collapse-item <?php if ($this->uri->segment(2) == "validAkunPL") {
                                                    echo "active";
                                                } ?>" href="<?php echo base_url() . 'admin/validAkunPL'; ?>">Pekerja Lepas</a>
                    </div>
                </div>
            </li>
            <li class="nav-item <?php if ($this->uri->segment(2) == "suspendAkunPL" || $this->uri->segment(2) == "suspendAkunPK") {
                                    echo "active";
                                } ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#suspend" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user-plus"></i>
                    <span>Akun Suspend</span>
                </a>
                <div id="suspend" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if ($this->uri->segment(2) == "suspendAkunPK") {
                                                    echo "active";
                                                } ?>" href="<?php echo base_url() . 'admin/suspendAkunPK'; ?>">Pemberi Kerja</a>
                        <a class="collapse-item <?php if ($this->uri->segment(2) == "suspendAkunPL") {
                                                    echo "active";
                                                } ?>" href="<?php echo base_url() . 'admin/suspendAkunPL'; ?>">Pekerja Lepas</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Addons
            </div>
            <li class="nav-item <?php if ($this->uri->segment(2) == "kategoriPekerjaan") {
                                    echo "active";
                                } ?>">
                <a class="nav-link" href="<?php echo base_url() . 'admin/kategoriPekerjaan'; ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Kategori Pekerjaan</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Transaksi
            </div>
            <li class="nav-item <?php if ($this->uri->segment(2) == "penawaranPekerjaan") {
                                    echo "active";
                                } ?>">
                <a class="nav-link" href="<?php echo base_url() . 'admin/penawaranPekerjaan'; ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Penawaran Pekerjaan</span></a>
            </li>
            <li class="nav-item <?php if ($this->uri->segment(2) == "kontrakPekerjaan") {
                                    echo "active";
                                } ?>">
                <a class="nav-link" href="<?php echo base_url() . 'admin/kontrakPekerjaan'; ?>">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Kontrak Pekerjaan</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="input-group">
                        <div id="txt"></div>
                    </div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600"><?php echo $this->session->userdata("nama"); ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item <?php if ($this->uri->segment(2) == "daftarAdmin") {
                                                            echo "active";
                                                        } ?>" href="<?php echo base_url('admin/daftarAdmin'); ?>">
                                    <i class="fas fa-list-alt fa-md fa-fw mr-2 text-gray-800"></i>
                                    Daftar Admin
                                </a>
                                <a class="dropdown-item <?php if ($this->uri->segment(2) == "editAdmin") {
                                                            echo "active";
                                                        } ?>" href="<?php echo base_url('admin/editAdmin/' . $this->session->userdata('id')); ?>">
                                    <i class="fas fa-pen fa-md fa-fw mr-2 text-gray-800"></i>
                                    Edit
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-md fa-fw mr-2 text-gray-800"></i>
                                    Logout
                                </a>
                            </div>
                            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">