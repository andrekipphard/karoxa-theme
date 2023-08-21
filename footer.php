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
						ERHALTE EINEN 10% RABATTCODE
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
							<p class="text-center">Nach deiner Anmeldung erhältst du einen einmaligen Gutschein im Wert von 10% für unseren Shop.</p>
							
							<?php echo do_shortcode('[wc_mailchimp_subscribe_discount]');?>
							
						</div>
					</div>
					<?php if ( have_rows( 'social_icons', 'options' ) ) : ?>
						<div class="row pt-4 pt-lg-5 d-flex justify-content-center">
							<ul class="footer-icons d-flex justify-content-center">
								<?php while ( have_rows( 'social_icons', 'options' ) ) : the_row();
									$icon = get_sub_field('icon');
									$url = get_sub_field('url');
									$background_color = get_sub_field('background_color');?>
									<li style="background-color:<?=$background_color;?>" class="rounded-circle social-icon"><a href="<?= $url; ?>" class="stretched-link" target="_blank"><i class="fs-5 bi bi-<?= $icon; ?> text-white"></i></a></li>
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
