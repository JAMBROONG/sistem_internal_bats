<?php
defined("BASEPATH") or exit("No direct script access allowed");
class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata("status") != "login") {
            redirect("Login");
        }
        if ($this->session->userdata("status_id") == 4) {
            redirect("Employee");
        }
        if ($this->session->userdata("status_id") == 3) {
            redirect("SuperAdmin");
        }
        if ($this->session->userdata('status_id') == 5) {
            redirect('Administrasi');
        }
        if ($this->session->userdata('status_id') == 6) {
            redirect('Guest');
        }
        if ($this->session->userdata("status_id") == 1) {
            redirect("Client");
        }
        if (time() - $this->session->userdata("last_login_time") > 43200) {
            $id = $this->session->userdata('key');
            $data['logout'] = date("Y-m-d H:i:s");
            $this->M_table->updateTable('history_login', $data, array('login' => $id));
            redirect("Logout");
        }
        $_SESSION["last_login_time"] = time();
    }
    public function validateId($tbl, $int) {
        if ($int == "") {
            redirect("Admin/lock");
        } else {
            if (is_numeric($int)) {
                if ($this->M_table->totalByCon($tbl, "id", $int) == 0) {
                    redirect('Admin/lock');
                } else {
                    return true;
                }
            } else {
                redirect("Admin/lock");
            }
        }
    }
    public function getReport($id)
    {
        $date = date('Y-m');
		$date = "'$date'";
        $con = 'employee_id = '.$id.' AND planing != "" AND DATE_FORMAT(date, "%Y-%m") = ' . $date;
        $finish = $this->M_employee->getTotalTableCon("dailyreport",$con);
        if ($finish == 0) {
            return 0;
        } else{
            return $finish/2;
        }
    }
    public function index() {
        $data["user"]                 = $this->M_user->profile($this->session->userdata("id"));
        $data["totalClient"]          = $this->M_table->totalDataTableWhere("user", "status_id", 1);
        $data["totalGuest"]          = $this->M_table->totalDataTableWhere("user", "status_id", 6);
        $data["totalProject"]         = $this->M_table->getTotalData("services");
        $data["totalEmployee"]        = $this->M_table->getTotalData("employee");
        $data["totalCompany"]         = $this->M_table->getTotalData("company");
        $data['orderDo']              = $this->M_table->totalStatusOrderAll(1);
        $data['orderDone']            = $this->M_table->totalStatusOrderAll(2);
        $data['orderCancel']          = $this->M_table->totalStatusOrderAll(3);
        $data['news']                 = $this->M_table->getAll('news order by create_date desc');
        $data['reportToday']          = $this->M_employee->dR_AD(date('Y-m-d'));
        $data["timeDailyReport"]      = [];
        foreach ($this->M_table->getAll('employee') as $val) {
            $newdata =  array (
                'name' => $val['employee_name'],
                'value' => $this->getReport($val['id']),
                'bulletSettings' =>  array (
                    'src' => base_url() . 'assets/upload/images/employee/' . $val['image']
                )
              );
            array_push($data["timeDailyReport"],$newdata);
        }
        function compare_nilai($a, $b) { 
            if($a['value'] == $b['value']) {
                return 0;
            } 
            return ($a['value'] > $b['value']) ? -1 : 1;
        }
        usort($data['timeDailyReport'], 'compare_nilai');
        $data['timeDailyReportAll']   = $data['timeDailyReport'];
        $data['timeDailyReport']      = array_slice($data['timeDailyReport'],0,5);
        $data['orderAll']             = $data['orderDo'] + $data['orderDone'] + $data['orderCancel'];
        $data['dataTask']     = $this->M_table->getAllTaskLastMonth();
        $this->load->view("admin/v_dashboard", $data);
    }
    public function addCategory_service() {
        $data['category_service'] = str_replace("'", "", $this->input->post("category"));
        $data["create_date"] = date("Y-m-d H:i:s");
        $data["update_date"] = date("Y-m-d H:i:s");
        $this->M_table->createTable('categoryservice', $data);
        redirect('Admin/dataProject');
    }
    // ============== USER =============
    public function dataUser() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["totalAdministrasi"] = $this->M_table->totalDataTableWhere("user", "status_id", 5 . " AND user_to_company_id = " . $this->session->userdata('from'));
        $data["totalClient"] = $this->M_table->totalDataTableWhere("user", "status_id", 1 . " AND user_to_company_id = " . $this->session->userdata('from'));
        $data["totalAdmin"] = $this->M_table->totalDataTableWhere("user", "status_id", 2 . " AND user_to_company_id = " . $this->session->userdata('from'));
        $data["totalEmployee"] = $this->M_table->getTotalData("employee" . " where company_id = " . $this->session->userdata('from'));
        $this->load->view("admin/v_dataUser", $data);
    }
    public function dataAdministrasi() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["country"] = $this->M_table->getAll("country");
        $data["dataAdministrasi"] = $this->M_user->getByWhere("status_id", 5);
        $this->load->view("admin/v_dataAdministrasi", $data);
    }
    public function dataClient() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["dataClient"] = $this->M_user->getByWhere("status_id", 1);
        $this->load->view("admin/v_dataClient", $data);
    }
    public function deleteClient() {
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('user', $id);
        $name = $this->M_table->getByCon("user", "id", $id) ["name"];
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Delete User name : " . $name, "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $order_id = $this->M_table->dataTableWhere("order", "user_id", $id);
        foreach ($order_id as $key) {
            $this->M_table->deleteTableCon("order", "id", $key["id"]);
            $this->M_table->deleteTableCon("order_staff", "order_id", $key["id"]);
            $this->M_table->deleteTableCon("order_step", "order_id", $key["id"]);
            $this->M_table->deleteTableCon("data", "order_id", $key["id"]);
            $this->M_table->deleteTableCon("chatt", "order_id", $key["id"]);
            foreach ($this->M_table->getByCon("process", "order_id", $key["id"]) as $row) {
                $this->M_table->deleteTableCon("process_report", "process_id", $row['id']);
            }
            $id_output = $this->M_table->getByCon("output", "order_id", $key["id"]);
            $this->M_table->deleteTableCon("output", "order_id", $key["id"]);
            $this->M_table->deleteTableCon("meeting", "output_id", $id_output["id"]);
            $this->M_table->deleteTableCon("process", "order_id", $key["id"]);
        }
        $this->M_table->deleteTable("user", $id);
        redirect("Admin/dataClient");
    }
    public function updateClient() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $id_user = str_replace("'", "", $this->uri->rsegment(3));
        if ($id_user == "") {
            redirect("Admin/Lock");
        } else {
            if (is_numeric($id_user)) {
                if ($this->M_table->totalByCon("user", "id", $id_user) == 0) {
                    redirect("Admin/Lock");
                } else {
                    $data["validate"] = true;
                    $data["dataClient"] = $this->M_user->profile($id_user);
                    $data["company"] = $this->M_table->getAll("company");
                    $data["country"] = $this->M_table->getAll("country");
                }
                $this->load->view("admin/v_updateClient", $data);
            } else {
                redirect("Admin/lock");
            }
        }
    }
    public function processUpdateClient() {
        $id = str_replace("'", "", $this->input->post("user_id"));
        $data["name"] = str_replace("'", "", $this->input->post("name"));
        $data["position"] = str_replace("'", "", $this->input->post("position"));
        $data["email"] = str_replace("'", "", $this->input->post("email"));
        $data["phone"] = str_replace("'", "", $this->input->post("phone"));
        $data["NPWP"] = str_replace("'", "", $this->input->post("NPWP"));
        $data["user_to_company_id"] = str_replace("'", "", $this->input->post("user_to_company_id"));
        $data["NIK"] = str_replace("'", "", $this->input->post("NIK"));
        $data["nationality"] = str_replace("'", "", $this->input->post("nationality"));
        $data["company_id"] = str_replace("'", "", $this->input->post("company_id"));
        if (!empty($_FILES["image"]["name"])) {
            $image = $this->_do_upload_client();
            $upload = $this->M_table->getById("user", $id);
            if (file_exists("assets/upload/images/client/" . $upload["image"]) && $upload["image"]) {
                unlink("assets/upload/images/client/" . $upload["image"]);
            }
            $data["image"] = $image;
        }
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Update User name : " . $data["name"], "action_date" => date("Y-m-d H:i:s") ];
        $this->M_table->createTable("history_action_admin", $action);
        $data["address"] = str_replace("'", "", $this->input->post("address"));
        $data["update_date"] = date("Y-m-d H:i:s");
        $this->M_table->updateTable("user", $data, ["id" => $id]);
        redirect("Admin/updateClient/" . $id);
    }
    public function processUpdatePersonResponsible() {
        $id = str_replace("'", "", $this->input->post("user_id"));
        $data["name"] = str_replace("'", "", $this->input->post("name"));
        $data["position"] = str_replace("'", "", $this->input->post("position"));
        $data["email"] = str_replace("'", "", $this->input->post("email"));
        $data["phone"] = str_replace("'", "", $this->input->post("phone"));
        $data["NPWP"] = str_replace("'", "", $this->input->post("NPWP"));
        $data["NIK"] = str_replace("'", "", $this->input->post("NIK"));
        $data["nationality"] = str_replace("'", "", $this->input->post("nationality"));
        $data["address"] = str_replace("'", "", $this->input->post("address"));
        $data["update_date"] = date("Y-m-d H:i:s");
        $this->M_table->updateTable("person_responsible", $data, ["user_id" => $id, ]);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Update Person Responsible : " . $data["name"], "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        redirect("Admin/updateClient/" . $id);
    }
    public function createClient() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["company"] = $this->M_table->getAll("company");
        $data["country"] = $this->M_table->getAll("country");
        $this->load->view("admin/v_createClient", $data);
    }
    public function processCreateClient() {
        $data["name"] = str_replace("'", "", $this->input->post("name"));
        $data["position"] = str_replace("'", "", $this->input->post("position"));
        $data["email"] = str_replace("'", "", $this->input->post("email"));
        $data["password"] = md5(str_replace("'", "", $this->input->post("password")));
        $data["phone"] = str_replace("'", "", $this->input->post("phone"));
        $data["NPWP"] = str_replace("'", "", $this->input->post("NPWP"));
        $data["user_to_company_id"] = str_replace("'", "", $this->input->post("user_to_company_id"));
        $data["NIK"] = str_replace("'", "", $this->input->post("NIK"));
        $data["nationality"] = str_replace("'", "", $this->input->post("nationality"));
        $data["company_id"] = str_replace("'", "", $this->input->post("company_id"));
        // print_r($data); exit();
        if (!empty($_FILES["image"]["name"])) {
            $image = $this->_do_upload_client();
            $data["image"] = $image;
        }
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Create User : " . $data["name"], "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $data["address"] = str_replace("'", "", $this->input->post("address"));
        $data["status_id"] = 1;
        $data["create_date"] = date("Y-m-d H:i:s");
        $data["update_date"] = date("Y-m-d H:i:s");
        $this->M_table->createTable("user", $data);
        redirect("Admin/dataClient");
    }
    //============ tax guest ============
    public function guestTHC() {
        $id = str_replace("'", "", $this->uri->rsegment(3));
        if ($id) {
            $this->validateId('user', $id);
            $data["client"] = $this->M_user->profile($id);
            $data["thc"] = $this->M_table->getByCon('thc_guest', 'guest_id', $id);
            $data['thc_guest_status'] = $this->M_guest->thc_guest_status($id);
            $data['thc_guest'] = $this->M_guest->thc_guest($id);
            $data['thc_guest_answer'] = $this->M_guest->thc_guest_answer($id);
            $data['thc_status'] = $this->M_table->getAll('thc_status');
            $data['thc_report'] = $this->M_table->dataTableWhere('thc_report', 'guest_id', $id);
            $data['thc_nda'] = $this->M_table->dataTableWhere('thc_nda', 'guest_id', $id);
            $data['thc_meeting'] = $this->M_table->dataTableWhere('thc_meeting', 'guest_id', $id);
            $id = $this->session->userdata("id");
            $data["user"] = $this->M_user->profile($id);
            $this->load->view("admin/components/guest-document", $data);
        } else {
            $id = $this->session->userdata("id");
            $data["user"] = $this->M_user->profile($id);
            $data["dataClient"] = $this->M_user->getByWhere("status_id", 6);
            $this->load->view("Admin/v_guestTHC", $data);
        }
    }
    public function updateStatusThc() {
        $id = $this->input->post("id");
        $data['thc_status_id'] = str_replace("'", "", $this->input->post("status"));
        $this->M_table->updateTable('thc_guest_status', $data, array('guest_id' => $id));
        redirect('Admin/guestTHC/' . $id);
    }
    public function addReportThc() {
        $id = $this->input->post("guest_id");
        $data['title'] = str_replace("'", "", $this->input->post("title"));
        $data['description'] = str_replace("'", "", $this->input->post("description"));
        $data['guest_id'] = $id;
        $data["create_date"] = date("Y-m-d H:i:s");
        $data["update_date"] = date("Y-m-d H:i:s");
        $path = "assets/upload/thc/report/" . time() . "-" . $_FILES['image']['name'];
        copy($_FILES['image']['tmp_name'], $path);
        $data["report"] = time() . "-" . $_FILES['image']['name'];
        $this->M_table->createTable("thc_report", $data);
        redirect('Admin/guestTHC/' . $id);
    }
    public function addMeetingThc() {
        $id = $this->input->post("guest_id");
        $data['title'] = str_replace("'", "", $this->input->post("title"));
        $data['description'] = str_replace("'", "", $this->input->post("description"));
        $data['link'] = str_replace("'", "", $this->input->post("link"));
        $data['meet'] = str_replace("'", "", $this->input->post("meet"));
        $data['date'] = str_replace("'", "", $this->input->post("date"));
        $data['guest_id'] = $id;
        $data["create_date"] = date("Y-m-d H:i:s");
        $data["update_date"] = date("Y-m-d H:i:s");
        $this->M_table->createTable("thc_meeting", $data);
        redirect('Admin/guestTHC/' . $id);
    }
    public function deleteReportThc() {
        $this->validateId('thc_report', $this->uri->rsegment(3));
        $this->M_table->deleteTable('thc_report', $this->uri->rsegment(3));
        redirect('Admin/guestTHC/' . $this->uri->rsegment(4));
    }
    public function deleteMeetingThc() {
        $this->validateId('thc_meeting', $this->uri->rsegment(3));
        $this->M_table->deleteTable('thc_meeting', $this->uri->rsegment(3));
        redirect('Admin/guestTHC/' . $this->uri->rsegment(4));
    }
    public function deleteNDAThc() {
        $this->validateId('thc_nda', $this->uri->rsegment(3));
        $this->validateId('user', $this->uri->rsegment(4));
        $data = $this->M_table->getByCon('thc_nda', 'id', $this->uri->rsegment(3));
        if (file_exists("assets/upload/nda/" . $data['nda'])) {
            unlink("assets/upload/nda/" . $data['nda']);
        }
        $this->M_table->deleteTable('thc_nda', $this->uri->rsegment(3));
        redirect('Admin/guestTHC/' . $this->uri->rsegment(4));
    }
    public function deleteAnswer() {
        $this->validateId('user', $this->uri->rsegment(3));
        $data = $this->M_table->dataTableWhere('thc_guest_answer', 'guest_id', $this->uri->rsegment(3));
        foreach ($data as $key) {
            if (file_exists("assets/upload/question/" . $key['files'])) {
                unlink("assets/upload/question/" . $key['files']);
            }
        }
        $this->M_table->deleteTableCon('thc_guest_answer', 'guest_id', $this->uri->rsegment(3));
        redirect('Admin/guestTHC/' . $this->uri->rsegment(3));
    }
    public function deleteFilesThc() {
        $this->validateId('user', $this->uri->rsegment(3));
        $data = $this->M_table->getByCon('thc_guest', 'guest_id', $this->uri->rsegment(3));
        if (file_exists("assets/upload/nda/" . $data['lk_audited'])) {
            unlink("assets/upload/nda/" . $data['lk_audited']);
        }
        if (file_exists("assets/upload/nda/" . $data['gl'])) {
            unlink("assets/upload/nda/" . $data['gl']);
        }
        if (file_exists("assets/upload/nda/" . $data['spt_masa_ppn'])) {
            unlink("assets/upload/nda/" . $data['spt_masa_ppn']);
        }
        if (file_exists("assets/upload/nda/" . $data['spt_masa_pph'])) {
            unlink("assets/upload/nda/" . $data['spt_masa_pph']);
        }
        if (file_exists("assets/upload/nda/" . $data['spt_tahunan'])) {
            unlink("assets/upload/nda/" . $data['spt_tahunan']);
        }
        if (file_exists("assets/upload/nda/" . $data['tp_doc'])) {
            unlink("assets/upload/nda/" . $data['tp_doc']);
        }
        if (file_exists("assets/upload/nda/" . $data['daftar_penyusutan'])) {
            unlink("assets/upload/nda/" . $data['daftar_penyusutan']);
        }
        if (file_exists("assets/upload/nda/" . $data['sp2dk'])) {
            unlink("assets/upload/nda/" . $data['sp2dk']);
        }
        if (file_exists("assets/upload/nda/" . $data['kertas_kerja_p'])) {
            unlink("assets/upload/nda/" . $data['kertas_kerja_p']);
        }
        $this->M_table->deleteTableCon('thc_guest', 'guest_id', $this->uri->rsegment(3));
        redirect('Admin/guestTHC/' . $this->uri->rsegment(3));
    }
    // ============ ADMIN ============
    public function dataAdmin() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["dataAdmin"] = $this->M_user->getByWhere("status_id", 2);
        $this->load->view("admin/v_dataAdmin", $data);
    }
    public function detailAdmin() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $id_user = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('user', $id_user);
        $data["validate"] = true;
        $data["dataClient"] = $this->M_user->profile($id_user);
        $this->load->view("admin/v_detailAdmin", $data);
    }
    // ============ PASSWORD ============
    public function updatePassword() {
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $data["user"] = $this->M_user->profile($this->session->userdata("id"));
        $this->validateId('user', $id);
        $data["validate"] = true;
        $data["id"] = $id;
        $data["client"] = $this->M_table->getById("user", $id);
        $this->load->view("admin/v_updatePassword", $data);
    }
    public function processUpdatePassword() {
        $data["password"] = md5(str_replace("'", "", $this->input->post("password")));
        $data["update_date"] = date("Y-m-d H:i:s");
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('user', $id);
        $name = $this->M_table->getByCon("user", "id", $id) ["name"];
        $this->M_table->updateTable("user", $data, ["id" => $id]);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Update Password User : " . $name, "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        if ($this->M_table->getByCon("user", "id", $id) ['status_id'] == 5) {
            redirect("Admin/dataAdministrasi");
        } else {
            redirect("Admin/dataClient");
        }
    }
    public function updatePasswordA() {
        $id = $this->session->userdata("id");
        $this->validateId('user', $id);
        $data["validate"] = true;
        $data["id"] = $id;
        $data["user"] = $this->M_user->profile($id);
        $this->load->view("admin/v_updatePasswordA", $data);
    }
    public function processUpdatePasswordA() {
        $data["password"] = md5(str_replace("'", "", $this->input->post("password")));
        $data["update_date"] = date("Y-m-d H:i:s");
        $id = $this->session->userdata("id");
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Update Password", "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->updateTable("user", $data, ["id" => $id]);
        redirect("Admin/profile");
    }
    public function processUpdatePasswordE() {
        $data["password"] = md5(str_replace("'", "", $this->input->post("password")));
        $data["update_date"] = date("Y-m-d H:i:s");
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('employee', $id);
        $name = $this->M_table->getByCon("employee", "id", $id) ["employee_name"];
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Update Password Employee : " . $name, "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->updateTable("employee", $data, ["id" => $id]);
        redirect("Admin/detailEmployee/" . $id);
    }
    // ============ EMPLOYEE ============
    public function dataEmployee() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["dataEmployee"] = $this->M_table->getEmployee();
        $this->load->view("admin/v_dataEmployee", $data);
    }
    public function deleteEmployee() {
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('employee', $id);
        $upload = $this->M_table->getById("employee", $id);
        if (file_exists("assets/upload/images/employee/" . $upload["image"]) && $upload["image"]) {
            unlink("assets/upload/images/employee/" . $upload["image"]);
        }
        $name = $this->M_table->getByCon("user", "id", $id) ["name"];
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Delete Employee : " . $name, "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->deleteTable("employee", $id);
        redirect("Admin/dataEmployee");
    }
    public function detailEmployee() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $id_user = $this->uri->rsegment(3);
        $this->validateId('employee', $id_user);
        $data["validate"] = true;
        $data["dataEmployee"] = $this->M_table->getEmployeeById($id_user);
        $data["position"] = $this->M_table->getAll("position");
        $data["resume"] = $this->M_employee->getResume($id_user);
        $data["sub_resume"] = $this->M_employee->getSubResume($id_user);
        $data["sr"] = $this->M_table->getAll('sub_resume');
        $data["company"] = $this->M_table->getAll('company');
        $data["scr"] = $this->M_table->getAll('sub_category_resume');
        $this->load->view("admin/v_detailEmployee", $data);
    }
    public function processUpdateEmployee() {
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('employee', $id);
        $data = ["employee_name" => str_replace("'", "", $this->input->post("name")), "phone" => str_replace("'", "", $this->input->post("phone")), "email" => str_replace("'", "", $this->input->post("email")), "gender" => str_replace("'", "", $this->input->post("gender")), "company_id" => str_replace("'", "", $this->input->post("company_id")), "position" => str_replace("'", "", $this->input->post("position")), "status_id" => str_replace("'", "", $this->input->post("status_id")), "address" => str_replace("'", "", $this->input->post("address")), "date_of_birth" => str_replace("'", "", $this->input->post("birth")), "update_date" => date("Y-m-d H:i:s") ];
        if (!empty($_FILES["image"]["name"])) {
            $image = $this->_do_upload_employee();
            $upload = $this->M_table->getById("employee", $id);
            if (file_exists("assets/upload/images/employee/" . $upload["image"]) && $upload["image"]) {
                unlink("assets/upload/images/employee/" . $upload["image"]);
            }
            $data["image"] = $image;
        }
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Update Employee : " . $data["employee_name"], "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->updateTable("employee", $data, ["id" => $id]);
        redirect("Admin/detailEmployee/" . $id);
    }
    public function updatePasswordEmployee() {
        $id = $this->session->userdata("id");
        $employee_id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('employee', $employee_id);
        $data["user"] = $this->M_user->profile($id);
        $data["validate"] = true;
        $data["employee"] = $this->M_table->getEmployeeById($employee_id);
        $data["id"] = $this->M_table->getEmployeeById($employee_id) ["id"];
        $this->load->view("admin/v_updatePasswordEmployee", $data);
    }
    public function createEmployee() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["status"] = $this->M_table->getAll("position");
        $data["company"] = $this->M_table->getAll("company");
        $this->load->view("admin/v_createEmployee", $data);
    }
    public function processCreateEmployee() {
        $data = ["employee_name" => str_replace("'", "", $this->input->post("name")), "phone" => str_replace("'", "", $this->input->post("phone")), "gender" => str_replace("'", "", $this->input->post("gender")), "position" => str_replace("'", "", $this->input->post("position")), "address" => str_replace("'", "", $this->input->post("address")), "email" => str_replace("'", "", $this->input->post("email")), "password" => md5(str_replace("'", "", $this->input->post("password"))), "status_id" => str_replace("'", "", $this->input->post("status_id")), "date_of_birth" => str_replace("'", "", $this->input->post("birth")), "login_status_id" => 4, "company_id" => str_replace("'", "", $this->input->post("company_id")), "date_of_birth" => str_replace("'", "", $this->input->post("birth")), "update_date" => date("Y-m-d H:i:s"), "create_date" => date("Y-m-d H:i:s"), ];
        if (!empty($_FILES["image"]["name"])) {
            $image = $this->_do_upload_employee();
            $data["image"] = $image;
        }
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Delete Employee : " . $data['employee_name'], "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_upload->insertEmployee($data);
        redirect("Admin/dataEmployee");
    }
    // ==================== PROFILE ====================
    public function profile() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["dataUser"] = $this->M_user->profile($id);
        $data["country"] = $this->M_table->getAll("country");
        $data["resume"] = $this->M_table->getResume($id);
        $data["sub_resume"] = $this->M_table->getSubResume($id);
        $data["sr"] = $this->M_table->getAll('sub_resume');
        $data["scr"] = $this->M_table->getAll('sub_category_resume');
        $this->load->view("admin/v_profile", $data);
    }
    public function updateProfile() {
        $id = $this->session->userdata('id');
        $data['name'] = addslashes($this->input->post('name'));
        $data['phone'] = addslashes($this->input->post('phone'));
        $data['email'] = addslashes($this->input->post('email'));
        $data['address'] = addslashes($this->input->post('address'));
        $data['NPWP'] = addslashes($this->input->post('NPWP'));
        $data['NIK'] = addslashes($this->input->post('NIK'));
        $data['position'] = addslashes($this->input->post('position'));
        $data['nationality'] = addslashes($this->input->post('nationality'));
        if (!empty($_FILES["image"]["name"])) {
            $image = $this->_do_upload_profile();
            $upload = $this->M_table->getById("user", $id);
            if (file_exists("assets/upload/images/admin/" . $upload["image"]) && $upload["image"]) {
                unlink("assets/upload/images/admin/" . $upload["image"]);
            }
            $data["image"] = $image;
        }
        $data['update_date'] = date("Y-m-d H:i:s");
        $this->M_table->updateTable('user', $data, array('id' => $id));
        redirect('Admin/profile');
    }
    public function _do_upload_profile() {
        $image_name = time() . "-" . $_FILES["image"]["name"];
        $config["upload_path"] = "assets/upload/images/admin/";
        $config["allowed_types"] = "jpg|png|jpeg";
        $config["max_size"] = 1000;
        $config["max_widht"] = 1500;
        $config["max_height"] = 1500;
        $config["file_name"] = $image_name;
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload("image")) {
            $this->session->set_flashdata("msg", $this->upload->display_errors("", ""));
            redirect("");
        }
        return $this->upload->data("file_name");
    }
    public function processCreateResume() {
        $data = ["user_id" => $this->session->userdata("id"), "update_date" => date("Y-m-d H:i:s"), "create_date" => date("Y-m-d H:i:s") ];
        if (!empty($_FILES["image"]["name"])) {
            $image = $this->_do_upload_resume();
            $data["image"] = $image;
        }
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Delete Employee : " . $data['employee_name'], "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->createTable('resume', $data);
        redirect("Admin/profile");
    }
    public function processUpdateResume() {
        $id = str_replace("'", "", $this->input->post("resume_id"));
        $data["update_date"] = date("Y-m-d H:i:s");
        if (!empty($_FILES["image"]["name"])) {
            $image = $this->_do_upload_resume();
            $upload = $this->M_table->getById("resume", $id);
            if (file_exists("assets/upload/images/resume/" . $upload["image"]) && $upload["image"]) {
                unlink("assets/upload/images/resume/" . $upload["image"]);
            }
            $data["image"] = $image;
        }
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Update Image Resume", "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->updateTable("resume", $data, ["id" => $id]);
        redirect("Admin/profile");
    }
    public function processCreateCategory() {
        $data = ["subCategory" => str_replace("'", "", $this->input->post("subCategory")) ];
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Create sub Category Resume : " . $data['subCategory'], "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->createTable('sub_category_resume', $data);
        redirect("Admin/profile");
    }
    public function processCreateSubR() {
        $data = ["subCategory_id" => str_replace("'", "", $this->input->post("subCategory_id")), "resume_id" => str_replace("'", "", $this->input->post("resume_id")), "date" => str_replace("'", "", $this->input->post("date")), "subResume" => str_replace("'", "", $this->input->post("subResume")), "update_date" => date("Y-m-d H:i:s"), "create_date" => date("Y-m-d H:i:s"), ];
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Create sub Resume : " . $data['subResume'], "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->createTable('sub_resume', $data);
        redirect("Admin/profile");
    }
    public function processUpdateSubR() {
        $id = str_replace("'", "", $this->input->post("id"));
        $data = ["subCategory_id" => str_replace("'", "", $this->input->post("subCategory_id")), "date" => str_replace("'", "", $this->input->post("date")), "subResume" => str_replace("'", "", $this->input->post("subResume")), "update_date" => date("Y-m-d H:i:s") ];
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Update sub Resume id : " . $id, "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->updateTable('sub_resume', $data, array('id' => $id));
        redirect("Admin/profile");
    }
    public function processDeleteSubR() {
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('sub_resume', $id);
        $name = $this->M_table->getById('sub_resume', $id) ['subResume'];
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Delete sub Resume id : " . $name, "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->deleteTable('sub_resume', $id);
        redirect("Admin/profile");
    }
    // ==================== PCOMPANY ====================
    public function dataCompany() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["dataCompany"] = $this->M_table->getAll("company");
        $this->load->view("admin/v_dataCompany", $data);
    }
    public function createCompany() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $this->load->view("admin/v_createCompany", $data);
    }
    public function processCreateCompany() {
        $data["company"] = str_replace("'", "", $this->input->post("company"));
        $data["company_phone"] = str_replace("'", "", $this->input->post("company_phone"));
        $data["company_email"] = str_replace("'", "", $this->input->post("company_email"));
        $data["NPWP"] = str_replace("'", "", $this->input->post("company_NPWP"));
        $data["typeBusiness"] = str_replace("'", "", $this->input->post("typeBusiness"));
        $data["addressOfDomicile"] = str_replace("'", "", $this->input->post("addressOfDomicile"));
        $data["businessEntity"] = str_replace("'", "", $this->input->post("businessEntity"));
        $data["website"] = str_replace("'", "", $this->input->post("website"));
        $data["SKMHHAM"] = str_replace("'", "", $this->input->post("SKMHHAM"));
        $data["deeds_of_establishment"] = str_replace("'", "", $this->input->post("deeds_of_establishment"));
        $data["deeds_of_revisions"] = str_replace("'", "", $this->input->post("deeds_of_revisions"));
        $data["update_date"] = date("Y-m-d H:i:s");
        $data["create_date"] = date("Y-m-d H:i:s");
        if (!empty($_FILES["image"]["name"])) {
            $image = $this->_do_upload();
            $data["image"] = $image;
        }
        $this->M_upload->insert($data);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Create Company" . $data['company'], "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        redirect("Admin/dataCompany");
    }
    public function updateCompany() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $id_company = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('company', $id_company);
        $data["validate"] = true;
        $data["id"] = $id_company;
        $data["dataUser"] = $this->M_table->getById("company", $id_company);
        $this->load->view("admin/v_updateCompany", $data);
    }
    public function processUpdateCompany() {
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('company', $id);
        $data["company"] = str_replace("'", "", $this->input->post("company"));
        $data["company_phone"] = str_replace("'", "", $this->input->post("company_phone"));
        $data["company_email"] = str_replace("'", "", $this->input->post("company_email"));
        $data["NPWP"] = str_replace("'", "", $this->input->post("company_NPWP"));
        $data["typeBusiness"] = str_replace("'", "", $this->input->post("typeBusiness"));
        $data["addressOfDomicile"] = str_replace("'", "", $this->input->post("addressOfDomicile"));
        $data["businessEntity"] = str_replace("'", "", $this->input->post("businessEntity"));
        $data["website"] = str_replace("'", "", $this->input->post("website"));
        $data["SKMHHAM"] = str_replace("'", "", $this->input->post("SKMHHAM"));
        $data["deeds_of_establishment"] = str_replace("'", "", $this->input->post("deeds_of_establishment"));
        $data["deeds_of_revisions"] = str_replace("'", "", $this->input->post("deeds_of_revisions"));
        $data["update_date"] = date("Y-m-d H:i:s");
        if (!empty($_FILES["image"]["name"])) {
            $image = $this->_do_upload();
            $upload = $this->M_table->getById("company", $id);
            if (file_exists("assets/upload/images/" . $upload["image"]) && $upload["image"]) {
                unlink("assets/upload/images/" . $upload["image"]);
            }
            $data["image"] = $image;
        }
        $name = $this->M_table->getByCon("company", "id", $id) ["company"];
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Update Company from" . $name . " to " . $data['company'], "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->updateTable("company", $data, ["id" => $id]);
        redirect("Admin/dataCompany");
    }
    // ==================== REPORT ====================
    public function processCreateReport() {
        $data = ["process_id" => str_replace("'", "", $this->input->post("process_id")), "message" => str_replace("'", "", $this->input->post("message")), "drive" => str_replace("'", "", $this->input->post("drive")), "update_date" => date("Y-m-d H:i:s"), "create_date" => date("Y-m-d H:i:s"), ];
        if (!empty($_FILES["image"]["name"])) {
            $image = $this->_do_upload_report();
            $data["report"] = $image;
        }
        $forReview["report_id"] = $this->M_table->createTableOrder("process_report", $data);
        $forReview["ending_date"] = str_replace("'", "", $this->input->post("ending_date"));
        $forReview["create_date"] = date("Y-m-d H:i:s");
        $forReview["update_date"] = date("Y-m-d H:i:s");
        $this->M_table->createTable("report_review", $forReview);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Create Report", "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        redirect("Admin/progressOrder/" . str_replace("'", "", $this->input->post("order_id")));
    }
    public function deleteReport() {
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('process_report', $id);
        $data = $this->M_table->getById("process_report", $id);
        if (file_exists("assets/upload/images/employee/" . $data["report"]) && $data["report"]) {
            unlink("assets/upload/report/" . $data["report"]);
        }
        $this->M_table->deleteTable("process_report", $id);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Delete Report", "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        redirect("Admin/progressOrder/" . str_replace("'", "", $this->uri->rsegment(4)));
    }
    public function updateReport() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $report_id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('process_report', $id);
        $data["validate"] = true;
        $data["dataReport"] = $this->M_table->detailReport($report_id);
        $data['dataReview'] = $this->M_table->getReviewByReport($report_id);
        $this->load->view("admin/v_updateReport", $data);
    }
    public function processUpdateReport() {
        $report_id = str_replace("'", "", $this->input->post("report_id"));
        $data['message'] = str_replace("'", "", $this->input->post("message"));
        $data["update_date"] = date("Y-m-d H:i:s");
        if (!empty($_FILES["image"]["name"])) {
            $image = $this->_do_upload_report();
            $upload = $this->M_table->getById("process_report", $report_id);
            if (file_exists("assets/upload/images/" . $upload["image"]) && $upload["image"]) {
                unlink("assets/upload/images/" . $upload["image"]);
            }
            $data["report"] = $image;
        }
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Update Report", "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->updateTable("process_report", $data, ["id" => $report_id]);
        redirect("Admin/updateReport/" . $report_id);
    }
    // ==================== REVIEW ===================
    public function updateDateReview() {
        $id = str_replace("'", "", $this->input->post("review_id"));
        $data['ending_date'] = str_replace("'", "", $this->input->post("ending_date"));
        $data["update_date"] = date("Y-m-d H:i:s");
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Update estimasi Review", "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->updateTable("report_review", $data, ["id" => $id]);
        redirect("Admin/updateReport/" . str_replace("'", "", $this->input->post("report_id")));
    }
    // ==================== UPLOAD FILE ====================
    public function _do_upload() {
        $image_name = time() . "-" . $_FILES["image"]["name"];
        $config["upload_path"] = "assets/upload/images/";
        $config["allowed_types"] = "gif|jpg|png|webp";
        $config["max_size"] = 10000;
        $config["max_widht"] = 15000;
        $config["max_height"] = 15000;
        $config["file_name"] = $image_name;
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload("image")) {
            $this->session->set_flashdata("msg", $this->upload->display_errors("", ""));
            redirect("");
        }
        return $this->upload->data("file_name");
    }
    public function _do_upload_news() {
        $image_name = time() . "-" . $_FILES["image"]["name"];
        $config["upload_path"] = "assets/upload/images/news/";
        $config["allowed_types"] = "jpg|png|jpeg";
        $config["max_size"] = 10000;
        $config["max_widht"] = 15000;
        $config["max_height"] = 15000;
        $config["file_name"] = $image_name;
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload("image")) {
            echo "image format not met";
            exit();
        }
        return $this->upload->data("file_name");
    }
    public function _do_upload_employee() {
        $image_name = time() . "-" . $_FILES["image"]["name"];
        $config["upload_path"] = "assets/upload/images/employee/";
        $config["allowed_types"] = "gif|jpg|jpeg|png|JPG";
        $config["file_name"] = $image_name;
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload("image")) {
            echo $image_name;
            exit();
            $this->session->set_flashdata("msg", $this->upload->display_errors("", ""));
            redirect("");
        }
        return $this->upload->data("file_name");
    }
    public function _do_upload_client() {
        $image_name = time() . "-" . $_FILES["image"]["name"];
        $config["upload_path"] = "assets/upload/images/client/";
        $config["allowed_types"] = "jpg|png|jpeg";
        $config["file_name"] = $image_name;
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload("image")) {
            $this->session->set_flashdata("msg", $this->upload->display_errors("", ""));
            redirect("");
        }
        return $this->upload->data("file_name");
    }
    public function _do_upload_report() {
        $image_name = time() . "-" . $_FILES["image"]["name"];
        $config["upload_path"] = "assets/upload/report/";
        $config["allowed_types"] = "pdf|jpg|png|jpeg|xlsx|doc|odt";
        $config["max_size"] = 10000;
        $config["max_widht"] = 15000;
        $config["max_height"] = 15000;
        $config["file_name"] = $image_name;
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload("image")) {
            $this->session->set_flashdata("msg", $this->upload->display_errors("", ""));
            redirect("");
        }
        return $this->upload->data("file_name");
    }
    public function _do_upload_resume() {
        $image_name = time() . "-" . $_FILES["image"]["name"];
        $config["upload_path"] = "assets/upload/images/resume/";
        $config["allowed_types"] = "jpg|png|jpeg";
        $config["max_size"] = 10000;
        $config["max_widht"] = 15000;
        $config["max_height"] = 15000;
        $config["file_name"] = $image_name;
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload("image")) {
            echo "image format not met";
            exit();
        }
        return $this->upload->data("file_name");
    }
    // ==================== FEEDBACK ====================
    public function dataFeedback() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["dataOrder"] = $this->M_table->dataOrderAll();
        $this->load->view("admin/v_dataFeedback", $data);
    }
    public function feedbackOrder() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $order_id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('order', $order_id);
        $data["validate"] = true;
        $data["feedbackEmployee"] = $this->M_user->dataFeedback2(1 . ' AND feedback.order_id = ' . $order_id);
        $data["feedbackCompany"] = $this->M_user->dataFeedback3(2 . ' AND feedback.order_id = ' . $order_id);
        $this->load->view("admin/v_feedbackOrder", $data);
    }
    public function detailFeedbackEmployee() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $id_feedback = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('feedback', $id_feedback);
        $data["validate"] = true;
        $data["feedbackEmployee"] = $this->M_user->detailFeedback1($id_feedback);
        $data['dataCriteria'] = $this->M_employee->getCriteria($data["feedbackEmployee"]['order_id'], $data["feedbackEmployee"]['employee_id']);
        $this->load->view("admin/v_detailFeedbackE", $data);
    }
    public function detailFeedbackCompany() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('feedback', $id);
        $data["validate"] = true;
        $data["feedbackEmployee"] = $this->M_user->detailFeedback2($id);
        $this->load->view("admin/v_detailFeedbackC", $data);
    }
    // ==================== PROJECT ====================
    public function dataProject() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["dataProject"] = $this->M_table->getAll("services");
        $this->load->view("admin/v_dataProject", $data);
    }
    public function createProject() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["category"] = $this->M_table->getAll("categoryservice");
        $this->load->view("admin/v_createProject", $data);
    }
    public function processCreateProject() {
        $data["service_name"] = str_replace("'", "", $this->input->post("name"));
        $data["description"] = str_replace("'", "", $this->input->post("description"));
        $data["update_date"] = date("Y-m-d H:i:s");
        $data["create_date"] = date("Y-m-d H:i:s");
        $category = str_replace("'", "", $this->uri->rsegment(3));
        if ($category == "") {
            $data["category_service_id"] = str_replace("'", "", $this->input->post("category_id"));
            $this->M_table->createTable("services", $data);
            redirect("Admin/dataProject");
        } else {
            $this->validateId('categoryservice', $category);
            $data["category_service_id"] = str_replace("'", "", $category);
            $this->M_table->createTable("services", $data);
            $action = ["admin_id" => $this->session->userdata("id"), "action" => "Create Project", "action_date" => date("Y-m-d H:i:s"), ];
            $this->M_table->createTable("history_action_admin", $action);
            redirect("Admin/detailWorkflow/" . $category);
        }
    }
    public function deleteProject() {
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('service', $id);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Delete Project", "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->deleteTable("services", $id);
        redirect("Admin/dataProject");
    }
    public function updateProject() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $id_service = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('services', $id_service);
        $data["validate"] = true;
        $data["project"] = $this->M_table->getById("services", $id_service);
        $data["category"] = $this->M_table->getAll("categoryservice");
        $this->load->view("admin/v_updateProject", $data);
    }
    public function processUpdateProject() {
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('services', $id);
        $data["service_name"] = str_replace("'", "", $this->input->post("name"));
        $data["description"] = str_replace("'", "", $this->input->post("description"));
        $data["category_service_id"] = str_replace("'", "", $this->input->post("category_id"));
        $data["update_date"] = date("Y-m-d H:i:s");
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Update Project", "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->updateTable("services", $data, ["id" => $id]);
        redirect("Admin/dataProject");
    }
    // ==================== ORDER ====================
    public function dataOrder() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["orderOn"] = $this->M_table->dataOrder("'do'" . " AND user_to_company_id = " . $this->session->userdata('from') . "");
        $data["orderOff"] = $this->M_table->dataOrder("'done'" . " AND user_to_company_id = " . $this->session->userdata('from') . "");
        $this->load->view("admin/v_dataOrder", $data);
    }
    public function addOrder() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["dataClient"] = $this->M_user->getByWhere("status_id", 1);
        $data["dataService"] = $this->M_table->getAll("services");
        $data["partner"] = $this->M_table->getEmployeeStatus(1);
        $data["manager"] = $this->M_table->getEmployeeStatus(2);
        $data["supervisor"] = $this->M_table->getEmployeeStatus(3);
        $data["staff"] = $this->M_table->getEmployeeStatus(4);
        $data["country"] = $this->M_table->getAll("country");
        $this->load->view("admin/v_createOrder", $data);
    }
    public function updateOrder() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $id_order = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('order', $id_order);
        $data["validate"] = true;
        $data["dataService"] = $this->M_table->getAll("services");
        $data["dataClient"] = $this->M_user->getByWhere("status_id", 1);
        $data["partner"] = $this->M_table->getEmployeeStatus(1);
        $data["manager"] = $this->M_table->getEmployeeStatus(2);
        $data["supervisor"] = $this->M_table->getEmployeeStatus(3);
        $data["staff"] = $this->M_table->getEmployeeStatus(4);
        $data["staffSelected"] = $this->M_table->getDataStaff($id_order);
        $data["stepSelected"] = $this->M_table->getFlow($id_order);
        $data["subSelected"] = $this->M_table->getSubFlow($id_order);
        $data["dataOrder"] = $this->M_table->getDataOrder($id_order);
        $data["person"] = $this->M_user->person($id_order);
        $data["country"] = $this->M_table->getAll("country");
        $this->load->view("admin/v_updateOrder", $data);
    }
    public function processUpdateOrder() {
        $data["user_id"] = str_replace("'", "", $this->input->post("client"));
        $data["message"] = str_replace("'", "", $this->input->post("message"));
        $data["partner_id"] = str_replace("'", "", $this->input->post("partner"));
        $data["financial_statements"] = str_replace("'", "", $this->input->post("financial_statements"));
        $data["manager_id"] = str_replace("'", "", $this->input->post("manager"));
        $data["supervisor_id"] = str_replace("'", "", $this->input->post("supervisor"));
        $data["update_date"] = date("Y-m-d H:i:s");
        $order_id = str_replace("'", "", $this->input->post("order_id"));
        $this->validateId('order', $order_id);
        $service_id = str_replace("'", "", $this->input->post("service_id_s"));
        $service = str_replace("'", "", $this->input->post("service"));
        $forPerson["name"] = str_replace("'", "", $this->input->post("person_responsible"));
        $forPerson["NIK"] = str_replace("'", "", $this->input->post("NIK"));
        $forPerson["NPWP"] = str_replace("'", "", $this->input->post("NPWP"));
        $forPerson["position"] = str_replace("'", "", $this->input->post("position"));
        $forPerson["nationality"] = str_replace("'", "", $this->input->post("nationality"));
        $forPerson["address"] = str_replace("'", "", $this->input->post("address"));
        $forPerson["phone"] = str_replace("'", "", $this->input->post("phone"));
        $forPerson["email"] = str_replace("'", "", $this->input->post("email"));
        $forPerson["order_id"] = $order_id;
        $this->M_table->updateTable("person_responsible", $forPerson, ["order_id" => $order_id, ]);
        if ($service != $service_id) {
            $data["service_id"] = $service;
            $this->M_table->deleteTableCon("order_step", "order_id", $order_id); //delete staff lama
            
        }
        $this->M_table->updateTable("order", $data, ["id" => $order_id]); //update tabel order
        $this->M_table->deleteTableCon("order_staff", "order_id", $order_id); //delete staff lama
        $staff_id = str_replace("'", "", $this->input->post("staff"));
        $data_staff["order_id"] = $order_id;
        foreach ($staff_id as $user_id) {
            $data_staff["employee_id"] = $user_id;
            $this->M_table->createTable("order_staff", $data_staff); //create staff baru
            
        }
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Update Order", "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        redirect("Admin/detailOrder/" . $order_id);
    }
    public function updateOrderStep() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $id_order = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('order', $id_order);
        $data["validate"] = true;
        $data["dataOrder"] = $this->M_table->getDataOrder($id_order);
        $data["substep"] = $this->M_table->getSubFlowByService($data["dataOrder"]["service_id"]);
        $data["substepOld"] = $this->M_table->getSubFlow($id_order);
        $data["step"] = $this->M_table->dataTableWhere("step", "service_id", $data["dataOrder"]["service_id"]);
        $this->load->view("admin/v_updateOrderStep", $data);
    }
    public function deleteActivities() {
        $subStep = str_replace("'", "", $this->uri->rsegment(3));
        $order_id = str_replace("'", "", $this->uri->rsegment(4));
        $this->validateId('substep', $subStep);
        $this->validateId('order', $order_id);
        $step = $this->M_table->getByCon("substep", "id", $subStep) ["subStep"];
        $this->M_table->deleteTable("substep", $subStep);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Delete Sub Step : " . $step, "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        redirect("Admin/updateOrderStep/" . $order_id);
    }
    public function updateActivities() {
        $subStep = str_replace("'", "", $this->input->post("subStep_id"));
        $order_id = str_replace("'", "", $this->input->post("order_id"));
        $this->validateId('substep', $subStep);
        $this->validateId('order', $order_id);
        $data['subStep'] = str_replace("'", "", $this->input->post("subStep"));
        $data["update_date"] = date("Y-m-d H:i:s");
        $step = $this->M_table->getByCon("substep", "id", $subStep) ["subStep"];
        $this->M_table->updateTable("substep", $data, ["id" => $subStep]);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Update Sub Step : " . $step, "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        redirect("Admin/updateOrderStep/" . $order_id);
    }
    public function processUpdateOrderStep() {
        $id = str_replace("'", "", $this->input->post("step"));
        $data["order_id"] = str_replace("'", "", $this->input->post("order_id"));
        $tSubOld = [];
        $tSubNew = [];
        $subOld = $this->M_table->getSubFlow($data["order_id"]);
        foreach ($subOld as $row) {
            array_push($tSubOld, $row["subStep_id"]);
        }
        if (is_array($id) || is_object($id)) {
            foreach ($id as $row) {
                if (in_array($row, $tSubOld)) {
                    continue;
                } else {
                    array_push($tSubNew, $row);
                }
            }
        }
        $data["update_date"] = date("Y-m-d H:i:s");
        $data["create_date"] = date("Y-m-d H:i:s");
        foreach ($tSubNew as $row) {
            $data["subStep_id"] = $row;
            $this->M_table->createTable("order_step", $data);
        }
        redirect("Admin/detailOrder/" . $data["order_id"]);
    }
    public function deleteOrder() {
        $id_order = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('order', $id_order);
        $this->M_table->deleteTableCon("order", "id", $id_order);
        $this->M_table->deleteTableCon("order_staff", "order_id", $id_order);
        $this->M_table->deleteTableCon("order_step", "order_id", $id_order);
        $this->M_table->deleteTableCon("data", "order_id", $id_order);
        $this->M_table->deleteTableCon("chatt", "order_id", $id_order);
        $this->M_table->deleteTableCon("process_report", "order_id", $id_order);
        $id_output = $this->M_table->getByCon("output", "order_id", $id_order);
        $this->M_table->deleteTableCon("output", "order_id", $id_order);
        $this->M_table->deleteTableCon("meeting", "output_id", $id_output["id"]);
        $this->M_table->deleteTableCon("process", "order_id", $id_order);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Delete Order", "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        redirect("Admin/dataOrder");
    }
    public function processCreateOrder() {
        $data["service_id"] = str_replace("'", "", $this->input->post("service"));
        $data["user_id"] = str_replace("'", "", $this->input->post("client"));
        $data["financial_statements"] = str_replace("'", "", $this->input->post("financial_statements"));
        $data["message"] = str_replace("'", "", $this->input->post("message"));
        $data["partner_id"] = str_replace("'", "", $this->input->post("partner"));
        $data["manager_id"] = str_replace("'", "", $this->input->post("manager"));
        $data["supervisor_id"] = str_replace("'", "", $this->input->post("supervisor"));
        $data["statusOrder_id"] = 1;
        $data["update_date"] = date("Y-m-d H:i:s");
        $data["create_date"] = date("Y-m-d H:i:s");
        $data_staff["order_id"] = $this->M_table->createTableOrder("order", $data);
        $forPerson["name"] = str_replace("'", "", $this->input->post("person_responsible"));
        $forPerson["NIK"] = str_replace("'", "", $this->input->post("NIK"));
        $forPerson["NPWP"] = str_replace("'", "", $this->input->post("NPWP"));
        $forPerson["position"] = str_replace("'", "", $this->input->post("position"));
        $forPerson["nationality"] = str_replace("'", "", $this->input->post("nationality"));
        $forPerson["address"] = str_replace("'", "", $this->input->post("address"));
        $forPerson["phone"] = str_replace("'", "", $this->input->post("phone"));
        $forPerson["email"] = str_replace("'", "", $this->input->post("email"));
        $forPerson["order_id"] = $data_staff["order_id"];
        $this->M_table->createTable("person_responsible", $forPerson);
        $forOutput["update_date"] = date("Y-m-d H:i:s");
        $forOutput["create_date"] = date("Y-m-d H:i:s");
        $forOutput["order_id"] = $data_staff["order_id"];
        $forMeeting["output_id"] = $this->M_table->createTableOrder("output", $forOutput);
        $this->M_table->createTable("meeting", $forMeeting);
        $forData["user_id"] = $data["user_id"];
        $forData["order_id"] = $data_staff["order_id"];
        $forData["create_date"] = date("Y-m-d H:i:s");
        $forData["update_date"] = date("Y-m-d H:i:s");
        $forData["status"] = "not yet";
        for ($i = 1;$i < 3;$i++) {
            $forData["data_id"] = $i;
            $this->M_table->createTable("data", $forData);
        }
        $forReport["order_id"] = $data_staff["order_id"];
        $forReport["create_date"] = date("Y-m-d H:i:s");
        $forReport["update_date"] = date("Y-m-d H:i:s");
        $staff_id = str_replace("'", "", $this->input->post("staff"));
        foreach ($staff_id as $user_id) {
            $data_staff["employee_id"] = $user_id;
            $this->M_table->createTable("order_staff", $data_staff);
        }
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Create Order", "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        redirect("Admin/dataOrder");
    }
    public function processCreatePIC() {
        $data["pic_name"] = str_replace("'", "", $this->input->post("person_responsible"));
        $data["NIK"] = str_replace("'", "", $this->input->post("NIK"));
        $data["NPWP"] = str_replace("'", "", $this->input->post("NPWP"));
        $data["position"] = str_replace("'", "", $this->input->post("position"));
        $data["nationality"] = str_replace("'", "", $this->input->post("nationality"));
        $data["address"] = str_replace("'", "", $this->input->post("address"));
        $data["phone"] = str_replace("'", "", $this->input->post("phone"));
        $data["email"] = str_replace("'", "", $this->input->post("email"));
        $data["order_id"] = str_replace("'", "", $this->input->post("order_id"));
        $data["create_date"] = date("Y-m-d H:i:s");
        $data["update_date"] = date("Y-m-d H:i:s");
        $this->M_table->createTable("person_in_charge", $data);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Add PIC", "action_date" => date("Y-m-d H:i:s") ];
        $this->M_table->createTable("history_action_admin", $action);
        redirect("Admin/detailOrder/" . $data["order_id"]);
    }
    public function processUpdatePIC() {
        $id = str_replace("'", "", $this->input->post("pic_id"));
        $data["pic_name"] = str_replace("'", "", $this->input->post("person_responsible"));
        $data["NIK"] = str_replace("'", "", $this->input->post("NIK"));
        $data["NPWP"] = str_replace("'", "", $this->input->post("NPWP"));
        $data["position"] = str_replace("'", "", $this->input->post("position"));
        $data["nationality"] = str_replace("'", "", $this->input->post("nationality"));
        $data["address"] = str_replace("'", "", $this->input->post("address"));
        $data["phone"] = str_replace("'", "", $this->input->post("phone"));
        $data["email"] = str_replace("'", "", $this->input->post("email"));
        $data["order_id"] = str_replace("'", "", $this->input->post("order_id"));
        $this->M_table->updateTable("person_in_charge", $data, array('id' => $id));
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Update PIC", "action_date" => date("Y-m-d H:i:s") ];
        $this->M_table->createTable("history_action_admin", $action);
        redirect("Admin/detailOrder/" . $data["order_id"]);
    }
    public function detailOrder() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $id_order = str_replace("'", "", $this->uri->rsegment(3));
        if ($id_order == "") {
            redirect("Admin/dataOrder");
        } else {
            if (is_numeric($id_order)) {
                if ($this->M_table->totalByCon("order", "id", $id_order . ' AND statusOrder_id = 1') == 0) {
                    $data["validate"] = false;
                } else {
                    $data["validate"] = true;
                    $data["dataOrder"] = $this->M_table->getDataOrder($id_order);
                    $data["dataStaff"] = $this->M_table->getDataStaff($id_order);
                    $id = $data["dataOrder"]["service_id"];
                    $data["step"] = $this->M_table->getFlow($id_order);
                    $data["substep"] = $this->M_table->getSubFlow($id_order);
                    $data["person"] = $this->M_user->person($id_order);
                    $data["country"] = $this->M_table->getAll('country');
                    $data["pic"] = $this->M_table->dataTableWhere('person_in_charge', 'order_id', $id_order);
                }
                $this->load->view("admin/v_detailOrder", $data);
            } else {
                redirect("Admin/lock");
            }
        }
    }
    public function updatePIC() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $pic_id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('person_in_charge', $pic_id);
        $data["pic"] = $this->M_table->getByCon('person_in_charge', 'id', $pic_id);
        $data['country'] = $this->M_table->getAll('country');
        $this->load->view("admin/v_updatePIC", $data);
    }
    public function progressOrder() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $id_order = str_replace("'", "", $this->uri->rsegment(3));
        if ($id_order == "") {
            redirect("Admin/dataOrder");
        } else {
            if (is_numeric($id_order)) {
                if ($this->M_table->totalByCon("order", "id", $id_order . ' AND statusOrder_id = 1') == 0) {
                    $data["validate"] = false;
                } else {
                    $data["validate"] = true;
                    $data["dataOrder"] = $this->M_table->getDataOrder($id_order);
                    $data["letter"] = $this->M_table->letter($id_order);
                    $data["dataProcess"] = $this->M_table->getProcess($id_order);
                    $data["output"] = $this->M_table->getOutput($id_order);
                    $data["dataStaff"] = $this->M_table->getDataStaff($id_order);
                    $data["step"] = $this->M_table->getFlow($id_order);
                    $data["subStep"] = $this->M_table->getSubFlow($id_order);
                    $data["dataProcessDone"] = $this->M_table->getProcessDone($id_order);
                    $data["report"] = $this->M_table->getReport($id_order);
                    $data["review"] = $this->M_table->getReview($id_order);
                    $data["meeting"] = $this->M_table->getMeeting($id_order);
                    $data["dataMeeting"] = $this->M_table->getAllMeeting($id_order);
                    $data["dataContract"] = $this->M_administrasi->getContract($id_order);
                    $data["dataInvoice"] = $this->M_administrasi->getInvoice($id_order);
                    $data["dataFile"] = $this->M_administrasi->getFile($id_order);
                    $data["dataPayment"] = $this->M_table->dataTableWhere('proof_of_payment', 'order_id', $id_order);
                    // percentage input
                    $total = count($data['letter']);
                    $done = count($this->M_table->percenLetter($id_order, 'done'));
                    $data['percentinput'] = round(((20) / $total) * $done, 1);
                    $data['percentInputNow'] = round(($done / $total) * 100, 0);
                    // percentage progress
                    $total = count($this->M_table->getSubFlow($id_order));
                    if ($total == 0) {
                        $total = 1;
                    }
                    $data['total'] = $total;
                    $done = count($this->M_table->getProcessDone($id_order));
                    $data['totalDone'] = $done;
                    $data['percentProgressNow'] = round(($done / $total) * 100, 0);
                    if ($total == 0) {
                        if ($done == 0) {
                            $data['percentprocess'] = round(60, 1);
                        } else {
                            $data['percentprocess'] = round(60 * $done, 1);
                        }
                    } else {
                        $data['percentprocess'] = round((60 / $total) * $done, 1);
                    }
                    // percentage output
                    $outputDone = $this->M_table->getReport($id_order);
                    $outputDone = count($outputDone);
                    $data['percentoutput'] = (20) / $total;
                    $data['percentoutput'] = round($data['percentoutput'] * $outputDone, 1);
                    $data['conOutput'] = true;
                    // percentage all
                    $data['percentall'] = $data['percentinput'] + $data['percentprocess'] + $data['percentoutput'];
                }
                $this->load->view("admin/v_progressOrder", $data);
            } else {
                redirect("Admin/lock");
            }
        }
    }
    public function deleteMeeting() {
        $id_order = str_replace("'", "", $this->uri->rsegment(4));
        $id_meeting = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('meeting', $id_meeting);
        $this->validateId('order', $id_order);
        $meeting = $this->M_table->getMeeting($id_order);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Delete Meeting in " . $meeting['via'], "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->deleteTable("meeting", $id_meeting);
        redirect("Admin/progressOrder/" . $id_order);
    }
    public function detailOrderDone() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $id_order = str_replace("'", "", $this->uri->rsegment(3));
        if ($id_order == "") {
            redirect("Admin/dataOrder");
        } else {
            if (is_numeric($id_order)) {
                if ($this->M_table->totalByCon("order", "id", $id_order . ' AND statusOrder_id = 2') == 0) {
                    $data["validate"] = false;
                } else {
                    $data["validate"] = true;
                    $data["dataOrder"] = $this->M_table->getDataOrder($id_order);
                    $data["letter"] = $this->M_table->letter($id_order);
                    $data["dataProcess"] = $this->M_table->getProcess($id_order);
                    $data["output"] = $this->M_table->getOutput($id_order);
                    $data["dataStaff"] = $this->M_table->getDataStaff($id_order);
                    $data["step"] = $this->M_table->getFlow($id_order);
                    $data["subStep"] = $this->M_table->getSubFlow($id_order);
                    $data["dataProcessDone"] = $this->M_table->getProcessDone($id_order);
                    $data["report"] = $this->M_table->getReport($id_order);
                    $data["review"] = $this->M_table->getReview($id_order);
                    $data["meeting"] = $this->M_table->getMeeting($id_order);
                }
                $this->load->view("admin/v_detailOrderDone", $data);
            } else {
                redirect("Admin/lock");
            }
        }
    }
    // ==================== DATA ====================
    public function processUpdateData() {
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('order', $id);
        $data["status"] = str_replace("'", "", $this->input->post("status[]"));
        $notYet["status"] = "not yet";
        $this->M_table->updateTable("data", $notYet, ["order_id" => $id]);
        if (is_array($data["status"]) || is_object($data["status"])) {
            foreach ($data["status"] as $key) {
                $status["status"] = "done";
                $this->M_table->updateTable("data", $status, ["id" => $key]);
            }
        }
        redirect("Admin/progressOrder/" . $id);
    }
    public function processCreateData() {
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('order', $id);
        $data["data"] = str_replace("'", "", $this->input->post("data"));
        $addData["data_id"] = $this->M_table->createTableOrder("detaildata", $data);
        $addData["order_id"] = $id;
        $addData["user_id"] = str_replace("'", "", $this->uri->rsegment(4));
        $this->validateId('user', $addData["user_id"]);
        $addData["status"] = "not yet";
        $addData["create_date"] = date("Y-m-d H:i:s");
        $addData["update_date"] = date("Y-m-d H:i:s");
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Add data to Order", "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->createTable("data", $addData);
        redirect("Admin/progressOrder/" . $id);
    }
    public function deleteData() {
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $order_id = str_replace("'", "", $this->uri->rsegment(4));
        $this->validateId('data', $id);
        $this->validateId('order', $order_id);
        $this->M_table->deleteTable("data", $id);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Delete data in Order", "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        redirect("Admin/progressOrder/" . $order_id);
    }
    // ==================== PROGRESS ====================
    public function processCreateProgress() {
        $data["order_id"] = str_replace("'", "", $this->uri->rsegment(3));
        $data["order_step_id"] = str_replace("'", "", $this->input->post("order_step_id"));
        $data["employee_id"] = str_replace("'", "", $this->input->post("employee"));
        $data["status"] = str_replace("'", "", $this->input->post("status"));
        $data["estimasi"] = str_replace("'", "", $this->input->post("estimasi"));
        $data["create_date"] = date("Y-m-d H:i:s");
        $data["update_date"] = date("Y-m-d H:i:s");
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Create Progress in Order", "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->createTable("process", $data);
        redirect("Admin/progressOrder/" . $data["order_id"]);
    }
    public function deleteProgress() {
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $order_id = str_replace("'", "", $this->uri->rsegment(4));
        $this->validateId('process', $id);
        $this->validateId('order', $order_id);
        $this->M_table->deleteTable("process", $id);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Delete Progress in Order", "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        redirect("Admin/progressOrder/" . $order_id);
    }
    public function processUpdateProgress() {
        $id = str_replace("'", "", $this->uri->rsegment(4));
        $data["order_id"] = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('process', $id);
        $this->validateId('order', $data["order_id"]);
        $data["order_step_id"] = str_replace("'", "", $this->input->post("os_id"));
        $order_step["subStep_id"] = str_replace("'", "", $this->input->post("subStep"));
        $data["employee_id"] = str_replace("'", "", $this->input->post("employee"));
        $data["status"] = str_replace("'", "", $this->input->post("status"));
        $data["estimasi"] = str_replace("'", "", $this->input->post("estimasi"));
        $data["update_date"] = date("Y-m-d H:i:s");
        $this->M_table->updateTable("order_step", $order_step, ["id" => $data["order_step_id"], ]);
        $this->M_table->updateTable("process", $data, ["id" => $id]);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Update Progress in Order", "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        redirect("Admin/updateProgress/" . $id . "/" . $data["order_id"]);
    }
    public function updateProgress() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $id_progress = str_replace("'", "", $this->uri->rsegment(3));
        $id_order = str_replace("'", "", $this->uri->rsegment(4));
        $this->validateId('process', $id_progress);
        $this->validateId('order', $id_order);
        $data["dataProcess"] = $this->M_table->getProcessByStep($id_progress);
        $data["validate"] = true;
        $data["dataOrder"] = $this->M_table->getDataOrder($id_order);
        $data["dataStaff"] = $this->M_table->getDataStaff($id_order);
        $data["order_id"] = $id_order;
        $data["subStep"] = $this->M_table->getSubFlow($id_order);
        $this->load->view("admin/v_updateProgress", $data);
    }
    public function detailProgress() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $id_progress = str_replace("'", "", $this->uri->rsegment(3));
        $id_order = str_replace("'", "", $this->uri->rsegment(4));
        $this->validateId('process', $id_progress);
        $this->validateId('order', $id_order);
        $data["dataProcess"] = $this->M_table->getProcessByStep($id_progress);
        $data["validate"] = true;
        $data["dataOrder"] = $this->M_table->getDataOrder($id_order);
        $data["dataStaff"] = $this->M_table->getDataStaff($id_order);
        $data["order_id"] = $id_order;
        $data["subStep"] = $this->M_table->getSubFlow($id_order);
        $this->load->view("admin/v_detailProgress", $data);
    }
    public function createMeeting() {
        $data['via'] = str_replace("'", "", $this->input->post("via"));
        $data['link'] = str_replace("'", "", $this->input->post("link"));
        $data['message'] = str_replace("'", "", $this->input->post("message"));
        $order_id = str_replace("'", "", $this->input->post("id_order"));
        $data['output_id'] = $this->M_table->getByCon('output', 'order_id', $order_id) ['id'];
        $data['date'] = str_replace("'", "", $this->input->post("date")) . ' ' . str_replace("'", "", $this->input->post("time"));
        $this->M_table->createTable("meeting", $data);
        redirect('Admin/progressOrder/' . $order_id);
    }
    public function updateMeeting() {
        $id = str_replace("'", "", $this->input->post("id"));
        $data['via'] = str_replace("'", "", $this->input->post("via"));
        $data['link'] = str_replace("'", "", $this->input->post("link"));
        $order_id = str_replace("'", "", $this->input->post("order_id"));
        $data['date'] = str_replace("'", "", $this->input->post("date")) . ' ' . str_replace("'", "", $this->input->post("time"));
        $this->M_table->updateTable("meeting", $data, ["id" => $id]);
        redirect('Admin/progressOrder/' . $order_id);
    }
    public function updateStatusMeetingP() {
        $meeting_id = str_replace("'", "", $this->uri->rsegment(3));
        $order_id = str_replace("'", "", $this->uri->rsegment(4));
        $this->validateId('meeting', $meeting_id);
        $this->validateId('order', $order_id);
        if ($this->M_table->getById('meeting', $meeting_id) ['permission'] == "no") {
            $data['permission'] = "yes";
        } else {
            $data['permission'] = "no";
        }
        $this->M_table->updateTable("meeting", $data, ["id" => $meeting_id]);
        redirect('Admin/progressOrder/' . $order_id);
    }
    public function updateStatusMeeting() {
        $meeting_id = str_replace("'", "", $this->uri->rsegment(3));
        $order_id = str_replace("'", "", $this->uri->rsegment(4));
        $this->validateId('meeting', $meeting_id);
        $this->validateId('order', $order_id);
        if ($this->M_table->getById('meeting', $meeting_id) ['status'] == "do") {
            $data['status'] = "done";
        } else {
            $data['status'] = "do";
        }
        $this->M_table->updateTable("meeting", $data, ["id" => $meeting_id]);
        redirect('Admin/progressOrder/' . $order_id);
    }
    public function updateStatusMeetingF() {
        $meeting_id = str_replace("'", "", $this->uri->rsegment(3));
        $order_id = str_replace("'", "", $this->uri->rsegment(4));
        $this->validateId('meeting', $meeting_id);
        $this->validateId('order', $order_id);
        if ($this->M_table->getById('meeting', $meeting_id) ['fixed'] == "no") {
            $data['fixed'] = "yes";
            $action = ["admin_id" => $this->session->userdata("id"), "action" => "Turn On Fixed Meeting", "action_date" => date("Y-m-d H:i:s"), ];
        } else {
            $data['fixed'] = "no";
            $action = ["admin_id" => $this->session->userdata("id"), "action" => "Turn Off Fixed Meeting", "action_date" => date("Y-m-d H:i:s"), ];
        }
        $this->M_table->updateTable("meeting", $data, ["id" => $meeting_id]);
        $this->M_table->createTable("history_action_admin", $action);
        redirect('Admin/progressOrder/' . $order_id);
    }
    public function turnFinishOrder() {
        $order_id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('order', $order_id);
        $data['statusOrder_id'] = 2;
        $this->M_table->updateTable("order", $data, ["id" => $order_id]);
        redirect('Admin/dataOrder');
    }
    public function turnDoOrder() {
        $order_id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('order', $order_id);
        $data['statusOrder_id'] = 1;
        $this->M_table->updateTable("order", $data, ["id" => $order_id]);
        redirect('Admin/dataOrder');
    }
    // ==================== WORKFLOW ====================
    public function dataWorkflow() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["c1"] = $this->M_table->getByCon("categoryservice", "id", 1);
        $data["c2"] = $this->M_table->getByCon("categoryservice", "id", 2);
        $data["c3"] = $this->M_table->getByCon("categoryservice", "id", 3);
        $data["c4"] = $this->M_table->getByCon("categoryservice", "id", 4);
        $data["data1"] = $this->M_table->totalByCon("services", "category_service_id", 1);
        $data["data2"] = $this->M_table->totalByCon("services", "category_service_id", 2);
        $data["data3"] = $this->M_table->totalByCon("services", "category_service_id", 3);
        $data["data4"] = $this->M_table->totalByCon("services", "category_service_id", 4);
        $data["data0"] = $this->M_table->totalByCon("services", "category_service_id", 0);
        $this->load->view("admin/v_dataWorkflow", $data);
    }
    public function detailWorkflow() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $id = str_replace("'", "	", $this->uri->rsegment(3));
        $this->validateId('categoryservice', $id);
        $data["validate"] = true;
        $data["selected"] = $this->M_table->getByCon("categoryservice", "id", $id);
        $data["service"] = $this->M_table->getService($id);
        $this->load->view("admin/v_detailWorkflow", $data);
    }
    public function workflow() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('services', $id);
        $data["service"] = $this->M_table->getByCon("services", "id", $id);
        $data["validate"] = "hm";
        $data["selected"] = $this->M_table->dataTableWhere("step", "service_id", $id);
        $this->load->view("admin/v_step", $data);
    }
    public function updateDataStep() {
        $data["step"] = str_replace("'", "", $this->input->post("step"));
        $data["description"] = str_replace("'", "", $this->input->post("description"));
        $id = str_replace("'", "", $this->input->post("id"));
        $data["drive"] = str_replace("'", "", $this->input->post("drive"));
        $data["update_date"] = date("Y-m-d H:i:s");
        $this->M_table->updateTable("step", $data, ["id" => $id]);
        redirect('Admin/workflow/' . str_replace("'", "", $this->input->post("service_id")));
    }
    public function processCreateStep() {
        $data["step"] = str_replace("'", "", $this->input->post("name"));
        $data["description"] = str_replace("'", "", $this->input->post("description"));
        $data["drive"] = str_replace("'", "", $this->input->post("drive"));
        $con = str_replace("'", "", $this->input->post("con"));
        $data["update_date"] = date("Y-m-d H:i:s");
        $data["create_date"] = date("Y-m-d H:i:s");
        $category = str_replace("'", "", $this->uri->rsegment(3));
        if (is_numeric($category)) {
            $data["service_id"] = str_replace("'", "", $category);
            $this->M_table->createTable("step", $data);
            $action = ["admin_id" => $this->session->userdata("id"), "action" => "Create Step : " . $data['step'], "action_date" => date("Y-m-d H:i:s"), ];
            $this->M_table->createTable("history_action_admin", $action);
        }
        if ($con == "") {
            redirect("Admin/workflow/" . $category);
        } else {
            $order_id = str_replace("'", "", $this->input->post("order_id"));
            redirect("Admin/updateOrderStep/" . $order_id);
        }
    }
    public function deleteStep() {
        $category = str_replace("'", "", $this->uri->rsegment(3));
        $service = str_replace("'", "", $this->uri->rsegment(4));
        $this->validateId("step", $category);
        $step = $this->M_table->getByCon("step", "id", $category) ["step"];
        $this->M_table->deleteTable("step", $category);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Delete Step : " . $step, "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        redirect("Admin/workflow/" . $service);
    }
    public function detailStep() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $id_category = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId("step", $id_category);
        $data["step"] = $this->M_table->getByCon("step", "id", $id_category);
        $data["validate"] = "hm";
        $data["subStep"] = $this->M_table->dataTableWhere("substep", "step_id", $id_category);
        $data["step"] = $this->M_table->getByCon("step", "id", $id_category);
        $this->load->view("admin/v_subStep", $data);
    }
    public function updateSubStep() {
        $subStep = str_replace("'", "", $this->input->post("subStep_id"));
        $step = str_replace("'", "", $this->input->post("step_id"));
        $data['subStep'] = str_replace("'", "", $this->input->post("subStep"));
        $data["update_date"] = date("Y-m-d H:i:s");
        $this->validateId("substep", $subStep);
        $this->M_table->updateTable("substep", $data, ["id" => $subStep]);
        redirect("Admin/detailStep/" . $step);
    }
    public function processCreateSubStep() {
        $data["subStep"] = str_replace("'", "", $this->input->post("name"));
        $data["update_date"] = date("Y-m-d H:i:s");
        $data["create_date"] = date("Y-m-d H:i:s");
        $data["step_id"] = str_replace("'", "", $this->input->post("step_id"));
        $this->M_table->createTable("substep", $data);
        $step = $this->M_table->getByCon("step", "id", $data['step_id']) ["step"];
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Create sub step : " . $data['subStep'] . " to step : " . $step, "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        if (str_replace("'", "", $this->input->post("order_id")) == "") {
            redirect("Admin/detailStep/" . $data["step_id"]);
        } else {
            redirect("Admin/updateOrderStep/" . str_replace("'", "", $this->input->post("order_id")));
        }
    }
    public function deleteSubStep() {
        $category = str_replace("'", "", $this->uri->rsegment(3));
        $service = str_replace("'", "", $this->uri->rsegment(4));
        $this->validateId("substep", $category);
        $substep = $this->M_table->getByCon("substep", "id", $category) ["subStep"];
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Delete sub step : " . $substep, "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->deleteTable("substep", $category);
        redirect("Admin/detailStep/" . $service);
    }
    // ================== SCURITY ====================
    public function lock() {
        $id = $this->session->userdata("key");
        $data["logout"] = date("Y-m-d H:i:s");
        $this->M_table->updateTable("history_login", $data, ["login" => $id]);
        $this->session->sess_destroy();
        $this->load->view("v_anonymous");
    }
    public function scId($segmen, $table, $col) {
        $id = $segmen;
        if ($id == "") {
            redirect('Admin/lock');
        } else {
            if (is_numeric($id)) {  
                if ($this->M_table->totalByCon($table, $col, $id) == 0) {
                    return false;
                } else {
                    return true;
                }
            } else {
                redirect("Admin/lock");
            }
        }
    }
    // ================== CHATT ====================
    public function dataChatt() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["order"] = $this->M_table->dataOrderChatt();
        $this->load->view("admin/v_dataChatt", $data);
    }
    public function selectedChatt() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $order_id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId("order", $order_id);
        $data["validate"] = true;
        $data["chatt"] = $this->M_table->dataChatt($order_id);
        $data["dataOrder"] = $this->M_table->selectOrder($order_id);
        if ($data["dataOrder"]['user_to_company_id'] != $this->session->userdata("from")) {
            redirect('Admin/Lock');
        }
    }
    public function addChatt() {
        $order_id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId("order", $order_id);
        $data["order_id"] = $order_id;
        $data["user_id"] = 0;
        $data["status_id"] = 1;
        $data["chatt"] = str_replace("'", "", $this->input->post("chatt"));
        $data["create_date"] = date("Y-m-d H:i:s");
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Send message to user : " . $data['chatt'], "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->createTable("chatt", $data);
        redirect("Admin/selectedChatt/" . $order_id);
    }
    // ================== HISTORY ====================
    public function dataHistory() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["admin"] = $this->M_table->totalDataTableWhere("history_action_admin", "admin_id", $id) + $this->M_table->totalDataTableWhere("history_login", "user_id", $id);
        $data["employee"] = $this->M_table->getTotalData("history_action_employee");
        $data["client"] = $this->M_table->getTotalData("history_action_client") + $this->M_table->totalLogin();
        $this->load->view("admin/v_dataHistory", $data);
    }
    public function historyAdmin() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["login"] = $this->M_table->totalDataTableWhere("history_login", "user_id", $id);
        $data["activity"] = $this->M_table->totalDataTableWhere("history_action_admin", "admin_id", $id);
        $this->load->view("admin/v_historyAdmin", $data);
    }
    public function loginAdmin() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data['history'] = $this->M_table->dataTableWhere('history_login', 'user_id', $id . ' ORDER BY login DESC');
        $this->load->view("admin/v_loginAdmin", $data);
    }
    public function activityAdmin() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data['action'] = $this->M_table->dataTableWhere('history_action_admin', 'admin_id', $id . ' ORDER BY action_date DESC');
        $this->load->view("admin/v_activityAdmin", $data);
    }
    public function historyClient() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["login"] = $this->M_table->totalLogin();
        $data["activity"] = $this->M_table->getTotalData('history_action_client');
        $this->load->view("admin/v_historyClient", $data);
    }
    public function loginClient() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data['client'] = $this->M_user->getByWhere('status_id', 1);
        $this->load->view("admin/v_loginClient", $data);
    }
    public function dLoginClient() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $user_id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId("user", $user_id);
        $data['client'] = $this->M_user->getLogin($user_id);
        $this->load->view("admin/v_dLoginClient", $data);
    }
    public function activityClient() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data['client'] = $this->M_user->getByWhere('status_id', 1);
        $this->load->view("admin/v_activityClient", $data);
    }
    public function dActivityClient() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $user_id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId("user", $user_id);
        $data['activity'] = $this->M_user->getAction($user_id);
        $this->load->view("admin/v_dActivityClient", $data);
    }
    public function historyEmployee() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["login"] = $this->M_employee->getLogin();
        $data["activity"] = $this->M_table->getTotalData('history_action_employee');
        $this->load->view("admin/v_historyEmployee", $data);
    }
    public function loginEmployee() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data['employee'] = $this->M_table->getAll('employee');
        $this->load->view("admin/v_loginEmployee", $data);
    }
    public function dLoginEmployee() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $user_id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId("employee", $user_id);
        $data['employee'] = $this->M_employee->getLoginById($user_id);
        $this->load->view("admin/v_dLoginEmployee", $data);
    }
    public function activityEmployee() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data['employee'] = $this->M_table->getAll('employee');
        $this->load->view("admin/v_activityEmployee", $data);
    }
    public function dActivityEmployee() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $user_id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId("employee", $user_id);
        $data['activity'] = $this->M_employee->getAction($user_id);
        $this->load->view("admin/v_dActivityEmployee", $data);
    }
    // ================== INFORMATION ====================
    public function dataInformation() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["information"] = $this->M_table->getAll('news');
        $this->load->view("admin/v_dataInformation", $data);
    }
    public function createInformation() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $this->load->view("admin/v_createInformation", $data);
    }
    public function processCreateInformation() {
        $data["title"] = str_replace("'", "", $this->input->post("title"));
        $data["description"] = str_replace("'", "", $this->input->post("description"));
        $data["link"] = str_replace("'", "", $this->input->post("link"));
        $data["update_date"] = date("Y-m-d H:i:s");
        $data["create_date"] = date("Y-m-d H:i:s");
        if (!empty($_FILES["image"]["name"])) {
            $image = $this->_do_upload_news();
            $data["image"] = $image;
        }
        $this->M_table->createTable("news", $data);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Create News ", "action_date" => date("Y-m-d H:i:s") ];
        $this->M_table->createTable("history_action_admin", $action);
        redirect("Admin/dataInformation");
    }
    public function detailInformation() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $info_id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId("news", $info_id);
        $data["info"] = $this->M_table->getById('news', $info_id);
        $this->load->view("admin/v_detailInformation", $data);
    }
    public function deleteInformation() {
        $id = $this->uri->rsegment(3);
        $this->validateId("news", $id);
        $upload = $this->M_table->getById("news", $id);
        if (file_exists("assets/upload/images/news/" . $upload["image"]) && $upload["image"]) {
            unlink("assets/upload/images/news/" . $upload["image"]);
        }
        $name = $this->M_table->getByCon("news", "id", $id) ["title"];
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Delete News : " . $name, "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->deleteTable("news", $id);
    }
    public function updateInformation() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $info_id = $this->uri->rsegment(3);
        $this->validateId("news", $info_id);
        $data['info'] = $this->M_table->getById('news', $info_id);
        $this->load->view('admin/v_updateInformation', $data);
    }
    public function processUpdateInformation() {
        $info_id = $this->input->post("info_id");
        $data = ["title" => str_replace("'", "", $this->input->post("title")), "description" => str_replace("'", "", $this->input->post("description")), "link" => str_replace("'", "", $this->input->post("link")), "update_date" => date("Y-m-d H:i:s") ];
        if (!empty($_FILES["image"]["name"])) {
            $image = $this->_do_upload_news();
            $upload = $this->M_table->getById("news", $info_id);
            if (file_exists("assets/upload/images/news/" . $upload["image"]) && $upload["image"]) {
                unlink("assets/upload/images/news/" . $upload["image"]);
            }
            $data["image"] = $image;
        }
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Update News : " . $data["title"], "action_date" => date("Y-m-d H:i:s"), ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->updateTable("news", $data, ["id" => $info_id]);
        redirect('Admin/updateInformation/' . $info_id);
    }
    // ================== INFORMATION ====================
    public function dataRecommendation() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data["dataClient"] = $this->M_user->getByWhere("status_id", 1 . " AND user_to_company_id = " . $this->session->userdata('from'));
        $this->load->view("admin/v_dataRecommendation", $data);
    }
    public function userRecommendation() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $user_id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId("user", $user_id);
        $data["serv"] = $this->M_table->getServRecommendation($user_id);
        $data["dataUser"] = $this->M_table->getById('user', $user_id);
        $this->load->view("admin/v_userRecommendation", $data);
    }
    public function createRecommendation() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $user_id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId("user", $user_id);
        $data["dataUser"] = $this->M_table->getById('user', $user_id);
        $dataId = $this->M_table->getServRecommendation($user_id);
        $data['selected'] = [];
        foreach ($dataId as $row) {
            array_push($data['selected'], $row['id']);
        }
        $data['service'] = $this->M_table->getAll('services');
        $this->load->view("admin/v_createRecommendation", $data);
    }
    public function processCreateRecommendation() {
        $data["service_id"] = str_replace("'", "", $this->input->post("service_id"));
        $data["user_id"] = str_replace("'", "", $this->input->post("user_id"));
        $data["reason"] = str_replace("'", "", $this->input->post("reason"));
        $data["update_date"] = date("Y-m-d H:i:s");
        $data["create_date"] = date("Y-m-d H:i:s");
        $this->M_table->createTable("service_recommendation", $data);
        $name = $this->M_table->getById('user', $data['user_id']);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Create Service Recommendation to:" . $name['name'], "action_date" => date("Y-m-d H:i:s") ];
        $this->M_table->createTable("history_action_admin", $action);
        redirect("Admin/userRecommendation/" . $data['user_id']);
    }
    public function deleteRecommendation() {
        $serv_id = str_replace("'", "", $this->uri->rsegment(3));
        $user_id = str_replace("'", "", $this->uri->rsegment(4));
        $this->validateId("services", $serv_id);
        $this->validateId("user", $user_id);
        $name = $this->M_table->getById('user', $user_id);
        $action = ["admin_id" => $this->session->userdata("id"), "action" => "Delete Service Recommendation to:" . $name['name'], "action_date" => date("Y-m-d H:i:s") ];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->deleteTable("service_recommendation", $serv_id);
        redirect("Admin/userRecommendation/" . $user_id);
    }
    // ================== SPECIAL TASK ====================
    public function specialTask() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $data['dataStaff'] = $this->M_table->getAll('employee' . " where company_id = " . $this->session->userdata('from'));
        $data['dataCategory'] = $this->M_table->getAll('category_specialtask');
        $data['dataTask'] = $this->M_table->getAllTask();
        $this->load->view("admin/v_specialTask", $data);
    }
    public function updateStatusTask()
    {
    $task_id    = str_replace("'", "", $this->uri->rsegment(3));
    $this->validateId('specialtask',$task_id);
    $task       = $this->M_table->getById('specialtask',$task_id);
        if ($task['status']=="do") {
            $data['status'] = "done";
            $this->session->set_flashdata("msg", '
            <div class="alert alert-success" role="alert">
                <strong>Data ditandai sudah selesai</strong>
            </div>');
        } else{
            $data['status'] = "do";
            $this->session->set_flashdata("msg", '
            <div class="alert alert-danger" role="alert">
                <strong>Data ditandai belum selesai</strong>
            </div>');
        }
        $data["update_date"]                    = date("Y-m-d H:i:s");
        $this->M_table->updateTable("specialtask",$data,array('id'=>$task_id));
        
        redirect("Admin/specialTask?tag=".$task['id_category']);
    }
    public function processCreateTask()
    {
        $data["employee_id"]    = str_replace("'", "", $this->input->post("employee_id"));
        $data["task"]           = str_replace("'", "", $this->input->post("task"));
        $data["description"]    = str_replace("'", "", $this->input->post("description"));
        $data["estimasi"]       = str_replace("'", "", $this->input->post("estimasi"));
        $data["id_category"]    = str_replace("'", "", $this->input->post("category_id"));
        $data["update_date"]    = date("Y-m-d H:i:s");
        $data["create_date"]    = date("Y-m-d H:i:s");
        $this->session->set_flashdata("msg", '
        <div class="alert alert-primary" role="alert">
            <strong>Berhasil menambahkan data</strong>
        </div>');
        $this->M_table->createTable("specialtask", $data);
        redirect("Admin/specialTask?tag=".$data["id_category"]); 
    }
    public function updateTask()
    {
        $data["employee_id"]    = str_replace("'", "", $this->input->post("employee_id"));
        $data["task"]           = str_replace("'", "", $this->input->post("task"));
        $data["description"]    = str_replace("'", "", $this->input->post("description"));
        $data["estimasi"]       = str_replace("'", "", $this->input->post("estimasi"));
        $data["id_category"]    = str_replace("'", "", $this->input->post("category_id"));
        $data["update_date"]    = date("Y-m-d H:i:s");
        
        $this->session->set_flashdata("msg", '
        <div class="alert alert-success" role="alert">
            <strong>Data berhasil di perbarui</strong>
        </div>');
        $this->M_table->updateTable("specialtask", $data,array('id'=>$this->input->post("task_id")));
        redirect("Admin/specialTask?tag=".$data["id_category"]);
    }
    public function deleteTask()
    {
        $task_id                = str_replace("'", "", $this->uri->rsegment(3));
        $task       = $this->M_table->getById('specialtask',$task_id);
        $this->validateId('specialtask',$task_id);
        $this->M_table->deleteTable("specialtask", $task_id);
        
        $this->session->set_flashdata("msg", '
        <div class="alert alert-danger" role="alert">
            <strong>Data berhasil dihapus</strong>
        </div>');
        redirect("Admin/specialTask?tag=".$task['id_category']);
    }
    //============ daily report ============
    public function dailyReport() {
        $data["dataEmployee"] = $this->M_table->getEmployee();
        $date = $this->input->post("date");
        $type = $this->input->post("type");
        $data['employee_id'] = 0;
        $data['date'] = date('Y-m-d');
        $employee_id = $this->input->post("employee_id");
        if ($this->input->post("update") == "yes") {
            foreach ($this->M_employee->dR_ED($employee_id, $date) as $key) {
                if ($this->input->post("report[]")) {
                    if (in_array($key['id'], $this->input->post("report[]"))) {
                        $dataC['check'] = "yes";
                    } else {
                        $dataC['check'] = "no";
                    }
                } else {
                    $dataC['check'] = "no";
                }
                $this->M_table->updateTable("dailyreport", $dataC, array('id' => $key['id']));
            }
            $data['dailyReport'] = $this->M_employee->dR_ED($employee_id, $date);
            $data['message'] = 'search by ' . $data['dailyReport'][0]['employee_name'] . ' date: ' . date("F j, Y", strtotime($date));
            $data['type'] = "employee";
            $data['employee_id'] = $this->M_table->getById('employee', $employee_id);
            $data['date'] = $date;
            return $this->load->view('admin/v_dailyReport', $data);
        }
        $employee_id = $this->input->post("employee_id");
        $data['type'] = "all";
        if (!$type) {
            $data['dailyReport'] = $this->M_employee->getDailyReport();
            $data['message'] = "show all data today ";
        } else {
            $data['dailyReport'] = $this->M_employee->dR_AD($date);
            $data['message'] = 'search by date: ' . ' date: ' . date("F j, Y", strtotime($date));
            if ($employee_id) {
                $data['dailyReport'] = $this->M_employee->dR_ED($employee_id, $date);
                $data['employee_id'] = $this->M_table->getById('employee', $employee_id);
                $data['date'] = $date;
                $data['type'] = "employee";
                if (count($this->M_employee->dR_ED($employee_id, $date)) > 0) {
                    $data['message'] = 'search by ' . $data['dailyReport'][0]['employee_name'] . ' date: ' . date("F j, Y", strtotime($date));
                } else {
                    $data['message'] = "search by Employee and date";
                }
            }
        }
        $this->load->view('admin/v_dailyReport', $data);
    }
    public function cleanDailyReport() {
        $this->M_employee->cleanDailyReport();
        redirect('Admin/dailyReport');
    }
    //============ training ============
    public function training()
    {
        $id  = $this->session->userdata("id");
        $data["user"]                           = $this->M_user->profile($id);
        $data['category'] = $this->input->post('category-title');
        if (!$data['category']) {
            $data['category'] = $this->uri->rsegment(3);
        }
        if ($data['category']) {
            $this->validateId('content_training_category',$data['category']);
            $data['category_title'] = $this->M_table->getById('content_training_category',$data['category']);
            $data['total_data'] = $this->M_table->totalByCon('content_training_title','id_category',$data['category']);
            $data["title_content"]                  = $this->M_table->joinThreeTable('content_training_title','content_training_category','content_training_level','id_category','id','content_training_title.id_level = content_training_level.id WHERE content_training_title.id_category = ' . $data['category'],'content_training_title.*, content_training_category.content_training_category,content_training_level.content_level');
        }
        $data["data_category"]                  = $this->M_table->getAll('content_training_category');
        $data["data_level"]                     = $this->M_table->getAll('content_training_level');
        $this->load->view("admin/v_training", $data);   
    }
    public function create_content_title() {
        $data["content_title"]          = str_replace("'", "", $this->input->post("content_title"));
        $data["content_description"]    = str_replace("'", "", $this->input->post("content_description"));
        $data["id_level"]               = str_replace("'", "", $this->input->post("id_level"));
        $data["id_category"]            = str_replace("'", "", $this->input->post("id_category"));
        $data["create_date"]            = date("Y-m-d H:i:s");
        $data["update_date"]            = date("Y-m-d H:i:s");
        $this->M_table->createTable("content_training_title", $data);
        redirect("Admin/training/".$data["id_category"]);
    }
    public function update_content_title()
    {
        $data["content_title"]          = str_replace("'", "", $this->input->post("content_title"));
        $data["content_description"]    = str_replace("'", "", $this->input->post("content_description"));
        $data["id_level"]               = str_replace("'", "", $this->input->post("id_level"));
        $data["id_category"]            = str_replace("'", "", $this->input->post("id_category"));
        $data["update_date"]            = date("Y-m-d H:i:s");
        $this->M_table->updateTable("content_training_title", $data, ["id" => str_replace("'", "", $this->input->post("id"))]);
        redirect("Admin/training/".$data["id_category"]);
    }
    public function delete_content_title()
    {
        $id = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('content_training_title',$id);
        $this->M_table->deleteTable("content_training_title", $id);
        redirect('Admin/training/'.$this->uri->rsegment(4));
    }
    public function create_content_category() {
        $data["content_training_category"]      = str_replace("'", "", $this->input->post("content_training_category"));
        $category                               = str_replace("'", "", $this->input->post("category-title"));
        $data["create_date"]                    = date("Y-m-d H:i:s");
        $data["update_date"]                    = date("Y-m-d H:i:s");
        $this->M_table->createTable("content_training_category", $data);
        redirect("Admin/training/".$category);
    }
    public function update_content_category()
    {
        $data["content_training_category"]                           = str_replace("'", "", $this->input->post("content_training_category"));
        $data["update_date"]                    = date("Y-m-d H:i:s");
        $this->M_table->updateTable("content_training_category", $data, ["id" => str_replace("'", "", $this->input->post("id"))]);
        redirect("Admin/training/".$this->input->post("category-title"));
    }
    public function delete_content_category()
    {
        $id  = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('content_training_category',$id);
        $this->validateId('content_training_category',$this->uri->rsegment(4));
        $data['id_category'] = 1;
        $data['update_date'] = date("Y-m-d H:i:s");
        foreach ($this->M_table->dataTableWhere('content_training_title','id_category',$id) as $key) {
            $this->M_table->updateTable("content_training_title", $data, ["id" => $key['id']]);
        }
        $this->M_table->deleteTable("content_training_category", $id);
        redirect('Admin/training/'.$this->uri->rsegment(4));
    }
    public function create_content_level() {
        $data["content_level"]    = str_replace("'", "", $this->input->post("content_level"));
        $data["create_date"]      = date("Y-m-d H:i:s");
        $data["update_date"]      = date("Y-m-d H:i:s");
        $category                 = str_replace("'", "", $this->input->post("category-title"));
        $this->M_table->createTable("content_training_level", $data);
        redirect("Admin/training/".$category);
    }
    public function delete_content_level()
    {
        $id= str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('content_training_level',$id);
        $data['id_level'] = 1;
        $data['update_date'] = date("Y-m-d H:i:s");
        foreach ($this->M_table->dataTableWhere('content_training_title','id_level',$id) as $key) {
            $this->M_table->updateTable("content_training_title", $data, ["id" => $key['id']]);
        }
        $this->M_table->deleteTable("content_training_level", $id);
        redirect('Admin/training/'.$this->uri->rsegment(4));
    }
    public function update_content_level()
    {
        $data["content_level"]    = str_replace("'", "", $this->input->post("content_level"));
        $category                 = str_replace("'", "", $this->input->post("category-title"));
        $data["update_date"]      = date("Y-m-d H:i:s");
        $this->M_table->updateTable("content_training_level", $data, ["id" => str_replace("'", "", $this->input->post("id"))]);
        redirect("Admin/training/".$category);
    }
    public function content_training()
    {
        if ($this->scId($this->uri->rsegment(3),'content_training_title','id')) {
            $id                 = $this->session->userdata("id");
            $data["user"]       = $this->M_user->profile($id);
            $data['data_pdf']   = $this->M_table->dataTableWhere('content_training_type_pdf','id_content_title',$this->uri->rsegment(3));
            $data['data_ppt']   = $this->M_table->dataTableWhere('content_training_type_ppt','id_content_title',$this->uri->rsegment(3));
            $data['data_yt']    = $this->M_table->dataTableWhere('content_training_type_yt','id_content_title',$this->uri->rsegment(3));
            $data['id_title']   = $this->uri->rsegment(3);
            $this->load->view('Admin/v_content_training',$data);
        } else{
            redirect("Admin/lock");
        }
    }
    public function preview_training()
    {
        $id                             = $this->session->userdata("id");
        $data['user']  		            = $this->M_employee->getEmployee($id);
        $id                               = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('content_training_category',$id);
        $data["category"]         = $this->M_table->getById('content_training_category',$id);
        $data["title_content"]    = $this->M_table->dataTableWhere('content_training_title','id_category',$id);        
        $this->load->view("admin/training/index", $data);
            
    }
    public function content()
    {
        $id                       = $this->session->userdata("id");
        $data['user']             = $this->M_employee->getEmployee($id);
        $id                       = str_replace("'", "", $this->uri->rsegment(3));
        $this->validateId('content_training_title',$id);
        $data["title_content"]    = $this->M_table->getById('content_training_title',$id);
        $data["category"]         = $this->M_table->getById('content_training_category',$data['title_content']['id_category']);
        $data['data_pdf']         = $this->M_table->dataTableWhere('content_training_type_pdf','id_content_title',$id);
        $data['data_ppt']         = $this->M_table->dataTableWhere('content_training_type_ppt','id_content_title',$id);
        $data['data_yt']          = $this->M_table->dataTableWhere('content_training_type_yt','id_content_title',$id);
        $this->load->view("admin/training/content", $data);
           
    }
    public function create_content() {
        $data["title"] = str_replace("'", "", $this->input->post("title"));
        $data["content"] = str_replace("'", "", $this->input->post("content"));
        $data["id_content_title"] = str_replace("'", "", $this->input->post("id_content_title"));
        $data["create_date"] = date("Y-m-d H:i:s");
        $data["update_date"] = date("Y-m-d H:i:s");
        $table = "pdf";
        switch (str_replace("'", "", $this->input->post("type"))) {
            case 'pdf':
                $table = "content_training_type_pdf";
            break;
            case 'ppt':
                $table = "content_training_type_ppt";
            break;
            case 'yt':
                $table = "content_training_type_yt";
            break;
        }
        $this->M_table->createTable($table, $data);
        redirect('Admin/content_training/' . str_replace("'", "", $this->input->post("id_content_title")));
    }
    public function update_content() {
        $data["title"] = str_replace("'", "", $this->input->post("title"));
        $data["content"] = str_replace("'", "", $this->input->post("content"));
        $data["update_date"] = date("Y-m-d H:i:s");
        $table = "pdf";
        switch (str_replace("'", "", $this->input->post("type"))) {
            case 'pdf':
                $table = "content_training_type_pdf";
            break;
            case 'ppt':
                $table = "content_training_type_ppt";
            break;
            case 'yt':
                $table = "content_training_type_yt";
            break;
        }
        $this->M_table->updateTable($table, $data, array('id' => $this->input->post("id")));
        redirect('Admin/content_training/' . str_replace("'", "", $this->input->post("id_content_title")));
    }
    public function delete_content() {
        if ($this->scId($this->uri->rsegment(3), 'content_training_type_yt', 'id') || $this->scId($this->uri->rsegment(3), 'content_training_type_pdf', 'id') || $this->scId($this->uri->rsegment(3), 'content_training_type_ppt', 'id')) {
            if ($this->scId($this->uri->rsegment(5), 'content_training_title', 'id')) {
                switch (str_replace("'", "", $this->uri->rsegment(4))) {
                    case 'pdf':
                        $table = "content_training_type_pdf";
                    break;
                    case 'ppt':
                        $table = "content_training_type_ppt";
                    break;
                    case 'yt':
                        $table = "content_training_type_yt";
                    break;
                }
            }
            $this->M_table->deleteTable($table, $this->uri->rsegment(3));
            redirect('Admin/content_training/' . $this->uri->rsegment(5));
        } else {
            redirect("Admin/lock");
        }
        $data["title"] = str_replace("'", "", $this->input->post("title"));
        $data["content"] = str_replace("'", "", $this->input->post("content"));
        $data["id_content_title"] = str_replace("'", "", $this->input->post("id_content_title"));
        $table = "pdf";
        switch (str_replace("'", "", $this->input->post("type"))) {
            case 'pdf':
                $table = "content_training_type_pdf";
            break;
            case 'ppt':
                $table = "content_training_type_ppt";
            break;
            case 'yt':
                $table = "content_training_type_yt";
            break;
        }
        $this->M_table->createTable($table, $data);
        redirect('Admin/content_training/' . str_replace("'", "", $this->input->post("id_content_title")));
    }
    //============ tax update ============
    public function taxUpdate() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $this->load->view("admin/v_taxUpdate", $data);
    }
    //============ accountingUpdate ============
    public function accountingUpdate() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $this->load->view("admin/v_accountingUpdate", $data);
    }
    //============ employeeScore ============
    public function employeeScore() {
        $id = $this->session->userdata("id");
        $data["user"] = $this->M_user->profile($id);
        $this->load->view("admin/v_employeeScore", $data);
    }
}
