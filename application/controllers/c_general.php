<?php

class c_general extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('recaptcha');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function home()
    {
        $data['judul'] = 'Home';
        $this->load->view('general/templates/header', $data);
        $this->load->view('general/templates/navbar');
        $this->load->view('general/v_home');
        $this->load->view('general/templates/footer');
    }

    public function aboutus()
    {
        $data['judul'] = 'About Us';
        $this->load->view('general/templates/header', $data);
        $this->load->view('general/templates/navbar');
        $this->load->view('general/v_aboutus');
        $this->load->view('general/templates/footer');
    }

    public function howitworks()
    {
        $data['judul'] = 'How It Works';
        $this->load->view('general/templates/header', $data);
        $this->load->view('general/templates/navbar');
        $this->load->view('general/v_howitworks');
        $this->load->view('general/templates/footer');
    }

    public function login()
    {
        $data['judul'] = 'Login';
        $this->load->view('general/templates/header', $data);
        $this->load->view('general/v_login');
        $this->load->view('general/templates/footer');
    }

    public function signup()
    {
        $data['judul'] = 'Signup';
        $this->load->view('general/templates/header', $data);
        $this->load->view('general/templates/navbar');
        $this->load->view('general/v_signup');
        $this->load->view('general/templates/footer');
    }

    public function signupPK()
    {
        $data['judul'] = 'Signup Pemberi Kerja';
        $captcha = array(
            'recaptcha_html' => $this->recaptcha->render()
        );
        $this->load->view('general/templates/header', $data);
        $this->load->view('general/v_signup-pk', $captcha);
        $this->load->view('general/templates/footer');
    }

    public function signupPL()
    {
        $captcha = array(
            'recaptcha_html' => $this->recaptcha->render()
        );
        $data['judul'] = 'Signup Pekerja Lepas';
        $this->load->view('general/templates/header', $data);
        $this->load->view('general/v_signup-pl', $captcha);
        $this->load->view('general/templates/footer');
    }

    public function loginAdmin()
    {
        $data['judul'] = 'Login Admin';
        $this->load->view('admin/v_login', $data);
    }

    public function createAkunPK()
    {
        $this->load->model('m_pemberiKerja');
        $this->load->library('form_validation');
        $this->id = uniqid();
        $response = $this->input->post('g-recaptcha-response');
        $dataCaptcha = $this->getResponseCaptcha($response);
        $checkEmail = $this->checkEmailRegis();
        if ($dataCaptcha == true) {
            if ($checkEmail == true) {
                $data = array(
                    'id' => $this->id,
                    'namaLengkap' => $this->input->post('namaLengkap'),
                    'nomorKTP' => $this->input->post('nomorKTP'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'nomorTelepon' => $this->input->post('nomorTelepon'),
                    'tanggalDaftar' => mdate("%Y-%m-%d"),
                    'fotoTTD' => $this->uploadFotoTTD(),
                    'fotoProfil' => $this->uploadFotoProfil()
                );
                $this->m_pemberiKerja->createAkun($data);
                redirect('login', 'refresh');
            } else {
                $this->session->set_flashdata('captcha_msg', 'error');
                redirect('signup-PK', 'refresh');
            }
        } else {
            $this->session->set_flashdata('captcha_msg', 'error');
            redirect('signup-PK', 'refresh');
        }
    }

    public function createAkunPL()
    {
        $this->load->model('m_pekerjaLepas');
        $this->load->library('session');
        $this->id = uniqid();
        $response = $this->input->post('g-recaptcha-response');
        $dataCaptcha = $this->getResponseCaptcha($response);
        $checkEmail = $this->checkEmailRegis();
        if ($dataCaptcha == true) {
            if ($checkEmail == true) {
                $data = array(
                    'id' => $this->id,
                    'namaLengkap' => $this->input->post('namaLengkap'),
                    'nomorKTP' => $this->input->post('nomorKTP'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'nomorTelepon' => $this->input->post('nomorTelepon'),
                    'mediaSosial' => $this->input->post('mediaSosial'),
                    'alamat' => $this->input->post('alamat'),
                    'fotoTTD' => $this->uploadFotoTTD(),
                    'fotoProfil' => $this->uploadFotoProfil(),
                    'judulPekerjaan' => $this->input->post('judulPekerjaan'),
                    'deskripsiPekerjaan' => $this->input->post('deskripsiPekerjaan'),
                    'tanggalDaftar' => mdate("%Y-%m-%d")
                );
                $this->m_pekerjaLepas->createAkun('pekerja_lepas', $data);
                redirect('home?msg', 'refresh');
            } else {
                $this->session->set_flashdata('captcha_msg', 'error');
                redirect('signup-PL', 'refresh');
            }
        } else {
            $this->session->set_flashdata('captcha_msg', 'error');
            redirect('signup-PL', 'refresh');
        }
    }

    function uploadFotoTTD()
    {
        $config['upload_path']          = './upload/TTD/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $this->id;
        $config['overwrite']            = true;
        $config['max_size']             = 10240;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('fotoTTD')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
        return "default.jpg";
    }

    function uploadFotoProfil()
    {
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

    public function checkEmail()
    {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            echo '<label class="text-danger"><i class="fas fa-times"></i> Format email salah</label>';
        } else {
            $this->load->model('m_pemberiKerja');
            $this->load->model('m_pekerjaLepas');
            if ($this->m_pemberiKerja->checkEmail($_POST["email"]) || $this->m_pekerjaLepas->checkEmail($_POST["email"])) {
                echo '<label class="text-danger"><i class="fa fa-times"></i> Email sudah digunakan</label>';
                return false;
            } else {
                echo '<label class="text-success"><i class="fa fa-check"></i> Email tersedia</label>';
                return true;
            }
        }
    }

    public function checkEmailRegis()
    {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            echo '<label class="text-danger"><i class="fas fa-times"></i> Format email salah</label>';
        } else {
            $this->load->model('m_pemberiKerja');
            $this->load->model('m_pekerjaLepas');
            if ($this->m_pemberiKerja->checkEmail($_POST["email"]) || $this->m_pekerjaLepas->checkEmail($_POST["email"])) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function getResponseCaptcha($str)
    {
        $this->load->library('recaptcha');
        $response = $this->recaptcha->verifyResponse($str);
        if ($response['success']) {
            return true;
        } else {
            $this->form_validation->set_message('getResponseCaptcha', '%s is required.');
            return false;
        }
    }
}
