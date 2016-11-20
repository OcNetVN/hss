<?php
class M_test extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function auto_insert_statement($agent)
    {       
            $res=0;
            $sql="INSERT INTO `statement` ( `UserID`, `ActiveUser`, `Inactive`, `FixDate`, `NewMember1_15`, `NewMember16_31`, `PreBalance`, `Pay`, `HaveToPay`, `Paydate`) 
VALUES('$agent','2','0','2015-03-10 00:00:01',NULL,NULL,'0.00','0.00','90.00',NULL);";
            try {
                $results=$this->db->query($sql);
                $res=1;
            }
            catch (Exception $e)
            {
                $res=0;
            }
            return $res;
        
    }
}