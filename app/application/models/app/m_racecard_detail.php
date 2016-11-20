<?php
class M_racecard_detail extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function loadhorseinfo(){
        if(isset($_POST['raceid']))
        {
            $raceid = $_POST['raceid'];
            $res_horse = $this->get_horseinfo_by_raceid($raceid);
            //print_r($res_horse);die;
            $str_res="";
            if(count($res_horse)>0)
            {
                $str_res .= '<tr width="100%" style="font-size:16px;">
                        <td width="5%" align="center" ><strong>Horse No</strong></td>
                        <td width="10%" align="center"><strong>Color</strong></td>
                        <td width="10%" align="center"><strong>Last 6 Runs</strong></td>
                        <td width="16%" align="center"><strong>Horse Name</strong></td>
                        <td width="15%" align="center"><strong>Jockey</strong></td>
                        <td width="5%" align="center"><strong>Br</strong></td>
                        <td width="8%" align="center"><strong>Rtg</strong></td>
                        <td width="8%" align="center"><strong>Wt</strong></td>
                        <td width="8% align="center"><strong>Hcp</strong></td>
                        <td width="15%" align="center"><strong>Trainer</strong></td> 
                      </tr>'; 
                foreach($res_horse as $row)
                {
                      $str_res .= '<tr width="100%" style="font-size:16px;">
                        <td width="5%" align="center">'.$row['HorseNo'].'</td>
                        <td width="10%" align="center"><img src='.$row['Color'].'></td>
                        <td width="10%" align="center">'.$row['Past'].'</td>
                        <td width="16%" align="center">'.$row['HorseName'].'</td>
                        <td width="15%" align="center">'.$row['Jocket'].'</td>
                        <td width="5%" align="center">'.$row['Br'].'</td>
                        <td width="8%" align="center">'.$row['Rtg'].'</td>
                        <td width="8%" align="center">'.$row['Wt'].'</td>
                        <td width="8%" align="center">'.$row['Hcp'].'</td>
                        <td width="15%" align="center">'.$row['Trainer'].'</td> 
                      </tr>';
                }
            }
            //print_r($str_res);die;
            $arr=array("str_res"=>$str_res);
            return $arr;
        }
        
    }
    
    public function get_horseinfo_by_raceid($raceid)
    {
        $sql="SELECT * FROM `horseinfo` WHERE `RaceCardID` = '$raceid'";
        $query=$this->db->query($sql)->result_array();
        return $query;
    }
}