<?php 
	require "../lib/config.php" ;
	
	if(empty($_SESSION['oauth'])) header("location:login.php") ;
	
	require "layout/header.php" ;
	
	require "layout/sidebar.php" ;

?>
<section id="main-content">
	<section class="wrapper">
<?php 
	
	if(!empty($_GET)){
		// if there is get, olah data to show in html
		extract($_GET) ;
?>
<ol class="breadcrumb">
	<li><a href="<?php echo ADMIN."index.php" ;?>">Administrator</a></li>
	<?php 
		echo '<li class="active"><a href="'.ADMIN.'index.php?modules='.$modules.'&action=index">'.strtoupper(substr($modules, 0, 1)).substr($modules, 1).'</a></li>' ;	
		if($action == "detail"){
			echo '<li><a href="'.ADMIN.'index.php?modules='.$modules.'&action=detail">Detail</a></li>' ;
			echo '<li class="active"><a href="'.ADMIN.'index.php?modules='.$modules.'&action=detail&id='.$id.'">'.$id.'</a></li>' ;
		}elseif($action == "update"){
			echo '<li><a href="'.ADMIN.'index.php?modules='.$modules.'&action=update">Edit</a></li>' ;
			echo '<li class="active"><a href="'.ADMIN.'index.php?modules='.$modules.'&action=update&id='.$id.'">'.$id.'</a></li>' ;
		}elseif($action == "create"){
			echo '<li class="active"><a href="'.ADMIN.'index.php?modules='.$modules.'&action=create">Create</a></li>' ;
		}
	?>
</ol>
<?php 
		if(file_exists("action/".$action.".php")){
			require "action/".$action.".php" ;
		}else{
			alertGo("Maaf Modul Tidak Tersedia", "admin") ;
		}
?>
<?php
	}else{
		include "action/index.php" ;
	}
?>
	</section>
</section>
<?php 
	require "layout/footer.php" ;
?>