<?php
class M_detail_horse extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
   
   public function SaveHorseInfo(){
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
       $id            = $_POST['ID'];
       $sql = "SELECT * FROM `horseinfo` WHERE `rowid`='$id'";
       $req = "";
       $rowid = "";
       $arr_list;
       $arr = $this->db->query($sql)->result();
       if(count($arr) == 0){
          $sql = "INSERT INTO `horseinfo`(`HorseNo`,`HorseName`,`Jocket`,`Past`,`Br`,`Color`,`Rtg`,`Wt`,`Hcp`,`Trainer`,`itemcn`,`itemmy`,`itemhk`,`RaceCountry`,`RaceNo`,`RaceCardID`)VALUES('$HorseNo','$HorseName','$jockey','$past','$Br','','$RTg','$Weight','$Handicap','$Trainer','$items','$item1','$item2','$country','$RaceNo','$RaceId')";
          $req = $this->db->query($sql);
          if($req){
             $rkq = 1;
          }
       }
       else
       {

            $sql= "UPDATE `horseinfo` SET `HorseNoS`='$HorseNo',`HorseName`='$HorseName',`Jocket`='$jockey',`Past`='$past',`Br`='$Br',`Color`='',`Rtg`='$RTg',`Wt`='$Weight',`Hcp`='$Hcp',`Trainer`='$Trainer',`itemcn`='$items',`itemmy`='$item1',`itemhk`='$item2' WHERE `rowid`='$id' ";
            $req = $this->db->query($sql);
            if($req){
             $rkq = 1;
             $rowid = $id;
          }
       }

       if($rkq == 1)
        {
            $l_horseinfo = array();
            $l_header    = array();
            $detail      = "";
            $res_horse = $this->get_horseinfo_by_raceid($RaceId);
            $sql_inforace = "SELECT * FROM `racerard` WHERE `RaceID` = '$RaceId'";
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

       $arr_list = array('req'=>$rkq,'HorseID'=>$rowid,
                         'l_horeinfo'=>$l_horseinfo,
                         'detail' => $detail,'l_header' =>$l_header,'RaceID'=>$RaceId);
       return $arr_list;
       
 }
 
 public function SaveListHorse()
 {
     $RaceID  = $_POST['RaceCardID'];
     $Id      = $_POST['id'];
     $RaceNo  = $_POST['RaceNo'];
     $country       = substr($RaceID,0,2);
      $req = "";
      $rowid = "";
     $sql_sel = "SELECT * FROM `horseinfo` WHERE `rowid`='$Id'";
     $arr_list = $this->db->query($sql_sel)->result();
     if(count($arr_list) !=0)
     {
         $sql= "UPDATE `horseinfo` SET  `HorseName`='SCR',`HorseNoS`='SCR',`Jocket`='SCR',`Past`='SCR',`Br`='SCR',`Color`='SCR',`Rtg`='SCR',`Wt`='SCR',`Hcp`='SCR',`Trainer`='SCR',`itemcn`='SCR',`itemmy`='SCR',`itemhk`='SCR' WHERE `rowid`='$Id' ";
         $req = $this->db->query($sql);
         if($req){
            $rkq = 1;
            $rowid = $Id;
         }
     }
     if($rkq == 1)
        {
            $l_horseinfo = array();
            $l_header    = array();
            $detail      = "";
            $res_horse = $this->get_horseinfo_by_raceid($RaceID);
            $sql_inforace = "SELECT * FROM `racerard` WHERE `RaceID` = '$RaceID'";
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

     $arr_list = array('req'=>$rkq,'HorseID'=>$rowid,
                       'l_horeinfo'=>$l_horseinfo,'detail' => $detail,
                       'l_header' =>$l_header,'RaceID'=>$RaceID);
     return $arr_list;
 }

 public function EditHorseInfo(){
     $rowid  = $_POST['id'];
     if($rowid != ""){
          $sql = "SELECT * FROM `horseinfo` WHERE `rowid`='$rowid'";
          $arr_list = $this->db->query($sql)->result();
          $arr = array('DetailHI' => $arr_list);
          return $arr;
     }
 }

 public function LoadListHorse()
 {
    $RaceID = "";
    if(isset($_POST['RaceID']))
       $RaceID = $_POST['RaceID'];
        //$RaceID  = $_POST['RaceCardID'];
    $sql = "SELECT * FROM `horseinfo` WHERE `RaceCardID`='$RaceID' AND `HorseNoS` != ''";
    $arr_HorseInfo = $this->db->query($sql)->result();      
    $arr = array('ListHorseInfo' => $arr_HorseInfo);
    return $arr;
    
 }

 public function EditAddColor(){
       $id          = $_POST['id'];
       $linkImage   = $_POST['linkImage'];
       $req = '';
       $horseNo = "";
       $rkq     = "";
       if($id != ""){
          $sql = "SELECT * FROM `horseinfo` WHERE `rowid`='$id'";
          $arr_list = $this->db->query($sql)->result();
          if(count($arr_list) > 0){
            $sql_up = "UPDATE `horseinfo` SET `Color` ='$linkImage' WHERE `rowid` ='$id'";
            $req = $this->db->query($sql_up);
            if($req){
              $rkq = 1;
            }
            $horseNo = $arr_list[0]->HorseNo;
          }
       }
       $arr = array('rkq' =>$rkq,'horseNo'=>$horseNo,'image'=> $linkImage);
       return $arr;
}

public function updatehorsejocky()
{
       $id          = $_POST['id'];
       $linkImage   = $_POST['linkImage'];
       $req = '';
       $horseNo = "";
       $rkq     = "";
       if($id != ""){
          $sql = "SELECT * FROM `horseinfo` WHERE `rowid`='$id'";
          $arr_list = $this->db->query($sql)->result();
          if(count($arr_list) > 0){
             $sql_jo = "SELECT * FROM `jockycolor` WHERE `id`='$linkImage'";
             $arr_jock = $this->db->query($sql_jo)->result();
             if(count($arr_jock) != 0)
               $link_img = $arr_jock[0]->imgeSmall;
             else
               $link_img = "";
            $sql_up = "UPDATE `horseinfo` SET `Color` ='$link_img' WHERE `rowid` ='$id'";
            $req = $this->db->query($sql_up);
            if($req){
              $rkq = 1;
            }
            $horseNo = $arr_list[0]->HorseNo;
          }
       }
       $arr = array('rkq' =>$rkq,'horseNo'=>$horseNo,'image'=> $link_img);
       return $arr;
}
 
 // jocky color
 
    public function get_jockycolor(){
        $sql = "SELECT * FROM `jockycolor`"; //lấy cấp 2
        $List = $this->db->query($sql)->result();
        return $List;
    }

    public function removejockcolor()
    {
        $id = "";
        $rel = "";
        if(isset($_POST['id']))
          $id = $_POST['id'];
          $sql_sel = "SELECT * FROM `jockycolor` WHERE `id`='$id'";
          $arr_jock = $this->db->query($sql_sel)->result();
          if(count($arr_jock) != 0)
          {
               $sql_del = "DELETE FROM `jockycolor` WHERE `id`='$id'";
               $req = $this->db->query($sql_del);
               if($req)
                $rel = 1;
          }
          $arr = array('req'=>$rel);
          return $arr;
    }

    public function loadJockyDetail()
    {
       $id = "";
       $image = "";
       $rkq = "";
       if(isset($_POST['id']))
       {
          $id = $_POST['id'];
          $sql = "SELECT * FROM `jockycolor` WHERE `id`='$id'";
          $arr_jock = $this->db->query($sql)->result();
          if(count($arr_jock) != 0)
          {
              $image = $arr_jock[0]->imgeSmall;
              $rkq = 1;
          }
       }

       $arr = array('rkq'=>$rkq,'idjock'=>$id,'image'=>$image);
       return $arr;

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
    
   // button submit for add jocaky color
    public function uploadImage()
    {

        $urlImage = "";
        $Imageext = "";
        $ImageName = "";
        $rel= "";
        $str ="";
        if(isset($_POST['urlImage']))
        {
          $urlImage = $_POST['urlImage'];
          if(!empty($urlImage))
          {
              $Imageext = explode(".", $urlImage);
              $Imageext = ".".$Imageext[count($Imageext)-1];
              $ImageName = $this->getimageID();
              //$ImageName = "20150430_IM";
              @$rawImage = file_get_contents($urlImage);
              
              if($rawImage)
              {

                 //file_put_contents($_SERVER['DOCUMENT_ROOT']."/racing/Source/assets/img/jockey/".$ImageName.$Imageext,$rawImage);
                 //file_put_contents($_SERVER['DOCUMENT_ROOT']."/hss/assets/img/jockey/".$ImageName.$Imageext,$rawImage);
                 file_put_contents($_SERVER['DOCUMENT_ROOT']."/assets/img/jockey/".$ImageName.$Imageext,$rawImage);
                 $postImageName = base_url("/assets/img/jockey/".$ImageName.$Imageext);
                 $sql = "INSERT INTO `jockycolor`(`name`,`imgeSmall`,`createdDate`,`status`) 
                          VALUES('$ImageName','$postImageName',NOW(),'1')";
                 $this->db->query($sql);
                 $rel = 1;
                 $str = $_SERVER['DOCUMENT_ROOT']."/assets/img/jockey/".$ImageName.$Imageext;
              }
              else
              {
                 $rel = 0;
              }

          }
        }

         $arr = array("req" => $rel,"link"=>$str);
         return $arr;
    }
   // end button submit for add jocky color
    // get id
    public function getimageID()
    {    
        $id =  (string)"IM".date("Y").date("m").date("d");
        $sql="SELECT `name` FROM `jockycolor` WHERE LEFT(`name`,10) = '$id' ORDER BY `name` ";
        
        $arr = $this->db->query($sql)->result();
        $lst = (array)$arr;
        $stt=1;
        if(count($lst)>0)
        {
            $i=0;
            for($i =0; $i<count($lst);$i++)
            {
                $id_daco = $lst[$i]->name;
                $stt = intval (substr($id_daco,10,strlen($id_daco)));
                if ($stt != $i + 1)
                {
                    $stt = $i + 1;
                    break;
                }
                if ($i == count($lst)-1)
                {
                    $stt = count($lst) + 1;
                }
            } 
        }
        else
        {
            $stt=1;
        }
        $s_stt ="";
        if ($stt < 10)
            $s_stt = "00000" . strval($stt);
        else if (($stt < 100) && ($stt >= 10))
            $s_stt = "0000" . strval($stt);
        else if (($stt < 1000) && ($stt >= 100))
            $s_stt = "000" . strval($stt);
        else if (($stt < 10000) && ($stt >= 1000))
            $s_stt = "00" . strval($stt);
        else if (($stt < 100000) && ($stt >= 10000))
            $s_stt = "0" . strval($stt);
        else
            $s_stt = strval($stt);
        
        $id= $id. $s_stt;
        return $id;
    }
   public function ClearHorseInfo(){
      $RaceID     = $_POST['RaceCardID'];
      $RaceNo     = $_POST['RaceNo'];
      $sql_select = "SELECT * FROM `horseinfo` WHERE `RaceCardID`='$RaceID' AND `RaceNo`='$RaceNo' ";
      $ar_horseinfo = $this->db->query($sql_select)->result();
      $req;
      $kq = "";
      if(count($ar_horseinfo) != 0)
      {
        $sql = "UPDATE `horseinfo` SET `HorseNoS`='',`HorseName`='',`Jocket`='',`Past`='',`Age`='',`Hwt`='',`Hdle`='',`Br`='',`Color`='',`Rtg`='',`Wt`='',`Hcp`='',`Trainer`='',`Last6Runs`='',`Priority`='',`Gear`='',`Declaration`='',`Sex`='',`Country`='',`SireDam`='',`Owner`='',`itemcn`='',`itemmy`='',`itemhk`='' WHERE  `RaceCardID`='$RaceID' AND `RaceNo` ='$RaceNo' ";
        $req = $this->db->query($sql);
        if($req)
        {
          $kq = 1;
        }
      }

      if($kq == 1)
      {
          // send data for node index.js
           $l_horseinfo = array();
            $l_header    = array();
            $detail      = "";
            $res_horse = $this->get_horseinfo_by_raceid($RaceID);
            $sql_inforace = "SELECT * FROM `racerard` WHERE `RaceID` = '$RaceID'";
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

      $arr = array( 'Rel'=>$kq,'RaceID'=>$RaceID,
                    'RaceNo'=>$RaceNo,'l_horeinfo'=>$l_horseinfo,
                    'detail' => $detail,'l_header' =>$l_header
                  );
      return $arr;
   }


   public function SaveHorseInfoDetail()
   {
        $horseinfo      = $_POST['HorseInfo'];
        $RaceID         = $_POST['RaceCardID'];
        $RaceNo         = $_POST['RaceNo'];
        $country        = substr($RaceID,0,2);
        $listhorse      = json_decode($horseinfo,true);
        $rel = "";
        $Rtg  = "";
        $age  ="";
        $hwt  = "";
        $hdle = "";
        $past = "";
        $lastrun = "";
        $declartion = "";
        $HorseName  = "";
        $Weight = "";
        $Priority ="";
        $Trainer = "";
        $jockey = "";
        $Br = "";
        $gear ="";
        $hcp = "";
        $sex = "";
        $coulor = "";
        $counry = "";
        $owner = "";
        $sireDam = "";
        $count = 0;
        $HorseNo = "";
        $sql_select = "SELECT * FROM `horseinfo` 
                       WHERE `RaceCardID`='$RaceID' 
                       AND `RaceNo`='$RaceNo' ";
        //echo $sql_select;
        $ar_horseinfo = $this->db->query($sql_select)->result();
        //echo (count($ar_horseinfo));
        if(count($ar_horseinfo) == 0)
        {
          if(count($listhorse) > 0)
          {
            for($i= 0;$i<count($listhorse);$i++)
            {
                    if($i < 9)
                      $stt_horse = "0".($i+1);
                    else
                      $stt_horse = $i+1;
                    if(isset($listhorse[$i]['HorseNo']))
                      $HorseNo   = $listhorse[$i]['HorseNo'];
                    // if($HorseNo < 10)
                    //     $HorseNo = '0'.$HorseNo;
                    if(isset($listhorse[$i]['HorseName']))
                    {
                      $HorseName = $listhorse[$i]['HorseName'];
                      $HorseName = str_replace("'","",$HorseName);
                    }                     
                    if(isset($listhorse[$i]['Weight']))
                      $Weight    = $listhorse[$i]['Weight'];
                    if(isset($listhorse[$i]['Br']))
                      $Br        = $listhorse[$i]['Br'];
                    if(isset($listhorse[$i]['Trainer']))
                      $Trainer   = $listhorse[$i]['Trainer'];
                      $Trainer   = str_replace("'","",$Trainer);                      
                    if(isset($listhorse[$i]['jockey']))
                    {
                      $jockey    = $listhorse[$i]['jockey'];
                      $jockey    = str_replace("'","",$jockey);
                    }                    
                    if(isset($listhorse[$i]['Rtg']))
                        $Rtg       = $listhorse[$i]['Rtg'];
                    if(isset($listhorse[$i]['age']))
                        $age       = $listhorse[$i]['age'];
                    if(isset($listhorse[$i]['hwt']))
                        $hwt       = $listhorse[$i]['hwt'];  
                    if(isset($listhorse[$i]['hdle']))
                        $hdle     = $listhorse[$i]['hdle'];
                    if(isset($listhorse[$i]['Past']))
                        $past     = $listhorse[$i]['Past'];
                    if(isset($listhorse[$i]['LastRuns']))
                        $lastrun   = $listhorse[$i]['LastRuns'];
                    if(isset($listhorse[$i]['Declaration']))
                        $declartion = $listhorse[$i]['Declaration'];
                    if(isset($listhorse[$i]['Priority']))
                        $Priority  = $listhorse[$i]['Priority'];
                    if(isset($listhorse[$i]['Gear']))
                        $gear   = $listhorse[$i]['Gear'];
                    if(isset($listhorse[$i]['hcp']))
                        $hcp = $listhorse[$i]['hcp'];
                    if(isset($listhorse[$i]['sex']))
                        $sex = $listhorse[$i]['sex'];
                    if(isset($listhorse[$i]['coulor']))
                        $coulor = $listhorse[$i]['coulor'];
                    if(isset($listhorse[$i]['country']))
                        $counry = $listhorse[$i]['country'];
                    if(isset($listhorse[$i]['Owner']))
                        $owner  = $listhorse[$i]['Owner'];
                    if(isset($listhorse[$i]['sireDam']))
                         $sireDam = $listhorse[$i]['sireDam'];

                      $sql = "INSERT INTO `horseinfo`(`HorseNo`,`HorseNoS`,`HorseName`,`Jocket`,`Past`,`Br`,`Color`,`Rtg`,`Wt`,`Hcp`,`Trainer`,`itemcn`,`itemmy`,`itemhk`,`RaceCountry`,`RaceNo`,`RaceCardID`,`Age`,`Hwt`,`Hdle`,`Last6Runs`,`Priority`,`Gear`,`Declaration`,`Sex`,`Country`,`SireDam`,`Owner`)
                                 VALUES('$stt_horse','$HorseNo','$HorseName','$jockey','$past','$Br','','$Rtg','$Weight','$hcp','$Trainer','','','','$country','$RaceNo','$RaceID','$age','$hwt','$hdle','$lastrun','$Priority','$gear','$declartion','$sex','$counry','$sireDam','$owner')";
                       $req  = $this->db->query($sql);
                       if($req)
                          $rel = 1;
            }

            if(count($listhorse)< 20)
            {
                for ($j= count($listhorse) + 1; $j <= 20 ; $j++) 
                {
                      if($j < 10)
                        $stt = "0".$j;
                      else
                        $stt = $j;
                      $sql_in = "INSERT INTO `horseinfo`(`HorseNo`,`HorseNoS`,`HorseName`,`Jocket`,`Past`,`Br`,`Color`,`Rtg`,`Wt`,`Hcp`,`Trainer`,`itemcn`,`itemmy`,`itemhk`,`RaceCountry`,`RaceNo`,`RaceCardID`,`Age`,`Hwt`,`Hdle`,`Last6Runs`,`Priority`,`Gear`,`Declaration`,`Sex`,`Country`,`SireDam`,`Owner`)
                                VALUES('$stt','','','','','','','','','','','','','','$country','$RaceNo','$RaceID','','','','','','','','','','','')";
                      $req  = $this->db->query($sql_in);
                }
            }
          }

        }
        else
        {
          // ban dau cho update rong
          for ($i=1; $i <= 20 ; $i++) 
          { 
                  if($i < 10)
                    $stt = "0".$i;
                  else
                    $stt = $i;
                  $sql = "UPDATE `horseinfo` SET `HorseNoS`='',`HorseName`='',`Jocket`='',`Past`='',`Age`='',`Hwt`='',`Hdle`='',`Br`='',`Color`='',`Rtg`='',`Wt`='',`Hcp`='',`Trainer`='',`Last6Runs`='',`Priority`='',`Gear`='',`Declaration`='',`Sex`='',`Country`='',`SireDam`='',`Owner`='',`itemcn`='',`itemmy`='',`itemhk`='' WHERE `HorseNo`='$stt' AND `RaceCardID`='$RaceID' AND `RaceNo` ='$RaceNo' ";
                  $req = $this->db->query($sql);
                  if($req){
                    $rel = 1;
                  }
          }

          // update du lieu moi
          if(count($listhorse) > 0)
          {
                for($i= 0;$i<count($listhorse);$i++)
                {
                  if($i < 9)
                      $stt_horse = "0".($i+1);
                    else
                      $stt_horse = $i+1;
                  if(isset($listhorse[$i]['HorseNo']))
                    $HorseNo   = $listhorse[$i]['HorseNo'];
                  // if($HorseNo <10)
                  //     $HorseNo = '0'.$HorseNo;

                  if(isset($listhorse[$i]['HorseName']))
                  {
                    $HorseName = $listhorse[$i]['HorseName'];
                    $HorseName = str_replace("'","",$HorseName);
                  }
                    
                  if(isset($listhorse[$i]['Weight']))
                    $Weight    = $listhorse[$i]['Weight'];
                  if(isset($listhorse[$i]['Br']))
                    $Br        = $listhorse[$i]['Br'];

                  if(isset($listhorse[$i]['Trainer']))
                  {
                    $Trainer   = $listhorse[$i]['Trainer'];
                    $Trainer   = str_replace("'","",$Trainer);
                  }

                  if(isset($listhorse[$i]['jockey']))
                  {
                    $jockey    = $listhorse[$i]['jockey'];
                    $jockey    = str_replace("'","",$jockey);
                  }

                   if(isset($listhorse[$i]['Rtg']))
                      $Rtg       = $listhorse[$i]['Rtg'];
                    if(isset($listhorse[$i]['age']))
                      $age       = $listhorse[$i]['age'];
                    if(isset($listhorse[$i]['hwt']))
                      $hwt       = $listhorse[$i]['hwt'];  
                    if(isset($listhorse[$i]['hdle']))
                      $hdle     = $listhorse[$i]['hdle'];
                    if(isset($listhorse[$i]['Past']))
                      $past     = $listhorse[$i]['Past'];
                    if(isset($listhorse[$i]['LastRuns']))
                      $lastrun   = $listhorse[$i]['LastRuns'];
                    if(isset($listhorse[$i]['Declaration']))
                      $declartion = $listhorse[$i]['Declaration'];
                    if(isset($listhorse[$i]['Priority']))
                      $Priority  = $listhorse[$i]['Priority'];
                    if(isset($listhorse[$i]['Gear']))
                      $gear   = $listhorse[$i]['Gear'];
                    if(isset($listhorse[$i]['hcp']))
                      $hcp = $listhorse[$i]['hcp'];
                    if(isset($listhorse[$i]['sex']))
                      $sex = $listhorse[$i]['sex'];
                    if(isset($listhorse[$i]['coulor']))
                      $coulor = $listhorse[$i]['coulor'];
                    if(isset($listhorse[$i]['country']))
                      $counry = $listhorse[$i]['country'];
                    if(isset($listhorse[$i]['Owner']))
                      $owner  = $listhorse[$i]['Owner'];
                    if(isset($listhorse[$i]['sireDam']))
                       $sireDam = $listhorse[$i]['sireDam'];
                   $sql_sel = "SELECT * FROM `horseinfo` WHERE `RaceCardID`='$RaceID' AND `RaceNo`='$RaceNo' AND `HorseNo`='$stt_horse'";
                   $arr_list = $this->db->query($sql_sel)->result();
                   if(count($arr_list) != 0)
                   {
                      $sql= "UPDATE `horseinfo` SET `HorseNoS`='$HorseNo',`HorseName`='$HorseName',`Jocket`='$jockey',`Past`='$past',`Age`='$age',`Hwt`='$hwt',`Hdle`='$hdle',`Br`='$Br',`Color`='',`Rtg`='$Rtg',`Wt`='$Weight',`Hcp`='$hcp',`Trainer`='$Trainer',`Last6Runs`='$lastrun',`Priority`='$Priority',`Gear`='$gear',`Declaration`='$declartion',`Sex`='$sex',`Country`='$counry',`SireDam`='$sireDam',`Owner`='$owner' 
                             WHERE `HorseNo`='$stt_horse' AND `RaceCardID`='$RaceID' AND `RaceNo` ='$RaceNo' ";
                      $req = $this->db->query($sql);
                      if($req)
                        $rel = 1;
                   }
                }
              }
        }
        
        if($rel == 1)
        {
            $l_horseinfo = array();
            $l_header    = array();
            $detail      = "";
            $res_horse = $this->get_horseinfo_by_raceid($RaceID);
            $sql_inforace = "SELECT * FROM `racerard` WHERE `RaceID` = '$RaceID'";
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

        $arr = array('RaceNo'=>$RaceNo,'Rel'=>$rel,
                     'l_horeinfo'=>$l_horseinfo,'detail' => $detail,
                      'l_header' =>$l_header,'RaceID'=>$RaceID);
        return $arr;
   }
   
   public function get_horseinfo_by_raceid($raceid)
   {
        $sql="SELECT * FROM `horseinfo` WHERE `RaceCardID` = '$raceid'";
        $query=$this->db->query($sql)->result_array();
        return $query;
   }

   public function UpdateHorseInfoChenese()
   {
        $horseinfo      = $_POST['HorseInfo'];
        $RaceID         = $_POST['RaceCardID'];
        $RaceNo         = $_POST['RaceNo'];
        $country        = substr($RaceID,0,2);
        $listhorse      = json_decode($horseinfo,true);
        $rel = "";
        $HorseNamecn = "";
        $Trainercn = "";
        $jockeycn = "";
        $count = 0;
        $sql_select = "SELECT * FROM `horseinfo` WHERE `RaceCardID`='$RaceID' AND `RaceNo`='$RaceNo' ";
        //echo $sql_select;
        $ar_horseinfo = $this->db->query($sql_select)->result();
        //echo (count($ar_horseinfo));
        if(count($ar_horseinfo) == 0)
        {
          if(count($listhorse) > 0)
          {
            for($i= 0;$i<count($listhorse);$i++)
            {
                    $HorseNo   = $listhorse[$i]['HorseNo'];
                    if($HorseNo <10)
                        $HorseNo = '0'.$HorseNo;
                   
                    if(isset($listhorse[$i]['HorseNamecn']))
                    {
                       $HorseNamecn = $listhorse[$i]['HorseNamecn'];
                       $HorseNamecn = str_replace("'","",$HorseNamecn);
                    } 
                   
                    if(isset($listhorse[$i]['Trainercn']))
                    {
                      $Trainercn   = $listhorse[$i]['Trainercn'];
                      $Trainercn   = str_replace("'","",$Trainercn);
                    }
                      
                    if(isset($listhorse[$i]['jockeycn']))
                    {
                      $jockeycn    = $listhorse[$i]['jockeycn'];
                      $jockeycn    = str_replace("'","",$jockeycn);
                    }

                  $sql = "INSERT INTO `horseinfo`(`HorseNo`,`HorseNoS`,`HorseName`,`Jocket`,`Past`,`Br`,`Color`,`Rtg`,`Wt`,`Hcp`,`Trainer`,`itemcn`,`itemmy`,`itemhk`,`RaceCountry`,`RaceNo`,`RaceCardID`,`Age`,`Hwt`,`Hdle`,`Last6Runs`,`Priority`,`Gear`,`Declaration`,`Sex`,`Country`,`SireDam`,`Owner`)
                          VALUES('$HorseNo','$HorseNo','','','','','','','','','','$HorseNamecn','$Trainercn','$jockeycn','$country','$RaceNo','$RaceID','','','','','','','','','','','')";
                  $req  = $this->db->query($sql);
                   if($req)
                      $rel = 1;
            }

            if(count($listhorse)< 20)
            {
                for ($j= count($listhorse) + 1; $j <= 20 ; $j++) 
                {
                      if($j < 10)
                        $stt = "0".$j;
                      else
                        $stt = $j;
                      $sql_in = "INSERT INTO `horseinfo`(`HorseNo`,`HorseNoS`,`HorseName`,`Jocket`,`Past`,`Br`,`Color`,`Rtg`,`Wt`,`Hcp`,`Trainer`,`itemcn`,`itemmy`,`itemhk`,`RaceCountry`,`RaceNo`,`RaceCardID`,`Age`,`Hwt`,`Hdle`,`Last6Runs`,`Priority`,`Gear`,`Declaration`,`Sex`,`Country`,`SireDam`,`Owner`)
                                VALUES('$stt','','','','','','','','','','','','','','$country','$RaceNo','$RaceID','','','','','','','','','','','')";
                      $req  = $this->db->query($sql_in);
                }
            }
          }

        }
        else
        {
          // ban dau cho update rong
          // for ($i=1; $i <= 20 ; $i++) 
          // { 
          //         if($i < 10)
          //           $stt = "0".$i;
          //         else
          //           $stt = $i;
          //         $sql = "UPDATE `horseinfo` SET `HorseNoS`='',`HorseName`='',`Jocket`='',`Past`='',`Age`='',`Hwt`='',`Hdle`='',`Br`='',`Color`='',`Rtg`='',`Wt`='',`Hcp`='',`Trainer`='',`Last6Runs`='',`Priority`='',`Gear`='',`Declaration`='',`Sex`='',`Country`='',`SireDam`='',`Owner`='',`itemcn`='',`itemmy`='',`itemhk`='' WHERE `HorseNo`='$stt' AND `RaceCardID`='$RaceID' AND `RaceNo` ='$RaceNo' ";
          //         $req = $this->db->query($sql);
          //         if($req){
          //           $rel = 1;
          //         }
          // }

          // update du lieu moi
          if(count($listhorse) > 0)
          {
                for($i= 0;$i<count($listhorse);$i++)
                {
                  $HorseNo   = $listhorse[$i]['HorseNo'];
                  if($HorseNo <10)
                      $HorseNo = '0'.$HorseNo;
                  if(isset($listhorse[$i]['HorseNamecn']))
                  {
                    $HorseNamecn = $listhorse[$i]['HorseNamecn'];
                    $HorseNamecn = str_replace("'","",$HorseNamecn);
                  }

                  if(isset($listhorse[$i]['Trainercn']))
                  {
                    $Trainercn   = $listhorse[$i]['Trainercn'];
                    $Trainercn   = str_replace("'","",$Trainercn);
                  }

                  if(isset($listhorse[$i]['jockeycn']))
                  {
                    $jockeycn    = $listhorse[$i]['jockeycn'];
                    $jockeycn    = str_replace("'","",$jockeycn);
                  }
                   
                   $sql_sel = "SELECT * FROM `horseinfo` WHERE `RaceCardID`='$RaceID' AND `RaceNo`='$RaceNo' AND `HorseNo`='$HorseNo'";
                   $arr_list = $this->db->query($sql_sel)->result();
                   if(count($arr_list) != 0)
                   {
                      $sql= "UPDATE `horseinfo` SET `HorseNoS`='$HorseNo',`itemcn`='$HorseNamecn',`itemmy`='$jockeycn',`itemhk`='$Trainercn'  WHERE `HorseNo`='$HorseNo' AND `RaceCardID`='$RaceID' AND `RaceNo` ='$RaceNo' ";
                      $req = $this->db->query($sql);
                      if($req)
                        $rel = 1;
                   }
                }
              }

        }
          $arr = array('RaceID'=>$RaceID,'RaceNo'=>$RaceNo,'Rel'=>$rel);
          return $arr;
   }

    public function DetailHorseInfo()
    {
        $RaceID         = "";
        $RaceNo         = "";
        $NoOfHorse      = "";
        if(isset($_POST['RaceCardID']))
        {
          $RaceID         = $_POST['RaceCardID'];
        }

        if(isset($_POST['RaceNo']))
        {
          $RaceNo         = $_POST['RaceNo'];
        }
        if($RaceID != "" && $RaceNo != "")
        {
            $sql_sel        = "SELECT * FROM `horseinfo` WHERE `RaceCardID`='$RaceID' AND `RaceNo`='$RaceNo'";
            $arr_list       = $this->db->query($sql_sel)->result();

          $sql_RaceCard   = "SELECT * FROM `racerard` WHERE `RaceID`='$RaceID' AND `RaceNo`='$RaceNo' ";
          $l_RaceCard     = $this->db->query($sql_RaceCard)->result();
          if(count($l_RaceCard) == 0)
          {
            $l_RaceCard = array();
          }  
          $arr  = array('horseInfo'=>$arr_list,'RaceCardID'=>$RaceID,'l_RaceCard'=>$l_RaceCard);
          return $arr;
        }        
    }
    public function GotoDetailHorseInfo()
    {
      $RaceID      = "";
      $RaceNo      = "";
      if(isset($_POST['RaceCardID'])){
          $RaceID         = $_POST['RaceCardID'];
          $str_race       = substr($RaceID,0,8);
          $RaceNo         = substr($RaceID,-2);
      }

      if($RaceID != ""){
          $sql_sel        = "SELECT * FROM `horseinfo` WHERE `RaceCardID`='$RaceID' ";
          $arr_list       = $this->db->query($sql_sel)->result();
          $sql            = "SELECT * FROM `racerard` WHERE `RaceID`='$RaceID'";
          $raceCard       = $this->db->query($sql)->result();
          $sql_c          = "SELECT `rowid`,`RaceNo` FROM `racerard` WHERE LEFT(`RaceID`,8)='$str_race'";
          $l_RaceNo       = $this->db->query($sql_c)->result();
          $arr  = array('horseInfo'=>$arr_list,'raceCard'=>$raceCard,'listRaceNo'=>$l_RaceNo,'RaceID'=>$RaceID,'RaceNo'=>$RaceNo);
          return $arr;
        }
    }
 }