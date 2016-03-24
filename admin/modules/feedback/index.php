<div class="col-lg-12">
	  <section class="panel">
		  <header class="panel-heading">
			  Feedback
		  </header>
		  <table class="table table-striped table-advance table-hover">
			  <thead>
			  <tr>
				  <th>#</th>
				  <th><i class="icon-user"></i> Nama</th>
				  <th><i class="icon-question-sign"></i> Judul</th>
				  <th><i class="icon-evenlope"></i> Deskripsi</th>
				  <th><i class="icon-calendar"></i> Tanggal Submit</th>
				  <th></th>
			  </tr>
			  </thead>
			  <tbody>
			  <?php 
				$sel = $act->selectSort("feedback", "`id_feedback`", "DESC") ;
				if($sel->rowCount() > 0){
					$no = 1 ;
					while($row = $sel->fetchObject()){
				?>
					<tr>
						<td><?php echo $no ;?></td>
						<td><?php 
							$sel_us = $act->selectWhere("user", "`id_user` = '".$row->id_user."'") ;
							$seld_us = $sel_us->fetchObject() ;
							if($seld_us->nama != "")
								echo $seld_us->nama ;
							else 
								echo $seld_us->username ;
						?></td>
						<td><?php echo $row->judul ;?></td>
						<td><?php echo $row->keluhan ;?></td>
						<td>
							<a href="#" class="btn btn-success btn-xs"><i class="icon-check "></i></a>
							<a href="<?php echo ADMIN.'index.php?modules=feedback&&action=delete&&id='.$row->id_feedback ;?>" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a>
						</td>
					</tr>
				<?php
					$no++ ;}
				}
			  ?>
			  </tbody>
		  </table>
	  </section>
  </div>