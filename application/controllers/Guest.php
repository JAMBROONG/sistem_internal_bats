<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {
	public function __construct(){
        parent:: __construct();
		if ($this->session->userdata('status') != "login") {
            redirect('Login');
        }
		if ($this->session->userdata('status_id') == 4) {
			redirect('Employee');
		}	
		if ($this->session->userdata('status_id') == 3) {
			redirect('SuperAdmin');
		}
        if ($this->session->userdata("status_id") == 1) {
            redirect("Client");
        }
		if ($this->session->userdata('status_id') == 5) {
			redirect('Administrasi');
        }
		if ($this->session->userdata('status_id') == 2) {
			redirect('Admin');
		}
		if ( time() - $this->session->userdata('last_login_time') > 43200) {
            $id = $this->session->userdata('key');
            $data['logout'] = date("Y-m-d H:i:s");
            $this->M_table->updateTable('history_login',$data,array('login' =>$id));
            redirect('Logout');
        }
		$_SESSION['last_login_time'] = time();
    }
    public function index(){
		$id                 = $this->session->userdata('id');
        $data['user']       = $this->M_user->profile($id);
        $data['thc_nda']    = $this->M_table->getByCon('thc_nda','guest_id',$id);
        $data['thc_guest_status']   = $this->M_guest->thc_guest_status($id);
        $data['thc_guest_question']   = $this->M_table->getAll('thc_guest_question');
        $data['thc_guest_answer_primary']   = $this->M_table->getAll('thc_guest_answer_primary');
        $data['thc_status']   = $this->M_table->getAll('thc_status');
        $data['thc_guest_answer']   = $this->M_guest->thc_guest_answer($id);
        $data['thc_guest']   = $this->M_table->getByCon('thc_guest','guest_id',$id);
		$this->load->view('guest/v_dashboard',$data);
	}
    public function _do_upload_nda() {
        $image_name                             = time() . "-" . $_FILES["image"]["name"];
        $config["upload_path"]                  = "assets/upload/nda/";
        $config["allowed_types"]                = "pdf|jpg|png|jpeg|xlsx|doc|odt|docx";
        $config["file_name"]                    = $this->M_table->getById('user',$this->session->userdata('id'))['name'].'_'.$image_name;
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload("image")) {
            $this->session->set_flashdata("msg", $this->upload->display_errors("", ""));
            redirect("");
        }
        return $this->upload->data("file_name");
    }
	public function uploadNda()
	{
		$data ['guest_id']    = $this->session->userdata('id');
		$data ['status']      = "uploaded";
		$data ['upload_date'] = date("Y-m-d H:i:s");
        if (!empty($_FILES["image"]["name"])) {
            $image                              = $this->_do_upload_nda();
            $data["nda"]                     =   $image;
        }
        $this->M_table->createTable("thc_nda", $data);
        redirect("Guest");
	}
    public function ourServices()
    {
		$id                 = $this->session->userdata('id');
        $data['user']       = $this->M_user->profile($id);
        $data["dataProject"]                    = $this->M_table->getAll("services");
        $this->load->view("guest/v_ourServices",$data);
    }
    public function quizz()
    {
        $answer['guest_id'] = $this->session->userdata('id');
		$answer['create_date'] = date("Y-m-d H:i:s");
		$answer['update_date'] = date("Y-m-d H:i:s");
        $i = 0;
        foreach ($this->M_table->getAll('thc_guest_question') as $key) {
            $answer['question_id'] = str_replace("'", "", $this->input->post('question_id'.$key['id']));
            $answer['description'] = str_replace("'", "", $this->input->post('textbox'.$key['id']));
            $answer['answer'] = $this->M_table->getById('thc_guest_answer_primary',$this->input->post('answer'.$key['id']))['answer'];
            $answer['status'] = $this->M_table->getById('thc_guest_answer_primary',$this->input->post('answer'.$key['id']))['valid'];
            if (!empty($_FILES['image']['name'][$i])) {
                $path = "assets/upload/question/".$_FILES['image']['name'][$i];
                copy($_FILES['image']['tmp_name'][$i], $path);
                $answer["files"]                     =  $_FILES['image']['name'][$i];
            } else{
                $answer["files"]                     =   "file tidak ada";
            }
            $this->M_table->createTable("thc_guest_answer", $answer);
            $i++;
        }
        redirect("Guest");
    }
    public function uploadThc()
    {
        for ($i=0; $i < 9; $i++) { 
            if(!empty($_FILES['image']['name'][$i])){
                $path = "assets/upload/thc/".$_FILES['image']['name'][$i];
                copy($_FILES['image']['tmp_name'][$i], $path);
                switch ($i) {
                    case 0:
                        $answer["lk_audited"]           = $_FILES['image']['name'][$i];
                        break;
                    case 1: 
                        $answer["gl"]                   = $_FILES['image']['name'][$i];
                        break;
                    case 4: 
                        $answer["spt_masa_ppn"]         = $_FILES['image']['name'][$i];
                        break;
                    case 3: 
                        $answer["spt_masa_pph"]         = $_FILES['image']['name'][$i];
                        break;
                    case 2: 
                        $answer["spt_tahunan"]          = $_FILES['image']['name'][$i];
                        break;
                    case 5: 
                        $answer["tp_doc"]               = $_FILES['image']['name'][$i];
                        break;
                    case 6: 
                        $answer["daftar_penyusutan"]    = $_FILES['image']['name'][$i];
                        break;
                    case 7: 
                        $answer["sp2dk"]    = $_FILES['image']['name'][$i];
                        break;
                    case 8: 
                        $answer["kertas_kerja_p"]    = $_FILES['image']['name'][$i];
                        break;
                }
            }
        }
        $answer["tahunan_check"]            =   $this->input->post("tahun_check");
        $answer["guest_id"]                 =  $this->session->userdata('id') ;
		$answer['create_date'] = date("Y-m-d H:i:s");
		$answer['update_date'] = date("Y-m-d H:i:s");
        $this->M_table->createTable("thc_guest", $answer);
        $data['thc_status_id']               = 2;
        $this->M_table->updateTable('thc_guest_status', $data, array('guest_id' => $this->session->userdata('id')));
        redirect('Guest');
    }
	public function training()
    {
		$id                 = $this->session->userdata('id');
        $data['user']       = $this->M_user->profile($id);
        $data["data_category"]                  = $this->M_table->getAll('content_training_category');
        $this->load->view("guest/v_training", $data);   
    }

    // ================== SCURITY ====================
    public function lock() {
        $id                                     = $this->session->userdata("key");
        $data["logout"]                         = date("Y-m-d H:i:s");
        $this->M_table->updateTable("history_login", $data, ["login" => $id]);
        $this->session->sess_destroy();
        $this->load->view("v_anonymous");
    }
    
}
?>