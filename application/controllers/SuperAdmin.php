<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
class SuperAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            redirect('Login');
        }
        if ($this->session->userdata('status_id') == 4) {
            redirect('Employee');
        }
        if ($this->session->userdata('status_id') == 2) {
            redirect('Admin');
        }
        if ($this->session->userdata('status_id') == 5) {
            redirect('Administrasi');
        }
        if ($this->session->userdata('status_id') == 1) {
            redirect('Client');
        }
        if ($this->session->userdata('status_id') == 6) {
            redirect('Guest');
        }
        $this->load->model('M_finance');
    }
    public function validateId($tbl, $int)
    {
        if ($int == '') {
            redirect('SuperAdmin/lock');
        } else {
            if (is_numeric($int)) {
                if ($this->M_table->totalByCon($tbl, 'id', $int) == 0) {
                    redirect('SuperAdmin/lock');
                } else {
                    return true;
                }
            } else {
                redirect('SuperAdmin/lock');
            }
        }
    }
    public function getReport($id)
    {
        $date = date('Y-m');
        $date = "'$date'";
        $con = 'employee_id = ' . $id . ' AND planing != "" AND DATE_FORMAT(date, "%Y-%m") = ' . $date;
        $finish = $this->M_employee->getTotalTableCon('dailyreport', $con);
        if ($finish == 0) {
            return 0;
        } else {
            return $finish / 2;
        }
    }
    public function index()
    {
        $data['user'] = $this->M_user->profile($this->session->userdata('id'));
        $data['totalClient'] = $this->M_table->totalDataTableWhere('user', 'status_id', 1);
        $data['totalGuest'] = $this->M_table->totalDataTableWhere('user', 'status_id', 6);
        $data['totalProject'] = $this->M_table->getTotalData('services');
        $data['totalEmployee'] = $this->M_table->getTotalData('employee');
        $data['totalCompany'] = $this->M_table->getTotalData('company');
        $data['orderDo'] = $this->M_table->totalStatusOrderAll(1);
        $data['orderDone'] = $this->M_table->totalStatusOrderAll(2);
        $data['orderCancel'] = $this->M_table->totalStatusOrderAll(3);
        $data['news'] = $this->M_table->getAll('news order by create_date desc');
        $data['reportToday'] = $this->M_employee->dR_AD(date('Y-m-d'));
        $data['timeDailyReport'] = [];
        foreach ($this->M_table->getAll('employee') as $val) {
            $newdata = [
                'name' => $val['employee_name'],
                'value' => $this->getReport($val['id']),
                'bulletSettings' => [
                    'src' => base_url() . 'assets/upload/images/employee/' . $val['image'],
                ],
            ];
            array_push($data['timeDailyReport'], $newdata);
        }
        function compare_nilai($a, $b)
        {
            if ($a['value'] == $b['value']) {
                return 0;
            }
            return $a['value'] > $b['value'] ? -1 : 1;
        }
        usort($data['timeDailyReport'], 'compare_nilai');
        $data['timeDailyReportAll'] = $data['timeDailyReport'];
        $data['timeDailyReport'] = array_slice($data['timeDailyReport'], 0, 5);
        $data['orderAll'] = $data['orderDo'] + $data['orderDone'] + $data['orderCancel'];
        $data['dataTask'] = $this->M_table->getAllTaskLastMonth();
        $this->load->view('superAdmin/v_dashboard', $data);
    }
    // ============== USER =============
    public function dataUser()
    {
        $data['user'] = $this->M_user->profile($this->session->userdata('id'));
        $data['totalClient'] = $this->M_table->totalDataTableWhere('user', 'status_id', 1);
        $data['totalAdmin'] = $this->M_table->totalDataTableWhere('user', 'status_id', 2);
        $data['totalAdministrasi'] = $this->M_table->totalDataTableWhere('user', 'status_id', 5);
        $data['totalEmployee'] = $this->M_table->totalDataTableWhere('employee', 'login_status_id', 4);
        $this->load->view('superAdmin/v_dataUser', $data);
    }
    public function dataAdministrasi()
    {
        $data['user'] = $this->M_user->profile($this->session->userdata('id'));
        $data['country'] = $this->M_table->getAll('country');
        $data['company'] = $this->M_table->getAll('company');
        $data['dataAdministrasi'] = $this->M_user->getByWhere('status_id', 5);
        $this->load->view('superAdmin/v_dataAdministrasi', $data);
    }
    public function processCreateAdministrasi()
    {
        $data['name'] = str_replace("'", '', $this->input->post('name'));
        $data['position'] = str_replace("'", '', $this->input->post('position'));
        $data['email'] = str_replace("'", '', $this->input->post('email'));
        $data['password'] = md5(str_replace("'", '', $this->input->post('password')));
        $data['phone'] = str_replace("'", '', $this->input->post('phone'));
        $data['NPWP'] = str_replace("'", '', $this->input->post('NPWP'));
        $data['NIK'] = str_replace("'", '', $this->input->post('NIK'));
        $data['user_to_company_id'] = str_replace("'", '', $this->input->post('user_to_company_id'));
        $data['nationality'] = str_replace("'", '', $this->input->post('nationality'));
        $data['company_id'] = str_replace("'", '', $this->input->post('company_id'));
        $data['address'] = str_replace("'", '', $this->input->post('address'));
        $data['status_id'] = 5;
        $data['create_date'] = date('Y-m-d H:i:s');
        $data['update_date'] = date('Y-m-d H:i:s');
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_client();
            $data['image'] = $image;
        }
        $this->M_table->createTable('user', $data);
        redirect('SuperAdmin/dataAdministrasi');
    }
    public function dataClient()
    {
        $data['user'] = $this->M_user->profile($this->session->userdata('id'));
        $data['dataClient'] = $this->M_user->getByWhere('status_id', 1);
        $this->load->view('superAdmin/v_dataClient', $data);
    }
    public function deleteClient()
    {
        $this->validateId('user', $this->uri->rsegment(3));
        $order_id = $this->M_table->dataTableWhere('order', 'user_id', $this->uri->rsegment(3));
        foreach ($order_id as $key) {
            $this->M_table->deleteTableCon('order', 'id', $key['id']);
            $this->M_table->deleteTableCon('order_staff', 'order_id', $key['id']);
            $this->M_table->deleteTableCon('order_step', 'order_id', $key['id']);
            $this->M_table->deleteTableCon('data', 'order_id', $key['id']);
            $this->M_table->deleteTableCon('chatt', 'order_id', $key['id']);
            $this->M_table->deleteTableCon('process_report', 'order_id', $key['id']);
            $id_output = $this->M_table->getByCon('output', 'order_id', $key['id']);
            $this->M_table->deleteTableCon('output', 'order_id', $key['id']);
            $this->M_table->deleteTableCon('meeting', 'output_id', $id_output['id']);
            $this->M_table->deleteTableCon('process', 'order_id', $key['id']);
            $this->M_table->deleteTableCon('type_company_client', 'client_id', $key['id']);
        }
        $this->M_table->deleteTable('user', $this->uri->rsegment(3));
        redirect('SuperAdmin/dataClient');
    }
    public function updateClient()
    {
        $id = $this->session->userdata('id');
        $this->validateId('user', $id);
        $data['user'] = $this->M_user->profile($id);
        $data['validate'] = true;
        $data['dataClient'] = $this->M_user->profile($this->uri->rsegment(3));
        $data['company'] = $this->M_table->getAll('company');
        $data['country'] = $this->M_table->getAll('country');
        $this->load->view('superAdmin/v_updateClient', $data);
    }
    public function processUpdateClient()
    {
        $id = str_replace("'", '', $this->input->post('user_id'));
        $this->validateId('user', $id);
        $data['name'] = str_replace("'", '', $this->input->post('name'));
        $data['position'] = str_replace("'", '', $this->input->post('position'));
        $data['email'] = str_replace("'", '', $this->input->post('email'));
        $data['phone'] = str_replace("'", '', $this->input->post('phone'));
        $data['NPWP'] = str_replace("'", '', $this->input->post('NPWP'));
        $data['NIK'] = str_replace("'", '', $this->input->post('NIK'));
        $data['nationality'] = str_replace("'", '', $this->input->post('nationality'));
        $data['company_id'] = str_replace("'", '', $this->input->post('company_id'));
        $data['address'] = str_replace("'", '', $this->input->post('address'));
        $data['update_date'] = date('Y-m-d H:i:s');
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_client();
            $upload = $this->M_table->getById('user', $id);
            if (file_exists('assets/upload/images/client/' . $upload['image']) && $upload['image']) {
                unlink('assets/upload/images/client/' . $upload['image']);
            }
            $data['image'] = $image;
        }
        $this->M_table->updateTable('user', $data, ['id' => $id]);
        redirect('SuperAdmin/updateClient/' . $id);
    }
    public function processUpdatePersonResponsible()
    {
        $id = str_replace("'", '', $this->input->post('user_id'));
        $data['name'] = str_replace("'", '', $this->input->post('name'));
        $data['position'] = str_replace("'", '', $this->input->post('position'));
        $data['email'] = str_replace("'", '', $this->input->post('email'));
        $data['phone'] = str_replace("'", '', $this->input->post('phone'));
        $data['NPWP'] = str_replace("'", '', $this->input->post('NPWP'));
        $data['NIK'] = str_replace("'", '', $this->input->post('NIK'));
        $data['nationality'] = str_replace("'", '', $this->input->post('nationality'));
        $data['address'] = str_replace("'", '', $this->input->post('address'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->updateTable('person_responsible', $data, ['user_id' => $id]);
        redirect('SuperAdmin/updateClient/' . $id);
    }
    public function createClient()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['company'] = $this->M_table->getAll('company');
        $data['country'] = $this->M_table->getAll('country');
        $this->load->view('superAdmin/v_createClient', $data);
    }
    public function processCreateClient()
    {
        $data['name'] = str_replace("'", '', $this->input->post('name'));
        $data['position'] = str_replace("'", '', $this->input->post('position'));
        $data['email'] = str_replace("'", '', $this->input->post('email'));
        $data['password'] = md5(str_replace("'", '', $this->input->post('password')));
        $data['phone'] = str_replace("'", '', $this->input->post('phone'));
        $data['NPWP'] = str_replace("'", '', $this->input->post('NPWP'));
        $data['NIK'] = str_replace("'", '', $this->input->post('NIK'));
        $data['user_to_company_id'] = str_replace("'", '', $this->input->post('user_to_company_id'));
        $data['nationality'] = str_replace("'", '', $this->input->post('nationality'));
        $data['company_id'] = str_replace("'", '', $this->input->post('company_id'));

        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_client();
            $data['image'] = $image;
        }
        $data['address'] = str_replace("'", '', $this->input->post('address'));
        $data['status_id'] = 1;
        $data['create_date'] = date('Y-m-d H:i:s');
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->createTable('user', $data);
        redirect('SuperAdmin/dataClient');
    }
    public function _do_upload_client()
    {
        $image_name = time() . '-' . $_FILES['image']['name'];
        $config['upload_path'] = 'assets/upload/images/client/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 1000;
        $config['max_widht'] = 1500;
        $config['max_height'] = 1500;
        $config['file_name'] = $image_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('');
        }
        return $this->upload->data('file_name');
    }
    // ============ superAdmin ============
    public function dataAdmin()
    {
        $data['user'] = $this->M_user->profile($this->session->userdata('id'));
        $data['dataAdmin'] = $this->M_user->getByWhere('status_id', 2);
        $this->load->view('superAdmin/v_dataAdmin', $data);
    }
    public function detailAdmin()
    {
        $data['user'] = $this->M_user->profile($this->session->userdata('id'));
        $id = $this->uri->rsegment(3);
        $this->validateId('user', $id);
        $data['validate'] = true;
        $data['dataClient'] = $this->M_user->profile($id);
        $this->load->view('superAdmin/v_detailAdmin', $data);
    }

    // ============ ADMIN ===========

    public function createAdmin()
    {
        $data['user'] = $this->M_user->profile($this->session->userdata('id'));
        $data['company'] = $this->M_table->getAll('company');
        $data['country'] = $this->M_table->getAll('country');
        $this->load->view('superAdmin/v_createAdmin', $data);
    }
    public function processCreateAdmin()
    {
        $data['name'] = str_replace("'", '', $this->input->post('name'));
        $data['position'] = str_replace("'", '', $this->input->post('position'));
        $data['email'] = str_replace("'", '', $this->input->post('email'));
        $data['password'] = md5(str_replace("'", '', $this->input->post('password')));
        $data['phone'] = str_replace("'", '', $this->input->post('phone'));
        $data['NPWP'] = str_replace("'", '', $this->input->post('NPWP'));
        $data['NIK'] = str_replace("'", '', $this->input->post('NIK'));
        $data['nationality'] = str_replace("'", '', $this->input->post('nationality'));
        $data['company_id'] = str_replace("'", '', $this->input->post('company_id'));
        $data['address'] = str_replace("'", '', $this->input->post('address'));
        $data['status_id'] = 2;
        $data['create_date'] = date('Y-m-d H:i:s');
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->createTable('user', $data);
        redirect('SuperAdmin/dataAdmin');
    }

    // ============ PASSWORD ============
    public function updatePassword()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('user', $id);
        $data['id'] = $id;
        $data['client'] = $this->M_table->getById('user', $id);
        $data['user'] = $this->M_user->profile($this->session->userdata('id'));
        $this->load->view('superAdmin/v_updatePassword', $data);
    }
    public function processUpdatePassword()
    {
        $data['password'] = md5(str_replace("'", '', $this->input->post('password')));
        $data['update_date'] = date('Y-m-d H:i:s');
        $id = $this->uri->rsegment(3);
        $this->validateId('user', $id);
        if ($this->M_table->getByCon('user', 'id', $id)['status_id'] == 5) {
            redirect('SuperAdmin/dataAdministrasi');
        } else {
            redirect('SuperAdmin/dataClient');
        }
        $this->M_table->updateTable('user', $data, ['id' => $id]);
        redirect('SuperAdmin/dataClient');
    }
    public function updatePasswordA()
    {
        $id = $this->session->userdata('id');
        $this->validateId('user', $id);
        $data['id'] = $id;
        $data['user'] = $this->M_user->profile($id);
        $this->load->view('superAdmin/v_updatePasswordA', $data);
    }
    public function processUpdatePasswordA()
    {
        $data['password'] = md5(str_replace("'", '', $this->input->post('password')));
        $data['update_date'] = date('Y-m-d H:i:s');
        $id = $this->session->userdata('id');
        $this->M_table->updateTable('user', $data, ['id' => $id]);
        redirect('SuperAdmin/profile');
    }
    public function processUpdatePasswordE()
    {
        $data['password'] = md5(str_replace("'", '', $this->input->post('password')));
        $data['update_date'] = date('Y-m-d H:i:s');
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('employee', $id);
        $this->M_table->updateTable('employee', $data, ['id' => $id]);
        redirect('SuperAdmin/detailEmployee/' . $id);
    }
    // ============ EMPLOYEE ============
    public function dataEmployee()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['dataEmployee'] = $this->M_table->getEmployee();
        $this->load->view('superAdmin/v_dataEmployee', $data);
    }
    public function deleteEmployee()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('employee', $id);
        $upload = $this->M_table->getById('employee', $id);
        if (file_exists('assets/upload/images/employee/' . $upload['image']) && $upload['image']) {
            unlink('assets/upload/images/employee/' . $upload['image']);
        }
        $this->M_table->deleteTable('employee', $id);
        redirect('SuperAdmin/dataEmployee');
    }
    public function detailEmployee()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $id_user = $this->uri->rsegment(3);
        $this->validateId('employee', $id);
        $data['dataEmployee'] = $this->M_table->getEmployeeById($id_user);
        $data['company'] = $this->M_table->getAll('company');
        $data['position'] = $this->M_table->getAll('position');
        $this->load->view('superAdmin/v_detailEmployee', $data);
    }
    public function processUpdateEmployee()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('employee', $id);
        $data = [
            'employee_name' => str_replace("'", '', $this->input->post('name')),
            'phone' => str_replace("'", '', $this->input->post('phone')),
            'email' => str_replace("'", '', $this->input->post('email')),
            'gender' => str_replace("'", '', $this->input->post('gender')),
            'company_id' => str_replace("'", '', $this->input->post('company_id')),
            'position' => str_replace("'", '', $this->input->post('position')),
            'status_id' => str_replace("'", '', $this->input->post('status_id')),
            'address' => str_replace("'", '', $this->input->post('address')),
            'date_of_birth' => str_replace("'", '', $this->input->post('birth')),
            'update_date' => date('Y-m-d H:i:s'),
            'create_date' => date('Y-m-d H:i:s'),
        ];
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_employee();
            $upload = $this->M_table->getById('employee', $id);
            if (file_exists('assets/upload/images/employee/' . $upload['image']) && $upload['image']) {
                unlink('assets/upload/images/employee/' . $upload['image']);
            }
            $data['image'] = $image;
        }
        $this->M_table->updateTable('employee', $data, ['id' => $id]);
        redirect('SuperAdmin/detailEmployee/' . $id);
    }
    public function updatePasswordEmployee()
    {
        $id = $this->session->userdata('id');
        $employee_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('employee', $employee_id);
        $data['user'] = $this->M_user->profile($id);
        $data['employee'] = $this->M_table->getEmployeeById($employee_id);
        $data['id'] = $this->M_table->getEmployeeById($employee_id)['id'];
        $this->load->view('superAdmin/v_updatePasswordEmployee', $data);
    }
    public function createEmployee()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['status'] = $this->M_table->getAll('position');
        $this->load->view('superAdmin/v_createEmployee', $data);
    }
    public function processCreateEmployee()
    {
        $data = [
            'employee_name' => str_replace("'", '', $this->input->post('name')),
            'phone' => str_replace("'", '', $this->input->post('phone')),
            'gender' => str_replace("'", '', $this->input->post('gender')),
            'position' => str_replace("'", '', $this->input->post('position')),
            'address' => str_replace("'", '', $this->input->post('address')),
            'email' => str_replace("'", '', $this->input->post('email')),
            'password' => md5(str_replace("'", '', $this->input->post('password'))),
            'status_id' => str_replace("'", '', $this->input->post('status_id')),
            'date_of_birth' => str_replace("'", '', $this->input->post('birth')),
            'update_date' => date('Y-m-d H:i:s'),
            'create_date' => date('Y-m-d H:i:s'),
        ];
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_employee();
            $data['image'] = $image;
        }
        $this->M_upload->insertEmployee($data);
        redirect('SuperAdmin/dataEmployee');
    }
    // ==================== PROFILE ====================
    public function profile()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['dataUser'] = $this->M_user->profile($id);
        $data['resume'] = $this->M_table->getResume($id);
        $data['sub_resume'] = $this->M_table->getSubResume($id);
        $data['sr'] = $this->M_table->getAll('sub_resume');
        $data['scr'] = $this->M_table->getAll('sub_category_resume');
        // print_r($data['resume']); exit();
        $this->load->view('superAdmin/v_profile', $data);
    }
    public function updateProfile()
    {
        $id = $this->session->userdata('id');
        $data['name'] = addslashes($this->input->post('name'));
        $data['phone'] = addslashes($this->input->post('phone'));
        $data['email'] = addslashes($this->input->post('email'));
        $data['address'] = addslashes($this->input->post('address'));
        $data['NPWP'] = addslashes($this->input->post('NPWP'));
        $data['NIK'] = addslashes($this->input->post('NIK'));
        $data['position'] = addslashes($this->input->post('position'));
        $data['nationality'] = addslashes($this->input->post('nationality'));

        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_profile();
            $upload = $this->M_table->getById('user', $id);
            if (file_exists('assets/upload/images/admin/' . $upload['image']) && $upload['image']) {
                unlink('assets/upload/images/admin/' . $upload['image']);
            }
            $data['image'] = $image;
        }
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->updateTable('user', $data, ['id' => $id]);
        redirect('SuperAdmin/profile');
    }
    public function _do_upload_profile()
    {
        $image_name = time() . '-' . $_FILES['image']['name'];
        $config['upload_path'] = 'assets/upload/images/admin/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name'] = $image_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('');
        }
        return $this->upload->data('file_name');
    }
    public function _do_upload_resume()
    {
        $image_name = time() . '-' . $_FILES['image']['name'];
        $config['upload_path'] = 'assets/upload/images/resume/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 10000;
        $config['max_widht'] = 15000;
        $config['max_height'] = 15000;
        $config['file_name'] = $image_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            echo 'image format not met';
            exit();
        }
        return $this->upload->data('file_name');
    }
    public function processCreateResume()
    {
        $data = [
            'user_id' => $this->session->userdata('id'),
            'update_date' => date('Y-m-d H:i:s'),
            'create_date' => date('Y-m-d H:i:s'),
        ];
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_resume();
            $data['image'] = $image;
        }
        $this->M_table->createTable('resume', $data);
        redirect('SuperAdmin/profile');
    }
    public function processUpdateResume()
    {
        $id = str_replace("'", '', $this->input->post('resume_id'));
        $data['update_date'] = date('Y-m-d H:i:s');
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_resume();
            $upload = $this->M_table->getById('resume', $id);
            if (file_exists('assets/upload/images/resume/' . $upload['image']) && $upload['image']) {
                unlink('assets/upload/images/resume/' . $upload['image']);
            }
            $data['image'] = $image;
        }
        $this->M_table->updateTable('resume', $data, ['id' => $id]);
        redirect('SuperAdmin/profile');
    }
    public function processCreateCategory()
    {
        $data = ['subCategory' => str_replace("'", '', $this->input->post('subCategory'))];
        $this->M_table->createTable('sub_category_resume', $data);
        redirect('SuperAdmin/profile');
    }
    public function processCreateSubR()
    {
        $data = [
            'subCategory_id' => str_replace("'", '', $this->input->post('subCategory_id')),
            'resume_id' => str_replace("'", '', $this->input->post('resume_id')),
            'date' => str_replace("'", '', $this->input->post('date')),
            'subResume' => str_replace("'", '', $this->input->post('subResume')),
            'update_date' => date('Y-m-d H:i:s'),
            'create_date' => date('Y-m-d H:i:s'),
        ];
        $this->M_table->createTable('sub_resume', $data);
        redirect('SuperAdmin/profile');
    }
    public function processUpdateSubR()
    {
        $id = str_replace("'", '', $this->input->post('id'));
        $data = [
            'subCategory_id' => str_replace("'", '', $this->input->post('subCategory_id')),
            'date' => str_replace("'", '', $this->input->post('date')),
            'subResume' => str_replace("'", '', $this->input->post('subResume')),
            'update_date' => date('Y-m-d H:i:s'),
        ];
        $this->M_table->updateTable('sub_resume', $data, ['id' => $id]);
        redirect('SuperAdmin/profile');
    }
    public function processDeleteSubR()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('sub_resume', $id);
        $this->M_table->deleteTable('sub_resume', $id);
        redirect('SuperAdmin/profile');
    }
    // ==================== PCOMPANY ====================
    public function dataCompany()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['dataCompany'] = $this->M_table->getAll('company');
        $this->load->view('superAdmin/v_dataCompany', $data);
    }
    public function createCompany()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $this->load->view('superAdmin/v_createCompany', $data);
    }
    public function processCreateCompany()
    {
        $data['company'] = str_replace("'", '', $this->input->post('company'));
        $data['company_phone'] = str_replace("'", '', $this->input->post('company_phone'));
        $data['company_email'] = str_replace("'", '', $this->input->post('company_email'));
        $data['NPWP'] = str_replace("'", '', $this->input->post('company_NPWP'));
        $data['typeBusiness'] = str_replace("'", '', $this->input->post('typeBusiness'));
        $data['addressOfDomicile'] = str_replace("'", '', $this->input->post('addressOfDomicile'));
        $data['businessEntity'] = str_replace("'", '', $this->input->post('businessEntity'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['create_date'] = date('Y-m-d H:i:s');
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload();
            $data['image'] = $image;
        }
        $this->M_upload->insert($data);
        redirect('SuperAdmin/dataCompany');
    }
    public function updateCompany()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $id_company = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('company', $id_company);
        $data['id'] = $id_company;
        $data['dataUser'] = $this->M_table->getById('company', $id_company);
        $this->load->view('superAdmin/v_updateCompany', $data);
    }
    public function processUpdateCompany()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('company', $id);
        $data['company'] = str_replace("'", '', $this->input->post('company'));
        $data['company_phone'] = str_replace("'", '', $this->input->post('company_phone'));
        $data['company_email'] = str_replace("'", '', $this->input->post('company_email'));
        $data['NPWP'] = str_replace("'", '', $this->input->post('company_NPWP'));
        $data['typeBusiness'] = str_replace("'", '', $this->input->post('typeBusiness'));
        $data['addressOfDomicile'] = str_replace("'", '', $this->input->post('addressOfDomicile'));
        $data['businessEntity'] = str_replace("'", '', $this->input->post('businessEntity'));
        $data['website'] = str_replace("'", '', $this->input->post('website'));
        $data['SKMHHAM'] = str_replace("'", '', $this->input->post('SKMHHAM'));
        $data['deeds_of_establishment'] = str_replace("'", '', $this->input->post('deeds_of_establishment'));
        $data['deeds_of_revisions'] = str_replace("'", '', $this->input->post('deeds_of_revisions'));
        $data['update_date'] = date('Y-m-d H:i:s');
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload();
            $upload = $this->M_table->getById('company', $id);
            if (file_exists('assets/upload/images/' . $upload['image']) && $upload['image']) {
                unlink('assets/upload/images/' . $upload['image']);
            }
            $data['image'] = $image;
        }
        $this->M_table->updateTable('company', $data, ['id' => $id]);
        redirect('SuperAdmin/dataCompany');
    }
    // ==================== REPORT ====================
    public function processCreateReport()
    {
        $data = ['process_id' => str_replace("'", '', $this->input->post('process_id')), 'message' => str_replace("'", '', $this->input->post('message')), 'update_date' => date('Y-m-d H:i:s'), 'create_date' => date('Y-m-d H:i:s')];
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_report();
            $data['report'] = $image;
        }
        $forReview['report_id'] = $this->M_table->createTableOrder('process_report', $data);
        $forReview['ending_date'] = str_replace("'", '', $this->input->post('ending_date'));
        $forReview['create_date'] = date('Y-m-d H:i:s');
        $forReview['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->createTable('report_review', $forReview);
        redirect('SuperAdmin/progressOrder/' . str_replace("'", '', $this->input->post('order_id')));
    }
    public function deleteReport()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('process_report', $id);
        $data = $this->M_table->getById('process_report', $id);
        if (file_exists('assets/upload/images/employee/' . $data['report']) && $data['report']) {
            unlink('assets/upload/report/' . $data['report']);
        }
        $this->M_table->deleteTable('process_report', $id);
        redirect('SuperAdmin/progressOrder/' . str_replace("'", '', $this->uri->rsegment(4)));
    }
    public function updateReport()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $report_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('process_report', $report_id);
        $data['validate'] = true;
        $data['dataReport'] = $this->M_table->detailReport($report_id);
        $this->load->view('superAdmin/v_updateReport', $data);
    }
    // ==================== UPLOAD FILE ====================
    public function _do_upload()
    {
        $image_name = time() . '-' . $_FILES['image']['name'];
        $config['upload_path'] = 'assets/upload/images/';
        $config['allowed_types'] = 'gif|jpg|png|webp';
        $config['max_size'] = 10000;
        $config['max_widht'] = 15000;
        $config['max_height'] = 15000;
        $config['file_name'] = $image_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('');
        }
        return $this->upload->data('file_name');
    }
    public function _do_upload_hc()
    {
        $image_name = time() . '-' . $_FILES['image']['name'];
        $config['upload_path'] = 'assets/image/website/history_company/';
        $config['allowed_types'] = 'jpg|png|webp|jpeg';
        $config['file_name'] = $image_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('');
        }
        return $this->upload->data('file_name');
    }

    public function _do_upload_flag()
    {
        $image_name = time() . '-' . $_FILES['image']['name'];
        $config['upload_path'] = 'assets/image/website/country/';
        $config['allowed_types'] = 'jpg|png|webp|jpeg';
        $config['file_name'] = $image_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('');
        }
        return $this->upload->data('file_name');
    }
    public function _do_upload_news()
    {
        $image_name = time() . '-' . $_FILES['image']['name'];
        $config['upload_path'] = 'assets/upload/images/news/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 10000;
        $config['max_widht'] = 15000;
        $config['max_height'] = 15000;
        $config['file_name'] = $image_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            echo 'image format not met';
            exit();
        }
        return $this->upload->data('file_name');
    }
    public function _do_upload_employee()
    {
        $image_name = time() . '-' . $_FILES['image']['name'];
        $config['upload_path'] = 'assets/upload/images/employee/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1000;
        $config['max_widht'] = 1500;
        $config['max_height'] = 1500;
        $config['file_name'] = $image_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('');
        }
        return $this->upload->data('file_name');
    }
    public function _do_upload_report()
    {
        $image_name = time() . '-' . $_FILES['image']['name'];
        $config['upload_path'] = 'assets/upload/report/';
        $config['allowed_types'] = 'pdf|jpg|png|jpeg|xlsx|doc|odt';
        $config['max_size'] = 10000;
        $config['max_widht'] = 15000;
        $config['max_height'] = 15000;
        $config['file_name'] = $image_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('');
        }
        return $this->upload->data('file_name');
    }
    // ==================== FEEDBACK ====================
    public function dataFeedback()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['dataOrder'] = $this->M_table->dataOrderAll();
        $this->load->view('superAdmin/v_dataFeedback', $data);
    }
    public function feedbackOrder()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $order_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('order', $order_id);
        $data['feedbackEmployee'] = $this->M_user->dataFeedback2(1 . ' AND feedback.order_id = ' . $order_id);
        $data['feedbackCompany'] = $this->M_user->dataFeedback3(2 . ' AND feedback.order_id = ' . $order_id);
        $data['selected'] = $this->M_table->getOrder($order_id);
        $data['criteria'] = $this->M_user->getCriteria('criteria');
        $data['staff'] = $this->M_table->getDataStaff($order_id);
        $data['staff2'] = $this->M_table->getStaffFromFeedbackFromCeo($order_id);
        $data['dataFeedback'] = $this->M_table->dataFeedbackFromCEO($order_id);
        $this->load->view('superAdmin/v_feedbackOrder', $data);
    }
    public function processCreateFeedback()
    {
        $total = $this->input->post('total');
        $bantu = [];
        $rat = [];
        for ($i = 1; $i <= $total; $i++) {
            $rating = 'rating' . $i;
            $number = $this->input->post($rating);
            array_push($bantu, $number);
        }
        $forCriteria['order_id'] = addslashes($this->input->post('order_id'));
        $forCriteria['employee_id'] = addslashes($this->input->post('employee_id'));
        $forCriteria['update_date'] = date('Y-m-d H:i:s');
        $forCriteria['create_date'] = date('Y-m-d H:i:s');

        foreach ($bantu as $row) {
            $forCriteria['rating'] = substr($row, 0, strlen($row) - (strlen($row) - 1));
            array_push($rat, $forCriteria['rating']);
            $forCriteria['criteria_id'] = substr($row, 1);
            $this->M_table->createTable('feedback_criteria_from_ceo', $forCriteria);
        }
        $data['feedback'] = addslashes($this->input->post('feedback'));
        $data['star'] = array_sum($rat) / count($bantu);
        $data['employee_id'] = addslashes($this->input->post('employee_id'));
        $data['categoryFeedback_id'] = addslashes($this->input->post('categoryFeedback_id'));
        $data['order_id'] = addslashes($this->input->post('order_id'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['create_date'] = date('Y-m-d H:i:s');
        $this->M_table->createTable('feedback_from_ceo', $data);
        redirect('SuperAdmin/feedbackOrder/' . $data['order_id']);
    }
    public function detailFeedbackEmployee()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $id_feedback = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('feedback', $id_feedback);
        $data['validate'] = true;
        $data['feedbackEmployee'] = $this->M_user->detailFeedback1($id_feedback);
        $data['dataCriteria'] = $this->M_employee->getCriteria($data['feedbackEmployee']['order_id'], $data['feedbackEmployee']['employee_id']);
        $this->load->view('superAdmin/v_detailFeedbackE', $data);
    }
    public function detailFeedbackCompany()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('feedback', $id);
        $data['validate'] = true;
        $data['feedbackEmployee'] = $this->M_user->detailFeedback2($id);
        $this->load->view('superAdmin/v_detailFeedbackC', $data);
    }

    public function detailFeedback()
    {
        $feedback_id = $this->uri->rsegment(3);
        $data['user'] = $this->M_user->profile($this->session->userdata('id'));
        $this->validateId('feedback', $feedback_id);
        $data['validate'] = true;
        $data['dataFeedback'] = $this->M_table->detailFeedback($feedback_id);
        $data['dataFeedback2'] = $this->M_table->getFeedback($data['dataFeedback']['order_id'], $data['dataFeedback']['employee_id']);
        $data['dataCriteria'] = $this->M_table->getCriteria($data['dataFeedback']['order_id'], $data['dataFeedback']['employee_id']);
        $this->load->view('superAdmin/v_detailFeedback', $data);
    }
    // ==================== PROJECT ====================
    public function dataProject()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['dataProject'] = $this->M_table->getAll('services');
        $this->load->view('superAdmin/v_dataProject', $data);
    }
    public function createProject()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['category'] = $this->M_table->getAll('categoryservice');
        $this->load->view('superAdmin/v_createProject', $data);
    }
    public function processCreateProject()
    {
        $data['service_name'] = str_replace("'", '', $this->input->post('name'));
        $data['description'] = str_replace("'", '', $this->input->post('description'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['create_date'] = date('Y-m-d H:i:s');
        $category = str_replace("'", '', $this->uri->rsegment(3));
        if ($category == '') {
            $data['category_service_id'] = str_replace("'", '', $this->input->post('category_id'));
            $this->M_table->createTable('services', $data);
            redirect('SuperAdmin/dataProject');
        } else {
            $this->validateId('categoryservice', $category);
            $data['category_service_id'] = str_replace("'", '', $category);
            $this->M_table->createTable('services', $data);
            redirect('SuperAdmin/detailWorkflow/' . $category);
        }
    }
    public function deleteProject()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('services', $id);
        $this->M_table->deleteTable('services', $id);
        redirect('SuperAdmin/dataProject');
    }
    public function updateProject()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $id_service = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('services', $id_service);
        $data['validate'] = true;
        $data['project'] = $this->M_table->getById('services', $id_service);
        $data['category'] = $this->M_table->getAll('categoryservice');
        $this->load->view('superAdmin/v_updateProject', $data);
    }
    public function processUpdateProject()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('services', $id);
        $data['service_name'] = str_replace("'", '', $this->input->post('name'));
        $data['description'] = str_replace("'", '', $this->input->post('description'));
        $data['category_service_id'] = str_replace("'", '', $this->input->post('category_id'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->updateTable('services', $data, ['id' => $id]);
        redirect('SuperAdmin/dataProject');
    }
    // ==================== ORDER ====================
    public function dataOrder()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['orderOn'] = $this->M_table->dataOrder("'do'");
        $data['orderOff'] = $this->M_table->dataOrder("'done'");
        $this->load->view('superAdmin/v_dataOrder', $data);
    }
    public function addOrder()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['dataClient'] = $this->M_user->getByWhere('status_id', 1);
        $data['dataService'] = $this->M_table->getAll('services');
        $data['partner'] = $this->M_table->getEmployeeStatus(1);
        $data['manager'] = $this->M_table->getEmployeeStatus(2);
        $data['supervisor'] = $this->M_table->getEmployeeStatus(3);
        $data['staff'] = $this->M_table->getEmployeeStatus(4);
        $data['country'] = $this->M_table->getAll('country');
        $this->load->view('superAdmin/v_createOrder', $data);
    }
    public function updateOrder()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $id_order = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('order', $id_order);
        $data['validate'] = true;
        $data['dataService'] = $this->M_table->getAll('services');
        $data['dataClient'] = $this->M_user->getByWhere('status_id', 1);
        $data['partner'] = $this->M_table->getEmployeeStatus(1);
        $data['manager'] = $this->M_table->getEmployeeStatus(2);
        $data['supervisor'] = $this->M_table->getEmployeeStatus(3);
        $data['staff'] = $this->M_table->getEmployeeStatus(4);
        $data['staffSelected'] = $this->M_table->getDataStaff($id_order);
        $data['stepSelected'] = $this->M_table->getFlow($id_order);
        $data['subSelected'] = $this->M_table->getSubFlow($id_order);
        $data['dataOrder'] = $this->M_table->getDataOrder($id_order);
        $data['person'] = $this->M_user->person($id_order);
        $data['country'] = $this->M_table->getAll('country');
        $this->load->view('superAdmin/v_updateOrder', $data);
    }

    public function deleteActivities()
    {
        $subStep = str_replace("'", '', $this->uri->rsegment(3));
        $order_id = str_replace("'", '', $this->uri->rsegment(4));
        $this->validateId('order', $order_id);
        $this->validateId('substep', $subStep);
        $this->M_table->deleteTable('substep', $subStep);
        redirect('SuperAdmin/updateOrderStep/' . $order_id);
    }
    public function updateActivities()
    {
        $subStep = str_replace("'", '', $this->input->post('subStep_id'));
        $order_id = str_replace("'", '', $this->input->post('order_id'));
        $data['subStep'] = str_replace("'", '', $this->input->post('subStep'));
        $data['update_date'] = date('Y-m-d H:i:s');
        if ($subStep == '' || $order_id == '') {
            redirect('SuperAdmin/lock');
        } else {
            if (is_numeric($subStep) && is_numeric($order_id)) {
                $this->M_table->updateTable('substep', $data, ['id' => $subStep]);
                redirect('SuperAdmin/updateOrderStep/' . $order_id);
            } else {
                redirect('SuperAdmin/lock');
            }
        }
    }
    public function updateSubStep()
    {
        $subStep = str_replace("'", '', $this->input->post('subStep_id'));
        $step = str_replace("'", '', $this->input->post('step_id'));
        $data['subStep'] = str_replace("'", '', $this->input->post('subStep'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->updateTable('substep', $data, ['id' => $subStep]);
        redirect('SuperAdmin/detailStep/' . $step);
    }
    public function updateDataStep()
    {
        $data['step'] = str_replace("'", '', $this->input->post('step'));
        $data['description'] = str_replace("'", '', $this->input->post('description'));
        $id = str_replace("'", '', $this->input->post('id'));
        $data['drive'] = str_replace("'", '', $this->input->post('drive'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->updateTable('step', $data, ['id' => $id]);
        redirect('SuperAdmin/workflow/' . str_replace("'", '', $this->input->post('service_id')));
    }
    public function processUpdateOrder()
    {
        $data['user_id'] = str_replace("'", '', $this->input->post('client'));
        $data['message'] = str_replace("'", '', $this->input->post('message'));
        $data['partner_id'] = str_replace("'", '', $this->input->post('partner'));
        $data['financial_statements'] = str_replace("'", '', $this->input->post('financial_statements'));
        $data['manager_id'] = str_replace("'", '', $this->input->post('manager'));
        $data['supervisor_id'] = str_replace("'", '', $this->input->post('supervisor'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $order_id = str_replace("'", '', $this->input->post('order_id'));
        $service_id = str_replace("'", '', $this->input->post('service_id_s'));
        $service = str_replace("'", '', $this->input->post('service'));
        $forPerson['name'] = str_replace("'", '', $this->input->post('person_responsible'));
        $forPerson['NIK'] = str_replace("'", '', $this->input->post('NIK'));
        $forPerson['NPWP'] = str_replace("'", '', $this->input->post('NPWP'));
        $forPerson['position'] = str_replace("'", '', $this->input->post('position'));
        $forPerson['nationality'] = str_replace("'", '', $this->input->post('nationality'));
        $forPerson['address'] = str_replace("'", '', $this->input->post('address'));
        $forPerson['phone'] = str_replace("'", '', $this->input->post('phone'));
        $forPerson['email'] = str_replace("'", '', $this->input->post('email'));
        $forPerson['order_id'] = $order_id;

        $this->M_table->updateTable('person_responsible', $forPerson, ['order_id' => $order_id]);
        if ($service != $service_id) {
            $data['service_id'] = $service;
            $this->M_table->deleteTableCon('order_step', 'order_id', $order_id); //delete staff lama
        }
        $this->M_table->updateTable('order', $data, ['id' => $order_id]); //update tabel order
        $this->M_table->deleteTableCon('order_staff', 'order_id', $order_id); //delete staff lama
        $staff_id = str_replace("'", '', $this->input->post('staff'));
        $data_staff['order_id'] = $order_id;
        foreach ($staff_id as $user_id) {
            $data_staff['employee_id'] = $user_id;
            $this->M_table->createTable('order_staff', $data_staff); //create staff baru
        }
        redirect('SuperAdmin/detailOrder/' . $order_id);
    }
    public function updateOrderStep()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $id_order = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('order', $id_order);
        $data['validate'] = true;
        $data['dataOrder'] = $this->M_table->getDataOrder($id_order);
        $data['substep'] = $this->M_table->getSubFlowByService($data['dataOrder']['service_id']);
        $data['substepOld'] = $this->M_table->getSubFlow($id_order);
        $data['step'] = $this->M_table->dataTableWhere('step', 'service_id', $data['dataOrder']['service_id']);

        $this->load->view('superAdmin/v_updateOrderStep', $data);
    }
    public function processUpdateOrderStep()
    {
        $id = str_replace("'", '', $this->input->post('step'));
        $data['order_id'] = str_replace("'", '', $this->input->post('order_id'));
        $tSubOld = [];
        $tSubNew = [];
        $subOld = $this->M_table->getSubFlow($data['order_id']);
        foreach ($subOld as $row) {
            array_push($tSubOld, $row['subStep_id']);
        }
        foreach ($id as $row) {
            if (in_array($row, $tSubOld)) {
                continue;
            } else {
                array_push($tSubNew, $row);
            }
        }
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['create_date'] = date('Y-m-d H:i:s');
        foreach ($tSubNew as $row) {
            $data['subStep_id'] = $row;
            $this->M_table->createTable('order_step', $data);
        }
        redirect('SuperAdmin/detailOrder/' . $data['order_id']);
    }
    public function deleteOrder()
    {
        $id_order = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('order', $id_order);
        $this->M_table->deleteTableCon('order', 'id', $id_order);
        $this->M_table->deleteTableCon('order_staff', 'order_id', $id_order);
        $this->M_table->deleteTableCon('order_step', 'order_id', $id_order);
        $this->M_table->deleteTableCon('data', 'order_id', $id_order);
        $this->M_table->deleteTableCon('chatt', 'order_id', $id_order);
        foreach ($this->M_table->getByCon('process', 'order_id', $id_order) as $row) {
            $this->M_table->deleteTableCon('process_report', 'process_id', $row['id']);
        }
        $id_output = $this->M_table->getByCon('output', 'order_id', $id_order);
        $this->M_table->deleteTableCon('output', 'order_id', $id_order);
        $this->M_table->deleteTableCon('meeting', 'output_id', $id_output['id']);
        $this->M_table->deleteTableCon('process', 'order_id', $id_order);
        redirect('SuperAdmin/dataOrder');
    }
    public function processCreateOrder()
    {
        $data['service_id'] = str_replace("'", '', $this->input->post('service'));
        $data['user_id'] = str_replace("'", '', $this->input->post('client'));
        $data['financial_statements'] = str_replace("'", '', $this->input->post('financial_statements'));
        $data['message'] = str_replace("'", '', $this->input->post('message'));
        $data['partner_id'] = str_replace("'", '', $this->input->post('partner'));
        $data['manager_id'] = str_replace("'", '', $this->input->post('manager'));
        $data['supervisor_id'] = str_replace("'", '', $this->input->post('supervisor'));
        $data['statusOrder_id'] = 1;
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['create_date'] = date('Y-m-d H:i:s');
        $data_staff['order_id'] = $this->M_table->createTableOrder('order', $data);
        $forPerson['name'] = str_replace("'", '', $this->input->post('person_responsible'));
        $forPerson['NIK'] = str_replace("'", '', $this->input->post('NIK'));
        $forPerson['NPWP'] = str_replace("'", '', $this->input->post('NPWP'));
        $forPerson['position'] = str_replace("'", '', $this->input->post('position'));
        $forPerson['nationality'] = str_replace("'", '', $this->input->post('nationality'));
        $forPerson['address'] = str_replace("'", '', $this->input->post('address'));
        $forPerson['phone'] = str_replace("'", '', $this->input->post('phone'));
        $forPerson['email'] = str_replace("'", '', $this->input->post('email'));
        $forPerson['order_id'] = $data_staff['order_id'];
        $this->M_table->createTable('person_responsible', $forPerson);
        $forOutput['update_date'] = date('Y-m-d H:i:s');
        $forOutput['create_date'] = date('Y-m-d H:i:s');
        $forOutput['order_id'] = $data_staff['order_id'];
        $forMeeting['output_id'] = $this->M_table->createTableOrder('output', $forOutput);
        $this->M_table->createTable('meeting', $forMeeting);
        $forData['user_id'] = $data['user_id'];
        $forData['order_id'] = $data_staff['order_id'];
        $forData['create_date'] = date('Y-m-d H:i:s');
        $forData['update_date'] = date('Y-m-d H:i:s');
        $forData['status'] = 'not yet';
        for ($i = 1; $i < 3; $i++) {
            $forData['data_id'] = $i;
            $this->M_table->createTable('data', $forData);
        }
        $forReport['order_id'] = $data_staff['order_id'];
        $forReport['create_date'] = date('Y-m-d H:i:s');
        $forReport['update_date'] = date('Y-m-d H:i:s');
        $staff_id = str_replace("'", '', $this->input->post('staff'));
        foreach ($staff_id as $user_id) {
            $data_staff['employee_id'] = $user_id;
            $this->M_table->createTable('order_staff', $data_staff);
        }
        redirect('SuperAdmin/dataOrder');
    }
    public function detailOrder()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $id_order = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('order', $id_order);
        $data['validate'] = true;
        $data['dataOrder'] = $this->M_table->getDataOrder($id_order);
        $data['dataStaff'] = $this->M_table->getDataStaff($id_order);
        $id = $data['dataOrder']['service_id'];
        $data['step'] = $this->M_table->getFlow($id_order);
        $data['substep'] = $this->M_table->getSubFlow($id_order);
        $data['person'] = $this->M_user->person($id_order);
        $this->load->view('superAdmin/v_detailOrder', $data);
    }
    public function approveReport()
    {
        $review_id = $this->uri->rsegment(3);
        if ($review_id == '' || $this->uri->rsegment(4) == '') {
            redirect('SuperAdmin/lock');
        } else {
            if (is_numeric($review_id) || is_numeric($this->uri->rsegment(4))) {
                if ($this->M_table->totalByCon('report_review', 'id', $review_id) == 0) {
                    redirect('SuperAdmin/lock');
                }
                if ($this->M_table->getById('report_review', $review_id)['review_ceo'] == 'do') {
                    $data['review_ceo'] = 'done';
                } else {
                    $data['review_ceo'] = 'do';
                }
                $this->M_table->updateTable('report_review', $data, ['id' => $review_id]);
                redirect('SuperAdmin/progressOrder/' . $this->uri->rsegment(4));
            } else {
                redirect('SuperAdmin/lock');
            }
        }
    }
    public function updateStatusMeeting()
    {
        $meeting_id = str_replace("'", '', $this->uri->rsegment(3));
        $order_id = str_replace("'", '', $this->uri->rsegment(4));
        $this->validateId('meeting', $meeting_id);
        $this->validateId('order', $order_id);
        if ($meeting_id == '' || $order_id == '') {
            redirect('SuperAdmin/lock');
        } else {
            if (is_numeric($meeting_id) && is_numeric($order_id)) {
                if ($this->M_table->getById('meeting', $meeting_id)['status'] == 'do') {
                    $data['status'] = 'done';
                } else {
                    $data['status'] = 'do';
                }
                $this->M_table->updateTable('meeting', $data, ['id' => $meeting_id]);
                redirect('SuperAdmin/progressOrder/' . $order_id);
            } else {
                redirect('SuperAdmin/lock');
            }
        }
    }
    public function deleteMeeting()
    {
        $id_order = str_replace("'", '', $this->uri->rsegment(4));
        $id_meeting = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('order', $id_order);
        $this->validateId('meeting', $id_meeting);
        $meeting = $this->M_table->getMeeting($id_order);
        $action = ['admin_id' => $this->session->userdata('id'), 'action' => 'Delete Meeting in ' . $meeting['via'], 'action_date' => date('Y-m-d H:i:s')];
        $this->M_table->createTable('history_action_admin', $action);
        $this->M_table->deleteTable('meeting', $id_meeting);
        redirect('SuperAdmin/progressOrder/' . $id_order);
    }
    public function createMeeting()
    {
        $data['via'] = str_replace("'", '', $this->input->post('via'));
        $data['link'] = str_replace("'", '', $this->input->post('link'));
        $data['message'] = str_replace("'", '', $this->input->post('message'));
        $order_id = str_replace("'", '', $this->input->post('id_order'));
        $data['output_id'] = $this->M_table->getByCon('output', 'order_id', $order_id)['id'];
        $data['date'] = str_replace("'", '', $this->input->post('date')) . ' ' . str_replace("'", '', $this->input->post('time'));
        $this->M_table->createTable('meeting', $data);
        redirect('SuperAdmin/progressOrder/' . $order_id);
    }
    public function progressOrder()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $id_order = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('order', $id_order);
        $data['validate'] = true;
        $data['dataOrder'] = $this->M_table->getDataOrder($id_order);
        $data['letter'] = $this->M_table->letter($id_order);
        $data['dataProcess'] = $this->M_table->getProcess($id_order);
        $data['output'] = $this->M_table->getOutput($id_order);
        $data['dataStaff'] = $this->M_table->getDataStaff($id_order);
        $data['step'] = $this->M_table->getFlow($id_order);
        $data['subStep'] = $this->M_table->getSubFlow($id_order);
        $data['dataProcessDone'] = $this->M_table->getProcessDone($id_order);
        $data['report'] = $this->M_table->getReport($id_order);
        $data['review'] = $this->M_table->getReview($id_order);
        $data['dataMeeting'] = $this->M_table->getAllMeeting($id_order);
        $data['dataContract'] = $this->M_administrasi->getContract($id_order);
        $data['dataInvoice'] = $this->M_administrasi->getInvoice($id_order);
        $data['dataFile'] = $this->M_administrasi->getFile($id_order);
        $data['dataPayment'] = $this->M_table->dataTableWhere('proof_of_payment', 'order_id', $id_order);

        // percentage input
        $total = count($data['letter']);
        $done = count($this->M_table->percenLetter($id_order, 'done'));
        // $data['percentinput'] 		= round(((20)/$total)*$done,0);
        $data['percentinput'] = 0;
        $data['percentInputNow'] = 0;
        // $data['percentInputNow']    = round(($done/$total)*100,0);

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
                $data['percentprocess'] = round(60, 0);
            } else {
                $data['percentprocess'] = round(60 * $done, 0);
            }
        } else {
            $data['percentprocess'] = round((60 / $total) * $done, 0);
        }
        // percentage output
        $outputDone = $this->M_table->getReport($id_order);
        $outputDone = count($outputDone);
        $data['percentoutput'] = 20 / $total;
        $data['percentoutput'] = round($data['percentoutput'] * $outputDone, 0);
        $data['conOutput'] = true;

        // percentage all
        $data['percentall'] = $data['percentinput'] + $data['percentprocess'] + $data['percentoutput'];
        $this->load->view('superAdmin/v_progressOrder', $data);
    }
    public function createProgress()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $id_order = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('order', $id_order);
        $data['dataOrder'] = $this->M_table->getDataOrder($id_order);
        $data['dataProcess'] = $this->M_table->getProcess($id_order);
        $data['dataStaff'] = $this->M_table->getDataStaff($id_order);
        $data['step'] = $this->M_table->getFlow($id_order);
        $data['subStep'] = $this->M_table->getSubFlow($id_order);
        $data['dataProcessDone'] = $this->M_table->getProcessDone($id_order);
        $data['dataProcess'] = $this->M_table->getProcess($id_order);
        $data['output'] = $this->M_table->getOutput($id_order);
        $data['report'] = $this->M_table->getReport($id_order);
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
                $data['percentprocess'] = round(60, 0);
            } else {
                $data['percentprocess'] = round(60 * $done, 0);
            }
        } else {
            $data['percentprocess'] = round((60 / $total) * $done, 0);
        }
        $this->load->view('superAdmin/v_createProgress', $data);
    }

    public function detailOrderDone()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $id_order = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('order', $id_order);
        $data['validate'] = true;
        $data['dataOrder'] = $this->M_table->getDataOrder($id_order);
        $data['letter'] = $this->M_table->letter($id_order);
        $data['dataProcess'] = $this->M_table->getProcess($id_order);
        $data['output'] = $this->M_table->getOutput($id_order);
        $data['dataStaff'] = $this->M_table->getDataStaff($id_order);
        $data['step'] = $this->M_table->getFlow($id_order);
        $data['subStep'] = $this->M_table->getSubFlow($id_order);
        $data['dataProcessDone'] = $this->M_table->getProcessDone($id_order);
        $data['report'] = $this->M_table->getReport($id_order);
        $data['review'] = $this->M_table->getReview($id_order);
        $data['meeting'] = $this->M_table->getMeeting($id_order);
        $this->load->view('superAdmin/v_detailOrderDone', $data);
    }
    // ==================== DATA ====================
    public function processUpdateData()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('order', $id);
        $data['status'] = str_replace("'", '', $this->input->post('status[]'));
        $notYet['status'] = 'not yet';
        $this->M_table->updateTable('data', $notYet, ['order_id' => $id]);
        foreach ($data['status'] as $key) {
            $status['status'] = 'done';
            $this->M_table->updateTable('data', $status, ['id' => $key]);
        }
        redirect('SuperAdmin/progressOrder/' . $id);
    }
    public function processCreateData()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('order', $id);
        $this->validateId('user', $this->uri->rsegment(4));
        $data['data'] = str_replace("'", '', $this->input->post('data'));
        $addData['data_id'] = $this->M_table->createTableOrder('detaildata', $data);
        $addData['order_id'] = $id;
        $addData['user_id'] = $this->uri->rsegment(4);
        $addData['status'] = 'not yet';
        $addData['create_date'] = date('Y-m-d H:i:s');
        $addData['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->createTable('data', $addData);
        redirect('SuperAdmin/progressOrder/' . $id);
    }
    public function deleteData()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('data', $id);
        $order_id = str_replace("'", '', $this->uri->rsegment(4));
        $this->validateId('order', $order_id);
        $this->M_table->deleteTable('detaildata', $this->M_table->getById('data', $id)['data_id']);
        $this->M_table->deleteTable('data', $id);
        redirect('SuperAdmin/progressOrder/' . $order_id);
    }
    // ==================== PROGRESS ====================
    public function processCreateProgress()
    {
        $data['order_id'] = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('order', $data['order_id']);
        $data['order_step_id'] = str_replace("'", '', $this->input->post('order_step_id'));
        $data['employee_id'] = str_replace("'", '', $this->input->post('employee'));
        $data['status'] = str_replace("'", '', $this->input->post('status'));
        $data['estimasi'] = str_replace("'", '', $this->input->post('estimasi'));
        $data['create_date'] = date('Y-m-d H:i:s');
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->createTable('process', $data);
        $this->session->set_flashdata('inputProgress', 'true');
        redirect('SuperAdmin/createProgress/' . $data['order_id']);
    }
    public function deleteProgress()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $order_id = str_replace("'", '', $this->uri->rsegment(4));
        $this->validateId('process', $id);
        $this->validateId('order', $order_id);
        $this->M_table->deleteTable('process', $id);
        redirect('SuperAdmin/progressOrder/' . $order_id);
    }
    public function processUpdateProgress()
    {
        $id = str_replace("'", '', $this->uri->rsegment(4));
        $this->validateId('process', $id);
        $this->validateId('order', $this->uri->rsegment(3));
        $data['order_id'] = str_replace("'", '', $this->uri->rsegment(3));
        $data['order_step_id'] = str_replace("'", '', $this->input->post('os_id'));
        $order_step['subStep_id'] = str_replace("'", '', $this->input->post('subStep'));
        $data['employee_id'] = str_replace("'", '', $this->input->post('employee'));
        $data['status'] = str_replace("'", '', $this->input->post('status'));
        $data['estimasi'] = str_replace("'", '', $this->input->post('estimasi'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->updateTable('order_step', $order_step, ['id' => $data['order_step_id']]);
        $this->M_table->updateTable('process', $data, ['id' => $id]);
        redirect('SuperAdmin/updateProgress/' . $id . '/' . $data['order_id']);
    }
    public function updateProgress()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $id_progress = str_replace("'", '', $this->uri->rsegment(3));
        $id_order = str_replace("'", '', $this->uri->rsegment(4));
        $data['dataProcess'] = $this->M_table->getProcessByStep($id_progress);
        $this->validateId('order', $id_order);
        $this->validateId('process', $id_progress);
        $data['validate'] = true;
        $data['dataOrder'] = $this->M_table->getDataOrder($id_order);
        $data['dataStaff'] = $this->M_table->getDataStaff($id_order);
        $data['order_id'] = $id_order;
        $data['subStep'] = $this->M_table->getSubFlow($id_order);
        $this->load->view('superAdmin/v_updateProgress', $data);
    }
    public function detailProgress()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $id_progress = str_replace("'", '', $this->uri->rsegment(3));
        $id_order = str_replace("'", '', $this->uri->rsegment(4));
        $this->validateId('order', $id_order);
        $this->validateId('process', $id_progress);
        $data['dataProcess'] = $this->M_table->getProcessByStep($id_progress);
        $data['dataOrder'] = $this->M_table->getDataOrder($id_order);
        $data['dataStaff'] = $this->M_table->getDataStaff($id_order);
        $data['order_id'] = $id_order;
        $data['subStep'] = $this->M_table->getSubFlow($id_order);
        $this->load->view('superAdmin/', $data);
    }
    public function updateMeeting()
    {
        $id = str_replace("'", '', $this->input->post('id'));
        $data['via'] = str_replace("'", '', $this->input->post('via'));
        $data['link'] = str_replace("'", '', $this->input->post('link'));
        $order_id = str_replace("'", '', $this->input->post('order_id'));
        $data['date'] = str_replace("'", '', $this->input->post('date')) . ' ' . str_replace("'", '', $this->input->post('time'));
        $this->M_table->updateTable('meeting', $data, ['id' => $id]);
        redirect('superAdmin/progressOrder/' . $order_id);
    }
    public function updateStatusMeetingP()
    {
        $meeting_id = str_replace("'", '', $this->uri->rsegment(3));
        $order_id = str_replace("'", '', $this->uri->rsegment(4));
        $this->validateId('order', $order_id);
        $this->validateId('meeting', $meeting_id);
        if ($this->M_table->getById('meeting', $meeting_id)['permission'] == 'no') {
            $data['permission'] = 'yes';
        } else {
            $data['permission'] = 'no';
        }
        $this->M_table->updateTable('meeting', $data, ['id' => $meeting_id]);
        redirect('superAdmin/progressOrder/' . $order_id);
    }
    public function updateStatusMeetingF()
    {
        $meeting_id = str_replace("'", '', $this->uri->rsegment(3));
        $order_id = str_replace("'", '', $this->uri->rsegment(4));
        $this->validateId('order', $order_id);
        $this->validateId('meeting', $meeting_id);
        if ($this->M_table->getById('meeting', $meeting_id)['fixed'] == 'no') {
            $data['fixed'] = 'yes';
        } else {
            $data['fixed'] = 'no';
        }
        $this->M_table->updateTable('meeting', $data, ['id' => $meeting_id]);
        redirect('superAdmin/progressOrder/' . $order_id);
    }
    public function turnFinishOrder()
    {
        $order_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('order', $order_id);
        $data['statusOrder_id'] = 2;
        $this->M_table->updateTable('order', $data, ['id' => $order_id]);
        redirect('superAdmin/dataOrder');
    }
    public function turnDoOrder()
    {
        $order_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('order', $order_id);
        $data['statusOrder_id'] = 1;
        $this->M_table->updateTable('order', $data, ['id' => $order_id]);
        redirect('superAdmin/dataOrder');
    }
    // ==================== WORKFLOW ====================
    public function dataWorkflow()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['c1'] = $this->M_table->getByCon('categoryservice', 'id', 1);
        $data['c2'] = $this->M_table->getByCon('categoryservice', 'id', 2);
        $data['c3'] = $this->M_table->getByCon('categoryservice', 'id', 3);
        $data['c4'] = $this->M_table->getByCon('categoryservice', 'id', 4);
        $data['c5'] = $this->M_table->getByCon('categoryservice', 'id', 5);
        $data['data1'] = $this->M_table->totalByCon('services', 'category_service_id', 1);
        $data['data2'] = $this->M_table->totalByCon('services', 'category_service_id', 2);
        $data['data3'] = $this->M_table->totalByCon('services', 'category_service_id', 3);
        $data['data4'] = $this->M_table->totalByCon('services', 'category_service_id', 4);
        $data['data5'] = $this->M_table->totalByCon('services', 'category_service_id', 5);
        $data['data0'] = $this->M_table->totalByCon('services', 'category_service_id', 0);
        $this->load->view('superAdmin/v_dataWorkflow', $data);
    }
    public function detailWorkflow()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $id = str_replace("'", '	', $this->uri->rsegment(3));
        $this->validateId('categoryservice', $id);
        $data['validate'] = true;
        $data['selected'] = $this->M_table->getByCon('categoryservice', 'id', $id);
        $data['service'] = $this->M_table->getService($id);
        $this->load->view('superAdmin/v_detailWorkflow', $data);
    }
    public function workflow()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('services', $id);
        if ($this->M_table->totalByCon('services', 'id', $id) > 0) {
            $data['service'] = $this->M_table->getByCon('services', 'id', $id);
        }
        if ($this->M_table->totalByCon('step', 'service_id', $id) == 0) {
            $data['validate'] = false;
        } else {
            $data['validate'] = 'hm';
            $data['selected'] = $this->M_table->dataTableWhere('step', 'service_id', $id . ' ORDER BY id');
        }
        $this->load->view('superAdmin/v_step', $data);
    }
    public function processCreateStep()
    {
        $data['step'] = str_replace("'", '', $this->input->post('name'));
        $data['description'] = str_replace("'", '', $this->input->post('description'));
        $con = str_replace("'", '', $this->input->post('con'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['create_date'] = date('Y-m-d H:i:s');
        $category = str_replace("'", '', $this->uri->rsegment(3));
        if (is_numeric($category)) {
            $data['service_id'] = str_replace("'", '', $category);
            $this->M_table->createTable('step', $data);
        }
        if ($con == '') {
            redirect('SuperAdmin/workflow/' . $category);
        } else {
            $order_id = str_replace("'", '', $this->input->post('order_id'));
            redirect('SuperAdmin/updateOrderStep/' . $order_id);
        }
    }
    public function deleteStep()
    {
        $category = str_replace("'", '', $this->uri->rsegment(3));
        $service = str_replace("'", '', $this->uri->rsegment(4));
        if ($category == '' || $service == '') {
            redirect('SuperAdmin/dataWorkflow');
        } else {
            if (is_numeric($category) && is_numeric($service)) {
                $this->M_table->deleteTable('step', $category);
                $step = $this->M_table->getByCon('step', 'id', $category)['step'];
                redirect('SuperAdmin/workflow/' . $service);
            } else {
                redirect('SuperAdmin/lock');
            }
        }
    }
    public function detailStep()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $id_category = str_replace("'", '', $this->uri->rsegment(3));
        if ($id_category == '') {
            redirect('SuperAdmin/dataWorkflow');
        } else {
            if (is_numeric($id_category)) {
                if ($this->M_table->totalByCon('step', 'id', $id_category) > 0) {
                    $data['step'] = $this->M_table->getByCon('step', 'id', $id_category);
                }
                if ($this->M_table->totalByCon('substep', 'step_id', $id_category) == 0) {
                    $data['validate'] = false;
                } else {
                    $data['validate'] = 'hm';
                    $data['subStep'] = $this->M_table->dataTableWhere('substep', 'step_id', $id_category);
                    $data['step'] = $this->M_table->getByCon('step', 'id', $id_category);
                }
                $this->load->view('superAdmin/v_subStep', $data);
            } else {
                redirect('SuperAdmin/lock');
            }
        }
    }
    public function processCreateSubStep()
    {
        $data['subStep'] = str_replace("'", '', $this->input->post('name'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['create_date'] = date('Y-m-d H:i:s');
        $data['step_id'] = str_replace("'", '', $this->input->post('step_id'));
        // print_r($data); exit();
        $this->M_table->createTable('substep', $data);
        if (str_replace("'", '', $this->input->post('order_id')) == '') {
            redirect('SuperAdmin/detailStep/' . $data['step_id']);
        } else {
            redirect('SuperAdmin/updateOrderStep/' . str_replace("'", '', $this->input->post('order_id')));
        }
    }
    public function deleteSubStep()
    {
        $category = str_replace("'", '', $this->uri->rsegment(3));
        $service = str_replace("'", '', $this->uri->rsegment(4));
        if ($category == '' || $service == '') {
            redirect('SuperAdmin/dataWorkflow');
        } else {
            if (is_numeric($category) && is_numeric($service)) {
                $this->M_table->deleteTable('substep', $category);
                redirect('SuperAdmin/detailStep/' . $service);
            } else {
                redirect('SuperAdmin/lock');
            }
        }
    }
    // ================== SCURITY ====================
    public function lock()
    {
        $id = $this->session->userdata('key');
        $data['logout'] = date('Y-m-d H:i:s');
        $this->M_table->updateTable('history_login', $data, ['login' => $id]);
        $this->session->sess_destroy();
        $this->load->view('v_anonymous');
    }
    public function scId($segmen, $table, $col)
    {
        $id = $segmen;
        if ($id == '') {
            redirect('SuperAdmin/lock');
        } else {
            if (is_numeric($id)) {
                if ($this->M_table->totalByCon($table, $col, $id) == 0) {
                    return false;
                } else {
                    return true;
                }
            } else {
                redirect('SuperAdmin/lock');
            }
        }
    }
    // ================== CHATT ====================
    public function dataChatt()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['order'] = $this->M_table->dataOrderChatt();
        $this->load->view('superAdmin/v_dataChatt', $data);
    }
    public function selectedChatt()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $order_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('order', $order_id);
        $data['validate'] = true;
        $data['chatt'] = $this->M_table->dataChatt($order_id);
        $data['dataOrder'] = $this->M_table->selectOrder($order_id);
        $this->load->view('superAdmin/v_selectedChatt', $data);
    }
    public function addChatt()
    {
        $order_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('order', $order_id);
        $data['order_id'] = $order_id;
        $data['user_id'] = 0;
        $data['status_id'] = 1;
        $data['chatt'] = str_replace("'", '', $this->input->post('chatt'));
        $data['create_date'] = date('Y-m-d H:i:s');
        $this->M_table->createTable('chatt', $data);
        redirect('SuperAdmin/selectedChatt/' . $order_id);
    }
    // ================== HISTORY ====================
    public function dataHistory()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['admin'] = $this->M_table->getTotalData('history_action_admin');
        $data['employee'] = $this->M_table->getTotalData('history_action_employee') + $this->M_employee->getLogin();
        $data['client'] = $this->M_table->getTotalData('history_action_client') + $this->M_table->totalLogin();
        $this->load->view('superAdmin/v_dataHistory', $data);
    }
    public function historyAdmin()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['login'] = $this->M_table->totalLoginA();
        $data['activity'] = $this->M_table->getTotalData('history_action_admin');
        $this->load->view('superAdmin/v_historyAdmin', $data);
    }
    public function loginAdmin()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['admin'] = $this->M_user->getByWhere('status_id', 2);
        $this->load->view('superAdmin/v_loginAdmin', $data);
    }
    public function dLoginAdmin()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $user_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('user', $user_id);
        $data['admin'] = $this->M_user->getLogin($user_id);
        $this->load->view('superAdmin/v_dLoginAdmin', $data);
    }
    public function activityAdmin()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['client'] = $this->M_user->getByWhere('status_id', 2);
        $this->load->view('superAdmin/v_activityAdmin', $data);
    }
    public function dActivityAdmin()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $user_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('user', $user_id);
        $data['activity'] = $this->M_user->getActionA($user_id);
        $data['admin'] = $this->M_user->getById($user_id);
        $this->load->view('superAdmin/v_dActivityAdmin', $data);
    }
    public function historyClient()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['login'] = $this->M_table->totalLogin();
        $data['activity'] = $this->M_table->getTotalData('history_action_client');
        $this->load->view('superAdmin/v_historyClient', $data);
    }
    public function loginClient()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['client'] = $this->M_user->getByWhere('status_id', 1);
        $this->load->view('superAdmin/v_loginClient', $data);
    }
    public function dLoginClient()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $user_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('user', $user_id);
        $data['client'] = $this->M_user->getLogin($user_id);
        $this->load->view('superAdmin/v_dLoginClient', $data);
    }
    public function activityClient()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['client'] = $this->M_user->getByWhere('status_id', 1);
        $this->load->view('superAdmin/v_activityClient', $data);
    }
    public function dActivityClient()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $user_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('user', $user_id);
        $data['activity'] = $this->M_user->getAction($user_id);
        $data['client'] = $this->M_user->getById($user_id);
        $this->load->view('superAdmin/v_dActivityClient', $data);
    }
    public function historyEmployee()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['login'] = $this->M_employee->getLogin();
        $data['activity'] = $this->M_table->getTotalData('history_action_employee');
        $this->load->view('superAdmin/v_historyEmployee', $data);
    }
    public function loginEmployee()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['employee'] = $this->M_table->getAll('employee');
        $this->load->view('superAdmin/v_loginEmployee', $data);
    }
    public function dLoginEmployee()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $user_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('employee', $user_id);
        $data['employee'] = $this->M_employee->getLoginById($user_id);
        $this->load->view('superAdmin/v_dLoginEmployee', $data);
    }
    public function activityEmployee()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['employee'] = $this->M_table->getAll('employee');
        $this->load->view('superAdmin/v_activityEmployee', $data);
    }
    public function dActivityEmployee()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $user_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('employee', $user_id);
        $data['activity'] = $this->M_employee->getAction($user_id);
        $data['dataE'] = $this->M_table->getById('employee', $user_id);
        $this->load->view('superAdmin/v_dActivityEmployee', $data);
    }

    // ================== INFORMATION ====================

    public function dataInformation()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['information'] = $this->M_table->getAll('news');
        $this->load->view('superAdmin/v_dataInformation', $data);
    }
    public function createInformation()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $this->load->view('superAdmin/v_createInformation', $data);
    }
    public function processCreateInformation()
    {
        $data['title'] = str_replace("'", '', $this->input->post('title'));
        $data['description'] = str_replace("'", '', $this->input->post('description'));
        $data['link'] = str_replace("'", '', $this->input->post('link'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['create_date'] = date('Y-m-d H:i:s');
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_news();
            $data['image'] = $image;
        }
        $this->M_table->createTable('news', $data);
        redirect('SuperAdmin/dataInformation');
    }
    public function detailInformation()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $info_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('news', $info_id);
        $data['info'] = $this->M_table->getById('news', $info_id);
        $this->load->view('superAdmin/v_detailInformation', $data);
    }
    public function deleteInformation()
    {
        $id = $this->uri->rsegment(3);
        $this->validateId('news', $id);
        $upload = $this->M_table->getById('news', $id);
        if (file_exists('assets/upload/images/news/' . $upload['image']) && $upload['image']) {
            unlink('assets/upload/images/news/' . $upload['image']);
        }
        $this->M_table->deleteTable('news', $id);
        redirect('SuperAdmin/dataInformation');
    }
    public function updateInformation()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $info_id = $this->uri->rsegment(3);
        $this->validateId('news', $info_id);
        $data['info'] = $this->M_table->getById('news', $info_id);
        $this->load->view('superAdmin/v_updateInformation', $data);
    }
    public function processUpdateInformation()
    {
        $info_id = $this->input->post('info_id');
        $this->validateId('news', $info_id);
        $data = [
            'title' => str_replace("'", '', $this->input->post('title')),
            'description' => str_replace("'", '', $this->input->post('description')),
            'link' => str_replace("'", '', $this->input->post('link')),
            'update_date' => date('Y-m-d H:i:s'),
            'create_date' => date('Y-m-d H:i:s'),
        ];
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_news();
            $upload = $this->M_table->getById('news', $info_id);
            if (file_exists('assets/upload/images/news/' . $upload['image']) && $upload['image']) {
                unlink('assets/upload/images/news/' . $upload['image']);
            }
            $data['image'] = $image;
        }
        $this->M_table->updateTable('news', $data, ['id' => $info_id]);
        redirect('superAdmin/updateInformation/' . $info_id);
    }

    // ================== INFORMATION ====================

    public function dataRecommendation()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['dataClient'] = $this->M_user->getByWhere('status_id', 1);
        $this->load->view('superAdmin/v_dataRecommendation', $data);
    }
    public function userRecommendation()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $user_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('user', $user_id);
        $data['serv'] = $this->M_table->getServRecommendation($user_id);
        $data['dataUser'] = $this->M_table->getById('user', $user_id);
        $this->load->view('superAdmin/v_userRecommendation', $data);
    }
    public function createRecommendation()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $user_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('user', $user_id);
        $data['dataUser'] = $this->M_table->getById('user', $user_id);
        $dataId = $this->M_table->getServRecommendation($user_id);
        $data['selected'] = [];
        foreach ($dataId as $row) {
            array_push($data['selected'], $row['id']);
        }
        $data['service'] = $this->M_table->getAll('services');
        $this->load->view('superAdmin/v_createRecommendation', $data);
    }
    public function processCreateRecommendation()
    {
        $data['service_id'] = str_replace("'", '', $this->input->post('service_id'));
        $data['user_id'] = str_replace("'", '', $this->input->post('user_id'));
        $data['reason'] = str_replace("'", '', $this->input->post('reason'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['create_date'] = date('Y-m-d H:i:s');
        $this->M_table->createTable('service_recommendation', $data);
        redirect('SuperAdmin/userRecommendation/' . $data['user_id']);
    }
    public function deleteRecommendation()
    {
        $serv_id = str_replace("'", '', $this->uri->rsegment(3));
        $user_id = str_replace("'", '', $this->uri->rsegment(4));
        $this->validateId('services', $serv_id);
        $this->validateId('user', $user_id);
        $this->M_table->deleteTable('service_recommendation', $serv_id);
        redirect('SuperAdmin/userRecommendation/' . $user_id);
    }
    public function finances()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['dataClient'] = $this->M_user->getByWhere('status_id', 1);
        $data['spt'] = $this->M_table->getAll('`spt_tahunan`');
        $data['type'] = $this->M_table->getAll('`type_company`');
        $this->load->view('superAdmin/v_finance', $data);
    }
    public function finance_req()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['type'] = $this->M_table->getAll('`type_company`');
        $user_id = str_replace("'", '', $this->uri->rsegment(3));
        if ($this->M_table->getByCon('type_company_client', 'client_id', $user_id) != '') {
            $data['company_type'] = $this->M_table->getByCon('type_company', 'id', $this->M_table->getByCon('type_company_client', 'client_id', $user_id)['type_company']);
        }
        $this->validateId('user', $user_id);
        $data['user_id'] = $user_id;
        $this->load->view('superAdmin/v_finance_req', $data);
    }
    public function finance_core()
    {
        $user_id = $this->input->post('user_id');
        $type = $this->input->post('type');
        $date = $this->input->post('date');
        if (!$user_id && !$type) {
            $type = $this->input->get('type');
            $user_id = $this->input->get('user_id');
            $date = $this->input->get('date');
        }
        $this->validateId('user', $user_id);
        if (preg_match('/^\d{4}-\d{2}$/', $date) || preg_match('/^\d{4}$/', $date)) {
            $data['company_type'] = $this->M_table->getByCon('type_company', 'id', $this->M_table->getByCon('type_company_client', 'client_id', $user_id)['type_company']);
            $data['client'] = $this->M_user->profile($user_id);
            $data['user_id'] = $user_id;
            $data['komentar'] = $this->M_table->dataTableWhere('tabel_komentar_financial_dashboard', 'user_id', $user_id . ' order by updated_at DESC');
            if ($type == 'month') {
                $data['type'] = 'month';
                $data['date'] = $date;
                $this->load->view('superAdmin/finance_month/v_finance-core', $data);
            }
            if ($type == 'year') {
                $data['type'] = 'year';
                $data['date'] = $date;
                $this->load->view('superAdmin/finance_year/v_finance-core', $data);
            }
        } else {
            redirect('SuperAdmin/lock');
        }
    }
    public function finance_manage()
    {
        $user_id = $this->input->get('user_id');
        $date = $this->input->get('date');
        if (!$user_id && !$date) {
            $user_id = $this->input->post('user_id');
            $date = $this->input->post('date');
        }
        $this->validateId('user', $user_id);
        $data['date'] = $date;
        $data['sptClient'] = $this->M_table->get_spt_clientDate($user_id, $date . '-02');
        $data['type'] = $this->M_table->getAll('`type_company`');
        $data['company_type'] = $this->M_table->getByCon('type_company', 'id', $this->M_table->getByCon('type_company_client', 'client_id', $user_id)['type_company']);
        $data['dataTahunan'] = $this->M_table->dataTableWhere('spt_tahunan', 'type_company_id', $this->M_table->getByCon('type_company_client', 'client_id', $user_id)['type_company']);
        $data['client'] = $this->M_user->profile($user_id);
        $data['user_id'] = $user_id;
        // print_r($data['sptClient']);
        // die;
        $this->load->view('superAdmin/finance_month/v_finance-manage', $data);
    }

    public function finance_manage_year()
    {
        $user_id = $this->input->get('user_id');
        $date = $this->input->get('date');
        if (!$user_id && !$date) {
            $user_id = $this->input->post('user_id');
            $date = $this->input->post('date');
        }
        if (!$user_id && !$date) {
            redirect('SuperAdmin/finances');
        }

        $this->validateId('user', $user_id);
        $data['sptClient'] = $this->M_table->get_spt_clientDate_year($user_id, $date);
        $data['date'] = $date;
        $data['type'] = $this->M_table->getAll('type_company');
        $data['company_type'] = $this->M_table->getByCon('type_company', 'id', $this->M_table->getByCon('type_company_client', 'client_id', $user_id)['type_company']);
        $data['dataTahunan'] = $this->M_table->dataTableWhere('spt_tahunan', 'type_company_id', $this->M_table->getByCon('type_company_client', 'client_id', $user_id)['type_company']);
        $data['client'] = $this->M_user->profile($user_id);
        $data['user_id'] = $user_id;
        $this->load->view('superAdmin/finance_year/v_finance-manage', $data);
    }
    public function addSubAccount()
    {
        $data['client_id'] = str_replace("'", '', $this->input->post('client_id'));
        $data['spt_date'] = str_replace("'", '', $this->input->post('spt_date'));
        $data['title'] = str_replace("'", '', $this->input->post('title_sub_account'));
        $data['spt_tahunan_id'] = str_replace("'", '', $this->input->post('spt_tahunan_id'));
        $this->M_table->createTable('sub_spt_tahunan_client_pertahun', $data);

        if (isset($_POST['url'])) {
            return redirect($_POST['url']);
        } else {
            return redirect('SuperAdmin/finance_manage_year?user_id=' . $data['client_id'] . '&date=' . $data['spt_date']);
        }
    }
    public function addSubAccountMonth()
    {
        $data['client_id'] = str_replace("'", '', $this->input->post('client_id'));
        $data['spt_date'] = str_replace("'", '', $this->input->post('spt_date')) . '-02';
        $data['title'] = str_replace("'", '', $this->input->post('title_sub_account'));
        $data['spt_tahunan_id'] = str_replace("'", '', $this->input->post('spt_tahunan_id')); 
        $this->M_table->createTable('sub_spt_tahunan_client_perbulan', $data);

        if (isset($_POST['url'])) {
            return redirect($_POST['url']);
        } else {
            return redirect('SuperAdmin/finance_input?user_id=' . $data['client_id'] . '&date=' . $data['spt_date']);
        }
    }

    public function delSubAccount()
    {
        $data['user_id'] = str_replace("'", '', $this->input->get('user_id'));
        $data['date'] = str_replace("'", '', $this->input->get('date'));
        $id = str_replace("'", '', $this->input->get('id'));
        $this->M_table->deleteTable('sub_spt_tahunan_client_pertahun', $id);
        return redirect('SuperAdmin/finance_manage_year?user_id=' . $data['user_id'] . '&date=' . $data['date']);
    }
    // public function manageFormula()
    // {
    //     $data['user_id']    = str_replace("'", "", $this->input->post("user_id"));
    //     $data['date']       = str_replace("'", "", $this->input->post("date"));
    //     $data["client"]         = $this->M_table->getById('user', $data['user_id']);
    //     $data["company_type"]   = $this->M_table->getByCon('type_company','id', $this->M_table->getByCon('type_company_client','client_id', $data['user_id'])['type_company']);
    //     $data['sptClient']  = $this->M_table->get_spt_client($data['user_id'], $data['date']."-02");
    //     $data['dataName']   = str_replace("'", "", $this->input->post("dataName"));
    //     $date = $this->input->post("date")."-02";$date = "'$date'";
    //     $name = $data['dataName'];
    //     $name = "`$name`";
    //     $data['value']   = $this->M_table->getByCon2($name,"client_finance",'client_id ', $this->input->post("user_id") . ' AND data_date = ' . $date);
    //     $data['formulas']   = $this->M_table->getByCon('client_finance_formula','client_id ', $data['user_id'] . ' AND title = ' . str_replace("`","'",$name));
    //     if ($data['client'] == "") {
    //         redirect('SuperAdmin/lock');
    //     }
    //     $this->load->view('superAdmin/finance_month/v_manage_formula',$data);
    // }
    public function finance_input()
    {
        $user_id = $this->input->get('user_id') ?: $this->input->post('user_id');
        $date = $this->input->get('date') ?: $this->input->post('date');
        if (!$user_id || !$date) {
            show_error('User ID and Date are required');
        } else {
            if (preg_match('/^\d{4}-\d{2}$/', $date)) {
                $data['message'] = 'display financial data for the month: ' . $date;
                $this->validateId('user', $user_id);
                $data['date'] = $date;
                $data['sptClient'] = $this->M_table->get_spt_client($user_id, $date . '-02');
                $data['type'] = $this->M_table->getAll('`type_company`');
                $data['company_type'] = $this->M_table->getByCon('type_company', 'id', $this->M_table->getByCon('type_company_client', 'client_id', $user_id)['type_company']);
                $data['client'] = $this->M_user->profile($user_id);
                $data['user_id'] = $user_id;
                $data['dataTahunan'] = $this->M_table->dataTableWhere('spt_tahunan', 'type_company_id', $this->M_table->getByCon('type_company_client', 'client_id', $user_id)['type_company']);

                $data['data_tambahan'] = $this->M_table->dataTableWhere('spt_tambahan_sementara', 'user_id', $user_id . " AND date =  '" . $date . "-02'");
                // print_r($data['data_tambahan']);
                // die;
                $this->load->view('superAdmin/finance_month/v_finance-input', $data);
            } else {
                redirect('SuperAdmin/lock');
            }
        }
    }
    public function finance_input_year()
    {
        $user_id = $this->input->get('user_id') ?: $this->input->post('user_id');
        $date = $this->input->get('date') ?: $this->input->post('date');

        if ($user_id && $date) {
            $this->validateId('user', $user_id);
            if (preg_match('/^\d{4}$/', $date)) {
                $data['sptClient'] = $this->M_table->get_spt_clientDate_year($user_id, $date);
                $type_company_client = $this->M_table->getByCon('type_company_client', 'client_id', $user_id);
                $data['company_type'] = $this->M_table->getByCon('type_company', 'id', $type_company_client['type_company']);
                $data['client'] = $this->M_user->profile($user_id);
                $data['user_id'] = $user_id;
                $data['dataTahunan'] = $this->M_table->dataTableWhere('spt_tahunan', 'type_company_id', $this->M_table->getByCon('type_company_client', 'client_id', $user_id)['type_company']);

                $data['date'] = $date;
                $data['data_tambahan'] = $this->M_table->dataTableWhere('spt_tambahan_sementara_pertahun', 'user_id', $user_id . " AND date =  '" . $date . "'");

                $this->load->view('superAdmin/finance_year/v_finance-input', $data);
            } else {
                redirect('SuperAdmin/lock');
            }
        } else {
            redirect('SuperAdmin/finances');
        }
    }
    // public function finance_formula()
    // {
    //     $user_id        = str_replace("'", "", $this->uri->rsegment(3));
    //     $date           = str_replace("'", "", $this->uri->rsegment(4));
    //     $data['date']   = str_replace("'", "", $this->input->post("date"));
    //     $this->validateId('user',$user_id);
    //     if ($date != "") {
    //         $data['date'] = $date;
    //     }
    //     else{
    //         $data['sptClient'] = [];
    //     }
    //         $data['sptClient']      = $this->M_table->get_spt_client($user_id,$data['date']."-02");
    //         $data['formulaFinance'] = $this->M_table->get_formula_finance($user_id,$data['date']."-02");
    //         $data["company_type"]   = $this->M_table->getByCon('type_company','id', $this->M_table->getByCon('type_company_client','client_id', $user_id)['type_company']);
    //         $data["client"]         = $this->M_table->getById('user', $user_id);
    //         $data["user_id"]        = $user_id;
    //         $this->load->view('superAdmin/finance/v_finance-formula',$data);
    // }
    public function updateValueSptClient()
    {
        $date = str_replace("'", '', $this->input->post('spt_date'));
        $client_id = str_replace("'", '', $this->input->post('client_id'));
        foreach ($this->M_table->get_spt_client($client_id, $date . '-02') as $key) {
            $da = $this->input->post('value' . $key['id']);
            $da = str_replace('Rp.', '', "$da");
            $da = str_replace('Rp', '', "$da");
            $da = str_replace(',', '', "$da");
            $data['value'] = str_replace('.', '', "$da");
            $da = $this->input->post('target' . $key['id']);
            $da = str_replace('Rp.', '', "$da");
            $da = str_replace('Rp', '', "$da");
            $da = str_replace(',', '', "$da");
            $data['target'] = str_replace('.', '', "$da");
            if ($data['target'] == 0) {
                $data['realization'] = 0;
            } else {
                $data['realization'] = round((($data['value'] - $data['target']) / $data['target']) * 100, 1);
            }
            $data['update_date'] = date('Y-m-d H:i:s');
            $this->M_table->updateTable('spt_tahunan_client', $data, ['id' => $key['id']]);
        }
		
        $a = 'a';
        $forhpp = 0;
        $forpenjualanbersih = 0;
        if ($this->M_table->totalDataTableWhere('sub_spt_tahunan_client_perbulan', 'client_id', $client_id . ' AND spt_date = "' . $date.'-02"') > 0) {
            $variable = $this->M_table->dataTableWhere('sub_spt_tahunan_client_perbulan', 'client_id', $client_id . ' AND spt_date = "' . $date.'-02"');
            $datasptakuntambahan['client_id'] = $client_id;
            foreach ($variable as $arrakuntambahan) {
                $da = $this->input->post('value_spt_akun_tambahan' . $arrakuntambahan['id']);
                $da = str_replace('Rp.', '', "$da");
                $da = str_replace('Rp', '', "$da");
                $da = str_replace(',', '', "$da");
                $datasptakuntambahan['value'] = str_replace('.', '', "$da");
                $da = $this->input->post('target_spt_akun_tambahan' . $arrakuntambahan['id']);
                $da = str_replace('Rp.', '', "$da");
                $da = str_replace('Rp', '', "$da");
                $da = str_replace(',', '', "$da");
                $datasptakuntambahan['target'] = str_replace('.', '', "$da");
                $this->M_table->updateTable('sub_spt_tahunan_client_perbulan', $datasptakuntambahan, ['id' => $arrakuntambahan['id']]);
                if ($arrakuntambahan['spt_tahunan_id'] == $this->M_table->getByCon('spt_tahunan', 'description', "'PERSEDIAAN AKHIR'")['id']) {
                    $forhpp = $forhpp + $datasptakuntambahan['value'];
                }

                if ($arrakuntambahan['spt_tahunan_id'] == $this->M_table->getByCon('spt_tahunan', 'description', "'PENJUALAN BERSIH' AND type_company_id = " . $this->M_table->getByCon('type_company_client', 'client_id', $client_id)['type_company'])['id']) {
                    $forpenjualanbersih = $forpenjualanbersih + $datasptakuntambahan['value'];
                }
            }
            $a = 'b';
        }

        if (!empty($this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'HARGA POKOK PENJUALAN')['id'])) {
            $hpp['value'] = $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'PERSEDIAAN AWAL')['value'] + $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'PEMBELIAN')['value'] - $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'PERSEDIAAN AKHIR')['value'];
            $this->M_table->updateTable('spt_tahunan_client', $hpp, ['id' => $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'HARGA POKOK PENJUALAN')['id']]);
        } else {
            $hpp['value'] = 0;
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'PERSEDIAAN AKHIR')['id'])) {
            $PERSEDIAANAKHIR['value'] = $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'PERSEDIAAN')['value'];
            $this->M_table->updateTable('spt_tahunan_client', $PERSEDIAANAKHIR, ['id' => $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'PERSEDIAAN AKHIR')['id']]);
        } else {
            $PERSEDIAANAKHIR['value'] = 0;
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA KOTOR')['id'])) {
            $LABAKOTOR['value'] = $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'PENJUALAN BERSIH')['value'] - $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'HARGA POKOK PENJUALAN')['value'];
            $this->M_table->updateTable('spt_tahunan_client', $LABAKOTOR, ['id' => $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA KOTOR')['id']]);
        } else {
            $LABAKOTOR['value'] = 0;
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA USAHA')['id'])) {
            $LABAUSAHA['value'] = $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA KOTOR')['value'] - ($this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'BEBAN PENJUALAN')['value'] + $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'BEBAN ADMINISTRASI DAN UMUM')['value']);
            $this->M_table->updateTable('spt_tahunan_client', $LABAUSAHA, ['id' => $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA USAHA')['id']]);
        } else {
            $LABAUSAHA['value'] = 0;
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA/RUGI SEBELUM PAJAK PENGHASILAN')['id'])) {
            $LABARUGISEBELUMPAJAKPENGHASILAN['value'] = $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA USAHA')['value'] + $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'PENGHASILAN/(BEBAN) LAIN')['value'] + $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'BAGIAN LABA (RUGI) PERUSAHAAN ASOSIASI')['value'];
            $this->M_table->updateTable('spt_tahunan_client', $LABARUGISEBELUMPAJAKPENGHASILAN, ['id' => $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA/RUGI SEBELUM PAJAK PENGHASILAN')['id']]);
        } else {
            $LABARUGISEBELUMPAJAKPENGHASILAN['value'] = 0;
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA (RUGI) DARI AKTIVITAS NORMAL')['id'])) {
            $LABARUGIDARIAKTIVITASNORMAL['value'] = $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA/RUGI SEBELUM PAJAK PENGHASILAN')['value'] - $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'BEBAN (MANFAAT) PAJAK PENGHASILAN')['value'];
            $this->M_table->updateTable('spt_tahunan_client', $LABARUGIDARIAKTIVITASNORMAL, ['id' => $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA (RUGI) DARI AKTIVITAS NORMAL')['id']]);
        } else {
            $LABARUGIDARIAKTIVITASNORMAL['value'] = 0;
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA/RUGI SEBELUM HAK MINORITAS')['id'])) {
            $LABARUGISEBELUMHAKMINORITAS['value'] = $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA (RUGI) DARI AKTIVITAS NORMAL')['value'] - $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'POS LUAR BIASA')['value'];
            $this->M_table->updateTable('spt_tahunan_client', $LABARUGISEBELUMHAKMINORITAS, ['id' => $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA/RUGI SEBELUM HAK MINORITAS')['id']]);
        } else {
            $LABARUGISEBELUMHAKMINORITAS['value'] = 0;
        }
        
        // Ambil bulan dari $date
        $month = date('m', strtotime($date));

        $LABABERSIH['value'] = $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA/RUGI SEBELUM HAK MINORITAS')['value'] - $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'HAK MINORITAS ATAS LABA (RUGI) BERSIH ANAK PERUSAHAAN')['value'];

        if ($month == '01') {  
            $LABADITAHANTAHUNINI['value'] =  $LABABERSIH['value'];
        } else { 
            $previousMonth = date('m', strtotime($date . ' -1 month'));
            $LABADITAHANTAHUNINI['value'] =  $LABABERSIH['value'] + $this->M_finance->get_days_sales_outstanding2($client_id, date('Y', strtotime($date)).'-'.$previousMonth . '-02', 'LABA DITAHAN TAHUN INI')['value'];
            
        }

        if (!empty($this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA BERSIH')['id'])) {
            $this->M_table->updateTable('spt_tahunan_client', $LABABERSIH, ['id' => $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA BERSIH')['id']]);
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA DITAHAN TAHUN INI')['id'])) {
            $this->M_table->updateTable('spt_tahunan_client', $LABADITAHANTAHUNINI, ['id' => $this->M_finance->get_days_sales_outstanding2($client_id, $date . '-02', 'LABA DITAHAN TAHUN INI')['id']]);
        }
        $data_sementara['Cash Balance In'] = $this->templateNumberValidation($this->input->post('cash_balance_in'));
        $data_sementara['cash_balance_out'] = $this->templateNumberValidation($this->input->post('cash_balance_out'));
        $data_sementara['ebit_target'] = $this->templateNumberValidation($this->input->post('ebit_target'));
        $data_sementara['supplier_name'] = $this->templateNumberValidation($this->input->post('supplier_name'));
        $data_sementara['not_due'] = $this->templateNumberValidation($this->input->post('not_due'));
        $data_sementara['d30'] = $this->templateNumberValidation($this->input->post('30_days'));
        $data_sementara['d60'] = $this->templateNumberValidation($this->input->post('60_days'));
        $data_sementara['d90'] = $this->templateNumberValidation($this->input->post('90_days'));
        $data_sementara['_d90'] = $this->templateNumberValidation($this->input->post('>90_days'));

        if (empty($this->M_table->getByCon('spt_tambahan_sementara', 'user_id ', $client_id . " AND date = '" . $date . "-02'"))) {
            foreach (['Cash Balance In', 'Cash Balance Out', 'Ebit Target', 'Supplier Name', 'Not due', '< 30 days', '< 60 days', '< 90 days', '> 90 days'] as $key) {
                $createSPT['user_id'] = $client_id;
                $createSPT['date'] = $date . '-02';
                $createSPT['description'] = $key;
                $createSPT['value'] = 0;
                $this->M_table->createTable('spt_tambahan_sementara', $createSPT);
            }
        }
        $arr_list = ['Cash Balance In', 'Cash Balance Out', 'Ebit Target', 'Supplier Name', 'Not due', '< 30 days', '< 60 days', '< 90 days', '> 90 days'];
        $no = 0;
        foreach ($data_sementara as $key) {
            $this->M_table->updateTableCon('spt_tambahan_sementara', "value = '" . $key . "' ", 'user_id = ' . $client_id . " AND  date = '" . $date . "-02' AND  description = '" . $arr_list[$no] . "'");
            $no++;
        }
        $_SESSION['message'] = 'data successfully updated';
        redirect('SuperAdmin/finance_input?user_id=' . $client_id . '&date=' . $date);
    }
    public function templateNumberValidation($num)
    {
        $num = str_replace('Rp.', '', "$num");
        $num = str_replace('Rp', '', "$num");
        $num = str_replace(',', '', "$num");
        return str_replace('.', '', "$num");
    }
    public function updateValueSptClient_year()
    {
        $date = str_replace("'", '', $this->input->post('spt_date'));
        $client_id = str_replace("'", '', $this->input->post('client_id'));
        foreach ($this->M_table->get_spt_clientDate_year($client_id, $date) as $key) {
            $da = $this->input->post('value' . $key['id']);
            $da = str_replace('Rp.', '', "$da");
            $da = str_replace('Rp', '', "$da");
            $da = str_replace(',', '', "$da");
            $data['value'] = str_replace('.', '', "$da");
            $da = $this->input->post('target' . $key['id']);
            $da = str_replace('Rp.', '', "$da");
            $da = str_replace('Rp', '', "$da");
            $da = str_replace(',', '', "$da");
            $data['target'] = str_replace('.', '', "$da");
            if ($data['target'] == 0) {
                $data['realization'] = 0;
            } else {
                $data['realization'] = round((($data['value'] - $data['target']) / $data['target']) * 100, 1);
            }
            $data['update_date'] = date('Y-m-d H:i:s');
            $this->M_table->updateTable('spt_tahunan_client_pertahun', $data, ['id' => $key['id']]);
        }
        $a = 'a';
        $forhpp = 0;
        $forpenjualanbersih = 0;
        if ($this->M_table->totalDataTableWhere('sub_spt_tahunan_client_pertahun', 'client_id', $client_id . ' AND spt_date = ' . $date) > 0) {
            $variable = $this->M_table->dataTableWhere('sub_spt_tahunan_client_pertahun', 'client_id', $client_id . ' AND spt_date = ' . $date);
            $datasptakuntambahan['client_id'] = $client_id;
            foreach ($variable as $arrakuntambahan) {
                $da = $this->input->post('value_spt_akun_tambahan' . $arrakuntambahan['id']);
                $da = str_replace('Rp.', '', "$da");
                $da = str_replace('Rp', '', "$da");
                $da = str_replace(',', '', "$da");
                $datasptakuntambahan['value'] = str_replace('.', '', "$da");
                $da = $this->input->post('target_spt_akun_tambahan' . $arrakuntambahan['id']);
                $da = str_replace('Rp.', '', "$da");
                $da = str_replace('Rp', '', "$da");
                $da = str_replace(',', '', "$da");
                $datasptakuntambahan['target'] = str_replace('.', '', "$da");
                $this->M_table->updateTable('sub_spt_tahunan_client_pertahun', $datasptakuntambahan, ['id' => $arrakuntambahan['id']]);
                if ($arrakuntambahan['spt_tahunan_id'] == $this->M_table->getByCon('spt_tahunan', 'description', "'PERSEDIAAN AKHIR'")['id']) {
                    $forhpp = $forhpp + $datasptakuntambahan['value'];
                }

                if ($arrakuntambahan['spt_tahunan_id'] == $this->M_table->getByCon('spt_tahunan', 'description', "'PENJUALAN BERSIH' AND type_company_id = " . $this->M_table->getByCon('type_company_client', 'client_id', $client_id)['type_company'])['id']) {
                    $forpenjualanbersih = $forpenjualanbersih + $datasptakuntambahan['value'];
                }
            }
            $a = 'b';
        }
        if ($forpenjualanbersih > 0) {
            $penjualanbersih['value'] = $forpenjualanbersih;
            $this->M_table->updateTable('spt_tahunan_client_pertahun', $penjualanbersih, ['id' => $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'PENJUALAN BERSIH')['id']]);
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'HARGA POKOK PENJUALAN')['id'])) {
            $hpp['value'] = $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'PERSEDIAAN AWAL')['value'] + $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'PEMBELIAN')['value'] - $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'PERSEDIAAN AKHIR')['value'];
            if ($a == 'b') {
                $hpp['value'] = $hpp['value'] + $forhpp;
            }
            $this->M_table->updateTable('spt_tahunan_client_pertahun', $hpp, ['id' => $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'HARGA POKOK PENJUALAN')['id']]);
        } else {
            $hpp['value'] = 0;
        }
        // if (!empty($this->M_finance->get_days_sales_outstanding2_year($client_id,$date,"PERSEDIAAN AKHIR")['id'])) {
        //     $PERSEDIAANAKHIR['value'] = $this->M_finance->get_days_sales_outstanding2_year($client_id,$date,"PERSEDIAAN")['value'];
        //     $this->M_table->updateTable("spt_tahunan_client_pertahun", $PERSEDIAANAKHIR, ["id" => $this->M_finance->get_days_sales_outstanding2_year($client_id,$date,"PERSEDIAAN AKHIR")['id']]);
        // } else{
        //     $PERSEDIAANAKHIR['value'] = 0;
        // }
        if (!empty($this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA KOTOR')['id'])) {
            $LABAKOTOR['value'] = $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'PENJUALAN BERSIH')['value'] - $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'HARGA POKOK PENJUALAN')['value'];
            $this->M_table->updateTable('spt_tahunan_client_pertahun', $LABAKOTOR, ['id' => $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA KOTOR')['id']]);
        } else {
            $LABAKOTOR['value'] = 0;
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA USAHA')['id'])) {
            $LABAUSAHA['value'] = $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA KOTOR')['value'] - ($this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'BEBAN PENJUALAN')['value'] + $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'BEBAN ADMINISTRASI DAN UMUM')['value']);
            $this->M_table->updateTable('spt_tahunan_client_pertahun', $LABAUSAHA, ['id' => $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA USAHA')['id']]);
        } else {
            $LABAUSAHA['value'] = 0;
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA/RUGI SEBELUM PAJAK PENGHASILAN')['id'])) {
            $LABARUGISEBELUMPAJAKPENGHASILAN['value'] = $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA USAHA')['value'] + $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'PENGHASILAN/(BEBAN) LAIN')['value'] + $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'BAGIAN LABA (RUGI) PERUSAHAAN ASOSIASI')['value'];
            $this->M_table->updateTable('spt_tahunan_client_pertahun', $LABARUGISEBELUMPAJAKPENGHASILAN, ['id' => $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA/RUGI SEBELUM PAJAK PENGHASILAN')['id']]);
        } else {
            $LABARUGISEBELUMPAJAKPENGHASILAN['value'] = 0;
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA (RUGI) DARI AKTIVITAS NORMAL')['id'])) {
            $LABARUGIDARIAKTIVITASNORMAL['value'] = $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA/RUGI SEBELUM PAJAK PENGHASILAN')['value'] - $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'BEBAN (MANFAAT) PAJAK PENGHASILAN')['value'];
            $this->M_table->updateTable('spt_tahunan_client_pertahun', $LABARUGIDARIAKTIVITASNORMAL, ['id' => $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA (RUGI) DARI AKTIVITAS NORMAL')['id']]);
        } else {
            $LABARUGIDARIAKTIVITASNORMAL['value'] = 0;
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA/RUGI SEBELUM HAK MINORITAS')['id'])) {
            $LABARUGISEBELUMHAKMINORITAS['value'] = $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA (RUGI) DARI AKTIVITAS NORMAL')['value'] - $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'POS LUAR BIASA')['value'];
            $this->M_table->updateTable('spt_tahunan_client_pertahun', $LABARUGISEBELUMHAKMINORITAS, ['id' => $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA/RUGI SEBELUM HAK MINORITAS')['id']]);
        } else {
            $LABARUGISEBELUMHAKMINORITAS['value'] = 0;
        }
        $LABABERSIH['value'] = $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA/RUGI SEBELUM HAK MINORITAS')['value'] - $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'HAK MINORITAS ATAS LABA (RUGI) BERSIH ANAK PERUSAHAAN')['value'];

        if (!empty($this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA BERSIH')['id'])) {
            $this->M_table->updateTable('spt_tahunan_client_pertahun', $LABABERSIH, ['id' => $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA BERSIH')['id']]);
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA DITAHAN TAHUN INI')['id'])) {
            $this->M_table->updateTable('spt_tahunan_client_pertahun', $LABABERSIH, ['id' => $this->M_finance->get_days_sales_outstanding2_year($client_id, $date, 'LABA DITAHAN TAHUN INI')['id']]);
        }
        $data_sementara['Cash Balance In'] = $this->templateNumberValidation($this->input->post('cash_balance_in'));
        $data_sementara['cash_balance_out'] = $this->templateNumberValidation($this->input->post('cash_balance_out'));
        $data_sementara['ebit_target'] = $this->templateNumberValidation($this->input->post('ebit_target'));
        $data_sementara['supplier_name'] = $this->templateNumberValidation($this->input->post('supplier_name'));
        $data_sementara['not_due'] = $this->templateNumberValidation($this->input->post('not_due'));
        $data_sementara['d30'] = $this->templateNumberValidation($this->input->post('30_days'));
        $data_sementara['d60'] = $this->templateNumberValidation($this->input->post('60_days'));
        $data_sementara['d90'] = $this->templateNumberValidation($this->input->post('90_days'));
        $data_sementara['_d90'] = $this->templateNumberValidation($this->input->post('>90_days'));

        if (empty($this->M_table->getByCon('spt_tambahan_sementara_pertahun', 'user_id ', $client_id . " AND date = '" . $date . "'"))) {
            foreach (['Cash Balance In', 'Cash Balance Out', 'Ebit Target', 'Supplier Name', 'Not due', '< 30 days', '< 60 days', '< 90 days', '> 90 days'] as $key) {
                $createSPT['user_id'] = $client_id;
                $createSPT['date'] = $date;
                $createSPT['description'] = $key;
                $createSPT['value'] = 0;
                $this->M_table->createTable('spt_tambahan_sementara_pertahun', $createSPT);
            }
        }
        $arr_list = ['Cash Balance In', 'Cash Balance Out', 'Ebit Target', 'Supplier Name', 'Not due', '< 30 days', '< 60 days', '< 90 days', '> 90 days'];
        $no = 0;
        foreach ($data_sementara as $key) {
            $this->M_table->updateTableCon('spt_tambahan_sementara_pertahun', "value = '" . $key . "' ", 'user_id = ' . $client_id . " AND  date = '" . $date . "' AND  description = '" . $arr_list[$no] . "'");
            $no++;
        }
        $_SESSION['message'] = 'data successfully updated';
        redirect('SuperAdmin/finance_input_year?user_id=' . $client_id . '&&date=' . $date);
    }
    public function finance_preview()
    {
        $user_id = str_replace("'", '', $this->uri->rsegment(3));
        $date = str_replace("'", '', $this->uri->rsegment(4));
        $data['date'] = str_replace("'", '', $this->input->post('date'));
        $this->validateId('user', $user_id);
        if ($date != '') {
            $data['date'] = $date;
        }
        if ($data['date'] == '') {
            $data['date'] = date('Y-m');
        } else {
            $data['sptClient'] = [];
        }
        $data['sptClientBulanan'] = $this->M_table->get_spt_client($user_id, $data['date'] . '-02');
        $data['sptClientTahunan'] = $this->M_table->get_spt_client_ById($user_id);
        $data['finance'] = $this->M_table->get_formula_finance($user_id, $data['date'] . '-02');
        $data['company_type'] = $this->M_table->getByCon('type_company', 'id', $this->M_table->getByCon('type_company_client', 'client_id', $user_id)['type_company']);
        $data['client'] = $this->M_table->getById('user', $user_id);
        $data['user_id'] = $user_id;
        $data['user'] = $this->M_user->profile($user_id);
        $this->load->view('superAdmin/finance_preview/finance-preview', $data);
    }
    public function d_finance_preview()
    {
        $user_id = str_replace("'", '', $this->uri->rsegment(3));
        $date = str_replace("'", '', $this->uri->rsegment(4));
        $data['date'] = str_replace("'", '', $this->input->post('date'));
        $this->validateId('user', $user_id);
        if ($date != '') {
            $data['date'] = $date;
        }
        if ($data['date'] == '') {
            $data['date'] = date('Y-m');
        } else {
            $data['sptClient'] = [];
        }
        $data['sptClient'] = $this->M_table->get_spt_client($user_id, $data['date'] . '-02');
        $data['finance'] = $this->M_table->get_formula_finance($user_id, $data['date'] . '-02');
        $data['company_type'] = $this->M_table->getByCon('type_company', 'id', $this->M_table->getByCon('type_company_client', 'client_id', $user_id)['type_company']);
        $data['client'] = $this->M_table->getById('user', $user_id);
        $data['user_id'] = $user_id;
        $this->load->view('superAdmin/finance_preview/finance-preview', $data);
    }
    public function detail_preview()
    {
        $user_id = str_replace("'", '', $this->uri->rsegment(3));
        $data['date'] = date('Y-m');
        $this->validateId('user', $user_id);
        $data['sptClientBulanan'] = $this->M_table->get_spt_client($user_id, $data['date'] . '-02');
        $data['sptClientTahunan'] = $this->M_table->get_spt_client_ById($user_id);
        $data['finance'] = $this->M_table->get_formula_finance($user_id, $data['date'] . '-02');
        $data['company_type'] = $this->M_table->getByCon('type_company', 'id', $this->M_table->getByCon('type_company_client', 'client_id', $user_id)['type_company']);
        $data['client'] = $this->M_table->getById('user', $user_id);
        $data['user_id'] = $user_id;
        $this->load->view('superAdmin/finance_preview/detail/index', $data);
    }
    public function finance_default()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $type_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('type_company', $type_id);
        $data['dataType'] = $this->M_table->getByCon('type_company', 'id', $type_id);
        $data['dataSpt'] = $this->M_table->dataTableWhere('spt_tahunan', 'type_company_id', $type_id);
        $this->load->view('superAdmin/v_finance-default', $data);
    }
    public function processCreateSpt()
    {
        $data['type_company_id'] = str_replace("'", '', $this->input->post('type_company_id'));
        $data['description'] = str_replace("'", '', $this->input->post('description'));
        $data['description_en'] = str_replace("'", '', $this->input->post('description-en'));
        $data['description_jpn'] = str_replace("'", '', $this->input->post('description-jpn'));
        $data['description_cna'] = str_replace("'", '', $this->input->post('description-cna'));
        $data['description_kor'] = str_replace("'", '', $this->input->post('description-kor'));
        $data['category_element'] = str_replace("'", '', $this->input->post('category_element'));
        $data['category_jumlah'] = str_replace("'", '', $this->input->post('category_jumlah'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['create_date'] = date('Y-m-d H:i:s');
        $this->M_table->createTable('`spt_tahunan`', $data);
        redirect('SuperAdmin/finance_default/' . $data['type_company_id']);
    }
    public function deleteSpt()
    {
        $id = $this->uri->rsegment(3);
        $this->validateId('spt_tahunan', $id);
        $type = $this->M_table->getById('spt_tahunan', $id);
        $this->M_table->deleteTable('`spt_tahunan`', $id);
        redirect('SuperAdmin/finance_year/finance_default/' . $type['type_company_id']);
    }
    public function processUpdateSpt()
    {
        $data['type_company_id'] = str_replace("'", '', $this->input->post('type_company_id'));
        $data['description'] = str_replace("'", '', $this->input->post('description'));
        $data['description_en'] = str_replace("'", '', $this->input->post('description-en'));
        $data['description_jpn'] = str_replace("'", '', $this->input->post('description-jpn'));
        $data['description_cna'] = str_replace("'", '', $this->input->post('description-cna'));
        $data['description_kor'] = str_replace("'", '', $this->input->post('description-kor'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->updateTable('spt_tahunan', $data, ['id' => str_replace("'", '', $this->input->post('id'))]);
        redirect('SuperAdmin/finance_default/' . $data['type_company_id']);
    }
    public function createTypeCompanyClient()
    {
        $data['type_company'] = str_replace("'", '', $this->input->post('type_company_id'));
        $data['client_id'] = str_replace("'", '', $this->input->post('client_id'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['create_date'] = date('Y-m-d H:i:s');

        $this->M_table->createTable('`type_company_client`', $data);
        redirect('SuperAdmin/finance_req/' . $data['client_id']);
    }
    public function updateSptClient()
    {
        $data['client_id'] = str_replace("'", '', $this->input->post('client_id'));
        $data['type_company_id'] = str_replace("'", '', $this->input->post('type_company_id'));
        $data['spt_date'] = str_replace("'", '', $this->input->post('spt_date') . '-02');
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['create_date'] = date('Y-m-d H:i:s');
        $dataNew = $this->input->post('spk[]');

        $dataOld = [];
        $forFinance['client_id'] = $data['client_id'];
        $forFinance['data_date'] = $data['spt_date'];
        $forFinance['update_date'] = date('Y-m-d H:i:s');
        $forFinance['create_date'] = date('Y-m-d H:i:s');
        foreach ($this->M_table->get_spt_client($data['client_id'], $data['spt_date']) as $key) {
            array_push($dataOld, $key['spt_tahunan_id']);
        }
        if (empty($dataNew)) {
            $this->M_table->delete3Param('spt_tahunan_client', 'client_id', $data['client_id'] . ' AND spt_date = ', $data['spt_date']);
            $this->M_table->delete3Param('client_finance', 'client_id', $data['client_id'] . ' AND data_date = ', $data['spt_date']);
        } else {
            foreach ($dataOld as $key) {
                if (in_array($key, $dataNew)) {
                    continue;
                } else {
                    $this->M_table->deleteTableCon('spt_tahunan_client', 'spt_tahunan_id', $key);
                }
            }
            foreach ($dataNew as $rows) {
                if (in_array($rows, $dataOld)) {
                    continue;
                } else {
                    $data['spt_tahunan_id'] = $rows;
                    $this->M_table->createTable('spt_tahunan_client', $data);
                }
            }
            if (empty($this->M_table->dataTableWhere2('client_finance', 'client_id', $data['client_id'] . ' AND data_date = ', $data['spt_date']))) {
                $this->M_table->createTable('client_finance', $forFinance);
            }
        }
        redirect('SuperAdmin/finance_manage?user_id=' . $data['client_id'] . '&&date=' . $this->input->post('spt_date'));
    }

    public function updateSptClient_year()
    {
        $data['client_id'] = str_replace("'", '', $this->input->post('client_id'));
        $data['type_company_id'] = str_replace("'", '', $this->input->post('type_company_id'));
        $data['spt_date'] = str_replace("'", '', $this->input->post('spt_date'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['create_date'] = date('Y-m-d H:i:s');
        $dataNew = $this->input->post('spk[]');
        $dataOld = [];
        $forFinance['client_id'] = $data['client_id'];
        $forFinance['data_date'] = $data['spt_date'];
        $forFinance['update_date'] = date('Y-m-d H:i:s');
        $forFinance['create_date'] = date('Y-m-d H:i:s');
        foreach ($this->M_table->get_spt_client_year($data['client_id'], $data['spt_date']) as $key) {
            array_push($dataOld, $key['spt_tahunan_id']);
        }

        if (empty($dataNew)) {
            $this->M_table->delete3Param('spt_tahunan_client_pertahun', 'client_id', $data['client_id'] . ' AND spt_date = ', $data['spt_date']);
            $this->M_table->delete3Param('client_finance', 'client_id', $data['client_id'] . ' AND data_date = ', $data['spt_date']);
        } else {
            foreach ($dataOld as $key) {
                if (in_array($key, $dataNew)) {
                    continue;
                } else {
                    $this->M_table->deleteTableCon('spt_tahunan_client_pertahun', 'spt_tahunan_id', $key);
                }
            }
            foreach ($dataNew as $rows) {
                if (in_array($rows, $dataOld)) {
                    continue;
                } else {
                    $data['spt_tahunan_id'] = $rows;
                    $this->M_table->createTable('spt_tahunan_client_pertahun', $data);
                }
            }
            if (empty($this->M_table->dataTableWhere2('client_finance_tahunan', 'client_id', $data['client_id'] . ' AND data_date = ', $data['spt_date']))) {
                $this->M_table->createTable('client_finance_tahunan', $forFinance);
            }
        }
        redirect('SuperAdmin/finance_manage_year?user_id=' . $data['client_id'] . '&&date=' . $this->input->post('spt_date'));
    }
    public function processManage_Formula()
    {
        $dataku['user_id'] = str_replace("'", '', $this->input->post('user_id'));
        $dataku['date'] = str_replace("'", '', $this->input->post('date'));
        $dataku['dataName'] = str_replace("'", '', $this->input->post('dataName'));
        $name = $this->input->post('dataName');
        $name = "`$name`";
        $name[strlen($name) - 2] = '`';
        $name = substr($name, 0, -1);
        $dataku['formulas'] = $this->M_table->getByCon('client_finance_formula', 'client_id ', $dataku['user_id'] . ' AND title = ' . str_replace('`', "'", $name));
        $date = $this->input->post('date') . '-02';
        $date = "'$date'";
        include 'formula/formula.php';
        redirect('SuperAdmin/finance_formula/' . $dataku['user_id'] . '/' . $this->input->post('date'));
    }

    // ================== SPECIAL TASK ====================

    public function specialTask()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['dataTask'] = $this->M_table->getAllTask();
        $data['dataReport'] = $this->M_table->getAll('dailyreport');
        $this->load->view('superAdmin/v_specialTask', $data);
    }
    public function detailSpecialTask()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['dataStaff'] = $this->M_table->getAll('employee');
        $data['dataCategory'] = $this->M_table->getAll('category_specialtask');
        $data['dataTask'] = $this->M_table->getAllTask();
        $this->load->view('superAdmin/v_specialTaskDetail', $data);
    }
    public function updateStatusTask()
    {
        $task_id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('specialtask', $task_id);
        $task = $this->M_table->getById('specialtask', $task_id);
        if ($task['status'] == 'do') {
            $data['status'] = 'done';
            $this->session->set_flashdata(
                'msg',
                '
            <div class="alert alert-success" role="alert">
                <strong>Data ditandai sudah selesai</strong>
            </div>',
            );
        } else {
            $data['status'] = 'do';
            $this->session->set_flashdata(
                'msg',
                '
            <div class="alert alert-danger" role="alert">
                <strong>Data ditandai belum selesai</strong>
            </div>',
            );
        }
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->updateTable('specialtask', $data, ['id' => $task_id]);

        redirect('SuperAdmin/detailSpecialTask?tag=' . $task['id_category']);
    }
    public function processCreateTask()
    {
        $data['employee_id'] = str_replace("'", '', $this->input->post('employee_id'));
        $data['task'] = str_replace("'", '', $this->input->post('task'));
        $data['description'] = str_replace("'", '', $this->input->post('description'));
        $data['estimasi'] = str_replace("'", '', $this->input->post('estimasi'));
        $data['id_category'] = str_replace("'", '', $this->input->post('category_id'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['create_date'] = date('Y-m-d H:i:s');
        $this->session->set_flashdata(
            'msg',
            '
        <div class="alert alert-primary" role="alert">
            <strong>Berhasil menambahkan data</strong>
        </div>',
        );
        $this->M_table->createTable('specialtask', $data);
        redirect('SuperAdmin/detailSpecialTask?tag=' . $data['id_category']);
    }
    public function updateTask()
    {
        $data['employee_id'] = str_replace("'", '', $this->input->post('employee_id'));
        $data['task'] = str_replace("'", '', $this->input->post('task'));
        $data['description'] = str_replace("'", '', $this->input->post('description'));
        $data['estimasi'] = str_replace("'", '', $this->input->post('estimasi'));
        $data['id_category'] = str_replace("'", '', $this->input->post('category_id'));
        $data['update_date'] = date('Y-m-d H:i:s');

        $this->session->set_flashdata(
            'msg',
            '
        <div class="alert alert-success" role="alert">
            <strong>Data berhasil di perbarui</strong>
        </div>',
        );
        $this->M_table->updateTable('specialtask', $data, ['id' => $this->input->post('task_id')]);
        redirect('SuperAdmin/detailSpecialTask?tag=' . $data['id_category']);
    }
    public function deleteTask()
    {
        $task_id = str_replace("'", '', $this->uri->rsegment(3));
        $task = $this->M_table->getById('specialtask', $task_id);
        $this->validateId('specialtask', $task_id);
        $this->M_table->deleteTable('specialtask', $task_id);

        $this->session->set_flashdata(
            'msg',
            '
        <div class="alert alert-danger" role="alert">
            <strong>Data berhasil dihapus</strong>
        </div>',
        );
        redirect('SuperAdmin/detailSpecialTask?tag=' . $task['id_category']);
    }
    public function dailyReport()
    {
        $data['dataEmployee'] = $this->M_table->getEmployee();
        $date = $this->input->post('date');
        $type = $this->input->post('type');
        $employee_id = $this->input->post('employee_id');
        $data['dataEmployee'] = $this->M_table->getEmployeeStatus(4);
        $data['employee_id'] = 0;
        $data['date'] = date('Y-m-d');
        if ($this->input->post('update') == 'yes') {
            foreach ($this->M_employee->dR_ED($employee_id, $date) as $key) {
                if ($key['planing'] == '') {
                    continue;
                }
                if ($this->input->post('report[]')) {
                    if (in_array($key['id'], $this->input->post('report[]'))) {
                        $dataC['check'] = 'yes';
                    } else {
                        $dataC['check'] = 'no';
                    }
                } else {
                    $dataC['check'] = 'no';
                }

                $this->M_table->updateTable('dailyreport', $dataC, ['id' => $key['id']]);
            }
            $data['dailyReport'] = $this->M_employee->dR_ED($employee_id, $date);
            $data['message'] = 'search by ' . $data['dailyReport'][0]['employee_name'] . ' date: ' . date('F j, Y', strtotime($date));
            $data['type'] = 'employee';
            $data['employee_id'] = $this->M_table->getById('employee', $employee_id);
            $data['date'] = $date;
            return $this->load->view('superAdmin/v_dailyReport', $data);
        }
        $data['type'] = 'all';
        $employee_id = $this->input->post('employee_id');
        $data['message'] = 'show all data today ';
        if (!$type) {
            $data['dailyReport'] = $this->M_employee->getDailyReport();
        } else {
            $data['dailyReport'] = $this->M_employee->dR_AD($date);
            $data['message'] = 'search by date: ' . ' date: ' . date('F j, Y', strtotime($date));
            if ($employee_id) {
                $data['dailyReport'] = $this->M_employee->dR_ED($employee_id, $date);
                $data['employee_id'] = $this->M_table->getById('employee', $employee_id);
                $data['date'] = $date;
                $data['type'] = 'employee';
                if (count($this->M_employee->dR_ED($employee_id, $date)) > 0) {
                    if ($date == date('Y-m-d')) {
                        $data['message'] = 'search by ' . $data['dailyReport'][0]['employee_name'] . ' <b class="text-success">today</b>';
                    } else {
                        $data['message'] = 'search by ' . $data['dailyReport'][0]['employee_name'] . ' date: ' . date('F j, Y', strtotime($date));
                    }
                } else {
                    $data['message'] = 'search by Employee and date';
                }
            }
            if ($date) {
                $data['date'] = $date;
            }
        }
        $this->load->view('superAdmin/v_dailyReport', $data);
    }
    public function cleanDailyReport()
    {
        $this->M_employee->cleanDailyReport();
        redirect('SuperAdmin/dailyReport');
    }
    //============ training ============

    public function training()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['category'] = $this->input->post('category-title');
        $data['data_trainingE'] = $this->M_employee->getEmployeeTrainingAll();
        if (!$data['category']) {
            $data['category'] = $this->uri->rsegment(3);
        }
        if ($data['category']) {
            $this->validateId('content_training_category', $data['category']);
            $data['category_title'] = $this->M_table->getById('content_training_category', $data['category']);
            $data['total_data'] = $this->M_table->totalByCon('content_training_title', 'id_category', $data['category']);
            $data['title_content'] = $this->M_table->joinThreeTable('content_training_title', 'content_training_category', 'content_training_level', 'id_category', 'id', 'content_training_title.id_level = content_training_level.id WHERE content_training_title.id_category = ' . $data['category'], 'content_training_title.*, content_training_category.content_training_category,content_training_level.content_level');
        }
        $data['data_category'] = $this->M_table->getAll('content_training_category');
        $data['data_level'] = $this->M_table->getAll('content_training_level');
        $this->load->view('superAdmin/v_training', $data);
    }
    public function delEmployeeT()
    {
        $id = $this->uri->rsegment(3);
        $this->M_table->deleteTable('employee_training', $id);
        $newdata = [
            'delete' => 'deleted',
            'message' => 'Data berhasil dihapus',
        ];
        $this->session->set_userdata($newdata);
        redirect('SuperAdmin/training');
    }
    public function updtStatusET()
    {
        $id = $this->uri->rsegment(4);
        if ($this->uri->rsegment(3) == 'no') {
            $data['status'] = 'rejected';

            $newdata = [
                'update' => 'success',
                'message' => 'Data berhasil ditolak',
            ];
        }
        if ($this->uri->rsegment(3) == 'yes') {
            $data['status'] = 'received';

            $newdata = [
                'update' => 'success',
                'message' => 'Data berhasil diterima',
            ];
        }
        $this->M_table->updateTable('employee_training', $data, ['id' => $id]);
        $this->session->set_userdata($newdata);
        redirect('SuperAdmin/training');
    }
    public function updtTrainingP()
    {
        $id = $this->uri->rsegment(3);
        $check = $this->M_table->getById('employee_training', $id);
        if ($check['check'] == 'no') {
            $data['check'] = 'yes';
            $newdata = [
                'update' => 'success',
                'message' => 'Tanggal berhasil disetujui',
            ];
        }
        if ($check['check'] == 'yes') {
            $data['check'] = 'no';

            $newdata = [
                'update' => 'success',
                'message' => 'data berhasil ditolak',
            ];
        }
        $this->M_table->updateTable('employee_training', $data, ['id' => $id]);
        $this->session->set_userdata($newdata);
        redirect('SuperAdmin/training');
    }
    public function addValTraining()
    {
        $id = $this->input->post('id');
        $this->validateId('employee_training', $id);
        $data['value'] = $this->input->post('value');
        $data['desc_val'] = $this->input->post('desc_val');
        $newdata = ['update' => 'success', 'message' => 'Nilai berhasil dimasukkan'];
        $this->M_table->updateTable('employee_training', $data, ['id' => $id]);
        $this->session->set_userdata($newdata);
        redirect('SuperAdmin/training');
    }
    public function create_content_title()
    {
        $data['content_title'] = str_replace("'", '', $this->input->post('content_title'));
        $data['content_description'] = str_replace("'", '', $this->input->post('content_description'));
        $data['id_level'] = str_replace("'", '', $this->input->post('id_level'));
        $data['id_category'] = str_replace("'", '', $this->input->post('id_category'));
        $data['create_date'] = date('Y-m-d H:i:s');
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->createTable('content_training_title', $data);
        redirect('SuperAdmin/training/' . $data['id_category']);
    }
    public function update_content_title()
    {
        $data['content_title'] = str_replace("'", '', $this->input->post('content_title'));
        $data['content_description'] = str_replace("'", '', $this->input->post('content_description'));
        $data['id_level'] = str_replace("'", '', $this->input->post('id_level'));
        $data['id_category'] = str_replace("'", '', $this->input->post('id_category'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->updateTable('content_training_title', $data, ['id' => str_replace("'", '', $this->input->post('id'))]);
        redirect('SuperAdmin/training/' . $data['id_category']);
    }
    public function delete_content_title()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('content_training_title', $id);
        $this->M_table->deleteTable('content_training_title', $id);
        redirect('SuperAdmin/training/' . $this->uri->rsegment(4));
    }
    public function create_content_category()
    {
        $data['content_training_category'] = str_replace("'", '', $this->input->post('content_training_category'));
        $category = str_replace("'", '', $this->input->post('category-title'));
        $data['create_date'] = date('Y-m-d H:i:s');
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->createTable('content_training_category', $data);
        redirect('SuperAdmin/training/' . $category);
    }
    public function update_content_category()
    {
        $data['content_training_category'] = str_replace("'", '', $this->input->post('content_training_category'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->updateTable('content_training_category', $data, ['id' => str_replace("'", '', $this->input->post('id'))]);
        redirect('SuperAdmin/training/' . $this->input->post('category-title'));
    }
    public function delete_content_category()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('content_training_category', $id);
        $this->validateId('content_training_category', $this->uri->rsegment(4));
        $data['id_category'] = 1;
        $data['update_date'] = date('Y-m-d H:i:s');
        foreach ($this->M_table->dataTableWhere('content_training_title', 'id_category', $id) as $key) {
            $this->M_table->updateTable('content_training_title', $data, ['id' => $key['id']]);
        }
        $this->M_table->deleteTable('content_training_category', $id);
        redirect('SuperAdmin/training/' . $this->uri->rsegment(4));
    }
    public function create_content_level()
    {
        $data['content_level'] = str_replace("'", '', $this->input->post('content_level'));
        $data['create_date'] = date('Y-m-d H:i:s');
        $data['update_date'] = date('Y-m-d H:i:s');
        $category = str_replace("'", '', $this->input->post('category-title'));
        $this->M_table->createTable('content_training_level', $data);
        redirect('SuperAdmin/training/' . $category);
    }
    public function delete_content_level()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('content_training_level', $id);
        $data['id_level'] = 1;
        $data['update_date'] = date('Y-m-d H:i:s');
        foreach ($this->M_table->dataTableWhere('content_training_title', 'id_level', $id) as $key) {
            $this->M_table->updateTable('content_training_title', $data, ['id' => $key['id']]);
        }
        $this->M_table->deleteTable('content_training_level', $id);
        redirect('SuperAdmin/training/' . $this->uri->rsegment(4));
    }
    public function update_content_level()
    {
        $data['content_level'] = str_replace("'", '', $this->input->post('content_level'));
        $category = str_replace("'", '', $this->input->post('category-title'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->updateTable('content_training_level', $data, ['id' => str_replace("'", '', $this->input->post('id'))]);
        redirect('SuperAdmin/training/' . $category);
    }
    public function content_training()
    {
        if ($this->scId($this->uri->rsegment(3), 'content_training_title', 'id')) {
            $id = $this->session->userdata('id');
            $data['user'] = $this->M_user->profile($id);
            $data['data_pdf'] = $this->M_table->dataTableWhere('content_training_type_pdf', 'id_content_title', $this->uri->rsegment(3));
            $data['data_ppt'] = $this->M_table->dataTableWhere('content_training_type_ppt', 'id_content_title', $this->uri->rsegment(3));
            $data['data_yt'] = $this->M_table->dataTableWhere('content_training_type_yt', 'id_content_title', $this->uri->rsegment(3));
            $data['id_title'] = $this->uri->rsegment(3);
            $this->load->view('superAdmin/v_content_training', $data);
        } else {
            redirect('SuperAdmin/lock');
        }
    }
    public function preview_training()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_employee->getEmployee($id);
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('content_training_category', $id);
        $data['category'] = $this->M_table->getById('content_training_category', $id);
        $data['title_content'] = $this->M_table->dataTableWhere('content_training_title', 'id_category', $id);
        $this->load->view('superAdmin/training/index', $data);
    }
    public function content()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_employee->getEmployee($id);
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $this->validateId('content_training_title', $id);
        $data['title_content'] = $this->M_table->getById('content_training_title', $id);
        $data['category'] = $this->M_table->getById('content_training_category', $data['title_content']['id_category']);
        $data['data_pdf'] = $this->M_table->dataTableWhere('content_training_type_pdf', 'id_content_title', $id);
        $data['data_ppt'] = $this->M_table->dataTableWhere('content_training_type_ppt', 'id_content_title', $id);
        $data['data_yt'] = $this->M_table->dataTableWhere('content_training_type_yt', 'id_content_title', $id);
        $this->load->view('superAdmin/training/content', $data);
    }
    public function create_content()
    {
        $data['title'] = str_replace("'", '', $this->input->post('title'));
        $data['content'] = str_replace("'", '', $this->input->post('content'));
        $data['id_content_title'] = str_replace("'", '', $this->input->post('id_content_title'));
        $data['create_date'] = date('Y-m-d H:i:s');
        $data['update_date'] = date('Y-m-d H:i:s');
        $table = 'pdf';
        switch (str_replace("'", '', $this->input->post('type'))) {
            case 'pdf':
                $table = 'content_training_type_pdf';
                break;
            case 'ppt':
                $table = 'content_training_type_ppt';
                break;
            case 'yt':
                $table = 'content_training_type_yt';
                break;
        }
        $this->M_table->createTable($table, $data);
        redirect('SuperAdmin/content_training/' . str_replace("'", '', $this->input->post('id_content_title')));
    }
    public function update_content()
    {
        $data['title'] = str_replace("'", '', $this->input->post('title'));
        $data['content'] = str_replace("'", '', $this->input->post('content'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $table = 'pdf';
        switch (str_replace("'", '', $this->input->post('type'))) {
            case 'pdf':
                $table = 'content_training_type_pdf';
                break;
            case 'ppt':
                $table = 'content_training_type_ppt';
                break;
            case 'yt':
                $table = 'content_training_type_yt';
                break;
        }
        $this->M_table->updateTable($table, $data, ['id' => $this->input->post('id')]);
        redirect('SuperAdmin/content_training/' . str_replace("'", '', $this->input->post('id_content_title')));
    }
    public function delete_content()
    {
        if ($this->scId($this->uri->rsegment(3), 'content_training_type_yt', 'id') || $this->scId($this->uri->rsegment(3), 'content_training_type_pdf', 'id') || $this->scId($this->uri->rsegment(3), 'content_training_type_ppt', 'id')) {
            if ($this->scId($this->uri->rsegment(5), 'content_training_title', 'id')) {
                switch (str_replace("'", '', $this->uri->rsegment(4))) {
                    case 'pdf':
                        $table = 'content_training_type_pdf';
                        break;
                    case 'ppt':
                        $table = 'content_training_type_ppt';
                        break;
                    case 'yt':
                        $table = 'content_training_type_yt';
                        break;
                }
            }
            $this->M_table->deleteTable($table, $this->uri->rsegment(3));
            redirect('SuperAdmin/content_training/' . $this->uri->rsegment(5));
        } else {
            redirect('SuperAdmin/lock');
        }
        $data['title'] = str_replace("'", '', $this->input->post('title'));
        $data['content'] = str_replace("'", '', $this->input->post('content'));
        $data['id_content_title'] = str_replace("'", '', $this->input->post('id_content_title'));
        $table = 'pdf';
        switch (str_replace("'", '', $this->input->post('type'))) {
            case 'pdf':
                $table = 'content_training_type_pdf';
                break;
            case 'ppt':
                $table = 'content_training_type_ppt';
                break;
            case 'yt':
                $table = 'content_training_type_yt';
                break;
        }
        $this->M_table->createTable($table, $data);
        redirect('SuperAdmin/content_training/' . str_replace("'", '', $this->input->post('id_content_title')));
    }

    //============ tax update ============

    public function taxUpdate()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $this->load->view('superAdmin/v_taxUpdate', $data);
    }

    //============ tax guest ============

    public function guestTHC()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        if ($id) {
            $this->validateId('user', $id);
            $data['client'] = $this->M_user->profile($id);
            $data['thc'] = $this->M_table->getByCon('thc_guest', 'guest_id', $id);
            $data['thc_guest_status'] = $this->M_guest->thc_guest_status($id);
            $data['thc_guest'] = $this->M_guest->thc_guest($id);
            $data['thc_guest_answer'] = $this->M_guest->thc_guest_answer($id);
            $data['thc_status'] = $this->M_table->getAll('thc_status');
            $data['thc_report'] = $this->M_table->dataTableWhere('thc_report', 'guest_id', $id);
            $data['thc_nda'] = $this->M_table->dataTableWhere('thc_nda', 'guest_id', $id);
            $data['thc_meeting'] = $this->M_table->dataTableWhere('thc_meeting', 'guest_id', $id);
            $id = $this->session->userdata('id');
            $data['user'] = $this->M_user->profile($id);
            $this->load->view('superAdmin/components/guest-document', $data);
        } else {
            $id = $this->session->userdata('id');
            $data['user'] = $this->M_user->profile($id);
            $data['dataClient'] = $this->M_user->getByWhere('status_id', 6);
            $this->load->view('superAdmin/v_guestTHC', $data);
        }
    }
    public function updateStatusThc()
    {
        $id = $this->input->post('id');
        $data['thc_status_id'] = str_replace("'", '', $this->input->post('status'));
        $this->M_table->updateTable('thc_guest_status', $data, ['guest_id' => $id]);
        redirect('SuperAdmin/guestTHC/' . $id);
    }
    public function addReportThc()
    {
        $id = $this->input->post('guest_id');
        $data['title'] = str_replace("'", '', $this->input->post('title'));
        $data['description'] = str_replace("'", '', $this->input->post('description'));
        $data['guest_id'] = $id;
        $data['create_date'] = date('Y-m-d H:i:s');
        $data['update_date'] = date('Y-m-d H:i:s');

        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_Rthc();
            $data['report'] = $image;
        }
        $this->M_table->createTable('thc_report', $data);
        redirect('SuperAdmin/guestTHC/' . $id);
    }

    public function addMeetingThc()
    {
        $id = $this->input->post('guest_id');
        $data['title'] = str_replace("'", '', $this->input->post('title'));
        $data['description'] = str_replace("'", '', $this->input->post('description'));
        $data['link'] = str_replace("'", '', $this->input->post('link'));
        $data['meet'] = str_replace("'", '', $this->input->post('meet'));
        $data['date'] = str_replace("'", '', $this->input->post('date'));
        $data['guest_id'] = $id;
        $data['create_date'] = date('Y-m-d H:i:s');
        $data['update_date'] = date('Y-m-d H:i:s');

        $this->M_table->createTable('thc_meeting', $data);
        redirect('SuperAdmin/guestTHC/' . $id);
    }
    public function _do_upload_Rthc()
    {
        $image_name = time() . '-' . $_FILES['image']['name'];
        $config['upload_path'] = 'assets/upload/thc/report';
        $config['allowed_types'] = 'pdf|jpg|png|jpeg|xlsx|doc|odt';
        $config['file_name'] = $image_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('');
        }
        return $this->upload->data('file_name');
    }
    //============ accountingUpdate ============

    public function accountingUpdate()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $this->load->view('superAdmin/v_accountingUpdate', $data);
    }

    //============ employeeScore ============

    public function employeeScore()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $this->load->view('superAdmin/v_employeeScore', $data);
    }

    //============ websiteMe ============

    public function websiteMe()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);

        $data['news_latest'] = $this->db->query('SELECT website_news.*, website_news_category.category, website_news_category.category_eng, employee.employee_name FROM website_news INNER JOIN website_news_category ON website_news_category.id = website_news.category_id INNER JOIN employee ON employee.id = website_news.employee_id ORDER BY website_news.date DESC')->result_array();
        $data['news_trending'] = $this->db->query('SELECT website_news.*, website_news_category.category, website_news_category.category_eng, employee.employee_name FROM website_news INNER JOIN website_news_category ON website_news_category.id = website_news.category_id INNER JOIN employee ON employee.id = website_news.employee_id ORDER BY website_news.total_seen DESC')->result_array();
        $data['category'] = $this->uri->rsegment(3);
        $data['country_selected'] = $this->uri->rsegment(4);
        $data['news_inyear'] = [];
        $data['news_lastyear'] = [];
        for ($i = 1; $i < 13; $i++) {
            $bulan = date('m', strtotime($i));
            $tahun = date('Y');
            $tahun_last = date('Y') - 1;
            $inyear = $this->M_table->getTotalData('website_news WHERE MONTH(date) = ' . $i . ' AND YEAR(date) = ' . $tahun);
            $lastyear = $this->M_table->getTotalData('website_news WHERE MONTH(date) = ' . $i . ' AND YEAR(date) = ' . $tahun_last);
            $data['news_inyear'][] = [
                'bulan' => $tahun . '-' . $bulan,
                'value' => $inyear,
            ];
            $data['news_lastyear'][] = [
                'bulan' => $tahun . '-' . $bulan,
                'value' => $lastyear,
            ];
        }
        $country = '';
        if ($this->uri->rsegment(4)) {
            $data['text_p3b'] = $this->M_table->getAll('text_p3b');
            for ($i = 0; $i < count($data['text_p3b']); $i++) {
                if (md5($data['text_p3b'][$i]['country_id']) == $data['country_selected']) {
                    $country = $this->M_table->getById('country', $data['text_p3b'][$i]['country_id']);
                    break;
                }
            }
            if ($country == '') {
                foreach ($this->M_table->getAll('country') as $key) {
                    if (md5($key['id']) == $this->uri->rsegment(4)) {
                        $country = $key['name'];
                        $country_id = $key['id'];
                        $data['country_selected'] = $this->M_table->getById('country', $country_id);
                        $data['p3b'] = $this->M_table->dataTableWhere('text_p3b', 'country_id', $country_id);
                        break;
                    }
                }
            } else {
                $data['country_selected'] = $country;
                $data['p3b'] = $this->M_table->dataTableWhere('text_p3b', 'country_id', $country['id']);
            }
            $data['category'] = 'detailTaxTreaty';
        }
        $this->load->view('superAdmin/website/index', $data);
    }
    public function updateP3B()
    {
        $id = str_replace("'", '', $this->input->post('id'));
        $data['lang'] = str_replace("'", '', $this->input->post('lang'));
        $data['text'] = str_replace("'", '', $this->input->post('text'));
        $data['ratified_date'] = str_replace("'", '', $this->input->post('ratified_date'));
        $data['effective_date'] = str_replace("'", '', $this->input->post('effective_date'));
        $data['update_date'] = date('Y-m-d');
        $this->M_table->updateTable('text_p3b', $data, ['id' => $id]);
        $newdata = [
            'update' => 'success',
            'message' => 'data updated!',
        ];
        $this->session->set_userdata($newdata);
        redirect('SuperAdmin/websiteMe/tax_treaty/' . $this->session->userdata('id_country_tax_p3b'));
    }

    public function addP3B()
    {
        $data['lang'] = str_replace("'", '', $this->input->post('lang'));
        $data['text'] = str_replace("'", '', $this->input->post('text'));
        $data['country'] = str_replace("'", '', $this->input->post('country'));
        $data['ratified_date'] = str_replace("'", '', $this->input->post('ratified_date'));
        $data['effective_date'] = str_replace("'", '', $this->input->post('effective_date'));
        $data['create_date'] = date('Y-m-d');
        $data['update_date'] = date('Y-m-d');
        $this->M_table->createTable('text_p3b', $data);
        $newdata = [
            'update' => 'success',
            'message' => 'data created',
        ];
        $this->session->set_userdata($newdata);
        redirect('SuperAdmin/websiteMe/tax_treaty/' . $this->session->userdata('id_country_tax_p3b'));
    }
    public function updateHc()
    {
        $id = str_replace("'", '', $this->input->post('id'));
        $data['description'] = str_replace("'", '', $this->input->post('description'));
        $data['description_eng'] = str_replace("'", '', $this->input->post('description_eng'));
        $data['description_jep'] = str_replace("'", '', $this->input->post('description_jep'));
        $data['description_kor'] = str_replace("'", '', $this->input->post('description_kor'));
        $data['description_chi'] = str_replace("'", '', $this->input->post('description_chi'));
        $data['update_date'] = date('Y-m-d');
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_hc();
            $upload = $this->M_table->getById('history_company', $id);
            if (file_exists('assets/image/website/history_company/' . $upload['image']) && $upload['image']) {
                unlink('assets/image/website/history_company/' . $upload['image']);
            }
            $data['image'] = $image;
        }
        $this->M_table->updateTable('history_company', $data, ['id' => $id]);
        $newdata = [
            'update' => 'success',
            'message' => 'History updated!',
        ];
        $this->session->set_userdata($newdata);
        redirect('SuperAdmin/websiteMe/history_company');
    }
    public function addHc()
    {
        $data['year'] = str_replace("'", '', $this->input->post('year'));
        $data['description'] = str_replace("'", '', $this->input->post('description'));
        $data['update_date'] = date('Y-m-d');
        $data['create_date'] = date('Y-m-d');
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_hc();
            $data['image'] = $image;
        }
        $this->M_table->createTable('history_company', $data);
        $newdata = [
            'update' => 'success',
            'message' => 'History created!',
        ];
        $this->session->set_userdata($newdata);
        redirect('SuperAdmin/websiteMe/history_company');
    }

    public function addFlag()
    {
        $data['name'] = str_replace("'", '', $this->input->post('name'));
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_flag();
            $data['image'] = $image;
        }
        $this->M_table->createTable('country', $data);
        $newdata = [
            'update' => 'success',
            'message' => 'Country created!',
        ];
        $this->session->set_userdata($newdata);
        redirect('SuperAdmin/websiteMe/country');
    }
    public function delCountry()
    {
        $id = $this->uri->rsegment(3);
        $this->validateId('country', $id);
        $upload = $this->M_table->getById('country', $id);
        if (file_exists('assets/image/website/country/' . $upload['image']) && $upload['image']) {
            unlink('assets/image/website/country/' . $upload['image']);
        }

        $newdata = [
            'update' => 'success',
            'message' => 'Country ' . $upload['name'] . ' deleted!',
        ];
        $this->session->set_userdata($newdata);
        $this->M_table->deleteTable('country', $id);
        redirect('SuperAdmin/websiteMe/country');
    }
    public function updateCountry()
    {
        $data['name'] = str_replace("'", '', $this->input->post('name'));
        $id = str_replace("'", '', $this->input->post('id'));
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_flag();
            $upload = $this->M_table->getById('country', $id);
            if (file_exists('assets/image/website/country/' . $upload['image']) && $upload['image']) {
                unlink('assets/image/website/country/' . $upload['image']);
            }
            $data['image'] = $image;
        }
        $this->M_table->updateTable('country', $data, ['id' => $id]);
        $newdata = [
            'update' => 'success',
            'message' => 'Country ' . $upload['name'] . ' updated!',
        ];
        $this->session->set_userdata($newdata);
        redirect('SuperAdmin/websiteMe/country');
    }
    public function finance_inventory()
    {
        $user_id = $this->input->get('user_id');
        $date = $this->input->get('date');
        if (!$user_id && !$date) {
            $user_id = $this->input->post('user_id');
            $date = $this->input->post('date');
        }
        if (!$user_id && !$date) {
            redirect('SuperAdmin/finances');
        } else {
            $data['user_id'] = $user_id;
            $data['date'] = $date;
            $this->load->view('superAdmin/finance_year/inventory', $data);
        }
    }
    public function finance_explanation()
    {
        $user_id = $this->input->get('user_id');
        $date = $this->input->get('date');
        if (!$user_id && !$date) {
            $user_id = $this->input->post('user_id');
            $date = $this->input->post('date');
        }
        if (!$user_id && !$date) {
            redirect('SuperAdmin/finances');
        } else {
            $data['user_id'] = $user_id;
            $data['date'] = $date;
            $this->load->view('superAdmin/finance_year/finance_explanation', $data);
        }
    }
    public function del_explanation()
    {
        $user_id = $this->input->get('user_id');
        $date = $this->input->get('date');
        if (!$user_id && !$date) {
            $user_id = $this->input->post('user_id');
            $date = $this->input->post('date');
        }
        if (!$user_id && !$date) {
            redirect('SuperAdmin/finances');
        } else {
            $this->db->delete('finance_explanation_year', ['id' => $_GET['quote_id']]);
            $data['user_id'] = $user_id;
            $data['date'] = $date;
            return redirect('SuperAdmin/finance_explanation?user_id=' . $user_id . '&date=' . $date . '&show=' . $_GET['show']);
        }
    }
    function injectDailyReport()
    {
        $data['employee'] = $this->M_dailyReport->getNameAllEmployee();
        $this->load->view('superAdmin/v_inject_daily_report', $data);
    }
    function getTemplateDR($date, $id)
    {
        if (empty($this->M_employee->dR_ED($id, $date))) {
            $time_start = ['08:00', '08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30', '21:00', '21:30', '22:00', '22:30', '23:00', '23:30', '00:00', '00:30', '01:00', '01:30', '02:00', '02:30', '03:00', '03:30', '04:00', '04:30', '05:00', '05:30', '06:00', '06:30', '07:00', '07:30'];
            $time_end = ['08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30', '21:00', '21:30', '22:00', '22:30', '23:00', '23:30', '00:00', '00:30', '01:00', '01:30', '02:00', '02:30', '03:00', '03:30', '04:00', '04:30', '05:00', '05:30', '06:00', '06:30', '07:00', '07:30', '08:00'];
            $data['date'] = $date;
            $data['create_date'] = $date . date(' H:i:s');
            $data['update_date'] = $date . date(' H:i:s');
            $data['employee_id'] = $id;
            for ($i = 0; $i < 48; $i++) {
                $data['start_time'] = $time_start[$i];
                $data['end_time'] = $time_end[$i];
                $this->db->insert('dailyreport', $data);
            }
        }
    }
    function injectMonthlyAll()
    {
        $dateMonth = $this->input->post('month');
        $bigDataDailyReport = $this->M_dailyReport->getBigdataDailyReport($dateMonth);
        $employee = $this->input->post('employee');
        $month = date('m', strtotime($dateMonth));
        $year = date('Y', strtotime($dateMonth));
        $dates = [];
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        for ($i = 1; $i <= $daysInMonth; $i++) {
            $dateNew = new DateTime("$year-$month-$i");
            $dayOfWeek = $dateNew->format('N');
            if ($dayOfWeek < 6) {
                $dates[] = $dateNew;
            }
        }

        foreach ($dates as $date) {
            $dateSelection = $date->format('Y-m-d');
            foreach ($employee as $key => $value) {
                if ($this->M_dailyReport->getDailyReportByMonthAndEmployee($dateSelection, $value) > 0) {
                    continue;
                } else {
                    $this->getTemplateDR($dateSelection, $value);
                }
            }
        }
        return redirect('SuperAdmin/injectDailyReport');
    }
    function generateRandomTime($start, $end)
    {
        $startTimestamp = strtotime($start);
        $endTimestamp = strtotime($end);

        $randomTimestamp = mt_rand($startTimestamp, $endTimestamp);

        return date('H:i', $randomTimestamp);
    }
    function exportDailyReport()
    {
        if (isset($_GET['month']) && preg_match("/^[0-9]{4}-[0-9]{2}$/", $_GET['month'])) {
            $month = date('m', strtotime($_GET['month']));
            $year = date('Y', strtotime($_GET['month']));

            $url = 'https://date.nager.at/api/v3/publicholidays/' . $year . '/ID';
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $jsonData = curl_exec($curl);
            curl_close($curl);
            $tgl_merah = json_decode($jsonData, true);
            $tgl_merah_arr = [];
            foreach ($tgl_merah as $key => $value) {
                $tgl_merah_arr[] = $value['date'];
            }

            $dates = [];
            $dataFinal = [];
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            $employee = $this->M_dailyReport->getNameAllEmployee();
            for ($i = 1; $i <= $daysInMonth; $i++) {
                $dateNew = new DateTime("$year-$month-$i");
                $dayOfWeek = $dateNew->format('N');
                $dates[] = $dateNew;
            }
            $tgl_libur = [];
            foreach ($tgl_merah as $key => $value) {
                if (date('Y-m', strtotime($value['date'])) == $_GET['month']) {
                    $tgl_libur[] = [
                        'tgl' => $value['date'],
                        'event' => $value['localName'],
                    ];
                }
            }
            $dataHariLibur = [];
            foreach ($employee as $key => $value) {
                $absen = [];
                $total = 0;
                foreach ($dates as $date) {
                    $tgl_merahSelected = null;
                    $dateSelection = $date->format('Y-m-d');
                    if ($this->M_dailyReport->getDailyReportByMonthAndEmployee($dateSelection, $value['id']) > 0) {
                        foreach ($tgl_merah as $keyy => $valuee) {
                            if ($valuee['date'] == $dateSelection) {
                                $tgl_merahSelected = $valuee['localName'];
                                $dataHariLibur[] = $valuee;
                            }
                        }
                        $total++;
                        $absen[] = [
                            'status' => true,
                            'tgl_date' => $dateSelection,
                            'tgl_merah' => $tgl_merahSelected,
                            'in_time' => $this->generateRandomTime('07:30', '09:00'),
                            'out_time' => $this->generateRandomTime('10:00', '20:00'),
                        ];
                    } else {
                        $absen[] = [
                            'status' => false,
                            'tgl_date' => $dateSelection,
                            'tgl_merah' => $tgl_merahSelected,
                            'in_time' => $this->generateRandomTime('07:30', '09:00'),
                            'out_time' => $this->generateRandomTime('10:00', '20:00'),
                        ];
                    }
                }
                $dataFinal[] = [
                    'employee' => $value['name'],
                    'absensi' => $absen,
                    'total' => $total,
                ];
            }
            // print_r($dataFinal[0]);die;

            $dataFinalArr['dataFinal'] = $dataFinal;
            $dataFinalArr['dates'] = $dates;
            $dataFinalArr['hariLibur'] = $dataHariLibur;
            $dataFinalArr['tgl_merah_arr'] = $tgl_merah_arr;
            $dataFinalArr['tgl_libur'] = $tgl_libur;
            $this->load->view('superAdmin/v_export_daily_report', $dataFinalArr);
        } else {
            $employee = $this->M_dailyReport->getAllEmployee('employee');
            $this->load->view('superAdmin/v_export_daily_report');
        }
    }

    // update developed
    public function excelStep($serviceId)
    { 
        $this->load->library('form_validation');
		if ($_FILES['excel_file']['name']) {
			$image_name = time() . '-' . $_FILES['excel_file']['name'];
			$config['upload_path'] = 'assets/upload/excel/step/';
			$config['allowed_types'] = 'xls|xlsx';
			$config['file_name'] = $image_name;
			$this->load->library('upload', $config);
		} 
         
        if (!$this->upload->do_upload('excel_file')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
			
        }

        $fileData = $this->upload->data();
		try {
			$objPHPExcel = IOFactory::load($config['upload_path'] . $image_name);
			$sheet = $objPHPExcel->getActiveSheet(); 
			
			foreach ($sheet->getRowIterator(2) as $row) {
				$cellIterator = $row->getCellIterator();
				$rowData = array();
				foreach ($cellIterator as $cell) {
					$rowData[] = $cell->getValue();
				}
				if (!empty($rowData) && $rowData[0] != "" && $rowData[1] != "" ) { 
					$data  = array(
						'step' => $rowData[0], // Assuming 'Nama Step' is in the first column (index 0)
						'description' => $rowData[1],
						'service_id' => $serviceId,
						'create_date' => date('Y-m-d H:i:s'),
						'update_date' => date('Y-m-d H:i:s')
					); 
					$this->M_table->createTable('step', $data);
				}
			} 
			unlink('assets/upload/excel/step/' .$image_name);
		} catch (Exception $e) {
			echo 'Error loading file: ', $e->getMessage();
			return;
		}
		redirect('SuperAdmin/workflow/'.$serviceId);
		
    }
    public function excelSubStep($serviceId)
    { 
        $this->load->library('form_validation');
		if ($_FILES['excel_file']['name']) {
			$image_name = time() . '-' . $_FILES['excel_file']['name'];
			$config['upload_path'] = 'assets/upload/excel/substep/';
			$config['allowed_types'] = 'xls|xlsx';
			$config['file_name'] = $image_name;
			$this->load->library('upload', $config);
		} 
         
        if (!$this->upload->do_upload('excel_file')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
			
        }

        $fileData = $this->upload->data();
		try { 
			$objPHPExcel = IOFactory::load($config['upload_path'] . $image_name);
			$sheet = $objPHPExcel->getActiveSheet(); 
			
			foreach ($sheet->getRowIterator(2) as $row) {
				$cellIterator = $row->getCellIterator();
				$rowData = array();
				foreach ($cellIterator as $cell) {
					$rowData[] = $cell->getValue();
				}
				if (!empty($rowData) && $rowData[0] != "") {
					$data  = array(
						'subStep' => $rowData[0],
						'step_id' => $serviceId,
						'create_date' => date('Y-m-d H:i:s'),
						'update_date' => date('Y-m-d H:i:s')
					);
					$this->M_table->createTable('substep', $data);
				}
			} 
			unlink('assets/upload/excel/substep/' .$image_name);
		} catch (Exception $e) {
			echo 'Error loading file: ', $e->getMessage();
			return;
		}
		redirect('SuperAdmin/detailStep/'.$serviceId);
		
    }
	function bookkeeping_date() {
		$order_id = $this->uri->rsegment(3);
		$bookkeepingDate = $this->input->post('bookkeepingDate'); 
		if (is_numeric($order_id) && $bookkeepingDate) {  
            $order_data = $this->M_table->getById('order',$order_id);

            if ($order_data) {
                // Load view modal untuk tampilan modal pembaruan tanggal bookkeeping
                $data['message'] = $bookkeepingDate;
				$this->M_table->updateTable('order', $data, ['id' => $order_id]);
				$this->session->set_flashdata('success_message', 'Tanggal bookkeeping berhasil diperbarui.');

            } else {
                // Handle jika order tidak ditemukan
                $this->session->set_flashdata('error_message', 'Order not found.');
            }
        } else {
            // Handle jika order_id tidak valid
			$this->session->set_flashdata('error_message', 'Invalid order_id or missing bookkeepingDate.');
        }
		redirect($_SERVER['HTTP_REFERER']);
	}
	function due_date() {
		$order_id = $this->uri->rsegment(3);
		$dueDate = $this->input->post('dueDate'); 
		if (is_numeric($order_id) && $dueDate) {  
            $order_data = $this->M_table->getById('order',$order_id);

            if ($order_data) {
                // Load view modal untuk tampilan modal pembaruan tanggal bookkeeping
                $data['due_date'] = $dueDate;
				$this->M_table->updateTable('order', $data, ['id' => $order_id]);
				$this->session->set_flashdata('success_message', 'Due Date bookkeeping berhasil diperbarui.');

            } else {
                // Handle jika order tidak ditemukan
                $this->session->set_flashdata('error_message', 'Order not found.');
            }
        } else {
            // Handle jika order_id tidak valid
			$this->session->set_flashdata('error_message', 'Invalid order_id or missing bookkeepingDate.');
        }
		redirect($_SERVER['HTTP_REFERER']);
	}
	function descriptionOrder() {
		$order_id = $this->uri->rsegment(3);
		$description = $this->input->post('description'); 
		if (is_numeric($order_id) && $description) {  
            $order_data = $this->M_table->getById('order',$order_id);

            if ($order_data) {
                // Load view modal untuk tampilan modal pembaruan tanggal bookkeeping
                $data['description'] = $description;
				$this->M_table->updateTable('order', $data, ['id' => $order_id]);
				$this->session->set_flashdata('success_message', 'Description service berhasil diperbarui.');

            } else {
                // Handle jika order tidak ditemukan
                $this->session->set_flashdata('error_message', 'Order not found.');
            }
        } else {
            // Handle jika order_id tidak valid
			$this->session->set_flashdata('error_message', 'Invalid order_id or missing bookkeepingDate.');
        }
		redirect($_SERVER['HTTP_REFERER']);
	}
}
