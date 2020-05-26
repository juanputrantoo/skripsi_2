<?php

class m_admin extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAllAdmin()
    {
        return $this->db->get('admin')->result_array();
    }

    public function getAdminByID($id)
    {
        return $this->db->get_where('admin', array('id' => $id))->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('admin', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('admin');
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('admin', $data);
    }

    public function login($table, $data)
    {
        $query = $this->db->get_where($table, $data);
        return $query->row_array();
    }
}
