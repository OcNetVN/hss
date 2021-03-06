<?php
class M_mallivedraw extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    /*
	|----------------------------------------------------------------
	| function load mal_livedraw
	|----------------------------------------------------------------
	*/
    function load_mal_livedraw()
    {
         $arr_week = array(
                                "Mon"=>$this->lang->line(LANG_TIME_MON),
                                "Tue"=>$this->lang->line(LANG_TIME_TUE),
                                "Wed"=>$this->lang->line(LANG_TIME_WED),
                                "Thu"=>$this->lang->line(LANG_TIME_THU),
                                "Fri"=>$this->lang->line(LANG_TIME_FRI),
                                "Sat"=>$this->lang->line(LANG_TIME_SAT),
                                "Sun"=>$this->lang->line(LANG_TIME_SUN),
                                );
        
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

        $str_st1              =   "<p style=\"color:#F00;border:1px solid #F00; margin-top:-2px; height: 32px; width: 34px;font-size:15px;\">".$this->lang->line(LANG_1ST)."</p>";
        $str_nd2              =   "<p style=\"color:#F00;border:1px solid #F00; margin-top:-2px; height: 32px; width: 34px;font-size:15px;\">".$this->lang->line(LANG_2ND)."</p>";
        $str_rd3              =   "<p style=\"color:#F00;border:1px solid #F00; margin-top:-2px; height: 32px; width: 34px;font-size:15px;\">".$this->lang->line(LANG_3RD)."</p>";                        
        $txday          =   date("Ymd");
        $row_magnum     =   $this->get_tbl_by_txday("ld_magnum",$txday);
        $row_dmc        =   $this->get_tbl_by_txday("ld_damacai",$txday);
        $row_toto       =   $this->get_tbl_by_txday("ld_toto",$txday);
        
        $str_res_spmagnum           =   "";
        $str_res_conmagnum          =   "";
        $str_date                   =   "";
        $one = "";
        $two = "";
        $three = "";

        $postion1st = -1;
        $postion2nd = -2;
        $postion3rd = -3;
        $postiontoto1st = -1;
        $postiontoto2nd = -2;
        $postiontoto3rd = -3;
        if(count($row_magnum) > 0)
        {
            $txday                  =   $row_magnum->txday; //yyyymmdd
            $str_date               =   substr($txday,-2)."/".substr($txday,4,2)."/".substr($txday,0,4);
            $str_date_temp          =   substr($txday,0,4)."-".substr($txday,4,2)."-".substr($txday,-2);
            $str_date               =   $str_date." ". $arr_week[date('D', strtotime($str_date_temp))];
            
            $str_spmagnum           =   $row_magnum->special;
            $arr_spmagnum           =   explode("|",$str_spmagnum);
            $str_onemagnum = "";
            $str_twomagnum = "";
            $str_threemagnum = "";
            
             if(isset($arr_getval[($row_magnum->one)]))
             {
                $str_onemagnum           =   $this->get_add_space($arr_spmagnum[$arr_getval[($row_magnum->one)]]);
                $postion1st              =   $arr_getval[($row_magnum->one)];
                //echo "Số thứ nhất".$postion1st;
             }
                
              
            //print_r("show gia tri cua A".$str_onemagnum);
            if(isset($arr_getval[($row_magnum->two)]))
            {
               $str_twomagnum           =   $this->get_add_space($arr_spmagnum[$arr_getval[($row_magnum->two)]]); 
               $postion2nd              =   $arr_getval[($row_magnum->two)];
               //echo "Số thứ hai".$postion2nd;
            }
                
            if(isset($arr_getval[($row_magnum->three)]))
            {
                $str_threemagnum         =   $this->get_add_space($arr_spmagnum[$arr_getval[($row_magnum->three)]]);
                $postion3rd              =   $arr_getval[($row_magnum->three)];
                //echo "Số thứ ba".$postion3rd;
            }
                            
            $one                    =   $row_magnum->one;
            $two                    =   $row_magnum->two;
            $three                  =   $row_magnum->three;
            
            $i                      =   1;
            foreach($arr_spmagnum as $key=>$row_spmagnum)
            {                             
                if($row_spmagnum != "" && $row_spmagnum != " ")
                {
                    $row_spmagnum       =   $this->get_add_space($row_spmagnum);
                    $str_rowspmagum     =  "<p style=\"color:#FFF;border:1px solid #F00;background-color:#0000CD; margin-top:-2px; width: 34px;\">".$this->lang->line(LANG_S)."</p>";
                    $str_res_spmagnum  .=  "<tr>";
                    if($key == $postion1st)
                    {
                         //$row_spmagnum = "";
                         //$str_rowspmagum  = "";
                        $str_res_spmagnum   .=  "<tr style=\" display:none;\">";
                         
                    }
                        
                    if($key == $postion2nd)
                    {
                        //$row_spmagnum = "";
                        //$str_rowspmagum ="";
                        //$str_res_spmagnum = "";
                         $str_res_spmagnum   .=  "<tr style=\" display:none;\">";
                    }
                        
                    if($key == $postion3rd)
                    {
                        //$row_spmagnum   = "";
                        //$str_rowspmagum = "";
                        //$str_res_spmagnum = "";
                         $str_res_spmagnum   .=  "<tr style=\" display:none;\">";
                    }

                    //$str_res_spmagnum   .=  "<tr>";
                    $str_res_spmagnum   .=  "<td >".$str_rowspmagum."</td>";
                    $str_res_spmagnum   .=  "<td><p style=\"color:#000;width: 52px;border:1px solid #000;background-color:#FFF; font-size:20px;\" id=\"magnumsp".($key+1)."\">$row_spmagnum</p></td>";
                    $str_res_spmagnum   .=  "</tr>";
                    $i                  ++;                            
                }                
            }
            
            $str_conmagnum          =   $row_magnum->consolation;
            $arr_conmagnum          =   explode("|",$str_conmagnum);
            $i                      =   1;
            foreach($arr_conmagnum as $row_conmagnum)
            {
                if($row_conmagnum != "" && $row_conmagnum != " ")
                {
                    $row_conmagnum      =   $this->get_add_space($row_conmagnum);
                    $str_res_conmagnum  .=  "<tr>";
                    $str_res_conmagnum  .=  "<td ><p style=\"color:#FFF;border:1px solid #F00;background-color:#87CEFA; margin-top:-2px; height: 32px; width: 34px;\">".$this->lang->line(LANG_C)."</p></td>";
                    $str_res_conmagnum  .=  "<td><p style=\"color:#000;width: 52px;border:1px solid #000;background-color:#FFF; font-size:20px;\" id=\"magnumcon".$i."\">$row_conmagnum</p></td>";
                    $str_res_conmagnum  .=  "</tr>";
                    $i                  ++;
                }
                
            }
        }
        else
        {
            // $str_onemagnum           =      "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            // $str_twomagnum           =      "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            // $str_threemagnum         =      "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            $str_onemagnum      = "";
            $str_twomagnum      = "";
            $str_threemagnum    = "";
            
            // for($i  =   1; $i   <=   13; $i  ++)
            // {
            //     $str_res_spmagnum   .=  "<tr>";
            //     $str_res_spmagnum   .=  "<td ><p style=\"color:#F00;border:1px solid #F00; margin-top:-2px; height: 32px; width: 34px;\">S</p></td>";
            //     $str_res_spmagnum   .=  "<td><p style=\"color:#FFF;width: 52px; background-color:#000; font-size:22px;\" id=\"magnumsp".$i."\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>";
            //     $str_res_spmagnum   .=  "</tr>";
            // }
            
            // for($i  =   1; $i   <=   10; $i  ++)
            // {
            //     $str_res_conmagnum  .=  "<tr>";
            //     $str_res_conmagnum  .=  "<td ><p style=\"color:#F00;border:1px solid #F00; margin-top:-2px; height: 32px; width: 34px;\">C</p></td>";
            //     $str_res_conmagnum  .=  "<td><p style=\"color:#FFF; width: 52px; background-color:#000; font-size:22px;\" id=\"magnumcon".$i."\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>";
            //     $str_res_conmagnum  .=  "</tr>";
            // }
        }
        $str_res_magnum             =   $str_res_spmagnum.$str_res_conmagnum;
        
        $str_res_spdmc           =   "";
        $str_res_condmc          =   "";
        if(count($row_dmc) > 0)
        {
            $txday                  =   $row_dmc->txday; //yyyymmdd
            $str_date               =   substr($txday,-2)."/".substr($txday,4,2)."/".substr($txday,0,4);
            $str_date_temp          =   substr($txday,0,4)."-".substr($txday,4,2)."-".substr($txday,-2);
            $str_date               =   $str_date." ". $arr_week[date('D', strtotime($str_date_temp))];
            
            $str_onedmc           =   $this->get_add_space($row_dmc->one); 
            $str_twodmc           =   $this->get_add_space($row_dmc->two);
            $str_threedmc         =   $this->get_add_space($row_dmc->three);
            
            $str_spdmc           =   $row_dmc->special;
            $arr_spdmc           =   explode("|",$str_spdmc);
            $i                      =   1;
            foreach($arr_spdmc as $row_spdmc)
            {
                if($row_spdmc !="" && $row_spdmc !=" ")
                {
                    $row_spdmc       =   $this->get_add_space($row_spdmc);
                    $str_res_spdmc   .=  "<tr>";
                    $str_res_spdmc   .=  "<td><p style=\"color:#FFF;border:1px solid #F00;background-color:#0000CD;margin-top:-2px; height: 32px; width: 34px;\">".$this->lang->line(LANG_S)."</p></td>";
                    $str_res_spdmc   .=  "<td><p style=\"color:#000;width: 52px;border:1px solid #000;background-color:#FFF; font-size:20px;\" id=\"dmcsp".$i."\">$row_spdmc</p></td>";
                    $str_res_spdmc   .=  "</tr>";
                    $i                  ++;
                }
                
            }
            
            $str_condmc          =   $row_dmc->consolation;
            $arr_condmc          =   explode("|",$str_condmc);
            $i                      =   1;
            foreach($arr_condmc as $row_condmc)
            {
                if($row_condmc !="" && $row_condmc !=" ")
                {
                    $row_condmc       =   $this->get_add_space($row_condmc);
                    $str_res_condmc  .=  "<tr>";
                    $str_res_condmc  .=  "<td><p style=\"color:#FFF;border:1px solid #F00;background-color:#87CEFA; margin-top:-2px; height: 32px; width: 34px;\">".$this->lang->line(LANG_C)."</p></td>";
                    $str_res_condmc  .=  "<td><p style=\"color:#000;width: 52px;border:1px solid #000;background-color:#FFF; font-size:20px;\" id=\"dmccon".$i."\">$row_condmc</p></td>";
                    $str_res_condmc  .=  "</tr>";
                    $i                  ++;
                }
                
            }
        }
        else
        {
        //     $str_onedmc           =      "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        //     $str_twodmc           =      "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        //     $str_threedmc         =      "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            $str_onedmc           =      "";
            $str_twodmc           =      "";
            $str_threedmc         =      "";
            // for($i  =   1; $i   <=   10; $i  ++)
            // {
            //     $str_res_spdmc   .=  "<tr>";
            //     $str_res_spdmc   .=  "<td ><p style=\"color:#F00;border:1px solid #F00; margin-top:-2px; height: 32px; width: 34px;\">S</p></td>";
            //     $str_res_spdmc   .=  "<td><p style=\"color:#FFF;width: 52px; background-color:#000; font-size:18px;\" id=\"dmcsp".$i."\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>";
            //     $str_res_spdmc   .=  "</tr>";
            // }
            
            // for($i  =   1; $i   <=   10; $i  ++)
            // {
            //     $str_res_condmc  .=  "<tr>";
            //     $str_res_condmc  .=  "<td ><p style=\"color:#F00;border:1px solid #F00; margin-top:-2px; height: 32px; width: 34px;\">C</p></td>";
            //     $str_res_condmc  .=  "<td><p style=\"color:#FFF; width: 52px; background-color:#000; font-size:18px;\" id=\"dmccon".$i."\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>";
            //     $str_res_condmc  .=  "</tr>";
            // }
        }
        $str_res_dmc             =   $str_res_spdmc.$str_res_condmc;
        
        
        $str_res_sptoto           =   "";
        $str_res_contoto          =   "";
        $onetoto                  = "";
        $twototo                    = "";
        $threetoto                = "";
        if(count($row_toto) > 0)
        {
            $txday                  =   $row_toto->txday; //yyyymmdd
            $str_date               =   substr($txday,-2)."/".substr($txday,4,2)."/".substr($txday,0,4);
            $str_date_temp          =   substr($txday,0,4)."-".substr($txday,4,2)."-".substr($txday,-2);
            $str_date               =   $str_date." ". $arr_week[date('D', strtotime($str_date_temp))];
            
            $str_sptoto             =   $row_toto->special;
            $arr_sptoto             =   explode("|",$str_sptoto);
            $str_onetoto = "";
            $str_twototo = "";
            $str_threetoto  = "";
            if(isset($arr_getval[($row_toto->one)]))
            {
                $str_onetoto            =   $this->get_add_space($arr_sptoto[$arr_getval[($row_toto->one)]]);
                $postiontoto1st         =   $arr_getval[($row_toto->one)];
            }
            if(isset($arr_getval[($row_toto->two)]))
            {
                $str_twototo            =   $this->get_add_space($arr_sptoto[$arr_getval[($row_toto->two)]]);
                $postiontoto2nd         =   $arr_getval[($row_toto->two)];
            }

            if(isset($arr_getval[($row_toto->three)]))
            {
                $str_threetoto          =   $this->get_add_space($arr_sptoto[$arr_getval[($row_toto->three)]]);
                $postiontoto3rd         =   $arr_getval[($row_toto->three)];
            }
            $onetoto                =   $row_toto->one;
            $twototo                =   $row_toto->two;
            $threetoto              =   $row_toto->three;
            
            $i                      =   1;
            foreach($arr_sptoto as $key=>$row_sptoto)
            {
                if($row_sptoto !="" && $row_sptoto != " ")
                {
                    $row_sptoto       =   $this->get_add_space($row_sptoto);
                    $str_res_sptoto   .=  "<tr>";
                    if($key == $postiontoto1st)
                    {
                        //$row_sptoto       =   $this->get_add_space(" ");
                        $str_res_sptoto   .=  "<tr style=\"display:none;\">";
                    }
                    if($key == $postiontoto2nd)
                    {
                        //$row_sptoto       =   $this->get_add_space(" ");
                        $str_res_sptoto   .=  "<tr style=\"display:none;\">";
                    }
                    if($key == $postiontoto3rd)
                    {
                        //$row_sptoto       =   $this->get_add_space(" ");
                        $str_res_sptoto   .=  "<tr style=\"display:none;\">";
                    }
                    
                    $str_res_sptoto   .=  "<td><p style=\"color:#FFF;background-color:#0000CD;border:1px solid #F00; margin-top:-2px; height: 32px; width: 34px;\">".$this->lang->line(LANG_S)."</p></td>";
                    $str_res_sptoto   .=  "<td><p style=\"color:#000;width: 52px;border:1px solid #000;background-color:#FFF; font-size:20px;\" id=\"totosp".$i."\">$row_sptoto</p></td>";
                    $str_res_sptoto   .=  "</tr>";
                    $i                  ++;
                }
                
            }
            
            $str_contoto          =   $row_toto->consolation;
            $arr_contoto          =   explode("|",$str_contoto);
            $i                      =   1;
            foreach($arr_contoto as $row_contoto)
            {
                if($row_contoto !="" && $row_contoto !=" ")
                {
                    $row_contoto      =   $this->get_add_space($row_contoto);
                    $str_res_contoto  .=  "<tr>";
                    $str_res_contoto  .=  "<td><p style=\"color:#FFF;background-color:#87CEFA;border:1px solid #F00; margin-top:-2px; height: 32px; width: 34px;\">".$this->lang->line(LANG_C)."</p></td>";
                    $str_res_contoto  .=  "<td><p style=\"color:#000;width: 52px;border:1px solid #000;background-color:#FFF; font-size:20px;\" id=\"totocon".$i."\">$row_contoto</p></td>";
                    $str_res_contoto  .=  "</tr>";
                    $i                  ++;
                }
                
            }
        }
        else
        {
            //$str_onetoto           =      "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            //$str_twototo           =      "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            //$str_threetoto         =      "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

            $str_onetoto           =      "";
            $str_twototo           =      "";
            $str_threetoto         =      "";
            
            // for($i  =   1; $i   <=   13; $i  ++)
            // {
            //     $str_res_sptoto   .=  "<tr>";
            //     $str_res_sptoto   .=  "<td ><p style=\"color:#F00;border:1px solid #F00; margin-top:-2px; height: 32px; width: 34px;\">S</p></td>";
            //     $str_res_sptoto   .=  "<td><p style=\"color:#FFF;width: 52px; background-color:#000; font-size:18px;\" id=\"totosp".$i."\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>";
            //     $str_res_sptoto   .=  "</tr>";
            // }
            
            // for($i  =   1; $i   <=   10; $i  ++)
            // {
            //     $str_res_contoto  .=  "<tr>";
            //     $str_res_contoto  .=  "<td ><p style=\"color:#F00;border:1px solid #F00; margin-top:-2px; height: 32px; width: 34px;\">C</p></td>";
            //     $str_res_contoto  .=  "<td><p style=\"color:#FFF; width: 52px; background-color:#000; font-size:18px;\" id=\"totocon".$i."\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>";
            //     $str_res_contoto  .=  "</tr>";
            // }
        }
        $str_res_toto             =   $str_res_sptoto.$str_res_contoto;
        
        //return
        $arr                        =   array(
                                            "str_res_magnum"    =>  $str_res_magnum,
                                            "str_onemagnum"     =>  $str_onemagnum,
                                            "str_twomagnum"     =>  $str_twomagnum,
                                            "str_threemagnum"   =>  $str_threemagnum,
                                            
                                            "one"               =>  $one,
                                            "two"               =>  $two,
                                            "three"             =>  $three,
                                            
                                            "str_res_dmc"       =>  $str_res_dmc,
                                            "str_onedmc"        =>  $str_onedmc,
                                            "str_twodmc"        =>  $str_twodmc,
                                            "str_threedmc"      =>  $str_threedmc,
                                            
                                            "str_res_toto"      =>  $str_res_toto,
                                            "str_onetoto"       =>  $str_onetoto,
                                            "str_twototo"       =>  $str_twototo,
                                            "str_threetoto"     =>  $str_threetoto,
                                            
                                            "onetoto"           =>  $onetoto,
                                            "twototo"           =>  $twototo,
                                            "threetoto"         =>  $threetoto,
                                            
                                            "str_date"          =>  $str_date,

                                            "str_st1"           =>  $str_st1,
                                            "str_nd2"           => $str_nd2,
                                            "str_rd3"           => $str_rd3  
                                            );
        return  $arr;
    }
    /*
	|----------------------------------------------------------------
	| function load top number dmc
	|----------------------------------------------------------------
	*/

    public function load_top_number1()
    {
        $data =$_POST['datap'];
        //print_r($data);
        //$data = json_decode(json_encode($data),true);
        $str_left               =   "";//$this->lang->line(LANG_DAMACAI);
        $str_right              =   "";
        $str_right_specail =   $this->lang->line(LANG_SPECIAL);
        $str_right_consolation  =   $this->lang->line(LANG_CONSOLATION);
        $top_number = $data['top_number'];
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

        //$pos =stripos($data['str_left'],"Damacai");
        if(stripos($data['str_left'],"Damacai") >= 0 && stripos($data['str_left'],"Damacai") !== FALSE)
        {
            $str_left               =   $this->lang->line(LANG_DAMACAI);
            //echo $str_left;
        }
        //
       
        if( stripos($data['str_left'],"toto") >= 0 && stripos($data['str_left'],"toto") !== FALSE )
        {
            $str_left               =   $this->lang->line(LANG_TOTO);
            $txday                  =   date("Ymd");
            $row_toto                 =   $this->get_tbl_by_txday("ld_toto",$txday);
            if(count($row_toto) > 0)
            {
                $str_toto           =   $row_toto->special;
                $arr_toto           =   explode("|",$str_toto);
                if(count($arr_toto) > 0)
                {
                    if(isset($arr_getval[$top_number]))
                    {
                        $top_number = $arr_toto[$arr_getval[$top_number]];
                    }
                }
            }
        }

        if( stripos($data['str_left'],"magnum") >= 0  && stripos($data['str_left'],"magnum") !== FALSE)
        {
            $str_left               =   $this->lang->line(LANG_MAGNUM);
            $txday                  =   date("Ymd");
            $row_mn                 =   $this->get_tbl_by_txday("ld_magnum",$txday);
            if(count($row_mn) > 0)
            {
                $str_spmn           =   $row_mn->special;
                $arr_spmn           =   explode("|",$str_spmn);
                if(count($arr_spmn) > 0)
                {
                    if(isset($arr_getval[$top_number]))
                    {
                        $top_number = $arr_spmn[$arr_getval[$top_number]];
                    }
                }
            }
        }

        if( stripos($data['str_left'],"Sin4D") >= 0  && stripos($data['str_left'],"Sin4D") !== FALSE)
        {
            $str_left               =   $this->lang->line(LANG_SINGAPORE);
            //echo $str_left;
        }
        //
        if( stripos($data['str_right'],"1ST") >= 0 &&  stripos($data['str_right'],"1ST") !== FALSE )
        {
            $str_right               =   $this->lang->line(LANG_1ST);
        }
        if( stripos($data['str_right'],"2ND") >= 0  && stripos($data['str_right'],"2ND") !== FALSE)
        {
            $str_right               =   $this->lang->line(LANG_2ND);
        }
        if( stripos($data['str_right'],"3RD") >= 0 && stripos($data['str_right'],"3RD") !== FALSE)
        {
            $str_right               =   $this->lang->line(LANG_3RD);
        }
        if( stripos($data['str_right'],"Special") >= 0 && stripos($data['str_right'],"Special") !== FALSE)
        {
            $str_right               =   $str_right_specail;
        }
        if( stripos($data['str_right'],"Consolation") >= 0 && stripos($data['str_right'],"Consolation") !== FALSE )
        {
            $str_right               =   $str_right_consolation;
        }

        $arr                        =   array(
                                                "flag"          =>  1,
                                                "str_left"      =>  $str_left,
                                                "str_right"     =>  $str_right,
                                                "top_number"    =>  $top_number,
                                                );
        return $arr;
    }
    public function load_top_number_dmc()
	{
        $str_left               =   $this->lang->line(LANG_DAMACAI);//"Dam";
        $str_right              =   "";
        $str_right_specail      =   "";
        $str_right_consolation  =    "";
        $top_number             =   "";
        $top_number_specail     = "";
        $top_number_consolation = "";
        
        $txday          =   date("Ymd");
        $row_dmc        =   $this->get_tbl_by_txday("ld_damacai",$txday);
        if(count($row_dmc) > 0)
        {
            $flag               =   1;
            $str_spdmc           =   $row_dmc->special;
            $arr_spdmc           =   explode("|",$str_spdmc);
            foreach($arr_spdmc as $row_spdmc)
            {
                if($row_spdmc != "" && $row_spdmc != " ")
                {
                    $str_right_specail =   $this->lang->line(LANG_SPECIAL);//"Special";
                    $top_number_specail =   $row_spdmc;
                    break;
                }
            }
            
            $str_condmc          =   $row_dmc->consolation;
            $arr_condmc          =   explode("|",$str_condmc);
            foreach($arr_condmc as $row_condmc)
            {
                if($row_condmc != "" && $row_condmc != " ")
                {
                    $str_right_consolation  =   $this->lang->line(LANG_CONSOLATION);//"Consolation";
                    $top_number_consolation =   $row_condmc;
                    break;
                }
            }

            if($top_number_consolation ==""  && $str_right_specail == "")
            {
                // vị trí 1,2,3
                $str_1stdmc           = $row_dmc->one;
                $str_2nddmc           = $row_dmc->two;
                $str_3rddmc           = $row_dmc->three;

                if($str_1stdmc != "" && $str_1stdmc != " ")
                {
                    $str_right  =   $this->lang->line(LANG_1ST);//"Consolation";
                    $top_number =   $str_1stdmc;
                }
                else if($str_2nddmc != "" && $str_2nddmc != " ")
                {
                    $str_right  =   $this->lang->line(LANG_2ND);//"Consolation";
                    $top_number =   $str_2nddmc;
                }
                else if($str_3rddmc != "" && $str_3rddmc != " ")
                {
                    $str_right  =   $this->lang->line(LANG_3RD);//"Consolation";
                    $top_number =   $str_3rddmc;
                }
            }

            //}
        }
        else
        {
            $flag                   =   0;
        }
        
        //return
        $arr                        =   array(
                                                "flag"          =>  $flag,
                                                "str_left"      =>  $str_left,
                                                "str_right"     =>  $str_right,
                                                "top_number"    =>  $top_number,
                                                );
        return $arr;
    }
    
    /*
	|----------------------------------------------------------------
	| function load top number magnum
	|----------------------------------------------------------------
	*/
    public function load_top_number_mn()
	{
        $str_left           =   $this->lang->line(LANG_MAGNUM);//"Mag";
        $str_right          =   "";
        $top_number         =   "";
        
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
        $txday          =   date("Ymd");
        $row_mn         =   $this->get_tbl_by_txday("ld_magnum",$txday);
        if(count($row_mn) > 0)
        {
            $flag               =   1;
            $str_spmn           =   $row_mn->special;
            $arr_spmn           =   explode("|",$str_spmn);
            // if(count($arr_spmn) > 0)
            // {
            //     $str_onemagnum           =   $arr_spmn[$arr_getval[($row_mn->one)]];
            //     $str_twomagnum           =   $arr_spmn[$arr_getval[($row_mn->two)]];
            //     $str_threemagnum         =   $arr_spmn[$arr_getval[($row_mn->three)]];
            // }
            foreach($arr_spmn as $row_spmn)
            {
                if($row_spmn != "" && $row_spmn != " ")
                {
                    $str_right  =   $this->lang->line(LANG_SPECIAL);//"Special";
                    $top_number =   $row_spmn;
                    break;
                }
            }
            
            // if($str_right == "")
            // {
                $str_conmn          =   $row_mn->consolation;
                $arr_conmn          =   explode("|",$str_conmn);
                foreach($arr_conmn as $row_conmn)
                {
                    if($row_conmn != "" && $row_conmn != " ")
                    {
                        $str_right  =   $this->lang->line(LANG_CONSOLATION);//"Consolation";
                        $top_number =   $row_conmn;
                        break;
                    }
                }

                // vị trí 1,2,3
                // if($str_onemagnum != "" && $str_onemagnum != " ")
                // {
                //     $str_right  =   $this->lang->line(LANG_1ST);
                //     $top_number =   $str_onemagnum;
                // }
                // else if($str_twomagnum != "" && $str_twomagnum != " ")
                // {
                //     $str_right  =   $this->lang->line(LANG_2ND);
                //     $top_number =   $str_twomagnum;
                // }
                // else if($str_threemagnum != "" && $str_threemagnum != " ")
                // {
                //     $str_right  =   $this->lang->line(LANG_3RD);
                //     $top_number =   $str_threemagnum;
                // }
            //}
        }
        else
        {
            $flag                   =   0;
        }
        
        //return
        $arr                        =   array(
                                                "flag"          =>  $flag,
                                                "str_left"      =>  $str_left,
                                                "str_right"     =>  $str_right,
                                                "top_number"    =>  $top_number,
                                                );
        return $arr;
    }
    
    /*
	|----------------------------------------------------------------
	| function load top number toto
	|----------------------------------------------------------------
	*/
    public function load_top_number_toto()
	{
        $str_left           =   $this->lang->line(LANG_TOTO);//"Tot";
        $str_right          =   "";
        $top_number         =   "";
        

        $txday              =   date("Ymd");
        $row_toto           =   $this->get_tbl_by_txday("ld_toto",$txday);
        if(count($row_toto) > 0)
        {
            $flag                   =   1;
            $str_sptoto           =   $row_toto->special;
            $arr_sptoto           =   explode("|",$str_sptoto);
            foreach($arr_sptoto as $row_sptoto)
            {
                if($row_sptoto != "" && $row_sptoto != " ")
                {
                    $str_right  =   $this->lang->line(LANG_SPECIAL);//"Special";
                    $top_number =   $row_sptoto;
                    break;
                }
            }
            
            // if($str_right == "")
            // {
                $str_contoto          =   $row_toto->consolation;
                $arr_contoto          =   explode("|",$str_contoto);
                // if(count($arr_contoto) > 0)
                // {
                //     $str_onetoto            =   $arr_contoto[$arr_getval[($row_toto->one)]];
                //     $str_twototo            =   $arr_contoto[$arr_getval[($row_toto->two)]];
                //     $str_threetoto          =   $arr_contoto[$arr_getval[($row_toto->three)]];
                // }
                foreach($arr_contoto as $row_contoto)
                {
                    if($row_contoto != "" && $row_contoto != " ")
                    {
                        $str_right  =   $this->lang->line(LANG_CONSOLATION);//"Consolation";
                        $top_number =   $row_contoto;
                        break;
                    }

                     // vị trí 1,2,3
                    // if($str_onetoto != "" && $str_onetoto != " ")
                    // {
                    //     $str_right  =   $this->lang->line(LANG_1ST);
                    //     $top_number =   $str_onetoto;
                    // }
                    // else if($str_twototo != "" && $str_twototo != " ")
                    // {
                    //     $str_right  =   $this->lang->line(LANG_2ND);
                    //     $top_number =   $str_twototo;
                    // }
                    // else if($str_threetoto != "" && $str_threetoto != " ")
                    // {
                    //     $str_right  =   $this->lang->line(LANG_3RD);
                    //     $top_number =   $str_threetoto;
                    // }
                }
            //}
        }
        else
        {
            $flag                   =   0;
        }
        
        //return
        $arr                        =   array(
                                                "flag"          =>  $flag,
                                                "str_left"      =>  $str_left,
                                                "str_right"     =>  $str_right,
                                                "top_number"    =>  $top_number,
                                                );
        return $arr;
    }
    
    
    /*
    |----------------------------------------------------------------
    | function get table by txday
    |----------------------------------------------------------------
    */
    public function get_tbl_by_txday($table,$txday)
    {
        $sql        =   "SELECT * FROM `$table` WHERE `txday` = '$txday'";
        $query      =   $this->db->query($sql)->row();
        return $query;
    }
    /*
    |----------------------------------------------------------------
    | function add space
    |----------------------------------------------------------------
    */
    public function get_add_space($string)
    {
        if($string              ==  " ")
            return  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        else
        {
            $strlenght          =   strlen($string);
            if($strlenght       ==  1)
            {
                return  "&nbsp;&nbsp;&nbsp;".$string."&nbsp;&nbsp;&nbsp;";
            }
            else
            {
                if($strlenght       ==  2)
                {
                    return  "&nbsp;&nbsp;".$string."&nbsp;&nbsp;";
                }
                else
                {
                    if($strlenght       ==  3)
                    {
                        return  "&nbsp;".$string."&nbsp;&nbsp;";
                    }
                    else
                    {
                        return  $string;
                    }
                }
            }
        }
        
        
    }
}