<?php

class m_pemberiKerja extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function createAkun($data)
    {
        return $this->db->insert('pemberi_kerja', $data);
    }

    public function akun($status)
    {
        return $this->db->get_where('pemberi_kerja', array('status' => $status))->result();
    }

    public function detailAkun($id)
    {
        return $this->db->get_where('pemberi_kerja', array('id' => $id))->row_array();
    }

    public function konfirmasiAkun($data, $id)
    {
        $this->db->update('pemberi_kerja', $data, array(
            'id' => $id
        ));
    }

    public function deleteAkun($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pemberi_kerja');
    }


    public function deleteFotoTTD($id)
    {
        $data = $this->detailAkun($id);
        if ($data['fotoTTD'] != "default.jpg") {
            $filename = explode(".", $data['fotoTTD'])[0];
            return array_map('unlink', glob(FCPATH . "upload/TTD/$filename.*"));
        }
    }

    public function deleteFotoProfil($id)
    {
        $data = $this->detailAkun($id);
        if ($data['fotoProfil'] != "default.jpg") {
            $filename = explode(".", $data['fotoProfil'])[0];
            return array_map('unlink', glob(FCPATH . "upload/profil/$filename.*"));
        }
    }

    public function editAkun($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('pemberi_kerja', $data);
    }

    public function search($query, $status)
    {
        $this->db->select('*');
        $this->db->where('status', $status);
        $this->db->from('pemberi_kerja');
        if ($query != '') {
            $this->db->like('namaLengkap', $query);
        }
        return $this->db->get();
    }

    public function checkEmail($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('pemberi_kerja');;
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function login($table, $data)
    {
        $query = $this->db->get_where($table, $data);
        return $query->row_array();
    }
}
