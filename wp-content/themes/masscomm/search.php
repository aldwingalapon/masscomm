<?php get_header(); ?>

<?php
	if(isset($_GET['search-type'])) {
		$type = $_GET['search-type'];
		if($type == 'event') {
			get_template_part('includes/search-event');
		} elseif($type == 'news') {
			get_template_part('includes/search-news');
		} elseif($type == 'press_release') {
			get_template_part('includes/search-press_release');
		} elseif($type == 'post') {
			get_template_part('includes/search-post');
		} elseif($type == 'course') {
			get_template_part('includes/search-course');
		} elseif($type == 'alumni_story') {
			get_template_part('includes/search-alumni_story');
		} elseif($type == 'all'){
			get_template_part('includes/search-all');
		}
	}
?>

<?php wp_reset_query(); ?>

<?php get_footer(); ?>