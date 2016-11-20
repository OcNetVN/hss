<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| Custome define constant
|--------------------------------------------------------------------------
*/

/*
|-----------------------------------------
| Custome define file and folder language
|-----------------------------------------
*/
define('FOLDER_LANG', 'lang');
define('FILE_EN', 'en');
define('FILE_CN', 'cn');

/*
|-----------------------------------------
| Custome define array lang
|-----------------------------------------
*/
define('LANG_EN', 'English');
define('LANG_CN', 'Chinese');
define('LANG_TITE_SUPER_LOGIN', 'SUPER ADMIN LOGIN');
define('LANG_TITE_ADMIN', 'ADMIN LOGIN');
define('LANG_TITE_AGENT_LOGIN', 'AGENT LOGIN');
define('LANG_TITE_USER', 'USER LOGIN');
define('LANG_USER',	'User');
define('LANG_PASS',	'Password');
define('LANG_LOGIN', 'Login');
define('LANG_CHOOSE_LANG', 'choose_lang');

define('LANG_LOGOUT', 'logout');

define('LANG_HORSE_RACING','horse_racing');
define('LANG_ADMIN_PAGE', 'admin_page');
define('LANG_AGENT_PAGE', 'agent');
define('LANG_SELL_PHONE', 'sell_phone');
define('LANG_LIST_MEMBER_PAGE', 'list_member_page');
define('LANG_TRANS_HISTORY', 'trans_history');
define('LANG_ADD_AGENT', 'add_agent');
define('LANG_ADD_USER', 'add_user');
define('LANG_SHOW_ALL',	'show_all');
define('LANG_REPORT','Report');
define('LANG_GEN_STATEMENT', 'gen_statement');
define('LANG_RACE_CARD', 'race_card');
define('LANG_LIVE_TOTE', 'live_tote');
define('LANG_RACE_INFO', 'race_info');
define('LANG_WEIGHT_BOARD', 'weight_board');
define('LANG_SET', 'set');
define('LANG_RACE_RESULT', 'race_result');
define('LANG_DATABASE', 'database');
define('LANG_HORSE_INFO_BOARD', 'horse_info_board');
define('LANG_JOCKY_COLOR', 'joccolor');


define('LANG_AlREADY_EXISTS', 'already_exists');
define('LANG_PANEL', 'panel');
define('LANG_UNKNOWN', 'unknown');
define('LANG_AGENT', 'agent');
define('LANG_ADMIN', 'admin');
define('LANG_SUPER_ADMIN', 'super_admin');
define('LANG_ACTIVE', 'active');
define('LANG_INACTIVE', 'inactive');
define('LANG_NOT_RIGHT', 'not_right');
define('LANG_NOT_NULL', 'not_null');
define('LANG_NULL', 'null');
define('LANG_NOT_CORRECT', 'not_correct');
define('LANG_NOT_HAVE_ANY_ROW', 'not_have_any_row');
define('LANG_BUTTON_SEARCH', 'button_search');
define('LANG_BUTTON_CLEAR_HISTORY', 'button_clearhistory');
define('LANG_BUTTON_SAVE', 'button_save');
define('LANG_BUTTON_RESET', 'button_reset');
define('LANG_BUTTON_DELETE_AGENT', 'button_delete_agent');
define('LANG_BUTTON_DELETE_CUSTOMER', 'button_delete_customer');
define('LANG_CLOSE', 'close');

//page dashboard - List agent/username
define('LANG_HEADING_LIST_AGENT', 'heading_list_agent');
define('LANG_HEADING_LIST_ADMIN', 'heading_list_admin');
define('LANG_HEADING_TBL_LIST_AGENT', 'heading_tbl_list_agent');
define('LANG_HEADING_TBL_LIST_ADMIN', 'heading_tbl_list_admin');
define('LANG_PLACEHOLDER_LIST_AGENT', 'placeholder_list_agent');
define('LANG_TR_AGENT_NAME', 'tr_agentname');
define('LANG_TR_CUSTOMER_NAME', 'tr_customername');
define('LANG_TR_USERNAME', 'tr_username');
define('LANG_TR_CONTACT', 'tr_contact');
define('LANG_TR_STATUS', 'tr_tatus');
define('LANG_TR_FEES', 'tr_fees');
define('LANG_TR_TOTAL_CUSTOMER', 'tr_totalcustomer');
define('LANG_TR_DUEDATE', 'tr_duedate');
define('LANG_TR_REMARK', 'tr_remark');
define('LANG_PASS_NEW', 'pass_new');
//end page dashboard - List agent/username

//page list_member under roles superadmin
define('LANG_TR_IMEI', 'tr_imei');
define('LANG_TR_VERIFYCODE', 'tr_verifycode');
define('LANG_TR_AGENT', 'tr_agent');
define('LANG_TR_ACTION', 'tr_action');
define('LANG_BTN_ADD_AGENT', 'btn_add_agent');
define('LANG_BTN_GENERATE_CODE', 'btn_generate_code');
define('LANG_TR_LASTLOGIN', 'tr_lastlogin');
//end page list_member under roles superadmin


//page transaction history
define('LANG_HEADING_AGENT_TRANS_HISTORY', 'heading_agent_trans_history');
define('LANG_HEADING_CUSTOMER_TRANS_HISTORY', 'heading_customer_trans_history');
define('LANG_OLD_REMARK', 'tr_old_remark');
define('LANG_NEW_REMARK', 'tr_new_remark');
define('LANG_UPDATE_TIME', 'tr_update_time');
define('LANG_DATEFROM', 'datefrom');
define('LANG_DATETO', 'dateto');
define('LANG_EVENT', 'event');
define('LANG_INFO', 'info');
define('LANG_TR_CUSTOMERCODE', 'tr_customercode');
define('LANG_TR_OLD_STATUS', 'tr_old_status');
define('LANG_TR_OLD_OFFDATE', 'tr_old_offdate');
define('LANG_TR_NEW_STATUS', 'tr_new_status');
define('LANG_TR_NEW_OFFDATE', 'tr_new_offdate');
define('LANG_TR_UPDATEON', 'tr_updateon');
//end page transaction history

//page sell phone
define('LANG_TR_PRICE', 'tr_price');
define('LANG_TR_PHONE_MODEL', 'tr_phone_model');
define('LANG_TR_DATE_TAKEN', 'tr_date_taken');
define('LANG_ERROR', 'error');
define('LANG_LIST_SELL_PHONE', 'list_sell_phone');
define('LANG_ADD_SELL_PHONE', 'add_sell_phone');
//end page sell phone

//page add new agent/add new customer
define('LANG_CONFIRM_PASSWORD', 'confirm_password');
define('LANG_ADD_FAILED', 'add_failed');
define('LANG_ADD_SUCCESS', 'add_success');
//end page add new agent/add new customer

define('LANG_SINGAPORE_4D','Singapore 4D');
define('LANG_SINGAPORE_TOTO','Singapore Toto');

//page report
define('LANG_TOTAL_ACTIVE_AGENT', 'total_active_agent');
define('LANG_TOTAL_INACTIVE_AGENT', 'total_inactive_agent');
define('LANG_TOTAL_ACTIVE_CUSTOMER', 'total_active_customer');
define('LANG_TOTAL_INACTIVE_CUSTOMER', 'total_inactive_customer');
//end page report

//page generate statement
define('LANG_SELECT_DATE', 'select_date');
define('LANG_AGENT_STATEMENT', 'agent_statement');
define('LANG_PREVIOUS_STATEMENT', 'previous_statement');
define('LANG_PREVIOUS_BALANCE', 'previous_balance');
define('LANG_ACTIVE_USER_ON_DUEDATE', 'active_user_on_duedate');
define('LANG_ACTIVE_USER_AFTER_DUEDATE', 'active_user_after_duedate');
define('LANG_INACTIVE_USER_ON_DUEDATE', 'inactive_user_on_duedate');
define('LANG_TOTAL', 'total');
define('LANG_ACTIVE_USER', 'active_user');
define('LANG_NEW_MEMBER1_15', 'new_member1_15');
define('LANG_NEW_MEMBER16_31', 'new_member16_31');
define('LANG_PAY_ALL', 'pay_all');
define('LANG_PAY_ORDER', 'pay_order');
define('LANG_MONEY', 'money');
define('LANG_FAILED', 'failed');
define('LANG_SUCCESS', 'success');
define('LANG_BUTTON_CLOSE', 'button_close');
define('LANG_PAY', 'pay');
define('LANG_REMAINDER_AMOUNT', 'remainder_amount');
define('LANG_ACTIVE_MEMBER16_31', 'active_member16_31');
define('LANG_ACTIVE_MEMBER1_15', 'active_member01_15');
define('LANG_INACTIVE_USER', 'inactive_user');
define('LANG_TOTAL_TAX', 'total_tax');
//end page generate statement

//page agent_page
define('LANG_TITE_CUSTOMER_PAGE', 'title_customer_page');
define('LANG_LINK_STATEMENT', 'link_statement');
define('LANG_UPDATE_FAILED', 'update_failed');
define('LANG_UPDATE_SUCCESS', 'update_success');
//end page agent_page


//application
define('LANG_MES_NOT_RIGHT_LOGIN_APP', 'mes_login_app');
define('LANG_MES_WAITING_CONFIRM_LOGIN_APP', 'mes_waiting_confirm');
define('LANG_MES_LOCKED_LOGIN_APP', 'mes_locked');
define('LANG_MES_NOT_ALLOW_LOGIN_APP', 'mes_not_allow');
define('LANG_MES_RIGHT_LOGIN_APP', 'mes_right');
define('LANG_MES_INSERT_ERROR_APP', 'mes_insert_error');
define('LANG_MES_OUT_OF_DATE_LOGIN_APP', 'mes_out_of_date');
define('LANG_CONTACT_YOUR_AGENT','please contact your agent');

//end application

/*
|------------------------
| lottry
|-------------------------
*/
define('LANG_LOTTRY', 'lottry');
define('LANG_LIVE_DRAW', 'live_draw');
define('LANG_WEST_MALAYSIA', 'west_malaysia');
define('LANG_DAMACAI', 'damacai');
define('LANG_MAGNUM', 'magnun');
define('LANG_SPORT_TOTO', 'sport_toto');
define('LANG_BIG_SWEEP', 'big_sweep');
define('LANG_2D', '2d');
define('LANG_SINGAPORE', 'Singapore');
define('LANG_LOSIN','sin');
define('LANG_TOTO', 'toto');
define('LANG_POOLS_4D', '4d');
define('LANG_SWEEP', 'sweep');
define('LANG_EAST_MALAYSIA', 'east_malaysia');
define('LANG_SABAH_88', 'sabah_88');
define('LANG_STC_4D', 'stc_4d');
define('LANG_CASH_SWEEP', 'cash_sweep');
define('LANG_MAL_LIVE_IMG', 'Mal live image');
define('LANG_SIN_LIVE_IMG', 'Sin live image');
define('LANG_LIVE_2D_IMG','2D image');
//
define('LANG_DRAW_DATE_CONVERT', 'convert_draw_date');
define('LANG_CLEAR_ALL', 'clear_all');
define('LANG_1_3D_CONVERT', 'convert_1_3d');
define('LANG_3D_CONVERT', 'convert_3d');
define('LANG_RM_CONVERT', 'convert_rm');
define('LANG_1_3D_JP1_CONVERT', 'convert_1_3d_jp1');
define('LANG_1_3D_JP2_CONVERT', 'convert_1_3d_jp2');
define('LANG_3D_JP_CONVERT', 'convert_3d_jp');
define('LANG_DMC_JP1_CONVERT', 'convert_dmc_jp1');
define('LANG_DMC_JP2_CONVERT', 'convert_dmc_jp2');
define('LANG_NOT_FOUND', 'not_found');

define('LANG_DRAW_NO', 'draw_no');
// magnum
define('LANG_4D_GAME_CONVERT', 'convert_game_4d');
define('LANG_4D_JACKPOT_CONVERT', 'convert_jp_4d');
define('LANG_4D_JACKPOT_GOLD_CONVERT', 'convert_jp_4d_gold');
//toto 4D
define('LANG_CONVERT_ALL', 'convert_all');

//Add 27/04/2015
define('LANG_TOTAL_BALANCE', 'toto_balance');
define('LANG_SHOW_ADMIN_CONTACT', 'Show Admin contact');
define('LANG_SHOW_AGENT_CONTACT', 'Show Agent contact');
define('LANG_TR_SHOW', 'Show');
define('LANG_TR_NOT_SHOW', 'Do not show');
define('LANG_TR_SERIAL', 'Serial No.');
define('LANG_TR_VERIFY_CODE', 'Verify code');

define('LANG_LANGUAGE_IMG', 'Chinese.png');
define('LANG_LANGUAGE_URL', 'en');

define('LANG_RESULT_IMG', 'Result-icon.png');
define('LANG_RACECARD_IMG', 'RaceCard-icon.png');
define('LANG_WEIGHT_IMG', 'Weight-icon.png');
define('LANG_SCR_ET_IMG', 'SCR-icon.png');
define('LANG_INFO_BOARD_IMG', 'HorseInfot-icon.png');

define('LANG_LANGUAGE_MAL', 'MAL');
define('LANG_LANGUAGE_SIN', 'SIN');
define('LANG_LANGUAGE_NO', 'NO');
define('LANG_LANGUAGE_SCR', 'SCR');

define('LANG_RESULT_RESULT', 'Result');
define('LANG_RESULT_NO', 'No');
define('LANG_RESULT_LENGTH', 'Length');
define('LANG_RESULT_WIN', 'Win');
define('LANG_RESULT_PLACE', 'Place');
define('LANG_RESULT_TIMING', 'Timing');
define('LANG_RESULT_QN_FORECASR', 'QN Forecast');
define('LANG_RESULT_QP_PLACE', 'QP Place Forecast');
define('LANG_RESULT_TF_TIERCE', 'TF Tierce');
define('LANG_RESULT_TR_TRIO', 'TR Trio');
define('LANG_RESULT_QT_QUARTET', 'QT Quartet');
define('LANG_RESULT_QUADRO', 'Quadro');

define('LANG_COUNTRY_MY', 'Malaysia');
define('LANG_COUNTRY_HK', 'HongKong');
define('LANG_COUNTRY_MC', 'Macau');
define('LANG_COUNTRY_SG', 'Singapore');
define('LANG_COUNTRY_SA', 'South Africa');
define('LANG_COUNTRY_AU', 'Australia');
define('LANG_COUNTRY_EU', 'Europe');
define('LANG_COUNTRY_KR', 'Korea');

define('LANG_TIME_MON', 'Mon');
define('LANG_TIME_TUE', 'Tue');
define('LANG_TIME_WED', 'Wed');
define('LANG_TIME_THU', 'Thu');
define('LANG_TIME_FRI', 'Fri');
define('LANG_TIME_SAT', 'Sat');
define('LANG_TIME_SUN', 'Sun');

define('LANG_RACECARD_T', 'list of RaceCard ');
define('LANG_RACECARD_HNO', 'Horse No ');
define('LANG_RACECARD_CL', 'Color ');
define('LANG_RACECARD_LFR', 'Last 5 Runs');
define('LANG_RACECARD_HNA', 'Horse Name');
define('LANG_RACECARD_JK', 'Jockey');
define('LANG_RACECARD_BR', 'Br');
define('LANG_RACECARD_RTG', 'Rtg');
define('LANG_RACECARD_WT', 'Wt');
define('LANG_RACECARD_HCP', 'Hcp');
define('LANG_RACECARD_TRAIN', 'Trainer');
define('LANG_RACE_RACE', 'Race ');

define('LANG_WEIGHT_T', 'Weight ');
define('LANG_EARLY_TICKET', 'Early Ticket ');
define('LANG_SCR_ET', 'Scratch & Early Ticket ');
define('LANG_Scratching', 'Scratching');
define('LANG_MaterChoice', 'MaterChoice');
 define('LANG_BatamTic', 'Batam Tic');

//29-04-2015
define('LANG_MAL_LIVE_DRAW', 'Mal Live Draw');
define('LANG_1ST', '1st');
define('LANG_2ND', '2nd');
define('LANG_3RD', '3rd');
define('LANG_SPECIAL', 'Special');
define('LANG_CONSOLATION', 'Consolation');
define('LANG_SIN_LIVE_DRAW', 'Sin Live Draw');
define('LANG_S', 'S');
define('LANG_C', 'C');

define('LANG_STARTER', 'Starter');
define('LANG_1ST_PR', '1st Prize');
define('LANG_2ND_PR', '2nd Prize');
define('LANG_3RD_PR', '3rd Prize');
define('LANG_STA_PR', 'Starter Prizes');
define('LANG_CON_PR', 'Consolation Prizes');

define('LANG_DAY', 'Day');
define('LANG_NIGHT', 'Night');
define('LANG_PAST_RESULT', 'Past results');


define('LANG_DMC_13D', 'Damacai 1+3D');
define('LANG_LOT_DATE', 'Date');

define('LANG_13D_JACKPOT_1', '1 3D Jackpot 1');
define('LANG_13D_JACKPOT_2', '1 3D Jackpot 2');
define('LANG_DMC_JACKPOT_1', 'Damacai Jackpot 1');
define('LANG_DMC_JACKPOT_2', 'Damacai Jackpot 2');

define('LANG_4TH_PR', '4th Prize');
define('LANG_5TH_PR', '5th Prize');
define('LANG_6TH_PR', '6th Prize');
define('LANG_7TH_PR', '7th Prize');

define('LANG_4D_JACKPOT_1', '4D Jackpot 1');
define('LANG_4D_JACKPOT_2', '4D Jackpot 2');

define('LANG_JACKPOT_1', 'Jackpot 1');
define('LANG_JACKPOT_2', 'Jackpot 2');

define('LANG_JACKPOT_1_PR', 'Jackpot 1st prize');
define('LANG_JACKPOT_2_PR', 'Jackpot 1st prize');
define('LANG_4D_JACKPOT_GOLD', 'Jackpot Gold prize');

define('LANG_TOTO4D_JACKPOT', 'Toto 4D Jackpot');
define('LANG_TOTO5D', 'Toto 5D');
define('LANG_TOTO6D', 'Toto 6D');

define('LANG_JACKPOT', 'Jackpot');

define('LANG_OR', 'or');
define('LANG_GRAND_TOTO_663', 'Grand Toto 663');
define('LANG_POWER_TOTO_655', 'Power Toto655');
define('LANG_SURPREM_TOTO_658', 'Supreme Toto 663');

define('LANG_TICKET_NO', 'Ticket No');
define('LANG_MAL_BIG_SWEEP', 'Mal Big Sweep');
define('LANG_SEARCH', 'Search');
define('LANG_1_2_3_J', '1st, 2nd or 3rd Jackpot');
define('LANG_MAJOR_PR', 'Major Prize');

define('LANG_BLISS_PR', 'Bliss Prizes');
define('LANG_SWEET_PR', 'Sweet Prizes');
define('LANG_GLEE_PR', 'Glee Prizes');
define('LANG_HAPPY_PR', 'Happy Prizes');
define('LANG_LUCKY_PR', 'Lucky Prizes');
define('LANG_BONUS_PR', 'Bonus Prizes');

define('LANG_SIN_TOTO', 'Singapore Toto');
define('LANG_GRP_1', 'Group 1');
define('LANG_GRP_2', 'Group 2');
define('LANG_GRP_3', 'Group 3');
define('LANG_GRP_4', 'Group 4');
define('LANG_GRP_5', 'Group 5');
define('LANG_GRP_6', 'Group 6');
define('LANG_GRP_7', 'Group 7');
define('LANG_WINNER', 'Winners');

define('LANG_SIN_4D', 'Singapore 4D');

define('LANG_SIN_SWEEP', 'Singapore Sweep');
define('LANG_10_JACKPOT', '10 Jackpot');
define('LANG_10_LUCKY', '10 Lucky');
define('LANG_30_GIFT', '30 Gifts');
define('LANG_30_CON', '30 Consolation');
define('LANG_50_PART', '50 Participation');
define('LANG_315_2D_DELIGHT', '315000 2D Delight');


define('LANG_SABA_4D', 'Sabah 88 4D');
define('LANG_LOTO88_4D', 'Lotto 88 4D');
define('LANG_SABA_LOTO', 'Sabah Lotto');

// mal live draw
// define('LANG_MAL_LIVE_DRAW', 'Mal live draw');
// define('LANG_1ST', '1st');
// define('LANG_2ND', '2nd');
// define('LANG_3RD', '3rd');
// sin live draw
// define('LANG_SIN_LIVE_DRAW', 'Sin Live Draw');
// define('LANG_1ST_PR', '1st Prize');
// define('LANG_2ND_PR', '2nd Prize');
// define('LANG_3RD_PR', '3rd Prize');
// define('LANG_STA_PR', 'Starter Prizes');
// define('LANG_CON_PR', 'Consolation Prizes');

//2d
// define('LANG_PAST_RESULT', 'Past Result');
// define('LANG_DAY', 'Day');
// define('LANG_NIGHT', 'Night');
// define('LANG_SPECIAL', 'SPECIAL');


define('LANG_JACKPOT_PR', 'Jackpot Prizes');
define('LANG_WINNING_NUMBERS', 'Winning numbers');
define('LANG_ADDITIONAL_NUMBERS', 'Additional numbers');
define('LANG_WINNING_SHARES', 'Winning Shares');

define('LANG_PRIZE_GRP', 'Prize Group');
define('LANG_SHARE_AMT', 'Shares Amount');
define('LANG_NO_OF_WIN_SHARE', 'No Of Winning Shares');

define('LANG_LANGUAGE_CODE', '2');

//12/05/2015
define('LANG_PASS_NOT_RIGHT', 'pass_not_right');
define('LANG_NOT_ACTIVE', 'not_active');
define('LANG_USERNAME_NOT_RIGHT', 'username_not_right');
define('LANG_NOT_PERMIT', 'not_permit');

//Nghia add 18/05/2015
define('LANG_MES_LOCKED_LOGIN_APP_SHOW_AGENT', 'mes_locked_login_app_show_agent');
define('LANG_GST', 'gst');


// function Setting apk
define('LANG_SETTING', 'SETTING');
define('LANG_SERIAL_NUMBER','Serial Number');
define('LANG_LOTTRY_NOTIFICATIONS','Lottry Notifications');
define('LANG_SOCCER_NOTIFICATIONS','Soccer Notifications');
define('LANG_NOTIFICATIONS','Notifications History');
define('LANG_TELL_YOUR_FRIENDS','Tell Your Friends');
define('LANG_SET_PASSCODE','Set Passcode');
define('LANG_FEEDBACK','Feedback');
define('LANG_CHECKFORUPDATE', 'Check For Update');
define('LANG_ABOUT_US','About Us');
define('LANG_HORSE_NOTIFICATIONS','Horse Notifications');
define('LANG_NOTIFICATION', 'NOTIFICATION');
define('LANG_VESRSION', 'Vesrsion');
define('LANG_PLEASE_FEEL',"Please feel free to input any question or suggestion.");
define('LANG_WE_WILL',"We will take them seriously.");
define('LANG_THANKS_YOU',"Thanks you for your kindly support.");

// function live goal notification
define('LANG_LIVE_GOAL_NOTIFI','Live Goal Notifications');
define('LANG_GOAL_PARAMETER', 'Goal Parameter');

// horse notifications
define('LANG_SOUND','Sound');
define('LANG_VIBRATION','Vibration');
define('LANG_RACING_DAY', 'Racing Day');
define('LANG_TIPS','Tips');
define('LANG_GOAL','Goal');

// lottrey notifications
define('LANG_INSERT_YOUR_PLAY', 'Insert Your Play Number');
define('LANG_4D_NUMBER_HISTORY', '4D Number History');
define('LANG_MY_PLAY_NUMBER','My Play Number');

define('LANG_SHOW_LOG','show_log');
define('LANG_TR_CREATE_DATE','tr_create_date');
define('LANG_REFUND','refund');
define('LANG_SOCCER', 'SOCCER');

define('LANG_LIVE', 'Live');
define('LANG_TODAY', 'Today');
define('LANG_EARLY_MARKET', 'Early Market');
define('LANG_LIVE_SCORE', 'Live score');
define('LANG_FAVOURITE','Favourite');
define('LANG_RESULT', 'Result');
define('LANG_NUMBER', 'Number');
define('LANG_All_Tables', 'All Tables');
define('LANG_Country_Parameter', 'Country parameter');
define('LANG_League_Parameter','League parameter');
define('LANG_Table','Table');
define('LANG_Ladbrokes','Ladbrokes');
define('LANG_soccer_info','Soccer info');
define('LANG_soccer_info_board','Soccer Info Board');
define('LANG_DATE_TIME','DATE & TIME');
define('LANG_FIRST_HALF','FIRST HALF SCORE');
define('LANG_FULL_TIME', 'FULL TIME SCORE');  
define('LANG_FT_FH','FT & FH CS');                     
/*
|--------------------------------------------------------------------------
| Custome define constant
|--------------------------------------------------------------------------
*/
/* End of file constants.php */
/* Location: ./application/config/constants.php */