<form action="/" method="get" class="search_form">
	<div class="container">
		<input type="text" name="s" id="search" placeholder="How can we help you?" title="How can we help you?" aria-label="" value="<?php the_search_query(); ?>" />
		<button type="submit" id="submit"><i class="fas fa-search" aria-hidden="true" title="Begin Search"></i></button>
	</div>
</form>