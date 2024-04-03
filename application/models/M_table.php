<?php
class M_table extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function getAll($tabel)
    {
        return $this->db->query("SELECT * FROM $tabel")->result_array();
    }
    public function getById($tabel, $id)
    {
        return $this->db->query("SELECT * FROM `$tabel` where id = $id")->row_array();
    }
    public function getByCon($tabel, $where, $id)
    {
        return $this->db->query("SELECT * FROM `$tabel`  where $where = $id")->row_array();
    }
    public function getByCon2($select,$tabel, $where, $id)
    {
        return $this->db->query("SELECT $select FROM `$tabel`  where $where = $id")->row_array();
    }
    public function getColSortingLimit($select, $tabel, $sortby, $sortType, $limit)
    {
        return $this->db->query("SELECT $select FROM `$tabel` ORDER BY $sortby " . $sortType . " LIMIT $limit")->row_array();
    }
    public function totalByCon($tabel, $where, $id)
    {
        return $this->db->query("SELECT * FROM `$tabel`  where $where = $id")->num_rows();
    }
    public function dataTableWhere($tabel, $kondisi, $id)
    {
        return $this->db->query("SELECT * FROM `$tabel` where $kondisi = $id ")->result_array();
    }
    public function dataTableWhere2($tabel, $kondisi, $id,$add)
    {
        return $this->db->query("SELECT * FROM `$tabel` where $kondisi = $id '$add'")->result_array();
    }
    public function totalDataTableWhere($tabel, $kondisi, $id)
    { 
        return $this->db->query("SELECT * FROM `$tabel` where $kondisi = $id")->num_rows();
    }
    public function updateTable($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    public function updateTableCon($table, $data, $where)
    {
        return $this->db->query("UPDATE $table SET $data WHERE $where");
    }
    public function createTable($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function deleteTable($table, $id)
    {
        $this->db->delete($table, ["id" => $id]);
    }
    public function deleteTableCon($table, $con, $id)
    {
        $this->db->delete($table, [$con => $id]);
    }
    
    public function getTotalData($table)
    {
        return $this->db->query("SELECT * FROM $table")->num_rows();
    }
    public function delete3Param($table,$where,$id,$add)
    {
        return $this->db->query("DELETE FROM $table WHERE $where = $id '$add'");
    }
    public function totalLogin()
    {
        return $this->db->query("SELECT * FROM history_login hl INNER JOIN user u ON u.id = hl.user_id WHERE u.status_id = 1")->num_rows();
    }
    public function totalLoginA()
    {
        return $this->db->query("SELECT * FROM history_login hl INNER JOIN user u ON u.id = hl.user_id WHERE u.status_id = 2")->num_rows();
    }
    public function activityClient()
    {
        return $this->db->query("SELECT * FROM history_action_client hac INNER JOIN user u ON u.id = hac.client_id WHERE u.status_id = 1")->result_array();
    }
    public function createTableOrder($table, $data)
    {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function dataOrder($status)
    {
        return $this->db->query("SELECT `order`.*,user.name,user.user_to_company_id, services.service_name,employee.employee_name, statusorder.status,company.image,company.company FROM `order` INNER JOIN services ON `order`.service_id = services.id INNER JOIN user ON user.id = `order`.user_id INNER JOIN employee ON employee.id = `order`.partner_id INNER JOIN statusorder ON statusorder.id = `order`.statusOrder_id INNER JOIN company ON company.id = user.company_id WHERE statusorder.status = $status ")->result_array();
    }
    function dataOrderAll()
    {
        return $this->db->query("SELECT `order`.*,user.name,user.user_to_company_id, services.service_name,employee.employee_name, statusorder.status,company.image,company.company FROM `order` INNER JOIN services ON `order`.service_id = services.id INNER JOIN user ON user.id = `order`.user_id INNER JOIN employee ON employee.id = `order`.partner_id INNER JOIN statusorder ON statusorder.id = `order`.statusOrder_id INNER JOIN company ON company.id = user.company_id")->result_array();
    }
    function dataOrder2($id_user)
    {
        return $this->db->query(" SELECT `order`.*, user.name, services.service_name,company.image,company.company FROM `order` 
        INNER JOIN services ON `order`.service_id = services.id 
        INNER JOIN user ON user.id = `order`.user_id
        INNER JOIN company ON company.id = user.company_id 
        WHERE `order`.user_id = $id_user")->result_array();
    }
    
    function getForListOrder($id_user)
    {
        return $this->db->query(" SELECT `order`.*, supervisor.employee_name AS supervisor_name, user.name, services.service_name,company.image,company.company FROM `order` 
        INNER JOIN services ON `order`.service_id = services.id 
        INNER JOIN user ON user.id = `order`.user_id
        INNER JOIN company ON company.id = user.company_id 
        INNER JOIN employee supervisor ON supervisor.id = `order`.supervisor_id
        WHERE `order`.user_id = $id_user")->result_array();
    }
    function getDetailForListOrder($id_user,$id_order)
    {
        return $this->db->query(" SELECT `order`.*, supervisor.employee_name AS supervisor_name, user.name, services.service_name,company.image,company.company FROM `order` 
        INNER JOIN services ON `order`.service_id = services.id 
        INNER JOIN user ON user.id = `order`.user_id
        INNER JOIN company ON company.id = user.company_id 
        INNER JOIN employee supervisor ON supervisor.id = `order`.supervisor_id
        WHERE `order`.user_id = $id_user
        AND MD5(`order`.id) = '$id_order'
        ")->row_array();
    }
    function dataOrder3($id_user)
    {
        return $this->db->query(" SELECT `order`.*, services.service_name FROM `order` INNER JOIN services ON `order`.service_id = services.id INNER JOIN user ON user.id = `order`.user_id INNER JOIN company ON company.id = user.company_id WHERE `order`.statusOrder_id =1 AND `order`.user_id = $id_user")->row_array();
    }
    public function orderId($id)
    {
        return $this->db->query("SELECT `order`.*,services.service_name,services.description FROM `order` inner join services on `order`.service_id = services.id  where user_id = $id")->result_array();
    }

    public function getOrder($id)
    {
        return $this->db->query("SELECT `order`.*,services.service_name,services.description FROM `order` inner join services on `order`.service_id = services.id  where `order`.id = $id ")->row_array();
    }
    public function getDataOrder($order_id)
    {
        return $this->db->query("SELECT o.*, u.name, u.address AS client_address, u.phone AS client_phone,u.position AS client_position,u.email, c.company,c.image AS company_image, services.service_name, services.id AS service_id, p.employee_name AS partner_name, p.image AS partner_image,  p.address AS partner_address, p.phone AS partner_phone, p.id AS partner_id, m.employee_name AS manager_name, m.image AS manager_image, m.phone AS manager_phone, m.id AS manager_id, s.employee_name AS supervisor_name, s.image AS supervisor_image, s.phone AS supervisor_phone, s.id AS supervisor_id FROM `order` o JOIN user u ON u.id = o.user_id JOIN company c ON c.id = u.company_id JOIN employee p ON p.id = o.partner_id JOIN employee m ON m.id = o.manager_id JOIN employee s ON s.id = o.supervisor_id JOIN services ON services.id = o.service_id WHERE o.id = $order_id")->row_array();
    }
    public function getAllDataOrder($order_id)
    {
        return $this->db->query("SELECT o.*, u.name, u.address AS client_address, u.phone AS client_phone, u.position AS client_position, u.email, c.company, c.image AS company_image, services.service_name, services.id AS service_id, p.employee_name AS partner_name, p.image AS partner_image, p.address AS partner_address, p.phone AS partner_phone, p.id AS partner_id, m.employee_name AS manager_name, m.image AS manager_image, m.phone AS manager_phone, m.id AS manager_id, s.employee_name AS supervisor_name, s.image AS supervisor_image, s.phone AS supervisor_phone, s.id AS supervisor_id FROM `order` o JOIN user u ON u.id = o.user_id JOIN company c ON c.id = u.company_id JOIN employee p ON p.id = o.partner_id JOIN employee m ON m.id = o.manager_id JOIN employee s ON s.id = o.supervisor_id JOIN services ON services.id = o.service_id WHERE o.id = $order_id")->row_array();
    }
    public function getDataStaff($order_id)
    {
        return $this->db->query("SELECT employee.employee_name,employee.id AS id_employee, employee.phone, employee.image from order_staff JOIN employee ON order_staff.employee_id = employee.id WHERE order_staff.order_id=$order_id")->result_array();
    }
    // ============ LETTER ============

    public function letter($id)
    {
        return $this->db->query("SELECT data.*, detaildata.data from data inner join detaildata on data.data_id = detaildata.id where data.order_id =$id")->result_array();
    }
    public function percenLetter($order_id, $status)
    {
        return $this->db->query("SELECT data.*, detaildata.data from data inner join detaildata on data.data_id = detaildata.id where data.order_id =$order_id and data.status = '$status'")->result_array();
    }

    // ============ CHATT ============

    function chatt($id_order)
    {
        return $this->db->query("SELECT * FROM chatt where order_id = $id_order")->result_array();
    }
    function dataChatt($id_order)
    {
        return $this->db->query("SELECT chatt.*,user.name, company.image FROM chatt INNER JOIN user ON chatt.user_id = user.id INNER JOIN company ON company.id = user.company_id where order_id = $id_order ORDER BY chatt.create_date")->result_array();
    }
    function dataOrderChatt()
    {
        return $this->db->query("SELECT `order`.*,user.name,user.user_to_company_id, services.service_name,employee.employee_name, statusorder.status,company.image,company.company FROM `order` INNER JOIN services ON `order`.service_id = services.id INNER JOIN user ON user.id = `order`.user_id INNER JOIN employee ON employee.id = `order`.partner_id INNER JOIN statusorder ON statusorder.id = `order`.statusOrder_id INNER JOIN company ON company.id = user.company_id WHERE statusorder.status ='do' ORDER BY `order`.create_date DESC ")->result_array();
    }
    function selectOrder($order_id)
    {
        return $this->db->query("SELECT `order`.*,user.name,user.user_to_company_id,user.phone,user.position,user.address,user.email, services.service_name,employee.employee_name, statusorder.status,company.image,company.company FROM `order` INNER JOIN services ON `order`.service_id = services.id INNER JOIN user ON user.id = `order`.user_id INNER JOIN employee ON employee.id = `order`.partner_id INNER JOIN statusorder ON statusorder.id = `order`.statusOrder_id INNER JOIN company ON company.id = user.company_id WHERE statusorder.status ='do' AND `order`.id = $order_id ")->row_array();
    }
    // ================ FLOW =============
    function getFlow($id_order)
    {
        return $this->db->query("SELECT order_step.*, step.step,step.description FROM order_step INNER JOIN substep ON substep.id = order_step.subStep_id INNER JOIN step ON step.id = substep.step_id where order_id = $id_order ORDER BY step.id")->result_array();
    }
    function getSubFlow($id_order)
    {
        return $this->db->query("SELECT order_step.*,step.step,step.description,substep.subStep,substep.id AS sub_id,substep.step_id FROM order_step INNER JOIN substep ON substep.id = order_step.subStep_id INNER JOIN step ON step.id = substep.step_id where order_id = $id_order ORDER BY UNIX_TIMESTAMP(substep.create_date)")->result_array();
    }
    public function getFlowByService($service_id)
    {
        return $this->db->query("SELECT * FROM step INNER JOIN substep ON substep.step_id = step.id WHERE step.service_id = $service_id")->result_array();
    }
    public function getSubFlowByService($service_id)
    {
        return $this->db->query("SELECT step.*,substep.subStep,substep.id AS sub_id FROM step INNER JOIN substep ON substep.step_id = step.id WHERE step.service_id = $service_id ORDER BY step.step, UNIX_TIMESTAMP(substep.create_date) ")->result_array();
    }

    //============== PROCCESS =============

    public function getProcess($order_id)
    {
        return $this->db->query("SELECT p.*,st.step,st.description AS descriptionStep,s.subStep,e.employee_name,e.image FROM process p INNER JOIN `order` o ON o.id = p.order_id INNER JOIN order_step os ON os.id = p.order_step_id INNER JOIN substep s ON s.id = os.subStep_id INNER JOIN step st ON st.id = s.step_id INNER JOIN employee e ON p.employee_id = e.id WHERE p.order_id = $order_id ORDER BY p.id, st.id")->result_array();
    }
    public function getProcessDone($order_id)
    {
        return $this->db->query("SELECT p.*,st.step,s.subStep,e.employee_name,e.image FROM process p INNER JOIN `order` o ON o.id = p.order_id INNER JOIN order_step os ON os.id = p.order_step_id INNER JOIN substep s ON s.id = os.subStep_id INNER JOIN step st ON st.id = s.step_id INNER JOIN employee e ON p.employee_id = e.id WHERE p.order_id = $order_id AND p.status = 'done' ORDER BY p.id DESC")->result_array();
    }
    public function getProcessByStep($order_id)
    {
        return $this->db->query("SELECT process.*,step.step,substep.subStep,substep.id AS subStep_id,order_step.id AS os_id,employee.employee_name,employee.image,employee.position FROM process INNER JOIN order_step ON order_step.id = process.order_step_id INNER JOIN substep ON substep.id = order_step.subStep_id INNER JOIN step ON step.id = substep.step_id INNER JOIN employee ON employee.id = process.employee_id WHERE process.id = $order_id")->row_array();
    }

    //============== OUTPUT =============

    public function getOutput($order_id)
    {
        return $this->db->query("SELECT output.*,meeting.meeting,meeting.date,meeting.message FROM output INNER JOIN meeting ON meeting.output_id = output.id WHERE output.order_id = $order_id")->row_array();
    }
    public function getOutputYes($order_id)
    {
        return $this->db->query("SELECT output.*,meeting.meeting,meeting.date,meeting.message FROM output INNER JOIN meeting ON meeting.output_id = output.id WHERE output.order_id = $order_id AND output.status = 'yes'")->num_rows();
    }
    public function getReport($order_id)
    {
        return $this->db->query("SELECT pr.*,e.employee_name,s.subStep,p.order_step_id,rr.id AS review_id, rr.review_ceo, rr.review_supervisor, rr.review_status FROM process_report pr INNER JOIN process p ON p.id = pr.process_id INNER JOIN employee e ON e.id = p.employee_id INNER JOIN order_step os ON os.id = p.order_step_id INNER JOIN substep s ON s.id = os.subStep_id INNER JOIN report_review rr ON rr.report_id = pr.id WHERE p.order_id = $order_id")->result_array();
    }
    public function detailReport($report_id)
    {
        return $this->db->query("SELECT pr.*, e.employee_name, s.subStep, p.order_step_id, step.step, ser.service_name, p.order_id, ser.id AS service_id FROM process_report pr INNER JOIN process p ON p.id = pr.process_id INNER JOIN employee e ON e.id = p.employee_id INNER JOIN order_step os ON os.id = p.order_step_id INNER JOIN substep s ON s.id = os.subStep_id INNER JOIN step ON step.id = s.step_id INNER JOIN services ser ON ser.id = step.service_id WHERE pr.id = $report_id")->row_array();
    }

    public function getReview($order_id)
	{
        return $this->db->query("SELECT rr.*, pr.report, ss.subStep FROM report_review rr INNER JOIN process_report pr ON pr.id = rr.report_id INNER JOIN process p ON p.id = pr.process_id INNER JOIN order_step os ON os.id = p.order_step_id INNER JOIN substep ss ON ss.id = os.subStep_id WHERE p.order_id = $order_id AND rr.message IS NOT NULL")-> result_array();
	}
    public function getReviewByReport($report_id)
	{
        return $this->db->query("SELECT * FROM report_review WHERE report_id = $report_id")->row_array();
	}
    public function getMeeting($order_id)
    {
        return $this->db->query("SELECT * FROM output ou INNER JOIN `order` o ON o.id = ou.order_id INNER JOIN meeting m ON m.output_id = ou.id WHERE ou.order_id = $order_id")->row_array();
    }
    public function getAllMeeting($order_id)
    {
        return $this->db->query("SELECT * FROM output ou INNER JOIN `order` o ON o.id = ou.order_id INNER JOIN meeting m ON m.output_id = ou.id WHERE ou.order_id = $order_id")->result_array();
    }

    //============== WORKFLOW =============

    public function getService($category_id)
    {
        return $this->db->query("SELECT * FROM services WHERE category_service_id = $category_id")->result_array();
    }

    //============== EMPLOYEE =============

    public function getEmployee()
    {
        return $this->db->query("SELECT employee.*,position.status, company.company FROM employee INNER JOIN position ON employee.status_id = position.id INNER JOIN company ON company.id = employee.company_id where lisence = 'Y'")->result_array();
    }
    public function getEmployeeById($id)
    {
        return $this->db->query("SELECT employee.*,position.status,company.company FROM employee INNER JOIN position ON employee.status_id = position.id INNER JOIN company ON company.id = employee.company_id WHERE employee.id = $id")->row_array();
    }
    public function getEmployeeStatus($status_id)
    {
        return $this->db->query("SELECT employee.*,position.status FROM employee INNER JOIN position ON employee.status_id = position.id WHERE employee.status_id = $status_id")->result_array();
    }

    //============== RECOMMENDATION =============

    public function getServRecommendation($id)
    {
        return $this->db->query("SELECT sr.*, s.service_name,s.description FROM service_recommendation sr INNER JOIN user u ON u.id = sr.user_id INNER JOIN services s ON s.id = sr.service_id WHERE u.id = $id")->result_array();
    }
    public function getServRecommendationById($id,$r_id)
    {
        return $this->db->query("SELECT * FROM service_recommendation sr INNER JOIN user u ON u.id = sr.user_id INNER JOIN services s ON s.id = sr.service_id WHERE u.id = $id AND sr.id = $r_id") ->row_array();
    }

    // ========== resume ==========
    public function getResume($id)
    {
        return $this->db->query("SELECT u.*,r.id AS resume_id, r.image FROM resume r INNER JOIN user u ON u.id = r.user_id WHERE u.id =  $id")->row_array();
    }
    public function getSubResume($id)
    {
        return $this->db->query("SELECT sr.*, scr.id AS scr_id,scr.subCategory FROM sub_resume sr INNER JOIN sub_category_resume scr ON scr.id = sr.subCategory_id INNER JOIN resume r ON r.id = sr.resume_id WHERE r.user_id = $id")->result_array();
    }

    // ========== TASK ===========

    public function getAllTask()
    {
        return $this->db->query("SELECT s.*,e.employee_name,e.company_id, cs.category FROM specialtask s INNER JOIN employee e ON e.id = s.employee_id INNER JOIN category_specialtask cs ON cs.id = s.id_category order by s.id desc")->result_array();
    }
    public function getAllTaskLastMonth()
    {
        $y = date('Y');
        $m = date('m');
        return $this->db->query("SELECT s.*,e.employee_name,e.company_id, cs.category FROM specialtask s INNER JOIN employee e ON e.id = s.employee_id INNER JOIN category_specialtask cs ON cs.id = s.id_category WHERE MONTH(s.create_date) = $m AND YEAR(s.create_date) = $y order by s.create_date desc")->result_array();
    }
    public function getTaskByEmployee($employee_id)
    {
        return $this->db->query("SELECT s.*,e.employee_name,cs.category FROM specialtask s INNER JOIN employee e ON e.id = s.employee_id INNER JOIN category_specialtask cs ON cs.id = s.id_category WHERE s.employee_id = $employee_id ORDER BY s.update_date desc")->result_array();
    }

    // ============== FEEDBACK ===============

    function dataFeedbackFromCEO($order_id)
	{
        return $this->db->query("SELECT feedback_from_ceo.*,employee.employee_name FROM feedback_from_ceo INNER JOIN employee ON employee.id = feedback_from_ceo.employee_id WHERE feedback_from_ceo.order_id = $order_id")-> result_array();
	}
    public function getStaffFromFeedbackFromCeo($order_id)
	{
        return $this->db->query("SELECT * FROM feedback_criteria_from_ceo WHERE order_id = $order_id")-> result_array();
	}
    function detailFeedback($id)
	{
        return $this->db->query("SELECT feedback_from_ceo.*, employee.employee_name FROM feedback_from_ceo inner join employee on employee.id = feedback_from_ceo.employee_id WHERE feedback_from_ceo.id = $id")-> row_array();
	}
    public function getFeedback($order_id,$employee_id)
	{
        return $this->db->query("SELECT f.*,c.image,c.company,u.* FROM feedback_from_ceo f INNER JOIN `order` o ON o.id = f.order_id INNER JOIN user u ON u.id = o.user_id INNER JOIN company c ON c.id = u.company_id WHERE f.order_id = $order_id AND f.employee_id = $employee_id")-> row_array();
	}
    
	public function getCriteria($order_id,$employee_id)
	{
        return $this->db->query("SELECT fc.*,c.criteria,cc.category_criteria FROM feedback_criteria_from_ceo fc
		INNER JOIN criteria c ON c.id = fc.criteria_id
		INNER JOIN category_criteria cc ON cc.id = c.category_id		
		WHERE fc.order_id = $order_id AND fc.employee_id = $employee_id")-> result_array();
	}
    public function totalStatusOrder($status, $id_employee)
    {
        return $this->db->query("SELECT s.`status` FROM `order` o INNER JOIN order_staff os ON os.order_id = o.id INNER JOIN statusorder s ON s.id = o.statusOrder_id WHERE os.employee_id = $id_employee AND o.statusOrder_id = $status")->num_rows();
    }
    public function totalStatusOrderAll($status)
    {
        return $this->db->query("SELECT s.`status` FROM `order` o INNER JOIN statusorder s ON s.id = o.statusOrder_id INNER JOIN user ON user.id = o.user_id WHERE o.statusOrder_id = $status")->num_rows();
    }

    public function get_spt_client($client_id, $date)
	{
        return $this->db->query("SELECT stc.*,st.id AS id_akun_spt, st.description, st.description_en AS en, st.description_jpn AS jpn, st.description_kor AS kor, st.description_cna AS cna, st.category_jumlah FROM spt_tahunan_client stc INNER JOIN spt_tahunan st ON st.id = stc.spt_tahunan_id INNER JOIN user u ON u.id = stc.client_id WHERE u.id = $client_id AND stc.spt_date = '$date' ORDER BY stc.spt_tahunan_id") -> result_array();
	}
    
    public function get_spt_client_year($client_id, $date)
	{
        return $this->db->query("SELECT stc.*, st.description, st.description_en AS en, st.description_jpn AS jpn, st.description_kor AS kor, st.description_cna AS cna, st.category_jumlah FROM spt_tahunan_client_pertahun stc INNER JOIN spt_tahunan st ON st.id = stc.spt_tahunan_id INNER JOIN user u ON u.id = stc.client_id WHERE u.id = $client_id AND stc.spt_date = '$date' ORDER BY stc.spt_tahunan_id") -> result_array();
	}
    public function get_spt_client_ById($id)
	{	
		return $this->db->query("SELECT s.* FROM spt_tahunan s INNER JOIN spt_tahunan_client sc ON s.id = sc.spt_tahunan_id WHERE sc.client_id = $id ") -> result_array();
	}
    public function get_formula_finance($client_id, $date)
	{
		return $this->db->query("SELECT * FROM client_finance cf WHERE cf.client_id = $client_id AND cf.data_date = '$date'")-> row_array();
	}
    
    public function get_spt_clientDate($client_id,$date)
	{
        return $this->db->query("SELECT stc.*,st.id AS id_akun_spt, st.description, st.description_en AS en, st.description_jpn AS jpn, st.description_kor AS kor, st.description_cna AS cna, st.category_jumlah FROM spt_tahunan_client stc INNER JOIN spt_tahunan st ON st.id = stc.spt_tahunan_id INNER JOIN user u ON u.id = stc.client_id WHERE u.id = $client_id AND stc.spt_date = '$date'")-> result_array();
	}
    public function get_spt_clientDate_year($client_id,$date)
	{
        return $this->db->query("SELECT stc.*, st.id AS id_akun_spt, st.description, st.description_en AS en, st.description_jpn AS jpn, st.description_kor AS kor, st.description_cna AS cna, st.category_jumlah FROM spt_tahunan_client_pertahun stc INNER JOIN spt_tahunan st ON st.id = stc.spt_tahunan_id INNER JOIN user u ON u.id = stc.client_id WHERE u.id = $client_id AND stc.spt_date = '$date'")-> result_array();
	}

    //================= JOIN TABLE =================

    public function joinTwoTable($table1,$table2,$colmn, $colmn2,$items)
    {
        return $this->db->query("SELECT $items FROM $table1 INNER JOIN $table2 ON $table1.$colmn = $table2.$colmn2")->result_array();
    }
    public function joinTwoTableSorting($table1,$table2,$colmn, $colmn2, $items, $sortby, $sortType)
    {
        return $this->db->query("SELECT $items FROM $table1 INNER JOIN $table2 ON $table1.$colmn = $table2.$colmn2 ORDER BY $sortby " . "$sortType")->result_array();
    }
    public function joinTwoTableSortingCon($table1,$table2,$colmn, $colmn2, $items, $where, $con, $con2, $sortby, $sortType)
    {
        return $this->db->query("SELECT $items FROM $table1 INNER JOIN $table2 ON $table1.$colmn = $table2.$colmn2 WHERE $where BETWEEN $con AND $con2 ORDER BY $sortby " . "$sortType")->result_array();
    }
    public function joinThreeTable($tabel1,$tabel2,$tabel3,$con1, $con2,$con3,$con)
    {
        return $this->db->query("SELECT $con FROM $tabel1 INNER JOIN $tabel2 ON $tabel1.$con1 = $tabel2.$con2 INNER JOIN $tabel3 on $con3")->result_array();
    }
    public function getSellingDrung($user_id, $date,$status)
    {
        return $this->db->query("SELECT items_name, MONTH(selling_date) AS month,unit, COUNT(*) AS total_data, items_service,  AVG(selling_price) AS avg_selling_price, AVG(purchase_price) AS avg_purchase_price  FROM inventory_drung_year WHERE user_id = $user_id AND YEAR(selling_date) = $date AND items_status = '$status' GROUP BY items_name, MONTH(selling_date) ORDER BY month ASC, total_data DESC")->result_array();
    }
}
