<?php

if (get_post_type() == "location") {
	$postId = get_the_id();
} else {
	$postId = $settings->location;
}
$locationInfo = get_post_meta($postId);
$stateList = get_the_terms($postId, 'state_region');
$stateName = strtoupper($stateList[0]->slug);
$fullAddress = "";
if (isset($locationInfo['street_address'])  && $locationInfo['street_address'][0] !== "") {
	$fullAddress .= $locationInfo['street_address'][0] . ', ';
}
if (isset($locationInfo['street_address_2'])  && $locationInfo['street_address_2'][0] !== "") {
	$fullAddress .= $locationInfo['street_address_2'][0] . ', ';
}
if (isset($locationInfo['city'])  && $locationInfo['city'][0] !== "") {
	$fullAddress .= $locationInfo['city'][0] . ', ';
}
$fullAddress .= $stateName;
if (isset($locationInfo['zip'])  && $locationInfo['zip'][0] !== "") {
	$fullAddress .= $locationInfo['zip'][0] . '';
}
$fullAddress = str_replace("#", "", $fullAddress);
$fullAddress = str_replace(" ", "+", $fullAddress);
if (isset($locationInfo['date'])  && $locationInfo['date'][0] !== "") {
	$openingDate = strtotime($locationInfo['date'][0]);
} else {
	$openingDate = 1;
}
if (isset($locationInfo['placesid'])  && $locationInfo['placesid'][0] !== "") {
	$url = "https://maps.googleapis.com/maps/api/place/details/json?placeid=".$locationInfo['placesid'][0]."&key=AIzaSyDMY0gkCXr91WvrlF4MyPQnAW1PtdS3dBw";
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec ($ch);
	$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	$res        = json_decode($result,true);
	$rating    = $res['result']['rating'];
	$latitude = $res['result']['geometry']['location']['lat'];
	$longitude = $res['result']['geometry']['location']['lng'];

} else {
	$rating = 0;
	$latitude = false;
	$longitude = false;
}

?>


<div class="location">
	<div class="content">
		<div class="container">
			<h3 class="location_content-heading"><a href="<?php echo get_the_permalink($postId); ?>"><?php echo get_the_title($postId); ?></a></h3>
			
			<?php
			$serviceProvided = $locationInfo['service_provided'][0];

			if (isset($serviceProvided)) {
				echo '<div class="service"><h4 class="service_title">' . $serviceProvided . '</h4></div>';
			}
			?>
			
			<?php if (isset($rating) && $rating > 0) : ?>
			<br>
			<img class="google__g" src="/wp-content/themes/optimaderm/img/googleg.png"/>
			<div class="reviews__Block">
				<div class="g__text top">Google Rating</div>
				
					<div class="reviews">
						<a class="card__rating top" target="_blank" href="https://search.google.com/local/reviews?placeid=<?php if (isset($locationInfo['placesid'])) echo $locationInfo['placesid'][0]; ?>&hl=en&gl=US"><?php echo $rating; ?></a>
						<div class="Stars" style="--rating: <?php echo $rating; ?>;" aria-label="Rating of this product is <?php echo $rating; ?> out of 5."></div>
						
					</div>
				<div class="g__text">Based on <?php echo $res['result']['user_ratings_total']; ?> reviews</div>
			</div>
		<?php endif; ?>
		
			<hr>

			<div class="info">
				<div class="tele">
					<div>
						<?php if (isset($locationInfo['phone']) && $locationInfo['phone'][0] !== "") $phoneNum = preg_replace('/[^0-9]/', '', $locationInfo['phone'][0]);
						echo '<a class="phone" href="tel:' . $phoneNum . '">Phone: ' . $locationInfo['phone'][0] . '</a>'; ?>
						<?php if (isset($locationInfo['fax']) && $locationInfo['fax'][0] !== "") $faxNum = preg_replace('/[^0-9]/', '', $locationInfo['fax'][0]);
						echo '<br><a class="fax" href="tel:' . $faxNum . '">Fax: ' . $locationInfo['fax'][0] . '</a>'; ?>
					</div>
					<?php
					$ctaText = "Request Appointment";
					$target = "_self";
					if (isset($locationInfo['ctatitle'])  && $locationInfo['ctatitle'][0] !== "") {
						$ctaText = $locationInfo['ctatitle'][0];
					}
					$ctaLink = "/request-appointment/";
					$target = "_self";
					if (isset($locationInfo['ctatitle'])  && $locationInfo['ctatitle'][0] !== "") {
					$ctaText = $locationInfo['ctatitle'][0];
					}
					?>
					<p><a href="<?php echo $ctaLink; ?>" target="<?php echo $target; ?>" class="btn blue"><?php echo $ctaText; ?></a></p>
				</div>
				<hr>
				<?php $buildingName = $locationInfo['building_name'][0];

					if (isset($buildingName)) {
						echo '<p style="padding-top: 10px; margin-bottom: 0; font-weight: bold;">' . $buildingName . '</p>';
					}
					?>
				<div class="place" style="padding-top: 0;">
					
					
					<div class="address">
						<p><?php if (isset($locationInfo['street_address'])  && $locationInfo['street_address'][0] !== "") echo $locationInfo['street_address'][0] . ',<br>'; ?><?php if (isset($locationInfo['street_address_2']) && $locationInfo['street_address_2'][0] !== "") echo $locationInfo['street_address_2'][0] . '<br>'; ?><?php if (isset($locationInfo['city']) && $locationInfo['city'][0] !== "") echo $locationInfo['city'][0]; ?>, <?php echo $stateName; ?> <?php if (isset($locationInfo['zip']) && $locationInfo['zip'][0] !== "") echo $locationInfo['zip'][0]; ?>

						<div class="btns">
							<?php
							$ctaLink = "/contact-us/";
							$target = "_self";
							if (isset($locationInfo['ctatitle'])  && $locationInfo['ctatitle'][0] !== "") {
								$ctaText = $locationInfo['ctatitle'][0];
							}
							if (isset($locationInfo['ctalink'])  && $locationInfo['ctalink'][0] !== "") {
								$ctaLink = $locationInfo['ctalink'][0];
								$target = "_blank";
							}
							?>
							<p><a href="https://www.google.com/maps?saddr=My+Location&daddr=<?php echo $fullAddress; ?>" target="_blank" class="btn">Get Directions</a></p>
						</div>
						</p>
					</div>

					<?php if ($openingDate !== 1 && $openingDate > time()) { ?>
						<div class="hours">
							<p><b>Opening: <?php echo date('F j', $openingDate); ?></b></p>
							<?php if (isset($locationInfo['teaser']) && $locationInfo['teaser'][0] !== "") { ?>
								<br>
								<p>Hours:<br><?php if (isset($locationInfo['teaser'])) echo $locationInfo['teaser'][0]; ?></p>
							<?php } ?>
						</div>
					<?php } else if (isset($locationInfo['teaser']) && $locationInfo['teaser'][0] !== "") { ?>
						<div class="hours">
							<p>Hours:<br><?php if (isset($locationInfo['teaser'])) echo $locationInfo['teaser'][0]; ?></p>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class="map-container">
	    <div class="placeDiv">
			<div class="placecard__container">

				<div class="placecard__left">
					<p class="placecard__business-name"><strong><?php if (isset($locationInfo['building_name'])) echo $locationInfo['building_name'][0]; ?></strong></p>
					<p class="placecard__info"><?php if (isset($locationInfo['street_address'])  && $locationInfo['street_address'][0] !== "") echo $locationInfo['street_address'][0] . ', '; ?><?php if (isset($locationInfo['street_address_2']) && $locationInfo['street_address_2'][0] !== "") echo $locationInfo['street_address_2'][0] . '  '; ?><?php if (isset($locationInfo['city']) && $locationInfo['city'][0] !== "") echo $locationInfo['city'][0]; ?>, <?php echo $stateName; ?> <?php if (isset($locationInfo['zip']) && $locationInfo['zip'][0] !== "") echo $locationInfo['zip'][0]; ?></p>
					<?php if (isset($rating) && $rating > 0) { ?>
						
					<div class="reviews">
					<a class="card__rating" target="_blank" href="https://search.google.com/local/reviews?placeid=<?php if (isset($locationInfo['placesid'])) echo $locationInfo['placesid'][0]; ?>&hl=en&gl=US"><?php echo $rating; ?></a>
					<div class="Stars2" style="--rating: <?php echo $rating; ?>;" aria-label="Rating of this product is <?php echo $rating; ?> out of 5."></div>
							
					


						<!-- <span>(49 Reviews)</span> -->
					
					 <a target="_blank" href="https://search.google.com/local/reviews?placeid=<?php if (isset($locationInfo['placesid'])) echo $locationInfo['placesid'][0]; ?>&hl=en&gl=US"><?php echo $res['result']['user_ratings_total']; ?> reviews</a>
					</div>
					<?php } ?>
					<a class="placecard__view-large" target="_blank" href="<?php echo $res['result']['url']; ?>" id="A_41">View larger map</a>
				</div> <!-- placecard__left -->
				
				<div class="placecard__right">
					<a href="https://www.google.com/maps?saddr=My+Location&daddr=<?php echo $fullAddress; ?>" target="_blank" class="placecard__direction-link" id="A_9">
						<div class="placecard__direction-icon"></div>
						Directions
					</a>
					
				</div> <!-- placecard__right -->

			</div> <!-- placecard__container -->
		</div> <!-- placeDiv -->
		
	</div> <!-- map-container -->
	<div id="map" class="initmap"></div>
</div>
<?php 
$addyArray[] = array("title"=>get_the_title($postId), "address"=>$fullAddress, "url"=>get_the_permalink($postId), "pagecid"=>$postId, "buildingname"=>$locationInfo['building_name'][0],"lat"=>$latitude, "lng"=>$longitude, "opening"=>$openingDate, "city"=>$locationInfo['city'][0], "state"=>$stateName, "stateabbreviation"=>$stateName, "zip"=>$locationInfo['zip'][0]); 
$allLocations = json_encode( $addyArray );?>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMY0gkCXr91WvrlF4MyPQnAW1PtdS3dBw"></script>
<script type="text/javascript">
	var currentdate = new Date(); 
	var d = Date.parse(currentdate);
	currentDatestamp = d/1000;

	markerArray1 = <?php echo $allLocations; ?>;
	currentPage = 204;
	currentatmPage = 0;

	<?php
	if (isset($locationInfo['map_icon'])  && $locationInfo['map_icon'][0] !== "") { ?>
	mapIconVal = <?php echo $locationInfo['map_icon'][0]; ?>;
	<?php } else { ?>
		mapIconVal = 1;
		<?php } ?>
	if (mapIconVal == 1){ 
		markerImg = 'icon-optima.png';
		markerColor = '#32a1c1';
	} else if (mapIconVal == 2){ 
		markerImg = 'icon-issc.png';
		markerColor = '#cd1041'
	} else if (mapIconVal == 3){ 
		markerImg = 'icon-dci.png';
		markerColor = '#007367'
	} else if (mapIconVal == 4){ 
		markerImg = 'icon-advanced.png';
		markerColor = '#d0ad73'
	};	

	iconBase = '//'+window.location.hostname+'/wp-content/themes/optimaderm/img/';


	//var markers = markerArray1;
	window.onload = function () {
		LoadMap(markerArray1);
	}

	

	var marker;
	var gmarkers = [];
	function LoadMap(markers) {
		// console.log(markers);
		var mapOptions = {
			center: new google.maps.LatLng({lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?>}),
			zoom: 18,
			mapTypeControl: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			styles: [{"featureType":"administrative","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"administrative","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#f2f2f2"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text.fill","stylers":[{"visibility":"on"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"on"},{"saturation":"-100"},{"lightness":"27"},{"gamma":"1.72"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"saturation":"0"},{"color":"#a3d9ec"}]},{"featureType":"water","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]}]
		};
		var geocoder;
		var map = new google.maps.Map(document.getElementById("map"), mapOptions);

		geocoder = new google.maps.Geocoder();
		var bounds = new google.maps.LatLngBounds();

		

		//Create and open InfoWindow.
		var infoWindow = new google.maps.InfoWindow();

	   i = 0;
					while (i < markers.length) {
						var data = markers[i];
						var addressname = markers[i]['title'];
						var buildingname = markers[i]['buildingname'];
						var addy = markers[i]['address'];
						var pagecid = markers[i]['pagecid'];
						var pageurl = markers[i]['url'];
						var atmcheck = markers[i]['atm'];
						var lat = markers[i]['lat'];
						var lng = markers[i]['lng'];
						var opening = markers[i]['opening'];
					
/*
						if (markers[i]['pagecid'] == currentPage){
							alert(markers[i]['title']);
							map.setZoom(18);
						}
*/
						plotMarker(i,data, addressname, addy, pagecid, pageurl, atmcheck, buildingname, lat, lng, opening);
						i++;
						//var myLatlng = new google.maps.LatLng(data.lat, data.lng);

					}
					
					// map.fitBounds(bounds);

					function plotMarker(i, datarr, addressnamerr, addyrr, cid, url, atm, buildingname, lat, lng, opening){
// 				        console.log(datarr);
						if (lat !== "" && lng !== ""){
							latlng = new google.maps.LatLng(lat, lng);
							currentPage = parseInt(currentPage);
							cid = parseInt(cid);
							
							var icon = {
								url: iconBase + '' + markerImg,
								scaledSize: new google.maps.Size(40, 52), // scaled size
								origin: new google.maps.Point(0,0), // origin
								anchor: new google.maps.Point(0, 0), // anchor
								
								
							};
							

							var marker = new google.maps.Marker({
								position: latlng,
								map: map,
								title: addressname,
								pageurl: url,
								description: addyrr,
								atmcheck: atm,
								addresscheck: datarr.address,
								icon: icon,
								label: {
									color: markerColor,
									fontWeight: 'normal',
									text: buildingname,
									fontSize: '14px',
									className: 'marker-position',
								},
								
							});

							
							bounds.extend(marker.position);
							// Resize stuff...
								google.maps.event.addDomListener(window, "resize", function() {
								   var center = map.getCenter();
								   google.maps.event.trigger(map, "resize");
								   map.setCenter(center);
								});
							gmarkers.push(marker);
							(function (marker, datar) {
								google.maps.event.addListener(marker, "click", function (e) {
									if (marker['atmcheck'] == "1"){
										// window.location.href = 'https://www.google.com/maps/dir/Current+Location/'+marker['addresscheck'];
									} else {
										 window.location.href = marker['pageurl'];
									}
								});
							})(marker, data);
						} 
						
						else {}
					}
					

	}


</script>