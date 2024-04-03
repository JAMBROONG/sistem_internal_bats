<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reguest extends CI_Controller {
	public function __construct(){	
        parent:: __construct();
			if ($this->session->userdata('status_id') == 5) {
				redirect('Administrasi');
			}
			if ($this->session->userdata('status_id') == 4) {
				redirect('Employee');
			}
            if ($this->session->userdata('status_id') == 3) {
				redirect('SuperAdmin');
			}	
			if ($this->session->userdata('status_id') == 2) {
				redirect('Admin');
			}	
			if ($this->session->userdata('status_id') == 6) {
				redirect('Guest');
			}
		  
			if ($this->session->userdata('status_id') == 1) {
				redirect('Client');
			}
    }
	public function index(){
		$mail = $this->M_guest->getMail();
		$data['mail'] = [];
		foreach ($mail as $key) {
			array_push($data['mail'], md5($key['email']));
		}
		$this->load->view('v_reguest',$data);
	}
	public function create(){
        $guest['name']                = str_replace("'", "", $this->input->post("name"));
        $guest['phone']               = str_replace("'", "", $this->input->post("phone"));
        $guest['position']            = str_replace("'", "", $this->input->post("position"));
        $guest['date_of_birth']       = str_replace("'", "", $this->input->post("date_of_birth"));
        $guest['address']             = str_replace("'", "", $this->input->post("address"));
		$guest['status_id']           = 6;
        $guest['email']       		  = str_replace("'", "", $this->input->post("email_akun"));
        $guest['password']            = md5(str_replace("'", "", $this->input->post("password_akun")));
        $guest["update_date"]         = date("Y-m-d H:i:s");
        $guest["create_date"]         = date("Y-m-d H:i:s");
		
        $company['company']           = str_replace("'", "", $this->input->post("company"));
        $company['company_phone']     = str_replace("'", "", $this->input->post("company_phone"));
        $company['company_email']     = str_replace("'", "", $this->input->post("company_email"));
        $company['addressOfDomicile'] = str_replace("'", "", $this->input->post("company_address"));
        $company['website']   		  = str_replace("'", "", $this->input->post("company_website"));
        $company["update_date"]       = date("Y-m-d H:i:s");
        $company["create_date"]       = date("Y-m-d H:i:s");
		
        $guest['company_id ']         = $this->M_table->createTableOrder("company", $company);
		
		$tgs['guest_id']      		  = $this->M_table->createTableOrder("user", $guest);
		$tgs['thc_status_id']         = 1;
        $tgs["update_date"]   		  = date("Y-m-d H:i:s");
        $tgs["create_date"]   		  = date("Y-m-d H:i:s");
		$this->M_table->createTable("thc_guest_status", $tgs); 

		redirect('Login');
	}
}
