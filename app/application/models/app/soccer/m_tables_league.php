<?php
class M_tables_league extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    } 

    public function load_list_all_table()
    {
       $sql_all_tables = "  SELECT a.`CountryName` AS CountryName ,a.`Flag` AS Flag ,a.`id` AS id, COUNT(*) AS tong
                            FROM `scc_all_tables` a 
                            LEFT JOIN `scc_league_tables` b ON a.`id`=b.`RefIdFlag`
                            GROUP BY  CountryName ,Flag,id ";

       $arr_all_tables = $this->db->query($sql_all_tables)->result();
       $arr = array('l_all_tables'=>$arr_all_tables);
       return $arr;
    }

    public function load_list_league_tables()
    {
        $RefID = "";
        if(isset($_POST['ID']))
          $RefID = $_POST['ID'];

        $sql_league_table = "SELECT `id`,`League` FROM `scc_league_tables` WHERE `RefIdFlag`='$RefID'";
        $arr_league_table = $this->db->query($sql_league_table)->result();
        $arr = array('league_table'=>$arr_league_table);
        return $arr;
    }

    public function load_list_table_detail()
    {
        $RefID = "";
        if(isset($_POST['ID']))
          $RefID = $_POST['ID'];
        
        $sql_league_table = "SELECT `League` FROM `scc_league_tables` WHERE `id` ='$RefID'";
        $NameLeague  = $this->db->query($sql_league_table)->result();
        $sql_table = "SELECT * FROM `scc_tables` WHERE `RefIdLeague`='$RefID'";
        $arr_table = $this->db->query($sql_table)->result();
        $arr = array('l_table'=>$arr_table,'League'=>$NameLeague);
        return $arr;
    }
}
