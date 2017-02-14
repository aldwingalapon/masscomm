<?php get_header(); set_upcmc_post_views(get_the_ID()); ?>

	<div class="main_content" id="not-found-page">
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
					<div class="col-md-12 article">
						<div class="not-found-panel">
							<h2 class="article-title"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/404-icon@1x.png" class="alignleft" style="-webkit-filter: sepia(70%); filter: sepia(70%);">The page <u>http://<?php echo $_SERVER['HTTP_HOST']; ?><?php echo $_SERVER['REQUEST_URI']; ?></u> does not exists.</h2>
							<p><strong>Whoops, Our Bad...<br>The page you requested was not found, and we have a fine guess why.</strong></p>
							<p>I'm sorry, but the article or page you're looking for could not be found. It could be because of the recent changes we've been doing with our website. Here are a couple of options that might help you:</p>
							<ol>
								<li>Check the spelling of the address you typed</li>
								<li>Verify if you are logged in. There are pages that require you to be logged in to view contents.</li>
								<li>If you are still having problems, please <a href="<?php echo get_settings('home'); ?>/contact/">contact us</a>.</li>
							</ol>
							<p>You can also take a look through our most recent news. Perhaps you'll find what you're looking for there.</p>
							<ul>
								<?php query_posts('showposts=10&post_type=news'); ?>
								<?php while (have_posts()) : the_post(); ?>
									<li><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></li>
								<?php endwhile; ?>
							</ul>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>				
			</div>
		</div>
	</div>

<?php wp_reset_query(); ?>

<?php get_footer(); ?>