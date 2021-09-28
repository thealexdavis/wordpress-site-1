.fl-row-content-wrap{
	padding: 0;
}

.fl-node-<?php echo $id; ?> {
    background-color: #ebe5e1;
	border: 1px solid #b1cdc5;
	margin-bottom: 5.5em;
}

.fl-node-<?php echo $id; ?> #hero .img{
	<?php if ($settings->hero_bg){ ?>background-image: url(<?php echo wp_get_attachment_url($settings->hero_bg); ?>);<?php } ?>
	background-position: center top;
	background-repeat: no-repeat;
	background-size: cover;
}