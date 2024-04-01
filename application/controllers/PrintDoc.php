<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrintDoc extends CI_Controller {
	public function __construct(){	
        parent:: __construct();
			if (!$this->session->userdata('status_id')) {
				redirect('Login');
			}
    }
	public function index(){
		if (!empty($_GET['taxrules'])) {
			if (is_numeric($_GET['taxrules'])) {
				$data['data'] =  $this->db->query("SELECT website_global_tax_rules . *, country.name,country.image FROM website_global_tax_rules INNER JOIN country ON country.id = website_global_tax_rules.country_id WHERE website_global_tax_rules.id = " . $_GET['taxrules'])->row_array();
				return $this->load->view('print/tax_rules',$data);
			}
		}
		if (!empty($_GET['view_payroll'])) {
			if (is_numeric($_GET['view_payroll'])) {
				$data['data'] =  $this->db->query("SELECT payroll.*, country.name, country.image FROM country INNER JOIN payroll ON payroll.country_id = country.id WHERE payroll.id = " . $_GET['view_payroll'])->row_array();
				return $this->load->view('print/payroll-view',$data);
			}
		}
		if (!empty($_GET['payroll'])) {
			if (is_numeric($_GET['payroll'])) {
				$data['data'] =  $this->db->query("SELECT payroll . *, country.name,country.image FROM payroll INNER JOIN country ON country.id = payroll.country_id WHERE payroll.id = " . $_GET['payroll'])->row_array();
				return $this->load->view('print/payroll',$data);
			}
		}
		if (!empty($_GET['view_taxrules'])) {
			if (is_numeric($_GET['view_taxrules'])) {
				$data['data'] =  $this->db->query("SELECT website_global_tax_rules . *, country.name,country.image FROM website_global_tax_rules INNER JOIN country ON country.id = website_global_tax_rules.country_id WHERE website_global_tax_rules.id = " . $_GET['view_taxrules'])->row_array();
				return $this->load->view('print/tax_rules-view',$data);
			}
		}
	}
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
}
