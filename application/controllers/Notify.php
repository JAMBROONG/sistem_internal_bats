<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notify extends CI_Controller {
	public function __construct()
	{	
		parent:: __construct();

    }
	public function index()
	{
        $str = (string)$this->uri->rsegment(3);
        if ( $str != "293743075bb62b63af1507d87d55d9fb") {
            redirect('Login');
        } else{
            $this->notifDailyReport();
            exit();
        }
       
	}
    public function notifDailyReport()
    {
        $report = $this->M_employee->dR_AD(date('Y-m-d'));
        $employee = $this->M_table->getAll('employee');
        $id = [];
        foreach ($employee as $key) {
            foreach ($report as $row) {
                if ($key['id'] == $row['employee_id']) {
                    array_push($id,$key['id']);
                    break;
                }
            }
        }
        foreach ($employee as $key) {
            if (in_array($key['id'],$id)) {
                $no = $this->gantiformat($key['phone']);
                ?>
                <script>
                    setInterval(function(){
                        <?php 
                        $this->sendWax($no,"Permisi maaf ganggu, saya Farhan cuma sedang tes bot buat fitur notif kedepannya nanti. *abaikan pesan ini*");
                        ?>
                    },5000);
                </script>
                <?php
                
            }
        }
    }
    function gantiformat($nomorhp) {
        $nomorhp = trim($nomorhp);
        $nomorhp = strip_tags($nomorhp);     
        $nomorhp= str_replace(" ","",$nomorhp);
        $nomorhp= str_replace("(","",$nomorhp);
        $nomorhp= str_replace(".","",$nomorhp); 
        if(!preg_match('/[^+0-9]/',trim($nomorhp))){
            if(substr(trim($nomorhp), 0, 3)=='+62'){
                $nomorhp= trim($nomorhp);
            }
           elseif(substr($nomorhp, 0, 1)=='0'){
                $nomorhp= '62'.substr($nomorhp, 1);
            }
        }
        return $nomorhp;
    }
	public function sendWax($number,$message)
	{
        $apikey = "zXLf4P5LPYpr";
        $message = urlencode($message);
		$url = 'http://api.textmebot.com/send.php?recipient='.$number.'&apikey='.$apikey.'&text='.$message;
// 		return fopen($url);
		$c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $url);
        $contents = curl_exec($c);
        curl_close($c);
        
	}
}
