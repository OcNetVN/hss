<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class Home Controller (admin)
* 
* @package   FCSE - Horse Racing
* @author    Creater: Vu Hoang Linh - <vuhoanglinh2002@gmail.com>
* @author    Updater: Vu Hoang Linh - <vuhoanglinh2002@gmail.com>
* @copyright 2015 The FCSE
*/
class Homeld_controller extends CI_Controller {

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
        |Call function check isset session user
		|Call function set lang
		|----------------------------------------------------------------
		*/
		$this->load->library("common");
        $this->load->model('admin/m_common_lottery');
        $this->load->model('admin/m_livedraw');
        $this->common->check_accuser();
		$this->common->set_lang();		
	}
	
	/**
	* Function view livedraw
	* Date: 06/04/2015
	* URL Page: admin/livedraw
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show livedraw
	*/
	public function index()
	{		
		$p_arr 	=	array(
						'title'				=>	'Live draw page',
						'active'			=>	10,
                        'active_submenu'	=>	2,
						//'p_custom_css'		=>	$this->load->view('admin/css/css_livedraw_view', '', TRUE),
						'p_custom_js' 		=>	$this->load->view('admin/js/js_livedraw_view', '', TRUE)
					);

		/*
		|----------------------------------------------------------------
		| Load Head View
		| Load Header View
		| Load Left View
		| Load livedraw View
		| Load Footer View
		|----------------------------------------------------------------
		*/
		$this->load->view("super_admin/head_view", $p_arr);
		$this->load->view("admin/header_view");
		$this->load->view("admin/left_view");
		$this->load->view("admin/live_draw_view");
		$this->load->view("super_admin/footer_view");
	}
    
    
    /*
	|----------------------------------------------------------------
	| get data by select function + date
	|----------------------------------------------------------------
	*/
    public function get_data_by_txtdate()
    {
        $req = $this->m_livedraw->get_data_by_txtdate();
        echo json_encode($req);
    }
    /*
	|----------------------------------------------------------------
	| get data by select function + date
	|----------------------------------------------------------------
	*/
    public function get_data_by_txtdate_from_tbl_lot_sintoto()
    {
        $req = $this->m_livedraw->get_data_by_txtdate_from_tbl_lot_sintoto();
        echo json_encode($req);
    }
    
    /*
	|----------------------------------------------------------------
	| function save damacai
	|----------------------------------------------------------------
	*/
    public function btnsavedmc()
    {
        $req = $this->m_livedraw->btnsavedmc();
        echo json_encode($req);
    }

    public function loadlistdatedamacai()
    {
    	$req = $this->m_livedraw->loadlistdatedamacai();
        echo json_encode($req);
    }

    public function loadlistdatemagnum()
    {
    	$req = $this->m_livedraw->loadlistdatemagnum();
        echo json_encode($req);
    }

    public function loadlistdatetoto()
    {
    	$req = $this->m_livedraw->loadlistdatemagnum();
        echo json_encode($req);
    }

    public function loadlistdatesin4D()
    {
    	$req = $this->m_livedraw->loadlistdatesin4D();
        echo json_encode($req);
    }
    public function loadlistdatesintoto()
    {
    	$req = $this->m_livedraw->loadlistdatesintoto();
        echo json_encode($req);
    }
    /*
	|----------------------------------------------------------------
	| function save magnum
	|----------------------------------------------------------------
	*/
    public function btnsavemagnum()
    {
        $req = $this->m_livedraw->btnsavemagnum();
        echo json_encode($req);
    }
    /*
	|----------------------------------------------------------------
	| function save toto
	|----------------------------------------------------------------
	*/
    public function btnsavetoto()
    {
        $req = $this->m_livedraw->btnsavetoto();
        echo json_encode($req);
    }
    /*
	|----------------------------------------------------------------
	| function save sin4d
	|----------------------------------------------------------------
	*/
    public function btnsavesin4d()
    {
        $req = $this->m_livedraw->btnsavesin4d();
        echo json_encode($req);
    }
    /*
	|----------------------------------------------------------------
	| function save sintoto
	|----------------------------------------------------------------
	*/
    public function btnsavesintoto()
    {
        $req = $this->m_livedraw->btnsavesintoto();
        echo json_encode($req);
    }

    // save about for toto, damaicai, mangun
    public function SaveConvertDMT()
    {
    	$req = $this->m_livedraw->SaveConvertDMT();
        echo json_encode($req);
    }
    
}