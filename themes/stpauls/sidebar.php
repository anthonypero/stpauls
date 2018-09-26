<?php
// The Sidebar Template
?>
                <?php if ( has_children() ) : ?>
                <div class="block secondary-menu icon icon-link">

                    <?php if ( $post->post_parent == 0 ) : ?>

                    <h2 class="block__title"><?php the_title(); ?></h2>

                    <?php else : $parents = get_post_ancestors( $post->ID ); ?>
                    
                    <h2 class="block__title"><?php echo apply_filters( "the_title", get_the_title( end ( $parents ) ) ) ; ?> </h2>

                    <?php endif; ?>

                    <?php if ( !$post->post_parent ) {

                        $children = wp_list_pages([
                            'child_of'      => $post->ID,
                            'title_li'      => '',
                            'echo'          => false,
                            'sort_column'   => 'menu_order'

                        ]);

                    } else {

                        if ( $post->ancestors ) {

                            $ancestors = end( $post->ancestors );
                            $children = wp_list_pages([
                                'child_of'      => $ancestors,
                                'title_li'      => '',
                                'echo'          => false,
                                'sort_column'   => 'menu_order' 
                            ]);
                        }
                    }

                    if ($children) : ?>

                    <ul class="secondary-menu__list list">
                        <?php echo $children; ?>
                    </ul>

                    <?php endif; ?>
                </div><!-- /.block -->
                <?php endif; ?>

                <?php dynamic_sidebar( 'single_sidebar' ); ?>