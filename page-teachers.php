<?php get_header(); ?>

<?php 
$background_image_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_template_directory_uri() . "/images/teachers-bg.jpg"; 
$fabio_img_url = get_template_directory_uri() . "/images/fabio.png";
$laura_img_url = get_template_directory_uri() . "/images/laura.png";
?>
<div class="w-full bg-cover bg-center p-5 mt-10" style="background-image: url('<?php echo esc_url($background_image_url); ?>');">
    <div class="container mx-auto pt-5 px-2 pb-10">
        <div class="text-center">
            <div class="text-center">
                <h2 class="text-5xl text-teachers text-center mb-3"><?php the_title(); ?></h2>
            </div>
            <div class="text-center text-teachers p-10">
                <p class="text-lg text-teachers">
                    <?php the_content(); ?>
                </p>
            </div>
        </div>
    </div>
    
    <div class="w-full flex items-center ">
        <div class="container mx-auto pb-10 grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex flex-col items-center justify-center text-center text-teachers">
                <img src="<?php echo $laura_img_url; ?>" alt="Laura" class="w-1/2 h-auto object-cover mb-4 rounded-full">
                <h2 class="text-2xl font-bold mb-2">Laura Evangelisti</h2>
                <p>Senior Teacher</p>
            </div>
            <div class="flex flex-col items-center justify-center text-center text-teachers">
                <img src="<?php echo $fabio_img_url; ?>" alt="Fabio" class="w-1/2 h-auto object-cover mb-4 rounded-full">
                <h2 class="text-2xl font-bold mb-2">Fabio Andrico</h2>
                <p>Senior Teacher</p>
            </div>
        </div>
    </div>
</div>



<div class="w-full">
    <div class="container mx-auto">
        <?php include 'teachers-list.php'; ?>
    </div>
</div>

<?php get_footer();