<?php
class M_report extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function show_report()
    {
        $total_active_agent = $this->get_total(3,1)->total;
        $total_inactive_agent = $this->get_total(3,0)->total;  
        $total_active_customer = $this->get_total(4,1)->total;
        $total_inactive_customer = $this->get_total(4,0)->total;  
            
        $arr = array("ac_agent"=>$total_active_agent,
                    "inac_agent"=>$total_inactive_agent,
                    "ac_cus"=>$total_active_customer,
                    "inac_cus"=>$total_inactive_customer);
        return $arr;
    }
    public function get_total($level,$status)
    {
        if(isset($_SESSION['AccUserSuper']))
        {
            if($_SESSION['AccUserSuper']['level']==1)
                $sql="SELECT COUNT(*) AS total FROM `users` WHERE `level` = $level AND `status`=$status";
            else
            {
                $id=$_SESSION['AccUserSuper']['id'];
                if($level==3)
                    $sql="SELECT COUNT(*) AS total FROM `users` WHERE `level` = $level AND `pid`='$id' AND `status`=$status";
                else
                    if($level==4)
                    {
                        $sql_user="SELECT distinct id FROM `users` WHERE `level` = 3 AND `pid`='$id'";
                        $query_user=$this->db->query($sql_user)->result();
                        $id="";
                        foreach($query_user as $row_user)
                        {
                            $id.="\"".$row_user->id."\",";
                        }
                        $id=substr($id,0,-1);
                        $sql="SELECT COUNT(*) AS total FROM `users` WHERE `level` = $level AND `pid` IN ($id) AND `status`=$status";
                    }
            }
        }
        else
            $sql="SELECT COUNT(*) AS total FROM `users` WHERE `level` = $level AND `status`=$status";
        $query=$this->db->query($sql)->row();
        return $query;
    }
}