<?php

class M_cashsweep extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    /*
	|----------------------------------------------------------------
	| function load cashsweep
	|----------------------------------------------------------------
	*/
    public function load_cashsweep(){
        
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
        //     //$weekDay = date('w', strtotime($date));
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
        
      $sql = "SELECT * FROM `lot_cashsweep` WHERE `txday` = '$yyyymmdd'";
      $query = $this->db->query($sql)->row_array();
      
      if(count($query) > 0)
      {
          $str_Draw_No          = $query["Draw_No"];
          $str_1st              = $query["1st"];
          $str_2nd              = $query["2nd"];
          $str_3rd              = $query["3rd"];
          $str_Special          = $query["Special"];
          $str_Consolation      = $query["Consolation"];
          
          $arr_str_1st          = explode("|",$str_1st);
          $str_1st_1            = $arr_str_1st[0];
          $str_1st_2            = $arr_str_1st[1];
          
          $arr_str_2nd          = explode("|",$str_2nd);
          $str_2nd_1            = $arr_str_2nd[0];
          $str_2nd_2            = $arr_str_2nd[1];
          
          $arr_str_3rd          = explode("|",$str_3rd);
          $str_3rd_1            = $arr_str_3rd[0];
          $str_3rd_2            = $arr_str_3rd[1];
          
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
                        "str_1st_1"             =>$str_1st_1,
                        "str_1st_2"             =>$str_1st_2,
                        "str_2nd_1"             =>$str_2nd_1,
                        "str_2nd_2"             =>$str_2nd_2,
                        "str_3rd_1"             =>$str_3rd_1,
                        "str_3rd_2"             =>$str_3rd_2,
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