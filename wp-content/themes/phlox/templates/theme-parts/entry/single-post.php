<?php global $post;

    $post_vars = auxin_get_post_format_media(
        $post,
        array(
            'request_from' => 'single'
        )
    );

    extract( $post_vars );

    // Get the alignment of the title in page content
    if( 'default' === $title_alignment = auxin_get_post_meta( $post, 'page_content_title_alignment', 'default' ) ){
        $title_alignment = auxin_get_option( 'post_single_title_alignment' );
    }
    $title_alignment = 'default' === $title_alignment ? '' : 'aux-text-align-' .$title_alignment;


    if( 'default' === $post_content_style = auxin_get_post_meta( $post, 'post_content_style', 'default' ) ){
        $post_content_style = auxin_get_option( 'post_single_content_style' );
    }
    $post_extra_classes = 'narrow' == $post_content_style ? 'aux-narrow-context' : '';

?>
                                    <article <?php post_class( $post_extra_classes ); ?> >

                                            <?php if ( $has_attach ) : ?>
                                            <div class="entry-media">
                                                <?php echo $the_media; ?>
                                            </div>
                                            <?php endif; ?>
                                            <div class="entry-main">

                                                <header class="entry-header <?php echo esc_attr( $title_alignment ); ?>">
                                                <?php
                                                    if( 'quote' == $post_format ) {
                                                        echo '<p class="quote-format-excerpt">'. $excerpt .'</p>';
                                                    }
                                                ?>

                                                    <h2 class="entry-title <?php echo ( $show_title ? '' : ' aux-visually-hide' ); ?>">
                                                        <?php
                                                        $post_title = !empty( $the_name ) ? esc_html( $the_name ) : get_the_title();

                                                        if( ! empty( $the_link ) ){
                                                            echo '<cite><a href="'.esc_url( $the_link ).'" title="'.esc_attr( $post_title ).'">'.$post_title.'</a></cite>';
                                                        } else {
                                                            echo $post_title;
                                                        }

                                                        if( "link" == $post_format ){ echo '<br/><cite><a href="'.esc_url( $the_link ).'" title="'.esc_attr( $post_title ).'">'.$the_link.'</a></cite>'; }
                                                        ?>
                                                    </h2>
                                                    <div class="entry-format">
                                                        <div class="post-format"> </div>
                                                    </div>
                                                </header>

                                                <?php
                                                if( auxin_get_option( 'show_post_single_meta_info', true ) || is_customize_preview() ){
                                                ?>
                                                <div class="entry-info">
                                                    <?php
                                                    if ( auxin_get_option( 'aux_post_meta_date_show', true ) ) {
                                                    ?>
                                                    <div class="entry-date"><time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>" ><?php echo get_the_date(); ?></time></div>
                                                    <?php }
                                                    if ( auxin_get_option( 'aux_post_meta_author_show', true ) ) {
                                                    ?>
                                                    <div class="entry-author">
                                                        <span class="meta-sep"><?php esc_html_e("by", 'phlox'); ?></span>
                                                        <span class="author vcard">
                                                            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" title="<?php echo esc_attr( sprintf( __( 'View all posts by %s', 'phlox'), get_the_author() ) ); ?>" >
                                                                <?php the_author(); ?>
                                                            </a>
                                                        </span>
                                                    </div>
                                                    <?php }
                                                    if ( auxin_get_option( 'aux_post_meta_comments_show', true ) ) {
                                                    ?>
                                                    <div class="entry-comments">
                                                        <span class="meta-sep"><?php esc_html_e("with", 'phlox'); ?></span>
                                                        <span class="meta-comment"><?php comments_number( __('no comment', 'phlox'), __('one comment', 'phlox'), __('% comments', 'phlox') );?></span>
                                                    </div>
                                                    <?php }
                                                    if ( auxin_get_option( 'aux_post_meta_categories_show', true ) ) {
                                                    ?>
                                                    <div class="entry-tax">
                                                        <?php // the_category(' '); we can use this template tag, but customizable way is needed! ?>
                                                        <?php $tax_name = 'category';
                                                              if( $cat_terms = wp_get_post_terms( $post->ID, $tax_name ) ){
                                                                  foreach( $cat_terms as $term ){
                                                                      echo '<a href="'. get_term_link( $term->slug, $tax_name ) .'" title="'.esc_attr__("View all posts in ", 'phlox'). esc_attr( $term->name ) .'" rel="category" >'. esc_html( $term->name ) .'</a>';
                                                                  }
                                                              }
                                                        ?>
                                                    </div>
                                                    <?php }
                                                        edit_post_link(__("Edit", 'phlox'), '<div class="entry-edit">', '</div>', null, 'aux-post-edit-link');

                                                        if( auxin_get_option( 'show_blog_post_like_button', 1 ) || is_customize_preview() ){
                                                            if( function_exists('wp_ulike') ){
                                                                wp_ulike( 'get', array( 'style' => 'wpulike-heart' ) );
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                                <?php
                                                }
                                                ?>

                                                <div class="entry-content">
                                                    <?php if( 'quote' == $post_format ) {
                                                        echo $the_attach;
                                                    } else {
                                                        the_content( __( 'Continue reading', 'phlox') );
                                                        // clear the floated elements at the end of content
                                                        echo '<div class="clear"></div>';
                                                        // create pagination for page content
                                                        wp_link_pages( array( 'before' => '<div class="page-links"><span>' . esc_html__( 'Pages:', 'phlox') .'</span>', 'after' => '</div>' ) );
                                                    } ?>
                                                </div>

                                                <?php
                                                $show_share_links = auxin_get_option( 'show_post_single_tags_section', true );
                                                $the_tags         = get_the_tag_list('<span>'. esc_html__("Tags: ", 'phlox'). '</span>', '<i>, </i>', '');

                                                if( $show_share_links || $the_tags || is_customize_preview() ){
                                                ?>
                                                <footer class="entry-meta">
                                                <?php if( $show_share_links && defined( 'AUXELS' ) ){ ?>
                                                        <div class="aux-post-share">
                                                            <div class="aux-tooltip-socials aux-tooltip-dark aux-socials aux-icon-left aux-medium">
                                                                <span class="aux-icon auxicon-share"></span>
                                                                <span class="aux-text"><?php esc_html_e( 'Share', 'phlox' ); ?></span>
                                                            </div>
                                                        </div>
                                                <?php } if( $the_tags ){ ?>
                                                        <div class="entry-tax">
                                                            <?php echo $the_tags; ?>
                                                        </div>
                                                <?php } else { ?>
                                                        <div class="entry-tax"><span><?php esc_html_e("Tags: No tags", 'phlox' ); ?></span></div>
                                                    <?php }?>
                                                </footer>
                                                <?php } ?>
                                            </div>


                                            <?php // get related posts
                                            if( auxin_is_true( auxin_get_option('show_post_single_next_prev_nav') ) ){

                                                auxin_single_page_navigation( array(
                                                    'prev_text'      => esc_html__( 'Previous Post', 'phlox' ),
                                                    'next_text'      => esc_html__( 'Next Post'    , 'phlox' ),
                                                    'taxonomy'       => 'category',
                                                    'skin'           => esc_attr( auxin_get_option( 'post_single_next_prev_nav_skin' ) ) // minimal, thumb-no-arrow, thumb-arrow, boxed-image
                                                ));

                                            }

                                            if( function_exists( 'rp4wp_children' ) ){
                                                echo '<div class="aux-related-posts-container">' . rp4wp_children( false, false ) . '</div>';
                                            }
                                            ?>


                                            <?php if( auxin_get_option( 'show_blog_author_section', 1 ) ) { ?>
                                            <div class="entry-author-info">
                                                    <div class="author-avatar">
                                                        <?php echo get_avatar( get_the_author_meta("user_email"), 100 ); ?>
                                                    </div><!-- #author-avatar -->
                                                    <div class="author-description">
                                                        <dl>
                                                            <dt>
                                                                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" title="<?php echo esc_attr( sprintf( __( 'View all posts by %s', 'phlox'), get_the_author() ) ); ?>" >
                                                                    <?php the_author(); ?>
                                                                </a>
                                                            </dt>
                                                            <dd>
                                                            <?php if( get_the_author_meta('skills') ) { ?>
                                                                <span><?php the_author_meta('skills');?></span>
                                                            <?php }
                                                            if( auxin_get_option( 'show_blog_author_section_text' ) && ( get_the_author_meta('user_description') ) ) {
                                                                ?>
                                                                <p><?php the_author_meta('user_description');?>.</p>
                                                                <?php } ?>
                                                            </dd>
                                                        </dl>
                                                        <?php if( auxin_get_option( 'show_blog_author_section_social' ) ) {
                                                            auxin_the_socials( array(
                                                                'css_class' => ' aux-author-socials',
                                                                'size'      => 'medium',
                                                                'direction' => 'horizontal',
                                                                'social_list'   => array(
                                                                    'facebook'   => get_the_author_meta('facebook'),
                                                                    'twitter'    => get_the_author_meta('twitter'),
                                                                    'googleplus' => get_the_author_meta('googleplus'),
                                                                    'flickr'     => get_the_author_meta('flickr'),
                                                                    'dribbble'   => get_the_author_meta('dribbble'),
                                                                    'delicious'  => get_the_author_meta('delicious'),
                                                                    'pinterest'  => get_the_author_meta('pinterest'),
                                                                    'github'     => get_the_author_meta('github')
                                                                ),
                                                                'social_list_type'   => 'site',
                                                                'fill_social_values' => false
                                                            ));
                                                        }
                                                        ?>
                                                    </div><!-- #author-description -->

                                            </div> <!-- #entry-author-info -->
                                            <?php } ?>

                                       </article>