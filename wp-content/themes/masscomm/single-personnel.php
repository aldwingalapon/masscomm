<?php  
/**
 * Template Name: Single Personnel
 *
 */
?>

<?php get_header(); set_upcmc_post_views(get_the_ID()); ?>

<?php if (have_posts()) : ?>
	<div class="main_content" id="single-personnel">
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
			<?php while (have_posts()) : the_post(); $the_ID = $post->ID; ?>
				<div class="container">
					<div class="row">
						<div class="col-md-8 article">
							<?php if(get_field('hide_content_title', $the_ID)) { ?>
								<?php echo ( get_field('show_content_title', $the_ID ) ? '<h2 class="article-title"><span class="faculty_department pre-title">' . personnel_type_links($the_ID) . ' (<span class="personnel_office">' . personnel_office_links($the_ID) . '</span>)</span>' . get_field('content_title', $the_ID ) . '<span class="edit-link">' . edit_post_link('Edit this personnel profile', ' | ', '') . ' | <a href="' . add_query_arg(array('post_type'=>'faculty'),admin_url('post-new.php')) . ' title="Add new personnel" class="post-add-link">Add new personnel</a></span></h2>' : '' ); ?>
							<?php } else { ?>
								<h2 class="article-title"><?php echo '<span class="faculty_department pre-title">' . personnel_type_links($the_ID) . ' (<span class="personnel_office">' . personnel_office_links($the_ID) . '</span>)</span>'; ?><?php echo get_the_title(); ?><span class="edit-link"><?php edit_post_link('Edit this personnel profile', ' | ', ''); ?><?php echo ' | <a href="' . add_query_arg(array('post_type'=>'faculty'),admin_url('post-new.php')) . '" title="Add new personnel" class="post-add-link">Add new personnel</a>'; ?></span></h2>
							<?php } ?>

							<div class="post-data">
								<span class="post-details">
									<?php echo(get_field('position',$the_ID) ? ' <span class="position">'.get_field('position',$the_ID).'</span>' : ''); ?>
									<?php
										if( have_rows('designations', $the_ID ) ): echo ' (';
											while ( have_rows('designations', $the_ID ) ) : the_row();
												$department = get_sub_field('department_name', $the_ID );
												$office = get_sub_field('office_name', $the_ID );
												$designation = get_sub_field('designation', $the_ID );
												echo ($department ? '<span class="designation">' . $designation . ' - <a href="' . get_term_link( $department ) . '" title="' . $department->name . '">' . $department->name . '</a></span>' : ($office ? '<span class="designation">' . $designation . ' - <a href="' . get_term_link( $office ) . '" title="' . $office->name . '">' . $office->name . '</a></span>' : '<span class="designation">' . $designation . '</span>'));
											endwhile;
											echo ')';
										else :
										endif;
									?>	
								</span>
							</div>

							<?php echo (get_field('biography', $the_ID) ? '<div class="biography"><h3>Biography</h3>' . get_field('biography', $the_ID) . '</div>' : ''); ?>
							<?php echo ((get_field('email_address', $the_ID) || get_field('contact_numbers', $the_ID) || get_field('office_address', $the_ID)) ? '<div class="contact-details"><h3>Contact Details</h3>' . (get_field('email_address', $the_ID) ? '<p><b>Email Address</b>: <a href="mailto:' . get_field('email_address', $the_ID) . '">' . get_field('email_address', $the_ID) . '</a></p>' . (get_field('email_address_2', $the_ID) ? '<p><b>Email Address (Alternate)</b>: <a href="mailto:' . get_field('email_address_2', $the_ID) . '">' . get_field('email_address_2', $the_ID) . '</a></p>' : '') : '') . '</div>' : ''); ?>
						</div>
						<div class="col-md-4 aside">
							<?php
								if( have_rows('page_widgets', $the_ID ) ):
									while ( have_rows('page_widgets', $the_ID ) ) : the_row();
										dynamic_sidebar( get_sub_field('sidebar_widget', $the_ID ) );
									endwhile;
								else :
										dynamic_sidebar('Default Sidebar');
								endif;
							?>					
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>				
				</div>
			<?php endwhile; ?>
		</div>
	</div>
<?php else : ?>
<?php endif; ?>

<?php wp_reset_query(); ?>

<?php get_footer(); ?>