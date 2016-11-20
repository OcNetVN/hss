<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class Home Controller (Super super_admin)
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
        $this->load->model('superadmin/m_listagent'); 
        $this->load->model('superadmin/m_addagent'); 
        $this->load->model('superadmin/m_show_all'); 
        $this->load->model('superadmin/m_report');
        $this->load->model('superadmin/m_gen_statement');      
        $this->load->model('superadmin/m_agent_page');
        $this->load->model('superadmin/m_trans_history');
        $this->load->model('superadmin/m_adduser');
        $this->load->model('superadmin/m_listmember');
		/*
		|----------------------------------------------------------------
		|Load common library
        |Call function check isset session superadmin
		|Call function set lang
		|----------------------------------------------------------------
		*/
		$this->load->library("common");
        $this->common->check_accusersuper();
		$this->common->set_lang();
		
	}

	/**
	* Function view super_admin page
	* Date: 02/02/2015
	* URL Page: super_admin/dashboard
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show Dashboard Page
	*/
	public function index()
	{	
        $p_arr 	=	array(
						'title'		=>	'Super admin page',
						'active'	=>	0,
                        'p_custom_css'		=>	$this->load->view('super_admin/css/css_index_view', '', TRUE),
						'p_custom_js' 		=>	$this->load->view('super_admin/js/js_index_view', '', TRUE)
					);
		/*
		|----------------------------------------------------------------
		| Load Head View
		| Load Header View
		| Load Left View
		| Load super_admin View
		| Load Footer View
		|----------------------------------------------------------------
		*/
        
		$this->load->view("super_admin/head_view", $p_arr);
		$this->load->view("super_admin/header_view");
		$this->load->view("super_admin/left_view");
		$this->load->view("super_admin/admin_page_view");
		$this->load->view("super_admin/footer_view");
	}
    /**
	* Function view list_member page
	* Date: 06/03/2015
	* URL Page: super_admin/list_member
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show Dashboard Page
	*/
	public function list_member()
	{	
        if(isset($_SESSION['AccUserSuper']) && ($_SESSION['AccUserSuper']['level'] ==1 || $_SESSION['AccUserSuper']['level'] == 2))
        {
            $p_arr 	=	array(
    						'title'		=>	'Super admin page',
    						'active'	=>	6,
                            'p_custom_css'		=>	$this->load->view('super_admin/css/css_index_view', '', TRUE),
    						'p_custom_js' 		=>	$this->load->view('super_admin/js/js_list_member_view', '', TRUE)
    					);
    		/*
    		|----------------------------------------------------------------
    		| Load Head View
    		| Load Header View
    		| Load Left View
    		| Load list_member View
    		| Load Footer View
    		|----------------------------------------------------------------
    		*/
            
    		$this->load->view("super_admin/head_view", $p_arr);
    		$this->load->view("super_admin/header_view");
    		$this->load->view("super_admin/left_view");
    		$this->load->view("super_admin/list_member_view");
    		$this->load->view("super_admin/footer_view");
        }
		else
            header('Location: '.base_url('super_admin/login'));
	}

	/**
	* Function view transaction history
	* Date: 02/02/2015
	* URL Page: super_admin/trans
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show transaction history
	*/
	public function trans_history()
	{					
		$p_arr 	=	array(
						'title'		=>	'Super admin page',
						'active'	=>	1,
                        'p_custom_css'		=>	$this->load->view('super_admin/css/css_index_view', '', TRUE),
                        'p_custom_js' 		=>	$this->load->view('super_admin/js/js_trans_history_view', '', TRUE)
					);
		/*
		|----------------------------------------------------------------
		| Load Head View
		| Load Header View
		| Load Left View
		| Load Trans history
		| Load Footer View
		|----------------------------------------------------------------
		*/
		$this->load->view("super_admin/head_view", $p_arr);
		$this->load->view("super_admin/header_view");
		$this->load->view("super_admin/left_view");
		$this->load->view("super_admin/trans_history_view");
		$this->load->view("super_admin/footer_view");
	}

	/**
	* Function view add agent
	* Date: 02/02/2015
	* URL Page: super_admin/add_agent
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show Add agent
	*/
	public function add_agent()
	{	
        if(isset($_SESSION['AccUserSuper']) && ($_SESSION['AccUserSuper']['level'] ==1 || $_SESSION['AccUserSuper']['level'] == 2))
        {
            $p_arr 	=	array(
    						'title'		=>	'Super admin page',
    						'active'	=>	2,
                            'p_custom_css'		=>	$this->load->view('super_admin/css/css_index_view', '', TRUE),
                            'p_custom_js' 		=>	$this->load->view('super_admin/js/js_add_agent_view', '', TRUE)
    					);
    		/*
    		|----------------------------------------------------------------
    		| Load Head View
    		| Load Header View
    		| Load Left View
    		| Load Add agent View
    		| Load Footer View
    		|----------------------------------------------------------------
    		*/
    		$this->load->view("super_admin/head_view", $p_arr);
    		$this->load->view("super_admin/header_view");
    		$this->load->view("super_admin/left_view");
    		$this->load->view("super_admin/add_agent_view");
    		$this->load->view("super_admin/footer_view");
        }
		else
            header('Location: '.base_url('super_admin/login'));
	}

	/**
	* Function view add user
	* Date: 02/02/2015
	* URL Page: super_admin/add_user
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show Add user
	*/
	public function add_user()
	{	
        if(isset($_SESSION['AccUserSuper']) && ($_SESSION['AccUserSuper']['level'] ==1 || $_SESSION['AccUserSuper']['level'] == 2))
        {
            $p_arr 	=	array(
    						'title'				=>	'Super admin page',
    						'active'			=>	2,
    						'p_custom_css'		=>	$this->load->view('super_admin/css/css_add_new_user_view', '', TRUE),
    						'p_custom_js' 		=>	$this->load->view('super_admin/js/js_add_new_user_view', '', TRUE)
    					);
    		/*
    		|----------------------------------------------------------------
    		| Load Head View
    		| Load Header View
    		| Load Left View
    		| Load Add user View
    		| Load Footer View
    		|----------------------------------------------------------------
    		*/
    		$this->load->view("super_admin/head_view", $p_arr);
    		$this->load->view("super_admin/header_view");
    		$this->load->view("super_admin/left_view");
    		$this->load->view("super_admin/add_user_view");
    		$this->load->view("super_admin/footer_view");
        }
		else
            header('Location: '.base_url('super_admin/login'));   
	}

	/**
	* Function view show all
	* Date: 02/02/2015
	* URL Page: super_admin/show_all
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show all
	*/
	public function show_all()
	{	
		$p_arr 	=	array(
						'title'		=>	'Super admin page',
						'active'	=>	3,
                        'p_custom_css'		=>	$this->load->view('super_admin/css/css_index_view', '', TRUE),
						'p_custom_js' 		=>	$this->load->view('super_admin/js/js_show_all_view', '', TRUE)
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
		$this->load->view("super_admin/header_view");
		$this->load->view("super_admin/left_view");
		$this->load->view("super_admin/show_all_view");
		$this->load->view("super_admin/footer_view");
	}

	/**
	* Function view report
	* Date: 02/02/2015
	* URL Page: super_admin/report
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show all
	*/
	public function report()
	{	
        if(isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level'] ==1)
        {
            $p_arr 	=	array(
    						'title'		=>	'Super admin page',
    						'active'	=>	4,
                            'p_custom_css'		=>	$this->load->view('super_admin/css/css_index_view', '', TRUE),
    						'p_custom_js' 		=>	$this->load->view('super_admin/js/js_report_view', '', TRUE)
    					);
    		/*
    		|----------------------------------------------------------------
    		| Load Head View
    		| Load Header View
    		| Load Left View
    		| Load Add agent View
    		| Load Footer View
    		|----------------------------------------------------------------
    		*/
    		$this->load->view("super_admin/head_view", $p_arr);
    		$this->load->view("super_admin/header_view");
    		$this->load->view("super_admin/left_view");
    		$this->load->view("super_admin/report_view");
    		$this->load->view("super_admin/footer_view");
        }
		else
            header('Location: '.base_url('super_admin/login'));   
	}

	/**
	* Function view generation statement
	* Date: 02/02/2015
	* URL Page: super_admin/gen_statement
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show generation statement view
	*/
	public function gen_statement()
	{	
	    if(isset($_SESSION['AccUserSuper']) && ($_SESSION['AccUserSuper']['level'] ==1 || $_SESSION['AccUserSuper']['level'] == 3))
        {
    		$p_arr 	=	array(
    						'title'				=>	'Super admin page',
    						'active'			=>	5,
    						'p_custom_css'		=>	$this->load->view('super_admin/css/css_gen_statement_view', '', TRUE),
    						'p_custom_js' 		=>	$this->load->view('super_admin/js/js_gen_statement_view', '', TRUE)
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
    		$this->load->view("super_admin/header_view");
    		$this->load->view("super_admin/left_view");
    		$this->load->view("super_admin/gen_statement_view");
    		$this->load->view("super_admin/footer_view");
        }
		else
            header('Location: '.base_url('super_admin/login'));   
	}

	/**
	* Function view agent page
	* Date: 02/02/2015
	* URL Page: super_admin/agent_page
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show agent page
	*/
	public function agent_page()
	{
	   if(isset($_GET['id']))
       {
            $id= $_GET['id'];
    		$agent=$this->m_agent_page->get_agent_by_id($id);
            $active_member=$this->m_agent_page->get_member_by_agent($agent->id,1);
            $inactive_member=$this->m_agent_page->get_member_by_agent($agent->id,0);
            $role=0;
            if(isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level'] ==1 && $agent->level==4)
                $role=1;
            $p_arr_active=0;
            if(isset($role) && $role==1) 
                $p_arr_active=6;
                
            $p_arr 	=	array(
    						'title'		=>	'Super admin page',
    						'active'	=>	$p_arr_active,
    						'p_custom_css'		=>	$this->load->view('super_admin/css/css_add_new_user_view', '', TRUE),
    						'p_custom_js' 		=>	$this->load->view('super_admin/js/js_add_agent_view', '', TRUE)
    					);
    		
    		if(count($agent)==1)
    			$arr_res=array("user"=>$agent,"active_member"=>$active_member,"inactive_member"=>$inactive_member,"role"=>$role);
    		else
    			header('Location: dashboard');
    		/*
    		|----------------------------------------------------------------
    		| Load Head View
    		| Load Header View
    		| Load Left View
    		| Load Agent page
    		| Load Footer View
    		|----------------------------------------------------------------
    		*/
    		$this->load->view("super_admin/head_view", $p_arr);
    		$this->load->view("super_admin/header_view");
    		$this->load->view("super_admin/left_view");
    		$this->load->view("super_admin/agent_page_view",$arr_res);
    		$this->load->view("super_admin/footer_view");
       }
	}

	/**
	* Function view 404 error page
	* Date: 02/02/2015
	* URL Page: 
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show agent page
	*/
	public function error_404()
	{
		/*
		|----------------------------------------------------------------
		| Load 404 View
		|----------------------------------------------------------------
		*/
		$this->load->view("404_view");
	}
    
    /**
	* Date: 16/02/2015
	* Author: Nghia
	*/
    public function get_list_agent()
    {
        $req = $this->m_listagent->get_list_agent();
        echo json_encode($req);
    }
    public function btnsave_addagent()
    {
        if(isset($_SESSION['AccUserSuper']) && ($_SESSION['AccUserSuper']['level'] ==1 || $_SESSION['AccUserSuper']['level'] == 2))
        {
            $req = $this->m_addagent->btnsave_addagent();
            echo json_encode($req);
        }
		else
            header('Location: '.base_url('super_admin/login'));   
    }
     public function btnsave_adduser()
    {
        if(isset($_SESSION['AccUserSuper']) && ($_SESSION['AccUserSuper']['level'] ==1 || $_SESSION['AccUserSuper']['level'] == 2))
        {
            $req = $this->m_adduser->btnsave_adduser();
            echo json_encode($req);
        }
		else
            header('Location: '.base_url('super_admin/login'));   
    }
    
    public function updateagent(){
       $req = $this->m_agent_page->updateagent();
       echo json_encode($req); 
    }
    
    public function deleteagent(){
       $req = $this->m_agent_page->deleteagent();
       echo json_encode($req); 
    }
    public function show_all_agent()
    {
        $req = $this->m_show_all->show_all_agent();
        echo json_encode($req);
    }
    public function show_report()
    {
        if(isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level'] ==1)
        {
            $req = $this->m_report->show_report();
            echo json_encode($req);
        }
		else
            header('Location: '.base_url('super_admin/login'));   
    }
    public function get_agent_statement()
    {
        if(isset($_SESSION['AccUserSuper']) && ($_SESSION['AccUserSuper']['level'] ==1 || $_SESSION['AccUserSuper']['level'] == 3))
        {
            $req = $this->m_gen_statement->get_agent_statement();
            echo json_encode($req);
        }
		else
            header('Location: '.base_url('super_admin/login'));   
    }
    public function show_all_trans()
    {
        $req = $this->m_trans_history->show_all_trans();
        echo json_encode($req);
    }
    public function click_btn_clear_history()
    {
        $req = $this->m_trans_history->click_btn_clear_history();
        echo json_encode($req);
    }
    public function get_option_list_agent()
    {
        if(isset($_SESSION['AccUserSuper']) && ($_SESSION['AccUserSuper']['level'] ==1 || $_SESSION['AccUserSuper']['level'] == 2))
        {
            $req = $this->m_adduser->get_option_list_agent();
            echo json_encode($req);
        }
    }
    public function check_isset_username()
    {
        $req = $this->m_adduser->check_isset_username();
        echo json_encode($req);
    }

    public function get_list_member()
    {
        if(isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level'] ==1)
        {
            $req = $this->m_listmember->get_list_member();
            echo json_encode($req);
        }
		else
            header('Location: '.base_url('super_admin/login'));   
    }
    public function btn_save_addagent()
    {
        if(isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level'] ==1)
        {
            $req = $this->m_listmember->btn_save_addagent();
            echo json_encode($req);
        }
		else
            header('Location: '.base_url('super_admin/login'));   
    }
    public function generatecode()
    {
        if(isset($_SESSION['AccUserSuper']) && $_SESSION['AccUserSuper']['level'] ==1)
        {
            $req = $this->m_listmember->generatecode();
            echo json_encode($req);
        }
		else
            header('Location: '.base_url('super_admin/login'));   
    }
    
    //Linh 05/03/2015
    public function setlang()
    {
        $lang = $this->input->get('lang');

        if($lang != FILE_EN && $lang != FILE_CN)
        {
            $lang = FILE_EN;
        }

        //Set to cookie
        $cookie_time    =   3600*24*30;             
        $this->input->set_cookie('lang', $lang, $cookie_time); 
        redirect($_SERVER['HTTP_REFERER']); 
    }
}