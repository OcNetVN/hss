      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <!-- Admin Horse Racing -->
                  <li class="sub-menu">
                      <a href="javascript:;" class="<?php echo ((isset($active_submenu) && $active_submenu == 1) || (!isset($active_submenu))) ? 'active' : ''; ?>" >
                          <i class=" icon-dashboard"></i>
                          <span><?php echo $this->lang->line(LANG_HORSE_RACING); ?></span>
                      </a>
                      <ul class="sub">                          
                          <li class="<?php echo (isset($active) && $active == 0) ? 'active' : ''; ?>"><a href="<?php echo base_url("admin/live_tote"); ?>"><?php echo $this->lang->line(LANG_LIVE_TOTE); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 1) ? 'active' : ''; ?>"><a href="<?php echo base_url("admin/race_info"); ?>"><?php echo $this->lang->line(LANG_RACE_INFO); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 2) ? 'active' : ''; ?>"><a href="<?php echo base_url("admin/race_card"); ?>"><?php echo $this->lang->line(LANG_RACE_CARD); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 3) ? 'active' : ''; ?>"><a href="<?php echo base_url("admin/weight_board"); ?>"><?php echo $this->lang->line(LANG_WEIGHT_BOARD); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 4) ? 'active' : ''; ?>"><a href="<?php echo base_url("admin/ScratchingEarlyTicket"); ?>"><?php echo $this->lang->line(LANG_SET); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 5) ? 'active' : ''; ?>"><a href="<?php echo base_url("admin/race_result"); ?>"><?php echo $this->lang->line(LANG_RACE_RESULT); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 6) ? 'active' : ''; ?>"><a href="<?php echo base_url("admin/database"); ?>"><?php echo $this->lang->line(LANG_DATABASE); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 7) ? 'active' : ''; ?>"><a href="<?php echo base_url("admin/horse_info_board"); ?>"><?php echo $this->lang->line(LANG_HORSE_INFO_BOARD); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 8) ? 'active' : ''; ?>"><a href="<?php echo base_url("admin/joccolor"); ?>"><?php echo $this->lang->line(LANG_JOCKY_COLOR); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 9) ? 'active' : ''; ?>"><a href="<?php echo base_url("admin/net_ticket"); ?>">Net Ticket</a></li>
                      </ul>
                  </li>
                  <!-- Admin lottry -->
                  <li class="sub-menu">
                      <a href="javascript:;" class="<?php echo (isset($active_submenu) && $active_submenu == 2) ? 'active' : ''; ?>" >
                          <i class=" icon-dashboard"></i>
                          <span><?php echo $this->lang->line(LANG_LOTTRY); ?></span>
                      </a>
                      <ul class="sub">                          
                          <li class="<?php echo (isset($active) && $active == 10) ? 'active' : ''; ?>"><a href="<?php echo base_url("lott/livedraw"); ?>"><?php echo $this->lang->line(LANG_LIVE_DRAW); ?></a></li>
                          <li style="padding-top: 10px;" class="<?php echo (isset($active) && $active == 11) ? 'active' : ''; ?>"><span style="color: yellow; cursor: pointer;"><?php echo $this->lang->line(LANG_WEST_MALAYSIA); ?></span></li>
                          <li class="<?php echo (isset($active) && $active == 12) ? 'active' : ''; ?>"><a href="<?php echo base_url("lott/wes_dm"); ?>"><?php echo $this->lang->line(LANG_DAMACAI); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 13) ? 'active' : ''; ?>"><a href="<?php echo base_url("lott/wes_mn"); ?>"><?php echo $this->lang->line(LANG_MAGNUM); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 14) ? 'active' : ''; ?>"><a href="<?php echo base_url("lott/tt"); ?>"><?php echo $this->lang->line(LANG_SPORT_TOTO); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 15) ? 'active' : ''; ?>"><a href="<?php echo base_url("lott/wes_bg"); ?>"><?php echo $this->lang->line(LANG_BIG_SWEEP); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 16) ? 'active' : ''; ?>"><a href="<?php echo base_url("lott/D2"); ?>"><?php echo $this->lang->line(LANG_2D); ?></a></li>
                          <li style="padding-top: 10px;" class="<?php echo (isset($active) && $active == 17) ? 'active' : ''; ?>"><span style="color: yellow; cursor: pointer;"><?php echo $this->lang->line(LANG_SINGAPORE); ?></span></li>
                          <li class="<?php echo (isset($active) && $active == 18) ? 'active' : ''; ?>"><a href="<?php echo base_url("lott/stt"); ?>"><?php echo $this->lang->line(LANG_TOTO); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 19) ? 'active' : ''; ?>"><a href="<?php echo base_url("lott/spl"); ?>"><?php echo $this->lang->line(LANG_POOLS_4D); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 20) ? 'active' : ''; ?>"><a href="<?php echo base_url("lott/ssw"); ?>"><?php echo $this->lang->line(LANG_SWEEP); ?></a></li>
                          <li style="padding-top: 10px;" class="<?php echo (isset($active) && $active == 21) ? 'active' : ''; ?>"><span style="color: yellow; cursor: pointer;"><?php echo $this->lang->line(LANG_EAST_MALAYSIA); ?></span></li>
                          <li class="<?php echo (isset($active) && $active == 22) ? 'active' : ''; ?>"><a href="<?php echo base_url("lott/esb"); ?>"><?php echo $this->lang->line(LANG_SABAH_88); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 23) ? 'active' : ''; ?>"><a href="<?php echo base_url("lott/estc"); ?>"><?php echo $this->lang->line(LANG_STC_4D); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 24) ? 'active' : ''; ?>"><a href="<?php echo base_url("lott/ecw"); ?>"><?php echo $this->lang->line(LANG_CASH_SWEEP); ?></a></li>
                      </ul>
                  </li>
                  <!-- Admin soccer-->
                  <li class="sub-menu">
                    <a href="javascript:;" class="<?php echo (isset($active_submenu) && $active_submenu == 3) ? 'active' : ''; ?>" >
                          <i class=" icon-dashboard"></i>
                          <span><?php echo $this->lang->line(LANG_SOCCER); ?>
                          </span>
                    </a>
                    <ul class="sub">                          
                          <li class="<?php echo (isset($active) && $active == 25) ? 'active' : ''; ?>">
                            <a href="<?php echo base_url("scc/live"); ?>"><?php echo $this->lang->line(LANG_LIVE); ?></a>
                          </li>
                          <li class="<?php echo (isset($active) && $active == 26) ? 'active' : ''; ?>">
                            <a href="<?php echo base_url("scc/today"); ?>"><?php echo $this->lang->line(LANG_TODAY); ?></a>
                          </li>
                          <li class="<?php echo (isset($active) && $active == 27) ? 'active' : ''; ?>">
                            <a href="<?php echo base_url("scc/earlymarket"); ?>"><?php echo $this->lang->line(LANG_EARLY_MARKET); ?></a>
                          </li>
                          <li class="<?php echo (isset($active) && $active == 28) ? 'active' : ''; ?>">
                            <a href="<?php echo base_url("scc/livesocre"); ?>"><?php echo $this->lang->line(LANG_LIVE_SCORE); ?></a>
                          </li>
                          <li class="<?php echo (isset($active) && $active == 38) ? 'active' : ''; ?>">
                            <a href="<?php echo base_url("scc/manual_live_score"); ?>">Manual live score</a>
                          </li>
                          <li class="<?php echo (isset($active) && $active == 29) ? 'active' : ''; ?>">
                            <a href="<?php echo base_url("scc/favourite"); ?>"><?php echo $this->lang->line(LANG_FAVOURITE); ?></a>
                          </li>
                          <li class="<?php echo (isset($active) && $active == 30) ? 'active' : ''; ?>">
                            <a href="<?php echo base_url("scc/result"); ?>"><?php echo $this->lang->line(LANG_RESULT); ?></a>
                          </li>
                          <li class="<?php echo (isset($active) && $active == 35) ? 'active' : ''; ?>">
                            <a href="<?php echo base_url("scc/ladbrokes"); ?>">1X2 & DC</a>
                          </li>
                          <li class="<?php echo (isset($active) && $active == 36) ? 'active' : ''; ?>">
                            <a href="<?php echo base_url("scc/score_correct"); ?>"><?php echo $this->lang->line(LANG_FT_FH); ?></a>
                          </li>
                          <li class="<?php echo (isset($active) && $active == 37) ? 'active' : ''; ?>">
                            <a href="<?php echo base_url("scc/soccer_info"); ?>">Soccer info</a>
                          </li>
                          <li class="<?php echo (isset($active) && $active == 31) ? 'active' : ''; ?>">
                            <a href="<?php echo base_url("lott/stt"); ?>"><?php echo $this->lang->line(LANG_NUMBER); ?></a>
                          </li>
                          <li style="padding-top: 10px;" class="<?php echo (isset($active) && $active == 32) ? 'active' : ''; ?>">
                            <span style="color: yellow; cursor: pointer;"><?php echo $this->lang->line(LANG_All_Tables); ?></span>
                          </li>
                          <li class="<?php echo (isset($active) && $active == 33) ? 'active' : ''; ?>">
                            <a href="<?php echo base_url("scc/parameter_table"); ?>"><?php echo $this->lang->line(LANG_Country_Parameter); ?></a>
                          </li>
                          <li class="<?php echo (isset($active) && $active == 34) ? 'active' : ''; ?>">
                            <a href="<?php echo base_url("scc/tb_detail"); ?>"><?php echo $this->lang->line(LANG_Table); ?></a>
                          </li>
                          
                      </ul>
                  </li>
                  <!-- Admin setting-->
                  <li class="sub-menu">
                    <a href="javascript:" class="<?php echo (isset($active_submenu) && $active_submenu == 4) ? 'active' : ''; ?>" >
                        <i class=" icon-dashboard"></i>
                        <span><?php echo $this->lang->line(LANG_SETTING); ?></span>
                    </a>
                    <ul class="sub">
                      <li style="padding-top: 10px;" class="<?php echo (isset($active) && $active == 36) ? 'active' : ''; ?>">
                        <span style="color: yellow; cursor: pointer;">
                          <a href="<?php echo base_url("admin/sett_about_us"); ?>">
                            <?php echo $this->lang->line(LANG_ABOUT_US); ?>
                          </a>
                        </span>
                      </li>
                      <li style="padding-top: 10px;" class="<?php echo (isset($active) && $active == 37) ? 'active' : ''; ?>">
                        <span style="color: yellow; cursor: pointer;">
                          <a href="<?php echo base_url("admin/notification"); ?>">
                            <?php echo $this->lang->line(LANG_NOTIFICATION); ?>
                          </a>
                        </span>
                      </li>
                      <li style="padding-top: 10px;" class="<?php echo (isset($active) && $active == 38) ? 'active' : ''; ?>">
                        <span style="color: yellow; cursor: pointer;">
                          <a href="<?php echo base_url("admin/lottery_history"); ?>">
                            <?php echo $this->lang->line(LANG_4D_NUMBER_HISTORY); ?>
                          </a>
                        </span>
                      </li>
                    </ul>
                  </li>
                  <!-- Admin Live Goal Notification -->
                   <li class="sub-menu">
                    <a href="javascript:;" class="<?php echo (isset($active_submenu) && $active_submenu == 5) ? 'active' : ''; ?>" >
                        <i class=" icon-dashboard"></i>
                        <span><?php echo $this->lang->line(LANG_LIVE_GOAL_NOTIFI); ?></span>
                    </a>
                    <ul class="sub">
                      <li style="padding-top: 10px;" class="<?php echo (isset($active) && $active == 39) ? 'active' : ''; ?>">
                        <span style="color: yellow; cursor: pointer;">
                          <a href="<?php echo base_url("admin/scc/goal_prameter"); ?>">
                            <?php echo $this->lang->line(LANG_GOAL_PARAMETER); ?>
                          </a>
                        </span>
                      </li>
                    </ul>
                  </li>
                  <!-- End Admin -->
                  <li>
                      <a  href="<?php echo base_url("admin/login"); ?>">
                          <i class="icon-key"></i>
                          <span><?php echo $this->lang->line(LANG_LOGOUT); ?></span>
                      </a>
                  </li>                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->