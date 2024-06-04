<?php get_header(); ?>

<?php // get_template_part( 'template-parts/content', 'content' ); ?>

<div class="container mx-auto py-10 px-4">
    <div class="flex flex-col md:flex-row items-center md:items-center md:justify-between">
        <div class="mb-4 md:mb-0 md:w-1/2 text-center md:text-left">
            <h2 class="text-4xl text-black"><?php the_title(); ?></h2>
        </div>
        <div class="md:w-1/2 text-center md:text-left">
            <p class="text-lg text-gray-700">
                <?php echo get_the_excerpt(); ?>
            </p>
        </div>
    </div>
</div>





    <?php if ( has_post_thumbnail() ) { ?>
        <div class="w-full">
        <?php 
        the_post_thumbnail('full', [
            'class' => 'w-full h-64 sm:h-96 object-cover'
        ]);
        ?>
        </div>
    <?php } ?>



    <div class="mx-auto px-5 py-3">
<?php
$args = array(
    'post_type' => 'about_yantrayoga',
    'posts_per_page' => -1,
    'orderby' => 'date', // Ordina per data
    'order' => 'ASC',   // Ordine discendente
);

$about_yantrayoga_posts = new WP_Query($args);

if ($about_yantrayoga_posts->have_posts()) :
    $count = 0;
    while ($about_yantrayoga_posts->have_posts()) : $about_yantrayoga_posts->the_post();
        if ($count == 0) : ?>
            <div class="text-center mb-10">
                <div class="mb-4 pt-5">
                    <?php //the_post_thumbnail('full', ['class' => 'inline-block max-w-full h-auto']); ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/drop.png" alt="<?php the_title(); ?>" class="inline-block max-w-full h-auto">
                </div>
                <h2 class="text-3xl text-black"><?php the_title(); ?></h2>
                <div class="mb-4  p-5"><?php the_content(); ?></div>
            </div>
        <?php else : ?>
            <div class="grid <?php echo ($count % 2 == 0) ? 'grid-cols-1 md:grid-cols-2' : 'grid-cols-1 md:grid-cols-2 md:flex-col-reverse'; ?> mb-10">
                <?php if ($count % 2 == 0) : ?>
                    <div class="relative">
                        <div class="h-auto md:h-full bg-cover bg-center" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
                    </div>
                    <div class="p-5 flex flex-col justify-center">
                        <div class="p-5">
                            <h2 class="text-3xl text-black mb-4"><?php the_title(); ?></h2>
                            <div class="mb-4"><?php the_content(); ?></div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="p-5 flex flex-col justify-center">
                        <div class="p-5">
                            <h2 class="text-3xl text-black mb-4"><?php the_title(); ?></h2>
                            <div class="mb-4"><?php the_content(); ?></div>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="h-auto md:h-full bg-cover bg-center" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
                    </div>
                <?php endif; ?>
            </div>

        <?php endif;
        $count++;
    endwhile;
    wp_reset_postdata();
else :
    echo '<p>Nessun contenuto trovato.</p>';
endif;
?>
</div>



<div class="container mx-auto py-10 px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <?php
        // $args = array(
        //     'posts_per_page' => 3,
        //     'post_status' => 'publish',
        // );
        $args = array(
            'post_status' => 'publish',
            'posts_per_page' => 3,  // Limita il numero di post a 3
            'orderby' => 'date',    // Ordina per data
            'order' => 'DESC',      // Ordine discendente

            // Take only Custome from specific CATEGORY
            // 'category_name' => 'catagory_name',

            // Take only Custome with specific TAG
            // 'tax_query' => array(
            //     array(
            //         'taxonomy' => 'taxonomy_name',
            //         'field' => 'slug',
            //         'terms' => 'tag_name',
            //     ),
            // ),
        );
        $recent_posts = new WP_Query($args);
        if ($recent_posts->have_posts()) :
            while ($recent_posts->have_posts()) : $recent_posts->the_post();
        ?>
                <div class="flex flex-col bg-gray-100 rounded-lg overflow-hidden">
                    <a href="<?php the_permalink(); ?>" class="block">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-auto" />
                        <?php endif; ?>
                    </a>
                    <div class="p-4">
                        <a href="<?php the_permalink(); ?>" class="text-xl font-bold text-black"><?php the_title(); ?></a>
                        <p class="text-gray-700"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                    </div>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo 'No posts found';
        endif;
        ?>
    </div>
</div>



<?php
get_footer();