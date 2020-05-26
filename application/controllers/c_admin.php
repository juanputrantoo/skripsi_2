<?php

class c_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_admin');
        $this->load->model('m_kategori');
        $this->load->model('m_kategoriPekerjaan');
        $this->load->model('m_kontrak');
        $this->load->model('m_pekerjaLepas');
        $this->load->model('m_pemberiKerja');
        $this->load->model('m_portofolio');
        $this->load->model('m_tawaranPekerjaan');
        if ($this->session->userdata('status') != "login") {
            redirect('admin');
        }
    }

    public function daftarAdmin(){
        $data['judul'] = 'Admin';
        $data['admin'] = $this->m_admin->getAllAdmin();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_daftarAdmin', $data);
        $this->load->view('admin/templates/footer');
    }

    public function editAdmin($id){
        $data['judul'] = 'Admin';
        $data['admin'] = $this->m_admin->getAdminByID($id);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_editAdmin', $data);
        $this->load->view('admin/templates/footer');
    }

    public function tambahAdmin(){
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $this->m_admin->insert($data);
        redirect('admin/daftarAdmin', 'refresh');
    }

    public function deleteAdmin($id){
        $this->m_admin->delete($id);
        redirect('admin/daftarAdmin', 'refresh');
    }

    public function submitEditAdmin($id){
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $this->m_admin->update($id, $data);
        redirect('admin/daftarAdmin', 'refresh');
    }

    public function dashboard()
    {
        $data['judul'] = 'Admin';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_dashboard');
        $this->load->view('admin/templates/footer');
    }

    public function pengajuanAkunPK()
    {
        $data['judul'] = 'Admin';
        $data['regisPK'] = $this->m_pemberiKerja->akun(0);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_pengajuanAkunPK', $data);
        $this->load->view('admin/templates/footer');
    }

    public function detailPengajuanAkunPK($id)
    {
        $data['judul'] = 'Admin';
        $data['detailRegisPK'] = $this->m_pemberiKerja->detailAkun($id);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_detailPengajuanAkunPK', $data);
        $this->load->view('admin/templates/footer');
    }

    public function validAkunPK()
    {
        $data['judul'] = 'Admin';
        $data['akunPK'] = $this->m_pemberiKerja->akun(1);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_validAkunPK', $data);
        $this->load->view('admin/templates/footer');
    }

    public function detailValidAkunPK($id)
    {
        $data['judul'] = 'Admin';
        $data['detailAkunPK'] = $this->m_pemberiKerja->detailAkun($id);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_detailValidAkunPK', $data);
        $this->load->view('admin/templates/footer');
    }

    public function terimaPK($id)
    {
        $data = array(
            'status' => 1
        );
        $emailTo = $this->m_pemberiKerja->detailAkun($id);
        $subject = 'Informasi Mengenai Pengajuan Akun di Yugawe';
        $message = 'Dengan ini kami menyatakan bahwa pengajuan akun Anda telah disetujui di Yugawe. Silahkan login dengan email dan password yang sudah diajukan.';
        $this->sendEmail($emailTo['email'], $subject, $message);
        $this->m_pemberiKerja->konfirmasiAkun($data, $id);
        redirect('admin/pengajuanAkunPK', 'refresh');
    }

    public function tolakPK($id)
    {
        $emailTo = $this->m_pemberiKerja->detailAkun($id);
        $subject = 'Informasi Mengenai Pengajuan Akun di Yugawe';
        $message = 'Dengan ini kami menyatakan permintaan maaf karena akun Anda belum dapat disetujui karena data yang di input masih terjadi kesalahan. Terima kasih.';
        $this->sendEmail($emailTo['email'], $subject, $message);
        $this->m_pemberiKerja->deleteFotoTTD($id);
        $this->m_pemberiKerja->deleteFotoProfil($id);
        $this->m_pemberiKerja->deleteAkun($id);
        redirect('admin/pengajuanAkunPK', 'refresh');
    }

    public function suspendAkunPK()
    {
        $data['judul'] = 'Admin';
        $data['akunPK'] = $this->m_pekerjaLepas->akun(2, 2);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_suspendAkunPK', $data);
        $this->load->view('admin/templates/footer');
    }

    public function detailSuspendAkunPK($id)
    {
        $data['judul'] = 'Admin';
        $data['detailAkunPK'] = $this->m_pemberiKerja->detailAkun($id);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_detailSuspendAkunPK', $data);
        $this->load->view('admin/templates/footer');
    }

    public function suspendPK($id)
    {
        $data = array(
            'status' => 2
        );
        $emailTo = $this->m_pemberiKerja->detailAkun($id);
        $subject = 'Informasi Mengenai Pengajuan Akun di Yugawe';
        $message = 'Dengan ini kami menyatakan bahwa pengajuan akun Anda telah disetujui di Yugawe. Silahkan login dengan email dan password yang sudah diajukan.';
        $this->sendEmail($emailTo['email'], $subject, $message);
        $this->m_pemberiKerja->konfirmasiAkun($data, $id);
        redirect('admin/validAkunPK', 'refresh');
    }

    public function unSuspendPK($id)
    {
        $data = array(
            'status' => 1
        );
        $emailTo = $this->m_pemberiKerja->detailAkun($id);
        $subject = 'Informasi Mengenai Pengajuan Akun di Yugawe';
        $message = 'Dengan ini kami menyatakan bahwa pengajuan akun Anda telah disetujui di Yugawe. Silahkan login dengan email dan password yang sudah diajukan.';
        $this->sendEmail($emailTo['email'], $subject, $message);
        $this->m_pemberiKerja->konfirmasiAkun($data, $id);
        redirect('admin/suspendAkunPK', 'refresh');
    }

    public function searchSuspendPK()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->m_pemberiKerja->search($query, 2);
        $output .= '
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <tr>
                    <th>Nomor</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th></th>
                </tr>
        ';
        if ($data->num_rows() > 0) {
            $i = 1;
            foreach ($data->result() as $row) {
                $anc = anchor('admin/suspendAkunPK/detail/' . $row->id, 'Detail');
                $stat = 'Suspend';
                $output .= '
                <tr>
                    <td>' . $i++ . '</td>
                    <td>' . $row->namaLengkap . '</td>
                    <td>' . $row->email . '</td>
                    <td>' . $stat . '</td>
                    <td>' . $anc . '</td>
                </tr>
                ';
            }
        } else {
            $output .= '
            <tr>
                <td colspan="5">Data tidak ditemukan</td>
            </tr>';
        }
        $output .= '</table>';
        echo $output;
    }
    

    public function searchRegisPK()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->m_pemberiKerja->search($query, 0);
        $output .= '
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <tr>
                    <th>Nomor</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th></th>
                </tr>
        ';
        if ($data->num_rows() > 0) {
            $i = 1;
            foreach ($data->result() as $row) {
                $anc = anchor('admin/pengajuanAkunPK/detail/' . $row->id, 'Detail');
                $stat = '';
                if ($row->status == 0) {
                    $stat = "Belum dikonfirmasi";
                } else {
                    $stat = "Sudah dikonfirmasi";
                }
                $output .= '
                <tr>
                    <td>' . $i++ . '</td>
                    <td>' . $row->namaLengkap . '</td>
                    <td>' . $row->email . '</td>
                    <td>' . $stat . '</td>
                    <td>' . $anc . '</td>
                </tr>
                ';
            }
        } else {
            $output .= '
            <tr>
                <td colspan="5">Data tidak ditemukan</td>
            </tr>';
        }
        $output .= '</table>';
        echo $output;
    }

    public function searchValidPK()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->m_pemberiKerja->search($query, 1);
        $output .= '
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <tr>
                    <th>Nomor</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th></th>
                </tr>
        ';
        if ($data->num_rows() > 0) {
            $i = 1;
            foreach ($data->result() as $row) {
                $anc = anchor('admin/validAkunPK/detail/' . $row->id, 'Detail');
                $stat = '';
                if ($row->status == 0) {
                    $stat = "Belum dikonfirmasi";
                } else {
                    $stat = "Sudah dikonfirmasi";
                }
                $output .= '
                <tr>
                    <td>' . $i++ . '</td>
                    <td>' . $row->namaLengkap . '</td>
                    <td>' . $row->email . '</td>
                    <td>' . $stat . '</td>
                    <td>' . $anc . '</td>
                </tr>
                ';
            }
        } else {
            $output .= '
            <tr>
                <td colspan="5">Data tidak ditemukan</td>
            </tr>';
        }
        $output .= '</table>';
        echo $output;
    }

    public function pengajuanAkunBiodataPL()
    {
        $data['judul'] = 'Admin';
        $data['regisPL'] = $this->m_pekerjaLepas->akun(0, 0);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_pengajuanAkunBiodataPL', $data);
        $this->load->view('admin/templates/footer');
    }

    public function detailPengajuanAkunBiodataPL($id)
    {
        $data['judul'] = 'Admin';
        $data['detailRegisPL'] = $this->m_pekerjaLepas->detailAkun($id);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_detailPengajuanAkunBiodataPL', $data);
        $this->load->view('admin/templates/footer');
    }

    public function detailPengajuanAkunPekerjaanPL($id)
    {
        $data['judul'] = 'Admin';
        $data['detailRegisPL'] = $this->m_pekerjaLepas->detailAkun($id);
        $data['detailRegisPLKategori'] = $this->m_kategoriPekerjaan->detail($id);
        $data['detailRegisPLPorto'] = $this->m_portofolio->detail($id);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_detailPengajuanAkunPekerjaanPL', $data);
        $this->load->view('admin/templates/footer');
    }

    public function pengajuanAkunPekerjaanPL()
    {
        $data['judul'] = 'Admin';
        $data['regisPL'] = $this->m_pekerjaLepas->akun(1, 0);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_pengajuanAkunPekerjaanPL', $data);
        $this->load->view('admin/templates/footer');
    }


    public function validAkunPL()
    {
        $data['judul'] = 'Admin';
        $data['akunPL'] = $this->m_pekerjaLepas->akun(1, 2);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_validAkunPL', $data);
        $this->load->view('admin/templates/footer');
    }

    public function detailValidAkunPL($id)
    {
        $data['judul'] = 'Admin';
        $data['detailAkunPL'] = $this->m_pekerjaLepas->detailAkun($id);
        $data['detailAkunPLKategori'] = $this->m_kategoriPekerjaan->detail($id);
        $data['detailAkunPLPorto'] = $this->m_portofolio->detail($id);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_detailValidAkunPL', $data);
        $this->load->view('admin/templates/footer');
    }

    public function terimaPL($id)
    {
        $data = array(
            'status' => 1
        );
        $emailTo = $this->m_pekerjaLepas->detailAkun($id);
        $subject = 'Informasi Mengenai Pengajuan Akun di Yugawe';
        $message = 'Dengan ini kami menyatakan bahwa pengajuan akun Anda telah disetujui di Yugawe. Silahkan login dengan email dan password yang sudah diajukan, lalu mengisi biodata mengenai pekerjaan agar dapat menggunakan akun.';
        $this->sendEmail($emailTo['email'], $subject, $message);
        $this->m_pekerjaLepas->konfirmasiAkun($data, $id);
        redirect('admin/pengajuanAkunBiodataPL', 'refresh');
    }

    public function tolakPL($id)
    {
        $emailTo = $this->m_pekerjaLepas->detailAkun($id);
        $subject = 'Informasi Mengenai Pengajuan Akun di Yugawe';
        $message = 'Dengan ini kami menyatakan permintaan maaf karena akun Anda belum dapat disetujui karena data yang di input masih terjadi kesalahan. Terima kasih.';
        $this->sendEmail($emailTo['email'], $subject, $message);
        $this->m_pekerjaLepas->deleteFotoTTD($id);
        $this->m_pekerjaLepas->deleteFotoProfil($id);
        $this->m_pekerjaLepas->deleteAkun($id);
        redirect('admin/pengajuanAkunBiodataPL', 'refresh');
    }

    public function terimaPekerjaanPL($id)
    {
        $data = array(
            'kelengkapan' => 2
        );
        $emailTo = $this->m_pekerjaLepas->detailAkun($id);
        $subject = 'Informasi Mengenai Pengajuan Akun di Yugawe';
        $message = 'Dengan ini kami menyatakan bahwa pengajuan akun Anda mengenai pekerjaan telah disetujui di Yugawe. Silahkan login dengan email dan password yang sudah diajukan.';
        $this->sendEmail($emailTo['email'], $subject, $message);
        $this->m_pekerjaLepas->konfirmasiAkun($data, $id);
        redirect('admin/pengajuanAkunPekerjaanPL', 'refresh');
    }

    public function tolakPekerjaanPL($id)
    {
        $data = array(
            'kelengkapan' => 0
        );
        $emailTo = $this->m_pekerjaLepas->detailAkun($id);
        $subject = 'Informasi Mengenai Pengajuan Akun di Yugawe';
        $message = 'Dengan ini kami menyatakan permintaan maaf karena biodata mengenai pekerjaan Anda belum dapat disetujui. Silahkan mengisi kembali biodata pekerjaan yang lebih sesuai dan benar. Terima kasih.';
        $this->sendEmail($emailTo['email'], $subject, $message);
        $this->m_pekerjaLepas->konfirmasiAkun($data, $id);
        $this->m_portofolio->deleteFotoPortofolio($id);
        $this->m_kategoriPekerjaan->delete($id);
        redirect('admin/pengajuanAkunPekerjaanPL', 'refresh');
    }

    public function searchRegisBiodataPL()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->m_pekerjaLepas->search($query, 0, 0);
        $output .= '
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <tr>
                    <th>Nomor</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th></th>
                </tr>
        ';
        if ($data->num_rows() > 0) {
            $i = 1;
            foreach ($data->result() as $row) {
                $anc = anchor('admin/pengajuanAkunBiodataPL/detail/' . $row->id, 'Detail');
                $stat = '';
                if ($row->status == 0) {
                    $stat = "Belum dikonfirmasi";
                } else {
                    $stat = "Sudah dikonfirmasi";
                }
                $output .= '
                <tr>
                    <td>' . $i++ . '</td>
                    <td>' . $row->namaLengkap . '</td>
                    <td>' . $row->email . '</td>
                    <td>' . $stat . '</td>
                    <td>' . $anc . '</td>
                </tr>
                ';
            }
        } else {
            $output .= '
            <tr>
                <td colspan="5">Data tidak ditemukan</td>
            </tr>';
        }
        $output .= '</table>';
        echo $output;
    }

    public function searchRegisPekerjaanPL()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->m_pekerjaLepas->searchPekerja($query, 1);
        $output .= '
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <tr>
                    <th>Nomor</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th></th>
                </tr>
        ';
        if ($data->num_rows() > 0) {
            $i = 1;
            foreach ($data->result() as $row) {
                if ($row->kelengkapan == 0) {
                    $anc = anchor('admin/pengajuanAkunPekerjaanPL/detail/' . $row->id, 'Detail');
                    $stat = 'Belum Mengisi Pekerjaan';
                    $output .= '
                    <tr>
                        <td>' . $i++ . '</td>
                        <td>' . $row->namaLengkap . '</td>
                        <td>' . $row->email . '</td>
                        <td>' . $stat . '</td>
                        <td>' . '-' . '</td>
                    </tr>
                    ';
                } else if ($row->kelengkapan == 1) {
                    $anc = anchor('admin/pengajuanAkunPekerjaanPL/detail/' . $row->id, 'Detail');
                    $stat = 'Sudah Mengisi Pekerjaan';
                    $output .= '
                    <tr>
                        <td>' . $i++ . '</td>
                        <td>' . $row->namaLengkap . '</td>
                        <td>' . $row->email . '</td>
                        <td>' . $stat . '</td>
                        <td>' . $anc . '</td>
                    </tr>
                    ';
                }
            }
        } else {
            $output .= '
            <tr>
                <td colspan="5">Data tidak ditemukan</td>
            </tr>';
        }
        $output .= '</table>';
        echo $output;
    }

    public function searchValidPL()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->m_pekerjaLepas->search($query, 1, 2);
        $output .= '
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <tr>
                    <th>Nomor</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th></th>
                </tr>
        ';
        if ($data->num_rows() > 0) {
            $i = 1;
            foreach ($data->result() as $row) {
                $anc = anchor('admin/validAkunPL/detail/' . $row->id, 'Detail');
                $stat = '';
                if ($row->status == 0) {
                    $stat = "Belum dikonfirmasi";
                } else {
                    $stat = "Sudah dikonfirmasi";
                }
                $output .= '
                <tr>
                    <td>' . $i++ . '</td>
                    <td>' . $row->namaLengkap . '</td>
                    <td>' . $row->email . '</td>
                    <td>' . $stat . '</td>
                    <td>' . $anc . '</td>
                </tr>
                ';
            }
        } else {
            $output .= '
            <tr>
                <td colspan="5">Data tidak ditemukan</td>
            </tr>';
        }
        $output .= '</table>';
        echo $output;
    }

    public function suspendAkunPL()
    {
        $data['judul'] = 'Admin';
        $data['akunPL'] = $this->m_pekerjaLepas->akun(2, 2);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_suspendAkunPL', $data);
        $this->load->view('admin/templates/footer');
    }

    public function detailSuspendAkunPL($id)
    {
        $data['judul'] = 'Admin';
        $data['detailAkunPL'] = $this->m_pekerjaLepas->detailAkun($id);
        $data['detailAkunPLKategori'] = $this->m_kategoriPekerjaan->detail($id);
        $data['detailAkunPLPorto'] = $this->m_portofolio->detail($id);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_detailSuspendAkunPL', $data);
        $this->load->view('admin/templates/footer');
    }

    public function suspendPL($id)
    {
        $data = array(
            'status' => 2
        );
        $emailTo = $this->m_pekerjaLepas->detailAkun($id);
        $subject = 'Informasi Mengenai Pengajuan Akun di Yugawe';
        $message = 'Dengan ini kami menyatakan bahwa pengajuan akun Anda telah disetujui di Yugawe. Silahkan login dengan email dan password yang sudah diajukan, lalu mengisi biodata mengenai pekerjaan agar dapat menggunakan akun.';
        $this->sendEmail($emailTo['email'], $subject, $message);
        $this->m_pekerjaLepas->konfirmasiAkun($data, $id);
        redirect('admin/validAkunPL', 'refresh');
    }

    public function unSuspendPL($id)
    {
        $data = array(
            'status' => 1
        );
        $emailTo = $this->m_pekerjaLepas->detailAkun($id);
        $subject = 'Informasi Mengenai Pengajuan Akun di Yugawe';
        $message = 'Dengan ini kami menyatakan bahwa pengajuan akun Anda telah disetujui di Yugawe. Silahkan login dengan email dan password yang sudah diajukan, lalu mengisi biodata mengenai pekerjaan agar dapat menggunakan akun.';
        $this->sendEmail($emailTo['email'], $subject, $message);
        $this->m_pekerjaLepas->konfirmasiAkun($data, $id);
        redirect('admin/suspendAkunPL', 'refresh');
    }

    public function searchSuspendPL()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->m_pekerjaLepas->search($query, 2, 2);
        $output .= '
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <tr>
                    <th>Nomor</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th></th>
                </tr>
        ';
        if ($data->num_rows() > 0) {
            $i = 1;
            foreach ($data->result() as $row) {
                $anc = anchor('admin/suspendAkunPL/detail/' . $row->id, 'Detail');
                $stat = 'Suspend';
                $output .= '
                <tr>
                    <td>' . $i++ . '</td>
                    <td>' . $row->namaLengkap . '</td>
                    <td>' . $row->email . '</td>
                    <td>' . $stat . '</td>
                    <td>' . $anc . '</td>
                </tr>
                ';
            }
        } else {
            $output .= '
            <tr>
                <td colspan="5">Data tidak ditemukan</td>
            </tr>';
        }
        $output .= '</table>';
        echo $output;
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

    public function kategoriPekerjaan()
    {
        $data['judul'] = 'Admin';
        $data['kategoriPekerjaan'] = $this->m_kategori->kategoriPekerjaan();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_kategoriPekerjaan', $data);
        $this->load->view('admin/templates/footer');
    }

    public function createKategoriPekerjaan()
    {
        $data = array(
            'nama' => $this->input->post('nama')
        );
        $this->m_kategori->createKategoriPekerjaan($data);
        redirect('admin/kategoriPekerjaan', 'refresh');
    }

    public function deleteKategoriPekerjaan($id)
    {
        $data = array(
            'id' => $id
        );
        $this->m_kategori->deleteKategoriPekerjaan($data);
        redirect('admin/kategoriPekerjaan', 'refresh');
    }


    public function penawaranPekerjaan()
    {
        $data['judul'] = 'Admin';
        $data['detail'] = $this->m_tawaranPekerjaan->getAll();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_penawaran', $data);
        $this->load->view('admin/templates/footer');
    }

    public function cariTanggalPenawaran()
    {
        $tanggalDari = $this->input->post('tanggal_dari');
        $tanggalHingga = $this->input->post('tanggal_hingga');
        $tanggalDariNew = date("Y-m-d", strtotime($tanggalDari));
        $tanggalHinggaNew = date("Y-m-d", strtotime($tanggalHingga));
        $data['judul'] = 'Admin';
        $data['detail'] = $this->m_tawaranPekerjaan->getRentangTanggalAdmin($tanggalDariNew, $tanggalHinggaNew);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_penawaran', $data);
        $this->load->view('admin/templates/footer');
    }

    public function kontrakPekerjaan()
    {
        $data['judul'] = 'Admin';
        $data['detail'] = $this->m_kontrak->getAll();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_kontrak', $data);
        $this->load->view('admin/templates/footer');
    }

    public function cariTanggalKontrak()
    {
        $tanggalDari = $this->input->post('tanggal_dari');
        $tanggalHingga = $this->input->post('tanggal_hingga');
        $tanggalDariNew = date("Y-m-d", strtotime($tanggalDari));
        $tanggalHinggaNew = date("Y-m-d", strtotime($tanggalHingga));
        $data['judul'] = 'Admin';
        $data['detail'] = $this->m_kontrak->getRentangTanggalAdmin($tanggalDariNew, $tanggalHinggaNew);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/v_kontrak', $data);
        $this->load->view('admin/templates/footer');
    }

    public function cetak($idKontrak)
    {
        require_once(FCPATH . '/vendor/autoload.php');
        $data = $this->m_kontrak->getByID($idKontrak);
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
}
