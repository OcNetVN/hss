<?php

/*
|------------------------------------
|
| public function public for lottery
|
|------------------------------------
*/
class M_common_lottery extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function check_isset_row_by_table_txday($table,$txday)
    {
        $sql        = "SELECT COUNT(*) AS total FROM `$table` WHERE `txday` = '$txday'";
        $query      =   $this->db->query($sql)->row();
        return $query;
    }
    
    public function get_row_by_table_txday($table,$txday)
    {
        $sql        = "SELECT * FROM `$table` WHERE `txday` = '$txday'";
        $query      =   $this->db->query($sql)->row();
        return $query;
    }
    /*
	|----------------------------------------------------------------
	| function get day of week by date
	|----------------------------------------------------------------
	*/
    public function isWeekend($date) 
    {
        $weekDay = "";
        $weekDay    = date('l', strtotime($date));
        $weekDay    = strtolower($weekDay);
        switch ($weekDay) 
        {
          case 'saturday':$weekDay = 'sat';
            break;
          case 'sunday':$weekDay = 'sun'; 
            break;
          case 'tuesday':$weekDay = 'Tue';
            break;
          case 'wednesday':$weekDay = 'Wed';
            break;
          default:$weekDay = '';
            break;
        }
       
        return $weekDay;
    }
}