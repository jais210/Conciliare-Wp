<?php
/**
 * Footer content
 *
 * @since Education Base 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'education_base_footer' ) ) :

    function education_base_footer() {

        global $education_base_customizer_all_values;
        ?>
        <div class="clearfix"></div>
        <footer class="site-footer">
            <?php
            if(
            is_active_sidebar('footer-col-one') ||
            is_active_sidebar('footer-col-two') ||
            is_active_sidebar('footer-col-three') ||
            is_active_sidebar('footer-col-four')
            ) {
                ?>
                <div class="container">
                    <div class="bottom">
                        <div id="footer-top">
                            <div class="footer-columns at-fixed-width">
                                <?php
                                $footer_top_col = 'col-sm-3 init-animate slideInUp1';
                                if (is_active_sidebar('footer-col-one')) : ?>
                                    <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
                                        <?php dynamic_sidebar('footer-col-one'); ?>
                                    </div>
                                <?php endif;
                                if (is_active_sidebar('footer-col-two')) : ?>
                                    <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
                                        <?php dynamic_sidebar('footer-col-two'); ?>
                                    </div>
                                <?php endif;
                                if (is_active_sidebar('footer-col-three')) : ?>
                                    <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
                                        <?php dynamic_sidebar('footer-col-three'); ?>
                                    </div>
                                <?php endif;
                                if (is_active_sidebar('footer-col-four')) : ?>
                                    <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
                                        <?php dynamic_sidebar('footer-col-four'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div><!-- #foter-top -->
                    </div><!-- bottom-->
                </div>
                <div class="clearfix"></div>
                <?php
            }
            ?>
            <div class="copy-right">
                <div class='container'>
                    <div class="row">
                        <div class="col-sm-4 init-animate fadeInDown">
                            <?php
                            if ( 1 == $education_base_customizer_all_values['education-base-enable-social'] ) {
                                /**
                                 * Social Sharing
                                 * education_base_action_social_links
                                 * @since Education Base 1.0.0
                                 *
                                 * @hooked education_base_social_links -  10
                                 */
                                echo "<div class='text-left'>";
                                do_action('education_base_action_social_links');
                                echo "</div>";
                            }
                            ?>
                        </div>
                        <div class="col-sm-4 init-animate fadeInDown">
                            <?php
                            if( isset( $education_base_customizer_all_values['education-base-footer-copyright'] ) ): ?>
                                <p class="text-center">
                                    <?php echo wp_kses_post( $education_base_customizer_all_values['education-base-footer-copyright'] ); ?>
                                </p>
                            <?php endif;
                            ?>
                        </div>
                        <div class="col-sm-4 init-animate fadeInDown">
                            <div class="footer-copyright border text-right">
                                <div class="site-info">
                                    <?php printf( esc_html__( '%1$s by %2$s', 'education-base' ), 'Education Base', '<a href="http://www.acmethemes.com/" rel="designer">Acme Themes</a>' ); ?>
                                </div><!-- .site-info -->
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#page" class="sm-up-container"><i class="fa fa-angle-up sm-up"></i></a>
            </div>
        </footer>
    <?php
    }
endif;
add_action( 'education_base_action_footer', 'education_base_footer', 10 );

/**
 * Page end
 *
 * @since Education Base 1.1.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'education_base_page_end' ) ) :

    function education_base_page_end() {
        ?>
        </div><!-- #page -->
    <?php
    }
endif;
add_action( 'education_base_action_after', 'education_base_page_end', 10 );