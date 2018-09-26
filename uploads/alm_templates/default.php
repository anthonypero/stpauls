<div class="page-content">

                        <article class="excerpt-list__row">
                            <h2 class="excerpt-list__row--title">
                                <a href="<?php the_permalink(); ?>" class="excerpt-list__row--link" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="excerpt-list__row--readmore btn btn--blue">Read More</a>
                        </article>

                    </div>