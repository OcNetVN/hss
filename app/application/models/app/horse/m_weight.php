<?php
class M_weight extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function loadweight()
    {
        $res_weight = $this->get_weight();
        $arr_weight = array();
        if(count($res_weight)>0)
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
            $i=0;
            foreach($res_weight as $row)
            {
                // $total_record = $this->get_total_weight_by_country_day($row->RaceCountry,$row->RaceDay)->total;
                // if($total_record>0)
                // {
                    $day_race = substr($row->RaceDay,-2)."/".substr($row->RaceDay,4,2)."/".substr($row->RaceDay,0,4);
                    $flag        = $arr_flag[$row->RaceCountry];
                    $country     = $arr_country[$row->RaceCountry];
                    $RaceCountry = $row->RaceCountry;
                    $RaceDay     = $row->RaceDay;
                    $arr_weight[$i]['day_race'] = $day_race;
                    $arr_weight[$i]['flag']     = $flag;
                    $arr_weight[$i]['country']  = $country;
                    $arr_weight[$i]['racecountry'] = $RaceCountry;
                    $arr_weight[$i]['raceday']  = $RaceDay;
                    $i++;
            }
        }
        //$arr = array("arr_weight"=>$arr_weight);
        return $arr_weight;
    }
    
    public function get_weight()
    {
        $sql="SELECT DISTINCT `RaceCountry`,`RaceDay` 
             FROM `racerard` 
             WHERE `status` = 'OPEN' 
             ORDER BY `RaceDay` DESC";
        $query=$this->db->query($sql)->result();
        return $query;
    }
    public function get_total_weight_by_country_day($country, $day)
    {
        $sql   =  "SELECT COUNT(*) AS total 
                   FROM `racerard` 
                   WHERE `RaceCountry` = '$country'  
                   AND `RaceDay` = '$day' 
                   AND `status` = 'OPEN'";
        $query=$this->db->query($sql)->row();
        return $query;
    }


}