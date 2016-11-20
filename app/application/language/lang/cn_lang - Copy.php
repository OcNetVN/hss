<?php 
/*
|--------------------------------------------------------------------------
| page login start
|--------------------------------------------------------------------------
*/
$lang         =    array(
                LANG_EN                     =>    "英文",
                LANG_CN                     =>    "中文简体",
                LANG_TITE_SUPER_LOGIN        =>    "客户管理网页",
                LANG_TITE_ADMIN             =>    "信息管理网页",
                LANG_TITE_AGENT_LOGIN         =>    "代理页",
                LANG_TITE_USER                 =>    "用户页",
                LANG_USER                    =>    "登录名",
                LANG_PASS                     =>    "密码",
                LANG_LOGIN                     =>    "登录",
                LANG_CHOOSE_LANG             =>    "选择语言",
                LANG_LOGOUT                 =>    "登出",
                LANG_HORSE_RACING             =>    "赛马",
                LANG_ADMIN_PAGE                =>    "代理/用户表",
                LANG_AGENT_PAGE                =>    "客户表",
                LANG_SELL_PHONE                =>    "手机",
                LANG_TRANS_HISTORY             =>    "交易历史",
                LANG_ADD_AGENT                =>    "造新的代理",
                LANG_ADD_USER                =>    "造心客户",
                LANG_SHOW_ALL                =>    "显示全部",
                LANG_REPORT                    =>    "报告",
                LANG_GEN_STATEMENT             =>    "账单报表",
                LANG_LIVE_TOTE                 =>    "赛马博彩局",
                LANG_RACE_INFO                 =>    "赛车板",
                LANG_RACE_CARD                 =>    "赛票",
                LANG_WEIGHT_BOARD             =>    "马重板",
                LANG_SET                     =>    "划痕和早期票",
                LANG_RACE_RESULT             =>    "马赛结果",
                LANG_DATABASE                 =>    "参数调整",
                LANG_HORSE_INFO_BOARD       =>  "赛马资讯",
                LANG_JOCKY_COLOR               =>  "骑师颜色",
                
                LANG_AlREADY_EXISTS         =>    "已经存在",
                LANG_PANEL                     =>    "面板",
                LANG_UNKNOWN                 =>    "未知",
                LANG_AGENT                  =>    "代理",
                LANG_ADMIN                     =>    "消息管理",
                LANG_SUPER_ADMIN            =>    "用户管理",
                LANG_ACTIVE                 =>    "活动",
                LANG_INACTIVE               =>    "待用",
                LANG_NOT_RIGHT                 =>    "不对",
                LANG_NOT_HAVE_ANY_ROW         =>    "没有记录",
                LANG_NOT_NULL                 =>    "不为空",
                LANG_NULL                     =>    "空",
                LANG_NOT_CORRECT             =>    "不正确",
                LANG_BUTTON_SEARCH             =>    "搜索",
                LANG_BUTTON_CLEAR_HISTORY     =>    "清除记录历史",
                LANG_BUTTON_SAVE             =>    "保存",
                LANG_BUTTON_RESET             =>    "重置",
                LANG_BUTTON_DELETE_AGENT     =>    "删除代理",
                LANG_BUTTON_DELETE_CUSTOMER =>    "删除客户",
                LANG_CLOSE                     =>    "关闭",
                
                //page list_agent/username
                LANG_HEADING_LIST_AGENT            =>    "搜索客户/序列号",
                LANG_HEADING_LIST_ADMIN            =>    "搜索代理/序列号",
                LANG_HEADING_TBL_LIST_AGENT        =>    "客户表",
                LANG_HEADING_TBL_LIST_ADMIN        =>    "代理表",
                LANG_PLACEHOLDER_LIST_AGENT        =>    "登录名/序列号",
                LANG_TR_AGENT_NAME                    =>    "代理名字",
                LANG_TR_CUSTOMER_NAME                =>    "客户名字",
                LANG_TR_USERNAME                    =>    "登录名",
                LANG_TR_CONTACT                    =>    "联系号码",
                LANG_TR_STATUS                        =>    "状态",
                LANG_TR_FEES                        =>    "费",
                LANG_TR_TOTAL_CUSTOMER                =>    "总客户",
                LANG_TR_DUEDATE                    =>    "到期日",
                LANG_TR_REMARK                     =>    "注释",
                LANG_PASS_NEW                      =>    "新密码",
                
                //page list_member role super admin
                LANG_BTN_ADD_AGENT                     =>    "添加代理",
                LANG_BTN_GENERATE_CODE                 =>    "自造代号",
                LANG_TR_LASTLOGIN                      =>    "最后登录",
                
                //page list_member roles super admin
                LANG_LIST_MEMBER_PAGE                   =>    "客户表",
                LANG_TR_IMEI                             =>    "序列号码",
                LANG_TR_VERIFYCODE                         =>    "验证码",
                LANG_TR_AGENT                                =>    "代理",
                LANG_TR_ACTION                            =>    "动作",
                
                //page trans_history
                LANG_HEADING_AGENT_TRANS_HISTORY                =>    "代理交易历史",
                LANG_HEADING_CUSTOMER_TRANS_HISTORY            =>    "客户交易历史",
                LANG_OLD_REMARK                                =>    "旧注释",
                LANG_NEW_REMARK                                =>    "新注释",
                LANG_UPDATE_TIME                               =>    "更新时间",
                LANG_DATEFROM                                        =>    "从日期",
                LANG_DATETO                                       =>    "至日期",
                LANG_EVENT                                            =>    "事件",
                LANG_INFO                                       =>    "信息",
                
                
                //page add new agent/add new customer
                LANG_CONFIRM_PASSWORD        =>    "密码确认",
                LANG_ADD_FAILED              =>    "添加失败",
                LANG_ADD_SUCCESS             =>    "添加成功",
                
                //page report
                LANG_TOTAL_ACTIVE_AGENT          =>    "总数活动代理",
                LANG_TOTAL_INACTIVE_AGENT        =>    "总数飞活动代理",
                LANG_TOTAL_ACTIVE_CUSTOMER       =>    "总数活动客户",
                LANG_TOTAL_INACTIVE_CUSTOMER     =>    "总数飞活动客户",
                
                //page gen_statement
                LANG_SELECT_DATE                    =>    "（选定日期）",
                LANG_AGENT_STATEMENT                =>    "代理报表",
                LANG_PREVIOUS_STATEMENT             =>    "上期报表",
                LANG_PREVIOUS_BALANCE               =>    "上期余额",
                LANG_ACTIVE_USER_ON_DUEDATE         =>    "活动用户在到期日",
                LANG_ACTIVE_USER_AFTER_DUEDATE      =>    "活动用户过了到期日",
                LANG_INACTIVE_USER_ON_DUEDATE       =>    "费活动用户过了到期日",
                LANG_TOTAL                          =>    "总数",
                LANG_ACTIVE_USER                    =>    "活动用户",
                LANG_NEW_MEMBER1_15                 =>    "新客户 1-15",
                LANG_NEW_MEMBER16_31                =>    "新客户 16-31",
                LANG_PAY_ALL                        =>    "支付所有",
                LANG_PAY_ORDER                      =>    "支付其它",
                LANG_MONEY                          =>    "钱",
                LANG_FAILED                         =>    "错误",
                LANG_SUCCESS                        =>    "成功",
                LANG_BUTTON_CLOSE                   =>    "关闭",
                LANG_PAY                            =>    "付",
                LANG_REMAINDER_AMOUNT               =>    "余额",
                LANG_ACTIVE_MEMBER16_31             =>    "活动客户 16-31",
                
                //page agent/custome page
                LANG_TITE_CUSTOMER_PAGE        =>    "客户网页",
                LANG_LINK_STATEMENT            =>    "报表",
                LANG_UPDATE_FAILED            =>    "更新失败",
                LANG_UPDATE_SUCCESS            =>    "更新成功",
                
                //application
                LANG_MES_NOT_RIGHT_LOGIN_APP                =>    "不正确",
                LANG_MES_WAITING_CONFIRM_LOGIN_APP            =>    "等待确认",
                LANG_MES_LOCKED_LOGIN_APP                    =>    "帐户锁定",
                LANG_MES_NOT_ALLOW_LOGIN_APP                =>    "不允许",
                LANG_MES_RIGHT_LOGIN_APP                    =>    "对",
                LANG_MES_INSERT_ERROR_APP                    =>    "发生错误",
                
                /*
                |------------------------
                | lottry
                |-------------------------
                */
                LANG_LOTTRY                            =>    "博彩",
                LANG_LIVE_DRAW                        =>    "现场开彩",
                LANG_WEST_MALAYSIA                    =>    "马来西亚西部",
                LANG_DAMACAI                        =>    "大马彩",
                LANG_MAGNUM                            =>    "万能万字",
                LANG_SPORT_TOTO                        =>    "Sport Toto",
                LANG_BIG_SWEEP                        =>    "大彩",
                LANG_2D                                =>    "字花",
                LANG_SINGAPORE                           =>    "新加坡",
                LANG_TOTO                            =>    "多多",
                LANG_POOLS_4D                        =>    "Pools 4D",
                LANG_SWEEP                            =>    "大彩",
                LANG_EAST_MALAYSIA                    =>    "马来西亚东部",
                LANG_SABAH_88                        =>    "沙巴 88",
                LANG_STC_4D                            =>    "山打根万字",
                LANG_CASH_SWEEP                        =>    "大万万字",
                
                /*
                |------------------------
                | admin lottry
                |-------------------------
                */
                //admin damacai
                LANG_DRAW_DATE_CONVERT                                =>    "体彩日期转换",
                LANG_1_3D_CONVERT                                    =>    "1+3D 转换",
                LANG_3D_CONVERT                                    =>    "3D 转换",
                LANG_RM_CONVERT                                    =>    "RM 转换",
                LANG_1_3D_JP1_CONVERT                           =>    "1+3D Jackpot 1 转换",
                LANG_1_3D_JP2_CONVERT                             =>    "1+3D Jackpot 2 转换",
                LANG_3D_JP_CONVERT                              =>    "3D Jackpot 转换",
                LANG_DMC_JP1_CONVERT                             =>    "DMC Jackpot 1 转换",
                LANG_DMC_JP2_CONVERT                            =>    "DMC Jackpot 2 转换",
                LANG_NOT_FOUND                                    =>    "未找到",
                LANG_DRAW_NO                                    =>    "开彩期数",
                //admin magnum
                LANG_4D_GAME_CONVERT                            =>    "4D Game 转换",
                LANG_4D_JACKPOT_CONVERT                            =>    "4D Jackpot 转换",
                LANG_4D_JACKPOT_GOLD_CONVERT                    =>    "4D Jackpot Gold 转换",
                //toto 4D admin
                LANG_CONVERT_ALL                                =>    "转换所有",                
                //Add 27/04/2015
				LANG_TOTAL_BALANCE	    						=>	"Total Balance",
                LANG_SHOW_ADMIN_CONTACT                         => "显示管理的电话号码",
                LANG_SHOW_AGENT_CONTACT                         => "显示代理的电话号码",
				LANG_TR_SHOW                         => "显示 ",
				LANG_TR_NOT_SHOW                         => "不显示",
				LANG_TR_SERIAL => "序列号",
				LANG_TR_VERIFY_CODE => "验证",
				
				LANG_LANGUAGE_IMG => "assets/img/app/English.png",
				LANG_LANGUAGE_URL => "en",
				
				LANG_RESULT_IMG => "assets/img/app/Result-icon-cn.png",
				LANG_RACECARD_IMG => "assets/img/app/RaceCard-icon-cn.png",
				LANG_WEIGHT_IMG => "assets/img/app/Weight-icon-cn.png",
				LANG_SCR_ET_IMG => "assets/img/app/SCR-icon-cn.png",
				LANG_INFO_BOARD_IMG => "assets/img/app/HorseInfot-icon-cn.png",
				
				LANG_LANGUAGE_MAL => "马",
				LANG_LANGUAGE_SIN => "新",
				LANG_LANGUAGE_NO => "编号",
				LANG_LANGUAGE_SCR => "割马",
				
				LANG_RESULT_RESULT => "成绩",
				LANG_RESULT_NO => "编号",
				LANG_RESULT_LENGTH => "胜出距离",
				LANG_RESULT_WIN => "独赢",
				LANG_RESULT_PLACE => "位置",
				LANG_RESULT_TIMING => "夺标时速",
				LANG_RESULT_QN_FORECASR => "预测彩",
				LANG_RESULT_QP_PLACE => "位置预测彩",
				LANG_RESULT_TF_TIERCE => "三重彩",
				LANG_RESULT_TR_TRIO => "单T彩",
				LANG_RESULT_QT_QUARTET => "四重彩",
				LANG_RESULT_QUADRO => "四连彩",
				
				LANG_COUNTRY_MY => "马来西亚",
				LANG_COUNTRY_HK => "香港",
				LANG_COUNTRY_MC => "澳门",
				LANG_COUNTRY_SG => "新加坡",
				LANG_COUNTRY_SA => "南非",
				LANG_COUNTRY_AU => "澳大利亚",
				LANG_COUNTRY_EU => "欧洲",
				LANG_COUNTRY_KR => "韩国",
				
				LANG_TIME_MON => "星期一",
				LANG_TIME_TUE => "星期二",
				LANG_TIME_WED => "星期三",
				LANG_TIME_THU => "星期四",
				LANG_TIME_FRI => "星期五",
				LANG_TIME_SAT => "星期六",
				LANG_TIME_SUN => "星期日",
				
				LANG_RACECARD_T => "排位表",
				LANG_RACECARD_T => "排位表",
				LANG_RACECARD_HNO => "马匹编号",
				LANG_RACECARD_CL => "颜色",
				LANG_RACECARD_LFR => "近5次战绩",
				LANG_RACECARD_HNA => "马名",
				LANG_RACECARD_JK => "骑师",
				LANG_RACECARD_BR => "排位",
				LANG_RACECARD_RTG => "评分",
				LANG_RACECARD_WT => "配磅",
				LANG_RACECARD_HCP => "Hcp",
				LANG_RACECARD_TRAIN => "练马师",
				LANG_RACE_RACE => "场次",
				
				LANG_WEIGHT_T=> "配磅",
				LANG_EARLY_TICKET =>"早票",
				LANG_SCR_ET =>"割马与早票",
				
				//29-04-2015
				LANG_MAL_LIVE_DRAW => "马来西亚现场开彩",
				LANG_1ST=>"首奖",
				LANG_2ND=>"二奖",
				LANG_3RD=>"三奖",
				LANG_SPECIAL=>"特别奖",
				LANG_CONSOLATION=>"安慰奖",
				LANG_SIN_LIVE_DRAW=>"新加坡现场开彩",
				
				LANG_STARTER=>"特别",
				LANG_1ST_PR=>"第一奖",
				LANG_2ND_PR=>"第二奖",
				LANG_3RD_PR=>"第三奖",
                LANG_STA_PR=>"特别奖",
                LANG_CON_PR=>"安慰奖",
				
				LANG_DAY=>"早厂",
                LANG_NIGHT=>"夜厂",
                LANG_PAST_RESULT=>"过往开彩成绩",
				
				LANG_DMC_13D=>"大马彩 1+3D",
				LANG_LOT_DATE=>"开彩日期",
				LANG_13D_JACKPOT_1=>"1+3D 积宝 1",
				LANG_13D_JACKPOT_2=>"1+3D 积宝 2",
				LANG_DMC_JACKPOT_1=>"大马彩积宝 1",
				LANG_DMC_JACKPOT_2=>"大马彩积宝 2",
				
				LANG_4TH_PR=>"第四奖",
				LANG_5TH_PR=>"第五奖",
				LANG_6TH_PR=>"第六奖",
				LANG_7TH_PR=>"第七奖",
				
				LANG_4D_JACKPOT_1=>"万字积宝 1",
				LANG_4D_JACKPOT_2=>"万字积宝 2",
				LANG_JACKPOT_1=>"积宝 1",
				LANG_JACKPOT_2=>"积宝 2",
				
				LANG_JACKPOT_1_PR=>"积宝一奖金",
				LANG_JACKPOT_2_PR=>"积宝二奖金",
				LANG_4D_JACKPOT_GOLD=>"黃金万字积宝",
				
				LANG_TOTO4D_JACKPOT=>"多多万字积宝",
				LANG_TOTO5D=>"多多十万字",
				LANG_TOTO6D=>"多多百万字",
				
				LANG_JACKPOT=>"积宝",
				LANG_OR=>"或 ",
				LANG_GRAND_TOTO_663=>"鸿运多多六合彩6/63",
				LANG_POWER_TOTO_655=>"至尊多多六合彩6/55",
				LANG_SURPREM_TOTO_658=>"好运多多六合彩6/58",
				
				LANG_MAL_BIG_SWEEP=>"大彩",
				LANG_TICKET_NO=>"彩票号码",
				LANG_SEARCH=>"搜索",
				LANG_1_2_3_J =>"首奖, 二奖, 三奖+ 积宝号码",
				LANG_MAJOR_PR=>"大奖",
				LANG_BLISS_PR=>"幸福奖  (每份 RM5,000)",
				LANG_SWEET_PR=>"甜蜜奖  (每份 RM2,000)",
				LANG_GLEE_PR=>"欢乐奖  (每份 RM1,000)",
				LANG_HAPPY_PR=>"快乐奖  (每份 RM100)",
				LANG_LUCKY_PR=>"幸运奖  (每份 RM50)",
				LANG_BONUS_PR=>"花红奖  (每份 RM20)",
				
				LANG_SIN_TOTO=>"新加坡多多",
				LANG_GRP_1=>"第1组",
				LANG_GRP_2=>"第2组",
				LANG_GRP_3=>"第3组",
				LANG_GRP_4=>"第4组",
				LANG_GRP_5=>"第5组",
				LANG_GRP_6=>"第6组",
				LANG_GRP_7=>"第7组",
				LANG_WINNER=>"中奖份额",
				LANG_SIN_4D=>"新加坡万字票",
				
				LANG_SIN_SWEEP=>,"新加坡大彩",
				LANG_10_JACKPOT=>"10 份幸运奖(每份$10,000)",
				LANG_10_LUCKY=>"10 份幸运奖(每份$5,000)",
				LANG_30_GIFT=>"30 份礼奖(每份$3,000)",
				LANG_30_CON=>"30 份安慰奖(每份$2,000)",
				LANG_50_PART=>"50 份参与奖(每份$1,000)",
				LANG_315_2D_DELIGHT=>"315,000 份二位数欢乐奖 (每份$6 )",
				
				LANG_SABA_4D=>"沙巴万字",
				LANG_LOTO88_4D=>"沙巴万字",
				LANG_SABA_LOTO=>"沙巴乐多",
				
				
            );
/*
|--------------------------------------------------------------------------
| page login end
|--------------------------------------------------------------------------
*/