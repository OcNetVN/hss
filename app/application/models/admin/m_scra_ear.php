<?php
class M_scra_ear extends CI_Model{
        public function __construct()
        {
            parent::__construct();
        }
        
        public function loadlistRaceCard(){
        $sql = "SELECT `rowid`,`RaceID` FROM `racerard`";
        $arr_RCID = $this->db->query($sql)->result();
        $arr = array('RCID' => $arr_RCID);
        return $arr;
   }
   
       public function loadRaceWeightBaord(){
            
            $sql = "SELECT `rowid`,`RaceID` FROM `racerard` WHERE `status`='OPEN' ";
            $arr_RCID = $this->db->query($sql)->result();      
            $arr = array('RCID' => $arr_RCID);
            return $arr;
      }

      public function SaveSEDetail(){
         $country = "";
         $racedate = "";
         if(isset($_POST['Country']))
          $country = $_POST['Country'];
         if(isset($_POST['RaceDate']))
          $racedate = $_POST['RaceDate'];
          $SE       = $_POST['SE'];
          $listSE    = json_decode($SE,true);
          $sql_sel= "SELECT * FROM `scr` WHERE `RaceCountry`='$country' AND `RaceDay` = '$racedate'";
          $arr_SE = $this->db->query($sql_sel)->result();
            //$raceno = "";
            $RaceDay     = (string)date("Y").date("m").date("d");
            $RaceCard    = (string)$country.date("Y").date("m").date("d");
//            $RaceNo      = (string)substr(date("Y"),-2).date("m").date("d");
            
            $horseNo     = "";
            $early = "";
            $scarching = "";
            if(count($arr_SE) == 0)
            {
                for($i = 0; $i < 20; $i++){
                   
                    if(isset($listSE[$i]['Early'])){
                        $early = $listSE[$i]['Early'];
                    }
                    if(isset($listSE[$i]['Scarching'])){
                        $scarching = $listSE[$i]['Scarching'];
                    }

                    if($i < 9){
                        $horseNo = '0'.($i+1);
                    }else{
                        $horseNo = $i+1;
                    }
                   $sql = "INSERT INTO `scr`(`RaceCard`,`RaceCountry`,`RaceDay`,`RaceNo`,`EarlyTicket`,`Scratching`) VALUES('$RaceCard','$country','$racedate','$horseNo','$early','$scarching')";     
                   $this->db->query($sql);
                }
            }
            else{
                
                   $list_HorseNo = array();
                   foreach($arr_SE as $value){
                       $HorseNo = $value->id;
                       array_push($list_HorseNo,$HorseNo);
                   }
                  // echo "<pre>";
//                   print_r($HorseNo);
//                   echo "</pre>";
                   for($i = 0; $i < 20; $i++){
                        if(isset($listSE[$i]['Early'])){
                        $early = $listSE[$i]['Early'];
                        }
                        if(isset($listSE[$i]['Scarching'])){
                            $scarching = $listSE[$i]['Scarching'];
                        }
                        if($i < 9){
                        $horseNo = '0'.($i+1);
                        }else{
                            $horseNo = $i+1;
                        }
                       
                       if(isset($list_HorseNo[$i])){
                           $id = $list_HorseNo[$i];
                       }
                        $sql = "UPDATE `scr` SET `RaceCard`='$RaceCard',`RaceDay`='$racedate',`RaceNo`='$horseNo',`EarlyTicket`='$early',`Scratching`='$scarching' WHERE `id`='$id'";   
                        $this->db->query($sql);   
                } 
            }
        
            $arr = array('country'=>$country);
            return  $arr;
      }
      
      public function SaveSE(){
            $SE       = $_POST['SE'];
            $country  = $_POST['Country'];
            $listSE    = json_decode($SE,true);
            $sql_sel= "SELECT * FROM `scr` WHERE `RaceCountry`='$country'";
            $arr_SE = $this->db->query($sql_sel)->result();
            //$raceno = "";
            $RaceDay     = (string)date("Y").date("m").date("d");
            $RaceCard    = (string)$country.date("Y").date("m").date("d");
//            $RaceNo      = (string)substr(date("Y"),-2).date("m").date("d");
            
            $horseNo     = "";
            $early = "";
            $scarching = "";
            if(count($arr_SE) == 0)
            {
                for($i = 0; $i < 20; $i++){
                   
                    if(isset($listSE[$i]['Early'])){
                        $early = $listSE[$i]['Early'];
                    }
                    if(isset($listSE[$i]['Scarching'])){
                        $scarching = $listSE[$i]['Scarching'];
                    }

                    if($i < 9){
                        $horseNo = '0'.($i+1);
                    }else{
                        $horseNo = $i+1;
                    }
                   $sql = "INSERT INTO `scr`(`RaceCard`,`RaceCountry`,`RaceDay`,`RaceNo`,`EarlyTicket`,`Scratching`) VALUES('$RaceCard','$country','$RaceDay','$horseNo','$early','$scarching')";     
                   $this->db->query($sql);
                }
            }
            else{
                
                   $list_HorseNo = array();
                   foreach($arr_SE as $value){
                       $HorseNo = $value->id;
                       array_push($list_HorseNo,$HorseNo);
                   }
                  // echo "<pre>";
//                   print_r($HorseNo);
//                   echo "</pre>";
                   for($i = 0; $i < 20; $i++){
                        if(isset($listSE[$i]['Early'])){
                        $early = $listSE[$i]['Early'];
                        }
                        if(isset($listSE[$i]['Scarching'])){
                            $scarching = $listSE[$i]['Scarching'];
                        }
                        if($i < 9){
                        $horseNo = '0'.($i+1);
                        }else{
                            $horseNo = $i+1;
                        }
                       
                       if(isset($list_HorseNo[$i])){
                           $id = $list_HorseNo[$i];
                       }
                        $sql = "UPDATE `scr` SET `RaceCard`='$RaceCard',`RaceDay`='$RaceDay',`RaceNo`='$horseNo',`EarlyTicket`='$early',`Scratching`='$scarching' WHERE `id`='$id'";   
                        $this->db->query($sql);   
                } 
            }
        
            $arr = array('country'=>$country);
            return  $arr;
      }
      
      public function getscrachingEarly(){
        $country  = $_POST['Country'];
        $sql_sel = "SELECT * FROM `scr` WHERE `RaceCountry`='$country'";
        $arr_SE = $this->db->query($sql_sel)->result();   
        $arr = array('list_SE' =>$arr_SE );
        return $arr;
      }

      public function gotoSCR(){
        $racedate = "";
        $racecountry = "";
        if(isset($_POST['country'])){
            $racecountry = $_POST['country'];
        }
        if(isset($_POST['RaceDate'])){
           $racedate  = $_POST['RaceDate'];
        }
        if($racedate != "" && $racecountry != ""){
            $sql = "SELECT * FROM `scr` WHERE `RaceCountry`='$racecountry' AND `RaceDay` = '$racedate'";
            $arr_SE = $this->db->query($sql)->result();   
            $arr = array('list_SE' =>$arr_SE,'racedate'=>$racedate,'racecountry'=>$racecountry);
            return $arr;
        }

      }
 
      public function LoadScrachingEarlyByRaceNo()
      {
        $RaceNo  = $_POST['RaceNo'];
        $RaceCard =  $_POST['RaceCard'];
        $sql_sel = "SELECT * FROM `scr` WHERE `RaceNo`='$RaceNo' and  RaceCard ='$RaceCard'";
        $arr_SE = $this->db->query($sql_sel)->result();   
        $arr = array('list_SE' =>$arr_SE );
        return $arr;
      }
      public function SaveScrachingEarlyByRaceNo()
      {
        $RaceNo  = $_POST['RaceNo'];
        $RaceCard =  $_POST['RaceCard'];
        $RaceCountry =    $_POST['RaceCountry'];
        $RaceDay =    $_POST['RaceDay'];
        $EarlyTicket =    $_POST['EarlyTicket'];
        $Scratching =    $_POST['Scratching'];
        $MasterChoice =    $_POST['MasterChoice'];
        $BatamTic =    $_POST['BatamTic'];
        $sql_sel = "SELECT * FROM `scr` WHERE `RaceNo`='$RaceNo' and  RaceCard ='$RaceCard'";
        $arr_SE = $this->db->query($sql_sel)->result(); 
        
        if(count($arr_SE)== 0)  
        {
            $query = "INSERT INTO `scr` (RaceNo,
                                        RaceCard,
                                        RaceCountry,
                                        RaceDay,                                         
                                        EarlyTicket,
                                        Scratching,
                                        MasterChoice,
                                        BatamTic) 
                                VALUES (
                                      '$RaceNo',
                                      '$RaceCard' ,
                                      '$RaceCountry',
                                      '$RaceDay' ,
                                      '$EarlyTicket',
                                      '$Scratching',
                                      '$MasterChoice',
                                      '$BatamTic'
                                )";
            $query = $this->db->query($query);
             $arr = array('status' =>'InSuccess' );  
        }
        else
        {
            $query = "UPDATE `scr` 
                    SET     EarlyTicket = '$EarlyTicket',
                            Scratching = '$Scratching' ,
                            MasterChoice = '$MasterChoice',
                            BatamTic = '$BatamTic' 
                    WHERE RaceNo = '$RaceNo' AND RaceCard = '$RaceCard'";
            $query = $this->db->query($query);               
            $arr = array('status' =>'UpSuccess' );   
        }  
        return $arr;
      }
    
   
}