<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_upload extends CI_Model
{
    private $table = 'company';
    private $tableEmployee = 'employee';

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    public function insertEmployee($data)
    {
        $this->db->insert($this->tableEmployee, $data);
    }
}