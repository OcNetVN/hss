<?php
class M_soccer extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('app/soccer/m_sccresult');
    }

    public function SaveFileHtmlLvieBoth()
    {
        $str_en = $_POST['str_en'];
        $str_cn = $_POST['str_cn'];
        $show_str = "";
        $lang = "";
        if($this->lang->line(LANG_EN) == "English")
        {
            $lang = "EN";
            $show_str = $str_en;
        }
        else
        {
            $lang= "CN";
            $show_str = $str_cn;
        }

        if (!file_exists('assets/html/'.$lang.'/')) 
        {        
            mkdir('assets/html/'.$lang.'/', 0755, true);
        }

        $copyname    =  'assets/html/EN/result_soccer.html'; 
        $copyname_cn =  'assets/html/CN/result_soccer.html'; 

        $handle = fopen($copyname , 'w+');  
        $result_en = "";
        $result_cn = "";
        if($handle)
        {
            if(fwrite($handle, $str_en ))
                $result_en = "ok";
        }
        fclose($handle);

        $handle_cn = fopen($copyname_cn , 'w+');
        if($handle_cn)
        {
            if(fwrite($handle_cn, $str_cn ))
                $result_cn = "ok";
        }
        fclose($handle_cn);

        $arr = array('lang' => $lang,'_string'=>$show_str);
        return $arr;
    }

    public function SaveFileHtmlTodayBoth()
    {
        
        $str_en = $_POST['str_en'];
        $str_cn = $_POST['str_cn'];
        $show_str = "";
        $lang = "";
        if($this->lang->line(LANG_EN) == "English")
        {
            $lang = "EN";
            $show_str = $str_en;
        }
        else
        {
            $lang= "CN";
            $show_str = $str_cn;
        }

        if (!file_exists('assets/html/'.$lang.'/')) 
        {        
            mkdir('assets/html/'.$lang.'/', 0755, true);
        }

        $copyname    =  'assets/html/EN/soccer_today.html'; 
        $copyname_cn =  'assets/html/CN/soccer_today.html'; 

        $handle = fopen($copyname , 'w+');  
        $result_en = "";
        $result_cn = "";
        if($handle)
        {
            if(fwrite($handle, $str_en ))
                $result_en = "ok";
        }
        fclose($handle);

        $handle_cn = fopen($copyname_cn , 'w+');
        if($handle_cn)
        {
            if(fwrite($handle_cn, $str_cn ))
                $result_cn = "ok";
        }
        fclose($handle_cn);

        $arr = array('lang' => $lang,'_string'=>$show_str);
        return $arr;
    }

    public function SaveFileHtml()
    {
    	$lang = "";
    	$data = $_POST['save_today']; 
        if(isset($_POST['lang']))
             $lang = $_POST['lang'];
    	if (!file_exists('assets/html/'.$lang.'/')) 
    	{        
			mkdir('assets/html/'.$lang.'/', 0755, true);
		}
		$copyname =  'assets/html/'.$lang.'/soccer_today.html';   

		$handle = fopen($copyname , 'w+');  
		if($handle)
		 {
		 	if(fwrite($handle, $data ))
		 		echo "ok";
		 }
			fclose($handle);
    }

    public function SaveFileHtmlResult()
    {
        $lang = "";
        $data = $_POST['save_today']; 
        $lang = "";
         if(isset($_POST['lang']))
             $lang = $_POST['lang'];
       
        if (!file_exists('assets/html/'.$lang.'/')) 
        {        
            mkdir('assets/html/'.$lang.'/', 0755, true);
        }

        $copyname =  'assets/html/'.$lang.'/result_soccer.html';   

        $handle = fopen($copyname , 'w+');  
        if($handle)
        {
            if(fwrite($handle, $data ))
                echo "ok";
        }
            fclose($handle);
    }

    public function SaveFileHtmlEarly()
    {
        $lang = "";
        $data = $_POST['save_today'];
        if(isset($_POST['lang']))
            $lang = $_POST['lang']; 
      
        if (!file_exists('assets/html/'.$lang.'/')) 
        {        
            mkdir('assets/html/'.$lang.'/', 0755, true);
        }

        $copyname =  'assets/html/'.$lang.'/soccer_early.html';   

        $handle = fopen($copyname , 'w+');  
        if($handle)
         {
            if(fwrite($handle, $data ))
                echo "ok";
         }
            fclose($handle);
    }

    public function SaveFileHtmlLvie()
    {
        $lang = "";
        $data = $_POST['save_today']; 
        if(isset($_POST['lang']))
            $lang = $_POST['lang'];
         // if($this->lang->line(LANG_EN) == "English")
         // {
         //    $lang = "EN";
         // }
         // else
         // {
         //    $lang= "CN";
         // }
        if (!file_exists('assets/html/'.$lang.'/')) 
        {        
            mkdir('assets/html/'.$lang.'/', 0755, true);
        }

        $copyname =  'assets/html/'.$lang.'/soccer_live.html';   

        $handle = fopen($copyname , 'w+');  
        if($handle)
         {
            if(fwrite($handle, $data ))
                echo "ok";
         }
            fclose($handle);
    }

    public function SaveLadbrokeFileHtml()
    {
        $lang = "";
        $data = $_POST['save_today']; 
        if(isset($_POST['lang']))
            $lang = $_POST['lang'];
         
        if (!file_exists('assets/html/'.$lang.'/')) 
        {        
            mkdir('assets/html/'.$lang.'/', 0755, true);
        }

        $copyname =  'assets/html/'.$lang.'/ladbroke_soccer.html';   

        $handle = fopen($copyname , 'w+');  
        if($handle)
         {
            if(fwrite($handle, $data ))
                echo "ok";
         }
            fclose($handle);
    }

    public function SaveResulTeam()
    {
        $Result = $_POST['l_result'];
        $lang   = $_POST['lang'];
        if($lang == "EN")
          $tb_team = 'resultteam';
        else
          $tb_team = 'resultteam_cn';
        $txtday = $_POST['txtday'];
        $arr_day = "";
        $res = 0;
        if($txtday != "")
        {
           $txtday = explode('-', $txtday);
           $arr_day = $txtday[2].$txtday[1].$txtday[0];
        }
         
        for($i = 0 ; $i < count($Result);$i++)
        {
            $id        = $Result[$i]['ID'];
            $first     = $Result[$i]['first'];
            $full      = $Result[$i]['full'];
            $sql_sel = "SELECT * FROM $tb_team WHERE `ID_team`='$id'";
            //print_r("Show:" .$tb_team);
            $ar_team = $this->db->query($sql_sel)->result();
            if(count($ar_team) != 0)
            {
                $sql = "UPDATE $tb_team SET `FirstHalf`='$first',`FullTime`='$full'
                        WHERE `ID_team`='$id'";
                $this->db->query($sql);
                $res = 1;
            }
        }

        $arr = array('Result' => $res);
        return $arr;
    }

    public function SaveResultScore()
    {
        $Result = $_POST['l_result'];
        $lang   = $_POST['lang'];
        $txtday = $_POST['txtday'];
        $arr_day = "";
        if($txtday != "")
        {
           $txtday = explode('-', $txtday);
           $arr_day = $txtday[2].$txtday[1].$txtday[0];
        }
        // deletTable 
        if($lang == "EN")
        {
            $this->deletTable('resultevent',$arr_day);
            $this->deletTable('resultteam',$arr_day);
        }
        else
        {
            $this->deletTable('resultevent_cn',$arr_day);
            $this->deletTable('resultteam_cn',$arr_day);
        }
        
        if(count($Result) > 0)
        {
           for($i = 1 ; $i < count($Result);$i++)
           {
                $event = $Result[$i]['_event'];
                if($lang == "EN")
                {
                   $s_inevent = "INSERT INTO `resultevent`(`ID_event`,`txtday`,`Name_en`) 
                                                 VALUES('$i','$arr_day',\"$event\")";
                }
                else
                {
                    $s_inevent = "INSERT INTO `resultevent_cn`(`ID_event`,`txtday`,`Name_cn`) 
                                                 VALUES('$i','$arr_day',\"$event\")";
                }
                
                $this->db->query($s_inevent);
                if(count($Result[$i]['listeam']) > 0)
                {
                  for($j=0;$j < count($Result[$i]['listeam']);$j++)
                  {
                    if(isset($Result[$i]['listeam'][$j]))
                    {
                       $time       = $Result[$i]['listeam'][$j]['teamTime'];
                       $teamA      = $Result[$i]['listeam'][$j]['teamA'];
                       $teamB      = $Result[$i]['listeam'][$j]['teamB'];
                       $firstHalf  = $Result[$i]['listeam'][$j]['FirstHalf'];
                       $fulltime   = $Result[$i]['listeam'][$j]['Fulltime'];
                       
                       if($lang == "EN")
                       {
                            $s_team = "INSERT INTO `resultteam`(`txtday`,`Date_Time`,`Team_A_en`,`Team_B_en`,`FirstHalf`,`FullTime`,`ID_event`)
                                                    VALUES('$arr_day','$time',\"$teamA\",\"$teamB\",'$firstHalf','$fulltime','$i') ";
                        }
                        else
                        {
                            $s_team = "INSERT INTO `resultteam_cn`(`txtday`,`Date_Time`,`Team_A_cn`,`Team_B_cn`,`FirstHalf`,`FullTime`,`ID_event`)
                                                    VALUES('$arr_day','$time',\"$teamA\",\"$teamB\",'$firstHalf','$fulltime','$i') ";
                        }

                         $this->db->query($s_team);
                    }
                  }
                }
           }
        } 
    }

    public function SaveSoccerInfo()
    {
        $connent_r = "";
        $connent   = "";
        if(isset($_POST['content']))
        {
            $connent_r = $_POST['content'];
            $connent = str_replace("'","",$connent_r); 
        }
        $req = "";
        $sql_in = "INSERT INTO `soccer_info`(`content`)VALUES('$connent')";
        $kq = $this->db->query($sql_in);
        if($kq)
          $req = 1;
        $arr = array('req'=>$req);
        return $arr; 
    }

    public function l_ResultDay()
    {
        $lang = $_POST['lang'];
        if($lang = "EN")
          $tb_event = 'resultevent';
        else
          $tb_event = 'resultevent_cn';
        $sql     = "SELECT DISTINCT `txtday` FROM $tb_event ";
        $arr_Race = $this->db->query($sql)->result();
        $arr      = array("Date_U" => $arr_Race);
        return $arr;
    }
    
    public function getEventResult()
    {
        $sqlE       = "SELECT DISTINCT `Name_en` FROM `resultevent`";
        $ar_event   =  $this->db->query($sqlE)->result();
        return $ar_event;
    } 

    public function getTeamResult()
    {
        $sqlTeam  = "SELECT DISTINCT `Team_A_en`,`Team_B_en` FROM `resultteam`";
        $arr_team = $this->db->query($sqlTeam)->result();
        return $arr_team;
    }

    public function l_ResultSoccer()
    {
        $txday = $_POST['seday'];
        $lang  = $_POST['lang'];
        $arr_day = "";
        if($txday != "")
        {
            $txday = explode('-', $txday);
            $arr_day = $txday[2].$txday[1].$txday[0];
        }

        if($lang == "EN")
        {
            // load result english 
            $arr_event = $this->m_sccresult->loadResultBydate($arr_day);
        }
        else
        {
            // load result chinese
            $arr_event = $this->m_sccresult->loadResultBydate_cn($arr_day);
        }
        $list_show     = array();
        if(count($arr_event) > 0)
        {
            for($i=0;$i<count($arr_event);$i++)
            {
                 $txday_team   = $arr_event[$i]->txtday;
                 $txday_id     = $arr_event[$i]->ID_event;
                 if($lang == "EN")
                 {
                     $list_show[$i]['_event'] = $arr_event[$i]->Name_en;
                     $arr_getteam  = $this->m_sccresult->loaddataTem($txday_team,$txday_id);
                 }
                 else
                 {
                    $list_show[$i]['_event'] = $arr_event[$i]->Name_cn;
                    $arr_getteam  = $this->m_sccresult->loaddataTem_cn($txday_team,$txday_id);
                 }

                 $list_teamshow = array();
                 if($lang == "EN")
                 {
                     if(count($arr_getteam) > 0)
                     {
                        for($j=0;$j<count($arr_getteam);$j++)
                        {
                           $list_teamshow[$j]['_id']        =  $arr_getteam[$j]->ID_team;
                           $list_teamshow[$j]['_time']      =  $arr_getteam[$j]->Date_Time;
                           $list_teamshow[$j]['_teamA']     =  $arr_getteam[$j]->Team_A_en;
                           $list_teamshow[$j]['_teamB']     =  $arr_getteam[$j]->Team_B_en;
                           $list_teamshow[$j]['_firsthalf'] =  $arr_getteam[$j]->FirstHalf;
                           $list_teamshow[$j]['_fulltime']  =  $arr_getteam[$j]->FullTime;
                           $list_show[$i]['_match'] = $list_teamshow;
                        } 
                     }
                 }
                 else
                 {
                    if(count($arr_getteam) > 0)
                     {
                        for($j=0;$j<count($arr_getteam);$j++)
                        {
                           $list_teamshow[$j]['_id']        =  $arr_getteam[$j]->ID_team;
                           $list_teamshow[$j]['_time']      =  $arr_getteam[$j]->Date_Time;
                           $list_teamshow[$j]['_teamA']     =  $arr_getteam[$j]->Team_A_cn;
                           $list_teamshow[$j]['_teamB']     =  $arr_getteam[$j]->Team_B_cn;
                           $list_teamshow[$j]['_firsthalf'] =  $arr_getteam[$j]->FirstHalf;
                           $list_teamshow[$j]['_fulltime']  =  $arr_getteam[$j]->FullTime;
                           $list_show[$i]['_match'] = $list_teamshow;
                        } 
                     }
                 }
            }
            //print_r($list_show); 
        }

         $arr = array('l_result'=>$list_show);
        return $arr;
    }

    public function deletTable($name_table,$txtday)
    {
        $sql_del = "DELETE FROM $name_table WHERE `txtday`='$txtday'";
        $this->db->query($sql_del);
    }
     public function SaveFileHtmlResultNew()
    {
        $data = $_POST['save_today'];
        $lang = "";
         if(isset($_POST['lang']))
             $lang = $_POST['lang'];
       
        if (!file_exists('assets/html/'.$lang.'/')) 
        {        
            mkdir('assets/html/'.$lang.'/', 0755, true);
        }

        $copyname =  'assets/html/'.$lang.'/result_soccer_new.html';   

        $handle = fopen($copyname , 'w+');  
        if($handle)
        {
            if(fwrite($handle, $data ))
                echo "ok";
        }
            fclose($handle);
    }

}