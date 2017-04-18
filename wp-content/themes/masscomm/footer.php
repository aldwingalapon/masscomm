		<footer id="main_footer">

			<div id="top_footer" class="skew after">

				<?php if(get_field('show_events_in_footer', 'option')) { ?>

					<div class="events">

						<div class="container">

							<div class="row">

								<div class="col-md-8 event-fields">

									<?php 

										$events = get_field('number_of_events_to_display', 'option');

										if( $events > 0 ):

											$args = array(

												'posts_per_page' => $events,

												'post_type' =>	'event',

												'status'	=>	'publish',

												'meta_key' => 'start_date',

												'orderby'=> 'meta_value_num',

												'order'=> 'DESC',

												'meta_query' => array(

													array(

														'key' 		=> 'show_in_footer',

														'value' 	=> '1',

														'compare' 	=> '==',

													)

												),

											);



											$event = New WP_Query($args); ?>

											

											<?php if ($event) : $i = 1; ?>

												<div id="footer-event-slider-container">

													<div class="event-slider" id="footer-event-slider">

														<?php  while ( $event->have_posts() ) : $event->the_post(); $event_id = get_the_ID();

															$event_header_image = get_field('event_header_image', $event_id);

															$event_details = get_field('event_details', $event_id);

															$right_side_image = get_field('right_side_image', $event_id);

															$url = get_field('url', $event_id);

															$custom_link = get_field('custom_link', $event_id);

															$all_day_event = get_field('all_day_event', $event_id);

															$start_date = get_field('start_date', $event_id);

															$start_time = get_field('start_time', $event_id);

															$end_date = get_field('end_date', $event_id);

															$end_time = get_field('end_time', $event_id);

															$address = get_field('address', $event_id);

															

															$link = ($custom_link ? $custom_link : get_permalink($event_id));

															

															$startdate = date_create_from_format('Ymd', get_field('start_date'));

															$enddate = date_create_from_format('Ymd', get_field('end_date'));

															$starttime = date_create_from_format('H:i', get_field('start_time'));

															$endtime = date_create_from_format('H:i', get_field('end_time'));

															

															if (($start_date == $end_date) || ($start_date && !$end_date)){

																$date = $startdate->format( 'l, F j, Y' );

															}else{

															

																if(($startdate->format('F')) == ($enddate->format('F'))){

																	if(($startdate->format('Y')) == ($enddate->format('Y'))){

																		$date = $startdate->format( 'F j' ) . ' - ' . $enddate->format( 'j, Y' );

																	}else{

																		$date = $startdate->format( 'F j, Y' ) . ' - ' . $enddate->format( 'F j, Y' );

																	}

																

																}else{

																	if(($startdate->format('Y')) == ($enddate->format('Y'))){

																		$date = $startdate->format( 'F j' ) . ' - ' . $enddate->format( 'F j, Y' );

																	}else{

																		$date = $startdate->format( 'F j, Y' ) . ' - ' . $enddate->format( 'F j, Y' );

																	}

																}

															}

															

															if (($start_time == $end_time) || ($start_time && !$end_time)){

																$date .= ' @ ' . $starttime->format( 'g:i A' );

															}else{

																if(($starttime->format( 'A' ))==($endtime->format( 'A' ))){

																	$date .= ' @ ' . $starttime->format( 'g:i ' ) . ' - '  . $endtime->format( 'g:i A' );

																}else{

																	$date .= ' @ ' . $starttime->format( 'g:i A' ) . ' - '  . $endtime->format( 'g:i A' );

																}

															}

														?>

															<div class="event-item event-item-<?php echo $event_id;?>" <?php echo (($i > 1) ? 'style="display:none;"' : '') ?>>

																<?php if( !empty($right_side_image) ): ?>

																	<div class="col-md-8">

																		<?php echo ($event_header_image ? '<img class="event_header_image" src="' . $event_header_image['url'] . '" width="' . $event_header_image['width'] . '" height="' . $event_header_image['height'] . '" alt="' . $event_header_image['alt'] . '" title="' . $event_header_image['alt'] . '" />' : ''); ?>

																		<h4 class="event-title"><a href="<?php echo $link; ?>" title="<?php echo get_the_title($event_id); ?>"><?php echo get_the_title($event_id); ?></a><?php echo (($start_date && $address) ? '<small><span class="icon"></span><span class="venue_date">' . $date . (($address ? '<br/>' . $address : '')) . '</span></small>' : ''); ?></h4>

																		<?php echo ($event_details ? '<div class="event_content">' . $event_details . '</div>' : ''); ?>

																	</div>

																	<div class="col-md-4">

																		<img class="right_side_image" src="<?php echo $right_side_image['url']; ?>" width="<?php echo $right_side_image['width']; ?>" height="<?php echo $right_side_image['height']; ?>" alt="<?php echo $right_side_image['alt']; ?>" title="<?php echo $right_side_image['alt']; ?>" />

																	</div>

																	<div class="clearfix clear"></div>

																<?php else : ?>

																	<div class="col-md-12">

																		<h4 class="event-title"><a href="<?php echo $link; ?>" title="<?php echo get_the_title($event_id); ?>"><?php echo get_the_title($event_id); ?></a><?php echo (($start_date && $address) ? '<small><span class="icon"></span><span class="venue_date">' . $date . (($address ? '<br/>' . $address : '')) . '</span></small>' : ''); ?></h4>

																		<?php echo ($event_details ? '<div class="event_content">' . $event_details . '</div>' : ''); ?>

																	</div>

																	<div class="clearfix clear"></div>

																<?php endif; ?>

																<div class="clearfix clear"></div>

															</div>

														<?php endwhile; ?>

													</div>

												</div>

											<?php else : endif; ?>

										<?php endif; ?>

								</div>

								<div class="col-md-4">

									<?php 

										$infoterm = get_field('info_slider_category', 'option');

										if( $infoterm ):

											$args = array(

												'posts_per_page' => -1,

												'post_type' =>	'slider',

												'status'	=>	'publish',

												'orderby'	=>	'menu_order',

												'order'	=>	'ASC',

												'tax_query' =>

													array(

														array(

															'taxonomy' => 'slider_position',

															'field'    => 'name',

															'terms' => $infoterm->name,                                    

														),

													), 

											);



											$infoslider = New WP_Query($args); ?>

											

											<?php if ($infoslider) : $i = 1; ?>

												<div class="info-slider" id="footer-info-owl-carousel-container">

													<div class="owl-carousel" id="footer-info-owl-carousel">

														<?php  while ( $infoslider->have_posts() ) : 

															$infoslider->the_post();

															$infoslider_id = get_the_ID();

															$add_link = get_field('add_link', $infoslider_id);

															$url_link = get_field('url_link', $infoslider_id);

															$video_link = get_field('video_link', $infoslider_id);

															$image_link = get_field('image_link', $infoslider_id);

															$target = get_field('target', $infoslider_id);

															$infolink = "";

															$infoclass= "";

															$inforel= "";

															$infotarget= "";

															if(($add_link) == 'Website'){

																$infolink = $url_link;

																$infoclass = "";

																$inforel = "";

																$infotarget = ' target="' . $target . '"';

															}elseif(($add_link) == 'Video'){

																$infolink = $video_link;

																$infoclass = "wplightbox";

																$inforel = "";

																$infotarget = "";

															}elseif(($add_link) == 'Image'){

																$infolink = $image_link;

																$infoclass = "data-lightbox";

																$inforel = ' rel="lightbox"';

																$infotarget = "";

															}

														?>

															<div class="info-item">

																<div class="caption">

																	<h4><?php echo ($infolink ? '<a href="' . $infolink . '" class="infolink ' . $infoclass . '"' . $inforel . $infotarget . '>' : ''); ?><?php echo get_the_title($infoslider_id); ?><?php echo ($infolink ? '</a>' : ''); ?></h4>

																</div>								

																<?php if ( has_post_thumbnail() ) {

																	$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($infoslider_id), 'medium-info-thumbnails' );

																	echo '<div class="info-image lazy-image" data-src="' . $image_url[0] . '"></div>';

																} ?>					

															</div>

														<?php endwhile; ?>

													</div>

												</div>

											<?php else : endif; ?>

										<?php endif; ?>								

									<!--

									<div class="info-slider">

									</div>

									-->

								</div>

								<div class="clearfix clear"></div>

							</div>

						</div>

					</div>

				<?php } ?>

				<?php if(get_field('show_footer_banner', 'option')) { ?>

					<div class="footer-banner">

						<div class="overlay"></div>

						<?php if(get_field('show_static_image', 'option')) { ?>

							<?php 

								$image = get_field('footer_banner_image', 'option');

								if( !empty($image) ): ?>

									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" class="footer-image" />

							<?php endif; ?>

							<?php if(get_field('show_image_title_and_caption', 'option')) { ?>

								<div class="caption">

									<?php echo (get_field('footer_image_title', 'option') ? '<h4>' . get_field('footer_image_title', 'option') . '</h4>' : ''); ?>

									<?php echo (get_field('footer_image_caption', 'option') ? get_field('footer_image_caption', 'option') : ''); ?>

								</div>

							<?php } ?>

						<?php } else { ?>

							<?php 

								$term = get_field('slider_category', 'option');

								if( $term ):

									$args = array(

										'posts_per_page' => -1,

										'post_type' =>	'slider',

										'status'	=>	'publish',

										'orderby'	=>	'menu_order',

										'order'	=>	'ASC',

										'tax_query' =>

											array(

												array(

													'taxonomy' => 'slider_position',

													'field'    => 'name',

													'terms' => $term->name,                                    

												),

											), 

									);



									$slider = New WP_Query($args); ?>

									

									<?php if ($slider) : $i = 1; ?>

										<div id="footer-owl-carousel-container">

											<div class="owl-carousel" id="footer-owl-carousel">

												<?php  while ( $slider->have_posts() ) : $slider->the_post(); $slider_id = get_the_ID();  ?>

													<div class="hero-item">

														<div class="caption">

															<h4><?php echo get_the_title($slider_id); ?></h4>

															<p><?php echo get_post_field('post_content', $slider_id); ?></p>

														</div>								

														<?php if ( has_post_thumbnail() ) {

															$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($slider_id), 'full' );

															echo '<div class="hero-image lazy-image" data-src="' . $image_url[0] . '"><img src="' . $image_url[0] . '" width="' . $image_url[1] . '" height="' . $image_url[2] . '" /></div>';

														} ?>					

													</div>

												<?php endwhile; ?>

											</div>

										</div>

									<?php else : endif; ?>

								<?php endif; ?>

						<?php } ?>

					</div>

				<?php } ?>



				<div class="container top-content">

					<div class="row-fluid">

						<div class="col-md-10 col-md-offset-1 top-menu">

							<div class="row">

								<div class="col-md-2 col-sm-4 col-md-offset-1 menu-one">

									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Top Footer One') ) : ?>

									<?php endif; ?>

								</div>

								<div class="col-md-2 col-sm-4 menu-two">

									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Top Footer Two') ) : ?>

									<?php endif; ?>

								</div>

								<div class="col-md-2 col-sm-4 menu-three">

									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Top Footer Three') ) : ?>

									<?php endif; ?>

								</div>

								<div class="clearfix_1000 clear_1000"></div>

								<div class="col-md-2 col-sm-4 menu-four">

									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Top Footer Four') ) : ?>

									<?php endif; ?>

								</div>

								<div class="col-md-2 col-sm-4 menu-five">

									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Top Footer Five') ) : ?>

									<?php endif; ?>

								</div>

								<div class="clearfix clear"></div>

							</div>

							<div class="clearfix clear"></div>

						</div>

						<div class="clearfix clear"></div>

					</div>

				</div>

			</div>

			<div id="bottom_footer" class="skew before">

				<div class="container">

					<div class="row">

						<?php if(get_field('show_bottom_footer_content', 'option')) { ?>

							<div class="row-fluid bottom-content">

								<div class="col-md-3 col-md-offset-2 col-sm-4 first-column">

									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Footer One') ) : ?>

									<?php endif; ?>

								</div>

								<div class="col-md-2 col-sm-4">

									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Footer Two') ) : ?>

									<?php endif; ?>

								</div>

								<div class="col-md-3 col-sm-4 last-column">

									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Footer Three') ) : ?>

									<?php endif; ?>

								</div>

								<div class="clearfix clear"></div>

							</div>

						<?php } ?>

						<?php if(get_field('show_social_network_links', 'option')) { ?>

							<div class="col-md-12 social-network">

								<?php

									if( have_rows('social_network', 'option' ) ): ?>

										<ul class="footer_sn">

											<?php

												while ( have_rows('social_network', 'option' ) ) : the_row();

													$sn_name = get_sub_field('sn_name');

													$sn_type = get_sub_field('sn_type');

													$sn_url = get_sub_field('sn_url');

											?>

												<li class="<?php echo $sn_type; ?>"><a href="<?php echo $sn_url ?>" title="<?php echo $sn_name ?>" rel="nofollow" target="_blank"></a></li>

											<?php endwhile; ?>

										</ul>

								<?php

									endif;

								?>

							</div>

							<div class="clearfix clear"></div>

						<?php } ?>



						<div class="col-md-12 copyright">

							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Footer Copyright') ) : ?>

							<?php endif; ?>

						</div>

						<div class="clearfix clear"></div>

						<div class="col-md-12 footer_menu">

							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Footer Menu Link') ) : ?>

							<?php endif; ?>

						</div>

						<div class="clearfix clear"></div>

					</div>

					<div class="clearfix clear"></div>

				</div>

			</div>

		</footer>

	</div>


	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-1.12.4.min.js"></script>


	<?php wp_footer(); ?>



	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/modernizr-2.0.6.min.js"></script>

	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.lazy.min.js"></script>

	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/owl.carousel.min.js"></script>

	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/lightbox.min.js"></script>

	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/modal.js"></script>

	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/classie.js"></script>

	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>

	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.simplemodal.js"></script>

	<script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/scripts.js"></script>

</body>

</html>