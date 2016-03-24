<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Web penunjuk jalan Anda untuk mencapai tujuan dengan aman dan nyaman">
	<meta name="author" content="Burjo Rangers">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="shortcut icon" type="x-icon" href="<?php echo ASSETS ;?>img/favicon.ico">
	<title>Jalan Pulang</title>

	<!-- Bootstrap -->
	<link href="<?php echo ASSETS ;?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo ASSETS ;?>css/jalanpulang.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
	<script src="<?php echo ASSETS ;?>js/loader.js"></script>
</head>
<body>
<!-- Preloader -->
  <div class="se-pre-con"></div>
  
<?php include "view/includes/modals.php" ;?>
<header>
  <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo BASEPATH ;?>"><img src="<?php echo ASSETS ;?>img/logo.png" height="35px"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
		<?php if(empty($_SESSION['auth'])){?>
        <li><a href="#"><strong>Hai, Tamu</strong></a></li>
        <li><a href="#!" data-toggle="modal" data-target="#about">Tentang</a></li>
        <li><a href="<?php echo BASEPATH ;?>arah">Arah <small>beta</small></a></li>
        <li><a href="#!" data-toggle="modal" data-target="#daftar">Daftar</a></li>
        <li><a href="#!" data-toggle="modal" data-target="#masuk">Masuk</a></li>
		<?php }else{
			$pro_us = $_SESSION['user'] ;
			$pro_pw = $_SESSION['pass'] ;
			$pro = $act->selectWhere("user", "`username` = '$pro_us' AND `password` = '$pro_pw'") ;
			$pro_disp = $pro->fetchObject() ;
		?>
        <li><a href="#"><strong>Hai, <?php echo $pro_disp->username ;?></strong></a></li>
        <li><a href="#!" data-toggle="modal" data-target="#about">Tentang</a></li>
        <li><a href="<?php echo BASEPATH ;?>arah">Arah <small>beta</small></a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Akun Saya<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!--<li><a href="<?php echo BASEPATH."profile/".$pro_disp->id_user ;?>">Profil</a></li>-->
            <li><a href="<?php echo BASEPATH ;?>lapor">Lapor Bahaya!</a></li>
            <li><a href="<?php echo BASEPATH ;?>feedback">Berikan Masukan</a></li>
            <li><a href="<?php echo BASEPATH ;?>logout">Keluar</a></li>
          </ul>
		</li>
		<?php } ?>
      </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>