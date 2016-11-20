<?php
class M_bigsweep extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    /*
    |----------------------------------------------------------------
    | function convert all
    |----------------------------------------------------------------
    */
    function btnconvertall_bigsweep()
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
            $arr_temp       = explode(" ",$arr_content[0]);
            //print_r($arr_temp);die;
            $year = "";
            $arr_drawdate   = explode("/",$arr_temp[2]);
            $txday          = $arr_drawdate[2].$arr_drawdate[1].$arr_drawdate[0];
            $showdate       = $arr_drawdate[0]."-".$arr_drawdate[1]."-".$arr_drawdate[2];
            //$key_drawno     = (int)array_search ("No:",$arr_temp) + 1;
            $drawno         = $arr_temp[10];
            
            $jpdegit        = substr($arr_content[2],14,(strlen($arr_content[2])-14));
            $jpno           = substr($arr_content[6],2,(strlen($arr_content[2])-2));
            
            //get major prize 1st 2nd 3rd
            $search_major        = 'MAJOR PRIZESJACKPOT';
            $res_major               = array_filter($arr_content, function ($item) use ($search_major) 
            {
                if (stripos($item, $search_major) !== false) 
                {
                    return true;
                }
                return false;
            });
            foreach($res_major as $key  => $val)
            {
                $key_row_major      = (int)$key;
            }
            $key_major1     =   $key_row_major + 1;
            $str_temp       =   trim($arr_content[$key_major1]);
            $arr_temp       =   explode("RM",$str_temp);
            $major1_str     =   substr($arr_temp[0],3,(strlen($arr_temp[0])-3));
            $major1_rm      =   $arr_temp[1];
            
            $key_major2     =   $key_row_major + 2;
            $str_temp       =   trim($arr_content[$key_major2]);
            $arr_temp       =   explode("RM",$str_temp);
            $major2_str     =   substr($arr_temp[0],3,(strlen($arr_temp[0])-3));
            $major2_rm      =   $arr_temp[1];
            
            $key_major3     =   $key_row_major + 3;
            $str_temp       =   trim($arr_content[$key_major3]);
            $arr_temp       =   explode("RM",$str_temp);
            $major3_str     =   substr($arr_temp[0],3,(strlen($arr_temp[0])-3));
            $major3_rm      =   $arr_temp[1];
            //print_r($major3_str);die;
            
            //get bliss prize
            $search_bliss   = 'BLISS PRIZES  (RM5,000 EACH)';
            $res_bliss      = array_filter($arr_content, function ($item) use ($search_bliss) 
            {
                if (stripos($item, $search_bliss) !== false) 
                {
                    return true;
                }
                return false;
            });
            foreach($res_bliss as $key  => $val)
            {
                $key_row_bliss      = (int)$key;
            }
            $key_bliss      =   $key_row_bliss + 1;
            $str_temp       =   trim($arr_content[$key_bliss]);
            $arr_bliss      =   array();
            for($i = 0;$i < 10;$i++)
            {
                $arr_bliss[]=   substr($str_temp,($i*7),7);
            }
            
            //get sweet prize
            $search_sweet   = 'SWEET PRIZES  (RM2,000 EACH)';
            $res_sweet      = array_filter($arr_content, function ($item) use ($search_sweet) 
            {
                if (stripos($item, $search_sweet) !== false) 
                {
                    return true;
                }
                return false;
            });
            foreach($res_sweet as $key  => $val)
            {
                $key_row_sweet      = (int)$key;
            }
            $key_sweet      =   $key_row_sweet + 1;
            $str_temp       =   trim($arr_content[$key_sweet]);
            $arr_sweet      =   array();
            for($i = 0;$i < 10;$i++)
            {
                $arr_sweet[]=   substr($str_temp,($i*6),6);
            }
            
            //get glee prize
            $search_glee   = 'GLEE PRIZES  (RM1,000 EACH)';
            $res_glee      = array_filter($arr_content, function ($item) use ($search_glee) 
            {
                if (stripos($item, $search_glee) !== false) 
                {
                    return true;
                }
                return false;
            });
            foreach($res_glee as $key  => $val)
            {
                $key_row_glee      = (int)$key;
            }
            $key_glee      =   $key_row_glee + 1;
            $str_temp       =   trim($arr_content[$key_glee]);
            $arr_glee      =   array();
            for($i = 0;$i < 30;$i++)
            {
                $arr_glee[]=   substr($str_temp,($i*7),7);
            }
            
            //get happy prize
            $search_happy   = 'HAPPY PRIZES  (RM100 EACH)';
            $res_happy      = array_filter($arr_content, function ($item) use ($search_happy) 
            {
                if (stripos($item, $search_happy) !== false) 
                {
                    return true;
                }
                return false;
            });
            foreach($res_happy as $key  => $val)
            {
                $key_row_happy      = (int)$key;
            }
            $key_happy      =   $key_row_happy + 1;
            $str_temp       =   trim($arr_content[$key_happy]);
            $arr_happy      =   array();
            for($i = 0;$i < 3;$i++)
            {
                $arr_happy[]=   substr($str_temp,($i*4),4);
            }
            
            //get lucky prize
            $search_lucky   = 'LUCKY PRIZES  (RM50 EACH)';
            $res_lucky      = array_filter($arr_content, function ($item) use ($search_lucky) 
            {
                if (stripos($item, $search_lucky) !== false) 
                {
                    return true;
                }
                return false;
            });
            foreach($res_lucky as $key  => $val)
            {
                $key_row_lucky      = (int)$key;
            }
            $key_lucky      =   $key_row_lucky + 1;
            $str_temp       =   trim($arr_content[$key_lucky]);
            $arr_lucky      =   array();
            for($i = 0;$i < 10;$i++)
            {
                $arr_lucky[]=   substr($str_temp,($i*4),4);
            }
            
            //get bonus prize
            $search_bonus   = 'BONUS PRIZES  (RM20 EACH)';
            $res_bonus      = array_filter($arr_content, function ($item) use ($search_bonus) 
            {
                if (stripos($item, $search_bonus) !== false) 
                {
                    return true;
                }
                return false;
            });
            foreach($res_bonus as $key  => $val)
            {
                $key_row_bonus      = (int)$key;
            }
            $key_bonus      =   $key_row_bonus + 1;
            $str_temp       =   trim($arr_content[$key_bonus]);
            $arr_bonus      =   array();
            for($i = 0;$i < 10;$i++)
            {
                $arr_bonus[]=   substr($str_temp,($i*4),4);
            }
            
            //return
            $arr                                = array(
                                                    "txday"                 => $txday,
                                                    "showdate"              => $showdate,
                                                    "drawno"                => $drawno,
                                                    "jpdegit"               => $jpdegit,
                                                    "jpnumber"              => $jpno,
                                                    "major1_str"            => $major1_str,
                                                    "major1_rm"             => $major1_rm,
                                                    "major2_str"            => $major2_str,
                                                    "major2_rm"             => $major2_rm,
                                                    "major3_str"            => $major3_str,
                                                    "major3_rm"             => $major3_rm,
                                                    "arr_bliss"             => $arr_bliss,
                                                    "arr_sweet"             => $arr_sweet,
                                                    "arr_glee"              => $arr_glee,
                                                    "arr_happy"             => $arr_happy,
                                                    "arr_lucky"             => $arr_lucky,
                                                    "arr_bonus"             => $arr_bonus,
                                                    );
            return $arr;
        }
    }
    /*
	|----------------------------------------------------------------
	| function save all bigsweep
	|----------------------------------------------------------------
	*/
    public function btnsaveall_bigsweep()
    {
        if(isset($_POST["spandrawno"]))
        {
            $span_date          =   $_POST["span_date"];
            $arr_date           =   explode("-",$span_date);
            $str_date           =   $arr_date[2].$arr_date[1].$arr_date[0];
            $spandrawno         =   $_POST["spandrawno"];
            $spanjegit          =   $_POST["spanjegit"];
            $spanjp             =   $_POST["spanjp"];
            
            $spanno1            =   $_POST["spanno1"];
            $spanrm1            =   $_POST["spanrm1"];
            $spanno2            =   $_POST["spanno2"];
            $spanrm2            =   $_POST["spanrm2"];
            $spanno3            =   $_POST["spanno3"];
            $spanrm3            =   $_POST["spanrm3"];
            
            $arr_bliss              =   $_POST["arr_bliss"];
            $arr_sweet              =   $_POST["arr_sweet"];
            $arr_glee               =   $_POST["arr_glee"];
            $arr_happy              =   $_POST["arr_happy"];
            $arr_lucky              =   $_POST["arr_lucky"];
            $arr_bonus              =   $_POST["arr_bonus"];
                        
            $str_bliss          =   "";
            foreach($arr_bliss as $row_bliss)
            {
                $str_bliss      .=  $row_bliss."|";
            }
            $str_bliss          =   substr($str_bliss,0,(strlen($str_bliss)-1));
            
            $str_sweet          =   "";
            foreach($arr_sweet as $row_sweet)
            {
                $str_sweet      .=  $row_sweet."|";
            }
            $str_sweet          =   substr($str_sweet,0,(strlen($str_sweet)-1));
            
            $str_glee          =   "";
            foreach($arr_glee as $row_glee)
            {
                $str_glee      .=  $row_glee."|";
            }
            $str_glee          =   substr($str_glee,0,(strlen($str_glee)-1));
            
            $str_happy          =   "";
            foreach($arr_happy as $row_happy)
            {
                $str_happy      .=  $row_happy."|";
            }
            $str_happy          =   substr($str_happy,0,(strlen($str_happy)-1));
            
            $str_lucky          =   "";
            foreach($arr_lucky as $row_lucky)
            {
                $str_lucky      .=  $row_lucky."|";
            }
            $str_lucky          =   substr($str_lucky,0,(strlen($str_lucky)-1));
            
            $str_bonus          =   "";
            foreach($arr_bonus as $row_bonus)
            {
                $str_bonus      .=  $row_bonus."|";
            }
            $str_bonus          =   substr($str_bonus,0,(strlen($str_bonus)-1));
            
            
            $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_bigsweep_2",$str_date)->total;
            
            if($check_isset_row_db > 0)
            {
                $sql                = "UPDATE `lot_bigsweep_2` SET 
                                            `Draw_No` = '$spandrawno', `jpnumber` = '$spanjegit', 
                                            `jprm` = '$spanjp', `major_1` = '$spanno1', `majorrm_1` = '$spanrm1', 
                                            `major_2` = '$spanno2', `majorrm_2` = '$spanrm2', `major_3` = '$spanno3', 
                                            `majorrm_3` = '$spanrm3', `bliss` = '$str_bliss', `sweet` = '$str_sweet', 
                                            `glee` = '$str_glee', `happy` = '$str_happy', `lucky` = '$str_lucky', `bonus` = '$str_bonus' 
                                        WHERE `txday` = '$str_date'";
            }
            else
            {
                $sql                =   "INSERT INTO `lot_bigsweep_2` 
                                            (`txday`,       `Draw_No`,  `jpnumber`,     `jprm`, `major_1`,   `majorrm_1`, 
                                            `major_2`,   `majorrm_2`, `major_3`, `majorrm_3`,  `bliss`,     `sweet`,        
                                            `glee`,      `happy`,       `lucky`,            `bonus`) 
                                    VALUES ('$str_date', '$spandrawno', '$spanjegit', '$spanjp', '$spanno1', '$spanrm1', 
                                            '$spanno2',  '$spanrm2', '$spanno3',  '$spanrm3', '$str_bliss', '$str_sweet', 
                                            '$str_glee', '$str_happy',  '$str_lucky' ,    '$str_bonus')";
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
    | function get data by txtday from table bigsweep
    |----------------------------------------------------------------
    */
    public function get_data_by_txtdate_bigsweep()
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
            $row_db                 =   $this->m_common_lottery->get_row_by_table_txday("lot_bigsweep_2",$str_date);
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