<?php
class M_my_play_number extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
   
    public function SaveMyPlay()
    {
        $txtday = $_POST['txtday'];
        $txtday = explode("-", $txtday);
        $strdate = $txtday[2].$txtday[1].$txtday[0];
        $type   = $_POST['type'];
        $No1    = $_POST['No1'];
        $No2    = $_POST['No2'];
        $No3    = $_POST['No3'];
        $No4    = $_POST['No4'];
        $No5    = $_POST['No5'];
        $str_No1 = $_POST['strNo1'];
        $str_No2 = $_POST['strNo2'];
        $str_No3 = $_POST['strNo3'];
        $str_No4 = $_POST['strNo4'];
        $str_No5 = $_POST['strNo5'];
        $result = "";
        $serialNumber = "";
        if(isset($_SESSION['serialNumber']))
            $serialNumber = $_SESSION['serialNumber'];
        $query  = $this->get_tbl_by_txday($strdate,$type,$serialNumber);
        if(count($query) != 0)
        {
            $sql = "UPDATE  `playnumber` SET `NoFrist`='$No1',`NoTwo`='$No2',`NoThree`='$No3',
                                                 `NoFour`='$No4',`NoFine`='$No5',`NoForFrist`='$str_No1',
                                                 `NoForTwo`='$str_No2',`NoForThree`='$str_No3',
                                                 `NoForFour`='$str_No4',`NoForFine`='$str_No5'                                               
                                            WHERE `txday`='$strdate' AND `LotteryType`='$type' AND `SeriaNumber` = '$serialNumber'";
            $req = $this->db->query($sql);
            if($req)
                $result = 1;

        }
        else
        {
            if($serialNumber != "" || $serialNumber != " ")
            {
                $sql = "INSERT INTO `playnumber`(`txday`,`LotteryType`,`NoFrist`,`NoTwo`,
                                             `NoThree`,`NoFour`,`NoFine`,`NoForFrist`,
                                             `NoForTwo`,`NoForThree`,`NoForFour`,`NoForFine`,`SeriaNumber`)
                                      VALUES('$strdate','$type','$No1','$No2','$No3','$No4','$No5',
                                             '$str_No1','$str_No2','$str_No3','$str_No4','$str_No5','$serialNumber')";
                $req = $this->db->query($sql);
                if($req)
                {
                   $result = 1; 
                }     
            } 
        }

        if($result = 1 || $result = "1")
        {
            // check my play number with lottery ngày hiện tại 08/07/2015
            $this->LoadSerialNumberWin(); 
            //print_r($resul);
        }

        $arr = array('result'=>$result);
        return $arr;

    }

    public function LoadSerialNumberWin()
    {
        $txtdateNow     = date("Y").date("m").date("d");
        $date_          = date("d-m-Y");
        $myplay         = $this->checkExitDateType($txtdateNow,"playnumber");
        $l_serial       = array();
        $l_type         = array();
        $l_meage        = array();
        $l_links        = array();
        $str_myplay     = "";
        $link_lott      = "";
        if(count($myplay) != 0)
        {
            for($i=0; $i<count($myplay); $i++)
            {
                $serialNumber = $myplay[$i]->SeriaNumber;
                $type         = $myplay[$i]->LotteryType;
                $NoFist       = $myplay[$i]->NoFrist;
                $NoTwo        = $myplay[$i]->NoTwo;
                $NoThree      = $myplay[$i]->NoThree;
                $NoFour       = $myplay[$i]->NoFour;
                $NoFine       = $myplay[$i]->NoFine;
                $NoToToFist   = $myplay[$i]->NoForFrist;
                $NoToToTwo    = $myplay[$i]->NoForTwo;
                $NoToToThree  = $myplay[$i]->NoForThree;
                $NoToToFour   = $myplay[$i]->NoForFour;
                $NoToToFine   = $myplay[$i]->NoForFine;
                 switch ($type) {
                     case 'damacai':
                            $list_Damacai = $this->checkExitDate($txtdateNow,'lot_damacai');
                            if(count($list_Damacai) != 0)
                            {
                                $_1st         = $list_Damacai["1_3D_1st_Price"];
                                $_2nd         = $list_Damacai["1_3D_2nd_Price"];
                                $_3rd         = $list_Damacai["1_3D_2nd_Price"];
                                $_Specail     = $list_Damacai["Special"];
                                $_Consolation = $list_Damacai["Consolation"];
                                //$draw_no      = $list_Damacai["Consolation"];
                                // 1 first
                                if($NoFist == $_1st || $NoTwo == $_1st || $NoThree == $_1st || $NoFour == $_1st || $NoFine == $_1st)
                                {
                                   array_push($l_serial,$serialNumber);
                                   array_push($l_type, $type);
                                }
                                if($NoFist == $_2nd || $NoTwo == $_2nd || $NoThree == $_2nd || $NoFour == $_2nd || $NoFine == $_2nd)
                                {
                                    array_push($l_serial,$serialNumber);
                                    array_push($l_type, $type);
                                }

                                if($NoFist == $_3rd || $NoTwo == $_3rd || $NoThree == $_3rd || $NoFour == $_3rd || $NoFine == $_3rd)
                                {
                                    array_push($l_serial,$serialNumber);
                                    array_push($l_type, $type);
                                }

                                $arr_Special          = explode("|",$_Specail);
                                for($j=0;$j<count($arr_Special);$j++)
                                {
                                    if($NoFist == $arr_Special[$j] || $NoTwo == $arr_Special[$j] || $NoThree == $arr_Special[$j] || $NoFour == $arr_Special[$j] || $NoFine == $arr_Special[$j])
                                    {
                                        array_push($l_serial,$serialNumber);
                                        array_push($l_type, $type);
                                    }
                                }

                                $arr_consolation          = explode("|",$_Consolation);
                                for($h=0;$h<count($arr_consolation);$h++)
                                {
                                    if($NoFist == $arr_consolation[$h] || $NoTwo == $arr_consolation[$h] || $NoThree == $arr_consolation[$h] || $NoFour == $arr_Special[$h] || $NoFine == $arr_Special[$h] )
                                    {
                                        array_push($l_serial,$serialNumber);
                                        array_push($l_type, $type);
                                    } 
                                }

                                $str_myplay = "YOUR PLAY NO HAS WON.<br/>";
                                $str_myplay .= "(DAMACAI 4D) ".$date_;
                                array_push($l_meage,$str_myplay);

                                $link_lott = base_url("/app/lottry/damacaionetree");
                                array_push($l_links,$link_lott);

                            }
                         break;
                     case 'magnum':
                            $list_Magnum  = $this->checkExitDate($txtdateNow,'lot_magnum');
                            if(count($list_Magnum) != 0)
                            {
                                $_1st         = $list_Magnum["4D_1st_Price"];
                                $_2nd         = $list_Magnum["4D_2nd_Price"];
                                $_3rd         = $list_Magnum["4D_3rd_Price"];
                                $_Specail     = $list_Magnum["Special"];
                                $_Consolation = $list_Magnum["Consolation"];
                                if($NoFist == $_1st || $NoTwo == $_1st || $NoThree == $_1st || $NoFour == $_1st || $NoFine == $_1st)
                                {
                                   array_push($l_serial,$serialNumber);
                                   array_push($l_type, $type);
                                }
                                if($NoFist == $_2nd || $NoTwo == $_2nd || $NoThree == $_2nd || $NoFour == $_2nd || $NoFine == $_2nd)
                                {
                                    array_push($l_serial,$serialNumber);
                                    array_push($l_type, $type);
                                }

                                if($NoFist == $_3rd || $NoTwo == $_3rd || $NoThree == $_3rd || $NoFour == $_3rd || $NoFine == $_3rd)
                                {
                                    array_push($l_serial,$serialNumber);
                                    array_push($l_type, $type);
                                }

                                $arr_Special          = explode("|",$_Specail);
                                for($j=0;$j<count($arr_Special);$j++)
                                {
                                    if($NoFist == $arr_Special[$j] || $NoTwo == $arr_Special[$j] || $NoThree == $arr_Special[$j] || $NoFour == $arr_Special[$j] || $NoFine == $arr_Special[$j])
                                    {
                                        array_push($l_serial,$serialNumber);
                                        array_push($l_type, $type);
                                    }
                                }

                                $arr_consolation          = explode("|",$_Consolation);
                                for($h=0;$h<count($arr_consolation);$h++)
                                {
                                    if($NoFist == $arr_consolation[$h] || $NoTwo == $arr_consolation[$h] || $NoThree == $arr_consolation[$h] || $NoFour == $arr_Special[$h] || $NoFine == $arr_Special[$h] )
                                    {
                                        array_push($l_serial,$serialNumber);
                                        array_push($l_type, $type);
                                    } 
                                }

                                $str_myplay = "YOUR PLAY NO HAS WON.<br/>";
                                $str_myplay .= "(MAGNUM 4D) ".$date_;
                                array_push($l_meage,$str_myplay);

                                $link_lott = base_url("/app/lottry/magnumfourdjackpot");
                                array_push($l_links,$link_lott);
                            }
                         break;
                     case 'toto':
                                $list_toto  = $this->checkExitDate($txtdateNow,'lot_toto4d');
                                if(count($list_toto) > 0)
                                {
                                    $_1st         = $list_toto["ST_1st_Price"];
                                    $_2nd         = $list_toto["ST_2nd_Price"];
                                    $_3rd         = $list_toto["ST_3rd_Price"];
                                    $_Specail     = $list_toto["Special"];
                                    $_Consolation = $list_toto["Consolation"];
                                    $Grand        = $list_toto["Mega"];  
                                    $superme      = $list_toto["Power"];  
                                    $powerme      = $list_toto["Super"]; 
                                     // Sin ToTo No1
                                    if($Grand != "")
                                    {
                                        $_GrandToTo      = explode("|", $Grand);
                                        $_GrandToTo      = array_filter($_GrandToTo);
                                    }
                                    if($superme !=  "")
                                    {
                                        $_SupermeToto    = explode("|", $superme);
                                        $_SupermeToto    = array_filter($_SupermeToto);
                                    }
                                    if($powerme != "")
                                    {
                                        $_PowermeToto    = explode("|", $powerme);
                                        $_PowermeToto    = array_filter($_PowermeToto);
                                    }
                                    
                                    if($NoToToFist != "" || $NoToToFist != " " && $Grand != "" || $superme != "" || $powerme != "")
                                    {
                                        $NoToToFist      = explode("|", $NoToToFist);
                                        $NoToToFist      = array_filter($NoToToFist);
                                        
                                        // compare item two array return one array other item same with two array 
                                        if((count($NoToToFist) > 0 && count($_GrandToTo)>0) ||(count($NoToToFist) > 0 && count($_SupermeToto) >0) ||( count($NoToToFist) > 0 && count($_PowermeToto)>0))
                                        {
                                            $result_no1  = array_diff($NoToToFist, $_GrandToTo);
                                            $result_No1_Sup = array_diff($NoToToFist,$_SupermeToto);
                                            $result_No1_Power =  array_diff($NoToToFist,$_PowermeToto);
                                            if(count($result_no1) < 4 || count($result_No1_Sup) < 4 || count($result_No1_Power)< 4)
                                            {
                                              array_push($l_serial,$serialNumber); 
                                            }
                                        }                           
                                    }

                                    if($NoToToTwo != "" || $NoToToTwo != " " && $Grand != "" || $superme != "" || $powerme != "")
                                    {
                                        $NoToToTwo        = explode("|", $NoToToTwo);
                                        $NoToToTwo        = array_filter($NoToToTwo);
                                        
                                        // compare item two array return one array other item same with two array 
                                        if((count($NoToToTwo)>0 && count($_GrandToTo)>0) ||(count($NoToToTwo)>0 && count($_SupermeToto) >0 )||(count($NoToToTwo)>0 && count($_PowermeToto)>0))
                                        {
                                            $result_no2  = array_diff($NoToToTwo, $_GrandToTo);
                                            $result_No2_Sup = array_diff($NoToToTwo,$_SupermeToto);
                                            $result_No2_Power =  array_diff($NoToToTwo,$_PowermeToto);
                                            if(count($result_no2) < 4 || count($result_No2_Sup) < 4 || count($result_No2_Power)< 4)
                                            {
                                              array_push($l_serial,$serialNumber);  
                                            } 
                                        } 
                                    }

                                    if($NoToToThree != "" || $NoToToThree != " " && $Grand != "" || $superme != "" || $powerme != "")
                                    {
                                        $NoToToThree      = explode("|", $NoToToThree);
                                        $NoToToThree      = array_filter($NoToToThree);
                                        
                                        // compare item two array return one array other item same with two array 
                                        if((count($NoToToThree)>0 && count($_GrandToTo)>0) ||(count($NoToToThree)>0 && count($_SupermeToto) >0 )||(count($NoToToThree)>0 && count($_PowermeToto)>0 ))
                                        {
                                            $result_no3       = array_diff($NoToToThree, $_GrandToTo);
                                            $result_No3_Sup   = array_diff($NoToToThree,$_SupermeToto);
                                            $result_No3_Power =  array_diff($NoToToThree,$_PowermeToto);
                                            if(count($result_no3) < 4 || count($result_No3_Sup) < 4 || count($result_No3_Power)< 4)
                                            {
                                              array_push($l_serial,$serialNumber);  
                                            } 
                                        }
                                        
                                    }

                                    if($NoToToFour != "" || $NoToToFour != " " && $Grand != "" || $superme != "" || $powerme != "")
                                    {
                                        $NoToToFour      = explode("|", $NoToToFour);
                                        $NoToToFour      = array_filter($NoToToFour);
                                        // compare item two array return one array other item same with two array 
                                        if((count($NoToToFour)>0 && count($_GrandToTo)>0 )||(count($NoToToFour)>0 && count($_SupermeToto) >0) ||(count($NoToToFour)>0 && count($_PowermeToto)>0))
                                        {
                                            $result_no4  = array_diff($NoToToFour, $_GrandToTo);
                                            $result_No4_Sup = array_diff($NoToToFour,$_SupermeToto);
                                            $result_No4_Power =  array_diff($NoToToFour,$_PowermeToto);
                                            if(count($result_no4) < 4 || count($result_No4_Sup) < 4 || count($result_No4_Power)< 4)
                                            {
                                              array_push($l_serial,$serialNumber);  
                                            } 
                                        }   
                                    }

                                    if($NoToToFine != "" || $NoToToFine != " " && $Grand != "" || $superme != "" || $powerme != "")
                                    {
                                        $NoToToFine      = explode("|", $NoToToFine);
                                        $NoToToFine      = array_filter($NoToToFine);
                                        // compare item two array return one array other item same with two array
                                        if(count($NoToToFine)>0 && count($_GrandToTo)>0 ||(count($NoToToFine)>0 && count($_SupermeToto) >0 )||(count($NoToToFine)>0 && count($_PowermeToto)>0) )
                                        {
                                            $result_no5         = array_diff($NoToToFine, $_GrandToTo);
                                            $result_No5_Sup     = array_diff($NoToToFine,$_SupermeToto);
                                            $result_No5_Power   =  array_diff($NoToToFine,$_PowermeToto);
                                            if(count($result_no5) < 4 || count($result_No5_Sup) < 4 || count($result_No5_Power) < 4)
                                            {
                                              array_push($l_serial,$serialNumber);  
                                            } 
                                        } 
                                        
                                    }

                                    if($NoFist == $_1st || $NoTwo == $_1st || $NoThree == $_1st || $NoFour == $_1st || $NoFine == $_1st)
                                    {
                                       array_push($l_serial,$serialNumber);
                                    }
                                    if($NoFist == $_2nd || $NoTwo == $_2nd || $NoThree == $_2nd || $NoFour == $_2nd || $NoFine == $_2nd)
                                    {
                                        array_push($l_serial,$serialNumber);
                                    }

                                    if($NoFist == $_3rd || $NoTwo == $_3rd || $NoThree == $_3rd || $NoFour == $_3rd || $NoFine == $_3rd)
                                    {
                                        array_push($l_serial,$serialNumber);
                                    }

                                    $arr_Special          = explode("|",$_Specail);
                                    for($j=0;$j<count($arr_Special);$j++)
                                    {
                                        if($NoFist == $arr_Special[$j] || $NoTwo == $arr_Special[$j] || $NoThree == $arr_Special[$j] || $NoFour == $arr_Special[$j] || $NoFine == $arr_Special[$j])
                                        {
                                            array_push($l_serial,$serialNumber);
                                        }
                                    }

                                    $arr_consolation          = explode("|",$_Consolation);
                                    for($h=0;$h<count($arr_consolation);$h++)
                                    {
                                        if($NoFist == $arr_consolation[$h] || $NoTwo == $arr_consolation[$h] || $NoThree == $arr_consolation[$h] || $NoFour == $arr_Special[$h] || $NoFine == $arr_Special[$h] )
                                        {
                                            array_push($l_serial,$serialNumber);
                                        } 
                                    }
                                    $str_myplay = "YOUR PLAY NO HAS WON.<br/>";
                                    $str_myplay .= "(TOTO 4D) ".$date_; 
                                    array_push($l_meage,$str_myplay);

                                    $link_lott = base_url("/app/lottry/totofourd");
                                    array_push($l_links,$link_lott);
                                }
                        break;
                     case 'sinfourd':
                               $list_sin4d  = $this->checkExitDate($txtdateNow,'lot_sin4d');
                               if(count($list_sin4d) != 0)
                               {
                                    $_1st         = $list_sin4d["1st"];
                                    $_2nd         = $list_sin4d["2nd"];
                                    $_3rd         = $list_sin4d["3rd"];
                                    $_Specail     = $list_sin4d["Special"];
                                    $_Consolation = $list_sin4d["Consolation"];
                                    if($NoFist == $_1st || $NoTwo == $_1st || $NoThree == $_1st || $NoFour == $_1st || $NoFine == $_1st)
                                    {
                                       array_push($l_serial,$serialNumber);
                                       array_push($l_type, $type);
                                    }
                                    if($NoFist == $_2nd || $NoTwo == $_2nd || $NoThree == $_2nd || $NoFour == $_2nd || $NoFine == $_2nd)
                                    {
                                        array_push($l_serial,$serialNumber);
                                        array_push($l_type, $type);
                                    }

                                    if($NoFist == $_3rd || $NoTwo == $_3rd || $NoThree == $_3rd || $NoFour == $_3rd || $NoFine == $_3rd)
                                    {
                                        array_push($l_serial,$serialNumber);
                                        array_push($l_type, $type);
                                    }

                                    $arr_Special          = explode("|",$_Specail);
                                    for($j=0;$j<count($arr_Special);$j++)
                                    {
                                        if($NoFist == $arr_Special[$j] || $NoTwo == $arr_Special[$j] || $NoThree == $arr_Special[$j] || $NoFour == $arr_Special[$j] || $NoFine == $arr_Special[$j])
                                        {
                                            array_push($l_serial,$serialNumber);
                                            array_push($l_type, $type);
                                        }
                                    }

                                    $arr_consolation          = explode("|",$_Consolation);
                                    for($h=0;$h<count($arr_consolation);$h++)
                                    {
                                        if($NoFist == $arr_consolation[$h] || $NoTwo == $arr_consolation[$h] || $NoThree == $arr_consolation[$h] || $NoFour == $arr_Special[$h] || $NoFine == $arr_Special[$h] )
                                        {
                                            array_push($l_serial,$serialNumber);
                                            array_push($l_type, $type);
                                        } 
                                    }

                                    $str_myplay = "YOUR PLAY NO HAS WON.<br/>";
                                    $str_myplay .= "(SIN 4D) ".$date_; 
                                    array_push($l_meage,$str_myplay);

                                    $link_lott = base_url("/lottry/singaporefourd");
                                    array_push($l_links,$link_lott);
                               }
                          break;
                     case 'sintoto':
                            $list_sintoto  = $this->checkExitDate($txtdateNow,'lot_sintoto');
                            if(count($list_sintoto) != 0)
                            {
                                $_WinNo         = $list_sintoto["WinNo"]; 
                                if($NoToToFist != "" || $NoToToFist != " " && $_WinNo != "" )
                                {
                                    $NoToToFist      = explode("|", $NoToToFist);
                                    $NoToToFist      = array_filter($NoToToFist);
                                    $_WinNo1         = explode("|", $_WinNo);
                                    $_WinNo1         = array_filter($_WinNo1);
                                    // compare item two array return one array other item same with two array
                                    if(count($NoToToFist) >0 && count($_WinNo1) >0)
                                    {
                                        $result_no1  = array_diff($NoToToFist, $_WinNo1);
                                        if(count($result_no1) < 4 )
                                        {
                                          array_push($l_serial,$serialNumber); 
                                        } 
                                    }                            
                                }

                                if($NoToToTwo != "" || $NoToToTwo != " " && $_WinNo != "")
                                {
                                    $NoToToTwo        = explode("|", $NoToToTwo);
                                    $NoToToTwo        = array_filter($NoToToTwo);
                                    $_WinNo2          = explode("|", $_WinNo); 
                                    $_WinNo2          = array_filter($_WinNo2); 
                                    // compare item two array return one array other item same with two array 
                                    if(count($NoToToTwo)>0 && count($_WinNo2) >0)
                                    {
                                        $result_no2  = array_diff($NoToToTwo, $_WinNo2);                           
                                        if(count($result_no2) < 4)
                                        {
                                          array_push($l_serial,$serialNumber);  
                                        }  
                                    }
                                    
                                }

                                if($NoToToThree != "" || $NoToToThree != " " && $_WinNo != "")
                                {
                                    $NoToToThree      = explode("|", $NoToToThree);
                                    $NoToToThree      = array_filter($NoToToThree);
                                    $_WinNo3          = explode("|", $_WinNo);
                                    $_WinNo3          = array_filter($_WinNo3);
                                    // compare item two array return one array other item same with two array 
                                    if(count($NoToToThree)>0 && count($_WinNo3)>0)
                                    {
                                        $result_no3       = array_diff($NoToToThree, $_WinNo3);
                                        if(count($result_no3) < 4 )
                                        {
                                          array_push($l_serial,$serialNumber);  
                                        } 
                                    }
                                    
                                }

                                if($NoToToFour != "" || $NoToToFour != " " && $_WinNo != "")
                                {
                                    $NoToToFour        = explode("|", $NoToToFour);
                                    $NoToToFour        = array_filter($NoToToFour);
                                    $_WinNo4           = explode("|", $_WinNo);
                                    $_WinNo4           = array_filter($_WinNo4);
                                    // compare item two array return one array other item same with two array
                                    if(count($NoToToFour) >0 && count($_WinNo4) >0)
                                    {
                                        $result_no4  = array_diff($NoToToFour, $_WinNo4);
                                        if(count($result_no4) < 4 )
                                        {
                                          array_push($l_serial,$serialNumber);  
                                        } 
                                    } 
                                    
                                }

                                if($NoToToFine != "" || $NoToToFine != " " && $_WinNo != "")
                                {
                                    $NoToToFine      = explode("|", $NoToToFine);
                                    $NoToToFine      = array_filter($NoToToFine);
                                    $_WinNo5         = explode("|", $_WinNo);
                                    $_WinNo5         = array_filter($_WinNo5);
                                    // compare item two array return one array other item same with two array
                                    if(count($NoToToFine)>0 && count($_WinNo5) > 0)
                                    {
                                        $result_no5  = array_diff($NoToToFine, $_WinNo5);
                                        if(count($result_no5) < 4)
                                        {
                                          array_push($l_serial,$serialNumber);  
                                        }  
                                    } 
                                    
                                }

                                $str_myplay = "YOUR PLAY NO HAS WON.<br/>";
                                $str_myplay .= "(SIN TOTO) ".$date_; 
                                array_push($l_meage,$str_myplay); 

                                $link_lott = base_url("/app/lottry/sintoto");
                                array_push($l_links,$link_lott); 
                            }
                          break;
                     case 'cashsweep':
                             $l_cashsweep  = $this->checkExitDate($txtdateNow,'lot_cashsweep');
                             if(count($l_cashsweep) != 0)
                             {
                                $_1st         = $l_cashsweep["1st"];
                                $_2nd         = $l_cashsweep["2nd"];
                                $_3rd         = $l_cashsweep["3rd"];
                                $_Specail     = $l_cashsweep["Special"];
                                $_Consolation = $l_cashsweep["Consolation"];
                                if($NoFist == $_1st || $NoTwo == $_1st || $NoThree == $_1st || $NoFour == $_1st || $NoFine == $_1st)
                                {
                                   array_push($l_serial,$serialNumber);
                                   array_push($l_type, $type);
                                }
                                if($NoFist == $_2nd || $NoTwo == $_2nd || $NoThree == $_2nd || $NoFour == $_2nd || $NoFine == $_2nd)
                                {
                                    array_push($l_serial,$serialNumber);
                                    array_push($l_type, $type);
                                }

                                if($NoFist == $_3rd || $NoTwo == $_3rd || $NoThree == $_3rd || $NoFour == $_3rd || $NoFine == $_3rd)
                                {
                                    array_push($l_serial,$serialNumber);
                                    array_push($l_type, $type);
                                }

                                $arr_Special          = explode("|",$_Specail);
                                for($j=0;$j<count($arr_Special);$j++)
                                {
                                    if($NoFist == $arr_Special[$j] || $NoTwo == $arr_Special[$j] || $NoThree == $arr_Special[$j] || $NoFour == $arr_Special[$j] || $NoFine == $arr_Special[$j])
                                    {
                                        array_push($l_serial,$serialNumber);
                                        array_push($l_type, $type);
                                    }
                                }

                                $arr_consolation          = explode("|",$_Consolation);
                                for($h=0;$h<count($arr_consolation);$h++)
                                {
                                    if($NoFist == $arr_consolation[$h] || $NoTwo == $arr_consolation[$h] || $NoThree == $arr_consolation[$h] || $NoFour == $arr_Special[$h] || $NoFine == $arr_Special[$h] )
                                    {
                                        array_push($l_serial,$serialNumber);
                                        array_push($l_type, $type);
                                    } 
                                }
                                 $str_myplay = "YOUR PLAY NO HAS WON.<br/>";
                                 $str_myplay .= "(CASHSWEEP) ".$date_;
                                 array_push($l_meage,$str_myplay);

                                 $link_lott = base_url("/lottry/cashsweeponethreed");
                                 array_push($l_links,$link_lott);
                             }
                         break;
                     case 'stc4d':
                            $l_stc4d  = $this->checkExitDate($txtdateNow,'lot_sandakan');
                            if(count($l_stc4d) > 0)
                            {
                                $_1st         = $l_stc4d["1st"];
                                $_2nd         = $l_stc4d["2nd"];
                                $_3rd         = $l_stc4d["3rd"];
                                $_Specail     = $l_stc4d["Special"];
                                $_Consolation = $l_stc4d["Consolation"];
                                if($NoFist == $_1st || $NoTwo == $_1st || $NoThree == $_1st || $NoFour == $_1st || $NoFine == $_1st)
                                {
                                   array_push($l_serial,$serialNumber);
                                }
                                if($NoFist == $_2nd || $NoTwo == $_2nd || $NoThree == $_2nd || $NoFour == $_2nd || $NoFine == $_2nd)
                                {
                                    array_push($l_serial,$serialNumber);
                                }

                                if($NoFist == $_3rd || $NoTwo == $_3rd || $NoThree == $_3rd || $NoFour == $_3rd || $NoFine == $_3rd)
                                {
                                    array_push($l_serial,$serialNumber);
                                }

                                $arr_Special          = explode("|",$_Specail);
                                for($j=0;$j<count($arr_Special);$j++)
                                {
                                    if($NoFist == $arr_Special[$j] || $NoTwo == $arr_Special[$j] || $NoThree == $arr_Special[$j] || $NoFour == $arr_Special[$j] || $NoFine == $arr_Special[$j])
                                    {
                                        array_push($l_serial,$serialNumber);
                                    }
                                }

                                $arr_consolation          = explode("|",$_Consolation);
                                for($h=0;$h<count($arr_consolation);$h++)
                                {
                                    if($NoFist == $arr_consolation[$h] || $NoTwo == $arr_consolation[$h] || $NoThree == $arr_consolation[$h] || $NoFour == $arr_Special[$h] || $NoFine == $arr_Special[$h] )
                                    {
                                        array_push($l_serial,$serialNumber);
                                    } 
                                }

                                $str_myplay = "YOUR PLAY NO HAS WON.<br/>";
                                $str_myplay .= "(STC4D) ".$date_;
                                array_push($l_meage,$str_myplay);

                                $link_lott = base_url("/app/lottry/sandakanford");
                                array_push($l_links,$link_lott);
                            }
                         break;  

                     case 'sabah88':
                            $l_sabah  = $this->checkExitDate($txtdateNow,'lot_sabah');
                            if(count($l_sabah) > 0)
                            {
                                $_1st         = $l_sabah["1st"];
                                $_2nd         = $l_sabah["2nd"];
                                $_3rd         = $l_sabah["3rd"];
                                $_Specail     = $l_sabah["Special"];
                                $_Consolation = $l_sabah["Consolation"];
                                $_toto        = $l_sabah["Lotto"];
                                $arr_toto = array();
                                if($_toto != "")
                                {
                                    $arr_toto6 = explode("|", $_toto);
                                    array_push($arr_toto,$arr_toto6[0],$arr_toto6[1],$arr_toto6[2],$arr_toto6[3],$arr_toto6[4],$arr_toto6[5],"");
                                }
                                // remove space in array 
                                $arr_toto = array_filter($arr_toto);
                                // Sin ToTo No1
                                if($NoToToFist != "" || $NoToToFist != " " && $_toto != "")
                                {
                                    $NoToToFist     = explode("|", $NoToToFist);
                                    $NoToToFist     = array_filter($NoToToFist);
                                    // compare item two array return one array other item same with two array 
                                    if(count($NoToToFist) > 0 && count($arr_toto) > 0)
                                    {
                                        $result_no1  = array_diff($NoToToFist,$arr_toto);
                                        if(count($result_no1) == 0)
                                        {
                                          array_push($l_serial,$serialNumber);  
                                        } 
                                    }  
                                }
                                // Sin ToTo No2
                                if($NoToToTwo != "" || $NoToToTwo != " " && $_toto != "")
                                {
                                    $NoToToTwo     =  explode("|", $NoToToTwo);
                                    $NoToToTwo     = array_filter($NoToToTwo);
                                    // compare item two array return one array other item same with two array
                                    if(count($NoToToTwo) > 0 && count($arr_toto) > 0)
                                    {
                                        $result_no2  = array_diff($NoToToTwo,$arr_toto);
                                        if(count($result_no2) == 0)
                                        {
                                          array_push($l_serial,$serialNumber);  
                                        }
                                    }  
                                }

                                // Sin ToTo No3
                                if($NoToToThree != "" || $NoToToThree != " " && $_toto != "")
                                {
                                    $NoToToThree = explode("|", $NoToToThree);
                                    $NoToToThree = array_filter($NoToToThree);
                                    // compare item two array return one array other item same with two array 
                                    if(count($NoToToThree) > 0 && count($arr_toto) > 0)
                                    {
                                        $result_no3  = array_diff($NoToToThree, $arr_toto);
                                        if(count($result_no3) == 0)
                                        {
                                          array_push($l_serial,$serialNumber);  
                                        } 
                                    }   
                                }

                                // Sin ToTo No4
                                if($NoToToFour != "" || $NoToToFour != " " && $_toto != "")
                                {
                                    $NoToToFour = explode("|", $NoToToFour);
                                    $NoToToFour = array_filter($NoToToFour);
                                    // compare item two array return one array other item same with two array 
                                    if(count($NoToToFour) >0 && count($arr_toto) > 0)
                                    {
                                        $result_no4  = array_diff($NoToToFour, $arr_toto);
                                        if(count($result_no4) == 0)
                                        {
                                          array_push($l_serial,$serialNumber);  
                                        } 
                                    } 
                                }

                                // Sin ToTo No5
                                if($NoToToFine != "" || $NoToToFine != " " && $_toto != "")
                                {
                                    $NoToToFine =  explode("|", $NoToToFine);
                                    $NoToToFine =  array_filter($NoToToFine);
                                    if(count($NoToToFine) > 0 && count($arr_toto) > 0)
                                    {
                                       $result_no5  = array_diff($NoToToFine, $arr_toto);
                                        if(count($result_no5) == 0)
                                        {
                                          array_push($l_serial,$serialNumber);  
                                        } 
                                    }
                                    // compare item two array return one array other item same with two array   
                                }

                                 // No 1 lottery cashsweep
                                if($_1st != "" || $_1st != " ")
                                {
                                    $_1st = explode("|",$_1st);
                                    if(isset($_1st[0]))
                                    {
                                       if($NoFist == $_1st[0] || $NoTwo == $_1st[0] || $NoThree == $_1st[0] || $NoFour == $_1st[0] || $NoFine == $_1st[0])
                                        {
                                           array_push($l_serial,$serialNumber);
                                        } 
                                    }
                                    if(isset($_1st[1]))
                                    {
                                        if($NoFist == $_1st[1] || $NoTwo == $_1st[1] || $NoThree == $_1st[1] || $NoFour == $_1st[1] || $NoFine == $_1st[1])
                                        {
                                           array_push($l_serial,$serialNumber);
                                        } 
                                    }
                                }

                                if($_2nd != "" || $_2nd != " ")
                                {
                                    $_2nd = explode("|",$_2nd);
                                    if(isset($_2nd[0]))
                                    {
                                       if($NoFist == $_2nd[0] || $NoTwo == $_2nd[0] || $NoThree == $_2nd[0] || $NoFour == $_2nd[0] || $NoFine == $_2nd[0])
                                        {
                                           array_push($l_serial,$serialNumber);
                                        } 
                                    }
                                    if(isset($_2nd[1]))
                                    {
                                        if($NoFist == $_2nd[1] || $NoTwo == $_2nd[1] || $NoThree == $_2nd[1] || $NoFour == $_2nd[1] || $NoFine == $_2nd[1])
                                        {
                                           array_push($l_serial,$serialNumber);
                                        } 
                                    }
                                }

                                if($_3rd != "" || $_3rd != " ")
                                {
                                    $_3rd = explode("|",$_3rd);
                                    if(isset($_3rd[0]))
                                    {
                                       if($NoFist == $_3rd[0] || $NoTwo == $_3rd[0] || $NoThree == $_3rd[0] || $NoFour == $_3rd[0] || $NoFine == $_3rd[0])
                                        {
                                           array_push($l_serial,$serialNumber);
                                        } 
                                    }
                                    if(isset($_3rd[1]))
                                    {
                                        if($NoFist == $_3rd[1] || $NoTwo == $_3rd[1] || $NoThree == $_3rd[1] || $NoFour == $_3rd[1] || $NoFine == $_3rd[1])
                                        {
                                           array_push($l_serial,$serialNumber);
                                        } 
                                    }
                                }

                                $arr_Special          = explode("|",$_Specail);
                                for($j=0;$j<count($arr_Special);$j++)
                                {
                                    if($NoFist == $arr_Special[$j] || $NoTwo == $arr_Special[$j] || $NoThree == $arr_Special[$j] || $NoFour == $arr_Special[$j] || $NoFine == $arr_Special[$j])
                                    {
                                        array_push($l_serial,$serialNumber);
                                    }                                    
                                }

                                $arr_consolation          = explode("|",$_Consolation);
                                for($h=0;$h<count($arr_consolation);$h++)
                                {
                                    if($NoFist == $arr_consolation[$h] || $NoTwo == $arr_consolation[$h] || $NoThree == $arr_consolation[$h] || $NoFour == $arr_Special[$h] || $NoFine == $arr_Special[$h] )
                                    {
                                        array_push($l_serial,$serialNumber);
                                    }
                                }

                                $str_myplay = "YOUR PLAY NO HAS WON.<br/>";
                                $str_myplay .= "(SABAH88) ".$date_;
                                array_push($l_meage,$str_myplay);

                                $link_lott = base_url("/app/lottry/sabah");
                                array_push($l_links,$link_lott);
                            }
                        break;

                     default:
                         # code...
                         break;
                 }
            }
        }

        if(count($l_serial) != 0)
        {
            $l_serial = array_unique($l_serial);
            //print_r($l_serial);
            $SeriaNumber = "";
            foreach ($l_serial as $key => $value) 
            {
                $SeriaNumber = $SeriaNumber.$value."-";
            }

            // show meagage for titem
            $l_meage  = array_unique($l_meage);
            $str_meagae = "";
            foreach ($l_meage as $key => $v_meage) 
            {
               $str_meagae = $str_meagae.$v_meage."#";
            }

            // show links for titem
            $l_links = array_unique($l_links);
            $str_links = "";
            foreach ($l_links as $key => $v_links) {
                $str_links = $str_links.$v_links."#";
            }
            

            $sql_notifi = "INSERT INTO `notification`(`FromID`,`ToID`,`Content`,`NoteType`,`AffectURL`,`CreatedDate`,`CreatedBy`,`Status`,`NoteTypeCon`)
                                        VALUES('admin','$SeriaNumber','$str_meagae','02','$str_links',NOW(),'admin','0','0201')";
            $req = $this->db->query($sql_notifi); 
            if($req)
            {
                $result = 1;
            }
        }

        //return $l_serial;
    }

    public function checkExitDate($date,$table)
    {
        $sql_list = "SELECT * FROM  $table  WHERE `txday`='$date'";
        $arr = $this->db->query($sql_list)->row_array();
        return $arr;
    }

    public function checkExitDateType($date,$table)
    { 
        $sql_list = "SELECT * FROM  $table  WHERE `txday`='$date'";
        $arr  = $this->db->query($sql_list)->result();
        return $arr;
    }

    public function loadmyplaynumber()
    {
        $type = $_POST['typechoose'];
        $serailNumber = "";
        if(isset($_SESSION['serialNumber']))
            $serailNumber = $_SESSION['serialNumber'];
        $sql = "SELECT `txday` FROM `playnumber` WHERE `LotteryType`='$type' AND `SeriaNumber`='$serailNumber'";
        $arr_list = $this->db->query($sql)->result();
        $arr = array("RaceDate_U" => $arr_list);
        return $arr;
    }
    public function get_tbl_by_txday($txday,$type,$serialNumber)
    {

        $sql  =  "SELECT * FROM `playnumber`
                  WHERE `txday` = '$txday' 
                  AND `LotteryType` = '$type' 
                  AND `SeriaNumber`='$serialNumber'";
        $query      =   $this->db->query($sql)->row();
        return $query;
    }

    public function loadlistplaynumber()
    {
        $serailNumber = "";
        if(isset($_SESSION['serialNumber']))
            $serailNumber = $_SESSION['serialNumber'];
        $txtday = $_POST['txtday'];
        $txtday = explode("-", $txtday);
        $strdate = $txtday[2].$txtday[1].$txtday[0];
        $type   = $_POST['type'];
        $sql    =  "SELECT * FROM `playnumber`
                    WHERE `txday` = '$strdate' AND `LotteryType` = '$type' AND `SeriaNumber`='$serailNumber'";
        $query  =   $this->db->query($sql)->row();
        if(count($query) != 0)
        {
            $flag = 1;
        }
        else
        {
            $flag = 0;
        }
        $arr = array('l_playnumber'=>$query,'flag'=>$flag);
        return $arr;
    }
   
    
}