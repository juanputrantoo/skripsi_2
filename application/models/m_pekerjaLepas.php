<?php
class m_pekerjaLepas extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function createAkun($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function akun($status, $kelengkapan)
    {
        return $this->db->get_where('pekerja_lepas', array(
            'status' => $status,
            'kelengkapan' => $kelengkapan
        ))->result();
    }

    public function jumlahAkunValid()
    {
        return $this->db->get_where('pekerja_lepas', array(
            'status' => 1,
            'kelengkapan' => 2
        ))->num_rows();
    }

    public function paginationAkunValid($limit, $start)
    {
        $where = array(
            'status' => 1,
            'kelengkapan' => 2
        );
        $this->db->where($where);
        return $this->db->get('pekerja_lepas', $limit, $start)->result();
    }

    public function detailAkun($id)
    {
        return $this->db->get_where('pekerja_lepas', array('id' => $id))->row_array();
    }

    public function konfirmasiAkun($data, $id)
    {
        $this->db->update('pekerja_lepas', $data, array(
            'id' => $id
        ));
    }

    public function deleteAkun($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pekerja_lepas');
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
        $this->db->update('pekerja_lepas', $data);
    }

    public function searchPekerja($query, $status)
    {
        $this->db->select('*');
        $this->db->where('status', $status);
        $this->db->from('pekerja_lepas');

        if ($query != '') {
            $this->db->group_start();
            $this->db->or_like('namaLengkap', $query);
            $this->db->or_like('email', $query);
            $this->db->group_end();
        }
        $this->db->order_by('kelengkapan', 'DESC');
        return $this->db->get();
    }

    public function search($query, $status, $kelengkapan)
    {
        $this->db->select('*');
        $data = array(
            'status' => $status,
            'kelengkapan' => $kelengkapan
        );
        $this->db->where($data);
        $this->db->from('pekerja_lepas');

        if ($query != '') {
            $this->db->group_start();
            $this->db->or_like('namaLengkap', $query);
            $this->db->or_like('email', $query);
            $this->db->group_end();
        }
        $this->db->order_by('kelengkapan', 'DESC');
        return $this->db->get();
    }

    public function checkEmail($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('pekerja_lepas');;
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
