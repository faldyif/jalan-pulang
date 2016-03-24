<div class="col-lg-12">
  <section class="panel">
	  <header class="panel-heading">
		  Users
	  </header>
	  <table class="table table-striped table-advance table-hover">
		  <thead>
		  <tr>
			  <th>#</th>
			  <th><i class="icon-user"></i> Username</th>
			  <th><i class="icon-question-sign"></i> Nama</th>
			  <th><i class="icon-evenlope"></i> Email</th>
			  <th><i class=" icon-edit"></i> Total Submissions</th>
			  <th></th>
		  </tr>
		  </thead>
		  <tbody>
		  <?php 
			$sel = $act->selectSort("user", "`id_user`", "DESC") ;
			if($sel->rowCount() > 0){
				$nu = 1 ;
				while($row = $sel->fetchObject()){
			?>
				<tr>
				  <td><?php echo $nu ;?></td>
				  <td><a href="#"><?php echo $row->username ;?></a></td>
				  <td class="hidden-phone"><?php if($row->nama == "") echo $row->username ; else echo $row->nama ;?></td>
				  <td><?php echo $row->email ;?></td>
				  <td>
					<?php 
						echo $row->kontribusi ;
					?>
				  </td>
				  <td>
					  <button class="btn btn-success btn-xs"><i class="icon-eye-open"></i></button>
					  <a href="<?php echo ADMIN.'index.php?modules='.$modules.'&&action=delete&&id='.$row->id_user ;?>" class="btn btn-danger btn-xs"><i class="icon-trash "></i></a>
				  </td>
			  </tr>
			<?php
				$nu++ ;}
			}
		  ?>
		  </tbody>
	  </table>
  </section>
</div>