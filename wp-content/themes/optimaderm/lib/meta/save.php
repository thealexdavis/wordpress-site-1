<?php

$metaFields = array("services_provided","street_address","street_address_2","city","zip","phone","fax","lat","lon","teaser");

function optima_save_meta( $post_id ) {
	if( isset( $_POST[ 'ln' ] ) ) { 
		$metaValue = $_POST['ln'];
		update_post_meta($post_id,'ln',$metaValue); 
	}
	if( isset( $_POST[ 'date' ] ) ) { 
		$metaValue = $_POST['date'];
		update_post_meta($post_id,'date',$metaValue); 
	}
	// Add conditional for services field
	if( isset( $_POST[ 'service_provided' ] ) ) { 
		$metaValue = $_POST['service_provided'];
		update_post_meta($post_id,'service_provided',$metaValue); 
	}
	if( isset( $_POST[ 'map_icon' ] ) ) { 
		$metaValue = $_POST['map_icon'];
		update_post_meta($post_id,'map_icon',$metaValue); 
	}
	if( isset( $_POST[ 'building_name' ] ) ) { 
		$metaValue = $_POST['building_name'];
		update_post_meta($post_id,'building_name',$metaValue); 
	}
	if( isset( $_POST[ 'street_address' ] ) ) { 
		$metaValue = $_POST['street_address'];
		update_post_meta($post_id,'street_address',$metaValue); 
	}
	if( isset( $_POST[ 'street_address_2' ] ) ) { 
		$metaValue = $_POST['street_address_2'];
		update_post_meta($post_id,'street_address_2',$metaValue); 
	}
	if( isset( $_POST[ 'city' ] ) ) { 
		$metaValue = $_POST['city'];
		update_post_meta($post_id,'city',$metaValue); 
	}
	if( isset( $_POST[ 'zip' ] ) ) { 
		$metaValue = $_POST['zip'];
		update_post_meta($post_id,'zip',$metaValue); 
	}
	if( isset( $_POST[ 'phone' ] ) ) { 
		$metaValue = $_POST['phone'];
		update_post_meta($post_id,'phone',$metaValue); 
	}
	if( isset( $_POST[ 'fax' ] ) ) { 
		$metaValue = $_POST['fax'];
		update_post_meta($post_id,'fax',$metaValue); 
	}
	if( isset( $_POST[ 'lat' ] ) ) { 
		$metaValue = $_POST['lat'];
		update_post_meta($post_id,'lat',$metaValue); 
	}
	if( isset( $_POST[ 'lon' ] ) ) { 
		$metaValue = $_POST['lon'];
		update_post_meta($post_id,'lon',$metaValue); 
	}
	if( isset( $_POST[ 'teaser' ] ) ) { 
		$metaValue = $_POST['teaser'];
		update_post_meta($post_id,'teaser',$metaValue); 
	}
	if( isset( $_POST[ 'position' ] ) ) { 
		$metaValue = $_POST['position'];
		update_post_meta($post_id,'position',$metaValue); 
	}
	if( isset( $_POST[ 'locations' ] ) ) { 
		$metaValue = $_POST['locations'];
		update_post_meta($post_id,'locations',$metaValue); 
	}
	if( isset( $_POST[ 'review' ] ) ) { 
		$metaValue = $_POST['review'];
		update_post_meta($post_id,'review',$metaValue); 
	}
	if( isset( $_POST[ 'ctatitle' ] ) ) { 
		$metaValue = $_POST['ctatitle'];
		update_post_meta($post_id,'ctatitle',$metaValue); 
	}
	if( isset( $_POST[ 'ctalink' ] ) ) { 
		$metaValue = $_POST['ctalink'];
		update_post_meta($post_id,'ctalink',$metaValue); 
	}
	if( isset( $_POST[ 'logo_img' ] ) ) { 
		$metaValue = $_POST['logo_img'];
		update_post_meta($post_id,'logo_img',$metaValue); 
	}
	
	if( isset( $_POST[ 'placesid' ] ) ) { 
		$metaValue = $_POST['placesid'];
		update_post_meta($post_id,'placesid',$metaValue); 
	}
}
add_action( 'save_post', 'optima_save_meta' );