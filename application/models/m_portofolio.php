<?php

class m_portofolio extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function detail($id)
    {
        $this->db->select('pekerja_lepas.*, GROUP_CONCAT(portofolio.nama) as porto', false);
        $this->db->from('pekerja_lepas');
        $this->db->join('portofolio', 'portofolio.idPekerjaLepas = pekerja_lepas.id');
        $this->db->where('pekerja_lepas.id', $id);
        return $this->db->get()->row_array();
    }
    public function insert($data)
    {
        return $this->db->insert('portofolio', $data);
    }

    public function deleteFotoPortofolio($id)
    {
        $data = $this->detail($id);
        $images = explode(",", $data['porto']);
        foreach ($images as $img) {
            unlink("upload/portofolio/" . $img);
        }
        $this->db->where('idPekerjaLepas', $id);
        $this->db->delete('portofolio');
    }

    public function deleteSingle($img)
    {
        unlink("upload/portofolio/" . $img);
        $this->db->delete('portofolio', array('nama' => $img));
    }
}
