<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class Home Controller (admin)
* 
* @package   FCSE - Horse Racing
* @author    Creater: Vu Hoang Linh - <vuhoanglinh2002@gmail.com>
* @author    Updater: Vu Hoang Linh - <vuhoanglinh2002@gmail.com>
* @copyright 2015 The FCSE
*/
class Homelt_controller extends CI_Controller {

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
        
        $this->load->model('admin/m_damacai');
        $this->load->model('admin/m_common_lottery');
    
        $this->load->model('admin/m_lottry_sin');
        $this->load->model('admin/m_magnum');
        $this->load->model('admin/m_totofourd');
        $this->load->model('admin/m_bigsweep');
        $this->load->model('admin/m_twod');
        $this->load->model('admin/m_setting_about');
        $this->load->model('app/setting/m_notification');

        //$this->common->check_accuser_level1();
        //$this->common->check_accuser();
		$this->load->library("common");
        $this->common->set_lang();
        //$this->common->post();		
	}
	
	/**
	* Function view racing card
	* Date: 02/02/2015
	* URL Page: admin/racingcard
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show Racing card
	*/
	

	/**
	* Function view live tote
	* Date: 02/02/2015
	* URL Page: admin/live_tote
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show live tote
	*/
    
    /* Tote Board */
	public function  wes_mn()
	{
		$p_arr 	=	array(
						'title'				=>	'Admin page',
						'active'			=>	13,
                        'active_submenu'	=>	2,
                        'p_custom_js'         =>    $this->load->view('lottry/js/js_magnum_view', '', TRUE)
					);
		/*
		|----------------------------------------------------------------
		| Load Head View
		| Load Header View
		| Load Left View
		| Load Live Tote View
		| Load Footer View
		|----------------------------------------------------------------
		*/
		$this->load->view("super_admin/head_view", $p_arr);
		$this->load->view("admin/header_view");
		$this->load->view("admin/left_view");
		$this->load->view("lottry/magnum_view");
		$this->load->view("super_admin/footer_view");
	}
    

    public function wes_dm(){
       $p_arr     =    array(
                        'title'                =>    'Damacai page',
                        'active'               =>    12,
                        'active_submenu'	   =>	2,
                        'p_custom_js'         =>    $this->load->view('lottry/js/js_damacaionetree_view', '', TRUE)
                    );
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load Damacai View
        | Load Footer View
        |----------------------------------------------------------------
        */
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("lottry/damacai_view");
        $this->load->view("super_admin/footer_view"); 
    }
    
    public function wes_bg(){
        $p_arr     =    array(
                        'title'                =>    'Admin page',
                        'active'               =>    15,
                        'active_submenu'	   =>	2,
                        'p_custom_js'         =>    $this->load->view('lottry/js/js_bigsweep_view', '', TRUE)
                        
                    );
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load Bigsweep View
        | Load Footer View
        |----------------------------------------------------------------
        */
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("lottry/bigsweep_view");
        $this->load->view("super_admin/footer_view");
    }
    
    public function tt(){
       $p_arr     =    array(
                        'title'                =>    'Toto 4D page',
                        'active'               =>    14,
                        'active_submenu'	   =>	2,
                        'p_custom_js'          =>    $this->load->view('lottry/js/js_totofourd_view', '', TRUE)
                    );
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load Toto 4D View
        | Load Footer View
        |----------------------------------------------------------------
        */
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("lottry/toto_view");
        $this->load->view("super_admin/footer_view"); 
    }

	/**
	* Function view Scratching & Early Ticket
	* Date: 02/02/2015
	* URL Page: admin/set
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show 	Scratching & Early Ticket
	*/
	public function D2()
	{
		$p_arr 	=	array(
						'title'				=>	'Admin page',
						'active'			=>	16,
                        'active_submenu'	=>	2,
                        'p_custom_js'       =>    $this->load->view('lottry/js/js_twod_view', '', TRUE)
					);
		/*
		|----------------------------------------------------------------
		| Load Head View
		| Load Header View
		| Load Left View
		| Load 2d View
		| Load Footer View
		|----------------------------------------------------------------
		*/
		$this->load->view("super_admin/head_view", $p_arr);
		$this->load->view("admin/header_view");
		$this->load->view("admin/left_view");
		$this->load->view("lottry/2d_view");
		$this->load->view("super_admin/footer_view");
	}

	/**
	* Function view weight_board
	* Date: 02/02/2015
	* URL Page: admin/weight_board
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show weight_board
	*/
	public function stt()
	{
		$p_arr 	=	array(
						'title'				=>	'Admin page',
						'active'			=>	18,
                        'active_submenu'	=>	2,
                        'p_custom_js'       =>  $this->load->view('lottry/js/js_lott_sin_pools', '', TRUE)
					);
		/*
		|----------------------------------------------------------------
		| Load Head View
		| Load Header View
		| Load Left View
		| Load Race result View
		| Load Footer View
		|----------------------------------------------------------------
		*/
		$this->load->view("super_admin/head_view", $p_arr);
		$this->load->view("admin/header_view");
		$this->load->view("admin/left_view");
		$this->load->view("lottry/sin_too_view");
		$this->load->view("super_admin/footer_view");
	}

	/**
	* Function view race_result
	* Date: 02/02/2015
	* URL Page: admin/race_result
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show race result
	*/
	public function spl()
	{
		$p_arr 	=	array(
						'title'				=>	'Admin page',
						'active'			=>	19,
                        'active_submenu'	=>	2,
                        'p_custom_js'       =>  $this->load->view('lottry/js/js_lott_sin_pools', '', TRUE)
					);
		/*
		|----------------------------------------------------------------
		| Load Head View
		| Load Header View
		| Load Left View
		| Load Race result View
		| Load Footer View
		|----------------------------------------------------------------
		*/
		$this->load->view("super_admin/head_view", $p_arr);
		$this->load->view("admin/header_view");
		$this->load->view("admin/left_view");
		$this->load->view("lottry/sin_pool_4d_view");
		$this->load->view("super_admin/footer_view");
	}

    public function ssw()
    {
        $p_arr  =   array(
                        'title'             =>  'Admin page',
                        'active'            =>  20,
                        'active_submenu'	=>	2,
                        'p_custom_js'       =>  $this->load->view('lottry/js/js_lott_sin_pools', '', TRUE)
                    );
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load Race result View
        | Load Footer View
        |----------------------------------------------------------------
        */
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("lottry/sin_sweep_view");
        $this->load->view("super_admin/footer_view");
    }

    public function esb()
    {
        $p_arr  =   array(
                        'title'             =>  'Admin page',
                        'active'            =>  22,
                        'active_submenu'	=>	2,
                        'p_custom_js'       =>  $this->load->view('lottry/js/js_lott_sin_pools', '', TRUE)
                    );
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load Race result View
        | Load Footer View
        |----------------------------------------------------------------
        */
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("lottry/sabah88_view");
        $this->load->view("super_admin/footer_view");
    }

    public function estc()
    {
        $p_arr  =   array(
                        'title'             =>  'Admin page',
                        'active'            =>  23,
                        'active_submenu'	=>	2,
                        'p_custom_js'       =>  $this->load->view('lottry/js/js_lott_sin_pools', '', TRUE)
                    );
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load Race result View
        | Load Footer View
        |----------------------------------------------------------------
        */
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("lottry/stc4d_view");
        $this->load->view("super_admin/footer_view");
    }

    public function ecw()
    {
        $p_arr  =   array(
                        'title'             =>  'Admin page',
                        'active'            =>  24,
                        'active_submenu'	=>	2,
                        'p_custom_js'       =>  $this->load->view('lottry/js/js_lott_sin_pools', '', TRUE)
                    );
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load Race result View
        | Load Footer View
        |----------------------------------------------------------------
        */
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("lottry/cash_sweep_view");
        $this->load->view("super_admin/footer_view");
    }

    public function notification()
    {
        $p_arr  =   array(
                        'title'             =>  'Admin page',
                        'active'            =>  37,
                        'active_submenu'    =>  4,
                        'p_custom_js'       =>  $this->load->view('admin/js/js_setting_notification_view', '', TRUE)
                    );
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load notification
        | Load Footer View
        |----------------------------------------------------------------
        */
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("admin/setting_notification_view");
        $this->load->view("super_admin/footer_view");
    }



    public function sett_about_us()
    {
        $p_arr  =   array(
                        'title'             =>  'Admin page',
                        'active'            =>  36,
                        'active_submenu'    =>  4,
                        'p_custom_js'       =>  $this->load->view('admin/js/js_setting_about_view', '', TRUE)
                    );
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load Race set about us
        | Load Footer View
        |----------------------------------------------------------------
        */
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("admin/setting_about_us_view");
        $this->load->view("super_admin/footer_view");
    }
    
    public function loadSerialNumberWin()
    {
        $req = $this->m_notification->loadSerialNumberWin();
        echo json_encode($req);
    }

    public function getSerialNumber()
    {
        $req = $this->m_notification->getSerialNumber();
        echo json_encode($req);
    }

    public function SendNotification()
    {
        $req = $this->m_notification->SendNotification();
        echo json_encode($req);
    }

    public function deletnotifcation()
    {
        $req = $this->m_notification->deletnotifcation();
        echo json_encode($req);
    }

    public function APISendNotification()
    {
        $req = $this->m_notification->APISendNotification();
        //$str = $req['serial'].",".$req['id'].",".$req['typeCha'].",".$req['typeCon'].",".$req['content'].",".$req['link'].",".$req['sound'].",".$req['vibration'].",".$req['checktypeNotifi'];
        echo $req;
    }

    public function APISendSetting()
    {
        $req = $this->m_notification->APISendSetting();
        echo $req;
    }

    function SavePools()
    {
        $req = $this->m_lottry_sin->SavePools();
        echo json_encode($req);
    }

    function get_list_pools4D()
    {
         $req = $this->m_lottry_sin->get_list_pools4D();
         echo json_encode($req);
    }

    public function SaveAbouts()
    {
        $req = $this->m_setting_about->SaveAbouts();
        echo json_encode($req);
    }

    function loadlistlottery()
    {
         $req = $this->m_lottry_sin->loadlistlottery();
         echo json_encode($req);
    }

    
    /**
    * Page Sweep Sin
    *    
    **/
   function SaveSinWeep()
   {
        $req = $this->m_lottry_sin->SinWeep();
        echo json_encode($req);
   }

   function get_list_sinsweep()
   {
        $req = $this->m_lottry_sin->get_list_sinsweep();
        echo json_encode($req);
   }

   function SaveSinToTo()
   {
        $req = $this->m_lottry_sin->SaveSinToTo();
        echo json_encode($req);
   }

   function get_list_sintoto()
   {
        $req = $this->m_lottry_sin->get_list_sintoto();
        echo json_encode($req);
   }

   /**
   **/
    function SaveCashSweepSin()
    {
         $req = $this->m_lottry_sin->SaveCashSweepSin();
         echo json_encode($req);
    }

    function get_cash_sweep()
    {
        $req = $this->m_lottry_sin->get_cash_sweep();
        echo json_encode($req);
    }

    function SaveSinSTC4D()
    {
        $req = $this->m_lottry_sin->SaveSinSTC4D();
        echo json_encode($req);
    }

    function get_list_stc4d()
    {
        $req = $this->m_lottry_sin->get_list_stc4d();
        echo json_encode($req);
    }

    function SaveSabah88()
    {
        $req = $this->m_lottry_sin->SaveSabah88();
        echo json_encode($req);
    }
    function get_list_sabah88()
    {
        $req = $this->m_lottry_sin->get_list_sabah88();
        echo json_encode($req);
    }
    /**
	* Function for Damacai page
	* Date: 26/03/2015
	*/

    /*
    |----------------------------------------------------------------
    | function convert drawdate damacai
    |----------------------------------------------------------------
    */
    function btndrawdate()
    {
        $req = $this->m_damacai->btndrawdate();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    | function convert 1+3D convert damacai
    |----------------------------------------------------------------
    */
    public function btnonethreed()
    {
        $req = $this->m_damacai->btnonethreed();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    | function convert 3D convert damacai
    |----------------------------------------------------------------
    */
    public function btnthreed()
    {
        $req = $this->m_damacai->btnthreed();
        echo json_encode($req);
    }
    
    /*
    |----------------------------------------------------------------
    | function convert RM damacai
    |----------------------------------------------------------------
    */
    public function btnrm()
    {
        $req = $this->m_damacai->btnrm();
        echo json_encode($req);
    }
    
    /*
    |----------------------------------------------------------------
    | function convert 1+3D jackport 1 convert damacai
    |----------------------------------------------------------------
    */
    public function btnonethreedjp1()
    {
        $req = $this->m_damacai->btnonethreedjp1();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    | function convert 1+3D jackport 2 convert damacai
    |----------------------------------------------------------------
    */
    public function btnonethreeedjp2()
    {
        $req = $this->m_damacai->btnonethreeedjp2();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    | function convert 3D jackport convert damacai
    |----------------------------------------------------------------
    */
    public function btn3djp()
    {
        $req = $this->m_damacai->btn3djp();
        echo json_encode($req);
    }
    
    /*
    |----------------------------------------------------------------
    | function convert DMC jackport 1 convert damacai
    |----------------------------------------------------------------
    */
    public function btndmcjp1()
    {    
        $req = $this->m_damacai->btndmcjp1();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    | function convert DMC jackport 2 convert damacai
    |----------------------------------------------------------------
    */
    public function btndmcjp2()
    {    
        $req = $this->m_damacai->btndmcjp2();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    | function get data by txtday from table damacai
    |----------------------------------------------------------------
    */
    public function get_data_by_txtdate_damacai()
    {    
        $req = $this->m_damacai->get_data_by_txtdate_damacai();
        echo json_encode($req);
    }
    
    
            /**
        	* Function for Magnum4d page
        	* Date: 26/03/2015
        	*/
            /*
            |----------------------------------------------------------------
            | function convert drawdate magnum
            |----------------------------------------------------------------
            */
            function btndrawdate_magnum()
            {
                $req = $this->m_magnum->btndrawdate_magnum();
                echo json_encode($req);
            }
            /*
            |----------------------------------------------------------------
            | function convert 4d game magnum
            |----------------------------------------------------------------
            */
            public function btnfourdgame_magnum()
            {
                $req = $this->m_magnum->btnfourdgame_magnum();
                echo json_encode($req);
            }
            /*
            |----------------------------------------------------------------
            | function convert 4d jackpot magnum
            |----------------------------------------------------------------
            */
            public function btnfourdjp_magnum()
            {
                $req = $this->m_magnum->btnfourdjp_magnum();
                echo json_encode($req);
            }
            /*
            |----------------------------------------------------------------
            | function convert 4d jackpot gold magnum
            |----------------------------------------------------------------
            */
            public function btnfourjpgold_magnum()
            {
                $req = $this->m_magnum->btnfourjpgold_magnum();
                echo json_encode($req);
            }
            
            /*
            |----------------------------------------------------------------
            | function get data by txtday from table magnum
            |----------------------------------------------------------------
            */
            public function get_data_by_txtdate_magnum()
            {    
                $req = $this->m_magnum->get_data_by_txtdate_magnum();
                echo json_encode($req);
            }
            /*
        	|----------------------------------------------------------------
        	| function convert toto 4D
        	|----------------------------------------------------------------
        	*/
            public function btnconvertall_totofourd()
        	{
                $req = $this->m_totofourd->btnconvertall_totofourd();
                echo json_encode($req);
            }
            /*
        	|----------------------------------------------------------------
        	| function convert toto 4D
        	|----------------------------------------------------------------
        	*/
            public function get_data_by_txtdate_totofourd()
        	{
                $req = $this->m_totofourd->get_data_by_txtdate_totofourd();
                echo json_encode($req);
            }
            
            /*
        	|----------------------------------------------------------------
        	| function convert bigsweep
        	|----------------------------------------------------------------
        	*/
            public function btnconvertall_bigsweep()
        	{
                $req = $this->m_bigsweep->btnconvertall_bigsweep();
                echo json_encode($req);
            }
            /*
        	|----------------------------------------------------------------
        	| function save all bigsweep
        	|----------------------------------------------------------------
        	*/
            public function btnsaveall_bigsweep()
        	{
                $req = $this->m_bigsweep->btnsaveall_bigsweep();
                echo json_encode($req);
            }
            /*
            |----------------------------------------------------------------
            | function get data by txtday from table bigsweep
            |----------------------------------------------------------------
            */
            public function get_data_by_txtdate_bigsweep()
            {    
                $req = $this->m_bigsweep->get_data_by_txtdate_bigsweep();
                echo json_encode($req);
            }
            /*
        	|----------------------------------------------------------------
        	| function save all totofourd
        	|----------------------------------------------------------------
        	*/
            public function btnsaveall_totofourd()
        	{
                $req = $this->m_totofourd->btnsaveall_totofourd();
                echo json_encode($req);
            }
            /*
            |----------------------------------------------------------------
            | function save all magnum
            |----------------------------------------------------------------
            */
            public function btnsaveall_magnum()
            {
                $req = $this->m_magnum->btnsaveall_magnum();
                echo json_encode($req);
            }
            /*
            |----------------------------------------------------------------
            | function save all damacai
            |----------------------------------------------------------------
            */
            public function btnsaveall_damacai()
            {
                $req = $this->m_damacai->btnsaveall_damacai();
                echo json_encode($req);
            }
            /*
        	|----------------------------------------------------------------
        	| function get data by txday of display 2d
        	|----------------------------------------------------------------
        	*/
            public function get_data_by_txtdate_2d()
        	{
                $req = $this->m_twod->get_data_by_txtdate_2d();
                echo json_encode($req);
            }
            /*
        	|----------------------------------------------------------------
        	| function get data by txday of display 2d
        	|----------------------------------------------------------------
        	*/
            public function btnsaveall_2d()
        	{
                $req = $this->m_twod->btnsaveall_2d();
                echo json_encode($req);
            }



            
            
}