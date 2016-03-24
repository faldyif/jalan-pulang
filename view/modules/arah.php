    <input id="origin-input" class="controls" type="text"
        placeholder="Enter an origin location">

    <input id="destination-input" class="controls" type="text"
        placeholder="Enter a destination location">

    <div id="mode-selector" class="controls">
      <input type="radio" name="type" id="changemode-walking" checked="checked">
      <label for="changemode-walking">Walking</label>

      <input type="radio" name="type" id="changemode-transit">
      <label for="changemode-transit">Transit</label>

      <input type="radio" name="type" id="changemode-driving">
      <label for="changemode-driving">Driving</label>
    </div>

    <div id="map"></div>
	
	<script type="text/javascript">
		function initMap() {
		  var origin_place_id = null;
		  var destination_place_id = null;
		  var travel_mode = google.maps.TravelMode.WALKING;
		  var map = new google.maps.Map(document.getElementById('map'), {
			mapTypeControl: false,
			center: {lat: -7.802160285513333, lng: 110.37002563476562},
			zoom: 14,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			disableDefaultUI : true 
		  });
		  var directionsService = new google.maps.DirectionsService;
		  var directionsDisplay = new google.maps.DirectionsRenderer;
		  directionsDisplay.setMap(map);

		  var origin_input = document.getElementById('origin-input');
		  var destination_input = document.getElementById('destination-input');
		  var modes = document.getElementById('mode-selector');

		  map.controls[google.maps.ControlPosition.TOP_LEFT].push(origin_input);
		  map.controls[google.maps.ControlPosition.TOP_LEFT].push(destination_input);
		  map.controls[google.maps.ControlPosition.TOP_LEFT].push(modes);

		  var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
		  origin_autocomplete.bindTo('bounds', map);
		  var destination_autocomplete =
			  new google.maps.places.Autocomplete(destination_input);
		  destination_autocomplete.bindTo('bounds', map);

		  // Sets a listener on a radio button to change the filter type on Places
		  // Autocomplete.
		  function setupClickListener(id, mode) {
			var radioButton = document.getElementById(id);
			radioButton.addEventListener('click', function() {
			  travel_mode = mode;
			});
		  }
		  setupClickListener('changemode-walking', google.maps.TravelMode.WALKING);
		  setupClickListener('changemode-transit', google.maps.TravelMode.TRANSIT);
		  setupClickListener('changemode-driving', google.maps.TravelMode.DRIVING);

		  function expandViewportToFitPlace(map, place) {
			if (place.geometry.viewport) {
			  map.fitBounds(place.geometry.viewport);
			} else {
			  map.setCenter(place.geometry.location);
			  map.setZoom(17);
			}
		  }

		  origin_autocomplete.addListener('place_changed', function() {
			var place = origin_autocomplete.getPlace();
			if (!place.geometry) {
			  window.alert("Autocomplete's returned place contains no geometry");
			  return;
			}
			expandViewportToFitPlace(map, place);

			// If the place has a geometry, store its place ID and route if we have
			// the other place ID
			origin_place_id = place.place_id;
			route(origin_place_id, destination_place_id, travel_mode,
				  directionsService, directionsDisplay);
		  });

		  destination_autocomplete.addListener('place_changed', function() {
			var place = destination_autocomplete.getPlace();
			if (!place.geometry) {
			  window.alert("Autocomplete's returned place contains no geometry");
			  return;
			}
			expandViewportToFitPlace(map, place);

			// If the place has a geometry, store its place ID and route if we have
			// the other place ID
			destination_place_id = place.place_id;
			route(origin_place_id, destination_place_id, travel_mode,
				  directionsService, directionsDisplay);
		  });

		  function route(origin_place_id, destination_place_id, travel_mode,
						 directionsService, directionsDisplay) {
			if (!origin_place_id || !destination_place_id) {
			  return;
			}
			directionsService.route({
			  origin: {'placeId': origin_place_id},
			  destination: {'placeId': destination_place_id},
			  travelMode: travel_mode
			}, function(response, status) {
			  if (status === google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
			  } else {
				window.alert('Directions request failed due to ' + status);
			  }
			});
		  }
		  
		  
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
		  
		}
	</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5a_OStU1PGs61n9YQqK3RzTVKxEomG3c&libraries=places&callback=initMap" async defer></script>