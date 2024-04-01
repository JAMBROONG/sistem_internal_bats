<?php
class M_dailyReport extends CI_Model{
	public function __construct()
	{
		parent::__construct();

	}
    
    public function getDailyReportByMonthAndEmployee($date,$id)
    { 
        return $this->db->query("SELECT employee_name FROM dailyreport INNER JOIN employee ON employee.id = dailyreport.employee_id WHERE dailyreport.date = '$date' AND dailyreport.employee_id = $id order by employee_id")->num_rows();
    }
    public function getDailyReportByMonth($month)
    {
        $m = date("m", strtotime($month));
        $y = date("Y", strtotime($month)); 
        return $this->db->query("SELECT date, employee_id, employee_name FROM dailyreport INNER JOIN employee ON employee.id = dailyreport.employee_id WHERE MONTH(date) ='$m' AND YEAR(date) ='$y'  order by employee_id")->result_array();
    }
    public function getBigdataDailyReport($month)
    {
        $m = date("m", strtotime($month));
        $y = date("Y", strtotime($month));
        return $this->db->query("SELECT date, employee_id FROM dailyreport WHERE MONTH(date) ='$m' AND YEAR(date) ='$y'")->result_array();
    }
    function getAllEmployee(){
        return $this->db->query("SELECT id FROM employee WHERE status_id = 3 or status_id = 4 AND lisence = 'Y'")->result_array();
    }
    function getNameAllEmployee(){
        return $this->db->query("SELECT id,employee_name AS name FROM employee WHERE status_id = 3 OR status_id = 4 AND lisence = 'Y' order by name")->result_array();
    }
}