<?php 
	if(empty($_SESSION['auth'])){
?>
<!-- Daftar Modal -->
  <div class="modal fade" id="daftar" tabindex="-1" role="dialog" aria-labelledby="daftar">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Daftar</h4>
        </div>
        <div class="modal-body">
          <form role="daftar" action="<?php echo BASEPATH ;?>signup" method="POST">
            <div class="form-group">
              <label for="nama">Nama:</label>
              <input type="text" class="form-control" id="nama-daftar" name="nama" required="required">
            </div>
			<div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email-daftar" name="email" required="required">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="password-daftar" name="password" required="required">
            </div>
            <div class="form-group">
              <label for="email">Username:</label>
              <input type="text" class="form-control" id="username-daftar" name="user" required="required">
            </div>
			<div class="form-group">
				<img src="<?php echo "view/includes/captcha.php?date=".date("YmdHis") ;?>">
				<input type="text" name="captcha" placeholder="Type Code Above" class="form-control" required="required" />
			</div>
            <button type="submit" class="btn btn-default">Daftar!</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Masuk Modal -->
  <div class="modal fade" id="masuk" tabindex="-1" role="dialog" aria-labelledby="masuk">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Masuk</h4>
        </div>
        <div class="modal-body">
          <form role="masuk" action="<?php echo BASEPATH ;?>login" method="POST">
            <div class="form-group">
              <label for="email">Username / Email:</label>
              <input type="text" class="form-control" id="email-masuk" name="user" required="required">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="password-masuk" name="pass" required="required">
            </div>
            <button type="submit" class="btn btn-default">Masuk</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php }?>
  <!-- About Modal -->
  <div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="about">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">About</h4>
        </div>
        <div class="modal-body">
          <h4>Mengapa Jalan Pulang?</h4>
		  <p class="text-justify">Di jogja banyak  mahasiswa-mahasiswa yang berasal dari luar yogyakarta. Banyak juga dari antara mereka aktif dalam perkuliahan maupun organisasi sehingga sering sekali mereka pulang malam bahkan sampai larut malam, juga kebanyakan dari mereka masih belum tahu kondisi sekitar lingkungannya Sehingga mereka mungkin mempunyai rasa cemas akan ancaman bahaya-bahaya yang ada di sekitar wilayah itu. </p>
          <h4>Bagaimana Cara Kerjanya?</h4>
		  <p class="text-justify">Menyajikan data-data tentang kondisi kriminalitas di lingkungan sekitarnya dalam bentuk titik-titk koordinat berwarna merah, titik-titik ini tidak kami rekomendasikan untuk dilalui terutama pada malam hari. Selain itu kami juga menyajikan titik-titik aman sebagai rekomendasi untuk dilalui apabila mengalami pulang malam dengan beberapa alasan seperti terdapat kantor polisi, tempat yang ramai, pos kamling.</p>
		  <p class="text-justify">Data yang kami dapatkan juga berasal dari masyarakat dan bekerja sama dengan pihak kepolisian. Masyarakat dapat memberikan kami laporan titik-titik mana saja yang tidak mereka rekomendasikan untuk dilalui para mahasiswi, sedangkan data-data titik aman berasal dari sumber terpercaya untuk menghindari adanya manipulasi data di dalamnya.</p>
		  <p class="text-justify">Namun masyarakat juga bisa memberikan kami masukan seperti merevisi titik bahaya, merekomendasikan titik aman (yang nantinya akan diklarifikasi), dan memberikan masukan kepada pengembang sebagai bentuk umpan balik.</p>
        </div>
      </div>
    </div>
  </div>
  
<?php 
	if($page == "lapor"){
?>
<!-- Modals lapor -->
<div class="modal fade" id="lapor" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document"> 
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Tambahkan Titik Bahaya</h4>
			</div>
			<div class="modal-body">
				<form role="lapor" class="form-horizontal" method="POST" action="<?php echo BASEPATH ;?>lapor">
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
<?php }?>
<!-- Modal Feedback -->
<div class="modal fade" id="feedback" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="feedbackLabel">Berikan Kami Masukan</h4>
			</div>
			<div class="modal-body">
				<form role="feedback" class="form-horizontal" method="POST" action="<?php echo BASEPATH ;?>feedback">
					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Judul Masukan</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="name" name="judul" placeholder="Judul Masukan/Keluhan Anda" required="required">
						</div>
					</div>
					<div class="form-group">
						<label for="kriminal" class="col-sm-3 control-label">Deskripsi Masukan</label>
						<div class="col-sm-8">
							<textarea class="form-control" id="kriminal" name="desc" rows="10" required="required"></textarea>
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
					<div class="form-group">
						<label class="col-sm-3 control-label" for="captcha">
							<img src="<?php echo "view/includes/captcha.php?date=".date("YmdHis") ;?>">
						</label>
						<div class="col-sm-8">
							<input type="text" name="captcha" placeholder="Type Code Above" class="form-control" required="required" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4 pull-right">
							<button type="submit" class="btn btn-info">Beri Masukan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>