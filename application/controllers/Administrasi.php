<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrasi extends CI_Controller {
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
		if ($this->session->userdata('status_id') == 2) {
			redirect('Admin');
		}
		if ($this->session->userdata('status_id') == 6) {
			redirect('Guest');
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
		$this->load->view('administrasi/v_dashboard',$data);
	}
	public function profile(){
		$id                 = $this->session->userdata('id');
        $data['user']       = $this->M_user->profile($id);
        $data["dataUser"]                       = $this->M_user->profile($id);
        $data["country"]                        = $this->M_table->getAll("country");
		$this->load->view('administrasi/v_profile',$data);
	}
	public function processUpdatePassword() {
        $data["password"]                       = md5(str_replace("'", "", $this->input->post("password")));
        $data["update_date"]                    = date("Y-m-d H:i:s");
        $id                      = $this->input->post("user_id");
        $this->M_table->updateTable("user", $data, ["id" => $id]);
        redirect("Administrasi/profile");
    }
	public function contract(){
		$id                 = $this->session->userdata('id');
        $data['user']       = $this->M_user->profile($id);
        $data["dataOrder"]                      = $this->M_table->dataOrderAll();
		$this->load->view('administrasi/v_contract',$data);
	}
	public function detailContract(){
		$id                 = $this->session->userdata('id');
        $data['user']       = $this->M_user->profile($id);
		$order_id                                = str_replace("'", "", $this->uri->rsegment(3));
        if ($order_id == "") {
            redirect("Administrasi/Lock");
        } else {
            if (is_numeric($order_id)) {
                if ($this->M_table->totalByCon("order", "id", $order_id) == 0) {
                    redirect("Administrasi/Lock");
                } else {
					$data["dataContract"] = $this->M_administrasi->getContract($order_id);
					$data['order_id'] = $order_id;
                }
                $this->load->view("administrasi/v_detailContract", $data);
            } else {
                redirect("Administrasi/lock");
            }
        }
	}
	public function _do_upload_contract() {
        $image_name                             = time() . "-" . $_FILES["image"]["name"];
        $config["upload_path"]                  = "assets/upload/doc/";
        $config["allowed_types"]                = "pdf|jpg|png|jpeg|xlsx|doc|odt";
        $config["max_size"]                     = 10000;
        $config["max_widht"]                    = 15000;
        $config["max_height"]                   = 15000;
        $config["file_name"]                    = $image_name;
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload("image")) {
            $this->session->set_flashdata("msg", $this->upload->display_errors("", ""));
            redirect("");
        }
        return $this->upload->data("file_name");
    }
	public function processCreateContract()
	{
		$data                                   = [
		"message" => str_replace("'", "", $this->input->post("message")),
		"filename" => str_replace("'", "", $this->input->post("filename")),
		"order_id" => str_replace("'", "", $this->input->post("order_id"))
	];
	if (!empty($_FILES["image"]["name"])) {
		$image                              = $this->_do_upload_contract();
		$data["softfile"]                     = $image;
	}
	$this->M_table->createTable("employment_contract", $data);
	redirect("Administrasi/detailContract/" . str_replace("'", "", $this->input->post("order_id")));
	}
	public function deleteFile()
	{
		$id                                     = str_replace("'", "", $this->uri->rsegment(3));
        $data                                   = $this->M_table->getById("employment_contract", $id);
        if (file_exists("assets/upload/doc/" . $data["softfile"]) && $data["softfile"]) {
            unlink("assets/upload/doc/" . $data["softfile"]);
        }
        $this->M_table->deleteTable("employment_contract", $id);
		redirect('Administrasi/detailContract/'.str_replace("'", "", $this->uri->rsegment(4)));
		# code...
	}
	public function viewUpdateFile(){
		$id                 = $this->session->userdata('id');
        $data['user']       = $this->M_user->profile($id);
		$contract_id       	= str_replace("'", "", $this->uri->rsegment(3));
        if ($contract_id == "") {
            redirect("Administrasi/Lock");
        } else {
            if (is_numeric($contract_id)) {
                if ($this->M_table->totalByCon("employment_contract","id", $contract_id) == 0) {
                    redirect("Administrasi/Lock");
                }
					$data["dataContract"] = $this->M_table->getById('employment_contract',$contract_id);
					$data['order_id'] = $data["dataContract"]['order_id'];
                	$this->load->view("administrasi/v_updateContract", $data);
            } else {
                redirect("Administrasi/lock");
            }
        }
	}
	public function updateProfile() {
        $id                                     = $this->session->userdata("id");
        $data["name"]                           = str_replace("'", "", $this->input->post("name"));
        $data["position"]                       = str_replace("'", "", $this->input->post("position"));
        $data["email"]                          = str_replace("'", "", $this->input->post("email"));
        $data["phone"]                          = str_replace("'", "", $this->input->post("phone"));
        $data["NPWP"]                           = str_replace("'", "", $this->input->post("NPWP"));
        $data["NIK"]                            = str_replace("'", "", $this->input->post("NIK"));  
        $data["nationality"]                    = str_replace("'", "", $this->input->post("nationality"));
        $data["address"]                        = str_replace("'", "", $this->input->post("address"));
        $data["update_date"]                    = date("Y-m-d H:i:s");
		$this->M_table->updateTable("user", $data, ["id" => $id]);
        redirect("Administrasi/profile");
    }
	public function processUpdateContract() {
        $id                   = str_replace("'", "", $this->input->post("id")); 
        $data['filename']                   = str_replace("'", "", $this->input->post("filename")); 
        $data['message']                  = str_replace("'", "", $this->input->post("message"));

        if (!empty($_FILES["image"]["name"])) {
            $image                              = $this->_do_upload_contract();
            $upload                             = $this->M_table->getById("employment_contract", $id);
            if (file_exists("assets/upload/doc/" . $upload["softfile"]) && $upload["softfile"]) {
                unlink("assets/upload/doc/" . $upload["softfile"]);
            }
            $data["softfile"]                      = $image;
        }
        $this->M_table->updateTable("employment_contract", $data, ["id" => $id]);
        redirect("Administrasi/detailContract/".$upload['order_id']);
    }
    public function deleteFileOnly()
	{
		$id                                     = str_replace("'", "", $this->uri->rsegment(3));
        $data                                   = $this->M_table->getById("employment_contract", $id);
        if (file_exists("assets/upload/doc/" . $data["softfile"]) && $data["softfile"]) {
            unlink("assets/upload/doc/" . $data["softfile"]);
        }
		$data["softfile"]                      = "";
		$this->M_table->updateTable("employment_contract", $data, ["id" => $id]);
		redirect('Administrasi/detailContract/'.str_replace("'", "", $this->uri->rsegment(4)));
	}
	public function updateStatusFile()
	{
		$contract_id       	= str_replace("'", "", $this->uri->rsegment(3));
        if ($contract_id == "") {
            redirect("Administrasi/Lock");
        } else {
            if (is_numeric($contract_id)) {
                if ($this->M_table->totalByCon("employment_contract","id", $contract_id) == 0) {
                    redirect("Administrasi/Lock");
				}
				if ($this->M_table->getById('employment_contract',$contract_id)['sent_hardfile'] == "no") {
					$data['sent_hardfile'] = "yes";
					$data['sent_date'] = date("Y-m-d H:i:s");
				} else{
					$data['sent_hardfile'] = "no";
					$data['sent_date'] = NULL;
				}
				$this->M_table->updateTable("employment_contract", $data, ["id" => $contract_id]);
				redirect('Administrasi/detailContract/'.$this->M_table->getById('employment_contract',$contract_id)['order_id']);
            } else {
                redirect("Administrasi/lock");
            }
        }
	}
	public function receiveFile()
	{
		$contract_id       	= str_replace("'", "", $this->uri->rsegment(3));
        if ($contract_id == "") {
            redirect("Administrasi/Lock");
        } else {
            if (is_numeric($contract_id)) {
                if ($this->M_table->totalByCon("employment_contract","id", $contract_id) == 0) {
                    redirect("Administrasi/Lock");
				}
				if ($this->M_table->getById('employment_contract',$contract_id)['receive_hardfile'] == "no") {
					$data['receive_hardfile'] = "yes";
					$data['receive_date'] = date("Y-m-d H:i:s");
				} else{
					$data['receive_hardfile'] = "no";
					$data['receive_date'] = NULL;
				}
				$this->M_table->updateTable("employment_contract", $data, ["id" => $contract_id]);
				redirect('Administrasi/detailContract/'.$this->M_table->getById('employment_contract',$contract_id)['order_id']);
            } else {
                redirect("Administrasi/lock");
            }
        }
	}

	 // =========== INVOICE ============

	public function invoice()
	{
		$id                 = $this->session->userdata('id');
        $data['user']       = $this->M_user->profile($id);
        $data["dataOrder"]                      = $this->M_table->dataOrderAll();
		$this->load->view('administrasi/v_invoice',$data);
	}
	public function detailInvoice()
	{
		$id                 = $this->session->userdata('id');
        $data['user']       = $this->M_user->profile($id);
		$order_id                                = str_replace("'", "", $this->uri->rsegment(3));
        if ($order_id == "") {
            redirect("Administrasi/Lock");
        } else {
            if (is_numeric($order_id)) {
                if ($this->M_table->totalByCon("order", "id", $order_id) == 0) {
                    redirect("Administrasi/Lock");
                } else {
					$data["dataInvoice"] = $this->M_administrasi->getInvoice($order_id);
					$data["dataFile"] = $this->M_table->dataTableWhere('proof_of_payment','order_id',$order_id);
					$data['order_id'] = $order_id;
                }
                $this->load->view("administrasi/v_detailInvoice", $data);
            } else {
                redirect("Administrasi/lock");
            }
        }
	}
    public function deletePaymentOnly()
	{
		$id                                     = str_replace("'", "", $this->uri->rsegment(3));
        $data                                   = $this->M_table->getById("proof_of_payment", $id);
        if (file_exists("assets/upload/doc/" . $data["softfile"]) && $data["softfile"]) {
            unlink("assets/upload/doc/" . $data["softfile"]);
        }
		$data["softfile"]                      = "";
		$this->M_table->updateTable("proof_of_payment", $data, ["id" => $id]);
		redirect('Administrasi/detailContract/'.str_replace("'", "", $this->uri->rsegment(4)));
	}
	public function _do_upload_invoice() {
        $image_name                             = time() . "-" . $_FILES["image"]["name"];
        $config["upload_path"]                  = "assets/upload/invoice/";
        $config["allowed_types"]                = "pdf|jpg|png|jpeg|xlsx|doc|odt";
        $config["max_size"]                     = 10000;
        $config["max_widht"]                    = 15000;
        $config["max_height"]                   = 15000;
        $config["file_name"]                    = $image_name;
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload("image")) {
            $this->session->set_flashdata("msg", $this->upload->display_errors("", ""));
            exit();
            redirect("");
        }
        return $this->upload->data("file_name");
    }
	public function processCreateInvoice()
	{
		$data                                   = [
		"message" => str_replace("'", "", $this->input->post("message")),
		"filename" => str_replace("'", "", $this->input->post("filename")),
		"order_id" => str_replace("'", "", $this->input->post("order_id"))
	];
	if (!empty($_FILES["image"]["name"])) {
		$image                              = $this->_do_upload_invoice();
		$data["softfile"]                     = $image;
	}
	$this->M_table->createTable("invoice", $data);
	redirect("Administrasi/detailInvoice/" . str_replace("'", "", $this->input->post("order_id")));
	}
	public function deleteInvoice()
	{
		$id                                     = str_replace("'", "", $this->uri->rsegment(3));
        $data                                   = $this->M_table->getById("invoice", $id);
        if (file_exists("assets/upload/invoice/" . $data["softfile"]) && $data["softfile"]) {
            unlink("assets/upload/invoice/" . $data["softfile"]);
        }
        $this->M_table->deleteTable("invoice", $id);
		redirect('Administrasi/detailInvoice/'.str_replace("'", "", $this->uri->rsegment(4)));
		# code...
	}
    public function turnFix()
	{
		$contract_id       	= str_replace("'", "", $this->uri->rsegment(3));
        if ($contract_id == "") {
            redirect("Administrasi/Lock");
        } else {
            if (is_numeric($contract_id)) {
                if ($this->M_table->totalByCon("employment_contract","id", $contract_id) == 0) {
                    redirect("Administrasi/Lock");
				}
				if ($this->M_table->getById('employment_contract',$contract_id)['status'] == "do") {
					$data['status'] = "done";
				} else{
					$data['status'] = "do";
				}
				$this->M_table->updateTable("employment_contract", $data, ["id" => $contract_id]);
				redirect('Administrasi/detailContract/'.$this->M_table->getById('employment_contract',$contract_id)['order_id']);
            } else {
                redirect("Administrasi/lock");
            }
        }
	}
	public function updateStatusInvoice()
	{
		$contract_id       	= str_replace("'", "", $this->uri->rsegment(3));
        if ($contract_id == "") {
            redirect("Administrasi/Lock");
        } else {
            if (is_numeric($contract_id)) {
                if ($this->M_table->totalByCon("invoice","id", $contract_id) == 0) {
                    redirect("Administrasi/Lock");
				}
				if ($this->M_table->getById('invoice',$contract_id)['sent_hardfile'] == "no") {
					$data['sent_hardfile'] = "yes";
					$data['sent_date'] = date("Y-m-d H:i:s");
				} else{
					$data['sent_hardfile'] = "no";
					$data['sent_date'] = NULL;
				}
				$this->M_table->updateTable("invoice", $data, ["id" => $contract_id]);
				redirect('Administrasi/detailInvoice/'.$this->M_table->getById('invoice',$contract_id)['order_id']);
            } else {
                redirect("Administrasi/lock");
            }
        }
	}
	public function viewUpdateInvoice(){
		$id                 = $this->session->userdata('id');
        $data['user']       = $this->M_user->profile($id);
		$contract_id       	= str_replace("'", "", $this->uri->rsegment(3));
        if ($contract_id == "") {
            redirect("Administrasi/Lock");
        } else {
            if (is_numeric($contract_id)) {
                if ($this->M_table->totalByCon("invoice","id", $contract_id) == 0) {
                    redirect("Administrasi/Lock");
                }
					$data["dataContract"] = $this->M_table->getById('invoice',$contract_id);
					$data['order_id'] = $data["dataContract"]['order_id'];
                	$this->load->view("administrasi/v_updateInvoice", $data);
            } else {
                redirect("Administrasi/lock");
            }
        }
	}
	public function processUpdateInvoice() {
        $id                   = str_replace("'", "", $this->input->post("id")); 
        $data['filename']                   = str_replace("'", "", $this->input->post("filename")); 
        $data['message']                  = str_replace("'", "", $this->input->post("message"));

        if (!empty($_FILES["image"]["name"])) {
            $image                              = $this->_do_upload_invoice();
            $upload                             = $this->M_table->getById("invoice", $id);
            if (file_exists("assets/upload/invoice/" . $upload["softfile"]) && $upload["softfile"]) {
                unlink("assets/upload/invoice/" . $upload["softfile"]);
            }
            $data["softfile"]                      = $image;
        }
        $this->M_table->updateTable("invoice", $data, ["id" => $id]);
        redirect("Administrasi/detailInvoice/".$upload['order_id']);
    }
    // ================== SCURITY ====================
    public function lock() {
        $id                                     = $this->session->userdata("key");
        $data["logout"]                         = date("Y-m-d H:i:s");
        $this->M_table->updateTable("history_login", $data, ["login" => $id]);
        $this->session->sess_destroy();
        $this->load->view("v_anonymous");
    }
    
    // ================== Cliet Files ====================

    public function file()
	{
		$id                 = $this->session->userdata('id');
        $data['user']       = $this->M_user->profile($id);
        $data["dataOrder"]                      = $this->M_table->dataOrderAll();
		$this->load->view('administrasi/v_file',$data);
	}
	public function detailFile()
	{
		$id                 = $this->session->userdata('id');
        $data['user']       = $this->M_user->profile($id);
		$order_id                                = str_replace("'", "", $this->uri->rsegment(3));
        if ($order_id == "") {
            redirect("Client/Lock");
        } else {
            if (is_numeric($order_id)) {
                if ($this->M_table->totalByCon("order", "id", $order_id) == 0) {
                    redirect("Client/Lock");
                } else {
					$data["dataFile"] = $this->M_administrasi->getFile($order_id);
					$data['order_id'] = $order_id;
                }
				$this->load->view('administrasi/v_detailFile',$data);
            } else {
                redirect("Client/lock");
            }
        }
	}
}
?>