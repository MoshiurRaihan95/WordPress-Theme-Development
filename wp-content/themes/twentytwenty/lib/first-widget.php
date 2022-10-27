<?php

namespace Elementor;

class FirstWidgets extends Widget_Base
{

    //Get widget Name
    public function get_name()
    {
        return "test";
    }

    public function get_title()
    {
        return "Test Widget";
    }

    public function get_icon()
    {
        return "fab fa-facebook-f";
    }

    public function get_custom_help_url()
    {
    }

    public function get_categories()
    {
        return ['general'];
    }

    // public function get_keywords() {

    // }

    // public function get_script_depends() {

    // }

    // public function get_style_depends() {

    // }


    /** Register widget controls */
    protected function register_controls()
    {

        //Image
        $this->start_controls_section(
            'image_section',
            [
                'label' => __('Image', 'custom-widget'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        //Image Content

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                'exclude' => ['custom'],
                'include' => [],
                'default' => 'large',
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment', 'elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );




        // $this->add_control(
        //     'image_content_up',
        //     [
        //         'lable' => __('Image', 'custom-widget'),
        //         'type' => Controls_Manager::MEDIA,
        //         'dynamic' => [
        //             'active' => true,
        //         ],
        //         'label_block' => true,
        //     ]
        // );
        // //Image Resize Control
        // $this->add_group_control(
        //     Group_Control_Image_Size::get_type(),
        //     [
        //         'name' => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
        //         'exclude' => ['custom'],
        //         'include' => [],
        //         'default' => 'large',
        //     ]
        // );
        // $this->add_responsive_control(
        //     'image_alignment',
        //     [
        //         'label' => __('Alignment', 'hip'),
        //         'type' => Controls_Manager::CHOOSE,
        //         'options' => [
        //             'left' => [
        //                 'title' => __('Left', 'hip'),
        //                 'icon' => 'eicon-text-align-left',
        //             ],
        //             'center' => [
        //                 'title' => __('Center', 'hip'),
        //                 'icon' => 'eicon-text-align-center',
        //             ],
        //             'right' => [
        //                 'title' => __('Right', 'hip'),
        //                 'icon' => 'eicon-text-align-right',
        //             ],
        //         ],
        //         'default' => 'center',
        //         'selectors' => [
        //             '{{WRAPPER}} img' => 'text-align: {{VALUE}}',
        //         ],
        //     ]
        // );

        //end controls
        $this->end_controls_section();





























        //Title
        $this->start_controls_section(
            'title_section',
            [
                'label' => __('Title', 'custom-widget'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        //Title Content
        $this->add_control(
            'title_content',
            [
                'label' => __('Title', 'custom-widget'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('Titel is here', 'custom-widget'),
                'dynamic' => [
                    'active' => true,
                ],
                'label_block' => true,
            ]
        );



        $this->add_responsive_control(
            'back_text_alignment',
            [
                'label' => __('Alignment', 'hip'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'hip'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'hip'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'hip'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} h4' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        //end control
        $this->end_controls_section();


        //Content
        $this->start_controls_section(
            'content_section_description',
            [
                'label' => __('Content', 'custom-widget'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //Description
        $this->add_control(
            'item_description',
            [
                'label' => __('Description', 'custom-widget'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 10,
                'placeholder' => __('Type your description here', 'custom-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        //add alignment control
        $this->add_responsive_control(
            'description_align',
            [
                'label' => __('Alignment', 'hip'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'hip'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'hip'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'hip'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} p' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        //end control
        $this->end_controls_section();


        //Style Control Tab 
        $this->start_controls_section(
            'section_style',
            [
                'lable' => __('Style', 'custom_widget'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //add style control
        $this->add_control(
            'title_options',
            [
                'label' => __('Title Style', 'custom-widget'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        //Color Control
        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'custom-widget'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        //Typrography Control
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} h4',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} img',
            ]
        );
        //Image border radius contorl
        $this->add_responsive_control(
            'img_border_radius',
            [
                'label' => __('Border Radius', 'custom-widget'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        //end style control;
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        // $img = !empty($settings['image_content']['url']) ? $settings['image_content']['url'] : '';

?>
        <div class="my-img">
            <style>
                .my-img img {
                    display: inline-block;
                }
            </style>
            <?php

            echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image');

            ?>
        </div>
<?php



        //echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', '$img' );

        // Get image url
        //echo '<img src="' . esc_url($img) . '" alt="">';
        echo '<h4 class="section_ttile">' . $settings['title_content'] . '</h4>';
        echo '<p  class="section_description">' . $settings['item_description'] . '</p>';

        // Get image by id
        //echo wp_get_attachment_image( $settings['image']['id'], 'thumbnail' );
    }

    // protected function content_template()
    // {

    // }
}
Plugin::instance()->widgets_manager->register_widget_type(new FirstWidgets);
