<?php
class M_horse_info extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        
        
    }
    
    public function getListHorseInfo($nooo){
        $today = date("Ymd");
        $sort_today = date("ymd");
        //$today="20150309";
        //$sort_today = "150309";
        if(isset($_POST['country']))
            $country = $_POST['country'];
        else
            $country = "MY";
        
        $livetole_MY=$this->get_livetole_by_country_date_board($country,"MAL",$today);
        $livetole_SIN=$this->get_livetole_by_country_date_board($country,"SIN",$today);
        
        $str_res="";
        if(count($livetole_MY) >0 || count($livetole_SIN) >0)
        {
            if(count($livetole_MY) >0 && count($livetole_SIN) <=0) //save malay & not sin
            {
                    for($i=0;$i<20;$i++)
                    {
                        $str_res .='<tr>
                                         <td align="center" style="width:20%;">';
                                            if($livetole_MY[$i]->Win>0) 
                                                 $str_res .= number_format($livetole_MY[$i]->Win);
                                            else
                                                if($livetole_MY[$i]->Win<0)
                                                    $str_res .= "SCR";
                                          $str_res .='</td>
                                         <td align="center" style="width:20%;">';
                                            if($livetole_MY[$i]->Place>0) 
                                                $str_res .= number_format($livetole_MY[$i]->Place);
                                            else
                                                if($livetole_MY[$i]->Place<0)
                                                    $str_res .= "SCR";
                                          $str_res .='</td>
                                         <td align="center" bgcolor="#00a2e8" style="color:#FFF; width:20%;">'.($i+1).'</td>
                                         
                                         <td align="center" style="width:20%;">&nbsp;</td>
                                         <td align="center" style="width:20%;">&nbsp;</td>
                                    </tr>';
                    }
            }
            else
            {
                if(count($livetole_MY) <=0 && count($livetole_SIN) >0) //save sin & not malay 
                {
                        for($i=0;$i<20;$i++)
                        {
                            $str_res .='<tr>
                                             <td align="center" style="width:20%;">&nbsp;</td>
                                             <td align="center" style="width:20%;">&nbsp;</td>
                                             
                                             <td align="center" bgcolor="#00a2e8" style="color:#FFF; width:20%;">'.($i+1).'</td>
                                             <td align="center" style="width:20%;">';
                                                if($livetole_SIN[$i]->Win>0) 
                                                    $str_res .= number_format($livetole_SIN[$i]->Win);
                                                else
                                                    if($livetole_SIN[$i]->Win<0)
                                                        $str_res .= "SCR";
                                              $str_res .='</td>
                                             <td align="center" style="width:20%;">';
                                                if($livetole_SIN[$i]->Place>0) 
                                                    $str_res .= number_format($livetole_SIN[$i]->Place);
                                                else
                                                    if($livetole_SIN[$i]->Place<0)
                                                        $str_res .= "SCR";
                                              $str_res .='</td>
                                        </tr>';
                        }
                }
                else
                {
                    if(count($livetole_MY) >0 && count($livetole_SIN) >0) //save malay & sin
                    {
                            for($i=0;$i<20;$i++)
                            {
                                $str_res .='<tr>
                                                 <td align="center" style="width:20%;">';
                                                    if($livetole_MY[$i]->Win>0) 
                                                         $str_res .= number_format($livetole_MY[$i]->Win);
                                                    else
                                                        if($livetole_MY[$i]->Win<0)
                                                            $str_res .= "SCR";
                                                  $str_res .='</td>
                                                 <td align="center" style="width:20%;">';
                                                    if($livetole_MY[$i]->Place>0) 
                                                        $str_res .= number_format($livetole_MY[$i]->Place);
                                                    else
                                                        if($livetole_MY[$i]->Place<0)
                                                            $str_res .= "SCR";
                                                  $str_res .='</td>
                                                 <td align="center" bgcolor="#00a2e8" style="color:#FFF; width:20%;">'.($i+1).'</td>
                                                 <td align="center" style="width:20%;">';
                                                    if($livetole_SIN[$i]->Win>0) 
                                                        $str_res .= number_format($livetole_SIN[$i]->Win);
                                                    else
                                                        if($livetole_SIN[$i]->Win<0)
                                                            $str_res .= "SCR";
                                                  $str_res .='</td>
                                                 <td align="center" style="width:20%;">';
                                                    if($livetole_SIN[$i]->Place>0) 
                                                        $str_res .= number_format($livetole_SIN[$i]->Place);
                                                    else
                                                        if($livetole_SIN[$i]->Place<0)
                                                            $str_res .= "SCR";
                                                  $str_res .='</td>
                                            </tr>';
                            }
                    }
                }
            }
        }
        
        //load tbl_part1
        //request 21/03/2015
        
        $str_tblpart_one            = "";
        $race_info = $this->get_race_info_by_country_date($country,$today);
        
        //load hearder
        if(count($race_info)>0)
        {
            $str_tblpart_one        .= '<tbody>';
                        if(isset($_SESSION['langapp']) && $_SESSION['langapp'] == 2)
                        {
                            $str_tblpart_one .= '<tr>
                                <td colspan="6">';
                                if($race_info->items1cn != "") 
                                    $str_tblpart_one .= $race_info->items1cn; 
                                else 
                                    $str_tblpart_one .=  '&nbsp;';
                                $str_tblpart_one .= '</td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <span>';
                                    if($race_info->items2cn != "") 
                                        $str_tblpart_one .= $race_info->items2cn; 
                                    else 
                                        $str_tblpart_one .=  '&nbsp;';
                                    $str_tblpart_one .= '</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6">';
                                    if($race_info->items3cn != "") 
                                        $str_tblpart_one .= $race_info->items3cn; 
                                    else 
                                        $str_tblpart_one .=  '&nbsp;';
                                    $str_tblpart_one .= '</td>
                            </tr>
                            <tr>
                                <td colspan="6">';
                                    if($race_info->items4cn != "") 
                                        $str_tblpart_one .= $race_info->items4cn; 
                                    else 
                                        $str_tblpart_one .=  '&nbsp;';
                                    $str_tblpart_one .= '</td>
                            </tr>';
                        }
                        else
                        {
                            $str_tblpart_one .= '<tr>
                                <td colspan="6">';
                                    if($race_info->items1en != "") 
                                        $str_tblpart_one .= $race_info->items1en; 
                                    else 
                                        $str_tblpart_one .=  '&nbsp;';
                                    $str_tblpart_one .= '</td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                <span>';
                                    if($race_info->items2en != "") 
                                        $str_tblpart_one .= $race_info->items2en; 
                                    else 
                                        $str_tblpart_one .=  '&nbsp;';
                                    $str_tblpart_one .= '</span></td>
                            </tr>
                            <tr>
                                <td colspan="6">';
                                    if($race_info->items3en != "") 
                                        $str_tblpart_one .= $race_info->items3en; 
                                    else 
                                        $str_tblpart_one .=  '&nbsp;';
                                    $str_tblpart_one .= '</td>
                            </tr>
                            <tr>
                                <td colspan="6">';
                                    if($race_info->items4en != "") 
                                        $str_tblpart_one .= $race_info->items4en; 
                                    else 
                                        $str_tblpart_one .=  '&nbsp;';
                                    $str_tblpart_one .= '</td>
                            </tr>';
                        } 
        }
        
        $arr_raceno                 = $this->get_livetole_by_country_date_board_order_by_win_MY_asc($country,"MAL",$today);
        if(count($arr_raceno) > 0)
        {
            $str_tblpart_one        .= '<tr align="center" >
                                        <td bgcolor="#00a2e8" style="color:#FFF"><strong>'.$nooo.'</strong></td>';
            foreach($arr_raceno as $row_raceno)
            {
                $str_tblpart_one    .= '<td style="color:#F00">
                                                <strong><span>'.(int)substr($row_raceno->RaceNo,-2).'</span>
                                          </strong></td>';
            }
                $str_tblpart_one    .= '</tr>
                            <tr align="center" style="color:#FFF">
                                <td bgcolor="#00a2e8" style="color:#FFF"><strong>RM</strong></td>';
            foreach($arr_raceno as $row_raceno)
            {
                $race_infomation    = $this->get_livetole_by_raceno($row_raceno->RaceNo,"MAL");
                $str_tblpart_one    .= '<td><strong>';
                                            if(count($race_infomation)>0)
                                            {
                                                if($race_infomation->Win<0)
                                                    $str_tblpart_one .= "SCR";
                                                else
                                                    $str_tblpart_one .= number_format($race_infomation->Win);
                                            }
                                            else
                                                $str_tblpart_one .= "&nbsp;";
                                            $str_tblpart_one .= '</strong></td>';
                
            }
                $str_tblpart_one    .= '</tr>
                                        <tr align="center" style="color:yellow" >
                                            <td bgcolor="#00a2e8" style="color:#FFF"><strong>$</strong></td>';    
            foreach($arr_raceno as $row_raceno)
            {
                $race_infomation    = $this->get_livetole_by_raceno($row_raceno->RaceNo,"SIN");
                $str_tblpart_one    .= '<td><strong>';
                                            if(count($race_infomation)>0)
                                            {
                                                if($race_infomation->Win<0)
                                                    $str_tblpart_one .= "SCR";
                                                else
                                                    $str_tblpart_one .= number_format($race_infomation->Win);
                                            }
                                            else
                                                $str_tblpart_one .= "&nbsp;";
                                            $str_tblpart_one .= '</strong></td>';
                
            }
                $str_tblpart_one    .= '</tr></tbody>';                
           
        }
        //end request 21/03/2015
        
        $arr=array("str_res" => $str_res,"str_tblpart_one" => $str_tblpart_one,"No"=>$nooo);
        return $arr;
    }
    
    public function load_tbl_part1()
    {
        $today = date("Ymd");
        $sort_today = date("ymd");
        //$today="20150309";
        //$sort_today = "150309";
        
        if(isset($_POST['country']))
            $country = $_POST['country'];
        else
            $country = "MY";
        
        //print_r($country);
            
        $race_info = $this->get_race_info_by_country_date($country,$today);
        
        $str_res="";
        if(count($race_info)>0)
        {
            $ITPH2 = $race_info->ITPH2;
            $arr_ITPH2 = explode("-",$ITPH2);
            if(strlen($arr_ITPH2[0])==1)
                $WIN1=$sort_today."0".$arr_ITPH2[0];
            else
                $WIN1=$sort_today.$arr_ITPH2[0];
            if(strlen($arr_ITPH2[1])==1)
                $WIN2=$sort_today."0".$arr_ITPH2[1];
            else
                $WIN2=$sort_today.$arr_ITPH2[1];
            if(strlen($arr_ITPH2[2])==1)
                $WIN3=$sort_today."0".$arr_ITPH2[2];
            else
                $WIN3=$sort_today.$arr_ITPH2[2];
            if(strlen($arr_ITPH2[3])==1)
                $WIN4=$sort_today."0".$arr_ITPH2[3];
            else
                $WIN4=$sort_today.$arr_ITPH2[3];
            if(strlen($arr_ITPH2[4])==1)
                $WIN5=$sort_today."0".$arr_ITPH2[4];
            else
                $WIN5=$sort_today.$arr_ITPH2[4];
                
            $MY1 = $this->get_livetole_by_country_date_board_raceno($country,"MAL",$today,$WIN1);
            $MY2 = $this->get_livetole_by_country_date_board_raceno($country,"MAL",$today,$WIN2);
            $MY3 = $this->get_livetole_by_country_date_board_raceno($country,"MAL",$today,$WIN3);
            $MY4 = $this->get_livetole_by_country_date_board_raceno($country,"MAL",$today,$WIN4);
            $MY5 = $this->get_livetole_by_country_date_board_raceno($country,"MAL",$today,$WIN5);
            
            $SIN1 = $this->get_livetole_by_country_date_board_raceno($country,"SIN",$today,$WIN1);
            $SIN2 = $this->get_livetole_by_country_date_board_raceno($country,"SIN",$today,$WIN2);
            $SIN3 = $this->get_livetole_by_country_date_board_raceno($country,"SIN",$today,$WIN3);
            $SIN4 = $this->get_livetole_by_country_date_board_raceno($country,"SIN",$today,$WIN4);
            $SIN5 = $this->get_livetole_by_country_date_board_raceno($country,"SIN",$today,$WIN5);
                        
            $str_res .= '<tbody>';
                        if(isset($_SESSION['langapp']) && $_SESSION['langapp'] == 2)
                        {
                            $str_res .= '<tr>
                                <td colspan="6">';
                                if($race_info->items1cn != "") 
                                    $str_res .= $race_info->items1cn; 
                                else 
                                    $str_res .=  '&nbsp;';
                                $str_res .= '</td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <span>';
                                    if($race_info->items2cn != "") 
                                        $str_res .= $race_info->items2cn; 
                                    else 
                                        $str_res .=  '&nbsp;';
                                    $str_res .= '</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6">';
                                    if($race_info->items3cn != "") 
                                        $str_res .= $race_info->items3cn; 
                                    else 
                                        $str_res .=  '&nbsp;';
                                    $str_res .= '</td>
                            </tr>
                            <tr>
                                <td colspan="6">';
                                    if($race_info->items4cn != "") 
                                        $str_res .= $race_info->items4cn; 
                                    else 
                                        $str_res .=  '&nbsp;';
                                    $str_res .= '</td>
                            </tr>';
                        }
                        else
                        {
                            $str_res .= '<tr>
                                <td colspan="6">';
                                    if($race_info->items1en != "") 
                                        $str_res .= $race_info->items1en; 
                                    else 
                                        $str_res .=  '&nbsp;';
                                    $str_res .= '</td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                <span>';
                                    if($race_info->items2en != "") 
                                        $str_res .= $race_info->items2en; 
                                    else 
                                        $str_res .=  '&nbsp;';
                                    $str_res .= '</span></td>
                            </tr>
                            <tr>
                                <td colspan="6">';
                                    if($race_info->items3en != "") 
                                        $str_res .= $race_info->items3en; 
                                    else 
                                        $str_res .=  '&nbsp;';
                                    $str_res .= '</td>
                            </tr>
                            <tr>
                                <td colspan="6">';
                                    if($race_info->items4en != "") 
                                        $str_res .= $race_info->items4en; 
                                    else 
                                        $str_res .=  '&nbsp;';
                                    $str_res .= '</td>
                            </tr>';
                        } 
                            $str_res .= '<tr align="center" >
                                <td bgcolor="#00a2e8" style="color:#FFF"><strong>NO</strong></td>
                                <td style="color:#F00">
                                    <strong><span>'.$arr_ITPH2[0].'</span>
                              </strong></td>
                                <td style="color:#F00">
                                    <strong><span>'.$arr_ITPH2[1].'</span>
                              </strong></td>
                                <td style="color:#F00"><strong>'.$arr_ITPH2[2].'</strong></td>
                                <td style="color:#F00"><strong>'.$arr_ITPH2[3].'</strong></td>
                                <td style="color:#F00"><strong>'.$arr_ITPH2[4].'</strong></td>
                          </tr>
                            <tr align="center" style="color:#FFF">
                                <td bgcolor="#00a2e8" style="color:#FFF"><strong>RM</strong></td>
                                <td><strong>';
                                    if(count($MY1)>0)
                                    {
                                        if($MY1->Win<0)
                                            $str_res .= "SCR";
                                        else
                                            $str_res .= number_format($MY1->Win);
                                    }
                                    else
                                        $str_res .= "&nbsp;";
                                    $str_res .= '</strong></td>
                                <td>
                                    <strong><span>';
                                    if(count($MY2)>0)
                                    {
                                        if($MY2->Win<0)
                                            $str_res .= "SCR";
                                        else
                                            $str_res .= number_format($MY2->Win);
                                    }
                                    else
                                        $str_res .= "&nbsp;";
                                    $str_res .= '</span></strong></td>
                                <td>
                                    <strong><span>';
                                    if(count($MY3)>0)
                                    {
                                        if($MY3->Win<0)
                                            $str_res .= "SCR";
                                        else
                                            $str_res .= number_format($MY3->Win);
                                    }
                                    else
                                        $str_res .= "&nbsp;";
                                    $str_res .= '</span></strong></td>
                                <td><strong>';
                                    if(count($MY4)>0)
                                    {
                                        if($MY4->Win<0)
                                            $str_res .= "SCR";
                                        else
                                            $str_res .= number_format($MY4->Win);
                                    }
                                    else
                                        $str_res .= "&nbsp;";
                                    $str_res .= '</strong></td>
                                <td>
                                    <strong><span>';
                                    if(count($MY5)>0)
                                    {
                                        if($MY5->Win<0)
                                            $str_res .= "SCR";
                                        else
                                            $str_res .= number_format($MY5->Win);
                                    }
                                    else
                                        $str_res .= "&nbsp;";
                                    $str_res .= '</span></strong></td>
                          </tr>
                            <tr align="center" style="color:yellow";>
                                <td bgcolor="#00a2e8" ><strong>$</strong></td>
                                <td><strong>';
                                    if(count($SIN1)>0)
                                    {
                                        if($SIN1->Win<0)
                                            $str_res .= "SCR";
                                        else
                                            $str_res .= number_format($SIN1->Win);
                                    }
                                    else
                                        $str_res .= "&nbsp;";
                                    $str_res .= '</strong></td>
                                <td><strong>';
                                    if(count($SIN2)>0)
                                    {
                                        if($SIN2->Win<0)
                                            $str_res .= "SCR";
                                        else
                                            $str_res .= number_format($SIN2->Win);
                                    }
                                    else
                                        $str_res .= "&nbsp;";
                                    $str_res .= '</strong></td>
                                <td><strong>';
                                    if(count($SIN3)>0)
                                    {
                                        if($SIN3->Win<0)
                                            $str_res .= "SCR";
                                        else
                                            $str_res .= number_format($SIN3->Win);
                                    }
                                    else
                                        $str_res .= "&nbsp;";
                                    $str_res .= '</strong></td>
                                <td>
                                    <strong><span>';
                                    if(count($SIN4)>0)
                                    {
                                        if($SIN4->Win<0)
                                            $str_res .= "SCR";
                                        else
                                            $str_res .= number_format($SIN4->Win);
                                    }
                                    else
                                        $str_res .= "&nbsp;";
                                    $str_res .= '</span></strong></td>
                                <td>
                                    <strong><span>';
                                    if(count($SIN5)>0)
                                    {
                                        if($SIN5->Win<0)
                                            $str_res .= "SCR";
                                        else
                                            $str_res .= number_format($SIN5->Win);
                                    }
                                    else
                                        $str_res .= "&nbsp;";
                                    $str_res .= '</span></strong></td>
                          </tr>
                      </tbody>';
        }    
        $arr=array("str_res"=>$str_res);
        return $arr;
    }

    // public function getListLiveMalAuto(){
    //     $today = date("Ymd");
    //     $sort_today = date("ymd");
    //     //$today="20150309";
    //     //$sort_today = "150309";
    //     if(isset($_POST['country']))
    //         $country = $_POST['country'];
    //     else
    //         $country = "MY";
        
    //     $livetole_MY=$this->get_livetole_by_country_date_board($country,"MAL",$today);
    //     $livetole_SIN=$this->get_livetole_by_country_date_board($country,"SIN",$today);
        
    //     $str_res="";
    //     // if(count($livetole_MY) >0 || count($livetole_SIN) >0)
    //     // {
    //     //     if(count($livetole_MY) >0 && count($livetole_SIN) <=0) //save malay & not sin
    //     //     {
    //     //         // for($i=0;$i<20;$i++)
    //     //         // {
    //     //         //     $str_res .='<tr>
    //     //         //                      <td align="center" style="width:20%;">';
    //     //         //                         if($livetole_MY[$i]->Win>0) 
    //     //         //                              $str_res .= number_format($livetole_MY[$i]->Win);
    //     //         //                         else
    //     //         //                             if($livetole_MY[$i]->Win<0)
    //     //         //                                 $str_res .= "SCR";
    //     //         //                       $str_res .='</td>
    //     //         //                      <td align="center" style="width:20%;">';
    //     //         //                         if($livetole_MY[$i]->Place>0) 
    //     //         //                             $str_res .= number_format($livetole_MY[$i]->Place);
    //     //         //                         else
    //     //         //                             if($livetole_MY[$i]->Place<0)
    //     //         //                                 $str_res .= "SCR";
    //     //         //                       $str_res .='</td>
    //     //         //                      <td align="center" bgcolor="#00a2e8" style="color:#FFF; width:20%;">'.($i+1).'</td>
                                     
    //     //         //                      <td align="center" style="width:20%;">&nbsp;</td>
    //     //         //                      <td align="center" style="width:20%;">&nbsp;</td>
    //     //         //                 </tr>';
    //     //         // }
    //     //     }
    //     //     else
    //     //     {
    //     //         // if(count($livetole_MY) <=0 && count($livetole_SIN) >0) //save sin & not malay 
    //     //         // {
    //     //         //         for($i=0;$i<20;$i++)
    //     //         //         {
    //     //         //             $str_res .='<tr>
    //     //         //                              <td align="center" style="width:20%;">&nbsp;</td>
    //     //         //                              <td align="center" style="width:20%;">&nbsp;</td>
                                             
    //     //         //                              <td align="center" bgcolor="#00a2e8" style="color:#FFF; width:20%;">'.($i+1).'</td>
    //     //         //                              <td align="center" style="width:20%;">';
    //     //         //                                 if($livetole_SIN[$i]->Win>0) 
    //     //         //                                     $str_res .= number_format($livetole_SIN[$i]->Win);
    //     //         //                                 else
    //     //         //                                     if($livetole_SIN[$i]->Win<0)
    //     //         //                                         $str_res .= "SCR";
    //     //         //                               $str_res .='</td>
    //     //         //                              <td align="center" style="width:20%;">';
    //     //         //                                 if($livetole_SIN[$i]->Place>0) 
    //     //         //                                     $str_res .= number_format($livetole_SIN[$i]->Place);
    //     //         //                                 else
    //     //         //                                     if($livetole_SIN[$i]->Place<0)
    //     //         //                                         $str_res .= "SCR";
    //     //         //                               $str_res .='</td>
    //     //         //                         </tr>';
    //     //         //         }
    //     //         // }
    //     //         // else
    //     //         // {
    //     //         //     if(count($livetole_MY) >0 && count($livetole_SIN) >0) //save malay & sin
    //     //         //     {
    //     //         //             for($i=0;$i<20;$i++)
    //     //         //             {
    //     //         //                 $str_res .='<tr>
    //     //         //                                  <td align="center" style="width:20%;">';
    //     //         //                                     if($livetole_MY[$i]->Win>0) 
    //     //         //                                          $str_res .= number_format($livetole_MY[$i]->Win);
    //     //         //                                     else
    //     //         //                                         if($livetole_MY[$i]->Win<0)
    //     //         //                                             $str_res .= "SCR";
    //     //         //                                   $str_res .='</td>
    //     //         //                                  <td align="center" style="width:20%;">';
    //     //         //                                     if($livetole_MY[$i]->Place>0) 
    //     //         //                                         $str_res .= number_format($livetole_MY[$i]->Place);
    //     //         //                                     else
    //     //         //                                         if($livetole_MY[$i]->Place<0)
    //     //         //                                             $str_res .= "SCR";
    //     //         //                                   $str_res .='</td>
    //     //         //                                  <td align="center" bgcolor="#00a2e8" style="color:#FFF; width:20%;">'.($i+1).'</td>
    //     //         //                                  <td align="center" style="width:20%;">';
    //     //         //                                     if($livetole_SIN[$i]->Win>0) 
    //     //         //                                         $str_res .= number_format($livetole_SIN[$i]->Win);
    //     //         //                                     else
    //     //         //                                         if($livetole_SIN[$i]->Win<0)
    //     //         //                                             $str_res .= "SCR";
    //     //         //                                   $str_res .='</td>
    //     //         //                                  <td align="center" style="width:20%;">';
    //     //         //                                     if($livetole_SIN[$i]->Place>0) 
    //     //         //                                         $str_res .= number_format($livetole_SIN[$i]->Place);
    //     //         //                                     else
    //     //         //                                         if($livetole_SIN[$i]->Place<0)
    //     //         //                                             $str_res .= "SCR";
    //     //         //                                   $str_res .='</td>
    //     //         //                             </tr>';
    //     //         //             }
    //     //         //     }
    //     //         // }
    //     //     }
    //     // }
        
    //     //load tbl_part1
    //     //request 21/03/2015
        
    //     $str_tblpart_one            = "";
    //     $race_info = $this->get_race_info_by_country_date($country,$today);
        
    //     //load hearder
    //     if(count($race_info)>0)
    //     {
    //         $str_tblpart_one        .= '<tbody>';
    //                     if(isset($_SESSION['langapp']) && $_SESSION['langapp'] == 2)
    //                     {
    //                         $str_tblpart_one .= '<tr>
    //                             <td colspan="6">';
    //                             if($race_info->items1cn != "") 
    //                                 $str_tblpart_one .= $race_info->items1cn; 
    //                             else 
    //                                 $str_tblpart_one .=  '&nbsp;';
    //                             $str_tblpart_one .= '</td>
    //                         </tr>
    //                         <tr>
    //                             <td colspan="6">
    //                                 <span>';
    //                                 if($race_info->items2cn != "") 
    //                                     $str_tblpart_one .= $race_info->items2cn; 
    //                                 else 
    //                                     $str_tblpart_one .=  '&nbsp;';
    //                                 $str_tblpart_one .= '</span>
    //                             </td>
    //                         </tr>
    //                         <tr>
    //                             <td colspan="6">';
    //                                 if($race_info->items3cn != "") 
    //                                     $str_tblpart_one .= $race_info->items3cn; 
    //                                 else 
    //                                     $str_tblpart_one .=  '&nbsp;';
    //                                 $str_tblpart_one .= '</td>
    //                         </tr>
    //                         <tr>
    //                             <td colspan="6">';
    //                                 if($race_info->items4cn != "") 
    //                                     $str_tblpart_one .= $race_info->items4cn; 
    //                                 else 
    //                                     $str_tblpart_one .=  '&nbsp;';
    //                                 $str_tblpart_one .= '</td>
    //                         </tr>';
    //                     }
    //                     else
    //                     {
    //                         $str_tblpart_one .= '<tr>
    //                             <td colspan="6">';
    //                                 if($race_info->items1en != "") 
    //                                     $str_tblpart_one .= $race_info->items1en; 
    //                                 else 
    //                                     $str_tblpart_one .=  '&nbsp;';
    //                                 $str_tblpart_one .= '</td>
    //                         </tr>
    //                         <tr>
    //                             <td colspan="6">
    //                             <span>';
    //                                 if($race_info->items2en != "") 
    //                                     $str_tblpart_one .= $race_info->items2en; 
    //                                 else 
    //                                     $str_tblpart_one .=  '&nbsp;';
    //                                 $str_tblpart_one .= '</span></td>
    //                         </tr>
    //                         <tr>
    //                             <td colspan="6">';
    //                                 if($race_info->items3en != "") 
    //                                     $str_tblpart_one .= $race_info->items3en; 
    //                                 else 
    //                                     $str_tblpart_one .=  '&nbsp;';
    //                                 $str_tblpart_one .= '</td>
    //                         </tr>
    //                         <tr>
    //                             <td colspan="6">';
    //                                 if($race_info->items4en != "") 
    //                                     $str_tblpart_one .= $race_info->items4en; 
    //                                 else 
    //                                     $str_tblpart_one .=  '&nbsp;';
    //                                 $str_tblpart_one .= '</td>
    //                         </tr>';
    //                     } 
    //     }
        
    //     $arr_raceno                 = $this->get_livetole_by_country_date_board_order_by_win_MY_asc($country,"MAL",$today);
    //     if(count($arr_raceno) > 0)
    //     {
    //         $str_tblpart_one        .= '<tr align="center">
    //                                     <td bgcolor="#00a2e8" style="color:#FFF"><strong>NO</strong></td>';
    //         foreach($arr_raceno as $row_raceno)
    //         {
    //             $str_tblpart_one    .= '<td style="color:#F00">
    //                                             <strong><span>'.(int)substr($row_raceno->RaceNo,-2).'</span>
    //                                       </strong></td>';
    //         }
    //             $str_tblpart_one    .= '</tr>
    //                         <tr align="center">
    //                             <td bgcolor="#00a2e8" style="color:#FFF"><strong>RM</strong></td>';
    //         foreach($arr_raceno as $row_raceno)
    //         {
    //             $race_infomation    = $this->get_livetole_by_raceno($row_raceno->RaceNo,"MAL");
    //             $str_tblpart_one    .= '<td><strong>';
    //                                         if(count($race_infomation)>0)
    //                                         {
    //                                             if($race_infomation->Win<0)
    //                                                 $str_tblpart_one .= "SCR";
    //                                             else
    //                                                 $str_tblpart_one .= number_format($race_infomation->Win);
    //                                         }
    //                                         else
    //                                             $str_tblpart_one .= "&nbsp;";
    //                                         $str_tblpart_one .= '</strong></td>';
                
    //         }
    //             $str_tblpart_one    .= '</tr>
    //                                     <tr align="center">
    //                                         <td bgcolor="#00a2e8" style="color:#FFF"><strong>$</strong></td>';    
    //         foreach($arr_raceno as $row_raceno)
    //         {
    //             $race_infomation    = $this->get_livetole_by_raceno($row_raceno->RaceNo,"SIN");
    //             $str_tblpart_one    .= '<td><strong>';
    //                                         if(count($race_infomation)>0)
    //                                         {
    //                                             if($race_infomation->Win<0)
    //                                                 $str_tblpart_one .= "SCR";
    //                                             else
    //                                                 $str_tblpart_one .= number_format($race_infomation->Win);
    //                                         }
    //                                         else
    //                                             $str_tblpart_one .= "&nbsp;";
    //                                         $str_tblpart_one .= '</strong></td>';
                
    //         }
    //             $str_tblpart_one    .= '</tr></tbody>';                
           
    //     }
    //     //end request 21/03/2015
        
    //     $arr=array("str_res" => $str_res,"str_tblpart_one" => $str_tblpart_one);
    //     return $arr;
    // }
    public function get_race_info_by_country_date($country,$day)
    {
        $sql="SELECT * FROM `raceinfo` WHERE `RaceCountry`='$country' AND `RaceDay`= '$day'";
        $query=$this->db->query($sql)->row();
        return $query;
    }
    public function get_livetole_by_country_date_board_raceno($country,$board,$day,$RaceNo)
    {
        $sql="SELECT * FROM `livetote` WHERE `RaceCountry`='$country' AND `RaceBoard`='$board' AND `RaceDay`= '$day'  AND `RaceNo`='$RaceNo'";
        $query=$this->db->query($sql)->row();
        return $query;
    }
    public function get_livetole_by_country_date_board($country,$board,$day)
    {
        $sql="SELECT * FROM `livetote` WHERE `RaceCountry`='$country' AND `RaceDay`= '$day' AND `RaceBoard`='$board' order by RaceNo";
        $query=$this->db->query($sql)->result();
        return $query;
    }
    public function get_livetole_by_country_date_board_order_by_win_MY_asc($country,$board,$day)
    {
        $sql="SELECT `RaceNo` FROM `livetote` WHERE `RaceCountry`='$country' AND `RaceDay`= '$day' AND `RaceBoard`='$board' AND `Win` > 0 ORDER BY `Win` limit 0,5";
        $query=$this->db->query($sql)->result();
        return $query;
    }
    public function get_livetole_by_raceno($raceno,$board)
    {
        $sql="SELECT * FROM `livetote` WHERE `RaceNo` = '$raceno' AND `RaceBoard` = '$board'";
        $query=$this->db->query($sql)->row();
        return $query;
    }
    /*
	|----------------------------------------------------------------
	| check have race or not by contry & date
	|----------------------------------------------------------------
	*/
    public function check_have_race_by_country_date()
    {
        if(isset($_POST["country"]))
        {
            $country = $_POST["country"];
            $day = $today = date("Ymd");;
            $sql="SELECT count(*) as total FROM `livetote` WHERE `RaceCountry` = '$country' AND `RaceDay` = '$day'";
            $query=$this->db->query($sql)->row();
            $total = $query->total;
            if($total>0)
                return 1;
            else
                return 0;
        }
    }
    
   
}