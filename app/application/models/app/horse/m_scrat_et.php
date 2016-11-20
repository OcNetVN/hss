<?php
class M_scrat_et extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function load_scrat_et(){
      
        $res_scrat_et = $this->get_scrat_et();
        $str_res="";
       
        if(count($res_scrat_et)>0)
        {
             $arr_country = array(
                                "MY"=>$this->lang->line(LANG_COUNTRY_MY),
                                "HK"=>$this->lang->line(LANG_COUNTRY_HK),
                                "MC"=>$this->lang->line(LANG_COUNTRY_MC),
                                "SG"=>$this->lang->line(LANG_COUNTRY_SG),
                                "SA"=>$this->lang->line(LANG_COUNTRY_SA),
                                "AU"=>$this->lang->line(LANG_COUNTRY_AU),
                                "EU"=>$this->lang->line(LANG_COUNTRY_EU),
                                );
                $arr_week = array(
                                "Mon"=>$this->lang->line(LANG_TIME_MON),
                                "Tue"=>$this->lang->line(LANG_TIME_TUE),
                                "Wed"=>$this->lang->line(LANG_TIME_WED),
                                "Thu"=>$this->lang->line(LANG_TIME_THU),
                                "Fri"=>$this->lang->line(LANG_TIME_FRI),
                                "Sat"=>$this->lang->line(LANG_TIME_SAT),
                                "Sun"=>$this->lang->line(LANG_TIME_SUN),
                                );
            $arr_flag = array(
                                    "MY"=>"FlagMalay.png",
                                    "HK"=>"FlagHK.png",
                                    "MC"=>"FlagMaCau.png",
                                    "SG"=>"FlagSing.png",
                                    "SA"=>"FlagSA.png",
                                    "AU"=>"FlagAustralia.png",
                                    "EU"=>"FlagEurope.png",
                                    );
            foreach($res_scrat_et as $row)
            {
                // set status Race Card have OPEN
              
                $total_status = $this->get_status_racecard($row->RaceCountry,$row->RaceDay)->total;
               
               // if($total_status > 0)
//                {
                    $total_record = $this->get_total_scrat_et_by_country_day($row->RaceCountry,$row->RaceDay)->total;
                
                    
                     if($total_record>0)
                    {
                        $day_race = substr($row->RaceDay,-2)."/".substr($row->RaceDay,4,2)."/".substr($row->RaceDay,0,4);
                    
                        $str_res .='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: Large; vertical-align: middle;">';
                            $str_res .= '<tr>';
                                $str_res .= '<td>';
                                	$str_res .= '<div style="margin: 5px; border:1px solid #000; padding:0px 5px;">';
                                	    $str_res .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
                                            $str_res .= '<tr>';
                                              $str_res .= '<td width="5%" align="left"><input type="image" title="" src="'.base_url('assets/img/app/flag/'.$arr_flag[$row->RaceCountry]).'"></td>';
                                              $str_res .= '<td width="45%" align="left">'.$arr_country[$row->RaceCountry].'</td>';
                                              $str_res .= '<td width="35%" align="right">'.$day_race.'</td>';
                                              $str_res .= '<td width="15%" align="right">';
                                                $str_res .= '<a href="'.base_url('/app/horse/scrat_et_detail?country='.$row->RaceCountry.'&day='.$row->RaceDay).'" style="text-decoration: none;">';
                                                $str_res .= '<input type="image" name="" id="" title="Next" src="'.base_url('assets/img/app/btn-next.png').'">';
                                                $str_res .= '</a>';
                                              $str_res .= '</td>';
                                         	$str_res .= '</tr>';
                                    	$str_res .= '</table>';
                                    $str_res .= '</div>';
                                $str_res .= '</td>';
                            $str_res .= '</tr>';
                        $str_res .= '</table>';
                    }
                }
           // }
        }
        $arr=array("str_res"=>$str_res);
        return $arr;
    }
    
    public function get_scrat_et()
    {
        $sql="SELECT DISTINCT `RaceCountry`,`RaceDay` FROM `scr` where `RaceDay` >=  CONCAT (YEAR(NOW()),LPAD(MONTH(NOW()),2,'0'),LPAD(DAY(NOW()),2,'0')) ORDER BY `RaceDay` DESC";
        $query=$this->db->query($sql)->result();        
        return $query;
    }
    public function get_total_scrat_et_by_country_day($country, $day)
    {
        $sql="SELECT COUNT(*) AS total FROM `scr` WHERE `RaceCountry` = '$country' AND `RaceDay` = '$day' AND ( LENGTH(`EarlyTicket`) > 0 OR LENGTH(`Scratching`) > 0)";         
        $query=$this->db->query($sql)->row();
        return $query;
    }

    public function get_status_racecard($country, $day)
    {
        $sql    =   "SELECT COUNT(*) AS total 
                    FROM `racerard` 
                    WHERE `RaceCountry`='$country' 
                    AND `RaceDay`='$day' 
                    AND `status`='OPEN'";
        $query=$this->db->query($sql)->row();
        return $query;
    }
}