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
            /*
            |----------------------------------------
            | status = 1: right
            | status = 0: pass not correct
            | status = 2: not active
            | status = 3: username not correct
            | status = 4: not permit
            |----------------------------------------
            */
            $username           =   $_POST['txtusername'];
            $pass               =   md5($_POST['txtpassword']);
            
            $sql_check_agent    =   "SELECT * FROM `users` WHERE `id` = '$username'";
            $query_check_agnent =   $this->db->query($sql_check_agent)->row();
            if(count($query_check_agnent) > 0) //isset user name
            {
                $sql            =   "SELECT * FROM `users` WHERE `id`='$username' AND `password`='$pass'";
                $results        =   $this->db->query($sql)->row();
                if(count($results)>0)   //isset user name & pass
                {
                    $status     =   $results->status;
                    if($status == 1)
                    {
                        if($results->level==1 || $results->level=="1" || $results->level==2 || $results->level=="2" || $results->level==3 || $results->level=="3")
                        {
                            $_SESSION['AccUserSuper']   =   array(  "id"            =>  $results->id,
                                                                    "level"         =>  $results->level,
                                                                    "fullname"      =>  $results->fullname,
                                                                    );
                            $res=   1;  //right
                        }
                        else
                        {
                            $res=   4;  //not permit
                        }
                    }
                    else
                        $res    =   2;  //not active
                }
                else
                {
                    $res        =   0;  //pass not correct
                }
            }
            else
            {
                $res            =   3;  //username not correct
            }
            
            return $res;
        }
    }
}