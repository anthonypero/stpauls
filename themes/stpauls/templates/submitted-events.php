<?php if ( has_category() || has_tag() ) : ?>
<div class="submitted">

    Posted in&nbsp;&nbsp;
    
    <?php if ( has_category() ) : ?>

    <span class="submitted__cat">
        <?php the_category( '' ); ?> 
    </span>

    <?php if ( has_category() && has_tag() ) : ?>&nbsp;and&nbsp;&nbsp;<?php endif; ?>

    <?php if ( has_tag() ) : ?>

    <span class="submitted__tag">
        <?php the_tags( '' ); ?> 
    </span>

    <?php endif; /* Closes if has_tag() */ ?>
    <?php endif; /* Closes if has_category() */ ?>
</div>
<?php endif; /* Closes if has_category() || has_tags() */ ?>