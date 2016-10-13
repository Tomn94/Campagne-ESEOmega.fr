<?php

	// If post is password protected we don't need to load comments
	if ( post_password_required() ) {
		return;
	}

	if ( have_comments() ) : ?>
	
	<h2 class="text-danger" id="comments"><span class="fa fa-comments-ot"></span>&nbsp;&nbsp;
	<?php comments_number(__( 'No Comments yet', 'responsive-deluxe' ), __( 'One Comment', 'responsive-deluxe' ), __( '% Comments', 'responsive-deluxe' ) ); ?>
	</h2>
	<hr />
	<ol class="commentlist">
		<?php
            wp_list_comments('type=comment&callback=responsive_deluxe_custom_comments');
            paginate_comments_links();
        ?>
	</ol>
	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<p><?php _e( 'Comments are closed', 'responsive-deluxe' ); ?>.</p>

	<?php endif; ?>
	
<?php endif; ?>

                
<div>
<?php
$args = array(
	'comment_field' =>  '<textarea class="form-control" name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>',
);
comment_form($args, $post->ID);
?>
</div>
