<?php
class M_feedback_custom extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    } 

    public function SaveFeedback()
    {
       $serailNumber = "";
       $result = '';
       $conEnglish ='';
       $conChinese ='';
       if(isset($_SESSION['serialNumber']))
            $serailNumber = $_SESSION['serialNumber'];
       if(isset($_POST['conEnglish']))
          $conEnglish = $_POST['conEnglish'];
       if(isset($_POST['conChinese']))
          $conChinese = $_POST['conChinese'];
       $sql = "INSERT INTO `feelback_custom`(`SeriaNumber`,`ConEnglish`,`ConChinese`,`CreatedBy`,`CreatedDate`)
                                     VALUES ('$serailNumber','$conEnglish','$conChinese','',NOW())";
       $req = $this->db->query($sql);
       if($req)
          $result = 1;

        $arr = array('req'=>$result);
        return $arr;
    }
}