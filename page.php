<?php get_header(); ?>

<?php // get_template_part( 'template-parts/content', 'content' ); ?>

<div class="container mx-auto text-center py-10 pb-3">
    <h2 class="text-4xl text-black mb-4"><?php the_title(); ?></h2>
</div>

<div class="">
<?php if ( has_post_thumbnail() ) {
the_post_thumbnail('full', ['class' => 'w-full max-w-full']);
} ?>
</div>

<div class="entry-content my-10">
	<?php
    /* translators: %s: Name of current post */
    the_content(
        sprintf(
            __( 'Continue reading %s', 'tailpress' ),
            the_title( '<span class="screen-reader-text">"', '"</span>', false )
        )
    );

    wp_link_pages(
        array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tailpress' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
            'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tailpress' ) . ' </span>%',
            'separator'   => '<span class="screen-reader-text">, </span>',
        )
    );
    ?>
</div>


<?php get_footer();