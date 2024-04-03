<?php
class M_finance extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_cash_end_of_month($user_id, $date)
    {
		return $this->db->query("SELECT stc.value,stc.spt_date, st.description FROM spt_tahunan_client stc INNER JOIN spt_tahunan st ON st.id = stc.spt_tahunan_id INNER JOIN user u ON u.id = stc.client_id WHERE u.id = ".$user_id." AND stc.spt_date >= DATE_SUB('".$date."', INTERVAL 12 MONTH) AND MONTH(stc.spt_date) <= MONTH('".$date."')
        AND YEAR(stc.spt_date) = YEAR('".$date."') 
        AND st.description = 'KAS DAN SETARA KAS'
        ORDER BY stc.spt_date
        ")-> result_array();
    }
    
    public function get_cash_end_of_year($user_id, $date)
    {
		return $this->db->query("SELECT stc.value,stc.spt_date, st.description FROM spt_tahunan_client_pertahun stc INNER JOIN spt_tahunan st ON st.id = stc.spt_tahunan_id INNER JOIN user u ON u.id = stc.client_id WHERE u.id = ".$user_id." 
        AND st.description = 'KAS DAN SETARA KAS'
        ORDER BY stc.spt_date
        ")-> result_array();
    }
    
    public function get_quick_ratio_year($user_id, $date)
    {
		return $this->db->query("SELECT stc.value,stc.spt_date, st.description FROM spt_tahunan_client_pertahun stc INNER JOIN spt_tahunan st ON st.id = stc.spt_tahunan_id INNER JOIN user u ON u.id = stc.client_id WHERE u.id = ".$user_id." 
        AND st.description = 'KAS DAN SETARA KAS'
        ORDER BY stc.spt_date
        ")-> result_array();
    }
    
    public function get_cash_in_month($user_id, $month)
    {
		return $this->db->query("SELECT stc.value,stc.spt_date, st.description FROM spt_tahunan_client stc INNER JOIN spt_tahunan st ON st.id = stc.spt_tahunan_id INNER JOIN user u ON u.id = stc.client_id WHERE u.id = ".$user_id."
        AND stc.spt_date = '".$month."'
        AND st.description = 'KAS DAN SETARA KAS'
        ")-> row_array();
    }
    
    public function get_cash_in_year($user_id, $date)
    {
		return $this->db->query("SELECT stc.value,stc.spt_date, st.description FROM spt_tahunan_client_pertahun stc INNER JOIN spt_tahunan st ON st.id = stc.spt_tahunan_id INNER JOIN user u ON u.id = stc.client_id WHERE u.id = ".$user_id."
        AND stc.spt_date = '".$date."'
        AND st.description = 'KAS DAN SETARA KAS'
        ")-> row_array();
    }

    
    public function get_days_sales_outstanding($user_id, $month,$column)
    {
        $num = $this->db->query("SELECT stc.* FROM spt_tahunan_client stc INNER JOIN spt_tahunan st ON st.id = stc.spt_tahunan_id  WHERE stc.client_id = ".$user_id."
        AND stc.spt_date = '".$month."'
        AND st.description = '".$column."'
        ")-> row_array();
        if (empty($num['value'])) {
            $num['value'] = 1;
        }
		return $num;
    } 
    
    public function get_days_sales_outstanding2($user_id, $month,$column)
    {
        $num = $this->db->query("SELECT stc.* FROM spt_tahunan_client stc INNER JOIN spt_tahunan st ON st.id = stc.spt_tahunan_id  WHERE stc.client_id = ".$user_id."
        AND stc.spt_date = '".$month."'
        AND st.description = '".$column."'
        ")-> row_array();
        if (empty($num['value'])) {
            $num['value'] = 0;
        }
		return $num;
    }
    
    public function get_days_sales_outstanding_year($user_id, $month,$column)
    {
        $num = $this->db->query("SELECT stc.* FROM spt_tahunan_client_pertahun stc INNER JOIN spt_tahunan st ON st.id = stc.spt_tahunan_id  WHERE stc.client_id = ".$user_id."
        AND stc.spt_date = '".$month."'
        AND st.description = '".$column."'
        ")-> row_array();
        if (empty($num['value'])) {
            $num['value'] = 1;
        }
		return $num;
    } 
    
    public function get_days_sales_outstanding2_year($user_id, $month,$column)
    {
        $num = $this->db->query("SELECT stc.* FROM spt_tahunan_client_pertahun stc INNER JOIN spt_tahunan st ON st.id = stc.spt_tahunan_id  WHERE stc.client_id = ".$user_id."
        AND stc.spt_date = '".$month."'
        AND st.description = '".$column."'
        ")-> row_array();
        if (empty($num['value'])) {
            $num['value'] = 0;
        }
		return $num;
    }

    public function get_rata_rata_piutang_bulanan($user_id, $month)
    {
        $num = $this->db->query("SELECT st.*, stc.* FROM spt_tahunan_client stc INNER JOIN spt_tahunan st ON st.id = stc.spt_tahunan_id  WHERE stc.client_id = ".$user_id." AND stc.spt_date BETWEEN DATE_SUB('$month', INTERVAL 1 MONTH) AND '$month';
        ")-> result_array();
        $piutang =0;
        $akun_piutang = ['PIUTANG USAHA PIHAK KETIGA','PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','PIUTANG LAIN-LAIN PIHAK KETIGA','PIUTANG LAIN-LAIN PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA'];
        foreach ($num as $key) {
            if (in_array($key['description'],$akun_piutang)) {
                $piutang = $piutang + $key['value'];
            }
            //cek output
            // switch ($key['description']) {
            //     case 'PIUTANG USAHA PIHAK KETIGA':
            //         echo $key['description'] . ' = ' . "Rp " . number_format($key['value'],0,',','.') .'<br /> Tanggal ' . $key['spt_date'].'<br /> <br /> ';
            //         break;
            //     case 'PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA':
            //         echo $key['description'] . ' = ' . "Rp " . number_format($key['value'],0,',','.') .'<br /> Tanggal ' . $key['spt_date'].'<br /> <br /> ';
            //         break;
            //     case 'PIUTANG LAIN-LAIN PIHAK KETIGA':
            //         echo $key['description'] . ' = ' . "Rp " . number_format($key['value'],0,',','.') .'<br /> Tanggal ' . $key['spt_date'].'<br /> <br /> ';
            //         break;
            //     case 'PIUTANG LAIN-LAIN PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA':
            //         echo $key['description'] . ' = ' . "Rp " . number_format($key['value'],0,',','.') .'<br /> Tanggal ' . $key['spt_date'].'<br /> <br /> ';
            //         break;
            //     default:
            //         break;
            // }
        }
        $piutang = $piutang/2;
        if ($piutang == 0) {
            $perputaran_piutang = 0;
        } else{
            $perputaran_piutang = $this->get_days_sales_outstanding($user_id,$month,'PENJUALAN BERSIH')['value']/$piutang;
        }
        return $perputaran_piutang;
    }

    public function get_hutang_usaha($user_id,$date)
    {
        $num = $this->db->query("SELECT st.*, stc.* FROM spt_tahunan_client stc INNER JOIN spt_tahunan st ON st.id = stc.spt_tahunan_id  WHERE stc.client_id = ".$user_id." AND stc.spt_date = '$date'
        ")-> result_array();
        $hutang =0;
        $akun_hutang = ['HUTANG USAHA PIHAK KETIGA','HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','HUTANG USAHA JANGKA PANJANG PIHAK LAIN','HUTANG USAHA JANGKA PANJANG PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA'];
        foreach ($num as $key) {
            if (in_array($key['description'],$akun_hutang)) {
                $hutang = $hutang + $key['value'];
            }
        }
        $hutang = $hutang/4;
        if ($hutang == 0) {
            $hutang = 0;
        } else{
            
        $hutang = $this->get_days_sales_outstanding($user_id,$date,"PEMBELIAN")['value']/$hutang;
        }
        return $hutang;
    }
    
    public function getOrderByMonth($id,$date)
    {
        return $this->db->query("SELECT `order`.*,services.service_name,services.description FROM `order` inner join services on `order`.service_id = services.id  where `order`.id = $id AND YEAR(`order`.create_date) = '".$date['year']."' AND MONTH(`order`.create_date) = '".$date['month']."';")->row_array();
    }
    public function getDataOrderByMonth($order_id,$date)
    {
        return $this->db->query("SELECT o.*, u.name, u.address AS client_address, u.phone AS client_phone,u.position AS client_position,u.email, c.company,c.image AS company_image, services.service_name, services.id AS service_id, p.employee_name AS partner_name, p.image AS partner_image,  p.address AS partner_address, p.phone AS partner_phone, p.id AS partner_id, m.employee_name AS manager_name, m.image AS manager_image, m.phone AS manager_phone, m.id AS manager_id, s.employee_name AS supervisor_name, s.image AS supervisor_image, s.phone AS supervisor_phone, s.id AS supervisor_id FROM `order` o JOIN user u ON u.id = o.user_id JOIN company c ON c.id = u.company_id JOIN employee p ON p.id = o.partner_id JOIN employee m ON m.id = o.manager_id JOIN employee s ON s.id = o.supervisor_id JOIN services ON services.id = o.service_id WHERE o.id = $order_id  AND YEAR(o.create_date) = '".$date['year']."' AND MONTH(o.create_date) = '".$date['month']."';")->row_array();
    }   
    public function getQuoteMonthly($user_id,$date)
    {
        return $this->db->query("SELECT q.*, t.title_quote FROM quote_for_client_monthly q INNER JOIN title_quote t ON t.id = q.title_id WHERE q.client_id = ".$user_id." AND MONTH(q.date) = '".date('m', strtotime($date))."';")->result_array();
    }
    public function getQuoteYear($user_id,$date)
    {
        return $this->db->query("SELECT q.*, t.title_quote FROM quote_for_client_year q INNER JOIN title_quote t ON t.id = q.title_id WHERE q.client_id = ".$user_id." AND date= '".$date."' order by t.id;")->result_array();
    }
    public function getListYear($id)
    {
        return $this->db->query("SELECT DISTINCT spt_date AS tahun FROM spt_tahunan_client_pertahun WHERE client_id =" .$id ." order by spt_date")->result_array();
    }
    public function getListYearForMonth($id)
    {
        return $this->db->query("SELECT  DISTINCT DATE_FORMAT(spt_date, '%Y-%m-%d') AS bulan FROM spt_tahunan_client WHERE client_id =" .$id ." order by spt_date")->result_array();
    }
}