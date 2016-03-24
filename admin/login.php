<?php 
	require "../lib/config.php" ;
	
	if(!empty($_SESSION['oauth'])) header("location:index.php") ;
	
	if(!empty($_POST)){
		extract($_POST) ;
		
		if(empty($user) || empty($pass)){
			// throw error
		}else{
			$pass = enc($pass) ;
			if(filter_var($user, FILTER_VALIDATE_EMAIL)){
				// check to db using email
				$sel = $act->selectWhere("admin", "`email` = '".$user."' AND `password` = '".$pass."'") ;
			}else{
				// check using username
				$sel = $act->selectWhere("admin", "`username` = '".$user."' AND `password` = '".$pass."'") ;
			}
			
			if($sel->rowCount() == 1){
				// there is a valid data, create session
				$date = date("Y-m-d") ;
				$row = $sel->fetchObject() ;
				$_SESSION['user'] = $row->username ;
				$_SESSION['pass'] = $row->password ;
				$_SESSION['oauth'] = enc($row->username.$row->password.$date."admin") ;
				
				$upd = $act->update("user", "`last_accessed` = '".$date."'", "`username` = '".$row->username."' AND `password` = '".$row->password."'") ;
				
				redirAdmin("index.php") ;
			}else{
				alertBack("Anda belum terdaftar dalam database kami!") ;
			}
		}
	}
?>
<!DOCTYPE HTML>
<html>
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
</head>
<body>
	<body class="login-body">

    <div class="container">

      <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="Username" name="user" autofocus>
            <input type="password" class="form-control" placeholder="Password" name="pass">
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>

        </div>

      </form>

    </div>
</body>
</html>