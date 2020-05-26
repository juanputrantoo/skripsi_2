<div class="content detail-pekerja">
    <div class="container detail-portofolio">
        <div class="card shadow detail-card">
            <div class="card-body bg-light">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (count($komentar) < 1) {
                            echo '<div class="card bg-light h-75 border-0">
                            <div class="card-body text-center d-flex" style="color: gray;">
                                <div class="my-auto mx-auto">
                                    <span>
                                        <i class="fas fa-comment-slash" style="font-size: 100px;"></i>
                                    </span>
                                    <p class="m-3"><b>Belum ada komentar</b></p>
                                </div>
                            </div>
                        </div>';
                        } ?>
                        <?php foreach ($komentar as $komen) : ?>
                            <?php if ($komen['komentar'] != null) {
                                echo '<div class="card mt-2 mb-2 p-1">
                                <div class="row">
                                    <div class="col-md-3 my-auto text-center">
                                        <img class="rounded-circle" style="width: 50px; height: 50px;" src="' . base_url('upload/profil/' . $komen['fotoProfilPK']) . '">
                                    </div>
                                    <div class="col-md-9" style="border-left: 1px solid lightgrey;">
                                        <p class="m-2"><b>' . $komen['namaPK'] . '</b></p>
                                        <hr class="m-1">
                                        <p class="m-2">' . $komen['komentar'] . '</p>
                                    </div>
                                </div>
                            </div>';
                            } ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>