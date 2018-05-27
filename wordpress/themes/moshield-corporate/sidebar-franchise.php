				<div id="sidebar1" class="sidebar m-all t-1of3 d-2of7 last-col cf" role="complementary">

					<div class="franchise-widget widget">

						<h4 class="widgettitle">Contact Info.</h4>

						<?php
							if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							echo '<div class="franchise-image">' . PHP_EOL;
							the_post_thumbnail( 'full' );
							echo '</div>' . PHP_EOL;
							}
						?>

						<div class="address-information" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">

							<div class="street-address" itemprop="streetAddress">

								<div><?php the_field( 'address_1' ); ?></div>
								<?php
									if ( get_field( 'address_2' ) ) :
										the_field( 'address_2' );
									endif;
								?>
							</div>

							<div>
								<span itemprop="addressLocality"><?php the_field( 'city' ); ?></span>, <span itemprop="addressRegion"><?php the_field( 'state' ); ?></span> <span itemprop="postalCode"><?php the_field( 'postal_code' ); ?></span>
							</div>

							<div><?php the_field( 'owner_names' ); ?></div>

							<?php if( get_field( 'phone_number' ) ) : ?>
								<div itemprop="telephone"><a href="tel:<?php the_field( 'phone_number' ); ?>" <?php if ( get_field( 'phone_tracking' ) ) : the_field( 'phone_tracking' ); endif; ?>><?php the_field( 'phone_number' ); ?></a></div>
							<?php endif; ?>

						</div>

						<br clear="both" />

						<?php $contact_link = add_query_arg( array( 'franchisee_id' => $post->ID ), get_permalink( 14 ) ); ?>

						<form class="workwave_franchisee_form" action="/plans-pricing/" method="post" id="workwave_promozip_form" novalidate="novalidate">
						<input name="workwave_name" value="promozip" type="hidden">
						<input name="workwave_zip" id="workwave_zip" value="<?php the_field( 'postal_code' ); ?>" type="hidden">
						<input value="Get Pricing" class="widget-button" type="submit" style="display:none;">
						</form>

						<?php // $nonce = wp_create_nonce("update_waterstreet_info_nonce"); ?>
					    <?php // if(!get_field('hide_get_pricing')) : ?>
						<!-- <div class="widget-button" data-nonce="<?php echo $nonce; ?>" data-zip-code="<?php the_field( 'postal_code' ); ?>" id="get-franchisee-pricing">Get Pricing</div> -->
						<?php // endif; ?>

						<a href="#contact_form_pop" class="fancybox"><div class="widget-button">Contact Us</div></a>

						<!-- <?php echo $contact_link; ?> -->

						<div style="display:none" class="fancybox-hidden">
						    <div id="contact_form_pop">							    
							    <?php
								    if ( is_single(173) ) {
	   									echo do_shortcode('[contact-form-7 id="11585" title="Franchise Contact Us - Northern Virginia"]');
									}
									else {
										echo do_shortcode('[contact-form-7 id="3346" title="Franchise Contact Us"]');
									}
								?>
						        <!-- <?php echo do_shortcode('[contact-form-7 id="3346" title="Franchise Contact Us"]'); ?> -->
						    </div>
						</div>

						<?php if( $value = get_field( "microsite_url" ) ) echo "<a href='$value' target='_blank'><div class='widget-button'>Visit Our Site</div></a>"; ?>
						<?php if( $value = get_field( "1995_promotion_url" ) ) echo "<a href='$value'><div class='widget-button'>$19.95 OFFER</div></a>"; ?>
						<?php if( $value = get_field( "2995_promotion_url" ) ) echo "<a href='$value'><div class='widget-button'>$29.95 OFFER</div></a>"; ?>
						<?php if( $value = get_field( "39_promotion_url" ) ) echo "<a href='$value'><div class='widget-button'>$39 OFFER</div></a>"; ?>
						<?php if( $value = get_field( "3999_promotion_url" ) ) echo "<a href='$value'><div class='widget-button'>$39.99 OFFER</div></a>"; ?>
						<?php if( $value = get_field( "promotion_url" ) ) echo "<a href='$value'><div class='widget-button'>GET $25 OFF</div></a>"; ?>
						<?php if( $value = get_field( "50_off_promotion_url" ) ) echo "<a href='$value'><div class='widget-button'>GET $50 OFF</div></a>"; ?>
						<?php if( $value = get_field( "75_off_promotion_url" ) ) echo "<a href='$value'><div class='widget-button'>GET $75 OFF</div></a>"; ?>
						<?php if( $value = get_field( "100_off_promotion_url" ) ) echo "<a href='$value'><div class='widget-button'>GET $100 OFF</div></a>"; ?>
						<?php if( $value = get_field( "promotion_description" ) ) echo "<p class='promo_description'>$value</p>"; ?>
						
						<?php if( $value = get_field( "careers_url" ) ) echo "<a href='$value' target='_blank'><div class='widget-button'>Careers</div></a>"; ?>

					</div>
					
					<?php if( $value = get_field( "franchisee_video_link" ) ) echo "<div class='videoWrapper'><iframe src='$value' frameborder='0' allowfullscreen></iframe></div>"; ?>
					
					<div class="yelp_container">
						<?php if( $value = get_field( "yelp_badge" ) ) echo "$value"; ?>
					</div>

					<?php if ( is_active_sidebar( 'sidebar2' ) ) : ?>
						
						<?php
						// testing: 
						
						//require_once('includes/waterstreetwrapper.class.php');
						//$waterstreet = new WaterstreetWrapper();
						//echo '<pre>';
						//var_dump($waterstreet->getInfo('01887', false, 'franchiseInfo'));
						//echo '</pre>';
						//var_dump($waterstreet->getInfo('08085', false, false));
						//var_dump(get_post(694));
						
						//echo '<pre>';
						//var_dump(mos_get_franchisee_list(true));
						//echo '</pre>';
												
						?>
						
						<?php // dynamic_sidebar( 'sidebar2' ); ?>

					<?php else : ?>

						<?php
							/*
							 * This content shows up if there are no widgets defined in the backend.
							*/
						?>

						<div class="no-widgets">
							<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>
