<?php
/**
 * Custom widgets.
 *
 * @package Astound
 */

if ( ! function_exists( 'Astound_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function Astound_load_widgets() {
        
        // Author widget.
        register_widget( 'Astound_Author_Widget' );

        // Social.
        register_widget( 'Astound_Social_Widget' );

    }

endif;

add_action( 'widgets_init', 'Astound_load_widgets' );

if ( ! class_exists( 'Astound_Author_Widget' ) ) :

    /**
     * Author widget class.
     *
     * @since 1.0.0
     */
    class Astound_Author_Widget extends WP_Widget {

        function __construct() {
            $opts = array(
                    'classname'   => 'Astound_widget_author',
                    'description' => esc_html__( 'Display Author Profile.', 'Astound' ),
            );
            parent::__construct( 'Astound-author', esc_html__( 'Astound: Author Profile', 'Astound' ), $opts );
        }

        function widget( $args, $instance ) {

            $title              = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

            $author_page        = !empty( $instance['author_page'] ) ? $instance['author_page'] : ''; 

            $author_facebook    = !empty( $instance['author_facebook'] ) ? $instance['author_facebook'] : '';

            $author_twitter     = !empty( $instance['author_twitter'] ) ? $instance['author_twitter'] : ''; 

            $author_linkedin    = !empty( $instance['author_linkedin'] ) ? $instance['author_linkedin'] : '';

            $author_instagram   = !empty( $instance['author_instagram'] ) ? $instance['author_instagram'] : '';

            $author_pinterest   = !empty( $instance['author_pinterest'] ) ? $instance['author_pinterest'] : '';

            $author_youtube     = !empty( $instance['author_youtube'] ) ? $instance['author_youtube'] : '';

            echo $args['before_widget']; ?>

            <div class="author-profile">

                    <?php 

                    if ( $title ) {
                        echo $args['before_title'] . $title . $args['after_title'];
                    } ?>
                    
                    <div class="profile-wrapper social-menu-wrap">

                        <?php if ( $author_page ) { 

                            $author_args = array(
                                            'posts_per_page' => 1,
                                            'page_id'        => absint( $author_page ),
                                            'post_type'      => 'page',
                                            'post_status'    => 'publish',
                                        );

                            $author_query = new WP_Query( $author_args ); 

                            if( $author_query->have_posts()){

                                while( $author_query->have_posts()){

                                    $author_query->the_post(); ?>

                                    <?php 
                                    if ( has_post_thumbnail() ) { ?>
                                        <div class="profile-img">
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        </div>
                                        <?php
                                    } ?>

                                    <div class="profile-info">
                                        <h2><?php the_title(); ?></h2>
                                        <?php the_content(); ?>
                                    </div>

                                    <?php

                                }

                                wp_reset_postdata();

                            } ?>
                            
                        <?php } ?>

                        <?php if( $author_facebook || $author_twitter || $author_linkedin || $author_instagram || $author_pinterest || $author_youtube ){ ?>
                                <ul id="social-profiles" class="menu">
                                    <?php if( $author_facebook ){ ?>
                                        <li>
                                            <a href="<?php echo esc_url( $author_facebook ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e( 'facebook', 'Astound' ); ?></span></a>
                                        </li>
                                    <?php } ?>

                                    <?php if( $author_twitter ){ ?>
                                        <li>
                                            <a href="<?php echo esc_url( $author_twitter ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e( 'twitter', 'Astound' ); ?></span></a>
                                        </li>
                                    <?php } ?>

                                    <?php if( $author_linkedin ){ ?>
                                        <li>
                                            <a href="<?php echo esc_url( $author_linkedin ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e( 'linkedin', 'Astound' ); ?></span></a>
                                        </li>
                                    <?php } ?>

                                    <?php if( $author_instagram ){ ?>
                                        <li>
                                            <a href="<?php echo esc_url( $author_instagram ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e( 'instagram', 'Astound' ); ?></span></a>
                                        </li>
                                    <?php } ?>

                                    <?php if( $author_pinterest ){ ?>
                                        <li>
                                            <a href="<?php echo esc_url( $author_pinterest ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e( 'pinterest', 'Astound' ); ?></span></a>
                                        </li>
                                    <?php } ?>

                                    <?php if( $author_youtube ){ ?>
                                        <li>
                                            <a href="<?php echo esc_url( $author_youtube ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e( 'youtube', 'Astound' ); ?></span></a>
                                        </li>
                                    <?php } ?>
                                    
                                </ul>

                        <?php } ?>

                    </div><!-- .profile-wrapper -->

            </div><!-- .author-profile -->

            <?php 

            echo $args['after_widget'];

        }

        function update( $new_instance, $old_instance ) {

            $instance = $old_instance;

            $instance['title']              = sanitize_text_field( $new_instance['title'] );

            $instance['author_page']        = absint( $new_instance['author_page'] );

            $instance['author_facebook']    = esc_url_raw( $new_instance['author_facebook'] );

            $instance['author_twitter']     = esc_url_raw( $new_instance['author_twitter'] );

            $instance['author_linkedin']    = esc_url_raw( $new_instance['author_linkedin'] );

            $instance['author_instagram']   = esc_url_raw( $new_instance['author_instagram'] );

            $instance['author_pinterest']   = esc_url_raw( $new_instance['author_pinterest'] );

            $instance['author_youtube']     = esc_url_raw( $new_instance['author_youtube'] );

            return $instance;
        }

        function form( $instance ) {

            // Defaults.
            $defaults = array(
                'title'             => '',
                'author_page'       => '',
                'author_facebook'   => '',
                'author_twitter'    => '',
                'author_linkedin'   => '',
                'author_instagram'  => '',
                'author_pinterest'  => '',
                'author_youtube'    => '',
            );

            $instance = wp_parse_args( (array) $instance, $defaults );
            ?>
            
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'Astound' ); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'author_page' ); ?>">
                    <strong><?php esc_html_e( 'Author Page:', 'Astound' ); ?></strong>
                </label>
                <?php
                wp_dropdown_pages( array(
                    'id'               => $this->get_field_id( 'author_page' ),
                    'class'            => 'widefat',
                    'name'             => $this->get_field_name( 'author_page' ),
                    'selected'         => $instance[ 'author_page' ],
                    'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'Astound' ),
                    )
                );
                ?>
                <small>
                    <?php esc_html_e('Title, Content and Featured Image of this page will be used for Author title, Bio and Profile picture.', 'Astound'); ?>  
                </small>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('author_facebook') ); ?>">
                    <?php esc_html_e('Facebook:', 'Astound'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_facebook') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_facebook') ); ?>" type="text" value="<?php echo esc_url( $instance['author_facebook'] ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('author_twitter') ); ?>">
                    <?php esc_html_e('Twitter:', 'Astound'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_twitter') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_twitter') ); ?>" type="text" value="<?php echo esc_url( $instance['author_twitter'] ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('author_linkedin') ); ?>">
                    <?php esc_html_e('LinkedIn:', 'Astound'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_linkedin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_linkedin') ); ?>" type="text" value="<?php echo esc_url( $instance['author_linkedin'] ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('author_instagram') ); ?>">
                    <?php esc_html_e('Instagram:', 'Astound'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_instagram') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_instagram') ); ?>" type="text" value="<?php echo esc_url( $instance['author_instagram'] ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('author_pinterest') ); ?>">
                    <?php esc_html_e('Pinterest:', 'Astound'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_pinterest') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_pinterest') ); ?>" type="text" value="<?php echo esc_url( $instance['author_pinterest'] ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('author_youtube') ); ?>">
                    <?php esc_html_e('Youtube:', 'Astound'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_youtube') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_youtube') ); ?>" type="text" value="<?php echo esc_url( $instance['author_youtube'] ); ?>" />   
            </p>

        <?php
                
        }
    }

endif;

if ( ! class_exists( 'Astound_Social_Widget' ) ) :

    /**
     * Social widget class.
     *
     * @since 1.0.0
     */
    class Astound_Social_Widget extends WP_Widget {

        /**
         * Constructor.
         *
         * @since 1.0.0
         */
        function __construct() {
            $opts = array(
                'classname'   => 'Astound_widget_social',
                'description' => esc_html__( 'Social Link Widget', 'Astound' ),
            );
            parent::__construct( 'Astound-social', esc_html__( 'Astound: Social', 'Astound' ), $opts );
        }

        /**
         * Echo the widget content.
         *
         * @since 1.0.0
         *
         * @param array $args     Display arguments including before_title, after_title,
         *                        before_widget, and after_widget.
         * @param array $instance The settings for the particular instance of the widget.
         */
        function widget( $args, $instance ) {

            $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

            echo $args['before_widget'];

            if ( ! empty( $title ) ) {
                echo $args['before_title'] . $title . $args['after_title'];
            }

            if ( has_nav_menu( 'social' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'social',
                    'depth'          => 1,
                    'container'      => 'div',
                    'container_class'=> 'social-menu-wrap',
                    'link_before'    => '<span class="screen-reader-text">',
                    'link_after'     => '</span>',
                ) );
            }

            echo $args['after_widget'];

        }

        /**
         * Update widget instance.
         *
         * @since 1.0.0
         *
         * @param array $new_instance New settings for this instance as input by the user via
         *                            {@see WP_Widget::form()}.
         * @param array $old_instance Old settings for this instance.
         * @return array Settings to save or bool false to cancel saving.
         */
        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;

            $instance['title'] = sanitize_text_field( $new_instance['title'] );

            return $instance;
        }

        /**
         * Output the settings update form.
         *
         * @since 1.0.0
         *
         * @param array $instance Current settings.
         * @return void
         */
        function form( $instance ) {

            $instance = wp_parse_args( (array) $instance, array(
                'title' => '',
            ) );
            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'Astound' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
            </p>

            <?php if ( ! has_nav_menu( 'social' ) ) : ?>
            <p>
                <?php esc_html_e( 'Social menu is not set. Please create menu and assign it to Social Theme Location.', 'Astound' ); ?>
            </p>
            <?php endif; ?>
            <?php
        }
    }

endif;