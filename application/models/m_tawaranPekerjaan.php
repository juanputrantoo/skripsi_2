<?php

class m_tawaranPekerjaan extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->order_by('tanggalBuat', 'DESC');
        return $this->db->get('view_tawaran')->result_array();
    }

    public function getRowID($id)
    {
        return $this->db->get_where('view_tawaran', array(
            'idTawaran' => $id
        ))->row_array();
    }

    public function detailFromPK($id)
    {
        $this->db->order_by('tanggalBuat', 'DESC');
        return $this->db->get_where('view_tawaran', array(
            'idPemberiKerja' => $id
        ))->result_array();
    }

    public function detailFromPL($id)
    {
        $this->db->order_by('tanggalBuat', 'DESC');
        return $this->db->get_where('view_tawaran', array(
            'idPekerjaLepas' => $id
        ))->result_array();
    }

    public function detailByStatusPK($id, $status)
    {
        return $this->db->get_where('view_tawaran', array(
            'idPemberiKerja' => $id,
            'statusTawaran' => $status
        ))->result_array();
    }

    public function detailByStatusPL($id, $status)
    {
        return $this->db->get_where('view_tawaran', array(
            'idPekerjaLepas' => $id,
            'statusTawaran' => $status
        ))->result_array();
    }

    public function getStatus($idPekerjaLepas, $idPemberiKerja, $status)
    {
        return $this->db->get_where(
            'tawaran_pekerjaan',
            array('idPekerjaLepas' => $idPekerjaLepas, 'idPemberiKerja' => $idPemberiKerja, 'statusTawaran' => $status)
        )->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('tawaran_pekerjaan', $data);
    }

    public function updateStatus($data, $id)
    {
        $this->db->update('tawaran_pekerjaan', $data, array(
            'id' => $id
        ));
    }

    public function getDay($tanggalSekarang)
    {
        $data = array(
            'tanggalSelesai <=' => $tanggalSekarang,
            'statusTawaran' => 0
        );
        return $this->db->select('*')
            ->from('view_tawaran')
            ->where($data)
            ->get()->result_array();
    }

    public function autoTolakTawaran($id)
    {
        return $this->db->where('id', $id)->update('tawaran_pekerjaan', array('statusTawaran' => 2));
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
        $this->db->from('view_tawaran');
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
        $this->db->from('view_tawaran');
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
        $this->db->from('view_tawaran');
        return $this->db->get()->result_array();
    }
}
