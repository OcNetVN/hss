<?php
class M_result_detail extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function loadresultdetail(){
        if(isset($_POST['country']) && isset($_POST['day']))
        {
            $country    = $_POST['country'];
            $day        = $_POST['day'];
            $str_res    = "";
            if($country!="" && $day!="")
            {
                $dd_mm_yyyy         = substr($day,-2)."/".substr($day,4,2)."/".substr($day,0,4);
                $yyyy_mm_dd         = substr($day,0,4)."-".substr($day,4,2)."-".substr($day,-2);
                $dayofweek          = date('D', strtotime( $yyyy_mm_dd));
                $distinctraceid     = $this->get_distict_racecardid_by_country_day($country,$day);
                foreach ($distinctraceid as $row_raceid)
                {
                    $raceboard_MY = $this->get_race_by_raceid_vs_raceboard($row_raceid->RaceCardId,"MAL");
                    $raceboard_SG = $this->get_race_by_raceid_vs_raceboard($row_raceid->RaceCardId,"SIN");
                    
                    $str_res .= '<table border="2" cellspacing="0" cellpadding="0" width="100%" style="font-size:XX-Large;">
                                	<tbody>
                                        <tr>
                                            <td width="20%" bgcolor="#9966CC">
                                            	Race '.(int)substr($row_raceid->RaceCardId,-2).'
                                            </td>
                                            <td width="80%" bgcolor="#9966CC">
                                            	'.$dayofweek.' Ipoh '.$dd_mm_yyyy.'
                                            </td>
                                      </tr>
                                    </tbody>
                                </table>
                                <table border="2" width="100%" cellspacing="0" cellpadding="0" style="font-size:XX-Large;">
                                  <tr>
                                    <td align="center" bgcolor="#999999">No</td>
                                    <td align="center" bgcolor="#999999">Lenght</td>
                                    <td colspan="2" align="center" bgcolor="#999999">RmWin Place</td>
                                    <td align="center" bgcolor="#999999">$Win</td>
                                    <td align="center" bgcolor="#999999">Place</td>
                                  </tr>
                                  <tr>
                                    <td align="center">'.$raceboard_MY->FirstHorse.'</td>
                                    <td align="center">'.$raceboard_MY->FirstLength.'</td>
                                    <td align="center">'.$raceboard_MY->FirstWin.'</td>
                                    <td align="center">'.$raceboard_MY->FirstPlace.'</td>
                                    <td align="center" bgcolor="#6699CC">'.$raceboard_SG->FirstWin.'</td>
                                    <td align="center" bgcolor="#6699CC">'.$raceboard_SG->FirstPlace.'</td>
                                  </tr>
                                  <tr>
                                    <td align="center">'.$raceboard_MY->SecondHorse.'</td>
                                    <td align="center">'.$raceboard_MY->SecondLength.'</td>
                                    <td align="center">&nbsp;</td>
                                    <td align="center">'.$raceboard_MY->SecondPlace.'</td>
                                    <td align="center" bgcolor="#6699CC">&nbsp;</td>
                                    <td align="center" bgcolor="#6699CC">'.$raceboard_SG->SecondPlace.'</td>
                                  </tr>
                                  <tr>
                                    <td align="center">'.$raceboard_MY->ThirdHorse.'</td>
                                    <td align="center">'.$raceboard_MY->Thirdlength.'</td>
                                    <td align="center">&nbsp;</td>
                                    <td align="center">'.$raceboard_MY->ThirdPlace.'</td>
                                    <td align="center" bgcolor="#6699CC">&nbsp;</td>
                                    <td align="center" bgcolor="#6699CC">'.$raceboard_SG->ThirdPlace.'</td>
                                  </tr>
                                  <tr>
                                    <td align="center">'.$raceboard_MY->FourthHorse.'</td>
                                    <td align="center">'.$raceboard_MY->FourthLength.'</td>
                                    <td align="center">&nbsp;</td>
                                    <td align="center">'.$raceboard_MY->FourthPlace.'</td>
                                    <td align="center" bgcolor="#6699CC">&nbsp;</td>
                                    <td align="center" bgcolor="#6699CC">'.$raceboard_SG->FourthPlace.'</td>
                                  </tr>
                                </table>
                                <table border="2" cellspacing="0" cellpadding="0" width="100%" style="font-size:XX-Large;">
                                	<tbody>
                                        <tr>
                                            <td width="20%" align="center">
                                            	Timing
                                            </td>
                                            <td width="50%" align="center" >
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
                                <table width="100%" border="2" cellspacing="0" cellpadding="0"  style="font-size:XX-Large;">
                                  <tr>
                                    <td width="40%" align="left"> QN/Forecast</td>
                                    <td width="30%" align="center">'.$raceboard_MY->Forecast1.'</td>
                                    <td width="15%" align="center">'.$raceboard_MY->Forecast2.'</td>
                                    <td width="15%" align="center" bgcolor="#6699CC">'.$raceboard_SG->Forecast2.'</td>
                                  </tr>
                                  <tr>
                                    <td rowspan="3" align="left"> QP <br /> Place Forecast</td>
                                    <td align="center">'.$raceboard_MY->QPS11.'</td>
                                    <td align="center">'.$raceboard_MY->QPS12.'</td>
                                    <td align="center" bgcolor="#6699CC">'.$raceboard_SG->QPS12.'</td>
                                  </tr>
                                  <tr>
                                    <td align="center">'.$raceboard_MY->QPS21.'</td>
                                    <td align="center">'.$raceboard_MY->QPS22.'</td>
                                    <td align="center" bgcolor="#6699CC">'.$raceboard_SG->QPS22.'</td>
                                  </tr>
                                  <tr>
                                    <td align="center">'.$raceboard_MY->QPS31.'</td>
                                    <td align="center">'.$raceboard_MY->QPS32.'</td>
                                    <td align="center" bgcolor="#6699CC">'.$raceboard_SG->QPS32.'</td>
                                  </tr>
                                  <tr>
                                    <td align="left"> TF/Tierce</td>
                                    <td align="center">'.$raceboard_MY->Tierce1.'</td>
                                    <td align="center">'.$raceboard_MY->Tierce2.'</td>
                                    <td align="center" bgcolor="#6699CC">'.$raceboard_SG->Tierce2.'</td>
                                  </tr>
                                  <tr>
                                    <td align="left"> TR/Trio</td>
                                    <td align="center">'.$raceboard_MY->Trio1.'</td>
                                    <td align="center">'.$raceboard_MY->Trio2.'</td>
                                    <td align="center" bgcolor="#6699CC">'.$raceboard_SG->Trio2.'</td>
                                  </tr>
                                  <tr>
                                    <td align="left"> QT/Quartet</td>
                                    <td align="center">'.$raceboard_MY->Quartet1.'</td>
                                    <td align="center">'.$raceboard_MY->Quartet2.'</td>
                                    <td align="center" bgcolor="#6699CC" style="font-size:Large;">'.$raceboard_SG->Quartet2.'</td>
                                  </tr>
                                  <tr>
                                    <td align="left"> Quadro</td>
                                    <td align="center">'.$raceboard_MY->Quadro1.'</td>
                                    <td align="center">'.$raceboard_MY->Quadro2.'</td>
                                    <td align="center" bgcolor="#6699CC" style="font-size:Large;">'.$raceboard_SG->Quadro2.'</td>
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