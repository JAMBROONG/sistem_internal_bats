<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function __construct()
	{	
		parent:: __construct();

    }
	public function index()
	{
		
		$id = $this->session->userdata('key');
		$data['logout'] = date("Y-m-d H:i:s");
		$this->M_table->updateTable('history_login',$data,array('login' =>$id));

        $this->session->sess_destroy();
        redirect('Login');
	}
	public function logoutEmployee()
	{
		
		$id = $this->session->userdata('key');
		$data['logout_date'] = date("Y-m-d H:i:s");
		$this->M_table->updateTable('history_login_employee',$data,array('login_date' =>$id));

        $this->session->sess_destroy();
        redirect('Login');
	}
	
}
