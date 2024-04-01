<?php
class M_administrasi extends CI_Model{
	public function __construct()
	{
		parent::__construct();
	}
    function getContract($order_id)
	{
		return $this->db->query("SELECT ec.* FROM employment_contract ec INNER JOIN `order` o ON o.id = ec.order_id WHERE o.id = $order_id")-> result_array();
	}
	function getInvoice($order_id)
	{
		return $this->db->query("SELECT i.* FROM invoice i INNER JOIN `order` o ON o.id = i.order_id WHERE o.id = $order_id")-> result_array();
	}
	function getFile($order_id)
	{
		return $this->db->query("SELECT i.* FROM client_file i INNER JOIN `order` o ON o.id = i.order_id WHERE o.id = $order_id")-> result_array();
	}
}