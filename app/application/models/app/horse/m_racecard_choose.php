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
                
                $day_race = substr($day,-2)."/".substr($day,4,2)."/".substr($day,0,4);
                
                $dayformat = substr($day,0,4)."-".substr($day,4,2)."-".substr($day,-2);
                $date = new DateTime($dayformat);
                $day_of_week =  $date->format('D');
                    
                $str_countrysee .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
                    $str_countrysee .= '<tr>';
                      $str_countrysee .= '<td width="5%" align="left"><input type="image" title="" src="'.base_url('assets/img/app/flag/'.$arr_flag[$country]).'"></td>';
                      $str_countrysee .= '<td width="28%" align="left">'.$arr_country[$country].'</td>';
                      $str_countrysee .= '<td width="33%" align="center">'.$day_race.'</td>';
                      $str_countrysee .= '<td width="33%" align="right" style="padding-right: 15px;">'.$arr_week[$day_of_week].'</td>';
                 	$str_countrysee .= '</tr>';
            	$str_countrysee .= '</table>';
                
                $str_res .= '<center>';
                $i = 1;
                foreach($res_racecard_choose as $row)
                {
            	   $str_res .= '<a href="'.base_url('/app/horse/RaceCard_Detail?raceid='.$row->RaceID).'"> '.$this->lang->line(LANG_RACE_RACE).' '.(float)$row->RaceNo.'</a><br />';
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