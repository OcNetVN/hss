<?php
class M_feedback extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function load_list_feedback()
    {
        $sql_feedback = "SELECT * FROM `feelback_custom`
                         ORDER BY `CreatedDate` DESC";
        $arr_fb       = $this->db->query($sql_feedback)->result();
        $arr          = array('l_feedback'=>$arr_fb);
        return $arr;
    }
}