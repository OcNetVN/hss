<?php
class M_adduser extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function btnsave_adduser()
    {
        if(isset($_POST['txtfullname']))
        {
            $txtfullname=$_POST['txtfullname'];
            $txtusername=$_POST['txtusername'];
            $txtpass=md5($_POST['txtpass']);
            $txtphone=$_POST['txtphone'];
            $rastatus=$_POST['rastatus'];
            $rafees=$_POST['rafees'];
            $txtduedate=$_POST['txtduedate'];
            $pid=$_POST['txtusernameagent'];
            $txtemei=$_POST['txtemei'];
            $txtverifycode=$_POST['txtverifycode'];
            
            $arr_duedate=explode("-",$txtduedate);
            $duedate=$arr_duedate[2]."-".$arr_duedate[1]."-".$arr_duedate[0]."-"." 23:59:59";
            
            //$pid="";
            //if(isset($_SESSION['AccUserSuper']))
                //$pid=$_SESSION['AccUserSuper']['id'];
            
            $cur="";
            if($rafees == 1 || $rafees=="1")
                $cur="RM";
            else
                if($rafees == 0|| $rafees=="0")
                    $cur="$";
            $txtfees=$_POST['txtfees'];
            $txtremark=$_POST['txtremark'];
            
            $sql="INSERT INTO `users` (`rowid`, `id`, `password`, `fullname`, `pid`, `level`, `currency`, `fees`, `phonenumber`, `status`, `createdate`, `remark`, `duedate`,`serialNo`,`verifyCode`,`LastActiveDate`) 
                VALUES (NULL, '$txtusername', '$txtpass', '$txtfullname', '$pid', '4', '$cur', '$txtfees', '$txtphone', '$rastatus', NOW(), '$txtremark','$duedate','$txtemei','$txtverifycode',NOW());";
            $query=$this->db->query($sql);
            if($query)
                $arr=array("stt"=>1);
            else
                $arr=array("stt"=>0);
            return $arr;
        }
    }
    public function get_option_list_agent()
    {
        $sql="SELECT * FROM `users` WHERE `level`=3 order by id";
        $query=$this->db->query($sql)->result();
        $str_res="";
        if(count($query)>0)
        {
            foreach($query as $row_user)
            {
                $str_res.='<option value="'.$row_user->id.'">';
            }
        }
        $arr=array("str_res"=>$str_res);
        return $arr;
    }
    public function check_isset_username()
    {
        if(isset($_POST['username']))
        {
            $username=$_POST['username'];
            $sql="SELECT COUNT(*) AS total FROM `users` WHERE `id`='$username'";
            $query=$this->db->query($sql)->row();
            $row=$query->total;
            return $row;
        }
    }
}