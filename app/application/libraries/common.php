<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class Common
* 
* @package   FCFS - Horse Racing
* @author    Creater: Vu Hoang Linh - <vuhoanglinh2002@gmail.com>
* @author    Updater: Vu Hoang Linh - <vuhoanglinh2002@gmail.com>
* @copyright 2015 The FCFS
*/
class Common {
	
	/* 
	|----------------------------------------------------------------
	| Variable
	| $ci is get instance framework codeigniter
	|----------------------------------------------------------------
	*/
	private $ci;

	/*
	|----------------------------------------------------------------
	| Construct function 
	|----------------------------------------------------------------
	*/
  	public function __construct() {
    	$this->ci =& get_instance();
    	$this->ci->load->library('session');
	}

	/*
	|----------------------------------------------------------------
	| Function set lang display on website
	| Date: 02/02/2015
	| @param 
	| @return 
	|----------------------------------------------------------------
	*/
	public function set_lang_old($p_lang = FILE_EN)
	{
		if($this->ci->input->cookie('lang') != null)
		{
			$p_lang = $this->ci->input->cookie('lang');
		}
		//Set to cookie
		$cookie_time	=	3600*24*30;				
        $this->ci->input->set_cookie('lang', $p_lang, $cookie_time);  
		//Load lang 
        $this->ci->lang->load($p_lang, FOLDER_LANG);
	}
	public function set_lang($p_lang = FILE_EN)
	{
		if($this->ci->session->userdata('lang') != null)
		{
			$p_lang = $this->ci->session->userdata('lang');
		}
		//Set to cookie
		$cookie_time	=	3600*24*30;				
        $this->ci->session->set_userdata('lang', $p_lang);  
		//Load lang 
        $this->ci->lang->load($p_lang, FOLDER_LANG);
	}
	public function check_accuser() //user login horseracing
	{
		if(!isset($_SESSION['AccUser']))
		{
			header('Location: login');
		}
	}
	public function check_accusersuper() //user login superadmin
	{
		if(!isset($_SESSION['AccUserSuper']))
		{
			header('Location: login');
		}
	}
    public function check_accuser_level1() //user login horseracing
	{
		if(!isset($_SESSION['AccUserSuper']) || (isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level'] !=1))
		{
			header('Location: login');
		}
	}

    
}