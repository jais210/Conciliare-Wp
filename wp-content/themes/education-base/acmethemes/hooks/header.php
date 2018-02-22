<?php
/**
 * Setting global variables for all theme options saved values
 *
 * @since Education Base 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'education_base_set_global' ) ) :
    function education_base_set_global() {
        /*Getting saved values start*/
        $education_base_saved_theme_options = education_base_get_theme_options();
        $GLOBALS['education_base_customizer_all_values'] = $education_base_saved_theme_options;
        /*Getting saved values end*/
    }
endif;
add_action( 'education_base_action_before_head', 'education_base_set_global', 0 );

/**
 * Doctype Declaration
 *
 * @since Education Base 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'education_base_doctype' ) ) :
    function education_base_doctype() {
        ?>
        <!DOCTYPE html><html <?php language_attributes(); ?>>
        <?php
    }
endif;
add_action( 'education_base_action_before_head', 'education_base_doctype', 10 );

/**
 * Code inside head tage but before wp_head funtion
 *
 * @since Education Base 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'education_base_before_wp_head' ) ) :

    function education_base_before_wp_head() {
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="//gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php
    }
endif;
add_action( 'education_base_action_before_wp_head', 'education_base_before_wp_head', 10 );

/**
 * Add body class
 *
 * @since Education Base 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'education_base_body_class' ) ) :

    function education_base_body_class( $education_base_body_classes ) {

        global $education_base_customizer_all_values;
        $education_base_enable_animation = $education_base_customizer_all_values['education-base-enable-animation'];
        /*wow*/
        /*animation*/
        if( 1 != $education_base_enable_animation ){
            $education_base_body_classes[] = 'acme-animate';
        }
        $education_base_body_classes[] = education_base_sidebar_selection();

        return $education_base_body_classes;
    }
endif;
add_action( 'body_class', 'education_base_body_class', 10, 1);

/**
 * Start site div
 *
 * @since Education Base 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'education_base_site_start' ) ) :

    function education_base_site_start() {
        ?>
        <div class="site" id="page">
        <?php
    }
endif;
add_action( 'education_base_action_before', 'education_base_site_start', 20 );

/**
 * Skip to content
 *
 * @since Education Base 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'education_base_skip_to_content' ) ) :

    function education_base_skip_to_content() {
        ?>
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'education-base' ); ?></a>
        <?php
    }
endif;
add_action( 'education_base_action_before_header', 'education_base_skip_to_content', 10 );

/**
 * Main header
 *
 * @since Education Base 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'education_base_header' ) ) :
    function education_base_header() {
        global $education_base_customizer_all_values;
        $education_base_enable_header_top = $education_base_customizer_all_values['education-base-enable-header-top'];
        $education_base_top_header_design_options = $education_base_customizer_all_values['education-base-top-header-design-options'];
        if( 1 == $education_base_enable_header_top ){
            ?>
            <div class="top-header <?php echo esc_attr( $education_base_top_header_design_options ); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <?php
                             $education_base_phone_number = $education_base_customizer_all_values['education-base-phone-number'];
                                 $education_base_top_email = $education_base_customizer_all_values['education-base-top-email'];
                                 if( !empty( $education_base_phone_number ) ) {
                                    echo "<span class='top-phone'><i class='fa fa-phone'></i>".esc_html( $education_base_phone_number )."</span>";
                                 }
                                 if( !empty( $education_base_top_email ) ) {
                                    echo "<a class='top-email' href='mailto:".esc_attr( esc_html( $education_base_top_email ))."'><i class='fa fa-envelope-o'></i>".esc_html( $education_base_top_email )."</a>";
                                 }
                                $education_base_newsnotice_cat = $education_base_customizer_all_values['education-base-newsnotice-cat'];
                                    if( 0 != $education_base_newsnotice_cat ){
                                          $recent_args = array(
                                            'numberposts' => 5,
                                            'post_status' => 'publish',
                                            'category' => $education_base_newsnotice_cat
                                        );
                                        $recent_posts = wp_get_recent_posts($recent_args);
                                        if ( !empty( $recent_posts ) ):
                                            if ( !empty( $education_base_customizer_all_values['education-base-newsnotice-title'] ) ){
                                                $bn_title = $education_base_customizer_all_values['education-base-newsnotice-title'];
                                            }
                                            else{
                                                $bn_title = __( 'Recent posts', 'education-base' );
                                            }
                                            ?>
                                            <div class="top-header-latest-posts">
                                                <div class="bn-title">
                                                    <?php echo esc_html( $bn_title ); ?>
                                                </div>
                                                <div class="news-notice-content">
                                                    <?php foreach ($recent_posts as $recent): ?>
                                                        <span class="news-content">
                                                            <a href="<?php echo esc_url( get_permalink($recent["ID"]) ); ?>" title="<?php echo esc_attr($recent['post_title']); ?>">
                                                                <?php echo esc_html( $recent['post_title'] ); ?>
                                                            </a>
                                                        </span>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div> <!-- .header-latest-posts -->
                                        <?php
                                    endif;
                              }
                            ?>
                        </div>
                        <div class="col-sm-6 text-right">
                            <?php
                            $education_base_enable_top_social = $education_base_customizer_all_values['education-base-enable-top-social'];
                            if( 1 ==  $education_base_enable_top_social) {
                                do_action('education_base_action_social_links');
                            }
                            $education_base_button_title = $education_base_customizer_all_values['education-base-button-title'];
                            $education_base_button_link = $education_base_customizer_all_values['education-base-button-link'];
                            if( !empty( $education_base_button_title ) ){
                                ?>
                                <a class="read-more" href="<?php echo esc_url( $education_base_button_link ); ?>"><?php echo esc_html( $education_base_button_title ); ?></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

         $education_base_nav_class = '';
         $education_base_enable_sticky = $education_base_customizer_all_values['education-base-enable-sticky'];
         if( 1 == $education_base_enable_sticky ){
            $education_base_nav_class .= ' education-base-sticky';
        }
        ?>
        <div class="navbar at-navbar <?php echo $education_base_nav_class; ?>" id="navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
                    <?php
                    if ( 'disable' != $education_base_customizer_all_values['education-base-header-id-display-opt'] ):
                        if ( 'logo-only' == $education_base_customizer_all_values['education-base-header-id-display-opt'] && function_exists( 'the_custom_logo' ) ):
                            if ( function_exists( 'the_custom_logo' ) ) :
                                    the_custom_logo();
                            else :
                            endif;
                        else:/*else is title-only or title-and-tagline*/
                            if ( is_front_page() && is_home() ) : ?>
                                <h1 class="site-title">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                </h1>
                            <?php else : ?>
                                <p class="site-title">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                </p>
                            <?php endif;
                            if ( 'title-and-tagline' == $education_base_customizer_all_values['education-base-header-id-display-opt'] ):
                                $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() ) : ?>
                                    <p class="site-description"><?php echo esc_html( $description ); ?></p>
                                <?php endif;
                            endif;
                        endif;
                    endif;
                    ?>
                </div>
                <div class="main-navigation navbar-collapse collapse">
                    <?php
                    if( is_front_page() && !is_home() && has_nav_menu( 'one-page') ){
                        wp_nav_menu(
                            array(
                                'theme_location' => 'one-page',
                                'menu_id' => 'primary-menu',
                                'menu_class' => 'nav navbar-nav navbar-right acme-one-page',
                            )
                        );
                    }
                    else{
                         wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_id' => 'primary-menu',
                                'menu_class' => 'nav navbar-nav navbar-right acme-normal-page',
                            )
                        );
                    }
                   ?>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
        <?php
    }
endif;
add_action( 'education_base_action_header', 'education_base_header', 10 );