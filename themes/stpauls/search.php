<?php

get_header(); 

if ( function_exists('virtuosic_theme_info') ) {
    virtuosic_theme_info();
} ?>

    <main class="gutter__top gutter__bottom gutter__left gutter__right site-content <?php if ( ! is_active_sidebar( 'single_sidebar' )) : ?> empty-sidebar<?php endif; ?>">

        <div class="breadcrumbs gutter__left gutter__right">
            <h2 class="menu-label hidden">You Are Here:</h2>
            <div class="breadcrumbs__trail">
                <span class="breadcrumbs__trail--item"><a href="<?php bloginfo('url'); ?>" class="breadcrumbs__trail--link">Home</a></span>
                <span class="breadcrumbs__trail--item">Search This Site</span>
            </div>
        </div>

        <div class="flexwrapper gutter__top gutter__bottom gutter__left gutter__right">

            <section class="main-content">

                <article class="page-content">

                    <h1 class="page-title">Search This Site</h1>

                    <div class="sp-search">
                        <form class="sp-search__form" role="search" action="/" method="get">
                            <label class="screen-reader-text" for="s">Search for:</label>
                            <input id="s" name="s" type="text" value="" placeholder="Enter your search text here" />
                            <input id="searchsubmit" type="submit" value="Go!" />
                        </form>
                    </div>

                </article>

                <aside class="excerpt-list">

                <?php // Loop through child pages

                    $keyword = $_GET[ 's' ];
                    $paged = get_query_var( 'paged' );
                    $args = [
                        'post_type'         => 'any',
                        'posts_per_page'    => 10,
                        'paged'             => $paged,
                        'order'             => 'DESC',
                        'orderby'           => 'post_date',
                        's'                 => $keyword,
                    ];

                    $query = new WP_Query( $args ); 
                    
                    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                    
                    $post_type = get_post_type();
                    
                    ?>
                    
                    <div class="page-content">
                        
                        <?php get_template_part('templates/excerpt', $post_type); ?>

                    </div>

                    <?php endwhile; ?>

                    <div class="pagination">
                        <?php echo paginate_links([
                            'total'         => $query->max_num_pages,
                            'prev_text'     => __('«'),
                            'next_text'     => __('»'),
                        ]); ?>
                    </div>

                    <?php endif; /* Closes $query->have_posts() */ ?>

                </aside>

            </section>

        </div>
    </main>

    <?php get_footer(); ?>
