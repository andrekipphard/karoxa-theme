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
				<div class="col-6 header-col-2 col-lg-3 d-flex align-items-center">
					<div class="site-branding ">
						<?php
							the_custom_logo();
						?>
					</div><!-- .site-branding -->
				</div>
				<div class="col-2 header-col-1 col-lg-6 d-flex align-items-center justify-content-center">
					
					<nav class="navbar navbar-expand-lg text-uppercase fw-light position-static">
						<!-- Container wrapper -->
						<div class="container-fluid">
							<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<!-- *** Offcanvas *** -->
							<div class="offcanvas offcanvas-start d-flex d-lg-none" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
								<div class="row offcanvas-header mt-5" style="margin-left:0px;">
									<div class="col-6 d-flex align-self-center">
										<img src="/wp-content/uploads/2023/02/cropped-logo.png" style="width:120px;">
									</div>
									<div class="col-6 d-flex align-self-center justify-content-end">
										<button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close">
										</button>
									</div>	
								</div>
								<div class="row offcanvas-body">
									<div class="col-12 d-flex ps-0">
										<nav class="navbar-header">
											<div class="navbar-nav text-center">
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
									<div class="col-12">
										<?php $mobile_menu_image = get_field( 'mobile_menu_image', 'options' );?>
										<img class="" src="<?= wp_get_attachment_image_url($mobile_menu_image, 'medium');?>"/>
									</div>
								</div>
							</div>
							<!-- *** Offcanvas End -->
							<!-- Collapsible wrapper -->
							<div class="collapse navbar-collapse" id="navbarExampleOnHover">
								<ul class="navbar-nav me-auto ps-lg-0" style="padding-left: 0.15rem">
									<?php if ( have_rows( 'menu_item', 'options' ) ) : ?>
										<?php while ( have_rows( 'menu_item', 'options' ) ) : the_row(); 
											$menu_item_name = get_sub_field( 'menu_item_name', 'options' );
											$menu_item_url = get_sub_field( 'menu_item_url', 'options' );?>
											<?php if ( get_sub_field( 'sub_menu_option', 'options' ) == "Ja" ) : ?>
												<li class="nav-item dropdown dropdown-hover position-static">
													<a class="nav-link" href="<?= $menu_item_url; ?>" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
													<?= $menu_item_name;?><i class="bi bi-caret-down-fill ms-2 dropdown-indicator"></i>
													</a>
													<!-- Dropdown menu -->
													<div class="dropdown-menu w-100 fade-in" aria-labelledby="navbarDropdown" style="border:none">
														<div class="container">
															<div class="row my-4">
																<?php if ( have_rows( 'sub_menu', 'options' ) ) : ?>
																	<?php while ( have_rows( 'sub_menu', 'options' ) ) : the_row();	
																		$sub_menu_name = get_sub_field( 'sub_menu_name', 'options' );
																		$sub_menu_url = get_sub_field( 'sub_menu_url', 'options' );?>
																		<div class="col-md-6 col-lg-4 mb-3 mb-lg-0 d-flex align-items-center flex-column">
																			<div class="content-aligned">
																				<a href="<?= $sub_menu_url;?>" class="text-start"><?= $sub_menu_name;?></a>
																				<div class="list-group list-group-flush">
																					<?php if ( have_rows( 'sub_menu_item', 'options' ) ) : ?>
																						<?php while ( have_rows( 'sub_menu_item', 'options' ) ) : the_row(); 
																							$sub_menu_item_name = get_sub_field( 'sub_menu_item_name', 'options' );
																							$sub_menu_item_url = get_sub_field( 'sub_menu_item_url', 'options' );?>
																							<a href="<?= $sub_menu_item_url;?>" class="list-group-item list-group-item-action text-start ps-0"><?= $sub_menu_item_name;?></a>
																						<?php endwhile; ?>
																					<?php endif; ?>
																				</div>
																			</div>
																			
																		</div>
																	<?php endwhile; ?>
																<?php endif; ?>
															</div>
														</div>
													</div>
												</li>
											<?php endif; ?>
											<?php if ( get_sub_field( 'sub_menu_option', 'options' ) == "Nein" ) : ?>
												<li class="nav-item">
												<?php
													if (has_shortcode($menu_item_name, 'wcc_switcher')):?>
														<?php echo do_shortcode($menu_item_name);?>
													<?php else :?>
														<a class="nav-link" href="<?= $menu_item_url; ?>">
														<?= $menu_item_name;?>
													</a>
													<?php endif;
													?>
												</li>
											<?php endif; ?>
										<?php endwhile;?>
									<?php endif;?>
								</ul>
							</div>
						</nav>
	
				</div>
				<div class="col-4 header-col-3 col-lg-3 d-flex align-items-center justify-content-end">
					<a href="#" data-bs-toggle="modal" data-bs-target="#productSearchModal"><i class="bi bi-search fs-3 me-4 me-lg-5"></i></a>
					<?php get_template_part('template-parts/product-search-modal'); ?>
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

<script>
	jQuery(function($) {
    $('.offcanvas .menu-item-has-children > a').click(function(e) {
      var $subMenu = $(this).siblings('.sub-menu');
      if ($subMenu.length > 0) {
        if (!$subMenu.hasClass('show')) {
          e.preventDefault();
          $subMenu.addClass('show');
        } else {
          $subMenu.removeClass('show');
        }
      }
    });
  });
  </script>




