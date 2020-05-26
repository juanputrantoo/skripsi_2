<div class="content">
    <div class="row profile">
        <div class="col-md-12 profile-diri">
            <div class="card m-2">
                <div class="card-header d-flex justify-content-between bg-white">
                    <h5 class="my-auto"><strong>Informasi Profile</strong></h5>
                    <a href="<?php echo base_url('pl/profilePortofolio/' . $this->session->userdata('id')); ?>" class="btn btn-edit"><i class="fa fa-arrow-left mr-1"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <div>
                        <h5>Tambah Portofolio disini</h5>
                        <form method="POST" action="<?php echo base_url('pl/addPortofolio'); ?>" enctype="multipart/form-data">
                            <input type="file" class="mb-3" name="porto[]" multiple="multiple" id="addPorto">
                            <input type="submit" class="btn btn-dark" id="submitPorto" name="submitPorto">
                        </form>
                        <div class="gallery"></div>
                    </div>
                    <hr>
                    <div class="gallery-admin">
                        <div class="form-group text-center">
                            <?php $images = explode(",", $detailPorto['porto']); ?>
                            <?php foreach ($images as $img) : ?>
                                <form method="POST" action="<?php echo base_url('pl/deletePortofolio/' . $img);?>" enctype="multipart/form-data">
                                    <img class="m-5 p-2" style="width: 200px; height: 200px; border: 1px solid lightgray;" src="<?php echo base_url('upload/portofolio/') . $img; ?>" />
                                    <?php if(count($images) > 1){
                                        echo '<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>';
                                    }?>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>