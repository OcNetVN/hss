<?php
class M_lottry_sin extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
   
    public function loadlistlottery()
    {
        $table = $_POST["table"];
        $sql = "SELECT `txday` FROM `$table`";
        $arr_list = $this->db->query($sql)->result();
        $arr = array("RaceDate_U" => $arr_list);
        return $arr;
    }
    public function SavePools()
    {
       $pool          = $_POST['Pools'];
       $month = "";
       $day = "";
       $year = "";
       $arr_chooseD  = $_POST['choosedate'];
       $listpool      = json_decode($pool,true);
       $kq = "";
       if(count($listpool) > 0)
       {
          $draw_no      = $listpool[0]['draw_no'];
          $arr_date     = $listpool[0]['txday'];
         
          $arr_date     = explode(" ",$arr_date);
          //print_r($arr_date);
          $arr_date_choo = explode("-",$arr_chooseD);
          if(isset($arr_date[1]) && $arr_date[1] != "\t")
          {
            $day = $arr_date[1];
            //echo "khac rong ".$day."";
          }
          else
          {
            $day = $arr_date_choo[0];
            //echo "rong ".$day."";
          }

          if(isset($arr_date[2]) && !empty($arr_date[2]))
            $month = $this->ConverMonth($arr_date[2]);
          else
            $month = $arr_date_choo[1];
          
          if(isset($arr_date[3]) && !empty($arr_date[3]))
            $year = $arr_date[3];
          else
          {
            $year = $arr_date_choo[2];
          }
            
          $txday        = $year.$month.$day;

          $st1          = $listpool[0]['st1'];
          $nd2          = $listpool[0]['nd2'];
          $rd3          = $listpool[0]['rd3'];
          $consolation  = $listpool[0]['consolation'];
          $pecial       = $listpool[0]['special'];
          $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_sin4d",$txday)->total;
           if($check_isset_row_db > 0)
           {
               $sql = "UPDATE `lot_sin4d` SET `Draw_No`='$draw_no',`1st`='$st1',`2nd`='$nd2',`3rd`='$rd3',`Special`='$pecial',`Consolation`='$consolation' WHERE `txday`='$txday'";
           }
           else
           {
                $sql = "INSERT INTO `lot_sin4d`(`txday`,`Draw_No`,`1st`,`2nd`,`3rd`,`Special`,`Consolation`)
                  VALUES('$txday','$draw_no','$st1','$nd2','$rd3','$pecial','$consolation')";
            }
            $req = $this->db->query($sql);
            if($req)
            {
              $_SESSION['txday']  = $txday;
              $kq = 1;
            }
             
       }
       $arr = array('Rel'=> $kq);
       return $arr;
    }

     public function get_list_pools4D()
    {
         $day ="";
         $month = "";
         $year = "";
         $arr_date = $_POST['txtdate'];
         $arr_date = explode("-", $arr_date);
         if(isset($arr_date[0]))
          $day = $arr_date[0];
         if(isset($arr_date[1]))
          $month = $arr_date[1];
         if(isset($arr_date[2]))
          $year = $arr_date[2];
         $txtday = $year.$month.$day;
         $rel = "";
         $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_sin4d",$txtday)->total;
         if($check_isset_row_db > 0)
         {
             $sql = "SELECT * FROM `lot_sin4d` WHERE `txday`='$txtday'";
             $arr_sinpool = $this->db->query($sql)->result();
             $query    = $this->db->query($sql)->row_array();
             if(count($query) != 0)
              {
                $str_1st = $query["1st"];
                $str_2nd = $query["2nd"];
                $str_3rd = $query["3rd"];
              }
              else
              {
                  $str_1st = "";
                  $str_2nd = "";
                  $str_3rd = "";
              }
             
             $rel = 1;
         }
         else
         {
            $arr_sinpool = array();
            $str_1st = "";
            $str_2nd = "";
            $str_3rd = "";
         }
          $arr = array('rel'=>$rel,'l_sinpool'=>$arr_sinpool,'str_1st'=>$str_1st,'str_2nd'=>$str_2nd,'str_3rd'=>$str_3rd);
         return $arr;
       }
    public function SaveCashSweepSin()
    {
       $cashweep          = $_POST['CashSweep'];
       $list_date_choo    = $_POST['choosedate'];
       $listcashweep      = json_decode($cashweep,true);
       $kq = "";
       $day;
       $month;
       $year;
       if(count($listcashweep) > 0)
       {
          $draw_no = $listcashweep[0]['draw_no'];
          $arr_date   = $listcashweep[0]['txtday']; 
          $arr_date       = str_split($arr_date,4);
      
         // func_print_test($arr_date1) ;
          $arr_date_choo  = explode("-",$list_date_choo);
        //  if(isset($arr_date[0]) && $arr_date[0] != "\t")
              $day = trim($arr_date[0]);
        //  else
//             $day = $arr_date_choo[0];
         // if(isset($arr_date[1]))
             $month = $this->ConverMonth(trim($arr_date[1]));
        //  else
            // $month = $arr_date_choo[1];
         //  if(isset($arr_date[2]))
             $year = $arr_date[2];
         //  else
           //  $year = $arr_date_choo[2];

          $txday   = $year.$month.$day;
          $st1     = $listcashweep[0]['st1'];
          $nd2     = $listcashweep[0]['nd2'];
          $rd3     = $listcashweep[0]['rd3'];
          $consolation = $listcashweep[0]['consolation'];
          $pecial      = $listcashweep[0]['special'];
          $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_cashsweep",$txday)->total;
           if($check_isset_row_db > 0)
           {
               $sql = "UPDATE `lot_cashsweep` SET `Draw_No`='$draw_no',`1st`='$st1',`2nd`='$nd2',`3rd`='$rd3',`Special`='$pecial',`Consolation`='$consolation' WHERE `txday`='$txday'";
           }
           else
           {
              $sql = "INSERT INTO `lot_cashsweep`(`txday`,`Draw_No`,`1st`,`2nd`,`3rd`,`Special`,`Consolation`)
                      VALUES('$txday','$draw_no','$st1','$nd2','$rd3','$pecial','$consolation')";
           }
          
          $req = $this->db->query($sql);
          if($req)
          {
            $kq = 1;
            $_SESSION['txday']  = $txday;
          }
           
       }

       $arr = array('Rel'=> $kq);
       return $arr;
    }

    public function get_cash_sweep()
    {
         $day ="";
         $month = "";
         $year = "";
         $arr_date = $_POST['txtdate'];
         $arr_date = explode("-", $arr_date);
         if(isset($arr_date[0]))
          $day = $arr_date[0];
         if(isset($arr_date[1]))
          $month = $arr_date[1];
         if(isset($arr_date[2]))
          $year = $arr_date[2];
         $txtday = $year.$month.$day;
         $rel = "";
         $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_cashsweep",$txtday)->total;
         if($check_isset_row_db > 0)
         {
             $sql = "SELECT * FROM `lot_cashsweep` WHERE `txday`='$txtday'";
             $arr_cashswep = $this->db->query($sql)->row_array();
             $query  = $this->db->query($sql)->result();
             if(count($arr_cashswep) > 0)
             {  
                 $str_st1 = $arr_cashswep["1st"];
                 $str_nd2 = $arr_cashswep["2nd"];
                 $str_rd3 = $arr_cashswep["3rd"];
             }
             $rel = 1;
         }
         else
         {
              $query = array();
              $str_st1 = "";
              $str_nd2 = "";
              $str_rd3 = "";
         }

          $arr = array('rel'=>$rel,'str_st1'=>$str_st1,'str_nd2'=>$str_nd2,'str_rd3'=>$str_rd3,'list_cashweep'=>$query);
          return $arr;
    }

    public function ConverMonth($month_arr)
    {
      switch ($month_arr) {
            case 'Jan': $month = "01";
              break;
            case 'Feb': $month = "02";
              break;
            case 'Mar': $month = "03";
              break;
            case 'Apr': $month = "04";
              break;
            case 'May': $month = "05";
              break;
            case 'Jun': $month = "06";
              break;
            case 'Jul': $month = "07";
              break;
            case 'Aug': $month = "08";
              break;
            case 'Sep': $month = "09";
              break;
            case 'Oct': $month = "10";
              break;
            case 'Nov': $month = "11";
              break;
            case 'Dec': $month = "12";
              break;
            default:
              $month = "";
              break;
          }

          return $month;
    }

    //SaveSabah88
    public function SaveSabah88()
    {

       $sabah          = $_POST['Sabah'];
       $listsabah      = json_decode($sabah,true);
       $arr_date_D     = $_POST['choosedate'];
       $kq = "";
       $day;
       $month;
       $year;
       if(count($listsabah) > 0)
       {
          $draw_no    = $listsabah[0]['lotton_draw'];
          $arr_date   = $listsabah[0]['txtday'];
          $arr_date_choo = explode("-", $arr_date_D);
          $arr_date   = explode("-",$arr_date);
          $date       = explode(" ", $arr_date[0]);
          if(isset($date[1]) && $date[1] != "\t")
            $day        = $date[1];
          else
            $day       = $arr_date_choo[0];

          if(isset($arr_date[1]) && $arr_date[1] !="")
            $month      = $this->ConverMonth($arr_date[1]);
          else
            $month  = $arr_date_choo[1];
          if(isset($arr_date[2]))
            $year = $arr_date[2];
          else
            $year         = $arr_date_choo[2];
          $txday          = $year.$month.$day;
          $st1            = $listsabah[0]['pos1'];
          $nd2            = $listsabah[0]['pos2'];
          $rd3            = $listsabah[0]['pos3'];
          $consolation    = $listsabah[0]['consolation'];
          $lotto          = $listsabah[0]['lotto'];
          $pecial         = $listsabah[0]['special'];
          $arr_lotodate   = $listsabah[0]['lotto_date'];
          $loto_date = "";
          if($arr_lotodate != "Empty" && $arr_lotodate != " ")
          {
              //print_r($arr_lotodate);
              $arr_lotodate   = explode("-",$arr_lotodate);
              $day_loto       = $arr_lotodate[0];
              $monthloto      = $this->ConverMonth($arr_lotodate[1]);
              $loto_date      = $arr_lotodate[2].$monthloto.$day_loto;
              //print_r($loto_date);
          }
          $lotton_draw    = $listsabah[0]['lotton_draw'];
          $prizes1st      = $listsabah[0]['prizes1st'];
          $prizes2nd      = $listsabah[0]['prizes2nd'];
          $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_sabah",$txday)->total;
           if($check_isset_row_db > 0)
           {
               $sql = "UPDATE `lot_sabah` SET `Draw_No`='$draw_no',`1st`='$st1',`2nd`='$nd2',`3rd`='$rd3',`Special`='$pecial',`Consolation`='$consolation',`Lotto_txday`='$loto_date',`Lotto_DrawNo`='$lotton_draw',`Lotto`='$lotto',`Lotto_1st`='$prizes1st',`Lotto_2nd`='$prizes2nd'
                    WHERE `txday`='$txday'";
           }
           else
           {
              $sql = "INSERT INTO `lot_sabah`(`txday`,`Draw_No`,`1st`,`2nd`,`3rd`,`Special`,`Consolation`,`Lotto_txday`,`Lotto_DrawNo`,`Lotto`,`Lotto_1st`,`Lotto_2nd`)
                      VALUES('$txday','$draw_no','$st1','$nd2','$rd3','$pecial','$consolation','$loto_date','$lotton_draw','$lotto','$prizes1st','$prizes2nd')";
           }
          
          $req = $this->db->query($sql);
          if($req)
          {
            $kq = 1;
            $_SESSION['txday']  = $txday;
          }
           
       }

       $arr = array('Rel'=> $kq);
       return $arr;
    }

    public function get_list_sabah88()
    {
         $day ="";
         $month = "";
         $year = "";
         $arr_date = $_POST['txtdate'];
         $arr_date = explode("-", $arr_date);
         if(isset($arr_date[0]))
          $day = $arr_date[0];
         if(isset($arr_date[1]))
          $month = $arr_date[1];
         if(isset($arr_date[2]))
          $year = $arr_date[2];
         $txtday = $year.$month.$day;
         $rel = "";
         $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_sabah",$txtday)->total;
         if($check_isset_row_db > 0)
         {
             $sql = "SELECT * FROM `lot_sabah` WHERE `txday`='$txtday'";
             $arr_sabah = $this->db->query($sql)->row_array();
             $query  = $this->db->query($sql)->result();
             if(count($arr_sabah) > 0)
             {  
                 $str_st1 = $arr_sabah["1st"];
                 $str_nd2 = $arr_sabah["2nd"];
                 $str_rd3 = $arr_sabah["3rd"];
             }
             $rel = 1;
         }
         else
         {
              $query = array();
              $str_st1 = "";
              $str_nd2 = "";
              $str_rd3 = "";
         }

          $arr = array('rel'=>$rel,'str_st1'=>$str_st1,'str_nd2'=>$str_nd2,'str_rd3'=>$str_rd3,'list_sabah88'=>$query);
          return $arr;
      }  
    

    // SaveSinSTC4D
    public function SaveSinSTC4D()
    {

       $stc           = $_POST['stc4d'];
       $list_date_choo = $_POST['choosedate'];
       $liststc       = json_decode($stc,true);
       $kq = "";
       $day;
       $month;
       $year;
       if(count($liststc) > 0)
       {
          $draw_no = $liststc[0]['draw_no'];
          $arr_date   = $liststc[0]['txtday'];
          $arr_date   = explode("/",$arr_date);
          $arr_date_choo = explode("-",$list_date_choo);
          if(isset($arr_date[0]) && $arr_date[0]!= "\t")
            $day = $arr_date[0];
          else
            $day = $arr_date_choo[0];
          if(isset($arr_date[1]))
            $month = $arr_date[1];
          else
            $month = $arr_date_choo[1];
          if(isset($arr_date[2]))
            $year = $arr_date[2];
          else
            $year = $arr_date_choo[2];
          $txday       = $year.$month.$day;
          $st1     = $liststc[0]['prizes1st'];
          $nd2     = $liststc[0]['prizes2nd'];
          $rd3     = $liststc[0]['prizes3rd'];
          $consolation = $liststc[0]['consolation'];
          $pecial      = $liststc[0]['special'];
          $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_sandakan",$txday)->total;
           if($check_isset_row_db > 0)
           {
               $sql = "UPDATE `lot_sandakan` SET `Draw_No`='$draw_no',`1st`='$st1',`2nd`='$nd2',`3rd`='$rd3',`Special`='$pecial',`Consolation`='$consolation' 
                        WHERE `txday`='$txday'";
           }
           else
           {
              $sql = "INSERT INTO `lot_sandakan`(`txday`,`Draw_No`,`1st`,`2nd`,`3rd`,`Special`,`Consolation`)
                      VALUES('$txday','$draw_no','$st1','$nd2','$rd3','$pecial','$consolation')";
           }
          
          $req = $this->db->query($sql);
          if($req)
          {
            $kq = 1;
            $_SESSION['txday']  = $txday;
          }
           
       }

       $arr = array('Rel'=> $kq);
       return $arr;
    }

    public function get_list_stc4d()
    {
        $day ="";
        $month = "";
        $year = "";
        $arr_date = $_POST['txtdate'];
        $arr_date = explode("-", $arr_date);
         if(isset($arr_date[0]))
          $day = $arr_date[0];
         if(isset($arr_date[1]))
          $month = $arr_date[1];
         if(isset($arr_date[2]))
          $year = $arr_date[2];
         $txtday = $year.$month.$day;
         $rel = "";
         $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_sandakan",$txtday)->total;
         if($check_isset_row_db > 0)
         {
             $sql = "SELECT * FROM `lot_sandakan` WHERE `txday`='$txtday'";
             $arr_sandakan = $this->db->query($sql)->result();
             $query = $this->db->query($sql)->row_array();
             if(count($query) > 0)
             {
                $st_1 = $query['1st'];
                $nd_2 = $query['2nd'];
                $rd_3 = $query['3rd'];
             }
             $rel = 1;
         }
         else
         {
            $arr_sandakan = array();
            $st_1 = "";
            $nd_2 = "";
            $rd_3 = "";
         }
          $arr = array('rel'=>$rel,'l_sandakan'=>$arr_sandakan,'st_1'=>$st_1,'nd_2'=>$nd_2,'rd_3'=>$rd_3);
         return $arr;
    }
    //SaveSinToTo
    public function SaveSinToTo()
    {
       $sintoto  = "";
       $listoto = "";
       $choosengay = $_POST['choosedate'];
       if(isset($_POST['toto']))
       {
          $sintoto          = $_POST['toto'];
          $listoto      = json_decode($sintoto,true);
       }
       
       $kq = "";
       if(count($listoto) > 0)
       {
          $draw_no      = $listoto[0]['draw_no'];
          $arr_date     = $listoto[0]['txtday'];
         
          $arr_date_choose = explode("-", $choosengay);
          $arr_date        = explode(" ",$arr_date);
          $month  = "";
          $day    = "";
          $year   = "";
  
          if(isset($arr_date[2]) && !empty($arr_date[2]))
            $month        = $this->ConverMonth($arr_date[2]);
          else
            $month        = $arr_date_choose[1];
          if(isset($arr_date[1]) && !empty($arr_date[1]))
            $day = $arr_date[1];
          else
             $day = $arr_date_choose[0];

          if(isset($arr_date[3]) && !empty($arr_date[3]))
            $year = $arr_date[3];
          else
          {
            $year = $arr_date_choose[2];
            //$year = substr($year,-2);
          }
          $txday        = $year.$month.$day;
          
          $add_number   = $listoto[0]['addnumber'];
          $Amount       = $listoto[0]['amountprice'];
          $winno        = $listoto[0]['winner'];
          $group1       = $listoto[0]['group1'];
          $group2       = $listoto[0]['group2'];
          $group3       = $listoto[0]['group3'];
          $group4       = $listoto[0]['group4'];
          $group5       = $listoto[0]['group5'];
          $group6       = $listoto[0]['group6'];
          $group7      = $listoto[0]['group7'];
          $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_sintoto",$txday)->total;
           if($check_isset_row_db > 0)
           {
               $sql = "UPDATE `lot_sintoto` SET `Draw_No`='$draw_no',`WinNo`='$winno',`Group1`='$group1',
                                                `Group2`='$group2',`Group3`='$group3',`Group4`='$group4',
                                                `Group5`='$group5',`Group6`='$group6',`Group7`='$group7',
                                                `Add_Number`='$add_number',`Amount_Jackpot`='$Amount'
                        WHERE `txday`='$txday'";
           }
           else
           {
              $sql = "INSERT INTO `lot_sintoto`(`txday`,`Draw_No`,`WinNo`,`Group1`,`Group2`,`Group3`,`Group4`,`Group5`,`Group6`,`Group7`,`Add_Number`,`Amount_Jackpot`)
                      VALUES('$txday','$draw_no','$winno','$group1','$group2','$group3','$group4','$group5','$group6','$group7','$add_number','$Amount')";
           }
          
          $req = $this->db->query($sql);
          if($req)
          {
            $kq = 1;
            $_SESSION['txday']  = $txday;
          }    
       }

       $arr = array('Rel'=> $kq);
       return $arr;
    }

    public function get_list_sintoto()
    {
       $day ="";
       $month = "";
       $year = "";
       $arr_date = $_POST['txtdate'];
       $arr_date = explode("-", $arr_date);
       if(isset($arr_date[0]))
        $day = $arr_date[0];
       if(isset($arr_date[1]))
        $month = $arr_date[1];
       if(isset($arr_date[2]))
        $year = $arr_date[2];
       $txtday = $year.$month.$day;
       $rel = "";
       $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_sintoto",$txtday)->total;
       if($check_isset_row_db > 0)
       {
           $sql = "SELECT * FROM `lot_sintoto` WHERE `txday`='$txtday'";
           $arr_sintoto = $this->db->query($sql)->result();
           $rel = 1;
       }
       else
       {
          $arr_sintoto = array();
       }
        $arr = array('rel'=>$rel,'l_sintoo'=>$arr_sintoto);
       return $arr;
       
    }


    // * page convert  sin weep
    public function SinWeep()
    {
       $sinwwep          = $_POST['SinWeep'];
       $listsweep        = json_decode($sinwwep,true);
       $arr_date_D       = $_POST['choosedate'];
       $day = "";
       $month = "";
       $year = "";
       $kq = "";
       if(count($listsweep) > 0)
       {
          $draw_no       = $listsweep[0]['draw_no'];
          $arr_date      = $listsweep[0]['txtday'];
          $arr_date_choo = explode("-", $arr_date_D);
          
          //print_r("ggdgdfg".$arr_date);
          if($arr_date == " ")
          {
            //echo "trong";
            $day = $arr_date_choo[0];
            $month = $arr_date_choo[1];
            $year = $arr_date_choo[2];
            //$year = substr($year,-2);
          }
          else
          {
             $arr_date      = explode(" ",$arr_date);
             //print_r($arr_date);
             //echo "khong trong";
             $day = $arr_date[1];
             $month = $this->ConverMonth($arr_date[2]);
             $year = $arr_date[3];
             $txday         = $year.$month.$day;
          }

          $txday         = $year.$month.$day;
          // print_r($arr_date_choo[0]);
          // if(isset($arr_date[0]) && $arr_date[0] != "\t")
          //   $day = $arr_date[0];
          // else
          //   $day = $arr_date_choo[0];
          // if(isset($arr_date[1]))
          //   $month = $arr_date[1];
          // else
          //   $month = $arr_date_choo[1];

          // if(isset($arr_date[2]))
          //   $year = $arr_date[2];
          // else
          // {
          //   $year = $arr_date_choo[2];
          //   $year = substr($year,-2);
          // }

          
          //print_r($txday);
          $stprize11     = $listsweep[0]['stprize11'];
          $stprize12     = $listsweep[0]['stprize12'];
          $stprize21     = $listsweep[0]['stprize21'];
          $stprize22     = $listsweep[0]['stprize22'];
          $stprize31     = $listsweep[0]['stprize31'];
          $stprize32     = $listsweep[0]['stprize32'];
          $jopok         = $listsweep[0]['jopok'];
          $lucky         = $listsweep[0]['lucky'];
          $gift          = $listsweep[0]['gift'];
          $consolation   = $listsweep[0]['consolation'];
          $participation = $listsweep[0]['participation'];
          $ddelight      = $listsweep[0]['ddelight'];
          $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_sin_sweep",$txday)->total;
           if($check_isset_row_db == 0)
           {
              $sql = "INSERT INTO `lot_sin_sweep`(`txday`,`Draw_No`,`1stprize`,`1stprize2`,`2ndprize`,`2ndprize2`,`3rdprize`,`3rdprize3`,`10jp`,`10lucky`,`30gift`,`30consolation`,`50participation`,`2ddelight`)
                    VALUES('$txday','$draw_no','$stprize11','$stprize12','$stprize21','$stprize22','$stprize31','$stprize32','$jopok','$lucky','$gift','$consolation','$participation','$ddelight')";
                    $req = $this->db->query($sql);
           }
           else
           {
              $sql = "UPDATE `lot_sin_sweep` SET `Draw_No`='$draw_no',`1stprize`='$stprize11',`1stprize2`='$stprize12',`2ndprize`='$stprize21',`2ndprize2`='$stprize22',`3rdprize`='$stprize31',`3rdprize3`='$stprize32',`10jp`='$jopok',`10lucky`='$lucky',`30gift`='$gift',`30consolation`='$consolation',`50participation`='$participation',`2ddelight`='$ddelight'
                      WHERE `txday`='$txday'";
                      $req = $this->db->query($sql);
           }
             
          if($req)
           $kq = 1;
       }

       $arr = array('Rel'=> $kq);
       return $arr;
    }

    public function get_list_sinsweep()
    {
       $day ="";
       $month = "";
       $year = "";
       $arr_date = $_POST['txtdate'];
       $arr_date = explode("-", $arr_date);
       if(isset($arr_date[0]))
        $day = $arr_date[0];
       if(isset($arr_date[1]))
        $month = $arr_date[1];
       if(isset($arr_date[2]))
        $year = $arr_date[2];
       $txtday = $year.$month.$day;
       $rel = "";
       $check_isset_row_db     = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_sin_sweep",$txtday)->total;
       if($check_isset_row_db > 0)
       {
           $sql = "SELECT * FROM `lot_sin_sweep` WHERE `txday`='$txtday'";
           $arr_sinsweep = $this->db->query($sql)->row_array();
           if(count($arr_sinsweep) > 0)
           {  
               $str_drawno  = $arr_sinsweep["Draw_No"];
               $str_prize11 = $arr_sinsweep["1stprize"];
               $str_prize12 = $arr_sinsweep["1stprize2"];
               $str_ndprize11 = $arr_sinsweep["2ndprize"];
               $str_ndprize12 = $arr_sinsweep["2ndprize2"];
               $str_rdprize11 = $arr_sinsweep["3rdprize"];
               $str_rdprize12 = $arr_sinsweep["3rdprize3"];
               $str_jp        = $arr_sinsweep["10jp"];
               $str_lucky    = $arr_sinsweep["10lucky"];
               $str_gif     = $arr_sinsweep["30gift"];
               $str_consolation = $arr_sinsweep["30consolation"];
               $str_patical      = $arr_sinsweep["50participation"];
               $str_ddelingh      = $arr_sinsweep["2ddelight"];
           }
           $rel = 1;
       }
       else
       {
           $arr_sinsweep = array();
           $str_drawno = "";
           $str_prize11 = "";
           $str_prize12 = "";
           $str_ndprize11 = "";
           $str_ndprize12 = "";
           $str_rdprize11 = "";
           $str_rdprize12 = "";
           $str_jp        = "";
           $str_lucky    = "";
           $str_gif       = "";
           $str_consolation = "";
           $str_patical      = "";
           $str_ddelingh      = "";
       }
        $arr = array('rel'=>$rel,'draw_no'=>$str_drawno,
                      'prize11'=>$str_prize11,'prize12'=>$str_prize12,
                      'ndprize11'=>$str_ndprize11,'ndprize12'=>$str_ndprize12,
                      'rdprize11'=>$str_rdprize11,'rdprize12'=>$str_rdprize12,
                      'jp'=>$str_jp,'lucky'=>$str_lucky,'gif'=>$str_gif,'consolation'=>$str_consolation,
                      'patical'=>$str_patical,'ddelight'=>$str_ddelingh
                      );
       return $arr;
    }  
      
}