<?php
class M_listagent extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_list_agent()
    {
        if(isset($_POST['page']) && isset($_POST['username_serialnumber']))
        {
            //$page=3;
            $page=$_POST['page'];
            $username_serialnumber=$_POST['username_serialnumber'];
            $sqlplus = "";
            if($username_serialnumber!="" && $username_serialnumber!=null)
                $sqlplus = "AND (`id` like '%$username_serialnumber%' OR `ImieNo` like '%$username_serialnumber%')";
            $RecordOnePage=$this->getSetting("RecordOnePageListAgent");
            if($page==1 || $page<1 || $page=="")
                $start=0;
            else
                $start=$RecordOnePage*($page-1);
            $limit=$RecordOnePage;
            
            if(isset($_SESSION['AccUserSuper']))
            {
                if($_SESSION['AccUserSuper']['level']==1)
                {
                    $sql="SELECT * FROM `users` 
                           WHERE `level`= 3 ".$sqlplus." ORDER BY `rowid` desc LIMIT $start,$limit";
                }
                else
                {
                    $id=$_SESSION['AccUserSuper']['id'];
                    // if($_SESSION['AccUserSuper']['level']==2)
                    //     $sql="SELECT * FROM `users` 
                    //           WHERE `level`=3 
                    //           AND `pid`='$id' ".$sqlplus." ORDER BY `rowid` desc LIMIT $start,$limit";
                    // else
                    //     $sql="SELECT * FROM `users` 
                    //           WHERE `level`=4 
                    //           AND `pid`='$id' ".$sqlplus." ORDER BY `rowid` desc LIMIT $start,$limit";
                    // thuan edit khi agent level 3 when login  8/11/2015
                    if($_SESSION['AccUserSuper']['level'] == 2)
                    {
                         $sql="SELECT * FROM `users` 
                               WHERE `level`=3 
                               AND `pid`='$id' ".$sqlplus." ORDER BY `rowid` desc LIMIT $start,$limit";
                    }
                    else
                    {
                        if($_SESSION['AccUserSuper']['level'] == 3)
                        {
                            $sql="SELECT * FROM `users` 
                                           WHERE `level`=4 
                                           AND `pid`='$id' ".$sqlplus." ORDER BY `rowid` desc LIMIT $start,$limit";
                        }
                    }

                }
            }
            else
                $sql="SELECT * FROM `users` WHERE `level`=3 ".$sqlplus." ORDER BY `rowid` desc LIMIT $start,$limit";
            //echo $sql;die;
            $query=$this->db->query($sql)->result();
            
            if(isset($_SESSION['AccUserSuper']))
            {
                if($_SESSION['AccUserSuper']['level']==1)
                    $sql_count="SELECT COUNT(*) as total FROM `users` WHERE `level`=3 ".$sqlplus." ORDER BY `rowid` desc";
                else
                {
                    $id=$_SESSION['AccUserSuper']['id'];
                    // if($_SESSION['AccUserSuper']['level']==2)
                    //     $sql_count="SELECT COUNT(*) as total FROM `users` WHERE `level`=3 AND `pid`='$id' ".$sqlplus." ORDER BY `rowid` desc";
                    // else
                    //     $sql_count="SELECT COUNT(*) as total FROM `users` WHERE `level`=4 AND `pid`='$id' ".$sqlplus." ORDER BY `rowid` desc";
                     
                     if($_SESSION['AccUserSuper']['level'] == 2)
                     {
                        $sql_count="SELECT COUNT(*) as total FROM `users` WHERE `level`=3 AND `pid`='$id' ".$sqlplus." ORDER BY `rowid` desc";
                     }

                     if($_SESSION['AccUserSuper']['level'] == 3)
                     {
                        $sql_count="SELECT COUNT(*) as total FROM `users` WHERE `level`=4 AND `pid`='$id' ".$sqlplus." ORDER BY `rowid` desc";
                     }

                }
            }
            else
                $sql_count="SELECT COUNT(*) as total FROM `users` WHERE `level`=3 ".$sqlplus." ORDER BY `rowid` desc";
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
                          $str_list .= '<td>'.$stt.'</td>';
                          $str_list .= '<td><a href="'.base_url('super_admin/agent_page?id='.$row_agent->rowid).'">'.$row_agent->fullname.'</a></td>';
                          $str_list .= '<td><a href="'.base_url('super_admin/agent_page?id='.$row_agent->rowid).'">'.$row_agent->id.'</a></td>';
                          $str_list .= '<td>'.$row_agent->ImieNo.'</td>';
                          $str_list .= '<td>'.$row_agent->verifyCode.'</td>';
                          $str_list .= '<td>'.$row_agent->phonenumber.'</td>';
                          if($row_agent->status==1 || $row_agent->status=="1")
                            $str_list .= '<td>'.$this->lang->line(LANG_ACTIVE).'</td>';
                          else
                            $str_list .= '<td>'.$this->lang->line(LANG_INACTIVE).'</td>';
                          
                          if($_SESSION['AccUserSuper']['level']!=2)
                          $str_list .= '<td>'.$row_agent->currency.number_format($row_agent->fees,2).'</td>';
                          
                          $list_member = $this->m_listagent->get_member_follow_agent($row_agent->id);
                          $total_member = count($list_member);
                          
                          if($_SESSION['AccUserSuper']['level']==3)
                          {
                            if($row_agent->duedate != "")
                            {
                                $arr_duedate = explode(" ",$row_agent->duedate);
                                $arr_duedate = explode("-",$arr_duedate[0]);
                                $str_list .= '<td>'.$arr_duedate[2]."-".$arr_duedate[1]."-".$arr_duedate[0].'</td>';
                            }
                            else
                            {
                                $str_list .= '<td></td>';
                            }
                          }
                          else
                            $str_list .= '<td>'.number_format($total_member).'</td>';
                          $str_list .= '<td>'.$row_agent->remark.'</td>';
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
                            $str_numpage .= '<li ><a href="javascript:void(0);" onclick="get_list_agent('.($page-1).',\''.$username_serialnumber.'\')" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
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
                                    $str_numpage .= '<li><a href="javascript:void(0);" onclick="get_list_agent('.$i.',\''.$username_serialnumber.'\')" >'.$i.'</a></li>';
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
                            $str_numpage .= '<li ><a href="javascript:void(0);" onclick="get_list_agent('.($page+1).',\''.$username_serialnumber.'\')" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                      $str_numpage .='</ul>';
                }
            }
            
            $arr = array("totalrow"=>$totalrow,"str_list"=>$str_list,"str_numpage"=>$str_numpage,"notfound"=>$notfound);
            return $arr;
        }
        
    }
    public function get_member_follow_agent($agent_id)
    {
        $sql="SELECT * FROM `users` WHERE `pid` = '$agent_id' AND `level` = 4";
        $query=$this->db->query($sql)->result();
        return $query;
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