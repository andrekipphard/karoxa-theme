<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rooxy
 */

?>

	<footer id="colophon" class="site-footer bg-light">
		<div class="container">
			<div class="row py-4 py-lg-5 d-flex justify-content-center">
				<div class="col pt-4 pt-lg-5 text-center">
					<div class="h2 text-center mb-3 mb-lg-5">
						ERHALTE EINEN 20% RABATTCODE
					</div>
					<div class="row">
						<div class="col-12 col-lg-6 pb-3 pb-lg-0">
							<?php $newsletter_image = get_field( 'newsletter_image', 'options' );?>
							<img class="" src="<?= wp_get_attachment_image_url($newsletter_image, 'medium');?>"/>
						</div>
						<div class="col-12 col-lg-6 d-flex flex-column justify-content-center">
							
							<div class="p text-uppercase fw-semibold d-flex justify-content-center pb-3 lemonmilk">
								Newsletter abonnieren
							</div>
							<p class="text-center">Nach deiner Anmeldung erhältst du einen einmaligen Gutschein im Wert von 20% für unseren Shop.</p>
							
							<!-- Begin Mailchimp Signup Form -->
							<link href="//cdn-images.mailchimp.com/embedcode/classic-071822.css" rel="stylesheet" type="text/css">

							<div id="mc_embed_signup">
								<form action="https://shop.us14.list-manage.com/subscribe/post?u=3cdaf883709240a5a7d5313a0&amp;id=c3dc59dd4b&amp;f_id=003692e0f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate d-flex justify-content-center flex-column" target="_blank" novalidate>
									<div id="mc_embed_signup_scroll mt-2 d-flex justify-content-center align-self-center">
										<div class="mc-field-group d-flex flex-column justify-content-center align-items-center">
											<input type="email" value="" name="EMAIL" class="footer-newsletter-input required email align-self-center" id="mce-EMAIL" placeholder="E-mail Adresse" required>
											<span id="mce-EMAIL-HELPERTEXT" class="helper_text align-self-center"></span>
										</div>
										<div id="mce-responses" class="clear">
											<div class="response text-center" id="mce-error-response" style="display:none"></div>
											<div class="response text-center" id="mce-success-response" style="display:none"></div>
										</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
										<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_3cdaf883709240a5a7d5313a0_c3dc59dd4b" tabindex="-1" value=""></div>
										<div class="clear d-flex justify-content-center"><input type="submit" value="Anmelden" name="subscribe" id="mc-embedded-subscribe" class="button text-uppercase lemonmilk"></div>
									</div>
								</form>
							</div>
							<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets/js/mailchimp.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
							<!--End mc_embed_signup-->
						</div>
					</div>
					<?php if ( have_rows( 'social_icons', 'options' ) ) : ?>
						<div class="row pt-4 pt-lg-5 d-flex justify-content-center">
							<ul class="footer-icons d-flex justify-content-center">
								<?php while ( have_rows( 'social_icons', 'options' ) ) : the_row();
									$icon = get_sub_field('icon');
									$url = get_sub_field('url');
									$background_color = get_sub_field('background_color');?>
									<li style="background-color:<?=$background_color;?>" class="rounded-circle social-icon"><a href="<?= $url; ?>" class="stretched-link"><i class="fs-5 bi bi-<?= $icon; ?> text-white"></i></a></li>
								<?php endwhile; ?>
							</ul>
						</div>
					<?php endif; ?>
				</div>
			</div>
			
		</div>
		<div class="row pt-3 pb-3 pe-lg-5 ps-lg-5 bg-dark d-flex align-items-center">
				<div class="col-12 col-lg-4 d-flex justify-content-center justify-content-lg-start order-2 order-lg-1">
				<?php if ( $copyright = get_field( 'copyright', 'options' ) ) : ?>	
					<div class="p copyright">
					
						© <?php echo esc_html( $copyright ); ?>
					
						
					</div>
				<?php endif; ?>
				</div>
				<div class="col-12 col-lg-8 d-flex justify-content-center justify-content-lg-end mb-3 mb-lg-0 order-1 order-lg-2 align-self-center">
					<div class="nav-footer">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'footer-menu',
									'menu_id'        => 'primary-menu',
								)
							);
						?>
					</div>
				</div>
				
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
