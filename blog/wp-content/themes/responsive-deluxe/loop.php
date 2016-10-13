<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article <?php post_class( 'card' ); ?> id="post-<?php the_ID(); ?>">

            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
            <div>
                <span class="post-meta"><span class="fa fa-clock-o"></span>&nbsp;&nbsp; <?php echo(get_the_date()); ?></span>
                <span class="post-meta"><span class="fa fa-comments-o"></span>&nbsp;&nbsp; <?php comments_popup_link( __( 'No Comments yet', 'responsive-deluxe' ), __( 'One Comment', 'responsive-deluxe' ), __( '% Comments', 'responsive-deluxe' ) ); ?></span>
                <span class="post-meta"><span class="fa fa-folder-open"></span>&nbsp;&nbsp;&nbsp;<?php _e( 'Posted in', 'responsive-deluxe'); ?>: <?php the_category(', ') ?></span>
            </div>

            <?php if (has_post_thumbnail()) { ?>
                <a class="thumbnail-link" href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                <?php
            }
            the_excerpt();
            ?>

            <hr>
            <div class="pull-right"><a href="<?php the_permalink() ?>" class="btn btn-danger"><?php _e( 'Continue reading', 'responsive-deluxe'); ?></a></div>
        </article>
        <div class="assistive-text"><?php wp_link_pages(); ?></div>
        <?php if ( has_post_format('audio')) { /*DoNothing*/ }  ?>

    <?php endwhile; ?>

<?php else : ?>

    <h2><?php _e( 'No articles found', 'responsive-deluxe'); ?></h2>

<?php endif; ?>