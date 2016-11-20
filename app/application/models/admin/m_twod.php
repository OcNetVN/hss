<?php
class M_twod extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    /*
    |----------------------------------------------------------------
    | function save all magnum
    |----------------------------------------------------------------
    */
    public function btnsaveall_2d()
    {
        if(isset($_POST["spannumday"]))
        {
            $span_date          =   $_POST["span_date"];
            $arr_date           =   explode("-",$span_date);
            $txday              =   $arr_date[2].$arr_date[1].$arr_date[0];
            $spannumday         =   $_POST["spannumday"];
            $spannumnight       =   $_POST["spannumnight"];
            
            $check_isset_row_db = (int)$this->m_common_lottery->check_isset_row_by_table_txday("lot_2d",$txday)->total;
            
            if($check_isset_row_db > 0)
            {
                $sql                = "UPDATE `lot_2d` SET `day` = '$spannumday', `night` = '$spannumnight' WHERE `txday` = '$txday'";
            }
            else
            {
                $sql                = "INSERT INTO `lot_2d` (`txday`, `Draw_No`, `day`, `night`) 
                                                    VALUES ('$txday', NULL, '$spannumday', '$spannumnight')";
            }
            
            $query                  = $this->db->query($sql);
            
            //return
            if($query)
                return 1;
            else
                return 0;
        }
    }
    /*
    |----------------------------------------------------------------
    | function get data by txtday from table 2d
    |----------------------------------------------------------------
    */
    public function get_data_by_txtdate_2d()
    {
        if(isset($_POST['txtdate']))
        {
            $txday                  =   $_POST['txtdate'];  //dd-mm-yyyy
            
            $arr_txday              =   explode("-",$txday);
            $str_date               =   $arr_txday[2].$arr_txday[1].$arr_txday[0];
            $row_db                 =   $this->m_common_lottery->get_row_by_table_txday("lot_2d",$str_date);
            if(count($row_db)   >   0)
            {
                $row_db             =   get_object_vars($row_db);
                $flag               =   1;
            }
            else
            {
                $flag               =   0;
            }
            
            //return    
            $arr                    =   array(  "flag"      =>  $flag,
                                                "arr_res"   =>  $row_db
                                                );
            return $arr;
        }
    }
}