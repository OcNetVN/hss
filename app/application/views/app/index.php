<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keyword" content="">
        <link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon.png"); ?>">

        <title><?php echo (isset($title) ? $title : ""); ?></title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/bootstrap-reset.css"); ?>" rel="stylesheet">
        <!--external css-->
        <link href="<?php echo base_url("assets/assets/font-awesome/css/font-awesome.css"); ?>" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url("assets/css/style.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/style-responsive.css"); ?>" rel="stylesheet" />

        <!-- css js -->
        <?php 
            echo isset($p_custom_css) ? $p_custom_css : "";
        ?>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url("assets/js/html5shiv.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/respond.min.js"); ?>"></script>
        <![endif]-->
    </head>

    <body class="login-body">

        <div id="content">    
            <div style="float: right;margin-top: 25px;margin-right: 50px;">
                <select id="selLang">
                    <option value ="1">English</option>
                    <option value ="0">Chinese</option>
                </select>
            </div>
            <div style="text-align: left;margin-left: 50px;margin-top: 25px;">
                <img src="<?php echo base_url('assets/img/app/btn-Hore-Large.png') ?>" onclick="GotoHorse()" border="0" width="200" height="200" alt="btn-Hore-Large.png (80,240 bytes)">

            </div>
            <div style="text-align: center;">
                <img src="<?php echo base_url('assets/img/app/btn-Lottery-Large.png') ?>" onclick="GotoLottery()"  border="0" width="200" height="200" alt="btn-Lottery-Large.png (142,365 bytes)">

            </div>
            <div style="text-align: right;margin-right: 50px;">
                <img src="<?php echo base_url('assets/img/app/btn-Soccer-X-Large.png') ?>" onclick="GotoSoccer()" border="0" width="200" height="200" alt="btn-Soccer-X-Large.png (200,066 bytes)">
            </div>
        </div>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>

        <!-- custom js -->
        <?php 
            echo isset($p_custom_js) ? $p_custom_js : "";
        ?>
         <script src="http://netmobile.me:1810/socket.io/socket.io.js"></script>
         <script src="http://netmobile.me:1819/socket.io/socket.io.js"></script>
        
        <script>     
          var socket = io.connect('http://netmobile.me:1810');     
  
          var socket_race = io.connect('http://netmobile.me:1819');     
          function GotoSoccer()
          {
                $.ajax({
                type: "GET",
                url: '../app/home_controller/soccer_main',
                data: {lang:$("#selLang").val() },
                success: function(data){                   
                    $("#content").html(data);
                }
            });
          }
          function GotoHorse()
          {
             //window.location.href = "../app/horse/horse_info";
                $.ajax({
                type: "GET",
                url: '../app/home_controller/horse_info',
                data: {lang:$("#selLang").val() },
                success: function(data){                   
                    $("#content").html(data);
                }
            });
          }
          function GotoLottery()
          {
                $.ajax({
                type: "GET",
                url: '../app/home_controller/lottry',
                data: {lang:$("#selLang").val() },
                success: function(data){                   
                    $("#content").html(data);
                }
            });
          }
        </script>
    </body>
</html>

