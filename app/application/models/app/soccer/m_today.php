<?php
class M_today extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    } 

    public function loadSoccerToday()
    {
       $sql_today = "SELECT * FROM `scc_today`
                    WHERE DATE_FORMAT(`CreadedDay`,'%m-%d-%Y')= DATE_FORMAT(NOW(),'%m-%d-%Y')
                    ORDER BY `CreadedDay` DESC";
       $arr_today = $this->db->query($sql_today)->result();

       $arr = array('l_today'=>$arr_today);
       return $arr;
    }

    public function loadNumberDetail()
    {
        $id   = "";
        $type = "";
        if(isset($_POST['todayID']))
        {
           $id = $_POST['todayID'];
        }

        if(isset($_POST['type']))
        {
            $type = $_POST['type'];
        }

        $sql_1X2 = "SELECT * FROM `scc_1x2`
                    WHERE `RefId`='$id' AND `Type`='$type'";
        $arr_1X2 = $this->db->query($sql_1X2)->result();

        $sql_FH1X2 = "SELECT * FROM `scc_fh_1x2`
                      WHERE `Ref_Id`='$id' AND `Type`='$type'";
        $arr_FH1X2  = $this->db->query($sql_FH1X2)->result();

        $sql_FG_LG = "SELECT * FROM `scc_fg_lg`
                      WHERE `RefId`='$id' AND `Type`='$type'";
        $arr_FG_LG = $this->db->query($sql_FG_LG)->result();

        $sql_asian = "SELECT * FROM `scc_asian_1x2`
                      WHERE `RefId`='$id' AND `Type`='$type'";
        $arr_asian = $this->db->query($sql_asian)->result();

        $sql_correct_score = "SELECT * FROM `scc_correct_score`
                              WHERE `RefId`='$id' AND `Type`='$type'";
        $arr_correct_score = $this->db->query($sql_correct_score)->result();

        $sql_double_chance = "SELECT * FROM `scc_double_chance`
                              WHERE `RefId`='$id' AND `Type`='$type'";
        $arr_double_chance = $this->db->query($sql_double_chance)->result();

        $sql_fh_correct_score = "SELECT * FROM `scc_fh_correct_score`
                                 WHERE `RefId`='$id' AND `Type`='$type'";
        $arr_fh_correct_score = $this->db->query($sql_fh_correct_score)->result();

        $sql_ht_ft            = "SELECT * FROM `scc_ht_ft`
                                  WHERE `RefId`='$id' AND `Type`='$type'";
        $arr_ht_ft            = $this->db->query($sql_ht_ft)->result();

        $sql_oe               = "SELECT * FROM `scc_oe`
                                WHERE `RefId`='$id' AND `Type`='$type'";
        $arr_oe               = $this->db->query($sql_oe)->result();

        $sql_total_goal       = "SELECT * FROM `scc_total_goal`
                                WHERE `RefId`='$id' AND `Type`='$type'";
        $arr_total_goal      =  $this->db->query($sql_total_goal)->result();

        $sql_home_team       = "SELECT * FROM `scc_home_team`
                                WHERE `RefId`='$id' AND `Type`='$type'";
        $arr_home_team       = $this->db->query($sql_home_team)->result();

        $sql_away_team       = "SELECT * FROM `scc_away_team`
                                WHERE `RefId`='$id' AND `Type`='$type'";
        $arr_away_team       = $this->db->query($sql_away_team)->result();

        $arr = array('scc_1X2'=>$arr_1X2,'scc_FH1X2'=>$arr_FH1X2,
                    'scc_FG_LG'=>$arr_FG_LG,'scc_asian'=>$arr_asian,
                    'scc_correct_score'=>$arr_correct_score,'scc_double_chance'=>$arr_double_chance,
                    'scc_fh_correct'=>$arr_fh_correct_score,'scc_ht_ft'=>$arr_ht_ft,
                    'scc_oe'=>$arr_oe,'scc_total'=>$arr_total_goal,
                    'scc_home_team'=>$arr_home_team,'scc_away_team'=>$arr_away_team);
        return $arr;
    }

    public function GetHTML($fname,$lang)
    {
        $page_html = file_get_contents('assets/html/'.$lang.'/' . $fname);
        $html ='assets/html/'.$lang.'/' . $fname;
        //$extract = $this->getTextBetweenTags($page_html);
        return $page_html;
    }

}