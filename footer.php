</main>

<?php do_action('tailpress_content_end'); ?>

</div>

<?php do_action('tailpress_content_after'); ?>

<footer id="colophon" class="container mx-auto py-12" role="contentinfo">
	<?php do_action('tailpress_footer'); ?>

	<div class="border my-5"></div>
	<div class="mx-auto container">
		<div class="grid grid-cols-5">
			<div class="col-span-2">
				<div class="text-slate-400 font-bold">SIGN UP</div>
				<div class="text-blue-800 text-3xl font-bold my-3">Get monthly inspirations</div>
				<div class="flex flex-row">
					<input class="border border-grey-800 p-3 rounded-lg mr-2" type="email" placeholder="email here">
					<button class="bg-blue-800 rounded-lg p-3 px-5 text-[#c6b296] font-bold">SIGN UP!</button>
				</div>
			</div>
			<div class="logo">
				<?php if (has_custom_logo()) : ?>
					<?php the_custom_logo(); ?>
				<?php endif;  ?>
			</div>
			<div class="menu">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_class'      => 'two-columns lg:-mx-4',
						'li_class'        => 'lg:mx-4',
						'fallback_cb'     => false,
					)
				);
				?>
			</div>
			<div class="">
				<div class="text-blue-800 font-bold ml-2">CONNECT</div>
				<div class="mt-3 flex flex-row">
					<a href=" #" class="social-icon">
						<img class="w-8 h-8" src="<?php bloginfo('template_url'); ?>/images/facebook.gif" />
					</a>
					<a href="#" class="social-icon">
						<img class="w-8 h-8" src="<?php bloginfo('template_url'); ?>/images/twitter.gif" />
					</a>
					<a href="#" class="social-icon">
						<img class="w-8 h-8" src="<?php bloginfo('template_url'); ?>/images/instagram.gif" />
					</a>
					<a href="#" class="social-icon">
						<img class="w-8 h-8" src="<?php bloginfo('template_url'); ?>/images/youtube.gif" />
					</a>
				</div>
				<hr class="mt-4 mb-4" />
				<div class="flex justify-center">
					<img class="" src="<?php bloginfo('template_url'); ?>/images/atif-logo.png">
				</div>
			</div>
		</div>
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>