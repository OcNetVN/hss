<?php
class M_notification extends CI_Model
{
    public $value_tamp;
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->library("common");
    }
    
    public function notification($serialNumber)
    {
        if($serialNumber != "")
        {
            $sql = "SELECT a.*,b.*
                    FROM `notification` a 
                    INNER JOIN `typenotification` b ON a.`ToID`= b.`SerialNumber`
                    WHERE `ToID`=''
                    ORDER BY `id` DESC
                    LIMIT 1";
            $req = $this->db->query($sql)->result();
            if(count($req) > 0)
            {
                $str=$req[0]['Type'].",".$req[0]['Sound'].",".$req[0]['Vibration'].",".$req[0]['RacingDay'].",".$req[0]['Content'].",".$req[0]['Status'];
            }
            else $str = "No Define";
            echo $str;
        }
        else
        {
            echo "No Define";
        }
    }

    public function loadTickNotification()
    {
        $serialNumber = "";
        if(isset($_SESSION['serialNumber']))
            $serialNumber = $_SESSION['serialNumber'];
        $sql_type = "SELECT * FROM `typenotification` WHERE `SerialNumber`='$serialNumber'";
        $result_ = $this->db->query($sql_type)->result();
        $arr = array("l_Notification"=>$result_);
        return $arr;
    }
    
    public function SaveTickNotification()
    {
        $serialNumber = "";
        if(isset($_SESSION['serialNumber']))
            $serialNumber = $_SESSION['serialNumber'];        
        $sql = "SELECT * FROM `typenotification` WHERE `SerialNumber`='$serialNumber'";
        $result = $this->db->query($sql)->result();
        if(count($result) == 0)
        {
            $sql_insert = "INSERT INTO `typenotification`(`SerialNumber`,`RacingDay`,`Sound`,`Vibration`,`Type_Horse_Tips`,`West_Malaysia`,`Singapore`,`East_Malaysia`,`Type_Soccer_Tips`,`Goal`)
                                                    VALUES('$serialNumber','1','1','1','1','1','1','1','1','1')";
            $this->db->query($sql_insert);
        }
    }
    public function tickhrsnotification()
    {
        $serialNumber = "";
        if(isset($_SESSION['serialNumber']))
            $serialNumber = $_SESSION['serialNumber'];
        
        $result = "";
        $sql = "SELECT * FROM `typenotification` WHERE `SerialNumber`='$serialNumber'";
        $result = $this->db->query($sql)->result();
        if(count($result) != 0)
        {
            if(isset($_POST['sound']) && isset($_POST['vibration']))
            {

                $sound       = $_POST['sound'];
                $vibration   = $_POST['vibration'];
                $sql_update = "UPDATE `typenotification` SET `Sound`='$sound',`Vibration`='$vibration'                          
                                        WHERE `SerialNumber`='$serialNumber'";
            }
            if(isset($_POST['tips']) && isset($_POST['racingday']))
            {

                $tips       = $_POST['tips'];
                $racingday  = $_POST['racingday'];

                $sql_update = "UPDATE `typenotification` SET `RacingDay`='$racingday',`Type_Horse_Tips`='$tips'                          
                            WHERE `SerialNumber`='$serialNumber'";
            }
                
            if(isset($_POST['westMalaysia']) && isset($_POST['singapore']) && isset($_POST['eastMalaysia']))
            {

                $wesMalysia = $_POST['westMalaysia'];
                $singapore  = $_POST['singapore'];
                $eastMalaysia = $_POST['eastMalaysia'];

                $sql_update = "UPDATE `typenotification` SET `West_Malaysia`='$wesMalysia',`Singapore`='$singapore',`East_Malaysia`='$eastMalaysia'                          
                            WHERE `SerialNumber`='$serialNumber'";
            }

            if(isset($_POST['goal']) && isset($_POST['soccertips']))
            {
                $goal         = $_POST['goal'];
                $soccertips   = $_POST['soccertips'];
                $sql_update = "UPDATE `typenotification` SET `Type_Soccer_Tips`='$soccertips',`Goal`='$goal'                          
                               WHERE `SerialNumber`='$serialNumber'";
            }
                
            $req = $this->db->query($sql_update);
            if($req)
               $result = 1;
        }
        else
        {

            if(isset($_POST['sound']) && isset($_POST['vibration']))
            {
                $sound       = $_POST['sound'];
                $vibration   = $_POST['vibration'];
                $sql_sel = "INSERT INTO `typenotification`(`SerialNumber`,`Sound`,`Vibration`)
                                                VALUES('$serialNumber','$sound','$vibration')";
            }

            if(isset($_POST['tips']) && isset($_POST['racingday']))
            {
                $tips       = $_POST['tips'];
                $racingday  = $_POST['racingday'];
                $sql_sel = "INSERT INTO `typenotification`(`SerialNumber`,`RacingDay`,`Type_Horse_Tips`)
                                                VALUES('$serialNumber','$racingday','$tips')";
            }
                
            if(isset($_POST['westMalaysia']) && isset($_POST['singapore']) && isset($_POST['eastMalaysia']))
            {
                $wesMalysia = $_POST['westMalaysia'];
                $singapore  = $_POST['singapore'];
                $eastMalaysia = $_POST['eastMalaysia'];
                $sql_sel = "INSERT INTO `typenotification`(`SerialNumber`,`West_Malaysia`,`Singapore`,`East_Malaysia`)
                                                VALUES('$serialNumber','$wesMalysia','$singapore','$eastMalaysia')";
            }

            if(isset($_POST['goal']) && isset($_POST['soccertips']))
            {
                $goal         = $_POST['goal'];
                $soccertips   = $_POST['soccertips'];
                $sql_sel = "INSERT INTO `typenotification`(`SerialNumber`,`Type_Soccer_Tips`,`Goal`)
                                                VALUES('$serialNumber','$soccertips','$goal')";
            }
            
            $req = $this->db->query($sql_sel);
            if($req)
               $result = 1;
        }

        $arr = array('result'=>$result);
        return $arr;
    }

    public function loadHistoryNotification()
    {
        $sql_HN = "SELECT `Content`,`CreatedDate`
                FROM `notification`
                ORDER BY `CreatedDate` DESC ";
        $arr_HisNoti = $this->db->query($sql_HN)->result();
        $arr = array('l_Notification' =>$arr_HisNoti);
        return $arr;
    }

    public function getSerialNumber()
    {
        //$type = $_POST['type'];
        $sql = "SELECT `rowid`,`ImieNo` FROM `users`";
        $arr_result = $this->db->query($sql)->result();
        $arr =  array('l_serial'=>$arr_result);
        return $arr;
    }

    public function SendNotification()
    {
        $typeCha           = "";
        $typeCon           = "";
        $url               = "";
        $dem = 0;
        $result = "";
        $_TypeParent = "NULL";
        $TypeCon_Send = "NULL";
        if(isset($_POST['typeCha']))
        {
            $typeCha = $_POST['typeCha'];
            switch ($typeCha) {
                case '01': $_TypeParent = "TYPE_HORSE";break;
                case '02': $_TypeParent = "TYPE_LOTTERY";break;
                case '03': $_TypeParent = "TYPE_SOCCER";break;
                default:
                    $_TypeParent = "";
                    break;
            }
        }

        if(isset($_POST['typeCon']))
        {
            $typeCon = $_POST['typeCon'];
            switch ($typeCon) 
            {
                case '0101': $TypeCon_Send = "TYPE_HORSE_RACING_DAY";
                    break;
                case '0102': $TypeCon_Send = "TYPE_HORSE_RACING_TIPS";
                    break;
                case '0201': $TypeCon_Send = "TYPE_LOTTERY_WEST_MALAYSIA";
                    break;
                case '0202': $TypeCon_Send = "TYPE_LOTTERY_SINGAPORE";
                    break;
                case '0203': $TypeCon_Send = "TYPE_LOTTERY_EAST_MALAYSIA";
                    break;
                case '0301': $TypeCon_Send = "TYPE_SOCCER_TIPS";
                    break;
                case '0302': $TypeCon_Send = "TYPE_SOCCER_GOAL";
                    break;
                default:
                    $TypeCon_Send = "NULL";
                    break;
            }
        }
        $serialNumber   = array();
        $l_Serial = "";
        if(isset($_POST['SerialNumber']))
        {
            $serialNumber = $_POST['SerialNumber'];
            if($serialNumber != "ALL")
            {
                for($i=0;$i<count($serialNumber);$i++)
                {
                    $l_Serial = $l_Serial.$serialNumber[$i]."-";
                }
            }
            else
            {
                $l_Serial = "ALL";
            }
            $dem++;     
        }
        
        $content        = "";
        if(isset($_POST['content']))
            $content = $_POST['content'];
        if(isset($_POST['url']))
            $url  = $_POST['url'];

         // Ghi xuống file
        $arr_dem = explode('-',date('Y-m-d-h-i-s'));
        $dem     = $arr_dem[2].$arr_dem[3].$arr_dem[4];
        $Value_send = $dem.",".$l_Serial.",".$_TypeParent.",".$TypeCon_Send.",".$content.",".$url;
        $myfile = fopen("public/var.txt", "w") or die("Unable to open file!");
        $txt = $Value_send;
        fwrite($myfile, $txt);            
        fclose($myfile);       
        
        $sql_notifi = "INSERT INTO `notification`(`FromID`,`ToID`,`Content`,`NoteType`,`AffectURL`,`CreatedDate`,`CreatedBy`,`Status`,`NoteTypeCon`)
                                        VALUES('admin','$l_Serial',\"$content\",' $typeCha','$url',NOW(),'admin','0','$typeCon')";
        $req = $this->db->query($sql_notifi); 
        if($req)
        {
            $result = 1;
        }
       
        $arr = array("result"=>$result);
        return $arr;                                
    }

    public function APISendSetting()
    {
        $toID = "";
        if(isset($_GET['serial']))
            $toID = $_GET['serial'];
        // Horse Notifications
        $sql_Notifi  = "SELECT * FROM `typenotification`
                        WHERE `SerialNumber`='$toID' ";
        $arr_Notifi = $this->db->query($sql_Notifi)->result();
        if(count($arr_Notifi) != 0)
        {
            $sound           = $arr_Notifi[0]->Sound;
            if($sound != 1 || $sound != "1")
                $sound = 0;
            $vibration       = $arr_Notifi[0]->Vibration;
            if($vibration != 1 || $vibration != "1")
                $vibration = 0;
            $RacingDay       = $arr_Notifi[0]->RacingDay;
            if($RacingDay != 1 || $RacingDay != "1")
                $RacingDay = 0;
            $Horse_Tips      = $arr_Notifi[0]->Type_Horse_Tips;
            if($Horse_Tips != 1 || $Horse_Tips != "1")
                $Horse_Tips = 0;
            $West_Malaysia   = $arr_Notifi[0]->West_Malaysia;
            if($West_Malaysia != 1 || $West_Malaysia != "1")
                $West_Malaysia = 0;
            $Singapore       = $arr_Notifi[0]->Singapore;
            if($Singapore != 1 || $Singapore != "1")
                $Singapore = 0;
            $East_Malaysia   = $arr_Notifi[0]->East_Malaysia;
            if($East_Malaysia != 1 || $East_Malaysia != "1")
                $East_Malaysia = 0;
            $Soccer_Tips     = $arr_Notifi[0]->Type_Soccer_Tips;
            if($Soccer_Tips != 1 || $Soccer_Tips != "1")
                $Soccer_Tips = 0;
            $Goal            = $arr_Notifi[0]->Goal;
            if($Goal != 1 || $Goal != "1")
                $Goal = 0;
        }
        else{
                $sound          = "0";
                $vibration      = "0";
                $RacingDay      = "0";
                $Horse_Tips     = "0";
                $West_Malaysia  = "0";
                $Singapore      = "0";
                $East_Malaysia  = "0";
                $Soccer_Tips    = "0";
                $Goal           = "0";
        }

        $Type_Notification = $sound.",".$vibration.",".$RacingDay.",".$Horse_Tips.",".$West_Malaysia.",".$Singapore.",".$East_Malaysia.",".$Soccer_Tips.",".$Goal;
        if($Type_Notification == "")
        {
            $Type_Notification = "NULL";
        }

        return $Type_Notification;

    }
    
    public function APISendNotification()
    {
        $value = null;
        try {
                $myfile = fopen("public/var.txt", "r") or die("Unable to open file!");
                $value = fread($myfile,filesize("public/var.txt"));
                fclose($myfile);  
            } 
        catch (Exception $e) 
        {
            return null;
        }
        
        return $value;
    }
    // public function APISendNotification()
    // {
    //     $toID = "";
    //     if(isset($_GET['serial']))
    //         $toID = $_GET['serial'];
    //     $sql_sel = "SELECT * FROM `notification` 
    //                 ORDER BY `CreatedDate` DESC
    //                 LIMIT 0,1";
    //     // Horse Notifications
    //     $sql_Notifi  = "SELECT * FROM `typenotification`
    //                     WHERE `SerialNumber`='$toID' ";
    //     $arr_Notifi = $this->db->query($sql_Notifi)->result();
    //     if(count($arr_Notifi) != 0)
    //     {
    //         $sound           = $arr_Notifi[0]->Sound;
    //         $vibration       = $arr_Notifi[0]->Vibration;
    //         $RacingDay       = $arr_Notifi[0]->RacingDay;
    //         $Horse_Tips      = $arr_Notifi[0]->Type_Horse_Tips;
    //         $West_Malaysia   = $arr_Notifi[0]->West_Malaysia;
    //         $Singapore       = $arr_Notifi[0]->Singapore;
    //         $East_Malaysia   = $arr_Notifi[0]->East_Malaysia;
    //         $Soccer_Tips     = $arr_Notifi[0]->Type_Soccer_Tips;
    //         //print_r($Soccer_Tips);
    //         $Goal            = $arr_Notifi[0]->Goal;
    //         //print_r($Goal);
    //     }
    //     else{
    //             $sound          = "0";
    //             $vibration      = "0";
    //             $RacingDay      = "0";
    //             $Horse_Tips     = "0";
    //             $West_Malaysia  = "0";
    //             $Singapore      = "0";
    //             $East_Malaysia  = "0";
    //             $Soccer_Tips    = "0";
    //             $Goal           = "0";
    //     }

    //     $Type_Notification = "";
    //     if($RacingDay == "1" || $RacingDay == 1)
    //         $Type_Notification = $Type_Notification."TYPE_HORSE_RACING_DAY-";

    //     if($Horse_Tips == "1" || $Horse_Tips == 1)
    //         $Type_Notification = $Type_Notification."TYPE_HORSE_RACING_TIPS-";

    //     if($West_Malaysia == "1" || $West_Malaysia == 1)
    //         $Type_Notification = $Type_Notification."TYPE_LOTTERY_WEST_MALAYSIA-";

    //     if($Singapore == "1" || $Singapore == 1)
    //         $Type_Notification = $Type_Notification."TYPE_LOTTERY_SINGAPORE-";

    //     if($East_Malaysia == "1" || $East_Malaysia == 1)
    //         $Type_Notification = $Type_Notification."TYPE_LOTTERY_EAST_MALAYSIA-";

    //     if($Soccer_Tips == "1" || $Soccer_Tips == 1)
    //         $Type_Notification = $Type_Notification."TYPE_SOCCER_TIPS-";

    //     if($Goal == "1" || $Goal == 1)
    //         $Type_Notification = $Type_Notification."TYPE_SOCCER_GOAL-";
        
    //     if($Type_Notification == "")
    //     {
    //         $Type_Notification = "NULL";
    //     }

    //     $arr_All = $this->db->query($sql_sel)->result();
    //     if(count($arr_All) != 0)
    //     {
    //         $id   = $arr_All[0]->id;
    //         $Serial_Number = $arr_All[0]->ToID;
    //         $notetype = $arr_All[0]->NoteType;
    //         if($notetype != "")
    //         {
    //             if($notetype == "01")
    //             {
    //                 $typeCha = "TYPE_HORSE";
    //             }

    //             if($notetype == "02")
    //             {
    //               $typeCha = "TYPE_LOTTERY";  
    //             }

    //             if($notetype == "03")
    //             {
    //               $typeCha = "TYPE_SOCCER";  
    //             }
    //         }
    //         else{
    //                 $typeCha = "NULL";
    //             }

    //         $NoteTypeCon = $arr_All[0]->NoteTypeCon;
    //         if($NoteTypeCon != "")
    //         {
    //             switch ($NoteTypeCon) {
    //                 case '0101': $TypeCon = "TYPE_HORSE_RACING_DAY";
    //                     break;
    //                 case '0102': $TypeCon = "TYPE_HORSE_RACING_TIPS";
    //                     break;
    //                 case '0201': $TypeCon = "TYPE_LOTTERY_WEST_MALAYSIA";
    //                     break;
    //                 case '0202': $TypeCon = "TYPE_LOTTERY_SINGAPORE";
    //                     break;
    //                 case '0203': $TypeCon = "TYPE_LOTTERY_EAST_MALAYSIA";
    //                     break;
    //                 case '0301': $TypeCon = "TYPE_SOCCER_TIPS";
    //                     break;
    //                 case '0302': $TypeCon = "TYPE_SOCCER_GOAL";
    //                     break;
    //                 default:
    //                     $TypeCon = "NULL";
    //                     break;
    //             }
    //         }
    //         else{

    //               $TypeCon = "NULL";
    //         }
            
    //         $link = $arr_All[0]->AffectURL;
    //         $content = $arr_All[0]->Content; 
    //     }
    //     else
    //     {
    //         $id             = "NULL";
    //         $notetype       = "NULL";
    //         $link           = "NULL";
    //         $content        = "NULL"; 
    //         $typeCha        = "NULL";
    //         $TypeCon        = "NULL";
    //         $Serial_Number = "NULL";
    //     }

    //     $arr = array('id'=>$id,'link'=>$link,'content'=>$content,
    //                 'typeCha'=>$typeCha,'typeCon'=>$TypeCon,'serial'=>$Serial_Number,
    //                 'sound'=>$sound,'vibration'=> $vibration,'checktypeNotifi'=>$Type_Notification);
    //     return $arr;
    // }

    // public function loadSerialNumberWin()
    // {
    //     $typelottery = "";
    //     $table = "";
    //     $txtdateNow = date("Y").date("m").date("d");
    //     $l_serial = array();
    //     $l_Giai   = array();
    //     if(isset($_POST['type']))
    //     {
    //         $typelottery = $_POST['type'];

    //         // damacai
    //         if($typelottery == "damacai")
    //         { 
    //             $list_Damacai = $this->checkExitDate($txtdateNow,'lot_damacai');
    //             $myplay       = $this->checkExitDateType($txtdateNow,$typelottery);
    //             if(count($list_Damacai) != 0 && count($myplay) != 0)
    //             {
    //                 for($i=0; $i<count($myplay); $i++)
    //                 {
    //                     $serialNumber = $myplay[$i]->SeriaNumber;
    //                     $NoFist       = $myplay[$i]->NoFrist;
    //                     $NoTwo        = $myplay[$i]->NoTwo;
    //                     $NoThree      = $myplay[$i]->NoThree;
    //                     $NoFour       = $myplay[$i]->NoFour;
    //                     $NoFine       = $myplay[$i]->NoFine;
    //                     $_1st         = $list_Damacai["1_3D_1st_Price"];
    //                     $_2nd         = $list_Damacai["1_3D_2nd_Price"];
    //                     $_3rd         = $list_Damacai["1_3D_2nd_Price"];
    //                     $_Specail     = $list_Damacai["Special"];
    //                     $_Consolation = $list_Damacai["Consolation"];

    //                     // 1 first
    //                     if($NoFist == $_1st || $NoTwo == $_1st || $NoThree == $_1st || $NoFour == $_1st || $NoFine == $_1st)
    //                     {
    //                        array_push($l_serial,$serialNumber."- Reward 1 st");
    //                     }
    //                     if($NoFist == $_2nd || $NoTwo == $_2nd || $NoThree == $_2nd || $NoFour == $_2nd || $NoFine == $_2nd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 2 nd");
    //                     }

    //                     if($NoFist == $_3rd || $NoTwo == $_3rd || $NoThree == $_3rd || $NoFour == $_3rd || $NoFine == $_3rd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 3 rd");
    //                     }

    //                     $arr_Special          = explode("|",$_Specail);
    //                     for($j=0;$j<count($arr_Special);$j++)
    //                     {
    //                         if($NoFist == $arr_Special[$j] || $NoTwo == $arr_Special[$j] || $NoThree == $arr_Special[$j] || $NoFour == $arr_Special[$j] || $NoFine == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }
    //                     }

    //                     $arr_consolation          = explode("|",$_Consolation);
    //                     for($h=0;$h<count($arr_consolation);$h++)
    //                     {
    //                         if($NoFist == $arr_consolation[$h] || $NoTwo == $arr_consolation[$h] || $NoThree == $arr_consolation[$h] || $NoFour == $arr_Special[$h] || $NoFine == $arr_Special[$h] )
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         } 
    //                     }
    //                 }
    //             }
    //         }
    //         // Magnum

    //         if($typelottery == "magnum")
    //         { 
    //             $list_Magnum  = $this->checkExitDate($txtdateNow,'lot_magnum');
    //             $myplay       = $this->checkExitDateType($txtdateNow,$typelottery);
    //             if(count($list_Magnum) != 0 && count($myplay) != 0)
    //             {
    //                 for($i=0; $i<count($myplay); $i++)
    //                 {
    //                     $serialNumber = $myplay[$i]->SeriaNumber;
    //                     $NoFist       = $myplay[$i]->NoFrist;
    //                     $NoTwo        = $myplay[$i]->NoTwo;
    //                     $NoThree      = $myplay[$i]->NoThree;
    //                     $NoFour       = $myplay[$i]->NoFour;
    //                     $NoFine       = $myplay[$i]->NoFine;
    //                     $_1st         = $list_Magnum["4D_1st_Price"];
    //                     $_2nd         = $list_Magnum["4D_2nd_Price"];
    //                     $_3rd         = $list_Magnum["4D_3rd_Price"];
    //                     $_Specail     = $list_Magnum["Special"];
    //                     $_Consolation = $list_Magnum["Consolation"];

    //                     // 1 first
    //                     if($NoFist == $_1st || $NoTwo == $_1st || $NoThree == $_1st || $NoFour == $_1st || $NoFine == $_1st)
    //                     {
    //                        array_push($l_serial,$serialNumber."- Reward 1 st");
    //                     }
    //                     if($NoFist == $_2nd || $NoTwo == $_2nd || $NoThree == $_2nd || $NoFour == $_2nd || $NoFine == $_2nd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 2 nd");
    //                     }

    //                     if($NoFist == $_3rd || $NoTwo == $_3rd || $NoThree == $_3rd || $NoFour == $_3rd || $NoFine == $_3rd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 3 rd");
    //                     }

    //                     $arr_Special          = explode("|",$_Specail);
    //                     for($j=0;$j<count($arr_Special);$j++)
    //                     {
    //                         if($NoFist == $arr_Special[$j] || $NoTwo == $arr_Special[$j] || $NoThree == $arr_Special[$j] || $NoFour == $arr_Special[$j] || $NoFine == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }
    //                     }

    //                     $arr_consolation          = explode("|",$_Consolation);
    //                     for($h=0;$h<count($arr_consolation);$h++)
    //                     {
    //                         if($NoFist == $arr_consolation[$h] || $NoTwo == $arr_consolation[$h] || $NoThree == $arr_consolation[$h] || $NoFour == $arr_Special[$h] || $NoFine == $arr_Special[$h] )
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         } 
    //                     }
    //                 }
    //             }
    //         }

    //         if($typelottery == "toto")
    //         { 
    //             $list_toto  = $this->checkExitDate($txtdateNow,'lot_toto4d');
    //             $myplay       = $this->checkExitDateType($txtdateNow,$typelottery);
    //             if(count($list_toto) != 0 && count($myplay) != 0)
    //             {
    //                 for($i=0; $i<count($myplay); $i++)
    //                 {
    //                     $serialNumber = $myplay[$i]->SeriaNumber;
    //                     $NoFist       = $myplay[$i]->NoFrist;
    //                     $NoTwo        = $myplay[$i]->NoTwo;
    //                     $NoThree      = $myplay[$i]->NoThree;
    //                     $NoFour       = $myplay[$i]->NoFour;
    //                     $NoFine       = $myplay[$i]->NoFine;
    //                     $NoToToFist   = $myplay[$i]->NoForFrist;
    //                     $NoToToTwo    = $myplay[$i]->NoForTwo;
    //                     $NoToToThree  = $myplay[$i]->NoForThree;
    //                     $NoToToFour   = $myplay[$i]->NoForFour;
    //                     $NoToToFine   = $myplay[$i]->NoForFine;
    //                     $_1st         = $list_toto["ST_1st_Price"];
    //                     $_2nd         = $list_toto["ST_2nd_Price"];
    //                     $_3rd         = $list_toto["ST_3rd_Price"];
    //                     $_Specail     = $list_toto["Special"];
    //                     $_Consolation = $list_toto["Consolation"];
    //                     $Grand        = $list_toto["Mega"];  
    //                     $superme      = $list_toto["Power"];  
    //                     $powerme      = $list_toto["Super"]; 
                     
    //                      // Sin ToTo No1
    //                     if($Grand != "")
    //                     {
    //                         $_GrandToTo      = explode("|", $Grand);
    //                         $_GrandToTo      = array_filter($_GrandToTo);
    //                     }
    //                     if($superme !=  "")
    //                     {
    //                         $_SupermeToto    = explode("|", $superme);
    //                         $_SupermeToto    = array_filter($_SupermeToto);
    //                     }
    //                     if($powerme != "")
    //                     {
    //                         $_PowermeToto    = explode("|", $powerme);
    //                         $_PowermeToto    = array_filter($_PowermeToto);
    //                     }
                        
    //                     if($NoToToFist != "" || $NoToToFist != " " && $Grand != "" || $superme != "" || $powerme != "")
    //                     {
    //                         $NoToToFist      = explode("|", $NoToToFist);
    //                         $NoToToFist      = array_filter($NoToToFist);
                            
    //                         // compare item two array return one array other item same with two array 
    //                         if((count($NoToToFist) > 0 && count($_GrandToTo)>0) ||(count($NoToToFist) > 0 && count($_SupermeToto) >0) ||( count($NoToToFist) > 0 && count($_PowermeToto)>0))
    //                         {
    //                             $result_no1  = array_diff($NoToToFist, $_GrandToTo);
    //                             $result_No1_Sup = array_diff($NoToToFist,$_SupermeToto);
    //                             $result_No1_Power =  array_diff($NoToToFist,$_PowermeToto);
    //                             if(count($result_no1) < 4 || count($result_No1_Sup) < 4 || count($result_No1_Power)< 4)
    //                             {
    //                               array_push($l_serial,$serialNumber."- Reward ToTo"); 
    //                             }
    //                         }                           
    //                     }

    //                     if($NoToToTwo != "" || $NoToToTwo != " " && $Grand != "" || $superme != "" || $powerme != "")
    //                     {
    //                         $NoToToTwo        = explode("|", $NoToToTwo);
    //                         $NoToToTwo        = array_filter($NoToToTwo);
                            
    //                         // compare item two array return one array other item same with two array 
    //                         if((count($NoToToTwo)>0 && count($_GrandToTo)>0) ||(count($NoToToTwo)>0 && count($_SupermeToto) >0 )||(count($NoToToTwo)>0 && count($_PowermeToto)>0))
    //                         {
    //                             $result_no2  = array_diff($NoToToTwo, $_GrandToTo);
    //                             $result_No2_Sup = array_diff($NoToToTwo,$_SupermeToto);
    //                             $result_No2_Power =  array_diff($NoToToTwo,$_PowermeToto);
    //                             if(count($result_no2) < 4 || count($result_No2_Sup) < 4 || count($result_No2_Power)< 4)
    //                             {
    //                               array_push($l_serial,$serialNumber."- Reward ToTo");  
    //                             } 
    //                         } 
    //                     }

    //                     if($NoToToThree != "" || $NoToToThree != " " && $Grand != "" || $superme != "" || $powerme != "")
    //                     {
    //                         $NoToToThree      = explode("|", $NoToToThree);
    //                         $NoToToThree      = array_filter($NoToToThree);
                            
    //                         // compare item two array return one array other item same with two array 
    //                         if((count($NoToToThree)>0 && count($_GrandToTo)>0) ||(count($NoToToThree)>0 && count($_SupermeToto) >0 )||(count($NoToToThree)>0 && count($_PowermeToto)>0 ))
    //                         {
    //                             $result_no3       = array_diff($NoToToThree, $_GrandToTo);
    //                             $result_No3_Sup   = array_diff($NoToToThree,$_SupermeToto);
    //                             $result_No3_Power =  array_diff($NoToToThree,$_PowermeToto);
    //                             if(count($result_no3) < 4 || count($result_No3_Sup) < 4 || count($result_No3_Power)< 4)
    //                             {
    //                               array_push($l_serial,$serialNumber."- Reward ToTo");  
    //                             } 
    //                         }
                            
    //                     }

    //                     if($NoToToFour != "" || $NoToToFour != " " && $Grand != "" || $superme != "" || $powerme != "")
    //                     {
    //                         $NoToToFour      = explode("|", $NoToToFour);
    //                         $NoToToFour      = array_filter($NoToToFour);
    //                         // compare item two array return one array other item same with two array 
    //                         if((count($NoToToFour)>0 && count($_GrandToTo)>0 )||(count($NoToToFour)>0 && count($_SupermeToto) >0) ||(count($NoToToFour)>0 && count($_PowermeToto)>0))
    //                         {
    //                             $result_no4  = array_diff($NoToToFour, $_GrandToTo);
    //                             $result_No4_Sup = array_diff($NoToToFour,$_SupermeToto);
    //                             $result_No4_Power =  array_diff($NoToToFour,$_PowermeToto);
    //                             if(count($result_no4) < 4 || count($result_No4_Sup) < 4 || count($result_No4_Power)< 4)
    //                             {
    //                               array_push($l_serial,$serialNumber."- Reward ToTo");  
    //                             } 
    //                         }   
    //                     }

    //                     if($NoToToFine != "" || $NoToToFine != " " && $Grand != "" || $superme != "" || $powerme != "")
    //                     {
    //                         $NoToToFine      = explode("|", $NoToToFine);
    //                         $NoToToFine      = array_filter($NoToToFine);
    //                         // compare item two array return one array other item same with two array
    //                         if(count($NoToToFine)>0 && count($_GrandToTo)>0 ||(count($NoToToFine)>0 && count($_SupermeToto) >0 )||(count($NoToToFine)>0 && count($_PowermeToto)>0) )
    //                         {
    //                             $result_no5         = array_diff($NoToToFine, $_GrandToTo);
    //                             $result_No5_Sup     = array_diff($NoToToFine,$_SupermeToto);
    //                             $result_No5_Power   =  array_diff($NoToToFine,$_PowermeToto);
    //                             if(count($result_no5) < 4 || count($result_No5_Sup) < 4 || count($result_No5_Power) < 4)
    //                             {
    //                               array_push($l_serial,$serialNumber."- Reward ToTo");  
    //                             } 
    //                         } 
                            
    //                     }

    //                     if($NoFist == $_1st || $NoTwo == $_1st || $NoThree == $_1st || $NoFour == $_1st || $NoFine == $_1st)
    //                     {
    //                        array_push($l_serial,$serialNumber."- Reward 1 st");
    //                     }
    //                     if($NoFist == $_2nd || $NoTwo == $_2nd || $NoThree == $_2nd || $NoFour == $_2nd || $NoFine == $_2nd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 2 nd");
    //                     }

    //                     if($NoFist == $_3rd || $NoTwo == $_3rd || $NoThree == $_3rd || $NoFour == $_3rd || $NoFine == $_3rd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 3 rd");
    //                     }

    //                     $arr_Special          = explode("|",$_Specail);
    //                     for($j=0;$j<count($arr_Special);$j++)
    //                     {
    //                         if($NoFist == $arr_Special[$j] || $NoTwo == $arr_Special[$j] || $NoThree == $arr_Special[$j] || $NoFour == $arr_Special[$j] || $NoFine == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }
    //                     }

    //                     $arr_consolation          = explode("|",$_Consolation);
    //                     for($h=0;$h<count($arr_consolation);$h++)
    //                     {
    //                         if($NoFist == $arr_consolation[$h] || $NoTwo == $arr_consolation[$h] || $NoThree == $arr_consolation[$h] || $NoFour == $arr_Special[$h] || $NoFine == $arr_Special[$h] )
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         } 
    //                     }
    //                 }
    //             }
    //         }

    //         //SINGAPORE

    //         if($typelottery == "sintoto")
    //         {
    //             $list_sintoto  = $this->checkExitDate($txtdateNow,'lot_sintoto');
    //             $myplay       = $this->checkExitDateType($txtdateNow,$typelottery);
    //             if(count($list_sintoto) != 0 && count($myplay) != 0)
    //             {
    //                 for($i=0; $i<count($myplay); $i++)
    //                 {
    //                     $serialNumber = $myplay[$i]->SeriaNumber;
    //                     $NoToToFist   = $myplay[$i]->NoForFrist;
    //                     $NoToToTwo    = $myplay[$i]->NoForTwo;
    //                     $NoToToThree  = $myplay[$i]->NoForThree;
    //                     $NoToToFour   = $myplay[$i]->NoForFour;
    //                     $NoToToFine   = $myplay[$i]->NoForFine;
    //                     $_WinNo         = $list_sintoto["WinNo"];                       
    //                      // Sin ToTo No1                        
    //                     if($NoToToFist != "" || $NoToToFist != " " && $_WinNo != "" )
    //                     {
    //                         $NoToToFist      = explode("|", $NoToToFist);
    //                         $NoToToFist      = array_filter($NoToToFist);
    //                         $_WinNo1         = explode("|", $_WinNo);
    //                         $_WinNo1         = array_filter($_WinNo1);
    //                         // compare item two array return one array other item same with two array
    //                         if(count($NoToToFist) >0 && count($_WinNo1) >0)
    //                         {
    //                             $result_no1  = array_diff($NoToToFist, $_WinNo1);
    //                             if(count($result_no1) < 4 )
    //                             {
    //                               array_push($l_serial,$serialNumber."- Reward ToTo"); 
    //                             } 
    //                         }                            
    //                     }

    //                     if($NoToToTwo != "" || $NoToToTwo != " " && $_WinNo != "")
    //                     {
    //                         $NoToToTwo        = explode("|", $NoToToTwo);
    //                         $NoToToTwo        = array_filter($NoToToTwo);
    //                         $_WinNo2          = explode("|", $_WinNo); 
    //                         $_WinNo2          = array_filter($_WinNo2); 
    //                         // compare item two array return one array other item same with two array 
    //                         if(count($NoToToTwo)>0 && count($_WinNo2) >0)
    //                         {
    //                             $result_no2  = array_diff($NoToToTwo, $_WinNo2);                           
    //                             if(count($result_no2) < 4)
    //                             {
    //                               array_push($l_serial,$serialNumber."- Reward ToTo");  
    //                             }  
    //                         }
                            
    //                     }

    //                     if($NoToToThree != "" || $NoToToThree != " " && $_WinNo != "")
    //                     {
    //                         $NoToToThree      = explode("|", $NoToToThree);
    //                         $NoToToThree      = array_filter($NoToToThree);
    //                         $_WinNo3          = explode("|", $_WinNo);
    //                         $_WinNo3          = array_filter($_WinNo3);
    //                         // compare item two array return one array other item same with two array 
    //                         if(count($NoToToThree)>0 && count($_WinNo3)>0)
    //                         {
    //                             $result_no3       = array_diff($NoToToThree, $_WinNo3);
    //                             if(count($result_no3) < 4 )
    //                             {
    //                               array_push($l_serial,$serialNumber."- Reward ToTo");  
    //                             } 
    //                         }
                            
    //                     }

    //                     if($NoToToFour != "" || $NoToToFour != " " && $_WinNo != "")
    //                     {
    //                         $NoToToFour        = explode("|", $NoToToFour);
    //                         $NoToToFour        = array_filter($NoToToFour);
    //                         $_WinNo4           = explode("|", $_WinNo);
    //                         $_WinNo4           = array_filter($_WinNo4);
    //                         // compare item two array return one array other item same with two array
    //                         if(count($NoToToFour) >0 && count($_WinNo4) >0)
    //                         {
    //                             $result_no4  = array_diff($NoToToFour, $_WinNo4);
    //                             if(count($result_no4) < 4 )
    //                             {
    //                               array_push($l_serial,$serialNumber."- Reward ToTo");  
    //                             } 
    //                         } 
                            
    //                     }

    //                     if($NoToToFine != "" || $NoToToFine != " " && $_WinNo != "")
    //                     {
    //                         $NoToToFine      = explode("|", $NoToToFine);
    //                         $NoToToFine      = array_filter($NoToToFine);
    //                         $_WinNo5         = explode("|", $_WinNo);
    //                         $_WinNo5         = array_filter($_WinNo5);
    //                         // compare item two array return one array other item same with two array
    //                         if(count($NoToToFine)>0 && count($_WinNo5) > 0)
    //                         {
    //                             $result_no5  = array_diff($NoToToFine, $_WinNo5);
    //                             if(count($result_no5) < 4)
    //                             {
    //                               array_push($l_serial,$serialNumber."- Reward ToTo");  
    //                             }  
    //                         } 
                            
    //                     }  
    //                 }
    //             }
    //         }

    //         if($typelottery == "sinfourd")
    //         {
    //             $list_sin4d  = $this->checkExitDate($txtdateNow,'lot_sin4d');
    //             $myplay       = $this->checkExitDateType($txtdateNow,$typelottery);
    //             if(count($list_sin4d) != 0 && count($myplay) != 0)
    //             {
    //                 for($i=0; $i<count($myplay); $i++)
    //                 {
    //                     $serialNumber = $myplay[$i]->SeriaNumber;
    //                     $NoFist       = $myplay[$i]->NoFrist;
    //                     $NoTwo        = $myplay[$i]->NoTwo;
    //                     $NoThree      = $myplay[$i]->NoThree;
    //                     $NoFour       = $myplay[$i]->NoFour;
    //                     $NoFine       = $myplay[$i]->NoFine;
    //                     $_1st         = $list_sin4d["1st"];
    //                     $_2nd         = $list_sin4d["2nd"];
    //                     $_3rd         = $list_sin4d["3rd"];
    //                     $_Specail     = $list_sin4d["Special"];
    //                     $_Consolation = $list_sin4d["Consolation"];

    //                     // 1 first
    //                     if($NoFist == $_1st || $NoTwo == $_1st || $NoThree == $_1st || $NoFour == $_1st || $NoFine == $_1st)
    //                     {
    //                        array_push($l_serial,$serialNumber."- Reward 1 st");
    //                     }
    //                     if($NoFist == $_2nd || $NoTwo == $_2nd || $NoThree == $_2nd || $NoFour == $_2nd || $NoFine == $_2nd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 2 nd");
    //                     }

    //                     if($NoFist == $_3rd || $NoTwo == $_3rd || $NoThree == $_3rd || $NoFour == $_3rd || $NoFine == $_3rd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 3 rd");
    //                     }

    //                     $arr_Special          = explode("|",$_Specail);
    //                     for($j=0;$j<count($arr_Special);$j++)
    //                     {
    //                         if($NoFist == $arr_Special[$j] || $NoTwo == $arr_Special[$j] || $NoThree == $arr_Special[$j] || $NoFour == $arr_Special[$j] || $NoFine == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }
    //                     }

    //                     $arr_consolation          = explode("|",$_Consolation);
    //                     for($h=0;$h<count($arr_consolation);$h++)
    //                     {
    //                         if($NoFist == $arr_consolation[$h] || $NoTwo == $arr_consolation[$h] || $NoThree == $arr_consolation[$h] || $NoFour == $arr_Special[$h] || $NoFine == $arr_Special[$h] )
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         } 
    //                     }
    //                 }
    //             }
    //         }

    //         //  Infomation for lotter East Malaysia
    //         if($typelottery == "cashsweep")
    //         { 
    //             $l_cashsweep  = $this->checkExitDate($txtdateNow,'lot_cashsweep');
    //             $myplay       = $this->checkExitDateType($txtdateNow,$typelottery);
    //             if(count($l_cashsweep) != 0 && count($myplay) != 0)
    //             {
    //                 for($i=0; $i<count($myplay); $i++)
    //                 {
    //                     $serialNumber = $myplay[$i]->SeriaNumber;
    //                     $NoFist       = $myplay[$i]->NoFrist;
    //                     $NoTwo        = $myplay[$i]->NoTwo;
    //                     $NoThree      = $myplay[$i]->NoThree;
    //                     $NoFour       = $myplay[$i]->NoFour;
    //                     $NoFine       = $myplay[$i]->NoFine;
    //                     $_1st         = $l_cashsweep["1st"];
    //                     $_2nd         = $l_cashsweep["2nd"];
    //                     $_3rd         = $l_cashsweep["3rd"];
    //                     $_Specail     = $l_cashsweep["Special"];
    //                     $_Consolation = $l_cashsweep["Consolation"];

    //                     // No 1 lottery cashsweep
    //                     if($_1st != "" || $_1st != " ")
    //                     {
    //                         $_1st = explode("|",$_1st);
    //                         if(isset($_1st[0]))
    //                         {
    //                            if($NoFist == $_1st[0] || $NoTwo == $_1st[0] || $NoThree == $_1st[0] || $NoFour == $_1st[0] || $NoFine == $_1st[0])
    //                             {
    //                                array_push($l_serial,$serialNumber."- Reward 1 st");
    //                             } 
    //                         }
    //                         if(isset($_1st[1]))
    //                         {
    //                             if($NoFist == $_1st[1] || $NoTwo == $_1st[1] || $NoThree == $_1st[1] || $NoFour == $_1st[1] || $NoFine == $_1st[1])
    //                             {
    //                                array_push($l_serial,$serialNumber."- Reward 1 st");
    //                             } 
    //                         }
    //                     }

    //                     if($_2nd != "" || $_2nd != " ")
    //                     {
    //                         $_2nd = explode("|",$_2nd);
    //                         if(isset($_2nd[0]))
    //                         {
    //                            if($NoFist == $_2nd[0] || $NoTwo == $_2nd[0] || $NoThree == $_2nd[0] || $NoFour == $_2nd[0] || $NoFine == $_2nd[0])
    //                             {
    //                                array_push($l_serial,$serialNumber."- Reward 1 st");
    //                             } 
    //                         }
    //                         if(isset($_2nd[1]))
    //                         {
    //                             if($NoFist == $_2nd[1] || $NoTwo == $_2nd[1] || $NoThree == $_2nd[1] || $NoFour == $_2nd[1] || $NoFine == $_2nd[1])
    //                             {
    //                                array_push($l_serial,$serialNumber."- Reward 1 nd");
    //                             } 
    //                         }
    //                     }

    //                     if($_3rd != "" || $_3rd != " ")
    //                     {
    //                         $_3rd = explode("|",$_3rd);
    //                         if(isset($_3rd[0]))
    //                         {
    //                            if($NoFist == $_3rd[0] || $NoTwo == $_3rd[0] || $NoThree == $_3rd[0] || $NoFour == $_3rd[0] || $NoFine == $_3rd[0])
    //                             {
    //                                array_push($l_serial,$serialNumber."- Reward 3 rd");
    //                             } 
    //                         }
    //                         if(isset($_3rd[1]))
    //                         {
    //                             if($NoFist == $_3rd[1] || $NoTwo == $_3rd[1] || $NoThree == $_3rd[1] || $NoFour == $_3rd[1] || $NoFine == $_3rd[1])
    //                             {
    //                                array_push($l_serial,$serialNumber."- Reward 3 rd");
    //                             } 
    //                         }
    //                     }
                            
    //                     $arr_Special          = explode("|",$_Specail);
    //                     for($j=0;$j<count($arr_Special);$j++)
    //                     {
    //                         if($NoFist == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }
    //                         if($NoTwo == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }

    //                         if($NoThree == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }

    //                         if($NoFour == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }

    //                         if($NoFine == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }
    //                     }

    //                     $arr_consolation          = explode("|",$_Consolation);
    //                     for($h=0;$h<count($arr_consolation);$h++)
    //                     {
    //                         if($NoFist == $arr_consolation[$h])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         }
    //                         if($NoTwo == $arr_consolation[$h])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         }

    //                         if($NoThree == $arr_consolation[$h])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         }

    //                         if($NoFour == $arr_Special[$h])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         }

    //                         if($NoFine == $arr_Special[$h])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         }
    //                     }
    //                 }
    //             }
    //         }

    //         if($typelottery == "stc4d")
    //         { 
    //             $l_stc4d  = $this->checkExitDate($txtdateNow,'lot_sandakan');
    //             $myplay       = $this->checkExitDateType($txtdateNow,$typelottery);
    //             if(count($l_stc4d) != 0 && count($myplay) != 0)
    //             {
    //                 for($i=0; $i<count($myplay); $i++)
    //                 {
    //                     $serialNumber = $myplay[$i]->SeriaNumber;
    //                     $NoFist       = $myplay[$i]->NoFrist;
    //                     $NoTwo        = $myplay[$i]->NoTwo;
    //                     $NoThree      = $myplay[$i]->NoThree;
    //                     $NoFour       = $myplay[$i]->NoFour;
    //                     $NoFine       = $myplay[$i]->NoFine;
    //                     $_1st         = $l_stc4d["1st"];
    //                     $_2nd         = $l_stc4d["2nd"];
    //                     $_3rd         = $l_stc4d["3rd"];
    //                     $_Specail     = $l_stc4d["Special"];
    //                     $_Consolation = $l_stc4d["Consolation"];

    //                     // 1 first
    //                     if($NoFist == $_1st)
    //                     {
    //                        array_push($l_serial,$serialNumber."- Reward 1 st");
    //                     }
    //                     if($NoFist == $_2nd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 2 nd");
    //                     }

    //                     if($NoFist == $_3rd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 3 rd");
    //                     }
    //                     // 2 first

    //                     if($NoTwo == $_1st)
    //                     {
    //                        array_push($l_serial,$serialNumber."- Reward 1 st");
    //                     }
    //                     if($NoTwo == $_2nd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 2 nd");
    //                     }

    //                     if($NoTwo == $_3rd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 3 rd");
    //                     }

    //                     // 3 rd
    //                     if($NoThree == $_1st)
    //                     {
    //                        array_push($l_serial,$serialNumber."- Reward 1 st");
    //                     }
    //                     if($NoThree == $_2nd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 2 nd");
    //                     }

    //                     if($NoThree == $_3rd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 3 rd");
    //                     }

    //                     // 4 
    //                     if($NoFour == $_1st)
    //                     {
    //                       array_push($l_serial,$serialNumber."- Reward 1 st");  
    //                     }
    //                     if($NoFour == $_2nd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 2 nd");
    //                     }

    //                     if($NoFour == $_3rd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 3 rd");
    //                     }

    //                     // 5

    //                     if($NoFine == $_1st)
    //                     {
    //                        array_push($l_serial,$serialNumber."- Reward 1 st");  
    //                     }
    //                     if($NoFine == $_2nd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 2 nd");
    //                     }

    //                     if($NoFine == $_3rd)
    //                     {
    //                         array_push($l_serial,$serialNumber."- Reward 3 rd");
    //                     }

    //                     $arr_Special          = explode("|",$_Specail);
    //                     for($j=0;$j<count($arr_Special);$j++)
    //                     {
    //                         if($NoFist == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }
    //                         if($NoTwo == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }

    //                         if($NoThree == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }

    //                         if($NoFour == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }

    //                         if($NoFine == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }
    //                     }

    //                     $arr_consolation          = explode("|",$_Consolation);
    //                     for($h=0;$h<count($arr_consolation);$h++)
    //                     {
    //                         if($NoFist == $arr_consolation[$h])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         }
    //                         if($NoTwo == $arr_consolation[$h])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         }

    //                         if($NoThree == $arr_consolation[$h])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         }

    //                         if($NoFour == $arr_Special[$h])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         }

    //                         if($NoFine == $arr_Special[$h])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         }
    //                     }
    //                 }
    //             }
    //         }

    //         if($typelottery == "sabah88")
    //         { 
    //             $l_sabah  = $this->checkExitDate($txtdateNow,'lot_sabah');
    //             $myplay       = $this->checkExitDateType($txtdateNow,$typelottery);
    //             if(count($l_sabah) != 0 && count($myplay) != 0)
    //             {
    //                 for($i=0; $i<count($myplay); $i++)
    //                 {
    //                     $serialNumber = $myplay[$i]->SeriaNumber;
    //                     $NoFist       = $myplay[$i]->NoFrist;
    //                     $NoTwo        = $myplay[$i]->NoTwo;
    //                     $NoThree      = $myplay[$i]->NoThree;
    //                     $NoFour       = $myplay[$i]->NoFour;
    //                     $NoFine       = $myplay[$i]->NoFine;
    //                     $NoToToFist   = $myplay[$i]->NoForFrist;
    //                     $NoToToTwo    = $myplay[$i]->NoForTwo;
    //                     $NoToToThree  = $myplay[$i]->NoForThree;
    //                     $NoToToFour   = $myplay[$i]->NoForFour;
    //                     $NoToToFine   = $myplay[$i]->NoForFine;
    //                     $_1st         = $l_sabah["1st"];
    //                     $_2nd         = $l_sabah["2nd"];
    //                     $_3rd         = $l_sabah["3rd"];
    //                     $_Specail     = $l_sabah["Special"];
    //                     $_Consolation = $l_sabah["Consolation"];
    //                     $_toto        = $l_sabah["Lotto"];

    //                     $arr_toto = array();
    //                     if($_toto != "")
    //                     {
    //                         $arr_toto6 = explode("|", $_toto);
    //                         array_push($arr_toto,$arr_toto6[0],$arr_toto6[1],$arr_toto6[2],$arr_toto6[3],$arr_toto6[4],$arr_toto6[5],"");
    //                     }

    //                     // remove space in array 
    //                     $arr_toto = array_filter($arr_toto);
    //                     // Sin ToTo No1
    //                     if($NoToToFist != "" || $NoToToFist != " " && $_toto != "")
    //                     {
    //                         $NoToToFist     = explode("|", $NoToToFist);
    //                         $NoToToFist     = array_filter($NoToToFist);
    //                         // compare item two array return one array other item same with two array 
    //                         if(count($NoToToFist) > 0 && count($arr_toto) > 0)
    //                         {
    //                             $result_no1  = array_diff($NoToToFist,$arr_toto);
    //                             if(count($result_no1) == 0)
    //                             {
    //                               array_push($l_serial,$serialNumber."- Reward ToTo");  
    //                             } 
    //                         }  
    //                     }

    //                     // Sin ToTo No2
    //                     if($NoToToTwo != "" || $NoToToTwo != " " && $_toto != "")
    //                     {
    //                         $NoToToTwo     =  explode("|", $NoToToTwo);
    //                         $NoToToTwo     = array_filter($NoToToTwo);
    //                         // compare item two array return one array other item same with two array
    //                         if(count($NoToToTwo) > 0 && count($arr_toto) > 0)
    //                         {
    //                             $result_no2  = array_diff($NoToToTwo,$arr_toto);
    //                             if(count($result_no2) == 0)
    //                             {
    //                               array_push($l_serial,$serialNumber."- Reward ToTo");  
    //                             }
    //                         }  
    //                     }

    //                     // Sin ToTo No3
    //                     if($NoToToThree != "" || $NoToToThree != " " && $_toto != "")
    //                     {
    //                         $NoToToThree = explode("|", $NoToToThree);
    //                         $NoToToThree = array_filter($NoToToThree);
    //                         // compare item two array return one array other item same with two array 
    //                         if(count($NoToToThree) > 0 && count($arr_toto) > 0)
    //                         {
    //                             $result_no3  = array_diff($NoToToThree, $arr_toto);
    //                             if(count($result_no3) == 0)
    //                             {
    //                               array_push($l_serial,$serialNumber."- Reward ToTo");  
    //                             } 
    //                         }   
    //                     }

    //                     // Sin ToTo No4
    //                     if($NoToToFour != "" || $NoToToFour != " " && $_toto != "")
    //                     {
    //                         $NoToToFour = explode("|", $NoToToFour);
    //                         $NoToToFour = array_filter($NoToToFour);
    //                         // compare item two array return one array other item same with two array 
    //                         if(count($NoToToFour) >0 && count($arr_toto) > 0)
    //                         {
    //                             $result_no4  = array_diff($NoToToFour, $arr_toto);
    //                             if(count($result_no4) == 0)
    //                             {
    //                               array_push($l_serial,$serialNumber."- Reward ToTo");  
    //                             } 
    //                         }
                            
    //                     }

    //                     // Sin ToTo No5
    //                     if($NoToToFine != "" || $NoToToFine != " " && $_toto != "")
    //                     {
    //                         $NoToToFine =  explode("|", $NoToToFine);
    //                         $NoToToFine =  array_filter($NoToToFine);
    //                         if(count($NoToToFine) > 0 && count($arr_toto) > 0)
    //                         {
    //                            $result_no5  = array_diff($NoToToFine, $arr_toto);
    //                             if(count($result_no5) == 0)
    //                             {
    //                               array_push($l_serial,$serialNumber."- Reward ToTo");  
    //                             } 
    //                         }
    //                         // compare item two array return one array other item same with two array   
    //                     }

    //                      // No 1 lottery cashsweep
    //                     if($_1st != "" || $_1st != " ")
    //                     {
    //                         $_1st = explode("|",$_1st);
    //                         if(isset($_1st[0]))
    //                         {
    //                            if($NoFist == $_1st[0] || $NoTwo == $_1st[0] || $NoThree == $_1st[0] || $NoFour == $_1st[0] || $NoFine == $_1st[0])
    //                             {
    //                                array_push($l_serial,$serialNumber."- Reward 1 st");
    //                             } 
    //                         }
    //                         if(isset($_1st[1]))
    //                         {
    //                             if($NoFist == $_1st[1] || $NoTwo == $_1st[1] || $NoThree == $_1st[1] || $NoFour == $_1st[1] || $NoFine == $_1st[1])
    //                             {
    //                                array_push($l_serial,$serialNumber."- Reward 1 st");
    //                             } 
    //                         }
    //                     }

    //                     if($_2nd != "" || $_2nd != " ")
    //                     {
    //                         $_2nd = explode("|",$_2nd);
    //                         if(isset($_2nd[0]))
    //                         {
    //                            if($NoFist == $_2nd[0] || $NoTwo == $_2nd[0] || $NoThree == $_2nd[0] || $NoFour == $_2nd[0] || $NoFine == $_2nd[0])
    //                             {
    //                                array_push($l_serial,$serialNumber."- Reward 1 st");
    //                             } 
    //                         }
    //                         if(isset($_2nd[1]))
    //                         {
    //                             if($NoFist == $_2nd[1] || $NoTwo == $_2nd[1] || $NoThree == $_2nd[1] || $NoFour == $_2nd[1] || $NoFine == $_2nd[1])
    //                             {
    //                                array_push($l_serial,$serialNumber."- Reward 1 nd");
    //                             } 
    //                         }
    //                     }

    //                     if($_3rd != "" || $_3rd != " ")
    //                     {
    //                         $_3rd = explode("|",$_3rd);
    //                         if(isset($_3rd[0]))
    //                         {
    //                            if($NoFist == $_3rd[0] || $NoTwo == $_3rd[0] || $NoThree == $_3rd[0] || $NoFour == $_3rd[0] || $NoFine == $_3rd[0])
    //                             {
    //                                array_push($l_serial,$serialNumber."- Reward 3 rd");
    //                             } 
    //                         }
    //                         if(isset($_3rd[1]))
    //                         {
    //                             if($NoFist == $_3rd[1] || $NoTwo == $_3rd[1] || $NoThree == $_3rd[1] || $NoFour == $_3rd[1] || $NoFine == $_3rd[1])
    //                             {
    //                                array_push($l_serial,$serialNumber."- Reward 3 rd");
    //                             } 
    //                         }
    //                     }

    //                     $arr_Special          = explode("|",$_Specail);
    //                     for($j=0;$j<count($arr_Special);$j++)
    //                     {
    //                         if($NoFist == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }
    //                         if($NoTwo == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }

    //                         if($NoThree == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }

    //                         if($NoFour == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }

    //                         if($NoFine == $arr_Special[$j])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Special");
    //                         }
    //                     }

    //                     $arr_consolation          = explode("|",$_Consolation);
    //                     for($h=0;$h<count($arr_consolation);$h++)
    //                     {
    //                         if($NoFist == $arr_consolation[$h])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         }
    //                         if($NoTwo == $arr_consolation[$h])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         }

    //                         if($NoThree == $arr_consolation[$h])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         }

    //                         if($NoFour == $arr_Special[$h])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         }

    //                         if($NoFine == $arr_Special[$h])
    //                         {
    //                             array_push($l_serial,$serialNumber."- Reward Consolation");
    //                         }
    //                     }
    //                 }
    //             }
    //         }
            
    //     }

    //     $arr = array("l_Serial"=>$l_serial,"l_Gia"=>$l_Giai,"type"=>$typelottery);
    //     return $arr;

    // }


    public function checkExitDate($date,$table)
    {
        $sql_list = "SELECT * FROM  $table  WHERE `txday`='$date'";
        $arr = $this->db->query($sql_list)->row_array();
        return $arr;
    }

    public function checkExitDateType($date,$type)
    { 
        $sql_list = "SELECT * FROM `playnumber` WHERE `txday`='$date' AND `LotteryType`='$type'";
        $arr  = $this->db->query($sql_list)->result();
        return $arr;
    }

    public function deletnotifcation()
    {
        $sql_ = "DELETE FROM `notification`";
        $arr = $this->db->query($sql_);
        if($arr)
            $req = 1;
        return  $req;
    }
}