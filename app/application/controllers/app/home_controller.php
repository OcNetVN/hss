<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * Class Login Controller (application controller)
    * 
    * @package   FCSE - Horse Racing
    * @author    Creater: Huu Nghia - <huunghia1810@gmail.com>
    * @author    Updater: Huu Nghia - <huunghia1810@gmail.com>
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
            $this->load->model('admin/m_common_lottery');

            $this->load->model('app/m_login');
            $this->load->model('app/horse/m_horse_info');
            $this->load->model('app/horse/m_racecard');
            $this->load->model('app/horse/m_racecard_choose');
            $this->load->model('app/horse/m_racecard_detail');
            $this->load->model('app/horse/m_result');
            $this->load->model('app/horse/m_result_detail');
            $this->load->model('app/horse/m_scrat_et');
            $this->load->model('app/horse/m_scrat_et_detail');
            $this->load->model('app/horse/m_weight');
            $this->load->model('app/horse/m_weight_choose');
            $this->load->model('app/horse/m_weight_detail');
            $this->load->model('app/horse/m_horse_info_board');

            $this->load->model('app/lottery/m_mallivedraw');
            $this->load->model('app/lottery/m_sinlivedraw');
            $this->load->model('app/lottery/m_damacaionetree');
            $this->load->model('app/lottery/m_magnum');
            $this->load->model('app/lottery/m_bigsweep');
            $this->load->model('app/lottery/m_totofourd');
            $this->load->model('app/lottery/m_cashsweep');
            $this->load->model('app/lottery/m_sandakan');
            $this->load->model('app/lottery/m_sabah');
            $this->load->model('app/lottery/m_sinlottery');
            $this->load->model('app/lottery/m_twod');

            // setting
            $this->load->model('app/setting/m_my_play_number');
            $this->load->model('app/setting/m_hirstory_4d_number');
            $this->load->model('app/setting/m_feedback_custom');
            $this->load->model('app/setting/m_notification');
            $this->load->model('admin/m_setting_about');

            // soccer 
            $this->load->model('app/soccer/m_today');
            $this->load->model('app/soccer/m_sccresult');
            $this->load->model('app/soccer/m_tables_league');
            //m_my_play_number
            $this->load->library("common");
            $this->common->set_lang();
            //$this->common->post();
        }
        /*
        |login by mobile start
        */
        public function login()
        {
            //$this->load->view("app/login_mobile_view");

            if(isset($_GET['username']) && $_GET['pass'] && $_GET['imei'] && $_GET['lang'])
            {
                $username=$_GET['username'];
                $pass=$_GET['pass'];
                $imei=$_GET['imei'];
                $lang=$_GET['lang'];
                if($username!="" && $pass!="" && $imei!="" && $lang!="")
                {
                    $req=$this->m_login->checklogin($username,$pass,$imei,$lang);
                }
                else
                {
                    $stt=0;
                    $mes=$this->lang->line(LANG_MES_NOT_RIGHT_LOGIN_APP);
                    $req=array("stt"=>$stt,"mes"=>$mes);
                }
                $str=$req['stt'].",".$req['mes'];
                //echo json_encode($req);
                echo $str;    
            }
        }
        public function login_2()
        {
            if(isset($_GET['imei']) && isset($_GET['verifycode']) && isset($_GET['lang']))
            {
                $imei=$_GET['imei'];
                $verifycode=$_GET['verifycode'];
                $lang=$_GET['lang'];
                if($lang=='1' || $lang==1)
                {
                    $this->setlang1("en");
                }
                else
                {
                    $this->setlang1("cn");
                }
                $req=$this->m_login->checklogin_2($imei,$verifycode,$lang);
                $str=$req['stt'].",".$req['mes'].",".$req['phone_agent'].",".$req['ImieNo'];
                //$GLOBALS[$req['ImieNo']] = $req['ImieNo'];
                //$_SESSION['serialNumber'] = $req['ImieNo'];
                //echo  $GLOBALS[$req['ImieNo']];
                echo $str;    
            }
        }

        public function messagenotification($imeiNo)
        {
            $serialNumber = "";
            if(isset($GLOBALS[$imeiNo]))
                $serialNumber = $GLOBALS[$imeiNo];
            $str = $this->m_notification->notification($serialNumber);
            echo $str;
        }

        public function loadTickNotification()
        {
            $req = $this->m_notification->loadTickNotification();
            echo json_encode($req);
        }

        public function SaveTickNotification()
        {
            $req = $this->m_notification->SaveTickNotification();
            echo json_encode($req);
        }
        /*
        |login by mobile end
        */

        public function out_show()
        {
            $this->load->view("app/out_view");
        }
        public function menu()
        {
            $p_arr 	=	array(
                'title'				=>	'Main menu',
                //'p_custom_js'         =>    $this->load->view('app/js/js_live_tote_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Menu View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/header_view");
            $this->load->view("app/main_menu_view");
            $this->load->view("app/footer_view");
        }

        /*
        |----------------------------------------------------------------
        | application horse racing start
        |----------------------------------------------------------------
        */
        public function live_tote()
        {
            $p_arr 	=	array(
                'title'				=>	'Live Tote',
                'p_custom_js'         =>    $this->load->view('app/horse/js/js_horse_info_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load Live Tote View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/header_view");
            $this->load->view("app/horse/main_menu_view");
            $this->load->view("app/horse/live_tote_view");
            $this->load->view("app/footer_view");
        }

        // get list Race Info 
        public function getListHorseInfo()
        {    
            $noo = $this->lang->line(LANG_LANGUAGE_NO);
            $req = $this->m_horse_info->getListHorseInfo($noo);
            echo json_encode($req);
        }

        public function getListTimeFlag()
        {
            $req = $this->m_horse_info->getListTimeFlag();
            echo json_encode($req);
        }

        public function getListLiveMalAuto()
        {
            $req = $this->m_horse_info->getListLiveMalAuto();
            echo json_encode($req);
        }

        public function Scratch()
        {
            $p_arr 	=	array(
                'title'				=>	'Horse Scratch',
                //'p_custom_js'         =>    $this->load->view('app/js/js_live_tote_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load horse Scratch View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/header_view");
            $this->load->view("app/horse/main_menu_view");
            $this->load->view("app/horse/scratch_view");
            $this->load->view("app/footer_view");
        }
        public function EarlyTic_MChoice()
        {
            $p_arr 	=	array(
                'title'				=>	'Horse EarlyTicket MChoice',
                //'p_custom_js'         =>    $this->load->view('app/js/js_live_tote_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load horse EarlyTic_MChoice View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/header_view");
            $this->load->view("app/horse/main_menu_view");
            $this->load->view("app/horse/EarlyTic_MChoice_view");
            $this->load->view("app/footer_view");
        }
        public function horse_info()
        {
            $lang ="";
            if(isset($_GET['lang']))
                $lang = $_GET['lang'];
            else
                $lang = 1;

            if($lang =="1" || $lang==1 || $lang=="en")
            {
                $this->setlang1("en");
            }
            else
            {
                $this->setlang1("cn");
            }
            $p_arr 	=	array(
                'title'				=>	'Horse Info',
                'p_custom_js'       =>    $this->load->view('app/horse/js/js_horse_info_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load horse_info View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/header_view");
            $this->load->view("app/horse/main_menu_view");
            $this->load->view("app/horse/horse_info_view");
            $this->load->view("app/footer_view");
        }



        public function soccer_main()
        {
            $lang = "";
            $lang_show = "";
            if(isset($_GET['lang']))
                $lang = $_GET['lang'];
            else
                $lang = 1;

            if($lang == "1" || $lang == 1 || $lang == "en")
            {
                $this->setlang1("en");
                $lang_show = "EN";
            }
            else
            {
                $this->setlang1("cn");
                $lang_show = "CN";
            }

            $p_arr 	=	array(
                'title'				=>	 'Soccer',
                'p_custom_js'       =>    $this->load->view('app/soccer/js/js_soccer_view', '', TRUE)
            );

            $res['HTMLInfo'] = $this->m_today->GetHTML("soccer_today.html",$lang_show);

            $this->load->view("app/head_view", $p_arr);
            //$this->load->view("app/setting/head_view");
            $this->load->view("app/soccer/main_view",$res);
            $this->load->view("app/soccer/footer_view");
            $this->load->view("app/footer_view");
        }

        public function soccer_live()
        {
            $lang = "";
            $lang_show = "";

            if($this->lang->line(LANG_EN) == "English")
            {
                $lang_show = "EN";
            }
            else
            {
                $lang_show = "CN";
            }

            $p_arr 	=	array(
                'title'				=>	 'Live',
                'p_custom_css'      =>   $this->load->view('admin/css/css_soccer_live', '', TRUE),
                'p_custom_js'       =>    $this->load->view('app/soccer/js/js_soccer_live', '', TRUE)
            );

            $res['HTMLInfo'] = $this->m_today->GetHTML("soccer_live.html",$lang_show);

            $this->load->view("app/head_view", $p_arr);
            //$this->load->view("app/setting/head_view");
            $this->load->view("app/soccer/live_view",$res);
            $this->load->view("app/soccer/footer_view");
            $this->load->view("app/footer_view");
        }

        public function soccer_early()
        {
            $lang = "";
            $lang_show = "";

            if($this->lang->line(LANG_EN) == "English")
            {
                $lang_show = "EN";
            }
            else
            {
                $lang_show = "CN";
            }

            $p_arr 	=	array(
                'title'				=>	 'Live',
                'p_custom_js'       =>    $this->load->view('app/soccer/js/js_soccer_early', '', TRUE)
            );

            $res['HTMLInfo'] = $this->m_today->GetHTML("soccer_early.html",$lang_show);

            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/soccer/earlymarket_view",$res);
            $this->load->view("app/soccer/footer_view");
            $this->load->view("app/footer_view");
        }

        public function soccer_info()
        {
            $lang = "";
            $lang_show = "";
            if(isset($_GET['lang']))
                $lang = $_GET['lang'];
            else
                $lang = 1;

            if($lang == "1" || $lang == 1 || $lang == "en")
            {
                $this->setlang1("en");
                $lang_show = "EN";
            }
            else
            {
                $this->setlang1("cn");
                $lang_show = "CN";
            }

            $p_arr 	=	array(
                'title'				=>	 'Soccer',
                'p_custom_js'       =>    $this->load->view('app/soccer/js/js_live_score', '', TRUE)
            );


            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/soccer/soccer_info");
            $this->load->view("app/soccer/footer_view");
            $this->load->view("app/footer_view");
        }

        public function Live_Score_Iframe()
        {
            $dom = new DOMDocument();
            libxml_use_internal_errors(true);
            if($dom->loadHTMLFile('http://en.gooooal.com/soccer/result/'))
            {
                while (($r = $dom->getElementsByTagName("script")) && $r->length) 
                {
                    $r->item(0)->parentNode->removeChild($r->item(0));           
                }           
                $r1 = $dom->getElementById("main_03");
                $r1->parentNode->removeChild($r1);

            }
            $r2 = $dom->getElementById("main_02");
            $html = $dom->saveHTML($r2);
            $data["html"] = $html;
            $this->load->view("app/soccer/ifr_live_score",$data);

        }

        public function live_score()
        {
            $lang_show = "";
            if($this->lang->line(LANG_EN) == "English")
            {
                $lang_show = "EN";
            }
            else
            {
                $lang_show = "CN";
            }

            $p_arr 	= array(
                'title' => 'Live score',
                'p_custom_js'=>$this->load->view('app/soccer/js/js_live_score','',TRUE)
            );

            $res['HTMLInfo'] = $this->m_today->GetHTML("result_soccer.html",$lang_show);
            $this->load->view("app/head_view", $p_arr);
            //$this->load->view("app/setting/head_view");
            $this->load->view("app/soccer/live_score_view",$res);
            $this->load->view("app/soccer/footer_view");
            $this->load->view("app/footer_view");
        }

        public function result_soccer()
        {


            $p_arr  = array(
                'title' => 'Result',
                'p_custom_js' => $this->load->view('app/soccer/js/js_result_view','',TRUE)
            );


            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/setting/head_view");
            $this->load->view("app/soccer/result_view");
            $this->load->view("app/soccer/footer_view");
            $this->load->view("app/footer_view");
        }
        public function new_result_soccer()
        {
            $lang = "";
            $lang_show = "";
            if(isset($_GET['lang']))
                $lang = $_GET['lang'];
            else
                $lang = 1;

            if($lang == "1" || $lang == 1 || $lang == "en")
            {
                $this->setlang1("en");
                $lang_show = "EN";
            }
            else
            {
                $this->setlang1("cn");
                $lang_show = "CN";
            }

            $p_arr     =    array(
                'title'                =>     'Soccer',
                //'p_custom_js'       =>    $this->load->view('app/soccer/js/js_soccer_view', '', TRUE)
            );

            $res['HTMLInfo'] = $this->m_today->GetHTML("result_soccer_new.html",$lang_show);

            $this->load->view("app/head_view", $p_arr);
            //$this->load->view("app/setting/head_view");
            $this->load->view("app/soccer/new_result_view.php",$res);
            $this->load->view("app/soccer/footer_view");
            $this->load->view("app/footer_view");
        }
        public function ladbroke_soccer()
        {
            $lang_show = "";
            if($this->lang->line(LANG_EN) == "English")
            {
                $lang_show = "EN";
            }
            else
            {
                $lang_show = "CN";
            }

            $p_arr  = array(
                'title' => 'ladbroke',
                'p_custom_js' => $this->load->view('app/soccer/js/js_ladbroke_view','',TRUE)
            );

            $res['HTMLInfo'] = $this->m_today->GetHTML("ladbroke_soccer.html",$lang_show);
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/soccer/ladbroke_view",$res);
            $this->load->view("app/soccer/footer_view");
            $this->load->view("app/footer_view");
        }

        public function numberdetail()
        {
            $p_arr = array(
                'title' => 'Number',
                'p_custom_js'=> $this->load->view('app/soccer/js/js_soccer_numberdetail','',TRUE)
            );
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/setting/head_view");
            $this->load->view("app/soccer/number_detail_view");
            $this->load->view("app/soccer/footer_view");
            $this->load->view("app/footer_view");
        }

        public function loadNumberDetail()
        {
            $req = $this->m_today->loadNumberDetail();
            echo json_encode($req);
        }

        public function loadSoccerToday()
        {
            $req = $this->m_today->loadSoccerToday();
            echo json_encode($req);
        }

        public function loadSoccerResult()
        {
            $req = $this->m_sccresult->loadSoccerResult();
            echo json_encode($req);
        }

        public function All_TABLES()
        {
            $p_arr 	=	array(
                'title'				=>	'All TABLES',
                'p_custom_js'         =>    $this->load->view('app/soccer/js/all_tables_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load horse EarlyTic_MChoice View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            //$this->load->view("app/setting/head_view");
            $this->load->view("app/soccer/all_tables_view");
            $this->load->view("app/soccer/footer_view");
            $this->load->view("app/footer_view");
        }

        public function league_table()
        {
            $p_arr 	=	array(
                'title'				=>	'All TABLES',
                'p_custom_js'         =>    $this->load->view('app/soccer/js/js_league_table_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load horse EarlyTic_MChoice View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            //$this->load->view("app/setting/head_view");
            $this->load->view("app/soccer/league_tables_view");
            $this->load->view("app/soccer/footer_view");
            $this->load->view("app/footer_view");
        }

        public function table_detail()
        {
            $p_arr 	=	array(
                'title'				=>	'All TABLES',
                'p_custom_js'         =>    $this->load->view('app/soccer/js/js_table_detail_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load horse EarlyTic_MChoice View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            //$this->load->view("app/setting/head_view");
            $this->load->view("app/soccer/detail_tables_view");
            $this->load->view("app/soccer/footer_view");
            $this->load->view("app/footer_view");
        }

        public function load_list_all_table()
        {
            $req = $this->m_tables_league->load_list_all_table();
            echo json_encode($req);
        }

        public function load_list_league_tables()
        {
            $req = $this->m_tables_league->load_list_league_tables();
            echo json_encode($req);
        }

        public function load_list_table_detail()
        {
            $req = $this->m_tables_league->load_list_table_detail();
            echo json_encode($req);
        }

        // Add Screen Horse Info Board
        public function horse_info_board()
        {
            if(isset($_GET['lang']))
                $_SESSION['langapp'] = $_GET['lang'];
            else
                $_SESSION['langapp'] = 1;
            $p_arr 	=	array(
                'title'				=>	'Horse Info Board',
                'p_custom_js'         =>    $this->load->view('app/horse/js/js_horse_info_board_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load horse_info View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            //$this->load->view("app/header_view");
            //$this->load->view("app/horse/main_menu_view");
            $this->load->view("app/horse/horse_info_board_view");
            $this->load->view("app/footer_view");
        }

        public function loadhorseinfoboard()
        {
            $req = $this->m_horse_info_board->loadhorseinfoboard();
            echo json_encode($req);
        }

        public function loadSoccerinfo()
        {
            $req = $this->m_sccresult->loadSoccerinfo();
            echo json_encode($req);
        }
        // End Add Screen Horse Info Board
        public function Result()
        {
            $p_arr 	=	array(
                'title'				=>	'Horse Result',
                'p_custom_js'         =>    $this->load->view('app/horse/js/js_result_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load horse Result View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/horse/Result_view");
            $this->load->view("app/footer_view");
        }
        public function Result_Detail()
        {

            $p_arr 	=	array(
                'title'				  =>	'Horse Result Detail',
                'p_custom_js'         =>    $this->load->view('app/horse/js/js_Result_Detail_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load horse Result detail View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/horse/Result_Detail_view");
            $this->load->view("app/footer_view");
        }
        public function RaceCard()
        {

            $p_arr 	=	array(
                'title'				  =>	'Horse Race Card',
                'p_custom_js'         =>    $this->load->view('app/horse/js/js_racecard_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load horse RaceCard View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/horse/RaceCard_view");
            $this->load->view("app/footer_view");
        }
        public function RaceCard_Choose()
        {


            $p_arr 	=	array(
                'title'				=>	'Horse Race Card Choose',
                'p_custom_js'         =>    $this->load->view('app/horse/js/js_racecard_choose_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load horse RaceCard choose View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/horse/RaceCard_Choose_view");
            $this->load->view("app/footer_view");
        }
        public function RaceCard_Detail()
        {

            $p_arr 	=	array(
                'title'				=>	'Horse Race Card Detail',
                'p_custom_js'         =>    $this->load->view('app/horse/js/js_racecard_detail_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load horse RaceCard detail View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/horse/RaceCard_Detail_view");
            $this->load->view("app/footer_view");
        }
        public function weight()
        {


            $p_arr 	=	array(
                'title'				=>	'Horse Weight',
                'p_custom_js'         =>    $this->load->view('app/horse/js/js_weight_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load horse weight View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/horse/weight_view");
            $this->load->view("app/footer_view");
        }
        public function weight_choose()
        {


            $p_arr 	=	array(
                'title'				=>	'Horse Weight Choose',
                'p_custom_js'         =>    $this->load->view('app/horse/js/js_weight_choose_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load horse RaceCard choose View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/horse/Weight_Choose_view");
            $this->load->view("app/footer_view");
        }
        public function weight_detail()
        {

            $p_arr 	=	array(
                'title'				=>	'Horse Weight Detail',
                'p_custom_js'       =>    $this->load->view('app/horse/js/js_weight_detail_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load horse RaceCard choose View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/horse/weight_detail_view");
            $this->load->view("app/footer_view");
        }
        public function Scrat_Et()
        {


            $p_arr 	=	array(
                'title'				  =>	'Horse Scrathing and Early Ticket',
                'p_custom_js'         =>    $this->load->view('app/horse/js/js_scrat_et_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load horse Scrathing_EarlyTicket View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/horse/Scrathing_EarlyTicket_view");
            $this->load->view("app/footer_view");
        }
        public function scrat_et_detail()
        {


            $p_arr 	=	array(
                'title'				=>	'Horse Scrathing and Early Ticket Detail',
                'p_custom_js'         =>    $this->load->view('app/horse/js/js_scrat_et_detail_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load Header View
            | Load Mainmenu View
            | Load horse Scrat_Et_Detail View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/horse/Scrat_Et_Detail_view");
            $this->load->view("app/footer_view");
        }

        /*
        |----------------------------------------------------------------
        | application horse end 
        |----------------------------------------------------------------
        */
        public function load_tbl_part1()
        {
            $req = $this->m_horse_info->load_tbl_part1();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | load page horse racecard
        |----------------------------------------------------------------
        */
        public function loadracecard()
        {
            $req = $this->m_racecard->loadracecard();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | load page horse racecard choose
        |----------------------------------------------------------------
        */
        public function loadracecard_by_country_day()
        {
            $req = $this->m_racecard_choose->loadracecard_by_country_day();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | load page weight
        |----------------------------------------------------------------
        */
        public function loadweight()
        {
            $req = $this->m_weight->loadweight();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | load page weight
        |----------------------------------------------------------------
        */
        public function loadweight_by_country_day()
        {
            $req = $this->m_weight_choose->loadweight_by_country_day();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | load page weight detail
        |----------------------------------------------------------------
        */
        public function load_weight_detail()
        {
            $req = $this->m_weight_detail->load_weight_detail();
            echo json_encode($req);
        }

        public function SaveMyPlay()
        {
            $req = $this->m_my_play_number->SaveMyPlay();
            echo json_encode($req);
        }

        public function loadmyplaynumber()
        {
            $req = $this->m_my_play_number->loadmyplaynumber();
            echo json_encode($req);
        }

        public function loadlistplaynumber()
        {
            $req = $this->m_my_play_number->loadlistplaynumber();
            echo json_encode($req);
        }

        public function SearchHistoryNumber()
        {
            $req = $this->m_hirstory_4d_number->SearchHistoryNumber();
            echo json_encode($req);
        }

        public function SaveFeedback()
        {
            $req = $this->m_feedback_custom->SaveFeedback();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | load page scrat & ticket early
        |----------------------------------------------------------------
        */
        public function load_scrat_et()
        {
            $req = $this->m_scrat_et->load_scrat_et();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | load page scrat & ticket early
        |----------------------------------------------------------------
        */
        public function load_scrat_et_detail()
        {
            $req = $this->m_scrat_et_detail->load_scrat_et_detail();
            echo json_encode($req);
        }

        /*
        |----------------------------------------------------------------
        | load page racecard detail
        |----------------------------------------------------------------
        */
        public function loadhorseinfo()
        {
            $req = $this->m_racecard_detail->loadhorseinfo();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | check have race or not by contry & date
        |----------------------------------------------------------------
        */
        public function check_have_race_by_country_date()
        {
            $req = $this->m_horse_info->check_have_race_by_country_date();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | load result
        |----------------------------------------------------------------
        */
        public function loadresult()
        {
            $req = $this->m_result->loadresult();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | load resultdetail
        |----------------------------------------------------------------
        */
        public function loadresultdetail()
        {
            $req = $this->m_result_detail->loadresultdetail();
            echo json_encode($req);
        }

        /*
        |----------------------------------------------------------------
        | @@
        | controller for lottry
        | @@
        |----------------------------------------------------------------
        */
        /*
        |----------------------------------------------------------------
        | function lottry main
        |----------------------------------------------------------------
        */
        public function lottry()
        {
            $lang ="";
            if(isset($_GET['lang']))
                $lang = $_GET['lang'];
            else
                $lang = 1;

            if($lang =="1" || $lang==1)
            {
                $this->setlang1("en");
            }
            else
            {
                $this->setlang1("cn");
            }

            $p_arr 	=	array(
                'title'				=>	'Lottry',
                //'p_custom_js'         =>    $this->load->view('app/js/js_horse_info_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry lottry View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/lottery/lottry_view");
            $this->load->view("app/footer_view");
        }
        /*
        |----------------------------------------------------------------
        | function malaysia live draw
        |----------------------------------------------------------------
        */
        public function mal_live_draw()
        {
            $p_arr 	=	array(
                'title'				  =>	'Malaysia Live Draw',
                'p_custom_js'         =>    $this->load->view('app/lottery/js/js_mal_live_draw_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry mal_live_draw View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/lottery/mal_live_draw_view");
            $this->load->view("app/footer_view");
        }
        /*
        |----------------------------------------------------------------
        | function sin live draw
        |----------------------------------------------------------------
        */
        public function sin_live_draw()
        {
            $p_arr 	=	array(
                'title'				=>	'Singapore Live Draw',
                'p_custom_js'         =>    $this->load->view('app/lottery/js/js_sin_live_draw_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry mal_live_draw View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/lottery/sin_live_draw_view");
            $this->load->view("app/footer_view");
        }
        /*
        |----------------------------------------------------------------
        | function sin live draw
        |----------------------------------------------------------------
        */
        public function twod()
        {
            $p_arr 	=	array(
                'title'				=>	'2D',
                'p_custom_js'         =>    $this->load->view('app/lottery/js/js_two_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry 2d View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/lottery/twod_view");
            $this->load->view("app/footer_view");
        }
        /*
        |----------------------------------------------------------------
        | function damacai 1+3D
        |----------------------------------------------------------------
        */
        public function damacaionetree()
        {
            $p_arr 	=	array(
                'title'				=>	'Damacai 1 + 3D',
                'p_custom_js'         =>    $this->load->view('app/lottery/js/js_damacaionetree_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry damacai1 3d View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/lottery/damacaionetree_view");
            $this->load->view("app/footer_view");
        }
        /*
        |----------------------------------------------------------------
        | function 1+3D jackpot 2
        |----------------------------------------------------------------
        */
        public function jackpottwo()
        {
            $p_arr 	=	array(
                'title'				=>	'1+3D Jackpot 2',
                //'p_custom_js'         =>    $this->load->view('app/js/js_horse_info_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry damacai1 3d View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/lottery/jackpottwo_view");
            $this->load->view("app/footer_view");
        }
        /*
        |----------------------------------------------------------------
        | function magnum 4D & Jackpot
        |----------------------------------------------------------------
        */
        public function magnumfourdjackpot()
        {
            $p_arr 	=	array(
                'title'				=>	'Magnum 4D & Jackpot',
                'p_custom_js'         =>    $this->load->view('app/lottery/js/js_magnum_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry damacai1 3d View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/lottery/magnumfourdjackpot_view");
            $this->load->view("app/footer_view");
        }
        /*
        |----------------------------------------------------------------
        | function toto 4D jackpot
        |----------------------------------------------------------------
        */
        public function totofourd()
        {
            $p_arr 	=	array(
                'title'				      =>	'Toto 4D & Jackpot',
                'p_custom_js'             =>    $this->load->view('app/lottery/js/js_totalfourdjackpot_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry toto 4d & jackpot View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/lottery/totalfourdjackpot_view");
            $this->load->view("app/footer_view");
        }
        /*
        |----------------------------------------------------------------
        | function big sweep
        |----------------------------------------------------------------
        */
        public function bigsweep()
        {
            $p_arr 	=	array(
                'title'				=>	'Big Sweep',
                'p_custom_js'         =>    $this->load->view('app/lottery/js/js_bigsweep_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry bigsweep View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/lottery/big_sweep_view");
            $this->load->view("app/footer_view");
        }
        /*
        |----------------------------------------------------------------
        | function big sweep
        |----------------------------------------------------------------
        */
        public function singaporefourd()
        {
            $p_arr 	=	array(
                'title'				=>	'Singapore 4D',
                'p_custom_js'       =>    $this->load->view('app/lottery/js/js_sin_pools_4d_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry singaporefourd View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/lottery/singapore4d_view");
            $this->load->view("app/footer_view");
        }
        /*
        |----------------------------------------------------------------
        | function sandakan4d
        |----------------------------------------------------------------
        */
        public function sandakanford()
        {
            $p_arr 	=	array(
                'title'				           =>	'Sandakan 4D',
                'p_custom_js'                  =>    $this->load->view('app/lottery/js/js_sandakan_4d_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry singaporefourd View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/lottery/sandakan4d_view");
            $this->load->view("app/footer_view");
        }
        /*
        |----------------------------------------------------------------
        | function cashsweep1+3d
        |----------------------------------------------------------------
        */
        public function cashsweeponethreed()
        {
            $p_arr 	=	array(
                'title'				=>	'Cashsweep 1+3D',
                'p_custom_js'         =>    $this->load->view('app/lottery/js/js_cashsweep_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry singaporefourd View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/lottery/cashsweeponethreed_view");
            $this->load->view("app/footer_view");
        }
        /*
        |----------------------------------------------------------------
        | function sabah88
        |----------------------------------------------------------------
        */
        public function sabah()
        {
            $p_arr 	=	array(
                'title'				=>	'Sabah88',
                'p_custom_js'         =>    $this->load->view('app/lottery/js/js_sabah_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry sabah88 View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/lottery/sabah88_view");
            $this->load->view("app/footer_view");
        }
        /*
        |----------------------------------------------------------------
        | function singapore sweep
        |----------------------------------------------------------------
        */
        public function sinsweep()
        {
            $p_arr 	=	array(
                'title'				=>	'Singapore Sweep',
                'p_custom_js'         =>    $this->load->view('app/lottery/js/js_sin_sweep_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry sinsweep View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/lottery/sin_sweep_view");
            $this->load->view("app/footer_view");
        }
        /*
        |----------------------------------------------------------------
        | function singapore sweep
        |----------------------------------------------------------------
        */
        public function sintoto()
        {
            $p_arr 	=	array(
                'title'				=>	'Singapore Toto',
                'p_custom_js'      =>    $this->load->view('app/lottery/js/js_sin_toto_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry singapore toto View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/lottery/sin_toto_view");
            $this->load->view("app/footer_view");
        }
        /*
        |----------------------------------------------------------------
        | function load mal_livedraw
        |----------------------------------------------------------------
        */
        public function load_mal_livedraw()
        {
            $req = $this->m_mallivedraw->load_mal_livedraw();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | function load sin_livedraw
        |----------------------------------------------------------------
        */
        public function load_sin_livedraw()
        {
            $req = $this->m_sinlivedraw->load_sin_livedraw();
            echo json_encode($req);
        }

        /*
        |----------------------------------------------------------------
        | function load damacai
        |----------------------------------------------------------------
        */
        public function load_damacai()
        {
            $req = $this->m_damacaionetree->load_damacai();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | function load magnum
        |----------------------------------------------------------------
        */
        public function load_magnum()
        {
            $req = $this->m_magnum->load_magnum();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | function load toto 4D jackpot
        |----------------------------------------------------------------
        */
        public function load_totofourd()
        {
            $req = $this->m_totofourd->load_totofourd();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | function load bigsweep
        |----------------------------------------------------------------
        */
        public function load_bigsweep()
        {
            $req = $this->m_bigsweep->load_bigsweep();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | function load cashsweep
        |----------------------------------------------------------------
        */
        public function load_cashsweep()
        {
            $req = $this->m_cashsweep->load_cashsweep();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | function load sandakan
        |----------------------------------------------------------------
        */
        public function load_sandakan()
        {
            $req = $this->m_sandakan->load_sandakan();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | function load sin to to
        |----------------------------------------------------------------
        */
        public function load_sintoto()
        {
            $req = $this->m_sinlottery->load_sintoto();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | function load sabah
        |----------------------------------------------------------------
        */
        public function load_sabah()
        {
            $req = $this->m_sabah->load_sabah();
            echo json_encode($req);
        }

        public function load_sinpools()
        {
            $req = $this->m_sinlottery->load_sinpools();
            echo json_encode($req);
        }

        public function load_sinsweep()
        {
            $req = $this->m_sinlottery->load_sinsweep();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | function load 2d
        |----------------------------------------------------------------
        */
        public function load_twod()
        {
            $req = $this->m_twod->load_twod();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | function load top number damacai
        |----------------------------------------------------------------
        */
        public function load_top_number_dmc()
        {
            $req = $this->m_mallivedraw->load_top_number_dmc();
            echo json_encode($req);
        }

        public function load_top_number1()
        {
            $req = $this->m_mallivedraw->load_top_number1();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | function load top number magnum
        |----------------------------------------------------------------
        */
        public function load_top_number_mn()
        {
            $req = $this->m_mallivedraw->load_top_number_mn();
            echo json_encode($req);
        }
        /*
        |----------------------------------------------------------------
        | function load top number toto
        |----------------------------------------------------------------
        */
        public function load_top_number_toto()
        {
            $req = $this->m_mallivedraw->load_top_number_toto();
            echo json_encode($req);
        }

        public function load_top_number()
        {
            $req = $this->m_sinlivedraw->load_top_number();
            echo json_encode($req);
        }


        /*
        |----------------------------------------------------------------
        | @@
        | controller for setting
        | @@
        |----------------------------------------------------------------
        */
        /*
        |----------------------------------------------------------------
        | function lottry main
        |----------------------------------------------------------------
        */
        public function setting()
        {
            $serial ="";
            $lang ="";
            if(isset($_GET['lang']))
                $lang = $_GET['lang'];
            else
                $lang = 1;

            if($lang =="1" || $lang==1 || $lang=="en")
            {
                $this->setlang1("en");
            }
            else
            {
                $this->setlang1("cn");
            }

            if(isset($_GET['serial']))
            {
                $serial = $_GET['serial'];
                $_SESSION['serialNumber'] = $serial; 
            }

            //echo $serial;

            $p_arr 	=	array(
                'title'				  =>	'SETTING',
                'p_custom_js'         =>    $this->load->view('app/setting/js/setting_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry lottry View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            //$this->load->view("app/header_view");
            $this->load->view("app/setting/head_view");
            $this->load->view("app/setting/setting_view");
            $this->load->view("app/footer_view");
        }

        public function hrsnotification()
        {
            $p_arr 	=	array(
                'title'				=>	'Horse Notifications',
                'p_custom_js'      =>    $this->load->view('app/setting/js/notification_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry singapore toto View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/setting/head_view");
            $this->load->view("app/setting/horse_notification_view");
            $this->load->view("app/footer_view");
        }

        public function soccnotification()
        {
            $p_arr 	=	array(
                'title'				=>	'Soccer Notifications',
                'p_custom_js'      =>    $this->load->view('app/setting/js/notification_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry singapore toto View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/setting/head_view");
            $this->load->view("app/setting/soccer_notifications_view");
            $this->load->view("app/footer_view");
        }

        public function tellyours()
        {
            $p_arr 	=	array(
                'title'				=>	'Tell Your Friend',
                'p_custom_js'      =>    $this->load->view('app/setting/js/tell_your_friends_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry singapore toto View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/setting/head_view");
            $this->load->view("app/setting/tell_your_friend_view");
            $this->load->view("app/footer_view");
        }

        public function aboutus()
        {
            $p_arr 	=	array(
                'title'				=>	'About Us',
                'p_custom_js'      =>    $this->load->view('app/setting/js/js_about_us_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry singapore toto View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/setting/head_view");
            $this->load->view("app/setting/about_us_view");
            $this->load->view("app/footer_view");
        }

        public function updatepasscode()
        {
            $req = $this->m_login->updatepasscode();
            echo json_encode($req); 
        }
        public function tickhorsenotification()
        {
            $req = $this->m_notification->tickhrsnotification();
            echo json_encode($req);
        }

        public function loadHistoryNotification()
        {
            $req = $this->m_notification->loadHistoryNotification();
            echo json_encode($req);
        }

        public function load_tell_your_friends()
        {
            $req = $this->m_setting_about->load_tell_your_friends();
            echo json_encode($req);
        }

        public function load_about_us()
        {
            $req = $this->m_setting_about->load_about_us();
            echo json_encode($req);
        }

        public function  updatevesion()
        {
            $p_arr 	=	array(
                'title'				=>	'About Us',
                'p_custom_js'      =>    $this->load->view('app/lottery/js/js_sin_toto_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry singapore toto View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/setting/head_view");
            $this->load->view("app/setting/check_for_update_view");
            $this->load->view("app/footer_view");
        }

        public function  feedback()
        {
            $p_arr 	=	array(
                'title'				=>	'Feedback',
                'p_custom_js'      =>    $this->load->view('app/setting/js/feed_back_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry singapore toto View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/setting/head_view");
            $this->load->view("app/setting/feedback_view");
            $this->load->view("app/footer_view");
        }

        public function  setpasscode()
        {
            $p_arr 	=	array(
                'title'				=>	'Set pascode',
                'p_custom_js'      =>    $this->load->view('app/setting/js/js_set_passcode_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry singapore toto View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/setting/head_view");
            $this->load->view("app/setting/set_passcode_view");
            $this->load->view("app/footer_view");
        }

        public function  historynotifications()
        {
            $p_arr 	=	array(
                'title'				=>	'About Us',
                'p_custom_js'      =>    $this->load->view('app/setting/js/history_notifications_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry singapore toto View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/setting/head_view");
            $this->load->view("app/setting/history_notifications_view");
            $this->load->view("app/footer_view");
        }


        public function  lottnotifications()
        {
            $p_arr 	=	array(
                'title'				=>	'About Us',
                'p_custom_js'      =>    $this->load->view('app/setting/js/notification_view', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry singapore toto View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/setting/head_view");
            $this->load->view("app/setting/lottrey_notification_view");
            $this->load->view("app/footer_view");
        }

        public function  myplaynumber()
        {
            $p_arr 	=	array(
                'title'				=>	  'My Play Numbers',
                'p_custom_js'       =>    $this->load->view('app/setting/js/myplay_number', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry singapore toto View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/setting/head_view");
            $this->load->view("app/setting/insert_my_play_number_view");
            $this->load->view("super_admin/footer_view");
        }

        public function  historynumber()
        {
            $p_arr 	=	array(
                'title'				=>	  '4D Number History',
                'p_custom_js'       =>    $this->load->view('app/setting/js/hirstory_4D_number', '', TRUE)
            );
            /*
            |----------------------------------------------------------------
            | Load Head View
            | Load lottry singapore toto View
            | Load Footer View
            |----------------------------------------------------------------
            */
            $this->load->view("app/head_view", $p_arr);
            $this->load->view("app/setting/head_view");
            $this->load->view("app/setting/Number_History_4D_view");
            $this->load->view("app/footer_view");
        }

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
            //$this->lang->load($lang, FOLDER_LANG);
            redirect($_SERVER['HTTP_REFERER']); 
        }

        public function setlang1($lang)
        {
            if($lang != "en" && $lang != "cn")
            {
                $lang = "en";
            }

            //Set to cookie
            $cookie_time    =   3600*24*30;             
            $this->input->set_cookie('lang', $lang, $cookie_time);
            $this->session->set_userdata('lang',$lang);
            $this->lang->load($lang, FOLDER_LANG);
            //redirect($_SERVER['HTTP_REFERER']); 
        }

        public function ReadFileHtml()
        {                
            $copyname = $_POST['FileName'];
            if(isset($_POST['lang']))
                $lang = $_POST['lang'];           
            //$data = $this->m_today->GetHTML("soccer_today.html",$lang);
            $data = $this->m_today->GetHTML($copyname,$lang);
            if($lang == "CN")
            {
               $arr = array("data" =>$data , "lang"=> 2 ) ; 
            }
            else
            {
                $arr = array("data" =>$data , "lang"=> 1 ) ; 
            }     
            echo json_encode($arr);
        }

        public function CallNodeForTodaySoccer()
        {    
            $this->load->view("app/soccer/CallNodeForTodaySoccer");
        }
         public function CallNodeForLiveSoccer()
        {    
            $this->load->view("app/soccer/CallNodeForLiveSoccer");
        }
}