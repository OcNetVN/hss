<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class Home Controller (Super super_admin)
* 
* @package   FCSE - Horse Racing
* @author    Creater: Vu Hoang Linh - <vuhoanglinh2002@gmail.com>
* @author    Updater: Vu Hoang Linh - <vuhoanglinh2002@gmail.com>
* @copyright 2015 The FCSE
*/
class Auto_call extends CI_Controller {

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
        $this->load->model('superadmin/m_sell_phone_page');
        $this->load->model('superadmin/m_trans_history');
        $this->load->model('superadmin/m_adduser');
        $this->load->model('superadmin/m_listmember');
        
	}
    
    public function auto_insert_in_10th()
    {
        $req = $this->m_gen_statement->auto_insert_in_10th();
    } 
    public function auto_call_nodejs_RefreshLiveTote()
    {
        $this->load->view('app/horse/js/js_auto_call_nodejs_RefreshLiveTote_view'); 
    } 
    public function auto_call_nodejs_RefreshF5()
    {
        $this->load->view('app/horse/js/js_auto_call_nodejs_RefreshF5_view'); 
    } 
}