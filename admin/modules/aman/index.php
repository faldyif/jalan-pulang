<div class="col-sm-12">
<section class="panel">
	<header class="panel-heading">
		  Full Maps
	</header>
	  <div class="col-lg-12" style="height:600px;">
		  <!--<iframe width="100%" height="500px" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/view?zoom=13&center=-7.7956%2C110.3695&key=AIzaSyDl0kofoo8fgh3p-qQB7168AEK1qXJBCyM" allowfullscreen></iframe>-->
		  <input id="pac-input" class="controls" type="text" placeholder="Search Box">
		  <div id="map" data-target="#aman" data-toggle="modal"></div>
	  </div>
</section>
</div>
<div class="col-sm-12">
  <section class="panel">
	  <header class="panel-heading">
		  Data Kriminalitas
	  </header>
	  <table class="table table-striped table-advance table-hover">
		  <thead>
		  <tr>
			  <th><i class="icon-user"></i> Nama Tempat</th>
			  <th><i class="icon-question-sign"></i> Deskripsi Kriminalitas</th>
			  <th><i class="icon-location-arrow"></i> Koordinat</th>
			  <th><i class="icon-plus"></i> Disubmit Oleh</th>
			  <th></th>
		  </tr>
		  </thead>
		  <tbody>
		  <?php 
			$sel = $act->selectSort("aman", "`id_tempat`", "DESC") ;
			if($sel->rowCount() > 0){
				while($row = $sel->fetchObject()){
			?>
				<tr>
					<td><?php echo $row->nama ;?></td>
					<td><?php echo $row->keamanan ;?></td>
					<td><?php echo $row->latitude.",".$row->longitude ;?></td>
					<td>Administrator</td>
					<td>
						<a href="<?php echo ADMIN.'index.php?modules=aman&&action=delete&&id='.$row->id_tempat ;?>" class="btn btn-danger btn-xs"><i class="icon-trash "></i></a>
					</td>
				</tr>
			<?php
				}
			}
		  ?>
		  </tbody>
	  </table>
  </section>
</div>
