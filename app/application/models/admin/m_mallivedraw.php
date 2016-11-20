<?php
class M_damacai extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    /*
    |----------------------------------------------------------------
    | function convert drawdate
    |----------------------------------------------------------------
    */
    function btndrawdate()
    {
        if(isset($_POST['ContentConvert']))
        {
            $txday                  = date("Ymd");
            $ContentConvert         = $_POST['ContentConvert'];
            $arr_content            = explode("\n",$ContentConvert);
            $arr_content            = explode(" ",$arr_content[0]);
            $date                   = $arr_content[3];
            $arr_date               = explode("/",$date);
            $txday                  = $arr_date[2].$arr_date[1].$arr_date[0];
            
            $drawno                 = substr($arr_content[(count($arr_content) - 1)],1);
            
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
    | function convert 1+3D convert
    |----------------------------------------------------------------
    */
    public function btnonethreed()
    {
        if(isset($_POST['ContentConvert']))
        {
            $ContentConvert         = $_POST['ContentConvert'];
            $arr_convert            = explode("\n", $ContentConvert);
            
            $Price_1_3D_1st         = $arr_convert[1];
            $Price_1_3D_2nd         = $arr_convert[3];
            $Price_1_3D_3rd         = $arr_convert[5];
            
            $arr_special            = array();
            for($i = 7; $i <17; $i++)
            {
                $arr_special[]      = $arr_convert[$i];
            }
            
            $arr_consolation        = array();
            for($i = 18; $i <28; $i++)
            {
                $arr_consolation[]  = $arr_convert[$i];
            }
            
            //return
            $arr                    = array(
                                        "Price_1_3D_1st"        => $Price_1_3D_1st,
                                        "Price_1_3D_2nd"        => $Price_1_3D_2nd,
                                        "Price_1_3D_3rd"        => $Price_1_3D_3rd,
                                        "arr_special"           => $arr_special,
                                        "arr_consolation"       => $arr_consolation
                                        );
            return $arr;
        }
    }
    /*
    |----------------------------------------------------------------
    | function convert 3D convert
    |----------------------------------------------------------------
    */
    public function btnthreed()
    {
        if(isset($_POST['ContentConvert']))
        {
            $ContentConvert         = $_POST['ContentConvert'];
            $arr_convert            = explode("\n", $ContentConvert);
            
            $Price_3D_1st         = $arr_convert[1];
            $Price_3D_2nd         = $arr_convert[3];
            $Price_3D_3rd         = $arr_convert[5];
            
            //return
            $arr                    = array(
                                        "Price_3D_1st"        => $Price_3D_1st,
                                        "Price_3D_2nd"        => $Price_3D_2nd,
                                        "Price_3D_3rd"        => $Price_3D_3rd
                                        );
            return $arr;
        }
    }
    
    
    
    
    /*
    |----------------------------------------------------------------
    | function convert 1+3D jackport 1 convert
    |----------------------------------------------------------------
    */
    public function btnonethreedjp1()
    {    
        if(isset($_POST['ContentConvert']))
        {
            $ContentConvert         = $_POST['ContentConvert'];
            $arr_convert            = explode("\n", $ContentConvert);
            $arr_res                = array();
            for($i = 0; $i < 6; $i ++)
            {
                $arr_res[]          = $arr_convert[$i]; 
            }
            
            //return
            $arr                    = array(
                                        "arr_res"        => $arr_res
                                        );
            return $arr;
        }
    }
    /*
    |----------------------------------------------------------------
    | function convert 1+3D jackport 2 convert
    |----------------------------------------------------------------
    */
    public function btnonethreeedjp2()
    {
        if(isset($_POST['ContentConvert']))
        {
            if(isset($_SESSION['txday']))
                $txday                  = $_SESSION['txday'];
            else
                $txday                  = date("Ymd");
            $ContentConvert         = $_POST['ContentConvert'];
            $arr_convert            = explode("\n", $ContentConvert);
            $arr_res                = array();
            for($i = 0; $i < 12; $i ++)
            {
                $arr_res[]          = $arr_convert[$i];
                $arr_res[]          = $arr_convert[($i+12)];
                $arr_res[]          = $arr_convert[($i+24)];
                $arr_res[]          = $arr_convert[($i+36)];
                $arr_res[]          = $arr_convert[($i+48)]; 
            }
            
            //return
            $arr                    = array(
                                        "arr_res"        => $arr_res
                                        );
            return $arr;
        }
    }
    /*
    |----------------------------------------------------------------
    | function convert DMC jackport 1 convert
    |----------------------------------------------------------------
    */
    public function btndmcjp1()
    {
        if(isset($_POST['ContentConvert']))
        {
            $ContentConvert         = $_POST['ContentConvert'];
            $str_convert            = $ContentConvert;
            
            //return
            $arr                    = array(
                                        "str_convert"        => $str_convert
                                        );
            return $arr;
        }
    }
    /*
    |----------------------------------------------------------------
    | function convert DMC jackport 2 convert
    |----------------------------------------------------------------
    */
    public function btndmcjp2()
    {
        if(isset($_POST['ContentConvert']))
        {
            if(isset($_SESSION['txday']))
                $txday                  = $_SESSION['txday'];
            else
                $txday                  = date("Ymd");
            $ContentConvert             = $_POST['ContentConvert'];
            
            $arr_convert            = explode("\n", $ContentConvert);
            $arr_res                = "";
            for($i = 0; $i < 5; $i ++)
            {
                $arr_res[]          = $arr_convert[$i]; 
            }
            
            //return
            $arr                    = array(
                                        "arr_res"        => $arr_res
                                        );
            return $arr;
        }
    }
    
    /*
    |----------------------------------------------------------------
    | function convert RM
    |----------------------------------------------------------------
    */
    public function btnrm()
    {
        if(isset($_POST['ContentConvert']))
        {
            if(isset($_SESSION['txday']))
                $txday                  = $_SESSION['txday'];
            else
                $txday                  = date("Ymd");
            $ContentConvert         = $_POST['ContentConvert'];
            $arr_convert            = explode("\n", $ContentConvert);
            if($arr_convert[4] == "")
            {
                $jp1_1_3d               = substr($arr_convert[1],3);
                $jp2_1_3d               = substr($arr_convert[3],3);
                $jp_3d                  = substr($arr_convert[6],3);
                $jp1_dmc                = substr($arr_convert[8],3);
                $jp2_dmc                = substr($arr_convert[10],3);
            }
            else
            {
                $jp1_1_3d               = substr($arr_convert[1],3);
                $jp2_1_3d               = substr($arr_convert[3],3);
                $jp_3d                  = substr($arr_convert[5],3);
                $jp1_dmc                = substr($arr_convert[7],3);
                $jp2_dmc                = substr($arr_convert[9],3);
            }
            
            //return
            $arr                        = array(
                                            "jp1_1_3d"          => $jp1_1_3d,
                                            "jp2_1_3d"          => $jp2_1_3d,
                                            "jp_3d"             => $jp_3d,
                                            "jp1_dmc"           => $jp1_dmc,
                                            "jp2_dmc"           => $jp2_dmc,
                                        );
            return $arr;
        }
    }
    
    /*
    |----------------------------------------------------------------
    | function save all damacai
    |----------------------------------------------------------------
    */
    public function btnsaveall_damacai()
    {
        if(isset($_POST["spandrawno"]))
        {
            $span_date          =   $_POST["span_date"];
            $arr_date           =   explode("/",$span_date);
            $txday              =   $arr_date[2].$arr_date[1].$arr_date[0];
            $drawno             =   $_POST["spandrawno"];
            $span_1st_1_3d      =   $_POST["span_1st_1_3d"];
            $span_2nd_1_3d      =   $_POST["span_2nd_1_3d"];
            $span_3rd_1_3d      =   $_POST["span_3rd_1_3d"];
            
            $arr_special        =   $_POST["arr_special"];
            $arr_consolation    =   $_POST["arr_consolation"];
            
            $span_1st_3d        =   $_POST["span_1st_3d"];
            $span_2nd_3d        =   $_POST["span_2nd_3d"];
            $span_3rd_3d        =   $_POST["span_3rd_3d"];
            
            $span_rm_13djp1     =   $_POST["span_rm_13djp1"];
            $span_rm_13djp2     =   $_POST["span_rm_13djp2"];
            $span_rm_3djp       =   $_POST["span_rm_3djp"];
            $span_rm_dmcjp1     =   $_POST["span_rm_dmcjp1"];
            $span_rm_dmcjp2     =   $_POST["span_rm_dmcjp2"];
            
            $arr_jp1_13         =   $_POST["arr_jp1_13"];
            $arr_jp1_23         =   $_POST["arr_jp1_23"];
            $dmcjp1             =   $_POST["dmcjp1"];
            $arr_dmcjp2         =   $_POST["arr_dmcjp2"];
            
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
            
            $str_jp1_13        =   "";
            foreach($arr_jp1_13 as $row_jp1_13)
            {
                $str_jp1_13    .=  $row_jp1_13."|";
            }
            $str_jp1_13        =   substr($str_jp1_13,0,(strlen($str_jp1_13)-1));
            
            $str_jp1_23        =   "";
            foreach($arr_jp1_23 as $row_jp1_23)
            {
                $str_jp1_23    .=  $row_jp1_23."|";
            }
            $str_jp1_23        =   substr($str_jp1_23,0,(strlen($str_jp1_23)-1));
            
            $str_dmcjp2        =   "";
            foreach($arr_dmcjp2 as $row_dmcjp2)
            {
                $str_dmcjp2    .=  $row_dmcjp2."|";
            }
            $str_dmcjp2        =   substr($str_dmcjp2,0,(strlen($str_dmcjp2)-1));
            
            $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_damacai",$txday)->total;
            
            if($check_isset_row_db > 0)
            {
                $sql                = " UPDATE `lot_damacai` SET 
                                                `Draw_No` = '$drawno', `1_3D_1st_Price` = '$span_1st_1_3d', 
                                                `1_3D_2nd_Price` = '$span_2nd_1_3d', `1_3D_3rd_Price` = '$span_3rd_1_3d', 
                                                `Special` = '$str_special', `Consolation` = '$str_consolation', 
                                                `3D_1st_Price` = '$span_1st_3d', `3D_2nd_Price` = '$span_2nd_3d', 
                                                `3D_3rd_Price` = '$span_3rd_3d', `1_3DJp1` = '$str_jp1_13', 
                                                `1_3DJp1_RM` = '$span_rm_13djp1', `1_3DJp2` = '$str_jp1_23', 
                                                `1_3DJp2_RM` = '$span_rm_13djp2', `3D_Jp` = '', 
                                                `3D_Jp_RM` = '$span_rm_3djp', `DMC_Jp1` = '$dmcjp1', 
                                                `DMC_Jp1_RM` = '$span_rm_dmcjp1', `DMC_Jp2` = '$str_dmcjp2', 
                                                `DMC_Jp2_RM` = '$span_rm_dmcjp2' 
                                        WHERE `txday` = '$txday'";
            }
            else
            {
                $sql                = "INSERT INTO `lot_damacai` 
                                            (`txday`, `Draw_No`, `1_3D_1st_Price`, `1_3D_2nd_Price`, `1_3D_3rd_Price`, `Special`, 
                                            `Consolation`,      `3D_1st_Price`, `3D_2nd_Price`, `3D_3rd_Price`,   `1_3DJp1`,     `1_3DJp1_RM`, 
                                            `1_3DJp2`,        `1_3DJp2_RM`, `3D_Jp`, `3D_Jp_RM`,    `DMC_Jp1`,   `DMC_Jp1_RM`,      `DMC_Jp2`,      `DMC_Jp2_RM`) 
                                    VALUES ('$txday', '$drawno', '$span_1st_1_3d', '$span_2nd_1_3d', '$span_3rd_1_3d', '$str_special', 
                                            '$str_consolation', '$span_1st_3d', '$span_2nd_3d', '$span_3rd_3d', '$str_jp1_13', '$span_rm_13djp1', 
                                            '$str_jp1_23', '$span_rm_13djp2', '',  '$span_rm_3djp', '$dmcjp1', '$span_rm_dmcjp1', '$str_dmcjp2', '$span_rm_dmcjp2')";
            }
            
            $query                  = $this->db->query($sql);
            
            //return
            if($query)
                return 1;
            else
                return 0;
        }
    }
}