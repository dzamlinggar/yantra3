<?php get_header(); 


// $background_image_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_template_directory_uri() . "/images/bg-single-teacher.png"; 

$background_image_url = get_template_directory_uri() . "/images/bg-single-teacher.png";


?>

<div class="container my-8 mx-auto">
    <div class="container mx-auto text-center block mb-5" id="text1">
        <div class="text-black mb-4 mx-auto w-1/2 pt-5">
            <h2 class="text-4xl text-black mb-4">
                Practice
            </h2>
            <div class="text-center ">
                <div class="text-black mb-4 mx-auto">...</div>

            </div>
        </div>
    </div>    
</div>

<div class="w-full">
    <img src="<?php echo $background_image_url; ?>" class="w-full h-64 sm:h-96 object-cover" alt="">
</div>


<?php eo_get_template_part( 'eo-loop-events' ); //Lists the events ?>

<?php
    // echo get_recent_posts_markup(array(
    //     'post_type' => 'post',
    //     'posts_per_page' => 12,
    // ));
?>

<?php
get_footer();
