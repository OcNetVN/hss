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
                      <ul class="sub">
                          <li class="<?php echo (isset($active) && $active == 0) ? 'active' : ''; ?>"><a  href="<?php echo base_url("agent/dashboard"); ?>"><?php echo $this->lang->line(LANG_AGENT_PAGE); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 1) ? 'active' : ''; ?>"><a  href="<?php echo base_url("agent/trans"); ?>"><?php echo $this->lang->line(LANG_TRANS_HISTORY); ?></a></li>                          
                          <li class="<?php echo (isset($active) && $active == 2) ? 'active' : ''; ?>"><a  href="<?php echo base_url("agent/show_all"); ?>"><?php echo $this->lang->line(LANG_SHOW_ALL); ?></a></li>
                          <li class="<?php echo (isset($active) && $active == 3) ? 'active' : ''; ?>"><a  href="<?php echo base_url("agent/gen_statement"); ?>"><?php echo $this->lang->line(LANG_GEN_STATEMENT); ?></a></li>
                      </ul>
                  </li>
                  <li>
                      <a  href="<?php echo base_url("agent/login"); ?>">
                          <i class="icon-key"></i>
                          <span><?php echo $this->lang->line(LANG_LOGOUT); ?></span>
                      </a>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->