				<div id="sidebar1" class="sidebar m-all t-1of3 d-2of7 last-col cf" role="complementary">
					
					

					<div class="franchise-widget sidebar-widget responsive-widget widget">
						

						<!-- SIDEBAR - TITLE -->
						
						<?php 
							
							if ( get_field( 'franchisee_contact_form_title' ) ) {
								echo '<h4 class="widgettitle">' . get_field('sidebar_title') . '</h4>';
							} else {
								echo '<h4 class="widgettitle">Contact Info</h4>';
							}

						?>

						<!-- SIDEBAR - ADDRESS -->	
						
						<script>
						/*
						<?php if( get_field( 'franchisee_address' ) ) : ?>
							<div class="franchisee-address">
								<p><?php the_field( 'franchisee_address' ); ?></a></p>
								<!-- <p><a href="https://maps.google.com/?q=<?php the_field( 'franchisee_address' ); ?>" target="_blank"><?php the_field( 'franchisee_address' ); ?></a></p> -->										
								<!--
									Convert empty space to + symbol - Does not work...
									$stringfix = str_replace('%20', '%2B', the_field( 'franchisee_address' ));
								-->
								
							</div>
							<!-- If no address then nothing will appear -->
							<!-- https://maps.google.com/?q= -->
						<?php endif; ?>
						*/
						</script>
						
						
						<div class="address-information" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">


							<!-- SIDEBAR - STREET ADDRESS(ES) -->

							<div class="street-address" itemprop="streetAddress">

								<div><?php the_field( 'address_1' ); ?></div>
								<?php
									if ( get_field( 'address_2' ) ) :
										the_field( 'address_2' );
									endif;
								?>
							</div>


							<!-- SIDEBAR - POSTAL CODE -->	

							<div>
								<span itemprop="addressLocality"><?php the_field( 'city' ); ?></span>, <span itemprop="addressRegion"><?php the_field( 'state' ); ?></span> <span itemprop="postalCode"><?php the_field( 'postal_code' ); ?></span>
							</div>


							<!-- SIDEBAR - OWNER NAMES -->	

							<div class="ownerNames" style="padding-bottom: 5px;"><?php the_field( 'owner_names' ); ?></div>


							<!-- SIDEBAR - PHONE NUMBER -->	
									
							<?php if( get_field( 'phone_number' ) ) : ?>
									<div itemprop="telephone"><a href="tel:<?php the_field( 'phone_number' ); ?>" <?php if ( get_field( 'phone_tracking' ) ) : the_field( 'phone_tracking' ); endif; ?>><?php the_field( 'phone_number' ); ?></a></div>
							<?php endif; ?>

						</div>
					

						<!-- SIDEBAR - CONTACT FORM -->
						
						<?php
							
							/* NEW METHOD (Simplified) */
							/*
							if ( get_field( 'franchisee_contact_form' ) ) {
								echo do_shortcode(get_field('franchisee_contact_form'));
							} else {
								echo do_shortcode('[contact-form-7 id="4494" title="Landing Contact Us"]');
							}
							*/
							
						?>


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

						<br />

						
						<!-- BUTTON - GET OFFER -->
						<?php
						if ( get_field( 'get_offer_link' ) ) {	?>
							<a href="<?php the_field( 'get_offer_link' ); ?>" class="">
									<div class="widget-button">Get Offer</div>
							</a>
							<p style="margin-top: -8px;"> - or - </p> <?php
						}
						?>									

						<!-- BUTTON - CONTACT US -->
						<a href="#contact_form_pop" class="fancybox">
							<div class="widget-button go-steel">Contact Us</div>
						</a>

						<!-- <?php echo $contact_link; ?> -->

						<div style="display:none" class="fancybox-hidden">
						    <div id="contact_form_pop">
							<?php $fchk = get_field('form_email_send_to_franchise'); ?>
							<?php if(is_single(12573)) {?>
						        <?php echo do_shortcode('[contact-form-7 id="11585" title="Franchise Contact Us - Northern Virginia"]'); ?>
								<?php } else if($fchk) {?>
								   <?php echo do_shortcode('[contact-form-7 id="13412" title="Franchise Contact Us Without Five 9 Integration"]'); ?>								
							<?php } else {?>
							 <?php echo do_shortcode('[contact-form-7 id="3346" title="Franchise Contact Us"]'); ?>
							<?php } ?>
						    </div>
						</div>
					
						
						<!-- BUTTON - WE'RE HIRING -->
						<?php
						if ( get_field( 'hiring_link' ) ) {	?>
							<a href="<?php the_field( 'hiring_link' ); ?>" target="_blank" class="" style="text-decoration:none !important;">
								<div class="widget-button go-steel">We're Hiring</div>
							</a> <?php
						}
						?>
						
						
						<!-- BUTTON - VISIT OUR SITE -->
						<?php
						if ( get_field( 'microsite_url' ) ) {	?>
							<a href="<?php the_field( 'microsite_url' ); ?>" target="_blank" class="" style="text-decoration:none !important;">
								<div class="widget-button go-steel">Visit Our Site</div>
							</a> <?php
						}
						?>

						
						<!-- BUTTON - YELP -->
						<?php
						if ( get_field( 'yelp_link' ) ) {	?>
							<div class="yelp_container">
								<a href="<?php the_field( 'yelp_link' ); ?>" target="_blank">
									<img src="/wp-content/uploads/2018/03/button-yelp-click-here.png" class="button-yelp">
								</a>
							</div> <?php
						}
						?>

						<!-- BUTTON - YELP BADGE (Yelp Reviews Pro) -->										
						<?php
						if ( get_field( 'yelp_badge_shortcode' ) ) { 	?>
							<div class="yelp_badge_container">
								<?php echo do_shortcode(get_field('yelp_badge_shortcode')); ?>
							</div> <?php
						}
						?>
						
						<!-- DISPLAY SOCIAL MEDIA -->
																		
						<?php if( get_field('display_social_media') ): ?>
						
							<div class="sidebar-social-media">
																
								<h3>FOLLOW THIS LOCATION ON SOCIAL MEDIA:</h3>
	
								<div class="franchisee-social-media">
									<?php if( $value = get_field( "facebook" ) ) echo "<a href='$value' target='_blank'><img src='/wp-content/themes/moshield-corporate/library/images/icon-facebook-red.png' alt='Facebook' /></a>"; ?>
									<?php if( $value = get_field( "twitter" ) ) echo "<a href='$value' target='_blank'><img src='/wp-content/themes/moshield-corporate/library/images/icon-twitter-red.png' alt='Twitter' /></a>"; ?>
									<?php if( $value = get_field( "pinterest" ) ) echo "<a href='$value' target='_blank'><img src='/wp-content/themes/moshield-corporate/library/images/icon-pinterest-red.png' alt='Pinterest' /></a>"; ?>
									<?php if( $value = get_field( "linkedin" ) ) echo "<a href='$value' target='_blank'><img src='/wp-content/themes/moshield-corporate/library/images/icon-linkedin-red.png' alt='LinkedIn' /></a>"; ?>
									<?php if( $value = get_field( "google_plus" ) ) echo "<a href='$value' target='_blank'><img src='/wp-content/themes/moshield-corporate/library/images/icon-googleplus-red.png' alt='Google+' /></a>"; ?>				
								</div>
	
							</div>

						<?php endif; ?>						

					</div>
					
					<!-- SECOND TIER -->
					
					<!-- SIDEBAR TESTIMONIALS (YELP) -->
					
					<?php if( get_field('display_section_sidebar_testimonials') ): ?>
					
						<div class="" style="padding: 20px 25px 20px 25px;">
													
							<?php if ( get_field( 'yelp_shortcode_sidebar_testimonials' ) ) { 	?>
							<div class="yelp_shortcode_sidebar_testimonials">
								<?php echo do_shortcode(get_field('yelp_shortcode_sidebar_testimonials')); ?>
							</div> <?php
							} ?>
						
						</div>
						
						<br clear="both" />

					<?php endif; ?>
					
					<style>
					/*
					<div class="widget-responsive-landing-second-tier franchise-widget sidebar-widget widget" style="padding-top: 38px;">
						
						<?php
						if ( get_field( 'hiring_link' ) ) {	?>
							<a href="<?php the_field( 'hiring_link' ); ?>" target="_blank" class="button-find-your-location" style="text-decoration:none !important;">
								<div class="content-button">We're Hiring</div>
							</a> <?php
						}
						?>
						
						<div class="yelp_container">
							<div id="yelp-biz-badge-rrc-dbKcuADEuOo0-nm6IG4CDg">
								<a href="https://www.yelp.com/biz/mosquito-shield-of-northern-virginia-arlington" target="_blank">
								<img alt="Mosquito Shield of Northern Virginia" src="https://dyn.yelpcdn.com/extimg/en_US/rrc/dbKcuADEuOo0-nm6IG4CDg.png" height="55" width="125">
								</a>
							</div>
							<p><script>(function(d, t) {var g = d.createElement(t);var s = d.getElementsByTagName(t)[0];g.id = "yelp-biz-badge-script-rrc-dbKcuADEuOo0-nm6IG4CDg";g.src = "//yelp.com/biz_badge_js/en_US/rrc/dbKcuADEuOo0-nm6IG4CDg.js";s.parentNode.insertBefore(g, s);}(document, 'script'));</script></p>
						</div>
						
					</div>
					*/
					</style>
					

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
