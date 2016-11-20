<?php
class M_race_card extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
   
   public function updateStatusRaceCard()
   {
      $raceID = $_POST['RaceID'];
      $sql = "SELECT * FROM `racerard` WHERE `RaceID`='$raceID'";
      $arr_sql = $this->db->query($sql)->result();
      $kq = "";
      if(count($arr_sql) != 0)
      {
         $sql_update = "UPDATE `racerard` SET `status`='CLOSE' WHERE `RaceID`='$raceID'";
         $req = $this->db->query($sql_update);
         if($req)
           $kq = 1;
      }

      $arr = array('rkq' => $kq);
      return $arr;
   }

   public function SaveRaceCard()
   {
       $Country     = $_POST['Country'];
       $Date        = strtotime($_POST['Date']);
       $itemsen     = $_POST['Title'];
       $items1cn    = $_POST['Chinese'];
       $status      = $_POST['Status'];
       $RaceOfNo    = $_POST['RaceNo'];
       $RaceCard    = (string)$Country.date("Y").date("m").date("d");
       $RaceNo      = "";
       $RaceDay     = (string)date("Y",$Date).date("m",$Date).date("d",$Date);
       $RaceID_D    = (string)$Country.substr(date("Y",$Date),-2).date("m",$Date).date("d",$Date);
       $sql_sel     = "SELECT * FROM `racerard` WHERE `RaceCountry`='$Country' AND `RaceDay`='$RaceDay'";
       $list_race   = $this->db->query($sql_sel)->result();
       $rel = "";
       if(count($list_race) == 0)
       {
         for($i = 1;$i <= $RaceOfNo;$i++ )
          {
              if($i < 10){
                $RaceNo = "0".$i;
              }
              else{
                 $RaceNo = $i;
              }
              $RaceID = $RaceID_D.$RaceNo;
              $sql = "INSERT INTO `racerard`(`RaceCard`,`RaceCountry`,`RaceDay`,`itemsen`,`itemscn`,`RaceNo`,`status`,`RaceID`)
                      VALUES('$RaceCard','$Country','$RaceDay','$itemsen','$items1cn','$RaceNo','$status','$RaceID')";
              $req = $this->db->query($sql);
              if($req)
               $rel = 1; 
          }
       }
       else
       {
           $sql_del ="DELETE FROM `racerard` WHERE `RaceCountry`='$Country' AND `RaceDay`='$RaceDay' ";
           $req_del = $this->db->query($sql_del);
           if($req_del)
           {
              for($i = 1;$i <= $RaceOfNo;$i++ )
              {
                if($i < 10){
                  $RaceNo = "0".$i;
                }
                else{
                   $RaceNo = $i;
                }
                $RaceID = $RaceID_D.$RaceNo;
                $sql = "INSERT INTO `racerard`(`RaceCard`,`RaceCountry`,`RaceDay`,`itemsen`,`itemscn`,`RaceNo`,`status`,`RaceID`)
                          VALUES('$RaceCard','$Country','$RaceDay','$itemsen','$items1cn','$RaceNo','$status','$RaceID')";
                $req = $this->db->query($sql);
                if($req)
                 $rel = 1; 
              }
           }  
        }

        if($rel == 1)
        {
            $res_racecard = $this->get_racecard();
            if(count($res_racecard)>0)
            {
                $arr_country = array(
                                        "MY"=>$this->lang->line(LANG_COUNTRY_MY),
                                        "HK"=>$this->lang->line(LANG_COUNTRY_HK),
                                        "MC"=>$this->lang->line(LANG_COUNTRY_MC),
                                        "SG"=>$this->lang->line(LANG_COUNTRY_SG),
                                        "SA"=>$this->lang->line(LANG_COUNTRY_SA),
                                        "AU"=>$this->lang->line(LANG_COUNTRY_AU),
                                        "EU"=>$this->lang->line(LANG_COUNTRY_EU),
                                    );
                $arr_flag = array(
                                    "MY"=>"FlagMalay.png",
                                    "HK"=>"FlagHK.png",
                                    "MC"=>"FlagMaCau.png",
                                    "SG"=>"FlagSing.png",
                                    "SA"=>"FlagSA.png",
                                    "AU"=>"FlagAustralia.png",
                                    "EU"=>"FlagEurope.png",
                                );
                $l_RaceCard = array();
                $i = 0;
                foreach($res_racecard as $row)
                {
                  $day_race    = substr($row->RaceDay,-2)."/".substr($row->RaceDay,4,2)."/".substr($row->RaceDay,0,4);
                  $flag        = $arr_flag[$row->RaceCountry];
                  $country     = $arr_country[$row->RaceCountry];
                  $RaceCountry = $row->RaceCountry;
                  $RaceDay     = $row->RaceDay;
                  $l_RaceCard[$i]['day_race'] = $day_race;
                  $l_RaceCard[$i]['flag']     = $flag;
                  $l_RaceCard[$i]['country']  = $country;
                  $l_RaceCard[$i]['racecountry'] = $RaceCountry;
                  $l_RaceCard[$i]['raceday']  = $RaceDay;
                  $i++;
                }
            }
        }
      
      $arr = array('req'=>$rel,'country'=>$Country,'racedate'=>$RaceDay,'l_race'=>$l_RaceCard);
      return $arr;
}

  public function get_racecard()
  {
        $sql="SELECT DISTINCT `RaceCountry`,`RaceDay` 
             FROM `racerard` 
             WHERE `status` = 'OPEN' 
             ORDER BY `RaceDay` DESC";
        $query=$this->db->query($sql)->result();
        return $query;
  }

  public function get_total_racecard_by_country_day($country, $day)
  {
        $sql    =   "SELECT COUNT(*) AS total 
                    FROM `racerard` 
                    WHERE `RaceCountry` = '$country' 
                    AND `RaceDay` = '$day' 
                    AND `status` = 'OPEN'";
        $query=$this->db->query($sql)->row();
        return $query;
  }

  public function UpdateRaceCardDeatil()
  {
    $RaceCardID = $_POST['RaceCardID'];
    $RaceNo     = $_POST['RaceNo'];
    $Title      = $_POST['Title'];
    $Chinese    = $_POST['Chinese'];
    $ChineseMy  = $_POST['ChineseMy'];
    $rel = "";
    //$RaceDate   = $_POST['RaceDate'];
    $Details    = $_POST['Details'];
    $Meter =    $_POST['Meter'];
    $country = "";
    $sql_sel    = "SELECT * FROM `racerard` WHERE `RaceID`='$RaceCardID' AND `RaceNo`='$RaceNo' ";
    $list_race   = $this->db->query($sql_sel)->result();
    if(count($list_race) != 0)
    {
        $sql = "UPDATE `racerard` SET `itemsen`='$Title',`itemscn`='$Chinese',`itemsmy`='$ChineseMy',`Details`='$Details',`Meter`= $Meter WHERE `RaceID`='$RaceCardID' AND `RaceNo`='$RaceNo' ";
        $req = $this->db->query($sql);
        if($req)
        {
          $rel = 1;
          $country = $list_race[0]->RaceCountry;
        }  
    }

    if($rel == 1)
    {
           $l_horseinfo = array();
            $l_header    = array();
            $detail      = "";
            $res_horse = $this->get_horseinfo_by_raceid($RaceCardID);
            $sql_inforace = "SELECT * FROM `racerard` WHERE `RaceID` = '$RaceCardID'";
            $res_inforace = $this->db->query($sql_inforace)->result();
            if(count($res_inforace) > 0)
            {
               if($this->lang->line(LANG_EN) == "English")
                   $detail = $res_inforace[0]->Details;
                else
                   $detail = $res_inforace[0]->itemsmy;          
            }
            $i=0;
            if(count($res_horse)>0)
            {
                  $l_header["horNo"]  =  $this->lang->line(LANG_RACECARD_HNO);
                  $l_header["horcl"]  =  $this->lang->line(LANG_RACECARD_CL);
                  $l_header["horlfr"] =  $this->lang->line(LANG_RACECARD_LFR);
                  $l_header["horHna"] =  $this->lang->line(LANG_RACECARD_HNA);
                  $l_header["horjk"]  =  $this->lang->line(LANG_RACECARD_JK);
                  $l_header["horbr"]  =  $this->lang->line(LANG_RACECARD_BR);
                  $l_header["horrtg"] =  $this->lang->line(LANG_RACECARD_RTG);
                  $l_header["horwt"]  =  $this->lang->line(LANG_RACECARD_WT);
                  $l_header["horhcp"]  =  $this->lang->line(LANG_RACECARD_HCP);
                  $l_header["hortrain"] = $this->lang->line(LANG_RACECARD_TRAIN);
                foreach($res_horse as $row)
                {  
                      if($this->lang->line(LANG_EN) == "English")
                      { // tiếng ANh
                            $horseNo  = $row['HorseNoS'];
                            $l_horseinfo[$i]["color"] = $row['Color'];
                            $past     = $row['Past'];
                            $horseName = $row['HorseName'];
                            $jocket   = $row['Jocket'];
                            $br       = $row['Br'];
                            $rtg      = $row['Rtg'];
                            $wt       = $row['Wt'];
                            $hcp      = $row['Hcp'];
                            $traniner = $row['Trainer']; 
                      }
                      else
                      { // Tiếng tàu
                            $horseNo  = $row['HorseNoS'];
                            $l_horseinfo[$i]["color"] = $row['Color'];
                            $past     = $row['Past'];
                            $horseName = $row['itemcn'];
                            $jocket   = $row['itemmy'];
                            $br       = $row['Br'];
                            $rtg      = $row['Rtg'];
                            $wt       = $row['Wt'];
                            $hcp      =  $row['Hcp'];
                            $traniner = $row['itemhk'];
                      }

                       $l_horseinfo[$i]["horseNo"]   =  $horseNo;
                       $l_horseinfo[$i]["past"]      = $past;
                       $l_horseinfo[$i]["horseName"] = $horseName;
                       $l_horseinfo[$i]["jocket"]    = $jocket;
                       $l_horseinfo[$i]["br"]        = $br;
                       $l_horseinfo[$i]["rtg"]       = $rtg;
                       $l_horseinfo[$i]["wt"]        = $wt;
                       $l_horseinfo[$i]["hcp"]       = $hcp;
                       $l_horseinfo[$i]["traniner"]  = $traniner;
                       $i++;
                }
            } 
    }

     $arr = array('rel' =>$rel,'country'=>$country,
                  'RaceID'=>$RaceCardID,'l_horeinfo'=>$l_horseinfo,
                  'detail' => $detail,'l_header' =>$l_header);
     return $arr;
  }

  public function get_horseinfo_by_raceid($raceid)
   {
        $sql="SELECT * FROM `horseinfo` WHERE `RaceCardID` = '$raceid'";
        $query=$this->db->query($sql)->result_array();
        return $query;
   }

  public function UpdateHorseNoOfRaceCard()
  {
    $RaceCardID = $_POST['RaceCardID'];
    $RaceNo     = $_POST['RaceNo'];
    $HorseNo    = $_POST['HorseNo'];
    $sql_sel    = "SELECT * FROM `racerard` WHERE `RaceID`='$RaceCardID' AND `RaceNo`='$RaceNo' ";
    $list_race   = $this->db->query($sql_sel)->result();
    if(count($list_race) != 0){
        $sql = "UPDATE `racerard` SET `HorseNo` = '$HorseNo'  WHERE `RaceID`='$RaceCardID' AND `RaceNo`='$RaceNo' ";
        $this->db->query($sql);
    }

  }

    public function loadlistRaceDate(){
        $RaceDate = $_POST['getdate'];
        $country  = $_POST['country'];
        $sql      = "SELECT `RaceID`,`RaceNo`,`RaceDay`,`rowid`,`itemsen`,`itemscn`,`status`,`Meter` FROM `racerard` WHERE `RaceDay` = '$RaceDate' AND `RaceCountry` = '$country' AND `status` = 'OPEN'";
        $arr_Race = $this->db->query($sql)->result();
        $arr      = array("RaceDate" => $arr_Race,"ChooseDate"=>$RaceDate);
        return $arr;
    }
    
    public function loadRace_Date(){
        $country  = $_POST['Country'];
        $sql     = "SELECT DISTINCT `RaceDay` FROM `racerard` WHERE  `RaceCountry` = '$country' AND `status` = 'OPEN'";
        $arr_Race = $this->db->query($sql)->result();
        $arr      = array("RaceDate_U" => $arr_Race);
        return $arr;
    }
    
    public function SelectRaceIdWinner()
    {
       $RaceID  = "";
       $count = "";
       if(isset($_POST['RaceCardID']))
         $RaceID = $_POST['RaceCardID'];
       $sql = "SELECT * FROM `racerard` WHERE `RaceID`='$RaceID'";
       $arr_Race = $this->db->query($sql)->result();
       if(count($arr_Race) != 0)
       {
           $HorsNo = $arr_Race[0]->HorseNo;
           if($HorsNo != "" || $HorsNo != null)
           {
               $sql_sel = "SELECT  * FROM `horseinfo` WHERE  `RaceCardID`='$RaceID'  AND `HorseNoS` != ''";
               $arr_HorseInfo = $this->db->query($sql_sel)->result();
               if(count($arr_HorseInfo) != 0)
               {
                      $HorseNoInfo = count($arr_HorseInfo);
                    if($HorseNoInfo <= $HorsNo)
                      $count = $HorseNoInfo;
                    else
                      $count = $HorsNo;
               }
           }
       }

       // get image jock color for page race board
       $sql_color = "SELECT * FROM `horseinfo` WHERE `RaceCardID` = '$RaceID'";
       $arr_color = $this->db->query($sql_color)->result();
       $kq = "";
       if(count($arr_color) != 0)
       {
          $kq = 1;
       }
       // end get image jock color for page race board
       $arr = array('stt'=>$count,'req' =>$kq,'jockcolor'=>$arr_color);
       return $arr;
    }

    public function getRaceCardDetail()
    {
        $raceID  = "";
        if(isset($_POST['RaceID']))
          $raceID  = $_POST['RaceID'];
          $str_race = substr($raceID,0,8);
        $sql     = "SELECT * FROM `racerard` WHERE `RaceID` = '$raceID'";
        $arr_Race = $this->db->query($sql)->result();
        $sql_c   = "SELECT `rowid`,`RaceNo` FROM `racerard` WHERE LEFT(`RaceID`,8)='$str_race'";
        $l_RaceNo = $this->db->query($sql_c)->result();
        $arr      = array("RaceID" => $arr_Race,'listRaceNo'=>$l_RaceNo);
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
    
    public function getSelectRace(){
        $racecontry = $_POST['raceCountry'];
        $sql_win_mal = "SELECT * FROM `livetote` WHERE `RaceBoard` = '$racecontry' AND `RaceCountry` = 'MAL' AND `Win` != '0.00' AND `Place` = '0.00' ";
        $arr_win_ma = $this->db->query($sql_win_mal)->result();
        $sql_place_mal = "SELECT * FROM `livetote` WHERE `RaceBoard` = '$racecontry' AND `RaceCountry` = 'MAL' AND `Win` = '0.00' AND `Place` != '0.00'";
        $arr_place_mal = $this->db->query($sql_place_mal)->result();
        $arr = array('list_win_mal' =>$arr_win_ma,'list_place_mal' => $arr_place_mal );
        return $arr;

    }

    public function UpdateCountryStatus()
    {
        $country  = $_POST['country'];
        $raceDate = $_POST['RaceDate'];
        $Title    = $_POST['Title'];
        $Chinese  = $_POST['Chinese'];
        $Status   = $_POST['Status'];
        $rel_status = "";
        $sql_sel = "SELECT * FROM `racerard` WHERE `RaceCountry`='$country' AND `RaceDay`='$raceDate'";
        $arrRaceCard = $this->db->query($sql_sel)->result();
        if(count($arrRaceCard) != 0)
        {
            $str_RaceID = $country.substr($raceDate,2);
            $sql = "UPDATE `racerard` SET `itemsen`='$Title',`itemscn`='$Chinese',`status`='$Status' 
                    WHERE `RaceCountry`='$country' AND `RaceDay`='$raceDate'";
            //print_r($sql);die();
            $req = $this->db->query($sql);
            if($req)
            {
              $rel_status = 1;
              $sql_delehoreinfo = "DELETE FROM `horseinfo` WHERE LEFT(`RaceCardID`,8)='$str_RaceID'";
              $this->db->query($sql_delehoreinfo);
              $sql_deleracecard = "DELETE FROM `raceresult` WHERE `RaceCountry`='$country' AND `RaceDay`='$raceDate'";
              //print_r($sql_deleracecard);
              $this->db->query($sql_deleracecard);
            }
            else
              $rel_status = 0;
        }

        if($rel_status == 1)
        {
            $res_racecard = $this->get_racecard();
            if(count($res_racecard)>0)
            {
                $arr_country = array(
                                        "MY"=>$this->lang->line(LANG_COUNTRY_MY),
                                        "HK"=>$this->lang->line(LANG_COUNTRY_HK),
                                        "MC"=>$this->lang->line(LANG_COUNTRY_MC),
                                        "SG"=>$this->lang->line(LANG_COUNTRY_SG),
                                        "SA"=>$this->lang->line(LANG_COUNTRY_SA),
                                        "AU"=>$this->lang->line(LANG_COUNTRY_AU),
                                        "EU"=>$this->lang->line(LANG_COUNTRY_EU),
                                    );
                $arr_flag = array(
                                    "MY"=>"FlagMalay.png",
                                    "HK"=>"FlagHK.png",
                                    "MC"=>"FlagMaCau.png",
                                    "SG"=>"FlagSing.png",
                                    "SA"=>"FlagSA.png",
                                    "AU"=>"FlagAustralia.png",
                                    "EU"=>"FlagEurope.png",
                                );
                $l_RaceCard = array();
                $i = 0;
                foreach($res_racecard as $row)
                {
                  $day_race    = substr($row->RaceDay,-2)."/".substr($row->RaceDay,4,2)."/".substr($row->RaceDay,0,4);
                  $flag        = $arr_flag[$row->RaceCountry];
                  $_country     = $arr_country[$row->RaceCountry];
                  $RaceCountry = $row->RaceCountry;
                  $RaceDay     = $row->RaceDay;
                  $l_RaceCard[$i]['day_race'] = $day_race;
                  $l_RaceCard[$i]['flag']     = $flag;
                  $l_RaceCard[$i]['country']  = $_country;
                  $l_RaceCard[$i]['racecountry'] = $RaceCountry;
                  $l_RaceCard[$i]['raceday']  = $RaceDay;
                  $i++;
                }
            }
        }

        $arr = array('req'=>$rel_status,'country'=>$country,'RaceDay'=>$raceDate,'l_race'=>$l_RaceCard);

        return $arr;

    }

  
    
      
}