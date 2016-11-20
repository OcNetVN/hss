<?php

class M_magnum extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    /*
	|----------------------------------------------------------------
	| function load magnum
	|----------------------------------------------------------------
	*/
    public function load_magnum(){
        
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
        
      $sql = "SELECT * FROM `lot_magnum` WHERE `txday` = '$yyyymmdd'";
      $query = $this->db->query($sql)->row_array();
      
      if(count($query) > 0)
      {
          $str_Draw_No          = $query["Draw_No"];
          $str_1st_Price        = $query["4D_1st_Price"];
          $str_2nd_Price        = $query["4D_2nd_Price"];
          $str_3rd_Price        = $query["4D_3rd_Price"];
          $str_Special          = $query["Special"];
          $str_Consolation      = $query["Consolation"];
          
          $str_jp1_prize            = $query["4D_jp1_prize"];
          $str_jp1                  = $query["4D_jp1"];
          $str_jp2_prize            = $query["4D_jp2_prize"];
          $str_jp2                  = $query["4D_jp2"];
          
          $jp1_gold                 = $query["4D_gold_jp1"];
          $jp2_gold                 = $query["4D_gold_jp2"];
          $jp3_gold                 = $query["4D_gold_jp3"];
          $jp4_gold                 = $query["4D_gold_jp4"];
          $jp5_gold                 = $query["4D_gold_jp5"];
          $jp6_gold                 = $query["4D_gold_jp6"];
          $jp7_1_gold               = $query["4D_gold_jp7_1"];
          $jp7_2_gold               = $query["4D_gold_jp7_2"];
          $jp1_gold_prize           = $query["4D_gold_jp1_prize"];
          $jp2_gold_prize           = $query["4D_gold_jp2_prize"];
          
          $arr_Special          = explode("|",$str_Special);
          //print_r($arr_Special);die;
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
          
          $arr_jp1          = explode("|",$str_jp1);
          $str_jp1_res      = "";
          foreach($arr_jp1 as $row_jp1)
          {
                $str_jp1_res    .= $row_jp1."<br />";
                
          }
          
          $arr_jp2          = explode("|",$str_jp2);
          $str_jp2_res      = "";
          $i = 1;
          foreach($arr_jp2 as $row_jp2)
          {
            if($i%3 == 1)
                $str_jp2_res .= "<tr>";
                $str_jp2_res        .= '<td width="33%" height="32" align="center">'.$row_jp2.'</td>';    
            if($i%3 == 0)
                $str_jp2_res .= "</tr>";
                $i++;
          }
          
          
          $arr_jp1_gold          = explode("|",$jp1_gold);
          $i                = 1;
          $jp1_gold_res      = "";
          foreach($arr_jp1_gold as $row_jp1)
          {
                if($i       == 1)
                    $jp1_gold_res.= '<span style="border:1px solid #333;width:5%;font-size:12px;">';
                else
                    $jp1_gold_res.= '<span  style="border:1px solid #333;width:5%;font-size:12px;">';
                if($row_jp1 == "+")    
                    $jp1_gold_res    .= "&nbsp;".$row_jp1."&nbsp;";
                else
                {
                    if(strlen($row_jp1) == 1)
                        $jp1_gold_res    .= "&nbsp;".$row_jp1."&nbsp;"; 
                    else
                        $jp1_gold_res    .= $row_jp1; 
                } 
                $jp1_gold_res.= '</span>';
                
                $i++;
          }
          // $count_space      = 23-count($arr_jp1_gold);
          // for($i = 0; $i < $count_space; $i++)
          // {
          //       $jp1_gold_res.= '<span style="border:1px solid #333;width:4%;font-size:12px;">';
          //       $jp1_gold_res    .= "&nbsp;&nbsp;&nbsp;";    
          //       $jp1_gold_res.= '</span>';
          // }
          
                  $arr_jp2_gold          = explode("|",$jp2_gold);
                  $i                = 1;
                  $jp2_gold_res      = "";
                  foreach($arr_jp2_gold as $row_jp2)
                  {
                        if($i       == 1)
                            $jp2_gold_res.= '<span style="border:1px solid #333;font-size:12px;width:5%;">';
                        else
                            $jp2_gold_res.= '<span style="border:1px solid #333;font-size:12px;width:5%;">';
                        if($row_jp2 == "+")    
                            $jp2_gold_res    .= "&nbsp;".$row_jp2."&nbsp";
                        else
                        {
                            if(strlen($row_jp2) == 1)
                                $jp2_gold_res    .= "&nbsp;".$row_jp2."&nbsp"; 
                            else
                                $jp2_gold_res    .= $row_jp2; 
                        }
                        $jp2_gold_res.= '</span>';
                        
                        $i++;
                  }
                  // $count_space      = 23-count($arr_jp2_gold);
                  // for($i = 0; $i < $count_space; $i++)
                  // {
                  //       $jp2_gold_res.= '<span style="border:1px solid #333;font-size:12px;width:4%;">';
                  //       $jp2_gold_res    .= "&nbsp;&nbsp;&nbsp;";    
                  //       $jp2_gold_res.= '</span>';
                  // }
          
          $arr_jp3_gold          = explode("|",$jp3_gold);
          $i                = 1;
          $jp3_gold_res      = "";
          foreach($arr_jp3_gold as $row_jp3)
          {
                if($i       == 1)
                    $jp3_gold_res.= '<span style="border:1px solid #333;font-size:14px;width:5%;">';
                else
                    $jp3_gold_res.= '<span style="border:1px solid #333;font-size:14px;width:5%;">';
                if($row_jp3 == "+")    
                    $jp3_gold_res    .= "&nbsp;".$row_jp3."&nbsp;";
                else
                {
                    if(strlen($row_jp3) == 1)
                        $jp3_gold_res    .= "&nbsp;".$row_jp3."&nbsp;"; 
                    else
                        $jp3_gold_res    .= $row_jp3; 
                }
                $jp3_gold_res.= '</span>';
                
                $i++;
          }
          // $count_space      = 23-count($arr_jp3_gold);
          // for($i = 0; $i < $count_space; $i++)
          // {
          //       $jp3_gold_res.= '<span style="border:1px solid #333;font-size:14px;width:4%;">';
          //       $jp3_gold_res    .= "&nbsp;&nbsp;&nbsp;";    
          //       $jp3_gold_res.= '</span>';
          // }
          
              $arr_jp4_gold          = explode("|",$jp4_gold);
              $i                = 1;
              $jp4_gold_res      = "";
              foreach($arr_jp4_gold as $row_jp4)
              {
                    if($i       == 1)
                        $jp4_gold_res.= '<span style="border:1px solid #333;font-size:14px;width:5%;">';
                    else
                        $jp4_gold_res.= '<span style="border:1px solid #333;font-size:14px;width:5%;">';
                    if($row_jp4 == "+")    
                        $jp4_gold_res    .= "&nbsp;".$row_jp4."&nbsp;";
                    else
                    {
                        if(strlen($row_jp4) == 1)
                            $jp4_gold_res    .= "&nbsp;".$row_jp4."&nbsp;"; 
                        else
                            $jp4_gold_res    .= $row_jp4; 
                    }
                    $jp4_gold_res.= '</span>';
                    
                    $i++;
              }
              // $count_space      = 23-count($arr_jp4_gold);
              // for($i = 0; $i < $count_space; $i++)
              // {
              //       $jp4_gold_res.= '<span style="border:1px solid #333;font-size:14px;width:4%;">';
              //       $jp4_gold_res    .= "&nbsp;&nbsp;&nbsp;";    
              //       $jp4_gold_res.= '</span>';
              // }
              
          $arr_jp5_gold         = explode("|",$jp5_gold);
          $i                    = 1;
          $jp5_gold_res         = "";
          foreach($arr_jp5_gold as $row_jp5)
          {
                if($i       == 1)
                    $jp5_gold_res.= '<span style="border:1px solid #333;font-size:14px;width:5%;">';
                else
                    $jp5_gold_res.= '<span style="border:1px solid #333;font-size:14px;width:5%;">';
                if($row_jp5 == "+")    
                    $jp5_gold_res    .= "&nbsp;".$row_jp5."&nbsp;";
                else
                {
                    if(strlen($row_jp5) == 1)
                        $jp5_gold_res    .= "&nbsp;".$row_jp5."&nbsp;font-size:14px;width:5%;"; 
                    else
                        $jp5_gold_res    .= $row_jp5; 
                }   
                $jp5_gold_res.= '</span>';
                
                $i++;
          }
          // $count_space      = 23-count($arr_jp5_gold);
          // for($i = 0; $i < $count_space; $i++)
          // {
          //       $jp5_gold_res.= '<span style="border:1px solid #333;font-size:14px;width:4%;">';
          //       $jp5_gold_res    .= "&nbsp;&nbsp;&nbsp;";    
          //       $jp5_gold_res.= '</span>';
          // }
          
              $arr_jp6_gold         = explode("|",$jp6_gold);
              $i                    = 1;
              $jp6_gold_res         = "";
              foreach($arr_jp6_gold as $row_jp6)
              {
                    if($i       == 1)
                        $jp6_gold_res.= '<span style="border:1px solid #333;font-size:14px;width:5%;">';
                    else
                        $jp6_gold_res.= '<span style="border:1px solid #333;font-size:14px;width:5%;">';
                    if($row_jp6 == "+")    
                        $jp6_gold_res    .= "&nbsp;".$row_jp6."&nbsp;";
                    else
                    {
                        if(strlen($row_jp6) == 1)
                            $jp6_gold_res    .= "&nbsp;".$row_jp6."&nbsp;"; 
                        else
                            $jp6_gold_res    .= $row_jp6; 
                    } 
                    $jp6_gold_res.= '</span>';
                    
                    $i++;
              }
              // $count_space      = 23-count($arr_jp6_gold);
              // for($i = 0; $i < $count_space; $i++)
              // {
              //       $jp6_gold_res.= '<span style="border:1px solid #333;font-size:14px;width:4%;">';
              //       $jp6_gold_res    .= "&nbsp;&nbsp;&nbsp;";    
              //       $jp6_gold_res.= '</span>';
              // }
          
          $arr_jp7_1_gold          = explode("|",$jp7_1_gold);
          $i                = 1;
          $jp7_1_gold_res      = "";
          foreach($arr_jp7_1_gold as $row_jp7_1)
          {
                if($i       == 1)
                    $jp7_1_gold_res.= '<span style="border:1px solid #333;font-size:14px;width:5%;">';
                else
                    $jp7_1_gold_res.= '<span style="border:1px solid #333;font-size:14px;width:5%;">';
                if($row_jp7_1 == "+")    
                    $jp7_1_gold_res    .= "&nbsp;".$row_jp7_1."&nbsp;";
                else
                {
                    if(strlen($row_jp7_1) == 1)
                        $jp7_1_gold_res    .= "&nbsp;".$row_jp7_1."&nbsp;"; 
                    else
                        $jp7_1_gold_res    .= $row_jp7_1; 
                }   
                $jp7_1_gold_res.= '</span>';
                
                $i++;
          }

          // $count_space      = 23-count($arr_jp7_1_gold);
          // for($i = 0; $i < $count_space; $i++)
          // {
          //       $jp7_1_gold_res          .= '<span style="border:1px solid #333;font-size:14px;width:4%;">';
          //           $jp7_1_gold_res      .= "&nbsp;&nbsp;&nbsp;";    
          //       $jp7_1_gold_res          .= '</span>';
          // }
          
              $arr_jp7_2_gold          = explode("|",$jp7_2_gold);
              $i                = 1;
              $jp7_2_gold_res      = "";
              foreach($arr_jp7_2_gold as $row_jp7_2)
              {
                    if($i       == 1)
                        $jp7_2_gold_res     .= '<span style="border:1px solid #333;font-size:14px;width:4%;">';
                    else
                        $jp7_2_gold_res     .= '<span style="border:1px solid #333;font-size:14px;width:4%;">';
                    if($row_jp7_2 == "+")    
                        $jp7_2_gold_res     .= "&nbsp;".$row_jp7_2."&nbsp;";
                    else
                    {
                        if(strlen($row_jp7_2) == 1)
                            $jp7_2_gold_res    .= "&nbsp;".$row_jp7_2."&nbsp;"; 
                        else
                            $jp7_2_gold_res    .= $row_jp7_2; 
                    }  
                    $jp7_2_gold_res.= '</span>';
                    
                    $i++;
              }
              // $count_space      = 23-count($arr_jp7_2_gold);
              // for($i = 0; $i < $count_space; $i++)
              // {
              //       $jp7_2_gold_res          .= '<span style="border:1px solid #333;font-size:14px;width:5%;">';
              //           $jp7_2_gold_res      .= "&nbsp;&nbsp;&nbsp;";    
              //       $jp7_2_gold_res          .= '</span>';
              // }
          
          //return
          $arr = array(
                        "span_date"             =>$span_date,
                        "str_Draw_No"           =>$str_Draw_No,
                        "str_1st_Price"         =>$str_1st_Price,
                        "str_2nd_Price"         =>$str_2nd_Price,
                        "str_3rd_Price"         =>$str_3rd_Price,
                        "str_spacial_res"       =>$str_spacial_res,
                        "str_Consolation_res"   =>$str_Consolation_res,
                        "str_jp1_prize"         =>$str_jp1_prize,
                        "str_jp1_res"           =>$str_jp1_res,
                        "str_jp2_prize"         =>$str_jp2_prize,
                        "str_jp2_res"           =>$str_jp2_res,
                        //"str_date"              =>$str_date,
                        
                        "jp1_gold_res"          =>$jp1_gold_res,
                        "jp2_gold_res"          =>$jp2_gold_res,
                        "jp3_gold_res"          =>$jp3_gold_res,
                        "jp4_gold_res"          =>$jp4_gold_res,
                        "jp5_gold_res"          =>$jp5_gold_res,
                        "jp6_gold_res"          =>$jp6_gold_res,
                        "jp7_1_gold_res"        =>$jp7_1_gold_res,
                        "jp7_2_gold_res"        =>$jp7_2_gold_res,
                        
                        "jp1_gold_prize"                =>$jp1_gold_prize,
                        "jp2_gold_prize"                =>$jp2_gold_prize,
                        
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