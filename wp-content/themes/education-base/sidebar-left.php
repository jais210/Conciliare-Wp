<?php
/**
 * The left sidebar containing the main widget area.
 */
if ( ! is_active_sidebar( 'education-base-sidebar' ) ) {
    return;
}
$sidebar_layout = education_base_sidebar_selection();
if( $sidebar_layout == "left-sidebar" ) : ?>
    <div id="secondary-left" class="at-fixed-width widget-area sidebar secondary-sidebar" role="complementary">
        <div id="sidebar-section-top" class="widget-area sidebar init-animate slideInUp1 clearfix">
            <?php dynamic_sidebar( 'education-base-sidebar' ); ?>
        </div>
    </div>
<?php endif;