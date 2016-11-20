<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class Login Controller (Super super_admin)
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
        $this->load->model('horseracing/m_login');
	}

	/**
	* Function view admin login page
	* Date: 02/02/2015
	* URL Page: admin/login
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show Login Page
	*/
	public function index()
	{	
        if(isset($_SESSION["AccUser"]))
            unset($_SESSION["AccUser"]);
		$p_arr 	=	array(
						'title'		=>	'Admin login page',
                        'p_custom_css'		=>	$this->load->view('admin/css/css_login_view', '', TRUE),
						'p_custom_js' 		=>	$this->load->view('admin/js/js_login_view', '', TRUE)
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
		$this->load->view("admin/login_view", $p_arr);
	}
    
    //click btn login
    public function btnlogin()
    {
        $req = $this->m_login->btnlogin_admin();
        echo json_encode($req);
    }
    //end click btn login 
     public function setlang()
    {   
      
        $lang = $this->input->get('lang');
        
        if($lang != FILE_EN && $lang != FILE_CN)
        {
            $lang = FILE_EN;
        }       
        $this->session->set_userdata('lang',$lang);
        
        header('Location: '.base_url('admin/login'));  
    }      
}