<nav class="navbar fixed-top navbar-expand-lg">
    <div class="container">
        <img src="<?php echo base_url('assets/image/logo.svg'); ?>">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if($this->uri->segment(1)=="home"){echo "active";}?>">
                    <a class="nav-link" href="<?php echo base_url() . 'home'; ?>">Beranda</a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(1)=="aboutus"){echo "active";}?>">
                    <a class="nav-link" href="<?php echo base_url() . 'aboutus'; ?>">Tentang Kami</a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(1)=="howitworks"){echo "active";}?>">
                    <a class="nav-link" href="<?php echo base_url() . 'howitworks'; ?>">Cara Menggunakan Yugawe</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item form-inline">
                    <a class="nav-link" href="<?php echo base_url() . 'login'; ?>"><i class="fas fa-user"></i>Login</a>
                </li>
                <li class="nav-item form-inline <?php if($this->uri->segment(1)=="signup"){echo "active";}?>">
                    <a class="nav-link" href="<?php echo base_url() . 'signup'; ?>"><i class="fas fa-user-plus"></i>Signup</a>
                </li>
            </ul>
        </div>
    </div>
</nav>