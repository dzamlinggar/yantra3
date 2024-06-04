<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css" />

	<?php wp_head(); ?>	
</head>

<body <?php body_class('text-gray-900 antialiased'); ?>>

	<?php do_action('tailpress_site_before'); ?>


	<!-- <div id="full-menu" class="fixed inset-0 bg-white flex flex-col hidden justify-between opacity-0 transition-all duration-200 ease-in-out" style="z-index: 9999;"> -->
	<div class="fixed inset-0 bg-white invisible opacity-0 transition-all transition-opacity duration-200 ease-in-out" id="full-menu">
		<div class="flex flex-col justify-between">
			<div class="flex justify-between p-1">
				<div>
					<?php
						wp_nav_menu(
							array(
								'container_id'    => 'primary-menu',
								'container_class' => 'block',
								'menu_class'      => 'flex',
								'theme_location'  => 'primary',
								'li_class'        => 'p-2',
								'fallback_cb'     => false,
							)
						);
						?>
				</div>
				<div>
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" width="50" height="50" alt="Yantra Yoga Logo">
				</div>
				<div>
					<button class="m-2 p-2 border border-black rounded-full" id="closeMenu">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
						</svg>
					</button>
				</div>
			</div>
			
			<hr />
			<div class="p-4 flex">
				<div class="">
			<?php wp_nav_menu(
				array(
					'container_id'    => 'secondary-menu',
					'container_class' => 'hidden mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
					'menu_class'      => 'border-r border-gray-200',
					'theme_location'  => 'secondary-menu',
					'li_class'        => 'block',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'walker'          => new Walker_Nav_Secondary(),
					'fallback_cb'     => false,
				)
			);?>
				</div>
				<div class="childs flex-grow ml-4">
					<ul>
					<?php wp_nav_menu(
						array(
							'container_id'    => 'secondary-menu-child',
							'container_class' => 'block',
							'menu_class'      => '',
							'theme_location'  => 'secondary-menu',
							'li_class'        => 'block',
							'fallback_cb'     => false,
						)
					);?>
					</ul>
				</div>
			</div>
		</div>
	</div>


	<div id="page" class="min-h-screen flex flex-col">

		<?php do_action('tailpress_header'); ?>

		<header>
			<div class="mx-auto container mt-4 <?php if ( is_front_page() ) { echo "text-white"; } else { echo "text-black";  } ?> ">
				<div class="grid grid-cols-3">
					<div class="flex items-center">
						<div class="mr-4">
							<!-- <a href="#" aria-label="Toggle navigation" id="primary-menu-toggle" class="rounded-full border border-2 <?php if ( is_front_page() ) { echo "border-white"; } else { echo "border-black";  } ?> p-3"> -->
							<a href="#" id="hamburger" class="rounded-full border border-2 <?php if ( is_front_page() ) { echo "border-white"; } else { echo "border-black";  } ?> p-3">
								<i class="fas fa-bars text-2xl"></i>

								<!-- <svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
										<g id="icon-shape">
											<path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z" id="Combined-Shape"></path>
										</g>
									</g>
								</svg> -->
							</a>
						</div>
						

						<?php
						wp_nav_menu(
							array(
								'container_id'    => 'primary-menu',
								'container_class' => 'hidden mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
								'menu_class'      => 'lg:flex lg:-mx-4',
								'theme_location'  => 'primary',
								'li_class'        => 'lg:mx-2',
								'fallback_cb'     => false,
							)
						);
						?>
					</div>

					<!-- <div class="lg:flex lg:justify-between lg:items-center border-b py-6"> -->
					<!-- <div class="flex justify-between items-center"> -->
					<div class="mx-auto">
						<?php if (has_custom_logo()) { ?>
							<?php if ( is_front_page() ) : ?>
								<a href="<?php echo home_url(); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/images/logo-yy-white.png" alt="Logo">
								</a>
							<?php else: ?>
								<a href="<?php echo home_url(); ?>">
									<?php the_custom_logo(); ?>
								</a>
							<?php endif; ?>
						<?php } else { ?>
							<a href="<?php echo get_bloginfo('url'); ?>" class="font-extrabold text-lg uppercase">
								<?php echo get_bloginfo('name'); ?>
							</a>

							<p class="text-sm font-light text-gray-600">
								<?php echo get_bloginfo('description'); ?>
							</p>

						<?php } ?>
					</div>
				</div>
			</div>
		</header>

		<!-- <div id="content" class="site-content flex-grow"> -->

			<?php do_action('tailpress_content_start'); ?>

			<!-- <main> -->