<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccessData extends CI_Controller {
	public function __construct(){	
        parent:: __construct();
			if (!$this->session->userdata('status_id')) {
				redirect('Login');
			}
    }
	public function addTaxRules(){
		$data['country_id'] = $this->test_input($this->input->post('country_id'));
		$data['tax_rules'] = $this->input->post('tax_rules');
		$data['create_date'] = date('Y-m-d H:i:s');
		$data['update_date'] = date('Y-m-d H:i:s');
		$this->M_table->createTable('website_global_tax_rules',$data);
		 
		$newdata   = array(
			'update' => "success",
			"message" => "Tax Rules Created"
		);
		 $this->session->set_userdata($newdata);
		redirect($this->input->post('url'));
	}
	public function delTaxRules()
	{
		if (!empty($_GET['url']) && !empty($_GET['id'])) {
			if (is_numeric($_GET['id'])) {
				$country = $this->M_table->getById("website_global_tax_rules", $_GET['id']);
				$country = $this->M_table->getById("country", $country['country_id']);
				if ($country) {
					$newdata   = array(
					'update' => "success",
					"message" => "Tax Rules ".$country['name']." Deleted"
				);
				$this->M_table->deleteTable("website_global_tax_rules", $_GET['id']);
				$this->session->set_userdata($newdata);
				redirect($_GET['url']);
				}
				
			}
		}
	}
	public function delPayroll()
	{
		if (!empty($_GET['url']) && !empty($_GET['id'])) {
			if (is_numeric($_GET['id'])) {
				$country = $this->M_table->getById("country", $_GET['id']);
				if ($country) {
					$newdata   = array(
					'update' => "success",
					"message" => "Tax Rules ".$country['name']." Deleted"
				);
				$this->M_table->deleteTable("payroll", $_GET['id']);
				$this->session->set_userdata($newdata);
				redirect($_GET['url']);
				}
				
			}
		}
	}
	public function _do_upload($type,$path,$url) {
        $image_name                             = time() . "-" . $_FILES["image"]["name"];
        $config["upload_path"]                  = $path;
        $config["allowed_types"]                = $type;
        $config["file_name"]                    = $image_name;
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload("image")) {
			$newdata   = array(
				'update' => "danied",
				"message" => "Payroll NOT Created!!"
			);
			$this->session->set_userdata($newdata);
            redirect($url);
        }
        return $this->upload->data("file_name");
    }
	public function addPayroll()
	{
		$data["country_id"]     = str_replace("'", "", $this->input->post("country_id"));
        $data["payroll"]        = $this->input->post("payroll");
        $data["update_date"]    = date("Y-m-d H:i:s");
        $data["create_date"]    = date("Y-m-d H:i:s");
        if (!empty($_FILES["image"]["name"])) {
            $image                              = $this->_do_upload("pdf","assets/upload/payroll",$this->input->post("url"));
            $data["files"]                      = $image;
        }
		$newdata   = array(
			'update' => "success",
			"message" => "Payroll Created"
		);
		$this->session->set_userdata($newdata);
		$this->M_table->createTable('payroll',$data);
        redirect($this->input->post("url"));
	}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
}
