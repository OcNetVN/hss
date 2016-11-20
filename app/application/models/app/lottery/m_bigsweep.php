<?php

class M_bigsweep extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    /*
	|----------------------------------------------------------------
	| function load bigsweep
	|----------------------------------------------------------------
	*/
    public function load_bigsweep()
    {
        
        if(isset($_POST["seday"]) && $_POST["seday"] !="" && $_POST["seday"] !="null")
        {
            $day        = $_POST["seday"]; //format dd/mm/yyyy
            $arr_day    = explode("-",$day);
            $yyyymmdd   = $arr_day[2].$arr_day[1].$arr_day[0];
        }
        else
            $yyyymmdd   = date("Ymd");
        $dd_mm_yyyy     = substr($yyyymmdd,-2)."-".substr($yyyymmdd,4,2)."-".substr($yyyymmdd,0,4);
        $span_date      = substr($yyyymmdd,0,4)."-".substr($yyyymmdd,4,2)."-".substr($yyyymmdd,-2);
        
        // $str_date = "";
        // $weekDay = "";
        // for($i=10;$i>-11;$i--)
        // {
        //     $date = date_create($span_date);
        //     date_sub($date, date_interval_create_from_date_string($i.' days'));
        //     if($dd_mm_yyyy == date_format($date, 'd-m-Y'))
        //     {
        //         $weekDay = $this->m_common_lottery->isWeekend(date_format($date, 'Y-m-d'));
        //         $str_date .='<option value="'.date_format($date, 'd-m-Y').'" selected="selected">'.date_format($date, 'd-m-Y')."&nbsp;&nbsp;".$weekDay.'</option>';
        //     }
        //     else
        //     {
        //         $weekDay = $this->m_common_lottery->isWeekend(date_format($date, 'Y-m-d'));
        //         $str_date .='<option value="'.date_format($date, 'd-m-Y').'">'.date_format($date, 'd-m-Y')."&nbsp;&nbsp;".$weekDay.'</option>';
        //     }
        // }

        $txday                  =   $dd_mm_yyyy;  //dd-mm-yyyy
        $arr_txday              =   explode("-",$txday);
        $str_date_1             =   $arr_txday[2].$arr_txday[1].$arr_txday[0];
        $row_db                 =   $this->m_common_lottery->get_row_by_table_txday("lot_bigsweep_2",$str_date_1);
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
        $arr = array(
                    "span_date"             =>$span_date,
                    //"str_date"              =>$str_date,
                    "flag"                  =>  $flag,
                    "arr_res"               =>  $row_db,
                    );
        return $arr;
    }
}