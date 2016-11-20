<?php 
/*
|--------------------------------------------------------------------------
| page login start
|--------------------------------------------------------------------------
*/
$lang 		=	array(
				LANG_EN 					=>	"English",
				LANG_CN 					=>	"Chinese",
				LANG_TITE_SUPER_LOGIN		=>	"Super admin page",
				LANG_TITE_ADMIN 			=>	"Admin page",
				LANG_TITE_AGENT_LOGIN 		=>	"Agent page",
				LANG_TITE_USER 				=>	"User page",
				LANG_USER					=>	"Username",
				LANG_PASS 					=>	"Password",
				LANG_LOGIN 					=>	"Login",
				LANG_CHOOSE_LANG 			=>	"Choose language",
				LANG_LOGOUT 				=>	"Logout",
				LANG_HORSE_RACING 			=>	"Horse Racing",
				LANG_ADMIN_PAGE				=>	"List Agent/Username",
				LANG_AGENT_PAGE				=>	"List Customer",
				LANG_SELL_PHONE				=>	"Sell phone",
				LANG_TRANS_HISTORY 			=>	"Transaction History",
				LANG_ADD_AGENT				=>	"Add New Agent",
				LANG_ADD_USER				=>	"Add New Customer",
				LANG_SHOW_ALL				=>	"Show All",
				LANG_REPORT					=>	"Report",
				LANG_GEN_STATEMENT 			=>	"Generate statement",
				LANG_LIVE_TOTE 				=>	"Tote Board",
				LANG_RACE_INFO 				=>	"Racing Board",
				LANG_RACE_CARD 				=>	"Race Card",
				LANG_WEIGHT_BOARD 			=>	"Weight Board",
				LANG_SET 					=>	"Scratching & Early Ticket",
				LANG_RACE_RESULT 			=>	"Race Result",
				LANG_DATABASE 				=>	"Parameter",
                LANG_HORSE_INFO_BOARD       =>  "Horse Info Board",
                LANG_JOCKY_COLOR       		=>  "Jocky Color",
                
				LANG_AlREADY_EXISTS 	    =>	"already exists",
                LANG_PANEL 	            	=>	"panel",
				LANG_UNKNOWN 	            =>	"Unknown",
                LANG_AGENT                  =>	"Agent",
                LANG_ADMIN 	                =>	"Admin",
                LANG_SUPER_ADMIN            =>	"Super Admin",
                LANG_ACTIVE 	            =>	"Active",
                LANG_INACTIVE               =>	"Inactive",
                LANG_NOT_RIGHT 	            =>	"Not right",
                LANG_NOT_HAVE_ANY_ROW 	    =>	"Not have any row",
                LANG_NOT_NULL 	            =>	"Not null",
				LANG_NULL 	                =>	"Null",
				LANG_NOT_CORRECT 	        =>	"Not correct",
				LANG_BUTTON_SEARCH 	        =>	"Search",
                LANG_BUTTON_CLEAR_HISTORY 	=>	"Clear History",
                LANG_BUTTON_SAVE 	        =>	"Save",
                LANG_BUTTON_RESET 	        =>	"Reset",
                LANG_BUTTON_DELETE_AGENT 	=>	"Delete agent",
                LANG_BUTTON_DELETE_CUSTOMER =>	"Delete customer",
				LANG_CLOSE 	            	=>	"Close",
				
                //page list_agent/username
				LANG_HEADING_LIST_AGENT 	       =>	"Search Customer/Seial number",
				LANG_HEADING_LIST_ADMIN 	       =>	"Search Agent/Serial number",
				LANG_HEADING_TBL_LIST_AGENT 	   =>	"List Customer",
				LANG_HEADING_TBL_LIST_ADMIN 	   =>	"List Agent",
                LANG_PLACEHOLDER_LIST_AGENT        =>	"Username/Serial number",
				LANG_TR_AGENT_NAME 	               =>	"Agent Name",
				LANG_TR_CUSTOMER_NAME 	           =>	"Customer Name",
				LANG_TR_USERNAME 	               =>	"Username",
                LANG_TR_CONTACT                    =>	"Contact",
                LANG_TR_STATUS 	                   =>	"Status",
				LANG_TR_FEES 	                   =>	"Fees",
				LANG_TR_TOTAL_CUSTOMER 	           =>	"Total customer",
				LANG_TR_DUEDATE 	               =>	"Duedate",
                LANG_TR_REMARK                     =>	"Remark",
				LANG_PASS_NEW           		   =>	"New password",
                
				//page sell phone
				LANG_TR_PRICE                    	=>	"Price",
				LANG_TR_PHONE_MODEL               	=>	"Phone model",
				LANG_ERROR	                   		=>	"Error",
				LANG_TR_DATE_TAKEN              	=>	"Date taken",
				LANG_LIST_SELL_PHONE             	=>	"List sell phone",
				LANG_ADD_SELL_PHONE             	=>	"Add sell phone",
				
				//page list_member role super admin
				LANG_BTN_ADD_AGENT                     =>	"Add Agent",
				LANG_BTN_GENERATE_CODE                 =>	"Generate Code",
				LANG_TR_LASTLOGIN                      =>	"Last login",
				
				//page list_member roles super admin
				LANG_LIST_MEMBER_PAGE                   =>	"List customer",
				LANG_TR_IMEI                     		=>	"Serial number",
				LANG_TR_VERIFYCODE                     	=>	"Verify Code",
				LANG_TR_AGENT 	               			=>	"Agent",
				LANG_TR_ACTION							=>	"Action",
				
                //page trans_history
                LANG_HEADING_AGENT_TRANS_HISTORY 	           =>	"Agent Transaction History",
				LANG_HEADING_CUSTOMER_TRANS_HISTORY 	       =>	"Customer Transaction History",
				LANG_OLD_REMARK 	                           =>	"Old Remark",
				LANG_NEW_REMARK 	                           =>	"New Remark",
                LANG_UPDATE_TIME                               =>	"Update time",
				LANG_DATEFROM 	                           		=>	"Date from",
                LANG_DATETO                               		=>	"Date to",
				LANG_EVENT 	                           			=>	"Event",
                LANG_INFO                               		=>	"Infomation",
				LANG_TR_CUSTOMERCODE 	                      	=>	"Customercode",
                LANG_TR_OLD_STATUS                           	=>	"Old status",
				LANG_TR_OLD_OFFDATE 	                       	=>	"Old offdate",
                LANG_TR_NEW_STATUS                            	=>	"New status",
				LANG_TR_UPDATEON 	                          	=>	"Update on",
				LANG_TR_NEW_OFFDATE 	                       	=>	"New offdate",
				
                //page add new agent/add new customer
                LANG_CONFIRM_PASSWORD        =>	"Confirm password",
				LANG_ADD_FAILED              =>	"Added failed",
				LANG_ADD_SUCCESS             =>	"Added successfully",
                
                //page report
                LANG_TOTAL_ACTIVE_AGENT          =>	"Total active agent",
				LANG_TOTAL_INACTIVE_AGENT        =>	"Total inactive agent",
				LANG_TOTAL_ACTIVE_CUSTOMER       =>	"Total active customer",
                LANG_TOTAL_INACTIVE_CUSTOMER     =>	"Total inactive customer",
                
                //page gen_statement
                LANG_SELECT_DATE                    =>	"(selected date)",
				LANG_AGENT_STATEMENT                =>	"Agent Statement",
				LANG_PREVIOUS_STATEMENT             =>	"previous statement",
                LANG_PREVIOUS_BALANCE               =>	"Previous balance",
                LANG_ACTIVE_USER_ON_DUEDATE         =>	"Active user on duedate",
				LANG_ACTIVE_USER_AFTER_DUEDATE      =>	"Active user after duedate",
				LANG_INACTIVE_USER_ON_DUEDATE       =>	"Inactice user after duedate",
                LANG_TOTAL                          =>	"Total",
                LANG_ACTIVE_USER                    =>	"Active customer",
				LANG_NEW_MEMBER1_15                 =>	"New customer 1-15",
                LANG_NEW_MEMBER16_31                =>	"New customer 16-31",
                LANG_PAY_ALL                        =>	"Pay all",
                LANG_PAY_ORDER                      =>	"Pay other",
                LANG_MONEY                          =>	"Money",
                LANG_FAILED                         =>	"Error",
                LANG_SUCCESS                        =>	"Success",
                LANG_BUTTON_CLOSE                   =>	"Close",
                LANG_PAY                            =>	"Pay",
                LANG_REMAINDER_AMOUNT               =>	"Balance amount",
                LANG_ACTIVE_MEMBER16_31             =>	"Active customer 16-31",
				LANG_ACTIVE_MEMBER1_15             	=>	"Active customer 01-15",
				LANG_INACTIVE_USER                  =>	"Inactice user",	
                LANG_TOTAL_TAX			            =>	"Tax",	
                
				//page agent/custome page
				LANG_TITE_CUSTOMER_PAGE		=>	"Customer Detail",
				LANG_LINK_STATEMENT		    =>	"Statement",
                LANG_UPDATE_FAILED		    =>	"Update failed",
				LANG_UPDATE_SUCCESS		    =>	"Update successfully",
				
				//application
				LANG_MES_NOT_RIGHT_LOGIN_APP		    	=>	"Not right",
				LANG_MES_WAITING_CONFIRM_LOGIN_APP		    =>	"Waiting for confirmation",
				LANG_MES_LOCKED_LOGIN_APP		    		=>	"Account locked.",
				LANG_MES_NOT_ALLOW_LOGIN_APP		    	=>	"Not allowed",
				LANG_MES_RIGHT_LOGIN_APP		    		=>	"Right",
				LANG_MES_INSERT_ERROR_APP		    		=>	"An error occurred",
				LANG_MES_OUT_OF_DATE_LOGIN_APP				=>	"Your account is overdue.",
				/*
				|------------------------
				| lottry
				|-------------------------
				*/
				LANG_LOTTRY		    				=>	"Lottery",
				LANG_LIVE_DRAW		    			=>	"Live Draw",
				LANG_WEST_MALAYSIA		    		=>	"West Malaysia",
				LANG_DAMACAI		    			=>	"Damacai",
				LANG_MAGNUM		    				=>	"Magnum",
				LANG_SPORT_TOTO		    			=>	"Sport Toto",
				LANG_BIG_SWEEP		    			=>	"Big Sweep",
				LANG_2D		    					=>	"2D",
				LANG_SINGAPORE		   				=>	"Singapore",
				LANG_SINGAPORE_4D		   		    =>	"Singapore4D",
				LANG_SINGAPORE_TOTO                 =>  "SingaporeToTo",
				LANG_LOSIN                    		=>  "Singapore",
				LANG_TOTO		    				=>	"Toto",
				LANG_POOLS_4D		    			=>	"Pools 4D",
				LANG_SWEEP		    				=>	"Sweep",
				LANG_EAST_MALAYSIA		    		=>	"East Malaysia",
				LANG_SABAH_88		    			=>	"Sabah 88",
				LANG_STC_4D		    				=>	"STC 4D",
				LANG_CASH_SWEEP		    			=>	"Cash Sweep 1+3D",
				
				/*mal live draw */
                LANG_MAL_LIVE_DRAW                    => "Mal Live Draw",
                LANG_1ST                           		=> "1ST",
                LANG_2ND                       			=> "2ND",
                LANG_3RD                      		=> "3RD",
                LANG_S                        => "S",
                LANG_C                        => "C",

                /* sin live draw */
                LANG_SIN_LIVE_DRAW =>"Sin Live Draw",
                LANG_1ST_PR => "1st Prize",
                LANG_2ND_PR=>"2nd Prize",
                LANG_3RD_PR=>"3rd Prize",
                LANG_STA_PR=>"Starter Prizes",
                LANG_CON_PR=>"Consolation Prizes",
				/*
                   
                /*2D */
                LANG_PAST_RESULT => "Past Results",
                LANG_DAY=> "Day",
                LANG_NIGHT=>"Night",
				/*
				|------------------------
				| admin lottry
				|-------------------------
				*/
				//admin damacai
				LANG_DRAW_DATE_CONVERT 	           				=>	"Draw date Convert",
				LANG_CLEAR_ALL 	       							=>	"Clear all",
				LANG_1_3D_CONVERT 	       						=>	"1+3D Convert",
				LANG_3D_CONVERT 	                           	=>	"3D Convert",
				LANG_RM_CONVERT 	                           	=>	"RM Convert",
                LANG_1_3D_JP1_CONVERT                           =>	"1+3D Jackpot 1 Convert",
				LANG_1_3D_JP2_CONVERT 	                        =>	"1+3D Jackpot 2 Convert",
                LANG_3D_JP_CONVERT                              =>	"3D Jackpot Convert",
				LANG_DMC_JP1_CONVERT 	                        =>	"DMC Jackpot 1 Convert",
                LANG_DMC_JP2_CONVERT                            =>	"DMC Jackpot 2 Convert",
				LANG_NOT_FOUND                            		=>	"Not found",
				LANG_DRAW_NO		    						=>	"Draw no",
				//admin magnum
				LANG_4D_GAME_CONVERT	    					=>	"4D Game convert",
				LANG_4D_JACKPOT_CONVERT    						=>	"4D Jackpot convert",
				LANG_4D_JACKPOT_GOLD_CONVERT					=>	"4D Jackpot Gold convert",
				//toto 4D admin
				LANG_CONVERT_ALL	    						=>	"Convert all",
				
				//Add 27/04/2015
				LANG_TOTAL_BALANCE	    						=>	"Total Balance",
                LANG_SHOW_ADMIN_CONTACT                         => "Show Admin's contact",
                LANG_SHOW_AGENT_CONTACT                         => "Show Agent's contact",
				LANG_TR_SHOW                         => "Show ",
				LANG_TR_NOT_SHOW                         => "Do not Show",
				LANG_TR_SERIAL => "Serial No.",
				LANG_TR_VERIFY_CODE => "Verify code",
				
				LANG_LANGUAGE_IMG => "assets/img/app/Chinese.png",
				LANG_LANGUAGE_URL => "cn",
				
				LANG_RESULT_IMG   => "assets/img/app/Result-icon.png",
				LANG_RACECARD_IMG => "assets/img/app/RaceCard-icon.png",
				LANG_WEIGHT_IMG   => "assets/img/app/Weight-icon.png",
				LANG_SCR_ET_IMG   => "assets/img/app/SCR-icon.png",
				LANG_INFO_BOARD_IMG => "assets/img/app/HorseInfot-icon.png",

				// image lottry
				LANG_MAL_LIVE_IMG => "assets/img/app/logo-Mal-Live.png",
				LANG_SIN_LIVE_IMG => "assets/img/app/logo-Sinl-Live.png",
				LANG_LIVE_2D_IMG  => "assets/img/app/Logo-Live-2D.png",
				// end image lottry
				
				LANG_LANGUAGE_MAL => "MAL",
				LANG_LANGUAGE_SIN => "SIN",
				LANG_LANGUAGE_NO => "NO",
				LANG_LANGUAGE_SCR => "SCR",
				
				LANG_RESULT_RESULT => "Result",
				LANG_RESULT_NO => "No",
				LANG_RESULT_LENGTH => "Length",
				LANG_RESULT_WIN => "Win",
				LANG_RESULT_PLACE => "Place",
				LANG_RESULT_TIMING => "Timing",
				LANG_RESULT_QN_FORECASR => "QN/Forecast",
				LANG_RESULT_QP_PLACE => "QP/Place Forecast",
				LANG_RESULT_TF_TIERCE => "TF/Tierce",
				LANG_RESULT_TR_TRIO => "TR/Trio",
				LANG_RESULT_QT_QUARTET => "QT/Quartet",
				LANG_RESULT_QUADRO => "Quadro",
				
				LANG_COUNTRY_MY => "Malaysia",
				LANG_COUNTRY_HK => "HongKong",
				LANG_COUNTRY_MC => "Macau",
				LANG_COUNTRY_SG => "Singapore",
				LANG_COUNTRY_SA => "South Africa",
				LANG_COUNTRY_AU => "Australia",
				LANG_COUNTRY_EU => "Europe",
				LANG_COUNTRY_KR => "Korea",
				
				LANG_TIME_MON => "Mon",
				LANG_TIME_TUE => "Tue",
				LANG_TIME_WED => "Wed",
				LANG_TIME_THU => "Thu",
				LANG_TIME_FRI => "Fri",
				LANG_TIME_SAT => "Sat",
				LANG_TIME_SUN => "Sun",
				
				LANG_RACECARD_T => "List of RaceCard",
				LANG_RACECARD_HNO => "Horse No",
				LANG_RACECARD_CL => "Color",
				LANG_RACECARD_LFR => "Last 5 Runs",
				LANG_RACECARD_HNA => "Horse Name",
				LANG_RACECARD_JK => "Jockey",
				LANG_RACECARD_BR => "Br",
				LANG_RACECARD_RTG => "Rtg",
				LANG_RACECARD_WT => "Wt",
				LANG_RACECARD_HCP => "Hcp",
				LANG_RACECARD_TRAIN => "Trainer",
				LANG_RACE_RACE => "Race",
				
				LANG_WEIGHT_T=> "Weight",
				LANG_EARLY_TICKET =>"Early Ticket",
				LANG_SCR_ET =>"Scr & Early Ticket",
				
				//29-04-2015
				LANG_MAL_LIVE_DRAW => "Mal Live Draw",
				LANG_1ST=>"1St",
				LANG_2ND=>"2nd",
				LANG_3RD=>"3rd",
				LANG_SPECIAL=>"Special",
				LANG_CONSOLATION=>"Consolation",
				LANG_SIN_LIVE_DRAW=>"Singapore Live Draw",
                
				LANG_STARTER=>"Starter",
				LANG_1ST_PR=>"1st Prize",
				LANG_2ND_PR=>"2nd Prize",
				LANG_3RD_PR=>"3rd Prize",
                LANG_STA_PR=>"Starter Prizes",
                LANG_CON_PR=>"Consolation Prizes",
                
                LANG_DAY=>"Day",
                LANG_NIGHT=>"Night",
                LANG_PAST_RESULT=>"Past results",
				
				LANG_DMC_13D=>"Damacai 1 + 3D",
				LANG_LOT_DATE=>"Date",
				LANG_13D_JACKPOT_1=>"1+3D Jackpot 1",
				LANG_13D_JACKPOT_2=>"1+3D Jackpot 2",
				LANG_DMC_JACKPOT_1=>"Damacai Jackpot 1",
				LANG_DMC_JACKPOT_2=>"Damacai Jackpot 2",
				
				LANG_4TH_PR=>"4th Prize",
				LANG_5TH_PR=>"5th Prize",
				LANG_6TH_PR=>"6th Prize",
				LANG_7TH_PR=>"7th Prize",
				
				LANG_4D_JACKPOT_1=>"4D Jackpot 1",
				LANG_4D_JACKPOT_2=>"4D Jackpot 2",
				LANG_JACKPOT_1=>"Jackpot 1",
				LANG_JACKPOT_2=>"Jackpot 2",
				
				LANG_JACKPOT_1_PR=>"Jackpot 1st Prize",
				LANG_JACKPOT_2_PR=>"Jackpot 2nd Prize",
				LANG_4D_JACKPOT_GOLD=>"4D Jackpot Gold",
				
				LANG_TOTO4D_JACKPOT=>"Toto 4D Jackpot",
				LANG_TOTO5D=>"Toto 5D",
				LANG_TOTO6D=>"Toto 6D",
				
				LANG_JACKPOT=>"Jackpot",
				LANG_OR=>"or ",
				LANG_GRAND_TOTO_663=>"Grand Toto 6/63",
				LANG_POWER_TOTO_655=>"Power Toto 6/55",
				LANG_SURPREM_TOTO_658=>"Supreme Toto 6/58",
				
				LANG_MAL_BIG_SWEEP=>"Mal Big Sweep",
				LANG_TICKET_NO=>"Ticket No",
				LANG_SEARCH=>"Search",
				LANG_1_2_3_J =>"1st, 2nd or 3rd + Jackpot Number",
				LANG_MAJOR_PR=>"Major Prize",
				LANG_BLISS_PR=>"Bliss Prizes (RM5,000 Each)",
				LANG_SWEET_PR=>"Sweet Prizes (RM2,000 Each)",
				LANG_GLEE_PR=>"Glee Prizes (RM1,000 Each)",
				LANG_HAPPY_PR=>"Happy Prizes (RM100 Each)",
				LANG_LUCKY_PR=>"Lucky Prizes (RM50 Each)",
				LANG_BONUS_PR=>"Bonus Prizes (RM20 Each)",
				
				LANG_SIN_TOTO=>"Singapore Toto",
				LANG_GRP_1=>"Group 1",
				LANG_GRP_2=>"Group 2",
				LANG_GRP_3=>"Group 3",
				LANG_GRP_4=>"Group 4",
				LANG_GRP_5=>"Group 5",
				LANG_GRP_6=>"Group 6",
				LANG_GRP_7=>"Group 7",
				LANG_WINNER=>"Winners",
				LANG_SIN_4D=>"Singapore 4D",
				
				LANG_SIN_SWEEP=>"Singapore Sweep",
				LANG_10_JACKPOT=>"10 Jackpot Prizes @ $10,000 each",
				LANG_10_LUCKY=>"10 Lucky Prizes @ $5,000 each",
				LANG_30_GIFT=>"30 Gift Prizes @ $3,000 each",
				LANG_30_CON=>"30 Consolation Prizes @ $2,000 each",
				LANG_50_PART=>"50 Participation Prizes @ $1,000 each",
				LANG_315_2D_DELIGHT=>"315,000 2D Delight Prizes @ $6 each",
				
				LANG_SABA_4D=>"Sabah 88 4D",
				LANG_LOTO88_4D=>"Lotto 88 4D",
				LANG_SABA_LOTO=>"Sabah Lotto",
				
				LANG_JACKPOT_PR => "Jackpot Prizes",	
				LANG_WINNING_NUMBERS =>"Winnung Numbers",
				LANG_ADDITIONAL_NUMBERS =>"Additional Numbers",
				LANG_WINNING_SHARES=>"Winning Shares",
				
				LANG_PRIZE_GRP=>"Prize Group",
				LANG_SHARE_AMT=>"Share Amount",
				LANG_NO_OF_WIN_SHARE =>"No. Of Winning Shares",
				
				LANG_LANGUAGE_CODE =>"2",
				
				//12/05/2015
				LANG_PASS_NOT_RIGHT			=> 	"Password wrong.Please key in again",
				LANG_NOT_ACTIVE				=> 	"Your account is inactive.Please contact Admin",
				LANG_USERNAME_NOT_RIGHT		=> 	"Username wrong.Please key in again",
				LANG_NOT_PERMIT				=> 	"You do not have rights on this function",
				
				//Nghia add 18/05/2015
				LANG_MES_LOCKED_LOGIN_APP_SHOW_AGENT=> 	" Please contact agent. ",
				LANG_GST					=>	"GST",
				LANG_CONTACT_YOUR_AGENT      => " Please contact your agent.",

				//  menu main setting
				 LANG_SETTING			   => "SETTING",
				 LANG_SERIAL_NUMBER 	   => "Serial Number",
				 LANG_HORSE_NOTIFICATIONS  => "Horse Notifications",
				 LANG_LOTTRY_NOTIFICATIONS => "Lottry Notifications",
				 LANG_SOCCER_NOTIFICATIONS => "Soccer Notifications",
				 LANG_NOTIFICATIONS        => "Notifications History",
				 LANG_TELL_YOUR_FRIENDS    => "Tell Your Friends",
				 LANG_SET_PASSCODE         => "Set Passcode",
				 LANG_FEEDBACK             => "Feedback",
				 LANG_CHECKFORUPDATE       => "Check For Update",
				 LANG_ABOUT_US             => "About Us",
				 LANG_NOTIFICATION         => "Notifications",
				 LANG_VESRSION             => "Vesrsion",

				 // horse notifications
				 LANG_SOUND => "Sound",
				 LANG_VIBRATION=> "Vibration",
				 LANG_RACING_DAY => "Racing Day",
				 LANG_TIPS       => "Tips",
				 LANG_PLEASE_FEEL =>"Please feel free to input any question or suggestion.",
				 LANG_WE_WILL     => "We will take them seriously.",
				 LANG_THANKS_YOU  => "Thanks you for your kindly support.",

				 // soccer notifications
				 LANG_GOAL => "Goal",

				 // lottrey notifications
				 LANG_INSERT_YOUR_PLAY  => "Insert Your Play Number",
				 LANG_4D_NUMBER_HISTORY => "4D Number History",
				 LANG_MY_PLAY_NUMBER    => "My Play Number",
				 
				 LANG_SHOW_LOG    			=> "Show log",
				 LANG_TR_CREATE_DATE		=> "Create date",
				 LANG_REFUND		    	=> "Refund",                     

				// menu main Soccer
				 LANG_SOCCER => "SOCCER",
				 LANG_LIVE   => "Live",
				 LANG_TODAY  => "Today",
				 LANG_EARLY_MARKET => "Early Odds",
				 LANG_LIVE_SCORE   => "Correct Score",
				 LANG_FAVOURITE   => "Favourite",
				 LANG_RESULT      => "Result",
				 LANG_NUMBER      => "Number",
                 LANG_soccer_info  => "Soccer info",
				 LANG_soccer_info_board=> "Soccer Info Board",

				 LANG_All_Tables  => "All Tables",                    
				 LANG_Country_Parameter => "Country parameter",   				
                 LANG_League_Parameter  => "League parameter",
				 LANG_Table             => "Table",
				 // live goal notification
                 LANG_LIVE_GOAL_NOTIFI => "Live Goal Notification",
                 LANG_GOAL_PARAMETER   => "Goal Parameter",
                 LANG_Ladbrokes        => "Ladbrokes",
                 LANG_DATE_TIME        =>"Date & Time",
                 LANG_FIRST_HALF       =>"First Half Score",
                 LANG_FULL_TIME        =>"Full Time Score",
                 LANG_FT_FH            =>"FT & FH CS"  ,
                 LANG_Scratching =>     "Scratching",
                 LANG_MaterChoice =>     "Mater Choice",
                 LANG_BatamTic    =>     "Batam Tic"
               
			);
/*
|--------------------------------------------------------------------------
| page login end
|--------------------------------------------------------------------------
*/