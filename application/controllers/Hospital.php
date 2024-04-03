<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hospital extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            redirect('Login');
        }
        if ($this->session->userdata('status_id') != 1) {
            redirect('Logout');
        }
        $this->load->model('M_finance');
    }
    public function index()
    { 
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
		$this->load->view('hospital/v_select_date',$data);
    } 
	

	// ===============YEARLY=================
    public function yearly()
    { 
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
		$this->load->view('hospital/yearly/v_index',$data);
    } 
	
    public function yearly_patient()
    { 
        $this->load->model('M_user');
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $this->load->view('hospital/yearly/v_patient', $data);
    } 
    public function get_yearly_patient()
    { 
		$data = array('name' => 'John', 'age' => 30);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
    } 

    public function yearly_doctor()
    { 
        $this->load->model('M_user');
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $this->load->view('hospital/yearly/v_doctor', $data);
    } 

    public function yearly_disease()
    { 
        $this->load->model('M_user');
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $this->load->view('hospital/yearly/v_penyakit', $data);
    } 

    public function yearly_unit()
    { 
        $this->load->model('M_user');
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $this->load->view('hospital/yearly/v_unit', $data);
    } 

    public function yearly_product()
    { 
        $this->load->model('M_user');
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $this->load->view('hospital/yearly/v_product', $data);
    } 
    public function yearly_medicine()
    { 
        $this->load->model('M_user');
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $this->load->view('hospital/yearly/v_medicine', $data);
    } 


	// ===============END YEARLY=================

    public function pasien()
    { 
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
		$this->load->view('hospital/v_index',$data);
    } 
    public function dokter()
    { 
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
		$this->load->view('hospital/v_index',$data);
    } 
    public function obat()
    { 
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
		$this->load->view('hospital/v_index',$data);
    } 
    public function penyakit()
    { 
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
		$this->load->view('hospital/v_index',$data);
    } 
}
