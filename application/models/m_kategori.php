<?php

class m_kategori extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function kategoriPekerjaan()
    {
        return $this->db->get('kategori')->result();
    }

    public function createKategoriPekerjaan($data)
    {
        return $this->db->insert('kategori', $data);
    }

    public function deleteKategoriPekerjaan($id)
    {
        return $this->db->delete('kategori', $id);
    }

    public function getID()
    {
        $this->db->select('id');
        return $this->db->get('kategori')->result_array();
    }

    public function getNamaByID($id)
    {
        $this->db->select('nama');
        $this->db->where('id', $id);
        return $this->db->get('kategori')->row_array();
    }
}
