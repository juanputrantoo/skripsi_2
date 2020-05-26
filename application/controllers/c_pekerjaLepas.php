<?php

class c_pekerjaLepas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_kategori');
        $this->load->model('m_kategoriPekerjaan');
        $this->load->model('m_kontrak');
        $this->load->model('m_pekerjaLepas');
        $this->load->model('m_pemberiKerja');
        $this->load->model('m_portofolio');
        $this->load->model('m_tawaranPekerjaan');
        if ($this->session->userdata('keterangan') != "loginPL") {
            redirect('login');
        }
    }

    public function home()
    {
        $data['judul'] = 'Yugawe';
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/home');
        $this->load->view('pl/templates/footer', $data);
    }

    public function profile_diri($id)
    {
        $data['judul'] = 'Yugawe';
        $data['detailPL'] = $this->m_pekerjaLepas->detailAkun($id);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/templates/sidebar_profile');
        $this->load->view('pl/profile_diri', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function edit_foto_profil($id)
    {
        $id = $this->session->userdata('id');
        $data = array(
            'fotoProfil' => $this->uploadFotoProfil()
        );
        $this->m_pekerjaLepas->editAkun($id, $data);
        redirect('pl/profileDiri/' . $id, 'refresh');
    }

    function uploadFotoProfil()
    {
        $this->id = $this->session->userdata('id');
        $this->m_pekerjaLepas->deleteFotoProfil($this->id);
        $config['upload_path']          = './upload/profil/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $this->id;
        $config['overwrite']            = true;
        $config['max_size']             = 10240;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('fotoProfil')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
        return "default.jpg";
    }

    public function profile_diri_edit($id)
    {
        $data['judul'] = 'Yugawe';
        $data['detailPL'] = $this->m_pekerjaLepas->detailAkun($id);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/templates/sidebar_profile');
        $this->load->view('pl/profile_diri_edit', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function edit_diri($id)
    {
        $this->load->library('session');
        $id = $this->session->userdata('id');
        $namaLengkap = $this->input->post('namaLengkap');
        $email = $this->input->post('email');
        $nomorTelepon = $this->input->post('nomorTelepon');
        $mediaSosial = $this->input->post('mediaSosial');
        $alamat = $this->input->post('alamat');
        $judulPekerjaan = $this->input->post('judulPekerjaan');
        $deskripisiPekerjaan = $this->input->post('deskripsiPekerjaan');
        $data = array(
            'namaLengkap' => $namaLengkap,
            'email' => $email,
            'nomorTelepon' => $nomorTelepon,
            'mediaSosial' => $mediaSosial,
            'alamat' => $alamat,
            'judulPekerjaan' => $judulPekerjaan,
            'deskripsiPekerjaan' => $deskripisiPekerjaan
        );
        $this->m_pekerjaLepas->editAkun($id, $data);
        redirect('pl/profileDiri/' . $id, 'refresh');
    }

    public function profile_kategori($id)
    {
        $data['judul'] = 'Yugawe';
        $data['detailPLKategori'] = $this->m_kategoriPekerjaan->detail($id);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/templates/sidebar_profile');
        $this->load->view('pl/profile_kategori', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function profile_kategori_edit($id)
    {
        $data['judul'] = 'Yugawe';
        $data['kategoriPekerjaan'] = $this->m_kategori->kategoriPekerjaan();
        $data['detailPLKategori'] = $this->m_kategoriPekerjaan->detail($id);
        $det = $this->m_kategoriPekerjaan->getID($id);
        $data['kategoriFiltered'] = array();
        foreach ($data['kategoriPekerjaan'] as $row) {
            if (!in_array($row->id, array_column($det, 'id'))) {
                array_push($data['kategoriFiltered'], $row);
            } else {
                continue;
            }
        }
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/templates/sidebar_profile');
        $this->load->view('pl/profile_kategori_edit', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function delete_kategori($id)
    {
        $this->m_kategoriPekerjaan->deleteSingle($id);
        $idPekerjaLepas = $this->session->userdata('id');
        redirect('pl/profileKategori/' . $idPekerjaLepas, 'refresh');
    }

    public function edit_harga()
    {
        $id = $this->session->userdata('id');
        $this->m_kategoriPekerjaan->updateHarga($id);
        redirect('pl/profileKategori/' . $id, 'refresh');
    }

    public function tambah_kategori()
    {
        $id = $this->session->userdata('id');
        $idKategori = $this->input->post('select-kategori');
        $harga = $this->input->post('harga');
        $this->m_kategoriPekerjaan->insert($id, $idKategori, $harga);
        redirect('pl/profileKategori/' . $id, 'refresh');
    }

    public function profile_harga($id)
    {
        $data['judul'] = 'Yugawe';
        $data['detailPLKategori'] = $this->m_kategoriPekerjaan->detail($id);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/templates/sidebar_profile');
        $this->load->view('pl/profile_harga', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function profile_harga_edit($id)
    {
        $data['judul'] = 'Yugawe';
        $data['detailPLKategori'] = $this->m_kategoriPekerjaan->detail($id);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/templates/sidebar_profile');
        $this->load->view('pl/profile_harga_edit', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function profile_portofolio($id)
    {
        $data['judul'] = 'Yugawe';
        $data['detailPorto'] = $this->m_portofolio->detail($id);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/templates/sidebar_profile');
        $this->load->view('pl/profile_portofolio', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function profile_portofolio_edit($id)
    {
        $data['judul'] = 'Yugawe';
        $data['detailPorto'] = $this->m_portofolio->detail($id);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/templates/sidebar_profile');
        $this->load->view('pl/profile_portofolio_edit', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function add_portofolio()
    {
        $this->load->library('upload');
        $idPekerjaLepas = $this->session->userdata('id');
        $this->id = uniqid();
        $dataInfo = array();
        $files = $_FILES;
        $cpt = count($_FILES['porto']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['porto']['name'] = $files['porto']['name'][$i];
            $_FILES['porto']['type'] = $files['porto']['type'][$i];
            $_FILES['porto']['tmp_name'] = $files['porto']['tmp_name'][$i];
            $_FILES['porto']['error'] = $files['porto']['error'][$i];
            $_FILES['porto']['size'] = $files['porto']['size'][$i];
            $this->upload->initialize($this->uploadFotoPortofolio());
            $this->upload->do_upload('porto');
            $dataInfo[] = $this->upload->data();
            $data = array(
                'nama' => $dataInfo[$i]['file_name'],
                'idPekerjaLepas' => $idPekerjaLepas
            );
            $this->m_portofolio->insert($data);
        }
        redirect('pl/profilePortofolio/' . $idPekerjaLepas, 'refresh');
    }

    function uploadFotoPortofolio()
    {
        $this->id = uniqid();
        $config = array();
        $config['upload_path']          = './upload/portofolio';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $this->id;
        $config['overwrite']            = false;
        $config['max_size']             = 10240;
        return $config;
    }

    function delete_portofolio($img)
    {
        $id = $this->session->userdata('id');
        $this->m_portofolio->deleteSingle($img);
        redirect('pl/profilePortofolio/' . $id, 'refresh');
    }

    public function riwayatPenawaran($id)
    {
        $data['judul'] = 'Yugawe';
        $data['detail'] = $this->m_tawaranPekerjaan->detailFromPL($id);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/riwayat_penawaran', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function cariTanggalPenawaran($id)
    {
        $tanggalDari = $this->input->post('tanggal_dari');
        $tanggalHingga = $this->input->post('tanggal_hingga');
        $tanggalDariNew = date("Y-m-d", strtotime($tanggalDari));
        $tanggalHinggaNew = date("Y-m-d", strtotime($tanggalHingga));
        $data['judul'] = 'Yugawe';
        $data['detail'] = $this->m_tawaranPekerjaan->getRentangTanggalPL($id, $tanggalDariNew, $tanggalHinggaNew);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/riwayat_penawaran', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function cariTanggalKontrak($id)
    {
        $tanggalDari = $this->input->post('tanggal_dari');
        $tanggalHingga = $this->input->post('tanggal_hingga');
        $tanggalDariNew = date("Y-m-d", strtotime($tanggalDari));
        $tanggalHinggaNew = date("Y-m-d", strtotime($tanggalHingga));
        $data['judul'] = 'Yugawe';
        $data['detail'] = $this->m_kontrak->getRentangTanggalPL($id, $tanggalDariNew, $tanggalHinggaNew);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/riwayat_kontrak', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function riwayatKontrak($id)
    {
        $data['judul'] = 'Yugawe';
        $data['detail'] = $this->m_kontrak->detailFromPL($id);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/riwayat_kontrak', $data);
        $this->load->view('pl/templates/footer', $data);
    }


    public function cariPekerja()
    {
        $this->load->library('pagination');
        $data['judul'] = 'Yugawe';
        $data['kategori'] = $this->m_kategori->kategoriPekerjaan();
        $jumlah = $this->m_pekerjaLepas->jumlahAkunValid();
        $config = array();
        $config['base_url'] = base_url() . 'pl/cariPekerja/';
        $config['total_rows'] = $jumlah;
        $config['per_page'] = 3;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        $data['pekerja'] = $this->m_pekerjaLepas->paginationAkunValid($config["per_page"], $this->uri->segment(3));
        $data['pagination'] = $this->pagination->create_links();
        $data['search_kategori'] = '';
        $data['search_keyword'] = '';
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/cariPekerja', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function searchCariPekerja()
    {
        $this->load->library('pagination');
        $search_kategori = $this->input->post('kategori');
        $search_keyword = $this->input->post('keyword');
        $data['judul'] = 'Yugawe';
        $data['search_kategori'] = $this->m_kategori->getNamaByID($search_kategori);
        $data['search_keyword'] = $search_keyword;
        $data['pekerja'] = $this->m_kategoriPekerjaan->getFilter($search_kategori, $search_keyword);
        $data['kategori'] = $this->m_kategori->kategoriPekerjaan();
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/cariPekerja', $data);
        $this->load->view('pl/templates/footer', $data);
    }


    public function detailOverview($id)
    {
        $data['judul'] = 'Yugawe';
        $data['detailPekerja'] = $this->m_pekerjaLepas->detailAkun($id);
        $data['detailPekerjaKategori'] = $this->m_kategoriPekerjaan->detail($id);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/templates/sidebar_detail', $data);
        $this->load->view('pl/detail_overview', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function detailPortofolio($id)
    {
        $data['judul'] = 'Yugawe';
        $data['detailPekerja'] = $this->m_pekerjaLepas->detailAkun($id);
        $data['detailPekerjaKategori'] = $this->m_kategoriPekerjaan->detail($id);
        $data['detailPorto'] = $this->m_portofolio->detail($id);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/templates/sidebar_detail', $data);
        $this->load->view('pl/detail_portofolio', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function detailPengalaman($id)
    {
        $data['judul'] = 'Yugawe';
        $data['detailPekerja'] = $this->m_pekerjaLepas->detailAkun($id);
        $data['detailPekerjaKategori'] = $this->m_kategoriPekerjaan->detail($id);
        $data['detailPorto'] = $this->m_portofolio->detail($id);
        $data['detailKontrak'] = $this->m_kontrak->detailByStatusPL($id, 1);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/templates/sidebar_detail', $data);
        $this->load->view('pl/detail_pengalaman', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function detailKomentar($id)
    {
        $data['judul'] = 'Yugawe';
        $data['komentar'] = $this->m_kontrak->detailByStatusPL($id, 1);
        $data['detailPekerja'] = $this->m_pekerjaLepas->detailAkun($id);
        $data['detailPekerjaKategori'] = $this->m_kategoriPekerjaan->detail($id);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/templates/sidebar_detail', $data);
        $this->load->view('pl/detail_komentar', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function tawaranMasuk()
    {
        $id = $this->session->userdata('id');
        $data['judul'] = 'Yugawe';
        $data['detail'] = $this->m_tawaranPekerjaan->detailByStatusPL($id, 0);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/tawaran_masuk', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function tawaranTerima()
    {
        $id = $this->session->userdata('id');
        $data['judul'] = 'Yugawe';
        $data['detail'] = $this->m_tawaranPekerjaan->detailByStatusPL($id, 1);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/tawaran_terima', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    public function tawaranKontrak()
    {
        $id = $this->session->userdata('id');
        $data['judul'] = 'Yugawe';
        $data['detail'] = $this->m_kontrak->detailByStatusPL($id, 0);
        $this->load->view('pl/templates/header', $data);
        $this->load->view('pl/templates/navbar', $data);
        $this->load->view('pl/tawaran_kontrak', $data);
        $this->load->view('pl/templates/footer', $data);
    }

    function tolakTawaranMasuk($id)
    {
        $data = array(
            'statusTawaran' => 2
        );
        $this->m_tawaranPekerjaan->updateStatus($data, $id);
        $emailTo = $this->m_tawaranPekerjaan->getRowID($id);
        $subject = 'Tawaran Pekerjaan-Mu ditolak!';
        $message = 'Hai ' . $emailTo['namaPK'] . ', Pekerja Lepas ' . $emailTo['namaPL'] . ' menolak pekerjaan yang kamu tawarkan:(. Yuk cari lagi Pekerja Lepas yang lain.';
        $this->sendEmail($emailTo['emailPK'], $subject, $message);
        redirect('pl/tawaran/masuk', 'refresh');
    }

    public function terimaTawaranMasuk($id)
    {
        $data = array(
            'statusTawaran' => 1
        );
        $this->m_tawaranPekerjaan->updateStatus($data, $id);
        $emailTo = $this->m_tawaranPekerjaan->getRowID($id);
        $subject = 'Tawaran Pekerjaan-Mu diterima!';
        $message = 'Hai ' . $emailTo['namaPK'] . ', Pekerja Lepas ' . $emailTo['namaPL'] . ' menerima penawaran pekerjaan-Mu. Silahkan buka web Yugawe untuk membuat Kontrak.';
        $this->sendEmail($emailTo['emailPK'], $subject, $message);
        redirect('pl/tawaran/terima', 'refresh');
    }

    public function cancelTawaran($id)
    {
        $alasan = $this->input->post('alasanBatal');
        $data = array(
            'statusTawaran' => 5,
            'alasanBatal' => $alasan
        );
        $this->m_tawaranPekerjaan->updateStatus($data, $id);
        $emailTo = $this->m_tawaranPekerjaan->getRowID($id);
        $subject = 'Tawaran Pekerjaan-Mu dibatalkan!';
        $message = 'Hai ' . $emailTo['namaPK'] . ', Pekerja Lepas ' . $emailTo['namaPL'] . ' membatalkan pekerjaan yang kamu tawarkan. Alasannya adalah sebagai berikut: "' . $alasan . '"Yuk cari lagi Pekerja Lepas yang lain.';
        $this->sendEmail($emailTo['emailPK'], $subject, $message);
        redirect('pl/tawaran/terima', 'refresh');
    }

    public function terimaKontrak($id)
    {
        $user = $this->session->userdata('id');
        $data = array(
            'statusKontrak' => 1
        );
        $this->m_kontrak->updateStatus($data, $id);
        $emailTo = $this->m_kontrak->getRowID($id);
        $subject = 'Kontrak-Mu Sudah Selesai!';
        $message = 'Hai ' . $emailTo['namaPK'] . ', Pekerja Lepas ' . $emailTo['namaPL'] . ' sudah melakukan konfirmasi kontrak. Silahkan cek web Yugawe untuk mendownload kontrak.';
        $this->sendEmail($emailTo['emailPK'], $subject, $message);
        redirect('pl/riwayatKontrak/' . $user, 'refresh');
    }

    public function cetak($idKontrak)
    {
        require_once(FCPATH . '/vendor/autoload.php');
        $idPekerjaLepas = $this->session->userdata('id');
        $data = $this->m_kontrak->getIDbyPL($idPekerjaLepas, $idKontrak);
        $html = '<!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Surat Kontrak Kerja</title>
            </head>
            <body>';
        foreach ($data as $row) {
            $html .= '<h1 style="text-align:center;"><u>Surat Kontrak Kerja</u></h1>
                    <h3 style="text-align:center;">Nomor: ' . $row['nomorKontrak'] . '</h3>
                    <hr style="color: black;">
                    <p>Yang bertanda tangan di bawah ini:</p>
                    <table style="width: 100%;">
                        <tr>
                            <td align="center" style="padding: 10px;">Nama</td>
                            <td align="left" style="padding: 10px; width: 50%;">: ' . $row['namaPK'] . '</td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 10px;">Nomor KTP</td>
                            <td align="left" style="padding: 10px; width: 50%;">: ' . $row['nomorKTPPK'] . '</td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 10px;">Email</td>
                            <td align="left" style="padding: 10px; width: 50%;">: ' . $row['emailPK'] . '</td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 10px;">Nomor Telepon</td>
                            <td align="left" style="padding: 10px; width: 50%;">: ' . $row['nomorTeleponPK'] . '</td>
                        </tr>
                    </table>
                    <p>Dalam hal ini bertindak untuk dan atas nama dirinya sendiri, yang selanjutnya disebut sebagai <b>PIHAK PERTAMA</b>.</p>
                    <table style="width: 100%;">
                        <tr>
                            <td align="center" style="padding: 10px;">Nama</td>
                            <td align="left" style="padding: 10px; width: 50%;">: ' . $row['namaPL'] . '</td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 10px;">Nomor KTP</td>
                            <td align="left" style="padding: 10px; width: 50%;">: ' . $row['nomorKTPPL'] . '</td>
                        </tr>
                        <tr style="">
                            <td align="center" style="padding: 10px; width: 50%;">Alamat</td>
                            <td align="left" style="padding: 10px; width: 50%;">: ' . $row['alamatPL'] . '</td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 10px;">Email</td>
                            <td align="left" style="padding: 10px; width: 50%;">: ' . $row['emailPL'] . '</td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 10px;">Nomor Telepon</td>
                            <td align="left" style="padding: 10px; width: 50%;">: ' . $row['nomorTeleponPL'] . '</td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 10px;">Media Sosial</td>
                            <td align="left" style="padding: 10px; width: 50%;">: ' . $row['mediaSosialPL'] . '</td>
                        </tr>
                    </table>
                    <p>Dalam hal ini bertindak untuk dan atas nama dirinya sendiri, yang selanjutnya disebut sebagai <b>PIHAK KEDUA</b>.</p>
                    <br>
                    <br>

                    <h3 style="text-align:center; margin: 0;">PASAL 1</h3>
                    <h3 style="text-align:center; margin: 0;">PERNYATAAN-PERNYATAAN</h3>
                    
                    <p><b>Ayat 1</b></p>
                    <p style="margin-left: 10px;"><b>PIHAK PERTAMA</b> telah menyatakan persetujuannya untuk mempekerjakan <b>PIHAK KEDUA</b> selaku pekerja lepas.</p>
                    <p><b>Ayat 2</b></p>
                    <p style="margin-left: 10px;"><b>PIHAK KEDUA</b> meyatakan ketersediaannya selaku pekerja lepas untuk bekerja dan memenuhi keinginan <b>PIHAK PERTAMA</b> sesuai penawaran pekerjaan.</p>

                    <h3 style="text-align:center; margin: 0;">PASAL 2</h3>
                    <h3 style="text-align:center; margin: 0;">RUANG LINGKUP PEKERJAAN</h3>
                    
                    <p><b>Ayat 1</b></p>
                    <p style="margin-left: 10px;">Pekerjaan yang harus dilakukan <b>PIHAK KEDUA</b> selaku pekerja lepas pada <b>PIHAK PERTAMA</b> adalah <i>' . $row['pekerjaan'] . '</i>.</p>
                    
                    <h3 style="text-align:center; margin: 0;">PASAL 3</h3>
                    <h3 style="text-align:center; margin: 0;">MASA BERLAKU PERJANJIAN KERJA</h3>
                    
                    <p><b>Ayat 1</b></p>
                    <p style="margin-left: 10px;">Perjanjian kerja ini berlaku terhitung sejak tanggal penandatanganan surat perjanjian kerja ini dan akan berakhir pada tanggal (' . $row['tanggalDeadline'] . ').</p>
                    <p><b>Ayat 2</b></p>
                    <p style="margin-left: 10px;">Setelah berakhirnya jangka waktu tersebut dan pekerjaan masih belum selesai, maka kedua belah pihak dapat membuat pembaruan perjanjian kembali.</p>

                    <h3 style="text-align:center; margin: 0;">PASAL 4</h3>
                    <h3 style="text-align:center; margin: 0;">UPAH DAN PEMBAYARAN</h3>
                    
                    <p><b>Ayat 1</b></p>
                    <p style="margin-left: 10px;"><b>PIHAK KEDUA</b> berhak atas upah atau pembayaran dari pekerjaan yang dilakukannya, dari <b>PIHAK PERTAMA</b>, dengan jumlah Rp ' . $row['harga'] . ', yang akan dibayarkan sebelum <b>PIHAK KEDUA</b> melakukan pekerjaannya.</p>
                    <p><b>Ayat 2</b></p>
                    <p style="margin-left: 10px;"><b>PIHAK PERTAMA</b> wajib membayarkan upah atau pembayaran kepada <b>PIHAK KEDUA</b> sebagaimana tersebut pada ayat 1 pasal ini, dengan tidak mengesampingkan kondisi-kondisi tertentu yang mungkin terjadi dimana <b>PIHAK PERTAMA</b> membutuhkan kerjasama dan kesadaran <b>PIHAK KEDUA</b>.</p>

                    <h3 style="text-align:center; margin: 0;">PASAL 5</h3>
                    <h3 style="text-align:center; margin: 0;">KEADAAN DARURAT</h3>
                    
                    <p style="margin-left: 10px;">Perjanjian kerja ini batal dengan sendirinya jika karena keadaan atau situasi yang memaksa, seperti: bencana alam, pemberontakan, perang, huru-hara, kerusuhan, Peraturan Pemerintah atau apapun yang mengakibatkan perjanjian kerja ini tidak mungkin lagi untuk diwujudkan.</p>
                    
                    <h3 style="text-align:center; margin: 0;">PASAL 6</h3>
                    <h3 style="text-align:center; margin: 0;">PENYELESAIAN PERSELISIHAN</h3>
                    
                    <p><b>Ayat 1</b></p>
                    <p style="margin-left: 10px;">Apabila terjadi perselisihan antara kedua belah pihak, akan diselesaikan secara musyawarah untuk mencapai mufakat.</p>
                    <p><b>Ayat 2</b></p>
                    <p style="margin-left: 10px;">Apabila dengan cara ayat 1 pasal ini tidak tercapai kata sepakat, maka kedua belah pihak sepakat untuk menyelesaikan permasalahan tersebut dilakukan melalui prosedur hukum, yang akan dibantu oleh pihak YUGAWE.</p>

                    <h3 style="text-align:center; margin: 0;">PASAL 7</h3>
                    <h3 style="text-align:center; margin: 0;">PENUTUP</h3>
                    
                    <p style="margin-left: 10px;">Demikianlah perjanjian ini dibuat, disetujui, dan ditandatangani oleh kedua pihak secara <i>online</i> di website YUGAWE pada tanggal ' . $row['tanggalBuat'] . ' dalam bentuk <i>file</i> PDF.</p>

                    <table style="width: 100%;">
                        <tr>
                            <td align="center" style="padding: 10px;"><b>PIHAK PERTAMA</b></td>
                            <td align="center" style="padding: 10px;"><b>PIHAK KEDUA</b></td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 10px;">
                                <img style="width: 225px;" src="upload/TTD/' . $row['fotoTTDPK'] . '">
                            </td>
                            <td align="center" style="padding: 10px;">
                                <img style="width: 225px;" src="upload/TTD/' . $row['fotoTTDPL'] . '">
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 10px;">[' . $row['namaPK'] . ']</td>
                            <td align="center" style="padding: 10px;">[' . $row['namaPL'] . ']    </td>
                        </tr>
                    </table>';
        }
        $html .= '</body>
        </html>';
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function sendEmail($emailTo, $subject, $message)
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'yugawe@gmail.com',
            'smtp_pass' => 'yugawe123',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('yugawe@gmail.com', 'PT. Yugawe');
        $this->email->to($emailTo);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
}
