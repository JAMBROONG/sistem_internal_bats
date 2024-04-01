<?php
class M_guest extends CI_Model{
	public function __construct()
	{
		parent::__construct();

	}
	function thc_guest_status($id)
	{
		return $this->db->query("SELECT * FROM thc_guest_status INNER JOIN thc_status ON thc_status.id = thc_guest_status.thc_status_id WHERE thc_guest_status.guest_id = $id")-> row_array();
	}
    function thc_guest($id)
	{
		return $this->db->query("SELECT * FROM thc_guest WHERE guest_id = $id")-> row_array();
	}
    function thc_guest_answer($id)
	{
		return $this->db->query("SELECT q.*, a.answer AS answer_guest, a.description, a.files AS files_guest, a.status FROM thc_guest_answer a INNER JOIN thc_guest_question q ON q.id = a.question_id WHERE a.guest_id = $id")-> result_array();
	}
    public function getMail()
    {
		return $this->db->query("SELECT email FROM user")-> result_array();
    }
}