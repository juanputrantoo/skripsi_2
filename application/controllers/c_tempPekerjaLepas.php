<?php

class c_tempPekerjaLepas extends CI_Controller{
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
        if ($this->session->userdata('keterangan') != "loginPLSementara") {
            redirect('login');
        }
    }

    public function home()
    {
        $id = $this->session->userdata('id');
        $data['judul'] = 'Yugawe';
        $data['detailPL'] = $this->m_pekerjaLepas->detailAkun($id);
        $this->load->view('pl/temp_login/templates/header', $data);
        $this->load->view('pl/temp_login/templates/navbar', $data);
        $this->load->view('pl/temp_login/home');
        $this->load->view('pl/temp_login/templates/footer', $data);
    }

    public function already()
    {
        $id = $this->session->userdata('id');
        $data['judul'] = 'Yugawe';
        $data['detailPL'] = $this->m_pekerjaLepas->detailAkun($id);
        $this->load->view('pl/temp_login/templates/header', $data);
        $this->load->view('pl/temp_login/templates/navbar', $data);
        $this->load->view('pl/temp_login/already');
        $this->load->view('pl/temp_login/templates/footer', $data);
    }

    public function suspend()
    {
        $id = $this->session->userdata('id');
        $data['judul'] = 'Yugawe';
        $data['detailPL'] = $this->m_pekerjaLepas->detailAkun($id);
        $this->load->view('pl/temp_login/templates/header', $data);
        $this->load->view('pl/temp_login/templates/navbar', $data);
        $this->load->view('pl/temp_login/suspend');
        $this->load->view('pl/temp_login/templates/footer', $data);
    }

    public function isiPekerjaan()
    {
        $id = $this->session->userdata('id');
        $data['judul'] = 'Yugawe';
        $data['detailPL'] = $this->m_pekerjaLepas->detailAkun($id);
        $data['kategoriPekerjaan'] = $this->m_kategori->kategoriPekerjaan();
        $this->load->view('pl/temp_login/templates/header', $data);
        $this->load->view('pl/temp_login/templates/navbar', $data);
        $this->load->view('pl/temp_login/isiPekerjaan', $data);
        $this->load->view('pl/temp_login/templates/footer', $data);
    }

    public function createPekerjaan($id){
        $this->load->library('upload');
        $idKategori = $this->input->post('select-kategori');
        $harga = $this->input->post('harga');
        $this->m_kategoriPekerjaan->insert($id, $idKategori, $harga);
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
                'idPekerjaLepas' => $id
            );
            $this->m_portofolio->insert($data);
        }
        $kelengkapan = array(
            'kelengkapan' => 1
        );
        $this->m_pekerjaLepas->konfirmasiAkun($kelengkapan, $id);
        redirect('logout', 'refresh');
    }

    public function uploadFotoPortofolio()
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
}