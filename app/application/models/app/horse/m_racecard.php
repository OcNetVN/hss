<?php
class M_racecard extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function loadracecard()
    {
      
        $res_racecard = $this->get_racecard();
        $str_res="";
        if(count($res_racecard)>0)
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
            $arr_flag = array(
                                "MY"=>"FlagMalay.png",
                                "HK"=>"FlagHK.png",
                                "MC"=>"FlagMaCau.png",
                                "SG"=>"FlagSing.png",
                                "SA"=>"FlagSA.png",
                                "AU"=>"FlagAustralia.png",
                                "EU"=>"FlagEurope.png",
                            );
            $l_RaceCard = array();
            foreach($res_racecard as $row)
            {
                $total_record = $this->get_total_racecard_by_country_day($row->RaceCountry,$row->RaceDay)->total;
                if($total_record>0)
                {
                    $day_race    = substr($row->RaceDay,-2)."/".substr($row->RaceDay,4,2)."/".substr($row->RaceDay,0,4);
                    $flag        = $arr_flag[$row->RaceCountry];
                    $country     = $arr_country[$row->RaceCountry];
                    $RaceCountry = $row->RaceCountry;
                    $RaceDay     = $row->RaceDay;
                    array_push($l_RaceCard,$day_race,$flag,$country,$RaceCountry,$RaceDay);
                
                    $str_res .='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: Large; vertical-align: middle;">';
                        $str_res .= '<tr>';
                            $str_res .= '<td>';
                            	$str_res .= '<div style="margin: 5px; border:1px solid #000; padding:0px 5px;">';
                            	    $str_res .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
                                        $str_res .= '<tr>';
                                          $str_res .= '<td width="5%"><input type="image" title="" src="'.base_url('assets/img/app/flag/'.$arr_flag[$row->RaceCountry]).'"></td>';
                                          $str_res .= '<td width="45%">'.$arr_country[$row->RaceCountry].'</td>';
                                          $str_res .= '<td width="35%" align="right">'.$day_race.'</td>';
                                          $str_res .= '<td width="15%" align="right">';
                                            $str_res .= '<a href="'.base_url('/app/horse/RaceCard_Choose?country='.$row->RaceCountry.'&day='.$row->RaceDay).'" style="text-decoration: none;">';
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

            //print_r($l_RaceCard);
        }
        $arr=array("str_res"=>$str_res);
        return $arr;
    }
    
    public function get_racecard()
    {
        $sql="SELECT DISTINCT `RaceCountry`,`RaceDay` 
              FROM `racerard` 
              WHERE `status` = 'OPEN' 
              ORDER BY `RaceDay` DESC";
        $query=$this->db->query($sql)->result();
        return $query;
    }
    public function get_total_racecard_by_country_day($country, $day)
    {
        $sql    =   "SELECT COUNT(*) AS total 
                    FROM `racerard` 
                    WHERE `RaceCountry` = '$country' 
                    AND `RaceDay` = '$day' 
                    AND `status` = 'OPEN'";
        $query=$this->db->query($sql)->row();
        return $query;
    }
}