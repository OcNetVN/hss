<?php
class M_totofourd extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    /*
    |----------------------------------------------------------------
    | function convert all
    |----------------------------------------------------------------
    */
    function btnconvertall_totofourd()
    {
        if(isset($_POST['ContentConvert']))
        {
            $txday                  = date("Ymd");
            $ContentConvert         = $_POST['ContentConvert'];
            $arr_content            = explode("\n",$ContentConvert);
            
            //get draw date, draw no
            $search_drawdate        = 'Draw Date';
            $res_draw               = array_filter($arr_content, function ($item) use ($search_drawdate) 
            {
                if (stripos($item, $search_drawdate) !== false) 
                {
                    return true;
                }
                return false;
            });
            foreach($res_draw as $key  => $val)
            {
                $key_row_draw      = (int)$key;
            }
            $str_temp       = trim($arr_content[$key_row_draw]);
            $arr_temp       = explode(" ",$str_temp);
            
            $arr_drawdate   = explode("/",substr($arr_temp[3],0,(strlen($arr_temp[3])-1)));
            $txday          = $arr_drawdate[2].$arr_drawdate[1].$arr_drawdate[0];
            $showdate       = substr($arr_temp[3],0,(strlen($arr_temp[3])-1));
            $drawno         = $arr_temp[(count($arr_temp)-1)];
            
            
            //get prize 1st 2nd 3rd
            $prize                  = 'First Prize';
            $res_prize              = array_filter($arr_content, function ($item) use ($prize) 
            {
                if (stripos($item, $prize) !== false) 
                {
                    return true;
                }
                return false;
            });
            foreach($res_prize as $key  => $val)
            {
                $key_row_prize      = (int)$key + 1;
            }
            $str_prize              = $arr_content[$key_row_prize];
            $arr_prize              = explode("\t",$str_prize);
            //print_r($arr_prize);
            $prize_1st              = $arr_prize[0];
            $prize_2nd              = $arr_prize[1];
            $prize_3rd              = $arr_prize[2];
            
            
            //get special
            $special                = 'Special Prize';
            $res_special            = array_filter($arr_content, function ($item) use ($special) 
            {
                if (stripos($item, $special) !== false) 
                {
                    return true;
                }
                return false;
            });
            foreach($res_special as $key  => $val)
            {
                $key_row_special    = (int)$key + 1;
            }
            $arr_res_special            = array();
            for($i = $key_row_special; $i < ($key_row_special + 3); $i ++)
            {
                $str_temp           = $arr_content[$i];
                $arr_special        = explode("\t",$str_temp);
                foreach($arr_special as $row)
                {
                    if($row                     != " ")
                        $arr_res_special[]      = $row;
                }
            }
            
            
            //get consolation
            $consolation             = 'Consolation';
            $res_consolation         = array_filter($arr_content, function ($item) use ($consolation) 
            {
                if (stripos($item, $consolation) !== false) 
                {
                    return true;
                }
                return false;
            });
            foreach($res_consolation as $key  => $val)
            {
                $key_row_consolation    = (int)$key + 1;
            }
            $arr_res_consolation            = array();
            for($i = $key_row_consolation; $i < ($key_row_consolation + 3); $i ++)
            {
                $str_temp               = $arr_content[$i];
                $arr_consolation        = explode("\t",$str_temp);
                foreach($arr_consolation as $row)
                {
                    if($row                         != " ")
                        $arr_res_consolation[]      = $row;
                }
            }
            //print_r($arr_res_consolation);die;
            
            
            //get toto 4d jackpot RM
            $toto_4d_jp             = 'TOTO 4D JACKPOT';
            $res_toto_4d_jp         = array_filter($arr_content, function ($item) use ($toto_4d_jp) 
            {
                if (stripos($item, $toto_4d_jp) !== false) 
                {
                    return true;
                }
                return false;
            });
            foreach($res_toto_4d_jp as $key  => $val)
            {
                $key_row_toto_4d_jp     = (int)$key + 1;
            }
            //print_r($key_row_toto_4d_jp);
            $arr_4djp_rm1               = explode("\t",$arr_content[$key_row_toto_4d_jp]);
            $str_4djp_rm1               = $arr_4djp_rm1[(count($arr_4djp_rm1)-1)];
            $arr_4djp_rm2               = explode(" ",$arr_content[($key_row_toto_4d_jp+3)]);
            $str_4djp_rm2               = $arr_4djp_rm2[(count($arr_4djp_rm2)-1)];
            
            $arr_result_jack_4D_toto    = "";
            $arr_result_jack_4D_toto1   = "";
            $arr_jack_4D_result_1       =  explode("\t",$arr_content[$key_row_toto_4d_jp+1]);
            //$arr_result_jack_4D_toto    =  $arr_jack_4D_result_1[0].$arr_jack_4D_result_1[1].$arr_jack_4D_result_1[2]."|".$arr_jack_4D_result_1[3].$arr_jack_4D_result_1[4].$arr_jack_4D_result_1[5]."|".$arr_jack_4D_result_1[6].$arr_jack_4D_result_1[7].$arr_jack_4D_result_1[8];
            $arr_jack_4D_result_2       =  explode("\t",$arr_content[$key_row_toto_4d_jp+2]);
            //$arr_result_jack_4D_toto1   =  $arr_jack_4D_result_2[0].$arr_jack_4D_result_2[1].$arr_jack_4D_result_2[2]."|".$arr_jack_4D_result_2[3].$arr_jack_4D_result_2[4].$arr_jack_4D_result_2[5]."|".$arr_jack_4D_result_2[6].$arr_jack_4D_result_2[7].$arr_jack_4D_result_2[8];
            //get toto 5D
            $toto_5d             = '5D';
            $res_toto_5d         = array_filter($arr_content, function ($item) use ($toto_5d) 
            {
                if (stripos($item, $toto_5d) !== false) 
                {
                    return true;
                }
                return false;
            });
            //print_r($res_toto_5d);
            //die();
            foreach($res_toto_5d as $key  => $val)
            {
                $key_row_toto_5d     = (int)$key;
            }
            $toto_5d_1_4            = $arr_content[$key_row_toto_5d];
            $toto_5d_1st            = explode("\t",$toto_5d_1_4)[2];
            //print_r($toto_5d_1st);
            //die();
            $toto_5d_4th            = explode("\t",$toto_5d_1_4)[4];
            
            $toto_5d_2_5            = $arr_content[($key_row_toto_5d+1)];
            $toto_5d_2nd            = explode("\t",$toto_5d_2_5)[1];
            $toto_5d_5th            = explode("\t",$toto_5d_2_5)[3];
            
            $toto_5d_3_6            = $arr_content[($key_row_toto_5d+2)];
            $toto_5d_3rd            = explode("\t",$toto_5d_3_6)[1];
            $toto_5d_6th            = explode("\t",$toto_5d_3_6)[3];
            
            //get toto 6D
            $toto_6d             = '6D';
            $res_toto_6d         = array_filter($arr_content, function ($item) use ($toto_6d) 
            {
                if (stripos($item, $toto_6d) !== false) 
                {
                    return true;
                }
                return false;
            });
            foreach($res_toto_6d as $key  => $val)
            {
                $key_row_toto_6d     = (int)$key;
            }
            $toto_6d_1              = $arr_content[($key_row_toto_6d)];
            $toto_6d_1st            = explode("\t",$toto_6d_1)[2];
            $toto_6d_2              = $arr_content[($key_row_toto_6d+1)];
            $toto_6d_2nd            = array(explode("\t",$toto_6d_2)[1],explode("\t",$toto_6d_2)[3]);
            
            $toto_6d_3              = $arr_content[($key_row_toto_6d+2)];
            $toto_6d_3rd            = array(explode("\t",$toto_6d_3)[1],explode("\t",$toto_6d_3)[3]);
            
            $toto_6d_4              = $arr_content[($key_row_toto_6d+3)];
            $toto_6d_4th            = array(explode("\t",$toto_6d_4)[1],explode("\t",$toto_6d_4)[3]);
            
            $toto_6d_5              = $arr_content[($key_row_toto_6d+4)];
            $toto_6d_5th            = array(explode("\t",$toto_6d_5)[1],explode("\t",$toto_6d_5)[3]);
            
            //get toto grand
            $toto_grand             = 'GRAND';
            $res_toto_grand         = array_filter($arr_content, function ($item) use ($toto_grand) 
            {
                if (stripos($item, $toto_grand) !== false) 
                {
                    return true;
                }
                return false;
            });
            foreach($res_toto_grand as $key  => $val)
            {
                $key_row_toto_grand     = (int)$key + 1;
            }
            $arr_grand                  = explode("\t",$arr_content[$key_row_toto_grand]);
            $arr_grand                  = array($arr_grand[1],$arr_grand[2],$arr_grand[3],$arr_grand[4],$arr_grand[5],$arr_grand[6]);
            
            $str_grand_jp               = explode("\t",$arr_content[($key_row_toto_grand+1)])[1];
            
            
            //get toto power
            $toto_power             = 'POWER';
            $res_toto_power         = array_filter($arr_content, function ($item) use ($toto_power) 
            {
                if (stripos($item, $toto_power) !== false) 
                {
                    return true;
                }
                return false;
            });
            foreach($res_toto_power as $key  => $val)
            {
                $key_row_toto_power     = (int)$key + 1;
            }
            $arr_power                  = explode("\t",$arr_content[$key_row_toto_power]);
            $arr_power                  = array($arr_power[1],$arr_power[2],$arr_power[3],$arr_power[4],$arr_power[5],$arr_power[6]);
            
            $str_power_jp               = explode("\t",$arr_content[($key_row_toto_power+1)])[1];
            
            
            //get toto supreme
            $toto_supreme             = 'SUPREME';
            $res_toto_supreme         = array_filter($arr_content, function ($item) use ($toto_supreme) 
            {
                if (stripos($item, $toto_supreme) !== false) 
                {
                    return true;
                }
                return false;
            });
            foreach($res_toto_supreme as $key  => $val)
            {
                $key_row_toto_supreme     = (int)$key + 1;
            }
            $arr_supreme                  = explode("\t",$arr_content[$key_row_toto_supreme]);
            $arr_supreme                  = array($arr_supreme[1],$arr_supreme[2],$arr_supreme[3],$arr_supreme[4],$arr_supreme[5],$arr_supreme[6]);
            
            $str_supreme_jp               = explode("\t",$arr_content[($key_row_toto_supreme+1)])[1];
            
            
            //return
            $arr                                = array(
                                                    "txday"                 => $txday,
                                                    "showdate"              => $showdate,
                                                    "drawno"                => $drawno,
                                                    
                                                    "prize_1st"             => $prize_1st,
                                                    "prize_2nd"             => $prize_2nd,
                                                    "prize_3rd"             => $prize_3rd,
                                                    
                                                    "arr_res_special"       => $arr_res_special,
                                                    "arr_res_consolation"   => $arr_res_consolation,
                                                    
                                                    "str_4djp_rm1"          => $str_4djp_rm1,
                                                    "str_4djp_rm2"          => $str_4djp_rm2,
                                                    "str_4djp_result1"      => $arr_jack_4D_result_1,
                                                    "str_4djp_result2"      => $arr_jack_4D_result_2,
                                                    
                                                    "toto_5d_1st"           => $toto_5d_1st,
                                                    "toto_5d_2nd"           => $toto_5d_2nd,
                                                    "toto_5d_3rd"           => $toto_5d_3rd,
                                                    "toto_5d_4th"           => $toto_5d_4th,
                                                    "toto_5d_5th"           => $toto_5d_5th,
                                                    "toto_5d_6th"           => $toto_5d_6th,
                                                    
                                                    "toto_6d_1st"           => $toto_6d_1st,
                                                    "toto_6d_2nd"           => $toto_6d_2nd,
                                                    "toto_6d_3rd"           => $toto_6d_3rd,
                                                    "toto_6d_4th"           => $toto_6d_4th,
                                                    "toto_6d_5th"           => $toto_6d_5th,
                                                    
                                                    "arr_grand"             =>$arr_grand,
                                                    "str_grand_jp"          =>$str_grand_jp,
                                                    
                                                    "arr_power"             =>$arr_power,
                                                    "str_power_jp"          =>$str_power_jp,
                                                    
                                                    "arr_supreme"           =>$arr_supreme,
                                                    "str_supreme_jp"        =>$str_supreme_jp,
                                                    );
            return $arr;
            
        }
    }
    /*
	|----------------------------------------------------------------
	| function save all totofourd
	|----------------------------------------------------------------
	*/
    public function btnsaveall_totofourd()
	{
        if(isset($_POST["spandrawno"]))
        {
            $span_date          =   $_POST["span_date"];
            $arr_date           =   explode("/",$span_date);
            $txday              =   $arr_date[2].$arr_date[1].$arr_date[0];
            $drawno             =   $_POST["spandrawno"];
            $span_1st           =   $_POST["span_1st"];
            $span_2nd           =   $_POST["span_2nd"];
            $span_3rd           =   $_POST["span_3rd"];
            
            $arr_special        =   $_POST["arr_special"];
            $arr_consolation    =   $_POST["arr_consolation"];
            
            $spanrmjp1          =   $_POST["spanrmjp1"];
            $spanrmjp2          =   $_POST["spanrmjp2"];
            $arr_rejackpot      =   $_POST["arr_jackpottoto"];
            
            $arr_5d             =   $_POST["arr_5d"];
            $arr_6d             =   $_POST["arr_6d"];
            
            $arr_grand          =   $_POST["arr_grand"];
            $spangrandrm        =   $_POST["spangrandrm"];
            
            $arr_power          =   $_POST["arr_power"];
            $spanpowerrm        =   $_POST["spanpowerrm"];
            
            $arr_supreme        =   $_POST["arr_supreme"];
            $spansupremerm      =   $_POST["spansupremerm"];
            
            $str_special        =   "";
            foreach($arr_special as $row_special)
            {
                $str_special    .=  $row_special."|";
            }
            $str_special        =   substr($str_special,0,(strlen($str_special)-1));
            
            $str_consolation    =   "";
            foreach($arr_consolation as $row_consolation)
            {
                $str_consolation.=  $row_consolation."|";
            }
            $str_consolation    =   substr($str_consolation,0,(strlen($str_consolation)-1));
            
            $str_jackpot4d      = "";
            foreach ($arr_rejackpot as $row_rejack) 
            {
                $str_jackpot4d.= $row_rejack."|";
            }
            $str_jackpot4d    =   substr($str_jackpot4d,0,(strlen($str_jackpot4d)-1));

            $str_grand          =   "";
            foreach($arr_grand as $row_grand)
            {
                $str_grand      .=  $row_grand."|";
            }
            $str_grand          =   substr($str_grand,0,(strlen($str_grand)-1));
            
            $str_power          =   "";
            foreach($arr_power as $row_power)
            {
                $str_power      .=  $row_power."|";
            }
            $str_power          =   substr($str_power,0,(strlen($str_power)-1));
            
            $str_supreme        =   "";
            foreach($arr_supreme as $row_supreme)
            {
                $str_supreme    .=  $row_supreme."|";
            }
            $str_supreme        =   substr($str_supreme,0,(strlen($str_supreme)-1));
            
            $check_isset_row_db = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_toto4d",$txday)->total;
            
            if($check_isset_row_db > 0)
            {
                $sql            = "UPDATE `lot_toto4d` SET 
                                        `Draw_No` = '$drawno', `ST_1st_Price` = '$span_1st', 
                                        `ST_2nd_Price` = '$span_2nd', `ST_3rd_Price` = '$span_3rd', `Special` = '$str_special', 
                                        `Consolation` = '$str_consolation', `TJ4D_jp1` = '$spanrmjp1', `TJ4D_jp2` = '$spanrmjp2', 
                                        `TJ5D_1st` = '$arr_5d[0]', `TJ5D_2nd` = '$arr_5d[1]', `TJ5D_3rd` = '$arr_5d[2]', 
                                        `TJ5D_4th` = '$arr_5d[3]', `TJ5D_5th` = '$arr_5d[4]', `TJ5D_6th` = '$arr_5d[5]', 
                                        `TJ6D_1st` = '$arr_6d[0]', `TJ6D_2nd` = '$arr_6d[1]', `TJ6D_3rd` = '$arr_6d[2]', 
                                        `TJ6D_4th` = '$arr_6d[3]', `TJ6D_5th` = '$arr_6d[4]', `Mega_toto` = 'Grand', 
                                        `TJ4D_Result`='$str_jackpot4d',`Mega` = '$str_grand', `Mega_jp1` = '$spangrandrm', `Mega_jp2` = '', 
                                        `Power_toto` = '6/55', `Power` = '$str_power', `Power_jp` = '$spanpowerrm', 
                                        `Super_toto` = '6/58', `Super` = '$str_supreme', `Super_jp` = '$spansupremerm' 
                                    WHERE `txday` = '$txday'";
            }
            else
            {
                $sql            = "INSERT INTO `lot_toto4d` 
                        (`txday`, `Draw_No`, `ST_1st_Price`, `ST_2nd_Price`, `ST_3rd_Price`,  `Special`,      `Consolation`,        `TJ4D_jp1`,     `TJ4D_jp2`,     `TJ5D_1st`, 
                        `TJ5D_2nd`,     `TJ5D_3rd`,      `TJ5D_4th`,      `TJ5D_5th`,    `TJ5D_6th`,      `TJ6D_1st`,     `TJ6D_2nd`,     `TJ6D_3rd`,
                          `TJ6D_4th`,    `TJ6D_5th`, `Mega_toto`, `Mega`,      `Mega_jp1`,  `Mega_jp2`, `Power_toto`, `Power`,      `Power_jp`,   `Super_toto`,   `Super`,      `Super_jp`,`TJ4D_Result`) 
                VALUES ('$txday', '$drawno', '$span_1st',      '$span_2nd',   '$span_3rd', '$str_special', '$str_consolation',      '$spanrmjp1',  '$spanrmjp2',    '$arr_5d[0]', 
                        '$arr_5d[1]', '$arr_5d[2]',     '$arr_5d[3]',    '$arr_5d[4]', '$arr_5d[5]',     '$arr_6d[0]',   '$arr_6d[1]',   '$arr_6d[2]', 
                        '$arr_6d[3]', '$arr_6d[4]', 'Grand', '$str_grand', '$spangrandrm', '',         '6/55',   '$str_power',   '$spanpowerrm', '6/58',   '$str_supreme', '$spansupremerm','$str_jackpot4d')";
            }
            
            $query                  =   $this->db->query($sql);
            
            if($query) 
                return 1;
            else
                return 0;
        }
    }
    /*
    |----------------------------------------------------------------
    | function get data by txtday from table toto4d
    |----------------------------------------------------------------
    */
    public function get_data_by_txtdate_totofourd()
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
                $day = $arr_txday[0];
            $str_date               =   $year.$month.$day;
            $row_db                 =   $this->m_common_lottery->get_row_by_table_txday("lot_toto4d",$str_date);
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