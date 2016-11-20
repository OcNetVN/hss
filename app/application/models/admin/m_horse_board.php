<?php
class M_horse_board extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }
        
    public function loadHorseBoard()
    {
        $sql = "SELECT * FROM `horseinfoboard` WHERE DATE_FORMAT(`CreatedDate`,'%Y-%m-%d')= DATE_FORMAT(NOW(),'%Y-%m-%d')";
        $arr_hboard = $this->db->query($sql)->result();
        $arr = array('horseboard' => $arr_hboard);
        return $arr;
    }
      
    public function SaveHorseBoard()
    {
            $connent_r = "";
            $connent   = "";
            if(isset($_POST['content']))
            {
                $connent_r = $_POST['content'];
                $connent = str_replace("'","",$connent_r); 
            }
            
            //$sql = "SELECT  * FROM `horseinfoboard` WHERE DATE_FORMAT(`CreatedDate`,'%Y-%m-%d H:i:s')= DATE_FORMAT(NOW(),'%Y-%m-%d H:i:s')";
            $kq = "";
            $req = "";
            //$horseboard = $this->db->query($sql)->result();
            // if(count($horseboard) == 0)
            // {
               $sql_in = "INSERT INTO `horseinfoboard`(`content`,`CreatedDate`) VALUES('$connent',NOW())";
               $kq = $this->db->query($sql_in);
               if($kq)
                $req = 1;
            // }
            // else
            // {
            //     $sql_up = "UPDATE `horseinfoboard` SET `content`='$connent' WHERE DATE_FORMAT(`CreatedDate`,'%Y-%m-%d H:i:s')= DATE_FORMAT(NOW(),'%Y-%m-%d H:i:s')";
            //     $kq = $this->db->query($sql_up);
            //     if($kq)
            //     $req = 1;
            // }

            $arr = array('req'=>$req);
            return $arr; 
    }
      
      
}