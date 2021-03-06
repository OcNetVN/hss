<?php

class M_damacaionetree extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    /*
	|----------------------------------------------------------------
	| function load damacai
	|----------------------------------------------------------------
	*/
    public function load_damacai(){
        
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
        
      $sql = "SELECT * FROM `lot_damacai` WHERE `txday` = '$yyyymmdd'";
      $query = $this->db->query($sql)->row_array();
      
      if(count($query) > 0)
      {
          $str_Draw_No          = $query["Draw_No"];
          $str_1_3D_1st_Price   = $query["1_3D_1st_Price"];
          $str_1_3D_2nd_Price   = $query["1_3D_2nd_Price"];
          $str_1_3D_3rd_Price   = $query["1_3D_3rd_Price"];
          $str_Special          = $query["Special"];
          $str_Consolation      = $query["Consolation"];
          $str_3D_1st_Price     = $query["3D_1st_Price"];
          $str_3D_2nd_Price     = $query["3D_2nd_Price"];
          $str_3D_3rd_Price     = $query["3D_3rd_Price"];
          $str_1_3DJp1          = $query["1_3DJp1"];
          $str_1_3DJp1_RM       = $query["1_3DJp1_RM"];
          $str_1_3DJp2          = $query["1_3DJp2"];
          $str_1_3DJp2_RM       = $query["1_3DJp2_RM"];
          $str_3D_Jp            = $query["3D_Jp"];
          $str_3D_Jp_RM         = $query["3D_Jp_RM"];
          $str_DMC_Jp1          = $query["DMC_Jp1"];
          $str_DMC_Jp1_RM       = $query["DMC_Jp1_RM"];
          $str_DMC_Jp2          = $query["DMC_Jp2"];
          $str_DMC_Jp2_RM       = $query["DMC_Jp2_RM"];
          $str_3DJp             = $query["3D_Jp"];
          
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
                    $str_Consolation_res .= "<tr>";
                        $str_Consolation_res .= '<td style="border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;" width="20%" height="36" align="center" valign="middle" bgcolor="#666666">'.$row_consolation.'</td>';
                if($i%5 == 0)
                    $str_Consolation_res .= "</tr>";
                $i++;
                if($i > 10)
                    break;
          }
          
          $arr_1_3DJp1          = explode("|",$str_1_3DJp1);
          $i = 1;
          $str_1_3DJp1_res = "";
          foreach($arr_1_3DJp1 as $row_1_3DJp1)
          {
              
                if($i%2 == 1)
                    $str_1_3DJp1_res .= "<tr>";
                        $str_1_3DJp1_res .= '<td style="border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;" width="50%" height="30" align="center">'.$row_1_3DJp1.'</td>';
                if($i%2 == 0)
                    $str_1_3DJp1_res .= "</tr>";
                $i++;
                if($i > 6)
                    break;
              //}
          }
          
          $arr_1_3DJp2          = explode("|",$str_1_3DJp2);
          $i = 1;
          $str_1_3DJp2_res = "";
          foreach($arr_1_3DJp2 as $row_1_3DJp2)
          {
              // if($row_1_3DJp2 != "Empty" ||$row_1_3DJp2 != "undefined")
              // {
                if($i%2 == 1)
                    $str_1_3DJp2_res .= "<tr>";
                        $str_1_3DJp2_res .= '<td style="border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;" width="50%" height="30" align="center">'.$row_1_3DJp2.'</td>';
                if($i%2 == 0)
                    $str_1_3DJp2_res .= "</tr>";
                $i++;
                //if($i > 6)
                    //break;
              //}
          }
          
          
          $arr_3DJp          = explode("|",$str_3DJp);
          $i = 1;
          $str_3DJp_res = "";
          foreach($arr_3DJp as $row_3DJp)
          {
              // if($row_3DJp != "Empty" || $row_3DJp != "undefined")
              // {
                if($i%3 == 1)
                    $str_3DJp_res .= "<tr>";
                        $str_3DJp_res .= '<td style="border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;" width="33%" height="30" align="center">'.$row_3DJp.'</td>';
                if($i%3 == 0)
                    $str_3DJp_res .= "</tr>";
                $i++;
                if($i > 6)
                    break;
             // }
          }
          
          $arr_DMC_Jp1          = explode("|",$str_DMC_Jp1);
          $i = 1;
          $str_DMC_Jp1_res = "";
          foreach($arr_DMC_Jp1 as $row_DMC_Jp1)
          {
              // if($row_DMC_Jp1 != "Empty" || $row_DMC_Jp1 != "undefined")
              // {
                if($i%1 == 1)
                    $str_DMC_Jp1_res .= "<tr>";
                        $str_DMC_Jp1_res .= '<td style="border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;" height="30" align="center">'.$row_DMC_Jp1.'</td>';
                if($i%1 == 0)
                    $str_DMC_Jp1_res .= "</tr>";
                $i++;
                if($i > 1)
                    break;
              //}
          }
          
          $arr_DMC_Jp2          = explode("|",$str_DMC_Jp2);
          $i = 1;
          $str_DMC_Jp2_res = "";
          foreach($arr_DMC_Jp2 as $row_DMC_Jp2)
          {
              // if($row_DMC_Jp2 != "Empty" || $row_DMC_Jp2 != "undefined")
              // {
                $str_DMC_Jp2_res .= '<tr><td style="border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;" width="100%" height="30" align="center">'.$row_DMC_Jp2.'</td></tr>';
                $i++;
                if($i > 5)
                    break;
              //}
          }
          
          
          //return
          $arr = array(
                        "span_date"             =>$span_date,
                        "str_Draw_No"           =>$str_Draw_No,
                        "str_1_3D_1st_Price"    =>$str_1_3D_1st_Price,
                        "str_1_3D_2nd_Price"    =>$str_1_3D_2nd_Price,
                        "str_1_3D_3rd_Price"    =>$str_1_3D_3rd_Price,
                        "str_3D_1st_Price"      =>$str_3D_1st_Price,
                        "str_3D_2nd_Price"      =>$str_3D_2nd_Price,
                        "str_3D_3rd_Price"      =>$str_3D_3rd_Price,
                        "str_1_3DJp1_RM"        =>$str_1_3DJp1_RM,
                        "str_1_3DJp2_RM"        =>$str_1_3DJp2_RM,
                        "str_3D_Jp_RM"          =>$str_3D_Jp_RM,
                        "str_DMC_Jp1_RM"        =>$str_DMC_Jp1_RM,
                        "str_DMC_Jp2_RM"        =>$str_DMC_Jp2_RM,
                        "str_DMC_Jp1"           =>$str_DMC_Jp1,
                        "str_spacial_res"       =>$str_spacial_res,
                        "str_Consolation_res"   =>$str_Consolation_res,
                        "str_1_3DJp1_res"       =>$str_1_3DJp1_res, 
                        "str_3DJp_res"          =>$str_3DJp_res,
                        "str_DMC_Jp1_res"       =>$str_DMC_Jp1_res,
                        "str_DMC_Jp2_res"       =>$str_DMC_Jp2_res,
                        "str_1_3DJp2_res"       =>$str_1_3DJp2_res,
                        //"str_date"              =>$str_date,
                        "flag"=>1
                        );
      }
      else
        $arr = array("flag"                 =>0,
                    //"str_date"              =>$str_date
                    );
                    
      return $arr;
    }
}