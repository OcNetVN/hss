<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class Login Controller (application controller)
* 
* @package   FCSE - Horse Racing
* @author    Creater: Huu Nghia - <huunghia1810@gmail.com>
* @author    Updater: Huu Nghia - <huunghia1810@gmail.com>
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
        $this->load->model('app/m_login');
	}

	public function index()
	{	
        if(isset($_SESSION["AccUserSuper"]))
            unset($_SESSION["AccUserSuper"]);
		$p_arr 	=	array(
						'title'		=>	'App login page',
                        'p_custom_css'		=>	$this->load->view('app/css/css_login_view', '', TRUE),
						'p_custom_js' 		=>	$this->load->view('app/js/js_login_view', '', TRUE)
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
		$this->load->view("app/login_view", $p_arr);
	}
    //click btn login
    public function btnlogin()
    {
        //echo "sdfd";die;
        $req = $this->m_login->btnlogin();
        echo json_encode($req);
    }
    //end click btn login 
}