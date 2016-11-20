<?php
class M_gen_statement extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function auto_insert_in_10th()
    {
        $percenttax                 =   (int)$this->get_percenttax()->NumValue1;
        
        $date                       =   date("Y-m")."-10";  //yyyy-mm-dd
        $day                        =   "10";
        $month                      =   date("m");
        $year                       =   date("Y");
        $redate                     =   date('Y-m', strtotime(date('Y-m')." -1 month"))."-10"; //yyyy-mm-dd
        $monthre                    =   substr($redate,5,2);
        $yearre                     =   substr($redate,0,4);
        
        $list_agent_active          =   $this->get_list_tbl_user(3,1,0,999999999);
        $totalrow                   =   $this->total_user(3,1)->total;
                 
        if($totalrow    > 0)
        {    
            foreach($list_agent_active as $row_agent_active)
            {
                $fees               =   $row_agent_active->fees;
                $row_statement      =   $this->get_tbl_statement_by_agentid_and_date($row_agent_active->id,$date);
                if(count($row_statement) < 1) //chua co luu du lieu 10/03 cua agent trong bang statement
                {
                    $row_statement                  = $this->get_tbl_stament_by_userid_month($row_agent_active->id,$monthre,$yearre); //lay du lieu cua thang 02
                    if(count($row_statement) > 0) //co du lieu cua thang 02
                    {
                        $active_1_15                = $this->get_active_01_15_by_date_before_10th($row_agent_active->id,$day,$monthre,$yearre,$month,$year)->total;
                        $active_16_31               = $this->get_active_16_31_by_date_before_10th($row_agent_active->id,$day,$monthre,$yearre,$month,$year)->total;
                        
                        $activeuser                 = (int)$this->get_total_active_or_inactive_customer_by_agentid_status($row_agent_active->id,1)->total;
                        $inactiveuser               = (int)$this->get_total_active_or_inactive_customer_by_agentid_status($row_agent_active->id,0)->total;
                        
                        $re_havetopay               = (int)($row_statement->HaveToPay);
                        $re_pay                     = (int)($row_statement->Pay);
                        $revious_balance            = $re_havetopay - $re_pay + (int)($active_1_15*$fees)+(int)($active_16_31*$fees/2);
                        $tax                        = (int)($active_1_15*$fees)+(int)($active_16_31*$fees/2)*$percenttax/100;
                        
                        $arr_pay                    = array();
                        $datepay                    = $row_statement->FixDate;
                        $datepay                    = explode(" ",$datepay)[0]; //yyyyy-mm-dd
                        $list_usertrans             = $this->get_day_pay_fromtime_totime($row_agent_active->id,$day,substr($datepay,5,2),substr($datepay,0,4),$month,$year);
                        if(count($list_usertrans) > 0) //da co thanh toan sau ngay 10/02 den ngay hien tai dc chon
                        {
                            $total_pay                  = 0;
                            foreach($list_usertrans as $row_usertrans)
                            {
                                $pay                        = $row_usertrans->Amt;
                                $total_pay                  += $pay;
                            }
                        }
                        else    //khong co thanh toan nao trong khoang tu ngay 10/02 den ngay hien tai dc chon
                        {
                            $total_pay                      = 0;
                        }
                        $havetopay                          = $revious_balance + (int)($activeuser*$fees) + $tax;
                    }
                    else    //chua co du lieu nao cua agent do trong bang statement
                    {
                        $active_1_15                = $this->get_active_01_15_by_date_before_10th($row_agent_active->id,$day,$monthre,$yearre,$month,$year)->total;
                        $active_16_31               = $this->get_active_16_31_by_date_before_10th($row_agent_active->id,$day,$monthre,$yearre,$month,$year)->total;
                        
                        $activeuser                 = (int)$this->get_total_active_or_inactive_customer_by_agentid_status($row_agent_active->id,1)->total;
                        $inactiveuser               = (int)$this->get_total_active_or_inactive_customer_by_agentid_status($row_agent_active->id,0)->total;
                        
                        $re_havetopay               = 0;
                        $re_pay                     = 0;
                        
                        $arr_pay                    = array();
                        $datepay                    = $redate; //yyyyy-mm-dd
                        $list_usertrans             = $this->get_day_pay_fromtime_totime($row_agent_active->id,$day,substr($datepay,5,2),substr($datepay,0,4),$month,$year);
                        if(count($list_usertrans) > 0) //da co thanh toan sau ngay 10/02 den ngay hien tai dc chon
                        {
                            $total_pay                  = 0;
                            foreach($list_usertrans as $row_usertrans)
                            {
                                $pay                        = $row_usertrans->Amt;
                                $total_pay                  += $pay;
                            }
                        }
                        else    //khong co thanh toan nao trong khoang tu ngay 10/02 den ngay hien tai dc chon
                        {
                            $total_pay                      = 0;
                            $datepay                        = "";
                        }
                        $revious_balance                    = $re_havetopay - $re_pay + (int)($active_1_15*$fees)+(int)($active_16_31*$fees/2);
                        $tax                                = (int)($active_1_15*$fees)+(int)($active_16_31*$fees/2)*$percenttax/100;
                        
                        $havetopay                          = $revious_balance + (int)($activeuser*$fees) + $tax;
                    }
                    $sql            =   "INSERT INTO `statement` 
                                                (`id`,      `UserID`,           `ActiveUser`,   `Inactive`,       `FixDate`,    `NewMember1_15`, `NewMember16_31`,   `PreBalance`,      `Pay`,      `Tax`,  `HaveToPay`, `Paydate`, `Status`) 
                                        VALUES (NULL, '$row_agent_active->id', '$activeuser', '$inactiveuser', '$date 18:18:18', '$active_1_15', '$active_16_31', '$revious_balance', '$total_pay', '$tax', '$havetopay', NULL,         1)";
                    $query          =   $this->db->query($sql);   
                    
                    $amt            =   (int)$activeuser* $fees;
                    $create_by      = $_SESSION['AccUserSuper']['id'];
                    $sql_user_trans =   "INSERT INTO `usertrans` 
                                            (`id`,  `userid`,               `Action`,       `Value`,     `Amt`, `CreatedDate`, `CreatedBy`, `agent`) 
                                    VALUES (NULL, '$row_agent_active->rowid', 'ACTIVEUSER', '$activeuser', '$amt',     NOW(),      'admin', NULL)";
                    $query_usertrans=   $this->db->query($sql_user_trans);                
                }
            }
        }
    }
    
    
    
    
    public function get_agent_statement()
    {
        if(isset($_POST['page']) && isset($_POST['date']))
        {
            $percenttax     =   (int)$this->get_percenttax()->NumValue1;
            
            //chon ngay 12/03/2015
            $page = $_POST['page'];
            $date = $_POST['date'];
            
            $arr_date       = explode("/",$date); //dd/mm/yyyy
            $day            = (int)$arr_date[0];
            $month          = $arr_date[1];
            $year           = (int)$arr_date[2];
            $yyyy_mm_dd     = $arr_date[2]."-".$arr_date[1]."-".$arr_date[0];
            
            $redate                     =   date('Y-m', strtotime($year."-".$month." -1 month"))."-10"; //yyyy-mm-dd
            $monthre                    =   substr($redate,5,2);
            $yearre                     =   substr($redate,0,4);
            $yyyy_mm_ddre               =   $arr_date[2]."-".$arr_date[1]."-".$arr_date[0];
            
            $day_timeline               = $this->getSetting("TimelineGenStatement"); //10th of every month
            $RM_active_agent            = $this->getSetting("RMActiveAgentGenStatement");
            $RecordOnePage              = $this->getSetting("RecordOnePageGenStatement");
            
            if($page == 1 || $page < 1 || $page == "")
                $start      = 0;
            else
                $start      = $RecordOnePage*($page-1);
            $limit          = $RecordOnePage;
            
            
            $list_agent_active  = $this->get_list_tbl_user(3,1,$start,$limit);
            $totalrow           = $this->total_user(3,1)->total;
            
            $str_list       = "";
            $str_numpage    = "";
            $notfound       = "<strong style=\"margin:10px;\">".$this->lang->line(LANG_NOT_HAVE_ANY_ROW)."</strong>";            
            if($totalrow    > 0)
            {
                $notfound   = "";      
                $datepay    = "";          
                foreach($list_agent_active as $row_agent_active)
                {    
                        $str_button     = "";
                        $fees           = $row_agent_active->fees;
                        
                        if((int)$day >= 10) //ngay >= 10/03: tu ngay 11/03 den 31/03 lay statemnt cua thang (03)
                        {                            
                            $row_statement                  = $this->get_tbl_stament_by_userid_month($row_agent_active->id,$month,$year); //lay du lieu cua thang 03
                            //print_r($row_statement);die;
                            if(count($row_statement) > 0) //co du lieu cua thang 03 (show button pay)
                            {
                                $flag_show                  = 1;
                                if($row_statement->Status == 1 || $row_statement->Status == "1")    //hệ thống đã tự insert vào db
                                {
                                    $flag_button                = 1; //hien thi button pay
                                    
                                    $arr_pay                    = array();
                                    $datepay                    = $row_statement->FixDate;
                                    $datepay                    = explode(" ",$datepay)[0]; //yyyyy-mm-dd
                                    $list_usertrans              = $this->get_day_pay_fromtime_totime($row_agent_active->id,$day,substr($datepay,5,2),substr($datepay,0,4),$month,$year);
                                    //print_r($list_usertrans);die;
									if(count($list_usertrans) > 0) //da co thanh toan sau ngay 10/03 va truoc ngay hien tai dc chon
                                    {
                                        $activeuser                 = 0;
                                        $inactiveuser               = 0;
                                        
                                        $daypay_last                = substr($list_usertrans[0]->CreatedDate,8,2); //dd
                                        $monthpay_last              = substr($list_usertrans[0]->CreatedDate,5,2); //mm
                                        $yearpay_last               = substr($list_usertrans[0]->CreatedDate,0,4); //yyyy
                                        
                                        $active_1_15                = $this->get_active_01_15_by_date_after_10th_2($row_agent_active->id,$day,$month,$year,$daypay_last,$monthpay_last,$yearpay_last)->total;
                                        $active_16_31               = $this->get_active_16_31_by_date_after_10th_2($row_agent_active->id,$day,$month,$year,$daypay_last,$monthpay_last,$yearpay_last)->total;
                                        
                                        $totaltax                   = ($active_1_15*$fees + $active_16_31*$fees/2)*$percenttax/100;
                                        
                                        $total_pay                  = 0;
                                        foreach($list_usertrans as $row_usertrans)
                                        {
                                            $pay                        = (int)$row_usertrans->Amt;
                                            $total_pay                  += $pay;
                                            $datepay                    = $row_usertrans->CreatedDate;  //yyyyy-mm-dd hh:mm:ss
                                            $datepay                    = explode(" ",$datepay)[0]; //yyyyy-mm-dd
                                            $datepay                    = substr($datepay,-2)."-".substr($datepay,5,2)."-".substr($datepay,0,4);
                                            
                                            $arr_row_usertrans          = array(
                                                                                "pay"  =>  $pay,
                                                                                "datepay"  =>  $datepay);
                                            $arr_pay[]                  = $arr_row_usertrans;
                                        }
                                        
                                        $datepay_last                   = $list_usertrans[0]->CreatedDate; //yyyy-mm-dd hh:mm:ss
                                        $sql_usertrans                  = "SELECT * FROM `usertrans` WHERE `CreatedDate` > '$datepay_last' AND (`Action` = 'CREATE' OR `Action` = 'ACTIVE') AND `agent` = '$row_agent_active->id'";
                                        $query_usertrans                = $this->db->query($sql_usertrans)->result();
                                        
                                        $total_money_usertrans          = 0;
                                        foreach($query_usertrans as $row_usertran)
                                        {
                                            $total_money_usertrans      += (int)$row_usertran->Amt;
                                        } 
                                        $tax_usertrans                  = $total_money_usertrans*$percenttax/100;
                                        $revious_balance                = (int)$row_statement->HaveToPay - $total_pay - $total_money_usertrans - $tax_usertrans;
                                        $totalbalance                   =  $revious_balance + $total_money_usertrans + $tax_usertrans;
                                    }
                                    else    //khong co thanh toan nao trong khoang tu ngay 10/03 den ngay hien tai dc chon
                                    {
                                        $totaltax                       = $row_statement->Tax;
                                                
                                        $active_1_15                    = $this->get_active_01_15_by_date_after_10th($row_agent_active->id,$day,$month,$year)->total;
                                        $active_16_31                   = $this->get_active_16_31_by_date_after_10th($row_agent_active->id,$day,$month,$year)->total;
                                        
                                        $activeuser                     = $row_statement->ActiveUser - (int)$active_1_15 - (int)$active_16_31;
                                        $inactiveuser                   = $row_statement->Inactive;
                                        
                                        $total_pay                      = 0;
                                        $datepay                        = "";
                                        $revious_balance                = (int)$row_statement->PreBalance;
                                        $totalbalance                   =  $revious_balance + $activeuser*$fees + $active_1_15*$fees + $active_16_31*$fees/2 + $totaltax;
                                    }
                                }
                                else    //có dữ liệu trong bảng statement nhưng là insert = tay lúc tạo ra agent, tất cả = 0
                                {
                                    $arr_pay                    = array();
                                    $datepay                    = $row_statement->FixDate;
                                    $datepay                    = explode(" ",$datepay)[0]; //yyyyy-mm-dd
                                    $list_usertrans             = $this->get_day_pay_fromtime_totime($row_agent_active->id,$day,substr($datepay,5,2),substr($datepay,0,4),$month,$year);
                                    //print_r($list_usertrans);die;
									if(count($list_usertrans) > 0) //da co thanh toan sau ngay 10/03 va truoc ngay hien tai dc chon
                                    {
                                        $activeuser                 = 0;
                                        $inactiveuser               = 0;
                                        
                                        $daypay_last                = substr($list_usertrans[0]->CreatedDate,8,2); //dd
                                        $monthpay_last              = substr($list_usertrans[0]->CreatedDate,5,2); //mm
                                        $yearpay_last               = substr($list_usertrans[0]->CreatedDate,0,4); //yyyy
                                        
                                        $active_1_15                = $this->get_active_01_15_by_date_after_10th_2($row_agent_active->id,$day,$month,$year,$daypay_last,$monthpay_last,$yearpay_last)->total;
                                        $active_16_31               = $this->get_active_16_31_by_date_after_10th_2($row_agent_active->id,$day,$month,$year,$daypay_last,$monthpay_last,$yearpay_last)->total;
                                        
                                        $totaltax                   = ($active_1_15*$fees + $active_16_31*$fees/2)*$percenttax/100;
                                        
                                        $total_pay                  = 0;
                                        foreach($list_usertrans as $row_usertrans)
                                        {
                                            $pay                        = (int)$row_usertrans->Amt;
                                            $total_pay                  += $pay;
                                            $datepay                    = $row_usertrans->CreatedDate;  //yyyyy-mm-dd hh:mm:ss
                                            $datepay                    = explode(" ",$datepay)[0]; //yyyyy-mm-dd
                                            $datepay                    = substr($datepay,-2)."-".substr($datepay,5,2)."-".substr($datepay,0,4);
                                            
                                            $arr_row_usertrans          = array(
                                                                                "pay"  =>  $pay,
                                                                                "datepay"  =>  $datepay);
                                            $arr_pay[]                  = $arr_row_usertrans;
                                        }
                                        $datepay_last                   = $list_usertrans[0]->CreatedDate; //yyyy-mm-dd hh:mm:ss
                                        $sql_usertrans                  = "SELECT * FROM `usertrans` WHERE `CreatedDate` > '$datepay_last' AND (`Action` = 'CREATE' OR `Action` = 'ACTIVE') AND `agent` = '$row_agent_active->id'";
                                        $query_usertrans                = $this->db->query($sql_usertrans)->result();
                                        
                                        $total_money_usertrans          = 0;
                                        foreach($query_usertrans as $row_usertran)
                                        {
                                            $total_money_usertrans      += (int)$row_usertran->Amt;
                                        }
                                        $tax_usertrans                  = $total_money_usertrans*$percenttax/100;
                                        
                                        $revious_balance                = (int)$row_statement->HaveToPay - $total_pay - $total_money_usertrans - $tax_usertrans;
                                        $totalbalance                   =  $revious_balance + $total_money_usertrans + $tax_usertrans;
                                    }
                                    else    //khong co thanh toan nao trong khoang tu ngay 10/03 den ngay hien tai dc chon
                                    {
                                        $activeuser                 = 0;
                                        $inactiveuser               = 0;
                                        
                                        $active_1_15                = $this->get_active_01_15_by_date_after_10th($row_agent_active->id,$day,$month,$year)->total;
                                        $active_16_31               = $this->get_active_16_31_by_date_after_10th($row_agent_active->id,$day,$month,$year)->total;
                                        //echo $active_16_31;die;
                                        /*$activeuser                     = $row_statement->ActiveUser;
                                        $inactiveuser                   = $row_statement->Inactive;
                                        
                                        $active_1_15                    = 0;
                                        $active_16_31                   = 0;*/
                                        
                                        $totaltax                       = ($active_1_15*$fees + $active_16_31*$fees/2)*$percenttax/100;
                                        
                                        $total_pay                      = 0;
                                        $datepay                        = "";
                                        $revious_balance                = (int)$row_statement->PreBalance;
                                        $totalbalance                   =  $revious_balance + ($active_1_15*$fees + $active_16_31*$fees/2) + $totaltax;
                                    }
									//
                                    $flag_button                = 0; //khong hien thi button pay
                                    //$revious_balance            = 0;
                                    //$activeuser                 = 0;
                                    //$inactiveuser               = 0;
                                    //$total_pay                  = 0;
                                        
                                    //$active_1_15                = $this->get_active_01_15_by_date_after_10th($row_agent_active->id,$day,$month,$year)->total;
									//$active_16_31               = $this->get_active_16_31_by_date_after_10th($row_agent_active->id,$day,$month,$year)->total;
                                    //echo $active_1_15;die;
									//$totalbalance               = (int)$revious_balance + $active_1_15*$fees + (int)$active_16_31*$fees/2;
                                }
                            }
                            else    //khong co du lieu cua thang trong statement
                            {
                                $flag_show                  = 0;
                                $arr_pay                    = array();
                                $flag_button                = 0; //khong hien thi button pay
                                $revious_balance            = 0;
                                $activeuser                 = 0;
                                $inactiveuser               = 0;
                                $total_pay                  = 0;
                                    
                                $active_1_15                = 0;
                                $active_16_31               = 0;
                                $totalbalance               = 0;
                                
                                $totaltax                   = 0;
                            }
                            if($flag_button == 1)
                                $str_button                     .= '<button type="button" class="btn btn-success" id="btnpayall" onclick="payall(\''.$row_agent_active->id.'\',\''.$yyyy_mm_dd.'\');">'.$this->lang->line(LANG_PAY_ALL).'</button>
                                                                    <button type="button" class="btn btn-info" id="btnpayorder" onclick="payorder(\''.$row_agent_active->id.'\',\''.$yyyy_mm_dd.'\');" data-toggle="modal" data-target="#modalpayorder">'.$this->lang->line(LANG_PAY_ORDER).'</button>';
                        }
                        else
                        {
                            if((int)$day < 10) //ngay < 10/03: tu ngay 01/03 den ngay 09/03 lay statement thang 02
                            { 
                                if(strlen((int)$month)       == 1)
                                {
                                    $str_month_1        = (int)($month-1);
                                    $str_year_1         = $year;
                                    if($str_month_1     == 0 || $str_month_1 == "0")
                                    {
                                        $str_year_1    = $year-1;
                                        $str_month_1    = "12";
                                    }
                                    else
                                        $str_month_1    =   "0".$str_month_1;
                                }
                                else
                                {
                                    $str_year_1         = $year;
                                    $str_month_1        = (int)($month-1);
                                    if($str_month_1 == 9)
                                        $str_month_1    = "09";
                                }
                                
                                $row_statement                  = $this->get_tbl_stament_by_userid_month($row_agent_active->id,$str_month_1,$str_year_1); //lay du lieu cua thang 02
                                
                                if(count($row_statement) > 0) //co du lieu cua thang 02 (always show button pay)
                                {
                                    $flag_show                  = 1;
                                    if($row_statement->Status == 1 || $row_statement->Status == "1")    //hệ thống đã tự insert vào db
                                    {
                                        $flag_button                = 1; //hien thi button pay
                                        
                                        $arr_pay                    = array();
                                        $datepay                    = $row_statement->FixDate;
                                        $datepay                    = explode(" ",$datepay)[0]; //yyyyy-mm-dd
                                        $list_usertrans              = $this->get_day_pay_fromtime_totime($row_agent_active->id,$day,substr($datepay,5,2),substr($datepay,0,4),$month,$year);
                                        if(count($list_usertrans) > 0) //da co thanh toan sau ngay 10/02 va truoc ngay hien tai dc chon
                                        {
                                            $activeuser                 = 0;
                                            $inactiveuser               = 0;
                                            
                                            $daypay_last                = substr($list_usertrans[0]->CreatedDate,8,2); //dd
                                            $monthpay_last              = substr($list_usertrans[0]->CreatedDate,5,2); //mm
                                            $yearpay_last               = substr($list_usertrans[0]->CreatedDate,0,4); //yyyy
                                            
                                            $active_1_15                = $this->get_active_01_15_by_date_after_10th_2($row_agent_active->id,$day,$month,$year,$daypay_last,$monthpay_last,$yearpay_last)->total;
                                            $active_16_31               = $this->get_active_16_31_by_date_after_10th_2($row_agent_active->id,$day,$month,$year,$daypay_last,$monthpay_last,$yearpay_last)->total;
                                            
                                            $totaltax                   = ($active_1_15*$fees + $active_16_31*$fees/2)*$percenttax/100;
                                            
                                            $total_pay                  = 0;
                                            foreach($list_usertrans as $row_usertrans)
                                            {
                                                $pay                        = (int)$row_usertrans->Amt;
                                                $total_pay                  += $pay;
                                                $datepay                    = $row_usertrans->CreatedDate;  //yyyyy-mm-dd hh:mm:ss
                                                $datepay                    = explode(" ",$datepay)[0]; //yyyyy-mm-dd
                                                $datepay                    = substr($datepay,-2)."-".substr($datepay,5,2)."-".substr($datepay,0,4);
                                                
                                                $arr_row_usertrans          = array(
                                                                                "pay"  =>  $pay,
                                                                                "datepay"  =>  $datepay);
                                                $arr_pay[]                  = $arr_row_usertrans;
                                            }
                                            $datepay_last                   = $list_usertrans[0]->CreatedDate; //yyyy-mm-dd hh:mm:ss
                                            $sql_usertrans                  = "SELECT * FROM `usertrans` WHERE `CreatedDate` > '$datepay_last' AND (`Action` = 'CREATE' OR `Action` = 'ACTIVE') AND `agent` = '$row_agent_active->id'";
                                            $query_usertrans                = $this->db->query($sql_usertrans)->result();
                                            
                                            $total_money_usertrans          = 0;
                                            foreach($query_usertrans as $row_usertran)
                                            {
                                                $total_money_usertrans      += (int)$row_usertran->Amt;
                                            }
                                            $tax_usertrans                  = $total_money_usertrans*$percenttax/100;
                                            
                                            $revious_balance                = (int)$row_statement->HaveToPay - $total_pay - $total_money_usertrans - $tax_usertrans;
                                            $totalbalance                   = (int)$revious_balance + $total_money_usertrans + $tax_usertrans;
                                        }
                                        else    //khong co thanh toan nao trong khoang tu ngay 10/03 den ngay hien tai dc chon
                                        {
                                            $totaltax                       = $row_statement->Tax;
                                            
                                            $active_1_15                = $this->get_active_01_15_by_date_after_10th_3($row_agent_active->id,10,$str_month_1,$str_year_1,$day,$month,$year)->total;
                                            $active_16_31               = $this->get_active_16_31_by_date_after_10th_3($row_agent_active->id,10,$str_month_1,$str_year_1,$day,$month,$year)->total;
                                            
                                            $activeuser                     = $row_statement->ActiveUser - (int)$active_1_15 - (int)$active_16_31;
                                            $inactiveuser                   = $row_statement->Inactive;
                                            
                                            $total_pay                      = 0;
                                            $datepay                        = "";
                                            $revious_balance                = (int)$row_statement->PreBalance;
                                            $totalbalance                   = (int)$revious_balance + $activeuser*$fees + $active_16_31*$fees/2 + $active_1_15*$fees + $totaltax;
                                        }
                                    }
                                    else    //có dữ liệu trong bảng statement nhưng là insert = tay lúc tạo ra agent, tất cả = 0
                                    {
                                        $flag_button                = 0; //hien thi button pay
                                        
                                        $arr_pay                    = array();
                                        $datepay                    = $row_statement->FixDate;
                                        $datepay                    = explode(" ",$datepay)[0]; //yyyyy-mm-dd
                                        $list_usertrans              = $this->get_day_pay_fromtime_totime($row_agent_active->id,$day,substr($datepay,5,2),substr($datepay,0,4),$month,$year);
                                        if(count($list_usertrans) > 0) //da co thanh toan sau ngay 10/02 va truoc ngay hien tai dc chon
                                        {
                                            $activeuser                 = 0;
                                            $inactiveuser               = 0;
                                            
                                            $daypay_last                = substr($list_usertrans[0]->CreatedDate,8,2); //dd
                                            $monthpay_last              = substr($list_usertrans[0]->CreatedDate,5,2); //mm
                                            $yearpay_last               = substr($list_usertrans[0]->CreatedDate,0,4); //yyyy
                                            
                                            $active_1_15                = $this->get_active_01_15_by_date_after_10th($row_agent_active->id,$day,$month,$year,$daypay_last,$monthpay_last,$yearpay_last)->total;
                                            $active_16_31               = $this->get_active_16_31_by_date_after_10th($row_agent_active->id,$day,$month,$year,$daypay_last,$monthpay_last,$yearpay_last)->total;
                                            
                                            $totaltax                   = ($active_1_15*$fees + $active_16_31*$fees/2)*$percenttax/100;
                                            
                                            $total_pay                  = 0;
                                            foreach($list_usertrans as $row_usertrans)
                                            {
                                                $pay                        = (int)$row_usertrans->Amt;
                                                $total_pay                  += $pay;
                                                $datepay                    = $row_usertrans->CreatedDate;  //yyyyy-mm-dd hh:mm:ss
                                                $datepay                    = explode(" ",$datepay)[0]; //yyyyy-mm-dd
                                                $datepay                    = substr($datepay,-2)."-".substr($datepay,5,2)."-".substr($datepay,0,4);
                                                
                                                $arr_row_usertrans          = array(
                                                                                "pay"  =>  $pay,
                                                                                "datepay"  =>  $datepay);
                                                $arr_pay[]                  = $arr_row_usertrans;
                                            }
                                            $datepay_last                   = $list_usertrans[0]->CreatedDate; //yyyy-mm-dd hh:mm:ss
                                            $sql_usertrans                  = "SELECT * FROM `usertrans` WHERE `CreatedDate` > '$datepay_last' AND (`Action` = 'CREATE' OR `Action` = 'ACTIVE') AND `agent` = '$row_agent_active->id'";
                                            $query_usertrans                = $this->db->query($sql_usertrans)->result();
                                            
                                            $total_money_usertrans          = 0;
                                            foreach($query_usertrans as $row_usertran)
                                            {
                                                $total_money_usertrans      += (int)$row_usertran->Amt;
                                            }
                                            $tax_usertrans                  = $total_money_usertrans*$percenttax/100;
                                            
                                            $revious_balance                = (int)$row_statement->HaveToPay - $total_pay - $total_money_usertrans - $tax_usertrans;
                                            
                                            $totalbalance                   = (int)$revious_balance + $total_money_usertrans + $tax_usertrans;
                                        }
                                        else    //khong co thanh toan nao trong khoang tu ngay 10/03 den ngay hien tai dc chon
                                        {
                                            $activeuser                 = 0;
                                            $inactiveuser               = 0;
                                            
                                            $active_1_15                = $this->get_total_active_1_15_by_agentid_from_to($row_agent_active->id,$monthre,$yearre,$month,$year)->total;
                                            $active_16_31               = $this->get_total_active_16_31_by_agentid_from_to($row_agent_active->id,$monthre,$yearre,$month,$year)->total;
                                            /*$activeuser                     = $row_statement->ActiveUser;
                                            $inactiveuser                   = $row_statement->Inactive;
                                            
                                            $totaltax                       = $row_statement->Tax;
                                            
                                            $active_1_15                    = 0;
                                            $active_16_31                   = 0;*/
                                            $totaltax                       = ($active_1_15*$fees + $active_16_31*$fees/2)*$percenttax/100;
                                        
                                            $total_pay                      = 0;
                                            $datepay                        = "";
                                            $revious_balance                = (int)$row_statement->PreBalance;
                                            $totalbalance                   =  $revious_balance + ($active_1_15*$fees + $active_16_31*$fees/2) + $totaltax;
                                            
                                        }
                                        /*$arr_pay                    = array();
                                        $flag_button                = 1; //khong hien thi button pay
                                        $revious_balance            = 0;
                                        $activeuser                 = 0;
                                        $inactiveuser               = 0;
                                        $total_pay                  = 0;
                                            
                                        $active_1_15                = $this->get_active_01_15_by_date_after_10th($row_agent_active->id,$day,$month,$year)->total;
                                        $active_16_31               = $this->get_active_16_31_by_date_after_10th($row_agent_active->id,$day,$month,$year)->total;
                                        $totalbalance               = (int)$revious_balance + $active_1_15*$fees + (int)$active_16_31*$fees/2;
                                        */
                                    }
                                } 
                                else
                                {
                                    $flag_show                  = 0;
                                    $arr_pay                    = array();
                                    $flag_button                = 0; //khong hien thi button pay
                                    $revious_balance            = 0;
                                    $activeuser                 = 0;
                                    $inactiveuser               = 0;
                                    $total_pay                  = 0;
                                        
                                    $active_1_15                = 0;
                                    $active_16_31               = 0;
                                    $totalbalance               = 0;
                                    
                                    $totaltax                   = 0;
                                }
                                  
                                if($flag_button == 1)
                                    $str_button                     .= '<button type="button" class="btn btn-success" id="btnpayall" onclick="payall(\''.$row_agent_active->id.'\',\''.$yyyy_mm_dd.'\');">'.$this->lang->line(LANG_PAY_ALL).'</button>
                                                                    <button type="button" class="btn btn-info" id="btnpayorder" onclick="payorder(\''.$row_agent_active->id.'\',\''.$yyyy_mm_dd.'\');" data-toggle="modal" data-target="#modalpayorder">'.$this->lang->line(LANG_PAY_ORDER).'</button>'; 
                            }
                        }
                        
                        if($flag_show == 1)
                        {
                            $str_list .= '<table class="table table-hover table-bordered">';
                                $str_list .= '<tbody>';
                                    $str_list .= '<tr>';
                                        $str_list .= '<td>'.$this->lang->line(LANG_TR_AGENT_NAME).':</td>';
                                        $str_list .= '<td>'.$row_agent_active->fullname.'</td>';
                                        $str_list .= '<td></td>';
                                    $str_list .= '</tr>';
                                    $str_list .= '<tr>';
                                        $str_list .= '<td>'.$this->lang->line(LANG_TR_CONTACT).':</td>';
                                        $str_list .= '<td>'.$row_agent_active->phonenumber.'</td>';
                                        $str_list .= '<td></td>';
                                    $str_list .= '</tr>';
                                    $str_list .= '<tr>';
                                        $str_list .= '<td>'.$this->lang->line(LANG_PREVIOUS_BALANCE).':</td>';
                                        $str_list .= '<td>'.$row_agent_active->currency.$revious_balance.'</td>';
                                    $str_list .= '</tr>';
                                    
                                    $str_list .= '<tr>';
                                        $str_list .= '<td>'.$this->lang->line(LANG_ACTIVE_USER).':</td>';
                                        $str_list .= '<td>'.$activeuser.' x '.$row_agent_active->currency.(int)$fees.'</td>';
                                        $str_list .= '<td>'.$row_agent_active->currency.number_format($activeuser*((int)$fees)).'</td>';
                                    $str_list .= '</tr>';
                                    
                                    $str_list .= '<tr>';
                                        $str_list .= '<td>'.$this->lang->line(LANG_INACTIVE_USER).':</td>';
                                        $str_list .= '<td>'.$inactiveuser.' x 0</td>';
                                        $str_list .= '<td>0</td>';
                                    $str_list .= '</tr>';
                                    
                                    $str_list .= '<tr>';
                                        $str_list .= '<td>'.$this->lang->line(LANG_ACTIVE_MEMBER1_15).':</td>';
                                        $str_list .= '<td>'.$active_1_15.' x '.$row_agent_active->currency.((int)$fees).'</td>';
                                        $str_list .= '<td>'.$row_agent_active->currency.number_format($active_1_15*((int)$fees)).'</td>';
                                    $str_list .= '</tr>';
                                    $str_list .= '<tr>';
                                        $str_list .= '<td>'.$this->lang->line(LANG_ACTIVE_MEMBER16_31).':</td>';
                                        $str_list .= '<td>'.$active_16_31.' x '.$row_agent_active->currency.((int)((int)$fees/2)).'</td>';
                                        $str_list .= '<td>'.$row_agent_active->currency.number_format($active_16_31*((int)((int)$fees/2))).'</td>';
                                    $str_list .= '</tr>';
                                    
                                    $str_list .= '<tr>';
                                        $str_list .= '<td colspan="2"><h4>'.$this->lang->line(LANG_TOTAL).'</h4></td>';
                                            $totalmoney = $active_1_15*((int)$fees)+$active_16_31*((int)((int)$fees/2));
                                        
                                        $str_list .= '<td><h4>'.$row_agent_active->currency.number_format($totalmoney,2).'</h4></td>';
                                    $str_list .= '</tr>';
                                                                        
                                    $str_list .= '<tr>';
                                        $str_list .= '<td colspan="2"><h4>'.$this->lang->line(LANG_GST).'</h4></td>';
                                        $str_list .= '<td><h4>'.$row_agent_active->currency.number_format($totaltax,2).'</h4></td>';
                                    $str_list .= '</tr>';
                                    
                                    $str_list .= '<tr>';
                                        $str_list .= '<td colspan="2"><h4>'.$this->lang->line(LANG_TOTAL_BALANCE).'</h4></td>';
                                        $str_list .= '<td><h4>'.$row_agent_active->currency.number_format($totalbalance,2).'</h4></td>';
                                    $str_list .= '</tr>';
                                    
                                    if(count($arr_pay) > 0)
                                    {
                                        foreach($arr_pay as $row_pay)
                                        {
											$str_list .= '<tr>';
                                                $str_list .= '<td colspan="3">Payment on '.$row_pay["datepay"].' amount '.$row_agent_active->currency.$row_pay["pay"].'</td>';
											$str_list .= '</tr>';
										}
                                    }
                                    
                                    $str_list .= '<tr>';
                                        $str_list .= '<td colspan="3">'.$str_button.'&nbsp;</td>';
                                    $str_list .= '</tr>';
                                $str_list .= '</tbody>';
                            $str_list .= '</table>';
                        }
                        else
                        {
                            $str_list .= '<table class="table table-hover table-bordered">';
                            $str_list .= '<tbody>';
                                $str_list .= '<tr>';
                                    $str_list .= '<td>'.$this->lang->line(LANG_TR_AGENT_NAME).':</td>';
                                    $str_list .= '<td>'.$row_agent_active->fullname.'</td>';
                                    $str_list .= '<td></td>';
                                $str_list .= '</tr>';
                                $str_list .= '<tr>';
                                    $str_list .= '<td>'.$this->lang->line(LANG_TR_CONTACT).':</td>';
                                    $str_list .= '<td>'.$row_agent_active->phonenumber.'</td>';
                                    $str_list .= '<td></td>';
                                $str_list .= '</tr>';
                                $str_list .= '<tr>';
                                    $str_list .= '<td colspan="3">'.$this->lang->line(LANG_NOT_FOUND).'</td>';
                                $str_list .= '</tr>';
                            $str_list .= '</tbody>';
                            $str_list .= '</table>';
                        }
                }
            } 
            //tinh so trang
            $num_page=ceil($totalrow/$limit);
            
            //set previous page of current page
            if($page<=3)
                $limitprecurrentpage=1;
            else
                $limitprecurrentpage=$page-2;
            //set next page of current page
            if($page>=($num_page -2))
                $limitnextcurrentpage=$num_page;
            else
                $limitnextcurrentpage=$page+2;
            
            if($num_page>0)
            {
                $str_numpage .= '<ul class="pagination ">';
                    if($page==1)
                        $str_numpage .= '<li class="disabled"><a href="javascript:void(0);" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                    else
                        $str_numpage .= '<li ><a href="javascript:void(0);" onclick="get_agent_statement('.($page-1).',\''.$date.'\')" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                    $runpre=0;
                    $runnext=0;
                    $flag=0;
                    for($i=1;$i<=$num_page;$i++)
                    {
                        if($i>=$limitprecurrentpage && $i<=$limitnextcurrentpage)
                        {
                            if($page == $i)
                                $str_numpage .= '<li class="active"><a href="javascript:void(0);" >'.$i.'</a></li>';
                            else
                                $str_numpage .= '<li><a href="javascript:void(0);" onclick="get_agent_statement('.$i.',\''.$date.'\')" >'.$i.'</a></li>';
                        }
                        else
                        {
                            if($i<=$page)
                            {
                                if($runpre==0)
                                {
                                    $str_numpage .= '<li><span>..</span></li>'; 
                                    $runpre++;
                                }
                            } 
                            if($i>=$page)
                            {
                                if($runnext==0)
                                {
                                    $str_numpage .= '<li><span>..</span></li>'; 
                                    $runnext++;
                                }
                            }
                        }
                    }
                    if($page==$num_page)
                        $str_numpage .= '<li class="disabled"><a href="javascript:void(0);" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                    else
                        $str_numpage .= '<li ><a href="javascript:void(0);" onclick="get_agent_statement('.($page+1).',\''.$date.'\')" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                  $str_numpage .='</ul>';
            } 
            
            //return
            $arr = array("totalrow"=>$totalrow,"str_list"=>$str_list,"str_numpage"=>$str_numpage,"notfound"=>$notfound);
            return $arr;
        }
    }
    public function get_list_tbl_user($level,$status,$start,$limit)
    {
        if(isset($_SESSION['AccUserSuper']))
        {
            if($_SESSION['AccUserSuper']['level']==1)
                $sql="SELECT * FROM `users` WHERE `level` = $level AND `status`=$status ORDER BY `fullname` LIMIT $start,$limit";
            else
            {
                $id=$_SESSION['AccUserSuper']['id'];
                $sql="SELECT * FROM `users` WHERE `level` = $level AND `status`=$status AND `pid`='$id' ORDER BY `fullname` LIMIT $start,$limit";
            }
        }
        else
            $sql="SELECT * FROM `users` WHERE `level` = $level AND `status`=$status ORDER BY `fullname` LIMIT $start,$limit";
        $query=$this->db->query($sql)->result();
        return $query;
    }
    public function get_total_by_date($agent_username,$starttime,$finishtime,$level,$status)
    {
        $sql="SELECT COUNT(*) AS total FROM `users` 
                WHERE `pid`='$agent_username' AND `level` = $level AND `status` = $status AND `createdate` BETWEEN '$starttime' AND '$finishtime'";
        $query=$this->db->query($sql)->row();
        return $query;
    }
    public function get_total_after_date($agent_username,$finishtime,$level,$status)
    {
        $sql="SELECT COUNT(*) AS total FROM `users` 
                WHERE `pid`='$agent_username' AND `level` = $level AND `status` = $status AND `createdate` > '$finishtime'";
        $query=$this->db->query($sql)->row();
        return $query;
    }
    public function total_user($level,$status)
    {
        if(isset($_SESSION['AccUserSuper']))
        {
            if($_SESSION['AccUserSuper']['level']==1)
                $sql_count="SELECT COUNT(*) as total FROM `users` WHERE `level`=$level AND `status` = $status ORDER BY `rowid` desc";
            else
            {
                $id=$_SESSION['AccUserSuper']['id'];
                $sql_count="SELECT COUNT(*) as total FROM `users` WHERE `level`=$level AND `status` = $status AND `pid`='$id' ORDER BY `rowid` desc";
            }
        }
        else
            $sql_count="SELECT COUNT(*) as total FROM `users` WHERE `level`=$level AND `status` = $status ORDER BY `rowid` desc";
            
        $query=$this->db->query($sql_count)->row();
        return $query;
    }
    /*
    |   function get data active in active date from 1 - 15
    */
    public function get_total_active_1_15_by_agentid_from_to($agentid,$month1,$year1,$month2,$year2) //yyyy-mm-dd
    {
        $sql        = "SELECT COUNT(*) AS total FROM `usertrans` 
                    	WHERE `agent` = '$agentid' AND `CreatedDate` BETWEEN '$year1-$month1-01 00:00:01' 
            				AND '$year2-$month2-31 23:59:59' 
            				AND SUBSTRING(`CreatedDate`,9,2) > 10 AND SUBSTRING(`CreatedDate`,9,2) < 16";
        $query      = $this->db->query($sql)->row();
        return      $query;
    }
    /*
    |   function get data active in active date from 16 - 31
    */
    public function get_total_active_16_31_by_agentid_from_to($agentid,$month1,$year1,$month2,$year2) //yyyy-mm-dd
    {
        $sql        = "SELECT COUNT(*) AS total FROM `usertrans` 
                    	WHERE `agent` = '$agentid' AND `CreatedDate` BETWEEN '$year1-$month1-01 00:00:01' 
            				AND '$year2-$month2-31 23:59:59' 
            				AND SUBSTRING(`CreatedDate`,9,2) > 15 AND SUBSTRING(`CreatedDate`,9,2) < 32";
        $query      = $this->db->query($sql)->row();
        return      $query;
    }
    //get valuekey from file setting.xml
   public function getSetting($key)
    {
        $url=base_url('assets/setting/setting.xml');
        //echo $url;die;
        $value ="";
        try{
            $xml = simplexml_load_file($url);       
            $value = (string) $xml->$key;              
        }catch(exception $e)
        {
            
        }
        return $value;
    }
    public function get_tbl_stament_by_userid($userid)
    {
        $sql        = "SELECT * FROM `statement` WHERE `UserID` = '$userid' ORDER BY `FixDate` DESC";
        $query      = $this->db->query($sql)->row();
        return      $query;
    }
    
    //26/04/2015     
    public function get_tbl_statement_by_agentid_and_date($agentid,$date)   //yyyy-mm-dd
    {
        $sql    = "SELECT * FROM `statement` WHERE `UserID` = '$agentid' AND SUBSTRING(`FixDate`,1,10) = '$date'";
        $query  = $this->db->query($sql)->row();
        return $query;
    }
    public function get_total_active_or_inactive_customer_by_agentid_status($agentid,$status) //yyyy-mm-dd
    {
        $sql        = "SELECT COUNT(*) AS total FROM `users` 
                        WHERE `level` = 4 AND `pid` = '$agentid' AND `status` = $status";
        $query      = $this->db->query($sql)->row();
        return      $query;
    } 
    public function get_tbl_stament_by_userid_month($userid,$month,$year)
    {
        $sql        = "SELECT * FROM `statement` WHERE `UserID` = '$userid' AND SUBSTRING(`FixDate`,6,2)= '$month' AND SUBSTRING(`FixDate`,1,4)= '$year'";
        //echo $sql;die;
        $query      = $this->db->query($sql)->row();
        
        return      $query;
    }
    
    public function get_tbl_stament_by_userid_smaller_month($userid,$month,$year)
    {
        $sql        = "SELECT * FROM `statement` WHERE `UserID` = '$userid' 
                                    AND `FixDate` <= '$year-$month-11' ORDER BY `FixDate` DESC";                                                                        
        $query      = $this->db->query($sql)->row();
        return      $query;
    }
    /*
    |----------------------------------------
    |function get active 01-15 theo ngay thang nam(ngay >10): trong thang 
    |----------------------------------------
    */
    public function get_active_01_15_by_date_after_10th($agentid,$day,$month,$year)
    {
        $rowid      =   $this->get_rowid_by_userid($agentid);
        $sql        = "SELECT COUNT(*) AS total FROM `usertrans` 
                	WHERE `agent` = '$agentid' AND `Amt` > 0 AND SUBSTRING(`CreatedDate`,1,7) = '$year-$month' AND 
                		SUBSTRING(`CreatedDate`,9,2) >= 10 AND SUBSTRING(`CreatedDate`,9,2) < 16 AND SUBSTRING(`CreatedDate`,1,10) <= '$year-$month-$day'";
                        //echo $sql;die;
        $query      = $this->db->query($sql)->row();
        return      $query;
    }
    public function get_active_01_15_by_date_after_10th_2($agentid,$day,$month,$year,$day2,$month2,$year2)
    {
        $rowid      =   $this->get_rowid_by_userid($agentid);
        $sql        = "SELECT COUNT(*) AS total FROM `usertrans` 
                	WHERE `agent` = '$agentid' AND `Amt` > 0 AND SUBSTRING(`CreatedDate`,1,7) = '$year-$month' AND 
                		SUBSTRING(`CreatedDate`,9,2) >= 10 AND SUBSTRING(`CreatedDate`,9,2) < 16 AND SUBSTRING(`CreatedDate`,1,10) <= '$year-$month-$day' AND SUBSTRING(`CreatedDate`,1,10) >= '$year2-$month2-$day2'";
                        //echo $sql;die;
        $query      = $this->db->query($sql)->row();
        return      $query;
    }
    public function get_active_01_15_by_date_after_10th_3($agentid,$day,$month,$year,$day2,$month2,$year2)
    {
        $rowid      =   $this->get_rowid_by_userid($agentid);
        $sql        = "SELECT COUNT(*) AS total FROM `usertrans` 
                	WHERE `agent` = '$agentid' AND `Amt` > 0 AND (SUBSTRING(`CreatedDate`,1,7) = '$year-$month' OR SUBSTRING(`CreatedDate`,1,7) = '$year2-$month2') AND 
                		SUBSTRING(`CreatedDate`,9,2) >= 10 AND SUBSTRING(`CreatedDate`,9,2) < 16 AND SUBSTRING(`CreatedDate`,1,10) >= '$year-$month-$day' AND SUBSTRING(`CreatedDate`,1,10) <= '$year2-$month2-$day2'";
                        //echo $sql;die;
        $query      = $this->db->query($sql)->row();
        return      $query;
    }
    public function get_active_16_31_by_date_after_10th($agentid,$day,$month,$year)
    {
        $rowid      =   $this->get_rowid_by_userid($agentid);
        $sql        = "SELECT COUNT(*) AS total FROM `usertrans` 
                	WHERE `agent` = '$agentid' AND `Amt` > 0 AND SUBSTRING(`CreatedDate`,1,7) = '$year-$month' AND 
                		SUBSTRING(`CreatedDate`,9,2) > 15 AND SUBSTRING(`CreatedDate`,9,2) < 32 AND SUBSTRING(`CreatedDate`,1,10) <= '$year-$month-$day'";
        //echo $sql;die;
		$query      = $this->db->query($sql)->row();
        return      $query;
    }
    public function get_active_16_31_by_date_after_10th_2($agentid,$day,$month,$year,$day2,$month2,$year2)
    {
        $rowid      =   $this->get_rowid_by_userid($agentid);
        $sql        = "SELECT COUNT(*) AS total FROM `usertrans` 
                	WHERE `agent` = '$agentid' AND `Amt` > 0 AND SUBSTRING(`CreatedDate`,1,7) = '$year-$month' AND 
                		SUBSTRING(`CreatedDate`,9,2) > 15 AND SUBSTRING(`CreatedDate`,9,2) < 32 AND SUBSTRING(`CreatedDate`,1,10) <= '$year-$month-$day' AND SUBSTRING(`CreatedDate`,1,10) <= '$year2-$month2-$day2'";
        //echo $sql;die;
		$query      = $this->db->query($sql)->row();
        return      $query;
    }
    public function get_active_16_31_by_date_after_10th_3($agentid,$day,$month,$year,$day2,$month2,$year2)
    {
        $rowid      =   $this->get_rowid_by_userid($agentid);
        $sql        = "SELECT COUNT(*) AS total FROM `usertrans` 
                	WHERE `agent` = '$agentid' AND `Amt` > 0 AND (SUBSTRING(`CreatedDate`,1,7) = '$year-$month' OR SUBSTRING(`CreatedDate`,1,7) = '$year2-$month2') AND 
                		SUBSTRING(`CreatedDate`,9,2) > 15 AND SUBSTRING(`CreatedDate`,9,2) < 32 AND SUBSTRING(`CreatedDate`,1,10) >= '$year-$month-$day' AND SUBSTRING(`CreatedDate`,1,10) <= '$year2-$month2-$day2'";
        //echo $sql;die;
		$query      = $this->db->query($sql)->row();
        return      $query;
    }
    /*
    |----------------------------------------
    |function get active 01-15 theo ngay thang nam(ngay < 10): ngay 10 thang truoc toi ngay hien tai thang sau
    |----------------------------------------
    */
    public function get_active_01_15_by_date_before_10th($agentid,$day,$month1,$year1,$month2,$year2)
    {
        $rowid      =   $this->get_rowid_by_userid($agentid);
        $sql        = "SELECT COUNT(*) AS total FROM `usertrans` 
                	WHERE `agent` = '$agentid' and `Action`='CREATE' AND (SUBSTRING(`CreatedDate`,1,7) = '$year1-$month1' or SUBSTRING(`CreatedDate`,1,7) = '$year2-$month2') AND 
                		SUBSTRING(`CreatedDate`,9,2) >= 10 AND SUBSTRING(`CreatedDate`,9,2) < 16 AND SUBSTRING(`CreatedDate`,1,10) < '$year2-$month2-$day'";
        $query      = $this->db->query($sql)->row();
        return      $query;
    }
    public function get_active_16_31_by_date_before_10th($agentid,$day,$month1,$year1,$month2,$year2)
    {
        $rowid      =   $this->get_rowid_by_userid($agentid);
        $sql        = "SELECT COUNT(*) AS total FROM `usertrans` 
                	WHERE `agent` = '$agentid' and `Action`='CREATE' AND (SUBSTRING(`CreatedDate`,1,7) = '$year1-$month1' or SUBSTRING(`CreatedDate`,1,7) = '$year2-$month2') AND 
                		SUBSTRING(`CreatedDate`,9,2) > 15 AND SUBSTRING(`CreatedDate`,9,2) < 32 AND SUBSTRING(`CreatedDate`,1,10) <= '$year2-$month2-$day'";
        $query      = $this->db->query($sql)->row();
        return      $query;
    }
    
    public function get_day_pay_fromtime_totime($agentid,$day,$month,$year,$curmonth,$curyear)
    {
        $rowid      =   $this->get_rowid_by_userid($agentid);
        $sql        =   "SELECT * FROM `usertrans` 
                        WHERE `Action` = 'PAY' AND (`agent` IS NULL OR `agent` = '')
                        	AND `userid` = '$rowid' AND SUBSTRING(`CreatedDate`,1,10) <= '$curyear-$curmonth-$day' AND SUBSTRING(`CreatedDate`,1,10) >= '$year-$month-10' ORDER BY `CreatedDate` DESC";
        //echo $sql;die;
        $query      =   $this->db->query($sql)->result();
        return $query;
    }
    public function get_rowid_by_userid($userid)
    {
        $sql    =   "SELECT `rowid` FROM `users` WHERE `id` = '$userid'";
        $query  =   $this->db->query($sql)->row()->rowid;
        return $query;
    }
    
    
    
    /*
    |----------------------------------------
    |function click button pay all 
    |----------------------------------------
    */
    public function btnpayall()
    {
        if(isset($_POST['agentid']) && isset($_POST['yyyy_mm_dd']))
        {
            $agentid                    = $_POST['agentid'];
            $date                       = $_POST['yyyy_mm_dd']; //yyyy-mm-dd
            $arr_date                   = explode("-",$date);
            $date_return                = $arr_date[0]."/".$arr_date[1]."/".$arr_date[2];            
            $month                      = $arr_date[1];
            $year                       = $arr_date[0];
            
            if(strlen((int)$month)       == 1)
            {
                $str_month_1        = (int)($month-1);
                $str_year_1         = $year;
                if($str_month_1     == 0 || $str_month_1 == "0")
                {
                    $str_year_1     = $year-1;
                    $str_month_1    = "12";
                }
                else
                {
                    $str_month_1    = "0".$str_month_1;
                }
            }
            else
            {
                $str_year_1         = $year;
                $str_month_1        = (int)($month-1);
                if($str_month_1 == 9)
                    $str_month_1    = "09";
            }
                                                
            if((int)$arr_date[2] >= 10)
            {
                $date                   = $year."-".$month."-10";
            }
            else
            {
                $date                   = $str_year_1."-".$str_month_1."-10";
            }
            $row_statement              = $this->get_tbl_stament_by_userid_month($agentid,$month,$year);
            if(count($row_statement) > 0)
            {
                $rowid                  =   $this->get_rowid_by_userid($agentid);
                $HaveToPay              =   $row_statement->HaveToPay;
                $tax                    =   $row_statement->Tax;
                
                $havepay                =   $tax + $HaveToPay;
                
                $repay                  =   $row_statement->Pay;
                $pay                    =   (int)($havepay - $repay);
                $sql                    =   "UPDATE `statement` SET `Pay` = '$havepay' WHERE `UserID` = '$agentid' AND SUBSTRING(`FixDate`,6,2)= '$month' AND SUBSTRING(`FixDate`,1,4)= '$year'";
                //echo $sql;die;
                $query                  =   $this->db->query($sql);
                
                $sql_usertrans          =   "INSERT INTO `usertrans` 
                                                    (`id`, `userid`, `Action`, `Value`, `Amt`, `CreatedDate`, `CreatedBy`, `agent`) 
                                            VALUES (NULL, '$rowid',   'PAY',    '1',    '$pay',  '$date',       'admin',    NULL)";
                $query_usertrans        =   $this->db->query($sql_usertrans);
                //return
                if($query && $query_usertrans)
                    $flag   = 1;
                else
                    $flag   = 0;
                
                $arr        =   array("flag"=>$flag, "date" =>  $date_return);
                return $arr;
            }
        }
    }
    /*
    |----------------------------------------
    |function click button save pay order 
    |----------------------------------------
    */
    public function btnpayorder()
    {
        if(isset($_POST['agentid']) && isset($_POST['yyyy_mm_dd']))
        {
            $agentid                    = $_POST['agentid'];
            $date                       = $_POST['yyyy_mm_dd']; //yyyy-mm-dd
            $datepay                    = $_POST['yyyy_mm_dd']; //yyyy-mm-dd
            $money                      = $_POST['money'];
            
            $arr_date                   = explode("-",$date);
            $date_return                = $arr_date[0]."/".$arr_date[1]."/".$arr_date[2];            
            
            $month                      = $arr_date[1];
            $year                       = $arr_date[0];
            
            if(strlen($month)       == 1)
            {
                $str_month_1        = (int)($month-1);
                $str_year_1         = $year;
                if($str_month_1     == 0 || $str_month_1 == "0")
                {
                    $str_year_1     = $year-1;
                    $str_month_1    = "12";
                }
                else
                {
                    $str_month_1    = "0".$str_month_1;
                }
            }
            else
            {
                $str_year_1         = $year;
                $str_month_1        = (int)($month-1);
                if($str_month_1 == 9)
                    $str_month_1    = "09";
            }
            
            if((int)$arr_date[2] >= 10)
            {
                
                $date                   = $year."-".$month."-10";
            }
            else
            {
                $date                   = $str_year_1."-".$str_month_1."-10";
            }
            $row_statement              = $this->get_tbl_stament_by_userid_month($agentid,$month,$year);
            if(count($row_statement) > 0)
            {
                $rowid                  =   $this->get_rowid_by_userid($agentid);
                $repay                  =   $row_statement->Pay;
                $pay                    =   (int)($repay + $money);
                $sql                    =   "UPDATE `statement` SET `Pay` = '$pay' WHERE `UserID` = '$agentid' AND SUBSTRING(`FixDate`,6,2)= '$month' AND SUBSTRING(`FixDate`,1,4)= '$year'";
                //echo $sql;die;
                $query                  =   $this->db->query($sql);
                
                $sql_usertrans          =   "INSERT INTO `usertrans` 
                                                    (`id`, `userid`, `Action`, `Value`, `Amt`, `CreatedDate`, `CreatedBy`, `agent`) 
                                            VALUES (NULL, '$rowid',   'PAY',    '1',    '$money',  '$datepay',       'admin',    NULL)";
                $query_usertrans        =   $this->db->query($sql_usertrans);
                //return
                if($query && $query_usertrans)
                    $flag   = 1;
                else
                    $flag   = 0;
                
                $arr        =   array("flag"=>$flag, "date" =>  $date_return);
                return $arr;
            }
        }
    }
    public function get_agent_by_agentid($agentid)
    {
        $sql    = "SELECT * FROM `users` WHERE `id`='$agentid' AND `level`=3";
        $query  =$this->db->query($sql)->row();
        return $query;
    }
    /*
    |-----------------------------------------------
    | function get percenttax from table commmoncode
    |-----------------------------------------------
    */
    public function get_percenttax()
    {
        $sql    = "SELECT * FROM `commoncode` WHERE `CommonTypeId` = 'Statement' AND `CommonId` = '01'";
        $query  =$this->db->query($sql)->row();
        return $query;
    }
}