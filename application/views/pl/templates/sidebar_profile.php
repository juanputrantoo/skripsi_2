<div class="content">
    <div class="card rounded-0 sidebar_profile">
        <div class="card-body m-0 p-0">
            <div class="list-group">
                <a href="<?php echo base_url('pl/profileDiri/' . $this->session->userdata('id')); ?>" class="list-group-item list-group-item-action shadow <?php if ($this->uri->segment(2) == "profileDiri") {
                                                                                                                                                                echo "active";
                                                                                                                                                            } ?>">
                    Data Diri
                </a>
                <a href="<?php echo base_url('pl/profileKategori/' . $this->session->userdata('id')); ?>" class="list-group-item list-group-item-action shadow <?php if ($this->uri->segment(2) == "profileKategori") {
                                                                                                                                                                    echo "active";
                                                                                                                                                                } ?>">
                    Data Kategori Pekerjaan
                </a>
                <a href="<?php echo base_url('pl/profilePortofolio/' . $this->session->userdata('id')); ?>" class="list-group-item list-group-item-action shadow <?php if ($this->uri->segment(2) == "profilePortofolio") {
                                                                                                                                                                        echo "active";
                                                                                                                                                                    } ?>">
                    Data Portofolio
                </a>
            </div>
        </div>
    </div>
</div>