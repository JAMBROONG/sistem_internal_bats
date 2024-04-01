<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends CI_Controller {
	public function __construct(){
        parent:: __construct();
		if ($this->session->userdata('status') != "login") {
            redirect('Login');
        }
        if (isset($_GET['key'])) {
            # code...
        }
		else if ($this->session->userdata('status_id') != 3) {
			redirect('Logout');
        }
        $this->load->model('M_finance');
    }
    public function validateId($tbl,$int){if ($int == "") {redirect("Logout");} else {if (is_numeric($int)) {if ($this->M_table->totalByCon($tbl, "id", $int) == 0) {redirect('Logout');} else {return true;}}else{redirect("Logout");}}}
    public function finance_month(){
        $user_id = $this->input->get('user_id') ?: $this->input->post('user_id');
        $date = $this->input->get('date') ?: $this->input->post('date');
        if (!$user_id && !$date) {
            return $this->output->set_status_header(404)->set_output('404');
        }
        $this->validateId('user',$user_id);
        $data['user_id']                      = $user_id;
        $data['date']                         = $date;
        $data['sptClientBulanan']             = $this->M_table->get_spt_client($user_id,$date."-02");
        $data["company_type"]                 = $this->M_table->getByCon('type_company','id', $this->M_table->getByCon('type_company_client','client_id', $user_id)['type_company']);
        $data["client"]                       = $this->M_user->profile($user_id);

        $data['data_tambahan']                = $this->M_table->dataTableWhere("spt_tambahan_sementara","user_id",$user_id . " AND date =  '".$date."-02'");
        $newArray = array();
        foreach ($data['data_tambahan'] as $item) {
            $newArray[$item['description']] = $item['value'];
        }
        $data['data_tambahan'] = $newArray;
        $data['cash_management']              = $this->cash_manajement_dashboard_month($user_id,$date);
        $data['kpi_dashboard']                = $this->financial_kpi_dashboard_month($user_id,$date);
        $data['profit_and_loss_dashboard']    = $this->profit_and_loss_dashboard_month($user_id,$date);
        $data['cfo_dashboard']                = $this->cfo_dashboard_month($user_id,$date.'-02');
        
        $data['financial_performance_dashboard']                = $this->financial_performance_dashboard_month($user_id,$date);
        $data['komentar'] = $this->M_table->dataTableWhere('tabel_komentar_financial_dashboard','user_id',$user_id . ' order by updated_at DESC');
        $this->load->view('superAdmin/finance_preview/month/index',$data);
    }
    public function finance_year(){
        $user_id = $this->input->get('user_id') ?: $this->input->post('user_id');
        $date = $this->input->get('date') ?: $this->input->post('date');
        if (!$user_id && !$date) {
            return $this->output->set_status_header(404)->set_output('404');
        }
        $this->validateId('user',$user_id);
        if (preg_match('/^\d{4}$/', $date)) {
            
            $data['data_tambahan']                = $this->M_table->dataTableWhere("spt_tambahan_sementara_pertahun","user_id",$user_id . " AND date =  '".$date."'");
            $newArray = array();
            foreach ($data['data_tambahan'] as $item) {
                $newArray[$item['description']] = $item['value'];
            }
            
        $data['data_tambahan'] = $newArray;
            if (!in_array($date,array_column( $this->M_finance->getListYear($user_id), 'tahun'))) {
                return $this->load->view('errors/error_request.html');
            }
            $data['user_id']                      = $user_id;
            $data['date']                         = $date;
            $data['list_year']       = $this->M_finance->getListYear($user_id);
            $data['sptClientBulanan']             = $this->M_table->get_spt_clientDate_year($user_id,$date);
            $data["company_type"]                 = $this->M_table->getByCon('type_company','id', $this->M_table->getByCon('type_company_client','client_id', $user_id)['type_company']);
            $data["client"]                       = $this->M_user->profile($user_id);
            $data['cash_management']              = $this->cash_manajement_dashboard_year($user_id,$date);
            $data['kpi_dashboard']                = $this->financial_kpi_dashboard_year($user_id,$date);
            $data['profit_and_loss_dashboard']    = $this->profit_and_loss_dashboard_year($user_id,$date);
            $data['cfo_dashboard']                = $this->cfo_dashboard_year($user_id,$date);
            $data['financial_performance_dashboard']                = $this->financial_performance_dashboard_year($user_id,$date);
            $this->load->view('superAdmin/finance_preview/year/index',$data);
        } else {
            echo "Error";
        }
    }
    public function cash_manajement_dashboard_month($user_id,$date)
    {
        $data_spt = $this->M_table->get_spt_client($user_id,$date."-02");

        // QUICK ASET DAN CURRENT ASET

        $data_aset = 0;
        $current_aset = 0;
        $assets = ['KAS DAN SETARA KAS','INVESTASI SEMENTARA','PIUTANG USAHA PIHAK KETIGA','PERSEDIAAN','PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','PIUTANG LAIN-LAIN PIHAK KETIGA','PIUTANG LAIN-LAIN PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','PENYISIHAN PIUTANG RAGU-RAGU','BEBAN DIBAYAR DI MUKA','UANG MUKA PEMBELIAN','AKTIVA LANCAR LAINNYA'];
        $number = 1;
        foreach ($data_spt as $key) {
            if (in_array($key['description'],$assets)) {
                $current_aset = $current_aset  + $key['value'];
                if($key['description'] == 'PENYISIHAN PIUTANG RAGU-RAGU' || $key['description'] == 'PERSEDIAAN'){
                    continue;
                }
                $data_aset = $data_aset + $key['value'];
            }
            $number++;
        }
        $num_current_liabilities = 0;
        $liabilities = ['HUTANG USAHA PIHAK KETIGA','HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','HUTANG BUNGA','HUTANG PAJAK','HUTANG DIVIDEN','BIAYA YANG MASIH HARUS DIBAYAR','HUTANG BANK','BAGIAN HUTANG JANGKA PANJANG YANG JATUH TEMPO DALAM TAHUN BERJALAN','UANG MUKA PELANGGAN','KEWAJIBAN LANCAR LAINNYA'];
        foreach ($data_spt as $key2) {
            if (in_array($key2['description'],$liabilities)) {
                $num_current_liabilities = $num_current_liabilities + $key2['value'];
            }
        }
        $num_current_aset =  $current_aset;
        if ($num_current_liabilities == 0) {
            $quick_aset =  0;
            $current_aset =  0;
        }else{
            $quick_aset =  $data_aset/$num_current_liabilities;
            $current_aset =  $current_aset/$num_current_liabilities;
        }
        // CASH | at end of month
        $cash_end_of_month = $this->M_finance->get_cash_end_of_month($user_id,$date.'-02');

        // print_r($cash_end_of_month);
        // die;
        //CASH LATEST
        $cash_latest= $this->M_finance->get_cash_in_month($user_id,$date.'-02');

        $cash_latest['value'] = $cash_latest['value'] ?? 0;


        // DAYS SALES OUTSTANDING
        $num = $this->M_finance->get_days_sales_outstanding2($user_id,$date.'-02',"PIUTANG USAHA PIHAK KETIGA")['value'] + $this->M_finance->get_days_sales_outstanding2($user_id,$date.'-02',"PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA")['value'];
        if ($num) {
            $num = $this->M_finance->get_days_sales_outstanding2($user_id,$date.'-02',"PENJUALAN BERSIH")['value']/($num);
            if ($num != 0) {
                $days_sales_outstanding =  365/$num;
            } else{
                $days_sales_outstanding = 0;
            }
        } else{
            $days_sales_outstanding = 0;
        }
        //DAYS PAYABLE OUTSTANDING
        $num = ($this->M_finance->get_days_sales_outstanding2($user_id,$date.'-02',"HUTANG USAHA PIHAK KETIGA")['value'] + $this->M_finance->get_days_sales_outstanding2($user_id,$date.'-02',"HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA")['value']);
        if ($num) {
            $num =  $this->M_finance->get_days_sales_outstanding2($user_id,$date.'-02',"HARGA POKOK PENJUALAN")['value'] / $num;
            if ($num != 0) {
                $days_payable_outstanding =  365/$num ;
            } else{
                $days_payable_outstanding = 0;
            }
        } else{
            $days_payable_outstanding = 0;
        }
        
        //DAYS inventory OUTSTANDING
        $num = ($this->M_finance->get_days_sales_outstanding2($user_id,$date.'-02',"PERSEDIAAN")['value']);
        if ($num) {
            $num =  $this->M_finance->get_days_sales_outstanding2($user_id,$date.'-02',"HARGA POKOK PENJUALAN")['value'] / $num;
            if ($num != 0) {
                $days_inventory_outstanding =  365/$num ;
            } else{
                $days_inventory_outstanding = 0;
            }
        } else{
            $days_inventory_outstanding = 0;
        }
        
        //AR TURNOVER
        $start_date = $date.'-02'; // tanggal yang ingin ditampilkan
        $year = date('Y', strtotime($start_date)); // ambil tahun dari tanggal tersebut
        $a_turnover = [];
        $inventory = [];
        // loop untuk menampilkan bulan-bulan sebelumnya
        while (strtotime($start_date) >= strtotime($year . '-01-01')) {
            $data_spt = $this->M_table->get_spt_client($user_id,$start_date);

            $toArr['date'] = date('Y-m', strtotime($start_date)) . "-02";
            $num_i['date'] = date('Y-m', strtotime($start_date)) . "-02";
            // $toArr['value_ar'] = intval( $this->M_finance->get_rata_rata_piutang_bulanan($user_id,date('Y-m', strtotime($start_date)) . "-02"));
            
            $num2 = $this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"PIUTANG USAHA PIHAK KETIGA")['value'] + $this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA")['value'];
            if ($num2 == 0) {
                $num2 = 1;
            }
            $num2 = $this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"PENJUALAN BERSIH")['value']/$num2;
            $toArr['value_ar'] = $num2;
            // $toArr['value_ap'] = intval($this->M_finance->get_hutang_usaha($user_id,date('Y-m', strtotime($start_date)) . "-02"));
            
            $num3 = ($this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"HUTANG USAHA PIHAK KETIGA")['value'] + $this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA")['value']);
            if ($num3 == 0) {
                $num3 = 1;
            }
            $num3 =  $this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"HARGA POKOK PENJUALAN")['value'] / $num3;
            $toArr['value_ap'] =  $num3;

            $num_i['value']= $this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"PERSEDIAAN")['value'];
            array_push($a_turnover, $toArr); 
            array_push($inventory, $num_i);
            
            $data_aset = 0;
            $current_aset2 = 0;
            $assets = ['KAS DAN SETARA KAS','INVESTASI SEMENTARA','PIUTANG USAHA PIHAK KETIGA','PERSEDIAAN','PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','PIUTANG LAIN-LAIN PIHAK KETIGA','PIUTANG LAIN-LAIN PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','PENYISIHAN PIUTANG RAGU-RAGU','BEBAN DIBAYAR DI MUKA','UANG MUKA PEMBELIAN','AKTIVA LANCAR LAINNYA'];
            $number = 1;
            foreach ($data_spt as $key) {
                if (in_array($key['description'],$assets)) {
                    $current_aset2 = $current_aset2  + $key['value'];
                    if($key['description'] == 'PENYISIHAN PIUTANG RAGU-RAGU' || $key['description'] == 'PERSEDIAAN'){
                        continue;
                    }
                    $data_aset = $data_aset + $key['value'];
                }
                $number++;
            }
            $num_current_liabilities = 0;
            $liabilities = ['HUTANG USAHA PIHAK KETIGA','HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','HUTANG BUNGA','HUTANG PAJAK','HUTANG DIVIDEN','BIAYA YANG MASIH HARUS DIBAYAR','HUTANG BANK','BAGIAN HUTANG JANGKA PANJANG YANG JATUH TEMPO DALAM TAHUN BERJALAN','UANG MUKA PELANGGAN','KEWAJIBAN LANCAR LAINNYA'];
            foreach ($data_spt as $key2) {
                if (in_array($key2['description'],$liabilities)) {
                    $num_current_liabilities = $num_current_liabilities + $key2['value'];
                }
            }
            $num_current_aset =  $current_aset2;
            if ($num_current_liabilities == 0) {
                $quick_aset2 =  0;
                $current_aset2 =  0;
            }else{
                $quick_aset2 =  $data_aset/$num_current_liabilities;
                $current_aset2 =  $current_aset2/$num_current_liabilities;
            }
            $quick_aset_arr[] = array(
                'bulan' => date('Y-m', strtotime($start_date)),
                'value' => $quick_aset2
              );
            $current_aset_arr[] = array(
                'bulan' => date('Y-m', strtotime($start_date)),
                'value' => $current_aset2
            );

            $start_date = date('Y-m-d', strtotime('-1 month', strtotime($start_date))); 
        }
        return array(
            'quick_ratio' => $quick_aset,
            'current_ratio' => $current_aset,
            'num_current_aset' => $num_current_aset,
            'cash_end_of_month' => $cash_end_of_month,
            'cash_latest' => $cash_latest,
            'days_sales_outstanding' => $days_sales_outstanding,
            'days_payable_outstanding' => $days_payable_outstanding,
            'num_current_liabilities' => $num_current_liabilities,
            'days_inventory_outstanding' => $days_inventory_outstanding,
            'a_turnover' => array_reverse($a_turnover),
            'inventory' => array_reverse($inventory),
            'quick_aset_arr' => array_reverse($quick_aset_arr),
            'current_aset_arr' => array_reverse($current_aset_arr)
        );
    }
    public function cash_manajement_dashboard_year($user_id,$date)
    {
        
        $quick_aset_arr = array();
        foreach ($this->M_finance->getListYear($user_id) as $key1) {
            $data_spt = $this->M_table->get_spt_clientDate_year($user_id,$key1['tahun']);

            // QUICK ASET DAN CURRENT ASET

            $data_aset = 0;
            $current_aset = 0;
            $assets = ['KAS DAN SETARA KAS','INVESTASI SEMENTARA','PIUTANG USAHA PIHAK KETIGA','PERSEDIAAN','PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','PIUTANG LAIN-LAIN PIHAK KETIGA','PIUTANG LAIN-LAIN PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','PENYISIHAN PIUTANG RAGU-RAGU','BEBAN DIBAYAR DI MUKA','UANG MUKA PEMBELIAN','AKTIVA LANCAR LAINNYA'];
            $number = 1;
            foreach ($data_spt as $key) {
                if (in_array($key['description'],$assets)) {
                    $current_aset = $current_aset  + $key['value'];
                    if($key['description'] == 'PENYISIHAN PIUTANG RAGU-RAGU' || $key['description'] == 'PERSEDIAAN'){
                        continue;
                    }
                    $data_aset = $data_aset + $key['value'];
                }
                $number++;
            }
            $num_current_liabilities = 0;
            $liabilities = ['HUTANG USAHA PIHAK KETIGA','HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','HUTANG BUNGA','HUTANG PAJAK','HUTANG DIVIDEN','BIAYA YANG MASIH HARUS DIBAYAR','HUTANG BANK','BAGIAN HUTANG JANGKA PANJANG YANG JATUH TEMPO DALAM TAHUN BERJALAN','UANG MUKA PELANGGAN','KEWAJIBAN LANCAR LAINNYA'];
            foreach ($data_spt as $key2) {
                if (in_array($key2['description'],$liabilities)) {
                    $num_current_liabilities = $num_current_liabilities + $key2['value'];
                }
            }
            $num_current_aset =  $current_aset;
            if ($num_current_liabilities == 0) {
                $quick_aset =  0;
                $current_aset =  0;
            }else{
                $quick_aset =  $data_aset/$num_current_liabilities;
                $current_aset =  $current_aset/$num_current_liabilities;
            }
            $quick_aset_arr[] = array(
                'tahun' => $key1['tahun'],
                'value' => $quick_aset
              );
            $current_aset_arr[] = array(
                'tahun' => $key1['tahun'],
                'value' => $current_aset
            );
        }   
        $data_spt = $this->M_table->get_spt_clientDate_year($user_id,$date);

        // QUICK ASET DAN CURRENT ASET

        $data_aset = 0;
        $current_aset = 0;
        $assets = ['KAS DAN SETARA KAS','INVESTASI SEMENTARA','PIUTANG USAHA PIHAK KETIGA','PERSEDIAAN','PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','PIUTANG LAIN-LAIN PIHAK KETIGA','PIUTANG LAIN-LAIN PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','PENYISIHAN PIUTANG RAGU-RAGU','BEBAN DIBAYAR DI MUKA','UANG MUKA PEMBELIAN','AKTIVA LANCAR LAINNYA'];
        $number = 1;
        foreach ($data_spt as $key) {
            if (in_array($key['description'],$assets)) {
                $current_aset = $current_aset  + $key['value'];
                if($key['description'] == 'PENYISIHAN PIUTANG RAGU-RAGU' || $key['description'] == 'PERSEDIAAN'){
                    continue;
                }
                $data_aset = $data_aset + $key['value'];
            }
            $number++;
        }
        $num_current_liabilities = 0;
        $liabilities = ['HUTANG USAHA PIHAK KETIGA','HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','HUTANG BUNGA','HUTANG PAJAK','HUTANG DIVIDEN','BIAYA YANG MASIH HARUS DIBAYAR','HUTANG BANK','BAGIAN HUTANG JANGKA PANJANG YANG JATUH TEMPO DALAM TAHUN BERJALAN','UANG MUKA PELANGGAN','KEWAJIBAN LANCAR LAINNYA'];
        foreach ($data_spt as $key2) {
            if (in_array($key2['description'],$liabilities)) {
                $num_current_liabilities = $num_current_liabilities + $key2['value'];
            }
        }
        $num_current_aset =  $current_aset;
        if ($num_current_liabilities == 0) {
            $quick_aset =  0;
            $current_aset =  0;
        }else{
            $quick_aset =  $data_aset/$num_current_liabilities;
            $current_aset =  $current_aset/$num_current_liabilities;
        }
        // CASH | at end of month
        $cash_end_of_month = $this->M_finance->get_cash_end_of_year($user_id,$date);

        // print_r($cash_end_of_month);
        // die;
        //CASH LATEST
        $cash_latest= $this->M_finance->get_cash_in_year($user_id,$date);

        $cash_latest['value'] = $cash_latest['value'] ?? 0;


        // DAYS SALES OUTSTANDING
        $num = $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"PIUTANG USAHA PIHAK KETIGA")['value'] + $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA")['value'];
        if ($num) {
            $num = $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"PENJUALAN BERSIH")['value']/($num);
            if ($num != 0) {
                $days_sales_outstanding =  365/$num;
            } else{
                $days_sales_outstanding = 0;
            }
        } else{
            $days_sales_outstanding = 0;
        }
        //DAYS PAYABLE OUTSTANDING
        $num = ($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"HUTANG USAHA PIHAK KETIGA")['value'] + $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA")['value']);
        if ($num) {
            $num =  $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"HARGA POKOK PENJUALAN")['value'] / $num;
            if ($num != 0) {
                $days_payable_outstanding =  365/$num ;
            } else{
                $days_payable_outstanding = 0;
            }
        } else{
            $days_payable_outstanding = 0;
        }
        
        //DAYS inventory OUTSTANDING
        $num = ($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"PERSEDIAAN")['value']);
        if ($num) {
            $num =  $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"HARGA POKOK PENJUALAN")['value'] / $num;
            if ($num != 0) {
                $days_inventory_outstanding =  365/$num ;
            } else{
                $days_inventory_outstanding = 0;
            }
        } else{
            $days_inventory_outstanding = 0;
        }
        
        $a_turnover = [];
        $inventory = [];
        // loop untuk menampilkan bulan-bulan sebelumnya
        foreach ($this->M_finance->get_cash_end_of_year($user_id,$date) as $key) {
            $toArr['date'] =  $key['spt_date'];
            $num_i['date'] =  $key['spt_date'];
            
            
            $num2 = $this->M_finance->get_days_sales_outstanding2_year($user_id,$key['spt_date'],"PIUTANG USAHA PIHAK KETIGA")['value'] + $this->M_finance->get_days_sales_outstanding2_year($user_id,$key['spt_date'],"PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA")['value'];
            if ($num2 == 0) {
                $num2 = 1;
            }
            $num2 = $this->M_finance->get_days_sales_outstanding2_year($user_id,$key['spt_date'],"PENJUALAN BERSIH")['value']/$num2;
            $toArr['value_ar'] = $num2;
            // $toArr['value_ap'] = intval($this->M_finance->get_hutang_usaha($user_id,date('Y-m', strtotime($date)) . "-02"));
            
            $num3 = ($this->M_finance->get_days_sales_outstanding2_year($user_id,$key['spt_date'],"HUTANG USAHA PIHAK KETIGA")['value'] + $this->M_finance->get_days_sales_outstanding2_year($user_id,$key['spt_date'],"HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA")['value']);
            if ($num3 == 0) {
                $num3 = 1;
            }
            $num3 =  $this->M_finance->get_days_sales_outstanding2_year($user_id,$key['spt_date'],"HARGA POKOK PENJUALAN")['value'] / $num3;
            $toArr['value_ap'] =  $num3;

            $num_i['value']= $this->M_finance->get_days_sales_outstanding2_year($user_id,$key['spt_date'],"PERSEDIAAN")['value'];
            array_push($a_turnover, $toArr); 
            array_push($inventory, $num_i); 
            
        }
        return array(
            'quick_ratio' => $quick_aset,
            'current_ratio' => $current_aset,
            'num_current_aset' => $num_current_aset,
            'cash_end_of_month' => $cash_end_of_month,
            'cash_latest' => $cash_latest,
            'days_sales_outstanding' => $days_sales_outstanding,
            'days_payable_outstanding' => $days_payable_outstanding,
            'num_current_liabilities' => $num_current_liabilities,
            'days_inventory_outstanding' => $days_inventory_outstanding,
            'a_turnover' => $a_turnover,
            'inventory' => $inventory,
            'quick_aset_arr' => $quick_aset_arr,
            'current_aset_arr' => $current_aset_arr
        );
    }
    public function financial_kpi_dashboard_month($user_id, $date)
    {
        $date = $date.'-2';
        $start_date = $date;
        $year = date('Y', strtotime($start_date));
        $inventory_month_to_month = [];
        // loop untuk menampilkan bulan-bulan sebelumnya
        while (strtotime($start_date) >= strtotime($year . '-01-01')) {
            $toArr['date'] = $start_date;

            // DAYS SALES OUTSTANDING
            $num = $this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"PIUTANG USAHA PIHAK KETIGA")['value'] + $this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA")['value'];
            if ($num != 0) {
                $num = $this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"PENJUALAN BERSIH")['value']/($num);
                $toArr['dso']  = ($num == 0) ? 0 : round(365/$num);
            } else{
                $toArr['dso'] = 0;
            }
            //DAYS PAYABLE OUTSTANDING
            $num = ($this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"HUTANG USAHA PIHAK KETIGA")['value'] + $this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA")['value']);
            if ($num != 0) {
                $num =  $this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"HARGA POKOK PENJUALAN")['value'] / $num;
                $toArr['dpo']  = ($num == 0) ? 0 : round(365/$num);
            } else{
                $toArr['dpo'] = 0;
            }
            
            //DAYS inventory OUTSTANDING
            $num = ($this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"PERSEDIAAN")['value']);
            if ($num != 0) {
                $num =  $this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"HARGA POKOK PENJUALAN")['value'] / $num;
                $toArr['dio']  = ($num == 0) ? 0 : round(365/$num);
            } else{
                $toArr['dio'] = 0;
            }
            $toArr['ccc'] = round($toArr['dso'] + $toArr['dpo'] - $toArr['dio']);
            array_push($inventory_month_to_month, $toArr); 
            $start_date = date('Y-m-d', strtotime('-1 month', strtotime($start_date))); 
        }
        // print_r($inventory_month_to_month);
        // die;

        return array(
            'cc_mtm' => array_reverse($inventory_month_to_month)
        );
    }
    public function financial_kpi_dashboard_year($user_id, $date)
    {
        $inventory_month_to_month = [];
        
        foreach ($this->M_finance->get_cash_end_of_year($user_id,$date) as $key) {

        // loop untuk menampilkan bulan-bulan sebelumnya
            $toArr['date'] = $key['spt_date'];

            // DAYS SALES OUTSTANDING
            $num = $this->M_finance->get_days_sales_outstanding2_year($user_id,$key['spt_date'],"PIUTANG USAHA PIHAK KETIGA")['value'] + $this->M_finance->get_days_sales_outstanding2_year($user_id,$key['spt_date'],"PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA")['value'];
            if ($num != 0) {
                $num = $this->M_finance->get_days_sales_outstanding2_year($user_id,$key['spt_date'],"PENJUALAN BERSIH")['value']/($num);
                $toArr['dso']  = ($num == 0) ? 0 : round(365/$num);
            } else{
                $toArr['dso'] = 0;
            }
            //DAYS PAYABLE OUTSTANDING
            $num = ($this->M_finance->get_days_sales_outstanding2_year($user_id,$key['spt_date'],"HUTANG USAHA PIHAK KETIGA")['value'] + $this->M_finance->get_days_sales_outstanding2_year($user_id,$key['spt_date'],"HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA")['value']);
            if ($num != 0) {
                $num =  $this->M_finance->get_days_sales_outstanding2_year($user_id,$key['spt_date'],"HARGA POKOK PENJUALAN")['value'] / $num;
                $toArr['dpo']  = ($num == 0) ? 0 : round(365/$num);
            } else{
                $toArr['dpo'] = 0;
            }
            
            //DAYS inventory OUTSTANDING
            $num = ($this->M_finance->get_days_sales_outstanding2_year($user_id,$key['spt_date'],"PERSEDIAAN")['value']);
            if ($num != 0) {
                $num =  $this->M_finance->get_days_sales_outstanding2_year($user_id,$key['spt_date'],"HARGA POKOK PENJUALAN")['value'] / $num;
                $toArr['dio']  = ($num == 0) ? 0 : round(365/$num);
            } else{
                $toArr['dio'] = 0;
            }
            $toArr['ccc'] = round($toArr['dso'] + $toArr['dpo'] - $toArr['dio']);
            array_push($inventory_month_to_month, $toArr); 
        }
        
        // print_r($inventory_month_to_month);
        // die;

        return array(
            'cc_mtm' => $inventory_month_to_month
        );
    }

    public function profit_and_loss_dashboard_month($user_id, $date)
    {
        $date = $date.'-2';
        $start_date = $date;
        $year = date('Y', strtotime($start_date));
        $gpm =  $this->M_finance->get_days_sales_outstanding($user_id,$start_date,"LABA KOTOR")['value'] / $this->M_finance->get_days_sales_outstanding($user_id,$start_date,"PENJUALAN BERSIH")['value'];
        $gpm = ($gpm == 1) ? 0 : $gpm;
        $opex = ($this->M_finance->get_days_sales_outstanding($user_id,$start_date,"BEBAN PENJUALAN")['value']+$this->M_finance->get_days_sales_outstanding($user_id,$start_date,"BEBAN ADMINISTRASI DAN UMUM")['value'])/$this->M_finance->get_days_sales_outstanding($user_id,$start_date,"PENJUALAN BERSIH")['value'];
        $opex = ($opex == 2) ? 0 : $opex;
        $opm = $this->M_finance->get_days_sales_outstanding($user_id,$start_date,"LABA USAHA")['value'] / $this->M_finance->get_days_sales_outstanding($user_id,$start_date,"PENJUALAN BERSIH")['value'];
        $opm = ($opm == 1) ? 0 : $opm;
        $npm = $this->M_finance->get_days_sales_outstanding($user_id,$start_date,"LABA BERSIH")['value'] / $this->M_finance->get_days_sales_outstanding($user_id,$start_date,"PENJUALAN BERSIH")['value'];
        $npm = ($npm == 1) ? 0 : $npm;

        $ebit_arr = [];
        $opex_arr = [];
        $sales_arr = [];

        while (strtotime($start_date) >= strtotime($year . '-01-01')) {
            $toArr['date'] = $start_date;
            $num = ($this->M_finance->get_days_sales_outstanding($user_id,$start_date,"BEBAN PENJUALAN")['value']+$this->M_finance->get_days_sales_outstanding($user_id,$start_date,"BEBAN ADMINISTRASI DAN UMUM")['value'])/$this->M_finance->get_days_sales_outstanding($user_id,$start_date,"PENJUALAN BERSIH")['value'];
            $toArr['opex'] = ($num == 2) ? 0 : round( $num * 100,1);
            $toArr['ga'] = $this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"BEBAN ADMINISTRASI DAN UMUM")['value'];
            $toArr['ms'] = $this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"BEBAN PENJUALAN")['value'];
            $ebit['ebit_target'] = $this->M_table->getByCon("spt_tambahan_sementara", "description", "'EBIT Target' " . " AND  date = '" . $start_date . "' AND  user_id = $user_id");
            if(empty($ebit['ebit_target'])){
                $ebit['ebit_target'] = 0;
            } else{
                $ebit['ebit_target'] = $ebit['ebit_target']['value'];
            }
            $ebit['ebit_actual'] =  $this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"LABA USAHA")['value'];
            $ebit['date'] = $start_date;
            $toSales['date'] = $start_date;
            $toSales['ns'] = round( $this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"PENJUALAN BERSIH")['value'],1);
            $toSales['cogs'] =  round($this->M_finance->get_days_sales_outstanding2($user_id,$start_date,"HARGA POKOK PENJUALAN")['value'],1);
            array_push($sales_arr, $toSales); 
            array_push($opex_arr, $toArr); 
            array_push($ebit_arr, $ebit);            
            $start_date = date('Y-m-d', strtotime('-1 month', strtotime($start_date))); 
        }
        
        $ga = $this->M_finance->get_days_sales_outstanding2($user_id,$date,"BEBAN ADMINISTRASI DAN UMUM")['value'];
        $ms = $this->M_finance->get_days_sales_outstanding2($user_id,$date,"BEBAN PENJUALAN")['value'];
        if ($ga != 0 && $ms != 0) {
            $ga2 = ($ga+$ms);
            $ga2 = $ga / ($ga2);
            $ga2 = $ga2 * 100;

            
            $ms2 = ($ga+$ms);
            $ms2 = $ms / ($ms2);
            $ms2 = $ms2 * 100;
        }else{
            $ga2 = 50;
            $ms2 = 50;
        }
        $chartOpex = array (
            'ga' =>$ga2,
            'ms' =>  $ms2
        );
        return array(
            'gpm' => round($gpm * 100,1),
            'opex' => round($opex * 100,1),
            'opm' => round($opm * 100,1),
            'npm' => round($npm * 100,1),
            'opex_arr' => array_reverse($opex_arr),
            'ebit_arr' => array_reverse($ebit_arr),
            'chartOpex' => $chartOpex,
            'sales_arr' => array_reverse($sales_arr)
        );
    }
    public function profit_and_loss_dashboard_year($user_id, $date)
    {
        $gpm =  $this->M_finance->get_days_sales_outstanding_year($user_id,$date,"LABA KOTOR")['value'] / $this->M_finance->get_days_sales_outstanding_year($user_id,$date,"PENJUALAN BERSIH")['value'];
        $gpm = ($gpm == 1) ? 0 : $gpm;
        $opex = ($this->M_finance->get_days_sales_outstanding_year($user_id,$date,"BEBAN PENJUALAN")['value']+$this->M_finance->get_days_sales_outstanding_year($user_id,$date,"BEBAN ADMINISTRASI DAN UMUM")['value'])/$this->M_finance->get_days_sales_outstanding_year($user_id,$date,"PENJUALAN BERSIH")['value'];
        $opex = ($opex == 2) ? 0 : $opex;
        $opm = $this->M_finance->get_days_sales_outstanding_year($user_id,$date,"LABA USAHA")['value'] / $this->M_finance->get_days_sales_outstanding_year($user_id,$date,"PENJUALAN BERSIH")['value'];
        $opm = ($opm == 1) ? 0 : $opm;
        $npm = $this->M_finance->get_days_sales_outstanding_year($user_id,$date,"LABA BERSIH")['value'] / $this->M_finance->get_days_sales_outstanding_year($user_id,$date,"PENJUALAN BERSIH")['value'];
        $npm = ($npm == 1) ? 0 : $npm;

        $ebit_arr = [];
        $opex_arr = [];
        $sales_arr = [];

        foreach ($this->M_finance->get_cash_end_of_year($user_id,$date) as $key) {
            $toArr['date'] =$key['spt_date'];
            $a = ($this->M_finance->get_days_sales_outstanding_year($user_id,$key['spt_date'],"PENJUALAN BERSIH")['value'] == 0) ? 0 : 1;
            $b = $this->M_finance->get_days_sales_outstanding_year($user_id,$key['spt_date'],"BEBAN PENJUALAN")['value'] + $this->M_finance->get_days_sales_outstanding_year($user_id,$key['spt_date'],"BEBAN ADMINISTRASI DAN UMUM")['value'];
           
            $num = $b/$a;
            $toArr['opex'] = ($num == 2) ? 0 : round( $num * 100,1);
            $toArr['ga'] = $this->M_finance->get_days_sales_outstanding_year($user_id,$key['spt_date'],"BEBAN ADMINISTRASI DAN UMUM")['value'];
            $toArr['ms'] = $this->M_finance->get_days_sales_outstanding_year($user_id,$key['spt_date'],"BEBAN PENJUALAN")['value'];
            $ebit['ebit_target'] = $this->M_table->getByCon("spt_tambahan_sementara", "description", "'EBIT Target' " . " AND  date = '" .$key['spt_date'] . "' AND  user_id = $user_id");
            if(empty($ebit['ebit_target'])){
                $ebit['ebit_target'] = 0;
            } else{
                $ebit['ebit_target'] = $ebit['ebit_target']['value'];
            }
            $ebit['ebit_actual'] =  $this->M_finance->get_days_sales_outstanding_year($user_id,$key['spt_date'],"LABA USAHA")['value'];
            $ebit['date'] =$key['spt_date'];
            $toSales['date'] =$key['spt_date'];
            $toSales['ns'] = round( $this->M_finance->get_days_sales_outstanding_year($user_id,$key['spt_date'],"PENJUALAN BERSIH")['value'],1);
            $toSales['cogs'] =  round($this->M_finance->get_days_sales_outstanding_year($user_id,$key['spt_date'],"HARGA POKOK PENJUALAN")['value'],1);
            array_push($sales_arr, $toSales); 
            array_push($opex_arr, $toArr); 
            array_push($ebit_arr, $ebit);            
        }
        
        $ga = $this->M_finance->get_days_sales_outstanding_year($user_id,$date,"BEBAN ADMINISTRASI DAN UMUM")['value'];
        $ms = $this->M_finance->get_days_sales_outstanding_year($user_id,$date,"BEBAN PENJUALAN")['value'];
        if ($ga != 0 && $ms != 0) {
            $ga2 = ($ga+$ms);
            $ga2 = $ga / ($ga2);
            $ga2 = $ga2 * 100;

            
            $ms2 = ($ga+$ms);
            $ms2 = $ms / ($ms2);
            $ms2 = $ms2 * 100;
        }else{
            $ga2 = 50;
            $ms2 = 50;
        }
        $chartOpex = array (
            'ga' =>$ga2,
            'ms' =>  $ms2
        );
        // print_r($chartOpex); die;
        return array(
            'gpm' => round($gpm * 100,1),
            'opex' => round($opex * 100,1),
            'opm' => round($opm * 100,1),
            'npm' => round($npm * 100,1),
            'opex_arr' => $opex_arr,
            'ebit_arr' => $ebit_arr,
            'chartOpex' => $chartOpex,
            'sales_arr' => $sales_arr
        );
    }
    public function cfo_dashboard_month($user_id,$date)
    {
        if (!empty($this->M_finance->get_days_sales_outstanding2($user_id,$date,"PENJUALAN BERSIH")['target'])) {
            $revenue['value'] =  $this->M_finance->get_days_sales_outstanding2($user_id,$date,"PENJUALAN BERSIH")['value'];
            $revenue['target'] =  $this->M_finance->get_days_sales_outstanding2($user_id,$date,"PENJUALAN BERSIH")['target'];
            $revenue['realization'] = $this->M_finance->get_days_sales_outstanding2($user_id,$date,"PENJUALAN BERSIH")['realization'];
        } else{
            $revenue['value'] =  0;
            $revenue['target'] =  0;
            $revenue['realization'] = 0;
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2($user_id,$date,'LABA KOTOR')['value'])) {
            $gross_p['value'] = $this->M_finance->get_days_sales_outstanding2($user_id,$date,'LABA KOTOR')['value'];
            $gross_p['target'] = $this->M_finance->get_days_sales_outstanding2($user_id,$date,'LABA KOTOR')['target'];
            $gross_p['realization'] = $this->M_finance->get_days_sales_outstanding2($user_id,$date,"LABA KOTOR")['realization'];
        } else{
            $gross_p['value'] =  0;
            $gross_p['target'] =  0;
            $gross_p['realization'] = 0;
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2($user_id,$date,'LABA USAHA')['value'])) {
            $ebit['value'] = $this->M_finance->get_days_sales_outstanding2($user_id,$date,'LABA USAHA')['value'];
            $ebit['target'] = $this->M_finance->get_days_sales_outstanding2($user_id,$date,'LABA USAHA')['target'];
            $ebit['realization'] = $this->M_finance->get_days_sales_outstanding2($user_id,$date,"LABA USAHA")['realization'];
        } else{
            $ebit['value'] =  0;
            $ebit['target'] =  0;
            $ebit['realization'] = 0;
        }
        if ($this->M_finance->get_days_sales_outstanding2($user_id,$date,'PENGHASILAN/(BEBAN) LAIN')['value']) {
            $operating_e['value'] = $this->M_finance->get_days_sales_outstanding2($user_id,$date,'PENGHASILAN/(BEBAN) LAIN')['value'];
            $operating_e['target'] = $this->M_finance->get_days_sales_outstanding2($user_id,$date,'PENGHASILAN/(BEBAN) LAIN')['target'];
            $operating_e['realization'] = $this->M_finance->get_days_sales_outstanding2($user_id,$date,"PENGHASILAN/(BEBAN) LAIN")['realization'];
        }  else{
            $operating_e['value'] =  0;
            $operating_e['target'] =  0;
            $operating_e['realization'] = 0;
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2($user_id,$date,'LABA BERSIH')['value'])) {
            $net_income['value'] = $this->M_finance->get_days_sales_outstanding2($user_id,$date,'LABA BERSIH')['value'];
            $net_income['target'] = $this->M_finance->get_days_sales_outstanding2($user_id,$date,'LABA BERSIH')['target'];
            $net_income['realization'] = $this->M_finance->get_days_sales_outstanding2($user_id,$date,"LABA BERSIH")['realization'];
        } else{
            $net_income['value'] =  0;
            $net_income['target'] =  0;
            $net_income['realization'] = 0;
        }

        $breakdows['ga'] = $this->M_finance->get_days_sales_outstanding2($user_id,$date,"BEBAN ADMINISTRASI DAN UMUM")['value'];
        $breakdows['ms'] = $this->M_finance->get_days_sales_outstanding2($user_id,$date,"BEBAN PENJUALAN")['value'];

        // print_r($revenue);
        // echo "<br>";
        // print_r($gross_p);
        // echo "<br>";
        // print_r($ebit);
        // echo "<br>";
        // print_r($operating_e);
        // echo "<br>";
        // print_r($net_income);
        // die;

        return array(
            'revenue' => $revenue,
            'gross_p'=>$gross_p,
            'ebit' => $ebit,
            'operating_e' => $operating_e,
            'net_income' => $net_income,
            'breakdowns' => $breakdows
        );

    }
    public function cfo_dashboard_year($user_id,$date)
    {
        if (!empty($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"PENJUALAN BERSIH")['target'])) {
            $revenue['value'] =  $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"PENJUALAN BERSIH")['value'];
            $revenue['target'] =  $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"PENJUALAN BERSIH")['target'];
            $revenue['realization'] = $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"PENJUALAN BERSIH")['realization'];
        } else{
            $revenue['value'] =  0;
            $revenue['target'] =  0;
            $revenue['realization'] = 0;
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,'LABA KOTOR')['value'])) {
            $gross_p['value'] = $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,'LABA KOTOR')['value'];
            $gross_p['target'] = $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,'LABA KOTOR')['target'];
            $gross_p['realization'] = $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"LABA KOTOR")['realization'];
        } else{
            $gross_p['value'] =  0;
            $gross_p['target'] =  0;
            $gross_p['realization'] = 0;
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,'LABA USAHA')['value'])) {
            $ebit['value'] = $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,'LABA USAHA')['value'];
            $ebit['target'] = $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,'LABA USAHA')['target'];
            $ebit['realization'] = $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"LABA USAHA")['realization'];
        } else{
            $ebit['value'] =  0;
            $ebit['target'] =  0;
            $ebit['realization'] = 0;
        }
        if ($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,'PENGHASILAN/(BEBAN) LAIN')['value']) {
            $operating_e['value'] = $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,'PENGHASILAN/(BEBAN) LAIN')['value'];
            $operating_e['target'] = $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,'PENGHASILAN/(BEBAN) LAIN')['target'];
            $operating_e['realization'] = $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"PENGHASILAN/(BEBAN) LAIN")['realization'];
        }  else{
            $operating_e['value'] =  0;
            $operating_e['target'] =  0;
            $operating_e['realization'] = 0;
        }
        if (!empty($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,'LABA BERSIH')['value'])) {
            $net_income['value'] = $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,'LABA BERSIH')['value'];
            $net_income['target'] = $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,'LABA BERSIH')['target'];
            $net_income['realization'] = $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"LABA BERSIH")['realization'];
        } else{
            $net_income['value'] =  0;
            $net_income['target'] =  0;
            $net_income['realization'] = 0;
        }

        $breakdows['ga'] = $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"BEBAN ADMINISTRASI DAN UMUM")['value'];
        $breakdows['ms'] = $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"BEBAN PENJUALAN")['value'];
        return array(
            'revenue' => $revenue,
            'gross_p'=>$gross_p,
            'ebit' => $ebit,
            'operating_e' => $operating_e,
            'net_income' => $net_income,
            'breakdowns' => $breakdows
        );

    }
    public function get_aset_lancar_month($user_id, $date)
    {
        $data_spt = $this->M_table->get_spt_client($user_id,$date);
        $aset_lancar = 0;
        $assets = ['KAS DAN SETARA KAS','INVESTASI SEMENTARA','PIUTANG USAHA PIHAK KETIGA','PERSEDIAAN','PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','PIUTANG LAIN-LAIN PIHAK KETIGA','PIUTANG LAIN-LAIN PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','PENYISIHAN PIUTANG RAGU-RAGU','BEBAN DIBAYAR DI MUKA','UANG MUKA PEMBELIAN','AKTIVA LANCAR LAINNYA'];
        foreach ($data_spt as $key) {
            if (in_array($key['description'],$assets)) {
                $aset_lancar = $aset_lancar  + $key['value'];
            }
        }
        return $aset_lancar;
    }
    public function get_kewajiban_lancar_month($user_id, $date)
    {
        $data_spt = $this->M_table->get_spt_client($user_id,$date);
        $kewajiban_lancar = 0;
        $liabilities = ['HUTANG USAHA PIHAK KETIGA','HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','HUTANG BUNGA','HUTANG PAJAK','HUTANG DIVIDEN','BIAYA YANG MASIH HARUS DIBAYAR','HUTANG BANK','BAGIAN HUTANG JANGKA PANJANG YANG JATUH TEMPO DALAM TAHUN BERJALAN','UANG MUKA PELANGGAN','KEWAJIBAN LANCAR LAINNYA'];
        foreach ($data_spt as $key) {
            if (in_array($key['description'],$liabilities)) {
                $kewajiban_lancar = $kewajiban_lancar  + $key['value'];
            }
        }
        return $kewajiban_lancar;
    }
    public function get_total_aset_month($user_id,$date)
    {
        $jumlah = 0;
        foreach ($this->M_table->get_spt_client($user_id,$date . "' AND st.category_jumlah = 'Jumlah Asset") as $key) {
            $jumlah = $jumlah + $key['value'];
            
        }
        return $jumlah;
    }
    public function get_total_ekuitas_month($user_id,$date)
    {
        $jumlah = 0;
        $ekuitas = ['MODAL SAHAM','AGIO SAHAM (TAMBAHAN MODAL DISETOR)','LABA DITAHAN TAHUN-TAHUN SEBELUMNYA','LABA DITAHAN TAHUN INI','EKUITAS LAIN-LAIN'];
        foreach ($this->M_table->get_spt_client($user_id,$date) as $key) {
            if (in_array($key['description'],$ekuitas)) {
            $jumlah = $jumlah + $key['value'];
            }
            
        }
        return $jumlah;
    }
    public function get_total_kewajiban_month($user_id,$date)
    {
        $jumlah = 0;
        $kewajiban = ['HUTANG USAHA PIHAK KETIGA','HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','HUTANG BUNGA','HUTANG PAJAK','HUTANG DIVIDEN','BIAYA YANG MASIH HARUS DIBAYAR','HUTANG BANK','BAGIAN HUTANG JANGKA PANJANG YANG JATUH TEMPO DALAM TAHUN BERJALAN','UANG MUKA PELANGGAN','KEWAJIBAN LANCAR LAINNYA','HUTANG BANK JANGKA PANJANG','HUTANG USAHA JANGKA PANJANG PIHAK LAIN','HUTANG USAHA JANGKA PANJANG PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','KEWAJIBAN PAJAK TANGGUHAN','KEWAJIBAN TIDAK LANCAR LAINNYA'];
        foreach ($this->M_table->get_spt_client($user_id,$date) as $key) {
            if (in_array($key['description'],$kewajiban)) {
            $jumlah = $jumlah + $key['value'];
            }
            
        }
        return $jumlah;
    }
    public function get_current_liabilities_month($user_id,$date)
    {
        $jumlah = 0;
        $liabilities = ['HUTANG USAHA PIHAK KETIGA','HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','HUTANG BUNGA','HUTANG PAJAK','HUTANG DIVIDEN','BIAYA YANG MASIH HARUS DIBAYAR','HUTANG BANK','BAGIAN HUTANG JANGKA PANJANG YANG JATUH TEMPO DALAM TAHUN BERJALAN','UANG MUKA PELANGGAN','KEWAJIBAN LANCAR LAINNYA'];
        foreach ($this->M_table->get_spt_client($user_id,$date) as $key) {
            if (in_array($key['description'],$liabilities)) {
            $jumlah = $jumlah + $key['value'];
            }
        }
        return $jumlah;
    }
    public function cekVal($val)
    {
        if ($val == 0) {
            return 1;
        }
        return $val;
    }
    public function get_long_term_assets_month($user_id,$date)
    {
        $jumlah = 0;
        $asset_jangka_panjang = ['PIUTANG JANGKA PANJANG','TANAH DAN BANGUNAN','AKTIVA TETAP LAINNYA','AKUMULASI PENYUSUTAN','INVESTASI PADA PERUSAHAAN ASOSIASI','INVESTASI JANGKA PANJANG LAINNYA','HARTA TIDAK BERWUJUD','AKTIVA PAJAK TANGGUHAN','AKTIVA TIDAK LANCAR LAINNYA'];
        foreach ($this->M_table->get_spt_client($user_id,$date) as $key) {
            if (in_array($key['description'],$asset_jangka_panjang)) {
            $jumlah = $jumlah + $key['value'];
            }
        }
        return $jumlah;
    }
    public function financial_performance_dashboard_month($user_id,$date)
    {
        $roa                    = array();
        $wcr                    = array();
        $roe                    = array();
        $der                    = array();
        $t_asset                = array();
        $c_asset                = array();
        $cash                   = array();
        $a_receivable           = array();
        $inventory              = array();
        $t_liabilities          = array();
        $current_liabilities    = array();
        $account_payable        = array();
        $other_liabilities      = array();
        $shareholder_equity     = array();
        $common_stock           = array();
        $current_earnings       = array();
        $long_term_asset = array();
        foreach ($this->M_finance->getListYearForMonth($user_id,date('Y', strtotime($date))) as $key) {
            $aset_lancar  = $this->get_aset_lancar_month($user_id, $key['bulan']);
            $kewajiban_lancar  = $this->get_kewajiban_lancar_month($user_id, $key['bulan']);
            $total_aset   = $this->get_total_aset_month($user_id,$key['bulan']);
            $total_ekuitas   = $this->get_total_ekuitas_month($user_id,$key['bulan']);
            $total_kewajiban   = $this->get_total_kewajiban_month($user_id,$key['bulan']);
            $laba_bersih = $this->M_finance->get_days_sales_outstanding2($user_id,$key['bulan'],"LABA BERSIH")['value'];
            $roa[] = array(
                'bulan' => $key['bulan'],
                'value' => round(($laba_bersih / $this -> cekVal($total_aset)) * 100)
            );
            $wcr[] = array(
                'bulan' => $key['bulan'],
                'value' => $aset_lancar / $this -> cekVal($kewajiban_lancar)
            );
            $roe[] = array(
                'bulan' => $key['bulan'],
                'value' => ($laba_bersih / $this -> cekVal($total_ekuitas)) * 100
            );
            $der[] = array(
                'bulan' => $key['bulan'],
                'value' => $total_kewajiban / $this -> cekVal($total_ekuitas)
            );
            $t_asset[] = array('bulan' => $key['bulan'], 'value' => $total_aset);
            $c_asset[] = array('bulan' => $key['bulan'], 'value' => $aset_lancar);
            $cash[] = array(
                'bulan' => $key['bulan'],
                'value' => $this -> M_finance -> get_days_sales_outstanding2($user_id, $key['bulan'], "KAS DAN SETARA KAS")['value']
            );
            $a_receivable[] = array(
                'bulan' => $key['bulan'],
                'value' => $this -> M_finance -> get_days_sales_outstanding2($user_id, $key['bulan'], "PIUTANG USAHA PIHAK KETIGA")['value'] +
                        $this -> M_finance -> get_days_sales_outstanding2(
                    $user_id,
                    $key['bulan'],
                    "PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA"
                )['value'] + $this -> M_finance -> get_days_sales_outstanding2(
                    $user_id,
                    $key['bulan'],
                    "PIUTANG LAIN-LAIN PIHAK KETIGA"
                )['value'] + $this -> M_finance -> get_days_sales_outstanding2(
                    $user_id,
                    $key['bulan'],
                    "PIUTANG LAIN-LAIN PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA"
                )['value'] - $this -> M_finance -> get_days_sales_outstanding2(
                    $user_id,
                    $key['bulan'],
                    "PENYISIHAN PIUTANG RAGU-RAGU"
                )['value']
            );
            $inventory[] = array(
                'bulan' => $key['bulan'],
                'value' => $this -> M_finance -> get_days_sales_outstanding2($user_id, $key['bulan'], "PERSEDIAAN")['value']
            );
            $t_liabilities[] = array('bulan' => $key['bulan'], 'value' => $total_kewajiban);
            $current_liabilities[] = array(
                'bulan' => $key['bulan'],
                'value' => $this -> get_current_liabilities_month($user_id, $key['bulan'])
            );
            $long_term_asset[] = array(
                'bulan' => $key['bulan'],
                'value' => $this -> get_long_term_assets_month($user_id, $key['bulan'])
            );
            $account_payable[] = array(
                'bulan' => $key['bulan'],
                'value' => $this -> M_finance -> get_days_sales_outstanding2($user_id, $key['bulan'], "HUTANG USAHA PIHAK KETIGA")['value'] +
                        $this -> M_finance -> get_days_sales_outstanding2(
                    $user_id,
                    $key['bulan'],
                    "HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA"
                )['value']
            );
            $other_liabilities[] = array(
                'bulan' => $key['bulan'],
                'value' => $this -> M_finance -> get_days_sales_outstanding2($user_id, $key['bulan'], "KEWAJIBAN TIDAK LANCAR LAINNYA")['value']
            );
            $shareholder_equity[] = array(
                'bulan' => $key['bulan'],
                'value' => $this -> M_finance -> get_days_sales_outstanding2($user_id, $key['bulan'], "MODAL SAHAM")['value'] +
                        $this -> M_finance -> get_days_sales_outstanding2(
                    $user_id,
                    $key['bulan'],
                    "AGIO SAHAM (TAMBAHAN MODAL DISETOR)"
                )['value'] + $this -> M_finance -> get_days_sales_outstanding2(
                    $user_id,
                    $key['bulan'],
                    "LABA DITAHAN TAHUN-TAHUN SEBELUMNYA"
                )['value'] + $this -> M_finance -> get_days_sales_outstanding2(
                    $user_id,
                    $key['bulan'],
                    "LABA DITAHAN TAHUN INI"
                )['value'] + $this -> M_finance -> get_days_sales_outstanding2(
                    $user_id,
                    $key['bulan'],
                    "EKUITAS LAIN-LAIN"
                )['value']
            );
            $common_stock[] = array(
                'bulan' => $key['bulan'],
                'value' => $this -> M_finance -> get_days_sales_outstanding2($user_id, $key['bulan'], "MODAL SAHAM")['value'] +
                        $this -> M_finance -> get_days_sales_outstanding2(
                    $user_id,
                    $key['bulan'],
                    "AGIO SAHAM (TAMBAHAN MODAL DISETOR)"
                )['value']
            );
            $current_earnings[] = array(
                'bulan' => $key['bulan'],
                'value' => $this -> M_finance -> get_days_sales_outstanding2($user_id, $key['bulan'], "LABA DITAHAN TAHUN INI")['value']
            );
        }
        return array(
            'roa' => $roa,
            'wcr'=>$wcr,
            'roe' => $roe,
            'der' => $der,
            'total_aset' => $t_asset,
            'current_aset' => $c_asset,
            'a_receivable' => $a_receivable,
            'cash' => $cash,
            'inventory' => $inventory,
            't_liabilities' => $t_liabilities,
            'long_term_asset' => $long_term_asset,
            'current_liabilities' => $current_liabilities,
            'account_payable' => $account_payable,
            'other_liabilities' => $other_liabilities,
            'shareholder_equity' => $shareholder_equity,
            'common_stock' => $common_stock,
            'current_earnings' => $current_earnings
        );
    }
    public function get_aset_lancar_year($user_id, $date)
    {
        $data_spt = $this->M_table->get_spt_clientDate_year($user_id,$date);
        $aset_lancar = 0;
        $assets = ['KAS DAN SETARA KAS','INVESTASI SEMENTARA','PIUTANG USAHA PIHAK KETIGA','PERSEDIAAN','PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','PIUTANG LAIN-LAIN PIHAK KETIGA','PIUTANG LAIN-LAIN PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','PENYISIHAN PIUTANG RAGU-RAGU','BEBAN DIBAYAR DI MUKA','UANG MUKA PEMBELIAN','AKTIVA LANCAR LAINNYA'];
        foreach ($data_spt as $key) {
            if (in_array($key['description'],$assets)) {
                $aset_lancar = $aset_lancar  + $key['value'];
            }
        }
        return $aset_lancar;
    }
    public function get_kewajiban_lancar_year($user_id, $date)
    {
        $data_spt = $this->M_table->get_spt_clientDate_year($user_id,$date);
        $kewajiban_lancar = 0;
        $liabilities = ['HUTANG USAHA PIHAK KETIGA','HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','HUTANG BUNGA','HUTANG PAJAK','HUTANG DIVIDEN','BIAYA YANG MASIH HARUS DIBAYAR','HUTANG BANK','BAGIAN HUTANG JANGKA PANJANG YANG JATUH TEMPO DALAM TAHUN BERJALAN','UANG MUKA PELANGGAN','KEWAJIBAN LANCAR LAINNYA'];
        foreach ($data_spt as $key) {
            if (in_array($key['description'],$liabilities)) {
                $kewajiban_lancar = $kewajiban_lancar  + $key['value'];
            }
        }
        return $kewajiban_lancar;
    }
    public function get_total_aset_year($user_id,$date)
    {
        $jumlah = 0;
        foreach ($this->M_table->get_spt_clientDate_year($user_id,$date . "' AND st.category_jumlah = 'Jumlah Asset") as $key) {
            $jumlah = $jumlah + $key['value'];
            
        }
        return $jumlah;
    }
    public function get_total_ekuitas_year($user_id,$date)
    {
        $jumlah = 0;
        $ekuitas = ['MODAL SAHAM','AGIO SAHAM (TAMBAHAN MODAL DISETOR)','LABA DITAHAN TAHUN-TAHUN SEBELUMNYA','LABA DITAHAN TAHUN INI','EKUITAS LAIN-LAIN'];
        foreach ($this->M_table->get_spt_clientDate_year($user_id,$date . "' AND st.category_jumlah = 'Jumlah Kewajiban dan Ekuitas") as $key) {
            if (in_array($key['description'],$ekuitas)) {
            $jumlah = $jumlah + $key['value'];
            }
            
        }
        return $jumlah;
    }
    public function get_total_kewajiban_year($user_id,$date)
    {
        $jumlah = 0;
        $kewajiban = ['HUTANG USAHA PIHAK KETIGA','HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','HUTANG BUNGA','HUTANG PAJAK','HUTANG DIVIDEN','BIAYA YANG MASIH HARUS DIBAYAR','HUTANG BANK','BAGIAN HUTANG JANGKA PANJANG YANG JATUH TEMPO DALAM TAHUN BERJALAN','UANG MUKA PELANGGAN','KEWAJIBAN LANCAR LAINNYA','HUTANG BANK JANGKA PANJANG','HUTANG USAHA JANGKA PANJANG PIHAK LAIN','HUTANG USAHA JANGKA PANJANG PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','KEWAJIBAN PAJAK TANGGUHAN','KEWAJIBAN TIDAK LANCAR LAINNYA'];
        foreach ($this->M_table->get_spt_clientDate_year($user_id,$date . "' AND st.category_jumlah = 'Jumlah Kewajiban dan Ekuitas") as $key) {
            if (in_array($key['description'],$kewajiban)) {
            $jumlah = $jumlah + $key['value'];
            }
            
        }
        return $jumlah;
    }
    public function get_current_liabilities_year($user_id,$date)
    {
        $jumlah = 0;
        $liabilities = ['HUTANG USAHA PIHAK KETIGA','HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA','HUTANG BUNGA','HUTANG PAJAK','HUTANG DIVIDEN','BIAYA YANG MASIH HARUS DIBAYAR','HUTANG BANK','BAGIAN HUTANG JANGKA PANJANG YANG JATUH TEMPO DALAM TAHUN BERJALAN','UANG MUKA PELANGGAN','KEWAJIBAN LANCAR LAINNYA'];
        foreach ($this->M_table->get_spt_clientDate_year($user_id,$date) as $key) {
            if (in_array($key['description'],$liabilities)) {
            $jumlah = $jumlah + $key['value'];
            }
        }
        return $jumlah;
    }
    public function get_long_term_assets_year($user_id,$date)
    {
        $jumlah = 0;
        $asset_jangka_panjang = ['PIUTANG JANGKA PANJANG','TANAH DAN BANGUNAN','AKTIVA TETAP LAINNYA','AKUMULASI PENYUSUTAN','INVESTASI PADA PERUSAHAAN ASOSIASI','INVESTASI JANGKA PANJANG LAINNYA','HARTA TIDAK BERWUJUD','AKTIVA PAJAK TANGGUHAN','AKTIVA TIDAK LANCAR LAINNYA'];
        foreach ($this->M_table->get_spt_clientDate_year($user_id,$date) as $key) {
            if (in_array($key['description'],$asset_jangka_panjang)) {
            $jumlah = $jumlah + $key['value'];
            }
        }
        return $jumlah;
    }
    public function financial_performance_dashboard_year($user_id,$date)
    {
        $roa                    = array();
        $wcr                    = array();
        $roe                    = array();
        $der                    = array();
        $t_asset                = array();
        $c_asset                = array();
        $cash                   = array();
        $a_receivable           = array();
        $inventory              = array();
        $t_liabilities          = array();
        $current_liabilities    = array();
        $account_payable        = array();
        $other_liabilities      = array();
        $shareholder_equity     = array();
        $common_stock           = array();
        $current_earnings       = array();
        $long_term_asset       = array();
            
        foreach ($this->M_finance->getListYear($user_id) as $key) {
            $aset_lancar  = $this->get_aset_lancar_year($user_id, $key['tahun']);
            $kewajiban_lancar  = $this->get_kewajiban_lancar_year($user_id, $key['tahun']);
            $total_aset   = $this->get_total_aset_year($user_id,$key['tahun']);
            $total_ekuitas   = $this->get_total_ekuitas_year($user_id,$key['tahun']);
            $total_kewajiban   = $this->get_total_kewajiban_year($user_id,$key['tahun']);
            $laba_bersih = $this->M_finance->get_days_sales_outstanding2_year($user_id,$key['tahun'],"LABA BERSIH")['value'];
            $roa[] = array(
                'tahun' => $key['tahun'],
                'value' => round(($laba_bersih/$total_aset) * 100)
              );
            $wcr[] = array(
                'tahun' => $key['tahun'],
                'value' => $aset_lancar/$kewajiban_lancar
              );
            $roe[] = array(
                'tahun' => $key['tahun'],
                'value' => ($laba_bersih/$total_ekuitas)*100
            );
            $der[] = array(
                'tahun' => $key['tahun'],
                'value' => $total_kewajiban/$total_ekuitas
            );
            $t_asset[] = array(
                'tahun' => $key['tahun'],
                'value' => $total_aset
            );
            $c_asset[] = array(
                'tahun' => $key['tahun'],
                'value' => $aset_lancar
            );
            $cash[] = array(
                'tahun' => $key['tahun'],
                'value' => $this->M_finance->get_days_sales_outstanding2_year($user_id,$key['tahun'],"KAS DAN SETARA KAS")['value']
            );
            $a_receivable[] = array(
                'tahun' => $key['tahun'],
                'value' => $this->M_finance->get_days_sales_outstanding2_year($user_id,$key['tahun'],"HUTANG USAHA PIHAK KETIGA")['value'] + $this->M_finance->get_days_sales_outstanding2_year($user_id,$key['tahun'],"HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA")['value']
            );
            $inventory[] = array(
                'tahun' => $key['tahun'],
                'value' => $this->M_finance->get_days_sales_outstanding2_year($user_id,$key['tahun'],"PERSEDIAAN")['value']
            );
            $t_liabilities[] = array(
                'tahun' => $key['tahun'],
                'value' => $total_kewajiban
            );
            $current_liabilities[] = array(
                'tahun' => $key['tahun'],
                'value' => $this->get_current_liabilities_year($user_id, $key['tahun'])
            );
            $long_term_asset[] = array(
                'tahun' => $key['tahun'],
                'value' => $this->get_long_term_assets_year($user_id, $key['tahun'])
            );
            $account_payable[] = array(
                'tahun' => $key['tahun'],
                'value' => $this -> M_finance -> get_days_sales_outstanding2_year($user_id, $key['tahun'], "HUTANG USAHA PIHAK KETIGA")['value'] +
                        $this -> M_finance -> get_days_sales_outstanding2_year(
                    $user_id,
                    $key['tahun'],
                    "HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA"
                )['value']
            );
            $other_liabilities[] = array(
                'tahun' => $key['tahun'],
                'value' => $this -> M_finance -> get_days_sales_outstanding2_year($user_id, $key['tahun'], "KEWAJIBAN TIDAK LANCAR LAINNYA")['value']
            );
            $shareholder_equity[] = array(
                'tahun' => $key['tahun'],
                'value' => $this -> M_finance -> get_days_sales_outstanding2_year($user_id, $key['tahun'], "MODAL SAHAM")['value'] +
                        $this -> M_finance -> get_days_sales_outstanding2_year(
                    $user_id,
                    $key['tahun'],
                    "AGIO SAHAM (TAMBAHAN MODAL DISETOR)"
                )['value'] + $this -> M_finance -> get_days_sales_outstanding2_year(
                    $user_id,
                    $key['tahun'],
                    "LABA DITAHAN TAHUN-TAHUN SEBELUMNYA"
                )['value'] + $this -> M_finance -> get_days_sales_outstanding2_year(
                    $user_id,
                    $key['tahun'],
                    "LABA DITAHAN TAHUN INI"
                )['value'] + $this -> M_finance -> get_days_sales_outstanding2_year(
                    $user_id,
                    $key['tahun'],
                    "EKUITAS LAIN-LAIN"
                )['value']
            );
            $common_stock[] = array(
                'tahun' => $key['tahun'],
                'value' => $this -> M_finance -> get_days_sales_outstanding2_year($user_id, $key['tahun'], "MODAL SAHAM")['value'] +
                        $this -> M_finance -> get_days_sales_outstanding2_year(
                    $user_id,
                    $key['tahun'],
                    "AGIO SAHAM (TAMBAHAN MODAL DISETOR)"
                )['value']
            );
            $current_earnings[] = array(
                'tahun' => $key['tahun'],
                'value' => $this -> M_finance -> get_days_sales_outstanding2_year($user_id, $key['tahun'], "LABA DITAHAN TAHUN INI")['value']
            );
        }
        // print_r($cash); 
        // die;
        return array(
            'roa' => $roa,
            'wcr'=>$wcr,
            'roe' => $roe,
            'der' => $der,
            'total_aset' => $t_asset,
            'current_aset' => $c_asset,
            'a_receivable' => $a_receivable,
            'cash' => $cash,
            'inventory' => $inventory,
            't_liabilities' => $t_liabilities,
            'long_term_asset' => $long_term_asset,
            'current_liabilities' => $current_liabilities,
            'account_payable' => $account_payable,
            'other_liabilities' => $other_liabilities,
            'shareholder_equity' => $shareholder_equity,
            'common_stock' => $common_stock,
            'current_earnings' => $current_earnings
        );
    }
    public function getDaysNextMonth($day)
    {
        $today = new DateTime();
        $nextMonth = new DateTime();
        $nextMonth->setTimestamp($today->getTimestamp());
        $nextMonth->modify('first day of next month');
        $nextMonth->modify('+'.($day-1).' days');
        // $nextMonth->modify('+'.$nextMonth->diff($today)->days.' days');
        return $nextMonth->format('Y-m-d');
    }
    
    public function take_the_last_working_day_next_week()
    {
        $today = new DateTime();
        // mendapatkan tanggal pada minggu depan
        $nextWeek = new DateTime();
        $nextWeek->modify('next week');
        // mencari hari terakhir hari kerja pada minggu depan
        $lastWeekday = new DateTime();
        $lastWeekday->setTimestamp($nextWeek->getTimestamp());
        $lastWeekday->modify('last weekday');
        return $lastWeekday->format('Y-m-d');
    }
    public function take_1_day()
    {
        return date('Y-m-d', strtotime('+1 day'));
    }
    public function takes_the_last_date_in_the_next_month()
    {
        $today = new DateTime();
        // tanggal pada bulan depan
        $nextMonth = new DateTime();
        $nextMonth->setTimestamp($today->getTimestamp());
        $nextMonth->modify('first day of next month');
        // tanggal terakhir pada bulan depan
        $lastDay = new DateTime();
        $lastDay->setTimestamp($nextMonth->getTimestamp());
        $lastDay->modify('last day of this month');
        return $lastDay->format('Y-m-d');
    }
    public function retrieves_the_last_date_of_the_current_month()
    {
        $today = new DateTime();
        // tanggal terakhir bulan ini
        $lastDay = new DateTime();
        $lastDay->setTimestamp($today->getTimestamp());
        $lastDay->modify('last day of this month');
        return $lastDay->format('Y-m-d');
    }
    public function get30aprilnextyear()
    {
        $april30 = new DateTime();
        $april30->setDate(date('Y') + 1, 4, 30);
        return $april30->format('Y-m-d');
    }
    public function getStatusPembayaran($today,$deadline)
    {
        $todayDateObj = new \DateTime($today);
        $foundedDateObj = new \DateTime($deadline);
        $interval = $todayDateObj->diff($foundedDateObj);
        $interval = $interval->format('%r%a') . "\n\n";
        if ($interval <= 0) {
            return '<i class="text-success">already paid</i>';
        } else {
            return '<i class="text-success">already paid</i>';
        }
    }
    
    public function getStatusPelaporan($today,$deadline)
    {
        $todayDateObj = new \DateTime($today);
        $foundedDateObj = new \DateTime($deadline);
        $interval = $todayDateObj->diff($foundedDateObj);
        $interval = $interval->format('%r%a') . "\n\n";
        if ($interval <= 0) {
            return '<i class="text-success">has been reported</i>';
        } else {
            return '<i class="text-success">has been reported</i>';
        }
    }
    public function add_tax_monthly()
    {
        $data['user_id'] = (!empty($_POST['user_id'])) ? $_POST['user_id'] : 0;
        $data['date'] = (!empty($_POST['date'])) ? $_POST['date'] : 0;
        if ($data['date'] == 0 || $data['user_id'] == 0){
            redirect('SuperAdmin/finances');
        }
        if ($this->M_table->totalByCon("tax_client_monthly","user_id",$data['user_id']." AND date = '".$data['date']."'") != 0) {
            redirect('SuperAdmin/finances');
        }
        for ($i=1; $i <= 20; $i++) { 
            $data['tanggal_bayar']        = (!empty($_POST['tanggal_bayar_'.$i])) ? $_POST['tanggal_bayar_'.$i] :"";
            $data['jenis_pajak_id']       = $i;
            $data['pakai']                = (!empty($_POST['pakai_'.$i])) ? 'yes' : 'no';
            $data['tanggal_transaksi']    = (!empty($_POST['tanggal_transaksi_'.$i])) ? $_POST['tanggal_transaksi_'.$i] :"";
            $data['status_pembayaran']    = '<i class="text-danger">not yet paid</i>';
            $data['nominal_pembayaran']   = (!empty($_POST['nominal_pembayaran_'.$i])) ? str_replace(".", "",  $_POST['nominal_pembayaran_'.$i]):"";
            $data['ntpn']                 = (!empty($_POST['ntpn_'.$i])) ? $_POST['ntpn_'.$i] :"";
            $data['rev']                 = (!empty($_POST['rev_'.$i])) ? $_POST['rev_'.$i] :"";
            $data['batas_pembayaran']     = "-";
            $data['status_pelaporan']     = '<i class="text-danger">not yet reported</i>';;
            $data['tanggal_pelaporan']    = (!empty($_POST['tanggal_pelaporan_'.$i])) ? $_POST['tanggal_pelaporan_'.$i] : "";
            $data['nominal_pelaporan']    = (!empty($_POST['nominal_pelaporan_'.$i])) ? str_replace(".", "",  $_POST['nominal_pelaporan_'.$i]):"";
            $data['bpe']                  = (!empty($_POST['bpe_'.$i])) ? $_POST['bpe_'.$i] :"";
            $data['batas_pelaporan']      = "-";
            $text = htmlspecialchars(strip_tags($this->M_table->getById('jenis_pajak',$i)['jenis_pajak']));
            switch (trim($text)) {
                case 'PPh pasal 15 setor sendiri':
                case 'PPh pasal 4(2) setor sendiri':
                case 'PPh pasal 25':
                    $data['batas_pembayaran'] = $this->getDaysNextMonth(15);
                    $data['batas_pelaporan'] = $this->getDaysNextMonth(20);
                    break;
                case 'PPh pasal 15 pemotongan':
                case 'PPh pasal 4(2) pemotongan':
                case 'PPh pasal 21':
                case 'PPh pasal 23/26':
                    $data['batas_pembayaran'] = $this->getDaysNextMonth(10);
                    $data['batas_pelaporan'] = $this->getDaysNextMonth(20);
                    break;
                case 'PPh pasal 22 impor setor sendiri (dilunasi bersamaan dengan bea masuk, PPN, PPnBM)':
                    $data['batas_pembayaran'] = $data['tanggal_transaksi'];
                    break;
                case 'PPh pasal 22 impor yang pemungutan oleh BC':
                    $data['batas_pembayaran'] = $this->take_1_day();
                    $data['batas_pelaporan'] = $this->take_the_last_working_day_next_week();
                    break;
                case 'PPh pasal 22 pemungutan oleh bendaharawan':
                    $data['batas_pembayaran'] = $data['tanggal_transaksi'];
                    $data['batas_pelaporan'] = $this->getDaysNextMonth(14);
                    break;
                case 'PPh pasal 22 migas':
                    $data['batas_pembayaran'] = $this->getDaysNextMonth(10);
                    $data['batas_pelaporan'] = $this->getDaysNextMonth(20);
                    break;
                case 'PPh Pasal 22 pemungutan oleh WP badan tertentu':
                    $data['batas_pembayaran'] = $this->getDaysNextMonth(10);
                    $data['batas_pelaporan'] = $this->getDaysNextMonth(20);
                    break;
                case 'PPN dan PPnBM':
                    $data['batas_pembayaran'] = $this->takes_the_last_date_in_the_next_month();
                    $data['batas_pelaporan'] = $this->takes_the_last_date_in_the_next_month();
                    break;
                case 'PPN atas kegiatan membangun sendiri':
                    $data['batas_pembayaran'] = $this->getDaysNextMonth(15);
                    $data['batas_pelaporan'] = $this->takes_the_last_date_in_the_next_month();
                    break;
                case 'PPN atas pemanfaatan BKP tidak berwujud dan/atau JKP dari Luar Daerah Pabean':
                    $data['batas_pembayaran'] = $this->getDaysNextMonth(15);
                    $data['batas_pelaporan'] = $this->takes_the_last_date_in_the_next_month();
                    break;
                case 'PPN dan PPnBM Pemungutan Bendaharawan':
                    $data['batas_pembayaran'] = $this->getDaysNextMonth(7);
                    $data['batas_pelaporan'] = $this->takes_the_last_date_in_the_next_month();
                    break;
                case 'PPN danatau PPnBM pemungutan oleh Pejabat Penandatanganan Surat Perintah Membayar sebagai Pemungut PPN':
                    $data['batas_pembayaran'] = $data['tanggal_transaksi'];
                    break;
                case 'PPN dan PPnBM Pemungutan selain bendaharawan':
                    $data['batas_pembayaran'] = $this->getDaysNextMonth(15);
                    $data['batas_pelaporan'] = $this->takes_the_last_date_in_the_next_month();
                    break;
                case 'PPh 25 WP kriteria tertentu yang dapat melaporkan beberapa Masa Pajak dalam satu SPT Masa. (Pasal 3 ayat (3B) UU KUP)':
                    $data['batas_pembayaran'] = $this->getDaysNextMonth(10);
                    $data['batas_pelaporan'] = $this->retrieves_the_last_date_of_the_current_month(20);
                    break;
                case 'PPh Badan tarif normal 22%':
                    $data['batas_pembayaran'] = $this->get30aprilnextyear();
                    $data['batas_pelaporan'] = $this->get30aprilnextyear();
                    break;
            }
            if ($data['tanggal_bayar'] != "") {
                $data['status_pembayaran']    = $this->getStatusPembayaran($data['tanggal_bayar'],$data['batas_pembayaran']);
            }
            if ($data['tanggal_pelaporan'] != "") {
                $data['status_pelaporan']    = $this->getStatusPelaporan($data['tanggal_pelaporan'],$data['batas_pelaporan']);
            }
        // print_r($data);
        // var_dump($data['nominal_pembayaran']);
        // echo '<br><br><br><br>';
            $this->M_table->createTable('tax_client_monthly',$data);
        }
        // die;
            redirect('SuperAdmin/finance_input?user_id='.$data['user_id'].'&&date='.date('Y-m', strtotime($data['date'])));
    }

    public function update_tax_monthly()
    {
        $data['user_id'] = (!empty($_POST['user_id'])) ? $_POST['user_id'] : 0;
        $data['date'] = (!empty($_POST['date'])) ? $_POST['date'] : 0;
        if ($data['date'] == 0 || $data['user_id'] == 0){
            redirect('SuperAdmin/finances');
        }
        if ($this->M_table->totalByCon("tax_client_monthly","user_id",$data['user_id']." AND date = '".$data['date']."'") == 0) {
            redirect('SuperAdmin/finances');
        }
        for ($i=1; $i <= 20; $i++) { 
            $id        = (!empty($_POST['id_'.$i])) ? $_POST['id_'.$i] :"";
            $data['tanggal_bayar']        = (!empty($_POST['tanggal_bayar_'.$i])) ? $_POST['tanggal_bayar_'.$i] :"";
            $data['pakai']                = (!empty($_POST['pakai_'.$i])) ? 'yes' : 'no';
            $data['tanggal_transaksi']    = (!empty($_POST['tanggal_transaksi_'.$i])) ? $_POST['tanggal_transaksi_'.$i] :"";
            $data['status_pembayaran']    = '<i class="text-danger">not yet paid</i>';
            $data['nominal_pembayaran']   = (!empty($_POST['nominal_pembayaran_'.$i])) ? str_replace(".", "",  $_POST['nominal_pembayaran_'.$i]):"";
            $data['ntpn']                 = (!empty($_POST['ntpn_'.$i])) ? $_POST['ntpn_'.$i] :"";
            $data['rev']                 = (!empty($_POST['rev_'.$i])) ? $_POST['rev_'.$i] :"";
            $data['batas_pembayaran']     =  (!empty($_POST['batas_pembayaran_'.$i])) ? $_POST['batas_pembayaran_'.$i]:"";
            $data['status_pelaporan']     = '<i class="text-danger">not yet reported</i>';;
            $data['tanggal_pelaporan']    = (!empty($_POST['tanggal_pelaporan_'.$i])) ? $_POST['tanggal_pelaporan_'.$i] : "";
            $data['nominal_pelaporan']    = (!empty($_POST['nominal_pelaporan_'.$i])) ? str_replace(".", "",  $_POST['nominal_pelaporan_'.$i]):"";
            $data['bpe']                  = (!empty($_POST['bpe_'.$i])) ? $_POST['bpe_'.$i] :"";
            $data['batas_pelaporan']      = (!empty($_POST['batas_pelaporan_'.$i])) ? $_POST['batas_pelaporan_'.$i]:"";
            $text = htmlspecialchars(strip_tags($this->M_table->getById('jenis_pajak',$i)['jenis_pajak']));
            switch (trim($text)) {
                case 'PPh pasal 22 impor setor sendiri (dilunasi bersamaan dengan bea masuk, PPN, PPnBM)':
                    $data['batas_pembayaran'] = $data['tanggal_transaksi'];
                    break;
                case 'PPN danatau PPnBM pemungutan oleh Pejabat Penandatanganan Surat Perintah Membayar sebagai Pemungut PPN':
                    $data['batas_pembayaran'] = $data['tanggal_transaksi'];
                    break;
            }
            if ($data['tanggal_bayar'] != "") {
                $data['status_pembayaran']    = $this->getStatusPembayaran($data['tanggal_bayar'],$data['batas_pembayaran']);
            }
            if ($data['tanggal_pelaporan'] != "") {
                $data['status_pelaporan']    = $this->getStatusPelaporan($data['tanggal_pelaporan'],$data['batas_pelaporan']);
            }
            // print_r($data);
            // echo "<br>";
            // echo "<br>";
            // echo "<br>";
            $this->M_table->updateTable('tax_client_monthly',$data,array('id'=>$id));
        }
        // die;
            redirect('SuperAdmin/finance_input?user_id='.$data['user_id'].'&&date='.date('Y-m', strtotime($data['date'])));
    }
    
    public function add_tax_year()
    {
        $data['user_id'] = (!empty($_POST['user_id'])) ? $_POST['user_id'] : 0;
        $data['date'] = (!empty($_POST['date'])) ? $_POST['date'] : 0;
        if ($data['date'] == "" || $data['user_id'] == ""){
            redirect('SuperAdmin/finances');
        }
        if ($this->M_table->totalByCon("tax_client_year","user_id",$data['user_id']." AND date = '".$data['date']."'") != 0) {
            redirect('SuperAdmin/finances');
        }
        $data['tanggal_bayar']        = (!empty($_POST['tanggal_bayar'])) ? $_POST['tanggal_bayar'] :"";
        $data['jenis_pajak_id']       = 20;
        $data['pakai']                = (!empty($_POST['pakai'])) ? 'yes' : 'no';
        $data['tanggal_transaksi']    = (!empty($_POST['tanggal_transaksi'])) ? $_POST['tanggal_transaksi'] :"";
        $data['rev']    = (!empty($_POST['rev'])) ? $_POST['rev'] :"";
        $data['status_pembayaran']    = '<i class="text-danger">not yet paid</i>';
        $data['nominal_pembayaran']   = (!empty($_POST['nominal_pembayaran'])) ? $_POST['nominal_pembayaran']:"";
        $data['ntpn']                 = (!empty($_POST['ntpn'])) ? $_POST['ntpn'] :"";
        $data['status_pelaporan']     = '<i class="text-danger">not yet reported</i>';;
        $data['tanggal_pelaporan']    = (!empty($_POST['tanggal_pelaporan'])) ? $_POST['tanggal_pelaporan'] : "";
        $data['nominal_pelaporan']    = (!empty($_POST['nominal_pelaporan'])) ? $_POST['nominal_pelaporan'] :"";
        $data['bpe']                  = (!empty($_POST['bpe'])) ? $_POST['bpe'] :"";
        $data['batas_pembayaran'] = $this->get30aprilnextyear();
        $data['batas_pelaporan'] = $this->get30aprilnextyear();
        if ($data['tanggal_bayar'] != "") {
            $data['status_pembayaran']    = $this->getStatusPembayaran($data['tanggal_bayar'],$data['batas_pembayaran']);
        }
        if ($data['tanggal_pelaporan'] != "") {
            $data['status_pelaporan']    = $this->getStatusPelaporan($data['tanggal_pelaporan'],$data['batas_pelaporan']);
        } 
        $this->M_table->createTable('tax_client_year',$data);
        redirect('SuperAdmin/finance_input_year?user_id='.$data['user_id'].'&date='.$data['date']);
    }

    public function update_tax_year()
    {
        $data['user_id'] = (!empty($_POST['user_id'])) ? $_POST['user_id'] : 0;
        $data['date'] = (!empty($_POST['date'])) ? $_POST['date'] : 0;
        if ($data['date'] == "" || $data['user_id'] == ""){
            redirect('SuperAdmin/finances');
        }
        if ($this->M_table->totalByCon("tax_client_year","user_id",$data['user_id']." AND date = '".$data['date']."'") == 0) {
            redirect('SuperAdmin/finances');
        }
            $id        = (!empty($_POST['id'])) ? $_POST['id'] :"";
            $data['tanggal_bayar']        = (!empty($_POST['tanggal_bayar'])) ? $_POST['tanggal_bayar'] :"";
            $data['pakai']                = (!empty($_POST['pakai'])) ? 'yes' : 'no';
            $data['tanggal_transaksi']    = (!empty($_POST['tanggal_transaksi'])) ? $_POST['tanggal_transaksi'] :"";
            $data['rev']    = (!empty($_POST['rev'])) ? $_POST['rev'] :"";
            $data['status_pembayaran']    = '<i class="text-danger">not yet paid</i>';
            $data['nominal_pembayaran']   = (!empty($_POST['nominal_pembayaran'])) ? str_replace(".", "",  $_POST['nominal_pembayaran']):"";
            $data['ntpn']                 = (!empty($_POST['ntpn'])) ? $_POST['ntpn'] :"";
            $data['batas_pembayaran']     =  (!empty($_POST['batas_pembayaran'])) ? $_POST['batas_pembayaran']:"";
            $data['status_pelaporan']     = '<i class="text-danger">not yet reported</i>';;
            $data['tanggal_pelaporan']    = (!empty($_POST['tanggal_pelaporan'])) ? $_POST['tanggal_pelaporan'] : "";
            $data['nominal_pelaporan']    = (!empty($_POST['nominal_pelaporan'])) ? str_replace(".", "",  $_POST['nominal_pelaporan']):"";
            $data['bpe']                  = (!empty($_POST['bpe'])) ? $_POST['bpe'] :"";
            $data['batas_pelaporan']      = (!empty($_POST['batas_pelaporan'])) ? $_POST['batas_pelaporan']:"";
            
            if ($data['tanggal_bayar'] != "") {
                $data['status_pembayaran']    = $this->getStatusPembayaran($data['tanggal_bayar'],$data['batas_pembayaran']);
            }
            if ($data['tanggal_pelaporan'] != "") {
                $data['status_pelaporan']    = $this->getStatusPelaporan($data['tanggal_pelaporan'],$data['batas_pelaporan']);
            } 
            $this->M_table->updateTable('tax_client_year',$data,array('id'=>$id)); 
            redirect('SuperAdmin/finance_input_year?user_id='.$data['user_id'].'&date='.$data['date']);
    }
    public function addComment()
    {
        $data2['user_id']       = (!empty($_POST['user_id'])) ? $_POST['user_id'] :"";
        $data2['komentar']      = (!empty($_POST['komentar'])) ? $_POST['komentar'] :"";
        $data2['status']        = strtolower(trim( (!empty($_POST['status'])) ? $_POST['status'] :""));
        $data2['from']          = "admin";
        $data2['created_at']    = date('Y-m-d H:i:s');
        $data2['updated_at']    = date('Y-m-d H:i:s');
        $this->M_table->createTable('tabel_komentar_financial_dashboard',$data2);
    }
    
    public function getComment()
    {
        $user_id = (!empty($_GET['user_id'])) ? $_GET['user_id'] :"";
        $data = $this->M_table->dataTableWhere('tabel_komentar_financial_dashboard','user_id',$user_id . ' order by updated_at DESC');
        echo json_encode($data);
    }
    public function updateComment()
    {
        $id       = (!empty($_POST['data_id'])) ? $_POST['data_id'] :"";
        $data2['komentar']      = (!empty($_POST['komentar'])) ? $_POST['komentar'] :"";
        $data2['status']        = strtolower(trim( (!empty($_POST['status'])) ? $_POST['status'] :""));
        $data2['updated_at']    = date('Y-m-d H:i:s');
        $this->M_table->updateTable('tabel_komentar_financial_dashboard',$data2,['id' => $id]);
    }
    
    public function deleteKomentarFinancialDashboard()
    {
        $id = $this->input->post("id");
        $this->M_table->deleteTable("`tabel_komentar_financial_dashboard`", $id);
    }
    public function getQuoteMonthly()
    {
        $user_id = $this->input->get('user_id') ?: $this->input->post('user_id');
        $date = $this->input->get('date') ?: $this->input->post('date');
        if (!$user_id && !$date) {
            return $this->output->set_status_header(404)->set_output('404');
        }
        echo json_encode($this->M_finance->getQuoteMonthly($user_id,$date));
    }
    public function getQuoteYear()
    {
        $user_id = $this->input->get('user_id') ?: $this->input->post('user_id');
        $date = $this->input->get('date') ?: $this->input->post('date');
        if (!$user_id && !$date) {
            return $this->output->set_status_header(404)->set_output('404');
        }
        echo json_encode($this->M_finance->getQuoteYear($user_id,$date));
    }
    public function getTitleQuote()
    {
        echo json_encode($this->M_table->getAll('title_quote'));
    }
    
    public function deleteQuotesMonthly()
    {
        $id = $this->input->post("id");
        $this->M_table->deleteTable("`quote_for_client_monthly`", $id);
    }
    public function deleteQuotesYear()
    {
        $id = $this->input->post("id");
        $this->M_table->deleteTable("`quote_for_client_year`", $id);
    }
    public function addQuotesMonthly()
    {
        
        $data2['client_id']       = (!empty($_POST['user_id'])) ? $_POST['user_id'] :"";
        $data2['quotes']      = (!empty($_POST['quotes'])) ? $_POST['quotes'] :"";
        $data2['title_id']        = (!empty($_POST['title_id'])) ? $_POST['title_id'] :"";
        $data2['date']        = (!empty($_POST['date'])) ? $_POST['date'] .'-02' :"";
        if ($this->M_table->totalByCon("quote_for_client_monthly","client_id", $data2['client_id']  ." AND MONTH(date) = '".date('m', strtotime($data2['date']))."' AND title_id = ". $data2['title_id']) > 0) {
            $response = array(
                'status' => 'error',
                'message' => "<script>Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Data already exists',
                    showConfirmButton: false,
                    timer: 1500
                });</script>"
            );
        } else {
            $this->M_table->createTable('quote_for_client_monthly',$data2);
            $response = array(
                'status' => 'success',
                'message' => "<script>Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                });</script>"
            );
        }
        echo json_encode($response);        
    } 
    public function addQuotesYear()
    {
        
        $data2['client_id']       = (!empty($_POST['user_id'])) ? $_POST['user_id'] :"";
        $data2['quotes']      = (!empty($_POST['quotes'])) ? $_POST['quotes'] :"";
        $data2['title_id']        = (!empty($_POST['title_id'])) ? $_POST['title_id'] :"";
        $data2['date']        = (!empty($_POST['date'])) ? $_POST['date'] .'-02' :"";
        if ($this->M_table->totalByCon("quote_for_client_year","client_id", $data2['client_id']  ." AND date = '".$data2['date']."' AND title_id = ". $data2['title_id']) > 0) {
            $response = array(
                'status' => 'error',
                'message' => "<script>Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Data already exists',
                    showConfirmButton: false,
                    timer: 1500
                });</script>"
            );
        } else {
            $this->M_table->createTable('quote_for_client_year',$data2);
            $response = array(
                'status' => 'success',
                'message' => "<script>Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                });</script>"
            );
        }
        echo json_encode($response);
    }
    public function add_barang()
    {
        if(isset($_POST['type'])) {
            $type = $_POST['type'];
            if($type == 'year') {
                $data = [
                    'date_year' => $this->input->post('date'),
                    'user_id' => $this->input->post('user_id'),
                    'items_id' => $this->input->post('items_id'),
                    'items_name' => $this->input->post('items_name'),
                    'items_service' => $this->input->post('items_service'),
                    'items_status' => $this->input->post('items_status'),
                    'selling_price' => $this->input->post('selling_price'),
                    'purchase_price' => $this->input->post('purchase_price'),
                    'selling_date' => $this->input->post('selling_date'),
                    'purchase_date' => $this->input->post('purchase_date'),
                    'expired_date' => $this->input->post('expired_date'),
                    'unit' => $this->input->post('unit')
                ];                
                $this->M_table->createTable('inventory_drung_year', $data);
                return redirect('SuperAdmin/finance_inventory?user_id='.$this->input->post('user_id').'&date='.$this->input->post('date'));
            } else if($type == 'month') {
              // Jika format post type adalah bulan, set menjadi false
              $isYear = false;
            } else {
              // Jika format post type selain tahun atau bulan, set menjadi false
              $isYear = false;
            }
          } else {
            // Jika tidak ada post type, set menjadi false
            $isYear = false;
          }          
    }
    public function del_barang()
    {
        if(isset($_GET['barang_id'])) {
            $type = $_GET['date'];
            if (preg_match('/^\d{4}$/', $type)) {
                $this->M_table->deleteTable('inventory_drung_year',$_GET['barang_id']);
                return redirect('SuperAdmin/finance_inventory?user_id='.$this->input->get('user_id').'&date='.$this->input->get('date'));
            } else if($type == 'month') {
              // Jika format post type adalah bulan, set menjadi false
              $isYear = false;
            } else {
              // Jika format post type selain tahun atau bulan, set menjadi false
              $isYear = false;
            }
          } else {
            // Jika tidak ada post type, set menjadi false
            $isYear = false;
          }          
    }
    public function add_explanation()
    {
        if(isset($_POST['type'])) {
            $type = $_POST['type'];
            if($type == 'year') {
                $data['date_year'] = $this->input->post('date');
                $data['user_id'] = $this->input->post('user_id');
                $data['items_name'] = $this->input->post('items_name');
                $data['category_id'] = $this->input->post('category_id');
                $data['explanation'] = $this->input->post('explanation');
                $this->M_table->createTable('finance_explanation_year', $data);
                return redirect('SuperAdmin/finance_explanation?user_id='.$this->input->post('user_id').'&date='.$this->input->post('date').'&show='.$_POST['show']);
            } else if($type == 'month') {
              // Jika format post type adalah bulan, set menjadi false
              $isYear = false;
            } else {
              // Jika format post type selain tahun atau bulan, set menjadi false
              $isYear = false;
            }
          } else {
            // Jika tidak ada post type, set menjadi false
            $isYear = false;
          }          
    }
}
?>
