<?php
class M_history_number extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    

    public function savehistorylottery()
    {
        $type = "";
        $str_date = "";
        if(isset($_POST['type']));
          $type = $_POST['type'];
        $result = "";
        $str    = "";
        $arr_history = json_decode($_POST['historylottery']);
        foreach ($arr_history as  $history) 
        {
           $typecon =  $history->typechon;
           $DrawNo  =  $history->DrawNo;
           $Number  =  $history->hNumber;
           $txtday  =  $history->txday;
           $txtday  = explode("/",$txtday);
           $year    = $txtday[2];
           if($year > 50)
            $year = "19".$year;
           else
            $year = "20".$year;
            $str_date = $year.$txtday[1].$txtday[0];
            switch ($type) {
                case 'damacai':
                       $check_date = $this->get_date('lot_damacai',$str_date);
                       if(count($check_date) == 0)
                       {
                            switch ($typecon) 
                            {
                                case 'SP':
                                      $sql_lottery = "INSERT INTO `lot_damacai`(`txday`,`Draw_No`,`Special`)VALUES('$str_date','$DrawNo','$Number')";
                                      $result = $this->db->query($sql_lottery);
                                      if($result)
                                        $str = "Save Damacai success";
                                    break;
                                case 'CON':
                                    $sql_lottery = "INSERT INTO `lot_damacai`(`txday`,`Draw_No`,`Consolation`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Damacai success";
                                    break;
                                case '1ST':
                                    $sql_lottery = "INSERT INTO `lot_damacai`(`txday`,`Draw_No`,`1_3D_1st_Price`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Damacai success";
                                    break;
                                case '2ND':
                                    $sql_lottery = "INSERT INTO `lot_damacai`(`txday`,`Draw_No`,`1_3D_2nd_Price`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Damacai success";
                                    break;
                                case '3RD':
                                    $sql_lottery = "INSERT INTO `lot_damacai`(`txday`,`Draw_No`,`1_3D_3rd_Price`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Damacai success";
                                    break;
                            }
                       }
                        break;
                    case 'magnum':
                         $check_date = $this->get_date('lot_magnum',$str_date);
                        if(count($check_date) == 0)
                        {
                            switch ($typecon) 
                            {
                                case 'SP':
                                      $sql_lottery = "INSERT INTO `lot_magnum`(`txday`,`Draw_No`,`Special`)VALUES('$str_date','$DrawNo','$Number')";
                                      $result = $this->db->query($sql_lottery);
                                      if($result)
                                        $str = "Save Magnum success";
                                    break;
                                case 'CON':
                                    $sql_lottery = "INSERT INTO `lot_magnum`(`txday`,`Draw_No`,`Consolation`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Magnum success";
                                    break;
                                case '1ST':
                                    $sql_lottery = "INSERT INTO `lot_magnum`(`txday`,`Draw_No`,`4D_1st_Price`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Magnum success";
                                    break;
                                case '2ND':
                                    $sql_lottery = "INSERT INTO `lot_magnum`(`txday`,`Draw_No`,`4D_2nd_Price`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Magnum success";
                                    break;
                                case '3RD':
                                    $sql_lottery = "INSERT INTO `lot_magnum`(`txday`,`Draw_No`,`4D_3rd_Price`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Magnum success";
                                    break;
                            }
                        }
                        break;
                    case 'toto':
                         $check_date = $this->get_date('lot_toto4d',$str_date);
                        if(count($check_date) == 0)
                        {
                            switch ($typecon) 
                            {
                                case 'SP':
                                      $sql_lottery = "INSERT INTO `lot_toto4d`(`txday`,`Draw_No`,`Special`)VALUES('$str_date','$DrawNo','$Number')";
                                      $result = $this->db->query($sql_lottery);
                                      if($result)
                                        $str = "Save ToTo success";
                                    break;
                                case 'CON':
                                    $sql_lottery = "INSERT INTO `lot_toto4d`(`txday`,`Draw_No`,`Consolation`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save ToTo success";
                                    break;
                                case '1ST':
                                    $sql_lottery = "INSERT INTO `lot_toto4d`(`txday`,`Draw_No`,`ST_1st_Price`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save ToTo success";
                                    break;
                                case '2ND':
                                    $sql_lottery = "INSERT INTO `lot_toto4d`(`txday`,`Draw_No`,`ST_2nd_Price`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save ToTo Success";
                                    break;
                                case '3RD':
                                    $sql_lottery = "INSERT INTO `lot_toto4d`(`txday`,`Draw_No`,`ST_3rd_Price`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                       $str = "Save ToTo Success"; 
                                    break;
                            }
                        }
                        break;

                    case 'sinfourd':
                         $check_date = $this->get_date('lot_sin4d',$str_date);
                        if(count($check_date) == 0)
                        {
                            switch ($typecon) 
                            {
                                case 'SP':
                                    $sql_lottery = "INSERT INTO `lot_sin4d`(`txday`,`Draw_No`,`Special`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Sin 4D Success";
                                    break;
                                case 'CON':
                                    $sql_lottery = "INSERT INTO `lot_sin4d`(`txday`,`Draw_No`,`Consolation`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                        $str = "Save Sin 4D Success";
                                    break;
                                case '1ST':
                                    $sql_lottery = "INSERT INTO `lot_sin4d`(`txday`,`Draw_No`,`1st`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Sin 4D Success";
                                    break;
                                case '2ND':
                                    $sql_lottery = "INSERT INTO `lot_sin4d`(`txday`,`Draw_No`,`2nd`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Sin 4D Success";
                                    break;
                                case '3RD':
                                    $sql_lottery = "INSERT INTO `lot_sin4d`(`txday`,`Draw_No`,`3rd`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Sin 4D Sucess";
                                    break;
                            }
                        }
                        break;

                    case 'cashsweep':
                         $check_date = $this->get_date('lot_cashsweep',$str_date);
                        if(count($check_date) == 0)
                        {
                            switch ($typecon) 
                            {
                                case 'SP':
                                      $sql_lottery = "INSERT INTO `lot_cashsweep`(`txday`,`Draw_No`,`Special`)VALUES('$str_date','$DrawNo','$Number')";
                                      $result = $this->db->query($sql_lottery);
                                      if($result)
                                        $str = "Save Cash sweep Success";
                                    break;
                                case 'CON':
                                    $sql_lottery = "INSERT INTO `lot_cashsweep`(`txday`,`Draw_No`,`Consolation`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Cash sweep Success";
                                    break;
                                case '1ST':
                                    $sql_lottery = "INSERT INTO `lot_cashsweep`(`txday`,`Draw_No`,`1st`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Cash sweep Success";
                                    break;
                                case '2ND':
                                    $sql_lottery = "INSERT INTO `lot_cashsweep`(`txday`,`Draw_No`,`2nd`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Cash sweep Success";
                                    break;
                                case '3RD':
                                    $sql_lottery = "INSERT INTO `lot_cashsweep`(`txday`,`Draw_No`,`3rd`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Cash sweep Success";
                                    break;
                            }
                        }
                        break;
                    case 'sabah88':
                         $check_date = $this->get_date('lot_sabah',$str_date);
                        if(count($check_date) == 0)
                        {
                            switch ($typecon) 
                            {
                                case 'SP':
                                      $sql_lottery = "INSERT INTO `lot_sabah`(`txday`,`Draw_No`,`Special`)VALUES('$str_date','$DrawNo','$Number')";
                                      $result = $this->db->query($sql_lottery);
                                      if($result)
                                        $str = "Save Sabah 88 Success";
                                    break;
                                case 'CON':
                                    $sql_lottery = "INSERT INTO `lot_sabah`(`txday`,`Draw_No`,`Consolation`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Sabah 88 Success";
                                    break;
                                case '1ST':
                                    $sql_lottery = "INSERT INTO `lot_sabah`(`txday`,`Draw_No`,`1st`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Sabah 88 Success";
                                    break;
                                case '2ND':
                                    $sql_lottery = "INSERT INTO `lot_sabah`(`txday`,`Draw_No`,`2nd`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Sabah 88 Success";
                                    break;
                                case '3RD':
                                    $sql_lottery = "INSERT INTO `lot_sabah`(`txday`,`Draw_No`,`3rd`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save Sabah 88 Success";
                                    break;
                            }
                        }
                        break;
                    case 'stc4d':
                         $check_date = $this->get_date('lot_sandakan',$str_date);
                        if(count($check_date) == 0)
                        {
                            switch ($typecon) 
                            {
                                case 'SP':
                                      $sql_lottery = "INSERT INTO `lot_sandakan`(`txday`,`Draw_No`,`Special`)VALUES('$str_date','$DrawNo','$Number')";
                                      $result = $this->db->query($sql_lottery);
                                      if($result)
                                        $str = "Save STC4D Success";
                                    break;
                                case 'CON':
                                    $sql_lottery = "INSERT INTO `lot_sandakan`(`txday`,`Draw_No`,`Consolation`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save STC4D Success";
                                    break;
                                case '1ST':
                                    $sql_lottery = "INSERT INTO `lot_sandakan`(`txday`,`Draw_No`,`1st`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save STC4D Success";
                                    break;
                                case '2ND':
                                    $sql_lottery = "INSERT INTO `lot_sandakan`(`txday`,`Draw_No`,`2nd`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save STC4D Success";
                                    break;
                                case '3RD':
                                    $sql_lottery = "INSERT INTO `lot_sandakan`(`txday`,`Draw_No`,`3rd`)VALUES('$str_date','$DrawNo','$Number')";
                                    $result = $this->db->query($sql_lottery);
                                    if($result)
                                        $str = "Save STC4D Success";
                                    break;
                            }
                        }
                        break;
            }
        }

        $arr = array('str_tb'=> $str);
        return $arr;
    }

    public function get_date($table,$txday)
    {
        $sql    = "SELECT * FROM $table WHERE `txday`='$txday'";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
}