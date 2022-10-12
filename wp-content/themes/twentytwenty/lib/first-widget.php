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
        //end style control
        $this->end_controls_section();

    }

    protected function render()
    {

    }

    // protected function content_template() {

    // }
}
Plugin::instance()->widgets_manager->register_widget_type(new FirstWidgets);
