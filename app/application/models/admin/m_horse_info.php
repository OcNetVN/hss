<?php
class M_horse_info extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
   
   public function SaveHorseInfo()
   {
       $HorseName     = $_POST['HorseName'];
       $jockey        = $_POST['Jockey'];
       $items         = $_POST['Item'];
       $item1         = $_POST['Item1'];
       $item2         = $_POST['Item2'];
       $Hcp           = $_POST['Hcp'];
       $Weight        = $_POST['Weight'];
       $RTg           = $_POST['Tg'];
       $Br            = $_POST['Br'];
       $past          = $_POST['past'];
       $Handicap      = $_POST['Handicap'];
       $RaceNo        = $_POST['RaceNo'];
       $HorseNo       = $_POST['HorseNo'];
       $Trainer       = $_POST['Trainer'];
       $RaceId        = $_POST['RaceID'];
       $country       = substr($RaceId,0,2);
       
       $sql = "INSERT INTO `horseinfo`(`HorseNo`,`HorseName`,`Jocket`,`Past4/5`,`Br`,`Color`,`Rtg`,`Wt`,`Hcp`,`Trainer`,`itemcn`,`itemmy`,`itemhk`,`RaceCountry`,`RaceNo`,`RaceCardID`)VALUES('$HorseNo','$HorseName','$jockey','$past','$Br','','$RTg','$Weight','$Handicap','$Trainer','$items','$item1','$item2','$country','$RaceNo','$RaceId')";
        $this->db->query($sql);
 }
 
 public function SaveListHorse(){
     $RaceID  = $_POST['RaceCardID'];
     $HorseNo = $_POST['HorseNo'];
     $RaceNo  = $_POST['RaceNo'];
     $country       = substr($RaceID,0,2);
     $sql_sel = "SELECT * FROM `horseinfo` WHERE `RaceCardID`='$RaceID'  AND `HorseNo`='$HorseNo' AND `RaceNo`='$RaceNo'";
     $arr_list = $this->db->query($sql_sel)->result();
     if(count($arr_list)==0){
         $sql = "INSERT INTO `horseinfo`(`HorseNo`,`HorseName`,`Jocket`,`Past4/5`,`Br`,`Color`,`Rtg`,`Wt`,`Hcp`,`Trainer`,`itemcn`,`itemmy`,`itemhk`,`RaceCountry`,`RaceNo`,`RaceCardID`)VALUES('$HorseNo','SCR','SCR','SCR','SCR','SCR','SCR','SCR','SCR','SCR','SCR','SCR','SCR','$country','$RaceNo','$RaceID')";
        $this->db->query($sql);
     }else{
         $sql= "UPDATE `horseinfo` SET `HorseNo`='SCR',`HorseName`='SCR',`Jocket`='SCR',`Past4/5`='SCR',`Br`='SCR',`Color`='SCR',`Rtg`='SCR',`Wt`='SCR',`Hcp`='SCR',`Trainer`='SCR' WHERE `HorseNo`='$HorseNo' AND `RaceCardID`='$RaceID' AND `RaceNo` ='$RaceNo' ";
         $this->db->query($sql);
     }
 }


 
 // jocky color
 
    public function get_jockycolor(){
        $sql = "SELECT * FROM `jockycolor`"; //lấy cấp 2
        $List = $this->db->query($sql)->result();
        return $List;
    }
    public function uploadfile(){
           
            $info = $_POST['info'];
            $lang = $_POST['lang'];
            
            $files = $_FILES['myfile'];
            $fileName = $_FILES['myfile']['name'];
            $fileType = $_FILES['myfile']['type'];
            $fileError = $_FILES['myfile']['error'];
            
            
            $res = 0;
            $sql1 = "SELECT * FROM `commoncode` WHERE `CommonTypeId` = 'Infomation' AND `CommonId` = '$info'"; 
            $array1 = $this->db->query($sql1)->result();
            $arr_Info =  (array)$array1;
            
            $sql2 = "SELECT * FROM `commoncode` WHERE `CommonTypeId` = 'Language' AND `CommonId` = '$lang'"; 
            $array2 = $this->db->query($sql2)->result();
            $arr_lang =  (array)$array2;
          
            if (!file_exists('resources/html/'.$arr_lang[0]->StrValue1.'/')) {
                mkdir('resources/html/'.$arr_lang[0]->StrValue1.'/', 0777, true);
            }   
            try{
              
              move_uploaded_file($_FILES['myfile']['tmp_name'], 'resources/html/'.$arr_lang[0]->StrValue1 .'/'.$arr_Info[0]->StrValue2);
              $res =1;
              $filenameup= $_FILES['myfile']['tmp_name'];
              $filesave = 'resources/html/'.$arr_lang[0]->StrValue1.'/'.$arr_Info[0]->StrValue2;
              }             
              catch(exception $e){
                 $res = $e;  
              }          
              $arr = array("res"=>$res,"FileUp"=>$filenameup,"FileSave"=>$filesave); 
              return $arr;               
    }  
     
     public function UploadHtml($info, $fileName){
           try{
              $sql_sel = "SELECT * FROM `commoncode` WHERE `CommonTypeId` = 'Infomation' AND `CommonId` = '$info'"; 
              $array = $this->db->query($sql_sel)->result();
              $arr =  (array)$array;
              
              if(count($arr)>0)
                {
                   $sql = "UPDATE `commoncode` SET `StrValue2` = '$fileName' WHERE `CommonTypeId` = 'Infomation' AND `CommonId` = '$info'";//update
                   
                }
                else{   
                        $sql = "INSERT INTO `commoncode`(`CommonTypeId`,`CommonId`,`StrValue2`) VALUES('Infomation','$info','$fileName')"; // insert
                        
                }
                try{
                    
                        $this->db->query($sql);
                        $res = 1;
                }
                catch(exception $e)
                {
                    $res = 0;   
                }
              }             
              catch(exception $e){
                 $res = 0;  
              }
            
               return $res;
    }
  
   
}