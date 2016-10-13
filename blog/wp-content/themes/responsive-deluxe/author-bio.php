	<hr>
        <div class="author-description">
    	<div class="media">
            <div class="media-left comment-author vcard">
    			<?php echo get_avatar( get_the_author_meta( 'user_email' ), 152 ); ?>
            </div>

            <div class="media-body">
    			
                <?php _e( 'About', 'responsive-deluxe' ); ?> <cite class="comment-name"><?php echo get_the_author(); ?></cite><br>
                
				<p><?php the_author_meta( 'description' ); ?></p>
                
                <p><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s', 'responsive-deluxe' ), get_the_author() ); ?>
				</a>
                </p>

            </div>
        </div>
	</div>
