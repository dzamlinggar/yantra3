<?php
/**
 * A single event in a events loop. Used by eo-loop-single-event.php
 *
 ***************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory.
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 3.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" class="flex flex-col bg-gray-100 rounded-lg overflow-hidden" itemscope itemtype="http://schema.org/Event">
	<a href="<?php echo eo_get_permalink(); ?>" itemprop="url" class="block">
		<?php
		$post_id = get_the_ID(); // get the current post ID

		//If it has one, display the thumbnail
		if (has_post_thumbnail($post_id)) { // check if the post has a thumbnail
			$thumbnail_url = get_the_post_thumbnail_url($post_id); // get the thumbnail URL
		} else {
			$thumbnail_url = ''; // set a default value if there's no thumbnail
		}

		if (has_post_thumbnail()) {
			echo '<img src="' . $thumbnail_url . '" alt="' . get_the_title() . '" class="w-full h-auto" />';
		}
		?>
	</a>
	<div class="p-4">
            <a href="<?php eo_get_permalink(); ?>" class="block text-cyan-300 mt-3 mb-3 uppercase"><?php the_title(); ?></a>

			<div class="event-date">
				<?php
					//Formats the start & end date of the event
					echo eo_format_event_occurrence();
				?>
			</div>
            <p class="text-gray-500">
				<?php 
					echo eo_get_event_meta_list();
				?>

				<div class="mb-4"><?php the_content(); ?></div>
			</p>

            </div>
            </div>
</article>
