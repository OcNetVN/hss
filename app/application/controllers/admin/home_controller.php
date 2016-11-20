<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class Home Controller (admin)
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
    public $data;
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
        $this->load->model('admin/m_live_tote');
        $this->load->model('admin/m_racing_board');
        $this->load->model('admin/m_race_card');//M_horse_info
        $this->load->model('admin/m_detail_horse');
        $this->load->model('admin/m_weight_board');
        $this->load->model('admin/m_scra_ear');
        $this->load->model('admin/m_parameter');
        $this->load->model('admin/m_race_result');
        $this->load->model('admin/m_horse_board');
        $this->load->model('admin/m_history_number');
        $this->load->model('admin/m_parameter_table');
        $this->load->model('admin/m_soccer');
        $this->common->check_accuser();
		$this->common->set_lang();		
	}

	/**
	* Function view racing card
	* Date: 02/02/2015
	* URL Page: admin/racingcard
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show Racing card
	*/
	public function index()
	{		
		$p_arr 	=	array(
						'title'				=>	'Admin page',
						'active'			=>	2,
						'p_custom_css'		=>	$this->load->view('admin/css/css_race_card_view', '', TRUE),
						'p_custom_js' 		=>	$this->load->view('admin/js/js_race_card_view', '', TRUE)
                        //'p_custom_js'       =>    $this->load->view('admin/js/js_scratching_early_view', '', TRUE)
					);

		/*
		|----------------------------------------------------------------
		| Load Head View
		| Load Header View
		| Load Left View
		| Load Racing Card View
		| Load Footer View
		|----------------------------------------------------------------
		*/
		$this->load->view("super_admin/head_view", $p_arr);
		$this->load->view("admin/header_view");
		$this->load->view("admin/left_view");
		$this->load->view("admin/race_card_view");
		$this->load->view("super_admin/footer_view");
	}

	/**
	* Function view live tote
	* Date: 02/02/2015
	* URL Page: admin/live_tote
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show live tote
	*/
    
    /* Tote Board */
	public function live_tote()
	{
		$p_arr 	=	array(
						'title'				=>	'Admin page',
						'active'			=>	0,
						'p_custom_js'         =>    $this->load->view('admin/js/js_live_tote_view', '', TRUE)
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
          if($this->session->userdata("raceCountry") != null)
          {             
           $data["raceCountry"] = $this->session->userdata("raceCountry");  
          }
          else
          {
             $data["raceCountry"] = "MY";
          } 
          
        
		$this->load->view("super_admin/head_view", $p_arr);
		$this->load->view("admin/header_view");
		$this->load->view("admin/left_view");
		$this->load->view("admin/live_tote_view",$data);
		$this->load->view("super_admin/footer_view");
	}

    /* jocky color */
    public function jocky_color()
    {
        $p_arr  =   array(
                        'title'             =>  'Admin page',
                        'active'            =>  8,
                        'p_custom_js'       =>   $this->load->view('admin/js/js_jocky_color_view', '', TRUE)
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
        $this->load->view("admin/jocky_color_view");
        $this->load->view("super_admin/footer_view");
    }
    /* end jocky color */
    
    public function addToteBoard(){
        $req = $this->m_live_tote->addToteBoard();
        echo json_encode($req);
    }
    
    public function addSinToteBoard(){
       $req = $this->m_live_tote->addSinToteBoard();
       echo json_encode($req); 
    }

    public function addlivetoMal()
    {
        $req = $this->m_live_tote->addlivetoMal();
        echo json_encode($req);
    }

    public function addlivetoSin()
    {
        $req = $this->m_live_tote->addlivetoSin();
        echo json_encode($req);
    }
    
    public function getSelectRace(){
        $req = $this->m_live_tote->getSelectRace();
        echo json_encode($req); 
    }
    
    
    public function savehistorylottery()
    {
        $req = $this->m_history_number->savehistorylottery();
        echo json_encode($req);
    }
    //getSelectRaceSin
    
    public function getSelectRaceSin(){
        $req = $this->m_live_tote->getSelectRaceSin();
        echo json_encode($req); 
    }

    public function loadToteMal()
    {
        //loadToteMal
        $req = $this->m_live_tote->loadToteMal();
        echo json_encode($req);
    }

    public function loadToteSin()
    {
        $req = $this->m_live_tote->loadToteSin();
        echo json_encode($req);
    }

    public function tickflagcountry()
    {
        $req = $this->m_live_tote->tickflagcountry();
        echo json_encode($req);
    }
    
    public function SaveResultScore()
    {
        $req = $this->m_soccer->SaveResultScore();
        echo json_encode($req);
    }

    public function SaveResulTeam()
    {
        $req = $this->m_soccer->SaveResulTeam();
        echo json_encode($req);
    }

    public function l_ResultDay()
    {
        $req = $this->m_soccer->l_ResultDay();
        echo json_encode($req);
    }

    public function l_ResultSoccer()
    {
        $req = $this->m_soccer->l_ResultSoccer();
        echo json_encode($req);
    }
    public function SaveFileHtml()
    {
        $req = $this->m_soccer->SaveFileHtml();
        echo json_encode($req);
    }

    public function SaveFileHtmlResult()
    {
        $req = $this->m_soccer->SaveFileHtmlResult();
        echo json_encode($req);
    }

    public function SaveFileHtmlLvieBoth()
    {
        $req = $this->m_soccer->SaveFileHtmlLvieBoth();
        echo json_encode($req);
    }

    public function SaveFileHtmlTodayBoth()
    {
        $req = $this->m_soccer->SaveFileHtmlTodayBoth();
        echo json_encode($req);
    }

    public function SaveFileHtmlEarly()
    {
        $req = $this->m_soccer->SaveFileHtmlEarly();
        echo json_encode($req);
    }

    public function SaveFileHtmlLvie()
    {
        $req = $this->m_soccer->SaveFileHtmlLvie();
        echo json_encode($req);
    }

    public function SaveLadbrokeFileHtml()
    {
        $req = $this->m_soccer->SaveLadbrokeFileHtml();
        echo json_encode($req);
    }
    
     public function SaveFileHtmlResultNew()
        {
            $req = $this->m_soccer->SaveFileHtmlResultNew();
            echo json_encode($req);
        }

    // race info 
    public function loadlistRaceCard(){
        $req = $this->m_racing_board->loadlistRaceCard();
        echo json_encode($req);
    }

    public function saveTimeCountry()
    {
        $req = $this->m_racing_board->saveTimeCountry();
        echo json_encode($req);
    }

    public function StopTimeCountry()
    {
        $req = $this->m_racing_board->StopTimeCountry();
        echo json_encode($req);
    }
    
    public function loadRaceInfo(){
        $req = $this->m_racing_board->loadRaceInfo();
        echo json_encode($req);
    }

    public function updateStatusRaceCard()
    {
        $req = $this->m_race_card->updateStatusRaceCard();
        echo json_encode($req);
    }

    public function loadBothsubItem()
    {
        $req = $this->m_racing_board->loadBothsubItem();
        echo json_encode($req);
    }
    
    
    // Scratching & Early - SaveSE
    public function SaveSE(){
        $req = $this->m_scra_ear->SaveSE();
        echo json_encode($req);
    }
    
    public function getscrachingEarly(){
        $req = $this->m_scra_ear->getscrachingEarly();
        echo json_encode($req);
    }

    public function gotoSCR(){
        $req = $this->m_scra_ear->gotoSCR();
        echo json_encode($req);
    }

    public function SaveSEDetail(){
        $req = $this->m_scra_ear->SaveSEDetail();
        echo json_encode($req);
    }
    
    // race card
    public function GotoRaceCard(){
        $req = $this->m_racing_board->GotoRaceCard();
        echo json_encode($req);
    }
    
    // get date has có danh sách Race Card
    public function loadlistRaceDate(){
        $req = $this->m_race_card->loadlistRaceDate();
        echo json_encode($req);
    }


    
    public function UpdateRaceCardDeatil(){
        $req = $this->m_race_card->UpdateRaceCardDeatil();
        echo json_encode($req);
    }
    
    public function loadRace_Date(){
        $req = $this->m_race_card->loadRace_Date();
        echo json_encode($req);
    }
    
    public function SaveRaceCard(){
        $req = $this->m_race_card->SaveRaceCard();
        echo json_encode($req);
    }
    
     public function getRaceCardDetail(){
        $req = $this->m_race_card->getRaceCardDetail();
        echo json_encode($req);
    }

    public function UpdateCountryStatus(){
        $req = $this->m_race_card->UpdateCountryStatus();
        echo json_encode($req);
    }

    public function UpdateHorseNoOfRaceCard(){
        $req = $this->m_race_card->UpdateHorseNoOfRaceCard();
        echo json_encode($req);
    }

   public function SelectRaceIdWinner()
    {
        $req = $this->m_race_card->SelectRaceIdWinner();
        echo json_encode($req);
    }

    // page Racing board thanh cong
    public function saveRaceInfo(){
        $req = $this->m_racing_board->saveRaceInfo();
        echo json_encode($req);
    }
    public function saveRaceInfo1(){
        $req = $this->m_racing_board->saveRaceInfo1();
        echo json_encode($req);
    }
    public function saveRaceInfo2(){
        $req = $this->m_racing_board->saveRaceInfo2();
        echo json_encode($req);
    }
    public function saveRaceInfo3(){
        $req = $this->m_racing_board->saveRaceInfo3();
        echo json_encode($req);
    }
    public function loadRCID(){
        $req = $this->m_racing_board->loadRCID();
        echo json_encode($req);
    }
   
   // save weight board 
    public function loadRaceWeightBaord(){
        $req = $this->m_weight_board->loadRaceWeightBaord();
        echo json_encode($req);
    }
    
    public function SaveWeightBoard(){
        $req = $this->m_weight_board->SaveWeightBoard();
        echo json_encode($req);
    }
    
    public function getListWeightBoard(){
        $req = $this->m_weight_board->getListWeightBoard();
        echo json_encode($req);
    }
    
    // end race info//M_horse_info
     public function SaveHorseInfo(){
        $req = $this->m_detail_horse->SaveHorseInfo();
        echo json_encode($req);
    }
    public function SaveListHorse(){
        $req = $this->m_detail_horse->SaveListHorse();
        echo json_encode($req);
    }
    
    public function ClearHorseInfo(){
        $req = $this->m_detail_horse->ClearHorseInfo();
        echo json_encode($req);
    }

    public function get_jockycolor(){
         $req = $this->m_detail_horse->get_jockycolor();
         echo json_encode($req);
    }
    
    public function SaveHorseInfoDetail(){
        $req = $this->m_detail_horse->SaveHorseInfoDetail();
        echo json_encode($req);
    }

    public function UpdateHorseInfoChenese()
    {
        $req = $this->m_detail_horse->UpdateHorseInfoChenese();
        echo json_encode($req);
    }

    public function EditAddColor(){
        $req = $this->m_detail_horse->EditAddColor();
        echo json_encode($req);
    }

    // button submit save image into about database
    public function uploadImage()
    {
        $req = $this->m_detail_horse->uploadImage();
        echo json_encode($req);
    }

    // end button submit save image into abou

    public function updatehorsejocky()
    {
        $req = $this->m_detail_horse->updatehorsejocky();
        echo json_encode($req);
    }

    public function DetailHorseInfo()
    {
        $req = $this->m_detail_horse->DetailHorseInfo();
        echo json_encode($req);
    }

    public function LoadListHorse()
    {
        $req = $this->m_detail_horse->LoadListHorse();
        echo json_encode($req);
    }

    

    public function loadJockyDetail()
    {
        $req = $this->m_detail_horse->loadJockyDetail();
        echo json_encode($req);
    }

    public function removejockcolor()
    {
        $req = $this->m_detail_horse->removejockcolor();
        echo json_encode($req);
    }

    public function GotoDetailHorseInfo(){
        $req = $this->m_detail_horse->GotoDetailHorseInfo();
        echo json_encode($req);
    }


    public function UpdateHorseInfoRuning1234()
    {
        $req = $this->m_racing_board->UpdateHorseInfoRuning1234();
        echo json_encode($req);
    }

    public function EditHorseInfo(){
        $req = $this->m_detail_horse->EditHorseInfo();
        echo json_encode($req);
    }
    // start race horse info
        
    // end  horse info
    
    // function Save Winno for racing board
    public function SaveWinNo()
    {
        $req = $this->m_racing_board->SaveWinNo();
        echo json_encode($req);
    }
    // end function Save Winno for racing board
   // function Save Winner No for racing board
    public function SaveSupportWinnerNo()
    {
         $req = $this->m_racing_board->SaveSupportWinnerNo();
         echo json_encode($req);
    }
    // end function 
    // parameter
    public function loadcategory(){
        $req = $this->m_parameter->loadcategory();
        echo json_encode($req);
    }
    
    
    public function SaveCategory(){
        $req = $this->m_parameter->SaveCategory();
        echo json_encode($req);
    }
    public function AddItem(){
        $req = $this->m_parameter->AddItem();
        echo json_encode($req);
    }
    public function loadsubcategory(){
       $req = $this->m_parameter->loadsubcategory();
        echo json_encode($req); 
    }
    public function deleteItem(){
        $req = $this->m_parameter->deleteItem();
        echo json_encode($req); 
    }
    public function loadsubItem()
    {
        $req = $this->m_parameter->loadsubItem();
        echo json_encode($req);
    }
    
    // Race Result 
    public function SaveRaceResult(){
        $req = $this->m_race_result->SaveRaceResult();
        echo json_encode($req); 
    }
    
    public function LoadListRaceResult(){
        $req = $this->m_race_result->LoadListRaceResult();
        echo json_encode($req);
    }
    public function SaveRaceResultDetail(){
        $req = $this->m_race_result->SaveRaceResultDetail();
        echo json_encode($req);
    }

    public function loadRaceResul_Date(){
        $req = $this->m_race_result->loadRaceResul_Date();
        echo json_encode($req);
    }
    

    public function getlistraceresultday(){
        $req = $this->m_race_result->getlistraceresultday();
        echo json_encode($req);
    }

    public function loadlistRaceResultDate()
    {
        $req = $this->m_race_result->loadlistRaceResultDate();
        echo json_encode($req);
    }

    // horse info board
    public function SaveHorseBoard()
    {
        $req = $this->m_horse_board->SaveHorseBoard();
        echo json_encode($req);
    }

    public function SaveSoccerInfo()
    {
        $req = $this->m_soccer->SaveSoccerInfo();
        echo json_encode($req);
    }

    public function loadHorseBoard(){
        $req = $this->m_horse_board->loadHorseBoard();
        echo json_encode($req);
    }
    
    public function race_info()
    {
       $p_arr     =    array(
                        'title'                 =>    'Admin page',
                        'active'                =>    1,
                        'p_custom_css'          =>  $this->load->view('admin/css/css_race_board_view', '', TRUE),
                        'p_custom_js'           =>  $this->load->view('admin/js/js_race_board_view', '', TRUE),
                        //'p_custom_js'           =>  $this->load->view('admin/js/js_race_card_view', '', TRUE)
                    );
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load race ifo View
        | Load Footer View
        |----------------------------------------------------------------
        */
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("admin/racing_board_view");
        $this->load->view("super_admin/footer_view"); 
    }

    

    public function net_ticket()
    {
       $p_arr     =    array(
                        'title'                 =>    'Admin page',
                        'active'                =>    9,
                        'p_custom_css'          =>  $this->load->view('admin/css/css_race_board_view', '', TRUE),
                        'p_custom_js'           =>  $this->load->view('admin/js/js_net_ticket_view', '', TRUE)
                    );
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load race ifo View
        | Load Footer View
        |----------------------------------------------------------------
        */
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("admin/net_ticket_view");
        $this->load->view("super_admin/footer_view");  
    }
    
    public function horse_info_board(){
        $p_arr     =    array(
                        'title'                =>    'Admin page',
                        'active'               =>    7,
                        'p_custom_js'          =>  $this->load->view('admin/js/js_horse_info_board_view', '', TRUE)
                        
                    );
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load race ifo View
        | Load Footer View
        |----------------------------------------------------------------
        */
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("admin/horse_info_board_view");
        $this->load->view("super_admin/footer_view");
    }
    
    public function database(){
       $p_arr     =    array(
                        'title'                =>    'Admin page',
                        'active'               =>    6,
                        'p_custom_js'          =>    $this->load->view('admin/js/js_database_view', '', TRUE)
                    );
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load database View
        | Load Footer View
        |----------------------------------------------------------------
        */
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("admin/parameter_view");
        $this->load->view("super_admin/footer_view"); 
    }

    public function goal_prameter()
    {
        $p_arr     =    array(
                        'title'                =>    'Admin page',
                        'active'               =>    39,
                        'p_custom_js'          =>    $this->load->view('admin/js/js_goal_view', '', TRUE)
                    );
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load database View
        | Load Footer View
        |----------------------------------------------------------------
        */
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("admin/soccer/parameter_country_leagues");
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
	public function set()
	{
		$p_arr 	=	array(
						'title'				=>	'Admin page',
						'active'			=>	4,
                        'p_custom_js'       =>    $this->load->view('admin/js/js_scratching_early_view', '', TRUE)
					);
		/*
		|----------------------------------------------------------------
		| Load Head View
		| Load Header View
		| Load Left View
		| Load Set View
		| Load Footer View
		|----------------------------------------------------------------
		*/
		$this->load->view("super_admin/head_view", $p_arr);
		$this->load->view("admin/header_view");
		$this->load->view("admin/left_view");
		$this->load->view("admin/set_view");
		$this->load->view("super_admin/footer_view");
	}
    
    public function ScratchingEarlyTicket()
    {
        $p_arr     =    array(
                        'title'                =>    'Admin page',
                        'active'            =>    4,
                        'p_custom_css'        =>    $this->load->view('admin/css/css_race_card_view', '', TRUE),
                        'p_custom_js'         =>    $this->load->view('admin/js/js_race_card_view', '', TRUE)
                    );
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load Set View
        | Load Footer View
        |----------------------------------------------------------------
        */
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("admin/ScratchingEarlyTicket");
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
	public function weight_board()
	{
		$p_arr 	=	array(
						'title'				=>	'Admin page',
						'active'			=>	3,
						//'p_custom_css'		=>	$this->load->view('admin/css/css_weight_board_view', '', TRUE),
						'p_custom_js' 		=>	$this->load->view('admin/js/js_weight_board_view', '', TRUE)
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
		$this->load->view("admin/weight_board_view");
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
	public function race_result()
	{
		$p_arr 	=	array(
						'title'				=>	'Admin page',
						'active'			=>	5,
						'p_custom_css'		=>	$this->load->view('admin/css/css_race_card_view', '', TRUE),
						'p_custom_js' 		=>	$this->load->view('admin/js/js_race_card_view', '', TRUE)
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
		$this->load->view("admin/race_result_view");
		$this->load->view("super_admin/footer_view");
	}

    // admin setting 
    public function history_number()
    {
        $p_arr  =   array(
                        'title'             =>  'Admin page',
                        'active'            =>  38,
                        'active_submenu'    =>  4,
                        //'p_custom_css'      =>  $this->load->view('admin/css/css_race_card_view', '', TRUE),
                        'p_custom_js'       =>  $this->load->view('admin/js/js_history_number', '', TRUE)
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
        $this->load->view("admin/history_number_view");
        $this->load->view("super_admin/footer_view");
    }

    public function soccer_live()
    {
        $p_arr  =   array(
                        'title'             =>  'Admin page',
                        'active'            =>  25,
                        'active_submenu'    =>  3,
                        'p_custom_css'      =>  $this->load->view('admin/css/css_soccer_live', '', TRUE),
                        'p_custom_js'       =>  $this->load->view('admin/js/js_soccer_live', '', TRUE)
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
        $this->load->view("admin/soccer/live_view");
        $this->load->view("super_admin/footer_view");
    }

    public function score_correct()
    {
        $p_arr  =   array(
                        'title'             =>  'Admin page',
                        'active'            =>  36,
                        'active_submenu'    =>  3,
                        //'p_custom_css'      =>  $this->load->view('admin/css/css_race_card_view', '', TRUE),
                        'p_custom_js'       =>  $this->load->view('admin/js/js_score_correct', '', TRUE)
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
        $this->load->view("admin/soccer/dc_ft_fh");
        $this->load->view("super_admin/footer_view");
    }

    public function soccer_today()
    {
        $p_arr  =   array(
                        'title'             =>  'Admin page',
                        'active'            =>  26,
                        'active_submenu'    =>  3,
                        //'p_custom_css'      =>  $this->load->view('admin/css/css_race_card_view', '', TRUE),
                        'p_custom_js'       =>  $this->load->view('admin/js/js_today_view', '', TRUE)
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
        $this->load->view("admin/soccer/today_view");
        $this->load->view("super_admin/footer_view");
    }

    public function soccer_earlymarket()
    {
        $p_arr  =   array(
                        'title'             =>  'Admin page',
                        'active'            =>  27,
                        'active_submenu'    =>  3,
                        'p_custom_js'       =>  $this->load->view('admin/js/js_early_market', '', TRUE)
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
        $this->load->view("admin/soccer/early_market_view");
        $this->load->view("super_admin/footer_view");
    }

    public function soccer_result()
    {
        $p_arr  =   array(
                        'title'             =>  'Admin page',
                        'active'            =>  30,
                        'active_submenu'    =>  3,
                        'p_custom_js'       =>  $this->load->view('admin/js/js_result_view', '', TRUE)
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
        $this->load->view("admin/soccer/result_view");
        $this->load->view("super_admin/footer_view");
    }

    public function soccer_info()
    {
        $p_arr     =    array(
                        'title'                =>    'Admin page',
                        'active'               =>    37,
                        'active_submenu'       =>    3,
                        'p_custom_js'          =>  $this->load->view('admin/js/js_soccer_info_view', '', TRUE)
                        
                    );
        
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("admin/soccer/soccer_info_view");
        $this->load->view("super_admin/footer_view");
    }

    public function manual_live_score()
    {
        $data = $this->data;
        $p_arr     =    array(
                                'title'                =>    'Admin page',
                                'active'               =>    38,
                                'active_submenu'       =>    3,
                                'p_custom_js'          =>  $this->load->view('admin/js/js_manual_live_view', '', TRUE),
                            );
        $choose_team = array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6,'7'=>7,'8'=>8,'9'=>9,'10'=>10,'11'=>11,'12'=>12);
        $data['choo_team']   = $choose_team;
        $data['eventResult'] = $this->m_soccer->getEventResult();
        $data['teamResult']  = $this->m_soccer->getTeamResult();
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("admin/soccer/manual_live_score",$data);
        $this->load->view("super_admin/footer_view"); 
    }

    public function soccer_ladbrokes()
    {
        $p_arr  =   array(
                        'title'             =>  'Admin page',
                        'active'            =>  35,
                        'active_submenu'    =>  3,
                        'p_custom_js'       =>  $this->load->view('admin/js/js_ladbrokes_view', '', TRUE)
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
        $this->load->view("admin/soccer/dc_12_view");
        $this->load->view("super_admin/footer_view");
    }

    public function soccer_live_score()
    {
        $p_arr  =   array(
                        'title'             =>  'Admin page',
                        'active'            =>  28,
                        'active_submenu'    =>  3,
                        //'p_custom_css'      =>  $this->load->view('admin/css/css_race_card_view', '', TRUE),
                        //'p_custom_js'       =>  $this->load->view('admin/js/js_history_number', '', TRUE)
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
        $this->load->view("admin/soccer/live_score_view");
        $this->load->view("super_admin/footer_view");
    }

    public function soccer_favourite()
    {
        $p_arr  =   array(
                        'title'             =>  'Admin page',
                        'active'            =>  29,
                        'active_submenu'    =>  3,
                        //'p_custom_css'      =>  $this->load->view('admin/css/css_race_card_view', '', TRUE),
                        //'p_custom_js'       =>  $this->load->view('admin/js/js_history_number', '', TRUE)
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
        $this->load->view("admin/soccer/favourite_view");
        $this->load->view("super_admin/footer_view");
    }


    public function parameter_table(){
       $p_arr     =    array(
                        'title'                =>    'Admin page',
                        'active'               =>    33,
                        'active_submenu'       =>    3,
                        'p_custom_js'          =>    $this->load->view('admin/js/js_parameter_table_view', '', TRUE)
                    );
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load database View
        | Load Footer View
        |----------------------------------------------------------------
        */
        $this->load->view("super_admin/head_view", $p_arr);
        $this->load->view("admin/header_view");
        $this->load->view("admin/left_view");
        $this->load->view("admin/soccer/parameter_table_view");
        $this->load->view("super_admin/footer_view"); 
    }

    public function loadAllTables()
    {
        $req = $this->m_parameter_table->loadAllTables();
        echo json_encode($req);
    }

    public function loadLeagueTable()
    {
        $req = $this->m_parameter_table->loadLeagueTable();
        echo json_encode($req);
    }

    public function LoadInforLeague()
    {
        $req = $this->m_parameter_table->LoadInforLeague();
        echo json_encode($req);
    }

    public function SaveCountry()
    {
        $req = $this->m_parameter_table->SaveCountry();
        echo json_encode($req);
    }

    public function deleteLeagueTable()
    {
        $req = $this->m_parameter_table->deleteLeagueTable();
        echo json_encode($req);
    }

    public function addLeagueTable()
    {
        $req = $this->m_parameter_table->addLeagueTable();
        echo json_encode($req); 
    }

    public function tb_detail()
    {
        $p_arr  =   array(
                        'title'             =>  'Admin page',
                        'active'            =>  34,
                        'active_submenu'    =>  3,
                        //'p_custom_css'      =>  $this->load->view('admin/css/css_race_card_view', '', TRUE),
                        'p_custom_js'       =>  $this->load->view('admin/js/js_cv_table_detail', '', TRUE)
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
        $this->load->view("admin/soccer/convert_tb_detail_view");
        $this->load->view("super_admin/footer_view");
    }

    public function savetabledetail()
    {
        $req = $this->m_parameter_table->savetabledetail();
        echo json_encode($req); 
    }
    public function LoadScrachingEarlyByRaceNo()
    {             
        $req = $this->m_scra_ear->LoadScrachingEarlyByRaceNo();
        echo json_encode($req); 
    }
    public function SaveScrachingEarlyByRaceNo()
    {
        $req = $this->m_scra_ear->SaveScrachingEarlyByRaceNo();
        echo json_encode($req); 
    }
}