<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="x-icon" href="<?php echo ASSETS ;?>img/favicon.ico">
	<title>Administrator Jalan Pulang</title>
	
	<!-- Load CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN ;?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN ;?>assets/css/bootstrap-reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN ;?>assets/css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN ;?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN ;?>assets/css/style-responsive.css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN ;?>assets/flatlab/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN ;?>assets/flatlab/jquery-easy-pie-chart/jquery.easy-pie-chart.css">
	<!-- Load Javascript -->
</head>
<section id="container" class="">
<!-- Modals lapor -->
<div class="modal fade" id="lapor" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document"> 
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Tambahkan Titik Bahaya</h4>
			</div>
			<div class="modal-body">
				<form role="lapor" class="form-horizontal" method="POST" action="<?php echo ADMIN ;?>index.php?modules=bahaya&&action=create">
					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Nama Tempat</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="name" name="name" placeholder="Nama Tempat" required="required">
						</div>
					</div>
					<div class="form-group">
						<label for="kriminal" class="col-sm-3 control-label">Deskripsi Bahaya</label>
						<div class="col-sm-8">
							<textarea class="form-control" id="kriminal" name="crime" required="required"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="tempat" class="col-sm-3 control-label">Koordinat</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" data-dismiss="modal" id="tempat" placeholder="Tempat" required="required" disabled/>
							<input type="hidden" id="lati" name="lati" />
							<input type="hidden" id="longi" name="longi" />
						</div>
					</div>
					<button type="submit" class="btn btn-danger">Laporkan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modals aman -->
<div class="modal fade" id="aman" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document"> 
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Tambahkan Titik Bahaya</h4>
			</div>
			<div class="modal-body">
				<form role="lapor" class="form-horizontal" method="POST" action="<?php echo ADMIN ;?>index.php?modules=aman&&action=create">
					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Nama Tempat</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="name" name="name" placeholder="Nama Tempat" required="required">
						</div>
					</div>
					<div class="form-group">
						<label for="safe" class="col-sm-3 control-label">Deskripsi Keamanan</label>
						<div class="col-sm-8">
							<textarea class="form-control" id="safe" name="safe" required="required"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="tempat" class="col-sm-3 control-label">Koordinat</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" data-dismiss="modal" id="tempat2" placeholder="Tempat" required="required" disabled/>
							<input type="hidden" id="lati2" name="lati2" />
							<input type="hidden" id="longi2" name="longi2" />
						</div>
					</div>
					<button type="submit" class="btn btn-danger">Laporkan</button>
				</form>
			</div>
		</div>
	</div>
</div>

      <!--header start-->
      <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a href="#" class="logo"><img src="<?php echo ASSETS ;?>img/logo.png" height="45px" style="padding-bottom:20px"></a>
            <!--logo end-->
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="<?php echo ADMIN ;?>assets/img/default.png">
                            <span class="username">Admin</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="<?php echo ADMIN ;?>logout.php"><i class="icon-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->