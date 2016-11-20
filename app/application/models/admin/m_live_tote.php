<?php
class M_live_tote extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getSelectRaceSin(){
        $racecontry = $_POST['raceCountry'];
        $this->session->set_userdata("raceCountry",$racecontry);
        $flag = "";
        $sql_sin = "SELECT * FROM `livetote` WHERE `RaceBoard` = 'SIN' AND `RaceCountry` = '$racecontry' ";
        $arr_sin = $this->db->query($sql_sin)->result();
        $sql_mal = "SELECT * FROM `livetote` WHERE `RaceBoard` = 'MAL' AND `RaceCountry` = '$racecontry'";
        $arr_mal = $this->db->query($sql_mal)->result();
        $sql_show = "SELECT * FROM `country` WHERE `CountryCode`='$racecontry' ";
        $arr_flagshow = $this->db->query($sql_show)->result(); 
        if(count($arr_flagshow) != 0)
        {
            $flag = $arr_flagshow[0]->ShowHorseInfo;
        }   
        $arr = array('list_sin' =>$arr_sin,'list_mal' => $arr_mal,'flag'=>$flag,'country'=>$racecontry);
        return $arr;

    }

    public function loadToteMal()
    {
        $racecontry = $_POST['raceCountry'];
        $sql_mal = "SELECT * FROM `livetote` WHERE `RaceBoard` = 'MAL' AND `RaceCountry` = '$racecontry'";
        $arr_mal = $this->db->query($sql_mal)->result(); 
        $arr = array('list_mal' => $arr_mal);
        return $arr; 
    }
    
    public function tickflagcountry()
    {
        $country = $_POST['country'];
        $showinfo = $_POST['showinfo'];
        $sql = "SELECT * FROM `country` WHERE `CountryCode`='$country'";
        $ar_country = $this->db->query($sql)->result();
        $req = "";
        if(count($ar_country) !=0)
        {
           $sql_update = "UPDATE `country` SET `ShowHorseInfo`= b'$showinfo' WHERE `CountryCode`='$country'";
           $this->db->query($sql_update);
           $req = 1;
        }
        else
        {
           $sql_in  = "INSERT INTO `country`(`CountryCode`,`Name`,`ShowHorseInfo`,`Flag`)VALUES('$country','',b'$showinfo','')";
           $this->db->query($sql_in);
           $req = 1;
        }
        
        $list_flag = array();
        if($req = 1)
        {
          $list_flag = $this->load_flag_tick();
        }

        $arr = array("country"=>$country,"showinfo"=>$showinfo,'result'=>$req,'arr_flag'=>$list_flag);
        return $arr;
    }

    public function load_flag_tick()
    {
        $list_flag = array();
        $sql_flag = "SELECT `CountryCode` FROM `country` WHERE `ShowHorseInfo` = b'1'";
        $arr_flag = $this->db->query($sql_flag)->result();
        if(count($arr_flag) != 0)
        {
           foreach ($arr_flag as  $value) 
           {
               array_push($list_flag,$value->CountryCode);
           }
        }
        return $list_flag;
    }
    public function loadToteSin()
    {
        $racecontry = $_POST['raceCountry'];
        $sql_sin = "SELECT * FROM `livetote` WHERE `RaceBoard` = 'SIN' AND `RaceCountry` = '$racecontry'";
        $arr_sin = $this->db->query($sql_sin)->result(); 
        $arr = array('list_sin' => $arr_sin);
        return $arr; 
    }
    
    public function getSelectRace(){
        $racecontry = $_POST['raceCountry'];
        $sql_win_mal = "SELECT * FROM `livetote` WHERE `RaceBoard` = 'MAL' AND `RaceCountry` = '$racecontry' AND `Win` != '0.00' AND `Place` = '0.00' ";
        $arr_win_ma = $this->db->query($sql_win_mal)->result();
        $sql_place_mal = "SELECT * FROM `livetote` WHERE `RaceBoard` = 'MAL' AND `RaceCountry` = '$racecontry' AND `Win` = '0.00' AND `Place` != '0.00'";
        $arr_place_mal = $this->db->query($sql_place_mal)->result();
        
        $arr = array('list_win_mal' =>$arr_win_ma,'list_place_mal' => $arr_place_mal );
        return $arr;

    }

   
    public function addSinToteBoard()
    {
        $raceNoSIN  = $_POST['raceNoSIN'];
        $raceCountry = $_POST['raceCountry'];
        $listRaceNoSIN = json_decode($raceNoSIN,true);       
        $sql_sin= " SELECT * FROM `livetote` 
                    WHERE `RaceBoard` = 'SIN' 
                    AND `RaceCountry` = '$raceCountry'";
        $arr_sin = $this->db->query($sql_sin)->result();
        $raceno = "";
        $RaceNoPlace = "";
        $RaceDay     = (string)date("Y").date("m").date("d");
        $RaceCard    = (string)$raceCountry.date("Y").date("m").date("d");
        $RaceNo      = (string)substr(date("Y"),-2).date("m").date("d");
        $rel = "";
        if(count($arr_sin) == 0)
        {
            // Win and place
            for($i = 0; $i < 20; $i++)
            {
                if(isset($listRaceNoSIN[0][$i]))
                {
                    $raceno = (string)$listRaceNoSIN[0][$i];
                    if($raceno == "SCR" || $raceno == "scr")
                    {
                        $raceno = (string)-1;   
                    }  
                }
                 
                if(isset($listRaceNoSIN[1][$i]))
                {
                    $RaceNoPlace = (string)$listRaceNoSIN[1][$i];
                    if($RaceNoPlace == "SCR" || $RaceNoPlace == "scr")
                        $RaceNoPlace = -1; 
                }
                if($i < 9)
                {
                    $RaceNoSin = $RaceNo.'0'.($i+1);
                }
                else
                {
                    $RaceNoSin = $RaceNo.($i+1);
                }
                
                $sql = "INSERT INTO `livetote` (`RaceCard`,`RaceCountry`,`RaceDay`,`RaceBoard`,`RaceCountryOdds`,`RaceNo`,`Win`,`Place`,`txday`,`event`,`info`,`status`,`tstamp`)
                        VALUES ('$RaceCard','$raceCountry','$RaceDay','SIN','','$RaceNoSin','$raceno','$RaceNoPlace','$RaceDay','','','',NOW())";     
                $req = $this->db->query($sql);
            }
        }
        else
        { 
               $list_sin = array();
               foreach($arr_sin as $value)
               {
                   $rowid = $value->rowid;
                   array_push($list_sin,$rowid);
               }
               
               for($i = 0; $i < 20; $i++)
               {
                 if(isset($listRaceNoSIN[0][$i]))
                 {
                    $raceno = (string)$listRaceNoSIN[0][$i];
                    if($raceno == "SCR" || $raceno == "scr")
                    {
                        $raceno = (string)-1;   
                    }  
                 }

                 if(isset($listRaceNoSIN[1][$i]))
                 {
                    $RaceNoPlace = (string)$listRaceNoSIN[1][$i];
                    if($RaceNoPlace == "SCR" || $RaceNoPlace == "scr")
                        $RaceNoPlace = -1;
                 }
                 
                if($i < 9)
                {
                    $RaceNoSin = $RaceNo.'0'.($i+1);
                }
                else
                {
                    $RaceNoSin = $RaceNo.($i+1);
                }
                
              $sql = "UPDATE `livetote` 
                      SET `Win` = '$raceno',`Place` = '$RaceNoPlace',
                         `txday`='$RaceDay',`RaceDay`='$RaceDay',
                         `RaceNo`='$RaceNoSin',`RaceCard`='$RaceCard' 
                      WHERE `RaceBoard` = 'SIN' 
                      AND `RaceCountry` = '$raceCountry' 
                      AND `rowid` = '$list_sin[$i]'";         
               $req = $this->db->query($sql);
            } 
        }
        $arr_flag = array();
        if($req)
        {
            $sql_sin = "SELECT * FROM `livetote` WHERE `RaceBoard` = 'SIN' AND `RaceCountry` = '$raceCountry'";
            $arr_sin = $this->db->query($sql_sin)->result(); 
            $arr_flag = $this->load_flag_tick();
        }
        
        $arr = array('countrySin'=>$raceCountry,'l_sin'=>$arr_sin,'flag_tick'=>$arr_flag);
        return  $arr;    
    }
    
    public function addlivetoMal()
    {
        $raceCountry = $_POST['raceCountry'];
        $arrWin      = json_decode($_POST['arr_MalWin'], true);
        $arrPlace    = json_decode($_POST['arr_MalPlace'],true);
        $sql_mala= "SELECT * FROM `livetote` 
                    WHERE `RaceBoard` = 'MAL' 
                    AND `RaceCountry` = '$raceCountry'";
        $arr_mala = $this->db->query($sql_mala)->result();
        $RaceDay     = (string)date("Y").date("m").date("d");
        $RaceCard    = (string)$raceCountry.date("Y").date("m").date("d");
        $RaceNo      = (string)substr(date("Y"),-2).date("m").date("d");
        if(count($arr_mala) == 0)
        {
           $win = "";
           $place = "";
           for($i=0;$i<20;$i++)
           {
               if($i < 9)
                  $RaceNo_mal = $RaceNo.'0'.($i+1);
               else
                  $RaceNo_mal = $RaceNo.($i+1); 
                if(isset($arrWin[$i]["Win"]))
                {
                  $win = $arrWin[$i]["Win"];
                  if($win == "SCR" || $win == "scr")
                          $win = -1;
                }

                if(isset($arrPlace[$i]["Place"]))
                {
                   $place = $arrPlace[$i]["Place"];
                   if($place == "SCR" || $place == "scr")
                        $place = -1;
                }

                $sql = "INSERT INTO `livetote` (`RaceCard`,`RaceCountry`,`RaceDay`,`RaceBoard`,
                                                `RaceCountryOdds`,`RaceNo`,`Win`,`Place`,`txday`,
                                                `event`,`info`,`status`,`tstamp`)
                                       VALUES ('$RaceCard','$raceCountry','$RaceDay','MAL','','$RaceNo_mal','$win','$place','$RaceDay','','','',NOW())";      
                $req = $this->db->query($sql);
                //print_r($req);
           }
        }
        else
        {
           // lưu win mal
            if(count($arrWin) > 0)
            {
               for($i=0;$i<count($arrWin);$i++)
               {
                  if(isset($arrWin[$i]))
                  {
                      $RaceNo_ = $arrWin[$i]["horseNo"];
                      if($RaceNo_ < 9)
                      {
                         $RaceNo_mal = '0'.($RaceNo_+1);
                         $RaceNoD_mal = $RaceNo.'0'.($RaceNo_+1);
                      }
                      else
                      {
                        $RaceNo_mal = ($RaceNo_+1); 
                        $RaceNoD_mal = $RaceNo.($RaceNo_+1);
                      }
                      $Win   = $arrWin[$i]["Win"];
                      if($Win == "SCR" || $Win == "scr")
                        $Win = -1;

                      $sql = "UPDATE `livetote` SET `Win` = '$Win',`RaceDay`= '$RaceDay',`txday`='$RaceDay',`RaceCard`='$RaceCard',`RaceNo` = '$RaceNoD_mal' 
                              WHERE `RaceBoard` = 'MAL' AND `RaceCountry` = '$raceCountry' AND RIGHT(`RaceNo`,2)  = '$RaceNo_mal'";
                      //print_r($sql);     
                      $req = $this->db->query($sql);
                  }
                }
             }

             if(count($arrPlace) > 0)
             {
               for($i=0;$i<count($arrPlace);$i++)
               {
                  if(isset($arrPlace[$i]))
                  {
                      $RaceNoP = $arrPlace[$i]["horseNo"];
                      if($RaceNoP < 9)
                         $RaceNoP_mal = '0'.($RaceNoP+1);
                      else
                        $RaceNoP_mal = ($RaceNoP+1); 
                      $Place   = $arrPlace[$i]["Place"];
                      if($Place == "SCR" || $Place == "scr")
                        $Place = -1;

                      $sql = "UPDATE `livetote` SET `Place` = '$Place',`RaceDay`= '$RaceDay',`txday`='$RaceDay',`RaceCard`='$RaceCard' 
                              WHERE `RaceBoard` = 'MAL' AND `RaceCountry` = '$raceCountry' AND RIGHT(`RaceNo`,2) = '$RaceNoP_mal'";
                      //print_r($sql);      
                      $req = $this->db->query($sql);
                  }
                }
             }
        }

        $arr_flag = array();
        $arr_flag = $this->load_flag_tick();
        $arr = array('flag_tick'=>$arr_flag);
        return  $arr; 
    }

    public function  addlivetoSin()
    {

        $raceCountry = $_POST['raceCountry'];
        $arrWin      = json_decode($_POST['arr_SinWin'], true);
        $arrPlace    = json_decode($_POST['arr_SinPlace'],true);
        $sql_mala= "SELECT * FROM `livetote` 
                    WHERE `RaceBoard` = 'SIN' 
                    AND `RaceCountry` = '$raceCountry'";
        $arr_mala = $this->db->query($sql_mala)->result();
        $RaceDay     = (string)date("Y").date("m").date("d");
        $RaceCard    = (string)$raceCountry.date("Y").date("m").date("d");
        $RaceNo      = (string)substr(date("Y"),-2).date("m").date("d");
        if(count($arr_mala) == 0)
        {
           $win = "";
           $place = "";
           for($i=0;$i<20;$i++)
           {
               if($i < 9)
                  $RaceNo_mal = $RaceNo.'0'.($i+1);
               else
                  $RaceNo_mal = $RaceNo.($i+1); 
                if(isset($arrWin[$i]["Win"]))
                {
                  $win = $arrWin[$i]["Win"];
                  if($win == "SCR" || $win == "scr")
                          $win = -1;
                }

                if(isset($arrPlace[$i]["Place"]))
                {
                   $place = $arrPlace[$i]["Place"];
                   if($place == "SCR" || $place == "scr")
                        $place = -1;
                }

                $sql = "INSERT INTO `livetote` (`RaceCard`,`RaceCountry`,`RaceDay`,`RaceBoard`,
                                                `RaceCountryOdds`,`RaceNo`,`Win`,`Place`,`txday`,
                                                `event`,`info`,`status`,`tstamp`)
                                       VALUES ('$RaceCard','$raceCountry','$RaceDay','SIN','','$RaceNo_mal','$win','$place','$RaceDay','','','',NOW())"; 
                //print_r($sql);                            
                $req = $this->db->query($sql);
                //print_r($req);
           }
        }
        else
        {
           // lưu win mal
            if(count($arrWin) > 0)
            {
               for($i=0;$i<count($arrWin);$i++)
               {
                  if(isset($arrWin[$i]))
                  {
                      $RaceNo_ = $arrWin[$i]["horseNo"];
                      if($RaceNo_ < 9)
                      {
                         $RaceNo_mal = '0'.($RaceNo_+1);
                         $RaceNoD_mal = $RaceNo.'0'.($RaceNo_+1);
                      }
                      else
                      {
                        $RaceNo_mal = ($RaceNo_+1); 
                        $RaceNoD_mal = $RaceNo.($RaceNo_+1);
                      }
                      $Win   = $arrWin[$i]["Win"];
                      if($Win == "SCR" || $Win == "scr")
                        $Win = -1;

                      $sql = "UPDATE `livetote` SET `Win` = '$Win',`RaceDay`= '$RaceDay',`txday`='$RaceDay',`RaceCard`='$RaceCard',`RaceNo` = '$RaceNoD_mal' 
                              WHERE `RaceBoard` = 'SIN' AND `RaceCountry` = '$raceCountry' AND RIGHT(`RaceNo`,2)  = '$RaceNo_mal'";
                      //print_r($sql);     
                      $req = $this->db->query($sql);
                  }
                }
             }

             if(count($arrPlace) > 0)
             {
               for($i=0;$i<count($arrPlace);$i++)
               {
                  if(isset($arrPlace[$i]))
                  {
                      $RaceNoP = $arrPlace[$i]["horseNo"];
                      if($RaceNoP < 9)
                         $RaceNoP_mal = '0'.($RaceNoP+1);
                      else
                        $RaceNoP_mal = ($RaceNoP+1); 
                      $Place   = $arrPlace[$i]["Place"];
                      if($Place == "SCR" || $Place == "scr")
                        $Place = -1;

                      $sql = "UPDATE `livetote` SET `Place` = '$Place',`RaceDay`= '$RaceDay',`txday`='$RaceDay',`RaceCard`='$RaceCard' 
                              WHERE `RaceBoard` = 'SIN' AND `RaceCountry` = '$raceCountry' AND RIGHT(`RaceNo`,2) = '$RaceNoP_mal'";
                      //print_r($sql);      
                      $req = $this->db->query($sql);
                  }
                }
             }
        }
        
        // when chon tick flag country
        $arr_flag = array();
        $arr_flag = $this->load_flag_tick();

        $arr = array('flag_tick'=>$arr_flag);
        return  $arr; 
    }
    public function addToteBoard()
    {
        $raceNomala  = $_POST['raceNoMala'];
        $raceCountry = $_POST['raceCountry'];
        $listRaMala = json_decode($raceNomala, true);
        
        $sql_mala= "SELECT * FROM `livetote` WHERE `RaceBoard` = 'MAL' AND `RaceCountry` = '$raceCountry'";
        $arr_mala = $this->db->query($sql_mala)->result();
        $raceno = "";
        $RaceNoPlace = "";
        $RaceDay     = (string)date("Y").date("m").date("d");
        $RaceCard    = (string)$raceCountry.date("Y").date("m").date("d");
        $RaceNo      = (string)substr(date("Y"),-2).date("m").date("d");
        $rel = "";
        
        if(count($arr_mala) == 0)
        {
            for($i = 0; $i < 20; $i++)
            {
                if(isset($listRaMala[0][$i]))
                {
                    $raceno = (string)$listRaMala[0][$i];
                    if($raceno == "SCR" || $raceno == "scr")
                        $raceno = (string)-1;
                }
                
                if(isset($listRaMala[1][$i]))
                {
                    $RaceNoPlace = (string)$listRaMala[1][$i];
                    if($RaceNoPlace == "SCR" || $RaceNoPlace == "scr")
                        $RaceNoPlace = (string)-1;
                }
 
                if($i < 9){
                    $RaceNo_mal = $RaceNo.'0'.($i+1);
                    
                }
                else
                {
                    $RaceNo_mal = $RaceNo.($i+1); 
                }
                //
                  $sql = "INSERT INTO `livetote` (`RaceCard`,`RaceCountry`,`RaceDay`,`RaceBoard`,`RaceCountryOdds`,`RaceNo`,`Win`,`Place`,`txday`,`event`,`info`,`status`,`tstamp`)VALUES ('$RaceCard','$raceCountry','$RaceDay','MAL','','$RaceNo_mal','$raceno','$RaceNoPlace','$RaceDay','','','',NOW())";      
                  $req = $this->db->query($sql);
             }  
        }
        else
        {
              //MAL
              $list_new  = array();
              $sql_mal = "SELECT * FROM `livetote` 
                          WHERE `RaceBoard` = 'MAL' 
                          AND `RaceCountry` = '$raceCountry'";
              $arr_list_mal = $this->db->query($sql_mal)->result();
              foreach($arr_list_mal as $value)
              {
                  $rowid = $value->rowid;
                  array_push($list_new,$rowid);
              }
              
              for($i = 0; $i < 20; $i++)
              {
                if(isset($listRaMala[0][$i]))
                {
                    $raceno = (string)$listRaMala[0][$i];
                    if($raceno == "SCR" || $raceno == "scr")
                    $raceno = (string)-1;
                }
                
                if(isset($listRaMala[1][$i]))
                {
                    $RaceNoPlace = (string)$listRaMala[1][$i];
                    if($RaceNoPlace == "SCR" || $RaceNoPlace == "scr")
                   $RaceNoPlace = (string)-1;
                }    
                
                if($i < 9){
                    $RaceNo_mal = $RaceNo.'0'.($i+1);
                    
                }else{
                    $RaceNo_mal = $RaceNo.($i+1); 
                }
                   $sql = "UPDATE `livetote` 
                           SET `Win` = '$raceno',`Place` = '$RaceNoPlace',
                               `txday`='$RaceDay',`RaceDay`='$RaceDay',
                               `RaceNo`='$RaceNo_mal',`RaceCard`='$RaceCard' 
                           WHERE `RaceBoard` = 'MAL' 
                           AND `RaceCountry` = '$raceCountry' 
                           AND `rowid` = '$list_new[$i]'";      
                   $req = $this->db->query($sql);
             }

        }
          $arr_flag = array();
          if($req)
          {
            $sql_mal = "SELECT * FROM `livetote` WHERE `RaceBoard` = 'MAL' AND `RaceCountry` = '$raceCountry'";
            $arr_mal = $this->db->query($sql_mal)->result(); 
            $arr_flag = $this->load_flag_tick();
          }

        $arr = array('countryMal'=>$raceCountry,'l_Mal'=>$arr_mal,'flag_tick'=>$arr_flag);
        return  $arr;
    }
   
}