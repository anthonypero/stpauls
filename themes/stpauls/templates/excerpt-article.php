<article class="excerpt-list__row flex">

    <?php 
    
    $post_image = get_field('post_image'); 
    
    if ( !empty($post_image) ) : ?>

    <div class="excerpt-list__row--post-image">

        <picture>

            <source media="(min-width: 1200px)" srcset="<?php echo $post_image['sizes']['sp_3x2_sm']; ?>">
            <source media="(min-width: 768px)" srcset="<?php echo $post_image['sizes']['sp_3x2_md']; ?>">
            <img src="<?php echo $post_image['sizes']['sp_3x2_sm']; ?>" alt="<?php echo $post_image['alt']; ?>" />

        </picture>
        
    </div>

    <?php endif; /* Closes !empty($post_image) */ ?>

    <div class="excerpt-list__row--info">

        <h2 class="excerpt-list__row--title">
            <a href="<?php the_permalink(); ?>" class="excerpt-list__row--link" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </h2>
        
        <?php get_template_part('templates/submitted'); ?>

        <?php the_excerpt(); ?>

        <a href="<?php the_permalink(); ?>" class="excerpt-list__row--readmore btn btn--blue">Read More</a>
    </div>
</article> 