<?php
class M_weight_board extends CI_Model{
        public function __construct()
        {
            parent::__construct();
            $this->load->model("app/horse/m_weight");
        }
        
        public function loadlistRaceCard()
        {
            $sql = "SELECT `rowid`,`RaceID` FROM `racerard`";
            $arr_RCID = $this->db->query($sql)->result();
            $arr = array('RCID' => $arr_RCID);
            return $arr;
        }
   
       public function loadRaceWeightBaord()
       {
            $sql = "SELECT `rowid`,`RaceID` FROM `racerard` WHERE `status`='OPEN' ";
            $arr_RCID = $this->db->query($sql)->result();      
            $arr = array('RCID' => $arr_RCID);
            return $arr;
      }
      
      public function SaveWeightBoard()
      {
            $weightboard  = $_POST['weightBoard'];
            $raceCardID   = "";
            if(isset($_POST['RaceCardId']))
            $raceCardID  = $_POST['RaceCardId'];
            $listweightBoard = json_decode($weightboard,true);
            $sql_sel= "SELECT * FROM `horseinfo` WHERE `RaceCardID`='$raceCardID'";
            $arr_weight = $this->db->query($sql_sel)->result();
            $horseNo     = "";
            $wgt = "";
            $hdp = "";
            if(count($arr_weight) == 0)
            {
                for($i = 0; $i < 20; $i++)
                {
                   
                    if(isset($listweightBoard[0][$i])){
                        $wgt = (string)$listweightBoard[0][$i];
                    }
                    if(isset($listweightBoard[1][$i])){
                        $hdp = (string)$listweightBoard[1][$i];
                    }

                    if($i < 9){
                        $horseNo = '0'.($i+1);
                    }else{
                        $horseNo = $i+1;
                    }
                    
                   $sql = "INSERT INTO `horseinfo`(`HorseNo`,`RaceCardID`,`Wgt`,`Hdp`) VALUES('$horseNo','$raceCardID','$wgt','$hdp')";     
                   $req = $this->db->query($sql);
                }
            }
            else
            {
                   $list_HorseNo = array();
                   foreach($arr_weight as $value){
                       $HorseNo = $value->HorseNo;
                       array_push($list_HorseNo,$HorseNo);
                   }
                   
                   for($i = 0; $i < 20; $i++)
                   {
                       if(isset($listweightBoard[0][$i])){
                            $wgt = (string)$listweightBoard[0][$i];
                       }
                       if(isset($listweightBoard[1][$i])){
                           $hdp = (string)$listweightBoard[1][$i];
                       }
                       
                       if(isset($list_HorseNo[$i])){
                           $horseNo = $list_HorseNo[$i];
                       }
                        $sql = "UPDATE `horseinfo` SET `Wgt`='$wgt',`Hdp`='$hdp' WHERE `RaceCardID`='$raceCardID' AND `HorseNo` = '$horseNo'";   
                        $req = $this->db->query($sql);   
                  } 
            }
            
            $arr_weight = array();
            if($req)
            {
               $arr_weight = $this->m_weight->loadweight();
            }
        
            $arr = array('raceCardID'=>$raceCardID,'arr_weight'=>$arr_weight);
            return  $arr;
      }
      
      public function getListWeightBoard(){
        $raceCardID  = $_POST['RaceCardId'];
        $sql_sel = "SELECT * FROM `horseinfo` WHERE `RaceCardID` ='$raceCardID'";
        $arr_weight = $this->db->query($sql_sel)->result();   
        $arr = array('list_weight' =>$arr_weight );
        return $arr;
      }
}