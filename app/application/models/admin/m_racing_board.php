<?php
class M_racing_board extends CI_Model{
    public function __construct()
    {
        parent::__construct();

    }
    
    public function loadlistRaceCard()
    {
        $sql = "SELECT `rowid`,`RaceID` FROM `racerard`";
        $arr_RCID = $this->db->query($sql)->result();
        $arr = array('RCID' => $arr_RCID);
        return $arr;
   }
   
   public function loadRCID()
   {
        $country = $_POST['contry'];
        // thuận edit Show list Race Card cho hợp lý ngày 10/08/2015
        $sql = "SELECT `rowid`,`RaceID`,`Meter` FROM `racerard` 
                WHERE LEFT(`RaceID`,2) = '$country' 
                AND `status` = 'OPEN'
                AND `RaceID` NOT IN( SELECT `RaceCardId` FROM `raceresult` 
                WHERE `RaceCountry`='$country')";
        //print_r($sql);
        $arr_RCID = $this->db->query($sql)->result();      
        $arr = array('RCID' => $arr_RCID);
        return $arr;
    }

    public function saveTimeCountry()
    {
       $country = "";
       $run_time = "";
       if(isset($_POST["country"]))
          $country =  $_POST["country"];
       if(isset($_POST["run_time"]))
          $run_time = $_POST["run_time"];
        $sql_check = "SELECT * FROM `country` WHERE `CountryCode`='$country' AND `ShowHorseInfo`=b'1'";
        $arr_check = $this->db->query($sql_check)->result();
        if(count($arr_check) != 0)
        {
            $sql_insertime = "UPDATE `country` SET `Time_Play`='$run_time' 
                              WHERE `CountryCode`='$country' AND `ShowHorseInfo`=b'1'";
            $req  = $this->db->query($sql_insertime);
            return 1;
        }
        else
        {
             
        }  
    }

    public function StopTimeCountry()
    {
       $country = "";
       if(isset($_POST["country"]))
          $country =  $_POST["country"];
        $sql_check = "SELECT * FROM `country` WHERE `CountryCode`='$country' AND `ShowHorseInfo`=b'1'";
        $arr_check = $this->db->query($sql_check)->result();
        if(count($arr_check) != 0)
        {
            $sql_insertime = "UPDATE `country` SET `Time_Play`='0' 
                              WHERE `CountryCode`='$country' AND `ShowHorseInfo`=b'1'";
            $req  = $this->db->query($sql_insertime);
            return 1;
        }
    }
 
 public function loadRaceInfo()
 {
     $country = $_POST['contry'];
     $RaceID  = $_POST['RaceCardID'];
     $sql_raceinfo = "SELECT * FROM `raceinfo` WHERE `RaceCountry` = '$country' AND `RaceID`='$RaceID'";
     $arr_raceinfo = $this->db->query($sql_raceinfo)->result();
     $arr = array('RaceInfo'=>$arr_raceinfo);
     return $arr;
 }

 public function loadBothsubItem()
 {
          $ItemID = "";
          $ItemID1 = "";
          if(isset($_POST['Item']))
            $ItemID = $_POST['Item'];
          if(isset($_POST['Item1']))
            $ItemID1 = $_POST['Item1'];
          $req = "";
          $sql = "SELECT * FROM `category` WHERE `id` ='$ItemID'";
          $ar_Sub = $this->db->query($sql)->result();
          $sql_Item = "SELECT * FROM `category` WHERE `id` ='$ItemID1'";
          $ar_Sub1 = $this->db->query($sql_Item)->result();
          if(count($ar_Sub) != 0 && count($ar_Sub1) != 0)
          {
            $req = 1;
          }

          $arr = array('Result'=>$req,'ItemDetail'=>$ar_Sub,'ItemDetail1'=>$ar_Sub1);
          return $arr;
 }

 // button Clear Thứ hạng con ngựa 
 public function UpdateHorseInfoRuning1234()
 {
    $RaceCardID = $_POST['RaceCardID'];

    $sql = "SELECT * FROM `raceinfo` WHERE `RaceID` = '$RaceCardID'";
    $arr_raceboard = $this->db->query($sql)->result();
    if(count($arr_raceboard) != 0)
    {
        $sql_update = "UPDATE `raceinfo`
                       SET `win1A`='',`win1P`='',`win2A`='',
                          `win2P`='',`win3A`='',`win3P`='',
                          `win4A`='',`win4P`='',
                          `ModifiedDate` = NOW()
                       WHERE `RaceID`='$RaceCardID'";
        $this->db->query($sql_update);
    }
 }

  public function saveRaceInfo2()
  {
      $Race        = $_POST['Race'];
      $Country     = $_POST['Country'];
      $RaceID      = $_POST['RaceID'];
      $items1en    = $_POST['items1en'];
      $items1cn    = "";
      if(isset($_POST['items1cn']))
       $items1cn    = $_POST['items1cn'];
      $items1cn    = str_replace("'","",$items1cn);
      $items2en    = $_POST['items2en'];
      $items2cn    = "";
      if(isset($_POST['items2cn']))
        $items2cn    = $_POST['items2cn'];
        $items2cn    = str_replace("'", "", $items2cn);
      $items3en    = $_POST['items3en'];
      $items3cn    = "";
      if(isset($_POST['items3cn']))
        $items3cn    = $_POST['items3cn'];
        $items3cn    = str_replace("'", "", $items3cn);
      $items4en      = $_POST['items4en'];
      $items4cn      = "";
      if(isset($_POST['items4cn']))
        $items4cn    = $_POST['items4cn'];
        $items4cn    = str_replace("'", "", $items4cn);
       $RaceDay      = (string)date("Y").date("m").date("d");
       $RaceCard     = (string)$Race.date("Y").date("m").date("d");
       $sql_sel = "SELECT * FROM `raceinfo` WHERE `RaceCountry` = '$Race' AND `RaceID`='$RaceID'";  
       $arr_sql = $this->db->query($sql_sel)->result();
       $req = "";
       if(count($arr_sql) == 0)
        {
           $sql =  "INSERT INTO `raceinfo`(`RaceCard`,`RaceCountry`,`RaceDay`,`items1en`,`items1cn`,`items2en`,`items2cn`,`items3en`,`items3cn`,`items4en`,`items4cn`,`RaceID`,`txday`,`CreadedDate`)
                    VALUES('$RaceCard','$Race','$RaceDay','$items1en','$items1cn','$items2en','$items2cn','$items3en','$items3cn','$items4en','$items4cn','$RaceID','$RaceDay',NOW())";
           $result = $this->db->query($sql);
           if($result)
              $req = 1;
        }
       else
       {
            $sql = "UPDATE `raceinfo` 
                    SET `items1en`='$items1en',`items1cn`='$items1cn',
                        `items2en`='$items2en',`items2cn`='$items2cn',
                        `items3en`='$items3en',`items3cn`='$items3cn',
                        `items4en`='$items4en',`items4cn`='$items4cn',
                        `txday`='$RaceDay',`RaceDay`='$RaceDay',
                        `RaceCard`='$RaceCard',`ModifiedDate` = NOW() 
                    WHERE `RaceCountry` = '$Race' AND `RaceID`='$RaceID'";
            $result = $this->db->query($sql);
            if($result)
              $req = 1;
        }

         $arr = array("result"     =>$req,
                      "header1"    =>$items1en,
                      "header2"    =>$items2en,
                      "header3"    =>$items3en,
                      "header4"    =>$items4en,
                      "header1_cn" =>$items1cn,
                      "header2_cn" =>$items2cn,
                      "header3_cn" =>$items3cn,
                      "header4_cn" =>$items4cn
                      );
         return $arr;
  }

 public function GetWinLiveTole($country,$horseno,$raceboard)
 {
     $winMal = "";
     $sql_mal   = "SELECT * FROM `livetote` 
                  WHERE `RaceCountry`='$country' 
                  AND `RaceBoard`='$raceboard' 
                  AND CONVERT(SUBSTRING(`RaceNo`,-2),UNSIGNED INTEGER) = '$horseno'";
     $arrMal    = $this->db->query($sql_mal)->result();
     if(count($arrMal) != 0)
     {
       $winMal = $arrMal[0]->Win;
       $winMal = str_replace(".00","", $winMal);
       if($winMal  == -1 || $winMal  == "-1")
         $winMal = "SCR";
     }

     return $winMal;
 }

 public function GetPlaceLiveTote($country,$horseno,$raceboard)
 {
     $placeMal = "";
     $sql_mal   = "SELECT * FROM `livetote` 
                   WHERE `RaceCountry`='$country' 
                   AND `RaceBoard`='$raceboard' 
                   AND CONVERT(SUBSTRING(`RaceNo`,-2),UNSIGNED INTEGER) = '$horseno'";
     $arrMal    = $this->db->query($sql_mal)->result();
     if(count($arrMal) != 0)
     {       
       $placeMal = $arrMal[0]->Place;
       $placeMal = str_replace(".00","", $placeMal);
       if($placeMal == -1 || $placeMal == "-1")
         $placeMal = "SCR";
     }

     return $placeMal;
 }

 public function SaveSupportWinnerNo()
 {
    $st_1st = "";
    $st_2nd = "";
    $st_3rd = "";
    $str_4st = "";
    $country = "";
    $_1st = "";
    $header2 = "";
    $header3 = "";
    
    $board_mal = "MAL";
    $board_sin = "SIN";
    $winmal_1st = "";
    $placemal_1st  = "";
    $winsin_1st = "";
    $placesin_1st = "";
    $placemal_2nd = "";
    $placesin_2nd = "";
    $placemal_3rd = "";
    $placesin_3rd = "";
    $fag_header_mal ="";
    $fag_header_sin = "";
    $req = "";
    if(isset($_POST['country']))

      $country    = $_POST['country'];
      $RaceID     = $_POST['RaceID'];
      $header     = $_POST['header'];
      $header1    = $_POST['header'];
      $chinese    = $_POST['chinese'];
      $header     = explode('-',$header);
      if(isset($header[0]))
      {
        $st_1st = $header[0];
        $st_1st = explode(':',$st_1st);
        if(isset($st_1st[1]))
        {
           $_1st = $st_1st[1];
           $winmal_1st   = $this->GetWinLiveTole($country,$_1st,$board_mal);
           $placemal_1st = $this->GetPlaceLiveTote($country,$_1st,$board_mal);
           $winsin_1st   = $this->GetWinLiveTole($country,$_1st,$board_sin);
           $placesin_1st = $this->GetPlaceLiveTote($country,$_1st,$board_sin);
        }

        // set header1 co chữ winner No không
        if(isset($st_1st[0]) && $st_1st[0] == "Winner No")
        {
             $fag_header_mal = "RM";
             $fag_header_sin = "$";
             if(isset($header[1]))
             {
                $st_2nd = $header[1];
                $placemal_2nd = $this->GetPlaceLiveTote($country,$st_2nd,$board_mal);
                $placesin_2nd = $this->GetPlaceLiveTote($country,$st_2nd,$board_sin);
             }
             if(isset($header[2]))
             {
                $st_3rd = $header[2];
                $placemal_3rd = $this->GetPlaceLiveTote($country,$st_3rd,$board_mal);
                $placesin_3rd = $this->GetPlaceLiveTote($country,$st_3rd,$board_sin);
             }
              if(isset($header[3]))
              {
                $str_4st = $header[3];
              }
             $header2 = $fag_header_mal.$winmal_1st."-".$placemal_1st."-".$placemal_2nd."-".$placemal_3rd;
             $header3 = $fag_header_sin.$winsin_1st."-".$placesin_1st."-".$placesin_2nd."-".$placesin_3rd;
        }
      }

    $RaceDay   = (string)date("Y").date("m").date("d");
    $RaceCard  = (string)$country.date("Y").date("m").date("d");
    $sql_sel   = "SELECT * FROM `raceinfo` WHERE `RaceCountry` = '$country' AND `RaceID`='$RaceID'";  
    $arr_sql   = $this->db->query($sql_sel)->result();
    if(count($arr_sql) == 0)
    {    
         $sql = "INSERT INTO `raceinfo`(`RaceCard`,`RaceCountry`,`RaceDay`,
                                        `items1en`,`items1cn`,`items2en`,`items2cn`,
                                        `items3en`,`items3cn`,`items4en`,`items4cn`,
                                        `RaceID`,`txday`,`win1A`,`win2A`,`win3A`,`win4A`,`CreadedDate`
                                        )
                                  VALUES('$RaceCard','$country','$RaceDay',
                                          '$header1','$chinese','$header2','$header2',
                                          '$header3','$header3','','','$RaceID','$RaceDay',
                                          '$_1st','$st_2nd','$st_3rd','$str_4st',NOW()
                                        )";
         $result = $this->db->query($sql);
         if($result)
          $req = 1;
    }
    else{
            $sql = "UPDATE `raceinfo` SET `items1en`='$header1',`items1cn`='$chinese',`items2en`='$header2',
                                         `items2cn`='$header2',`items3en`='$header3',`items3cn`='$header3',
                                         `txday`='$RaceDay',`RaceDay`='$RaceDay',`RaceCard`='$RaceCard',
                                         `RaceID` = '$RaceID',`win1A` = '$_1st', `win2A`= '$st_2nd',
                                         `win3A`='$st_3rd',`win4A`= '$str_4st',`items4en`='',`items4cn`='',
                                         `ModifiedDate` = NOW()
                                      WHERE `RaceCountry` = '$country' AND `RaceID`='$RaceID' ";
            //print_r($sql);
          $result =   $this->db->query($sql);
          $req = 1;
    }
    
    $st_header1 = "";
    $st_header2 = "";
    $st_header3 = "";
    $st_header4 = "";

    $arr = array(
                  "result"     =>$req,
                  "header1"    =>$header1,
                  "header2"    =>$header2,
                  "header3"    =>$header3,
                  "header4"    =>"",
                  "header1_cn" =>$chinese,
                  "header2_cn" =>$header2,
                  "header3_cn" =>$header3,
                  "header4_cn" =>""
                  );
     return $arr;

 }

 public function SaveWinNo()
 {
   $country   = $_POST['country'];
   $horseNo   = $_POST['horseno'];
   $RaceID    = $_POST['RaceID'];
   $winMal    = "";
   $placeMal  = "";
   $winSin    = "";
   $placeSin  = "";
   $RaceDay   = (string)date("Y").date("m").date("d");
   $RaceCard  = (string)$country.date("Y").date("m").date("d");
   $sql_sel   = "SELECT * FROM `raceinfo` WHERE `RaceCountry` = '$country' AND `RaceID`='$RaceID' ";  
   $arr_sql   = $this->db->query($sql_sel)->result();
   $sql_mal   = "SELECT * FROM `livetote` WHERE `RaceCountry`='$country' AND `RaceBoard`='MAL' AND CONVERT(SUBSTRING(`RaceNo`,-2),UNSIGNED INTEGER) = '$horseNo'";
   $arrMal    = $this->db->query($sql_mal)->result();
   $req = "";

   if(count($arrMal) != 0)
   {
     $winMal = $arrMal[0]->Win;
     $winMal = str_replace(".00","", $winMal);
     if($winMal  == -1 || $winMal  == "-1")
       $winMal = "SCR";
     $placeMal = $arrMal[0]->Place;
     $placeMal = str_replace(".00","", $placeMal);
     if($placeMal == -1 || $placeMal == "-1")
       $placeMal = "SCR";
     $header2 = "RM ".$winMal."-".$placeMal."--";
   }
   $sql_sin = "SELECT * FROM `livetote` WHERE `RaceCountry`='$country' AND `RaceBoard`='SIN' AND CONVERT(SUBSTRING(`RaceNo`,-2),UNSIGNED INTEGER) = '$horseNo'";
   $arrSin  = $this->db->query($sql_sin)->result();
   if(count($arrSin) != 0)
   {
     $winSin = $arrSin[0]->Win;
     $winSin = str_replace(".00","", $winSin);
     $placeSin = $arrSin[0]->Place;
     $placeSin = str_replace(".00","", $placeSin);
     $header3 = "$ ".$winSin."-".$placeSin."--";
   }
   if($horseNo != "" || $horseNo != null)
   {
      $header1 = "Winner No: ".$horseNo;
      $header1_cn =  $horseNo."号马胜出";
      $WinnerNo1 = $horseNo;
   }
   if(count($arr_sql) == 0)
    {    
         $sql = "INSERT INTO `raceinfo`(`RaceCard`,`RaceCountry`,`RaceDay`,`items1en`,`items1cn`,`items2en`,`items2cn`,`items3en`,`items3cn`,`RaceID`,`txday`,`win1A`,`win2A`,`win3A`,`win4A`,`ITPH2`,`ITPH3`,`ITPH4`,`ITPH5`,`ITPH6`,`CreadedDate`)
                  VALUES('$RaceCard','$country','$RaceDay','$header1','$header1_cn','$header2','$header2','$header3','$header3','$RaceID','$RaceDay','$WinnerNo1','','','','','','','','',NOW())";
         $result = $this->db->query($sql);
         if($result)
          $req = 1;
    }
    else{
            $sql = "UPDATE `raceinfo` SET `items1en`='$header1',`items1cn`='$header1_cn',`items2en`='$header2',
                                         `items2cn`='$header2',`items3en`='$header3',`items3cn`='$header3',
                                         `txday`='$RaceDay',`RaceDay`='$RaceDay',`RaceCard`='$RaceCard',
                                         `win2A`='',`win3A`='',`win4A`='',
                                         `RaceID` = '$RaceID',`win1A` = $WinnerNo1,`ITPH2` = '',
                                         `ITPH3`= '', `ITPH4` ='',`ITPH5`='',`ITPH6`='',`ModifiedDate`= NOW()
                    WHERE `RaceCountry` = '$country' AND `RaceID`='$RaceID'";
            $result = $this->db->query($sql);
            if($result)
              $req = 1;
    }

     $arr = array("result"=>$req,
                  "header1"    =>$header1,
                  "header2"    =>$header2,
                  "header3"    =>$header3,
                  "header4"    =>"",
                  "header1_cn" =>$header1_cn,
                  "header2_cn" =>$header2,
                  "header3_cn" =>$header3,
                  "header4_cn" =>""
                   );
     return $arr;
 }
  public function saveRaceInfo1(){
       $Race        = $_POST['Race'];
       $Country     = $_POST['Country'];
       $RaceID      = $_POST['RaceID'];
       $items1en    = $_POST['items1en'];
       $items1cn    = $_POST['items1cn'];
       $items2en    = $_POST['items2en'];
       $items2cn    = $_POST['items2cn'];
       $items3en    = $_POST['items3en'];
       $items3cn    = $_POST['items3cn'];
       $items4en    = $_POST['items4en'];
       $items4cn    = $_POST['items4cn'];
       
       $Win01       = $_POST['Win_No1'];
       $WinC01      = $_POST['Unit1'];
       $Win02       = $_POST['Win_No2'];
       $WinC02      = $_POST['Unit2'];
       $Win03       = $_POST['Win_No3'];
       $WinC03      = $_POST['Unit3'];
       $Win04       = $_POST['Win_No4']; 
       $WinC04      = $_POST['Unit4'];

        // get postion horse no
       $win1 = $_POST['winNo1'];
       $win2 = $_POST['winNo2'];
       $win3 = $_POST['winNo3'];
       $win4 = $_POST['winNo4'];
       
       $req = "";
       $RaceDay     = (string)date("Y").date("m").date("d");
       $RaceCard    = (string)$Race.date("Y").date("m").date("d");
       $sql_sel = "SELECT * FROM `raceinfo` WHERE `RaceCountry` = '$Race' AND `RaceID`='$RaceID'";  
       $arr_sql = $this->db->query($sql_sel)->result();

       // get win, place race board Mal 
       $sql_mal = "SELECT * FROM `livetote` WHERE `RaceCountry`='$Race' AND `RaceBoard`='MAL'";
       $arrMal  = $this->db->query($sql_mal)->result();
       $list_res_Mal = array();
       foreach($arrMal as $mal){
             $list_Mal = array();
             $list_Mal = array(
                   $WinerNo = $mal->RaceNo,
                   $Win     = $mal->Win,
                   $Place   = $mal->Place
             );
         $list_res_Mal[]= $list_Mal;
       }
       // get win, place race board Sin
       $sql_sin = "SELECT * FROM `livetote` WHERE `RaceCountry`='$Race' AND `RaceBoard`='SIN'";
       $arrSin  = $this->db->query($sql_sin)->result();
       $list_res_Sin = array();
       foreach($arrSin as $sin){
             $list_Sin = array();
             $list_Sin = array(
                   $WinerNo = $sin->RaceNo,
                   $Win     = $sin->Win,
                   $Place   = $sin->Place
             );
         $list_res_Sin[]= $list_Sin;
       }
        $WinNo_Sin = "";
        $FirstWin_Sin = "";
        $FirstPlace_Sin = "";
        $SecondWin_Sin  = "";
        $SecondPlace_Sin = "";
        $ThirdWin_Sin  = "";
        $ThirdPlace_Sin = "";
        $FourthWin_Sin  = "";
        $FourthPlace_Sin = "";
       for($j=0;$j<count($list_res_Sin);$j++){
           $WinNo_Sin = $j + 1;
            if($win1 != ""){
               if($win1 == $WinNo_Sin){
                   $FirstWin_Sin_   = $list_res_Sin[$j][1];
                   $FirstWin_Sin    = str_replace(".00","", $FirstWin_Sin_);
                   if($FirstWin_Sin == -1 || $FirstWin_Sin == "-1")
                      $FirstWin_Sin = "SCR";
                   $FirstPlace_Sin_ = $list_res_Sin[$j][2];
                   $FirstPlace_Sin    = str_replace(".00","", $FirstPlace_Sin_);
                   if($FirstPlace_Sin == -1 || $FirstPlace_Sin == "-1")
                      $FirstPlace_Sin  = "SCR";
               }
             }

            if($win2 != ""){
               if($win2 == $WinNo_Sin){
                   $SecondWin_Sin_s     = $list_res_Sin[$j][1];
                   $SecondWin_Sin      = str_replace(".00","",$SecondWin_Sin_s);
                    if($SecondWin_Sin == -1 || $SecondWin_Sin == "-1")
                       $SecondWin_Sin = "SCR";
                   $SecondPlace_Sin_s   = $list_res_Sin[$j][2];
                   $SecondPlace_Sin      = str_replace(".00","", $SecondPlace_Sin_s);
                    if($SecondPlace_Sin == -1 || $SecondPlace_Sin == "-1")
                        $SecondPlace_Sin = "SCR";
               }
             }
            if($win3 != "")
            {
              if($win3  == $WinNo_Sin){
                 $ThirdWin_Sin_s = $list_res_Sin[$j][1];
                 $ThirdWin_Sin = str_replace(".00","", $ThirdWin_Sin_s);
                 if($ThirdWin_Sin == -1 || $ThirdWin_Sin == "-1")
                       $ThirdWin_Sin = "SCR";
                 $ThirdPlace_Sin_s = $list_res_Sin[$j][2];
                 $ThirdPlace_Sin = str_replace(".00","",$ThirdPlace_Sin_s);
                 if($ThirdPlace_Sin == -1 || $ThirdPlace_Sin == "-1")
                       $ThirdPlace_Sin = "SCR";
              }
            }
             
            if($win4 != ""){
              if($win4 == $WinNo_Sin){
                $FourthWin_Sin_ = $list_res_Sin[$j][1];
                $FourthWin_Sin  = str_replace(".00","", $FourthWin_Sin_);
                if($FourthWin_Sin == -1 || $FourthWin_Sin == "-1")
                       $FourthWin_Sin = "SCR";
                $FourthPlace_Sin_ = $list_res_Sin[$j][2];
                $FourthPlace_Sin = str_replace(".00","", $FourthPlace_Sin_);
                if($FourthPlace_Sin == -1 || $FourthPlace_Sin == "-1")
                       $FourthPlace_Sin = "SCR";
              } 
            }
               
       }
       
       $WinNo = "";
       $FirstWin  = "";
       $FirstPlace ="";
       $SecondWin  = "";
       $SecondPlace = "";
       $ThirdWin  = "";
       $ThirdPlace = "";
       $FourthWin  = "";
       $FourthPlace = "";
       for($i=0;$i<count($list_res_Mal);$i++){
           $WinNo = $i + 1;
           if($win1 != ""){
                if($win1 == $WinNo){
                  $FirstWin_ = $list_res_Mal[$i][1];
                  $FirstWin = str_replace(".00","", $FirstWin_);
                  if($FirstWin == -1 || $FirstWin == "-1")
                       $FirstWin = "SCR";
                  $FirstPlace_ = $list_res_Mal[$i][2];
                  $FirstPlace = str_replace(".00","", $FirstPlace_);
                  if($FirstPlace == -1 || $FirstPlace == "-1")
                       $FirstPlace = "SCR";
              }
           }
           
          if($win2 != ""){
              if($win2 == $WinNo){
                $SecondWin_ =   $list_res_Mal[$i][1];
                $SecondWin = str_replace(".00","", $SecondWin_);
                if($SecondWin == -1 || $SecondWin == "-1")
                       $SecondWin = "SCR";
                $SecondPlace_ = $list_res_Mal[$i][2];
                $SecondPlace = str_replace(".00","", $SecondPlace_);
                if($SecondPlace == -1 || $SecondPlace == "-1")
                       $SecondPlace = "SCR";
            }
          }
           
          if($win3  != ""){
            if($win3 == $WinNo){
               $ThirdWin_    = $list_res_Mal[$i][1];
               $ThirdWin    = str_replace(".00","", $ThirdWin_);
                if($ThirdWin == -1 || $ThirdWin == "-1")
                       $ThirdWin = "SCR";
               $ThirdPlace_  = $list_res_Mal[$i][2];
               $ThirdPlace  = str_replace(".00","", $ThirdPlace_);
               if($ThirdPlace == -1 || $ThirdPlace == "-1")
                       $ThirdPlace = "SCR";
            }
          }
           
          if($win4 != ""){
            if($win4 == $WinNo){
               $FourthWin_   = $list_res_Mal[$i][1];
               $FourthWin = str_replace(".00","", $FourthWin_);
               if($FourthWin == -1 || $FourthWin == "-1")
                       $FourthWin = "SCR"; 
               $FourthPlace_ = $list_res_Mal[$i][2];
               $FourthPlace = str_replace(".00","", $FourthPlace_);
               if($FourthPlace == -1 || $FourthPlace == "-1")
                       $FourthPlace = "SCR";
            }  
          } 
              
       }
       $header2 = "RM ".$FirstWin."-".$FirstPlace."-".$SecondPlace."-".$ThirdPlace;
       $header3 = "$ " .$FirstWin_Sin."-".$FirstPlace_Sin."-".$SecondPlace_Sin."-".$ThirdPlace_Sin; 
       if(count($arr_sql) == 0)
       {
           $sql = "INSERT INTO `raceinfo`(`RaceCard`,`RaceCountry`,`RaceDay`,`items1en`,`items1cn`,`items2en`,`items2cn`,`items3en`,`items3cn`,`items4en`,`items4cn`,`win1A`,`win1P`,`win2A`,`win2P`,`win3A`,`win3P`,`win4A`,`win4P`,`RaceID`,`txday`,`CreadedDate`)
                   VALUES('$RaceCard','$Race','$RaceDay','$items1en','$items1cn','$header2','$header2','$header3','$header3','$items4en','$items4cn','$Win01','$WinC01','$Win02','$WinC02','$Win03','$WinC03','$Win04','$WinC04','$RaceID','$RaceDay',NOW())";
           $result = $this->db->query($sql);
           if($result)
              $req = 1;
       }
       else{
            $sql = "UPDATE `raceinfo` SET `items1en`='$items1en',`items1cn`='$items1cn',
                                          `items2en`='$header2',`items2cn`='$header2',
                                          `items3en`='$header3',`items3cn`='$header3',
                                          `items4en`='$items4en',`items4cn`='$items4cn',
                                          `win1A`='$Win01',`win1P`='$WinC01',`win2A`='$Win02',
                                          `win2P`='$WinC02',`win3A`='$Win03',`win3P`='$WinC03',
                                          `win4A`='$Win04',`win4P`='$WinC04',`txday`='$RaceDay',
                                          `RaceDay`='$RaceDay',`RaceCard`='$RaceCard',`ModifiedDate`= NOW() 
                                      WHERE `RaceCountry` = '$Race' AND `RaceID`='$RaceID'";
            $result = $this->db->query($sql);
            if($result)
              $req = 1;
       }

       $arr = array(  "result"  =>$req,
                      "header1"    =>$items1en,
                      "header2"    =>$header2,
                      "header3"    =>$header3,
                      "header4"    =>$items4en,
                      "header1_cn" =>$items1cn,
                      "header2_cn" =>$header2,
                      "header3_cn" =>$header3,
                      "header4_cn" =>$items4cn
                    );
       return $arr;
  }
   
   public function saveRaceInfo3()
   {
       $Race        = $_POST['Race'];
       $Country     = $_POST['Country'];
       $RaceID      = $_POST['RaceID'];
       $items1en    = $_POST['items1en'];
       $items1cn    = $_POST['items1cn'];
       $items2en    = $_POST['items2en'];
       $items2cn    = $_POST['items2cn'];
       $items3en    = $_POST['items3en'];
       $items3cn    = $_POST['items3cn'];
       $items4en    = $_POST['items4en'];
       $items4cn    = $_POST['items4cn'];
       
       $ITPH2       = $_POST['itemIT_2'];
       $ITPET       = $_POST['itemET_2'];
       $ITPH3       = $_POST['ITPH3'];
       $ITPH4       = $_POST['ITPH4'];
       $ITPH5       = $_POST['ITPH5'];
       $ITPH6       = $_POST['ITPH6'];
       $ITPH7       = $_POST['ITPH7'];
       $ITPH8       = $_POST['ITPH8'];
       
       $RaceDay     = (string)date("Y").date("m").date("d");
       $RaceCard    = (string)$Race.date("Y").date("m").date("d");
       $sql_sel = "SELECT * FROM `raceinfo` WHERE `RaceCountry` = '$Race' AND `RaceID`='$RaceID'";  
       $arr_sql = $this->db->query($sql_sel)->result();
       $req = "";
       if(count($arr_sql) == 0)
       {
           $sql = "INSERT INTO `raceinfo`(`RaceCard`,`RaceCountry`,`RaceDay`,`items1en`,`items1cn`,`items2en`,`items2cn`,`items3en`,`items3cn`,`items4en`,`items4cn`,`RaceID`,`txday`,`ITPH2`,`ITPH3`,`ITPH4`,`ITPH5`,`ITPH6`,`ITPH7`,`ITPH8`,`ITPET`,`CreadedDate`)
                  VALUES('$RaceCard','$Race','$RaceDay','$items1en','$items1cn','$items2en','$items2cn','$items3en','$items3cn','$items4en','$items4cn','$RaceID','$RaceDay','$ITPH2','$ITPH3','$ITPH4','$ITPH5','$ITPH6','$ITPH7','$ITPH8','$ITPET',NOW())";
           $result = $this->db->query($sql);
           if($result)
            $req = 1;
       }
       else
       {
            $sql = "UPDATE `raceinfo` SET `items1en`='$items1en',`items1cn`='$items1cn',
                                          `items2en`='$items2en',`items2cn`='$items2cn',
                                          `items3en`='$items3en',`items3cn`='$items3cn',
                                          `items4en`='$items4en',`items4cn`='$items4cn',
                                          `ITPH2`='$ITPH2',`ITPH3`='$ITPH3',`ITPH4`='$ITPH4',
                                          `ITPH5`='$ITPH5',`ITPH6`='$ITPH6',`ITPET`='$ITPET',
                                          `ITPH7`= '$ITPH7',`ITPH8`='$ITPH8',
                                          `txday`='$RaceDay',`RaceDay`='$RaceDay',
                                          `RaceCard`='$RaceCard',`ModifiedDate`= NOW() 
                                      WHERE `RaceCountry` = '$Race' AND `RaceID`='$RaceID'";
            $result = $this->db->query($sql);
            if($result)
              $req = 1;
       }

        $arr = array("result"      =>$req,
                      "header1"    =>$items1en,
                      "header2"    =>$items2en,
                      "header3"    =>$items3en,
                      "header4"    =>$items4en,
                      "header1_cn" =>$items1cn,
                      "header2_cn" =>$items2cn,
                      "header3_cn" =>$items3cn,
                      "header4_cn" =>$items4cn
                    );
       return $arr;     
   }
    //Go to Race Card 
    public function GotoRaceCard(){
        $RaceID = $_POST['RaceCardID'];
        $sql = "SELECT * FROM `racerard` WHERE `RaceID` ='$RaceID'";
        $arr_RaceCard = $this->db->query($sql)->result();
        $arr = array('list_RaceCard' =>$arr_RaceCard);
        return $arr;
    }
    
   
}