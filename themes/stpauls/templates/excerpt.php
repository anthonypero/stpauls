<article class="excerpt-list__row">

    <div class="excerpt-list__row--info">
        <h2 class="excerpt-list__row--title">
            <a href="<?php the_permalink(); ?>" class="excerpt-list__row--link" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </h2>
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="excerpt-list__row--readmore btn btn--blue">Read More</a>
    </div>
    
</article> 