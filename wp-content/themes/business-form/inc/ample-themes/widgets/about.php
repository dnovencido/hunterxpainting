<?php
if (!class_exists('Business_Form_About_Widget')) {
    class Business_Form_About_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults = array(
                'title' => esc_html__('About Us', 'business-form'),
                'sub-title' => '',
                'resources' => '',
                'section-id' =>'',

            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'business_About_widget',
                esc_html__('AT : About Widget', 'business-form'),
                array('description' => esc_html__('Business About Section', 'business-form'))
            );
        }
        public function form( $instance )
        {
            $instance = wp_parse_args( (array ) $instance, $this->defaults() );
            $title = esc_attr( $instance['title'] );
            $subtitle =  esc_attr( $instance['sub-title'] );
            $section_id= esc_attr( $instance['section-id'] );
            $resources   = ( ! empty( $instance['resources'] ) ) ? $instance['resources'] : array();

            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('section-id') ); ?>">
                    <?php esc_html_e( 'Section Id', 'business-form'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('section-id')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('section-id')); ?>" value="<?php echo $section_id; ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                    <?php esc_html_e('Title', 'business-form'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title') ); ?>" value="<?php echo $title; ?>">
            </p>
            <p>
            <label for="<?php echo esc_attr( $this->get_field_id('sub-title') ); ?>">
                <?php esc_html_e( 'Sub Title', 'business-form'); ?>
            </label><br/>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('sub-title')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('sub-title')); ?>" value="<?php echo $subtitle; ?>">
        </p>

           

            <span class="at-ample-additional">
            <!--repeater-->
            <label><?php _e( 'Select Pages', 'business-form' ); ?>:</label>
            <br/>
            <small><?php _e( 'Add Page and Remove. Please do not forget to add Icon on selected pages.', 'business-form' ); ?></small>

                <?php
                if  ( count( $resources ) >=  1 && is_array( $resources ) )
                {

                    $selected = $resources['main'];

                }

                else
                {
                    $selected = "";
                }

                $repeater_id   = $this->get_field_id( 'resources' ).'-main';
                $repeater_name = $this->get_field_name( 'resources'). '[main]';

                $args = array(
                    'selected'          => $selected,
                    'name'              => $repeater_name,
                    'id'                => $repeater_id,
                    'class'             => 'widefat pt-select',
                    'show_option_none'  => __( 'Select Page', 'business-form'),
                    'option_none_value' => 0 // string
                );
                wp_dropdown_pages( $args );
                ?>

                <?php

                $counter = 0;

                if ( count( $resources ) > 0 )
                {
                    foreach( $resources as $resource )
                    {

                        if ( isset( $resource['page_ids'] ) )

                        { ?>
                            <div class="at-ample-sec">

                                <?php

                                $repeater_id     = $this->get_field_id( 'resources' ) .'-'. $counter.'-page_ids';
                                $repeater_name   = $this->get_field_name( 'resources' ) . '['.$counter.'][page_ids]';

                                $args = array(
                                    'selected'          => $resource['page_ids'],
                                    'name'              => $repeater_name,
                                    'id'                => $repeater_id,
                                    'class'             => 'widefat pt-select',
                                    'show_option_none'  => __( 'Select Page', 'business-form'),
                                    'option_none_value' => 0 // string
                                );
                                wp_dropdown_pages( $args );
                                ?>
                                <a class="at-ample-remove delete"><?php esc_html_e('Remove Section','business-form') ?></a>


                            </div>
                            <?php
                            $counter++;
                        }
                    }
                }

                ?>

            </span>
            <a class="at-ample-add button" data-id="business-form_resource_widget" id="<?php echo esc_attr($repeater_id); ?>"><?php _e('Add New Section', 'business-form'); ?></a>

            <hr/>



            <?php
        }
        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['sub-title'] = sanitize_text_field($new_instance['sub-title']);
            $instance['section-id'] = sanitize_text_field($new_instance['section-id']);



            if (isset($new_instance['resources']))
            {
                foreach($new_instance['resources'] as $resource){

                    $resource['page_ids'] = absint($resource['page_ids']);
                }
                $instance['resources'] = $new_instance['resources'];
            }
            return $instance;

        }
        public function widget($args, $instance)
        {

            if (!empty($instance)) {
                $instance = wp_parse_args((array )$instance, $this->defaults());
                $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html($instance['title']) : '', $instance, $this->id_base);
                $subtitle = esc_html($instance['sub-title']);
                $section_id = esc_attr($instance['section-id']);
                $resources = (!empty($instance['resources'])) ? $instance['resources'] : array();

                echo $args['before_widget'];
                ?>




                <section id="<?php echo esc_attr($section_id); ?>">
                    <div id="about">
                    <div class="container" >

                        <header class="section-header">
                            <h3><?php echo esc_html($title); ?></h3>
                            <p><?php echo esc_html($subtitle); ?></p>
                        </header>

                        <div class="row about-cols">
                <?php
                if (isset($resources) && !empty($resources['main'])) {

                    $idvalue = array();
                    $post_in = array();

                    if (count($resources) > 0 && is_array($resources)) {

                        $post_in[0] = $resources['main'];

                        foreach ($resources as $our_resource) {

                            if (isset($our_resource['page_ids']) && !empty($our_resource['page_ids'])) {

                                $post_in[] = $our_resource['page_ids'];

                            }
                        }


                    }

                    if (!empty($post_in)) :
                        $resources_page_args = array(
                            'post__in' => $post_in,
                            'orderby' => 'post__in',
                            'posts_per_page' => count($post_in),
                            'post_type' => 'page',
                            'no_found_rows' => true,
                            'post_status' => 'publish'
                        );

                        $resources_query = new WP_Query($resources_page_args);

                        /*The Loop*/
                        if ($resources_query->have_posts()):
                            $i = 1;
                            while ($resources_query->have_posts()):$resources_query->the_post();
                                $icon = get_post_meta(get_the_ID(), 'business_form_icon', true);
                                $idvalue[] = get_the_ID();
                                ?>



                                <div class="col-md-12 wow fadeInUp">
                                <div class="about-col">
                                    <div class="img">
                                        <div class="img-about">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                $image_id = get_post_thumbnail_id();
                                                $image_url = wp_get_attachment_image_src($image_id, 'large', true);
                                                ?>
                                                <img src="<?php echo esc_url($image_url[0]); ?>"
                                                    class="img-fluid">
                                            <?php } ?>

                                            <?php if(!empty($icon)){ ?>

                                            <div class="icon">
                                                <i class=" <?php echo esc_attr($icon); ?>"></i>


                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <h2 class="title"><?php the_title();?></h2>
                                    <p>
                                        <?php echo get_the_content(); ?>
                                    </p>
                                </div>
                            </div>

                                <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                    endif;
                }
                ?>

                        </div>
                    </div>

                    </div>
                </section><!-- #about -->





                <?php
                echo $args['after_widget'];
            }
        }

    }
}

add_action('widgets_init', 'business_form_about_widget');
function business_form_about_widget()
{
    register_widget('Business_Form_About_Widget');

}

