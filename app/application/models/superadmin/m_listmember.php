<?php
class M_listmember extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_list_member()
    {
        if(isset($_POST['page']) && isset($_POST['username_serialnumber']))
        {
            //$page=3; 
            $page=$_POST['page'];
            $username_serialnumber=$_POST['username_serialnumber'];
            $sqlplus = "";
            if($username_serialnumber!="" && $username_serialnumber!=null)
                $sqlplus = "AND (`id` like '%$username_serialnumber%' OR `ImieNo` like '%$username_serialnumber%')";
            $RecordOnePage=$this->getSetting("RecordOnePageListMember");
            if($page==1 || $page<1 || $page=="")
                $start=0;
            else
                $start=$RecordOnePage*($page-1);
            $limit=$RecordOnePage;
            
            $sql="SELECT * FROM `users` WHERE `level`=4 ".$sqlplus." ORDER BY `rowid` desc LIMIT $start,$limit";
            //echo $sql;die;
            $query=$this->db->query($sql)->result();
            
            $sql_count="SELECT COUNT(*) as total FROM `users` WHERE `level`=4 ".$sqlplus." ORDER BY `rowid` desc";
            $query_count=$this->db->query($sql_count)->row();
            $totalrow= $query_count->total;
            
            $str_list="";
			$str_numpage="";
            $notfound="<strong style=\"margin:10px;\">".$this->lang->line(LANG_NOT_HAVE_ANY_ROW)."</strong>";
            if($totalrow>0)
            {
                $notfound="";
                $stt=$start+1;
                foreach($query as $row_agent)
                {
                    $str_list .= '<tr>';
                          $str_list .= '<td>'.$stt.'</td>';
                          $str_list .= '<td><a href="'.base_url('super_admin/agent_page?id='.$row_agent->rowid).'">'.$row_agent->fullname.'</a></td>';
                          $str_list .= '<td><a href="'.base_url('super_admin/agent_page?id='.$row_agent->rowid).'">'.$row_agent->ImieNo.'</a></td>';
                          $str_list .= '<td><a href="'.base_url('super_admin/agent_page?id='.$row_agent->rowid).'">'.$row_agent->verifyCode.'</a></td>';
                          $str_list .= '<td>'.$row_agent->phonenumber.'</td>';
                          if($row_agent->status==1 || $row_agent->status=="1")
                            $str_list .= '<td>'.$this->lang->line(LANG_ACTIVE).'</td>';
                          else
                            $str_list .= '<td>'.$this->lang->line(LANG_INACTIVE).'</td>';
                          
                          $str_list .= '<td>'.$row_agent->currency.number_format($row_agent->fees,2).'</td>';
                          
                          $list_member = $this->m_listagent->get_member_follow_agent($row_agent->id);
                          $total_member = count($list_member);
                          
                          if($row_agent->duedate!="")
                          {
                              $arr_duedate = explode(" ",$row_agent->duedate);
                              $arr_duedate = explode("-",$arr_duedate[0]);
                              $str_list .= '<td>'.$arr_duedate[2]."-".$arr_duedate[1]."-".$arr_duedate[0].'</td>';
                          }
                          else
                            $str_list .= '<td></td>';
                          
                          $str_list .= '<td>'.$row_agent->remark.'</td>';
                          $str_list .= '<td>'.$row_agent->pid.'</td>';
                          
                          if($row_agent->LastLogin!="")
                          {
                              $arr_LastLogin = explode(" ",$row_agent->LastLogin);
                              $timelastlogin = $arr_LastLogin[1];
                              $arr_LastLogin = explode("-",$arr_LastLogin[0]);
                              $str_list .= '<td>'.$timelastlogin." ".$arr_LastLogin[2]."-".$arr_LastLogin[1]."-".$arr_LastLogin[0].'</td>';
                          }
                          else
                            $str_list .= '<td></td>';
                            
                          $str_list .= '<td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalAddAgent" style="margin:1px 0px;" onclick="btn_addagent(\''.$row_agent->rowid.'\')">'.$this->lang->line(LANG_BTN_ADD_AGENT).'</button> &nbsp 
                                            <button type="button" class="btn btn-warning" onclick="generatecode(\''.$row_agent->rowid.'\')">'.$this->lang->line(LANG_BTN_GENERATE_CODE).'</button>
                                        </td>';
                      $str_list .= '</tr>';
                    $stt++;
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
                    $str_numpage .= '<ul class="pagination">';
                        if($page==1)
                            $str_numpage .= '<li class="disabled"><a href="javascript:void(0);" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                        else
                            $str_numpage .= '<li ><a href="javascript:void(0);" onclick="get_list_member('.($page-1).',\''.$username_serialnumber.'\')" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
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
                                    $str_numpage .= '<li><a href="javascript:void(0);" onclick="get_list_member('.$i.',\''.$username_serialnumber.'\')" >'.$i.'</a></li>';
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
                            $str_numpage .= '<li ><a href="javascript:void(0);" onclick="get_list_member('.($page+1).',\''.$username_serialnumber.'\')" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                      $str_numpage .='</ul>';
                }
            }
            
            $arr = array("totalrow"=>$totalrow,"str_list"=>$str_list,"str_numpage"=>$str_numpage,"notfound"=>$notfound);
            return $arr;
        }
        
    }
    public function get_member_follow_agent($agent_id)
    {
        $sql="SELECT * FROM `users` WHERE `pid` = '$agent_id' AND `level` = 4";
        $query=$this->db->query($sql)->result();
        return $query;
    }
    public function btn_save_addagent()
    {
        if(isset($_POST['username']) && isset($_POST['id']) && isset($_POST['cur_page']))
        {
            $percenttax         =   (int)$this->m_gen_statement->get_percenttax()->NumValue1;
            
            $year               =   date("Y");
            $month              =   date("m");
            $day                =   date("d");
            if($day < 10)
            {
                if(strlen((int)$month)       == 1)
                {
                    $month        = (int)($month-1);
                    if($month     == 0 || $month == "0")
                    {
                        $year           = $year-1;
                        $month    = "12";
                    }
                    else
                        $month    =   "0".$month;
                }
                else
                {
                    $year         = $year;
                    $month        = (int)($month-1);
                    if($month == 9)
                        $month    = "09";
                }
            }
            $username           =   $_POST['username'];
            $id                 =   $_POST['id'];
            $cur_page           =   $_POST['cur_page'];
            
            /*$sql_select         =   "SELECT * FROM `users` WHERE `rowid` = $id"; //customer
            $query_select       =   $this->db->query($sql_select)->row();
            $pid                =   $query_select->pid;*/
            
            $sql_agent          =   "SELECT * FROM `users` WHERE `id` = '$username' and `level` = 3"; //agent
            $query_agent        =   $this->db->query($sql_agent)->row();
            $query_agent        =  json_decode(json_encode($query_agent),true);
            //$fees_agent         =   $query_agent[0]->fees;
            $fees_agent         = "";
            if(isset($query_agent['fees'])) 
                $fees_agent         = $query_agent['fees'];
            
            $sql_statement      =   "SELECT * FROM `statement` WHERE `UserID` = '$username' AND SUBSTRING(`FixDate`,1,7) = '$year-$month'";
			//echo $sql_statement;die;
            $query_statement    =   $this->db->query($sql_statement)->row();
            $query_statement    = json_decode(json_encode($query_statement),true);
            //$status_statement   =   $query_statement->Status;

            // thuan fix bugs 30/07/2015
            $status_statement = "";
            if(isset($query_statement['Status']))
                $status_statement   =   $query_statement['Status'];
            //$havetopay_statement=   $query_statement->HaveToPay;
            $havetopay_statement = "";
            if(isset($query_statement['HaveToPay']))
                $havetopay_statement =   $query_statement['HaveToPay'];
            $tax = 0;
            if(isset($query_statement['Tax']))
                $tax                =   (int)$query_statement['Tax'];

            $ActiveUser = 0;
            if(isset($query_statement['ActiveUser']))
                $ActiveUser         =   (int)$query_statement['ActiveUser'];
            
            $NewMember1_15 = 0;
            if(isset($query_statement['NewMember1_15']))
                $NewMember1_15      =   (int)$query_statement['NewMember1_15'];

            $NewMember16_31 = 0;
            if(isset($query_statement['NewMember16_31']))
                $NewMember16_31     =   (int)$query_statement['NewMember16_31'];
            
            //if($status_statement    ==  0)  //insert bằng tay vào bảng statement
            //{
                if((int)$day >=10 && (int)$day < 16)
                {
                    $tax_new                        =   $tax + (int)$fees_agent*$percenttax/100;
                    $tax_plus                       =   (int)$fees_agent*$percenttax/100;
                    //if($status_statement    ==  0)  //insert bằng tay vào bảng statement
                        $havetopay_statement_new        =   $havetopay_statement + $fees_agent + $tax_plus;
                    //else
                        //$havetopay_statement_new        =   $havetopay_statement + $fees_agent + $fees_agent + $tax_plus;
                    
                    $ActiveUser_new                 =   $ActiveUser + 1;
                    $NewMember1_15_new              =   $NewMember1_15 + 1;
                    $NewMember16_31_new             =   $NewMember16_31;
                }
                else
                {
                    if((int)$day >=16 && (int)$day < 32)
                    {
                        $tax_new                    =   $tax + (int)($fees_agent/2)*$percenttax/100;
                        $tax_plus                   =   (int)($fees_agent/2)*$percenttax/100;
                        //if($status_statement    ==  0)  //insert bằng tay vào bảng statement
                            $havetopay_statement_new    =   $havetopay_statement + $fees_agent/2 + $tax_plus;
                        //else
                            //$havetopay_statement_new    =   $havetopay_statement + $fees_agent/2 + $fees_agent + $tax_plus;
                        
                        $ActiveUser_new                 =   $ActiveUser + 1;
                        $NewMember1_15_new              =   $NewMember1_15;
                        $NewMember16_31_new             =   $NewMember16_31 + 1;
                    }  
                    else
                    {
                        $tax_new                        =   $tax + 0;
                        //if($status_statement    ==  0)  //insert bằng tay vào bảng statement
                            $havetopay_statement_new    =   $havetopay_statement;
                        //else
                            //$havetopay_statement_new    =   $havetopay_statement;
                        
                        $ActiveUser_new                 =   $ActiveUser;
                        $NewMember1_15_new              =   $NewMember1_15;
                        $NewMember16_31_new             =   $NewMember16_31;
                    }          
                }
                $sql_update_statement               =   "UPDATE `statement` SET 
                                                                `HaveToPay`     = '$havetopay_statement_new',
                                                                `Tax`           = '$tax_new',
                                                                `ActiveUser`    = '$ActiveUser_new',
                                                                `NewMember1_15` = '$NewMember1_15_new',
                                                                `NewMember16_31`= '$NewMember16_31_new'   
                                                            WHERE `UserID` = '$username' AND SUBSTRING(`FixDate`,1,7) = '$year-$month'";
                $query_update_statement             =   $this->db->query($sql_update_statement);
            //}
            $sql="UPDATE `users` SET `pid` = '$username' WHERE `rowid` = $id";
            $query=$this->db->query($sql);
            return $cur_page;
        }
    }
    public function generatecode()
    {
        if(isset($_POST['row_id']))
        {
            $id=$_POST['row_id'];
            $num_rand=rand(11890,99790);
            //$verifycode=md5(md5($num_rand));
            //$verifycode=substr($verifycode,5,5);             
            $sql="UPDATE `users` SET `verifyCode` = '$num_rand' WHERE `rowid` = $id";
            $query=$this->db->query($sql);
            return 1;
        }
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
}