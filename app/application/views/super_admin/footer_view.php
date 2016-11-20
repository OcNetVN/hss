   

    <!--footer start-->

      <footer class="site-footer">

          <div class="text-center">

              &copy; Admin panel by fcse.

              <a href="#" class="go-top">

                  <i class="icon-angle-up"></i>

              </a>

          </div>

      </footer>

      <!--footer end-->

  </section>



    <!-- node js-->

    <script src="http://netmobile.me:1810/socket.io/socket.io.js"></script>

    <script src="http://netmobile.me:1819/socket.io/socket.io.js"></script>

    <!--<script src="http://test.netmobile.me:1337/socket.io/socket.io.js"></script>

    <script src="http://localhost:1810/socket.io/socket.io.js"></script>

    <script src="http://localhost:1819/socket.io/socket.io.js"></script>

    <script src="http://localhost:1337/socket.io/socket.io.js"></script>-->

    <!--end node js-->

    <!-- js placed at the end of the document so the pages load faster -->

    <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>

    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>

    <script class="include" type="text/javascript" src="<?php echo base_url("assets/js/jquery.dcjqaccordion.2.7.js"); ?>"></script>

    <script src="<?php echo base_url("assets/js/jquery.scrollTo.min.js"); ?>"></script>

    <script src="<?php echo base_url("assets/js/jquery.nicescroll.js"); ?>" type="text/javascript"></script>

    <script src="<?php echo base_url("assets/js/respond.min.js"); ?>" ></script>

    

    <script type="text/javascript" src="<?php echo base_url("assets/js/ui_1.11.1_jquery-ui.min.js"); ?>"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />

    <script src="<?php echo base_url("assets/js/jquery.cookie.js"); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>

    

    <!--common script for all pages-->

    <script src="<?php echo base_url("assets/js/common-scripts.js"); ?>"></script>

    <!-- custom js -->

    <!--node js -->

    <script>

        //var socket_race = io.connect('http://localhost:1819');

        //var socket = io.connect('http://localhost:1810');

        //var socket_push = io.connect('http://localhost:1337');

        var socket      = io.connect('http://netmobile.me:1810');

        var socket_race = io.connect('http://netmobile.me:1819');

        //var socket_push = io.connect('http://test.netmobile.me:1337');

    </script>

    <!--end node js -->

    <?php 

        echo isset($p_custom_js) ? $p_custom_js : "";

    ?>

    <!--script editable-->

    <script src="<?php echo base_url("assets/assets/editable/bootstrap-editable.min.js"); ?>"></script>

    <!--end script editable-->

  </body>

</html>