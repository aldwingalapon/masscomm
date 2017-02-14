<?php  
/**
 * Template Name: Taxonomy Directory
 *
 */
?>

<?php get_header(); set_upcmc_post_views(get_the_ID());
	$taxonomy = 'directory';

	// save the terms that have posts in an array as a transient
	if ( false === ( $alphabet = get_transient( 'upcmc_archive_alphabet' ) ) ) {
		// It wasn't there, so regenerate the data and save the transient
		$terms = get_terms($taxonomy);

		$alphabet = array();
		if($terms){
			foreach ($terms as $term){
				$alphabet[] = $term->slug;
			}
		}
		set_transient( 'upcmc_archive_alphabet', $alphabet );
	}
?>

<?php //if (have_posts()) : ?>
	<div class="main_content" id="taxonomy-directory">
		<div class="page-breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php if(function_exists('the_breadcrumbs')) the_breadcrumbs(); ?>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="inner_content">
			<?php //while (have_posts()) : the_post(); $the_ID = $post->ID; ?>
				<div class="container">
					<div class="row">
						<div class="col-md-8 article">
							<h2 class="article-title">Directory</h2>

							<?php the_content(); ?>

							<div id="archive-menu" class="menu">
								<ul id="alphabet-menu">
									<?php
									foreach(range('a', 'z') as $i) :
										$current = ($i == get_query_var($taxonomy) /* && !isset($_POST['search']) */) ? "current-menu-item" : "menu-item";
										if (in_array( $i, $alphabet )){
											printf( '<li class="az-char %s"><a href="%s">%s</a></li>', $current, get_term_link( $i, $taxonomy ), strtoupper($i) );
										} else {
											printf( '<li class="az-char %s">%s</li>', $current, strtoupper($i) );
										}
									endforeach;
									?>
								</ul>

								<div id="a-z">
									<?php  
										$directory = New WP_Query();
										$args = array (
											'directory' => get_query_var($taxonomy),
											'showposts' => -1,
											'post_type' => array('personnel','faculty'),
											'meta_key' => 'last_name',
											'orderby' => 'meta_value',
											'order' => 'ASC'
											);

										$directory->query($args);
										
										//echo ($last_name && $last_name !== '' ? '<p><strong>Last Name</strong> : '. $last_name.'</p>' : '' );
										//echo ($first_name && $first_name !== '' ? '<p><strong>First Name</strong> : '. $first_name.'</p>' : '' );
									?>								
								
									<?php  
										if ( $directory->have_posts() /* && isset($_POST['search']) */) {
											$in_this_row = 0;
											while ( $directory->have_posts() ) {
												$directory->the_post(); $the_ID2 = $the_ID2;
												if(get_field('last_name',$the_ID2) ){
													$title = get_field('last_name',$the_ID2);
												} else {
													$title = apply_filters('the_title',$post->post_title);
												}
												$first_letter = strtoupper(substr($title,0,1));
												if ($first_letter != $curr_letter) {
													if (++$post_count > 1) {
														end_prev_letter();
													}
													start_new_letter($first_letter);
													$curr_letter = $first_letter;
												}

												if (++$in_this_row > $posts_per_row) {
													end_prev_row();
													start_new_row();
													++$in_this_row;
												} ?>
												<div class="title-cell">
													<div class="directory-item">
														<?php
														$image = get_field('photo',$the_ID2);
														if( !empty($image) ): 
															// vars
															$url = $image['url'];
															$title = $image['title'];
															$alt = $image['alt'];

															// thumbnail
															$size = 'small-photo-thumbnails';
															$thumb = $image['sizes'][ $size ];
															$width = $image['sizes'][ $size . '-width' ];
															$height = $image['sizes'][ $size . '-height' ];

															?>
															<div class="one-fourth first"><a href="<?php echo get_the_permalink($the_ID2) ?>" rel="bookmark" title="<?php echo get_the_title($the_ID2); ?>"><img class="photo" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" /></a></div>
														<?php else: ?>
															<div class="one-fourth first"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/blank.jpg" width="100" height="100" /></div>
														<?php endif; ?>
														<div class="one-fourth">
															<?php 
																if(get_post_type(get_the_ID()) == 'faculty'){
																	$post_object = get_field('faculty_members_page', 'option');
																	if( $post_object ){
																		echo '<span class="faculty_members-page personnel-type"><span class="title-group"><a class="personnel-type" href="'.get_the_permalink($post_object).'">' . get_the_title($post_object) . '</a></span></span><span class="faculty_department">' . courses_department_links($the_ID2) . '</span>';
																	}																
																}else{
																	$post_object = get_field('personnel_page', 'option');
																	if( $post_object ){
																		echo '<span class="personnel-page personnel-type"><span class="title-group"><a class="personnel-type" href="'.get_the_permalink($post_object).'">' . get_the_title($post_object) . '</a><span class="personnel_type">' . personnel_type_links($the_ID2) . '</span></span><span class="personnel_office">' . personnel_office_links($the_ID2) . '</span>';
																	}																
																}
															?>
															<br/><a href="<?php echo get_the_permalink($the_ID2) ?>" rel="bookmark" title="<?php echo get_the_title($the_ID2); ?>"><?php echo get_the_title($the_ID2); ?></a><?php echo(get_field('position',$the_ID2) ? '<br/><span class="position">'.get_field('position',$the_ID2).'</span>' : ''); ?>
															<?php
																if( have_rows('designations', $the_ID2 ) ): echo '<br/>(';
																	while ( have_rows('designations', $the_ID2 ) ) : the_row();
																		$department = get_sub_field('department_name', $the_ID2 );
																		$office = get_sub_field('office_name', $the_ID2 );
																		$designation = get_sub_field('designation', $the_ID2 );
																		echo ($department ? '<span class="designation">' . $designation . ' - <a href="' . get_term_link( $department ) . '" title="' . $department->name . '">' . $department->name . '</a></span>' : ($office ? '<span class="designation">' . $designation . ' - <a href="' . get_term_link( $office ) . '" title="' . $office->name . '">' . $office->name . '</a></span>' : '<span class="designation">' . $designation . '</span>'));
																	endwhile;
																	echo ')';
																else :
																endif;
															?>					
														</div>
														<div class="clear-line"></div>
													</div>
												</div>
											<?php }
												end_prev_letter();
											?>
										<?php /* } else {echo (isset($_POST['search']) ? '<h2>Sorry, no records were found!</h2>' : ''); */} ?>								
								</div>
							</div>
						</div>
						<div class="col-md-4 aside">
							<?php
								//if( have_rows('page_widgets', $the_ID ) ):
								//	while ( have_rows('page_widgets', $the_ID ) ) : the_row();
								//		dynamic_sidebar( get_sub_field('sidebar_widget', $the_ID ) );
								//	endwhile;
								//else :
										dynamic_sidebar('Default Page Sidebar');
								//endif;
							?>					
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>				
				</div>
			<?php //endwhile; ?>
		</div>
	</div>
<?php //else : ?>
<?php //endif; ?>

<?php wp_reset_query(); ?>

<?php get_footer(); ?>