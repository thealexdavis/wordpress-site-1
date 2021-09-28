<?php $totalCount = 0; for($x=1;$x<=5;$x++){ 
	if ($settings->{"title_".$x} !== ""){
		$totalCount++;
	}
} ?>
<div class="featured_text type<?php echo $settings->hero_size; ?>" data-count="<?php echo $totalCount; ?>">
	<?php if($settings->hero_size == 1){
		$realCount = 1; for($x=1;$x<=5;$x++){ 
			$activeClass = ($x == 1) ? "active" : false;
			if ($settings->{"title_".$x} !== ""){
		?>
			<div class="box">
				<div class="container">
					<?php if ($settings->{"thumbnail_".$x} !== ""){ echo '<div class="img"><img src="'.wp_get_attachment_url($settings->{"thumbnail_".$x}).'" alt="'.$settings->{"title_".$x}.'"></div>'; } ?>
					<div class="contents">
						<?php if ($settings->{"subtitle_".$x} !== ""){ echo '<p class="sub">'.$settings->{"subtitle_".$x}.'</p>'; } ?>
						<?php if ($settings->{"title_".$x} !== ""){ echo '<h3>'.$settings->{"title_".$x}.'</h3>'; } ?>
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
		?>
			<a href="<?php echo $settings->{"slide".$x."_cta1"}; ?>" class="box" <?php if ($settings->{"thumbnail_".$x} !== ""){ echo 'style="background-image: url('.wp_get_attachment_url($settings->{"thumbnail_".$x}).');"'; } ?>>
				<div class="container">
					<div class="contents">
						<?php if ($settings->{"icon_".$x} !== ""){ $iconimg = '<img src="'.wp_get_attachment_url($settings->{"icon_".$x}).'" alt="'.$settings->{"title_".$x}.'">'; } else { $iconimg = ""; }; ?>
						<?php if ($settings->{"title_".$x} !== ""){ echo '<h3 class="title">'.$settings->{"title_".$x}.'</h3>'; } ?>
						<h3 class="arrows">&#xBB;</h3>

					</div>
				</div>
			</a>
		<?php $realCount++; } 
		}
	?>
	<?php if($settings->undercopy){
		echo '<div class="undercopy">'.$settings->undercopy.'</div>';
	} ?>
	<?php
} ?>
<?php if($settings->hero_size == 3){
	$realCount = 1; for($x=1;$x<=5;$x++){ 
		$activeClass = ($x == 1) ? "active" : false;
		if ($settings->{"title_".$x} !== ""){
	?>
		<div class="box">
			<div class="container">
				<?php if ($settings->{"thumbnail_".$x} !== ""){ echo '<div class="img"><img src="'.wp_get_attachment_url($settings->{"thumbnail_".$x}).'" alt="'.$settings->{"title_".$x}.'"></div>'; } ?>
				<div class="contents">
					<?php if ($settings->{"icon_".$x} !== ""){ $iconimg = '<img src="'.wp_get_attachment_url($settings->{"icon_".$x}).'" alt="'.$settings->{"title_".$x}.'">'; } else { $iconimg = ""; }; ?>
					<?php if ($settings->{"title_".$x} !== ""){ echo '<h3>'.$settings->{"title_".$x}.'</h3>'; } ?>
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
									if($settings->{"slide".$x."_cta".$y."_type"} == 4){
										$linkExtra = '&#xBB;';
									} else {
										$linkExtra = "";
									}
									if($settings->{"slide".$x."_cta".$y} !== ""){
										echo '<a href="'.$settings->{"slide".$x."_cta".$y}.'" class="type'.$settings->{"slide".$x."_cta".$y."_type"}.'">'.$ctaText.' <span>'.$linkExtra.'</span></a>';
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
</div>