<?php
class M_livedraw extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    
    /*
	|----------------------------------------------------------------
	| get data by select function + date
	|----------------------------------------------------------------
	*/

    public function loadlistdatedamacai()
    {
        $sql = "SELECT `txday` FROM `ld_damacai`";
        $arr_list = $this->db->query($sql)->result();
        $arr = array("RaceDate_U" => $arr_list);
        return $arr;
    }

    public function loadlistdatemagnum()
    {
        $sql = "SELECT `txday` FROM `ld_magnum`";
        $arr_list = $this->db->query($sql)->result();
        $arr = array("RaceDate_U" => $arr_list);
        return $arr;
    }

    public function loadlistdatetoto()
    {
        $sql = "SELECT `txday` FROM `ld_toto`";
        $arr_list = $this->db->query($sql)->result();
        $arr = array("RaceDate_U" => $arr_list);
        return $arr;
    }

    public function loadlistdatesin4D()
    {
        $sql = "SELECT `txday` FROM `ld_sin4d`";
        $arr_list = $this->db->query($sql)->result();
        $arr = array("RaceDate_U" => $arr_list);
        return $arr;
    }

    public function loadlistdatesintoto()
    {
        $sql = "SELECT `txday` FROM `ld_sintoto`";
        $arr_list = $this->db->query($sql)->result();
        $arr = array("RaceDate_U" => $arr_list);
        return $arr;
    }

    public function get_data_by_txtdate()
    {
        if(isset($_POST['txtdate']))
        {
            $txday                  =   $_POST['txtdate'];  //dd-mm-yyyy
            $sechoose               =   $_POST['sechoose'];
            
            $arr_choose             =   array(
                                            "damacai"       =>  "ld_damacai",
                                            "magnum"        =>  "ld_magnum",
                                            "toto"          =>  "ld_toto",
                                            "sinfourd"      =>  "ld_sin4d",
                                            "sintoto"       =>  "ld_sintoto",
                                            );
        
            $arr_txday              =   explode("-",$txday);
            $str_date               =   $arr_txday[2].$arr_txday[1].$arr_txday[0];
            $row_db                 =   $this->m_common_lottery->get_row_by_table_txday($arr_choose[$sechoose],$str_date);
            if(count($row_db)   >   0)
            {
                $flag               =   1;
            }
            else
            {
                $flag               =   0;
            }
            
            //return    
            $arr                    =   array(  "flag"      =>  $flag,
                                                "arr_res"   =>  $row_db,
                                                "sechoose"      =>  $sechoose,
                                                );
            return $arr;
        }
    }

    public function convertMT($prize1st,$prize2nd,$prize3rd,$table,$txtday)
    {
         $arr_getval     =   array(

                                    "A" => 0,
                                    "B" => 1,
                                    "C" => 2,
                                    "D" => 3,
                                    "E" => 4,
                                    "F" => 5,
                                    "G" => 6,
                                    "H" => 7,
                                    "I" => 8,
                                    "J" => 9,
                                    "K" => 10,
                                    "L" => 11,
                                    "M" => 12,
                                );
        $st_1st = "";
        $st_2nd = "";
        $st_3rd = "";

        $row_check     =   $this->m_common_lottery->get_row_by_table_txday($table,$txtday);
        if(count($row_check) != 0)
        {
            $specail                =   $row_check->special;
            $specail                =   explode("|",$specail);
           
            if(isset($arr_getval[$prize1st]))
             {
                $st_1st             =   $specail[$arr_getval[$prize1st]];
             }
                    
            if(isset($arr_getval[$prize2nd]))
            {
               $st_2nd              =   $specail[$arr_getval[$prize2nd]];
            }
                
            if(isset($arr_getval[$prize3rd]))
            {
                $st_3rd             =   $specail[$arr_getval[$prize3rd]];
            }
        }

        $arr = array("str_1st"=>$st_1st,"str_2nd"=>$st_2nd,"str_3rd"=>$st_3rd);
        return $arr;
    }

    public function SaveConvertDMT()
    {
        $str_1st = "";
        $str_2nd = "";
        $str_3rd = "";
        $req  = "";
       
        $txtday         = $_POST['txtdate'];
        $arr_txday      =   explode("-",$txtday);
        $str_date       =   $arr_txday[2].$arr_txday[1].$arr_txday[0];

        // check live draw have information then save lot_damacai 
        $row_dmc        =   $this->m_common_lottery->get_row_by_table_txday("ld_damacai",$str_date);
        if(count($row_dmc) != 0)
        {
           $row_dmclottry =  $this->m_common_lottery->get_row_by_table_txday("lot_damacai",$str_date);
           if(count($row_dmclottry) != 0)
           {

                // update
                $query = "UPDATE `lot_damacai`
                          SET `1_3D_1st_Price`='$row_dmc->one',`1_3D_2nd_Price`='$row_dmc->two',
                              `1_3D_3rd_Price`='$row_dmc->three',`Special`='$row_dmc->special',`Consolation`='$row_dmc->consolation'
                          WHERE `txday`='$str_date'";
                $reqdmc   =  $this->db->query($query);
                if($reqdmc)
                    $req = 1;

           }
           else
           {
                // insert 
                $query = "INSERT INTO `lot_damacai`(`txday`,`1_3D_1st_Price`,`1_3D_2nd_Price`,`1_3D_3rd_Price`,`Special`,`Consolation`)
                                            VALUES('$str_date','$row_dmc->one','$row_dmc->two','$row_dmc->three','$row_dmc->special','$row_dmc->consolation')";
                $reqdmc   =  $this->db->query($query);
                if($reqdmc)
                    $req = 1;
           }
        }

        // check live draw have information then save lot_magnum 
        $row_magmun     =   $this->m_common_lottery->get_row_by_table_txday("ld_magnum",$str_date);
        if(count($row_magmun) != 0)
        {
           $arr_postion_magmun = $this->convertMT($row_magmun->one,$row_magmun->two,$row_magmun->three,'ld_magnum',$str_date);          
           if(count($arr_postion_magmun) > 0)
           {
                $str_1st = $arr_postion_magmun['str_1st'];
                $str_2nd = $arr_postion_magmun['str_2nd'];
                $str_3rd = $arr_postion_magmun['str_3rd'];
           }

           //specail magnum 
           $specail_magnum = $row_magmun->special;
           $str_specail = "";
           if($specail_magnum != "")
           {
              $specail_magnum =  explode("|",$specail_magnum);
              if(count($specail_magnum) > 0)
              {
                    for($i=0;$i<count($specail_magnum);$i++)
                    {
                        if($specail_magnum[$i] != "")
                        {
                            if($specail_magnum[$i] != $str_1st && $specail_magnum[$i] != $str_2nd && $specail_magnum[$i] != $str_3rd)
                             $str_specail = $str_specail.$specail_magnum[$i]."|";
                        } 
                    }
              }  
           }
           $row_magmunlottry =  $this->m_common_lottery->get_row_by_table_txday("lot_magnum",$str_date);
           if(count($row_magmunlottry) != 0)
           {
                // update
                $query =    "UPDATE `lot_magnum` 
                            SET `4D_1st_Price`='$str_1st',`4D_2nd_Price`='$str_2nd',
                                `4D_3rd_Price`='$str_3rd',`Special`='$str_specail',
                                `Consolation`='$row_magmun->consolation'
                            WHERE `txday`='$str_date'";
                $reqmagmun   =  $this->db->query($query);
                if($reqmagmun)
                  $req = 1;  
           }
           else
           {
                // insert 
                $query = "INSERT INTO `lot_magnum`(`txday`,`4D_1st_Price`,`4D_2nd_Price`,`4D_3rd_Price`,`Special`,`Consolation`)
                                            VALUES('$str_date','$str_1st','$str_2nd',
                                                    '$str_3rd','$str_specail',
                                                    '$row_magmun->consolation')";
                $reqmagmun   =  $this->db->query($query);
                 if($reqmagmun)
                  $req = 1; 
           }

        }

        // check live draw TOTO then save lot_toto4D
        $row_toto       =   $this->m_common_lottery->get_row_by_table_txday("ld_toto",$str_date);
        if(count($row_toto) != 0)
        {
          $arr_postion_toto = $this->convertMT($row_toto->one,$row_toto->two,$row_toto->three,'ld_toto',$str_date);          
           if(count($arr_postion_toto) > 0)
           {
                $str_1st = $arr_postion_toto['str_1st'];
                $str_2nd = $arr_postion_toto['str_2nd'];
                $str_3rd = $arr_postion_toto['str_3rd'];
           }

           $toto_special = $row_toto->special;
           $str_totosp = "";
           if($toto_special != "")
           {
                $toto_special = explode("|",$toto_special);
                if(count($toto_special) > 0)
                {
                    for($i=0;$i<count($toto_special);$i++)
                    {
                        if($toto_special[$i] != "")
                        {
                            if($toto_special[$i] != $str_1st && $toto_special[$i] != $str_2nd && $toto_special[$i] != $str_3rd)
                                $str_totosp = $str_totosp.$toto_special[$i]."|";
                        } 
                    }
                }
           }
           $row_totolottry =  $this->m_common_lottery->get_row_by_table_txday("lot_toto4d",$str_date);
           if(count($row_totolottry) != 0)
           {
                // update
                $query =  "UPDATE `lot_toto4d` SET `ST_1st_Price`='$str_1st',`ST_2nd_Price`='$str_2nd',
                                                `ST_3rd_Price`='$str_3rd',`Special`='$str_totosp',
                                                `Consolation`='$row_toto->consolation'
                                                WHERE `txday`='$str_date'";
                $reqtoto   =  $this->db->query($query);
                if($reqtoto)
                   $req = 1; 
           }
           else
           {
                // insert 
                $query = "INSERT INTO `lot_toto4d`(`txday`,`ST_1st_Price`,`ST_2nd_Price`,`ST_3rd_Price`,`Special`,`Consolation`) 
                                            VALUES('$str_date','$str_1st','$str_2nd','$str_3rd','$str_totosp','$row_toto->consolation')";
                $reqtoto   =  $this->db->query($query);
                if($reqtoto)
                   $req = 1;
           }
        }

        // check live draw SIN 4D then save  lot_sin4D
        $row_sin4D      =  $this->m_common_lottery->get_row_by_table_txday("ld_sin4d",$str_date);
        if(count($row_sin4D) != 0)
        {
             $row_lottsin4D = $this->m_common_lottery->get_row_by_table_txday("lot_sin4d",$str_date);
             if(count($row_lottsin4D) != 0)
             {
                 $s_query = "UPDATE `lot_sin4d` SET `1st`='$row_sin4D->one',
                                                    `2nd`='$row_sin4D->two',
                                                    `3rd`='$row_sin4D->three',
                                                    `Special`='$row_sin4D->special',
                                                    `Consolation`='$row_sin4D->consolation'
                                                WHERE txday='$str_date'";
                 $req_sin4D = $this->db->query($s_query);
                 if($req_sin4D)
                    $req = 1;
             }
             else
             {
                 $s_query = "INSERT INTO `lot_sin4d`(`txday`,`1st`,`2nd`,`3rd`,`Special`,`Consolation`)
                                              VALUES('$str_date','$row_sin4D->one','$row_sin4D->two',
                                                     '$row_sin4D->three','$row_sin4D->special',
                                                     '$row_sin4D->consolation')";
                  $req_sin4D = $this->db->query($s_query);
                  if($req_sin4D)
                    $req = 1;
             }
        }

        // check live draw SIN TOTO then save  lot_sintoto
        $raw_sintoto = $this->m_common_lottery->get_row_by_table_txday("ld_sintoto",$str_date);
        if(count($raw_sintoto) > 0)
        {
            $row_l_sintoto = $this->m_common_lottery->get_row_by_table_txday("lot_sintoto",$str_date);
            if(count($row_l_sintoto) != 0)
            {
                $s_query = "UPDATE `lot_sintoto` SET `WinNo`='$raw_sintoto->winningNo',`Add_Number`='$raw_sintoto->additional' 
                            WHERE `txday`='$str_date'";
                $req_sintoto = $this->db->query($s_query);
                if($req_sintoto)
                    $req = 1;
            }
            else
            {
                $s_query = "INSERT INTO `lot_sintoto`(`txday`,`WinNo`,`Add_Number`)
                            VALUES('$str_date','$raw_sintoto->winningNo','$raw_sintoto->additional')";
                $req_sintoto = $this->db->query($s_query);
                if($req_sintoto)
                    $req = 1;
            }
        }

        $arr = array('result'=>$req);
        return $arr;

    }
    /*
	|----------------------------------------------------------------
	| get data by select function + date
	|----------------------------------------------------------------
	*/
    public function get_data_by_txtdate_from_tbl_lot_sintoto()
    {
        if(isset($_POST['txtdate']))
        {
            $txday                  =   $_POST['txtdate'];  //dd-mm-yyyy
            $arr_txday              =   explode("-",$txday);
            $str_date               =   $arr_txday[2].$arr_txday[1].$arr_txday[0];
            $row_db                 =   $this->m_common_lottery->get_row_by_table_txday("lot_sintoto",$str_date);
            
            $drawno                 =   "";
            if(count($row_db)   >   0)
            {
                $drawno             =   $row_db->Draw_No;
                $flag               =   1;
            }
            else
            {
                $flag               =   0;
            }
            
            //return    
            $arr                    =   array(  "flag"      =>  $flag,
                                                "drawno"   =>  $drawno
                                                );
            return $arr;
        }
    }
    
    /*
    |----------------------------------------------------------------
    | function save damacai
    |----------------------------------------------------------------
    */
    function btnsavedmc()
    {
        if(isset($_POST['dmc1']))
        {
            $_date = "";
            $_month = "";
            $_year = "";
            $txday                  =   $_POST['txtdate'];
            $dmc1                   =   $_POST['dmc1'];
            $dmc2                   =   $_POST['dmc2'];
            $dmc3                   =   $_POST['dmc3'];
            $dmc_special            =   $_POST['dmc_special'];
            $dmc_con                =   $_POST['dmc_con'];
            // parse date for damacai
            $arr_date = explode("-", $txday);
            if(isset($arr_date[0]))
                $_date = $arr_date[0];
            if(isset($arr_date[1]))
                $_month = $arr_date[1];
            if(isset($arr_date[2]))
                $_year = $arr_date[2];
            $list_date = $_year.$_month.$_date;
            // end parse date for damcai
            $str_special            =   "";
            foreach($dmc_special as $row_special)
            {
                if($row_special != "")
                    $str_special    .= $row_special."|";
                else
                    $str_special    .= " "."|";
            }
            $str_special            = substr($str_special,0,(strlen($str_special)-1));
            
            $str_con                =   "";
            foreach($dmc_con as $row_con)
            {
                if($row_con         !=  "")
                    $str_con        .=  $row_con."|";
                else
                    $str_con        .=  " "."|";
            }
            $str_con                =   substr($str_con,0,(strlen($str_con)-1));
            $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("ld_damacai",$list_date)->total;
            //print_r($check_isset_row_db);
            //print_r($list_date);
            if($check_isset_row_db != 0)
            {
                $sql                =   "UPDATE `ld_damacai` SET 
                                        `one` = '$dmc1', `two` = '$dmc2', `three` = '$dmc3', 
                                        `special` = '$str_special', `consolation` = '$str_con' 
                                        WHERE `txday` = '$list_date'";
            }
            else
            {
                $sql                =   "INSERT INTO `ld_damacai` 
                                                   (`txday`, `one`,    `two`, `three`, `special`,      `consolation`) 
                                            VALUES ('$list_date', '$dmc1','$dmc2', '$dmc3', '$str_special', '$str_con')";
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
    | function save magnum
    |----------------------------------------------------------------
    */
    function btnsavemagnum()
    {
        if(isset($_POST['semagnum1']))
        {
            $_date = "";
            $_month = "";
            $_year = "";
            $req = "";

            $arr_getval     =   array(
                                        "A" => 0,
                                        "B" => 1,
                                        "C" => 2,
                                        "D" => 3,
                                        "E" => 4,
                                        "F" => 5,
                                        "G" => 6,
                                        "H" => 7,
                                        "I" => 8,
                                        "J" => 9,
                                        "K" => 10,
                                        "L" => 11,
                                        "M" => 12,
                                  );

            $txday   =   $_POST['txtdate'];
            $arr_date = explode("-", $txday);
            if(isset($arr_date[0]))
                $_date = $arr_date[0];
            if(isset($arr_date[1]))
                $_month = $arr_date[1];
            if(isset($arr_date[2]))
                $_year = $arr_date[2];
            $list_date = $_year.$_month.$_date;

            $semagnum1                  =   $_POST['semagnum1'];
            $semagnum2                  =   $_POST['semagnum2'];
            $semagnum3                  =   $_POST['semagnum3'];
            $magnum_special             =   $_POST['magnum_special'];
            //print_r($magnum_special);
            $magnum_con                 =   $_POST['magnum_con'];
            
            $str_special            =   "";
            foreach($magnum_special as $row_special)
            {
                if($row_special != "")
                    $str_special    .= $row_special."|";
                else
                    $str_special    .= " "."|";
            }
            $str_special            = substr($str_special,0,(strlen($str_special)-1));
            
            $str_con                =   "";
            foreach($magnum_con as $row_con)
            {
                if($row_con         !=  "")
                    $str_con        .=  $row_con."|";
                else
                    $str_con        .=  " "."|";
            }

            $str_con                =   substr($str_con,0,(strlen($str_con)-1));
            
            $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("ld_magnum",$list_date)->total;
            
            if($check_isset_row_db != 0)
            {
                $sql                =   "UPDATE `ld_magnum` SET 
                                        `one` = '$semagnum1', `two` = '$semagnum2', `three` = '$semagnum3', 
                                        `special` = '$str_special', `consolation` = '$str_con' 
                                        WHERE `txday` = '$list_date'";
            }
            else
            {
                $sql                =   "INSERT INTO `ld_magnum` 
                                                    (`txday`, `one`,    `two`, `three`, `special`,      `consolation`) 
                                            VALUES ('$list_date', '$semagnum1','$semagnum2', '$semagnum3', '$str_special', '$str_con')";
            }
            
            $query                  =   $this->db->query($sql);
            if($query)
            {
                //$check_lottmagnum     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_magnum",$list_date)->total;
                // $first = "";
                // $two   = "";
                // $three = "";
                // $str_specail = "";
                // if(count($magnum_special) > 0)
                // {
                //     if(isset($arr_getval[$semagnum1]))
                //     {
                //         $first = $magnum_special[$arr_getval[$semagnum1]];
                //     }
                //     if(isset($arr_getval[$semagnum2]))
                //     {
                //         $two = $magnum_special[$arr_getval[$semagnum2]];
                //     }

                //     if(isset($arr_getval[$semagnum3]))
                //     {
                //         $three = $magnum_special[$arr_getval[$semagnum3]];
                //     }

                //     for($i=0;$i<count($magnum_special);$i++)
                //     {
                //         if($magnum_special[$i] != "")
                //         {
                //             if($magnum_special[$i] != $first && $magnum_special[$i] != $two && $magnum_special[$i] != $three)
                //              $str_specail = $str_specail.$magnum_special[$i]."|";
                //         } 
                //     }
                // }

                // if($check_lottmagnum != 0)
                // {
                //     $sql_magnum =  "UPDATE `lot_magnum`
                //                     SET `4D_1st_Price`='$first',`4D_2nd_Price`='$two',
                //                         `4D_3rd_Price`='$three',`Special`='$str_specail',`Consolation`='$str_con'
                //                     WHERE `txday`='$list_date'";

                //     $this->db->query($sql_magnum);
                // }
                // else
                // {
                //      $sql_magnum = "INSERT INTO `lot_magnum`(`txday`,`4D_1st_Price`,`4D_2nd_Price`,`4D_3rd_Price`,`Special`,`Consolation`)
                //                     VALUES('$list_date','$first','$two','$three','$str_specail','$str_con')";
                //      $this->db->query($sql_magnum);
                // }
                  $req = 1;
                  //return 1;
            }
                
            else
                 $req =  0;
        }

        $arr = array('result'=>$req);
        return $arr;
    }
    /*
    |----------------------------------------------------------------
    | function save toto
    |----------------------------------------------------------------
    */
    function btnsavetoto()
    {
        if(isset($_POST['setoto1']))
        {
            $_date = "";
            $_month = "";
            $_year = "";

            $arr_getval     =   array(
                                        "A" => 0,
                                        "B" => 1,
                                        "C" => 2,
                                        "D" => 3,
                                        "E" => 4,
                                        "F" => 5,
                                        "G" => 6,
                                        "H" => 7,
                                        "I" => 8,
                                        "J" => 9,
                                        "K" => 10,
                                        "L" => 11,
                                        "M" => 12,
                                  );

            $txday    =   $_POST['txtdate'];
            $arr_date = explode("-", $txday);
            if(isset($arr_date[0]))
                $_date = $arr_date[0];
            if(isset($arr_date[1]))
                $_month = $arr_date[1];
            if(isset($arr_date[2]))
                $_year = $arr_date[2];
            $list_date = $_year.$_month.$_date;

            $setoto1              =   $_POST['setoto1'];
            $setoto2              =   $_POST['setoto2'];
            $setoto3              =   $_POST['setoto3'];
            $toto_special            =   $_POST['toto_special'];
            $toto_con                =   $_POST['toto_con'];
            
            $str_special            =   "";
            foreach($toto_special as $row_special)
            {
                if($row_special != "")
                    $str_special    .= $row_special."|";
                else
                    $str_special    .= " "."|";
            }
            $str_special            = substr($str_special,0,(strlen($str_special)-1));
            
            $str_con                =   "";
            foreach($toto_con as $row_con)
            {
                if($row_con         !=  "")
                    $str_con        .=  $row_con."|";
                else
                    $str_con        .=  " "."|";
            }
            $str_con                =   substr($str_con,0,(strlen($str_con)-1));
            
            $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("ld_toto",$list_date)->total;
            
            if($check_isset_row_db != 0)
            {
                $sql                =   "UPDATE `ld_toto` SET 
                                        `one` = '$setoto1', `two` = '$setoto2', `three` = '$setoto3', 
                                        `special` = '$str_special', `consolation` = '$str_con' 
                                        WHERE `txday` = '$list_date'";
            }
            else
            {
                $sql                =   "INSERT INTO `ld_toto` 
                                                    (`txday`, `one`,    `two`, `three`, `special`,      `consolation`) 
                                            VALUES ('$list_date', '$setoto1','$setoto2', '$setoto3', '$str_special', '$str_con')";
            }
            
            $query                  =   $this->db->query($sql);
            if($query)
            {
                $check_lottoto     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_toto4d",$list_date)->total;
                $first = "";
                $two   = "";
                $three = "";
                $str_specail = "";
                if(count($toto_special) > 0)
                {
                    if(isset($arr_getval[$setoto1]))
                    {
                        $first = $toto_special[$arr_getval[$setoto1]];
                    }
                    if(isset($arr_getval[$setoto2]))
                    {
                        $two = $toto_special[$arr_getval[$setoto2]];
                    }

                    if(isset($arr_getval[$setoto3]))
                    {
                        $three = $toto_special[$arr_getval[$setoto3]];
                    }
                    for($i=0;$i<count($toto_special);$i++)
                    {
                        if($toto_special[$i] != "")
                        {
                            if($toto_special[$i] != $first && $toto_special[$i] != $two && $toto_special[$i] != $three)
                             $str_specail = $str_specail.$toto_special[$i]."|";
                        } 
                    }
                }

                if($check_lottoto != 0)
                {
                    $sql_toto = " UPDATE `lot_toto4d`
                                    SET `ST_1st_Price`='$first',`ST_2nd_Price`='$two',
                                        `ST_3rd_Price`='$three',`Special`='$str_specail',`Consolation`='$str_con'
                                    WHERE `txday`='$list_date'";

                    $this->db->query($sql_toto);
                }
                else
                {
                     $sql_toto = "INSERT INTO `lot_toto4d`(`txday`,`ST_1st_Price`,`ST_2nd_Price`,`ST_3rd_Price`,`Special`,`Consolation`)
                                    VALUES('$list_date','$first','$two','$three','$str_specail','$str_con')";
                     $this->db->query($sql_toto);
                }

                return 1;
            }
                
            else
                return 0;
        }
    }
    /*
    |----------------------------------------------------------------
    | function save sin4d
    |----------------------------------------------------------------
    */
    function btnsavesin4d()
    {
        if(isset($_POST['sin4d1']))
        {
            $_date = "";
            $_month = "";
            $_year = "";
            $txday =   $_POST['txtdate'];
            $arr_date = explode("-", $txday);

            if(isset($arr_date[0]))
                $_date = $arr_date[0];
            if(isset($arr_date[1]))
                $_month = $arr_date[1];
            if(isset($arr_date[2]))
                $_year = $arr_date[2];
            $list_date = $_year.$_month.$_date;
            

            $sin4d1                   =   $_POST['sin4d1'];
            $sin4d2                   =   $_POST['sin4d2'];
            $sin4d3                   =   $_POST['sin4d3'];
            $sin4d_special            =   $_POST['sin4d_special'];
            $sin4d_con                =   $_POST['sin4d_con'];
            
            $str_special            =   "";
            foreach($sin4d_special as $row_special)
            {
                if($row_special != "")
                    $str_special    .= $row_special."|";
                else
                    $str_special    .= " "."|";
            }
            $str_special            = substr($str_special,0,(strlen($str_special)-1));
            
            $str_con                =   "";
            foreach($sin4d_con as $row_con)
            {
                if($row_con         !=  "")
                    $str_con        .=  $row_con."|";
                else
                    $str_con        .=  " "."|";
            }
            $str_con                =   substr($str_con,0,(strlen($str_con)-1));
            
            $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("ld_sin4d",$list_date)->total;
            
            if($check_isset_row_db > 0)
            {
                $sql                =   "UPDATE `ld_sin4d` SET 
                                        `one` = '$sin4d1', `two` = '$sin4d2', `three` = '$sin4d3', 
                                        `special` = '$str_special', `consolation` = '$str_con' 
                                        WHERE `txday` = '$list_date'";
            }
            else
            {
                $sql                =   "INSERT INTO `ld_sin4d` 
                                                    (`txday`, `one`,    `two`, `three`, `special`,      `consolation`) 
                                            VALUES ('$list_date', '$sin4d1','$sin4d2', '$sin4d3', '$str_special', '$str_con')";
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
    | function save sintoto
    |----------------------------------------------------------------
    */
    function btnsavesintoto()
    {
        if(isset($_POST['sintoto']))
        {
            $_date = "";
            $_month = "";
            $_year = "";

            $txday                      =   $_POST['txtdate'];
            $arr_date = explode("-", $txday);
            if(isset($arr_date[0]))
                $_date = $arr_date[0];
            if(isset($arr_date[1]))
                $_month = $arr_date[1];
            if(isset($arr_date[2]))
                $_year = $arr_date[2];
            $list_date = $_year.$_month.$_date;

            $sintoto                    =   $_POST['sintoto'];
            $str_winningNo              =   "";
            $str_additional             =   "";
            for($i  =   0; $i   <   (count($sintoto)-1); $i ++)
            {
                if($sintoto[$i] != "")
                    $str_winningNo      .= $sintoto[$i]."|";
                else
                    $str_winningNo      .= " "."|";
            }
            $str_winningNo              =   substr($str_winningNo,0,(strlen($str_winningNo)-1));
            $str_additional             =   $sintoto[(count($sintoto)-1)];
            
            $check_isset_row_db         = (int)$this->m_common_lottery->check_isset_row_by_table_txday("ld_sintoto",$list_date)->total;
            
            if($check_isset_row_db > 0)
            {
                $sql                    =   "UPDATE `ld_sintoto` SET `winningNo` = '$str_winningNo', `additional` = '$str_additional' 
                                            WHERE `txday` = '$list_date'";
            }
            else
            {
                $sql                    =   "INSERT INTO `ld_sintoto` 
                                                    (`txday`,   `winningNo`,     `additional`) 
                                            VALUES ('$list_date', '$str_winningNo', '$str_additional')";
            }
            $query                      =   $this->db->query($sql);
            if($query)
                return 1;
            else
                return 0;
        }
    }
    
}