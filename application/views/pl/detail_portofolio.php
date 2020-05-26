<div class="content detail-pekerja">
    <div class="container detail-portofolio">
        <div class="card shadow detail-card">
            <div class="card-body bg-light">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <?php $images = explode(",", $detailPorto['porto']); ?>
                        <?php foreach ($images as $img) : ?>
                            <div class="modal fade" id="modal-image-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body mb-0 p-0">
                                            <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                                                <iframe class="embed-responsive-item" src="<?php echo base_url('upload/portofolio/') . $img; ?>" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img class="image-porto" data-toggle="modal" data-target="#modal-image-view" src="<?php echo base_url('upload/portofolio/') . $img; ?>">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>