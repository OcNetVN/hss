<?php

class M_totofourd extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function load_totofourd(){
        
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
        
      $sql = "SELECT * FROM `lot_toto4d` WHERE `txday` = '$yyyymmdd'";
      $query = $this->db->query($sql)->row_array();
      
      if(count($query) > 0)
      {
          $str_Draw_No          = $query["Draw_No"];
          $str_1st_Price        = $query["ST_1st_Price"];
          $str_2nd_Price        = $query["ST_2nd_Price"];
          $str_3rd_Price        = $query["ST_3rd_Price"];
          $str_Special          = $query["Special"];
          $str_Consolation      = $query["Consolation"];
          
          $str_TJ4D_jp1             = $query["TJ4D_jp1"];
          $str_TJ4D_jp2             = $query["TJ4D_jp2"];
          $str_TJ4D_resul           = $query["TJ4D_Result"];
          
          $str_TJ5D_1st             = $query["TJ5D_1st"];
          $str_TJ5D_2nd             = $query["TJ5D_2nd"];
          $str_TJ5D_3rd             = $query["TJ5D_3rd"];
          $str_TJ5D_4th             = $query["TJ5D_4th"];
          $str_TJ5D_5th             = $query["TJ5D_5th"];
          $str_TJ5D_6th             = $query["TJ5D_6th"];
          
          $str_TJ6D_1st             = $query["TJ6D_1st"];
          $str_TJ6D_2nd             = $query["TJ6D_2nd"];
          $str_TJ6D_3rd             = $query["TJ6D_3rd"];
          $str_TJ6D_4th             = $query["TJ6D_4th"];
          $str_TJ6D_5th             = $query["TJ6D_5th"];
          
          $str_Mega                 = $query["Mega"];
          $str_Mega_jp1             = $query["Mega_jp1"];
          $str_Power                = $query["Power"];
          $str_Power_jp             = $query["Power_jp"];
          $str_Super                = $query["Super"];
          $str_Super_jp             = $query["Super_jp"];
          
          $arr_Special          = explode("|",$str_Special);
          $i                    = 1;
          $str_spacial_res      = "";
          foreach($arr_Special as $row_special)
          {
                if($i%5 == 1)
                    $str_spacial_res    .= "<tr>";
                    if($row_special     != "")
                        $str_spacial_res.= '<td width="20%" height="35" align="center" valign="middle" bgcolor="#666666">'.$row_special.'</td>';
                    else
                        $str_spacial_res.= '<td width="20%" height="35" align="center" valign="middle" bgcolor="#666666">&nbsp;</td>';
                if($i%5 == 0)
                    $str_spacial_res    .= "</tr>";
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
                    $str_Consolation_res .= "<tr>";
                        if($row_special     != "")
                            $str_Consolation_res.= '<td width="20%" height="35" align="center" valign="middle" bgcolor="#666666">'.$row_consolation.'</td>';
                        else
                            $str_Consolation_res.= '<td width="20%" height="35" align="center" valign="middle" bgcolor="#666666">&nbsp;</td>';
                if($i%5 == 0)
                    $str_Consolation_res .= "</tr>";
                $i++;
                if($i > 10)
                    break;
          }
          
          $arr_TJ6D_2nd          = explode("or",$str_TJ6D_2nd);
          $arr_TJ6D_3rd          = explode("or",$str_TJ6D_3rd);
          $arr_TJ6D_4th          = explode("or",$str_TJ6D_4th);
          $arr_TJ6D_5th          = explode("or",$str_TJ6D_5th);
          
          $arr_Mega             = explode("|",$str_Mega);
          $arr_Power            = explode("|",$str_Power);
          $arr_Super            = explode("|",$str_Super);
          
          
          //return
          $arr = array(
                        "span_date"             =>$span_date,
                        "str_Draw_No"           =>$str_Draw_No,
                        "str_1st_Price"         =>$str_1st_Price,
                        "str_2nd_Price"         =>$str_2nd_Price,
                        "str_3rd_Price"         =>$str_3rd_Price,
                        "str_spacial_res"       =>$str_spacial_res,
                        "str_Consolation_res"   =>$str_Consolation_res,
                        
                        "str_TJ4D_jp1"          =>$str_TJ4D_jp1,
                        "str_TJ4D_jp2"          =>$str_TJ4D_jp2,
                        "str_TJ4D_resul"        =>$str_TJ4D_resul,
                        
                        "str_TJ5D_1st"          =>$str_TJ5D_1st,
                        "str_TJ5D_2nd"          =>$str_TJ5D_2nd,
                        "str_TJ5D_3rd"          =>$str_TJ5D_3rd,
                        "str_TJ5D_4th"          =>$str_TJ5D_4th,
                        "str_TJ5D_5th"          =>$str_TJ5D_5th,
                        "str_TJ5D_6th"          =>$str_TJ5D_6th,
                        
                        "str_TJ6D_1st"          =>$str_TJ6D_1st,
                        "arr_TJ6D_2nd"          =>$arr_TJ6D_2nd,
                        "arr_TJ6D_3rd"          =>$arr_TJ6D_3rd,
                        "arr_TJ6D_4th"          =>$arr_TJ6D_4th,
                        "arr_TJ6D_5th"          =>$arr_TJ6D_5th,
                        
                        "arr_Mega"              =>$arr_Mega,
                        "str_Mega_jp1"          =>$str_Mega_jp1,
                        "arr_Power"             =>$arr_Power,
                        "str_Power_jp"          =>$str_Power_jp,
                        "arr_Super"             =>$arr_Super,
                        "str_Super_jp"          =>$str_Super_jp,
                        
                        "flag"                          =>1
                        );
      }
      else
        $arr = array("flag"                 =>0,
                    //"str_date"              =>$str_date
                    );
                    
      return $arr;
    }
}