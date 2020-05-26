<div class="content detail-pekerja">
    <div class="container detail-portofolio">
        <div class="card shadow detail-card">
            <div class="card-body bg-light">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <?php $images = explode(",", $detailPorto['porto']); ?>
                        <?php foreach ($images as $img) : ?>
                            <img class="image-porto" src="<?php echo base_url('upload/portofolio/') . $img; ?>">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>