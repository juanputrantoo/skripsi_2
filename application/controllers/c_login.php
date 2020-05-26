<?php

class c_login extends CI_Controller
{
    public function login()
    {
        $this->load->model('m_pemberiKerja');
        $this->load->model('m_pekerjaLepas');
        $this->load->library('session');
        $this->load->library('recaptcha');
        $this->load->library('form_validation');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $dataPK = array(
            'email' => $email,
            'password' => $password,
            'status' => 1
        );
        $dataPL = array(
            'email' => $email,
            'password' => $password,
            'status' => 1
        );
        $dataPLSuspend = array(
            'email' => $email,
            'password' => $password,
            'status' => 2
        );
        $checkPK = $this->m_pemberiKerja->login('pemberi_kerja', $dataPK);
        $checkPL = $this->m_pekerjaLepas->login('pekerja_lepas', $dataPL);
        $checkPLSuspend = $this->m_pekerjaLepas->login('pekerja_lepas', $dataPLSuspend);
        if ($checkPK > 0) {
            $data_session = array(
                'email' => $email,
                'keterangan' => "loginPK",
                'id' => $checkPK['id']
            );

            $this->session->set_userdata($data_session);
            redirect('pk/home');
        } else if ($checkPL > 0) {
            if ($checkPL['kelengkapan'] == 0) {
                $data_session = array(
                    'email' => $email,
                    'keterangan' => "loginPLSementara",
                    'id' => $checkPL['id']
                );
                $this->session->set_userdata($data_session);
                redirect('tempPL/home');
            } else if ($checkPL['kelengkapan'] == 1) {
                $data_session = array(
                    'email' => $email,
                    'keterangan' => "loginPLSementara",
                    'id' => $checkPL['id']
                );
                $this->session->set_userdata($data_session);
                redirect('tempPL/already');
            } else if ($checkPL['kelengkapan'] == 2) {
                $data_session = array(
                    'email' => $email,
                    'keterangan' => "loginPL",
                    'id' => $checkPL['id']
                );
                $this->session->set_userdata($data_session);
                redirect('pl/home');
            }
        } else if ($checkPLSuspend > 0) {
            $data_session = array(
                'email' => $email,
                'keterangan' => "loginPLSementara",
                'id' => $checkPLSuspend['id']
            );
            $this->session->set_userdata($data_session);
            redirect('tempPL/suspend');
        } else {
            $msg = $this->session->set_flashdata('error', "ERROR_MESSAGE_HERE");
            redirect('login', $msg);
        }
    }

    public function loginAdmin()
    {
        $this->load->model('m_admin');
        $this->load->library('session');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $data = array(
            'username' => $username,
            'password' => $password
        );
        $check = $this->m_admin->login("admin", $data);
        if ($check > 0) {
            $data_session = array(
                'nama' => $username,
                'id' => $check['id'],
                'status' => "login"
            );
            $this->session->set_userdata($data_session);
            redirect('admin/dashboard', 'refresh');
        } else {
            $msg = $this->session->set_flashdata('error', "ERROR_MESSAGE_HERE");
            redirect('admin', $msg);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
}
