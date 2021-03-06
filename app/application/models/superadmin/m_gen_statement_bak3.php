<?php
class M_gen_statement extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_agent_statement()
    {
        if(isset($_POST['page']) && isset($_POST['date']))
        {
            //chon ngay 12/03/2015
            $page = $_POST['page'];
            $date = $_POST['date'];
            
            $arr_date       = explode("/",$date);
            $day            = (int)$arr_date[0];
            $month          = (int)$arr_date[1];
            $year           = (int)$arr_date[2];
            $yyyy_mm_dd     = $arr_date[2]."-".$arr_date[1]."-".$arr_date[0];
            
            $day_timeline   = $this->getSetting("TimelineGenStatement"); //10th of every month
            $RM_active_agent= $this->getSetting("RMActiveAgentGenStatement");
            $RecordOnePage  = $this->getSetting("RecordOnePageGenStatement");
            
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
                        
                        if((int)$day > 10) //ngay > 10/03 lay statemnt cua thang do (03)
                        {
                            if(strlen($month)       == 1)
                                $str_month_1    =   "0".$month;
                            else
                                $str_month_1    =   $month;
                            $row_statement          = $this->get_tbl_stament_by_userid_month($row_agent_active->id,$str_month_1,$year); //lay du lieu cua thang 03
                            if(count($row_statement) > 0) //co du lieu cua thang 03 (not show button pay)
                            {
                                $flag_button        = 0; //de hien thi button pay
                                $revious_balance            = (int)($row_statement->PreBalance);
                                $activeuser                 = (int)$row_statement->ActiveUser;
                                $inactiveuser               = (int)$row_statement->Inactive;
                                $pay                        = (int)($row_statement->Pay);
                                $datepay                    = $row_statement->Paydate;
                                $datepay                    = explode(" ",$datepay)[0]; //yyyyy-mm-dd
                                $datepay                    = substr($datepay,-2)."-".substr($datepay,5,2)."-".substr($datepay,0,4);
                                    
                                $active_1_15                = (int)($row_statement->NewMember1_15);
                                $active_16_31               = (int)($row_statement->NewMember16_31);
                            }
                            else //khong co du lieu cua thang 03 (show button pay)
                            {
                                $flag_button        = 1;  //de hien thi button pay
                                
                                $row_statement_smaller_month          = $this->get_tbl_stament_by_userid_smaller_month($row_agent_active->id,$arr_date[1],$arr_date[2]); //lay du lieu <= thang 03
                            
                                if(count($row_statement_smaller_month) > 0) //co du lieu cua kì truoc đó
                                {
                                    $revious_balance            = (int)($row_statement_smaller_month->PreBalance);
                                    $activeuser                 = (int)$row_statement_smaller_month->ActiveUser;
                                    $inactiveuser               = (int)$row_statement_smaller_month->Inactive;
                                    $pay                        = (int)($row_statement_smaller_month->Pay);
                                    $datepay                    = $row_statement_smaller_month->Paydate;
                                    $datepay                    = explode(" ",$datepay)[0]; //yyyyy-mm-dd
                                    $datepay                    = substr($datepay,-2)."-".substr($datepay,5,2)."-".substr($datepay,0,4);
                                    
                                    $active_1_15                = (int)($row_statement_smaller_month->NewMember1_15);
                                    $active_16_31               = (int)($row_statement_smaller_month->NewMember16_31);
                                }
                                else //KHONG co du lieu nao trong table statement
                                {
                                    $revious_balance            = 0;
                                    $activeuser                 = $this->get_total_active_or_inactive_customer_by_agentid_status($row_agent_active->id,1)->total;
                                    $inactiveuser               = $this->get_total_active_or_inactive_customer_by_agentid_status($row_agent_active->id,0)->total;
                                    $pay                        = 0;
                                    
                                    $active_1_15                = $this->get_total_active_or_inactive_customer_by_agentid_status_from_to_2($row_agent_active->id,1,"01","2015",$arr_date[1],$arr_date[2])->total;
                                    $active_16_31               = $this->get_total_active_or_inactive_customer_by_agentid_status_from_to($row_agent_active->id,1,"01","2015",$arr_date[1],$arr_date[2])->total;
                                }
                            }
                            if($flag_button == 1)
                                $str_button                     .= '<button type="button" class="btn btn-success" id="btnpayall" onclick="payall(\''.$row_agent_active->id.'\',\''.$yyyy_mm_dd.'\');">'.$this->lang->line(LANG_PAY_ALL).'</button>
                                                                <button type="button" class="btn btn-info" id="btnpayorder" onclick="payorder(\''.$row_agent_active->id.'\',\''.$yyyy_mm_dd.'\');" data-toggle="modal" data-target="#modalpayorder">'.$this->lang->line(LANG_PAY_ORDER).'</button>';
                        }
                        else 
                        {
                            if((int)$day < 10)  //ngay < 10
                            {
                                if(strlen($month)       == 1)
                                {
                                    $str_month_1        = (int)($month-1);
                                    $str_year_1         = $year;
                                    if($str_month_1     == 0 || $str_month_1 == "0")
                                    {
                                        $str_year_1    = $year-1;
                                        $str_month_1    = "12";
                                    }
                                }
                                else
                                {
                                    $str_year_1         = $year;
                                    $str_month_1        = (int)($month-1);
                                    if($str_month_1 == 9)
                                        $str_month_1    = "09";
                                }
                                
                                $row_statement          = $this->get_tbl_stament_by_userid_month($row_agent_active->id,$arr_date[1],$arr_date[2]); //lay du lieu cua thang 02
                                if(count($row_statement) > 0) //co du lieu cua thang 02 (not show button pay)
                                {
                                    $flag_button        = 0;
                                    
                                    $revious_balance            = (int)($row_statement->PreBalance);
                                    $activeuser                 = (int)$row_statement->ActiveUser;
                                    $inactiveuser               = (int)$row_statement->Inactive;
                                    $pay                        = (int)($row_statement->Pay);
                                    $datepay                    = $row_statement->Paydate;
                                    $datepay                    = explode(" ",$datepay)[0]; //yyyyy-mm-dd
                                    $datepay                    = substr($datepay,-2)."-".substr($datepay,5,2)."-".substr($datepay,0,4);
                                
                                    $active_1_15                = (int)($row_statement->NewMember1_15);
                                    $active_16_31               = (int)($row_statement->NewMember16_31);
                                }
                                else //khong co du lieu cua thang 02 (show button pay)
                                {
                                    $flag_button        = 1;
                                    
                                    $row_statement_smaller_month          = $this->get_tbl_stament_by_userid_smaller_month($row_agent_active->id,$str_month_1,$str_year_1); //lay du lieu <= thang 02
                                
                                    if(count($row_statement_smaller_month) > 0) //co du lieu cua kì truoc đó
                                    {
                                        $revious_balance            = (int)($row_statement_smaller_month->PreBalance);
                                        $activeuser                 = (int)$row_statement_smaller_month->ActiveUser;
                                        $inactiveuser               = (int)$row_statement_smaller_month->Inactive;
                                        $pay                        = (int)($row_statement_smaller_month->Pay);
                                        $datepay                    = $row_statement_smaller_month->Paydate;
                                        $datepay                    = explode(" ",$datepay)[0]; //yyyyy-mm-dd
                                        $datepay                    = substr($datepay,-2)."-".substr($datepay,5,2)."-".substr($datepay,0,4);
                                
                                        $active_1_15                = (int)($row_statement_smaller_month->NewMember1_15);
                                        $active_16_31               = (int)($row_statement_smaller_month->NewMember16_31);
                                    }
                                    else //KHONG co du lieu nao trong table statement
                                    {
                                        $revious_balance            = 0;
                                        $activeuser                 = $this->get_total_active_or_inactive_customer_by_agentid_status($row_agent_active->id,1)->total;
                                        $inactiveuser               = $this->get_total_active_or_inactive_customer_by_agentid_status($row_agent_active->id,0)->total;
                                        $pay                        = 0;
                                        
                                        $active_1_15                = $this->get_total_active_or_inactive_customer_by_agentid_status_from_to_2($row_agent_active->id,1,"01","2015",$arr_date[1],$arr_date[2])->total;
                                        $active_16_31               = $this->get_total_active_or_inactive_customer_by_agentid_status_from_to($row_agent_active->id,1,"01","2015",$arr_date[1],$arr_date[2])->total;
                                    }
                                }    
                                if($flag_button == 1)
                                    $str_button                     .= '<button type="button" class="btn btn-success" id="btnpayall" onclick="payall(\''.$row_agent_active->id.'\',\''.$yyyy_mm_dd.'\');">'.$this->lang->line(LANG_PAY_ALL).'</button>
                                                                    <button type="button" class="btn btn-info" id="btnpayorder" onclick="payorder(\''.$row_agent_active->id.'\',\''.$yyyy_mm_dd.'\');" data-toggle="modal" data-target="#modalpayorder">'.$this->lang->line(LANG_PAY_ORDER).'</button>'; 
                            }
                            else //ngay == 10: tinh lai tat ca
                            {
                                $str_year_1         = $year;
                                if(strlen($month)       == 1)
                                    $str_month_1    =   "0".$month;
                                else
                                    $str_month_1    =   $month;
                                $row_statement          = $this->get_tbl_stament_by_userid_month($row_agent_active->id,$str_month_1,$year); //lay du lieu cua thang 03
                                if(count($row_statement) > 0) //co du lieu cua thang 03 (not show button pay)
                                {
                                    $flag_button        = 0; //de hien thi button pay
                                    
                                    $revious_balance            = (int)($row_statement->PreBalance);
                                    $activeuser                 = (int)$row_statement->ActiveUser;
                                    $inactiveuser               = (int)$row_statement->Inactive;
                                    $pay                        = (int)($row_statement->Pay);
                                    $datepay                    = $row_statement->Paydate;
                                    $datepay                    = explode(" ",$datepay)[0]; //yyyyy-mm-dd
                                    $datepay                    = substr($datepay,-2)."-".substr($datepay,5,2)."-".substr($datepay,0,4);
                                
                                    $active_1_15                = (int)($row_statement->NewMember1_15);
                                    $active_16_31               = (int)($row_statement->NewMember16_31);
                                }
                                else
                                {                                                                                                            
                                    if(strlen($month)       == 1)
                                    {
                                        $str_month_1_2        = (int)($month-1);
                                        $str_year_1_2         = $year;
                                        if($str_month_1_2     == 0 || $str_month_1_2 == "0")
                                        {
                                            $str_year_1_2    = $year-1;
                                            $str_month_1_2    = "12";
                                        }
                                    }
                                    else
                                    {
                                        $str_year_1_2         = $year;
                                        $str_month_1_2        = (int)($month-1);
                                        if($str_month_1_2 == 9)
                                            $str_month_1_2    = "09";
                                    }
                                    //echo $str_month_1_2;die;                                                                                                                                                                                                                
                                    $flag_button        = 1; //de hien thi button pay
                                    
                                    $row_statement_smaller_month          = $this->get_tbl_stament_by_userid_smaller_month($row_agent_active->id,$str_month_1,$str_year_1); //lay du lieu <= thang 02
                                
                                    if(count($row_statement_smaller_month) > 0) //co du lieu cua kì truoc đó
                                    {
                                        $FixDate                    = $row_statement_smaller_month->FixDate;
                                        $FixDate                    = explode(" ",$FixDate)[0]; //yyyy-mm-dd
                                        $mm_FixDate                 = substr($FixDate,5,2);
                                        $yyyy_FixDate               = substr($FixDate,0,4);
                                                                                                                                                                                                        
                                        $revious_balance            = (int)($row_statement_smaller_month->PreBalance)+(int)($row_statement_smaller_month->HaveToPay)-(int)($row_statement_smaller_month->Pay);
                                        $activeuser                 = $this->get_total_active_or_inactive_customer_by_agentid_status($row_agent_active->id,1)->total;
                                        $inactiveuser               = (int)$this->get_total_active_or_inactive_customer_by_agentid_status_from_to_3($row_agent_active->id,0,$mm_FixDate,$yyyy_FixDate,$arr_date[1],$arr_date[2])->total;
                                        $pay                        = 0;
                                        
                                        $active_1_15                = $this->get_total_active_or_inactive_customer_by_agentid_status_from_to_2($row_agent_active->id,1,$mm_FixDate,$yyyy_FixDate,$arr_date[1],$arr_date[2])->total;
                                        $active_16_31               = $this->get_total_active_or_inactive_customer_by_agentid_status_from_to($row_agent_active->id,1,$mm_FixDate,$yyyy_FixDate,$str_month_1_2,$str_year_1_2)->total;
                                    }
                                    else //KHONG co du lieu nao trong table statement
                                    {
                                        $revious_balance            = 0;
                                        $activeuser                 = $this->get_total_active_or_inactive_customer_by_agentid_status($row_agent_active->id,1)->total;
                                        $inactiveuser               = (int)$this->get_total_active_or_inactive_customer_by_agentid_status_from_to_3($row_agent_active->id,0,"01","2015",$arr_date[1],$arr_date[2])->total;
                                        $pay                        = 0;
                                        //echo $row_agent_active->id." ".$inactiveuser;die;
                                        $active_1_15                = $this->get_total_active_or_inactive_customer_by_agentid_status_from_to_2($row_agent_active->id,1,"01","2015",$arr_date[1],$arr_date[2])->total;
                                        $active_16_31               = $this->get_total_active_or_inactive_customer_by_agentid_status_from_to($row_agent_active->id,1,"01","2015",$str_month_1_2,$str_year_1_2)->total;
                                    }
                                }
                                if($flag_button == 1)
                                    $str_button                     .= '<button type="button" class="btn btn-success" id="btnpayall" onclick="payall(\''.$row_agent_active->id.'\',\''.$yyyy_mm_dd.'\');">'.$this->lang->line(LANG_PAY_ALL).'</button>
                                                                        <button type="button" class="btn btn-info" id="btnpayorder" onclick="payorder(\''.$row_agent_active->id.'\',\''.$yyyy_mm_dd.'\');" data-toggle="modal" data-target="#modalpayorder">'.$this->lang->line(LANG_PAY_ORDER).'</button>';    
                            
                            }
                            
                        }
                        
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
                                    $str_list .= '<td>'.$row_agent_active->currency.$revious_balance.'</td>';
                                $str_list .= '</tr>';
                                
                                $str_list .= '<tr>';
                                    $str_list .= '<td>'.$this->lang->line(LANG_ACTIVE_USER).':</td>';
                                    $str_list .= '<td>'.$activeuser.' x '.$row_agent_active->currency.(int)$fees.'</td>';
                                    $str_list .= '<td>'.$row_agent_active->currency.number_format($activeuser*((int)$fees)).'</td>';
                                $str_list .= '</tr>';
                                
                                $str_list .= '<tr>';
                                    $str_list .= '<td>'.$this->lang->line(LANG_INACTIVE_USER).':</td>';
                                    $str_list .= '<td>'.$inactiveuser.' x '.$row_agent_active->currency.(int)$fees.'</td>';
                                    $str_list .= '<td>'.$row_agent_active->currency.number_format($inactiveuser*((int)$fees)).'</td>';
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
                                        $totalmoney = $activeuser*(int)$fees+(int)$revious_balance+$active_1_15*((int)$fees)+$active_16_31*((int)((int)$fees/2))-($inactiveuser*(int)$fees);
                                    
                                    $str_list .= '<td><h4>'.$row_agent_active->currency.number_format($totalmoney,2).'</h4></td>';
                                $str_list .= '</tr>';
                                
                                $str_list .= '<tr>';
                                    $str_list .= '<td colspan="2"><h4>'.$this->lang->line(LANG_PAY).'</h4></td>';
                                    if($pay == 0)  
                                        $str_list .= '<td><h4>'.$row_agent_active->currency.number_format($pay,2).'</h4></td>';
                                    else
                                        $str_list .= '<td><h4>'.$datepay." ".$row_agent_active->currency.number_format($pay,2).'</h4></td>';
                                $str_list .= '</tr>';
                                
                                $str_list .= '<tr>';
                                    $str_list .= '<td colspan="2"><h4>'.$this->lang->line(LANG_REMAINDER_AMOUNT).'</h4></td>';
                                        $remainder_amount = $totalmoney - $pay;
                                    $str_list .= '<td><h4>'.$row_agent_active->currency.number_format($remainder_amount,2).'</h4></td>';
                                $str_list .= '</tr>';
                                $str_list .= '<tr>';
                                    $str_list .= '<td colspan="3">'.$str_button.'&nbsp;</td>';
                                $str_list .= '</tr>';
                            $str_list .= '</tbody>';
                        $str_list .= '</table>';
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
    public function get_tbl_stament_by_userid_month($userid,$month,$year)
    {
        $sql        = "SELECT * FROM `statement` WHERE `UserID` = '$userid' AND SUBSTRING(`FixDate`,6,2)= '$month' AND SUBSTRING(`FixDate`,1,4)= '$year'";
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
    
    public function get_tbl_stament_by_userid($userid)
    {
        $sql        = "SELECT * FROM `statement` WHERE `UserID` = '$userid' ORDER BY `FixDate` DESC";
        $query      = $this->db->query($sql)->row();
        return      $query;
    }
    public function get_total_active_or_inactive_customer_by_agentid_status_createdate($agentid,$status,$month,$year,$flag) //flag = 1: 1-15, flag = 2: 16-31
    {
        if($flag    == 1)
            $sql        = "SELECT COUNT(*) AS total FROM `users` 
                            WHERE `level` = 4 AND `pid` = '$agentid' AND `status` = $status AND `createdate` BETWEEN '$year-$month-1 00:00:01' AND '$year-$month-15 23:59:59'";
        else
            $sql        = "SELECT COUNT(*) AS total FROM `users` 
                            WHERE `level` = 4 AND `pid` = '$agentid' AND `status` = $status AND `createdate` BETWEEN '$year-$month-16 00:00:01' AND '$year-$month-31 23:59:59'";
        $query      = $this->db->query($sql)->row();
        return      $query;
    }
    public function get_total_active_or_inactive_customer_by_agentid_status_from_to($agentid,$status,$month1,$year1,$month2,$year2) //yyyy-mm-dd
    {
        $sql        = "SELECT COUNT(*) AS total FROM `users` 
                        WHERE `level` = 4 AND `pid` = '$agentid' AND `status` = $status AND
                            `LastActiveDate` BETWEEN '$year1-$month1-16 00:00:01' AND '$year2-$month2-31 23:59:59' 
                            AND  SUBSTRING(`LastActiveDate`,9,2) > 15 AND SUBSTRING(`LastActiveDate`,9,2) < 32";
                        //echo $sql;die;
        $query      = $this->db->query($sql)->row();
        return      $query;
    }
    /*
    |   function get data active in active date from 1 - 15
    */
    public function get_total_active_or_inactive_customer_by_agentid_status_from_to_2($agentid,$status,$month1,$year1,$month2,$year2) //yyyy-mm-dd
    {
        $sql        = "SELECT COUNT(*) AS total FROM `users` 
                        WHERE `level` = 4 AND `pid` = '$agentid' AND `status` = $status AND
                            `LastActiveDate` BETWEEN '$year1-$month1-10 00:00:01' AND '$year2-$month2-15 23:59:59' 
                            AND  SUBSTRING(`LastActiveDate`,9,2) > 0 AND SUBSTRING(`LastActiveDate`,9,2) < 16";
                            //echo $sql;die;                                                        
        $query      = $this->db->query($sql)->row();
        return      $query;
    }
    public function get_total_active_or_inactive_customer_by_agentid_status_from_to_3($agentid,$status,$month1,$year1,$month2,$year2) //yyyy-mm-dd
    {
        $sql        = "SELECT COUNT(*) AS total FROM `users` 
                        WHERE `level` = 4 AND `pid` = '$agentid' AND `status` = $status AND
                            `LastInactiveDate` BETWEEN '$year1-$month1-10 00:00:01' AND '$year2-$month2-09 23:59:59' 
                            AND  SUBSTRING(`LastInactiveDate`,9,2) > 0 AND SUBSTRING(`LastInactiveDate`,9,2) < 16";
                            //echo $sql;die;                                                        
        $query      = $this->db->query($sql)->row();
        return      $query;
    }
     public function get_total_active_or_inactive_customer_by_agentid_status($agentid,$status) //yyyy-mm-dd
    {
        $sql        = "SELECT COUNT(*) AS total FROM `users` 
                        WHERE `level` = 4 AND `pid` = '$agentid' AND `status` = $status";
        $query      = $this->db->query($sql)->row();
        return      $query;
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
            $month                  = $arr_date[1];
            $year                   = $arr_date[0];
            
            if(strlen($month)       == 1)
            {
                $str_month_1        = (int)($month-1);
                $str_year_1         = $year;
                if($str_month_1     == 0 || $str_month_1 == "0")
                {
                    $str_year_1    = $year-1;
                    $str_month_1    = "12";
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
            $row_statement              = $this->get_tbl_stament_by_userid($agentid);
            if(count($row_statement) > 0)
            {
                $havetopay_pre_month        = (int)$row_statement->HaveToPay; // == previous balance of current row
                $pre_balance_pre_month      = (int)$row_statement->PreBalance;
                $pre_pay_pre_month          = (int)$row_statement->Pay;
            }
            else
            {
                $havetopay_pre_month        = 0; // == previous balance of current row
                $pre_balance_pre_month      = 0;
                $pre_pay_pre_month          = 0;
            }
            $pre_balance_current_month  = $havetopay_pre_month + $pre_balance_pre_month - $pre_pay_pre_month;
            
            $total_active_customer      = $this->get_total_active_or_inactive_customer_by_agentid_status($agentid,1)->total;
            $total_inactive_customer    = $this->get_total_active_or_inactive_customer_by_agentid_status($agentid,0)->total;
            //$newmember_1_15             = $this->get_total_active_or_inactive_customer_by_agentid_status_createdate($agentid,1,$arr_date[1],$arr_date[0],1)->total;
            //$newmember_16_31            = $this->get_total_active_or_inactive_customer_by_agentid_status_createdate($agentid,1,$arr_date[1],$arr_date[0],2)->total;
            
                                    $row_statement_smaller_month          = $this->get_tbl_stament_by_userid_smaller_month($agentid,$str_month_1,$str_year_1); //lay du lieu <= thang 02
                                
                                    if(count($row_statement_smaller_month) > 0) //co du lieu cua kì truoc đó
                                    {                                                                                
                                        $FixDate                    = $row_statement_smaller_month->FixDate;
                                        $FixDate                    = explode(" ",$FixDate)[0]; //yyyy-mm-dd
                                        $mm_FixDate                 = substr($FixDate,5,2);
                                        $yyyy_FixDate               = substr($FixDate,0,4);
                                        $inactiveuser               = (int)$this->get_total_active_or_inactive_customer_by_agentid_status_from_to_3($agentid,0,$mm_FixDate,$yyyy_FixDate,$arr_date[1],$arr_date[2])->total;
                                        $pay                        = 0;
                                        
                                        $newmember_1_15                = $this->get_total_active_or_inactive_customer_by_agentid_status_from_to_2($agentid,1,$mm_FixDate,$yyyy_FixDate,$arr_date[1],$arr_date[0])->total;
                                        $newmember_16_31               = $this->get_total_active_or_inactive_customer_by_agentid_status_from_to($agentid,1,$mm_FixDate,$yyyy_FixDate,$str_month_1,$str_year_1)->total;
                                    }
                                    else //KHONG co du lieu nao trong table statement
                                    {
                                        $revious_balance            = 0;
                                        $activeuser                 = $this->get_total_active_or_inactive_customer_by_agentid_status($agentid,1)->total;
                                        $inactiveuser               = (int)$this->get_total_active_or_inactive_customer_by_agentid_status_from_to_3($agentid,0,"01","2015",$arr_date[1],$arr_date[2])->total;
                                        $pay                        = 0;
                                        
                                        $newmember_1_15                = $this->get_total_active_or_inactive_customer_by_agentid_status_from_to_2($agentid,1,"01","2015",$arr_date[1],$arr_date[0])->total;
                                        $newmember_16_31               = $this->get_total_active_or_inactive_customer_by_agentid_status_from_to($agentid,1,"01","2015",$str_month_1,$str_year_1)->total;
                                    }
                                    
            $agent                      = $this->get_agent_by_agentid($agentid);
            $fees_agent                 = (int)$agent->fees;
            $havetopay                  = ((int)$newmember_1_15)*$fees_agent + ((int)$newmember_16_31)*($fees_agent/2) + ((int)$total_active_customer*$fees_agent);
            $pay                        = ((int)$pre_balance_current_month) + $havetopay;
            
            
            $sql                        = "INSERT INTO `statement` 
                                            (`id`, `UserID`, `ActiveUser`, `Inactive`, `FixDate`, `NewMember1_15`, `NewMember16_31`, `PreBalance`, `Pay`, `HaveToPay`, `Paydate`) 
                                            VALUES (NULL, '$agentid', '$total_active_customer', '$inactiveuser', 
                                            '$date 18:18:18', $newmember_1_15, $newmember_16_31, '$pre_balance_current_month', '$pay', '$havetopay', NOW())";
            $query                      = $this->db->query($sql);
            
            //return
            if($query)
                $flag   = 1;
            else
                $flag   = 0;
            
            $arr        =   array("flag"=>$flag, "date" =>  $date_return);
            return $arr;
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
                    $str_year_1    = $year-1;
                    $str_month_1    = "12";
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
            $row_statement              = $this->get_tbl_stament_by_userid($agentid);
            if(count($row_statement) > 0)
            {
                $havetopay_pre_month        = (int)$row_statement->HaveToPay; // == previous balance of current row
                $pre_balance_pre_month      = (int)$row_statement->PreBalance;
                $pre_pay_pre_month          = (int)$row_statement->Pay;
            }
            else
            {
                $havetopay_pre_month        = 0; // == previous balance of current row
                $pre_balance_pre_month      = 0;
                $pre_pay_pre_month          = 0;
            }
            $pre_balance_current_month  = $havetopay_pre_month + $pre_balance_pre_month - $pre_pay_pre_month;
            $total_active_customer      = $this->get_total_active_or_inactive_customer_by_agentid_status($agentid,1)->total;
            $total_inactive_customer    = $this->get_total_active_or_inactive_customer_by_agentid_status($agentid,0)->total;
            //$newmember_1_15             = $this->get_total_active_or_inactive_customer_by_agentid_status_createdate($agentid,1,$arr_date[1],$arr_date[0],1)->total;
            //$newmember_16_31            = $this->get_total_active_or_inactive_customer_by_agentid_status_createdate($agentid,1,$arr_date[1],$arr_date[0],2)->total;
            
            
                                    $row_statement_smaller_month          = $this->get_tbl_stament_by_userid_smaller_month($agentid,$str_month_1,$str_year_1); //lay du lieu <= thang 02
                                
                                    if(count($row_statement_smaller_month) > 0) //co du lieu cua kì truoc đó
                                    {                                                                                
                                        $FixDate                    = $row_statement_smaller_month->FixDate;
                                        $FixDate                    = explode(" ",$FixDate)[0]; //yyyy-mm-dd
                                        $mm_FixDate                 = substr($FixDate,5,2);
                                        $yyyy_FixDate               = substr($FixDate,0,4);
                                        $inactiveuser               = (int)$this->get_total_active_or_inactive_customer_by_agentid_status_from_to_3($agentid,0,$mm_FixDate,$yyyy_FixDate,$arr_date[1],$arr_date[2])->total;
                                        $pay                        = 0;
                                        
                                        $newmember_1_15                = $this->get_total_active_or_inactive_customer_by_agentid_status_from_to_2($agentid,1,$mm_FixDate,$yyyy_FixDate,$arr_date[1],$arr_date[0])->total;
                                        $newmember_16_31               = $this->get_total_active_or_inactive_customer_by_agentid_status_from_to($agentid,1,$mm_FixDate,$yyyy_FixDate,$str_month_1,$str_year_1)->total;
                                    }
                                    else //KHONG co du lieu nao trong table statement
                                    {
                                        $revious_balance            = 0;
                                        $activeuser                 = $this->get_total_active_or_inactive_customer_by_agentid_status($agentid,1)->total;
                                        $inactiveuser               = (int)$this->get_total_active_or_inactive_customer_by_agentid_status_from_to_3($agentid,0,"01","2015",$arr_date[1],$arr_date[2])->total;
                                        $pay                        = 0;
                                        
                                        $newmember_1_15                = $this->get_total_active_or_inactive_customer_by_agentid_status_from_to_2($agentid,1,"01","2015",$arr_date[1],$arr_date[0])->total;
                                        $newmember_16_31               = $this->get_total_active_or_inactive_customer_by_agentid_status_from_to($agentid,1,"01","2015",$str_month_1,$str_year_1)->total;
                                    }
                                    
            $agent                      = $this->get_agent_by_agentid($agentid);
            $fees_agent                 = (int)$agent->fees;
            $havetopay                  = ((int)$newmember_1_15)*$fees_agent + ((int)$newmember_16_31)*($fees_agent/2) + ((int)$total_active_customer*$fees_agent)-(int)$inactiveuser*$fees_agent;
            //$pay                        = ((int)$pre_balance_current_month) + $havetopay;
            $pay                        = $money;
            
            $sql                        = "INSERT INTO `statement` 
                                            (`id`, `UserID`, `ActiveUser`, `Inactive`, `FixDate`, `NewMember1_15`, `NewMember16_31`, `PreBalance`, `Pay`, `HaveToPay`, `Paydate`) 
                                            VALUES (NULL, '$agentid', '$total_active_customer', '$inactiveuser', 
                                            '$date 18:18:18', $newmember_1_15, $newmember_16_31, '$pre_balance_current_month', '$money', '$havetopay', NOW())";
            $query                      = $this->db->query($sql);
            
            //return
            if($query)
                $flag   = 1;
            else
                $flag   = 0;
            
            $arr        =   array("flag"=>$flag, "date" =>  $date_return);
            return $arr;
        }
    }
    public function get_agent_by_agentid($agentid)
    {
        $sql    = "SELECT * FROM `users` WHERE `id`='$agentid' AND `level`=3";
        $query  =$this->db->query($sql)->row();
        return $query;
    }
}