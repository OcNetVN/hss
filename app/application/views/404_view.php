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
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url("assets/js/html5shiv.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/respond.min.js"); ?>"></script>
    <![endif]-->
</head>

  <body class="body-404">

    <div class="container">

      <section class="error-wrapper">
          <i class="icon-404"></i>
          <h1>404</h1>
          <h2>page not found</h2>
          <p class="page-404">Something went wrong or that page doesn’t exist yet. <a href="<?php echo base_url('agent'); ?>">Return Home</a></p>
      </section>

    </div>


  </body>
</html>
