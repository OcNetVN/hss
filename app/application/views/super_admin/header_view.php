  <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
          </div>
          <!--logo start-->
          <a href="dashboard" class="logo" >
		  <?php 
			if(isset($_SESSION['AccUserSuper']))
			{
				if( $_SESSION['AccUserSuper']['level'] == 1 || $_SESSION['AccUserSuper']['level'] == "1" )
					echo $this->lang->line(LANG_SUPER_ADMIN);
				else
				{
					if( $_SESSION['AccUserSuper']['level'] == 2 || $_SESSION['AccUserSuper']['level'] == "2" )
						echo $this->lang->line(LANG_ADMIN);
					else
					{
						if( $_SESSION['AccUserSuper']['level'] == 3 || $_SESSION['AccUserSuper']['level'] == "3" )
							echo $this->lang->line(LANG_AGENT);
						else
							echo $this->lang->line(LANG_UNKNOWN);
					}
				}
			}
			else
				echo $this->lang->line(LANG_UNKNOWN);
		  ?>
		  <span> <?php echo $this->lang->line(LANG_PANEL); ?></span></a>
          <!--logo end-->
            
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <img alt="" src="<?php echo base_url('assets/img/avatar-mini.jpg') ?>">
                          <span class="username"><?php if(isset($_SESSION["AccUserSuper"])) echo $_SESSION["AccUserSuper"]["fullname"]; ?></span>
                          <!--<b class="caret"></b>-->
                      </a>
                      <!--<ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>
                          <li><a href="#"><i class="icon-key"></i> Log Out</a></li>
                      </ul>-->
                  </li>
                  <!-- user login dropdown end -->
              </ul>
          </div>
      </header>
      <!--header end-->