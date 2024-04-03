<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
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
    public function getYearAndMonth($date)
    {
        if ($date) {
            [$year, $month] = explode('-', $date);
            return ['year' => $year, 'month' => $month];
        } else {
            return false;
        }
    }
    function validate_input($input)
    {
        if (empty($input)) {
            return false;
        }
        $input = str_replace(['<', '>', '\'', '"', ';', '(', ')'], '', $input);
        $input = htmlspecialchars($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        return $input;
    }

    public function index()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['news'] = $this->M_table->getAll('news order by create_date desc');
        $data['serv'] = $this->M_table->getServRecommendation($id);
        if ($this->session->userdata('from') == 2) {
            $this->load->view('clientAHR/v_dashboard', $data);
        } else {
            $this->load->view('client/v_dashboard', $data);
        }
    }

    public function financial_dashboard()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['list_year'] = $this->M_finance->getListYear($id);
        $data['list_month'] = $this->M_finance->getListYearForMonth($id);
        if (isset($_GET['show']) && isset($_GET['type']) && isset($_GET['date'])) {
            if ($_GET['show'] == md5('5g7d8fyyes5g7d8fy')) {
                if ($_GET['type'] == 'month' || $_GET['type'] == 'year') {
                    if (preg_match('/^\d{4}$/', $_GET['date'])) {
                        echo 'Tahunan <br>';
                    } elseif (preg_match('/^\d{4}-\d{2}$/', $_GET['date'])) {
                        $this->load->view('client/finance_preview/month/index', $data);
                    } else {
                        echo 'ERROR FORMAT DATE';
                    }
                } else {
                    echo 'ERROR CHANGE TYPE';
                }
            } else {
                echo 'ERROR SHOW TOKEN';
            }
        } else {
            if ($this->session->userdata('from') == 2) {
                $this->load->view('clientAHR/v_financial_dashboard', $data);
            } else { 
                $this->load->view('client/v_financial_dashboard', $data);
            }
        }
    }
    public function health_analytic()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['list_year'] = $this->M_finance->getListYear($id);
        $data['list_month'] = $this->M_finance->getListYearForMonth($id);
        if (isset($_GET['show']) && isset($_GET['type']) && isset($_GET['date'])) {
            if ($_GET['show'] == md5('5g7d8fyyes5g7d8fy')) {
                if ($_GET['type'] == 'month' || $_GET['type'] == 'year') {
                    if (preg_match('/^\d{4}$/', $_GET['date'])) {
                        echo 'Tahunan <br>';
                    } elseif (preg_match('/^\d{4}-\d{2}$/', $_GET['date'])) {
                        $this->load->view('client/finance_preview/month/index', $data);
                    } else {
                        echo 'ERROR FORMAT DATE';
                    }
                } else {
                    echo 'ERROR CHANGE TYPE';
                }
            } else {
                echo 'ERROR SHOW TOKEN';
            }
        } else {
            if ($this->session->userdata('from') == 2) {
                $this->load->view('clientAHR/v_health_analytic', $data);
            } else { 
                $this->load->view('client/v_health_analytic', $data);
            }
        }
    }

    // ==================== PROFILE ====================

    public function profile()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['dataUser'] = $this->M_user->profile($id);
        $data['country'] = $this->M_table->getAll('country');
        $data['total_login'] = count($this->M_user->getLogin($id));

        if ($this->session->userdata('from') == 2) {
            $this->load->view('clientAHR/v_profile', $data);
        } else {
            $this->load->view('client/v_profile', $data);
        }
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
    public function updateProfile()
    {
        $id = $this->session->userdata('id');
        $data['name'] = addslashes($this->input->post('name'));
        $data['phone'] = addslashes($this->input->post('phone'));
        $data['address'] = addslashes($this->input->post('address'));
        $data['NPWP'] = addslashes($this->input->post('NPWP'));
        $data['NIK'] = addslashes($this->input->post('NIK'));
        $data['position'] = addslashes($this->input->post('position'));
        $data['nationality'] = addslashes($this->input->post('nationality'));

        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_client();
            $upload = $this->M_table->getById('user', $id);
            if (file_exists('assets/upload/images/client/' . $upload['image']) && $upload['image']) {
                unlink('assets/upload/images/client/' . $upload['image']);
            }
            $data['image'] = $image;
        }
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->updateTable('user', $data, ['id' => $id]);

        redirect('Client/profile');
    }

    // ==================== FEEDBACK ====================

    public function feedback_home()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['dataOrder'] = $this->M_table->getForListOrder($id);

        if ($this->session->userdata('from') == 2) {
            return $this->load->view('clientAHR/v_feedback_home', $data);
        } else {
            return $this->load->view('client/v_feedback_home', $data);
        }
    }
    public function for_me()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['serv'] = $this->M_table->getServRecommendation($id);
        $data['komentar'] = $this->M_table->dataTableWhere('tabel_komentar_financial_dashboard', 'user_id', $id . ' order by updated_at DESC');
        $this->load->view('client/v_for_me', $data);
    }
    public function feedback()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);

        if (isset($_GET['detail'])) {
            $param = $_GET['detail'];
            if (!preg_match('/^[a-zA-Z0-9]+$/', $param)) {
                echo 'Invalid parameter value!';
                exit();
            }
            if (empty($this->M_table->getDetailForListOrder($id, $param))) {
                return $this->load->view('client/v_feedback_error', $data);
            }
            $id_order = $this->M_table->getDetailForListOrder($id, $param)['id'];
            $data['selectedService'] = $this->M_table->getDetailForListOrder($id, $param);

            if ($data['selectedService']['service_name'] == 'Monthly Accounting and Tax Compliance') {
                $input = $_GET['date'];
                $bulan = date('Y-m', strtotime($input));
                if ($input !== $bulan) {
                    echo 'Format bulan tidak valid';
                    die();
                } else {
                    $bulan2 = $this->getYearAndMonth($bulan);
                }
                $data['dataOrder'] = $this->M_finance->getOrderByMonth($id_order, $bulan2);
                if (empty($data['dataOrder'])) {
                    return $this->load->view('client/v_feedback_error', $data);
                }
                $id_order = $data['dataOrder']['id'];
                $data['date'] = $bulan;
            }
            $data['dataOrder'] = $this->M_table->dataOrder2($id_order);
            $data['idOrder'] = $id_order;
            $data['selected'] = $this->M_table->getOrder($id_order);
            $data['report'] = $this->M_table->getReport($id_order);
            if ($this->session->userdata('from') == 2) {
                return $this->load->view('clientAHR/v_feedback', $data);
            } else {
                return $this->load->view('client/v_feedback', $data);
            }
        } else {
            redirect('Client/report_home');
        }

        if ($order_id == '') {
            $order_id = $this->uri->rsegment(3);
        }
        if ($order_id == '' && $this->uri->rsegment(3) == '') {
            $order_id = $this->M_table->orderId($id);
            if (empty($order_id)) {
                $data['validate2'] = 'false';
                if ($this->session->userdata('from') == 2) {
                    return $this->load->view('clientAHR/v_feedback', $data);
                } else {
                    return $this->load->view('client/v_feedback', $data);
                }
            } else {
                $order_id = $order_id[0]['id'];
            }
        }

        $data['selected'] = $this->M_table->getOrder($order_id);
        $data['criteria'] = $this->M_user->getCriteria('criteria');
        $data['dataOrder'] = $this->M_table->dataOrder2($id);
        $data['staff'] = $this->M_table->getDataStaff($order_id);
        $data['staff2'] = $this->M_user->getStaffFromFeedback($order_id);
        $data['validate'] = $this->M_table->totalDataTableWhere('feedback', 'order_id', $order_id . ' AND categoryFeedback_id = 2');
        $data['dataFeedbackC'] = $this->M_user->companyFeedback($order_id);
        $data['dataFeedback'] = $this->M_user->dataFeedback($id, $order_id);

        if ($this->session->userdata('from') == 2) {
            $this->load->view('clientAHR/v_feedback', $data);
        } else {
            $this->load->view('client/v_feedback', $data);
        }
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
            $this->M_table->createTable('feedback_criteria', $forCriteria);
        }
        $data['user_id'] = $this->session->userdata('id');
        $data['feedback'] = addslashes($this->input->post('feedback'));
        $data['star'] = array_sum($rat) / count($bantu);
        $data['employee_id'] = addslashes($this->input->post('employee_id'));
        $data['categoryFeedback_id'] = addslashes($this->input->post('categoryFeedback_id'));
        $data['order_id'] = addslashes($this->input->post('order_id'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['create_date'] = date('Y-m-d H:i:s');
        $this->M_table->createTable('feedback', $data);
        redirect('Client/feedback/' . $data['order_id']);
    }
    public function processCreateFeedbackC()
    {
        $data['user_id'] = $this->session->userdata('id');
        $data['order_id'] = addslashes($this->input->post('order_id'));
        $data['star'] = addslashes($this->input->post('rating'));
        $data['feedback'] = addslashes($this->input->post('feedback'));
        $data['categoryFeedback_id'] = addslashes($this->input->post('categoryFeedback_id'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $data['create_date'] = date('Y-m-d H:i:s');
        // print_r($data);
        // exit();
        $this->M_table->createTable('feedback', $data);
        redirect('Client/feedback/' . $data['order_id']);
    }
    public function detailFeedback()
    {
        $feedback_id = $this->uri->rsegment(3);
        $data['user'] = $this->M_user->profile($this->session->userdata('id'));
        if ($feedback_id == '') {
            redirect('Client/lock');
        } else {
            if (is_numeric($feedback_id)) {
                if ($this->M_table->totalByCon('feedback', 'id', $feedback_id) == 0) {
                    redirect('Client/lock');
                } else {
                    $data['validate'] = true;
                    $data['dataFeedback'] = $this->M_user->detailFeedback($feedback_id);
                    $data['dataFeedback2'] = $this->M_employee->getFeedback($data['dataFeedback']['order_id'], $data['dataFeedback']['employee_id']);
                    $data['dataCriteria'] = $this->M_employee->getCriteria($data['dataFeedback']['order_id'], $data['dataFeedback']['employee_id']);
                }
                if ($this->session->userdata('from') == 2) {
                    $this->load->view('clientAHR/v_detailFeedback', $data);
                } else {
                    $this->load->view('client/v_detailFeedback', $data);
                }
            } else {
                redirect('Client/lock');
            }
        }
    }

    // ============ PASSWORD ============

    public function updatePassword()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        if ($this->session->userdata('from') == 2) {
            $this->load->view('clientAHR/v_updatePassword', $data);
        } else {
            $this->load->view('client/v_updatePassword', $data);
        }
    }
    public function processUpdatePassword()
    {
        $data['password'] = md5($this->input->post('password'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->M_table->updateTable('user', $data, ['id' => $this->session->userdata('id')]);
        redirect('Client/profile');
    }

    // ============ TYPE OF DATA ============

    // public function typeOfData()
    // {
    // 	$data2                    = $this->M_table->getByCon('order','user_id',$this->session->userdata('id'));
    // 	$order_id                 = $this->input->post('id_order');
    // 	$id                       = $this->session->userdata('id');
    //     $data['user']       	  = $this->M_user->profile($id);
    // 	$data['dataOrder']        = $this->M_table->dataOrder2($id);

    // 	if ($order_id == "") {
    // 		$order_id                = $this->M_table->orderId($id);
    // 		if (empty($order_id)) {
    // 		}
    // 		else{
    // 		$data['selected']        = $order_id[0];
    // 		}
    // 	}
    // 	else{
    // 		$data['selected']     = $this->M_table->getOrder($order_id);
    // 	}
    // 	if (empty($data2)) {
    // 		if ($this->session->userdata('from') == 2) {
    // 			$this->load->view('clientAHR/v_typeOfData',$data);
    // 		} else{
    // 			$this->load->view('client/v_typeOfData',$data);
    // 		}
    // 	}
    // 	else{
    // 		$id                       = $data2['service_id'];

    // 		$data['dataOrder2']   = $this->M_table->getDataOrder($data['selected']['id']);
    // 		$data['dataStaff']   = $this->M_table->getDataStaff($data['selected']['id']);
    // 		$data['step']       	  = $this->M_table->getFlow($data['selected']['id']);
    // 		$data['substep']       	  = $this->M_table->getSubFlow($data['selected']['id']);
    // 		$data["person"]             = $this->M_user->person($data['selected']['id']);
    // 		$data["pic"]    			   = $this->M_table->dataTableWhere('person_in_charge','order_id',$data['selected']['id']);
    // 		if ($this->session->userdata('from') == 2) {
    // 			$this->load->view('clientAHR/v_typeOfData',$data);
    // 		} else{
    // 			$this->load->view('client/v_typeOfData',$data);
    // 		}
    // 	}
    // }
    public function general_information()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        if (isset($_GET['detail'])) {
            $param = $_GET['detail'];
            if (!preg_match('/^[a-zA-Z0-9]+$/', $param)) {
                echo 'Invalid parameter value!';
                exit();
            }
            $order = $this->M_table->getDetailForListOrder($id, $param);
            $data['dataOrder'] = $this->M_table->getOrder($order['id']);
            $data['dataOrder2'] = $this->M_table->getDataOrder($order['id']);
            $data['dataStaff'] = $this->M_table->getDataStaff($order['id']);
            $data['step'] = $this->M_table->getFlow($order['id']);
            $data['substep'] = $this->M_table->getSubFlow($order['id']);
            $data['person'] = $this->M_user->person($order['id']);
            $data['pic'] = $this->M_table->dataTableWhere('person_in_charge', 'order_id', $order['id']);

            if ($this->session->userdata('from') == 2) {
                // $this->load->view('clientAHR/v_typeOfData',$data);
            } else {
                if ($data['dataOrder']['service_name'] == 'Monthly Accounting and Tax Compliance') {
                    $input = $_GET['date'];
                    $bulan = date('Y-m', strtotime($input));
                    if ($input !== $bulan) {
                        echo 'Format bulan tidak valid';
                        die();
                    } else {
                        $bulan2 = $this->getYearAndMonth($bulan);
                    }
                    $data['dataOrder'] = $this->M_finance->getOrderByMonth($order['id'], $bulan2);
                    $data['date'] = $bulan;
                    $data['dataOrder2'] = $this->M_finance->getDataOrderByMonth($order['id'], $bulan2);
                    // // print_r($month);
                    // die;
                    return $this->load->view('client/v_detail_general_information_monthly', $data);
                }
                $this->load->view('client/v_detail_general_information', $data);
            }
        } else {
            $data['dataOrder'] = $this->M_table->getForListOrder($id);
            if ($this->session->userdata('from') == 2) {
                // $this->load->view('clientAHR/v_typeOfData',$data);
            } else {
                $this->load->view('client/v_general_information', $data);
            }
        }
    }
    public function desc()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $employee_id = $this->input->post('employee_id');
        $data['data_employee'] = $this->M_employee->getEmployee($employee_id);
        $data['resume'] = $this->M_employee->getResume($employee_id);
        $data['sub_resume'] = $this->M_employee->getSubResume($employee_id);
        $data['sr'] = $this->M_table->getAll('sub_resume');
        $data['scr'] = $this->M_table->getAll('sub_category_resume');
        if ($this->session->userdata('from') == 2) {
            $this->load->view('clientAHR/v_desc', $data);
        } else {
            $this->load->view('client/v_desc', $data);
        }
    }

    // ============ OUR SERVICES ============

    public function ourServices()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['dataProject'] = $this->M_table->getAll('services');
        $data['youServices'] = [];
        foreach ($this->M_table->dataTableWhere('order', 'user_id', $id) as $row) {
            array_push($data['youServices'], $row['service_id']);
        }
        if ($this->session->userdata('from') == 2) {
            $this->load->view('clientAHR/v_ourServices', $data);
        } else {
            $this->load->view('client/v_ourServices', $data);
        }
    }

    // ============ JOB TRACK ============
    public function jobTrack_home()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);

        $data['dataOrder'] = $this->M_table->getForListOrder($id);

        if ($this->session->userdata('from') == 2) {
            return $this->load->view('clientAHR/v_jobTrack_home', $data);
        } else {
            return $this->load->view('client/v_jobTrack_home', $data);
        }
    }
    public function jobTrack()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        if (isset($_GET['detail'])) {
            $param = $_GET['detail'];
            if (!preg_match('/^[a-zA-Z0-9]+$/', $param)) {
                echo 'Invalid parameter value!';
                exit();
            }
            $id_order = $this->M_table->getDetailForListOrder($id, $param)['id'];
            $data['selectedService'] = $this->M_table->getDetailForListOrder($id, $param); //service now

            if ($data['selectedService']['service_name'] == 'Monthly Accounting and Tax Compliance') {
                $input = $_GET['date'];
                $bulan = date('Y-m', strtotime($input));
                if ($input !== $bulan) {
                    echo 'Format bulan tidak valid';
                    die();
                } else {
                    $bulan2 = $this->getYearAndMonth($bulan);
                }
                $data['dataOrder'] = $this->M_finance->getOrderByMonth($id_order, $bulan2);
                if (empty($data['dataOrder'])) {
                    return $this->load->view('client/v_jobtrack_error', $data);
                }
                $id_order = $data['dataOrder']['id'];
                $data['date'] = $bulan;
            }
            $data['idOrder'] = $id_order; //id order
            // $data['dataOrder']         = $this->M_table->dataOrder($id);
            // $data['dataOrder2']         = $this->M_table->dataOrder2($id);
            // $data['dataOrder3']         = $this->M_table->dataOrder3($id);
            $data['letter'] = $this->M_table->letter($id_order);
            $data['dataProcess'] = $this->M_table->getProcess($id_order);
            $data['conOutput'] = false;
            $data['review'] = $this->M_table->getReview($id_order);
            $data['report'] = $this->M_table->getReport($id_order);

            $data['dataMeeting'] = $this->M_table->getAllMeeting($id_order);

            $data['step'] = $this->M_table->getFlow($id_order);
            $data['substep'] = $this->M_table->getSubFlow($id_order);

            // percentage input
            $total = count($data['letter']);
            $done = count($this->M_table->percenLetter($id_order, 'done'));
            $data['percentinput'] = 0;
            $data['percentInputNow'] = 0;
            if ($total != 0 || $done != 0) {
                $data['percentinput'] = round((20 / $total) * $done, 1);
                $data['percentInputNow'] = round(($done / $total) * 100, 0);
            }

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
            $data['percentoutput'] = 0;
            if ($total != '' || $done != '') {
                $data['percentoutput'] = 20 / $total;
                $data['percentoutput'] = round($data['percentoutput'] * $outputDone, 1);
            }
            $data['conOutput'] = true;

            // percentage all
            $data['percentall'] = $data['percentinput'] + $data['percentprocess'] + $data['percentoutput'];

            $data['chatt'] = $this->M_table->chatt($id_order);
            if ($this->session->userdata('from') == 2) {
                return $this->load->view('clientAHR/v_jobTrack', $data);
            } else {
                return $this->load->view('client/v_jobTrack', $data);
            }
        }
    }
    public function addChatt()
    {
        $serviceNow = $this->uri->rsegment(4);
        $data['user_id'] = $this->session->userdata('id');
        $data['order_id'] = str_replace("'", '', $this->uri->rsegment(3));
        $order_id = str_replace("'", '', $this->uri->rsegment(3));
        $data['chatt'] = str_replace("'", '', $this->input->post('chatt'));
        $data['create_date'] = date('Y-m-d H:i:s');
        $this->M_table->createTable('chatt', $data);
        redirect('Client/jobTrack/' . $order_id . '/' . $serviceNow);
    }
    public function updateMeeting()
    {
        $id = str_replace("'", '', $this->input->post('id'));
        $data['via'] = str_replace("'", '', $this->input->post('via'));
        $data['link'] = str_replace("'", '', $this->input->post('link'));
        $data['update_date'] = date('Y-m-d H:i:s');
        $order_id = str_replace("'", '', $this->input->post('order_id'));
        $data['date'] = str_replace("'", '', $this->input->post('date')) . ' ' . str_replace("'", '', $this->input->post('time'));
        $this->M_table->updateTable('meeting', $data, ['id' => $id]);
        redirect('Client/jobtrack/' . $order_id);
    }
    public function updateReview()
    {
        $id = str_replace("'", '', $this->input->post('report_id'));
        $data['message'] = str_replace("'", '', $this->input->post('message'));
        $this->M_table->updateTable('report_review', $data, ['report_id' => $id]);
        redirect('Client/detailReport/' . $id);
    }

    // ============ REPORT ============

    public function report_home()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['dataOrder'] = $this->M_table->getForListOrder($id);

        if ($this->session->userdata('from') == 2) {
            return $this->load->view('clientAHR/v_report_home', $data);
        } else {
            return $this->load->view('client/v_report_home', $data);
        }
    }
    public function report()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        if (isset($_GET['detail'])) {
            $param = $_GET['detail'];
            if (!preg_match('/^[a-zA-Z0-9]+$/', $param)) {
                echo 'Invalid parameter value!';
                exit();
            }
            if (empty($this->M_table->getDetailForListOrder($id, $param))) {
                return $this->load->view('client/v_report_error', $data);
            }
            $id_order = $this->M_table->getDetailForListOrder($id, $param)['id'];
            $data['selectedService'] = $this->M_table->getDetailForListOrder($id, $param);

            if ($data['selectedService']['service_name'] == 'Monthly Accounting and Tax Compliance') {
                $input = $_GET['date'];
                $bulan = date('Y-m', strtotime($input));
                if ($input !== $bulan) {
                    echo 'Format bulan tidak valid';
                    die();
                } else {
                    $bulan2 = $this->getYearAndMonth($bulan);
                }
                $data['dataOrder'] = $this->M_finance->getOrderByMonth($id_order, $bulan2);
                if (empty($data['dataOrder'])) {
                    return $this->load->view('client/v_report_error', $data);
                }
                $id_order = $data['dataOrder']['id'];
                $data['date'] = $bulan;
            }
            $data['dataOrder'] = $this->M_table->dataOrder2($id_order);
            $data['idOrder'] = $id_order;
            $data['selected'] = $this->M_table->getOrder($id_order);
            $data['report'] = $this->M_table->getReport($id_order);
            if ($this->session->userdata('from') == 2) {
                return $this->load->view('clientAHR/v_report', $data);
            } else {
                return $this->load->view('client/v_report', $data);
            }
        } else {
            redirect('Client/report_home');
        }
    }
    public function detailReport()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);

        $report_id = $this->uri->rsegment(3);
        if ($report_id == '') {
            redirect('Client/lock');
        } else {
            if (is_numeric($report_id)) {
                if ($this->M_table->totalByCon('process_report', 'id', $report_id) == 0) {
                    redirect('Client/lock');
                } else {
                    $data['validate'] = true;
                    $data['dataReport'] = $this->M_table->detailReport($report_id);
                    $data['review'] = $this->M_user->getReview($report_id);
                }
                if ($this->session->userdata('from') == 2) {
                    return $this->load->view('clientAHR/v_detailReport', $data);
                } else {
                    return $this->load->view('client/v_detailReport', $data);
                }
            } else {
                redirect('Client/lock');
            }
        }
    }
    public function approveReport()
    {
        $review_id = $this->uri->rsegment(3);
        if ($review_id == '' || $this->uri->rsegment(4) == '') {
            redirect('Client/lock');
        } else {
            if (is_numeric($review_id) || is_numeric($this->uri->rsegment(4))) {
                if ($this->M_table->totalByCon('report_review', 'id', $review_id) == 0) {
                    redirect('Client/lock');
                }
                if ($this->M_table->getById('report_review', $review_id)['review_status'] == 'do') {
                    $data['review_status'] = 'done';
                } else {
                    $data['review_status'] = 'do';
                }
                $this->M_table->updateTable('report_review', $data, ['id' => $review_id]);
                redirect('Client/report?detail=' . md5($this->uri->rsegment(4)));
            } else {
                redirect('Client/lock');
            }
        }
    }

    // ================== News ====================

    public function deN()
    {
        $news_id = $this->uri->rsegment(3);
        $data['user'] = $this->M_user->profile($this->session->userdata('id'));
        if ($news_id == '') {
            redirect('Client/lock');
        } else {
            if (is_numeric($news_id)) {
                if ($this->M_table->totalByCon('news', 'id', $news_id) == 0) {
                    redirect('Client/lock');
                } else {
                    $data['dataNews'] = $this->M_table->getById('news', $news_id);
                }
                if ($this->session->userdata('from') == 2) {
                    return $this->load->view('clientAHR/v_detailNews', $data);
                } else {
                    return $this->load->view('client/v_detailNews', $data);
                }
            } else {
                redirect('Client/lock');
            }
        }
    }
    public function daN()
    {
        $data['user'] = $this->M_user->profile($this->session->userdata('id'));
        $data['news'] = $this->M_table->getAll('news order by create_date desc');
        if ($this->session->userdata('from') == 2) {
            return $this->load->view('clientAHR/v_allNews', $data);
        } else {
            return $this->load->view('client/v_allNews', $data);
        }
    }

    public function deR()
    {
        $r_id = $this->uri->rsegment(3);
        $data['user'] = $this->M_user->profile($this->session->userdata('id'));
        if ($r_id == '') {
            redirect('Client/lock');
        } else {
            if (is_numeric($r_id)) {
                $data['sr'] = $this->M_table->getServRecommendationById($this->session->userdata('id'), $r_id);
                if ($this->session->userdata('from') == 2) {
                    return $this->load->view('clientAHR/v_detailServ', $data);
                } else {
                    return $this->load->view('client/v_detailServ', $data);
                }
            } else {
                redirect('Client/lock');
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

    // ================== WHATSNEW ====================

    public function whatsNew()
    {
        $data['user'] = $this->M_user->profile($this->session->userdata('id'));
        if ($this->session->userdata('from') == 2) {
            $this->load->view('clientAHR/v_whatsNew', $data);
        } else {
            $this->load->view('client/v_whatsNew', $data);
        }
    }

    // ================= CONTRACT =====================

    public function contract()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['dataOrder'] = $this->M_table->getForListOrder($id);
        if ($this->session->userdata('from') == 2) {
            $this->load->view('clientAHR/v_contract', $data);
        } else {
            $this->load->view('client/v_contract', $data);
        }
    }
    public function detailContract()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);

        if (isset($_GET['detail'])) {
            $param = $_GET['detail'];
            if (!preg_match('/^[a-zA-Z0-9]+$/', $param)) {
                echo 'Invalid parameter value!';
                exit();
            }
            if (empty($this->M_table->getDetailForListOrder($id, $param))) {
                return $this->load->view('client/v_detailContract_error', $data);
            }
            $id_order = $this->M_table->getDetailForListOrder($id, $param)['id'];
            $data['selectedService'] = $this->M_table->getDetailForListOrder($id, $param);

            if ($data['selectedService']['service_name'] == 'Monthly Accounting and Tax Compliance') {
                if (isset($_GET['date'])) {
                    $input = $_GET['date'];
                    $bulan = date('Y-m', strtotime($input));
                    if ($input !== $bulan) {
                        echo 'Format bulan tidak valid';
                        die();
                    } else {
                        $bulan2 = $this->getYearAndMonth($bulan);
                    }
                    $data['dataOrder'] = $this->M_finance->getOrderByMonth($id_order, $bulan2);
                    if (empty($data['dataOrder'])) {
                        return $this->load->view('client/v_detailContract_error', $data);
                    }
                    $id_order = $data['dataOrder']['id'];
                    $data['date'] = $bulan;
                } else {
                    redirect('Client/contract');
                }
            }

            $data['dataContract'] = $this->M_administrasi->getContract($id_order);
            $data['order_id'] = $id_order;
            if ($this->session->userdata('from') == 2) {
                return $this->load->view('clientAHR/v_detailContract', $data);
            } else {
                return $this->load->view('client/v_detailContract', $data);
            }
        } else {
            redirect('Client/contract');
        }
    }
    public function receiveFile()
    {
        $contract_id = str_replace("'", '', $this->uri->rsegment(3));
        if ($contract_id == '') {
            redirect('Client/Lock');
        } else {
            if (is_numeric($contract_id)) {
                if ($this->M_table->totalByCon('employment_contract', 'id', $contract_id) == 0) {
                    redirect('Client/Lock');
                }
                if ($this->M_table->getById('employment_contract', $contract_id)['receive_hardfile'] == 'no') {
                    $data['receive_hardfile'] = 'yes';
                    $data['receive_date'] = date('Y-m-d H:i:s');
                } else {
                    $data['receive_hardfile'] = 'no';
                    $data['receive_date'] = null;
                }
                $this->M_table->updateTable('employment_contract', $data, ['id' => $contract_id]);
                redirect('Client/detailContract?detail=' . md5($this->M_table->getById('employment_contract', $contract_id)['order_id']));
            } else {
                redirect('Client/lock');
            }
        }
    }
    public function turnFix()
    {
        $contract_id = str_replace("'", '', $this->uri->rsegment(3));
        if ($contract_id == '') {
            redirect('Client/Lock');
        } else {
            if (is_numeric($contract_id)) {
                if ($this->M_table->totalByCon('employment_contract', 'id', $contract_id) == 0) {
                    redirect('Client/Lock');
                }
                if ($this->M_table->getById('employment_contract', $contract_id)['status'] == 'do') {
                    $data['status'] = 'done';
                } else {
                    $data['status'] = 'do';
                }
                $this->M_table->updateTable('employment_contract', $data, ['id' => $contract_id]);
                redirect('Client/detailContract?detail=' . md5($this->M_table->getById('employment_contract', $contract_id)['order_id']));
            } else {
                redirect('Client/lock');
            }
        }
    }
    public function _do_upload_contract()
    {
        $image_name = time() . '-' . $_FILES['image']['name'];
        $config['upload_path'] = 'assets/upload/doc/';
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
    public function processCreateContract()
    {
        $data = [
            'message' => str_replace("'", '', $this->input->post('message')),
            'filename' => str_replace("'", '', $this->input->post('filename')),
            'from' => 'client',
            'order_id' => str_replace("'", '', $this->input->post('order_id')),
        ];
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_contract();
            $data['softfile'] = $image;
        }
        $this->M_table->createTable('employment_contract', $data);
        redirect('Client/detailContract/' . str_replace("'", '', $this->input->post('order_id')));
    }
    public function updateStatusFile()
    {
        $contract_id = str_replace("'", '', $this->uri->rsegment(3));
        if ($contract_id == '') {
            redirect('Client/Lock');
        } else {
            if (is_numeric($contract_id)) {
                if ($this->M_table->totalByCon('employment_contract', 'id', $contract_id) == 0) {
                    redirect('Client/Lock');
                }
                if ($this->M_table->getById('employment_contract', $contract_id)['sent_hardfile'] == 'no') {
                    $data['sent_hardfile'] = 'yes';
                    $data['sent_date'] = date('Y-m-d H:i:s');
                } else {
                    $data['sent_hardfile'] = 'no';
                    $data['sent_date'] = null;
                }
                $this->M_table->updateTable('employment_contract', $data, ['id' => $contract_id]);
                redirect('Client/detailContract?detail=' . md5($this->M_table->getById('employment_contract', $contract_id)['order_id']));
            } else {
                redirect('Client/lock');
            }
        }
    }
    public function deleteFile()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $data = $this->M_table->getById('employment_contract', $id);
        if (file_exists('assets/upload/doc/' . $data['softfile']) && $data['softfile']) {
            unlink('assets/upload/doc/' . $data['softfile']);
        }
        $this->M_table->deleteTable('employment_contract', $id);
        redirect('Client/detailContract/' . str_replace("'", '', $this->uri->rsegment(4)));
        # code...
    }
    public function deleteFileOnly()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $data = $this->M_table->getById('employment_contract', $id);
        if (file_exists('assets/upload/doc/' . $data['softfile']) && $data['softfile']) {
            unlink('assets/upload/doc/' . $data['softfile']);
        }
        $data['softfile'] = '';
        $this->M_table->updateTable('employment_contract', $data, ['id' => $id]);
        redirect('Client/detailContract/' . str_replace("'", '', $this->uri->rsegment(4)));
    }
    // =========== INVOICE ============

    public function invoice()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);

        $data['dataOrder'] = $this->M_table->getForListOrder($id);

        if ($this->session->userdata('from') == 2) {
            $this->load->view('clientAHR/v_invoice', $data);
        } else {
            $this->load->view('client/v_invoice', $data);
        }
    }
    public function detailInvoice()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);

        if (isset($_GET['detail'])) {
            $param = $_GET['detail'];
            if (!preg_match('/^[a-zA-Z0-9]+$/', $param)) {
                echo 'Invalid parameter value!';
                exit();
            }
            if (empty($this->M_table->getDetailForListOrder($id, $param))) {
                return $this->load->view('client/v_detailInvoice_error', $data);
            }
            $id_order = $this->M_table->getDetailForListOrder($id, $param)['id'];
            $data['selectedService'] = $this->M_table->getDetailForListOrder($id, $param);

            if ($data['selectedService']['service_name'] == 'Monthly Accounting and Tax Compliance') {
                if (isset($_GET['date'])) {
                    $input = $_GET['date'];
                    $bulan = date('Y-m', strtotime($input));
                    if ($input !== $bulan) {
                        echo 'Format bulan tidak valid';
                        die();
                    } else {
                        $bulan2 = $this->getYearAndMonth($bulan);
                    }
                    $data['dataOrder'] = $this->M_finance->getOrderByMonth($id_order, $bulan2);
                    if (empty($data['dataOrder'])) {
                        return $this->load->view('client/v_detailInvoice_error', $data);
                    }
                    $id_order = $data['dataOrder']['id'];
                    $data['date'] = $bulan;
                } else {
                    redirect('Client/contract');
                }
            }

            $data['dataInvoice'] = $this->M_administrasi->getInvoice($id_order);
            $data['dataFile'] = $this->M_table->dataTableWhere('proof_of_payment', 'order_id', $id_order);
            $data['order_id'] = $id_order;
            if ($this->session->userdata('from') == 2) {
                return $this->load->view('clientAHR/v_detailInvoice', $data);
            } else {
                return $this->load->view('client/v_detailInvoice', $data);
            }
        } else {
            redirect('Client/contract');
        }
    }
    public function updateStatusInvoice()
    {
        $contract_id = str_replace("'", '', $this->uri->rsegment(3));
        if ($contract_id == '') {
            redirect('Client/Lock');
        } else {
            if (is_numeric($contract_id)) {
                if ($this->M_table->totalByCon('invoice', 'id', $contract_id) == 0) {
                    redirect('Client/Lock');
                }
                if ($this->M_table->getById('invoice', $contract_id)['receive_hardfile'] == 'no') {
                    $data['receive_hardfile'] = 'yes';
                    $data['receive_date'] = date('Y-m-d H:i:s');
                } else {
                    $data['receive_hardfile'] = 'no';
                    $data['receive_date'] = null;
                }
                $this->M_table->updateTable('invoice', $data, ['id' => $contract_id]);
                redirect('Client/detailInvoice?detail=' . md5($this->M_table->getById('invoice', $contract_id)['order_id']));
            } else {
                redirect('Client/lock');
            }
        }
    }

    public function update_tax_monthly()
    {
        $data['user_id'] = !empty($_POST['user_id']) ? $_POST['user_id'] : 0;
        $data['date'] = !empty($_POST['date']) ? $_POST['date'] : 0;
        if ($data['date'] == 0 || $data['user_id'] == 0) {
            redirect('Client/finances');
        }
        if ($this->M_table->totalByCon('tax_client_monthly', 'user_id', $data['user_id'] . " AND date = '" . $data['date'] . "'") == 0) {
            redirect('Client/finances');
        }
        echo $_POST['length_num'];
        die();
        for ($i = 1; $i <= 20; $i++) {
            $id = !empty($_POST['id_' . $i]) ? $_POST['id_' . $i] : '';
            $data['tanggal_bayar'] = !empty($_POST['tanggal_bayar_' . $i]) ? $_POST['tanggal_bayar_' . $i] : '';
            $data['tanggal_transaksi'] = !empty($_POST['tanggal_transaksi_' . $i]) ? $_POST['tanggal_transaksi_' . $i] : '';
            $data['status_pembayaran'] = '<i class="text-danger">belum dibayar</i>';
            $data['nominal_pembayaran'] = !empty($_POST['nominal_pembayaran_' . $i]) ? str_replace('.', '', $_POST['nominal_pembayaran_' . $i]) : '';
            $data['ntpn'] = !empty($_POST['ntpn_' . $i]) ? $_POST['ntpn_' . $i] : '';
            $data['batas_pembayaran'] = !empty($_POST['batas_pembayaran_' . $i]) ? $_POST['batas_pembayaran_' . $i] : '';
            $data['status_pelaporan'] = '<i class="text-danger">belum dilapor</i>';
            $data['tanggal_pelaporan'] = !empty($_POST['tanggal_pelaporan_' . $i]) ? $_POST['tanggal_pelaporan_' . $i] : '';
            $data['nominal_pelaporan'] = !empty($_POST['nominal_pelaporan_' . $i]) ? str_replace('.', '', $_POST['nominal_pelaporan_' . $i]) : '';
            $data['bpe'] = !empty($_POST['bpe_' . $i]) ? $_POST['bpe_' . $i] : '';
            $data['batas_pelaporan'] = !empty($_POST['batas_pelaporan_' . $i]) ? $_POST['batas_pelaporan_' . $i] : '';
            $text = htmlspecialchars(strip_tags($this->M_table->getById('jenis_pajak', $i)['jenis_pajak']));
            switch (trim($text)) {
                case 'PPh pasal 22 impor setor sendiri (dilunasi bersamaan dengan bea masuk, PPN, PPnBM)':
                    $data['batas_pembayaran'] = $data['tanggal_transaksi'];
                    break;
                case 'PPN danatau PPnBM pemungutan oleh Pejabat Penandatanganan Surat Perintah Membayar sebagai Pemungut PPN':
                    $data['batas_pembayaran'] = $data['tanggal_transaksi'];
                    break;
            }
            if ($data['tanggal_bayar'] != '') {
                $data['status_pembayaran'] = $this->getStatusPembayaran($data['tanggal_bayar'], $data['batas_pembayaran']);
            }
            if ($data['tanggal_pelaporan'] != '') {
                $data['status_pelaporan'] = $this->getStatusPelaporan($data['tanggal_pelaporan'], $data['batas_pelaporan']);
            }
            // print_r($data);
            // echo "<br>";
            // echo "<br>";
            // echo "<br>";
            $this->M_table->updateTable('tax_client_monthly', $data, ['id' => $id]);
        }
        // die;
        redirect('Client/finance_input?user_id=' . $data['user_id'] . '&&date=' . date('Y-m', strtotime($data['date'])));
    }
    public function deleteInvoiceOnly()
    {
        $id = str_replace("'", '', $this->uri->rsegment(3));
        $data = $this->M_table->getById('invoice', $id);
        if (file_exists('assets/upload/invoice/' . $data['softfile']) && $data['softfile']) {
            unlink('assets/upload/invoice/' . $data['softfile']);
        }
        $data['softfile'] = '';
        $this->M_table->updateTable('invoice', $data, ['id' => $id]);
        redirect('Client/detailInvoice?detail=' . md5(str_replace("'", '', $this->uri->rsegment(4))));
    }
    public function turnFixInvoice()
    {
        $invoice_id = str_replace("'", '', $this->uri->rsegment(3));
        if ($invoice_id == '') {
            redirect('Client/Lock');
        } else {
            if (is_numeric($invoice_id)) {
                if ($this->M_table->totalByCon('invoice', 'id', $invoice_id) == 0) {
                    redirect('Client/Lock');
                }
                if ($this->M_table->getById('invoice', $invoice_id)['status'] == 'do') {
                    $data['status'] = 'done';
                } else {
                    $data['status'] = 'do';
                }
                $this->M_table->updateTable('invoice', $data, ['id' => $invoice_id]);
                redirect('Client/detailInvoice?detail=' . md5($this->M_table->getById('invoice', $invoice_id)['order_id']));
            } else {
                redirect('Client/lock');
            }
        }
    }

    // =========== FILES ============

    public function file()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);
        $data['dataOrder'] = $this->M_table->getForListOrder($id);

        if ($this->session->userdata('from') == 2) {
            $this->load->view('clientAHR/v_file', $data);
        } else {
            $this->load->view('client/v_file', $data);
        }
    }
    public function detailFile()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->M_user->profile($id);

        if (isset($_GET['detail'])) {
            $param = $_GET['detail'];
            if (!preg_match('/^[a-zA-Z0-9]+$/', $param)) {
                echo 'Invalid parameter value!';
                exit();
            }
            if (empty($this->M_table->getDetailForListOrder($id, $param))) {
                return $this->load->view('client/v_detailFile_error', $data);
            }
            $id_order = $this->M_table->getDetailForListOrder($id, $param)['id'];
            $data['selectedService'] = $this->M_table->getDetailForListOrder($id, $param);

            if ($data['selectedService']['service_name'] == 'Monthly Accounting and Tax Compliance') {
                $input = $_GET['date'];
                $bulan = date('Y-m', strtotime($input));
                if ($input !== $bulan) {
                    echo 'Format bulan tidak valid';
                    die();
                } else {
                    $bulan2 = $this->getYearAndMonth($bulan);
                }
                $data['dataOrder'] = $this->M_finance->getOrderByMonth($id_order, $bulan2);
                if (empty($data['dataOrder'])) {
                    return $this->load->view('client/v_detailFile_error', $data);
                }
                $id_order = $data['dataOrder']['id'];
                $data['date'] = $bulan;
            }
            $data['dataFile'] = $this->M_administrasi->getFile($id_order);
            $data['order_id'] = $id_order;
            if ($this->session->userdata('from') == 2) {
                return $this->load->view('clientAHR/v_detailFile', $data);
            } else {
                return $this->load->view('client/v_detailFile', $data);
            }
        } else {
            redirect('Client/file');
        }
    }
    public function addFile()
    {
        $data = [
            'link' => str_replace("'", '', $this->input->post('link')),
            'description' => str_replace("'", '', $this->input->post('description')),
            'order_id' => str_replace("'", '', $this->input->post('order_id')),
            'filename' => str_replace("'", '', $this->input->post('filename')),
            'create_date' => date('Y-m-d H:i:s'),
            'update_date' => date('Y-m-d H:i:s'),
        ];
        $this->M_table->createTable('client_file', $data);
        redirect('Client/detailFile?detail=' . md5(str_replace("'", '', $this->input->post('order_id'))));
    }
    public function updateClientFile()
    {
        $data = [
            'link' => str_replace("'", '', $this->input->post('link')),
            'description' => str_replace("'", '', $this->input->post('description')),
            'filename' => str_replace("'", '', $this->input->post('filename')),
            'update_date' => date('Y-m-d H:i:s'),
        ];
        $this->M_table->updateTable('client_file', $data, ['id' => str_replace("'", '', $this->input->post('file_id'))]);
        redirect('Client/detailFile?detail=' . md5(str_replace("'", '', $this->input->post('order_id'))));
    }
    public function deleteClientFile()
    {
        $this->M_table->deleteTable('client_file', str_replace("'", '', $this->input->post('file_id')));
        redirect('Client/detailFile?detail=' . md5(str_replace("'", '', $this->input->post('order_id'))));
    }

    public function processCreatePayment()
    {
        $data = [
            'message' => str_replace("'", '', $this->input->post('message')),
            'filename' => str_replace("'", '', $this->input->post('filename')),
            'order_id' => str_replace("'", '', $this->input->post('order_id')),
            'create_date' => date('Y-m-d H:i:s'),
        ];
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload_contract();
            $data['softfile'] = $image;
        }
        $this->M_table->createTable('proof_of_payment', $data);
        redirect('Client/detailInvoice/' . str_replace("'", '', $this->input->post('order_id')));
    }
}
