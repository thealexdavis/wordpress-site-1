.split_content .col-sm-15:first-child{
	background-color: #<?php echo $settings->bg_color_1; ?>;
	<?php if($settings->hero_bg_1){ ?>background-image: url(<?php echo wp_get_attachment_url($settings->hero_bg_1); ?>);<?php } ?>
}
.split_content .col-sm-15:last-child{
	background-color: #<?php echo $settings->bg_color_2; ?>;
	<?php if($settings->hero_bg_2){ ?>background-image: url(<?php echo wp_get_attachment_url($settings->hero_bg_2); ?>);<?php } ?>
}
<?php if(!$settings->hero_bg_2){ ?>
.split_content .col-sm-15:last-child h3, .split_content .col-sm-15:last-child p{
	color: #5c6267 !important;
}
.split_content .col-sm-15:last-child h4{
	color: #00a8e6 !important;
}
.split_content .col-sm-15:last-child h4{
	font-size: 1.13em !important;
}
.split_content .col-sm-15:last-child h3{
	font-size: 3.6em !important;
}
.split_content .col-sm-15:last-child a.type3, .split_content .col-sm-15:last-child a.type4{
	color: #26b4e8 !important;
}
<?php } ?>
<?php if(!$settings->hero_bg_1){ ?>
.split_content .col-sm-15:first-child h3, .split_content .col-sm-15:first-child h4, .split_content .col-sm-15:first-child p{
	color: #00a8e6 !important;
}
.split_content .col-sm-15:first-child h4{
	font-size: 1.13em !important;
}
.split_content .col-sm-15:first-child h3{
	font-size: 3.6em !important;
}
<?php } ?>