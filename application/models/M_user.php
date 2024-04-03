<?php
class M_user extends CI_Model{
    public function __construct()
	{
        parent::__construct();
        
	}
	function pilih_semua()
	{
		return $this->db->query("SELECT * FROM user")-> result_array();
	}
	public function getById($id)
    {
		return $this->db->query("SELECT * FROM user where id = $id")-> row_array();
	}
	public function getByWhere($condition,$id)
    {
		return $this->db->query("SELECT user.*, company.company FROM user INNER JOIN company ON company.id = user.company_id where $condition = $id")-> result_array();
	}

	// ============ PROFILE ============

    public function profile($id)
	{
		return  $this -> db -> query("SELECT user.*, user.image as image_user,company.company,status.status,company.image, company.NPWP AS company_NPWP,company.typeBusiness, company.addressOfDomicile, company.company_phone,company.businessEntity,company.company_email,c.company AS to_company, c.SKMHHAM, c.deeds_of_establishment, c.deeds_of_revisions,company.website AS website_cpmpany FROM user JOIN status ON user.status_id = status.id JOIN company ON user.company_id = company.id JOIN company c ON user.user_to_company_id = c.id WHERE user.id = $id")-> row_array();
	}
	public function person($id)
	{
		return $this -> db -> query("SELECT pr.* FROM person_responsible pr inner join `order` o on o.id = pr.order_id WHERE o.id = $id")-> row_array();
	}

    // ============ FEEBBACK ============

    function dataFeedback($user_id,$order_id)
	{
		return $this->db->query("SELECT feedback.*,employee.employee_name,user.name FROM feedback  INNER JOIN user ON user.id = feedback.user_id INNER JOIN employee ON employee.id = feedback.employee_id WHERE feedback.user_id = $user_id  AND feedback.order_id = $order_id")-> result_array();
	}
	function dataFeedback2($id)
	{
		return $this->db->query("SELECT feedback.*, categoryfeedback.category_feedback, employee.employee_name, user.name FROM feedback inner join categoryfeedback ON categoryfeedback.id = feedback.categoryFeedback_id inner join employee on employee.id = feedback.employee_id inner JOIN user ON user.id = feedback.user_id WHERE categoryfeedback.id = $id")-> result_array();
	}
	function dataFeedback3($id)
	{
		return $this->db->query("SELECT feedback.*, categoryfeedback.category_feedback, user.name FROM feedback inner join categoryfeedback ON categoryfeedback.id = feedback.categoryFeedback_id inner JOIN user ON user.id = feedback.user_id WHERE categoryfeedback.id = $id")-> result_array();	
	}
	function validatefeedback($id,$id2)
	{
		return $this->db->query("SELECT * FROM feedback WHERE feedback.user_id = $id and categoryFeedback_id = $id2")->num_rows();
	}
    function detailFeedback($id)
	{
		return $this->db->query("SELECT feedback.*, employee.employee_name FROM feedback inner join employee on employee.id = feedback.employee_id WHERE feedback.id = $id")-> row_array();
	}
	function companyFeedback($order_id)
	{
		return $this->db->query("SELECT * FROM feedback WHERE order_id = $order_id and categoryFeedback_id = 2")-> row_array();
	}
	function detailFeedback1($id)
	{
		return $this->db->query("SELECT feedback.*, employee.employee_name,employee.phone as e_phone,employee.address as e_address, employee.position, user.name, user.phone,user.email,user.address FROM feedback inner JOIN employee on employee.id = feedback.employee_id inner JOIN user ON user.id = feedback.user_id WHERE feedback.id = $id")-> row_array();
	}
	function detailFeedback2($id)
	{
		return $this->db->query("SELECT feedback.*, user.name, user.phone,user.email,user.address FROM feedback inner JOIN user ON user.id = feedback.user_id WHERE feedback.id = $id")-> row_array();
	}
	public function getCriteria()
	{
		return $this->db->query("SELECT criteria.*,category_criteria.category_criteria FROM criteria INNER JOIN category_criteria ON criteria.category_id = category_criteria.id")-> result_array();
	}
	public function getStaffFromFeedback($order_id)
	{
		return $this->db->query("SELECT * FROM feedback_criteria WHERE order_id = $order_id")-> result_array();
	}
	public function getLogin($user_id)
	{
		return $this->db->query("SELECT * FROM history_login INNER JOIN user ON user.id = history_login.user_id WHERE history_login.user_id = $user_id")-> result_array();
	}
	public function getLoginE($e_id)
	{
		return $this->db->query("SELECT * FROM history_login_employee hl INNER JOIN user u ON u.id = hl.employee_id WHERE hl.employee_id = $e_id")-> result_array();
	}
	public function getAction($user_id)
	{
		return $this->db->query("SELECT * FROM history_action_client INNER JOIN user ON user.id = history_action_client.client_id WHERE history_action_client.client_id = $user_id")-> result_array();
	}
	public function getActionA($user_id)
	{
		return $this->db->query("SELECT * FROM history_action_admin INNER JOIN user ON user.id = history_action_admin.admin_id WHERE history_action_admin.admin_id = $user_id")-> result_array();
	}
	function getReview($report_id)
	{
		return $this->db->query("SELECT * FROM report_review rr WHERE report_id = $report_id")-> row_array();
	}
}