<?php
class M_weight_detail extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function load_weight_detail()
    {
        if(isset($_POST['racecardid']))
        {
            $racecardid             = $_POST['racecardid']; //H K 1 5 0 3 1101
            if(strlen($racecardid) == 10)
            {
                $raceno                 = (int)substr($racecardid,-2); 
                $short_country          = substr($racecardid,0,2);
                $dd_mm_yyyy             = substr($racecardid,6,2)."/".substr($racecardid,4,2)."/"."20".substr($racecardid,2,2);
                $yyyy_mm_dd             = "20".substr($racecardid,2,2)."-".substr($racecardid,4,2)."-".substr($racecardid,6,2);
                $dayofweek              = date('D', strtotime( $yyyy_mm_dd));
                
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
                $country        = $arr_country[$short_country];
                
                $res_horse = $this->get_horseinfo_by_raceid($racecardid);
                $count_res_horse = count($res_horse);
                $str_res = "";
                $weight = "";
                $hdp    = "";
                if($count_res_horse > 0)
                {
                    // thuan fix agin at date 20/04/2015
                    for($i=0;$i < $count_res_horse;$i++)
                    {
                        if(isset($count_res_horse[$i]->Wgt))
                            $weight = $count_res_horse[$i]->Wgt;
                        if(isset($count_res_horse[$i]->Hdp))
                            $hdp    = $count_res_horse[$i]->Hdp;
                        $str_res .= '<tr>
                                        <td width="30%" align="center" bgcolor="#00a2e8" style="color:white;">'.($i+1).'</td>
                                        <td width="35%" align="center">'.$res_horse[$i]->Wgt.'</td>
                                        <td width="35%" align="center">'.$res_horse[$i]->Hdp.'</td>
                                    </tr>';
                    }
                }
                
                //return
                $arr    = array(
                                "raceno"            => $raceno,
                                //"country"           => $country,//$short_country
                                "country"           => $short_country,
                                "dd_mm_yyyy"        => $dd_mm_yyyy,
                                "dayofweek"         => $arr_week[$dayofweek],
                                //"str_res"           => $str_res,
                                "arr_weight"        => $res_horse
                                );
                return $arr;
            }   
        }
    }
    public function get_horseinfo_by_raceid($raceid)
    {
        $sql  = "SELECT Wgt,Hdp  FROM `horseinfo` 
                 WHERE `RaceCardID` = '$raceid' 
                 AND `Wgt` != '' 
                 AND `Hdp` != ''";
        $query=$this->db->query($sql)->result();
        return $query;
    }
}