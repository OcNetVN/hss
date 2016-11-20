<?php
class M_sccresult extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    } 
    
    public function loadSoccerResult()
    {
        $txday = $_POST['seday'];
        $arr_day = "";
        if($txday != "")
        {
            $txday = explode('-', $txday);
            $arr_day = $txday[2].$txday[1].$txday[0];
        }

        if($this->lang->line(LANG_EN) == "English")
        {
            // load result english 
            $arr_event = $this->loadResultBydate($arr_day);
        }
        else
        {
            // load result chinese
            $arr_event = $this->loadResultBydate_cn($arr_day);
        }
        $list_show     = array();
        if(count($arr_event) > 0)
        {
            for($i=0;$i<count($arr_event);$i++)
            {
                 $txday_team   = $arr_event[$i]->txtday;
                 $txday_id     = $arr_event[$i]->ID_event;
                 if($this->lang->line(LANG_EN) == "English")
                 {
                     $list_show[$i]['_event'] = $arr_event[$i]->Name_en;
                     $arr_getteam  = $this->loaddataTem($txday_team,$txday_id);
                 }
                 else
                 {
                    $list_show[$i]['_event'] = $arr_event[$i]->Name_cn;
                    $arr_getteam  = $this->loaddataTem_cn($txday_team,$txday_id);
                 }

                 $list_teamshow = array();
                 if($this->lang->line(LANG_EN) == "English")
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

    public function loadResultBydate($date)
    {
        $sql  = "SELECT * FROM `resultevent` WHERE `txtday`='$date' ";
        $ar_result = $this->db->query($sql)->result();
        return $ar_result;
    }

    public function loaddataTem($date,$id)
    {
        $sql  = "SELECT * FROM `resultteam` WHERE `txtday`='$date' AND `ID_event` ='$id'";
        $ar_result = $this->db->query($sql)->result();
        return $ar_result;
    }

    public function loadResultBydate_cn($date)
    {
        $sql  = "SELECT * FROM `resultevent_cn` WHERE `txtday`='$date' ";
        $ar_result = $this->db->query($sql)->result();
        return $ar_result;
    }

    public function loaddataTem_cn($date,$id)
    {
        $sql  = "SELECT * FROM `resultteam_cn` WHERE `txtday`='$date' AND `ID_event` ='$id'";
        $ar_result = $this->db->query($sql)->result();
        return $ar_result;
    }

    public function loadSoccerinfo()
    {
        $rel = "";
        $sql = "SELECT * FROM `soccer_info` WHERE DATE_FORMAT(`CreatedDate`,'%Y-%m-%d')= DATE_FORMAT(NOW(),'%Y-%m-%d') ORDER BY `CreatedDate` DESC";
        $arr_info = $this->db->query($sql)->result();
        if(count($arr_info) > 0)
        {
            $rel = 1;
        }

        $arr = array("req"=>$rel,"Soccerinfo"=>$arr_info);
        return $arr;
    }

}