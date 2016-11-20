<?php
class M_racecard_choose extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function loadracecard_by_country_day(){
        if(isset($_POST['country']) && isset($_POST['day']))
        {
            $country = $_POST['country'];
            $day = $_POST['day'];
            $res_racecard_choose = $this->get_racecard_by_country_day($country,$day);
            $str_res="";
            $str_countrysee ="";
            if(count($res_racecard_choose)>0)
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
                
                $day_race = substr($day,-2)."/".substr($day,4,2)."/".substr($day,0,4);
                
                $dayformat = substr($day,0,4)."-".substr($day,4,2)."-".substr($day,-2);
                $date = new DateTime($dayformat);
                $day_of_week =  $date->format('D');
                    
                $str_countrysee .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
                    $str_countrysee .= '<tr>';
                      $str_countrysee .= '<td width="34%"><input type="image" title="" src="'.base_url('assets/img/app/flag/'.$arr_flag[$country]).'">'.$arr_country[$country].'</td>';
                      $str_countrysee .= '<td width="33%" align="center">'.$day_race.'</td>';
                      $str_countrysee .= '<td width="33%" align="right" style="padding-right: 15px;">'.$day_of_week.'</td>';
                 	$str_countrysee .= '</tr>';
            	$str_countrysee .= '</table>';
                
                $str_res .= '<center>';
                $i = 1;
                foreach($res_racecard_choose as $row)
                {
            	   $str_res .= '<a href="'.base_url('/app/horse/RaceCard_Detail?raceid='.$row->RaceID).'">Race '.(float)$row->RaceNo.'</a><br />';
                   $i++;
                }
                $str_res .= '</center>';
            }
            
            //return
            $arr=array("str_res"=>$str_res,"str_countrysee"=>$str_countrysee);
            return $arr;
        }
        
    }
    
    public function get_racecard_by_country_day($country, $day)
    {
        $sql="SELECT * FROM `racerard` WHERE `RaceCountry` = '$country' AND `RaceDay` = '$day' AND `status` = 'OPEN' ORDER BY `RaceNo`";
        $query=$this->db->query($sql)->result();
        return $query;
    }
}