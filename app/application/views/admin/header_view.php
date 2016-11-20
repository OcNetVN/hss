  <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
          </div>
          <!--logo start-->
          <a href="admin_page.html" class="logo" >Admin<span> panel</span></a>
          <!--logo end-->
            
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <img alt="" src="<?php echo base_url('assets/img/avatar-mini.jpg') ?>">
                          <span class="username"><?php if(isset($_SESSION["AccUser"])) echo $_SESSION["AccUser"]["fullname"]; ?></span>
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