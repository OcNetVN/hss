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
                 $arr_item = array(
                                "Race"=>$this->lang->line(LANG_RACE_RACE),
                                "Scratching"=>$this->lang->line(LANG_Scratching),
                                "EarlyTicket"=>$this->lang->line(LANG_EARLY_TICKET),
                                "MasterChoice"=>$this->lang->line(LANG_MaterChoice),
                                "BatamTic"=>$this->lang->line(LANG_BatamTic),
                               
                                );
            $str_res            = "";
            $str_country_day    = "";
            if($country!="" && $day!="")
            {
                $dd_mm_yyyy         = substr($day,-2)."/".substr($day,4,2)."/".substr($day,0,4);
                $yyyy_mm_dd         = substr($day,0,4)."-".substr($day,4,2)."-".substr($day,-2);
                $dayofweek          = date('D', strtotime( $yyyy_mm_dd));
                $str_country_day    = $arr_country[$country]." ".$dd_mm_yyyy." ".$arr_week[$dayofweek];
                
                $arr_scr            = $this->get_scr_by_country_day($country,$day);
                $i                  = 1;
                foreach ($arr_scr as $row_scr)
                {
                    $str_res        .= '<tr > <td colspan="3">
                                            '.$arr_item['Race'].' :<span style="color:red">'.$row_scr->RaceNo.' </span><br/>
                                            '.$arr_item['Scratching'].': '.$row_scr->Scratching.'<br/>
                                            '.$arr_item['EarlyTicket'].': '.$row_scr->EarlyTicket.'<br/>
                                            '.$arr_item['MasterChoice'].': '.$row_scr->MasterChoice.'<br/>
                                            '.$arr_item['BatamTic'].': '.$row_scr->BatamTic.'<br/>
                                          </td></tr>';
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
        $sql="SELECT * FROM `scr` WHERE `RaceCountry` = '$country' AND `RaceDay` = '$day' AND ( LENGTH(`EarlyTicket`) >= 0 OR LENGTH(`Scratching`) >= 0)";
        $query=$this->db->query($sql)->result();
        
        //func_print_test($query) ;
        return $query;
    }
}