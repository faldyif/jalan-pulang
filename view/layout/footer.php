  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12 data-kriminalitas">
			<div class="col-sm-6">
				<h2 class="text-center">
					<span class="label label-danger">
					<?php 
						$crm = $act->selectAll("bahaya") ;
						echo $crm->rowCount() ;
					?>
					</span>
				</h2>
				<h3 class="text-center">Jumlah Titik Bahaya</h3>
				<p class="small text-center">Lebih baik bila Anda menghindari titik merah<br>Last Updated on 28 November 2015</p>
			</div>
			<div class="col-sm-6">
				<h2 class="text-center">
					<span class="label label-success">
					<?php 
						$save = $act->selectAll("aman") ;
						echo $save->rowCount() ;
					?>
					</span>
				</h2>
				<h3 class="text-center">Jumlah Titik Aman</h3>
				<p class="small text-center">Jalur yang kami sarankan untuk Anda<br>Last Updated on 23 November 2015</p>
			</div>
		</div>
        <div class="col-md-12 copyright">Copyright &copy; 2015 Burjo Rangers</div>
      </div>
    </div>
  </footer>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo ASSETS ;?>js/bootstrap.min.js"></script>
		<?php 
			if($page != "arah"){
		?> 
	<script>
		// This example adds a search box to a map, using the Google Place Autocomplete
		// feature. People can enter geographical searches. The search box will return a
		// pick list containing a mix of places and predicted search terms.

		function initAutocomplete() {
		  var map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: -7.802160285513333, lng: 110.37002563476562},
			zoom: 14,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			disableDefaultUI : true 
		  });

		 // Create the search box and link it to the UI element.
		  var input = document.getElementById('pac-input');
		  var searchBox = new google.maps.places.SearchBox(input);
		  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

		  // Bias the SearchBox results towards current map's viewport.
		  map.addListener('bounds_changed', function() {
			searchBox.setBounds(map.getBounds());
		  });
		
		//titikBahaya.setMap(map) ;		
		
		  var markers = [];
		  // [START region_getplaces]
		  // Listen for the event fired when the user selects a prediction and retrieve
		  // more details for that place.
		  searchBox.addListener('places_changed', function() {
			var places = searchBox.getPlaces();

			if (places.length == 0) {
			  return;
			}

			// Clear out the old markers.
			markers.forEach(function(marker) {
			  marker.setMap(null);
			});
			markers = [];

			// For each place, get the icon, name and location.
			var bounds = new google.maps.LatLngBounds();
			places.forEach(function(place) {
			  var icon = {
				url: place.icon,
				size: new google.maps.Size(71, 71),
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(17, 34),
				scaledSize: new google.maps.Size(25, 25)
			  };

			  // Create a marker for each place.
			  markers.push(new google.maps.Marker({
				map: map,
				icon: icon,
				title: place.name,
				position: place.geometry.location
			  }));

			  if (place.geometry.viewport) {
				// Only geocodes have viewport.
				bounds.union(place.geometry.viewport);
			  } else {
				bounds.extend(place.geometry.location);
			  }
			});
			map.fitBounds(bounds);
		  });
		
		  var iconURLPrefix = 'http://maps.google.com/mapfiles/ms/icons/' ;
		  var icons = [
			iconURLPrefix + 'red-dot.png',
			iconURLPrefix + 'green-dot.png'
		  ] ;
		  // untuk menampilkan markers
		  var titikBahaya = [
			<?php 
				$dat = $act->selectSort("bahaya", "`id_tempat`", "DESC") ;
				$count = $dat->rowCount() ;
				$i = 1 ;
				if($count >=1){
					while($dot = $dat->fetchObject()){
						if($i == $count){
							echo 'new google.maps.Marker({
								position : new google.maps.LatLng('.$dot->latitude.','.$dot->longitude.'),
								map : map,
								icon : icons[0],
								title: "'.$dot->nama.'"
								})' ;
						}else{
							echo 'new google.maps.Marker({
								position: new google.maps.LatLng('.$dot->latitude.','.$dot->longitude.'),
								map : map,
								icon : icons[0],
								title: "'.$dot->nama.'"
								}),' ;
						}
						$i++ ;
					}
				}
			?>
		];
		
		var deskripsiBahayaWindow = [
			<?php 
				$dat3 = $act->selectSort("bahaya", "`id_tempat`", "DESC") ;
				$count3 = $dat3->rowCount() ;
				$i3 = 1 ;
				if($count3 >= 1){
					while($dot3 = $dat3->fetchObject()){
						$ddat = $act->selectWhere("user", "`id_user` = '".$dot3->kontributor."'") ;
						$ddot = $ddat->fetchObject() ;
						if($i3 == $count3)
							echo 'new google.maps.InfoWindow({ content : "<h3>'.$dot3->nama.'</h3><p>'.$dot3->kriminalitas.'<br> Updated :'.$dot3->date_updated.'. By : '.$ddot->username.'</p>"})' ;
						else 
							echo 'new google.maps.InfoWindow({ content : "<h3>'.$dot3->nama.'</h3><p>'.$dot3->kriminalitas.'<br> Updated :'.$dot3->date_updated.'. By :'.$ddot->username.'</p>"}),' ;
						
						$i3++ ;
					}
				}
			?>
		] ;
		
		// loop for the show
		<?php 
			$dat2 = $act->selectSort("bahaya", "`id_tempat`", "DESC") ;
			$count2 = $dat2->rowCount() ;
			$i2 = 0 ;
				if($count2 >= 1){
					while($dot2 = $dat2->fetchObject()){
						echo 'titikBahaya['.$i2.'].addListener("click", function(){ deskripsiBahayaWindow['.$i2.'].open(map, titikBahaya['.$i2.']) }) ;' ;
						
						$i2++ ;
					}
				}
		?>
		
		var titikAman = [
			<?php 
				$sep = $act->selectAll("aman") ;
				$cnt = $sep->rowCount() ;
				$j = 1 ;
				if($count>=1){
					while($sepp = $sep->fetchObject()){
						if($j == $count){
							echo 'new google.maps.Marker({
								position : new google.maps.LatLng('.$sepp->latitude.','.$sepp->longitude.'),
								map : map,
								icon : icons[1],
								title: "'.$sepp->nama.'"
								})' ;
						}else{
							echo 'new google.maps.Marker({
								position: new google.maps.LatLng('.$sepp->latitude.','.$sepp->longitude.'),
								map : map,
								icon : icons[1],
								title: "'.$sepp->nama.'"
								}),' ;
						}
						$j++ ;
					}
				}
			?>
		] ;
		
		var deskripsiAmanWindow = [
			<?php 
				$sep2 = $act->selectAll("aman") ;
				$cnt2 = $sep2->rowCount() ;
				$j2 = 1 ;
				if($cnt2 >= 1){
					while($sepp2 = $sep2->fetchObject()){
						if($j2 == $cnt2)
							echo 'new google.maps.InfoWindow({ content : "<h3>'.$sepp2->nama.'</h3><p>'.$sepp2->keamanan.'<br> Updated :'.$sepp2->date_updated.'</p>"})' ;
						else 
							echo 'new google.maps.InfoWindow({ content : "<h3>'.$sepp2->nama.'</h3><p>'.$sepp2->keamanan.'<br> Updated :'.$sepp2->date_updated.'</p>"}),' ;
						
						$j2++ ;
					}
				}
			?>
		] ;
		
		// loop for the show
		<?php 
			$sep3 = $act->selectAll("aman") ;
			$cnt3 = $sep3->rowCount() ;
			$j3 = 0 ;
				if($cnt3 >= 1){
					while($sepp3 = $sep3->fetchObject()){
						echo 'titikAman['.$j3.'].addListener("click", function(){ deskripsiAmanWindow['.$j3.'].open(map, titikAman['.$j3.']) }) ;' ;
						
						$j3++ ;
					}
				}
		?>
		
		<?php 
			if($page == "lapor"){
		?> 
			google.maps.event.addListener(map , "click", function(event) {
				var lat = event.latLng.lat();
				var lng = event.latLng.lng();
				var tempat = document.getElementById('tempat') ;
				var lati = document.getElementById('lati') ;
				var longi = document.getElementById('longi') ;
				// populate yor box/field with lat, lng
				addMarker(event.latLng, map);
				//show("Lat=" + lat + "; Lng=" + lng);
				console.log("Lat=" + lat + "; Lng=" + lng);
				
				tempat.value = lat + ", " + lng ;
				lati.value = lat ;
				longi.value = lng ;
			});
		<?php }elseif($page == "feedback"){ ?>	
			google.maps.event.addListener(map , "click", function(event) {
				var lat = event.latLng.lat();
				var lng = event.latLng.lng();
				var tempat = document.getElementById('tempat2') ;
				var lati = document.getElementById('lati2') ;
				var longi = document.getElementById('longi2') ;
				// populate yor box/field with lat, lng
				addMarker(event.latLng, map);
				//show("Lat=" + lat + "; Lng=" + lng);
				console.log("Lat=" + lat + "; Lng=" + lng);
				
				tempat.value = lat + ", " + lng ;
				lati.value = lat ;
				longi.value = lng ;
			});
		<?php }?>
		
		  // [END region_getplaces]
		}

		function addMarker(location, map) {
		  // Add the marker at the clicked location, and add the next-available label
		  // from the array of alphabetical characters.
		  if(marker != null){
			marker.setMap(null) ;
		  }
		  var marker = new google.maps.Marker({
			position: location,
			map: map,
			animation : google.maps.Animation.DROP
		  });
		}
		
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5a_OStU1PGs61n9YQqK3RzTVKxEomG3c&libraries=places&callback=initAutocomplete" async defer></script>
		<?php } ?>	
  </body>
</html>