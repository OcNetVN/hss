<?php
class M_agent_page extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_agent_by_id($id)
    {
        if(isset($_SESSION['AccUserSuper']))
        {
            if($_SESSION['AccUserSuper']['level']==1)
                $sql="SELECT * FROM `users` WHERE `rowid`=$id";
            else
            {
                $idss=$_SESSION['AccUserSuper']['id'];
                $sql="SELECT * FROM `users` WHERE `rowid`=$id AND `pid`='$idss'";
            }
        }
        else
            $sql="SELECT * FROM `users` WHERE `rowid`=$id";
        //echo $sql;die;
        $query=$this->db->query($sql)->row();
        return $query;
    }
    public function get_member_by_agent($idagent,$status)
    {
        $sql="SELECT * FROM `users` WHERE `pid`='$idagent' AND `level`=4 AND `status`=$status";
        $query=$this->db->query($sql)->result();
        return $query;
    }
    
    public function get_parent_by_id($pid)
    {
        $res = null;
        $sql="SELECT * FROM `users` WHERE `id`='$pid'";
        try {
             $res =$this->db->query($sql)->row();
        }
        catch (exception $e)
        {
           $res = null; 
        }
        
        return  $res ;
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
    
    public function updateagent()
    {
        if(isset($_POST['txtfullname']))
        {
            $month          =   date("m");
            $year           =   date("Y");
            $day            =   date("d");
            
            $rowid          =$_POST['rowid'];
            $txtfullname    =$_POST['txtfullname'];
            $txtusername    =$_POST['txtusername'];
            $txtphone       =$_POST['txtphone'];
            $rastatus       =$_POST['rastatus'];
            $rafees         =$_POST['rafees'];
            
            $sql_plus       ="";
            if(isset($_POST['txtduedate']) )
            {
                $txtduedate=$_POST['txtduedate'];
                if($txtduedate!="")
                {
                    $arr_duedate=explode("-",$txtduedate);
                    $duedate=$arr_duedate[2]."-".$arr_duedate[1]."-".$arr_duedate[0]." 23:59:59";
                    $sql_plus = ",duedate = '$duedate'";
                }
                else
                    $sql_plus = ",duedate = NULL";
            }
            
            $cur                            = "";
            if($rafees == 1 || $rafees=="1")
                $cur                        = "RM";
            else
                if($rafees == 0|| $rafees=="0")
                    $cur                    = "$";
            $txtfees                        = $_POST['txtfees'];
            $txtremark                      = $_POST['txtremark'];
            $showpid = "0";
            if(isset($_POST['showpid']))
                $showpid        = $_POST['showpid'];
            
            $sql_sel                        = "SELECT * FROM `users`  WHERE `rowid` = '$rowid'";
            $arr_sel                        = $this->db->query($sql_sel)->result();
            if(count($arr_sel) > 0){
                $olstatus                   = $arr_sel[0]->status;
                $olremark                   = $arr_sel[0]->remark; 
                $pid                        = $arr_sel[0]->pid; 
                
                //nghia 26/03/2015
                if($olstatus                != $rastatus)
                {
                    if($rastatus    ==  1)
                        $sql_plus_lastactive    = " ,`LastActiveDate` = NOW() ";
                    else
                        $sql_plus_lastactive    = " ,`LastInactiveDate` = NOW() ";
                }
                else
                    $sql_plus_lastactive    = "";
                //end nghia 26/03/2015    
                $agent                      = $this->m_agent_page->get_agent_by_id($rowid);
                if(!isset($_POST['txtpassnew']) || (isset($_POST['txtpassnew']) && $_POST['txtpassnew']==""))
                    $txtpassnew             = $agent->password;
                else
                    $txtpassnew             = md5($_POST['txtpassnew']);
                
                $modifyby                   = $_SESSION['AccUserSuper']['id'];
                if(isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level'] ==1 && $agent->level==4) //superadmin update customer have imei & verifycode
                {
                    $txtemei                = $_POST['txtemei'];
                    $txtverifycode          = $_POST['txtverifycode'];
                    $sql                    = "UPDATE `users` 
                        SET `id` = '$txtusername',`fullname` = '$txtfullname',`password` = '$txtpassnew',
                                    `currency` = '$cur',`fees` = '$txtfees',`phonenumber` = '$txtphone',
                                    `status`='$rastatus',`oldstatus`='$olstatus',`remark`='$txtremark',
                                    `ImieNo`='$txtemei',`verifyCode`='$txtverifycode',`oldremark` = '$olremark'".$sql_plus." $sql_plus_lastactive,
                                    `showpcontact`=$showpid,
                                    `tstamp`= NOW(), `ModifiedBy`='$modifyby', `ModifiedDate`=NOW()
                        WHERE `rowid` = '$rowid'";
                }
                else
                {
                    $sql                    = "UPDATE `users` 
                        SET `id` = '$txtusername',`fullname` = '$txtfullname',`password` = '$txtpassnew',
                                    `currency` = '$cur',`fees` = '$txtfees',`phonenumber` = '$txtphone',
                                    `status`='$rastatus',`oldstatus`='$olstatus',`remark`='$txtremark',
                                    `oldremark` = '$olremark'".$sql_plus." $sql_plus_lastactive,
                                    `showpcontact`=$showpid,
                                    `tstamp`= NOW(), `ModifiedBy`='$modifyby', `ModifiedDate`=NOW() 
                        WHERE `rowid` = '$rowid'";
                }
                
                //update table statement
                if($agent->level == 4 || $agent->level == "4") //la customer
                {
                    if($olstatus            != $rastatus && $rastatus == 1)
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
                        $username           =   $pid;
                        /*$sql_select         =   "SELECT * FROM `users` WHERE `rowid` = $id"; //customer
                        $query_select       =   $this->db->query($sql_select)->row();
                        $pid                =   $query_select->pid;*/
                        
                        $sql_agent          =   "SELECT * FROM `users` WHERE `id` = '$username' and `level` = 3"; //agent
                        $query_agent        =   $this->db->query($sql_agent)->row();
                        //$fees_agent         =   $query_agent->fees;
                        $query_agent        =   json_decode(json_encode($query_agent),true);
                        // thuan fix error  Trying to get property of non-object 8/3/2015
                        $fees_agent = "";
                        if(isset($query_agent['fees']))
                           $fees_agent =  $query_agent['fees'];
                        
                        $sql_statement      =   "SELECT * FROM `statement` WHERE `UserID` = '$username' AND SUBSTRING(`FixDate`,1,7) = '$year-$month'";
            			//echo $sql_statement;die;
                        $query_statement    =   $this->db->query($sql_statement)->row();
                        $query_statement    = json_decode(json_encode($query_statement),true);
                        $status_statement = "";
                        if(isset($query_statement['Status']))
                            $status_statement   =   $query_statement['Status'];
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
                            $NewMember16_31     =   (int)$query_statement->NewMember16_31;
                        
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
                    }
                }
            }
            $query=$this->db->query($sql);
            if($query)
                $arr                        = array("stt"=>1);
            else
                $arr                        = array("stt"=>0);
            return $arr;
        }
    }
    
    public function deleteagent(){
       $rowid = $_POST['rowid'];
       if($rowid != ""){
            $sql_sel = "SELECT * FROM `users`  WHERE `rowid` = '$rowid'";
            $arr_sel = $this->db->query($sql_sel)->result();
            if(count($arr_sel) > 0){
                $sql = "DELETE FROM `users` WHERE `rowid` = '$rowid'";
            }    
       }
       $query=$this->db->query($sql);
       if($query)
            $arr=array("stt"=>1);
       else
            $arr=array("stt"=>0);
        return $arr;
    }
    
    public function SaveParentContact(){
       $rowid = $_POST['rowid'];
       $phone = $_POST['phone'];
       $arr=array("stt"=>0);
       if($rowid != ""){
            $sql_sel = "UPDATE `users` SET `phonenumber`='$phone' WHERE `rowid`=$rowid"; 
            $query=$this->db->query($sql_sel);
            if($query)
                $arr=array("stt"=>1);
            else
                $arr=array("stt"=>0);             
       }
        return $arr;
    }
}