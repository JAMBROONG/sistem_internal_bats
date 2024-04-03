<?php
class M_employee extends CI_Model{
	public function __construct()
	{
		parent::__construct();

	}
	function getEmployee($id)
	{
		return $this->db->query("SELECT * FROM employee  WHERE id = $id ")-> row_array();
	}
	public function totalOrder($employee_id)
    {
		return $this->db->query("SELECT * FROM order_staff WHERE employee_id = $employee_id")-> num_rows();
	}
	public function totalDone($employee_id)
    {
		return $this->db->query("SELECT * FROM process WHERE employee_id = $employee_id AND status = 'done'")-> num_rows();
	}
	public function totalReport($employee_id)
    {
        return $this->db->query("SELECT * FROM process_report INNER JOIN process ON process.id = process_report.process_id WHERE process.employee_id = $employee_id")-> num_rows();
	}
	public function totalTable($table,$where,$employee_id)
    {
       return $this->db->query("SELECT * FROM $table where $where = $employee_id")-> num_rows();
	}
	public function totalFeedback($employee_id)
    {
     return $this->db->query("SELECT * FROM feedback WHERE employee_id = $employee_id") -> num_rows();
	}
	public function totalFeedbackOrder($order_id,$employee_id)
    {
        return $this->db->query("SELECT * FROM feedback WHERE employee_id = $employee_id AND order_id = $order_id")-> num_rows();
	}
	// =========== order ===========

	function dataOrder($status,$employee_id)
	{
		return $this->db->query("SELECT o.*, p.employee_name AS partner, m.employee_name AS manager, s.employee_name AS supervisor,se.service_name,c.company FROM `order` o INNER JOIN order_staff os ON o.id = os.order_id INNER JOIN employee p ON o.partner_id = p.id INNER JOIN employee m ON o.manager_id = m.id INNER JOIN employee s ON o.supervisor_id = s.id INNER JOIN services se ON se.id = o.service_id INNER JOIN user u ON u.id = o.user_id INNER JOIN company c ON c.id = u.company_id WHERE os.employee_id = $employee_id AND o.statusOrder_id = $status")-> result_array();
	}
	public function getProcess($order_id,$employee_id,$status)
	{
		return $this->db->query("SELECT p.*,st.step,s.subStep,e.employee_name,e.image FROM process p INNER JOIN `order` o ON o.id = p.order_id INNER JOIN order_step os ON os.id = p.order_step_id INNER JOIN substep s ON s.id = os.subStep_id INNER JOIN step st ON st.id = s.step_id INNER JOIN employee e ON p.employee_id = e.id WHERE p.order_id = $order_id AND p.employee_id = $employee_id AND p.status = '$status' ORDER BY p.id DESC")-> result_array();
	}

	// =========== report ============

	public function getReport($order_id,$id)
	{
		return $this->db->query("SELECT pr.*,e.employee_name,s.subStep,p.order_step_id,rr.id AS review_id, rr.review_ceo, rr.review_supervisor, rr.review_status FROM process_report pr INNER JOIN process p ON p.id = pr.process_id INNER JOIN employee e ON e.id = p.employee_id INNER JOIN order_step os ON os.id = p.order_step_id INNER JOIN substep s ON s.id = os.subStep_id INNER JOIN report_review rr ON rr.report_id = pr.id WHERE p.order_id = $order_id AND p.employee_id = $id")-> result_array();
	}
	public function getProcessDone($order_id,$id)
	{
		return $this->db->query("SELECT p.*,st.step,s.subStep,e.employee_name,e.image FROM process p INNER JOIN `order` o ON o.id = p.order_id INNER JOIN order_step os ON os.id = p.order_step_id INNER JOIN substep s ON s.id = os.subStep_id INNER JOIN step st ON st.id = s.step_id INNER JOIN employee e ON p.employee_id = e.id WHERE p.order_id = $order_id AND p.status = 'done' AND p.employee_id = $id ORDER BY p.id DESC")-> result_array();
	}

	// =========== review ============

	public function reviewByCon($order_id,$employee_id)
	{
		return $this->db->query("SELECT rr.*, pr.report, ss.subStep FROM report_review rr INNER JOIN process_report pr ON pr.id = rr.report_id INNER JOIN process p ON p.id = pr.process_id INNER JOIN order_step os ON os.id = p.order_step_id INNER JOIN substep ss ON ss.id = os.subStep_id WHERE p.order_id = $order_id AND p.employee_id = $employee_id AND rr.message IS NOT NULL")-> result_array();
	}

	// =========== feedback ============

	public function getFeedback($order_id,$employee_id)
	{
		return $this->db->query("SELECT f.*,c.image,c.company,u.* FROM feedback f INNER JOIN `order` o ON o.id = f.order_id INNER JOIN user u ON u.id = o.user_id INNER JOIN company c ON c.id = u.company_id WHERE f.order_id = $order_id AND f.employee_id = $employee_id")-> row_array();
	}
	public function getCriteria($order_id,$employee_id)
	{
		return $this->db->query("SELECT fc.*,c.criteria,cc.category_criteria FROM feedback_criteria fc INNER JOIN criteria c ON c.id = fc.criteria_id INNER JOIN category_criteria cc ON cc.id = c.category_id WHERE fc.order_id = $order_id AND fc.employee_id = $employee_id")-> result_array();
	}
	public function getAction($employee_id)
	{
		return $this->db->query("SELECT ha.*,e.employee_name FROM history_action_employee ha INNER JOIN employee e ON e.id = ha.employee_id WHERE e.id = $employee_id ORDER BY update_date DESC")->result_array();
	}
	public function getLoginById($user_id)
	{
		return $this->db->query("SELECT ha.*, e.employee_name FROM history_login_employee ha INNER JOIN employee e ON e.id = ha.employee_id WHERE ha.employee_id = $user_id")->result_array();
	}
	public function getLogin()
	{
		return $this->db->query("SELECT * FROM history_login_employee")->num_rows();
	}
	public function processDeadline($user_id)
	{
		return $this->db->query("SELECT p.*,ss.subStep, s.step FROM `order` o INNER JOIN process p ON p.order_id = o.id INNER JOIN order_step os ON os.id = p.order_step_id INNER JOIN substep ss ON ss.id = os.subStep_id INNER JOIN step s ON s.id = ss.step_id WHERE o.statusOrder_id = 1 AND p.`status` = 'do' AND p.employee_id = $user_id")->result_array();
	}

	// ============ RESUME ===========

	public function getResume($id)
    {
        return $this->db->query("SELECT e.*,r.id AS resume_id FROM resume r INNER JOIN employee e ON e.id = r.user_id WHERE e.id =  $id") ->row_array();
    }
    public function getSubResume($id)
    {
        return $this->db->query("SELECT sr.*, scr.id AS scr_id,scr.subCategory FROM sub_resume sr INNER JOIN sub_category_resume scr ON scr.id = sr.subCategory_id INNER JOIN resume r ON r.id = sr.resume_id WHERE r.user_id = $id")->result_array();
    }

	// ============ DAILY REPORT ==========

	public function getDailyReport()
    {
		$date = date('Y-m-d');
        return $this->db->query("SELECT d.*, e.employee_name FROM dailyreport d INNER JOIN employee e ON e.id = d.employee_id WHERE d.date = '$date'  ORDER BY d.id")->result_array();
    }
	public function dR_AD($date)
    {
		return $this->db->query("SELECT d.*, e.employee_name FROM dailyreport d INNER JOIN employee e ON e.id = d.employee_id WHERE d.date = '$date' AND e.status_id != 1 ORDER BY d.id DESC")->result_array();
    }
	public function dR_ED($id, $date)
    {
		return $this->db->query("SELECT d.*, e.employee_name FROM dailyreport d INNER JOIN employee e ON e.id = d.employee_id WHERE e.id = $id AND d.date = '$date' ORDER BY d.id")->result_array();
    }
	public function dR_ED_Month($id,$m, $y)
    {
		return $this->db->query("SELECT d.*, e.employee_name FROM dailyreport d INNER JOIN employee e ON e.id = d.employee_id WHERE e.id = $id AND MONTH(date) ='$m' AND YEAR(date) ='$y' ORDER BY d.update_date")->result_array();
    }
	public function cleanDailyReport()
    {
		$date = date('Y-m');
		$date = "'$date'";
        return $this->db->query('DELETE FROM dailyreport WHERE DATE_FORMAT(date, "%Y-%m") != ' . $date);
    }
	public function getTotalTableCon($table, $con)
	{
		return $this->db->query("SELECT * FROM $table WHERE $con")-> num_rows();
	}
	public function getEmployeeTraining($id)
	{
		return $this->db->query("SELECT employee_training.*,content_training_title.content_title,content_training_title.id AS id_title, employee.employee_name FROM employee_training INNER JOIN employee ON employee.id = employee_training.id_employee INNER JOIN content_training_title ON content_training_title.id = employee_training.id_title_material WHERE employee.id = $id ORDER BY employee_training.id desc")->result_array();
	}
	
	public function getEmployeeTrainingAll()
	{
		return $this->db->query("SELECT employee_training.*,content_training_title.content_title,content_training_title.id AS id_title, employee.employee_name FROM employee_training INNER JOIN employee ON employee.id = employee_training.id_employee INNER JOIN content_training_title ON content_training_title.id = employee_training.id_title_material ORDER BY employee_training.id desc")->result_array();
	}
	public function getMaterialTraining()
	{
		return $this->db->query("SELECT c.*, t.id_category, t.content_title,t.id AS id_title,p.title,p.content AS pdf, p.id_content_title AS id_pdf, yt.id_content_title AS id_yt,yt.content AS yt, ppt.id_content_title AS id_ppt, ppt.content AS ppt FROM `content_training_category` c INNER JOIN content_training_title t ON t.id_category = c.id LEFT JOIN content_training_type_pdf p ON p.id_content_title = t.id LEFT JOIN content_training_type_ppt ppt ON ppt.id_content_title = t.id LEFT JOIN content_training_type_yt yt ON ppt.id_content_title = t.id ORDER BY t.content_title")->result_array();	
	}
}
