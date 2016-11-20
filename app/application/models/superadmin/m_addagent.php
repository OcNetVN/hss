<?php
class M_addagent extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function btnsave_addagent()
    {
        if(isset($_POST['txtfullname']))
        {
            $txtfullname=$_POST['txtfullname'];
            $txtusername=$_POST['txtusername'];
            $txtpass=md5($_POST['txtpass']);
            $txtphone=$_POST['txtphone'];
            $rastatus=$_POST['rastatus'];
            $rafees=$_POST['rafees'];
            $cur="";
            if($rafees == 1 || $rafees=="1")
                $cur="RM";
            else
                if($rafees == 0|| $rafees=="0")
                    $cur="$";
            $txtfees=$_POST['txtfees'];
            $txtremark=$_POST['txtremark'];
            
            $pid="";
            if(isset($_SESSION['AccUserSuper']))
                $pid=$_SESSION['AccUserSuper']['id'];
            $sql="INSERT INTO `users` (`rowid`, `id`, `password`, `fullname`, `pid`, `level`, `currency`, `fees`, `phonenumber`, `status`, `createdate`, `remark`) 
                VALUES (NULL, '$txtusername', '$txtpass', '$txtfullname', '$pid', '3', '$cur', '$txtfees', '$txtphone', '$rastatus', NOW(), '$txtremark');";
            $query=$this->db->query($sql);
            if($query)
                $arr=array("stt"=>1);
            else
                $arr=array("stt"=>0);
            return $arr;
        }
    }
}