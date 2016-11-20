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
        $this->load->model('superadmin/m_login');
	}

	/**
	* Function view supper super_admin login page
	* Date: 02/02/2015
	* URL Page: super_admin/login
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show Login Page
	*/
	public function index()
	{	
        if(isset($_SESSION["AccUserSuper"]))
            unset($_SESSION["AccUserSuper"]);
			$p_arr 	=	array(
							'title'		=>	'Super admin login page',
	                        'p_custom_css'		=>	$this->load->view('super_admin/css/css_login_view', '', TRUE),
							'p_custom_js' 		=>	$this->load->view('super_admin/js/js_login_view', '', TRUE)
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
		$this->load->view("super_admin/login_view", $p_arr);
	}
    //click btn login
    public function btnlogin()
    {
        //echo "sdfd";die;
        $req = $this->m_login->btnlogin();
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
        
        header('Location: '.base_url('super_admin/login'));  
    }
}