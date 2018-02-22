<?php
/**
 * Top Header Design Options
 *
 * @since Education Base 1.0.0
 *
 * @param null
 * @return array $education_base_top_header_design_options
 *
 */
if ( !function_exists('education_base_top_header_design_options') ) :
    function education_base_top_header_design_options() {
        $education_base_top_header_design_options =  array(
            'normal' => __( 'Normal', 'education-base' ),
            'left-curve' => __( 'Left Curve', 'education-base' )
        );
        return apply_filters( 'education_base_top_header_design_options', $education_base_top_header_design_options );
    }
endif;

/**
 * Featured Slider Number
 *
 * @since Education Base 1.0.0
 *
 * @param null
 * @return array $education_base_featured_slider_number
 *
 */
if ( !function_exists('education_base_featured_slider_number') ) :
    function education_base_featured_slider_number() {
        $education_base_featured_slider_number =  array(
            1 => __( '1', 'education-base' ),
            2 => __( '2', 'education-base' ),
            3 => __( '3', 'education-base' )
        );
        return apply_filters( 'education_base_featured_slider_number', $education_base_featured_slider_number );
    }
endif;

/**
 * Featured Slider Image Options
 *
 * @since Education Base 1.0.0
 *
 * @param null
 * @return array $education_base_fs_image_display_options
 *
 */
if ( !function_exists('education_base_fs_image_display_options') ) :
    function education_base_fs_image_display_options() {
        $education_base_fs_image_display_options =  array(
            'full-screen-bg' => __( 'Full Screen Background', 'education-base' ),
            'responsive-img' => __( 'Responsive Image', 'education-base' )
        );
        return apply_filters( 'education_base_fs_image_display_options', $education_base_fs_image_display_options );
    }
endif;

/**
 * Header logo/text display options alternative
 *
 * @since Education Base 1.0.0
 *
 * @param null
 * @return array $education_base_header_id_display_opt
 *
 */
if ( !function_exists('education_base_header_id_display_opt') ) :
    function education_base_header_id_display_opt() {
        $education_base_header_id_display_opt =  array(
            'logo-only' => __( 'Logo Only ( First Select Logo Above )', 'education-base' ),
            'title-only' => __( 'Site Title Only', 'education-base' ),
            'title-and-tagline' =>  __( 'Site Title and Tagline', 'education-base' ),
            'disable' => __( 'Disable', 'education-base' )
        );
        return apply_filters( 'education_base_header_id_display_opt', $education_base_header_id_display_opt );
    }
endif;

/**
 * Sidebar layout options
 *
 * @since Education Base 1.0.0
 *
 * @param null
 * @return array $education_base_sidebar_layout
 *
 */
if ( !function_exists('education_base_sidebar_layout') ) :
    function education_base_sidebar_layout() {
        $education_base_sidebar_layout =  array(
            'right-sidebar'=> __( 'Right Sidebar', 'education-base' ),
            'left-sidebar'=> __( 'Left Sidebar' , 'education-base' ),
            'no-sidebar'=> __( 'No Sidebar', 'education-base' )
        );
        return apply_filters( 'education_base_sidebar_layout', $education_base_sidebar_layout );
    }
endif;

/**
 * Blog layout options
 *
 * @since Education Base 1.0.0
 *
 * @param null
 * @return array $education_base_blog_layout
 *
 */
if ( !function_exists('education_base_blog_layout') ) :
    function education_base_blog_layout() {
        $education_base_blog_layout =  array(
            'left-image' => __( 'Show Image', 'education-base' ),
            'no-image' => __( 'No Image', 'education-base' )
        );
        return apply_filters( 'education_base_blog_layout', $education_base_blog_layout );
    }
endif;

/**
 *  Default Theme layout options
 *
 * @since Education Base 1.0.0
 *
 * @param null
 * @return array $education_base_theme_layout
 *
 */
if ( !function_exists('education_base_get_default_theme_options') ) :
    function education_base_get_default_theme_options() {

        $default_theme_options = array(
            /*header*/
            'education-base-enable-header-top'  => '',
            'education-base-header-height'  => 300,
            'education-base-top-header-design-options'  => 'left-curve',
            'education-base-phone-number'  => '',
            'education-base-top-email'  => '',
            'education-base-newsnotice-title'  => __( 'News', 'education-base' ),
            'education-base-newsnotice-cat'  => 0,
            'education-base-button-title'  => __( 'Apply Now', 'education-base' ),
            'education-base-button-link'  => '',
            'education-base-enable-top-social'  => '',
            'education-base-enable-sticky'  => 1,

            /*feature section options*/
            'education-base-all-slides'  => '',
            'education-base-feature-page'  => 0,
            'education-base-featured-slider-number'  => 2,
            'education-base-feature-column-1'  => 0,
            'education-base-feature-column-2'  => 0,
            'education-base-feature-column-3'  => 0,
            'education-base-feature-column-1-color'  => '#87cc00',
            'education-base-feature-column-2-color'  => '#fd5308',
            'education-base-feature-column-3-color'  => '#00adef',
            'education-base-enable-feature'  => '',
            'education-base-feature-slider-enable-animation'  => 1,
            'education-base-feature-slider-image-only'  => '',
            'education-base-fs-image-display-options'  => 'full-screen-bg',
            'education-base-slider-know-more-text'  => __( "Know More", "education-base" ),

            /*header options*/
            'education-base-header-id-display-opt' => 'title-and-tagline',
            'education-base-facebook-url'  => '',
            'education-base-twitter-url'  => '',
            'education-base-youtube-url'  => '',
            'education-base-google-plus-url'  => '',
            'education-base-enable-social'  => '',

            /*footer options*/
            'education-base-footer-copyright'  => __( '&copy; All right reserved 2016', 'education-base' ),

            /*layout/design options*/
            'education-base-sidebar-layout'  => 'right-sidebar',
            'education-base-front-page-sidebar-layout'  => 'right-sidebar',
            'education-base-archive-sidebar-layout'  => 'right-sidebar',

            'education-base-blog-archive-layout'  => 'left-image',
            'education-base-enable-animation'  => '',

            'education-base-primary-color'  => '#fd5308',
            'education-base-header-top-color'  => '#002858',
            'education-base-footer-color'  => '#003a6a',
            'education-base-footer-bottom-color'  => '#002858',

            'education-base-blog-archive-more-text'  => __( 'Read More', 'education-base' ),

            'education-base-hide-front-page-content'  => '',
            'education-base-hide-front-page-header'  => '',

            'education-base-disable-widget-title-icon'  => '',
            'education-base-widget-title-icon'  => 'fa-graduation-cap',

            /*theme options*/
            'education-base-search-placholder'  => __( 'Search', 'education-base' ),
            'education-base-store-title'  => __( 'Store', 'education-base' ),
            'education-base-show-breadcrumb'  => 0
        );
        return apply_filters( 'education_base_default_theme_options', $default_theme_options );
    }
endif;

/**
 *  Get theme options
 *
 * @since Education Base 1.0.0
 *
 * @param null
 * @return array education_base_theme_options
 *
 */
if ( !function_exists('education_base_get_theme_options') ) :
    function education_base_get_theme_options() {

        $education_base_default_theme_options = education_base_get_default_theme_options();
        $education_base_get_theme_options = get_theme_mod( 'education_base_theme_options');
        if( is_array( $education_base_get_theme_options )){
            return array_merge( $education_base_default_theme_options ,$education_base_get_theme_options );
        }
        else{
            return $education_base_default_theme_options;
        }
    }
endif;

function education_base_update_slider_logic() {
	if( !is_admin() ){
		return false;
	}
	$education_base_get_theme_options = education_base_get_theme_options();
	$education_base_enable_feature = $education_base_get_theme_options['education-base-enable-feature'];
	$education_base_feature_page = $education_base_get_theme_options['education-base-feature-page'];
	$education_base_featured_slider_number = $education_base_get_theme_options['education-base-featured-slider-number'];
	if( 1 == $education_base_enable_feature ){
		if( 0 != $education_base_feature_page ){
			$page_ids = array();
			$education_base_child_page_args = array(
				'post_parent'         => $education_base_feature_page,
				'posts_per_page'      => $education_base_featured_slider_number,
				'post_type'           => 'page',
				'no_found_rows'       => true,
				'post_status'         => 'publish'
			);
			$slider_query = new WP_Query( $education_base_child_page_args );
			if ( !$slider_query->have_posts() ){
				$education_base_child_page_args = array(
					'page_id'         => $education_base_feature_page,
					'posts_per_page'      => 1,
					'post_type'           => 'page',
					'no_found_rows'       => true,
					'post_status'         => 'publish'
				);
				$slider_query = new WP_Query( $education_base_child_page_args );
			}
			/*The Loop*/
			if ( $slider_query->have_posts() ):
				while( $slider_query->have_posts() ):$slider_query->the_post();
					$page_ids[]['selectpage'] = absint(get_the_ID());
				endwhile;
			endif;
			$education_base_get_theme_options['education-base-all-slides'] = json_encode( $page_ids );
			$education_base_get_theme_options['education-base-feature-page'] = 0;
			set_theme_mod( 'education_base_theme_options', $education_base_get_theme_options );
		}
	}
}
add_action( 'after_setup_theme', 'education_base_update_slider_logic' );