<div class="content">
    <div class="container">
        <div class="card shadow p-3">
            <form method="POST" action="<?php echo base_url('tempPL/createPekerjaan/' . $this->session->userdata('id')); ?>" enctype="multipart/form-data">
                <div class="card p-3 m-3">
                    <div class="row mx-auto">
                        <div class="col-md-6 my-auto text-center">
                            <h5><b>Pilih Kategori Pekerjaan</b></h5>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="card shadow-none" style="border: 1px solid #54a0ff">
                                            <div class="card-header text-center border-bottom-0">
                                                <p class="mb-0">Hallo, <strong><?php echo $detailPL['namaLengkap']; ?></strong>.</p>
                                                <p class="mb-0">Harap pilih kategori pekerjaan sesuai dengan deskripsi yang sudah kamu buat sebelumnya.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group my-auto">
                                        <select id="select-kategori" multiple class="form-control select-kategori selectpicker" name="select-kategori[]" onchange=showInputHarga(this) required>
                                            <?php foreach ($kategoriPekerjaan as $kategori) : ?>
                                                <option value="<?php echo $kategori->id; ?>"><?php echo $kategori->nama; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <hr>
                                    <p class="m-3 text-center">Masukkan Harga Masing-Masing Kategori</p>
                                    <hr>
                                    <div class="form-group p-2 mt-2" id="div-harga" style="border:  1px solid lightgray;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-3 m-3">
                    <div class="row mx-auto">
                        <div class="col-md-6 my-auto text-center">
                            <h5><b>Upload Portofolio</b></h5>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="card shadow-none" style="border: 1px solid #54a0ff">
                                            <div class="card-header text-center border-bottom-0">
                                                <p class="mb-0">Lalu kamu harus meng-upload portofolio (hasil karya) kamu, minimal 1 terhadap masing-masing kategori pekerjaan yang kamu pilih.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-auto">
                                        <input type="file" name="porto[]" multiple="multiple" id="porto" required>
                                        <div class="row text-center my-5">
                                            <div class="col-md-12 text-center">
                                                <div class="gallery"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <input type="submit" class="btn btn-success mx-auto w-50" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function showInputHarga() {
        var select_kategori = document.getElementById('select-kategori');
        var kategoriPekerjaan = <?php echo json_encode($kategoriPekerjaan); ?>;
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
                input.setAttribute("placeholder", "Ex: 500.000");
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