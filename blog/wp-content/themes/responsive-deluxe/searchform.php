				<h2><?php _e( 'Search the blog', 'responsive-deluxe' ); ?></h2>
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="searchform" method="get" role="form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'e.g. Search terms', 'responsive-deluxe' ); ?>">
                    </div>
                    <input type="submit" id="searchsubmit" class="btn btn-success btn-block" value="<?php esc_attr_e( 'Search', 'responsive-deluxe' ); ?>"/>
                </form>