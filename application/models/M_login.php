<?php
class M_login extends CI_Model{
	public function __construct()
	{
		parent::__construct();

	}
	function getUser($email, $password)
	{
		return $this->db->query("SELECT * FROM user  WHERE email = '$email' and password='$password' ")-> row_array();
	}
	function getEmployee($email, $password)
	{
		return $this->db->query("SELECT * FROM employee  WHERE email = '$email' and password='$password'")-> row_array();
	}
}