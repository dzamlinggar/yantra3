<div class="my-0 mx-auto w-full auto" style="height: auto;">
    <div class="m-0 p-0 bg-cover bg-center bg-no-repeat" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/home/bg.png')">
        <div class="w-full">
            <?php get_header(); ?>
            
            <div class="container mx-auto text-center py-10">
                <h2 class="text-4xl text-white mb-4"><?php the_title(); ?></h2>
                <div class="text-white mb-4 mx-auto w-1/2"><?php the_excerpt(); ?></div>
                <div class="mt-3">
                    <a href="<?php the_permalink(); ?>" class="bg-teal-700 hover:bg-teal-900 text-white font-bold py-3 px-4 rounded-lg">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-8 mx-auto">
    <div class="container mx-auto text-center block mb-5" id="text1">
        <div class="text-black mb-4 mx-auto w-1/2 pt-5">
            <div class="text-center p-3 mt-5">
                <img src="<?php echo get_template_directory_uri(); ?>/images/drop.png" alt="line" class="mx-auto">
            </div>
            <div class="text-center text-2xl">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. 
            </div>
        </div>
    </div>

    
</div>
<?php
get_footer();