<?php get_header(); ?>

<?php
$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
$user = get_userdata($curauth->ID);
$pod = pods();
?>

<article id="post-<?php echo $user->ID ?>">

	<div class="grid grid-cols-2 mt-10">
		<div>
			<h2 class="text-3xl text-tdark font-bold">Take a class with <br /><?php the_author(); ?></h2><br />
			<button class="btn btn-green">Start Now</button>
		</div>
		<div>
			<p class="text-tdark">
				Become a Yantra Yoga member today.
				You will be able to learn and deepen your knowledge in this precious method
				by world-class teachers.
				We make it easy to integrate practice to your daily life.
			</p>
		</div>
	</div>
	<div class="max-w-none mt-10">
		<img src="<?php echo pods_image_url($curauth->cover_image, 'large'); ?>" alt="author background image" class="w-full h-96 object-cover object-center" />
	</div>
	<div class="grid grid-cols-3 gap-10">
		<div class="col-span-2">
			<div>

				<img src="<?php echo pods_image_url($curauth->profile_picture, 'large'); ?>" alt="author profile image" class="w-40 h-40 rounded-full -mt-20 object-cover object-center border-4 border-white" />
			</div>

			<h1 class="text-4xl text-tdark font-bold"><?php the_author(); ?></h1>
			<div>
				<h3 class="text-3xl text-tdark mt-3">
					<?php  if ($curauth->level != "None") {
						echo $curauth->level; 
					}?>
				</h3>
			</div>
			<div class="flex">
				<?php if ($curauth->twitter) : ?>
					<div class="mr-3"><a href="<?php echo $curauth->twitter; ?>" target="_blank"><i class="fab fa-twitter text-3xl text-tdirt mt-3"></i></a></div>
				<?php endif; ?>
				<?php if ($curauth->youtube) : ?>
					<div class="mr-3"><a href="<?php echo $curauth->youtube; ?>" target="_blank"><i class="fab fa-youtube text-3xl text-tdirt mt-3"></i></a></div>
				<?php endif; ?>
				<?php if ($curauth->tiktok) : ?>
					<div class="mr-3"><a href="<?php echo $curauth->tiktok; ?>" target="_blank"><i class="fab fa-tiktok text-3xl text-tdirt mt-3"></i></a></div>
				<?php endif; ?>
				<?php if ($curauth->facebook) : ?>
					<div class="mr-3"><a href="<?php echo $curauth->facebook; ?>" target="_blank"><i class="fab fa-facebook-f text-3xl text-tdirt mt-3"></i></a></div>
				<?php endif; ?>
				<?php if ($curauth->instagram) : ?>
					<div class="mr-3"><a href="<?php echo $curauth->instagram; ?>" target="_blank"><i class="fab fa-instagram text-3xl text-tdirt mt-3"></i></a></div>
				<?php endif; ?>
				<?php if ($curauth->linkedin) : ?>
					<div class="mr-3"><a href="<?php echo $curauth->linkedin; ?>" target="_blank"><i class="fab fa-linkedin text-3xl text-tdirt mt-3"></i></a></div>
				<?php endif; ?>
				<?php if ($curauth->threads) : ?>
					<div class="mr-3"><a href="<?php echo $curauth->threads; ?>" target="_blank"><i class="fab fa-threads text-3xl text-tdirt mt-3"></i></a></div>
				<?php endif; ?>
				<?php if ($curauth->public_email) : ?>
					<div class="mr-3"><a href="mailto:<?php echo $curauth->public_email; ?>" target="_blank"><i class="far fa-envelope text-3xl text-tdirt mt-3"></i></a></div>
				<?php endif; ?>
				<?php if ($curauth->public_website) : ?>
					<div class="mr-3"><a href="<?php echo $curauth->public_website; ?>" target="_blank"><i class="fas fa-link text-3xl text-tdirt mt-3"></i></a></div>
				<?php endif; ?>
				<?php if ($curauth->public_phone) : ?>
					<div class="mr-3"><a href="tel:<?php echo $curauth->public_phone; ?>" target="_blank"><i class="fas fa-mobile-alt text-3xl text-tdirt mt-3"></i></a></div>
				<?php endif; ?>

				<div class="content mt-5 text-tdark text-lg">
				</div>
			</div>
			<div class="text-tdark mt-5">
				<?php echo $curauth->description; ?>
			</div>


		</div>
		<div class="col-span-1 mt-10">
			<h3 class=" text-tdark text-3xl font-bold">Location</h3>

			<div class="text-tdark text-md text-base font-bold">
				<!-- <?php foreach (explode(', ', $pod->display('locations')) as $key => $value) : ?>
					<?php echo $value ?>
					<span class="fi fi-<?php echo strtolower($value) ?>"></span>
				<?php endforeach; ?> -->
				> <?php echo $pod->display('locations') ?>
			</div>

			<h3 class="text-tdark text-md text-3xl font-bold mt-10">Languages</h3>
			<div class="text-tdark text-md text-base font-bold">

				> <?php echo $pod->display('languages') ?>
			</div>
			<h3 class=" text-tdark text-3xl font-bold mt-10">Yantra Yoga Styles</h3>
			<div class="text-tdark text-md text-base font-bold grid grid-cols-2 -ml-10">
				<?php $styles =  is_array($pod->field('yantra_styles')) ? $pod->field('yantra_styles') : $pod->field('yantra_styles')   ?>
				<?php foreach ($styles as $key => $value) : ?>
					<div class="flex items-center flex-col text-center mt-10">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/images/symbols/' . $value . '.png') ?>" alt="yantra yoga style" class="w-20 h-20 object-cover object-center rounded-full" />
						<?php echo (explode(',', $pod->display('yantra_styles'))[$key]) ?>
					</div>

				<?php endforeach; ?>
			</div>

			
		</div>
	</div>
</article>

<?php
get_footer();
