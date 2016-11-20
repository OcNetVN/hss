      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="active" >
                          <i class=" icon-dashboard"></i>
                          <span><?php echo $this->lang->line(LANG_HORSE_RACING); ?></span>
                      </a>
                      <?php 
                          if(isset($_SESSION['AccUserSuper']))
                          {
                            if( $_SESSION['AccUserSuper']['level'] == 1 || $_SESSION['AccUserSuper']['level'] == "1" ) //super admin
                            {
                      ?>
                                  <ul class="sub">
                                      <li class="<?php echo (isset($active) && $active == 0) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/dashboard"); ?>"><?php echo $this->lang->line(LANG_ADMIN_PAGE); ?></a></li>
                                      <li class="<?php echo (isset($active) && $active == 6) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/list_member"); ?>"><?php echo $this->lang->line(LANG_LIST_MEMBER_PAGE); ?></a></li>
                                      <li class="<?php echo (isset($active) && $active == 7) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/add_agent"); ?>"><?php echo $this->lang->line(LANG_ADD_AGENT); ?></a></li>
                                      <li class="<?php echo (isset($active) && $active == 8) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/sell_phone"); ?>"><?php echo $this->lang->line(LANG_SELL_PHONE); ?></a></li>
                                      <li class="<?php echo (isset($active) && $active == 1) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/trans"); ?>"><?php echo $this->lang->line(LANG_TRANS_HISTORY); ?></a></li>
                                      <!--<li class="<?php //echo (isset($active) && $active == 2) ? 'active' : ''; ?>"><a href="<?php //echo base_url("super_admin/add_agent"); ?>"><?php //echo $this->lang->line(LANG_ADD_AGENT); ?></a></li>-->
                                      <li style="display:none"><a href="<?php echo base_url("super_admin/add_user"); ?>"><?php echo $this->lang->line(LANG_ADD_USER); ?></a></li>
                                      <li class="<?php echo (isset($active) && $active == 3) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/show_all"); ?>"><?php echo $this->lang->line(LANG_SHOW_ALL); ?></a></li>
                                      <li class="<?php echo (isset($active) && $active == 4) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/report"); ?>"><?php echo $this->lang->line(LANG_REPORT); ?></a></li>
                                      <li class="<?php echo (isset($active) && $active == 5) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/gen_statement"); ?>"><?php echo $this->lang->line(LANG_GEN_STATEMENT); ?></a></li> 
                                      <li class="<?php echo (isset($active) && $active == 9) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/feedback_customer");?>"><?php echo $this->lang->line(LANG_FEEDBACK);?></a></li>                         
                                  </ul>
                      <?php      
                            }
            				else
            				{
            					if( $_SESSION['AccUserSuper']['level'] == 2 || $_SESSION['AccUserSuper']['level'] == "2" ) //admin
            					{
            		  ?>
                                    <ul class="sub">
                                      <li class="<?php echo (isset($active) && $active == 0) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/dashboard"); ?>"><?php echo $this->lang->line(LANG_ADMIN_PAGE); ?></a></li>
                                      <li class="<?php echo (isset($active) && $active == 1) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/trans"); ?>"><?php echo $this->lang->line(LANG_TRANS_HISTORY); ?></a></li>
                                      <li class="<?php echo (isset($active) && $active == 7) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/add_agent"); ?>"><?php echo $this->lang->line(LANG_ADD_AGENT); ?></a></li>
                                      <li class="<?php echo (isset($active) && $active == 8) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/add_user"); ?>"><?php echo $this->lang->line(LANG_ADD_USER); ?></a></li>
                                      <!--<li class="<?php echo (isset($active) && $active == 2) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/add_agent"); ?>"><?php echo $this->lang->line(LANG_ADD_AGENT); ?></a></li>-->
                                      <li style="display:none"><a href="<?php echo base_url("super_admin/add_user"); ?>"><?php echo $this->lang->line(LANG_ADD_USER); ?></a></li>
                                      <li class="<?php echo (isset($active) && $active == 3) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/show_all"); ?>"><?php echo $this->lang->line(LANG_SHOW_ALL); ?></a></li>
                                      <!--<li class="<?php echo (isset($active) && $active == 4) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/report"); ?>"><?php echo $this->lang->line(LANG_REPORT); ?></a></li>-->
                                      <!--<li class="<?php echo (isset($active) && $active == 5) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/gen_statement"); ?>"><?php echo $this->lang->line(LANG_GEN_STATEMENT); ?></a></li>-->
                                    </ul>
                      <?php			   
            					}
            					else
            					{
            						if( $_SESSION['AccUserSuper']['level'] == 3 || $_SESSION['AccUserSuper']['level'] == "3" ) //agent
            						{
				      ?>
                                          <ul class="sub">
                                              <li class="<?php echo (isset($active) && $active == 0) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/dashboard"); ?>"><?php echo $this->lang->line(LANG_LIST_MEMBER_PAGE); ?></a></li>
                                              <li class="<?php echo (isset($active) && $active == 1) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/trans"); ?>"><?php echo $this->lang->line(LANG_TRANS_HISTORY); ?></a></li>
                                              <!--<li class="<?php echo (isset($active) && $active == 2) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/add_user"); ?>"><?php echo $this->lang->line(LANG_ADD_USER); ?></a></li>-->
                                              <li class="<?php echo (isset($active) && $active == 3) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/show_all"); ?>"><?php echo $this->lang->line(LANG_SHOW_ALL); ?></a></li>
                                              <li class="<?php echo (isset($active) && $active == 5) ? 'active' : ''; ?>"><a href="<?php echo base_url("super_admin/gen_statement"); ?>"><?php echo $this->lang->line(LANG_GEN_STATEMENT); ?></a></li>                          
                                          </ul>
                      <?php
            						}
            					}
            				}
                          }
                      ?>
                      
                  </li>
                  <li>
                      <a  href="<?php echo base_url("super_admin/login"); ?>">
                          <i class="icon-key"></i>
                          <span><?php echo $this->lang->line(LANG_LOGOUT); ?></span>
                      </a>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->