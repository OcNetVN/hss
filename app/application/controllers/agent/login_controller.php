<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class Login Controller (Agent)
* 
* @package   FCSE - Horse Racing
* @author    Creater: Vu Hoang Linh - <vuhoanglinh2002@gmail.com>
* @author    Updater: Vu Hoang Linh - <vuhoanglinh2002@gmail.com>
* @copyright 2015 The FCSE
*/
class Login_controller extends CI_Controller {

	/*
	|----------------------------------------------------------------
	| Construct function 
	| Inherit construct parent (CI)
	|----------------------------------------------------------------
	*/
	public function __construct()
	{
		parent:: __construct();
	}

	/**
	* Function view agent login page
	* Date: 02/02/2015
	* URL Page: agent/login
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show Login Page
	*/
	public function index()
	{	
		$p_arr 	=	array(
						'title'		=>	'Agent login page'
					);
		/*
		|----------------------------------------------------------------
		|Load common library
		|Call function set lang
		|----------------------------------------------------------------
		*/
		$this->load->library("common");
		$this->common->set_lang();

		/*
		|----------------------------------------------------------------
		|Load form helper
		|----------------------------------------------------------------
		*/
		$this->load->helper('form');



		
		/*
		|----------------------------------------------------------------
		| Load Login View
		|----------------------------------------------------------------
		*/
		$this->load->view("agent/login_view", $p_arr);
	}
}