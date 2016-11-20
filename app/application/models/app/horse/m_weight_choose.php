<?php
class M_weight_choose extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function loadweight_by_country_day(){
        if(isset($_POST['country']) && isset($_POST['day']))
        {
            $country = $_POST['country'];
            $day = $_POST['day'];
            $res_weight_choose = $this->get_weight_by_country_day($country,$day);
            $str_res="";
            $str_countrysee ="";
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
            $arr_weight = array();
            if(count($res_weight_choose) > 0 )
            {
                $i = 0;
                foreach($res_weight_choose as $row)
                {
                   $arr_weight[$i]["RaceID"]   = $row->RaceID;
                   $arr_weight[$i]["ShowRace"] = $this->lang->line(LANG_RACE_RACE).' '.(float)$row->RaceNo;
                   $i++;
                }
            }
            
            //return
            $arr    = array(
                                "flag_country"  =>$arr_flag[$country],
                                "country"       =>$arr_country[$country],
                                "show_date"     =>$day_race,
                                "week"          =>$arr_week[$day_of_week],
                                "arr_weight"    =>$arr_weight 
                            );
            return $arr;
        }
        
    }
    
    public function get_weight_by_country_day($country, $day)
    {
        $sql="SELECT * FROM `racerard` WHERE `RaceCountry` = '$country' AND `RaceDay` = '$day' AND `status` = 'OPEN' ORDER BY `RaceNo`";
        $query=$this->db->query($sql)->result();
        return $query;
    }
}