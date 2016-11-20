<?php
class M_horse_info_board extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function loadhorseinfoboard()
    {
        $rel = "";
        $sql = "SELECT * FROM `horseinfoboard` WHERE DATE_FORMAT(`CreatedDate`,'%Y-%m-%d')= DATE_FORMAT(NOW(),'%Y-%m-%d') ORDER BY `CreatedDate` DESC ";
        $arr_info = $this->db->query($sql)->result();
        if(count($arr_info) > 0)
        {
            $rel = 1;
        }

        $arr = array("req"=>$rel,"HorseInfoBoard"=>$arr_info);
        return $arr;
    }
    
   
}