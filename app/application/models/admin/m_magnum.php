<?php
class M_magnum extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    /*
    |----------------------------------------------------------------
    | function convert drawdate magnum
    |----------------------------------------------------------------
    */
    function btndrawdate_magnum()
    {
        if(isset($_POST['ContentConvert']))
        {
            $txday                  = date("Ymd");
            $ContentConvert         = $_POST['ContentConvert'];
            $arr_content            = explode("\n",$ContentConvert);
            if(count($arr_content)  >= 3) //firefox
                $arr_content            = explode(" ",$arr_content[1]);
            else //chorme
                $arr_content            = explode(" ",$arr_content[0]);
            $date_drawno            = $arr_content[3];
            
            $date                   = substr($date_drawno,-10);
            $arr_date               = explode("/",$date);
            $txday                  = $arr_date[2].$arr_date[1].$arr_date[0];
            
            $drawno                 = substr($date_drawno,0,(strlen($date_drawno)-10));
            
            //return
            $arr                    = array(
                                        "txday"         => $txday,
                                        "date"          => $date,
                                        "drawno"        => $drawno
                                        );
            return $arr;
        }
    }
    /*
    |----------------------------------------------------------------
    | function convert 4d game magnum
    |----------------------------------------------------------------
    */
    public function btnfourdgame_magnum()
    {
        if(isset($_POST['ContentConvert']))
        {
            $ContentConvert         = $_POST['ContentConvert'];
            $arr_convert            = explode("\n", $ContentConvert);
            if($arr_convert[3] != "" && $arr_convert[5] != "") //chorme
            {
                $Price_1st         = substr($arr_convert[0],9,(strlen($arr_convert[0])-9));
                $Price_2nd         = substr($arr_convert[1],9,(strlen($arr_convert[1])-9));
                $Price_3rd         = substr($arr_convert[2],9,(strlen($arr_convert[2])-9));
                
                $arr_special            = array();
                for($i = 4; $i <14; $i++)
                {
                    $arr_special[]        = $arr_convert[$i];
                }
                
                $arr_consolation            = array();
                for($i = 15; $i <25; $i++)
                {
                    $arr_consolation[]      = $arr_convert[$i];
                }
            }
            else //firefox
            {
                $Price_1st         = substr(trim($arr_convert[0]),9,(strlen(trim($arr_convert[0]))-9));
                $Price_2nd         = substr(trim($arr_convert[1]),9,(strlen(trim($arr_convert[1]))-9));
                $Price_3rd         = substr(trim($arr_convert[2]),9,(strlen(trim($arr_convert[2]))-9));
                
                $arr_special            = array();
                for($i = 6; $i <16; $i++)
                {
                    $arr_special[]        = trim($arr_convert[$i]);
                }
                
                $arr_consolation        = array();
                for($i = 19; $i <29; $i++)
                {
                    $arr_consolation[]    = trim($arr_convert[$i]);
                }
            }
            
            //return
            $arr                    = array(
                                        "Price_1st"             => $Price_1st,
                                        "Price_2nd"             => $Price_2nd,
                                        "Price_3rd"             => $Price_3rd,
                                        "arr_special"           => $arr_special,
                                        "arr_consolation"       => $arr_consolation
                                        );
            return $arr;
        }
    }
    /*
    |----------------------------------------------------------------
    | function convert 4d jackpot magnum
    |----------------------------------------------------------------
    */
    public function btnfourdjp_magnum()
    {
        if(isset($_POST['ContentConvert']))
        {
            $ContentConvert             = $_POST['ContentConvert'];
            $arr_convert                = explode("\n", $ContentConvert);
            
            $arr_Price_jp1_prize            = explode(" ",$arr_convert[0]);
            $Price_jp1_prize                = $arr_Price_jp1_prize[(count($arr_Price_jp1_prize)-1)];
            
            $arr_Price_jp2_prize            = explode(" ",$arr_convert[1]);
            $Price_jp2_prize                = $arr_Price_jp2_prize[(count($arr_Price_jp2_prize)-1)];
            
            $arr_prize_jp1                  = array();
            for($i = 6; $i < 12; $i ++)
            {
                $arr_prize_jp1[]            = substr(trim($arr_convert[$i]),0,4)."+".substr(trim($arr_convert[$i]),-4);
            }
            
            $arr_prize_jp2                  = array();
            if($arr_convert[count($arr_convert)-1]  == "")
            {
                for($i = 15; $i < (count($arr_convert)-1); $i ++)
                {
                    $arr_prize_jp2[]        = substr(trim($arr_convert[$i]),0,4)."+".substr(trim($arr_convert[$i]),-4);
                }
            }
            else
            {
                for($i = 15; $i < (count($arr_convert)); $i ++)
                {
                    $arr_prize_jp2[]        = substr(trim($arr_convert[$i]),0,4)."+".substr(trim($arr_convert[$i]),-4);
                }
            }
            
            //return
            $arr                    = array(
                                        "Price_jp1_prize"               => $Price_jp1_prize,
                                        "Price_jp2_prize"               => $Price_jp2_prize,
                                        "arr_prize_jp1"                 => $arr_prize_jp1,
                                        "arr_prize_jp2"                 => $arr_prize_jp2
                                        );
            return $arr;
            
        }
    }
    
    
    
    
    /*
    |----------------------------------------------------------------
    | function convert 4D jackport gold convert
    |----------------------------------------------------------------
    */
    public function btnfourjpgold_magnum()
    {    
        if(isset($_POST['ContentConvert']))
        {
            if(isset($_SESSION['txday_magnum']))
                $txday                  = $_SESSION['txday_magnum'];
            else
                $txday                  = date("Ymd");
            $ContentConvert         = $_POST['ContentConvert'];
            $arr_convert            = explode("\n", $ContentConvert);
            $str_convert            = "";
            
            $arr_str                = array();
            for($i = 0; $i < 8; $i ++)
            {
                $pos = strpos($arr_convert[$i], "or");
                if($pos === false)
                    $str_res            = substr($arr_convert[$i],-23);
                else
                    $str_res            = substr($arr_convert[$i],-24);
                
                $str_str                = "";
                for($j = 0; $j < (strlen($str_res)); $j ++)
                {
                    $char_str           = substr($str_res,$j,1);
                    if($char_str != " ")
                    {
                        if($char_str        == "+")
                        {
                            $str_str        .= "|".$char_str."|";
                        }
                        else
                        {
                            if($char_str        == "o" || $char_str        == "O" )
                            {
                                $str_str        .= "|".$char_str;
                            }
                            else
                            {
                                if($char_str        == "r" || $char_str        == "R" )
                                {
                                    $str_str        .= $char_str."|";
                                }
                                else
                                    $str_str        .= $char_str;
                            }
                        }
                    }
                }
                $str_str                = str_replace("||","|",$str_str);
                $str_str                = str_replace("+|+","+",$str_str);
                $str_str                = str_replace("+|+|+","+",$str_str);
                $str_str                = str_replace("+|+|+|+","+",$str_str);
                $str_str                = str_replace("+|or|+","or",$str_str);
                $str_str                = str_replace("+|or","or",$str_str);
                $str_str                = str_replace("or|+","or",$str_str);
                if(substr($str_str,0,4)     == '|or|')
                    $str_str                = substr($str_str,4,(strlen($str_str)-4));
                if(substr($str_str,0,3)     == '|+|')
                    $str_str                = substr($str_str,3,(strlen($str_str)-3));
                if(substr($str_str,-4)     == '|or|')
                    $str_str                = substr($str_str,0,(strlen($str_str)-4));
                if(substr($str_str,-3)     == '|+|')
                    $str_str                = substr($str_str,0,(strlen($str_str)-3));
                
                $arr_temp                   = explode("|",$str_str);
                $arr_str[]                  = $arr_temp;
            }
            
            $arr_rmjp1                      = explode("RM",$arr_convert[9]);
            $str_rmjp1                      = $arr_rmjp1[1];
            $arr_rmjp2                      = explode("RM",$arr_convert[10]);
            $str_rmjp2                      = $arr_rmjp2[1];
            
            $str_convert            = substr($str_convert,0,(strlen($str_convert)-1));
            
            //return
            $arr                    = array(
                                        "str_rmjp1"               => $str_rmjp1,
                                        "str_rmjp2"               => $str_rmjp2,
                                        "arr_str"                 => $arr_str
                                        );
            return $arr;
        }
    }
    /*
    |----------------------------------------------------------------
    | function save all magnum
    |----------------------------------------------------------------
    */
    public function btnsaveall_magnum()
    {
        $_date = "";
        $_month = "";
        $_year  = "";
        $span_1st = "";
        $span_2nd = "";
        $span_3rd = "";
        $arr_special = "";
        $arr_consolation = "";
        $span_jp1prize   = "";
        $span_jp2prize   = "";
        $arr_jp1         = "";
        $arr_jp2         = "";
        $arr_gold1       = "";
        $arr_gold2       = "";
        $arr_gold3       =  "";
        $arr_gold4       =  "";
        $arr_gold5       =   "";
        $arr_gold6          =   "";
        $arr_gold71         =   "";
        $arr_gold72         =   "";
        $span_jp1_prize     =   "";
        $span_jp2_prize     =   "";
        if(isset($_POST["spandrawno"]))
        {
            $span_date          =   $_POST["span_date"];
            $arr_date           =   explode("/",$span_date);
            if(isset($arr_date[0]))
                $_date = $arr_date[0];            
            if(isset($arr_date[1]))
                $_month = $arr_date[1];
            if(isset($arr_date[2]))
                $_year  = $arr_date[2];
            $txday              =   $_year.$_month.$_date;
            
            $drawno             =   $_POST["spandrawno"];
            if(isset($_POST["span_1st"]))
                $span_1st           =   $_POST["span_1st"];
            if(isset($_POST["span_2nd"]))
                $span_2nd           =   $_POST["span_2nd"];
            if(isset($_POST["span_2nd"]))
                $span_3rd           =   $_POST["span_3rd"];
            if(isset($_POST["arr_special"]))
                $arr_special        =   $_POST["arr_special"];
            if(isset($_POST["arr_consolation"]))
                $arr_consolation    =   $_POST["arr_consolation"];
            if(isset($_POST["span_jp1prize"]))
                $span_jp1prize      =   $_POST["span_jp1prize"];
            if(isset($_POST["span_jp2prize"]))
                $span_jp2prize      =   $_POST["span_jp2prize"];
            if(isset($_POST["arr_jp1"]))
                $arr_jp1            =   $_POST["arr_jp1"];
            if(isset($_POST["arr_jp2"]))
                $arr_jp2            =   $_POST["arr_jp2"];
            if(isset($_POST["arr_gold1"]))
                $arr_gold1          =   $_POST["arr_gold1"];
            if(isset($_POST["arr_gold2"]))
                $arr_gold2          =   $_POST["arr_gold2"];
            if(isset($_POST["arr_gold3"]))
                $arr_gold3          =   $_POST["arr_gold3"];
            if(isset($_POST["arr_gold4"]))
                $arr_gold4          =   $_POST["arr_gold4"];
            if(isset($_POST["arr_gold5"]))
                $arr_gold5          =   $_POST["arr_gold5"];
            if(isset($_POST["arr_gold6"]))
                $arr_gold6          =   $_POST["arr_gold6"];
            if(isset($_POST["arr_gold71"]))
                $arr_gold71         =   $_POST["arr_gold71"];
            if(isset($_POST["arr_gold72"]))
                $arr_gold72         =   $_POST["arr_gold72"];
            if(isset($_POST["span_jp1_prize"]))
                $span_jp1_prize     =   $_POST["span_jp1_prize"];
            if(isset($_POST["span_jp2_prize"]))
                $span_jp2_prize     =   $_POST["span_jp2_prize"];
            
            $str_special        =   "";
            if(is_array($arr_special))
            {
                foreach($arr_special as $row_special)
                {
                    $str_special    .=  $row_special."|";
                }
                $str_special        =   substr($str_special,0,(strlen($str_special)-1));
            }
            $str_consolation    =   "";

            if(is_array($arr_consolation))
            {
                foreach($arr_consolation as $row_consolation)
                {
                    $str_consolation.=  $row_consolation."|";
                }
                $str_consolation    =   substr($str_consolation,0,(strlen($str_consolation)-1));
            }
            $str_jp1    =   "";

            if(is_array($arr_jp1))
            {
                foreach($arr_jp1 as $row_jp1)
                {
                    $str_jp1.=  $row_jp1."|";
                }
                $str_jp1    =   substr($str_jp1,0,(strlen($str_jp1)-1));
            }
            $str_jp2    =   "";
            if(is_array($arr_jp2))
            {
                foreach($arr_jp2 as $row_jp2)
                {
                    $str_jp2.=  $row_jp2."|";
                }
                $str_jp2    =   substr($str_jp2,0,(strlen($str_jp2)-1));
            }
            $str_gold1    =   "";
            if(is_array($arr_gold1))
            {
                foreach($arr_gold1 as $row_gold1)
                {
                    $str_gold1.=  $row_gold1."|";
                }
                $str_gold1    =   substr($str_gold1,0,(strlen($str_gold1)-1));
            }
            $str_gold2    =   "";
            if(is_array($arr_gold2))
            {
                foreach($arr_gold2 as $row_gold2)
                {
                    $str_gold2.=  $row_gold2."|";
                }
                $str_gold2    =   substr($str_gold2,0,(strlen($str_gold2)-1));
            }
            $str_gold3    =   "";
            if(is_array($arr_gold3))
            {
                foreach($arr_gold3 as $row_gold3)
                {
                    $str_gold3.=  $row_gold3."|";
                }
                $str_gold3    =   substr($str_gold3,0,(strlen($str_gold3)-1));
            }

            $str_gold4    =   "";
            if(is_array($arr_gold4))
            {
                foreach($arr_gold4 as $row_gold4)
                {
                    $str_gold4.=  $row_gold4."|";
                }
                $str_gold4    =   substr($str_gold4,0,(strlen($str_gold4)-1));
            }

            $str_gold5    =   "";
            if(is_array($arr_gold5))
            {
                foreach($arr_gold5 as $row_gold5)
                {
                    $str_gold5.=  $row_gold5."|";
                }
                $str_gold5    =   substr($str_gold5,0,(strlen($str_gold5)-1));
            }
            $str_gold6    =   "";
            if(is_array($arr_gold6))
            {
                foreach($arr_gold6 as $row_gold6)
                {
                    $str_gold6.=  $row_gold6."|";
                }
                $str_gold6    =   substr($str_gold6,0,(strlen($str_gold6)-1));
            }
            $str_gold71    =   "";
            if(is_array($arr_gold71))
            {
                foreach($arr_gold71 as $row_gold71)
                {
                    $str_gold71.=  $row_gold71."|";
                }
                $str_gold71    =   substr($str_gold71,0,(strlen($str_gold71)-1));
            }
            $str_gold72    =   "";
            if(is_array($arr_gold72))
            {
                foreach($arr_gold72 as $row_gold72)
                {
                    $str_gold72.=  $row_gold72."|";
                }
                $str_gold72    =   substr($str_gold72,0,(strlen($str_gold72)-1));
            }
            $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_magnum",$txday)->total;
            
            if($check_isset_row_db > 0)
            {
                $sql                = "UPDATE `lot_magnum` SET 
                                        `Draw_No` = '$drawno', `4D_1st_Price` = '$span_1st', 
                                        `4D_2nd_Price` = '$span_2nd', `4D_3rd_Price` = '$span_3rd', 
                                        `Special` = '$str_special', `Consolation` = '$str_consolation', 
                                        `4D_jp1_prize` = '$span_jp1prize', `4D_jp1` = '$str_jp1', 
                                        `4D_jp2_prize` = '$span_jp2prize', `4D_jp2` = '$str_jp2', 
                                        `4D_gold_jp1` = '$str_gold1', 
                                        `4D_gold_jp2` = '$str_gold2', `4D_gold_jp3` = '$str_gold3', 
                                        `4D_gold_jp4` = '$str_gold4', `4D_gold_jp5` = '$str_gold5', 
                                        `4D_gold_jp6` = '$str_gold6', `4D_gold_jp7_1` = '$str_gold71', 
                                        `4D_gold_jp7_2` = '$str_gold72', 
                                        `4D_gold_jp1_prize` = '$span_jp1_prize', `4D_gold_jp2_prize` = '$span_jp2_prize' 
                                    WHERE `txday` = '$txday'";
            }
            else
            {
                $sql                = "INSERT INTO `lot_magnum` 
                                            (`txday`, `Draw_No`, `4D_1st_Price`, `4D_2nd_Price`, `4D_3rd_Price`, 
                                            `Special`,        `Consolation`,    `4D_jp1_prize`,   `4D_jp1`,   `4D_jp2_prize`, 
                                            `4D_jp2`,   `4D_gold_jp1`, `4D_gold_jp2`, `4D_gold_jp3`, `4D_gold_jp4`, 
                                            `4D_gold_jp5`, `4D_gold_jp6`, `4D_gold_jp7_1`, `4D_gold_jp7_2`, 
                                            `4D_gold_jp1_prize`, `4D_gold_jp2_prize`)
                                             
                                    VALUES ('$txday', '$drawno',  '$span_1st',    '$span_2nd',     '$span_3rd', 
                                            '$str_special', '$str_consolation', '$span_jp1prize', '$str_jp1', '$span_jp2prize', 
                                            '$str_jp2', '$str_gold1',  '$str_gold2',  '$str_gold3',  '$str_gold4', 
                                            '$str_gold5',  '$str_gold6',  '$str_gold71',    '$str_gold72', 
                                            '$span_jp1_prize',   '$span_jp2_prize')";
            }
            
            $query                  = $this->db->query($sql);
            
            //return
            if($query)
            {
                return 1;
                
            }
                
            else
                return 0;
        }
    }
    /*
    |----------------------------------------------------------------
    | function get data by txtday from table magnum
    |----------------------------------------------------------------
    */
    public function get_data_by_txtdate_magnum()
    {
        $day = "";
        $month = "";
        $year  = "";
        if(isset($_POST['txtdate']))
        {
            $txday                  =   $_POST['txtdate'];  //dd-mm-yyyy
            $arr_txday              =   explode("-",$txday);
            if(isset($arr_txday[2]))
                $year = $arr_txday[2];
            if(isset($arr_txday[1]))
                $month = $arr_txday[1];
            if(isset($arr_txday[0]))
                $day  = $arr_txday[0];
            $str_date               =   $year.$month.$day;
            $row_db                 =   $this->m_common_lottery->get_row_by_table_txday("lot_magnum",$str_date);
            if(count($row_db)   >   0)
            {
                $row_db             =   get_object_vars($row_db);
                $flag               =   1;
            }
            else
            {
                $flag               =   0;
            }
            
            //return    
            $arr                    =   array(  "flag"      =>  $flag,
                                                "arr_res"   =>  $row_db,
                                                );
            return $arr;
        }
    }
}