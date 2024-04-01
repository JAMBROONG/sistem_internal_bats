<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect('Login');
        }
        if ($this->session->userdata('status_id') == 3) {
            redirect('SuperAdmin');
        }
        if ($this->session->userdata('status_id') == 5) {
            redirect('Administrasi');
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
        // 		if ( time() - $this->session->userdata('last_login_time') > 43200) {
        // 			$id = $this->session->userdata('key');
        // 			$data['logout_date'] = date("Y-m-d H:i:s");
        // 			$this->M_table->updateTable('history_login_employee',$data,array('login_date' =>$id));
        //             redirect('Logout/logoutEmployee');
        //         }
        // 		$_SESSION['last_login_time'] = time();
    }
    public function validateId($tbl, $int)
    {
        if ($int == "") {
            redirect("SuperAdmin/lock");
        } else {
            if (is_numeric($int)) {
                if ($this->M_table->totalByCon($tbl, "id", $int) == 0) {
                    redirect('SuperAdmin/lock');
                } else {
                    return true;
                }
            } else {
                redirect("SuperAdmin/lock");
            }
        }
    }
    public function getReport($id)
    {
        $date = date('Y-m');
        $date = "'$date'";
        $con = 'employee_id = ' . $id . ' AND planing != "" AND doing != "" AND DATE_FORMAT(date, "%Y-%m") = ' . $date;
        $finish = $this->M_employee->getTotalTableCon("dailyreport", $con);
        if ($finish == 0) {
            return 0;
        } else {
            return $finish / 2;
        }
    }
    function getMondayDate($givenDate)
    {
        $dayOfWeek = date('w', strtotime($givenDate));
        $daysToMonday = $dayOfWeek == 0 ? 6 : $dayOfWeek - 1;
        $startDate = strtotime("-$daysToMonday days", strtotime($givenDate));

        return $startDate;
    }
    public function weeklyreport($filter = null)
    {
        setlocale(LC_TIME, 'id_ID');
        $id                 = $this->session->userdata('id');
        $data['user']       = $this->M_employee->getEmployee($id);
        $getDate = $this->M_table->getColSortingLimit('created_at', 'weekly_report', 'created_at', 'ASC', '1');
        $data['weeks'] = [];
        $senin = $this->getMondayDate($getDate['created_at']);
        while ($senin <= $this->getMondayDate(date('Y-m-d'))) {
            $end = date('Y-m-d', strtotime('+6 days', $senin));
            $start = date('Y-m-d', $senin);
            $week = ["start" => $start, "end" => $end];
            array_push($data['weeks'], $week);
            $senin = $this->getMondayDate(date('Y-m-d', strtotime('+7 days', strtotime($end))));
        }
        if (!$filter) {
            $data['report']     = $this->M_table->joinTwoTableSortingCon('employee', 'weekly_report', 'id', 'employee_id', '*', 'weekly_report.created_at', '"' . end($data['weeks'])['start'] . ' 00:00:00"', '"' . end($data['weeks'])['end'] . ' 23:59:59"', 'weekly_report.created_at', 'DESC');
            $data['filterTitle'] = date('d M Y', strtotime(end($data['weeks'])['start'])) . ' - ' . date('d M Y', strtotime(end($data['weeks'])['end']));
            $data['filter'] = end($data['weeks'])['start'] . ' - ' . end($data['weeks'])['end'];
        } else {
            $arrDate = explode(' - ', urldecode($filter));
            if (count($arrDate) > 1) {
                $data['report']     = $this->M_table->joinTwoTableSortingCon('employee', 'weekly_report', 'id', 'employee_id', '*', 'weekly_report.created_at', '"' . $arrDate[0] . ' 00:00:00"', '"' . $arrDate[1] . ' 23:59:59"', 'weekly_report.created_at', 'DESC');
                $data['filterTitle'] = date('d M Y', strtotime($arrDate[0])) . ' - ' . date('d M Y', strtotime($arrDate[1]));
            } else {
                $data['report']     = $this->M_table->joinTwoTableSorting('employee', 'weekly_report', 'id', 'employee_id', '*', 'weekly_report.created_at', 'DESC');
                $data['filterTitle'] = urldecode($filter);
            }
            $data['filter'] = urldecode($filter);
        }
        // var_dump($data['filter']); die;
        $data['weeks'] = array_reverse($data['weeks']);
        $this->load->view('employee/v_weeklyreport', $data);
    }
    public function modalContentWeeklyReport($type, $id)
    {
        $data = [
            'type' => $type
        ];
        if (is_numeric($id)) {
            $data['data'] = $this->M_table->getById('weekly_report', $id);
        } else {
            $data['data'] = '';
        }
        $this->load->view('employee/modalContent', $data);
    }
    public function s_weeklyreport()
    {
        $id = $this->session->userdata('id');
        $data['nama_klien'] = $_POST['nama_klien'];
        $data['tim'] = $_POST['tim'];
        $data['jenis'] = $_POST['jenis'];
        $data['progres'] = $_POST['progress'];
        $data['kendala'] = $_POST['kendala'];
        $data['jdwl_meet'] = $_POST['jdwl_meet'] == "" ? null : $_POST['jdwl_meet'];
        $data['target'] = $_POST['target'];
        $data['status'] = $_POST['status'];
        $data['employee_id'] = $id;
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");
        $this->M_table->createTable('weekly_report', $data);

        redirect('Employee/weeklyreport');
    }
    public function updateWeeklyReport($id)
    {
        $data['nama_klien'] = $_POST['nama_klien'];
        $data['tim'] = $_POST['tim'];
        $data['jenis'] = $_POST['jenis'];
        $data['progres'] = $_POST['progress'];
        $data['kendala'] = $_POST['kendala'];
        $data['jdwl_meet'] = $_POST['jdwl_meet'];
        $data['target'] = $_POST['target'];
        $data['status'] = $_POST['status'];
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");
        $checkData = $this->M_table->getById('weekly_report', $id);
        if ($checkData == null) {
            return redirect('Employee/weeklyreport');
        }
        $this->M_table->updateTable('weekly_report', $data, ['id' => $id]);

        return redirect('Employee/weeklyreport');
    }
    public function deleteWeeklyReport($id)
    {
        $data = $this->M_table->getById('weekly_report', $id);
        if ($data == null) {
            return redirect('Employee/weeklyreport');
        }
        $this->M_table->deleteTable('weekly_report', $id);
        return redirect('Employee/weeklyreport');
    }
    public function index()
    {
        $id                 = $this->session->userdata('id');
        $data['user']       = $this->M_employee->getEmployee($id);
        $data['order']      = $this->M_employee->totalOrder($id);
        $data['history']    = $this->M_employee->totalTable('history_action_employee', 'employee_id', $id);
        $data['report']     = $this->M_employee->totalReport($id);
        $data['feedback']   = $this->M_employee->totalFeedback($id);
        $data['deadline']   = $this->M_employee->processDeadline($id);

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
            $newdata =  array(
                'name' => $val['employee_name'],
                'value' => $this->getReport($val['id']),
                'bulletSettings' =>  array(
                    'src' => base_url() . 'assets/upload/images/employee/' . $val['image']
                )
            );
            array_push($data["timeDailyReport"], $newdata);
        }
        function compare_nilai($a, $b)
        {
            if ($a['value'] == $b['value']) {
                return 0;
            }
            return ($a['value'] > $b['value']) ? -1 : 1;
        }
        usort($data['timeDailyReport'], 'compare_nilai');
        $data['timeDailyReportAll']   = $data['timeDailyReport'];
        $data['timeDailyReport']      = array_slice($data['timeDailyReport'], 0, 5);
        $data['orderAll']             = $data['orderDo'] + $data['orderDone'] + $data['orderCancel'];
        $data['orderAll']   = $data['orderDo'] + $data['orderDone'] + $data['orderCancel'];
        $data['dataTask']     = $this->M_table->getAllTaskLastMonth();
        $this->load->view('employee/v_dashboard', $data);
    }

    // =========== profile ============

    public function profile()
    {
        $id                   = $this->session->userdata('id');
        $data['user']         = $this->M_employee->getEmployee($id);
        $data["resume"]       = $this->M_employee->getResume($id);
        $data["sub_resume"]   = $this->M_employee->getSubResume($id);
        $data["sr"]           = $this->M_table->getAll('sub_resume');
        $data["scr"]          = $this->M_table->getAll('sub_category_resume');
        $this->load->view('employee/v_profile', $data);
    }

    public function processUpdateProfile()
    {
        $id                            = $this->session->userdata('id');
        $data = array(
            'employee_name' =>  str_replace("'", "", $this->input->post('employee_name')),
            'phone' =>  str_replace("'", "", $this->input->post('phone')),
            'gender' =>  str_replace("'", "", $this->input->post('gender')),
            'position' =>  str_replace("'", "", $this->input->post('position')),
            'address' =>  str_replace("'", "", $this->input->post('address')),
            'date_of_birth' =>  str_replace("'", "", $this->input->post('date_of_birth')),
            'update_date' => date("Y-m-d H:i:s")
        );
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_employee();

            $upload = $this->M_table->getById('employee', $id);
            if (file_exists('assets/upload/images/employee/' . $upload['image']) && $upload['image']) {
                unlink('assets/upload/images/employee/' . $upload['image']);
            }
            $data['image'] = $image;
        }

        $action = array(
            'employee_id' =>  $id,
            'action' => "Update profile ",
            'update_date' => date("Y-m-d H:i:s")
        );
        $this->M_table->createTable("history_action_employee", $action);

        $this->M_table->updateTable('employee', $data, array('id' => $id));
        redirect('Employee/profile');
    }
    public function processCreateCategory()
    {
        $data = ["subCategory" => str_replace("'", "", $this->input->post("subCategory"))];
        $action                                 = ["admin_id" => $this->session->userdata("id"), "action" => "Create sub Category Resume : " . $data['subCategory'], "action_date" => date("Y-m-d H:i:s"),];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->createTable('sub_category_resume', $data);
        redirect("Employee/profile");
    }
    public function processCreateSubR()
    {
        $data = [
            "subCategory_id" => str_replace("'", "", $this->input->post("subCategory_id")),
            "resume_id" => str_replace("'", "", $this->input->post("resume_id")),
            "date" => str_replace("'", "", $this->input->post("date")),
            "subResume" => str_replace("'", "", $this->input->post("subResume")),
            "update_date" => date("Y-m-d H:i:s"),
            "create_date" => date("Y-m-d H:i:s"),
        ];
        $dataResume['user_id'] = $this->session->userdata('id');
        $dataResume["update_date"] = date("Y-m-d H:i:s");
        $dataResume["create_date"] = date("Y-m-d H:i:s");
        if ($data['resume_id'] == "") {
            $data['resume_id']                = $this->M_table->createTableOrder("resume", $dataResume);
        }
        $action                                 = ["employee_id" => $this->session->userdata("id"), "action" => "Create sub Resume : " . $data['subResume'], "update_date" => date("Y-m-d H:i:s"),];
        $this->M_table->createTable("history_action_employee", $action);
        $this->M_table->createTable('sub_resume', $data);
        redirect("Employee/profile");
    }
    public function processUpdateSubR()
    {
        $id = str_replace("'", "", $this->input->post("id"));
        $data = [
            "subCategory_id" => str_replace("'", "", $this->input->post("subCategory_id")),
            "date" => str_replace("'", "", $this->input->post("date")),
            "subResume" => str_replace("'", "", $this->input->post("subResume")),
            "update_date" => date("Y-m-d H:i:s")
        ];
        $action                                 = ["admin_id" => $this->session->userdata("id"), "action" => "Update sub Resume id : " . $id, "action_date" => date("Y-m-d H:i:s"),];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->updateTable('sub_resume', $data, array('id' => $id));
        redirect("Employee/profile");
    }
    public function processDeleteSubR()
    {

        $id                       = str_replace("'", "", $this->uri->rsegment(3));
        $name = $this->M_table->getById('sub_resume', $id)['subResume'];
        $action                                 = ["admin_id" => $this->session->userdata("id"), "action" => "Delete sub Resume id : " . $name, "action_date" => date("Y-m-d H:i:s"),];
        $this->M_table->createTable("history_action_admin", $action);
        $this->M_table->deleteTable('sub_resume', $id);
        redirect("Employee/profile");
    }

    public function _do_upload_employee()
    {
        $image_name = time() . '-' . $_FILES["image"]['name'];
        $config['upload_path']         = 'assets/upload/images/employee/';
        $config['allowed_types']     = 'gif|jpg|png|JPEG|jpeg';
        $config['file_name']         = $image_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('');
        }
        return $this->upload->data('file_name');
    }

    public function updatePassword()
    {
        $id                   = $this->session->userdata('id');
        $data['user']         = $this->M_employee->getEmployee($id);
        $this->load->view('employee/v_updatePassword', $data);
    }
    public function processUpdatePassword()
    {
        $data['password']              = md5($this->input->post('password'));
        $data['update_date']       = date("Y-m-d H:i:s");
        $this->M_table->updateTable('employee', $data, array('id' => $this->session->userdata('id')));
        $action = array(
            'employee_id' =>  $this->session->userdata('id'),
            'action' => "Update password ",
            'update_date' => date("Y-m-d H:i:s")
        );
        $this->M_table->createTable("history_action_employee", $action);
        redirect('Client/profile');
    }

    // =========== order ============

    public function order()
    {
        $id                   = $this->session->userdata('id');
        $data['user']            = $this->M_employee->getEmployee($id);
        $data['orderDo']      = $this->M_employee->dataOrder('1', $id);
        $data['orderDone']    = $this->M_employee->dataOrder('2', $id);
        $this->load->view('employee/v_order', $data);
    }
    public function detailOrder()
    {
        $id                   = $this->session->userdata('id');
        $data['user']            = $this->M_employee->getEmployee($id);
        $id_order               = str_replace("'", "", $this->uri->rsegment(3));
        if ($id_order == "") {
            redirect('Employee/order');
        } else {
            if (is_numeric($id_order)) {
                if ($this->M_table->totalByCon('order', 'id', $id_order) == 0) {
                    $data['validate'] = false;
                } else {
                    $data['validate']              = true;
                    $data['dataOrder']             = $this->M_table->getDataOrder($id_order);
                    $data['dataStaff']             = $this->M_table->getDataStaff($id_order);
                    $data['step']                  = $this->M_table->getFlow($id_order);
                    $data["letter"]             = $this->M_table->letter($id_order);
                    $data['substep']               = $this->M_table->getSubFlow($id_order);
                    $data['person']                = $this->M_user->person($id_order);
                    $data['dataProcessDo']         = $this->M_employee->getProcess($id_order, $id, 'do');
                    $data['dataProcessDone']       = $this->M_employee->getProcess($id_order, $id, 'done');
                    $data['meeting']                  = $this->M_table->getMeeting($id_order);
                    $data["pic"]                   = $this->M_table->dataTableWhere('person_in_charge', 'order_id', $id_order);
                    $data["dataProcess"]           = $this->M_table->getProcess($id_order);
                    $data["dataUser"]              = $this->M_user->profile($data['dataOrder']['user_id']);
                    $data["dataMeeting"]            = $this->M_table->getAllMeeting($id_order);

                    // percentage input
                    $total                         = count($data['letter']);
                    $done                        = count($this->M_table->percenLetter($id_order, 'done'));
                    $data['percentinput']         = round(((20) / $total) * $done, 1);
                    $data['percentInputNow']    = round(($done / $total) * 100, 0);
                    // percentage progress
                    $total                        = count($this->M_table->getSubFlow($id_order));
                    if ($total == 0) {
                        $total = 1;
                    }
                    $data['total']                = $total;
                    $done                         = count($this->M_table->getProcessDone($id_order));
                    $data['totalDone']           = $done;
                    $data['percentProgressNow']    = round(($done / $total) * 100, 0);

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
                    $data['percentall']         = $data['percentinput'] + $data['percentprocess']  +  $data['percentoutput'];
                }
                $this->load->view('employee/v_detailOrder', $data);
            } else {
                redirect('Employee/lock');
            }
        }
    }
    public function updateStatusProcess()
    {
        $process_id                    = str_replace("'", " ", $this->uri->rsegment(3));
        $data['update_date']       = date("Y-m-d H:i:s");

        $cek = $this->M_table->getByCon('process', 'id', $process_id);
        if ($cek['status'] == "do") {
            $data['status']             = "done";
            $action = array(
                'employee_id' =>  $this->session->userdata('id'),
                'action' => "Turn done process ",
                'update_date' => date("Y-m-d H:i:s")
            );
        } else {
            $action = array(
                'employee_id' =>  $this->session->userdata('id'),
                'action' => "Turn do process ",
                'update_date' => date("Y-m-d H:i:s")
            );
            $data['status']             = "do";
            $validate = $this->M_table->getByCon('process_report', 'process_id', $process_id);
            if (file_exists('assets/upload/images/employee/' . $validate['report']) && $validate['report']) {
                unlink('assets/upload/report/' . $validate['report']);
            }
            $this->M_table->deleteTableCon('process_report', 'process_id', $process_id);
        }
        $this->M_table->updateTable('process', $data, array('id' => $process_id));

        $this->M_table->createTable("history_action_employee", $action);
        redirect('Employee/detailOrder/' . str_replace("'", " ", $this->uri->rsegment(4)));
    }

    public function _do_upload_report()
    {
        $image_name = time() . '-' . $_FILES["image"]['name'];
        $config['upload_path']         = 'assets/upload/report/';
        $config['allowed_types']     = 'pdf|jpg|png|jpeg|xlsx|doc|odt';
        $config['max_size']         = 1000;
        $config['max_widht']         = 1500;
        $config['max_height']          = 1500;
        $config['file_name']         = $image_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('');
        }
        return $this->upload->data('file_name');
    }

    // ==================== WORKFLOW ====================
    public function dataWorkflow()
    {
        $id             = $this->session->userdata('id');
        $data['user']   = $this->M_employee->getEmployee($id);
        $data["c1"]     = $this->M_table->getByCon("categoryservice", "id", 1);
        $data["c2"]     = $this->M_table->getByCon("categoryservice", "id", 2);
        $data["c3"]     = $this->M_table->getByCon("categoryservice", "id", 3);
        $data["c4"]     = $this->M_table->getByCon("categoryservice", "id", 4);
        $data["data1"]  = $this->M_table->totalByCon("services", "category_service_id", 1);
        $data["data2"]  = $this->M_table->totalByCon("services", "category_service_id", 2);
        $data["data3"]  = $this->M_table->totalByCon("services", "category_service_id", 3);
        $data["data4"]  = $this->M_table->totalByCon("services", "category_service_id", 4);
        $data["data0"]  = $this->M_table->totalByCon("services", "category_service_id", 0);
        $this->load->view("employee/v_dataWorkflow", $data);
    }

    public function detailWorkflow()
    {
        $id                                     = $this->session->userdata("id");
        $data['user']   = $this->M_employee->getEmployee($id);
        $id                                     = str_replace("'", "	", $this->uri->rsegment(3));
        if ($id == "") {
            redirect("Employee/dataWorkflow");
        } else {
            if (is_numeric($id)) {
                if ($this->M_table->totalByCon("categoryservice", "id", $id) == 0) {
                    $data["validate"]           = false;
                } else {
                    $data["validate"]           = true;
                    $data["selected"]           = $this->M_table->getByCon("categoryservice", "id", $id);
                    $data["service"]            = $this->M_table->getService($id);
                }
                $this->load->view("employee/v_detailWorkflow", $data);
            } else {
                redirect("Employee/lock");
            }
        }
    }
    public function workflow()
    {
        $id                                     = $this->session->userdata("id");
        $data['user']   = $this->M_employee->getEmployee($id);
        $id                                     = str_replace("'", "", $this->uri->rsegment(3));
        if ($id == "") {
            redirect("Employee/dataWorkflow");
        } else {
            if (is_numeric($id)) {
                if ($this->M_table->totalByCon("services", "id", $id) > 0) {
                    $data["service"]            = $this->M_table->getByCon("services", "id", $id);
                }
                if ($this->M_table->totalByCon("step", "service_id", $id) == 0) {
                    $data["validate"]           = false;
                } else {
                    $data["validate"]           = "hm";
                    $data["selected"]           = $this->M_table->dataTableWhere("step", "service_id", $id);
                }
                $this->load->view("employee/v_step", $data);
            } else {
                redirect("Employee/lock");
            }
        }
    }
    public function updateDataStep()
    {
        $data["step"]                           = str_replace("'", "", $this->input->post("step"));
        $data["description"]                    = str_replace("'", "", $this->input->post("description"));
        $id                    = str_replace("'", "", $this->input->post("id"));
        $data["drive"]                    = str_replace("'", "", $this->input->post("drive"));
        $data["update_date"]                    = date("Y-m-d H:i:s");
        $this->M_table->updateTable("step", $data, ["id" => $id]);
        redirect('Employee/workflow/' . str_replace("'", "", $this->input->post("service_id")));
    }
    public function processCreateStep()
    {
        $data["step"]                           = str_replace("'", "", $this->input->post("name"));
        $data["description"]                    = str_replace("'", "", $this->input->post("description"));
        $data["drive"]                    = str_replace("'", "", $this->input->post("drive"));
        $con                                    = str_replace("'", "", $this->input->post("con"));
        $data["update_date"]                    = date("Y-m-d H:i:s");
        $data["create_date"]                    = date("Y-m-d H:i:s");
        $category                               = str_replace("'", "", $this->uri->rsegment(3));
        if (is_numeric($category)) {
            $data["service_id"]                 = str_replace("'", "", $category);
            $this->M_table->createTable("step", $data);
            $action                             = ["admin_id" => $this->session->userdata("id"), "action" => "Create Step : " . $data['step'], "action_date" => date("Y-m-d H:i:s"),];
            $this->M_table->createTable("history_action_admin", $action);
        }
        if ($con == "") {
            redirect("Employee/workflow/" . $category);
        } else {
            $order_id                           = str_replace("'", "", $this->input->post("order_id"));
            redirect("Employee/updateOrderStep/" . $order_id);
        }
    }
    public function deleteStep()
    {
        $category                               = str_replace("'", "", $this->uri->rsegment(3));
        $service                                = str_replace("'", "", $this->uri->rsegment(4));
        if ($category == "" || $service == "") {
            redirect("Employee/dataWorkflow");
        } else {
            if (is_numeric($category) && is_numeric($service)) {
                $this->M_table->deleteTable("step", $category);
                $step                           = $this->M_table->getByCon("step", "id", $category)["step"];
                $action                         = ["admin_id" => $this->session->userdata("id"), "action" => "Delete Step : " . $step, "action_date" => date("Y-m-d H:i:s"),];
                $this->M_table->createTable("history_action_admin", $action);
                redirect("Employee/workflow/" . $service);
            } else {
                redirect("Employee/lock");
            }
        }
    }
    public function detailStep()
    {
        $id                                     = $this->session->userdata("id");
        $data['user']   = $this->M_employee->getEmployee($id);
        $id_category                            = str_replace("'", "", $this->uri->rsegment(3));
        if ($id_category == "") {
            redirect("Employee/dataWorkflow");
        } else {
            if (is_numeric($id_category)) {
                if ($this->M_table->totalByCon("step", "id", $id_category) > 0) {
                    $data["step"]               = $this->M_table->getByCon("step", "id", $id_category);
                }
                if ($this->M_table->totalByCon("substep", "step_id", $id_category) == 0) {
                    $data["validate"]           = false;
                } else {
                    $data["validate"]           = "hm";
                    $data["subStep"]            = $this->M_table->dataTableWhere("substep", "step_id", $id_category);
                    $data["step"]               = $this->M_table->getByCon("step", "id", $id_category);
                }
                $this->load->view("employee/v_subStep", $data);
            } else {
                redirect("Employee/lock");
            }
        }
    }
    public function updateSubStep()
    {
        $subStep                                        = str_replace("'", "", $this->input->post("subStep_id"));
        $step                                        = str_replace("'", "", $this->input->post("step_id"));
        $data['subStep']                              = str_replace("'", "", $this->input->post("subStep"));
        $data["update_date"]                         = date("Y-m-d H:i:s");
        if ($subStep == "") {
            redirect("Employee/lock");
        } else {
            if (is_numeric($subStep)) {
                $this->M_table->updateTable("substep", $data, ["id" => $subStep]);
                redirect("Employee/detailStep/" . $step);
            } else {
                redirect("Employee/lock");
            }
        }
    }
    public function processCreateSubStep()
    {
        $data["subStep"]                        = str_replace("'", "", $this->input->post("name"));
        $data["update_date"]                    = date("Y-m-d H:i:s");
        $data["create_date"]                    = date("Y-m-d H:i:s");
        $data["step_id"]                        = str_replace("'", "", $this->input->post("step_id"));
        // print_r($data); exit();
        $this->M_table->createTable("substep", $data);
        $step                                   = $this->M_table->getByCon("step", "id", $data['step_id'])["step"];
        $action                                 = ["admin_id" => $this->session->userdata("id"), "action" => "Create sub step : " . $data['subStep'] . " to step : " . $step, "action_date" => date("Y-m-d H:i:s"),];
        $this->M_table->createTable("history_action_admin", $action);
        if (str_replace("'", "", $this->input->post("order_id")) == "") {
            redirect("Employee/detailStep/" . $data["step_id"]);
        } else {
            redirect("Employee/updateOrderStep/" . str_replace("'", "", $this->input->post("order_id")));
        }
    }
    public function deleteSubStep()
    {
        $category                               = str_replace("'", "", $this->uri->rsegment(3));
        $service                                = str_replace("'", "", $this->uri->rsegment(4));
        if ($category == "" || $service == "") {
            redirect("Employee/dataWorkflow");
        } else {
            if (is_numeric($category) && is_numeric($service)) {
                $substep                        = $this->M_table->getByCon("substep", "id", $category)["subStep"];
                $action                         = ["admin_id" => $this->session->userdata("id"), "action" => "Delete sub step : " . $substep, "action_date" => date("Y-m-d H:i:s"),];
                $this->M_table->createTable("history_action_admin", $action);
                $this->M_table->deleteTable("substep", $category);
                redirect("Employee/detailStep/" . $service);
            } else {
                redirect("Employee/lock");
            }
        }
    }

    // ================= service ==================

    public function dataProject()
    {

        $id                                     = $this->session->userdata("id");
        $data['user']       = $this->M_employee->getEmployee($id);
        $data['dataProject']  = $this->M_table->getAll('services');
        $this->load->view('employee/v_dataProject', $data);
    }
    // ================== report ====================

    public function processCreateReport()
    {
        $data = array(
            'process_id' =>  str_replace("'", "", $this->input->post('process_id')),
            'message' =>  str_replace("'", "", $this->input->post('message')),
            'update_date' => date("Y-m-d H:i:s"),
            'create_date' => date("Y-m-d H:i:s"),
        );

        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_report();
            $data['report'] = $image;
        }
        $forReview['report_id']         = $this->M_table->createTableOrder('process_report', $data);
        $forReview['ending_date']       = str_replace("'", "", $this->input->post('ending_date'));
        $forReview['create_date']       = date("Y-m-d H:i:s");
        $forReview['update_date']       = date("Y-m-d H:i:s");
        $this->M_table->createTable('report_review', $forReview);
        $action = array(
            'employee_id' =>  $this->session->userdata('id'),
            'action' => "Upload report",
            'update_date' => date("Y-m-d H:i:s")
        );
        $this->M_table->createTable("history_action_employee", $action);
        redirect('Employee/orderReport/' . str_replace("'", "", $this->input->post('order_id')));
    }
    public function deleteReport()
    {
        $id               = str_replace("'", "", $this->uri->rsegment(3));
        $data = $this->M_table->getById('process_report', $id);
        if (file_exists('assets/upload/report/' . $data['report'])) {
            unlink('assets/upload/report/' . $data['report']);
        }
        $this->M_table->deleteTable('process_report', $id);
        $this->M_table->deleteTableCon('report_review', 'report_id', $id);
        $action = array(
            'employee_id' =>  $this->session->userdata('id'),
            'action' => "Delete report",
            'update_date' => date("Y-m-d H:i:s")
        );
        $this->M_table->createTable("history_action_employee", $action);
        redirect('Employee/orderReport/' . str_replace("'", "", $this->uri->rsegment(4)));
    }
    public function updateReport()
    {
        $id                   = $this->session->userdata('id');
        $data['user']            = $this->M_employee->getEmployee($id);
        $report_id = str_replace("'", "", $this->uri->rsegment(3));
        if ($report_id == "") {
            redirect('Employee/report');
        } else {
            if (is_numeric($report_id)) {
                if ($this->M_table->totalByCon('process_report', 'id', $report_id) == 0) {
                    $data['validate'] = false;
                } else {
                    $data['validate'] = true;
                    $data['dataReport'] = $this->M_table->detailReport($report_id);
                }
                $this->load->view('employee/v_updateReport', $data);
            } else {
                redirect('Employee/lock');
            }
        }
    }

    public function report()
    {
        $id                   = $this->session->userdata('id');
        $data['user']            = $this->M_employee->getEmployee($id);
        $data['orderDo']      = $this->M_employee->dataOrder('1', $id);
        $data['orderDone']    = $this->M_employee->dataOrder('2', $id);
        $this->load->view('employee/v_report', $data);
    }
    public function orderReport()
    {
        $id                         = $this->session->userdata('id');
        $id_order                   = str_replace("'", " ", $this->uri->rsegment(3));
        $data['user']                 = $this->M_employee->getEmployee($id);
        $data['dataOrder']          = $this->M_table->getDataOrder($id_order);
        $data['report']             = $this->M_employee->getReport($id_order, $id);
        $data['dataProcessDone']    = $this->M_employee->getProcessDone($id_order, $id);
        $this->load->view('employee/v_orderReport', $data);
    }
    public function processUpdateReport()
    {
        $id                            = $this->input->post('report_id');
        $data = array(
            'message' =>  str_replace("'", "", $this->input->post('message')),
            'sent_hardfile' =>  str_replace("'", "", $this->input->post('sent_hardfile')),
            'update_date' => date("Y-m-d H:i:s")
        );
        $cek = $this->M_table->getById('process_report', $id);
        if ($cek['sent_hardfile'] != "sent" && $this->input->post('sent_hardfile') == "sent") {
            $data['sent_date'] =  date("Y-m-d H:i:s");
        }
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_report();
            $upload = $this->M_table->getById('process_report', $id);

            if (file_exists('assets/upload/report/' . $upload['report'])) {
                unlink('assets/upload/report/' . $upload['report']);
            }
            $data['report'] = $image;
        }
        $action = array(
            'employee_id' =>  $this->session->userdata('id'),
            'action' => "Update report",
            'update_date' => date("Y-m-d H:i:s")
        );
        $this->M_table->createTable("history_action_employee", $action);
        $this->M_table->updateTable('process_report', $data, array('id' => $id));
        redirect('Employee/orderReport/' . $this->input->post('order_id'));
    }

    // ================== REVIEW ====================

    public function review()
    {
        $id                   = $this->session->userdata('id');
        $data['user']            = $this->M_employee->getEmployee($id);
        $data['orderDo']      = $this->M_employee->dataOrder('1', $id);
        $data['orderDone']    = $this->M_employee->dataOrder('2', $id);
        $this->load->view('employee/v_review', $data);
    }
    public function reportReview()
    {
        $id                   = $this->session->userdata('id');
        $data['user']            = $this->M_employee->getEmployee($id);

        $id_order                   = str_replace("'", " ", $this->uri->rsegment(3));
        if ($id_order == "") {
            redirect('Employee/review');
        } else {
            if (is_numeric($id_order)) {
                $data['dataOrder']    = $this->M_table->getDataOrder($id_order);
                $data['dataStaff']    = $this->M_table->getDataStaff($id_order);
                $data['person']       = $this->M_user->person($id_order);
                $data['review']       = $this->M_employee->reviewByCon($id_order, $id);

                $data['report']             = $this->M_table->getReport($id_order);
                if ($data['dataOrder']['supervisor_id'] == $id) {
                    $data['supervisor'] = "true";
                } else {
                    $data['supervisor'] = "false";
                }
                $this->load->view('employee/v_reportReview', $data);
            } else {
                redirect('Employee/lock');
            }
        }
    }
    public function approveReport()
    {
        $review_id                        = $this->uri->rsegment(3);
        if ($review_id == "" || $this->uri->rsegment(4) == "") {
            redirect('Employee/lock');
        } else {
            if (is_numeric($review_id) || is_numeric($this->uri->rsegment(4))) {
                if ($this->M_table->totalByCon('report_review', 'id', $review_id) == 0) {
                    redirect('Employee/lock');
                }
                if ($this->M_table->getById('report_review', $review_id)['review_supervisor'] == "do") {
                    $data['review_supervisor'] = "done";
                } else {
                    $data['review_supervisor'] = "do";
                }
                $this->M_table->updateTable("report_review", $data, ["id" => $review_id]);
                redirect('Employee/reportReview/' . $this->uri->rsegment(4));
            } else {
                redirect('Employee/lock');
            }
        }
    }
    public function updateStatusReview()
    {
        $id_review                   = str_replace("'", " ", $this->uri->rsegment(3));
        $id_order                   = str_replace("'", " ", $this->uri->rsegment(4));
        if ($id_order == "" || $id_order == "") {
            redirect('Employee/review');
        } else {
            if (is_numeric($id_order) && is_numeric($id_review)) {
                $data['review_status']    = "done";
                $this->M_table->updateTable('report_review', $data, array('id' => $id_review));
                $action = array(
                    'employee_id' =>  $this->session->userdata('id'),
                    'action' => "Update review",
                    'update_date' => date("Y-m-d H:i:s")
                );
                $this->M_table->createTable("history_action_employee", $action);
                redirect('Employee/reportReview/' . $id_order);
            } else {
                redirect('Employee/lock');
            }
        }
    }
    public function updateReview()
    {
        $review_id = str_replace("'", "", $this->uri->rsegment(3));
        $report_id = $this->M_table->getById('report_review', $review_id)['report_id'];
        redirect('Employee/updateReport/' . $report_id);
    }

    // ================== FEEDBACK ====================

    public function feedback()
    {

        $id                   = $this->session->userdata('id');
        $data['user']            = $this->M_employee->getEmployee($id);
        $data['dataClient']   = $this->M_table->dataTableWhere('user', 'status_id', '1');
        $data['dataServices']   = $this->M_table->getAll('services');
        $data['orderDone']    = $this->M_employee->dataOrder('1', $id);
        $this->load->view('employee/v_feedback.php', $data);
    }
    public function detailFeedback()
    {
        $id                   = $this->session->userdata('id');
        $data['user']         = $this->M_employee->getEmployee($id);
        $order_id             = str_replace("'", "", $this->uri->rsegment(3));
        if ($order_id == "") {
            redirect('Employee/feedback');
        } else {
            if (is_numeric($order_id)) {
                if ($this->M_employee->totalFeedbackOrder($order_id, $id) == 0) {
                    $data['validate'] = false;
                } else {
                    $data['validate']       = true;
                    $data['dataFeedback'] = $this->M_employee->getFeedback($order_id, $id);
                    $data['dataCriteria'] = $this->M_employee->getCriteria($order_id, $id);
                }
                $this->load->view('employee/v_detailFeedback', $data);
            } else {
                redirect('Employee/lock');
            }
        }
    }

    // ================== HISTORY ====================

    public function history()
    {
        $id                   = $this->session->userdata('id');
        $data['user']            = $this->M_employee->getEmployee($id);
        $data['history']         = $this->M_table->dataTableWhere('history_login_employee', 'employee_id', $id);
        $data['action']         = $this->M_employee->getAction($id);
        $this->load->view('employee/v_history.php', $data);
    }

    // ================== SCURITY ====================

    public function lock()
    {
        $id = $this->session->userdata('key');
        $data['logout_date'] = date("Y-m-d H:i:s");
        $this->M_table->updateTable('history_login_employee', $data, array('login_date' => $id));
        $this->session->sess_destroy();
        $this->load->view('v_anonymous');
    }
    // ================= SPECIAL TASK ==================
    public function specialTask()
    {
        $id                   = $this->session->userdata("id");
        $data['user']            = $this->M_employee->getEmployee($id);
        $data['dataCategory'] = $this->M_table->getAll('category_specialtask');
        $data['dataTask']      = $this->M_table->getTaskByEmployee($id);
        $this->load->view("employee/v_specialTask", $data);
    }
    public function updateTask()
    {
        $data["task"]           = str_replace("'", "", $this->input->post("task"));
        $data["description"]    = str_replace("'", "", $this->input->post("description"));
        $data["id_category"]    = str_replace("'", "", $this->input->post("category_id"));
        $data["update_date"]    = date("Y-m-d H:i:s");

        $this->M_table->updateTable("specialtask", $data, array('id' => $this->input->post("task_id")));
        redirect("Employee/specialTask");
    }
    public function uploadTask()
    {
        $id                   = $this->session->userdata('id');
        $data['user']            = $this->M_employee->getEmployee($id);
        $task_id             = str_replace("'", "", $this->uri->rsegment(3));
        $bantu = [];
        foreach ($this->M_table->getTaskByEmployee($id) as $row) {
            array_push($bantu, $row['id']);
        }
        if (in_array($task_id, $bantu)) {
            if ($task_id == "") {
                redirect('Employee/lock');
            } else {
                if (is_numeric($task_id)) {
                    $data['dataTask'] = $this->M_table->getById('specialtask', $task_id);

                    $this->load->view('employee/v_uploadTask', $data);
                } else {
                    redirect('Employee/lock');
                }
            }
        } else {
            redirect('Employee/lock');
        }
    }
    public function _do_upload_task()
    {
        $image_name = time() . '-' . $_FILES["image"]['name'];
        $config['upload_path']         = 'assets/upload/task/';
        $config['allowed_types']     = 'pdf|jpg|png|jpeg|xlsx|doc|odt';
        $config['file_name']         = $image_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('');
        }
        return $this->upload->data('file_name');
    }

    public function processCreateTask()
    {
        $data["employee_id"]    = $this->session->userdata('id');
        $data["task"]           = str_replace("'", "", $this->input->post("task"));
        $data["description"]    = str_replace("'", "", $this->input->post("description"));
        $data["estimasi"]       = date("Y-m-d H:i:s");
        $data["id_category"]    = str_replace("'", "", $this->input->post("category_id"));
        $data["update_date"]    = date("Y-m-d H:i:s");
        $data["create_date"]    = date("Y-m-d H:i:s");
        $this->M_table->createTable("specialtask", $data);
        redirect("Employee/specialTask");
    }

    public function processUploadTask()
    {
        $id                            = $this->session->userdata('id');

        $task_id =  str_replace("'", "", $this->input->post('task_id'));
        $data = array(
            'description' => str_replace("'", "", $this->input->post('description')),
            'update_date' => date("Y-m-d H:i:s")
        );
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_task();
            $data['file'] = $image;
            $upload = $this->M_table->getById('specialtask', $task_id);
            if (file_exists('assets/upload/task/' . $upload['file'])) {
                unlink('assets/upload/task/' . $upload['file']);
            }
        }
        $action = array(
            'employee_id' =>  $id,
            'action' => "upload special task",
            'update_date' => date("Y-m-d H:i:s")
        );
        $this->M_table->createTable("history_action_employee", $action);

        $this->M_table->updateTable('specialtask', $data, array('id' => $task_id));
        redirect('Employee/specialTask');
    }

    //============ training ============

    public function training()
    {
        $id                       = $this->session->userdata("id");
        $data['user']             = $this->M_employee->getEmployee($id);
        $data["data_category"]    = $this->M_table->getAll('content_training_category ORDER BY content_training_category');
        $data["data_title"]       = $this->M_table->getAll('content_training_title order by content_title');
        $data["data_trainingE"]   = $this->M_employee->getEmployeeTraining($id);
        $data["materi_trainingAll"]   = $this->M_employee->getMaterialTraining();
        $this->load->view("employee/v_training", $data);
    }
    public function createTrainingEmployee()
    {
        $data['id_employee']          = $this->session->userdata("id");
        $data['plan_start']           = $this->input->post('plan_start');
        $data['plan_finish']          = $this->input->post('plan_finish');
        $data['id_title_material']    = $this->input->post('id_title');
        $data['desc']                 = $this->input->post('desc');
        $data['create_date']          = date('Y-m-d H:i:s');
        $data['update_date']          = date('Y-m-d H:i:s');
        $this->M_table->createTable('employee_training', $data);
        $newdata   = array(
            'input'        => "success"
        );
        $this->session->set_userdata($newdata);
        redirect('Employee/training');
    }
    public function updateDataTE()
    {
        $id                           = $this->input->post('id');
        $data['plan_start']           = $this->input->post('plan_start');
        $data['plan_finish']          = $this->input->post('plan_finish');
        $data['id_title_material']    = $this->input->post('id_title');
        $data['desc']                 = $this->input->post('desc');
        $data['update_date']          = date('Y-m-d H:i:s');
        $this->M_table->updateTable('employee_training', $data, array('id' => $id));
        $newdata   = array(
            'update'        => "success",
            'message'        => "data berhasil diperbarui"
        );
        $this->session->set_userdata($newdata);
        redirect('Employee/training');
    }
    public function updateDatePresentation()
    {
        $data['presentation_date'] = $this->input->post('presentation');
        $id = $this->input->post('id');
        $newdata   = array(
            'update'        => "success",
            'message'        => "tanggal presentasi diperbarui",
        );
        $this->M_table->updateTable('employee_training', $data, array('id' => $id));
        $this->session->set_userdata($newdata);
        redirect('Employee/training');
    }
    public function delTrainingE()
    {
        $id = $this->uri->rsegment(3);
        $this->M_table->deleteTable('employee_training', $id);
        $newdata   = array(
            'input'        => "deleted"
        );
        $this->session->set_userdata($newdata);
        redirect('Employee/training');
    }
    public function dtraining()
    {
        $id                             = $this->session->userdata("id");
        $data['user']                      = $this->M_employee->getEmployee($id);
        $id                               = str_replace("'", "", $this->uri->rsegment(3));
        $data["data_title"]       = $this->M_table->getAll('content_training_title order by content_title');
        if ($id == "") {
            redirect("Employee/lock");
        } else {
            if (is_numeric($id)) {
                if ($this->M_table->totalByCon("content_training_category", "id", $id) == 0) {
                    redirect("Employee/lock");
                } else {
                    $data["category"]                  = $this->M_table->getById('content_training_category', $id);
                    $data["title_content"]                  = $this->M_table->dataTableWhere('content_training_title', 'id_category', $id);
                }
                $this->load->view("employee/landingpage/index", $data);
            } else {
                redirect("Employee/lock");
            }
        }
    }
    public function content()
    {
        $id                             = $this->session->userdata("id");
        $data['user']                      = $this->M_employee->getEmployee($id);
        $id                               = str_replace("'", "", $this->uri->rsegment(3));
        if ($id == "") {
            redirect("Employee/lock");
        } else {
            if (is_numeric($id)) {
                if ($this->M_table->totalByCon("content_training_title", "id", $id) == 0) {
                    redirect("Employee/lock");
                } else {
                    $data["title_content"]    = $this->M_table->getById('content_training_title', $id);
                    $data["category"]         = $this->M_table->getById('content_training_category', $data['title_content']['id_category']);
                    $data['data_pdf']         = $this->M_table->dataTableWhere('content_training_type_pdf', 'id_content_title', $id);
                    $data['data_ppt']         = $this->M_table->dataTableWhere('content_training_type_ppt', 'id_content_title', $id);
                    $data['data_yt']          = $this->M_table->dataTableWhere('content_training_type_yt', 'id_content_title', $id);
                }
                $this->load->view("employee/landingpage/content", $data);
            } else {
                redirect("Employee/lock");
            }
        }
    }

    //============ tax update ============

    public function taxUpdate()
    {
        $id             = $this->session->userdata("id");
        $data['user']   = $this->M_employee->getEmployee($id);
        $this->load->view("employee/v_taxUpdate", $data);
    }

    //============ accountingUpdate ============

    public function accountingUpdate()
    {
        $id                   = $this->session->userdata("id");
        $data['user']   = $this->M_employee->getEmployee($id);
        $this->load->view("employee/v_accountingUpdate", $data);
    }

    //============ employeeScore ============

    public function employeeScore()
    {
        $id                   = $this->session->userdata("id");
        $data['user']         = $this->M_employee->getEmployee($id);
        $this->load->view("employee/v_employeeScore", $data);
    }

    // =========== daily report =============


    public function dailyReport()
    {
        $id                                     = $this->session->userdata("id");
        $data['user']            = $this->M_employee->getEmployee($id);
        $type = $this->input->post("type");
        if ($this->input->post("totalData")) {
            for ($i = 1; $i < $this->input->post("totalData"); $i++) {
                $report_id                = $this->input->post('report_id' . $i);
                $newData['planing']       = $this->input->post('planing' . $report_id);
                $reportNow = $this->M_table->getById('dailyreport', $report_id);
                if ($newData['planing'] == "") {
                    continue;
                }
                if ($newData['planing'] == $reportNow['planing'] && $this->input->post('doing' . $report_id) == $reportNow['doing'] && $this->input->post('problem' . $report_id) == $reportNow['problem'] && $this->input->post('solution' . $report_id) == $reportNow['solution'] && $this->input->post('description' . $report_id) == $reportNow['description']) {
                    continue;
                } else {
                    $newData['update_date']   = date('Y-m-d H:i:s');
                    $newData['doing']         = $this->input->post('doing' . $report_id);
                    $newData['problem']       = $this->input->post('problem' . $report_id);
                    $newData['solution']      = $this->input->post('solution' . $report_id);
                    $newData['description']   = $this->input->post('description' . $report_id);
                    $this->M_table->updateTable('dailyreport', $newData, array('id' => $report_id));
                }
            }

            $newdata   = array(
                'update' => "success",
            );
            $this->session->set_userdata($newdata);
            $date     = strval($this->input->post('date'));
            $data['dailyReport']    = $this->M_employee->dR_ED($id, $date);
            $data['message'] = "Menampilkan data laporan : " . date("F j, Y", strtotime($date));
            $data['date'] = $date;
            $data['type'] = "day";
            if ($date == date('Y-m-d')) {
                redirect('Employee/dailyReport');
            } else {

                return $this->load->view('employee/v_dailyReport', $data);
            }
        }
        if ($type) {
            if ($type == "day") {
                ($this->input->post("date") ? $date = $this->input->post("date") : $date = $this->input->post("day"));
                $data['dailyReport']    = $this->M_employee->dR_ED($id, $date);
                $data['message'] = "Menampilkan data Harian pada: "  . date("F j, Y", strtotime($date));
            } else {
                ($this->input->post("date") ? $date = $this->input->post("date") : $date = $this->input->post("month"));
                $m = date("m", strtotime($date));
                $y = date("Y", strtotime($date));
                $data['dailyReport'] = $this->M_employee->dR_ED_Month($id, $m, $y);
                $data['message'] = "Menampilkan data Bulanan pada: " . date("F Y", strtotime($date));
            }
            $data['date'] = $date;
            $data['type'] = $type;
        } else {
            $date = date('Y-m-d');
            $data['dailyReport']    = $this->M_employee->dR_ED($id, $date);
            $data['message'] = "Menampilkan data laporan Hari ini";
            $data['date'] = date('Y-m-d');
            $data['type'] = "day";
        }
        $this->load->view('employee/v_dailyReport', $data);
    }
    public function createTemplateReport()
    {
        $id                             = $this->session->userdata("id");
        if (empty($this->M_employee->dR_ED($id, date('Y-m-d')))) {
            $time_start = ['08:00', '08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30', '21:00', '21:30', '22:00', '22:30', '23:00', '23:30', '00:00', '00:30', '01:00', '01:30', '02:00', '02:30', '03:00', '03:30', '04:00', '04:30', '05:00', '05:30', '06:00', '06:30', '07:00', '07:30'];
            $time_end = ['08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30', '21:00', '21:30', '22:00', '22:30', '23:00', '23:30', '00:00', '00:30', '01:00', '01:30', '02:00', '02:30', '03:00', '03:30', '04:00', '04:30', '05:00', '05:30', '06:00', '06:30', '07:00', '07:30', '08:00'];
            $data['date']       = date('Y-m-d');
            $data['create_date']       = date("Y-m-d H:i:s");
            $data['update_date']       = date("Y-m-d H:i:s");
            $data['employee_id']       = $id;
            for ($i = 0; $i < 48; $i++) {
                $data['start_time'] = $time_start[$i];
                $data['end_time'] = $time_end[$i];
                $this->db->insert('dailyreport', $data);
            }
            redirect('Employee/dailyReport');
        } else {
            redirect('Employee/dailyReport');
        }
    }
    public function updateTemplateDailyReport()
    {
        $id                             = $this->session->userdata("id");
        $time_start = ['08:00', '08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30', '21:00', '21:30', '22:00', '22:30', '23:00', '23:30', '00:00', '00:30', '01:00', '01:30', '02:00', '02:30', '03:00', '03:30', '04:00', '04:30', '05:00', '05:30', '06:00', '06:30', '07:00', '07:30'];
        $time_end = ['08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30', '21:00', '21:30', '22:00', '22:30', '23:00', '23:30', '00:00', '00:30', '01:00', '01:30', '02:00', '02:30', '03:00', '03:30', '04:00', '04:30', '05:00', '05:30', '06:00', '06:30', '07:00', '07:30', '08:00'];
        $data['date']       = date('Y-m-d');
        $data['create_date']       = date("Y-m-d H:i:s");
        $data['update_date']       = date("Y-m-d H:i:s");
        $data['employee_id']       = $id;
        for ($i = 0; $i < 48; $i++) {
            $data['start_time'] = $time_start[$i];
            $data['end_time'] = $time_end[$i];
            if (empty($this->M_table->getByCon('dailyreport', 'employee_id', $id . ' AND date = "' . $data['date'] . '" and start_time = "' . $data['start_time'] . ':00"'))) {
                $this->db->insert('dailyreport', $data);
            }
        }
        redirect('Employee/dailyReport');
    }

    // ============= data information ==================

    public function dataInformation()
    {
        $id                   = $this->session->userdata("id");
        $data['user']            = $this->M_employee->getEmployee($id);
        $data['seminar']      = $this->M_table->getAll('news');
        $this->load->view('employee/v_dataInformation', $data);
    }
    public function detailInformation()
    {
        $id                   = $this->session->userdata("id");
        $data['user']            = $this->M_employee->getEmployee($id);
        $news_id                        = $this->uri->rsegment(3);
        if ($news_id == "") {
            redirect('Employee/lock');
        } else {
            if (is_numeric($news_id)) {
                if ($this->M_table->totalByCon('news', 'id', $news_id) == 0) {
                    redirect('Employee/lock');
                } else {
                    $data['dataNews']             = $this->M_table->getById('news', $news_id);
                }
                return $this->load->view('employee/v_detailNews', $data);
            } else {
                redirect('Employee/lock');
            }
        }
    }
    public function _do_upload_hc()
    {
        $image_name                             = time() . "-" . $_FILES["image"]["name"];
        $config["upload_path"]                  = "assets/image/website/history_company/";
        $config["allowed_types"]                = "jpg|png|webp|jpeg";
        $config["file_name"]                    = $image_name;
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload("image")) {
            $this->session->set_flashdata("msg", $this->upload->display_errors("", ""));
            redirect("");
        }
        return $this->upload->data("file_name");
    }

    public function _do_upload_flag()
    {
        $image_name                             = time() . "-" . $_FILES["image"]["name"];
        $config["upload_path"]                  = "assets/image/website/country/";
        $config["allowed_types"]                = "jpg|png|webp|jpeg";
        $config["file_name"]                    = $image_name;
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload("image")) {
            $this->session->set_flashdata("msg", $this->upload->display_errors("", ""));
            redirect("");
        }
        return $this->upload->data("file_name");
    }

    public function _do_upload_file($path, $types, $err)
    {
        $image_name                             = time() . "-" . $_FILES["image"]["name"];
        $config["upload_path"]                  = $path;
        $config["allowed_types"]                = $types;
        $config["file_name"]                    = $image_name;
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload("image")) {
            $this->session->set_flashdata("msg", $err);
        }
        return $this->upload->data("file_name");
    }
    public function websiteMe()
    {
        $id                 = $this->session->userdata("id");
        $data['user']            = $this->M_employee->getEmployee($id);
        // $data['country']    = ["Algeria","Armenia","Australia","Austria","Bangladesh","Belarus","Barbados","Belgium","Bermuda","Bolivia","Bonaire","Botswana","Brazil","British Virgin Islands","Brunei Darussalam","Bulgaria","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Chad","Chile","China Mainland","Colombia","Congo, Replublic","Congo, The Democratic Republic","Costa Rica","Cote D'Ivoire","Croatia","Curacao","Cyprus","Czech Republic","Denmark","Dominican Replublic","Ecuador","Egypt","El Salvador","Estonia","Eswatini","Fiji","Finland","France","Georgia","Germany","Ghana","Gibraltar","Greece","Guam","Guatemala","Guernsey, Channel Islands","Guinea","Guyana","Honduras","Hongkong","Hungary","Iceland","India","Indonesia","Iraq","Ireland, Republic of","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey, Channel Islands","Jordan","Kazakhstan","Kenya","Korea (South)","Korea Democratic Peoople Republic of Korea","Kosovo","Kroasia (Replublic of Croatia)","Kuwait","Laos","Latvia","Lebanon","Lesotho","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Madagascar","Malawi","Malaysia","Maldives","Malta","Mauritania","Marocco","Mauritius","Mexico","Moldova","Monaco","Mongolia","Montenegro, Republic of","Rusia","Morocco","Mozambique","Namibia","Netherlands","New Celedonia","New Zealand","Nicaragua","Nigeria","North Macedonia","Northern Mariana","Norway","Oman","Pakistan","Palestinian Authority","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Romania","Rwanda","Saba","Saint-Martin","São Tomé and Príncipe","Saudi Arabia","Senegal","Serbia, Republic of","Singapore","Sint Eustatius","Sint Maarten","Slovak Republic","Slovenia","South Africa","South Sudan","Spain","Sri Lanka","St. Lucia","Suriname","Sweden","Switzerland","Taiwan","Tanzania","Thailand","Trinidad and Tobago","Tunisia","Turkey","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","Uruguay","US Virgin Islands","Uzbekistan","Venezuela","Vietnam","Zambia","Zimbabwe"];

        if (!empty($_GET['update'])) {
            foreach ($this->M_table->getAll('ipo_company') as $key) {
                if (md5($key['id']) == $_GET['update']) {
                    $data['ipo'] = $this->M_table->getById('ipo_company', $key['id']);
                    return $this->load->view('employee/website/update_ipo', $data);
                }
            }
            redirect('Employee/websiteMe/ipo');
        } else {
            $data['p3b']        = $this->M_table->getAll('text_p3b');
            $data['country']    = $this->M_table->getAll('country');
            $data['history_company'] = $this->M_table->getAll('history_company');
            $data['category'] = $this->uri->rsegment(3);
            $data['category_news'] = $this->M_table->getAll('website_news_category');
            $data['image_news'] = $this->M_table->getAll('website_news_image order by id desc');
            $data['news'] = $this->db->query("SELECT website_news.id, website_news.title,website_news.author,website_news.total_seen,website_news.date, website_news_category.category, website_news_category.category_eng, employee.employee_name FROM website_news INNER JOIN website_news_category ON website_news_category.id = website_news.category_id INNER JOIN employee ON employee.id = website_news.employee_id ORDER BY website_news.date DESC")->result_array();
            $data['country_selected'] = $this->uri->rsegment(4);
            $country = "";
            if ($data['category'] == "news" && $data['country_selected']) {
                $category    = $this->M_table->getAll('website_news_category');
                for ($i = 0; $i < count($category); $i++) {
                    if (md5($category[$i]['id']) == $data['country_selected']) {
                        $data['news'] = $this->db->query("SELECT website_news.*, website_news_category.category, website_news_category.category_eng, employee.employee_name FROM website_news INNER JOIN website_news_category ON website_news_category.id = website_news.category_id INNER JOIN employee ON employee.id = website_news.employee_id WHERE website_news.category_id = " . $category[$i]['id'])->result_array();
                        break;
                    }
                }
            } else {
                if ($this->uri->rsegment(4)) {
                    $data['country']    = $this->M_table->getAll('text_p3b');
                    for ($i = 0; $i < count($data['country']); $i++) {
                        if (md5($data['country'][$i]['country_id']) == $data['country_selected']) {
                            $country = $this->M_table->getById('country', $data['country'][$i]['country_id']);
                            break;
                        }
                    }
                    if ($country == "") {
                        foreach ($this->M_table->getAll('country') as $key) {
                            if (md5($key['id']) == $this->uri->rsegment(4)) {
                                $country = $key['name'];
                                $country_id = $key['id'];
                                $data['country_selected'] = $this->M_table->getById('country', $country_id);
                                $data['p3b']        = $this->M_table->dataTableWhere('text_p3b', 'country_id', $country_id);
                                break;
                            }
                        }
                    } else {

                        $data['country_selected'] = $country;
                        $data['p3b']        = $this->M_table->dataTableWhere('text_p3b', 'country_id', $country['id']);
                    }

                    $data['country']    = $this->M_table->getAll('country');
                    $data['category'] = "detailTaxTreaty";
                }
            }
            $this->load->view("employee/website/index", $data);
        }
    }

    public function updateP3B()
    {
        $id             = str_replace("'", "", $this->input->post("id"));
        $data['lang']   = str_replace("'", "", $this->input->post("lang"));
        $data['text']   = str_replace("'", "", $this->input->post("text"));
        $data['ratified_date']    = str_replace("'", "", $this->input->post("ratified_date"));
        $data['effective_date']   = str_replace("'", "", $this->input->post("effective_date"));
        $data['update_date']    = date('Y-m-d');
        $this->M_table->updateTable("text_p3b", $data, ["id" => $id]);
        $newdata   = array(
            'update' => "success",
            "message" => "data updated!"
        );
        $this->session->set_userdata($newdata);
        redirect('Employee/websiteMe/tax_treaty/' . $this->session->userdata("id_country_tax_p3b"));
    }

    public function addP3B()
    {
        $data['lang']             = str_replace("'", "", $this->input->post("lang"));
        $data['text']             = str_replace("'", "", $this->input->post("text"));
        $data['country']          = str_replace("'", "", $this->input->post("country"));
        $data['country_id']          = str_replace("'", "", $this->input->post("country_id"));
        $data['ratified_date']    = str_replace("'", "", $this->input->post("ratified_date"));
        $data['effective_date']   = str_replace("'", "", $this->input->post("effective_date"));
        $data['create_date']    = date('Y-m-d');
        $data['update_date']    = date('Y-m-d');
        $this->M_table->createTable("text_p3b", $data);
        $newdata   = array(
            'update' => "success",
            "message" => "data created"
        );
        $this->session->set_userdata($newdata);
        redirect('Employee/websiteMe/tax_treaty/' . $this->session->userdata("id_country_tax_p3b"));
    }
    public function updateHc()
    {
        $id                         = str_replace("'", "", $this->input->post("id"));
        $data['description']        = str_replace("'", "", $this->input->post("description"));
        $data['description_eng']    = str_replace("'", "", $this->input->post("description_eng"));
        $data['description_jep']    = str_replace("'", "", $this->input->post("description_jep"));
        $data['description_kor']    = str_replace("'", "", $this->input->post("description_kor"));
        $data['description_chi']    = str_replace("'", "", $this->input->post("description_chi"));
        $data['update_date']        = date('Y-m-d');
        if (!empty($_FILES["image"]["name"])) {
            $image                              = $this->_do_upload_hc();
            $upload                             = $this->M_table->getById("history_company", $id);
            if (file_exists("assets/image/website/history_company/" . $upload["image"]) && $upload["image"]) {
                unlink("assets/image/website/history_company/" . $upload["image"]);
            }
            $data["image"]                      = $image;
        }
        $this->M_table->updateTable("history_company", $data, ["id" => $id]);
        $newdata   = array(
            'update' => "success",
            "message" => "History updated!"
        );
        $this->session->set_userdata($newdata);
        redirect('Employee/websiteMe/history_company');
    }
    public function addHc()
    {
        $data['year']            = str_replace("'", "", $this->input->post("year"));
        $data['description']   = str_replace("'", "", $this->input->post("description"));
        $data['update_date']    = date('Y-m-d');
        $data['create_date']    = date('Y-m-d');
        if (!empty($_FILES["image"]["name"])) {
            $image                              = $this->_do_upload_hc();
            $data["image"]                      = $image;
        }
        $this->M_table->createTable("history_company", $data);
        $newdata   = array(
            'update' => "success",
            "message" => "History created!"
        );
        $this->session->set_userdata($newdata);
        redirect('Employee/websiteMe/history_company');
    }

    public function addFlag()
    {
        $data['name']            = str_replace("'", "", $this->input->post("name"));
        if (!empty($_FILES["image"]["name"])) {
            $image                              = $this->_do_upload_flag();
            $data["image"]                      = $image;
        }
        $this->M_table->createTable("country", $data);
        $newdata   = array(
            'update' => "success",
            "message" => "Country created!"
        );
        $this->session->set_userdata($newdata);
        redirect('Employee/websiteMe/country');
    }
    public function delCountry()
    {

        $id  = $this->uri->rsegment(3);
        $this->validateId('country', $id);
        $upload                         = $this->M_table->getById("country", $id);
        if (file_exists("assets/image/website/country/" . $upload["image"]) && $upload["image"]) {
            unlink("assets/image/website/country/" . $upload["image"]);
        }

        $newdata   = array(
            'update' => "success",
            "message" => "Country " . $upload['name'] . " deleted!"
        );
        $this->session->set_userdata($newdata);
        $this->M_table->deleteTable("country", $id);
        redirect("Employee/websiteMe/country");
    }
    public function updateCountry()
    {
        $data['name']            = str_replace("'", "", $this->input->post("name"));
        $id            = str_replace("'", "", $this->input->post("id"));
        if (!empty($_FILES["image"]["name"])) {
            $image                              = $this->_do_upload_flag();
            $upload                             = $this->M_table->getById("country", $id);
            if (file_exists("assets/image/website/country/" . $upload["image"]) && $upload["image"]) {
                unlink("assets/image/website/country/" . $upload["image"]);
            }
            $data["image"]                      = $image;
        }
        $this->M_table->updateTable("country", $data, ["id" => $id]);
        $newdata   = array(
            'update' => "success",
            "message" => "Country " . $upload['name'] . " updated!"
        );
        $this->session->set_userdata($newdata);
        redirect('Employee/websiteMe/country');
    }
    public function addCategoryNews()
    {
        $data['category']            = str_replace("'", "", $this->input->post("category"));
        $data['category_eng']            = str_replace("'", "", $this->input->post("category_eng"));
        $newdata   = array(
            'update' => "success",
            "message" => "Category " . $data['category'] . " created!"
        );
        $this->session->set_userdata($newdata);
        $this->M_table->createTable("website_news_category", $data);
        redirect('Employee/websiteMe/news');
    }
    public function updtCategoryNews()
    {
        $data['category_eng']            = str_replace("'", "", $this->input->post("category_eng"));
        $data['category']            = str_replace("'", "", $this->input->post("category"));
        $id            = str_replace("'", "", $this->input->post("id"));

        $this->M_table->updateTable("website_news_category", $data, ["id" => $id]);

        $newdata   = array(
            'update' => "success",
            "message" => "Category news : " . $data['category_eng'] . " updated!"
        );

        $this->session->set_userdata($newdata);
        redirect('Employee/websiteMe/news');
    }
    public function delCategoryNews()
    {
        $id = $this->uri->rsegment(3);
        if ($id == 1) {
            $newdata   = array(
                'update' => "success",
                "message" => "ACCESS DENIED"
            );
            $this->session->set_userdata($newdata);
            return redirect('Employee/websiteMe/news');
        }
        $arr = $this->M_table->dataTableWhere('website_news', 'category_id', $id);
        foreach ($arr as $key) {
            $data['category_id'] = 1;
            $this->M_table->updateTable("website_news", $data, ["id" => $key['id']]);
        }
        $newdata   = array(
            'update' => "success",
            "message" => "Category " . $this->M_table->getById('website_news_category', $id)['category'] . " deleted!"
        );
        $this->session->set_userdata($newdata);
        $this->M_table->deleteTable('website_news_category', $id);
        redirect('Employee/websiteMe/news');
    }

    public function addNews()
    {
        $data['category_id']        = str_replace("'", "", $this->input->post("category_id"));
        $data['author']             = str_replace("'", "", $this->input->post("author"));
        $data['title']              = str_replace("'", "", $this->input->post("title"));
        $data['meta_keyword']       = str_replace("'", "", $this->input->post("meta_keyword"));
        $data['meta_description']   = str_replace("'", "", $this->input->post("meta_description"));
        $data['title_eng']              = str_replace("'", "", $this->input->post("title_eng"));
        $data['meta_keyword_eng']       = str_replace("'", "", $this->input->post("meta_keyword_eng"));
        $data['meta_description_eng']   = str_replace("'", "", $this->input->post("meta_description_eng"));
        $data['employee_id']        = $this->session->userdata("id");
        $data['content']            = str_replace("'", "", $this->input->post("content"));
        $data['content_eng']            = str_replace("'", "", $this->input->post("content_eng"));
        $data['date']               = date('Y-m-d H:i:s');
        $newdata   = array(
            'update' => "success",
            "message" => "News " . $data['title'] . " created!"
        );
        $this->session->set_userdata($newdata);
        $this->M_table->createTable("website_news", $data);
        redirect('Employee/websiteMe/news');
    }
    public function delNews()
    {
        $id = $this->uri->rsegment(3);
        $this->validateId('website_news', $id);
        $newdata   = array(
            'update' => "success",
            "message" => "News title: " . $this->M_table->getById('website_news', $id)['title_eng'] . " and " . $this->M_table->getTotalData('website_news_image WHERE news_id = ' . $id) . " image success deleted!"
        );
        $this->M_table->deleteTableCon('website_news_image', 'news_id', $id);
        $this->session->set_userdata($newdata);
        $this->M_table->deleteTable('website_news', $id);
        redirect('Employee/websiteMe/news');
    }
    public function preview_news()
    {
        $id = $this->uri->rsegment(3);
        $news    = $this->M_table->getAll('website_news');
        for ($i = 0; $i < count($news); $i++) {
            if (md5($news[$i]['id']) == $id) {
                $data['tranding'] = $this->db->query("SELECT website_news.*, website_news_category.category, website_news_category.category_eng FROM website_news INNER JOIN website_news_category ON website_news_category.id = website_news.category_id order by website_news.total_seen")->result_array();
                $data['news'] = $this->db->query("SELECT website_news.*, website_news_category.category, website_news_category.category_eng, employee.employee_name,employee.image FROM website_news INNER JOIN website_news_category ON website_news_category.id = website_news.category_id  INNER JOIN employee ON employee.id = website_news.employee_id WHERE website_news.id = " . $news[$i]['id'])->row_array();
                $data['img_news'] = $this->db->query("SELECT * FROM website_news_image WHERE news_id = " . $news[$i]['id'])->result_array();
                $data['imageAll'] = $this->db->query("SELECT * FROM website_news_image")->result_array();
                $data['tag'] = $this->M_table->getAll('website_news_category order by category_eng');
                return $this->load->view("employee/website/preview_news", $data);
            }
        }
    }
    public function updtNews()
    {
        $id = $this->uri->rsegment(3);
        $news    = $this->M_table->getAll('website_news');
        if (!$this->input->post("id")) {
            $data['category_news'] = $this->M_table->getAll('website_news_category');
            for ($i = 0; $i < count($news); $i++) {
                if (md5($news[$i]['id']) == $id) {
                    $data['news'] = $this->db->query("SELECT website_news.*, website_news_category.category, website_news_category.category_eng, employee.employee_name,employee.image FROM website_news INNER JOIN website_news_category ON website_news_category.id = website_news.category_id INNER JOIN employee ON employee.id = website_news.employee_id WHERE website_news.id = " . $news[$i]['id'])->row_array();
                    return $this->load->view("employee/website/update_news", $data);
                } else {
                    continue;
                }
            }
        } else {
            $id                             = str_replace("'", "", $this->input->post("id"));
            $data['category_id']            = str_replace("'", "", $this->input->post("category_id"));
            $data['author']                 = str_replace("'", "", $this->input->post("author"));
            $data['title']                  = str_replace("'", "", $this->input->post("title"));
            $data['meta_keyword']           = str_replace("'", "", $this->input->post("meta_keyword"));
            $data['meta_description']       = str_replace("'", "", $this->input->post("meta_description"));
            $data['title_eng']              = str_replace("'", "", $this->input->post("title_eng"));
            $data['meta_keyword_eng']       = str_replace("'", "", $this->input->post("meta_keyword_eng"));
            $data['meta_description_eng']   = str_replace("'", "", $this->input->post("meta_description_eng"));
            $data['content']                = str_replace("'", "", $this->input->post("content"));
            $data['content_eng']            = str_replace("'", "", $this->input->post("content_eng"));

            $data['date']                   = date('Y-m-d H:i:s');
            $newdata   = array(
                'update' => "success",
                "message" => "News " . $data['title'] . " updated!"
            );
            $this->session->set_userdata($newdata);
            $this->M_table->updateTable('website_news', $data, array('id' => $id));
            redirect('Employee/websiteMe/news');
        }
    }

    function sanitizeForURL($string) {
        $string = str_replace(["?lang=id", "?lang=en"], '', $string);
        $string = str_replace([" ", "$", ":", "!", "'", "/", "?", "(", ")", ","], '-', $string);
        $string = str_replace("&", 'dan', $string);
        return $string;
    }

    public function addImageNews()
    {
        if ($_FILES['listGambar']['name']) {
            $news_id = $this->input->post('news_id');
            $news = $this->M_table->getById("website_news", $news_id);
            for ($i = 0; $i < count($_FILES['listGambar']['name']); $i++) {
                $answer['news_id'] = $news_id;
                if (!empty($_FILES['listGambar']['name'][$i])) {
                    $news_slug = $this->sanitizeForURL($news['title']);
                    $image_extension = pathinfo($_FILES['listGambar']['name'][$i], PATHINFO_EXTENSION);
                    $image_name = strtolower($news_slug . '-' .  uniqid('', false)) . '.' . $image_extension;
                    $path = "assets/image/website/news_image/" . $image_name;
                    copy($_FILES['listGambar']['tmp_name'][$i], $path);
                    $answer["image"] = $image_name;
                    $this->M_table->createTable("website_news_image", $answer);
                }
            }

            $newdata   = array(
                'update' => "success",
                "message" => "Image Uploaded!"
            );
            $this->session->set_userdata($newdata);
            redirect('Employee/websiteMe/news');
        } else {
            redirect('Employee/websiteMe/news');
        }
    }
    public function delImgNews()
    {
        $id = $this->uri->rsegment(3);
        $this->validateId('website_news_image', $id);
        $upload = $this->M_table->getById("website_news_image", $id);
        if (file_exists("assets/image/website/news_image/" . $upload["image"]) && $upload["image"]) {
            unlink("assets/image/website/news_image/" . $upload["image"]);
        }
        $newdata   = array(
            'update' => "success",
            "message" => "Image " . $upload['image'] . " deleted!"
        );
        $this->session->set_userdata($newdata);
        $this->M_table->deleteTable("website_news_image", $id);
        redirect("Employee/websiteMe/news");
    }

    public function addIPO()
    {
        $id  = $this->session->userdata('id');
        $data['user']            = $this->M_employee->getEmployee($id);
        if ($data['user']['position'] == "Investment" && $this->input->post('name')) {
            $answer['name']                                 = $this->input->post('name');
            $answer['sector']                               = $this->input->post('sector');
            $answer['sub_sector']                           = $this->input->post('sub_sector');
            $answer['periode_book_building']                = $this->input->post('periode_book_building');
            $answer['rentang_harga_pokok_book_building']    = $this->input->post('rentang_harga_pokok_book_building');
            $answer['saham_ditawarkan']                     = $this->input->post('saham_ditawarkan');
            $answer['update_date']                          = $this->input->post('update_date');

            for ($i = 0; $i < 2; $i++) {
                // $path = "assets/image/website/ipo/".time().$_FILES['image']['name'][$i];
                if (!empty($_FILES['image']['name'][$i])) {
                    $path = "assets/image/website/ipo/" . time() . $_FILES['image']['name'][$i];
                    copy($_FILES['image']['tmp_name'][$i], $path);
                    if ($i == 0) {
                        $answer["image"]                     =  time() . $_FILES['image']['name'][$i];
                    }
                    if ($i == 1) {
                        $answer["pdf"]                     =  time() . $_FILES['image']['name'][$i];
                    }
                }
            }
            $newdata   = array(
                'update' => "success",
                "message" => "IPO Uploaded!"
            );
            $this->session->set_userdata($newdata);
            $this->M_table->createTable('ipo_company', $answer);
            redirect('Employee/websiteMe/ipo');
        } else {
            redirect('Employee/websiteMe/ipo');
        }
    }
    public function delIpo()
    {
        $id  = $this->uri->rsegment(3);
        $this->validateId('ipo_company', $id);
        $id  = $this->session->userdata('id');
        $data['user']            = $this->M_employee->getEmployee($id);
        if ($data['user']['position'] == "Investment") {

            $id  = $this->uri->rsegment(3);
            $upload    = $this->M_table->getById("ipo_company", $id);
            if (file_exists("assets/image/website/ipo/" . $upload["image"]) && $upload["image"]) {
                unlink("assets/image/website/ipo/" . $upload["image"]);
            }
            if (file_exists("assets/image/website/ipo/pdf/" . $upload["pdf"]) && $upload["pdf"]) {
                unlink("assets/image/website/ipo/pdf/" . $upload["pdf"]);
            }
            $newdata   = array(
                'update' => "success",
                "message" => "IPO " . $upload['name'] . " deleted!"
            );
            $this->session->set_userdata($newdata);
            $this->M_table->deleteTable("ipo_company", $id);
            redirect("Employee/websiteMe/ipo");
        }

        $this->M_table->deleteTable("ipo_company", $id);
        redirect("Employee/websiteMe/ipo");
    }
    public function updtIPO()
    {
        $id                            = $this->session->userdata('id');
        $data['user']            = $this->M_employee->getEmployee($id);
        if ($data['user']['position'] == "Investment") {
            $answer['name']                                 = $this->input->post('name');
            $answer['sector']                               = $this->input->post('sector');
            $answer['sub_sector']                           = $this->input->post('sub_sector');
            $answer['periode_book_building']                = $this->input->post('periode_book_building');
            $answer['rentang_harga_pokok_book_building']    = $this->input->post('rentang_harga_pokok_book_building');
            $answer['saham_ditawarkan']                     = $this->input->post('saham_ditawarkan');
            $answer['update_date']                          = $this->input->post('update_date');
            $id                         = $this->input->post('id');
            $upload = $this->M_table->getById('ipo_company', $id);
            if (!empty($_FILES['image']['name'])) {
                $path = "assets/image/website/ipo/" . time() . $_FILES['image']['name'];
                copy($_FILES['image']['tmp_name'], $path);
                $answer["image"]                     =  time() . $_FILES['image']['name'];
                if (file_exists('assets/image/website/ipo/' . $upload['image']) && $upload['image']) {
                    unlink('assets/image/website/ipo/' . $upload['image']);
                }
            }
            if (!empty($_FILES['pdf']['name'])) {
                $path = "assets/image/website/ipo/pdf/" . time() . $_FILES['pdf']['name'];
                copy($_FILES['pdf']['tmp_name'], $path);
                $answer["pdf"]                     =  time() . $_FILES['pdf']['name'];
                if (file_exists('assets/image/website/ipo/' . $upload['image']) && $upload['image']) {
                    unlink('assets/image/website/ipo/' . $upload['image']);
                }
            }
            $newdata   = array(
                'update' => "success",
                "message" => "IPO " . $upload['name'] . " Updated!"
            );
            $this->session->set_userdata($newdata);
            $this->M_table->updateTable('ipo_company', $answer, array('id' => $id));
            redirect('Employee/websiteMe/ipo');
        }
    }
}
