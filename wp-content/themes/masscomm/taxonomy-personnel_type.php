<?php  
/**
 * Template Name: Taxonomy Personnel Type
 *
 */
?>

<?php
	global $page, $paged, $post;
	$tax = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	$term = $wp_query->queried_object;

?>

<?php get_header(); set_upcmc_post_views(get_the_ID()); ?>

	<div class="main_content" id="taxonomy-personnel_type">
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
						<h2 class="article-title"><?php echo ( get_field('header_title', $term) ? the_field('header_title', $term) : $term->name ); ?></h2>

						<div class="program_desciption taxonomy_description">
							<?php echo ( get_field('description', $term) ? the_field('description', $term) : '' ); ?>
						</div>

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