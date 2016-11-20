<?php
class M_scrat_et_detail extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function load_scrat_et_detail(){
        if(isset($_POST['country']) && isset($_POST['day']))
        {
            $country    = $_POST['country'];
            $day        = $_POST['day'];
            $arr_country = array(
                                "MY"=>"Malaysia",
                                "HK"=>"HongKong",
                                "MC"=>"Macau",
                                "SG"=>"Singapore",
                                "SA"=>"Sounth Africa",
                                "AU"=>"Australia",
                                "EU"=>"Europe",
                                );
            $str_res            = "";
            $str_country_day    = "";
            if($country!="" && $day!="")
            {
                $dd_mm_yyyy         = substr($day,-2)."/".substr($day,4,2)."/".substr($day,0,4);
                $yyyy_mm_dd         = substr($day,0,4)."-".substr($day,4,2)."-".substr($day,-2);
                $dayofweek          = date('D', strtotime( $yyyy_mm_dd));
                $str_country_day    = $arr_country[$country]." ".$dd_mm_yyyy." ".$dayofweek;
                
                $arr_scr            = $this->get_scr_by_country_day($country,$day);
                $i                  = 1;
                foreach ($arr_scr as $row_scr)
                {
                    $str_res        .= '<tr>
                                            <td align="center">'.$i.'</td>
                                            <td align="center">'.$row_scr->EarlyTicket.'</td>
                                            <td align="center">'.$row_scr->Scratching.'</td>
                                          </tr>';
                    $i++;
                }
            }
            //return
            $arr=array("str_res"=>$str_res,
                        "str_country_day" => $str_country_day);
            return $arr;
        }
        
    }
    
    public function get_scr_by_country_day($country, $day)
    {
        $sql="SELECT * FROM `scr` WHERE `RaceCountry` = '$country' AND `RaceDay` = '$day' AND ( LENGTH(`EarlyTicket`) > 0 OR LENGTH(`Scratching`) > 0)";
        $query=$this->db->query($sql)->result();
        return $query;
    }
}