<div class="content">
    <div class="row profile">
        <div class="col-md-12 profile-diri">
            <div class="card m-2">
                <div class="card-header d-flex justify-content-between bg-white">
                    <h5 class="my-auto"><strong>Informasi Profile</strong></h5>
                    <a href="<?php echo base_url('pl/profilePortofolio/edit/' . $this->session->userdata('id')); ?>" class="btn btn-edit"><i class="fa fa-pen mr-1"></i>Edit Porto</a>
                </div>
                <div class="card-body">
                    <div class="gallery-admin">
                        <div class="form-group text-center">
                            <?php $images = explode(",", $detailPorto['porto']); ?>
                            <?php foreach ($images as $img) : ?>
                                <img class="m-5 p-2" style="width: 200px; height: 200px; border: 1px solid lightgray;" src="<?php echo base_url('upload/portofolio/') . $img; ?>" />
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>