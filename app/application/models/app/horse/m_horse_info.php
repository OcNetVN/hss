<?php
class M_horse_info extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getListHorseInfo()
    {
        $scrr = $this->lang->line(LANG_LANGUAGE_SCR);
        $today = date("Ymd");
        $sort_today = date("ymd");
        if(isset($_POST['country']))
            $country = $_POST['country'];
        else
            $country = "MY";

        if(isset($_POST['object']))
             $object = $_POST['object'];

        $arr_liveto_my  = array();
        $arr_liveto_sin = array();
        $livetole_MY  =$this->get_livetole_by_country_date_board($country,"MAL",$today);
        $livetole_SIN =$this->get_livetole_by_country_date_board($country,"SIN",$today);
        
        // check country not show and show flag and data for that country
        $sql_show = "SELECT * FROM `country` 
                     WHERE `CountryCode`='$country' 
                     AND `ShowHorseInfo`= TRUE ";
        $arr_show = $this->db->query($sql_show)->result();
        $count_flag = count($arr_show);
        // end check country
        
        //load tbl_part1
        //request 21/03/2015
        $str_header1 = "";
        $str_header2 = "";
        $str_header3 = "";
        $str_header4 = "";
        $race_info = $this->get_race_info_by_country_date($country,$today);  
        if(count($race_info) != 0)
        {
            if($this->lang->line(LANG_EN) == "English")
            {
                $str_header1 = $race_info->items1en;
                $str_header2 = $race_info->items2en;
                $str_header3 = $race_info->items3en;
                $str_header4 = $race_info->items4en;
            }
            else
            {
                $str_header1 = $race_info->items1cn;
                $str_header2 = $race_info->items2cn;
                $str_header3 = $race_info->items3cn;
                $str_header4 = $race_info->items4cn;
            }
        }
        $arr_raceno    = $this->get_livetole_by_country_date_board_order_by_win_MY_asc($country,"MAL",$today);
        //print_r($arr_raceno);
        $arr_racenoSin = $this->get_livetole_by_country_date_board_order_by_win_MY_asc($country,"SIN",$today);
        //print_r($arr_racenoSin);
        $arr_winMal = array();
        $arr_winSin = array();
        $arr_winNo  = array();
        if(count($arr_raceno) != 0 && count($arr_racenoSin) == 0 )
        {
            foreach($arr_raceno as $row_raceno)
            {
                $RaceNo = (int)substr($row_raceno->RaceNo,-2);
                array_push($arr_winNo,$RaceNo);
                $race_infomation    = $this->get_livetole_by_raceno(substr($row_raceno->RaceNo,-2),"MAL",$country);
                if(count($race_infomation) > 0)
                {
                    if($race_infomation->Win < 0)
                        $WinPlay = $scrr;
                    else
                        $WinPlay = number_format($race_infomation->Win,2);

                    array_push($arr_winMal, $WinPlay);
                } 
            }
        }

        if(count($arr_raceno) == 0 && count($arr_racenoSin) != 0)
        {
            foreach($arr_racenoSin as $row_raceno)
            {
                $RaceNo = (int)substr($row_raceno->RaceNo,-2);
                array_push($arr_winNo,$RaceNo);

                $race_infomation_sin    = $this->get_livetole_by_raceno(substr($row_raceno->RaceNo,-2),"SIN",$country);
                if(count($race_infomation_sin) > 0)
                {
                    if($race_infomation_sin->Win < 0)
                        $WinPlay_sin = $scrr;
                    else
                        $WinPlay_sin = number_format($race_infomation_sin->Win,2);

                    array_push($arr_winSin, $WinPlay_sin);
                }
                
            }
        }

        if(count($arr_raceno) != 0 && count($arr_racenoSin) != 0)
        {
            foreach($arr_raceno as $row_raceno)
            {
                $RaceNo = (int)substr($row_raceno->RaceNo,-2);
                array_push($arr_winNo,$RaceNo);
                $race_infomation    = $this->get_livetole_by_raceno(substr($row_raceno->RaceNo,-2),"MAL",$country);
                if(count($race_infomation) > 0)
                {
                    if($race_infomation->Win < 0)
                        $WinPlay = $scrr;
                    else
                        $WinPlay = number_format($race_infomation->Win,2);

                    array_push($arr_winMal, $WinPlay);
                } 
                
                $race_infomation_sin    = $this->get_livetole_by_raceno(substr($row_raceno->RaceNo,-2),"SIN",$country);
                if(count($race_infomation_sin) > 0)
                {
                    if($race_infomation_sin->Win < 0)
                        $WinPlay_sin = $scrr;
                    else
                        $WinPlay_sin = number_format($race_infomation_sin->Win,2);

                    array_push($arr_winSin, $WinPlay_sin);
                }
            }
        }
            //print_r($arr_raceno);die;
        //end request 21/03/2015

        $sql_flagcountry = "SELECT * FROM `country` 
                            WHERE  `ShowHorseInfo`= TRUE ";
        $list_flag       =  $this->db->query($sql_flagcountry)->result();
        
        $arr    =    array(  "check_country" => $count_flag,
                             "l_liveto_MY"   => $livetole_MY,
                             "l_liveto_SIN"  => $livetole_SIN,
                             "l_raceboard"   => $race_info,
                             "l_winMal"      => $arr_winMal,
                             "l_winSin"      => $arr_winSin,
                             "l_winNo"       => $arr_winNo,
                             "str_object"    => $object,
                             "header1"       => $str_header1,
                             "header2"       => $str_header2,
                             "header3"       => $str_header3,
                             "header4"       => $str_header4,
                             "flagcountry"   =>$list_flag
                           );
        return $arr;
    }

    public function getListTimeFlag()
    {
        $sql_flagcountry = "SELECT * FROM `country` 
                            WHERE  `ShowHorseInfo`= TRUE ";
        $list_flag       =  $this->db->query($sql_flagcountry)->result();
        $arr = array('l_flag'=>$list_flag);

        return $arr;
    }
    
    

    public function get_race_info_by_country_date($country,$day)
    {
        $sql="SELECT * FROM `raceinfo`
              WHERE `RaceCountry`='$country' AND `RaceDay`= '$day'
              /*ORDER BY `ModifiedDate` DESC,`CreadedDate` DESC*/
              ORDER BY `tstamp` DESC
              LIMIT 0,1 ";
        //echo $sql;
        //echo $sql;die;
        $query=$this->db->query($sql)->row();
        return $query;
    }
    public function get_livetole_by_country_date_board_raceno($country,$board,$day,$RaceNo)
    {
        $sql="SELECT * FROM `livetote` 
             WHERE `RaceCountry`='$country' 
             AND `RaceBoard`='$board' 
             /*AND `RaceDay`= '$day'*/  
             AND `RaceNo`='$RaceNo'";
        $query=$this->db->query($sql)->row();
        return $query;
    }
    public function get_livetole_by_country_date_board($country,$board,$day)
    {
        // eidt chỉ thêm những con ngựa có thôi
        $sql="SELECT `RaceCard`,`RaceCountry`,`RaceDay`,`RaceBoard`,`RaceNo`,`Win`,`Place` 
              FROM `livetote` 
              WHERE `RaceCountry`='$country' 
              /*AND `RaceDay`= '$day'*/ 
              AND `RaceBoard`='$board' 
              AND `Win` != '0.00' AND `Place` != '0.00'
              ORDER BY RIGHT(RaceNo,2)";
        $query=$this->db->query($sql)->result();
        return $query;
    }
    public function get_livetole_by_country_date_board_order_by_win_MY_asc($country,$board,$day)
    {
        $sql="SELECT `RaceNo` 
             FROM `livetote` 
             WHERE `RaceCountry`='$country' 
             /*AND `RaceDay`= '$day'*/ 
             AND `RaceBoard`='$board' 
             AND `Win` > 0 ORDER BY `Win` limit 0,5";
        //echo $sql;die;
        $query=$this->db->query($sql)->result();
        return $query;
    }
    public function get_livetole_by_raceno($raceno,$board,$country)
    {
        $sql="SELECT `Win`,`Place` FROM `livetote` 
              WHERE RIGHT(`RaceNo`,2) = '$raceno' 
              AND `RaceBoard` = '$board' 
              and `RaceCountry` = '$country'";
        //echo $sql;die;
        $query=$this->db->query($sql)->row();
        return $query;
    }
    /*
	|----------------------------------------------------------------
	| check have race or not by contry & date
	|----------------------------------------------------------------
	*/
    public function check_have_race_by_country_date()
    {
        if(isset($_POST["country"]))
        {
            $country = $_POST["country"];
            $day = $today = date("Ymd");
            $sql_country = "SELECT * FROM `country` WHERE `CountryCode`='$country' AND `ShowHorseInfo`= TRUE";
            $ar_country = $this->db->query($sql_country)->result();
            $sql="SELECT count(*) as total FROM `livetote` WHERE `RaceCountry` = '$country' AND `RaceDay` = '$day'";
            $query=$this->db->query($sql)->row();
            $total = $query->total;
            if(count($ar_country) != 0)
            {
                // if($total > 0)
                //     return 1;
                // else
                //     return 0;

                return 1;
            }
            else
            {
                return 0;
            }
            
        }
    }
    
   
}