<?php
class M_login extends CI_Model{
    public function __construct()
    {
        parent::__construct();
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
                if(($results->status==1 || $results->status=="1") && ($results->level==1 || $results->level=="1"))
                {
                    $_SESSION['AccUser']=array("id"=>$results->id,
                                                "level"=>$results->level,
                                                "fullname"=>$results->fullname
                                                );
                    $res=1;
                }
            }
            return $res;
        }
    }

    public function btnlogin_admin()
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
                if(($results->status==1 || $results->status=="1") &&  $results->id=="admin" )
                {
                    $_SESSION['AccUser']=array("id"=>$results->id,
                                                "level"=>$results->level,
                                                "fullname"=>$results->fullname
                                                );
                    $res=1;
                }
            }
            return $res;
        }
    }
}