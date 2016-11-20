<?php
class M_sell_phone_page extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    /*
    |-------------------------------------------
    | function button save selllphone
    |-------------------------------------------
    */
    public function btnsave_sellphone()
    {
        if(isset($_POST["agenname"]))
        {
            $agenname           =   $_POST["agenname"];
            $raprice            =   $_POST["raprice"];
            $phonemodel         =   $_POST["phonemodel"];
            $txtprice           =   $_POST["txtprice"];
            $txtemei            =   $_POST["txtemei"];
            $txtdatetaken       =   $_POST["txtdatetaken"];     //dd-mm-yyyy
            $txt_remark         =   $_POST["txt_remark"];
            $rastatus           =   $_POST["rastatus"];
            
            $arr_datetaken      =   explode("-",$txtdatetaken);
            $datetaken          =   $arr_datetaken[2]."-".$arr_datetaken[1]."-".$arr_datetaken[0]."-"." 18:18:18";
                        
            $createby           =   $_SESSION['AccUserSuper']['id'];
            
            $this->db->trans_start();
            $sql                =   "INSERT INTO `sellphone` 
                                                (`id`, `ImieNo`,   `Agent`,     `PhoneModel`,   `currency`,   `Price`,      `Remark`,    `DateTaken`, `CreatedDate`, `CreatedBy`,   `Status`,    `ModifiedDate`, `ModifiedBy`) 
                                         VALUES (NULL, '$txtemei', '$agenname', '$phonemodel',   '$raprice', '$txtprice', '$txt_remark', '$datetaken',     NOW(),     '$createby',  '$rastatus',        NULL,           NULL)";
            $query              =   $this->db->query($sql);
            
                        $percenttax         =   (int)$this->m_gen_statement->get_percenttax()->NumValue1;
            
                        $year               =   date("Y");
                        $month              =   date("m");
                        $day                =   date("d");
                        if($day < 10)
                        {
                            if(strlen((int)$month)       == 1)
                            {
                                $month        = (int)($month-1);
                                if($month     == 0 || $month == "0")
                                {
                                    $year           = $year-1;
                                    $month    = "12";
                                }
                                else
                                    $month    =   "0".$month;
                            }
                            else
                            {
                                $year         = $year;
                                $month        = (int)($month-1);
                                if($month == 9)
                                    $month    = "09";
                            }
                        }
                        $username           =   $agenname;
                        /*$sql_select         =   "SELECT * FROM `users` WHERE `rowid` = $id"; //customer
                        $query_select       =   $this->db->query($sql_select)->row();
                        $pid                =   $query_select->pid;*/
                        
                        $sql_statement      =   "SELECT * FROM `statement` WHERE `UserID` = '$username' AND SUBSTRING(`FixDate`,1,7) = '$year-$month'";
            			//echo $sql_statement;die;
                        $query_statement    =   $this->db->query($sql_statement)->row();
                        $status_statement   =   $query_statement->Status;
                        $havetopay_statement=   $query_statement->HaveToPay;
                        $tax                =   (int)$query_statement->Tax;
                        
                        $ActiveUser_new     =   (int)$query_statement->ActiveUser;
                        $NewMember1_15_new  =   (int)$query_statement->NewMember1_15;
                        $NewMember16_31_new =   (int)$query_statement->NewMember16_31;
                        
                        $tax_new                        =   $tax + (int)$txtprice*$percenttax/100;
                        $tax_plus                       =   (int)$txtprice*$percenttax/100;
                        
                        $havetopay_statement_new        =   $havetopay_statement + $txtprice + $tax_plus;
                        
                        $sql_update_statement               =   "UPDATE `statement` SET 
                                                                        `HaveToPay`     = '$havetopay_statement_new',
                                                                        `Tax`           = '$tax_new',
                                                                        `ActiveUser`    = '$ActiveUser_new',
                                                                        `NewMember1_15` = '$NewMember1_15_new',
                                                                        `NewMember16_31`= '$NewMember16_31_new'   
                                                                    WHERE `UserID` = '$username' AND SUBSTRING(`FixDate`,1,7) = '$year-$month'";
                        $query_update_statement             =   $this->db->query($sql_update_statement);
                        
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                $stt            =   0;
                break;
            }            
            else
                $stt            =   1;
            //return
            $arr                =   array(
                                            "stt"           =>  $stt,
                                            );
            return $arr;
        }
    }
    /*
    |-------------------------------------------
    | function get list sellphone
    |-------------------------------------------
    */
    public function get_list_sellphone()
    {
        if(isset($_POST['page']))
        {
            //$page=3;
            $page                       =   $_POST['page'];
            $RecordOnePage              =   $this->m_listagent->getSetting("RecordOnePageListSellphone");
            if($page == 1 || $page < 1 || $page == "")
                $start                  =   0;
            else
                $start                  =   $RecordOnePage*($page-1);
            $limit                      =   $RecordOnePage;
            
            $sql                        =   "SELECT * FROM `sellphone` WHERE 1 = 1 ORDER BY `id` desc LIMIT $start,$limit";
            $query                      =   $this->db->query($sql)->result();
            
            $sql_count                  =   "SELECT COUNT(*) as total FROM `sellphone` WHERE 1 = 1 ORDER BY `id` desc";
            $query_count                =   $this->db->query($sql_count)->row();
            $totalrow                   =   $query_count->total;
            
            $str_list                   =   "";
			$str_numpage                =   "";
            $notfound                   =   "<strong style=\"margin:10px;\">".$this->lang->line(LANG_NOT_HAVE_ANY_ROW)."</strong>";
            if($totalrow>0)
            {
                $notfound               =   "";
                $stt                    =   $start+1;
                foreach($query as $row_sellphone)
                {
                    $datetaken          =   $row_sellphone->DateTaken;  //yyyy-mm-dd hh:mm:ss
                    $strdatetaken       =   substr($datetaken,8,2)."-".substr($datetaken,5,2)."-".substr($datetaken,0,4);
                    
                    $str_list .= '<tr>';
                          $str_list .= '<td>'.$stt.'</td>';
                          $str_list .= '<td><a href="'.base_url('super_admin/sellphone_page?id='.$row_sellphone->id).'">'.$row_sellphone->Agent.'</a></td>';
                          $str_list .= '<td><a href="'.base_url('super_admin/sellphone_page?id='.$row_sellphone->id).'">'.$row_sellphone->PhoneModel.'</a></td>';
                          $str_list .= '<td>'.number_format($row_sellphone->Price).'</td>';
                          $str_list .= '<td>'.$row_sellphone->ImieNo.'</td>';
                          $str_list .= '<td>'.$strdatetaken.'</td>';
                          if($row_sellphone->Status==1 || $row_sellphone->Status=="1")
                            $str_list .= '<td>'.$this->lang->line(LANG_ACTIVE).'</td>';
                          else
                            $str_list .= '<td>'.$this->lang->line(LANG_INACTIVE).'</td>';
                            
                          $str_list .= '<td>'.$row_sellphone->Remark.'</td>';
                      $str_list .= '</tr>';
                    $stt++;
                }
                //tinh so trang
                $num_page                   =   ceil($totalrow/$limit);
                
                //set previous page of current page
                if($page <= 3)
                    $limitprecurrentpage    =   1;
                else
                    $limitprecurrentpage    =   $page-2;
                //set next page of current page
                if($page >= ($num_page -2))
                    $limitnextcurrentpage   =   $num_page;
                else
                    $limitnextcurrentpage   =   $page+2;
               
                if($num_page > 0)
                {
                    $str_numpage .= '<ul class="pagination ">';
                        if($page == 1)
                            $str_numpage .= '<li class="disabled"><a href="javascript:void(0);" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                        else
                            $str_numpage .= '<li ><a href="javascript:void(0);" onclick="get_list_sellphone('.($page-1).')" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                        $runpre             =   0;
                        $runnext            =   0;
                        $flag               =   0;
                        for($i = 1; $i <= $num_page; $i ++)
                        {
                            if($i >= $limitprecurrentpage && $i <= $limitnextcurrentpage)
                            {
                                if($page == $i)
                                    $str_numpage .= '<li class="active"><a href="javascript:void(0);" >'.$i.'</a></li>';
                                else
                                    $str_numpage .= '<li><a href="javascript:void(0);" onclick="get_list_sellphone('.$i.')" >'.$i.'</a></li>';
                            }
                            else
                            {
                                if($i <= $page)
                                {
                                    if($runpre == 0)
                                    {
                                        $str_numpage .= '<li><span>..</span></li>'; 
                                        $runpre++;
                                    }
                                } 
                                if($i >= $page)
                                {
                                    if($runnext == 0)
                                    {
                                        $str_numpage .= '<li><span>..</span></li>'; 
                                        $runnext++;
                                    }
                                }
                            }
                        }
                        if($page == $num_page)
                            $str_numpage .= '<li class="disabled"><a href="javascript:void(0);" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                        else
                            $str_numpage .= '<li ><a href="javascript:void(0);" onclick="get_list_sellphone('.($page+1).')" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                      $str_numpage .= '</ul>';
                }
            }
            
            $arr = array("totalrow"=>$totalrow,"str_list"=>$str_list,"str_numpage"=>$str_numpage,"notfound"=>$notfound);
            return $arr;
        }
        
    }
    /*
    |-------------------------------------------
    | function button save edit selllphone
    |-------------------------------------------
    */
    public function btnsaveedit_sellphone()
    {
        $agenname           =   $_POST["agenname"];
        $raprice            =   $_POST["raprice"];
        $phonemodel         =   $_POST["phonemodel"];
        $txtprice           =   $_POST["txtprice"];
        $txtemei            =   $_POST["txtemei"];
        $txtdatetaken       =   $_POST["txtdatetaken"];     //dd-mm-yyyy
        $txt_remark         =   $_POST["txt_remark"];
        $rastatus           =   $_POST["rastatus"];
        
        $arr_datetaken      =   explode("-",$txtdatetaken);
        $datetaken          =   $arr_datetaken[2]."-".$arr_datetaken[1]."-".$arr_datetaken[0]."-"." 18:18:18";
                    
        $createby           =   $_SESSION['AccUserSuper']['id'];
        $sql                =   "UPDATE `sellphone` SET 
                                    `ImieNo` = '$txtemei', `Agent` = '$agenname', 
                                    `PhoneModel` = '$phonemodel', `currency` = '$raprice', 
                                    `Price` = '$txtprice', `Remark` = '$txt_remark', `DateTaken` = '$datetaken', 
                                    `Status` = '$rastatus', `ModifiedDate` = NOW(), `ModifiedBy` = '$createby' 
                            WHERE `id` = 1";
        $query              =   $this->db->query($sql);
        if($query)
            $stt            =   1;
        else
            $stt            =   0;
        //return
        $arr                =   array(
                                        "stt"           =>  $stt,
                                        );
        return $arr;
    }
    /*
    |-------------------------------------------
    | function del sellphone
    |-------------------------------------------
    */
    public function btndel_sellphone()
    {
        $id = $_POST['id'];
        if($id != ""){
            $sql_sel = "SELECT * FROM `sellphone`  WHERE `id` = '$id'";
            $arr_sel = $this->db->query($sql_sel)->result();
            if(count($arr_sel) > 0){
                $sql = "DELETE FROM `sellphone` WHERE `id` = '$id'";
            }    
        }
        $query=$this->db->query($sql);
        if($query)
            $arr=array("stt"=>1);
        else
            $arr=array("stt"=>0);
        return $arr;
    }
    
    /*
    |-------------------------------------------
    | function get sell phone by id
    |-------------------------------------------
    */
    public function get_sell_phone_by_id($id)
    {
        $sql    =   "SELECT * FROM `sellphone` WHERE `id` = $id";
        $query  =   $this->db->query($sql)->row();
        return $query;
    }
}