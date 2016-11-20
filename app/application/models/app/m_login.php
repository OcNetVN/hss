<?php
class M_login extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function checklogin($username,$pass,$imei,$lang)
    {
            //status=0:not right pass
            //status=1:right
            //status=2:locked
            //status=3:not right imei
            //status=4:not allow
            //status=5:not have imei
            
            //lang = 1:english
            //lang = 2: chinese
            $stt=0;
            $mes=$this->lang->line(LANG_MES_NOT_RIGHT_LOGIN_APP);
            $pass=md5($pass);
            $sql="SELECT * FROM `users` WHERE `id`='$username' AND `password`='$pass'";
            $results=$this->db->query($sql)->row();
            //print_r($results);die;
            if(count($results)>0)
            {
                if($results->status==1 || $results->status=="1")
                {
                    if($results->level==1 || $results->level=="1" || $results->level==2 || $results->level=="2" || $results->level==3 || $results->level=="3" || $results->level==4 || $results->level=="4")
                    {
                        if($results->serialNo=="")
                        {
                            $sql_update="UPDATE `users` SET `serialNo` = '$imei' WHERE `id` = '$username'";
                            $this->db->query($sql_update);
                            $stt=1;
                            $mes=$this->lang->line(LANG_MES_RIGHT_LOGIN_APP);
                        }
                        else
                        {
                            if($results->serialNo==$imei)
                            {
                                $stt=1;
                                $mes=$this->lang->line(LANG_MES_RIGHT_LOGIN_APP);
                            }
                            else
                            {
                                $mes=$this->lang->line(LANG_MES_WAITING_CONFIRM_LOGIN_APP);
                                $stt=3;
                            }
                        }
                    }
                    else
                    {
                        $mes=$this->lang->line(LANG_MES_NOT_ALLOW_LOGIN_APP);
                        $stt=4;
                    }
                }
                else
                {
                    $mes=$this->lang->line(LANG_MES_LOCKED_LOGIN_APP);
                    $stt=2;
                }
            }
            $arr=array("stt"=>$stt,"mes"=>$mes);
            return $arr;
    }
    public function checklogin_2($imei,$verifycode,$lang)
    {
            //status=0:not right login
            //status=1:right
            //status=2:locked
            //status=3:not allow
            //status=4:not isset imei & insert SUCCESSFULL
            //status=5:not isset imei & insert ERROR
            //status=6:duedate < today
            
            //lang = 1:english
            //lang = 2: chinese
            
            $phone_agent="NULL";
            $stt=0;
            $ImieNo     = "NULL";
            $mes=$this->lang->line(LANG_MES_NOT_RIGHT_LOGIN_APP);
            $check_isset_imei=$this->check_isset_imei($imei);
            if($check_isset_imei<1) //not isset imei
            {
                $check_isset_imei_tbl_imeis     =   $this->check_isset_imei_tbl_imeis($imei);
                if(count($check_isset_imei_tbl_imeis) < 1) //not isset imei in table imeis
                {
                    for($i = 0; $i < 50; $i++)
                    {
                        $ImieNo         = rand(1000000,9999999);
                        $flagimei       = $this->check_isset_imeino($ImieNo);
                        if($flagimei    == 0)
                            break;
                    }
                    
                    // lưu serianumber của khách hàng
                    $_SESSION['seriaNumber']    = $ImieNo;
                    $sql_insert_tbl_imeis           =   "INSERT INTO `imeis` (`serialNo`,    `ImieNo`) 
                                                                    VALUES ('$imei',        '$ImieNo')";                   
                    $query_insert_tbl_imeis         =   $this->db->query($sql_insert_tbl_imeis);
                }
                else
                {
                    $ImieNo     =   $check_isset_imei_tbl_imeis->ImieNo;
                    $_SESSION['seriaNumber'] = $ImieNo;
                }
                
                
                $sql_insert="INSERT INTO `users` (`rowid`, `id`, `password`, `fullname`, `pid`, `level`, `currency`, `fees`, `phonenumber`, `status`, `oldstatus`, `remark`, `oldremark`, `ImieNo`, `serialNo`, `verifyCode`, `duedate`, `createdate`, `tstamp`) 
                    VALUES (NULL, 'Customer', NULL, 'CustomerName', NULL, '4', 'RM', '0', NULL, '1', NULL, NULL, NULL,'$ImieNo', '$imei', NULL, DATE_ADD(NOW(),INTERVAL 30 DAY), NOW(), NULL)";
                $query=$this->db->query($sql_insert);
                if($query)
                {
                    $stt=4;
                    $mes=$this->lang->line(LANG_MES_WAITING_CONFIRM_LOGIN_APP);
                } 
                else
                {
                    $stt=5;
                    $mes=$this->lang->line(LANG_MES_INSERT_ERROR_APP);
                }       
            }
            else //imei was exist
            {
                $sqlcheckimei="SELECT * FROM `users` WHERE `serialNo`='$imei'";
                $resultscheckimei=$this->db->query($sqlcheckimei)->row();
                if(count($resultscheckimei) > 0)
                {
                    $ImieNo         =   $resultscheckimei->ImieNo;
                    $_SESSION['seriaNumber'] = $ImieNo;
                }
                    
                $sql="SELECT * FROM `users` WHERE `serialNo`='$imei' AND `verifyCode`='$verifycode'";
                $results=$this->db->query($sql)->row();
                //print_r($results);die;
                if(count($results)>0)
                {
                    $ImieNo         =   $results->ImieNo;
                    $_SESSION['seriaNumber'] = $ImieNo;
                    $agent=$this->get_agent_by_username($results->pid);
                    if(count($agent)>0)
                    {
                        if($agent->phonenumber!="")
                            $phone_agent=$agent->phonenumber;
                    }
                    
                    $ngayhomnay = date("Y-m-d"); // Năm/Tháng/Ngày
                    if($results->duedate != "")
                    {
                        $ngaysosanh = explode(" ",$results->duedate)[0]; // Năm/Tháng/Ngày
                        if (strtotime($ngayhomnay) > strtotime($ngaysosanh)) 
                        {
                            $mes=$this->lang->line(LANG_MES_OUT_OF_DATE_LOGIN_APP);                                                        
                            // add number phone of agent 30/07/2015
                            if($results->showpcontact == 1 || $results->showpcontact == "1") //show contact of agent
                                    $mes    .=   $this->lang->line(LANG_CONTACT_YOUR_AGENT)." ".$phone_agent;
                                else
                                    $mes    .=   $this->lang->line(LANG_CONTACT_YOUR_AGENT);

                            $stt=6;
                        }
                        else
                        {
                            if($results->status==1 || $results->status=="1")
                            {
                                if($results->level==1 || $results->level=="1" || $results->level==2 || $results->level=="2" || $results->level==3 || $results->level=="3" || $results->level==4 || $results->level=="4")
                                {
                                    $stt=1;
                                    $mes=$this->lang->line(LANG_MES_RIGHT_LOGIN_APP);
                                    $id             =   $results->rowid;
                                    $this->update_lastlogin($id);
                                }
                                else
                                {
                                    $mes=$this->lang->line(LANG_MES_NOT_ALLOW_LOGIN_APP);
                                    $stt=3;
                                }
                            }
                            else
                            {
                                //$mes        =   $this->lang->line(LANG_MES_LOCKED_LOGIN_APP);
                                $mes   =  $this->lang->line(LANG_MES_OUT_OF_DATE_LOGIN_APP);
                                $stt        =   2;
                                if($results->showpcontact == 1 || $results->showpcontact == "1") //show contact of agent
                                    //$mes    .=   $this->lang->line(LANG_MES_LOCKED_LOGIN_APP_SHOW_AGENT)." ".$phone_agent;
                                    $mes    .=   $this->lang->line(LANG_CONTACT_YOUR_AGENT)." ".$phone_agent;
                                else
                                    //$mes    .=   $this->lang->line(LANG_MES_LOCKED_LOGIN_APP_SHOW_AGENT);
                                    $mes    .=   $this->lang->line(LANG_CONTACT_YOUR_AGENT);
                            }    
                        }    
                    }
                    else
                    {
                        if($results->status==1 || $results->status=="1")
                        {
                            if($results->level==1 || $results->level=="1" || $results->level==2 || $results->level=="2" || $results->level==3 || $results->level=="3" || $results->level==4 || $results->level=="4")
                            {
                                $stt=1;
                                $mes=$this->lang->line(LANG_MES_RIGHT_LOGIN_APP);
                                $id             =   $results->rowid;
                                $this->update_lastlogin($id);
                            }
                            else
                            {
                                $mes=$this->lang->line(LANG_MES_NOT_ALLOW_LOGIN_APP);
                                $stt=3;
                            }
                        }
                        else
                        {
                            //$mes = $this->lang->line(LANG_MES_LOCKED_LOGIN_APP);
                            $mes  = $this->lang->line(LANG_MES_OUT_OF_DATE_LOGIN_APP);
                            $stt=2;
                            if($results->showpcontact == 1 || $results->showpcontact == "1") //show contact of agent
                            {
                                //$mes    .=   $this->lang->line(LANG_MES_LOCKED_LOGIN_APP_SHOW_AGENT)." ".$phone_agent;
                                $mes    .=   $this->lang->line(LANG_CONTACT_YOUR_AGENT)." ".$phone_agent;
                            }
                            else
                            {
                                //$mes    .=   $this->lang->line(LANG_MES_LOCKED_LOGIN_APP_SHOW_AGENT);
                                $mes    .=   $this->lang->line(LANG_CONTACT_YOUR_AGENT);
                            }
                        }   
                    }
                }
            }
            
            $arr=array("stt"=>$stt,"mes"=>$mes,"phone_agent"=>$phone_agent,"ImieNo"=>$ImieNo);
            return $arr;
    }
    public function btnlogin()
    {
        if(isset($_POST['txtusername']) && isset($_POST['txtpassword']))
        {
            $res=0;
            $username=$_POST['txtusername'];
            $pass=md5($_POST['txtpassword']);
            $sql="SELECT * FROM `users` WHERE `id`='$username' AND `password`='$pass'";
            $results=$this->db->query($sql)->row();
            //print_r($results);die;
            if(count($results)>0)
            {
                if(($results->status==1 || $results->status=="1") && ($results->level==1 || $results->level=="1" || $results->level==2 || $results->level=="2" || $results->level==3 || $results->level=="3" || $results->level==4 || $results->level=="4"))
                {
                    $_SESSION['AccUserApp']=array("id"=>$results->id,
                                                "level"=>$results->level,
                                                "fullname"=>$results->fullname
                                                );
                    $res=1;
                }
            }
            return $res;
        }
    }
    public function check_isset_imei($imei)
    {
        $sql="SELECT * FROM `users` WHERE `serialNo`='$imei'";
        $query=$this->db->query($sql)->result();
        $count=count($query);
        return $count;
    }
    public function check_isset_imeino($imei)
    {
        $sql="SELECT count(*) as total FROM `users` WHERE `ImieNo`='$imei'";
        $query=$this->db->query($sql)->row();
        $count=$query->total;
        return $count;
    }
    public function check_isset_imei_tbl_imeis($imei)
    {
        $sql="SELECT * FROM `imeis` WHERE `serialNo`='$imei'";
        $query=$this->db->query($sql)->row();
        return $query;
    }
    
    public function get_agent_by_username($username)
    {
        $sql="SELECT * FROM `users` WHERE `id`='$username' AND `level`=3";
        $query=$this->db->query($sql)->row();
        return $query;
    }
    public function update_lastlogin($id)
    {
        $sql="UPDATE `users` SET `LastLogin` = NOW() WHERE `rowid` = '$id'";
        $query=$this->db->query($sql);
        return $query;
    }

    // update set password of users
    public function updatepasscode()
    {
        $serialNumber = "";
        $passcode = "";
        $result = "";
        if(isset($_POST['passcode']))
           $passcode =  $_POST['passcode'];
        if(isset($_SESSION['serialNumber']))
            $serialNumber = $_SESSION['serialNumber'];
        $sql = "SELECT * FROM `users` WHERE `ImieNo`='$serialNumber'";
        $result = $this->db->query($sql)->result();
        if(count($result) != 0)
        {
            $sql_update = "UPDATE `users` SET `verifyCode`='$passcode' WHERE `ImieNo`='$serialNumber'";
            $req = $this->db->query($sql_update);
            if($req)
             $result = 1;   
        }

        $arr =  array('result'=>$result);
        return $arr;
        
    }
    
}