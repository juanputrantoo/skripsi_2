<?php

class m_kontrak extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->order_by('tanggalBuat', 'DESC');
        return $this->db->get('view_kontrak')->result_array();
    }

    public function getByID($idKontrak)
    {
        $this->db->select('*');
        return $this->db->get_where('view_kontrak', array(
            'idKontrak' => $idKontrak
        ))->result_array();
    }

    public function getRowID($id)
    {
        return $this->db->get_where('view_kontrak', array(
            'idKontrak' => $id
        ))->row_array();
    }

    public function insert($data)
    {
        $this->db->insert('kontrak', $data);
    }

    public function checkRow($idPekerjaLepas, $idPemberiKerja, $status)
    {
        return $this->db->get_where(
            'kontrak',
            array('idPekerjaLepas' => $idPekerjaLepas, 'idPemberiKerja' => $idPemberiKerja, 'statusKontrak' => $status)
        )->result_array();
    }

    public function detailFromPK($id)
    {
        $this->db->order_by('tanggalBuat', 'DESC');
        return $this->db->get_where('view_kontrak', array(
            'idPemberiKerja' => $id
        ))->result_array();
    }

    public function detailFromPL($id)
    {
        $this->db->order_by('tanggalBuat', 'DESC');
        return $this->db->get_where('view_kontrak', array(
            'idPekerjaLepas' => $id
        ))->result_array();
    }

    public function detailByStatusPK($idPemberiKerja, $status)
    {
        return $this->db->get_where('view_kontrak', array(
            'idPemberiKerja' => $idPemberiKerja,
            'statusKontrak' => $status
        ))->result_array();
    }

    public function detailByStatusPL($idPekerjaLepas, $status)
    {
        return $this->db->get_where('view_kontrak', array(
            'idPekerjaLepas' => $idPekerjaLepas,
            'statusKontrak' => $status
        ))->result_array();
    }

    public function updateStatus($data, $id)
    {
        $this->db->update('kontrak', $data, array(
            'id' => $id
        ));
    }

    public function getIDbyPK($idPemberiKerja, $idKontrak)
    {
        return $this->db->get_where('view_kontrak', array(
            'idPemberiKerja' => $idPemberiKerja,
            'idKontrak' => $idKontrak
        ))->result_array();
    }

    public function getIDbyPL($idPekerjaLepas, $idKontrak)
    {
        return $this->db->get_where('view_kontrak', array(
            'idPekerjaLepas' => $idPekerjaLepas,
            'idKontrak' => $idKontrak
        ))->result_array();
    }

    public function update($idKontrak, $data)
    {
        $this->db->where('id', $idKontrak);
        return $this->db->update('kontrak', $data);
    }

    public function getDay($tanggalSekarang)
    {
        $data = array(
            'tanggalSelesai <=' => $tanggalSekarang,
            'statusKontrak' => 0
        );
        return $this->db->select('*')
            ->from('view_kontrak')
            ->where($data)
            ->get()->result_array();
    }

    public function autoKonfirmasiKontrak($id)
    {
        return $this->db->where('id', $id)->update('kontrak', array('statusKontrak' => 1));
    }

    public function getRentangTanggalPK($idPemberiKerja, $tanggalDari, $tanggalHingga)
    {
        $this->db->select('*');
        $data = array(
            'idPemberiKerja' => $idPemberiKerja,
            'tanggalBuat >=' => $tanggalDari,
            'tanggalBuat <=' => $tanggalHingga
        );
        $this->db->where($data);
        $this->db->from('view_kontrak');
        return $this->db->get()->result_array();
    }

    public function getRentangTanggalPL($idPekerjaLepas, $tanggalDari, $tanggalHingga)
    {
        $this->db->select('*');
        $data = array(
            'idPekerjaLepas' => $idPekerjaLepas,
            'tanggalBuat >=' => $tanggalDari,
            'tanggalBuat <=' => $tanggalHingga
        );
        $this->db->where($data);
        $this->db->from('view_kontrak');
        return $this->db->get()->result_array();
    }

    public function getRentangTanggalAdmin($tanggalDari, $tanggalHingga)
    {
        $this->db->select('*');
        $data = array(
            'tanggalBuat >=' => $tanggalDari,
            'tanggalBuat <=' => $tanggalHingga
        );
        $this->db->where($data);
        $this->db->from('view_kontrak');
        return $this->db->get()->result_array();
    }
}
