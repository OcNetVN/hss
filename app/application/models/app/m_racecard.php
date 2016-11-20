<?php
class M_racecard extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function loadracecard(){
      
        $res_racecard = $this->get_racecard();
        $str_res="";
        if(count($res_racecard)>0)
        {
            $arr_country = array(
                                "MY"=>"Malaysia",
                                "HK"=>"HongKong",
                                "MC"=>"Macau",
                                "SG"=>"Singapore",
                                "SA"=>"Sounth Africa",
                                "AU"=>"Australia",
                                "EU"=>"Europe",
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
            foreach($res_racecard as $row)
            {
                $total_record = $this->get_total_racecard_by_country_day($row->RaceCountry,$row->RaceDay)->total;
                if($total_record>0)
                {
                    $day_race = substr($row->RaceDay,-2)."/".substr($row->RaceDay,4,2)."/".substr($row->RaceDay,0,4);
                
                    $str_res .='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: XX-Large; vertical-align: middle;">';
                        $str_res .= '<tr>';
                            $str_res .= '<td>';
                            	$str_res .= '<div style="margin: 5px; border:1px solid #000; padding:0px 5px;">';
                            	    $str_res .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
                                        $str_res .= '<tr>';
                                          $str_res .= '<td width="50%"><input type="image" title="" src="'.base_url('assets/img/app/flag/'.$arr_flag[$row->RaceCountry]).'">'.$arr_country[$row->RaceCountry].'</td>';
                                          $str_res .= '<td width="35%" align="right">'.$day_race.'</td>';
                                          $str_res .= '<td width="15%" align="right">';
                                            $str_res .= '<a href="'.base_url('/app/horse/RaceCard_Choose?country='.$row->RaceCountry.'&day='.$row->RaceDay).'" style="text-decoration: none;">';
                                            $str_res .= '<input type="image" name="" id="" title="Next" src="'.base_url('assets/img/app/next.gif').'">';
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
        }
        $arr=array("str_res"=>$str_res);
        return $arr;
    }
    
    public function get_racecard()
    {
        $sql="SELECT DISTINCT `RaceCountry`,`RaceDay` FROM `racerard` ORDER BY `RaceDay` DESC";
        $query=$this->db->query($sql)->result();
        return $query;
    }
    public function get_total_racecard_by_country_day($country, $day)
    {
        $sql="SELECT COUNT(*) AS total FROM `racerard` WHERE `RaceCountry` = '$country' AND `RaceDay` = '$day' AND `status` = 'OPEN'";
        $query=$this->db->query($sql)->row();
        return $query;
    }
}