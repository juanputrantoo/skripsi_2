<?php

class m_kategoriPekerjaan extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function detail($id)
    {
        return $this->db->get_where('view_kategori', array(
            'id' => $id
        ))->result_array();
    }

    public function getByID($id)
    {
        return $this->db->get_where('kategori_pekerjaan', array('idPekerjaLepas' => $id))->result_array();
    }

    public function insert($pekerjaLepas, $select_kategori, $harga)
    {
        $this->db->trans_start();
        $result = array();
        foreach ($select_kategori as $key => $val) {
            $result[] = array(
                'idPekerjaLepas' => $pekerjaLepas,
                'idKategori' => $_POST['select-kategori'][$key],
                'harga' => $_POST['harga'][$key]
            );
        }
        $this->db->insert_batch('kategori_pekerjaan', $result);
        $this->db->trans_complete();
    }

    public function updateHarga($idPekerjaLepas)
    {
        $data = $this->getByID($idPekerjaLepas);
        $result = array();
        foreach ($data as $key => $val) {
            $result[] = array(
                'id' => $data[$key]['id'],
                'idPekerjaLepas' => $idPekerjaLepas,
                'idKategori' => $data[$key]['idKategori'],
                'harga' => $_POST['harga'][$key]
            );
        }
        $this->db->update_batch('kategori_pekerjaan', $result, 'id');
    }

    public function delete($id)
    {
        $this->db->where('idPekerjaLepas', $id);
        $this->db->delete('kategori_pekerjaan');
    }

    public function deleteSingle($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kategori_pekerjaan');
    }

    public function getID($idPekerjaLepas)
    {
        $this->db->select('idKategori as id');
        $this->db->where('idPekerjaLepas', $idPekerjaLepas);
        return $this->db->get('kategori_pekerjaan')->result_array();
    }

    public function getFilter($kategori, $keyword)
    {
        $this->db->select('*');
        $this->db->from('view_kategori');
        if ($kategori != '' && $keyword != '') {
            $data = array(
                'idKategori' => $kategori
            );
            $this->db->where($data);
            $this->db->group_start();
            $this->db->or_like('namaLengkap', $keyword);
            $this->db->or_like('judulPekerjaan', $keyword);
            $this->db->or_like('deskripsiPekerjaan', $keyword);
            $this->db->group_end();
        } else if ($kategori == '' && $keyword != '') {
            $this->db->group_start();
            $this->db->or_like('namaLengkap', $keyword);
            $this->db->or_like('judulPekerjaan', $keyword);
            $this->db->or_like('deskripsiPekerjaan', $keyword);
            $this->db->group_end();
        } else if ($kategori != '' && $keyword == '') {
            $data = array(
                'idKategori' => $kategori
            );
            $this->db->where($data);
        }
        $this->db->group_by('namaLengkap');
        return $this->db->get()->result();
    }
}
