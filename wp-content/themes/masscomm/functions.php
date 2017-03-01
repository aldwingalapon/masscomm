<?php
/*	@desc attach custom admin login CSS file	*/
function custom_login_css() {
  echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/login.css" />';
}
add_action('login_head', 'custom_login_css');
/*	@desc update logo URL to point towards Homepage	*/
function custom_login_header_url($url) {
  return get_option('home');
}
add_filter( 'login_headerurl', 'custom_login_header_url' );
function custom_login_header_title($title) {
  $blog_title = get_bloginfo('name');
  return $blog_title;
}
add_filter( 'login_headertitle', 'custom_login_header_title' );
/*	@desc update admin icon to client icon	*/
function custom_admin_icon_css() {
  echo '<link rel="shortcut icon" href="'.get_stylesheet_directory_uri().'/images/logo.ico" />';
}
add_action('admin_head', 'custom_admin_icon_css');
function upcmc_search_results_posts_count( $wp_query = null ) {
    if ( ! $wp_query )
        global $wp_query;
    $posts = min( ( int ) $wp_query->get( 'posts_per_page' ), $wp_query->found_posts );
    $paged = max( ( int ) $wp_query->get( 'paged' ), 1 );
    $count = ( $paged - 1 ) * $posts;
    printf('%d - %d of %d', $count + 1, $count + $wp_query->post_count, $wp_query->found_posts);
}
function remove_footer_admin () {
    echo '<span id="footer-thankyou">Template implemented and developed by <a href="http://www.jamediasolutions.com/" target="_blank" title="JA Media Solutions">JA Media Solutions</a>.</span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');
// Disable Admin Bar for all users
//add_filter('show_admin_bar', '__return_false');
function upcmc_remove_version() {return '';}
add_filter('the_generator', 'upcmc_remove_version');
function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyAwA1Vv2GI7WWfKIphj9RHsQ3GagCI8xu0';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
//Making jQuery Google API
function modify_jquery() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3');
		wp_enqueue_script('jquery');
	}
}
//add_action('init', 'modify_jquery');
// custom menu support
add_theme_support( 'menus' );
if (function_exists( 'register_nav_menus')) {register_nav_menus(array('primary_navigation' => 'Primary Navigation', 'secondary_navigation' => 'Secondary Navigation', 'utility_navigation' => 'Utility Navigation'));}
if ( function_exists('register_sidebar') )
register_sidebar(array('id'=>'default-sidebar','name'=>'Default Sidebar','before_widget' => '<span id="%1$s" class="widget %2$s">','after_widget' => '</span>','before_title' => '<h2 class="widgettitle">','after_title' => '</h2>',));
register_sidebar(array('id'=>'default-news-sidebar','name'=>'Default News Sidebar','before_widget' => '<span id="%1$s" class="widget %2$s">','after_widget' => '</span>','before_title' => '<h2 class="widgettitle">','after_title' => '</h2>',));
register_sidebar(array('id'=>'default-articles-sidebar','name'=>'Default Articles Sidebar','before_widget' => '<span id="%1$s" class="widget %2$s">','after_widget' => '</span>','before_title' => '<h2 class="widgettitle">','after_title' => '</h2>',));
register_sidebar(array('id'=>'default-events-sidebar','name'=>'Default Events Sidebar','before_widget' => '<span id="%1$s" class="widget %2$s">','after_widget' => '</span>','before_title' => '<h2 class="widgettitle">','after_title' => '</h2>',));
register_sidebar(array('id'=>'default-blog-sidebar','name'=>'Default Blog Sidebar','before_widget' => '<span id="%1$s" class="widget %2$s">','after_widget' => '</span>','before_title' => '<h2 class="widgettitle">','after_title' => '</h2>',));
register_sidebar(array('id'=>'default-media-sidebar','name'=>'Default Media Sidebar','before_widget' => '<span id="%1$s" class="widget %2$s">','after_widget' => '</span>','before_title' => '<h2 class="widgettitle">','after_title' => '</h2>',));
register_sidebar(array('id'=>'default-page-sidebar','name'=>'Default Page Sidebar','before_widget' => '<span id="%1$s" class="widget %2$s">','after_widget' => '</span>','before_title' => '<h2 class="widgettitle">','after_title' => '</h2>',));
register_sidebar(array('id'=>'top-footer-one','name'=>'Top Footer One','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'top-footer-two','name'=>'Top Footer Two','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'top-footer-three','name'=>'Top Footer Three','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'top-footer-four','name'=>'Top Footer Four','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'top-footer-five','name'=>'Top Footer Five','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'bottom-footer-one','name'=>'Bottom Footer One','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'bottom-footer-two','name'=>'Bottom Footer Two','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'bottom-footer-three','name'=>'Bottom Footer Three','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'bottom-footer-copyright','name'=>'Bottom Footer Copyright','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'bottom-footer-menu-link','name'=>'Bottom Footer Menu Link','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
// thumbnail support
add_theme_support('post-thumbnails'); 
add_image_size('large-thumbnails', 500, 500, true);
add_image_size('medium-thumbnails', 300, 300, true);
add_image_size('medium-info-thumbnails', 360, 338, true);
add_image_size('medium-story-thumbnails', 400, 300, true);
add_image_size('medium-news-thumbnails', 400, 175, true);
add_image_size('mediumrectangle-thumbnails', 300, 200, true);
add_image_size('small-thumbnails', 200, 200, true);
add_image_size('small-photo-thumbnails', 100, 100, true);
add_filter( 'embed_oembed_html', 'custom_oembed_filter', 10, 4 ) ;
function custom_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<div class="video-container">'.$html.'</div>';
    return $return;
}
// Remove Query String
function _remove_script_version( $src ){
$parts = explode( '?ver', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
		return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
	}
add_filter('language_attributes', 'add_opengraph_doctype');
//Lets add Open Graph Meta Info
function insert_fb_in_head() {
	global $post;
	if ( !is_singular()) //if it is not a post or a page
		return;
        echo '<meta property="fb:admins" content="https://www.facebook.com/UPCMC/?fref=ts"/>';
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '"/>';
	if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
		$default_image="http://example.com/image.jpg"; //replace this with a default image on your server or an image in your media library
		echo '<meta property="og:image" content="' . $default_image . '"/>';
	}
	else{
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	}
	echo "
";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );
// Add a unique id attribute to the body tag of an HTML page
function id_the_body() {
        global $post, $wp_query, $wpdb;
        $post = $wp_query->post;
	$body_id = "";
        if ($post->post_type == 'page') $body_id = 'page-' . $post->ID;
        if ($post->post_type == 'post') $body_id = 'post-' . $post->ID;
        if ( is_front_page() ) $body_id = 'home';
        if ( is_home() ) $body_id = 'home';
        if ( is_category() ) $body_id = 'category-' . get_query_var('cat');
        if ( is_tag() ) $body_id = 'tag-' . get_query_var('tag');
        if ( is_author() ) $body_id = 'author-' . get_query_var('author');
        if ( is_date() ) $body_id = 'date-archive';
        if (is_search()) $body_id = 'search-archive';
        if (is_404()) $body_id = '404-error';
        if ($body_id) echo "id=\"$body_id\"";
}
// Add special class names for the parents of the page
function class_the_body($more_classes='') {
        global $post, $wp_query, $wpdb;
        $post = $wp_query->post;
		$parent_id_string = "";
        if ($post->ancestors) {
                /* reverse the order of the array elements b/c we want the immediate parent to be last in the class list */
                $parent_array = array_reverse($post->ancestors);
                foreach ($parent_array as $key => $parent_id) {
                        $parent_id_string = $parent_id_string . ' childof-' . 
$parent_id;
                }
        }
	$type = "";
        if ($post->post_type == 'page') $type = 'page';
        if ($post->post_type == 'post') $type = 'single';
        // these 2 are not needed since we id the body with home
        //if (is_home()) $type = 'home';
        //if (is_front_page()) $type = 'front';
        if (is_category()) $type = 'archive category-archive';
        if (is_tag()) $type = 'archive tag-archive';
        if (is_author()) $type = 'archive author-archive';
        // again, these 3 are not needed since we id the body with these
        if (is_date()) $type = 'archive date-archive';
        if (is_search()) $type = 'archive search-archive';
        if (is_404()) $type = '404-error';
        // need a lot of trimming b/c any combination of these could be blank
		if($parent_id_string) {
			$classes = trim($parent_id_string . ' ' . $more_classes);
		}else{
			$classes = trim($more_classes);
		}
        if ($type) $classes = $type . ' ' . $classes;
        $classes = trim($classes);
        if ($classes) echo " class=\"$classes\"";
}
function the_breadcrumbs() {
	global $post;
	echo "<p class='trail'>";
	if (!is_home()) {
		echo "<span><a href='".get_option('home')."'>Home</a></span>";
		if (is_category() || is_singular( 'post' )) {
			echo " <span class='sep'></span> ";
			$post_object = get_field('blogs_page', 'option');
			if( $post_object ){
				$post = $post_object;
				setup_postdata( $post ); 
				echo "<span class='post'><a href='".get_the_permalink()."'>" . get_the_title() . "</a></span>";
				wp_reset_postdata();
			}
			if (is_category()) {
				echo " <span class='sep'></span> <span class='single-category'>".single_cat_title( '', false )."</span>";
			}
			if (is_singular( 'post' )) {
				echo " <span class='sep'></span> <span class='single-post-".$post->ID."'>".get_the_title()."</span>";
			}
		} elseif (is_page()) {
			if($post->post_parent){
				$anc = get_post_ancestors( $post->ID );
				krsort($anc);
				//$anc_link = get_page_link( $post->post_parent );
				foreach ( $anc as $ancestor ) {
					echo " <span class='sep'></span> <span><a href=" . get_page_link( $ancestor ) . ">".get_the_title($ancestor)."</a></span> ";
				}
				echo " <span class='sep'></span> <span>".get_the_title()."</span>";
			} else {
				echo " <span class='sep'></span> ";
				echo "<span>".get_the_title()."</span>";
			}
		} elseif (is_singular('video')) {
			echo " <span class='sep'></span> ";
			$post_object = get_field('videos_page', 'option');
			if( $post_object ){
				$post = $post_object;
				setup_postdata( $post ); 
				echo "<span class='videos-page'><a href='".get_the_permalink()."'>" . get_the_title() . "</a></span>";
				wp_reset_postdata();
			}
			echo "<span class='sep'></span> <span class='single-video-".$post->ID."'>".get_the_title()."</span>";
		} elseif (is_singular('news')) {
			echo " <span class='sep'></span> ";
			$post_object = get_field('news_page', 'option');
			if( $post_object ){
				$post = $post_object;
				setup_postdata( $post ); 
				echo "<span class='news-page'><a href='".get_the_permalink()."'>" . get_the_title() . "</a></span>";
				wp_reset_postdata();
			}
			echo "<span class='sep'></span> <span class='single-news-".$post->ID."'>".get_the_title()."</span>";
		} elseif (is_singular('event')) {
			echo " <span class='sep'></span> ";
			$post_object = get_field('events_page', 'option');
			if( $post_object ){
				$post = $post_object;
				setup_postdata( $post ); 
				echo "<span class='event-page'><a href='".get_the_permalink()."'>" . get_the_title() . "</a></span>";
				wp_reset_postdata();
			}
			echo "<span class='sep'></span> <span class='single-event-".$post->ID."'>".get_the_title()."</span>";
		} elseif (is_singular('press_release')) {
			echo " <span class='sep'></span> ";
			$post_object = get_field('press_release_page', 'option');
			if( $post_object ){
				$post = $post_object;
				setup_postdata( $post ); 
				echo "<span class='press-release-page'><a href='".get_the_permalink()."'>" . get_the_title() . "</a></span>";
				wp_reset_postdata();
			}
			echo "<span class='sep'></span> <span class='single-press_release-".$post->ID."'>".get_the_title()."</span>";
		} elseif (is_tax('department') || is_tax('program') ||is_singular('course')) {
			if(is_tax('department')){
				echo " <span class='sep'></span> ";
				$post_object = get_field('departments_page', 'option');
				if( $post_object ){
					$post = $post_object;
					setup_postdata( $post ); 
					echo '<span class="departments-page"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></span>';
					wp_reset_postdata();
				}
				if(!is_singular('course')){
					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					echo " <span class='sep'></span> <span class='program-".$term->term_id."'>".$term->name."</span>";
				}
			}
			if(is_tax('program')){
				echo " <span class='sep'></span> ";
				$post_object = get_field('departments_page', 'option');
				if( $post_object ){
					$post = $post_object;
					setup_postdata( $post ); 
					echo '<span class="departments-page"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></span>';
					wp_reset_postdata();
				}
				echo " <span class='sep'></span> ";
				$post_object = get_field('programs_page', 'option');
				if( $post_object ){
					$post = $post_object;
					setup_postdata( $post ); 
					echo '<span class="programs-page"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></span>';
					wp_reset_postdata();
				}
				if(!is_singular('course')){
					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					echo " <span class='sep'></span> <span class='program-".$term->term_id."'>".$term->name."</span>";
				}
			}
			if(is_singular('course')){
				/*
				echo " <span class='sep'></span> ";
				$post_object = get_field('departments_page', 'option');
				if( $post_object ){
					$post = $post_object;
					setup_postdata( $post ); 
					echo '<span class="departments-page"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></span>';
					wp_reset_postdata();
				}
				*/
				echo courses_department_links($post->ID);
				/*
				echo " <span class='sep'></span> ";
				$post_object = get_field('programs_page', 'option');
				if( $post_object ){
					$post = $post_object;
					setup_postdata( $post ); 
					echo '<span class="programs-page"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></span>';
					wp_reset_postdata();
				}
				*/
				echo courses_program_links($post->ID);
				echo " <span class='sep'></span> ";
				$post_object = get_field('courses_page', 'option');
				if( $post_object ){
					$post = $post_object;
					setup_postdata( $post ); 
					echo '<span class="courses-page"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></span>';
					wp_reset_postdata();
				}
				echo "<span class='sep'></span> <span class='single-course-".$post->ID."'>".get_the_title()."</span>";
			}
		} elseif (is_singular('alumni_story')) {
			echo " <span class='sep'></span> ";
			$post_object = get_field('alumni_stories_page', 'option');
			if( $post_object ){
				$post = $post_object;
				setup_postdata( $post ); 
				echo '<span class="alumni_stories-page"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></span>';
				wp_reset_postdata();
			}
			echo "<span class='sep'></span> <span class='single-alumni_story-".$post->ID."'>".get_the_title()."</span>";
		} elseif (is_singular('faculty')) {
			echo " <span class='sep'></span> ";
			$post_object = get_field('faculty_members_page', 'option');
			if( $post_object ){
				$post = $post_object;
				setup_postdata( $post ); 
				echo '<span class="faculty_members-page"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></span>';
				wp_reset_postdata();
			}
			echo "<span class='sep'></span> <span class='single-faculty-".$post->ID."'>".get_the_title()."</span>";
		} elseif (is_tax('office')) {
			echo " <span class='sep'></span> ";
			$post_object = get_field('offices_page', 'option');
			if( $post_object ){
				$post = $post_object;
				setup_postdata( $post ); 
				echo '<span class="offices-page"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></span>';
				wp_reset_postdata();
			}
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			echo " <span class='sep'></span> <span class='office-".$term->term_id."'>".$term->name."</span>";
		} elseif (is_singular('personnel')) {
			echo " <span class='sep'></span> ";
			$post_object = get_field('personnel_page', 'option');
			if( $post_object ){
				$post = $post_object;
				setup_postdata( $post ); 
				echo '<span class="personnel-page"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></span>';
				wp_reset_postdata();
			}
			echo "<span class='sep'></span> <span class='single-personnel-".$post->ID."'>".get_the_title()."</span>";
		} elseif (is_tax('directory')) {
			echo " <span class='sep'></span> ";
			$post_object = get_field('directory_page', 'option');
			if( $post_object ){
				$post = $post_object;
				setup_postdata( $post ); 
				echo '<span class="directory-page"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></span>';
				wp_reset_postdata();
			}
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			echo " <span class='sep'></span> <span class='office-".$term->term_id."'>" . ucfirst($term->name) . "</span>";
		} elseif (is_tax('personnel_type')) {
			echo " <span class='sep'></span> ";
			$post_object = get_field('personnel_page', 'option');
			if( $post_object ){
				$post = $post_object;
				setup_postdata( $post ); 
				echo '<span class="personnel_type-page"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></span>';
				wp_reset_postdata();
			}
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			echo " <span class='sep'></span> <span class='personnel_type-".$term->term_id."'>" . ucfirst($term->name) . "</span>";
		} elseif (is_search()) {
			echo " <span class='sep'></span> <span>Search results</span>"; 
		} elseif (is_404()) {
			echo " <span class='sep'></span> <span>Error 404: Page Not Found</span>"; 
		} elseif (is_tag()) {
			$current_tag = single_tag_title("", false);
			echo " <span class='sep'></span> <span>Tag Archive: ".$current_tag."</span>";
		} elseif (is_author()) {
			echo " <span class='sep'></span> <span>".get_the_author_meta('display_name')."</span>";
		}
	}
	echo "</p>";
}
// get taxonomies department links
function courses_department_links($id){
	$post = get_post( $id );
	// get post type by post
	$post_type = $post->post_type;
	// get post type taxonomies
	$taxonomies = get_object_taxonomies( $post_type, 'objects' );
	$out = array();
	foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
		if(($taxonomy_slug=='department')){
			// get the terms related to post
			$terms = get_the_terms( $post->ID, $taxonomy_slug );
			if ( !empty( $terms ) ) {
				$out[] = "";
				foreach ( $terms as $term ) {
					if (get_field('main_department', $id)){
						if($term->term_id == (get_field('main_department', $id))){
							$out[] = 
							'  <span class="sep"></span> <span class="department-'.$term->term_id.'"><a href="'
							.    get_term_link( $term->slug, $taxonomy_slug ) .'">'
							.    $term->name
							. "</a></span>";
						}
					} else {
						$out[] = 
						'  <span class="sep"></span> <span class="department-'.$term->term_id.'"><a href="'
						.    get_term_link( $term->slug, $taxonomy_slug ) .'">'
						.    $term->name
						. "</a></span>";
					}
				}
				$out[] = "";
			}
		}
	}
	return implode('', $out );
}
// get taxonomies program links
function courses_program_links($id){
	$post = get_post( $id );
	// get post type by post
	$post_type = $post->post_type;
	// get post type taxonomies
	$taxonomies = get_object_taxonomies( $post_type, 'objects' );
	$out = array();
	foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
		if(($taxonomy_slug=='program')){
			// get the terms related to post
			$terms = get_the_terms( $post->ID, $taxonomy_slug );
			if ( !empty( $terms ) ) {
				$out[] = "";
				foreach ( $terms as $term ) {
					if (get_field('main_program', $id)){
						if($term->term_id == (get_field('main_program', $id))){
							$out[] = 
							'  <span class="sep"></span> <span class="program-'.$term->term_id.'"><a href="'
							.    get_term_link( $term->slug, $taxonomy_slug ) .'">'
							.    $term->name
							. "</a></span>";
						}
					} else {
						$out[] = 
						'  <span class="sep"></span> <span class="program-'.$term->term_id.'"><a href="'
						.    get_term_link( $term->slug, $taxonomy_slug ) .'">'
						.    $term->name
						. "</a></span>";
					}
				}
				$out[] = "";
			}
		}
	}
	return implode('', $out );
}
// get taxonomies office links
function personnel_office_links($id){
	$post = get_post( $id );
	// get post type by post
	$post_type = $post->post_type;
	// get post type taxonomies
	$taxonomies = get_object_taxonomies( $post_type, 'objects' );
	$out = array();
	foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
		if(($taxonomy_slug=='office')){
			// get the terms related to post
			$terms = get_the_terms( $post->ID, $taxonomy_slug );
			if ( !empty( $terms ) ) {
				$out[] = "";
				foreach ( $terms as $term ) {
					if (get_field('main_office', $id)){
						if($term->term_id == (get_field('main_office', $id))){
							$out[] = 
							'  <span class="sep"></span> <span class="office-'.$term->term_id.'"><a href="'
							.    get_term_link( $term->slug, $taxonomy_slug ) .'">'
							.    $term->name
							. "</a></span>";
						}
					} else {
						$out[] = 
						'  <span class="sep"></span> <span class="office-'.$term->term_id.'"><a href="'
						.    get_term_link( $term->slug, $taxonomy_slug ) .'">'
						.    $term->name
						. "</a></span>";
					}
				}
				$out[] = "";
			}
		}
	}
	return implode('', $out );
}
// get taxonomies office links
function personnel_type_links($id){
	$post = get_post( $id );
	// get post type by post
	$post_type = $post->post_type;
	// get post type taxonomies
	$taxonomies = get_object_taxonomies( $post_type, 'objects' );
	$out = array();
	foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
		if(($taxonomy_slug=='personnel_type')){
			// get the terms related to post
			$terms = get_the_terms( $post->ID, $taxonomy_slug );
			if ( !empty( $terms ) ) {
				$out[] = "";
				foreach ( $terms as $term ) {
					if (get_field('main_office', $id)){
						if($term->term_id == (get_field('main_personnel_type', $id))){
							$out[] = 
							'  <span class="sep"></span> <span class="office-'.$term->term_id.'"><a href="'
							.    get_term_link( $term->slug, $taxonomy_slug ) .'">'
							.    $term->name
							. "</a></span>";
						}
					} else {
						$out[] = 
						'  <span class="sep"></span> <span class="personnel_type-'.$term->term_id.'"><a href="'
						.    get_term_link( $term->slug, $taxonomy_slug ) .'">'
						.    $term->name
						. "</a></span>";
					}
				}
				$out[] = "";
			}
		}
	}
	return implode('', $out );
}
add_action( "department_edit_form", function( $tag, $taxonomy ) { ?>
	<style>.term-description-wrap{display:none;}</style>
<?php }, 10, 2 );
add_action( "department_add_form", function( $taxonomy ) { ?>
	<style>.term-description-wrap{display:none;}</style>
<?php }, 10, 2 );
add_action( "program_edit_form", function( $tag, $taxonomy ) { ?>
	<style>.term-description-wrap{display:none;}</style>
<?php }, 10, 2 );
add_action( "program_add_form", function( $taxonomy ) { ?>
	<style>.term-description-wrap{display:none;}</style>
<?php }, 10, 2 );
add_action( "office_edit_form", function( $tag, $taxonomy ) { ?>
	<style>.term-description-wrap{display:none;}</style>
<?php }, 10, 2 );
add_action( "office_add_form", function( $taxonomy ) { ?>
	<style>.term-description-wrap{display:none;}</style>
<?php }, 10, 2 );
function set_upcmc_post_views($postID) {
    $count_key = 'upcmc_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
function get_upcmc_post_views($postID){
    $count_key = 'upcmc_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function limit_words($string, $word_limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit));
}
class bootstrap_walker_nav_menu extends Walker_Nav_Menu {
        // <ul> elements
        function start_lvl( &$output, $depth = 0, $args = array() ) {
                // code indentation
                $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); 
                // build classes
                $classes = array(
                                    // only the top level will have dropdowns
                                    $depth == 0 ? 'dropdown-menu' : '',
                                    // assign a class to items nested deeper
                                    $depth >= 1 ? 'sub-menu' : ''
                                );
                $class_names = implode( ' ', $classes );
                // build html - <ul> becomes <div> at top levels
                if ( $depth == 0 )  $output .= "\n" . $indent . '<div class="' . $class_names . '">' .  "\n" . $indent . '<div class="frame">' . "\n";
                else $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
        }
        // <li> elements and <a> links
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
                // code indentation
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
                // prepare
		$li_attributes = '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		// build classes and attributes for <li> elements that have nested <ul> 
		if ( $args->has_children && $depth == 0 ) {
                        $classes[] = 'dropdown';
			$li_attributes .= 'data-dropdown="dropdown"';
		}
		$classes[] = 'menu-item-' . $item->ID;
		// if we are on the current page, add the active class to that menu item
		// $classes[] = ($item->current) ? 'active' : '';
		// add all of the wordpress classes, including those set by user in Wordpress
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
                // add id to <li> elements
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
                // build html - the <li> elements at top level become <div>
                if ( $depth == 0 ) $output .= $indent . '<li>' . "\n" . $indent . '<div ' . $id . $value . $class_names . $li_attributes . '>';
                // 
                elseif ( $depth == 1 ) $output .= $indent . '<div class="column">';
		else $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
		// build attributes and classes for <a> link elements
		$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="'. esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
		$attributes .= ( $args->has_children && $depth == 0 ) ? ' class="dropdown-toggle" data-toggle="dropdown"' : ''; 
                // build <a> link html
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
                // add a bootstrap "caret" to top level dropdowns toggles
		$item_output .= ( $args->has_children && $depth == 0 ) ? ' <b class="caret"></b> ' : ''; 
		$item_output .= '</a>';
		$item_output .= $args->after;
                // final html output
                $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
        function end_el( &$output, $item, $depth = 0, $args = array() ) {
                // closes elements opened in start_el
                if ( $depth == 0 ) $output .= '</div>' . "\n" . '</li>' . "\n";
                elseif ( $depth == 1 ) $output .= '</div>' . "\n";
		else $output .= "</li>\n";
	}
        function end_lvl( &$output, $depth = 0, $args = array() ) {
                // code indentation
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' );
                // closes elements opened in start_lvl
                if ( $depth == 0 ) $output .= $indent . '</div>' . "\n" . $indent . '</div>' . "\n";
		else $output .= $indent . '</ul>' . "\n";
	}
        // Overwrite display_element function to add has_children attribute @since WP 3.4
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		if ( !$element )
			return;
		$id_field = $this->db_fields['id'];
		//display this element
		if ( is_array( $args[0] ) ) 
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) ) 
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'start_el'), $cb_args);
		$id = $element->$id_field;
		// descend only when the depth is right and there are children for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {
			foreach( $children_elements[ $id ] as $child ){
				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
				unset( $children_elements[ $id ] );
		}
		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
		}
		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);
	}
}
class wp_bootstrap_navwalker extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			if ( $args->has_children )
				$class_names .= ' dropdown';
			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
			$output .= $indent . '<li' . $id . $value . $class_names .'>';
			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				$atts['href']   		= '#';
				$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
			$item_output = $args->before;
			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .'><span class="glyphicon ' . strtolower(str_replace(' ', '_', esc_attr( $item->attr_title ))) . '"></span>';
			else
				$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;
        $id_field = $this->db_fields['id'];
        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {
			extract( $args );
			$fb_output = null;
			if ( $container ) {
				$fb_output = '<' . $container;
				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';
				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';
				$fb_output .= '>';
			}
			$fb_output .= '<ul';
			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';
			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';
			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';
			if ( $container )
				$fb_output .= '</' . $container . '>';
			echo $fb_output;
		}
	}
}
//Custom Post Types code generated from CPTUI
add_action( 'init', 'cptui_register_my_cpts_alumni_story' );
function cptui_register_my_cpts_alumni_story() {
	$labels = array(
		"name" => __( 'Alumni Stories', 'upcmc' ),
		"singular_name" => __( 'Alumni Story', 'upcmc' ),
		"search_items" => __( 'Search Alumni Stories', 'upcmc' ),
		"all_items" => __( 'All Alumni Stories', 'upcmc' ),
		"edit_item" => __( 'Edit Alumni Story', 'upcmc' ),
		"update_item" => __( 'Update Alumni Story', 'upcmc' ),
		"add_new_item" => __( 'Add New Alumni Story', 'upcmc' ),
		"new_item_name" => __( 'New Alumni Story', 'upcmc' ),
		"menu_name" => __( 'Alumni Story', 'upcmc' ),
		);
	$args = array(
		"label" => __( 'Alumni Stories', 'upcmc' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "alumni_story", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,"menu_icon" => "dashicons-book-alt",
		"supports" => array( "title", "editor", "thumbnail", "excerpt" ),	
		"taxonomies" => array( "department", "category", "post_tag" ),
			);
	register_post_type( "alumni_story", $args );
// End of cptui_register_my_cpts_alumni_story()
}
add_action( 'init', 'cptui_register_my_cpts_news' );
function cptui_register_my_cpts_news() {
	$labels = array(
		"name" => __( 'News', 'upcmc' ),
		"singular_name" => __( 'News', 'upcmc' ),
		"search_items" => __( 'Search News', 'upcmc' ),
		"all_items" => __( 'All News', 'upcmc' ),
		"edit_item" => __( 'Edit News', 'upcmc' ),
		"update_item" => __( 'Update News', 'upcmc' ),
		"add_new_item" => __( 'Add New News', 'upcmc' ),
		"new_item_name" => __( 'New News', 'upcmc' ),
		"menu_name" => __( 'News', 'upcmc' ),
		);
	$args = array(
		"label" => __( 'News', 'upcmc' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "news", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,"menu_icon" => "dashicons-media-document",
		"supports" => array( "title", "editor", "thumbnail", "page-attributes", "excerpt" ),		
		"taxonomies" => array( "department", "category", "post_tag" ),
			);
	register_post_type( "news", $args );
// End of cptui_register_my_cpts_news()
}
add_action( 'init', 'cptui_register_my_cpts_press_release' );
function cptui_register_my_cpts_press_release() {
	$labels = array(
		"name" => __( 'Announcements & Press Releases', 'upcmc' ),
		"singular_name" => __( 'Announcements & Press Releases', 'upcmc' ),
		"search_items" => __( 'Search Announcements & Press Releases', 'upcmc' ),
		"all_items" => __( 'All Announcements & Press Releases', 'upcmc' ),
		"edit_item" => __( 'Edit Announcements & Press Releases', 'upcmc' ),
		"update_item" => __( 'Update Announcements & Press Releases', 'upcmc' ),
		"add_new_item" => __( 'Add New Announcements & Press Releases', 'upcmc' ),
		"new_item_name" => __( 'New Announcements & Press Releases', 'upcmc' ),
		"menu_name" => __( 'Announcements & Press Releases', 'upcmc' ),
		);
	$args = array(
		"label" => __( 'Announcements & Press Releases', 'upcmc' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "press_release", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,"menu_icon" => "dashicons-megaphone",
		"supports" => array( "title", "editor", "thumbnail", "page-attributes", "excerpt" ),		
		"taxonomies" => array( "department", "category", "post_tag" ),
			);
	register_post_type( "press_release", $args );
// End of cptui_register_my_cpts_press_release()
}
add_action( 'init', 'cptui_register_my_cpts_event' );
function cptui_register_my_cpts_event() {
	$labels = array(
		"name" => __( 'Events', 'upcmc' ),
		"singular_name" => __( 'Event', 'upcmc' ),
		"search_items" => __( 'Search Events', 'upcmc' ),
		"all_items" => __( 'All Events', 'upcmc' ),
		"edit_item" => __( 'Edit Event', 'upcmc' ),
		"update_item" => __( 'Update Event', 'upcmc' ),
		"add_new_item" => __( 'Add New Event', 'upcmc' ),
		"new_item_name" => __( 'New Event', 'upcmc' ),
		"menu_name" => __( 'Event', 'upcmc' ),
		);
	$args = array(
		"label" => __( 'Events', 'upcmc' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "event", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,"menu_icon" => "dashicons-calendar-alt",
		"supports" => array( "title", "editor", "thumbnail", "page-attributes", "excerpt" ),		
		"taxonomies" => array( "department", "category", "post_tag" ),
			);
	register_post_type( "event", $args );
// End of cptui_register_my_cpts_event()
}
add_action( 'init', 'cptui_register_my_cpts_course' );
function cptui_register_my_cpts_course() {
	$labels = array(
		"name" => __( 'Courses', 'upcmc' ),
		"singular_name" => __( 'Course', 'upcmc' ),
		"search_items" => __( 'Search Courses', 'upcmc' ),
		"all_items" => __( 'All Courses', 'upcmc' ),
		"edit_item" => __( 'Edit Course', 'upcmc' ),
		"update_item" => __( 'Update Course', 'upcmc' ),
		"add_new_item" => __( 'Add New Course', 'upcmc' ),
		"new_item_name" => __( 'New Course', 'upcmc' ),
		"menu_name" => __( 'Course', 'upcmc' ),
		);
	$args = array(
		"label" => __( 'Courses', 'upcmc' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "course", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,"menu_icon" => "dashicons-welcome-learn-more",
		"supports" => array( "title", "editor", "thumbnail", "page-attributes" ),		
		"taxonomies" => array( "department", "program" ),
			);
	register_post_type( "course", $args );
// End of cptui_register_my_cpts_course()
}
add_action( 'init', 'cptui_register_my_cpts_faculty_member' );
function cptui_register_my_cpts_faculty_member() {
	$labels = array(
		"name" => __( 'Faculty Members', 'upcmc' ),
		"singular_name" => __( 'Faculty Member', 'upcmc' ),
		"search_items" => __( 'Search Faculty Members', 'upcmc' ),
		"all_items" => __( 'All Faculty Members', 'upcmc' ),
		"edit_item" => __( 'Edit Faculty Member', 'upcmc' ),
		"update_item" => __( 'Update Faculty Member', 'upcmc' ),
		"add_new_item" => __( 'Add New Faculty Member', 'upcmc' ),
		"new_item_name" => __( 'New Faculty Member', 'upcmc' ),
		"menu_name" => __( 'Faculty Member', 'upcmc' ),
		);
	$args = array(
		"label" => __( 'Faculty Members', 'upcmc' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "faculty", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,"menu_icon" => "dashicons-groups",
		"supports" => array( "title", "thumbnail", "page-attributes" ),
		"taxonomies" => array( "department", "program" ),
			);	register_post_type( "faculty", $args );
// End of cptui_register_my_cpts_faculty_member()
}
add_action( 'init', 'cptui_register_my_taxes_department' );
function cptui_register_my_taxes_department() {
	$labels = array(
		"name" => __( 'Department', 'upcmc' ),
		"singular_name" => __( 'Department', 'upcmc' ),
		"search_items" => __( 'Search Departments', 'upcmc' ),
		"all_items" => __( 'All Departments', 'upcmc' ),
		"parent_item" => __( 'Parent Department', 'upcmc' ),
		"parent_item_colon" => __( 'Parent Department:', 'upcmc' ),
		"edit_item" => __( 'Edit Department', 'upcmc' ),
		"update_item" => __( 'Update Department', 'upcmc' ),
		"add_new_item" => __( 'Add New Department', 'upcmc' ),
		"new_item_name" => __( 'New Department', 'upcmc' ),
		"menu_name" => __( 'Department', 'upcmc' ),
		);
	$args = array(
		"label" => __( 'Department', 'upcmc' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Department",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'department', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "department", array( "course", "faculty" ), $args );
// End cptui_register_my_taxes_department()
}
add_action( 'init', 'cptui_register_my_taxes_program' );
function cptui_register_my_taxes_program() {
	$labels = array(
		"name" => __( 'Program', 'upcmc' ),
		"singular_name" => __( 'Program', 'upcmc' ),
		"search_items" => __( 'Search Programs', 'upcmc' ),
		"all_items" => __( 'All Programs', 'upcmc' ),
		"parent_item" => __( 'Parent Program', 'upcmc' ),
		"parent_item_colon" => __( 'Parent Program:', 'upcmc' ),
		"edit_item" => __( 'Edit Program', 'upcmc' ),
		"update_item" => __( 'Update Program', 'upcmc' ),
		"add_new_item" => __( 'Add New Program', 'upcmc' ),
		"new_item_name" => __( 'New Program', 'upcmc' ),
		"menu_name" => __( 'Program', 'upcmc' ),
		);
	$args = array(
		"label" => __( 'Program', 'upcmc' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Program",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'program', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "program", array( "course", "faculty" ), $args );
// End cptui_register_my_taxes_program()
}
add_action( 'init', 'cptui_register_my_cpts_slider' );
function cptui_register_my_cpts_slider() {
	$labels = array(
		"name" => __( 'Sliders', 'upcmc' ),
		"singular_name" => __( 'Slider', 'upcmc' ),
		"search_items" => __( 'Search Sliders', 'upcmc' ),
		"all_items" => __( 'All Sliders', 'upcmc' ),
		"edit_item" => __( 'Edit Slider', 'upcmc' ),
		"update_item" => __( 'Update Slider', 'upcmc' ),
		"add_new_item" => __( 'Add New Slider', 'upcmc' ),
		"new_item_name" => __( 'New Slider', 'upcmc' ),
		"menu_name" => __( 'Slider', 'upcmc' ),
		);
	$args = array(
		"label" => __( 'Sliders', 'upcmc' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "slider", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,"menu_icon" => "dashicons-slides",
		"supports" => array( "title", "editor", "thumbnail", "page-attributes" ),
		"taxonomies" => array( "slider_position" ),
);
	register_post_type( "slider", $args );
// End of cptui_register_my_cpts_slider()
}
add_action( 'init', 'cptui_register_my_taxes_slider_position' );
function cptui_register_my_taxes_slider_position() {
	$labels = array(
		"name" => __( 'Slider Position', 'upcmc' ),
		"singular_name" => __( 'Slider Position', 'upcmc' ),
		"search_items" => __( 'Search Slider Positions', 'upcmc' ),
		"all_items" => __( 'All Slider Positions', 'upcmc' ),
		"parent_item" => __( 'Parent Slider Position', 'upcmc' ),
		"parent_item_colon" => __( 'Parent Slider Position:', 'upcmc' ),
		"edit_item" => __( 'Edit Slider Position', 'upcmc' ),
		"update_item" => __( 'Update Slider Position', 'upcmc' ),
		"add_new_item" => __( 'Add New Slider Position', 'upcmc' ),
		"new_item_name" => __( 'New Slider Position', 'upcmc' ),
		"menu_name" => __( 'Slider Position', 'upcmc' ),
		);
	$args = array(
		"label" => __( 'Slider Position', 'upcmc' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Slider Position",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'slider_position', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "slider_position", array( "slider" ), $args );
// End cptui_register_my_taxes_slider_position()
}
add_action( 'init', 'cptui_register_my_cpts_link' );
function cptui_register_my_cpts_link() {
	$labels = array(
		"name" => __( 'Links', 'upcmc' ),
		"singular_name" => __( 'Link', 'upcmc' ),
		"search_items" => __( 'Search Links', 'upcmc' ),
		"all_items" => __( 'All Links', 'upcmc' ),
		"edit_item" => __( 'Edit Link', 'upcmc' ),
		"update_item" => __( 'Update Link', 'upcmc' ),
		"add_new_item" => __( 'Add New Link', 'upcmc' ),
		"new_item_name" => __( 'New Link', 'upcmc' ),
		"menu_name" => __( 'Quick Links', 'upcmc' ),
		);
	$args = array(
		"label" => __( 'Links', 'upcmc' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "link", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,"menu_icon" => "dashicons-admin-links",
		"supports" => array( "title", "page-attributes" ),
	);
	register_post_type( "link", $args );
// End of cptui_register_my_cpts_link()
}
add_action( 'init', 'cptui_register_my_cpts_personnel' );
function cptui_register_my_cpts_personnel() {
	$labels = array(
		"name" => __( 'Personnels', 'upcmc' ),
		"singular_name" => __( 'Personnel', 'upcmc' ),
		"search_items" => __( 'Search Personnels', 'upcmc' ),
		"all_items" => __( 'All Personnels', 'upcmc' ),
		"edit_item" => __( 'Edit Personnel', 'upcmc' ),
		"update_item" => __( 'Update Personnel', 'upcmc' ),
		"add_new_item" => __( 'Add New Personnel', 'upcmc' ),
		"new_item_name" => __( 'New Personnel', 'upcmc' ),
		"menu_name" => __( 'Personnel', 'upcmc' ),
		);
	$args = array(
		"label" => __( 'Personnels', 'upcmc' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "personnel", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,"menu_icon" => "dashicons-id-alt",
		"supports" => array( "title", "thumbnail", "page-attributes" ),
		"taxonomies" => array( "personnel_type", "office" ),
			);	register_post_type( "personnel", $args );
// End of cptui_register_my_cpts_personnel()
}
add_action( 'init', 'cptui_register_my_taxes_personnel_type' );
function cptui_register_my_taxes_personnel_type() {
	$labels = array(
		"name" => __( 'Personnel Type', 'upcmc' ),
		"singular_name" => __( 'Personnel Type', 'upcmc' ),
		"search_items" => __( 'Search Personnel Types', 'upcmc' ),
		"all_items" => __( 'All Personnel Types', 'upcmc' ),
		"parent_item" => __( 'Parent Personnel Type', 'upcmc' ),
		"parent_item_colon" => __( 'Parent Personnel Type:', 'upcmc' ),
		"edit_item" => __( 'Edit Personnel Type', 'upcmc' ),
		"update_item" => __( 'Update Personnel Type', 'upcmc' ),
		"add_new_item" => __( 'Add New Personnel Type', 'upcmc' ),
		"new_item_name" => __( 'New Personnel Type', 'upcmc' ),
		"menu_name" => __( 'Personnel Type', 'upcmc' ),
		);
	$args = array(
		"label" => __( 'Personnel Type', 'upcmc' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Personnel Type",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'personnel_type', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "personnel_type", array( "personnel" ), $args );
// End cptui_register_my_taxes_personnel_type()
}
add_action( 'init', 'cptui_register_my_taxes_office' );
function cptui_register_my_taxes_office() {
	$labels = array(
		"name" => __( 'Office', 'upcmc' ),
		"singular_name" => __( 'Office', 'upcmc' ),
		"search_items" => __( 'Search Offices', 'upcmc' ),
		"all_items" => __( 'All Offices', 'upcmc' ),
		"parent_item" => __( 'Parent Office', 'upcmc' ),
		"parent_item_colon" => __( 'Parent Office:', 'upcmc' ),
		"edit_item" => __( 'Edit Office', 'upcmc' ),
		"update_item" => __( 'Update Office', 'upcmc' ),
		"add_new_item" => __( 'Add New Office', 'upcmc' ),
		"new_item_name" => __( 'New Office', 'upcmc' ),
		"menu_name" => __( 'Office', 'upcmc' ),
		);
	$args = array(
		"label" => __( 'Office', 'upcmc' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Office",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'office', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "office", array( "personnel" ), $args );
// End cptui_register_my_taxes_office()
}
add_action( 'init', 'cptui_register_my_cpts_video' );
function cptui_register_my_cpts_video() {
	$labels = array(
		"name" => __( 'Videos', 'upcmc' ),
		"singular_name" => __( 'Video', 'upcmc' ),
		"search_items" => __( 'Search Videos', 'upcmc' ),
		"all_items" => __( 'All Videos', 'upcmc' ),
		"edit_item" => __( 'Edit Video', 'upcmc' ),
		"update_item" => __( 'Update Video', 'upcmc' ),
		"add_new_item" => __( 'Add New Video', 'upcmc' ),
		"new_item_name" => __( 'New Video', 'upcmc' ),
		"menu_name" => __( 'Video', 'upcmc' ),
		);
	$args = array(
		"label" => __( 'Videos', 'upcmc' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "video", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,"menu_icon" => "dashicons-video-alt3",
		"supports" => array( "title", "thumbnail", "page-attributes" ),
		"taxonomies" => array( "category", "post_tag" ),
			);	register_post_type( "video", $args );
// End of cptui_register_my_cpts_video()
}
add_filter( 'manage_edit-slider_columns', 'upcmc_edit_slider_columns' ) ;
function upcmc_edit_slider_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Slider Item' ),
		'slider_position' => __( 'Slider Position' ),
		'date' => __( 'Date' )
	);
	return $columns;
}
add_action( 'manage_slider_posts_custom_column', 'upcmc_manage_slider_columns', 10, 2 );
function upcmc_manage_slider_columns( $column, $post_id ) {
	global $post;
	switch( $column ) {
		/* If displaying the 'slider_position' column. */
		case 'slider_position' :
			/* Get the position for the post. */
			$terms = get_the_terms( $post_id, 'slider_position' );
			/* If terms were found. */
			if ( !empty( $terms ) ) {
				$out = array();
				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'slider_position' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'slider_position', 'display' ) )
					);
				}
				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}
			/* If no terms were found, output a default message. */
			else {
				_e( 'No Slider Position' );
			}
			break;
		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}
add_filter( 'manage_edit-slider_sortable_columns', 'upcmc_slider_sortable_columns' );
function upcmc_slider_sortable_columns( $columns ) {
	$columns['slider_position'] = 'slider_position';
	return $columns;
}
add_filter( 'manage_edit-course_columns', 'upcmc_edit_course_columns' ) ;
function upcmc_edit_course_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Course' ),
		'department' => __( 'Department' ),
		'program' => __( 'Program' ),
		'date' => __( 'Date' )
	);
	return $columns;
}
add_action( 'manage_course_posts_custom_column', 'upcmc_manage_course_columns', 10, 2 );
function upcmc_manage_course_columns( $column, $post_id ) {
	global $post;
	switch( $column ) {
		/* If displaying the 'department' column. */
		case 'department' :
			/* Get the position for the post. */
			$terms = get_the_terms( $post_id, 'department' );
			/* If terms were found. */
			if ( !empty( $terms ) ) {
				$out = array();
				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'department' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'department', 'display' ) )
					);
				}
				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}
			/* If no terms were found, output a default message. */
			else {
				_e( 'No Department Assigned' );
			}
			break;
		/* If displaying the 'program' column. */
		case 'program' :
			/* Get the position for the post. */
			$terms = get_the_terms( $post_id, 'program' );
			/* If terms were found. */
			if ( !empty( $terms ) ) {
				$out = array();
				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'program' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'program', 'display' ) )
					);
				}
				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}
			/* If no terms were found, output a default message. */
			else {
				_e( 'No Program Assigned' );
			}
			break;
		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}
add_filter( 'manage_edit-course_sortable_columns', 'upcmc_course_sortable_columns' );
function upcmc_course_sortable_columns( $columns) {
	$columns['department'] = 'department';
	//$columns['program'] = 'program';
	return $columns;
}
add_filter( 'manage_edit-personnel_columns', 'upcmc_edit_personnel_columns' ) ;
function upcmc_edit_personnel_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Name' ),
		'personnel_type' => __( 'Type' ),
		'office' => __( 'Office' ),
		'date' => __( 'Date' )
	);
	return $columns;
}
add_action( 'manage_personnel_posts_custom_column', 'upcmc_manage_personnel_columns', 10, 2 );
function upcmc_manage_personnel_columns( $column, $post_id ) {
	global $post;
	switch( $column ) {
		/* If displaying the 'department' column. */
		case 'personnel_type' :
			/* Get the type for the post. */
			$terms = get_the_terms( $post_id, 'personnel_type' );
			/* If terms were found. */
			if ( !empty( $terms ) ) {
				$out = array();
				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'personnel_type' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'personnel_type', 'display' ) )
					);
				}
				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}
			/* If no terms were found, output a default message. */
			else {
				_e( 'No Personnel Type Assigned' );
			}
			break;
		/* If displaying the 'office' column. */
		case 'office' :
			/* Get the position for the post. */
			$terms = get_the_terms( $post_id, 'office' );
			/* If terms were found. */
			if ( !empty( $terms ) ) {
				$out = array();
				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'office' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'office', 'display' ) )
					);
				}
				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}
			/* If no terms were found, output a default message. */
			else {
				_e( 'No Office Assigned' );
			}
			break;
		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}
add_filter( 'manage_edit-personnel_sortable_columns', 'upcmc_personnel_sortable_columns' );
function upcmc_personnel_sortable_columns( $columns) {
	$columns['personnel_type'] = 'department';
	//$columns['office'] = 'program';
	return $columns;
}
add_filter( 'manage_edit-faculty_columns', 'upcmc_edit_faculty_columns' ) ;
function upcmc_edit_faculty_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Name' ),
		'department' => __( 'Department' ),
		'program' => __( 'Program' ),
		'date' => __( 'Date' )
	);
	return $columns;
}
add_action( 'manage_faculty_posts_custom_column', 'upcmc_manage_faculty_columns', 10, 2 );
function upcmc_manage_faculty_columns( $column, $post_id ) {
	global $post;
	switch( $column ) {
		/* If displaying the 'department' column. */
		case 'department' :
			/* Get the position for the post. */
			$terms = get_the_terms( $post_id, 'department' );
			/* If terms were found. */
			if ( !empty( $terms ) ) {
				$out = array();
				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'department' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'department', 'display' ) )
					);
				}
				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}
			/* If no terms were found, output a default message. */
			else {
				_e( 'No Department Assigned' );
			}
			break;
		/* If displaying the 'program' column. */
		case 'program' :
			/* Get the position for the post. */
			$terms = get_the_terms( $post_id, 'program' );
			/* If terms were found. */
			if ( !empty( $terms ) ) {
				$out = array();
				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'program' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'program', 'display' ) )
					);
				}
				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}
			/* If no terms were found, output a default message. */
			else {
				_e( 'No Program Assigned' );
			}
			break;
		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}
add_filter( 'manage_edit-faculty_sortable_columns', 'upcmc_faculty_sortable_columns' );
function upcmc_faculty_sortable_columns( $columns) {
	$columns['department'] = 'department';
	//$columns['program'] = 'program';
	return $columns;
}
add_filter( 'wp_nav_menu_items', 'utility_navigation_hamburger_menu_item', 10, 2 );
function utility_navigation_hamburger_menu_item( $items, $args ) {
    if ($args->theme_location == 'utility_navigation') {
        $items .= '<li class="search-menu-item" data-toggle="collapse" data-target="#menu_searchform"><i class="fa fa-search" aria-hidden="true"></i></li><li class="toggle-menu-item"><button class="c-hamburger c-hamburger--htx"><span>toggle menu</span></button></li>';
    }
    return $items;
}
require_once dirname( __FILE__ ) . '/includes/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'upcmc_register_required_plugins' );
function upcmc_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// This is an example of how to include a plugin bundled with a theme.
		//array(
		//	'name'               => 'TGM Example Plugin', // The plugin name.
		//	'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
		//	'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
		//	'required'           => true, // If false, the plugin is only 'recommended' instead of required.
		//	'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
		//	'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
		//	'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		//	'external_url'       => '', // If set, overrides default API URL and points to an external URL.
		//	'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		//),
		// This is an example of how to include a plugin from an arbitrary external source in your theme.
		array(
			'name'         => 'WonderPlugin Lightbox', // The plugin name.
			'slug'         => 'wonderplugin-lightbox', // The plugin slug (typically the folder name).
			'source'       => get_stylesheet_directory() . '/plugins/wonderplugin-lightbox-free.zip', // The plugin source.
			'version'      => '5.2',
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => 'https://www.wonderplugin.com/download/wonderplugin-lightbox-free.zip', // If set, overrides default API URL and points to an external URL.
		),
		// This is an example of how to include a plugin from a GitHub repository in your theme.
		// This presumes that the plugin code is based in the root of the GitHub repository
		// and not in a subdirectory ('/src') of the repository.
		//array(
		//	'name'      => 'Adminbar Link Comments to Pending',
		//	'slug'      => 'adminbar-link-comments-to-pending',
		//	'source'    => 'https://github.com/jrfnl/WP-adminbar-comments-to-pending/archive/master.zip',
		//),
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		//array(
		//	'name'      => 'BuddyPress',
		//	'slug'      => 'buddypress',
		//	'required'  => false,
		//),
		// This is an example of the use of 'is_callable' functionality. A user could - for instance -
		// have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
		// 'wordpress-seo-premium'.
		// By setting 'is_callable' to either a function from that plugin or a class method
		// `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
		// recognize the plugin as being installed.
		//array(
		//	'name'        => 'WordPress SEO by Yoast',
		//	'slug'        => 'wordpress-seo',
		//	'is_callable' => 'wpseo_init',
		//),
	);
	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
			'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'theme-slug' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'theme-slug' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'theme-slug' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'theme-slug'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'theme-slug'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'theme-slug'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'theme-slug'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'theme-slug'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'theme-slug'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'theme-slug'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'theme-slug'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'theme-slug'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'theme-slug' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'theme-slug' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'theme-slug' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'theme-slug' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'theme-slug' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'theme-slug' ),
			'dismiss'                         => __( 'Dismiss this notice', 'theme-slug' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'theme-slug' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'theme-slug' ),
			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);
	tgmpa( $plugins, $config );
}
/*	Custom Widgets	*/
class upcmc_search_widget extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'upcmc_search_widget',
			'description' => 'Custom widget for UP CMC custom search.'
		);
		parent::__construct( 'upcmc_search_widget', 'UP CMC Custom Search Widget', $widget_ops );
	}
	function form($instance) {
		$title   = esc_attr( isset( $instance['title'] ) ? $instance['title'] : 'Search' );
		$placeholder   = esc_attr( isset( $instance['placeholder'] ) ? $instance['placeholder'] : 'Search UP CMC website' );
		$posttype = esc_attr( isset( $instance['posttype'] ) ? $instance['posttype'] : 'All' );
?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'placeholder' ); ?>"><?php _e( 'Search input placeholder:' ); ?>
				<input class="widefat" id="<?php echo $this->get_field_id( 'placeholder' ); ?>" name="<?php echo $this->get_field_name( 'placeholder' ); ?>" type="text" value="<?php echo $placeholder; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('posttype'); ?>"><?php _e('Post Type to search:'); ?></label>
			<select id="<?php echo $this->get_field_id('posttype'); ?>"  name="<?php echo $this->get_field_name('posttype'); ?>">
				<?php $this->getPostTypes($posttype); ?>
			</select>
		</p>
<?php
	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['placeholder'] = strip_tags($new_instance['placeholder']);
		$instance['posttype'] = strip_tags($new_instance['posttype']);
		return $instance;
	}
	function widget($args, $instance) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		$placeholder = apply_filters('widget_title', $instance['placeholder']);
		$posttype = apply_filters('widget_title', $instance['posttype']);
		echo $before_widget;
		echo '<div class="upcmcsearchwidget">';
		if($title){
			echo '<div class="upcmcsearchtitle">' . $before_title . $title . $after_title . '</div>';
		}
		if($posttype){
			echo '<form method="get" class="customsearchform-' . $posttype . '" id="customsearchform" action="' . get_bloginfo('home') . '/"><input type="text" value="" name="s" id="s" ' . ($placeholder ? ' placeholder="' . $placeholder . '"' : '') . ' /><input type="hidden" name="search-type" value="' . $posttype . '" /><input name="submit" type="submit" value="Go" /></form>';
		}
		echo '</div>';
		echo $after_widget;
	}
	function getPostTypes($type){
		echo '<option ' . (('all' == $type) ? 'selected="selected"' : '') . ' value="all">all</option>';
		foreach ( get_post_types( array('public' => true, 'publicly_queryable' => true, 'exclude_from_search' => false), 'names' ) as $post_type ) {
			if($post_type !== 'attachment'){
				echo '<option ' . (($post_type == $type) ? 'selected="selected"' : '') . ' value="'.$post_type.'">'.$post_type.'</option>';
			}
		}	
	}
}
class upcmc_categories_widget extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'upcmc_categories_widget',
			'description' => 'Custom widget for UP CMC post categories.'
		);
		parent::__construct( 'upcmc_categories_widget', 'UP CMC Posts Category Widget', $widget_ops );
	}
	function form($instance) {
		$title   = esc_attr( isset( $instance['title'] ) ? $instance['title'] : 'Blog Category' );
		$num = esc_attr( isset( $instance['num'] ) ? $instance['num'] : '5' );
?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('num'); ?>"><?php _e('Number of Categories to initially show:'); ?></label>
			<select id="<?php echo $this->get_field_id('num'); ?>"  name="<?php echo $this->get_field_name('num'); ?>">
				<?php for($x=1;$x<=$this->getCategoryCount();$x++): ?>
				<option <?php echo $x == $num ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
				<?php endfor;?>
			</select>
		</p>
<?php
	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['num'] = strip_tags($new_instance['num']);
		return $instance;
	}
	function widget($args, $instance) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		$num = apply_filters('widget_title', $instance['num']);
		echo $before_widget;
		echo '<div class="blogcategorywidget">';
		if($title){
			echo '<div class="blogcategorytitle">' . $before_title . '<span>' . $title . '</span>' . $after_title . '</div>';
		}
		if($num){
			$this->getCategories($num);
		}
		echo '</div>';
		echo $after_widget;
	}
	function getCategoryCount(){
		$categories = get_categories();
		return count($categories);
	}
	function getCategories($num){
		global $post;
		$ID = $post->ID;
		$cur_cat_id = get_cat_id( single_cat_title("",false) );
		$categories = get_categories();
		$num2 = count($categories);
		$more = $num2 - $num;
		$count = 0;
		if(count($categories)>0){
			echo '<form class="categoryform">';
			$post_object = get_field('blogs_page', 'option');
			if( $post_object ){
				$post = $post_object;
				setup_postdata( $post ); 
				echo '<p class="categoryitem-recent odd"><input id="recent" type="radio" name="categoryitem" value="' . get_the_permalink($post->ID) . '" ' . ($post->ID==$ID ? ' checked' : '') . ' onclick = "document.location.href=\'' . get_the_permalink($post->ID) . '\'" /><label for="recent">Most Recent</label></p>';
				wp_reset_postdata();
			}
			foreach ($categories as $cat) {
				$count += 1;
				if((($count - 1) == $num) && ($more>0)){
					echo '<div class="collapse" id="morecontent">';
				}
				echo '<p class="categoryitem-'. $count . ((($count + 1) % 2 == 0) ? ' even' : ' odd') .'"><input id="category-' . $cat->cat_ID . '" type="radio" name="categoryitem" value="' . get_category_link($cat->cat_ID) . '" ' . ($cat->cat_ID==$cur_cat_id ? ' checked' : '') . ' onclick = "document.location.href=\'' . get_category_link($cat->cat_ID) . '\'" /><label for="category-' . $cat->cat_ID . '">'. $cat->name. '</label></p>';
			}
			if($more>0){
				$count += 1;
				echo '</div><p class="categoryitem-more categoryitem-'. $count . ((($count + 1) % 2 == 0) ? ' even' : ' odd') .'"><a href="#morecontent"  data-toggle="collapse" class="collapsed"><span class="see-more">See ' . $more . ' more</span></a></p>';
			}
			echo '</form>';
		}
	}
}
class upcmc_recent_news_widget extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'upcmc_recent_news_widget',
			'description' => 'Custom widget for UP CMC recent posts.'
		);
		parent::__construct( 'upcmc_recent_news_widget', 'UP CMC Recent Posts Widget', $widget_ops );
	}
	function form($instance) {
		$title   = esc_attr( isset( $instance['title'] ) ? $instance['title'] : 'Recent Posts' );
		$posttype = esc_attr( isset( $instance['posttype'] ) ? $instance['posttype'] : 'All' );
		$num = esc_attr( isset( $instance['num'] ) ? $instance['num'] : '' );
?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('posttype'); ?>"><?php _e('Post Type display:'); ?></label>
			<select id="<?php echo $this->get_field_id('posttype'); ?>"  name="<?php echo $this->get_field_name('posttype'); ?>">
				<?php $this->getPostTypes($posttype); ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('num'); ?>"><?php _e('Number of Recent Posts to display:'); ?></label>
			<select id="<?php echo $this->get_field_id('num'); ?>"  name="<?php echo $this->get_field_name('num'); ?>">
				<?php for($x=1;$x<=10;$x++): ?>
				<option <?php echo $x == $num ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
				<?php endfor;?>
			</select>
		</p>
<?php
	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['posttype'] = strip_tags($new_instance['posttype']);
		$instance['num'] = strip_tags($new_instance['num']);
		return $instance;
	}
	function widget($args, $instance) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		$posttype = apply_filters('widget_title', $instance['posttype']);
		$num = apply_filters('widget_title', $instance['num']);
		echo $before_widget;
		echo '<div class="recentnewswidget">';
		if($title){
			echo '<div class="recentnewstitle">' . $before_title . '<span>' . $title . '</span>' . $after_title . '</div>';
		}
		if($num && $posttype){
			$this->getRecentNews($num, $posttype);
		}
		echo '</div>';
		echo $after_widget;
	}
	function getPostTypes($type){
		echo '<option ' . (('all' == $type) ? 'selected="selected"' : '') . ' value="all">all</option>';
		foreach ( get_post_types( array('public' => true, 'publicly_queryable' => true, 'exclude_from_search' => false), 'names' ) as $post_type ) {
			if($post_type !== 'attachment'){
				echo '<option ' . (($post_type == $type) ? 'selected="selected"' : '') . ' value="'.$post_type.'">'.$post_type.'</option>';
			}
		}	
	}
	function getRecentNews($num, $post_type) {
		global $post;
		$recentnews = $wp_query;
		$wp_query= null;
		$wp_query = new WP_Query();
		$wp_query->query('post_type=' . $post_type . '&orderby=date&order=desc&showposts=' . $num);
		if ($wp_query->have_posts()) : $item = 0;
			echo '<ul class="recent-news-list">';
			while ($wp_query->have_posts()) : $wp_query->the_post();
				$item++;
				$id = get_the_ID();
				echo '<li class="news-item news-item-' . $item . ' news-item-post-id-' . $id . '"><a href="' . get_permalink($id) . '"  title="'.get_the_title().'" rel="bookmark">';
				if ( has_post_thumbnail() ) {
					$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'medium' );
					echo '<span class="news-image"><div class="icon lazy-image" data-src="'. $image_url[0] . '" data-title="' . get_the_title() . '" title="' . get_the_title() . '"></div></span>';
				} else {
					echo '<span class="news-image"><div class="icon lazy-image no-image" data-src="" data-title="' . get_the_title() . '" title="' . get_the_title() . '"></div></span>';
				}
				echo '<span class="news-title">' . get_the_title() . '</span></a></li>';
			endwhile;
			echo '</ul>';
		else : 
		endif; $wp_query = null; $wp_query = $recentnews;
	}
}
class upcmc_popular_posts_widget extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'upcmc_popular_posts_widget',
			'description' => 'Custom widget for UP CMC popular posts.'
		);
		parent::__construct( 'upcmc_popular_posts_widget', 'UP CMC Popular Posts Widget', $widget_ops );
	}
	function form($instance) {
		$title   = esc_attr( isset( $instance['title'] ) ? $instance['title'] : 'Popular Posts' );
		$posttype = esc_attr( isset( $instance['posttype'] ) ? $instance['posttype'] : 'All' );
		$num = esc_attr( isset( $instance['num'] ) ? $instance['num'] : '' );
?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('posttype'); ?>"><?php _e('Post Type display:'); ?></label>
			<select id="<?php echo $this->get_field_id('posttype'); ?>"  name="<?php echo $this->get_field_name('posttype'); ?>">
				<?php $this->getPostTypes($posttype); ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('num'); ?>"><?php _e('Number of Popular Posts to display:'); ?></label>
			<select id="<?php echo $this->get_field_id('num'); ?>"  name="<?php echo $this->get_field_name('num'); ?>">
				<?php for($x=1;$x<=10;$x++): ?>
				<option <?php echo $x == $num ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
				<?php endfor;?>
			</select>
		</p>
<?php
	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['posttype'] = strip_tags($new_instance['posttype']);
		$instance['num'] = strip_tags($new_instance['num']);
		return $instance;
	}
	function widget($args, $instance) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		$posttype = apply_filters('widget_title', $instance['posttype']);
		$num = apply_filters('widget_title', $instance['num']);
		echo $before_widget;
		echo '<div class="popularpostswidget">';
		if($title){
			echo '<div class="popularpoststitle">' . $before_title . '<span>' . $title . '</span>' . $after_title . '</div>';
		}
		if($num && $posttype){
			$this->getPopularPosts($num, $posttype);
		}
		echo '</div>';
		echo $after_widget;
	}
	function getPostTypes($type){
		echo '<option ' . (('all' == $type) ? 'selected="selected"' : '') . ' value="all">all</option>';
		foreach ( get_post_types( array('public' => true, 'publicly_queryable' => true, 'exclude_from_search' => false), 'names' ) as $post_type ) {
			if($post_type !== 'attachment'){
				echo '<option ' . (($post_type == $type) ? 'selected="selected"' : '') . ' value="'.$post_type.'">'.$post_type.'</option>';
			}
		}	
	}
	function getPopularPosts($num, $post_type) {
		global $post;
		$popularposts = $wp_query;
		$wp_query= null;
		$wp_query = new WP_Query();
		$wp_query->query('post_type=' . $post_type . '&meta_key=upcmc_post_views_count&orderby=meta_value_num&order=desc&showposts=' . $num);
		if ($wp_query->have_posts()) : $item = 0;
			echo '<ul class="popular-post-list">';
			while ($wp_query->have_posts()) : $wp_query->the_post();
				$item++;
				$id = get_the_ID();
				echo '<li class="popular-item popular-item-' . $item . ' popular-item-post-id-' . $id . '"><a href="' . get_permalink($id) . '"  title="'.get_the_title().'" rel="bookmark">';
				if ( has_post_thumbnail() ) {
					$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'medium' );
					echo '<span class="post-image"><div class="icon lazy-image" data-src="'. $image_url[0] . '" data-title="' . get_the_title() . '" title="' . get_the_title() . '"></div></span>';
				} else {
					echo '<span class="post-image"><div class="icon lazy-image no-image" data-src="" data-title="' . get_the_title() . '" title="' . get_the_title() . '"></div></span>';
				}
				echo '<span class="post-title">' . get_the_title() . '</span></a></li>';
			endwhile;
			echo '</ul>';
		else : 
		endif; $wp_query = null; $wp_query = $popularposts;
	}
}
function load_upcmc_widgets(){
	register_widget("upcmc_search_widget");
	register_widget("upcmc_categories_widget");
	register_widget("upcmc_recent_news_widget");
	register_widget("upcmc_popular_posts_widget");
}
add_action( 'widgets_init', 'load_upcmc_widgets' );
/**
 * Abstract class for counting shares 
 */
interface Share_Counter {
  /**
   * Getting the share count
   */
  public static function get_share_count( $url );
}
/**
 * Facebook Shares
 */
class FacebookShareCount implements Share_Counter {
	public static function get_share_count( $url ) {
		$facebook_app_id = "1293165577393652";
		$facebook_app_secret = "878cefcf4a348a4c8d8e7841e4c475b2";
		$access_token = $facebook_app_id . '|' . $facebook_app_secret;
		$check_url = 'https://graph.facebook.com/v2.7/?id=' . urlencode(  $url ) . '&fields=share&access_token=' . $access_token;
		$response = wp_remote_retrieve_body( wp_remote_get( $check_url ) );
		$encoded_response = json_decode( $response, true );
		$share_count = intval( $encoded_response['share']['share_count'] );
		return $share_count;
	}
}
/**
 * Twitter Shares
 */
class TwitterShareCount implements Share_Counter {
	public static function get_share_count( $url ) {
		$check_url = 'http://public.newsharecounts.com/count.json?url=' . urlencode( $url );
		$response = wp_remote_retrieve_body( wp_remote_get( $check_url ) );
		$encoded_response = json_decode( $response, true );
		$share_count = intval( $encoded_response['count'] ); 
		return $share_count;
	}
}
/**
 * Google+ Shares
 */
class GoogleShareCount implements Share_Counter {
	public static function get_share_count( $url ) {
		if( !$url ) {
	    	return 0;
	    }
		if ( !filter_var($url, FILTER_VALIDATE_URL) ){
			return 0;
		}
	    foreach (array('apis', 'plusone') as $host) {
	        $ch = curl_init(sprintf('https://%s.google.com/u/0/_/+1/fastbutton?url=%s',
	                                      $host, urlencode($url)));
	        curl_setopt_array($ch, array(
	            CURLOPT_FOLLOWLOCATION => 1,
	            CURLOPT_RETURNTRANSFER => 1,
	            CURLOPT_SSL_VERIFYPEER => 0,
	            CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 6.1; WOW64) ' .
	                                      'AppleWebKit/537.36 (KHTML, like Gecko) ' .
	                                      'Chrome/32.0.1700.72 Safari/537.36' ));
	        $response = curl_exec($ch);
	        $curlinfo = curl_getinfo($ch);
	        curl_close($ch);
	        if (200 === $curlinfo['http_code'] && 0 < strlen($response)) { break 1; }
	        $response = 0;
	    }
	    if( !$response ) {
	    		return 0;
	    }
	    preg_match_all('/window\.__SSR\s\=\s\{c:\s(\d+?)\./', $response, $match, PREG_SET_ORDER);
	    return (1 === sizeof($match) && 2 === sizeof($match[0])) ? intval($match[0][1]) : 0;
	}
}
/**
 * LinkedIN Shares
 */
class LinkedINShareCount implements Share_Counter {
	public static function get_share_count( $url ) {
		$remote_get = json_decode( file_get_contents('https://www.linkedin.com/countserv/count/share?url=' . urlencode( $url ) . '&format=json'), true);
		$share_count = $remote_get['count'];
		return $share_count; 
	}
}
/**
 * Pinterest Shares
 */
class PinterestShareCount implements Share_Counter {
	public static function get_share_count( $url ) {
		$check_url = 'http://api.pinterest.com/v1/urls/count.json?callback=pin&url=' . urlencode( $url );
		$response = wp_remote_retrieve_body( wp_remote_get( $check_url ) );
		$response = str_replace( 'pin({', '{', $response);
		$response = str_replace( '})', '}', $response);
		$encoded_response = json_decode( $response, true );
		$share_count = intval( $encoded_response['count'] ); 
		return $share_count;
	}
}
/**
 * StumbleUpon Shares
 */
class StumbleUponShareCount implements Share_Counter {
	public static function get_share_count( $url ) {
		$check_url = 'http://www.stumbleupon.com/services/1.01/badge.getinfo?url=' . urlencode( $url );
		$response = wp_remote_retrieve_body( wp_remote_get( $check_url ) );
		$encoded_response = json_decode( $response, true );
		$share_count = intval( $encoded_response['result']['views'] ); 
		return $share_count;
	}
}
function end_prev_letter() {
   end_prev_row();
   echo "</div><!-- End of letter-group -->\n";
   echo "<div class='clear clearfix'></div>\n";
}
function start_new_letter($letter) {
   echo "<div class='letter-group row'>\n";
   echo "\t<div class='letter-cell'>$letter</div>\n";
   start_new_row($letter);
}
function end_prev_row() {
   echo "\t</div><!-- End row-cells -->\n";
}
function start_new_row() {
   global $in_this_row;
   $in_this_row = 0;
   echo "\t<div class='row-cells'>\n";
}
function upcmc_create_glossary_taxonomy(){
    if(!taxonomy_exists('directory')){
        register_taxonomy('directory',array('faculty', 'personnel'),array(
            'show_ui' => false,
            'name' => 'Directory',
            'label' => 'Directory'
        ));
    }
}
add_action('init','upcmc_create_glossary_taxonomy');
/* When the post is saved, saves our custom data */
function upcmc_save_first_letter( $post_id ) {
    // verify if this is an auto save routine.
    // If it is our form has not been submitted, so we dont want to do anything
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;
    //check location (only run for posts)
    $limitPostTypes = array('faculty', 'personnel');
    if (!in_array($_POST['post_type'], $limitPostTypes)) 
        return $post_id;
    // Check permissions
    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;
    // OK, we're authenticated: we need to find and save the data
    $taxonomy = 'directory';
    //set term as first letter of post title, lower case
    if(get_field('last_name',$post_id) ){
	$last_name = get_field('last_name',$post_id);
        wp_set_post_terms( $post_id, strtolower(substr($last_name, 0, 1)), $taxonomy );
    }
    //wp_set_post_terms( $post_id, strtolower(substr($_POST['post_title'], 0, 1)), $taxonomy );
    //delete the transient that is storing the alphabet letters
    delete_transient( 'upcmc_archive_alphabet');
}
add_action( 'save_post', 'upcmc_save_first_letter' );
//create array from existing posts
function upcmc_run_once(){
    if ( false === get_transient( 'upcmc_run_once' ) ) {
        $taxonomy = 'directory';
        $alphabet = array();
        $posts = get_posts(array('numberposts' => -1) );
        foreach( $posts as $p ) :
        //set term as first letter of post title, lower case
	if(get_field('last_name',$p->ID) ){
		$last_name = get_field('last_name',$p->ID);
	        wp_set_post_terms( $p->ID, strtolower(substr($last_name, 0, 1)), $taxonomy );
	}
        endforeach;
        set_transient( 'upcmc_run_once', 'true' );
    }
}
add_action('init','upcmc_run_once');
function upcmc_add_custom_types( $query ) {
    if( is_tax() && $query->is_main_query() ) {
        // this gets all post types:
        $post_types = get_post_types();
        // alternately, you can add just specific post types using this line instead of the above:
        // $post_types = array( 'post', 'your_custom_type' );
        $query->set( 'post_type', $post_types );
    }
}
add_filter( 'pre_get_posts', 'upcmc_add_custom_types' );
function upcmc_mime_types($mime_types){
    $mime_types['vcf'] = 'text/x-vcard';
    return $mime_types;
}
add_filter('upload_mimes', 'upcmc_mime_types', 1, 1);
add_action('init', 'custom_taxonomy_flush_rewrite');
function custom_taxonomy_flush_rewrite() {
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}
?>