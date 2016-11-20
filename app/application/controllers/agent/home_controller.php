<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class Home Controller (Agent)
* 
* @package   FCSE - Horse Racing
* @author    Creater: Vu Hoang Linh - <vuhoanglinh2002@gmail.com>
* @author    Updater: Vu Hoang Linh - <vuhoanglinh2002@gmail.com>
* @copyright 2015 The FCSE
*/
class Home_controller extends CI_Controller {

	/*
	|----------------------------------------------------------------
	| Construct function 
	| Inherit construct parent (CI)
	|----------------------------------------------------------------
	*/
	public function __construct()
	{
		parent:: __construct();

		/*
		|----------------------------------------------------------------
		|Load common library
		|Call function set lang
		|----------------------------------------------------------------
		*/
		$this->load->library("common");
		$this->common->set_lang();		
	}

	/**
	* Function view transaction history
	* Date: 02/02/2015
	* URL Page: agent/dashboard
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show Dashboard Page
	*/
	public function index()
	{		
		$p_arr 	=	array(
						'title'				=>	'Agent page',
						'active'			=>	0
					);
		/*
		|----------------------------------------------------------------
		| Load Head View
		| Load Header View
		| Load Left View
		| Load Agent Page View
		| Load Footer View
		|----------------------------------------------------------------
		*/
		$this->load->view("super_admin/head_view", $p_arr);
		$this->load->view("agent/header_view");
		$this->load->view("agent/left_view");
		$this->load->view("agent/agent_page_view");
		$this->load->view("super_admin/footer_view");
	}

	/**
	* Function view transaction history
	* Date: 02/02/2015
	* URL Page: agent/trans
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show transaction history
	*/
	public function trans_history()
	{	
		$p_arr 	=	array(
						'title'		=>	'Agent page',
						'active'	=>	1
					);	
		/*
		|----------------------------------------------------------------
		| Load Head View
		| Load Header View
		| Load Left View
		| Load Trans History View
		| Load Footer View
		|----------------------------------------------------------------
		*/
		$this->load->view("super_admin/head_view", $p_arr);
		$this->load->view("agent/header_view");
		$this->load->view("agent/left_view");
		$this->load->view("agent/trans_history_view");
		$this->load->view("super_admin/footer_view");
	}

	/**
	* Function view show all
	* Date: 02/02/2015
	* URL Page: agent/show_all
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show all
	*/
	public function show_all()
	{	
		$p_arr 	=	array(
						'title'		=>	'Agent page',
						'active'	=>	2
					);
		/*
		|----------------------------------------------------------------
		| Load Head View
		| Load Header View
		| Load Left View
		| Load Show all View
		| Load Footer View
		|----------------------------------------------------------------
		*/
		$this->load->view("super_admin/head_view", $p_arr);
		$this->load->view("agent/header_view");
		$this->load->view("agent/left_view");
		$this->load->view("agent/show_all_view");
		$this->load->view("super_admin/footer_view");
	}

	/**
	* Function view generation statement
	* Date: 02/02/2015
	* URL Page: agent/gen_statement
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show generation statement view
	*/
	public function gen_statement()
	{	
		$p_arr 	=	array(
						'title'				=>	'Agent page',
						'active'			=>	3,
						'p_custom_css'		=>	$this->load->view('agent/css/css_gen_statement_view', '', TRUE),
						'p_custom_js' 		=>	$this->load->view('agent/js/js_gen_statement_view', '', TRUE),
					);
		/*
		|----------------------------------------------------------------
		| Load Head View
		| Load Header View
		| Load Left View
		| Load Gen statement View
		| Load Footer View
		|----------------------------------------------------------------
		*/
		$this->load->view("super_admin/head_view", $p_arr);
		$this->load->view("agent/header_view");
		$this->load->view("agent/left_view");		
		$this->load->view("agent/gen_statement_view");
		$this->load->view("super_admin/footer_view");
	}
}