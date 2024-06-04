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





    <?php 
    $background_image_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_template_directory_uri() . "/images/home/bg.png"; 
    $fabio_img_url= get_template_directory_uri() . "/images/fabio.jpg";
    ?>
    <div class="w-full h-screen bg-cover bg-center" style="background-image: url('<?php echo esc_url($background_image_url); ?>');">
        <div class="w-full h-full bg-black bg-opacity-50 flex items-center">
            <div class="container mx-auto px-4 py-16 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="text-center">
                    <img src="<?php echo $fabio_img_url; ?>" alt="Image 1" class="w-full h-32 object-cover mb-4">
                    <h2 class="text-2xl font-bold mb-2">Title 1</h2>
                    <?php echo $fabio_img_url; ?>
                    <p>Content for the first column goes here. This is a placeholder text.</p>
                </div>
                <div class="text-center">
                    <img src="path/to/your/image2.jpg" alt="Image 2" class="w-full h-32 object-cover mb-4">
                    <h2 class="text-2xl font-bold mb-2">Title 2</h2>
                    <p>Content for the second column goes here. This is a placeholder text.</p>
                </div>
            </div>
        </div>
    </div>





    <?php
get_footer();