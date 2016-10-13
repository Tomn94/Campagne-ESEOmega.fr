        <!-- Sidebar -->
        <aside class="col-md-4 sidebar-container">
		<?php if ( is_active_sidebar( 'sidebar-widgets' ) ) : ?>
            <div id="widget-area" class="widget-area" role="complementary">
                <?php dynamic_sidebar( 'sidebar-widgets' ); ?>
            </div>
		<?php endif; ?>
        </aside>