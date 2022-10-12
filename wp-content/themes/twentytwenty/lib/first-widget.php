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
            'image_content',
            [
                'lable' => __('Image', 'custom-widget'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'label_block' => true,
            ]
        );
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
        //add alignment control
        $this->add_control(
            'title_alignment',
            [
                'label' => __('Alignment', 'custom_widget'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'custom-widget'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'custom-widget'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'custom-widget'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selector' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        //end control
        $this->end_controls_section();


        //Content
        $this->start_controls_section(
            'content_section',
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
        $this->add_control(
            'description_alignment',
            [
                'label' => __('Alignment', 'custom_widget'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'custom-widget'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'custom-widget'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'custom-widget'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
            ]
        );
        //end control
        $this->end_controls_section();


        //Style Tab 
        $this->start_controls_section(
            'section_style',
            [
                'lable' => __('Style', 'custom_widget'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        //add style control
        $this->add_control(
            'style_content',
            [
                'label' => __('Image Style', 'custom-widget'),
            ]
        );
        //end style control
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $img = !empty($settings['image_content']['url']) ? $settings['image_content']['url'] : '';

        // Get image url
        echo '<img src="' . esc_url($img) . '" alt="">';
        echo '<h4 class="alignment">' . $settings['title_content'] . '</h4>';
        echo '<p>' . $settings['item_description'] . '</p>';

        // Get image by id
        //echo wp_get_attachment_image( $settings['image']['id'], 'thumbnail' );
    }

    // protected function content_template()
    // {
    
    // }
}
Plugin::instance()->widgets_manager->register_widget_type(new FirstWidgets);
