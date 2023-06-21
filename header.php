<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rooxy
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/node_modules/bootstrap-icons/font/bootstrap-icons.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'rooxy' ); ?></a>

	<header id="masthead" class="site-header d-flex flex-column justify-content-center align-items-center sticky-top">

		
		<!-- Header White -->
		<div class="sticky-top w-100">

		
			<div class="row d-none d-lg-flex bg-dark text-white top-bar-2 pb-3 ps-5 pe-5">
				<div class="col-3 d-flex justify-content-start text-uppercase">
					<div class="p lemonmilk">
						<i class="bi bi-truck fs-3 me-3"></i>Versandkostenfrei ab CHF 79 / 79€
					</div>
				</div>
				<div class="col-3 d-flex justify-content-center text-uppercase">
					<div class="p lemonmilk">
						<i class="bi bi-box-seam fs-3 me-3"></i>Versand innerhalb Schweiz 🇨🇭 & EU 🇪🇺
					</div>
				</div>
				<div class="col-3 d-flex justify-content-end text-uppercase">
					<div class="p lemonmilk">
						<i class="bi bi-credit-card fs-3 me-3"></i>Sichere und einfache Bezahlung
					</div>
				</div>
				<div class="col-3 d-flex justify-content-end text-uppercase">
					<div class="p lemonmilk">
						<i class="bi bi-arrow-clockwise fs-3 me-3"></i>14 Tage Rückgaberecht
					</div>
				</div>
			</div>
			<div class="row header-white bg-white top-bar-1 pt-4 pb-4 ps-5 pe-5">
				<div class="col-8 col-lg-3 d-flex align-items-center">
					<div class="site-branding ">
						<?php
							the_custom_logo();
						?>
					</div><!-- .site-branding -->
				</div>
				<div class="col-2 col-lg-8 d-flex align-items-center justify-content-end">
					<nav class="navbar navbar-expand-lg text-uppercase fw-light">
						<div class="container-fluid">
							<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<!-- *** Offcanvas *** -->
							<div class="offcanvas offcanvas-start d-flex d-lg-none bg-black" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
								<div class="row offcanvas-header mt-5 py-5">
									<div class="col-6 d-flex justify-content-center align-self-center">
										<img src="/wp-content/uploads/2023/02/cropped-logo.png" style="width:120px;">
									</div>
									<div class="col-6 d-flex justify-content-center align-self-center">
										<button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close">
											X
										</button>
									</div>	
								</div>
								<div class="row offcanvas-body">
									<div class="col-12 d-flex justify-content-center align-self- ps-0">
										<nav class="navbar-header text-white">
											<div class="navbar-nav text-white text-center">
												<?php
														wp_nav_menu(
															array(
																'theme_location' => 'menu-1',
																'menu_id'        => 'offcanvas-menu',
															)
														);
													?>
											</div>
										</nav>
									</div>
								</div>
							</div>
							<!-- *** Offcanvas End -->
							<div class="collapse navbar-collapse" id="navbarNav">
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
										)
									);
								?>
							</div>
						</div>
					</nav>
				</div>
				<div class="col-2 col-lg-1 d-flex align-items-center justify-content-end">
					<a class="header-cart" href="<?php echo wc_get_cart_url(); ?>" id="header-cart">
						<img src="/wp-content/uploads/2023/02/shopping-bag-black.png" alt="Cart" width="30px" height="30px">
						<span class="cart-item-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
					</a>
				</div>
			</div>
			
		</div>
	</header><!-- #masthead -->

	<!-- Newsletter Modal -->
	<?php get_template_part('template-parts/newsletter-modal'); ?>

	<!-- Currency Modal -->
	<?php get_template_part('template-parts/currency-modal'); ?>
