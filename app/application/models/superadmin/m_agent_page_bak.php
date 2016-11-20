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
            $rowid      = $_POST['rowid'];
            $txtfullname=$_POST['txtfullname'];
            $txtusername=$_POST['txtusername'];
            $txtphone=$_POST['txtphone'];
            $rastatus=$_POST['rastatus'];
            $rafees=$_POST['rafees'];
            
            $sql_plus="";
            if(isset($_POST['txtduedate']))
            {
                $txtduedate=$_POST['txtduedate'];
                $arr_duedate=explode("-",$txtduedate);
                $duedate=$arr_duedate[2]."-".$arr_duedate[1]."-".$arr_duedate[0]." 23:59:59";
                $sql_plus = ",duedate = '$duedate'";
            }
            
            $cur="";
            if($rafees == 1 || $rafees=="1")
                $cur="RM";
            else
                if($rafees == 0|| $rafees=="0")
                    $cur="$";
            $txtfees=$_POST['txtfees'];
            $txtremark=$_POST['txtremark'];
            
            $sql_sel = "SELECT * FROM `users`  WHERE `rowid` = '$rowid'";
            $arr_sel = $this->db->query($sql_sel)->result();
            if(count($arr_sel) > 0){
                $olstatus = $arr_sel[0]->status;
                $olremark = $arr_sel[0]->remark; 
                
                $agent=$this->m_agent_page->get_agent_by_id($rowid);
                if(!isset($_POST['txtpassnew']) || (isset($_POST['txtpassnew']) && $_POST['txtpassnew']==""))
                    $txtpassnew = $agent->password;
                else
                    $txtpassnew = md5($_POST['txtpassnew']);
                if(isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level'] ==1 && $agent->level==4) //superadmin update customer have imei & verifycode
                {
                    $txtemei=$_POST['txtemei'];
                    $txtverifycode=$_POST['txtverifycode'];
                    $sql = "UPDATE `users` 
                        SET `id` = '$txtusername',`fullname` = '$txtfullname',`password` = '$txtpassnew',`currency` = '$cur',`fees` = '$txtfees',`phonenumber` = '$txtphone',`status`='$rastatus',`oldstatus`='$olstatus',`remark`='$txtremark',`serialNo`='$txtemei',`verifyCode`='$txtverifycode',oldremark = '$olremark'".$sql_plus.",`tstamp`= NOW()
                        WHERE `rowid` = '$rowid'";
                }
                else
                {
                    $sql = "UPDATE `users` 
                        SET `id` = '$txtusername',`fullname` = '$txtfullname',`password` = '$txtpassnew',`currency` = '$cur',`fees` = '$txtfees',`phonenumber` = '$txtphone',`status`='$rastatus',`oldstatus`='$olstatus',`remark`='$txtremark',oldremark = '$olremark'".$sql_plus.",`tstamp`= NOW()
                        WHERE `rowid` = '$rowid'";
                }
            }
           
            $query=$this->db->query($sql);
            if($query)
                $arr=array("stt"=>1);
            else
                $arr=array("stt"=>0);
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
}