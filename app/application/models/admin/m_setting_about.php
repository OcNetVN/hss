<?php
class M_setting_about extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function SaveAbouts()
    {
    	$txtday 	= date("Y").date("m").date("d");
        //$conent = htmlspecialchars_decode($this->input->post('conEnglish',TRUE));
        $type       = $_POST['type'];
        $conEnglish = $this->input->post('conEnglish',FALSE);
        $conChinese = $this->input->post('conChinese',FALSE);
    	//$conEnglish = $_POST['conEnglish'];
     //    print_r($conent);
     //    die();
    	// $conChinese = $_POST['conChinese'];
        //$this->config->set_item('global_xss_filtering', true);

    	$result = "";
        $sql_select = "SELECT * FROM `about_information` WHERE `txday`='$txtday' AND `Type`= '$type' ";
        $arr_sel    = $this->db->query($sql_select)->result();
        if(count($arr_sel) != 0)
        {
        	$sql = "UPDATE `about_information` SET `ContEnglish`='$conEnglish',`ContChinese`='$conChinese',
        											`CreatedBy`='admin',`CreadtedDate`= NOW()
												WHERE `txday`='$txtday' AND `Type`='$type'";
			$req = $this->db->query($sql);
			if($req)
				$result = 1;
        }
        else
        {
        	$sql = "INSERT INTO `about_information`(`txday`,`Type`,`ContEnglish`,`ContChinese`,`CreatedBy`,`CreadtedDate`)
					VALUES('$txtday','$type','$conEnglish','$conChinese','admin',NOW())";
			$req = $this->db->query($sql);
			if($req)
				$result = 1;
        }

        $arr = array('req'=>$result);
        return $arr;
    }

    public function load_tell_your_friends()
    {
    	$concont = '';
    	$sql = "SELECT *
				FROM `about_information`
				WHERE `Type`='tellyour' 
				ORDER BY `CreadtedDate` DESC
				LIMIT 1";
		$arr_list = $this->db->query($sql)->result();
		if(count($arr_list) != 0)
		{
			if($this->lang->line(LANG_EN) == "English")
            {
            	$concont = $arr_list[0]->ContEnglish;
            }
            else
            {
            	$concont = $arr_list[0]->ContChinese;
            }
		}
          
          $arr = array('content'=>$concont);
		return $arr;
    }

    public function load_about_us()
    {
    	$concont = '';
    	$sql = "SELECT *
				FROM `about_information`
				WHERE `Type`='aboutus' 
				ORDER BY `CreadtedDate` DESC
				LIMIT 1";
		$arr_list = $this->db->query($sql)->result();
		if(count($arr_list) != 0)
		{
			if($this->lang->line(LANG_EN) == "English")
            {
            	$concont = $arr_list[0]->ContEnglish;
            }
            else
            {
            	$concont = $arr_list[0]->ContChinese;
            }
		}
          
          $arr = array('content'=>$concont);
		return $arr;
    }
}