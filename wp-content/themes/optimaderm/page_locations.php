<?php
/*
* Template Name: Locations
*/
 get_header(); 
 
 function convertState($name) {
	$states = array(
		array('name'=>'Alabama', 'abbr'=>'AL'),
		array('name'=>'Alaska', 'abbr'=>'AK'),
		array('name'=>'Arizona', 'abbr'=>'AZ'),
		array('name'=>'Arkansas', 'abbr'=>'AR'),
		array('name'=>'California', 'abbr'=>'CA'),
		array('name'=>'Colorado', 'abbr'=>'CO'),
		array('name'=>'Connecticut', 'abbr'=>'CT'),
		array('name'=>'Delaware', 'abbr'=>'DE'),
		array('name'=>'Florida', 'abbr'=>'FL'),
		array('name'=>'Georgia', 'abbr'=>'GA'),
		array('name'=>'Hawaii', 'abbr'=>'HI'),
		array('name'=>'Idaho', 'abbr'=>'ID'),
		array('name'=>'Illinois', 'abbr'=>'IL'),
		array('name'=>'Indiana', 'abbr'=>'IN'),
		array('name'=>'Iowa', 'abbr'=>'IA'),
		array('name'=>'Kansas', 'abbr'=>'KS'),
		array('name'=>'Kentucky', 'abbr'=>'KY'),
		array('name'=>'Louisiana', 'abbr'=>'LA'),
		array('name'=>'Maine', 'abbr'=>'ME'),
		array('name'=>'Maryland', 'abbr'=>'MD'),
		array('name'=>'Massachusetts', 'abbr'=>'MA'),
		array('name'=>'Michigan', 'abbr'=>'MI'),
		array('name'=>'Minnesota', 'abbr'=>'MN'),
		array('name'=>'Mississippi', 'abbr'=>'MS'),
		array('name'=>'Missouri', 'abbr'=>'MO'),
		array('name'=>'Montana', 'abbr'=>'MT'),
		array('name'=>'Nebraska', 'abbr'=>'NE'),
		array('name'=>'Nevada', 'abbr'=>'NV'),
		array('name'=>'New Hampshire', 'abbr'=>'NH'),
		array('name'=>'New Jersey', 'abbr'=>'NJ'),
		array('name'=>'New Mexico', 'abbr'=>'NM'),
		array('name'=>'New York', 'abbr'=>'NY'),
		array('name'=>'North Carolina', 'abbr'=>'NC'),
		array('name'=>'North Dakota', 'abbr'=>'ND'),
		array('name'=>'Ohio', 'abbr'=>'OH'),
		array('name'=>'Oklahoma', 'abbr'=>'OK'),
		array('name'=>'Oregon', 'abbr'=>'OR'),
		array('name'=>'Pennsylvania', 'abbr'=>'PA'),
		array('name'=>'Rhode Island', 'abbr'=>'RI'),
		array('name'=>'South Carolina', 'abbr'=>'SC'),
		array('name'=>'South Dakota', 'abbr'=>'SD'),
		array('name'=>'Tennessee', 'abbr'=>'TN'),
		array('name'=>'Texas', 'abbr'=>'TX'),
		array('name'=>'Utah', 'abbr'=>'UT'),
		array('name'=>'Vermont', 'abbr'=>'VT'),
		array('name'=>'Virginia', 'abbr'=>'VA'),
		array('name'=>'Washington', 'abbr'=>'WA'),
		array('name'=>'West Virginia', 'abbr'=>'WV'),
		array('name'=>'Wisconsin', 'abbr'=>'WI'),
		array('name'=>'Wyoming', 'abbr'=>'WY'),
		array('name'=>'Virgin Islands', 'abbr'=>'V.I.'),
		array('name'=>'Guam', 'abbr'=>'GU'),
		array('name'=>'Puerto Rico', 'abbr'=>'PR')
	);
 
	$return = false;   
	$strlen = strlen($name);
 
	foreach ($states as $state) :
	   if ($strlen < 2) {
		  return false;
	   } else if ($strlen == 2) {
		  if (strtolower($state['abbr']) == strtolower($name)) {
			 $return = $state['name'];
			 break;
		  }   
	   } else {
		  if (strtolower($state['name']) == strtolower($name)) {
			 $return = strtoupper($state['abbr']);
			 break;
		  }         
	   }
	endforeach;
	
	return $return;
}

$servicesTerms = get_terms( array(
	'taxonomy' => 'specialty',
	'hide_empty' => false,
));

$args = array(  
 'post_type' => 'provider',
 'post_status' => 'publish',
 'posts_per_page' => 999, 
 'orderby' => 'title', 
 'order' => 'ASC', 
);
$providerQuery = new WP_Query($args);

$locationsArgs = array(  
	'post_type' => 'location',
	'post_status' => 'publish',
	'posts_per_page' => 999, 
	'orderby' => 'title', 
	'order' => 'ASC', 
);
$locationsLoop = new WP_Query( $locationsArgs ); 

// print_r($locationsLoop);

$stateTerms = get_terms([
	'taxonomy' => 'state_region',
	'hide_empty' => false,
]);
?>
<?php
while ( have_posts() ) : the_post(); ?>
	<div class="entry-content-page interior" id="main_content">
		<div class="container">
			<div id="top_hero">
				<div class="container">
					<h1>Our Locations</h1>
				</div>
			</div>
			<div id="location_filters">
				<p>Filter by:</p>
				<div class="select">
					<select name="services" id="services">
						<option value="0">Specialty</option>
						<?php foreach ($servicesTerms as $service){
							echo '<option value="'.$service->term_id.'">'.$service->name.'</option>';
						} ?>
					</select>
				</div>
				<div class="select">
					<select name="provider" id="provider">
						<option value="0">Provider</option>
						 <?php if ($providerQuery->have_posts() ) : while ( $providerQuery->have_posts() ) : $providerQuery->the_post(); 
						 $providerinfo = get_post_meta(get_the_id()); 
						 $servicesTermList = wp_get_post_terms( get_the_id(), 'specialty', array( 'fields' => 'all' ) );
						 $servicesIdArray = array(0);
						 if(count($servicesTermList > 0)){
							 foreach($servicesTermList as $servicesTerm){
								 array_push($servicesIdArray,$servicesTerm->term_id);
							 }
						 }
						 $servicesTermString = implode(",", $servicesIdArray);
						 $providerArray[] = array("title"=>get_the_title(get_the_id()), "url"=>get_the_permalink(get_the_id()), "pagecid"=>get_the_id(), "specialties"=>$servicesTermString,"location"=>"0,".$providerinfo['locations'][0]); 
						 ?>
							<option value="<?php echo get_the_id(); ?>"><?php echo get_the_title(); ?></option>
						<?php endwhile; wp_reset_query(); endif; ?>
					</select>
				</div>
			</div>
			<div class="locations_holder">
				<div class="legend">
					<p><img src="/wp-content/themes/optimaderm/img/mapmarkerblue.png" alt="Location Coming Soon"> <span>OPEN</span></p>
					<p><img src="/wp-content/themes/optimaderm/img/mapmarkerred.png" alt="Location Open"> <span>COMING SOON</span></p>
				</div>
				<div class="locations_list">
					<div id="national_list">
						<p class="title">Viewing All by State: <a class="back"><i class="fas fa-arrow-left"></i> Back</a></p>
						<div class="list">
							<?php foreach($stateTerms as $stateTerm){
								echo '<a data-stateid="'.$stateTerm->term_id.'" class="statename">'.$stateTerm->name.'</a>';
							} ?>
							<?php if ($locationsLoop->have_posts() ) : while ( $locationsLoop->have_posts() ) : $locationsLoop->the_post(); $locationInfo = get_post_meta( get_the_id() ); 
							$stateList = get_the_terms( get_the_id(), 'state_region' );
							$stateName = $stateList[0]->name;
							$fullAddress = "";
							if ( isset ( $locationInfo['street_address'] )  && $locationInfo['street_address'][0] !== ""){
								$fullAddress .= $locationInfo['street_address'][0].', ';
							}
							if ( isset ( $locationInfo['street_address_2'] )  && $locationInfo['street_address_2'][0] !== ""){
								$fullAddress .= $locationInfo['street_address_2'][0].', ';
							}
							if ( isset ( $locationInfo['city'] )  && $locationInfo['city'][0] !== ""){
								$fullAddress .= $locationInfo['city'][0].', ';
							}
							$fullAddress .= convertState($stateName);
							if ( isset ( $locationInfo['zip'] )  && $locationInfo['zip'][0] !== ""){
								$fullAddress .= $locationInfo['zip'][0].'';
							}
							if ( isset ( $locationInfo['date'] )  && $locationInfo['date'][0] !== ""){
								$openingDate = strtotime($locationInfo['date'][0]);
							} else {
								$openingDate = 1;
							}
							$addyArray[] = array("title"=>get_the_title(get_the_id()), "address"=>$fullAddress, "url"=>get_the_permalink(get_the_id()), "pagecid"=>get_the_id(),  "lat"=>$locationInfo['lat'][0], "lng"=>$locationInfo['lon'][0], "opening"=>$openingDate, "city"=>$locationInfo['city'][0], "state"=>$stateName, "stateabbreviation"=>convertState($stateName), "zip"=>$locationInfo['zip'][0]); 
							$fullAddress = str_replace("#", "", $fullAddress);
							$fullAddress = str_replace(" ", "+", $fullAddress);
							?>
								<div class="individual" data-stateid="<?php echo $stateList[0]->term_id; ?>" data-locationid="<?php echo get_the_id(); ?>">
									<h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
									<?php if (isset($locationInfo['building_name'] )  && $locationInfo['building_name'][0] !== ""){ 
										echo '<h4>'.$locationInfo['building_name'][0].'</h4>';
									} ?>
									<div class="info">
										<div class="address">
											<p><?php if ( isset ( $locationInfo['street_address'] )  && $locationInfo['street_address'][0] !== "") echo $locationInfo['street_address'][0].',<br>'; ?><?php if ( isset ( $locationInfo['street_address_2'] ) && $locationInfo['street_address_2'][0] !== "" ) echo $locationInfo['street_address_2'][0].',<br>'; ?><?php if ( isset ( $locationInfo['city'] ) && $locationInfo['city'][0] !== "" ) echo $locationInfo['city'][0]; ?>, <?php echo convertState($stateName); ?> <?php if ( isset ( $locationInfo['zip'] ) && $locationInfo['zip'][0] !== "" ) echo $locationInfo['zip'][0]; ?></p>
										</div>
										<?php if($openingDate !== 1 && $openingDate > time()){ ?>
											<div class="hours">
												<p><b>Opening: <?php echo date('F j', $openingDate); ?></b></p>
												<?php  if ( isset ( $locationInfo['teaser']) && $locationInfo['teaser'][0] !== ""){ ?>
													<p>Hours:<br><?php if ( isset ( $locationInfo['teaser'] ) ) echo $locationInfo['teaser'][0]; ?></p>
												<?php } ?>
											</div>
										<?php } else if ( isset ( $locationInfo['teaser']) && $locationInfo['teaser'][0] !== ""){ ?>
											<div class="hours">
												<p>Hours:<br><?php if ( isset ( $locationInfo['teaser'] ) ) echo $locationInfo['teaser'][0]; ?></p>
											</div>
										<?php } ?>
									</div>
									<?php if ( isset ( $locationInfo['phone'] ) && $locationInfo['phone'][0] !== "" ) $phoneNum = preg_replace('/[^0-9]/', '', $locationInfo['phone'][0]); echo '<a class="phone" href="tel:'.$phoneNum.'">Phone: '.$locationInfo['phone'][0].'</a>'; ?>
									<?php if ( isset ( $locationInfo['fax'] ) && $locationInfo['fax'][0] !== "" ) $faxNum = preg_replace('/[^0-9]/', '', $locationInfo['fax'][0]); echo '<br><a class="phone" href="tel:'.$faxNum.'">Fax: '.$locationInfo['fax'][0].'</a>'; ?>
									<div class="btns">
										<p><a href="https://www.google.com/maps?saddr=My+Location&daddr=<?php echo $fullAddress; ?>" target="_blank" class="btn">Get Directions</a>
										<a href="<?php echo get_the_permalink(); ?>" class="btn blue">View Location</a></p>
									</div>
								</div>
							<?php endwhile; wp_reset_query(); endif; ?>
						</div>
					</div>
				</div>
				
				<div id="map">
				</div>
			</div>
		</div>
	</div>
<?php
endwhile;
wp_reset_query();
?>
<?php 
$allLocations = json_encode( $addyArray );
$allProviders = json_encode( $providerArray );?>
<script>
providersArray = <?php echo $allProviders; ?>;
locationsArray = <?php echo $allLocations; ?>;
fullLocationArray = [];
$( ".locations_list a.statename" ).click(function(e) {
	e.preventDefault();
	stateId = $(this).data("stateid");
	$( ".locations_list p.title" ).html('Viewing All in '+$(this).text()+': <a class="back"><i class="fas fa-arrow-left"></i> Back</a>');
	$( ".locations_list p.title a.back" ).show();
	$( ".locations_list a.statename" ).hide();
	$( ".locations_list .individual").hide();
	$( ".locations_list .individual[data-stateid='"+stateId+"']" ).show();
	var finalLocations = [];
	startKey = 0;
	$( ".locations_list .individual" ).each(function( index ) {
		elem = $(this);
		if(elem.data("stateid") == stateId){
			$.each(locationsArray, function(key,value) {
				if(parseInt(elem.data("locationid")) == value.pagecid){
					finalLocations[startKey] = locationsArray[key];
					startKey++;
				}
			});
		}
	});
	if(finalLocations.length > 0){
		LoadMap(finalLocations);
	}
});
$( "#national_list .individual" ).each(function( index ) {
	fullLocationArray.push(parseInt($(this).data("locationid")));
});
// console.log(fullLocationArray);
$(document).on('click', '.locations_list p.title a.back', function (e) {
	e.preventDefault();
	$( ".locations_list p.title a.back" ).hide();
	$( ".locations_list p.title" ).html('Viewing All by State:');
	$( ".locations_list a.statename" ).show();
	$( ".locations_list .individual").hide();
	$("select#services option:eq(0),select#provider option:eq(0)").prop("selected", true);
	LoadMap(locationsArray);
});
function filterLocations(){
	servicesVal = $("select#services").val();
	providerVal = $("select#provider").val();
	locationsRemove = fullLocationArray;
	locationsRemoveProviders = fullLocationArray;
	locationsRemoveServices = fullLocationArray;
	locationsAllowedProviders = [];
	locationsAllowedServices = [];
	locationsAllowed = [];
	if(providerVal !== 0 && providerVal !== "0"){
		$.each(providersArray, function(key,value) {
			if(parseInt(providerVal) == parseInt(value.pagecid)){
				locationVals = value.location;
				locationArray = locationVals.split(",");
				for(x=0;x<locationArray.length;x++){
					// console.log(locationArray[x]);
					thisIndex = locationsAllowedProviders.indexOf(parseInt(locationArray[x]));
					if (thisIndex == -1 && parseInt(locationArray[x]) !== 0) {
					  locationsAllowedProviders.push(parseInt(locationArray[x]));
					}
				}
			}
		});
	} else {
		locationsAllowedProviders = fullLocationArray;
	}
	if(servicesVal !== 0 && servicesVal !== "0"){
		$.each(providersArray, function(key,value) {
			specialtiesVal = value.specialties + ",";
			specialtiesArray = specialtiesVal;
			specialtiesArray = specialtiesArray+",";
			specialtyIndex = specialtiesArray.indexOf(servicesVal);
			// console.log(specialtiesVal);
			if(specialtiesVal.includes(","+servicesVal+",")){
				locationVals = value.location;
				locationArray = locationVals.split(",");
				for(x=0;x<locationArray.length;x++){
					thisIndex = locationsRemoveServices.indexOf(locationArray[x]);
					if (thisIndex == -1 && parseInt(locationArray[x]) !== 0) {
						locationsAllowedServices.push(parseInt(locationArray[x]));
					}
				}
			}
		});
	} else {
		locationsAllowedServices = fullLocationArray;
	}
	// console.log(locationsAllowedProviders);
	// console.log(locationsAllowedServices);
	for(x=0;x<locationsAllowedProviders.length;x++){
		if(locationsAllowedServices.indexOf(locationsAllowedProviders[x]) > -1){
			locationsAllowed.push(locationsAllowedProviders[x]);
		}
	}
	// console.log(locationsAllowed);
	// console.log(locationsRemove);
	showLocations(locationsAllowed);
}
function showLocations(locs){
	providerMap = providersArray;
	$( ".locations_list p.title" ).html('Viewing Results: <a class="back"><i class="fas fa-arrow-left"></i> Back</a>');
	$( ".locations_list p.title a.back" ).show();
	$( ".locations_list a.statename" ).hide();
	$( ".locations_list .individual").hide();
	var finalLocations = [];
	startKey = 0;
	for(x=0;x<locs.length;x++){
		$( ".locations_list .individual[data-locationid='"+locs[x]+"']" ).show();
		$.each(locationsArray, function(key,value) {
			if(locs[x] == value.pagecid){
				finalLocations[startKey] = locationsArray[key];
				startKey++;
			}
		});
	}
	if(finalLocations.length > 0){
		LoadMap(finalLocations);
	}
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMY0gkCXr91WvrlF4MyPQnAW1PtdS3dBw"></script>
<script type="text/javascript">
	var currentdate = new Date(); 
	var d = Date.parse(currentdate);
	currentDatestamp = d/1000;

	markerArray1 = <?php echo $allLocations; ?>;
	currentPage = 204;
	currentatmPage = 0;
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
			center: new google.maps.LatLng({lat: 41.715195, lng: -71.350708}),
			zoom: 10,
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
						plotMarker(i,data, addressname, addy, pagecid, pageurl, atmcheck, lat, lng, opening);
						i++;
						//var myLatlng = new google.maps.LatLng(data.lat, data.lng);

					}
					
					map.fitBounds(bounds);

					function plotMarker(i, datarr, addressnamerr, addyrr, cid, url, atm, lat, lng, opening){
// 				        console.log(datarr);
						if (lat !== "" && lng !== ""){
							latlng = new google.maps.LatLng(lat, lng);
							currentPage = parseInt(currentPage);
							cid = parseInt(cid);
							if(currentDatestamp >= opening){
								markerImg = 'mapmarkerblue.png';
							} else {
								markerImg = 'mapmarkerred.png';
							}
							var icon = {
								url: iconBase + '' + markerImg,
								scaledSize: new google.maps.Size(43, 50), // scaled size
								origin: new google.maps.Point(0,0), // origin
								anchor: new google.maps.Point(0, 0) // anchor
							};
							var marker = new google.maps.Marker({
								position: latlng,
								map: map,
								title: addressnamerr,
								pageurl: url,
								description: addyrr,
								atmcheck: atm,
								addresscheck: datarr.address,
								icon: icon

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
										window.location.href = 'https://www.google.com/maps/dir/Current+Location/'+marker['addresscheck'];
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
<?php  get_footer(); ?>