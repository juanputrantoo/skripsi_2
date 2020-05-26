<div class="content cari-pekerja">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="navbar-form navbar-left">
                            <div class="row">
                                <div class="col-md-7">
                                    <form method="POST" action="<?php echo base_url('pl/searchCariPekerja'); ?>">
                                        <div class="d-flex">
                                            <select class="form-control w-auto" id="kategori" name="kategori">
                                                <option disabled selected value>Filter berdasarkan...</option>
                                                <?php foreach ($kategori as $kat) : ?>
                                                    <option value="<?php echo $kat->id; ?>"><?php echo $kat->nama; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <i class="fas fa-window-minimize my-auto mx-3 text-secondary"></i>
                                            <input type="text" class="form-control rounded-0" placeholder="Nama, judul, deskripsi ..." name="keyword" id="keyword" autocomplete="off">
                                            <button class="btn btn-search rounded-0" type="submit" name="search">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-5 text-center my-auto shadow">
                                    <?php if ($search_kategori != '' || $search_keyword != '') : ?>
                                        Hasil pencarian:
                                        <div class="text-success">
                                            <?php if ($search_kategori != '' && $search_keyword == '') : ?>
                                                '<?php echo $search_kategori['nama']; ?>'
                                            <?php elseif ($search_kategori == '' && $search_keyword != '') : ?>
                                                '<?php echo $search_keyword; ?>'
                                            <?php elseif ($search_kategori != '' && $search_keyword != '') : ?>
                                                '<?php echo $search_kategori['nama']; ?>' & '<?php echo $search_keyword; ?>'
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="result-filter">
                        <?php if (empty($pekerja)) : ?>
                            <div class="card bg-light h-75 border-0">
                                <div class="card-body text-center d-flex" style="color: gray;">
                                    <div class="my-auto mx-auto">
                                        <span>
                                            <i class="fas fa-meh" style="font-size: 100px;"></i>
                                        </span>
                                        <p class="m-3"><b>Tidak ada</b></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php foreach ($pekerja as $pekerja) : ?>
                            <div class="row baris-pekerja border-bottom">
                                <div class="col-md-2 text-center my-auto">
                                    <img class="rounded-circle image-pekerja" src="<?php echo base_url('upload/profil/' . $pekerja->fotoProfil); ?>">
                                    <div><small><?php echo $pekerja->namaLengkap; ?></small></div>
                                </div>
                                <div class="col-md-8 my-auto">
                                    <div class="judul"><strong><?php echo $pekerja->judulPekerjaan; ?></strong></div>
                                    <p><?php echo $pekerja->deskripsiPekerjaan; ?></p>
                                </div>
                                <div class="col-md-2 text-center my-auto">
                                    <?php echo anchor('pl/cariPekerja/overview/' . $pekerja->id, '<button class="btn">Lihat Detail</button>'); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-3">
            <div class="col-md-12">
                <?php echo $pagination; ?>
            </div>
        </div>
    </div>
</div>