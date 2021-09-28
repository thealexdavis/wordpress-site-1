<?php $totalCount = 0; for($x=1;$x<=5;$x++){ 
	if ($settings->{"title_".$x} !== ""){
		$totalCount++;
	}
	$settings->hero_size = 1;
} ?>
<div class="featured_text type<?php echo $settings->hero_size; ?>" data-count="<?php echo $totalCount; ?>">
	<?php if($settings->hero_size == 1){
		$realCount = 1; for($x=1;$x<=5;$x++){ 
			$activeClass = ($x == 1) ? "active" : false;
			if ($settings->{"title_".$x} !== ""){
		?>
			<div class="box">
				<div class="container">
					<?php if ($settings->{"thumbnail_".$x} !== ""){ echo '<div class="img"><img src="'.wp_get_attachment_url($settings->{"thumbnail_".$x}).'"></div>'; } ?>
					<div class="contents">
						<?php if ($settings->{"icon_".$x} !== ""){ $iconimg = '<img src="'.wp_get_attachment_url($settings->{"icon_".$x}).'">'; } else { $iconimg = ""; }; ?>
						<?php if ($settings->{"title_".$x} !== ""){ echo '<h3>'.$iconimg.''.$settings->{"title_".$x}.'</h4>'; } ?>
						<?php if ($settings->{"copy_".$x} !== ""){ echo $settings->{"copy_".$x}; } ?>
						<div class="ctas">
							<?php
								for($y=1;$y<2;$y++){
									if($settings->{"slide".$x."_cta".$y."_type"} !== 1){
										if($settings->{"slide".$x."_cta".$y."_text"} == ""){
											$ctaText = "Learn More";
										} else {
											$ctaText = $settings->{"slide".$x."_cta".$y."_text"};
										}
										if($settings->{"slide".$x."_cta".$y} !== ""){
											echo '<a href="'.$settings->{"slide".$x."_cta".$y}.'" class="type'.$settings->{"slide".$x."_cta".$y."_type"}.'">'.$ctaText.'</a>';
										}
									}
								}	
							?>
						</div>
					</div>
				</div>
			</div>
		<?php $realCount++; } 
		}
	?>
	<?php if($settings->undercopy){
		echo '<div class="undercopy">'.$settings->undercopy.'</div>';
	} ?>
	<?php
	 } ?>
	 <?php if($settings->hero_size == 2){
		$realCount = 1; for($x=1;$x<=5;$x++){ 
			$activeClass = ($x == 1) ? "active" : false;
			if ($settings->{"title_".$x} !== ""){
				$ctaInfo = "";
				if($settings->{"slide".$x."_cta1"} !== ""){
					$ctaInfo = 'href="'.$settings->{"slide".$x."_cta1"}.'"';
				}
		?>
			<a <?php echo $ctaInfo; ?> class="box">
				<div class="container">
					<?php if ($settings->{"thumbnail_".$x} !== ""){ echo '<div class="img"><img src="'.wp_get_attachment_url($settings->{"thumbnail_".$x}).'"></div>'; } ?>
					<div class="contents">
						<?php if ($settings->{"title_".$x} !== ""){ echo '<h3>'.$settings->{"title_".$x}.'</h4>'; } ?>
						<?php if ($settings->{"copy_".$x} !== ""){ echo $settings->{"copy_".$x}; } ?>
						<div class="ctas">
							<?php
								for($y=1;$y<2;$y++){
									if($settings->{"slide".$x."_cta".$y."_type"} !== 1){
										if($settings->{"slide".$x."_cta".$y."_text"} == ""){
											$ctaText = "Learn More";
										} else {
											$ctaText = $settings->{"slide".$x."_cta".$y."_text"};
										}
										if($settings->{"slide".$x."_cta".$y} !== ""){
											echo '<span class="type'.$settings->{"slide".$x."_cta".$y."_type"}.'">'.$ctaText.'</span>';
										}
									}
								}	
							?>
						</div>
					</div>
				</div>
			</a>
		<?php $realCount++; } 
		}
	 } ?>
	  <?php if($settings->hero_size == 3){
		$realCount = 1; for($x=1;$x<=5;$x++){ 
			$activeClass = ($x == 1) ? "active" : false;
			if ($settings->{"title_".$x} !== ""){
				$ctaInfo = "";
				if($settings->{"slide".$x."_cta1"} !== ""){
					$ctaInfo = 'href="'.$settings->{"slide".$x."_cta1"}.'"';
				}
		?>
			<a <?php echo $ctaInfo; ?> class="box">
				<div class="container">
					<?php if ($settings->{"thumbnail_".$x} !== ""){ echo '<div class="img"><img src="'.wp_get_attachment_url($settings->{"thumbnail_".$x}).'"></div>'; } ?>
					<div class="contents">
						<?php if ($settings->{"title_".$x} !== ""){ echo '<h3>'.$settings->{"title_".$x}.'</h4>'; } ?>
						<div class="ctas">
							<?php
								for($y=1;$y<2;$y++){
									if($settings->{"slide".$x."_cta".$y."_type"} !== 1){
										if($settings->{"slide".$x."_cta".$y."_text"} == ""){
											$ctaText = "Learn More";
										} else {
											$ctaText = $settings->{"slide".$x."_cta".$y."_text"};
										}
										if($settings->{"slide".$x."_cta".$y} !== ""){
											echo '<span class="type'.$settings->{"slide".$x."_cta".$y."_type"}.'">'.$ctaText.'</span>';
										}
									}
								}	
							?>
						</div>
					</div>
				</div>
			</a>
		<?php $realCount++; } 
		}
	 } ?>
</div>