<?php  
/**
 * Template Name: Taxonomy Department
 *
 */
?>

<?php
	global $page, $paged, $post;
	$tax = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	$term = $wp_query->queried_object;
/*
	$courses = $wp_query;
	
	$args = array(
	'post_type' => 'department',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'tax_query'=>array(
			array(
			'taxonomy'=>'courses',
			'field'=>'slug',
			'terms'=> $tax->slug,
			)
		)
	);				
	$wp_query = null;
	$wp_query = new WP_Query($args);
*/

?>

<?php get_header(); set_upcmc_post_views(get_the_ID()); ?>

	<div class="main_content" id="taxonomy-department">
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
			<div class="container">
				<div class="row">
					<div class="col-md-8 article">
						<h2 class="article-title"><?php echo ( get_field('header_title', $term) ? the_field('header_title', $term) : $term->name ); ?><?php edit_term_link( __( 'Edit department details', 'textdomain' ), '<span class="edit-term"> | ', '</span>', $term ); ?></h2>
					
						<div class="department_desciption taxonomy_description">
							<?php echo ( get_field('description', $term) ? the_field('description', $term) : '' ); ?>
						</div>
						
						<?php if(get_field('department_office_address', $term)){ ?>
							<div class="department_contact_details">
 								<h3>Contact Details</h3>
								<?php echo (get_field('department_office_address', $term) ? get_field('department_office_address', $term) : '') ?>
								<?php echo (get_field('contact_numbers', $term) ? '<p><b>Contact Number/s</b>: ' . get_field('contact_numbers', $term) . '</p>' : '') ?>
								<?php echo (get_field('email_address', $term) ? '<p><b>Email Address</b>: <a href="mailto:' . get_field('email_address', $term) . '">' . get_field('email_address', $term) . '</a></p>' : '') ?>
								<?php echo (get_field('external_website', $term) ? '<p><b>Website</b>: <a href="' . get_field('external_website', $term) . '" title="' . $term->name . '" target="_blank">' . $term->name . '</a></p>' : '') ?>
							</div>
						<?php } ?>
					</div>
					<div class="col-md-4 aside">
						<?php
							if( have_rows('category_widgets', $term) ):
								while ( have_rows('category_widgets', $term) ) : the_row();
									dynamic_sidebar( get_sub_field('sidebar_widget', $term) );
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
		</div>
	</div>

<?php wp_reset_query(); ?>

<?php get_footer(); ?>