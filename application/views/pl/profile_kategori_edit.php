<div class="content">
    <div class="row profile">
        <div class="col-md-12 profile-diri">
            <div class="card m-2">
                <div class="card-header d-flex justify-content-between bg-white">
                    <h5 class="my-auto"><strong>Informasi Profile</strong></h5>
                    <a href="<?php echo base_url('pl/profileKategori/' . $this->session->userdata('id')); ?>" class="btn btn-edit"><i class="fa fa-pen mr-1"></i>Kembali</a>
                </div>
                <form method="POST" action="<?php echo base_url('pl/tambahKategori'); ?>" enctype="multipart/form-data">
                    <div class="modal fade" id="addKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kategori</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <select id="select-kategori" multiple class="form-control select-kategori selectpicker" name="select-kategori[]" onchange=showInputHarga(this)>
                                            <?php foreach ($kategoriFiltered as $kategori) : ?>
                                                <option value="<?php echo $kategori->id; ?>"><?php echo $kategori->nama; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group p-2 mt-2" id="div-harga" style="border:  1px solid lightgray;"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <button type="button" class="btn btn-primary rounded-circle mr-4 shadow" data-toggle="modal" data-target="#addKategori" style="position: absolute; right: 25px; height: 50px; width: 50px;">
                        <i class="fas fa-plus"></i>
                    </button>
                    <form method="POST" action="<?php echo base_url('pl/editHarga'); ?>" enctype="multipart/form-data">
                        <?php foreach ($detailPLKategori as $kat) : ?>
                            <div class="card p-2 m-3 shadow w-50 mx-auto">
                                <div class="card-header d-flex justify-content-between bg-white border-0 p-1">
                                    <label class="my-auto"><?php echo $kat['namaKategori']; ?></label>
                                </div>
                                <div class="card-body p-0">
                                    <div class="form-group">
                                        <div class="input-group" id="show_hide_password">
                                            <div class="input-group-text">
                                                <p class="mb-0"><strong>Rp</strong></p>
                                            </div>
                                            <input type="text" class="form-control harga" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan harga" name="harga[]" id="harga" value="<?php echo $kat['hargaKategori']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <input type="submit" class="btn btn-dark d-flex mx-auto" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showInputHarga() {
        var select_kategori = document.getElementById('select-kategori');
        var kategoriPekerjaan = <?php echo json_encode($kategoriFiltered); ?>;
        var div_harga = document.getElementById("div-harga");
        while (div_harga.hasChildNodes()) {
            div_harga.removeChild(div_harga.childNodes[0]);
        }
        for (var i = 0; i < kategoriPekerjaan.length; i++) {
            if (select_kategori.options[i].selected) {
                var label = document.createElement("LABEL");
                label.setAttribute("class", "mt-2")
                label.innerHTML = kategoriPekerjaan[i]['nama'];
                div_harga.appendChild(label);
                var input = document.createElement("INPUT");
                input.setAttribute("type", "text");
                input.setAttribute("class", "form-control mb-2 harga");
                input.setAttribute("id", "harga");
                input.setAttribute("name", "harga[]");
                input.setAttribute("placeholder", "Masukkan harga");
                input.setAttribute("required", "required");
                div_harga.appendChild(input);
                addMask();
            }
        }
    }
    function addMask() {
        $('.harga').mask('000.000.000', {
            reverse: true
        });
    }
</script>