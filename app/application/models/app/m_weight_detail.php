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
            $racecardid             = $_POST['racecardid']; //MY15030902
            if(strlen($racecardid) == 10)
            {
                $raceno                 = (int)substr($racecardid,-2); 
                $short_country          = substr($racecardid,0,2);
                $dd_mm_yyyy             = substr($racecardid,-4,2)."/".substr($racecardid,6,2)."/"."20".substr($racecardid,2,2);
                $yyyy_mm_dd             = "20".substr($racecardid,2,2)."-".substr($racecardid,6,2)."-".substr($racecardid,-4,2);
                $dayofweek              = date('D', strtotime( $yyyy_mm_dd));
                
                $arr_country = array(
                                        "MY"=>"Malaysia",
                                        "HK"=>"HongKong",
                                        "MC"=>"Macau",
                                        "SG"=>"Singapore",
                                        "SA"=>"Sounth Africa",
                                        "AU"=>"Australia",
                                        "EU"=>"Europe",
                                        );
                $country        = $arr_country[$short_country];
                
                $res_horse = $this->get_horseinfo_by_raceid($racecardid);
                $count_res_horse = count($res_horse);
                $str_res = "";
                if($count_res_horse>0)
                {
                    if($count_res_horse <=10) //have <= 10 horses
                    {
                        for($i = 0;$i <= 9; $i++)
                        {
                            if($i < $count_res_horse) //still information horses
                            {
                                $str_res .= '<tr>
                                            <td width="10%" align="center">'.($i+1).'</td>
                                            <td width="16%" align="center">'.$res_horse[$i]->Wgt.'</td>
                                            <td width="16%" align="center">'.$res_horse[$i]->Hdp.'</td>
                                            <td width="4%" align="center">&nbsp;</td>
                                            <td width="10%" align="center">'.($i+11).'</td>
                                            <td width="16%" align="center">&nbsp;</td>
                                            <td width="16%" align="center">&nbsp;</td>
                                          </tr>';
                            }
                            else ////no information horses
                            {
                                $str_res .= '<tr>
                                            <td width="10%" align="center">'.($i+1).'</td>
                                            <td width="16%" align="center">&nbsp;</td>
                                            <td width="16%" align="center">&nbsp;</td>
                                            <td width="4%" align="center">&nbsp;</td>
                                            <td width="10%" align="center">'.($i+11).'</td>
                                            <td width="16%" align="center">&nbsp;</td>
                                            <td width="16%" align="center">&nbsp;</td>
                                          </tr>';
                            }
                        }
                    }
                    else //have >10 horses
                    {
                        for($i = 0;$i <= 9; $i++)
                        {
                                $i10 = $i+10;
                                $str_res .= '<tr>
                                            <td width="10%" align="center">'.($i+1).'</td>
                                            <td width="16%" align="center">'.$res_horse[$i]->Wgt.'</td>
                                            <td width="16%" align="center">'.$res_horse[$i]->Hdp.'</td>
                                            <td width="4%" align="center">&nbsp;</td>
                                            <td width="10%" align="center">'.($i+11).'</td>
                                            
                                            <td width="16%" align="center">';
                                                if(isset($res_horse[$i10]->Wgt))
                                                    $str_res .= $res_horse[$i10]->Wgt;
                                                else
                                                    $str_res .= '&nbsp;';
                                            $str_res .= '</td>
                                            <td width="16%" align="center">';
                                                if(isset($res_horse[$i10]->Hdp))
                                                    $str_res .= $res_horse[$i10]->Hdp;
                                                else
                                                    $str_res .= '&nbsp;';
                                            $str_res .= '</td>
                                          </tr>';
                        }
                    }
                }
                
                //return
                $arr    = array(
                                "raceno"            => $raceno,
                                "country"           => $country,
                                "dd_mm_yyyy"        => $dd_mm_yyyy,
                                "dayofweek"         => $dayofweek,
                                "str_res"           => $str_res,
                                );
                return $arr;
            }   
        }
    }
    public function get_horseinfo_by_raceid($raceid)
    {
        $sql="SELECT * FROM `horseinfo` WHERE `RaceCardID` = '$raceid'";
        $query=$this->db->query($sql)->result();
        return $query;
    }
}