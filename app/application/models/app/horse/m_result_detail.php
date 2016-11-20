<?php
class M_result_detail extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function loadresultdetail(){
        $arr_week = array(
                                "Mon"=>$this->lang->line(LANG_TIME_MON),
                                "Tue"=>$this->lang->line(LANG_TIME_TUE),
                                "Wed"=>$this->lang->line(LANG_TIME_WED),
                                "Thu"=>$this->lang->line(LANG_TIME_THU),
                                "Fri"=>$this->lang->line(LANG_TIME_FRI),
                                "Sat"=>$this->lang->line(LANG_TIME_SAT),
                                "Sun"=>$this->lang->line(LANG_TIME_SUN),
                                );
        if(isset($_POST['country']) && isset($_POST['day']))
        {
            $country    = $_POST['country'];
            $day        = $_POST['day'];
            $str_res    = "";
            $str_firstlenght    = "";
            $str_sencondlenght  = "";
            $str_thirdlenght    = "";
            $str_fourthlenght   = "";
            if($country!="" && $day!="")
            {
                $dd_mm_yyyy         = substr($day,-2)."/".substr($day,4,2)."/".substr($day,0,4);
                $yyyy_mm_dd         = substr($day,0,4)."-".substr($day,4,2)."-".substr($day,-2);
                $dayofweek          = date('D', strtotime( $yyyy_mm_dd));
                $dw = $arr_week[$dayofweek];
                $distinctraceid     = $this->get_distict_racecardid_by_country_day($country,$day);
                foreach ($distinctraceid as $row_raceid)
                {
                    $raceboard_MY = $this->get_race_by_raceid_vs_raceboard($row_raceid->RaceCardId,"MAL");
                    $raceboard_SG = $this->get_race_by_raceid_vs_raceboard($row_raceid->RaceCardId,"SIN");
                     if($this->lang->line(LANG_EN) == "English")
                     { 
                        $str_firstlenght    = $raceboard_MY->FirstLength;
                        $str_sencondlenght  = $raceboard_MY->SecondLength;
                        $str_thirdlenght    = $raceboard_MY->Thirdlength;
                        $str_fourthlenght   = $raceboard_MY->FourthLength;
                     }
                     else
                     {
                        $str_firstlenght    = $raceboard_MY->FirstLengthCN;
                        $str_sencondlenght  = $raceboard_MY->SecondLengthCN;
                        $str_thirdlenght    = $raceboard_MY->ThirdlengthCN;
                        $str_fourthlenght   = $raceboard_MY->FourthLengthCN;    
                     }
                    
                    $str_res .= '<table border="1" cellspacing="0" cellpadding="0" width="100%" style="font-size:16px;font-weight:bold;">
                                	<tbody>
                                        <tr>
                                            <td width="20%" bgcolor="#9999FF">
                                            	 '.$this->lang->line(LANG_RACE_RACE) .' '.(int)substr($row_raceid->RaceCardId,-2).'
                                            </td>
                                            <td width="80%" bgcolor="#9999FF">
                                            	'.$dw.'  '.$dd_mm_yyyy.'
                                            </td>
                                      </tr>
                                    </tbody>
                                </table>
                                <table border="1" width="100%" cellspacing="0" cellpadding="0" style="font-size:16px;font-weight:bold;">
                                  <tr>
                                    <td align="center" bgcolor="#999999" style="color:whhite;">'.$this->lang->line(LANG_RESULT_NO).'</td>
                                    <td align="center" bgcolor="#999999" style="color:whhite;">'.$this->lang->line(LANG_RESULT_LENGTH).'</td>
                                    <td colspan="2" align="center" bgcolor="#999999" style="color:whhite;">RM '.$this->lang->line(LANG_RESULT_WIN).' '. $this->lang->line(LANG_RESULT_PLACE).'</td>
                                    <td align="center" bgcolor="#999999" style="color:blue;">$ '. $this->lang->line(LANG_RESULT_WIN).'</td>
                                    <td align="center" bgcolor="#999999" style="color:blue;">'. $this->lang->line(LANG_RESULT_PLACE).'</td>
                                  </tr>
                                  <tr>
                                    <td align="center" style="color:red;">'.$raceboard_MY->FirstHorse.'</td>

                                    <td align="center">'.$str_firstlenght.'</td>
                                    <td align="center">'.intval($raceboard_MY->FirstWin).'</td>
                                    <td align="center">'.intval($raceboard_MY->FirstPlace).'</td>
                                    <td align="center" bgcolor="#00CCFF">'.intval($raceboard_SG->FirstWin).'</td>
                                    <td align="center" bgcolor="#00CCFF">'.intval($raceboard_SG->FirstPlace).'</td>
                                  </tr>
                                  <tr>
                                    <td align="center" style="color:red;">'.$raceboard_MY->SecondHorse.'</td>
                                    <td align="center">'.$str_sencondlenght.'</td>
                                    <td align="center">'.intval($raceboard_MY->SecondWin).'</td>
                                    <td align="center">'.intval($raceboard_MY->SecondPlace).'</td>
                                    <td align="center" bgcolor="#00CCFF">&nbsp;</td>
                                    <td align="center" bgcolor="#00CCFF">'.intval($raceboard_SG->SecondPlace).'</td>
                                  </tr>
                                  <tr>
                                    <td align="center" style="color:red">'.$raceboard_MY->ThirdHorse.'</td>
                                    <td align="center">'.$str_thirdlenght.'</td>
                                    <td align="center">'.intval($raceboard_MY->ThirdWin).'</td>
                                    <td align="center">'.intval($raceboard_MY->ThirdPlace).'</td>
                                    <td align="center" bgcolor="#00CCFF">&nbsp;</td>
                                    <td align="center" bgcolor="#00CCFF">'.intval($raceboard_SG->ThirdPlace).'</td>
                                  </tr>
                                  <tr>
                                    <td align="center" style="color:red">'.$raceboard_MY->FourthHorse.'</td>
                                    <td align="center">'.$str_fourthlenght.'</td>
                                    <td align="center">'.intval($raceboard_MY->FourthWin).'</td>
                                    <td align="center">'.intval($raceboard_MY->FourthPlace).'</td>
                                    <td align="center" bgcolor="#00CCFF">&nbsp;</td>
                                    <td align="center" bgcolor="#00CCFF">'.intval($raceboard_SG->FourthPlace).'</td>
                                  </tr>
                                </table>
                                <table border="2" cellspacing="0" cellpadding="0" width="100%" style="font-size:16px;font-weight:bold;">
                                	<tbody>
                                        <tr>
                                            <td width="20%" align="center">
                                            	'. $this->lang->line(LANG_RESULT_TIMING).'
                                            </td>
                                            <td width="48%" align="center" >
                                            	'.$raceboard_MY->Timing.'
                                            </td>
                                            <td width="15%" align="center" bgcolor="#999999">
                                            	RM
                                            </td>
                                            <td width="15%" align="center" bgcolor="#999999" >
                                            	$
                                            </td>
                                      </tr>
                                    </tbody>
                                </table>
                                <table width="100%" border="2" cellspacing="0" cellpadding="0"  style="font-size:16px;font-weight:bold;">
                                  <tr>
                                    <td width="40%" align="left"> '. $this->lang->line(LANG_RESULT_QN_FORECASR).'</td>
                                    <td width="28%" align="center">'.$raceboard_MY->Forecast1.'</td>
                                    <td width="15%" align="center">'.$raceboard_MY->Forecast2.'</td>
                                    <td width="15%" align="center" bgcolor="#00CCFF">'.$raceboard_SG->Forecast2.'</td>
                                  </tr>
                                  <tr>
                                    <td rowspan="3" align="left"> '. $this->lang->line(LANG_RESULT_QP_PLACE).'</td>
                                    <td align="center">'.$raceboard_MY->QPS11.'</td>
                                    <td align="center">'.$raceboard_MY->QPS12.'</td>
                                    <td align="center" bgcolor="#00CCFF">'.$raceboard_SG->QPS12.'</td>
                                  </tr>
                                  <tr>
                                    <td align="center">'.$raceboard_MY->QPS21.'</td>
                                    <td align="center">'.$raceboard_MY->QPS22.'</td>
                                    <td align="center" bgcolor="#00CCFF">'.$raceboard_SG->QPS22.'</td>
                                  </tr>
                                  <tr>
                                    <td align="center">'.$raceboard_MY->QPS31.'</td>
                                    <td align="center">'.$raceboard_MY->QPS32.'</td>
                                    <td align="center" bgcolor="#00CCFF">'.$raceboard_SG->QPS32.'</td>
                                  </tr>
                                  <tr>
                                    <td align="left"> '. $this->lang->line(LANG_RESULT_TF_TIERCE).'</td>
                                    <td align="center">'.$raceboard_MY->Tierce1.'</td>
                                    <td align="center">'.$raceboard_MY->Tierce2.'</td>
                                    <td align="center" bgcolor="#00CCFF">'.$raceboard_SG->Tierce2.'</td>
                                  </tr>
                                  <tr>
                                    <td align="left"> '. $this->lang->line(LANG_RESULT_TR_TRIO).'</td>
                                    <td align="center">'.$raceboard_MY->Trio1.'</td>
                                    <td align="center">'.$raceboard_MY->Trio2.'</td>
                                    <td align="center" bgcolor="#00CCFF">'.$raceboard_SG->Trio2.'</td>
                                  </tr>
                                  <tr>
                                    <td align="left"> '. $this->lang->line(LANG_RESULT_QT_QUARTET).'</td>
                                    <td align="center">'.$raceboard_MY->Quartet1.'</td>
                                    <td align="center">'.$raceboard_MY->Quartet2.'</td>
                                    <td align="center" bgcolor="#00CCFF" >'.$raceboard_SG->Quartet2.'</td>
                                  </tr>
                                  <tr>
                                    <td align="left"> '. $this->lang->line(LANG_RESULT_QUADRO).'</td>
                                    <td align="center">'.$raceboard_MY->Quadro1.'</td>
                                    <td align="center">'.$raceboard_MY->Quadro2.'</td>
                                    <td align="center" bgcolor="#00CCFF" >'.$raceboard_SG->Quadro2.'</td>
                                  </tr>
                                </table>';
                    
                }
            }
            //return
            $arr=array("str_res"=>$str_res);
            return $arr;
        }
        
    }
    
    public function get_distict_racecardid_by_country_day($country, $day)
    {
        $sql="SELECT DISTINCT RaceCardId FROM `raceresult` WHERE `RaceCountry` = '$country' AND `RaceDay` = '$day'";
        $query=$this->db->query($sql)->result();
        return $query;
    }
    public function get_race_by_raceid_vs_raceboard($raceid,$RaceBoard)
    {
        $sql="SELECT * FROM `raceresult` WHERE `RaceCardId` = '$raceid' AND `RaceBoard` = '$RaceBoard'";
        $query=$this->db->query($sql)->row();
        return $query;
    }
}