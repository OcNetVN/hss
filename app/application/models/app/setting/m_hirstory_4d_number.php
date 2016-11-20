<?php
class M_hirstory_4d_number extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
   
    public function SearchHistoryNumber()
    {
       $number          = $_POST['search'];
       $ticklottry      = "";
       if(isset($_POST['lottry']))
          $ticklottry      = $_POST['lottry'];
       $l_damacai       = array();
       $l_magnum        = array();
       $l_toto          = array();
       $l_pools         = array();
       $l_cashsweep     = array();
       $l_saba88        = array();
       $l_stc4          = array();
       $arr_dmc         = array();
       $arr_magnum      = array();
       $arr_sin4d       = array();
       $arr_cashsweep   = array();
       $arr_sabah88     = array();
       $arr_toto        = array();
       $arr_stc4d       = array();
       if(count($ticklottry) > 0)
       {
            for($i=0;$i<count($ticklottry);$i++)
            {
              if(isset($ticklottry[$i]))
              {
                 if($ticklottry[$i] == 'damacai')
                 {
                      $query_1st  = "SELECT `txday`,`Draw_No` FROM `lot_damacai` WHERE `1_3D_1st_Price` LIKE '$number' ";
                      $ar_dmc_1st     = $this->db->query($query_1st)->result();
                      $query_2nd  = "SELECT `txday`,`Draw_No` FROM `lot_damacai` WHERE `1_3D_2nd_Price` LIKE '$number'";
                      $ar_dmc_2nd      = $this->db->query($query_2nd)->result();
                      $query_3rd  = "SELECT `txday`,`Draw_No` FROM `lot_damacai` WHERE `1_3D_3rd_Price` LIKE '$number'";
                      $ar_dmc_3rd         = $this->db->query($query_3rd)->result();
                      $query_special  = "SELECT `txday`,`Draw_No` FROM `lot_damacai` WHERE `Special` LIKE '%$number%'"; 
                      $ar_dmc_special     = $this->db->query($query_special)->result();
                      $query_con      = "SELECT `txday`,`Draw_No` FROM `lot_damacai` WHERE `Consolation` LIKE '%$number%'";
                      $ar_dmc_conso       = $this->db->query($query_con)->result();
                      $arr_dmc  = array('l_1st'=>$ar_dmc_1st,'l_2nd'=>$ar_dmc_2nd,'l_3rd'=>$ar_dmc_3rd,'l_dmc_specail'=>$ar_dmc_special,'l_conso'=>$ar_dmc_conso);
                 }


               if($ticklottry[$i] == 'magnum')
               {
                    $query_1st      = "SELECT `txday`,`Draw_No` FROM `lot_magnum` WHERE `4D_1st_Price` LIKE '$number' ";
                    $ar_mgnum_1st     = $this->db->query($query_1st)->result();
                    $query_2nd      = "SELECT `txday`,`Draw_No` FROM `lot_magnum` WHERE `4D_2nd_Price` LIKE '$number'";
                    $ar_mgnum_2nd      = $this->db->query($query_2nd)->result();
                    $query_3rd      = "SELECT `txday`,`Draw_No` FROM `lot_magnum` WHERE `4D_3rd_Price` LIKE '$number'";
                    $ar_mgnum_3rd         = $this->db->query($query_3rd)->result();
                    $query_special  = "SELECT `txday`,`Draw_No` FROM `lot_magnum` WHERE `Special` LIKE '%$number%'"; 
                    $ar_mgnum_special     = $this->db->query($query_special)->result();
                    $query_con      = "SELECT `txday`,`Draw_No` FROM `lot_magnum` WHERE `Consolation` LIKE '%$number%'";
                    $ar_mgnum_conso = $this->db->query($query_con)->result();
                    $arr_magnum  = array('l_mgnum_1st'=>$ar_mgnum_1st,'l_mgnum_2nd'=>$ar_mgnum_2nd,'l_mgnum_3rd'=>$ar_mgnum_3rd,'l_mgnum_specail'=>$ar_mgnum_special,'l_mgnum_conso'=>$ar_mgnum_conso);
               }

               if($ticklottry[$i] == 'toto')
               {
                    $query_1st      = "SELECT `txday`,`Draw_No` FROM `lot_toto4d` WHERE `ST_1st_Price` LIKE '$number' ";
                    $ar_toto_1st     = $this->db->query($query_1st)->result();
                    $query_2nd      = "SELECT `txday`,`Draw_No` FROM `lot_toto4d` WHERE `ST_2nd_Price` LIKE '$number'";
                    $ar_toto_2nd      = $this->db->query($query_2nd)->result();
                    $query_3rd      = "SELECT `txday`,`Draw_No` FROM `lot_toto4d` WHERE `ST_3rd_Price` LIKE '$number'";
                    $ar_toto_3rd    = $this->db->query($query_3rd)->result();
                    $query_special  = "SELECT `txday`,`Draw_No` FROM `lot_toto4d` WHERE `Special` LIKE '%$number%'"; 
                    $ar_toto_special     = $this->db->query($query_special)->result();
                    $query_con      = "SELECT `txday`,`Draw_No` FROM `lot_toto4d` WHERE `Consolation` LIKE '%$number%'";
                    $ar_toto_conso  = $this->db->query($query_con)->result();
                    $arr_toto   = array('l_toto_1st'=>$ar_toto_1st,'l_toto_2nd'=>$ar_toto_2nd,'l_toto_3rd'=>$ar_toto_3rd,'l_toto_specail'=>$ar_toto_special,'l_toto_conso'=>$ar_toto_conso); 
               }

               if($ticklottry[$i] == 'sintoto')
               {
                    $query_1st        = "SELECT `txday`,`Draw_No` FROM `lot_sin4d` WHERE `1st` LIKE '$number' ";
                    $ar_sin4d_1st     = $this->db->query($query_1st)->result();
                    $query_2nd        = "SELECT `txday`,`Draw_No` FROM `lot_sin4d` WHERE `2nd` LIKE '$number'";
                    $ar_sin4d_2nd     = $this->db->query($query_2nd)->result();
                    $query_3rd        = "SELECT `txday`,`Draw_No` FROM `lot_sin4d` WHERE `3rd` LIKE '$number'";
                    $ar_sin4d_3rd     = $this->db->query($query_3rd)->result();
                    $query_special    = "SELECT `txday`,`Draw_No` FROM `lot_sin4d` WHERE `Special` LIKE '%$number%'"; 
                    $ar_sin4d_special = $this->db->query($query_special)->result();
                    $query_con        = "SELECT `txday`,`Draw_No` FROM `lot_sin4d` WHERE `Consolation` LIKE '%$number%'";
                    $ar_sin4d_conso   = $this->db->query($query_con)->result(); 

                    $arr_sin4d  = array('l_sin4d_1st'=>$ar_sin4d_1st,'l_sin4d_2nd'=>$ar_sin4d_2nd,'l_sin4d_3rd'=>$ar_sin4d_3rd,'l_sin4d_specail'=>$ar_sin4d_special,'l_sin4d_conso'=>$ar_sin4d_conso);
               }

               if($ticklottry[$i] == 'cashsweep')
               {
                    $query_1st      = "SELECT `txday`,`Draw_No` FROM `lot_cashsweep` WHERE `1st` LIKE '$number' ";
                    $ar_cashsweep_1st   = $this->db->query($query_1st)->result();
                    $query_2nd      = "SELECT `txday`,`Draw_No` FROM `lot_cashsweep` WHERE `2nd` LIKE '$number'";
                    $ar_cashsweep_2nd   = $this->db->query($query_2nd)->result();
                    $query_3rd      = "SELECT `txday`,`Draw_No` FROM `lot_cashsweep` WHERE `3rd` LIKE '$number'";
                    $ar_cashsweep_3rd   = $this->db->query($query_3rd)->result();
                    $query_special  = "SELECT `txday`,`Draw_No` FROM `lot_cashsweep` WHERE `Special` LIKE '%$number%'"; 
                    $ar_cashsweep_special = $this->db->query($query_special)->result();
                    $query_con      = "SELECT `txday`,`Draw_No` FROM `lot_cashsweep` WHERE `Consolation` LIKE '%$number%'";
                    $ar_cashsweep_conso = $this->db->query($query_con)->result(); 
                    $arr_cashsweep  = array('l_cashsweep_1st'=>$ar_cashsweep_1st,'l_cashsweep_2nd'=>$ar_cashsweep_2nd,'l_cashsweep_3rd'=>$ar_cashsweep_3rd,'l_cashsweep_specail'=>$ar_cashsweep_special,'l_cashsweep_conso'=>$ar_cashsweep_conso);
               }

               if($ticklottry[$i] == 'sabaha88')
               {
                    $query_1st      = "SELECT `txday`,`Draw_No` FROM `lot_sabah` WHERE `1st` LIKE '$number' ";
                    $ar_sabah_1st     = $this->db->query($query_1st)->result();
                    $query_2nd      = "SELECT `txday`,`Draw_No` FROM `lot_sabah` WHERE `2nd` LIKE '$number'";
                    $ar_sabah_2nd      = $this->db->query($query_2nd)->result();
                    $query_3rd      = "SELECT `txday`,`Draw_No` FROM `lot_sabah` WHERE `3rd` LIKE '$number'";
                    $ar_sabah_3rd         = $this->db->query($query_3rd)->result();
                    $query_special  = "SELECT `txday`,`Draw_No` FROM `lot_sabah` WHERE `Special` LIKE '%$number%'"; 
                    $ar_sabah_special     = $this->db->query($query_special)->result();
                    $query_con      = "SELECT `txday`,`Draw_No` FROM `lot_sabah` WHERE `Consolation` LIKE '%$number%'";
                    $ar_sabah_conso       = $this->db->query($query_con)->result(); 
                    $arr_sabah88  = array('l_sabah88_1st'=>$ar_sabah_1st,'l_sabah88_2nd'=>$ar_sabah_2nd,'l_sabah88_3rd'=>$ar_sabah_3rd,'l_sabah88_specail'=>$ar_sabah_special,'l_sabah88_conso'=>$ar_sabah_conso);
               }

               if($ticklottry[$i] == 'stc4D')
               {
                    $query_1st      = "SELECT `txday`,`Draw_No` FROM `lot_sandakan` WHERE `1st` LIKE '$number' ";
                    $ar_stc4D_1st     = $this->db->query($query_1st)->result();
                    $query_2nd      = "SELECT `txday`,`Draw_No` FROM `lot_sandakan` WHERE `2nd` LIKE '$number'";
                    $ar_stc4D_2nd      = $this->db->query($query_2nd)->result();
                    $query_3rd      = "SELECT `txday`,`Draw_No` FROM `lot_sandakan` WHERE `3rd` LIKE '$number'";
                    $ar_stc4D_3rd   = $this->db->query($query_3rd)->result();
                    $query_special  = "SELECT `txday`,`Draw_No` FROM `lot_sandakan` WHERE `Special` LIKE '%$number%'"; 
                    $ar_stc4D_special     = $this->db->query($query_special)->result();
                    $query_con      = "SELECT `txday`,`Draw_No` FROM `lot_sandakan` WHERE `Consolation` LIKE '%$number%'";
                    $ar_stc4D_conso = $this->db->query($query_con)->result();
                    $arr_stc4d  = array('l_stc4d_1st'=>$ar_stc4D_1st,'l_stc4d_2nd'=>$ar_stc4D_2nd,'l_stc4d_3rd'=>$ar_stc4D_3rd,'l_stc4d_specail'=>$ar_stc4D_special,'l_stc4d_conso'=>$ar_stc4D_conso); 
               }

             }
          }
       }

       $arr = array('damacai'=>$arr_dmc,'magnum'=>$arr_magnum,'toto'=>$arr_toto,'sin4d'=>$arr_sin4d,'cashsweep'=>$arr_cashsweep,'sabaha88'=>$arr_sabah88,'stc4d'=>$arr_stc4d);
       return $arr;
       
    }
}