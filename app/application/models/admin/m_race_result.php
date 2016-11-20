<?php
class M_race_result extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
   
   public function SaveRaceResult()
   {
       $RaceCountry     = $_POST['Country'];
       $RaceCardId      = $_POST['RaceCardID'];
       $FistHorse       = $_POST['WinNo1'];
       $SecondHorse     = $_POST['WinNo2'];
       $ThirdHorse      = $_POST['WinNo3'];
       $FourthHorse     = $_POST['WinNo4'];
       $FirstLength     = $_POST['WinBy1']." ".$_POST['Unit1'];
       $FirstLengthcn   = $_POST['WinBy1']." ".$_POST['Unit1_cn'];
       $SecondLength    = $_POST['WinBy2']." ".$_POST['Unit2'];
       $SecondLengthcn  = $_POST['WinBy2']." ".$_POST['Unit2_cn'];
       $Thirdlength     = $_POST['WinBy3']." ".$_POST['Unit3'];
       $Thirdlengthcn   = $_POST['WinBy3']." ".$_POST['Unit3_cn'];
       $FourthLength    = $_POST['WinBy4']." ".$_POST['Unit4'];
       $FourthLengthcn  = $_POST['WinBy4']." ".$_POST['Unit4_cn'];


       // show thứ tự đã có sẵn
       $Forecaset1 = $FistHorse."-".$SecondHorse;
       $showqps1   = $FistHorse."-".$SecondHorse;
       $showqps2    = $FistHorse."-".$ThirdHorse;
       $showqps3    = $SecondHorse."-".$ThirdHorse;
       $showtierce1 = $FistHorse."-".$SecondHorse."-".$ThirdHorse;
       $showtrio1   = $ThirdHorse."-".$SecondHorse."-".$FistHorse;
       $showquartet     = $FistHorse."-".$SecondHorse."-".$ThirdHorse."-".$FourthHorse;
       $showquadro     = $ThirdHorse."-".$SecondHorse."-".$FistHorse."-".$FourthHorse;
       // end show thứ tự đã có sẵn 
       
       //$RaceDay     = (string)date("Y").date("m").date("d");
       $RaceDay       = substr($RaceCardId,2,6);
       $RaceDay       = "20".$RaceDay;
       //$RaceCard    = (string)$Race.date("Y").date("m").date("d");
       $sql_sel = "SELECT * FROM `raceresult` WHERE `RaceCardId`='$RaceCardId'";
       $arr_sql = $this->db->query($sql_sel)->result();
       
       // get win, place race board Mal 

       $sql_mal = "SELECT * FROM `livetote` WHERE `RaceCountry`='$RaceCountry' AND `RaceBoard`='MAL'";
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
       $sql_sin = "SELECT * FROM `livetote` WHERE `RaceCountry`='$RaceCountry' AND `RaceBoard`='SIN'";
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
       
       $req = "";
       $WinNo_Sin = "";
       $FirstWin_Sin = "";
       $FirstPlace_Sin = "";
       $SecondPlace_Sin = "";
       $ThirdPlace_Sin = "";
       $FourthPlace_Sin = "";
       for($j=0;$j<count($list_res_Sin);$j++){
           $WinNo_Sin = $j + 1;
           if($FistHorse == $WinNo_Sin){
               $FirstWin_Sin   = $list_res_Sin[$j][1];
               $FirstPlace_Sin = $list_res_Sin[$j][2];
           }
           if($SecondHorse == $WinNo_Sin){
               //$FirstWin = "RM ".$list_res_Mal[$i][1];
               $SecondPlace_Sin = $list_res_Sin[$j][2];
           }
           if($ThirdHorse == $WinNo_Sin){
               $ThirdPlace_Sin = $list_res_Sin[$j][2];
           }
           
           if($FourthHorse == $WinNo_Sin){
               $FourthPlace_Sin = $list_res_Sin[$j][2];
           }     
       }
       
       $WinNo = "";
       $FirstWin = "";
       $FirstPlace = "";
       $SecondPlace = "";
       $ThirdPlace  = "";
       $FourthPlace = "";
       for($i=0;$i<count($list_res_Mal);$i++){
           $WinNo = $i + 1;
           if($FistHorse == $WinNo){
               $FirstWin = $list_res_Mal[$i][1];
               $FirstPlace = $list_res_Mal[$i][2];
           }
           if($SecondHorse == $WinNo){
               //$FirstWin = "RM ".$list_res_Mal[$i][1];
               $SecondPlace = $list_res_Mal[$i][2];
           }
           if($ThirdHorse == $WinNo){
               $ThirdPlace = $list_res_Mal[$i][2];
           }
           
           if($FourthHorse == $WinNo){
               $FourthPlace = $list_res_Mal[$i][2];
           }     
       }
       
       
       if(count($arr_sql) == 0)
       {
           $sql = "INSERT INTO `raceresult`(`RaceCountry`,`RaceBoard`,`RaceCardId`,`FirstHorse`,`FirstLength`,
                                            `FirstLengthCN`,`SecondHorse`,`SecondLength`,`SecondLengthCN`,
                                            `ThirdHorse`,`Thirdlength`,`ThirdlengthCN`,`FourthHorse`,
                                            `FourthLength`,`FourthLengthCN`,`FirstWin`,`FirstPlace`,`SecondWin`,
                                            `SecondPlace`,`ThirdWin`,`ThirdPlace`,`FourthWin`,`FourthPlace`,`Forecast1`,
                                            `QPS11`,`QPS21`,`QPS31`,`Tierce1`,`Trio1`,`Quartet1`,`Quadro1`,`RaceDay`
                                            )
                                    VALUES('$RaceCountry','MAL','$RaceCardId','$FistHorse','$FirstLength',
                                            '$FirstLengthcn','$SecondHorse','$SecondLength','$SecondLengthcn',
                                            '$ThirdHorse','$Thirdlength','$Thirdlengthcn','$FourthHorse',
                                            '$FourthLength','$FourthLengthcn','$FirstWin','$FirstPlace','',
                                            '$SecondPlace','','$ThirdPlace','','$FourthPlace','$Forecaset1',
                                            '$showqps1','$showqps2','$showqps3','$showtierce1','$showtrio1',
                                            '$showquartet','$showquadro','$RaceDay')";
           $this->db->query($sql);
           $sql_sin = "INSERT INTO `raceresult`(`RaceCountry`,`RaceBoard`,`RaceCardId`,`FirstHorse`,`FirstLength`,
                                                `FirstLengthCN`,`SecondHorse`,`SecondLength`,`SecondLengthCN`,
                                                `ThirdHorse`,`Thirdlength`,`ThirdlengthCN`,`FourthHorse`,
                                                `FourthLength`,`FourthLengthCN`,`FirstWin`,`FirstPlace`,`SecondWin`,
                                                `SecondPlace`,`ThirdWin`,`ThirdPlace`,`FourthWin`,`FourthPlace`,`Forecast1`,
                                                `QPS11`,`QPS21`,`QPS31`,`Tierce1`,`Trio1`,`Quartet1`,`Quadro1`,`RaceDay`
                                                )
                                        VALUES('$RaceCountry','SIN','$RaceCardId','$FistHorse','$FirstLength',
                                              '$FirstLengthcn','$SecondHorse','$SecondLength','$SecondLengthcn',
                                              '$ThirdHorse','$Thirdlength','$Thirdlengthcn','$FourthHorse',
                                              '$FourthLength','$FourthLengthcn','$FirstWin_Sin','$FirstPlace_Sin','',
                                              '$SecondPlace_Sin','','$ThirdPlace_Sin','','$FourthPlace_Sin',
                                              '$Forecaset1','$showqps1','$showqps2','$showqps3','$showtierce1',
                                              '$showtrio1','$showquartet','$showquadro','$RaceDay')";
           $this->db->query($sql_sin);
           $req = 1;
       }
       else
       {
            $sql = "UPDATE `raceresult` SET `RaceDay`='$RaceDay',`FirstHorse`='$FistHorse',`FirstLength`='$FirstLength',
                                            `FirstLengthCN`='$FirstLengthcn',`SecondHorse`='$SecondHorse',`SecondLength`='$SecondLength',
                                            `SecondLengthCN`='$SecondLengthcn',`ThirdHorse`='$ThirdHorse',
                                            `Thirdlength`='$Thirdlength',`ThirdlengthCN`='$Thirdlengthcn',`FourthHorse`='$FourthHorse',
                                            `FourthLength`='$FourthLength',`FourthLengthCN`='$FourthLengthcn',
                                            `FirstWin`='$FirstWin',`FirstPlace`='$FirstPlace',`SecondPlace`='$SecondPlace',
                                            `ThirdPlace`='$ThirdPlace',`FourthPlace`='$FourthPlace',`Forecast1`='$Forecaset1',
                                            `QPS11`='$showqps1',`QPS21`='$showqps2',`QPS31`='$showqps3',`Tierce1`='$showtierce1',
                                            `Trio1`='$showtrio1',`Quartet1`='$showquartet',`Quadro1`='$showquadro'
                                         WHERE `RaceCardId`='$RaceCardId' AND `RaceBoard` = 'MAL'";
            $this->db->query($sql); 
            $sql_sin = "UPDATE `raceresult` SET `RaceDay`='$RaceDay',`FirstHorse`='$FistHorse',`FirstLength`='$FirstLength',`FirstLengthCN`='$FirstLengthcn',
                                                `SecondHorse`='$SecondHorse',`SecondLength`='$SecondLength',`SecondLengthCN`='$SecondLengthcn',
                                                `ThirdHorse`='$ThirdHorse',`Thirdlength`='$Thirdlength',`ThirdlengthCN`='$Thirdlengthcn',`FourthHorse`='$FourthHorse',
                                                `FourthLength`='$FourthLength',`FourthLengthCN`='$FourthLengthcn',
                                                `FirstWin`='$FirstWin',`FirstPlace`='$FirstPlace_Sin',`SecondPlace`='$SecondPlace_Sin',
                                                `ThirdPlace`='$ThirdPlace_Sin',`FourthPlace`='$FourthPlace_Sin',`Forecast1`='$Forecaset1',
                                                `QPS11`='$showqps1',`QPS21`='$showqps2',`QPS31`='$showqps3',`Tierce1`='$showtierce1',
                                                `Trio1`='$showtrio1',`Quartet1`='$showquartet',`Quadro1`='$showquadro'
                                            WHERE `RaceCardId`='$RaceCardId' AND `RaceBoard` = 'SIN' ";
            $this->db->query($sql_sin);
            $req = 1;
       }

       if($req == 1)
        {

        }

       $arr = array("RaceCardId" => $RaceCardId);
       return $arr;
       
}

  public function getlistraceresultday()
  {
        $RaceDate = $_POST['getdate'];
        $country  = $_POST['country'];
        $sql      = "SELECT DISTINCT `RaceCardId` FROM `raceresult` WHERE `RaceCountry`='$country' AND `RaceDay` = '$RaceDate'";
        $arr_Race = $this->db->query($sql)->result();
        $arr      = array("RaceDate" => $arr_Race);
        return $arr;
  }
   
   public function SaveRaceResultDetail(){
       //$RaceCountry = $_POST['Country'];
       $RaceCardId  = $_POST['RaceCardID'];
       $RaceCountry = substr($RaceCardId , 0,2);
       $FistHorse   = $_POST['WinNo1'];
       $FirstWin    = $_POST['WinMal'];
       if($FirstWin != ""){
          $FirstWin = str_replace("RM ", "", $FirstWin);
          $FirstWin = (int)$FirstWin;
       }
       $FirstWin_sn = $_POST['WinSin'];
       if($FirstWin_sn != ""){
          $FirstWin_sn = str_replace("$ ", "", $FirstWin_sn);
          $FirstWin_sn = (int)$FirstWin_sn;
       }
       $FirstPlace  = $_POST['PlaceMal'];
       if($FirstPlace != ""){
          $FirstPlace = str_replace("RM ", "", $FirstPlace);
          $FirstPlace = (int)$FirstPlace;
       }
       $FirstPlace_sn = $_POST['PlaceSin'];
       if($FirstPlace_sn != ""){
          $FirstPlace_sn = str_replace("$ ", "", $FirstPlace_sn);
          $FirstPlace_sn = (int)$FirstPlace_sn;
       }
       $SecondPlace = $_POST['PlaceMal2'];
       if($SecondPlace != ""){
          $SecondPlace = str_replace("RM ", "", $SecondPlace);
          $SecondPlace = (int)$SecondPlace;
       }
       $SecondPlace_sn = $_POST['PlaceSin2'];
       if($SecondPlace_sn != ""){
          $SecondPlace_sn = str_replace("$ ", "", $SecondPlace_sn);
          $SecondPlace_sn = (int)$SecondPlace_sn;
       }
       $ThirdPlace  = $_POST['PlaceMal3'];
       if($ThirdPlace != ""){
          $ThirdPlace = str_replace("RM ", "", $ThirdPlace);
          $ThirdPlace = (int)$ThirdPlace;
       }
       $ThirdPlace_sn = $_POST['PlaceSin3'];
       if($ThirdPlace_sn != ""){
          $ThirdPlace_sn = str_replace("$ ", "", $ThirdPlace_sn);
          $ThirdPlace_sn = (int)$ThirdPlace_sn;
       }
       $FourthPlace = $_POST['PlaceMal4'];
       if($FourthPlace != ""){
          $FourthPlace = str_replace("RM ", "", $FourthPlace);
          $FourthPlace = (int)$FourthPlace;
       }
       $FourthPlace_sn = $_POST['PlaceSin4'];
       if($FourthPlace_sn != ""){
          $FourthPlace_sn = str_replace("$ ", "", $FourthPlace_sn);
          $FourthPlace_sn = (int)$FourthPlace_sn;
       }
       $Timing    =  $_POST['Timing'];
       $Forecast1 = $_POST['ForeCase'];
       $Forecast2 = $_POST['ForeCase1'];
       $Forecast2_sn = $_POST['ForeCase2'];
       $QPS11     =  $_POST['QPS'];
       $QPS12     =  $_POST['QPS1'];
       $QPS12_sn  = $_POST['QPS2'];
       $QPS21     = $_POST['QPS3'];
       $QPS22     = $_POST['QPS4'];
       $QPS22_sn  = $_POST['QPS5'];
       $QPS31     = $_POST['QPS6'];
       $QPS32     = $_POST['QPS7'];
       $QPS32_sn  = $_POST['QPS8'];
       $Tierce1   = $_POST['Tiere'];
       $Tierce2   = $_POST['Tiere1'];
       $Tierce2_sn = $_POST['Tiere2'];
       $Trio1 = $_POST['Trio'];
       $Trio2 = $_POST['Trio1'];
       $Trio2_sn = $_POST['Trio2'];
       $Quartet1 = $_POST['Quartet'];
       $Quartet2 = $_POST['Quartet1'];
       $Quartet2_sn = $_POST['Quartet2'];
       $Quadro1 =  $_POST['Quadro'];
       $Quadro2 =  $_POST['Quadro1'];
       $Quadro2_sn =  $_POST['Quadro2'];
       $SecondHorse = $_POST['WinNo2'];
       $ThirdHorse  = $_POST['WinNo3'];
       $FourthHorse = $_POST['WinNo4'];
       $FirstLength = $_POST['WinBy1'];
       $SecondLength = $_POST['WinBy2'];
       $Thirdlength = $_POST['WinBy3'];
       $FourthLength = $_POST['WinBy4'];   
       
       //$RaceDay     = (string)date("Y").date("m").date("d");
       $RaceDay       = substr($RaceCardId,2,6);
       $RaceDay       = "20".$RaceDay;
       //$RaceCard    = (string)$Race.date("Y").date("m").date("d");
       $sql_sel = "SELECT * FROM `raceresult` WHERE `RaceCardId`='$RaceCardId'";
       $arr_sql = $this->db->query($sql_sel)->result();
       $req = "";
       $req_sin = "";
       $kq = "";
       if(count($arr_sql) == 0)
       {
           $sql = "INSERT INTO `raceresult`(`RaceCountry`,`RaceBoard`,`RaceCardId`,`FirstHorse`,
                                          `FirstLength`,`SecondHorse`,`SecondLength`,`ThirdHorse`,
                                          `Thirdlength`,`FourthHorse`,`FourthLength`,`FirstWin`,
                                          `FirstPlace`,`SecondWin`,`SecondPlace`,`ThirdWin`,
                                          `ThirdPlace`,`FourthWin`,`FourthPlace`,`Timing`,
                                          `Forecast1`,`Forecast2`,`QPS11`,`QPS12`,`QPS21`,
                                          `QPS22`,`QPS31`,`QPS32`,`Tierce1`,`Tierce2`,`Trio1`,
                                          `Trio2`,`Quartet1`,`Quartet2`,`Quadro1`,`Quadro2`,`RaceDay`
                                          )
                                    VALUES('$RaceCountry','MAL','$RaceCardId','$FistHorse',
                                          '$FirstLength','$SecondHorse','$SecondLength','$ThirdHorse',
                                          '$Thirdlength','$FourthHorse','$FourthLength','$FirstWin',
                                          '$FirstPlace','','$SecondPlace','','$ThirdPlace','',
                                          '$FourthPlace','$Timing','$Forecast1','$Forecast2',
                                          '$QPS11','$QPS12','$QPS21','$QPS22','$QPS31','$QPS32',
                                          '$Tierce1','$Tierce2','$Trio1','$Trio2','$Quartet1',
                                          '$Quartet2','$Quadro1','$Quadro2','$RaceDay'
                                          )";
           $req = $this->db->query($sql);
           $sql_sin = "INSERT INTO `raceresult`(`RaceCountry`,`RaceBoard`,`RaceCardId`,`FirstHorse`,
                                                `FirstLength`,`SecondHorse`,`SecondLength`,`ThirdHorse`,
                                                `Thirdlength`,`FourthHorse`,`FourthLength`,`FirstWin`,
                                                `FirstPlace`,`SecondWin`,`SecondPlace`,`ThirdWin`,
                                                `ThirdPlace`,`FourthWin`,`FourthPlace`,`Timing`,
                                                `Forecast1`,`Forecast2`,`QPS11`,`QPS12`,`QPS21`,
                                                `QPS22`,`QPS31`,`QPS32`,`Tierce1`,`Tierce2`,
                                                `Trio1`,`Trio2`,`Quartet1`,`Quartet2`,`Quadro1`,`Quadro2`,`RaceDay`
                                                )
                                        VALUES('$RaceCountry','SIN','$RaceCardId','$FistHorse','$FirstLength',
                                                '$SecondHorse','$SecondLength','$ThirdHorse','$Thirdlength',
                                                '$FourthHorse','$FourthLength','$FirstWin_sn','$FirstPlace_sn','',
                                                '$SecondPlace_sn','','$ThirdPlace_sn','','$FourthPlace_sn',
                                                '$Timing','$Forecast1','$Forecast2_sn','$QPS11','$QPS12_sn',
                                                '$QPS21','$QPS22_sn','$QPS31','$QPS32_sn','$Tierce1',
                                                '$Tierce2_sn','$Trio1','$Trio2_sn','$Quartet1','$Quartet2_sn',
                                                '$Quadro1','$Quadro2_sn','$RaceDay')";
           $req_sin = $this->db->query($sql_sin);

       }
       else{
            $sql = "UPDATE `raceresult` SET `RaceDay`='$RaceDay',`FirstHorse`='$FistHorse',`FirstLength`='$FirstLength',
                                            `SecondHorse`='$SecondHorse',`SecondLength`='$SecondLength',`ThirdHorse`='$ThirdHorse',
                                            `Thirdlength`='$Thirdlength',`FourthHorse`='$FourthHorse',`FourthLength`='$FourthLength',
                                            `FirstWin`='$FirstWin',`FirstPlace`='$FirstPlace',`SecondPlace`='$SecondPlace',
                                            `ThirdPlace`='$ThirdPlace',`FourthPlace`='$FourthPlace',`Timing`='$Timing',
                                            `Forecast1`='$Forecast1',`Forecast2`='$Forecast2',`QPS11`='$QPS11',`QPS12`='$QPS12',
                                            `QPS21`='$QPS21',`QPS22`='$QPS22',`QPS31`='$QPS31',`QPS32`='$QPS32',`Tierce1`='$Tierce1',
                                            `Tierce2`='$Tierce2',`Trio1`='$Trio1',`Trio2`='$Trio2',`Quartet1`='$Quartet1',
                                            `Quartet2`='$Quartet2',`Quadro1`='$Quadro1',`Quadro2`='$Quadro2' 
                                          WHERE `RaceCardId`='$RaceCardId' AND `RaceBoard` = 'MAL'";
            $req  = $this->db->query($sql); 
            $sql_sin = "UPDATE `raceresult` SET `RaceDay`='$RaceDay',`FirstHorse`='$FistHorse',`FirstLength`='$FirstLength',
                                                `SecondHorse`='$SecondHorse',`SecondLength`='$SecondLength',`ThirdHorse`='$ThirdHorse',
                                                `Thirdlength`='$Thirdlength',`FourthHorse`='$FourthHorse',`FourthLength`='$FourthLength',
                                                `FirstWin`='$FirstWin_sn',`FirstPlace`='$FirstPlace_sn',`SecondPlace`='$SecondPlace_sn',
                                                `ThirdPlace`='$ThirdPlace_sn',`FourthPlace`='$FourthPlace_sn',`Timing`='$Timing',
                                                `Forecast1`='$Forecast1',`Forecast2`='$Forecast2_sn',`QPS11`='$QPS11',`QPS12`='$QPS12_sn',
                                                `QPS21`='$QPS21',`QPS22`='$QPS22_sn',`QPS31`='$QPS31',`QPS32`='$QPS32_sn',
                                                `Tierce1`='$Tierce1',`Tierce2`='$Tierce2_sn',`Trio1`='$Trio1',`Trio2`='$Trio2_sn',
                                                `Quartet1`='$Quartet1',`Quartet2`='$Quartet2_sn',`Quadro1`='$Quadro1',
                                                `Quadro2`='$Quadro2_sn' 
                                            WHERE `RaceCardId`='$RaceCardId' AND `RaceBoard` = 'SIN' ";
            $req_sin = $this->db->query($sql_sin);
       }
       if($req == true && $req_sin == true)
       {
          $kq = 1;
          $RaceID = $RaceCardId;
          //$arr_RaceResult = $this->showRaceResultDetail($RaceCountry,$RaceDay);
       }

       $arr = array('result' =>$kq,'RaceCardId' => $RaceID);
       return $arr;
   } 
  
  function showRaceResultDetail($RaceCountry,$RaceDay)
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

        $country    = $RaceCountry;
        $day        = $RaceDay;
        $arr_raceResult = array();
        $str_firstlenght    = "";
        $str_sencondlenght  = "";
        $str_thirdlenght    = "";
        $str_fourthlenght   = "";
        $i = 0;
        if($country!="" && $day!="")
        {
            $dd_mm_yyyy         = substr($day,-2)."/".substr($day,4,2)."/".substr($day,0,4);
            $yyyy_mm_dd         = substr($day,0,4)."-".substr($day,4,2)."-".substr($day,-2);
            $dayofweek          = date('D', strtotime( $yyyy_mm_dd));
            $dw = $arr_week[$dayofweek];
            $distinctraceid     = $this->get_distict_racecardid_by_country_day($country,$day);
            foreach ($distinctraceid as $row_raceid)
            {
                $raceboard_MY = $this->get_race_by_raceid_vs_raceboard($row_raceid->RaceCardId,"MAL");
                $raceboard_SG = $this->get_race_by_raceid_vs_raceboard($row_raceid->RaceCardId,"SIN");
                 if($this->lang->line(LANG_EN) == "English")
                 { 
                    $str_firstlenght    = $raceboard_MY->FirstLength;
                    $str_sencondlenght  = $raceboard_MY->SecondLength;
                    $str_thirdlenght    = $raceboard_MY->Thirdlength;
                    $str_fourthlenght   = $raceboard_MY->FourthLength;
                 }
                 else
                 {
                    $str_firstlenght    = $raceboard_MY->FirstLengthCN;
                    $str_sencondlenght  = $raceboard_MY->SecondLengthCN;
                    $str_thirdlenght    = $raceboard_MY->ThirdlengthCN;
                    $str_fourthlenght   = $raceboard_MY->FourthLengthCN;    
                 }
                
               $arr_raceResult[$i]["header"]        = $this->lang->line(LANG_RACE_RACE) .' '.(int)substr($row_raceid->RaceCardId,-2);
               $arr_raceResult[$i]["txtday"]        = $dw.'  '.$dd_mm_yyyy;
               $arr_raceResult[$i]["ResultNo"]      = $this->lang->line(LANG_RESULT_NO);
               $arr_raceResult[$i]["ResultLength"]  = $this->lang->line(LANG_RESULT_LENGTH);
               $arr_raceResult[$i]["ResultWin"]     = $this->lang->line(LANG_RESULT_WIN);
               $arr_raceResult[$i]["ResultPlace"]   = $this->lang->line(LANG_RESULT_PLACE);
               $arr_raceResult[$i]["Result_MY_FirstHorse"] = $raceboard_MY->FirstHorse;
               $arr_raceResult[$i]["Result_str_firstlenght"] = $str_firstlenght;
               $arr_raceResult[$i]["Result_MY_FistWin"]     = intval($raceboard_MY->FirstWin);  
               $arr_raceResult[$i]["Result_MY_FistPlace"]   = intval($raceboard_MY->FirstPlace);                   
               $arr_raceResult[$i]["Result_SG_FistWin"]     =  intval($raceboard_SG->FirstWin);
               $arr_raceResult[$i]["Result_SG_FistPlace"]   = intval($raceboard_SG->FirstPlace);
               $arr_raceResult[$i]["Result_MY_SecondHorse"] = $raceboard_MY->SecondHorse; 
               $arr_raceResult[$i]["Result_Sendcondlenght"] =  $str_sencondlenght;
               $arr_raceResult[$i]["Result_MY_SecondPlace"] =  intval($raceboard_MY->SecondPlace);
               $arr_raceResult[$i]["Result_SG_SecondPlace"] =  intval($raceboard_SG->SecondPlace);
               $arr_raceResult[$i]["Result_MY_ThirdHorse"] =  $raceboard_MY->ThirdHorse;
               $arr_raceResult[$i]["Result_MY_ThirdLenght"] =  $str_thirdlenght;
               $arr_raceResult[$i]["Result_MY_ThirdPlace"] =  intval($raceboard_MY->ThirdPlace);
               $arr_raceResult[$i]["Result_SG_ThirdPlace"] = intval($raceboard_SG->ThirdPlace);
               $arr_raceResult[$i]["Result_MY_FourthHorse"]=  $raceboard_MY->FourthHorse;
               $arr_raceResult[$i]["Result_Fourthlenght"] =  $str_fourthlenght;
               $arr_raceResult[$i]["Result_MY_FourthPlace"] = intval($raceboard_MY->FourthPlace);
               $arr_raceResult[$i]["Result_SG_FourthPlace"] = intval($raceboard_SG->FourthPlace);
               $arr_raceResult[$i]["Result_ResultTiming"]   = $this->lang->line(LANG_RESULT_TIMING);
               $arr_raceResult[$i]["Result_timing"]         = $raceboard_MY->Timing;
               $arr_raceResult[$i]["Result_QN_FORE"]        = $this->lang->line(LANG_RESULT_QN_FORECASR);
               $arr_raceResult[$i]["Result_MY_Forecast1"]   = $raceboard_MY->Forecast1;
               $arr_raceResult[$i]["Result_MY_Forecast2"]   = $raceboard_MY->Forecast2;
               $arr_raceResult[$i]["Result_SG_Forecast2"]   = $raceboard_SG->Forecast2;
               $arr_raceResult[$i]["Result_QP_PLACE"]       = $this->lang->line(LANG_RESULT_QP_PLACE);
               $arr_raceResult[$i]["Result_MY_QPS11"]       = $raceboard_MY->QPS11;
                $arr_raceResult[$i]["Result_MY_QPS12"]      = $raceboard_MY->QPS12;
               $arr_raceResult[$i]["Result_SG_QPS12"]       = $raceboard_SG->QPS12;
               $arr_raceResult[$i]["Result_MY_QPS21"]       = $raceboard_MY->QPS21;
                $arr_raceResult[$i]["Result_MY_QPS22"]      = $raceboard_MY->QPS22;
                $arr_raceResult[$i]["Result_SG_QPS22"]      = $raceboard_SG->QPS22;
                $arr_raceResult[$i]["Result_MY_QPS31"]      = $raceboard_MY->QPS31;
                $arr_raceResult[$i]["Result_MY_QPS32"]      = $raceboard_MY->QPS32;
                $arr_raceResult[$i]["Result_SG_QPS32"]      = $raceboard_SG->QPS32;
                $arr_raceResult[$i]["Result_TF_TIERCE"]     = $this->lang->line(LANG_RESULT_TF_TIERCE);
                $arr_raceResult[$i]["Result_MY_Tierce1"]    = $raceboard_MY->Tierce1;
                $arr_raceResult[$i]["Result_MY_Tierce2"]    = $raceboard_MY->Tierce2;
                $arr_raceResult[$i]["Result_SG_Tierce2"]    = $raceboard_SG->Tierce2;
                $arr_raceResult[$i]["Result_TR_TRIO"]       = $this->lang->line(LANG_RESULT_TR_TRIO);
                $arr_raceResult[$i]["Result_MY_Trio1"]      = $raceboard_MY->Trio1;
                $arr_raceResult[$i]["Result_MY_Trio2"]      = $raceboard_MY->Trio2;
                $arr_raceResult[$i]["Result_SG_Trio2"]      = $raceboard_SG->Trio2;
                $arr_raceResult[$i]["Result_QT_QUARTET"]    = $this->lang->line(LANG_RESULT_QT_QUARTET);
                $arr_raceResult[$i]["Result_MY_Quartet1"]   = $raceboard_MY->Quartet1;
                $arr_raceResult[$i]["Result_MY_Quartet2"]   = $raceboard_MY->Quartet2;
                $arr_raceResult[$i]["Result_SG_Quartet2"]   = $raceboard_SG->Quartet2;
                $arr_raceResult[$i]["Result_QUADRO"]        = $this->lang->line(LANG_RESULT_QUADRO);
                $arr_raceResult[$i]["Result_MY_Quadro1"]    = $raceboard_MY->Quadro1;
                $arr_raceResult[$i]["Result_MY_Quadro2"]    = $raceboard_MY->Quadro2;
                $arr_raceResult[$i]["Result_SG_Quadro2"]  = $raceboard_SG->Quadro2;
                            
            }
        }
        
        return $arr_raceResult;  
  } 

 public function get_distict_racecardid_by_country_day($country, $day)
 {
    $sql="SELECT DISTINCT RaceCardId FROM `raceresult` WHERE `RaceCountry` = '$country' AND `RaceDay` = '$day'";
    $query=$this->db->query($sql)->result();
    return $query;
 }

 public function get_race_by_raceid_vs_raceboard($raceid,$RaceBoard)
{
    $sql="SELECT * FROM `raceresult` WHERE `RaceCardId` = '$raceid' AND `RaceBoard` = '$RaceBoard'";
    $query=$this->db->query($sql)->row();
    return $query;
}
   // về nhà xem 04/02/2015 
  public function LoadListRaceResult(){
      $RaceCardID = $_POST['RaceCardID'];
      if($RaceCardID != ""){
          $sql = "SELECT * FROM `raceresult` WHERE `RaceCardId`='$RaceCardID'";
          $arr_sql = $this->db->query($sql)->result();
          $arr = array('RaceResult' => $arr_sql);
          return $arr;
      }
  }
  // end xem 04/02/2015

  public function loadRaceResul_Date()
  {
        $country  = $_POST['Country'];
        $sql      = "SELECT DISTINCT `RaceDay` FROM `raceresult` WHERE  `RaceCountry` = '$country'";
        $arr_RaceResult = $this->db->query($sql)->result();
        $arr      = array("RaceDate_U" => $arr_RaceResult);
        return $arr;
  }

  public function LoadRaceResultDate(){
      $RaceDate = $_POST['getdate'];
      $country  = $_POST['country'];
      $sql      = "SELECT * FROM `raceresult` WHERE `RaceCountry`='$country' AND `RaceDay`='$RaceDate'";
      $arr_Race = $this->db->query($sql)->result();
      $arr      = array("RaceResult" => $arr_Race,"ChooseDate"=>$RaceDate);
      return $arr;
  }
    
   
}