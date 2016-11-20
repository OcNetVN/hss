<?php

class M_sinlottery extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    /*
	|----------------------------------------------------------------
	| function load sandakan
	|----------------------------------------------------------------
	*/
    public function load_sintoto(){
        
        if(isset($_POST["seday"]) && $_POST["seday"] !="" && $_POST["seday"] !="null")
        {
            $day        = $_POST["seday"]; //format dd/mm/yyyy
            $arr_day    = explode("-",$day);
            $yyyymmdd   = $arr_day[2].$arr_day[1].$arr_day[0];
        }
        else
            $yyyymmdd   = date("Ymd");
        $dd_mm_yyyy = substr($yyyymmdd,-2)."-".substr($yyyymmdd,4,2)."-".substr($yyyymmdd,0,4);
        $span_date  = substr($yyyymmdd,0,4)."-".substr($yyyymmdd,4,2)."-".substr($yyyymmdd,-2);
        
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
        
      $sql = "SELECT * FROM `lot_sintoto` WHERE `txday` = '$yyyymmdd'";
      $query = $this->db->query($sql)->row_array();
      
      if(count($query) > 0)
      {
          $str_Draw_No          = $query["Draw_No"];
          $winNo                = $query["WinNo"];
          $group1               = $query["Group1"];
          $group2               = $query["Group2"];
          $group3               = $query["Group3"];
          $group4               = $query["Group4"];
          $group5               = $query["Group5"];
          $group6               = $query["Group6"];
          $group7               = $query["Group7"];
          $add_number           = $query["Add_Number"];
          $amount_price         = $query["Amount_Jackpot"];
          //return
          $arr = array(
                        "span_date"             =>$span_date,
                        "str_Draw_No"           =>$str_Draw_No,
                        "str_winNo"             =>$winNo,
                        "str_group1"            =>$group1,
                        "str_group2"            =>$group2,
                        "str_group3"            =>$group3,
                        "str_group4"            =>$group4,
                        "str_group5"            =>$group5,
                        "str_group6"             =>$group6,
                        "str_group7"             =>$group7,
                        "str_addnumber"          =>$add_number,
                        "str_amountprice"        =>$amount_price,
                        //"str_date"              =>$str_date,
                        "flag"                  =>1
                        );
      }
      else
        $arr = array("flag"                 =>0,
                    //"str_date"              =>$str_date
                    );
                    
      return $arr;
    }

    /** end function */

    /** function load sin sweep*/
    public function load_sinsweep(){
        
        if(isset($_POST["seday"]) && $_POST["seday"] !="" && $_POST["seday"] !="null")
        {
            $day        = $_POST["seday"]; //format dd/mm/yyyy
            $arr_day    = explode("-",$day);
            $yyyymmdd   = $arr_day[2].$arr_day[1].$arr_day[0];
        }
        else
            $yyyymmdd   = date("Ymd");
        $dd_mm_yyyy = substr($yyyymmdd,-2)."-".substr($yyyymmdd,4,2)."-".substr($yyyymmdd,0,4);
        $span_date  = substr($yyyymmdd,0,4)."-".substr($yyyymmdd,4,2)."-".substr($yyyymmdd,-2);
        
        // $str_date = "";
        // $weekDay = "";
        // for($i=10;$i>-11;$i--)
        // {
        //     $date = date_create($span_date);
        //     date_sub($date, date_interval_create_from_date_string($i.' days'));
        //     if($dd_mm_yyyy == date_format($date, 'd-m-Y'))
        //     {
        //         $weekDay = $this->m_common_lottery->isWeekend(date_format($date, 'd-m-Y'));
        //         $str_date .='<option value="'.date_format($date, 'd-m-Y').'" selected="selected">'.date_format($date, 'd-m-Y')."&nbsp;&nbsp;".$weekDay.'</option>';
        //     }
        //     else
        //     {
        //         $weekDay = $this->m_common_lottery->isWeekend(date_format($date, 'd-m-Y'));
        //         $str_date .='<option value="'.date_format($date, 'd-m-Y').'">'.date_format($date, 'd-m-Y')."&nbsp;&nbsp;".$weekDay.'</option>';
        //     }
        // }
        
      $sql = "SELECT * FROM `lot_sin_sweep` WHERE `txday` = '$yyyymmdd'";
      $query = $this->db->query($sql)->row_array();
      
      if(count($query) > 0)
      {
          $str_Draw_No          = $query["Draw_No"];
          $prize11              = $query["1stprize"];
          $prize12              = $query["1stprize2"];
          $ndprize11            = $query["2ndprize"];
          $ndprize12            = $query["2ndprize2"];
          $rdprize31            = $query["3rdprize"];
          $rdprize32            = $query["3rdprize3"];
          $jp10                 = $query["10jp"];
          $lucky10              = $query["10lucky"];
          $gift30               = $query["30gift"];
          $consolation30        = $query["30consolation"];
          $paraticaipation50    = $query["50participation"];
          $ddelight             = $query["2ddelight"];
           //2ddelight
          //return
          $arr = array(
                        "span_date"             =>$span_date,
                        "str_Draw_No"           =>$str_Draw_No,
                        "str_prize11"           =>$prize11,
                        "str_prize12"           =>$prize12,
                        "str_ndprize11"            =>$ndprize11,
                        "str_ndprize12"            =>$ndprize12,
                        "str_rdprize31"            =>$rdprize31,
                        "str_rdprize32"            =>$rdprize32,
                        "str_jp10"            =>$jp10,
                        "str_lucky10"            =>$lucky10,
                        "str_gift30"         =>$gift30,
                        "str_consolation30"         =>$consolation30,
                        "str_paraticai50"         =>$paraticaipation50,
                        "str_ddelight"         =>$ddelight,
                        //"str_date"              =>$str_date,
                        "flag"                  =>1
                        );
      }
      else
        $arr = array("flag"                 =>0,
                    //"str_date"              =>$str_date
                    );
                    
      return $arr;
    }
    /** end function */

    // load data for sin pools 4 d
    //load_sinpools
    function load_sinpools()
    {
      if(isset($_POST["seday"]) && $_POST["seday"] !="" && $_POST["seday"] !="null")
        {
            $day        = $_POST["seday"]; //format dd/mm/yyyy
            $arr_day    = explode("-",$day);
            $yyyymmdd   = $arr_day[2].$arr_day[1].$arr_day[0];
        }
        else
            $yyyymmdd   = date("Ymd");
        $dd_mm_yyyy = substr($yyyymmdd,-2)."-".substr($yyyymmdd,4,2)."-".substr($yyyymmdd,0,4);
        $span_date  = substr($yyyymmdd,0,4)."-".substr($yyyymmdd,4,2)."-".substr($yyyymmdd,-2);
        
        // $str_date = "";
        // $weekDay = "";
        // for($i=10;$i>-11;$i--)
        // {
        //     $date = date_create($span_date);
        //     date_sub($date, date_interval_create_from_date_string($i.' days'));
        //     if($dd_mm_yyyy == date_format($date, 'd-m-Y'))
        //     {
        //         $weekDay = $this->m_common_lottery->isWeekend(date_format($date, 'd-m-Y'));
        //         $str_date .='<option value="'.date_format($date, 'd-m-Y').'" selected="selected">'.date_format($date, 'd-m-Y')."&nbsp;&nbsp;".$weekDay.'</option>';
        //     }
        //     else
        //     {
        //         $weekDay = $this->m_common_lottery->isWeekend(date_format($date, 'd-m-Y'));
        //         $str_date .='<option value="'.date_format($date, 'd-m-Y').'">'.date_format($date, 'd-m-Y')."&nbsp;&nbsp;".$weekDay.'</option>';
        //     }
        // }
        
      $sql = "SELECT * FROM `lot_sin4d` WHERE `txday` = '$yyyymmdd'";
      $query = $this->db->query($sql)->row_array();
      
      if(count($query) > 0)
      {
          $str_Draw_No          = $query["Draw_No"];
          $str_1st              = $query["1st"];
          $str_2nd              = $query["2nd"];
          $str_3rd              = $query["3rd"];
          $str_Special          = $query["Special"];
          $str_Consolation      = $query["Consolation"];
          
          $arr_Special          = explode("|",$str_Special);
          //print_r($arr_Special);die;
          $i = 1;
          $str_spacial_res = "";
          foreach($arr_Special as $row_special)
          {
                if($i%5 == 1)
                    $str_spacial_res .= "<tr>";
                        $str_spacial_res .= '<td style="border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;" width="20%" height="36" align="center" valign="middle" bgcolor="#666666">'.$row_special.'</td>';
                if($i%5 == 0)
                    $str_spacial_res .= "</tr>";
                $i++;
                if($i > 10)
                    break;
          }
          
          $arr_consolation          = explode("|",$str_Consolation);
          $i = 1;
          $str_Consolation_res = "";
          foreach($arr_consolation as $row_consolation)
          {
                if($i%5 == 1)
                    $str_Consolation_res        .= "<tr>";
                        $str_Consolation_res    .= '<td style="border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;" width="20%" height="36" align="center" valign="middle" bgcolor="#666666">'.$row_consolation.'</td>';
                if($i%5 == 0)
                    $str_Consolation_res        .= "</tr>";
                $i++;
                if($i > 10)
                    break;
          }
          
          
          //return
          $arr = array(
                        "span_date"             =>$span_date,
                        "str_Draw_No"           =>$str_Draw_No,
                        "str_1st"               =>$str_1st,
                        "str_2nd"               =>$str_2nd,
                        "str_3rd"               =>$str_3rd,
                        "str_spacial_res"       =>$str_spacial_res,
                        "str_Consolation_res"   =>$str_Consolation_res,
                        //"str_date"              =>$str_date,
                        "flag"                  =>1
                        );
      }
      else
        $arr = array("flag"                 =>0,
                    //"str_date"              =>$str_date
                    );
                    
      return $arr;
    }
}