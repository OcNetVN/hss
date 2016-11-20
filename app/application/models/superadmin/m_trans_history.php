<?php
class M_trans_history extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function show_all_trans()
    {
        if(isset($_POST['page']))
        {
            //$page=3;
            $page                   = $_POST['page'];
            $datefrom               = $_POST['datefrom'];   //dd-mm-yyyy
            $dateto                 = $_POST['dateto'];     //dd-mm-yyyy
            if(strlen($datefrom) == 10 && strlen($dateto) == 10)
            {
                $arr_datefrom       = explode("-",$datefrom);
                $str_datefrom       = $arr_datefrom[2]."-".$arr_datefrom[1]."-".$arr_datefrom[0];
                
                $arr_dateto         = explode("-",$dateto);
                $str_dateto         = $arr_dateto[2]."-".$arr_dateto[1]."-".$arr_dateto[0];
                
                $sql_plus           = " AND `CreatedDate` BETWEEN '$str_datefrom 00:00:01' AND '$str_dateto 23:59:59' ";
            }
            $RecordOnePage=$this->getSetting("RecordOnePageTransHistory");
            if($page==1 || $page<1 || $page=="")
                $start=0;
            else
                $start=$RecordOnePage*($page-1);
            $limit=$RecordOnePage;
            
            if(isset($_SESSION['AccUserSuper']))
            {
                if($_SESSION['AccUserSuper']['level']==1)
                    $sql="SELECT * FROM `userlogs` where 1=1 $sql_plus ORDER BY `CreatedDate` DESC LIMIT $start,$limit";
                else
                { 
                    $id=$_SESSION['AccUserSuper']['id'];
                    if($_SESSION['AccUserSuper']['level']==2)
                        $sql="SELECT * FROM `userlogs` WHERE `pid` = '$id' $sql_plus ORDER BY `CreatedDate` DESC LIMIT $start,$limit";
                    else
                        $sql="SELECT * FROM `userlogs` WHERE `pid` = '$id' $sql_plus ORDER BY `CreatedDate` DESC LIMIT $start,$limit";
                }         
            }
            else
                $sql="SELECT * FROM `userlogs` ORDER BY `CreatedDate` DESC LIMIT $start,$limit";
            $query=$this->db->query($sql)->result();
            
            if(isset($_SESSION['AccUserSuper']))
            {
                if($_SESSION['AccUserSuper']['level']==1)
                    $sql_count="SELECT COUNT(*) as total FROM `userlogs` where 1=1 $sql_plus ORDER BY `CreatedDate` DESC";
                else
                {
                    $id=$_SESSION['AccUserSuper']['id'];
                    if($_SESSION['AccUserSuper']['level']==2)
                        $sql_count="SELECT COUNT(*) as total FROM `userlogs` WHERE `pid` = '$id' $sql_plus ORDER BY `CreatedDate` DESC";
                    else
                        $sql_count="SELECT COUNT(*) as total FROM `userlogs` WHERE `pid` = '$id' $sql_plus ORDER BY `CreatedDate` DESC";
                }
            }
            else
                $sql_count="SELECT COUNT(*) as total FROM `userlogs` where 1=1 $sql_plus ORDER BY `CreatedDate` DESC";
            $query_count=$this->db->query($sql_count)->row();
            $totalrow= $query_count->total;
            
            $str_list="";
            $str_numpage="";
            $notfound="<strong style=\"margin:10px;\">".$this->lang->line(LANG_NOT_HAVE_ANY_ROW)."</strong>";
            if($totalrow>0)
            {
                $notfound="";
                $stt=$start+1;
                foreach($query as $row_agent)
                {
                    $str_list .= '<tr>';
                          //$str_list .= '<td>'.$stt.'</td>';
                          $str_list .= '<td>'.$row_agent->UserID.'</td>';
                          $str_list .= '<td>'.$row_agent->fullname_new.'</td>';
                          $str_list .= '<td>'.$row_agent->UserName.'</td>';
                          $str_list .= '<td>'.$row_agent->Status_old.'</td>';
                          $str_list .= '<td>'.$row_agent->remark_old.'</td>';
                          $str_list .= '<td>'.$row_agent->statusdate_old.'</td>';
                          $str_list .= '<td>'.$row_agent->Status_new.'</td>';
                          $str_list .= '<td>'.$row_agent->remark_new.'</td>';
                          $str_list .= '<td>'.$row_agent->statusdate_new.'</td>';
                          
                          $time=$row_agent->CreatedDate;
                          $arr_time=explode(" ",$time);
                          $arr_date=explode("-",$arr_time[0]);
                          $date=$arr_date[2]."/".$arr_date[1]."/".$arr_date[0];
                          $date=$date." ".substr($arr_time[1],0,-3);
                          $str_list .= '<td>'.$date.'</td>';
                          
                      $str_list .= '</tr>';
                    $stt++;
                }
                //tinh so trang
                $num_page=ceil($totalrow/$limit);
                
                //set previous page of current page
                if($page<=3)
                    $limitprecurrentpage=1;
                else
                    $limitprecurrentpage=$page-2;
                //set next page of current page
                if($page>=($num_page -2))
                    $limitnextcurrentpage=$num_page;
                else
                    $limitnextcurrentpage=$page+2;
                    
                if($num_page>0)
                {
                    $str_numpage .= '<ul class="pagination ">';
                        if($page==1)
                            $str_numpage .= '<li class="disabled"><a href="javascript:void(0);" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                        else
                            $str_numpage .= '<li ><a href="javascript:void(0);" onclick="show_all_trans('.($page-1).')" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                        $runpre=0;
                        $runnext=0;
                        $flag=0;
                        for($i=1;$i<=$num_page;$i++)
                        {
                            if($i>=$limitprecurrentpage && $i<=$limitnextcurrentpage)
                            {
                                if($page == $i)
                                    $str_numpage .= '<li class="active"><a href="javascript:void(0);" >'.$i.'</a></li>';
                                else
                                    $str_numpage .= '<li><a href="javascript:void(0);" onclick="show_all_trans('.$i.')" >'.$i.'</a></li>';
                            }
                            else
                            {
                                if($i<=$page)
                                {
                                    if($runpre==0)
                                    {
                                        $str_numpage .= '<li><span>..</span></li>'; 
                                        $runpre++;
                                    }
                                } 
                                if($i>=$page)
                                {
                                    if($runnext==0)
                                    {
                                        $str_numpage .= '<li><span>..</span></li>'; 
                                        $runnext++;
                                    }
                                }
                            }
                        }
                        if($page==$num_page)
                            $str_numpage .= '<li class="disabled"><a href="javascript:void(0);" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                        else
                            $str_numpage .= '<li ><a href="javascript:void(0);" onclick="show_all_trans('.($page+1).')" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                      $str_numpage .='</ul>';
                }
            }
            
            $arr = array("totalrow"=>$totalrow,"str_list"=>$str_list,"str_numpage"=>$str_numpage,"notfound"=>$notfound);
            return $arr;
        }
        
    }
   public function click_btn_clear_history()
   {
        if(isset($_SESSION['AccUserSuper']))
        {
            if($_SESSION['AccUserSuper']['level']==1)
                $sql="DELETE FROM `userlogs`";
            else
            {
                $id=$_SESSION['AccUserSuper']['id'];
                if($_SESSION['AccUserSuper']['level']==2)
                    $sql="DELETE FROM `userlogs` WHERE `id` ='$id'";
                else
                    $sql="DELETE FROM `userlogs` WHERE `id` ='$id'";
            }
        }
        else
            $sql="DELETE FROM `userlogs`";
        $query= $this->db->query($sql);
        if($query)
            return 1;
        else
            return 0;
   }
    //get valuekey from file setting.xml
   public function getSetting($key)
    {
        $url=base_url('assets/setting/setting.xml');
        //echo $url;die;
        $value ="";
        try{
            $xml = simplexml_load_file($url);       
            $value = (string) $xml->$key;              
        }catch(exception $e)
        {
            
        }
        return $value;
    }
}