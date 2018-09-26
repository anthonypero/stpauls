<?php
// Breadcrumb Template
?>

        <div class="breadcrumbs gutter__left gutter__right">
            <h2 class="menu-label hidden">You Are Here:</h2>
            <div class="breadcrumbs__trail">
                <span class="breadcrumbs__trail--item"><a href="<?php bloginfo('url'); ?>" class="breadcrumbs__trail--link">Home</a></span>
                <?php get_breadcrumb(); ?>
            </div>
        </div>