<div class="my-0 mx-auto w-full auto" style="height: auto;">
    <div class="m-0 p-0 bg-cover bg-center bg-no-repeat" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/home/bg.png')">
        <div class="w-full">
            <?php get_header(); ?>
            
            <div class="container mx-auto text-center py-10 pt-10 lg:pt-40">
                <h2 class="text-4xl text-white mb-4"><?php the_title(); ?></h2>
                <div class="text-white mb-4 mx-auto w-1/2"><?php the_excerpt(); ?></div>
                <div class="mt-3">
                    <?php
                        $page = get_page_by_path('events');
                        $link = get_permalink($page->ID);
                    ?>
                    <a href="<?php echo $link; ?>" class="bg-teal-700 hover:bg-teal-900 text-white font-bold py-3 px-4 rounded-lg">
                        Find Your Course
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-8 mx-auto">
    <div class="container mx-auto text-center block mb-5" id="text1">
        <div class="text-black mb-4 mx-auto w-1/2 pt-5">
            <div class="mb-4 pt-5">
                <?php //the_post_thumbnail('full', ['class' => 'inline-block max-w-full h-auto']); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/drop.png" alt="<?php the_title(); ?>" class="inline-block w-10 h-auto">
            </div>
            <div class="text-center text-2xl">
            Learn to breathe better, experience authentic relaxation and improve your health; coordinating breath, rhythm and movement. 

            </div>
        </div>
    </div>    
</div>


<?php
    echo get_recent_posts_markup(array(
        'post_type' => 'page',
        'posts_per_page' => 6,
        'meta_key' => '_featured_page',
		'meta_value' => '1'
    ));
?>


<div class="container my-8 mx-auto">
    <div class="container mx-auto text-center block mb-5" id="text1">
        <div class="text-black mb-4 mx-auto w-1/2 pt-5">
            <div class="mb-4 pt-5">
                <?php //the_post_thumbnail('full', ['class' => 'inline-block max-w-full h-auto']); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/drop.png" alt="<?php the_title(); ?>" class="inline-block w-10 h-auto">
            </div>
            <div class="text-center text-2xl">
                Meet our teachers
            </div>
            <div class="text-center ">
                Our team of dedicated instructors is found worldwide, making Yantra Yoga practice accessible to everybody. Connect with us!
            </div>
        </div>
    </div>    
</div>

<div class="w-full">
    <div class="container mx-auto">
        <?php include 'teachers-list.php'; ?>
    </div>
</div>


<?php
get_footer();