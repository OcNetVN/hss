<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['404_override'] = '';

/*
| ------------------------------------------------------------------------------------------
| Custom router agent page start
| ------------------------------------------------------------------------------------------
*/
/*
| ----------------------------------------------------------------
| Custom router view (get)
| ----------------------------------------------------------------
*/
$route['agent/login']					=		"agent/login_controller/index";
$route['agent/dashboard']				=		"agent/home_controller/index";
$route['agent/trans']					=		"agent/home_controller/trans_history";
$route['agent/show_all']				=		"agent/home_controller/show_all";
$route['agent/gen_statement']			=		"agent/home_controller/gen_statement";

/*
| ------------------------------------------------------------------------------------------
| Custom router agent page start
| ------------------------------------------------------------------------------------------
*/

/*
| ------------------------------------------------------------------------------------------
| Custom router admin page start
| ------------------------------------------------------------------------------------------
*/
/*
| ----------------------------------------------------------------
| Custom router view (get)
| ----------------------------------------------------------------
*/
$route['admin/login']					=		"admin/login_controller/index";
$route['admin/dashboard']				=		"admin/home_controller/live_tote";
$route['admin/race_card']				=		"admin/home_controller/index";
$route['admin/live_tote']				=		"admin/home_controller/live_tote";
$route['admin/race_info']               =       "admin/home_controller/race_info";
$route['admin/weight_board']			=		"admin/home_controller/weight_board";
$route['admin/set']						=		"admin/home_controller/set";
$route['admin/race_result']				=		"admin/home_controller/race_result";
$route['admin/database']                =       "admin/home_controller/database";
$route['admin/horse_info_board']        =       "admin/home_controller/horse_info_board";
$route['admin/joccolor']        		=       "admin/home_controller/jocky_color";
$route['admin/sett_about_us']        	=       "admin/homelt_controller/sett_about_us";
$route['admin/notification']        	=       "admin/homelt_controller/notification";
$route['admin/lottery_history']         =        "admin/home_controller/history_number";
/*
| ------------------------------------------------------------------------------------------
| Custom router admin page end
| ------------------------------------------------------------------------------------------
*/

/*/
/*
|-------------------------------------------------------
| Custom router view (get)
| admin soccer
|----------------------------------------------------------------
*/
$route['scc/live']         			   =        "admin/home_controller/soccer_live";
$route['scc/today']        			   =        "admin/home_controller/soccer_today";
$route['scc/earlymarket']        	   =        "admin/home_controller/soccer_earlymarket";
$route['scc/livesocre']        	   	   =        "admin/home_controller/soccer_live_score";
$route['scc/favourite']        	       =        "admin/home_controller/soccer_favourite";
$route['scc/result']        	       =        "admin/home_controller/soccer_result";
$route['scc/parameter_table']          =        "admin/home_controller/parameter_table";
$route['scc/tb_detail']          	   =        "admin/home_controller/tb_detail";


/*/
/*
| ----------------------------------------------------------------
| Custom router view (get)
| admin lottery
| ----------------------------------------------------------------
*/
$route['lott/wes_mn']					=		"admin/Homelt_controller/wes_mn";
$route['lott/wes_dm']					=		"admin/Homelt_controller/wes_dm";
$route['lott/wes_bg']				    =		"admin/Homelt_controller/wes_bg";
$route['lott/tt']				        =		"admin/Homelt_controller/tt";
$route['lott/D2']               		=       "admin/Homelt_controller/D2";
$route['lott/stt']						=		"admin/Homelt_controller/stt";
$route['lott/spl']						=		"admin/Homelt_controller/spl";
$route['lott/ssw']				        =		"admin/Homelt_controller/ssw";
$route['lott/esb']                	    =       "admin/Homelt_controller/esb";
$route['lott/estc']        				=       "admin/Homelt_controller/estc";
$route['lott/ecw']        				=       "admin/Homelt_controller/ecw";


	/*
	| ----------------------------------------------------------------
	| router for live draw
	| ----------------------------------------------------------------
	*/
	$route['lott/livedraw']						=		"admin/homeld_controller/index";
/*
| ------------------------------------------------------------------------------------------
| Custom router admin page end
| ------------------------------------------------------------------------------------------
*/

/*
| ------------------------------------------------------------------------------------------
| Custom router super_admin page start
| ------------------------------------------------------------------------------------------
*/

/*
| ----------------------------------------------------------------
| Custom router view (get)
| ----------------------------------------------------------------
*/

$route['super_admin/login']					=		"super_admin/login_controller/index";
$route['super_admin/dashboard']				=		"super_admin/home_controller/index";
$route['super_admin/list_member']			=		"super_admin/home_controller/list_member";
$route['super_admin/add_agent']				=		"super_admin/home_controller/add_agent";
$route['super_admin/add_user']				=		"super_admin/home_controller/add_user";
$route['super_admin/sell_phone']			=		"super_admin/home_controller/sell_phone";
$route['super_admin/trans']					=		"super_admin/home_controller/trans_history";
$route['super_admin/add_agent']				=		"super_admin/home_controller/add_agent";
$route['super_admin/add_user']				=		"super_admin/home_controller/add_user";
$route['super_admin/show_all']				=		"super_admin/home_controller/show_all";
$route['super_admin/report']				=		"super_admin/home_controller/report";
$route['super_admin/gen_statement']			=		"super_admin/home_controller/gen_statement";
$route['super_admin/agent_page']			=		"super_admin/home_controller/agent_page";
$route['super_admin/setlang']				=		"super_admin/home_controller/setlang";
$route['super_admin/sellphone_page']		=		"super_admin/home_controller/sell_phone_page";
$route['super_admin/auto_insert_statement'] =        "super_admin/home_controller/auto_insert_statement";
$route['super_admin/feedback_customer']     =        "super_admin/home_controller/feedback_customer";
/*
| ------------------------------------------------------------------------------------------
| Custom router super_admin page end
| ------------------------------------------------------------------------------------------
*/
/*
| ----------------------------------------------------------------
| Custom router view (get)
| ----------------------------------------------------------------
*/

$route['app/login']							=		"app/login_controller/index";
$route['app/menu']							=		"app/home_controller/menu";
$route['app/setlang']                       =       "app/home_controller/setlang";
//$route['app/login_mobile_test']				=		"app/home_controller/login";
$route['app/login_mobile']					=		"app/home_controller/login_2";
$route['app/horse/live_tote']				=		"app/home_controller/live_tote";
$route['app/horse/weight']					=		"app/home_controller/weight";
$route['app/horse/weight_choose']			=		"app/home_controller/weight_choose";
$route['app/horse/weight_detail']			=		"app/home_controller/weight_detail";
$route['app/horse/scratch']					=		"app/home_controller/scratch";
$route['app/horse/EarlyTic_MChoice']		=		"app/home_controller/EarlyTic_MChoice";
$route['app/horse/RaceCard']				=		"app/home_controller/RaceCard";
$route['app/horse/info_board']				=		"app/home_controller/horse_info_board";


$route['app/horse/horse_info']				=		"app/home_controller/horse_info";
$route['app/horse/Result']					=		"app/home_controller/Result";
$route['app/horse/Result_Detail']			=		"app/home_controller/Result_Detail";
$route['app/horse/RaceCard_Choose']			=		"app/home_controller/RaceCard_Choose";
$route['app/horse/RaceCard_Detail']			=		"app/home_controller/RaceCard_Detail";
$route['app/horse/Scrat_Et']				=		"app/home_controller/Scrat_Et";
$route['app/horse/scrat_et_detail']			=		"app/home_controller/scrat_et_detail";
/*
| ----------------------------------------------------------------
| router for lottry
| ----------------------------------------------------------------
*/
$route['app/lottry/menu_main']					=		"app/home_controller/lottry";
$route['app/lottry/mal_live_draw']				=		"app/home_controller/mal_live_draw";
$route['app/lottry/sin_live_draw']				=		"app/home_controller/sin_live_draw";
$route['app/lottry/twod']						=		"app/home_controller/twod";
$route['app/lottry/damacaionetree']				=		"app/home_controller/damacaionetree";
$route['app/lottry/jackpottwo']					=		"app/home_controller/jackpottwo";
$route['app/lottry/magnumfourdjackpot']			=		"app/home_controller/magnumfourdjackpot";
$route['app/lottry/totofourd']					=		"app/home_controller/totofourd";
$route['app/lottry/bigsweep']					=		"app/home_controller/bigsweep";
$route['app/lottry/singaporefourd']				=		"app/home_controller/singaporefourd";
$route['app/lottry/sandakanford']				=		"app/home_controller/sandakanford";
$route['app/lottry/cashsweeponethreed']			=		"app/home_controller/cashsweeponethreed";
$route['app/lottry/sabah']						=		"app/home_controller/sabah";
$route['app/lottry/sinsweep']					=		"app/home_controller/sinsweep";
$route['app/lottry/sintoto']					=		"app/home_controller/sintoto";


/*
| ----------------------------------------------------------------
| router for setting
| ----------------------------------------------------------------
*/
$route['app/setting/menu_main']					=		"app/home_controller/setting";
$route['app/setting/hrsnotification']			=		"app/home_controller/hrsnotification";
$route['app/setting/soccnotification']			=		"app/home_controller/soccnotification";
$route['app/setting/tellyours']			        =		"app/home_controller/tellyours";
$route['app/setting/aboutus']			        =		"app/home_controller/aboutus";
$route['app/setting/updatevesion']			    =		"app/home_controller/updatevesion";
$route['app/setting/feedback']			    	=		"app/home_controller/feedback";
$route['app/setting/setpasscode']			    =		"app/home_controller/setpasscode";
$route['app/setting/historynotifications']		=		"app/home_controller/historynotifications";
$route['app/setting/lottnotifications']		    =		"app/home_controller/lottnotifications";
$route['app/setting/myplaynumber']		    	=		"app/home_controller/myplaynumber";
$route['app/setting/historynumber']		    	=		"app/home_controller/historynumber";
$route['app/setting/notification']		    	=		"app/home_controller/messagenotification";
/*

/*
| ----------------------------------------------------------------
| router for soccer
| ----------------------------------------------------------------
*/
$route['app/soccer/main']					   =		"app/home_controller/soccer_menumain";
$route['app/soccer/alltable']				   =		"app/home_controller/All_TABLES";
$route['app/soccer/leaguetable']			   =		"app/home_controller/league_table";
$route['app/soccer/tabledeatil']			   =		"app/home_controller/table_detail";
$route['app/soccer/numberdetail']			   =		"app/home_controller/numberdetail";
$route['app/soccer/live_score']			   	   =		"app/home_controller/live_score";
$route['app/soccer/result']			           =		"app/home_controller/result_soccer";
/*
| ------------------------------------------------------------------------------------------
| Custom router application page end
| ------------------------------------------------------------------------------------------
*/
/* End of file routes.php */
/* Location: ./application/config/routes.php */