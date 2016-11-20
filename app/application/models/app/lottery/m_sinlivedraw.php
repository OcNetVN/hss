<?php
class M_sinlivedraw extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    /*
	|----------------------------------------------------------------
	| function load sin_livedraw
	|----------------------------------------------------------------
	*/
    function load_sin_livedraw()
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
        $txday          =   date("Ymd");
        $row_4d         =   $this->get_tbl_by_txday("ld_sin4d",$txday);
        $row_toto       =   $this->get_tbl_by_txday("ld_sintoto",$txday);
        
        $str_res_sptoto             =   "";
        $str_res_contoto            =   "";
        $str_date                   =   "";
        $str_date_toto              =   "";
        $str_onetoto                =   "";
        $str_twototo                =   "";
        $str_threetoto              =   "";
        $arr_contoto                =   "";
        $arr_sptoto                 =   "";


        if(count($row_4d) > 0)
        {
            $txday                  =   $row_4d->txday; //yyyymmdd
            $str_date               =   substr($txday,-2)."/".substr($txday,4,2)."/".substr($txday,0,4);
            $str_date_temp          =   substr($txday,0,4)."-".substr($txday,4,2)."-".substr($txday,-2);
            $str_date               =   $str_date." ".$arr_week[date('D', strtotime($str_date_temp))];
            
            $str_onetoto            =   $row_4d->one;
            $str_twototo            =   $row_4d->two;
            $str_threetoto          =   $row_4d->three;
            
            $str_sptoto             =   $row_4d->special;
            $arr_sptoto             =   explode("|",$str_sptoto);
            
            $i                      =   1;
            foreach($arr_sptoto as $row_sptoto)
            {
                if($row_sptoto      == " ")
                    $row_sptoto     = "&nbsp;";
                if( $i % 2  == 1)
                    $str_res_sptoto     .=  '<tr style="border:1px solid #006;">';
                $str_res_sptoto     .=  '<td width="50%" align="center"><span id="spans'.$i.'">'.$row_sptoto.'</span></td>';
                if( $i % 2  == 0)
                    $str_res_sptoto     .=  '</tr>';
                $i                      ++;
            }

            $str_contoto                =   $row_4d->consolation;
            $arr_contoto                =   explode("|",$str_contoto);
            $i                          =   1;
            foreach($arr_contoto as $row_contoto)
            {
                if($row_contoto         == " ")
                    $row_contoto        = "&nbsp;";
                if( $i % 2  == 1)
                    $str_res_contoto    .=  '<tr style="border:1px solid #006;">';
                    $str_res_contoto    .=  '<td width="50%" align="center"><span id="spanc'.$i.'">'.$row_contoto.'</span></td>';
                if( $i % 2  == 0)
                    $str_res_contoto    .=  '</tr>';
                $i                      ++;
            }
        }
        // else
        // {
        //     $str_onetoto                =      "&nbsp;";
        //     $str_twototo                =      "&nbsp;";
        //     $str_threetoto              =      "&nbsp;";
            
        //     for($i  =   1; $i   <=   10; $i  ++)
        //     {
        //         if( $i % 2  == 1)
        //             $str_res_sptoto     .=  '<tr style="border:1px solid #006;">';
        //             $str_res_sptoto     .=  '<td width="50%" align="center"><span id="spans'.$i.'">&nbsp;</span></td>';
        //         if( $i % 2  == 0)
        //             $str_res_sptoto     .=  '</tr>';
        //         $i                      ++;
        //     }
            
        //     for($i  =   1; $i   <=   10; $i  ++)
        //     {
        //         if( $i % 2  == 1)
        //             $str_res_contoto    .=  '<tr style="border:1px solid #006;">';
        //             $str_res_contoto    .=  '<td width="50%" align="center"><span id="spanc'.$i.'">&nbsp;</span></td>';
        //         if( $i % 2  == 0)
        //             $str_res_contoto    .=  '</tr>';
        //     }
        // }
        
        $arr_res_winningNo      =   array();
        $str_additional = "";
        if(count($row_toto) > 0)
        {
            $txday_toto                  =   $row_toto->txday; //yyyymmdd
            $str_date_toto               =   substr($txday_toto,-2)."/".substr($txday_toto,4,2)."/".substr($txday_toto,0,4);
            $str_date_toto_temp          =   substr($txday_toto,0,4)."-".substr($txday_toto,4,2)."-".substr($txday_toto,-2);
            $str_date_toto               =   $str_date_toto." ".$arr_week[date('D', strtotime($str_date_toto_temp))];
            $str_winningNo               =   $row_toto->winningNo;
            $arr_winningNo               =   explode("|",$str_winningNo);
            foreach($arr_winningNo as $row_winningno)
            {
                $arr_res_winningNo[]    =   $row_winningno;
            }
            $str_additional     =   $row_toto->additional;
        }
        // else
        // {
        //     for($i = 1;$i < 8; $i++)
        //     {
        //         $arr_res_winningNo[]    =   "&nbsp;";
        //     }
        //     $str_additional             =   "&nbsp;";
        // }
        //return
        $arr                            =   array(
                                            //"str_res_sptoto"    =>  $str_res_sptoto,
                                            //"str_res_contoto"   =>  $str_res_contoto,
                                            "str_onetoto"       =>  $str_onetoto,
                                            "str_twototo"       =>  $str_twototo,
                                            "str_threetoto"     =>  $str_threetoto,                                            
                                            "arr_res_winningNo" =>  $arr_res_winningNo,
                                            "str_additional"    =>  $str_additional,                                           
                                            "str_date"          =>  $str_date,
                                            "str_date_toto"     =>  $str_date_toto,
                                            "arr_sptoto"        =>  $arr_sptoto,
                                            "arr_contoto"           => $arr_contoto
                                            );
        return  $arr;
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
    |-------------------------------------------
    | function load number
    */

    public function load_top_number()
    {
       
        $data =$_POST['datap'];
        $str_left               =   "";
        $str_right              =   "";
        $type                   = "";
        $str_right_specail      =   $this->lang->line(LANG_SPECIAL);
        $str_right_consolation  =   $this->lang->line(LANG_CONSOLATION);
        $str_right_sintoto      =   $this->lang->line(LANG_TOTO);
        $top_number = $data['top_number'];
        //$pos =stripos($data['str_left'],"Damacai");
        if(stripos($data['str_left'],"Sin4D") >= 0 && stripos($data['str_left'],"Sin4D") !== FALSE)
        {
            $str_left               =   $this->lang->line(LANG_SINGAPORE_4D);
            $type                   =  "Sin4D";
            //echo $str_left;
        }

        if(stripos($data['str_left'],"SinToTo") >= 0 && stripos($data['str_left'],"SinToTo") !== FALSE)
        {
            $str_left               =   $this->lang->line(LANG_SINGAPORE_TOTO);
            $type                   =  "SinToTo";
            //echo $str_left;
        }

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

        if( stripos($data['str_right'],"ShowSintoto") >= 0 && stripos($data['str_right'],"ShowSintoto") !== FALSE )
        {
            $str_right               =   $str_right_sintoto;
        }

        $arr                        =   array(
                                                "flag"          =>  1,
                                                "str_left"      =>  $str_left,
                                                "str_right"     =>  $str_right,
                                                "top_number"    =>  $top_number,
                                                "type"          =>  $type 
                                                );
        return $arr;
    }
}