<?php get_header(); set_upcmc_post_views(get_the_ID()); ?>

<?php if (have_posts()) : ?>
	<div class="main_content" id="single-post">
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
								<?php echo ( get_field('show_content_title', $the_ID ) ? '<h2 class="article-title">' . get_field('content_title', $the_ID ) . '<span class="edit-link">' . '<a href="' . get_edit_post_link($the_ID) . '" title="Edit this post" class="post-edit-link">Edit this post</a>' . ' | <a href="' . add_query_arg(array('post_type'=>'post'),admin_url('post-new.php')) . '" title="Add new post" class="post-add-link">Add new post</a></span></h2>' : '' ); ?>
							<?php } else { ?>
								<h2 class="article-title"><?php echo get_the_title(); ?><span class="edit-link"><?php edit_post_link('Edit this post', ' | ', ''); ?><?php echo ' | <a href="' . add_query_arg(array('post_type'=>'post'),admin_url('post-new.php')) . '" title="Add new post" class="post-add-link">Add new post</a>'; ?></span></h2>
							<?php } ?>
							<?php the_content(); ?>
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