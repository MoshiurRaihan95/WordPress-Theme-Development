<?php

namespace Elementor;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class Hip_Team_Elementor_Widget extends Widget_Base
{
	/**
	 * construct
	 */
	public function __construct($data = [], $args = null)
	{
		parent::__construct($data, $args);
		//add_action('elementor/frontend/after_register_styles', [$this,'hip_team_style']);
		wp_register_style('hip-team-widget-css', plugins_url('/assets/css/style.css', __FILE__));
	}

	public function get_style_depends()
	{
		return ['hip-team-widget-css'];
	}
	public function get_script_depends()
	{
		return ['hip-team-video'];
	}


	/**
	 * Get widget name
	 * @return string
	 */
	public function get_name()
	{

		return 'hip-team-id';
	}

	/**
	 * Get widget title
	 * @return string
	 */
	public function get_title()
	{
		return esc_html('Hip Team ', 'hip');
	}

	/**
	 * Get widget icon
	 * @return string|void
	 */
	public function get_icon()
	{
		return 'eicon-post-list';
	}

	/**
	 * Get widget category
	 * @return array
	 */

	public function get_categories()
	{
		return ['hip-team-category'];
	}

	/**
	 * Register widget controls
	 */
	protected function _register_controls()
	{
		//controls
		$this->start_controls_section(
				'layout-section',
				[
						'label' => __('Layout', 'hip'),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT
				]
		);
		//gird control
		$this->add_control(
				'grid_style',
				[
						'label' => __('Team Style', 'hip'),
						'type' => Controls_Manager::SELECT,
						'default' => '1',
						'options' => [
								'1' => esc_html__('Basic', 'hip'),
								'2' => esc_html__('With Bio', 'hip'),
								'3' => esc_html__('With Hover Photo & Bio', 'hip'),
								'4' => esc_html__('With video modal', 'hip'),

						],
				]
		);

		//show column
		$this->add_responsive_control(
				'columns',
				[
						'label' => __('Columns', 'hip'),
						'type' => Controls_Manager::SELECT,
						'default' => '3',
						'tablet_default' => '2',
						'mobile_default' => '1',
						'options' => [
								'1' => '1',
								'2' => '2',
								'3' => '3',
								'4' => '4',
						],
						'prefix_class' => 'elementor-grid%s-',
						'frontend_available' => true,
						'selectors' => [
								'.elementor-msie {{WRAPPER}} .elementor-portfolio-item' => 'width: calc( 100% / {{SIZE}} )',
						],
				]
		);
		//posts per page
		$this->add_control(
				'post_per_page',
				[
						'label' => __('Post Per page', 'hip'),
						'type' => Controls_Manager::TEXT,

				]
		);
		$this->add_responsive_control(
				'team_box_height',
				[
						'label' => __('Height', 'hip'),
						'type' => Controls_Manager::SLIDER,
						'range' => [
								'px' => [
										'min' => 100,
										'max' => 1000,
								],
								'vh' => [
										'min' => 10,
										'max' => 100,
								],
						],
						'size_units' => ['px', 'vh', '%'],
						'selectors' => [
								'{{WRAPPER}} .hip-team-member-box' => 'height: {{SIZE}}{{UNIT}};',
						],
				]
		);
		$this->add_control(
				'team_box_border_radius',
				[
						'label' => __('Border Radius', 'hip'),
						'type' => Controls_Manager::SLIDER,
						'size_units' => ['px', '%'],
						'range' => [
								'px' => [
										'min' => 0,
										'max' => 200,
								],
						],
						'separator' => 'after',
						'selectors' => [
								'{{WRAPPER}} .hip-team-member-box, {{WRAPPER}} .hip-team-box__layer' => 'border-radius: {{SIZE}}{{UNIT}}',
						],
				]
		);


		$this->end_controls_section();
		$this->hip_team_front_controls();
		$this->hip_team_back_controls();
		$this->hip_team_scrollbar_controls();
		$this->style_layout_option();
		$this->front_style_option();
		$this->back_style_option();
	}

	private function hip_team_scrollbar_controls()
	{
		//controls
		$this->start_controls_section(
				'scrollbar-control-section',
				[
						'label' => __('Scrollbar Settings', 'hip'),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT
				]
		);
		$this->add_responsive_control(
				'scrollbar_margin',
				[
						'label' => __('Margin', 'hip'),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => ['px', 'em', '%'],
						'selectors' => [
								'{{WRAPPER}} .hip-team-container .hip-team-box__layer.hip-team-box__back .hip-team-bio_box__layer::-webkit-scrollbar-track' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
				]
		);
		$this->add_responsive_control(
				'scrollbar_width',
				[
						'label' => __('Width', 'hip'),
						'type' => Controls_Manager::SLIDER,
						'size_units' => ['px', 'vw', '%'],

						'selectors' => [
								'{{WRAPPER}} .hip-team-container .hip-team-box__layer.hip-team-box__back .hip-team-bio_box__layer::-webkit-scrollbar' => 'width: {{SIZE}}{{UNIT}};',
						],
				]
		);
		$this->add_responsive_control(
				'scrollbar_border_radius',
				[
						'label' => __('Border Radius', 'hip'),
						'type' => Controls_Manager::SLIDER,
						'size_units' => ['px', '%'],
						'range' => [
								'px' => [
										'min' => 0,
										'max' => 200,
								],
						],
						'separator' => 'after',
						'selectors' => [
								'{{WRAPPER}} .hip-team-container .hip-team-box__layer.hip-team-box__back .hip-team-bio_box__layer::-webkit-scrollbar-track,.hip-team-container .hip-team-box__layer.hip-team-box__back .hip-team-bio_box__layer::-webkit-scrollbar-thumb' => 'border-radius: {{SIZE}}{{UNIT}}',
						],
				]
		);
		$this->add_control(
				'scrollbar_bg',
				[
						'label' => __('Scrollbar Background', 'hip'),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
								'type' => \Elementor\Scheme_Color::get_type(),
								'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'selectors' => [
								'{{WRAPPER}} .hip-team-container .hip-team-box__layer.hip-team-box__back .hip-team-bio_box__layer::-webkit-scrollbar-track ' => 'background-color: {{VALUE}}',
						],
				]
		);
		$this->add_control(
				'scrollbar__track_bg',
				[
						'label' => __('Scrollbar Thumb Bg', 'hip'),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
								'type' => \Elementor\Scheme_Color::get_type(),
								'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'selectors' => [
								'{{WRAPPER}} .hip-team-container .hip-team-box__layer.hip-team-box__back .hip-team-bio_box__layer::-webkit-scrollbar-thumb' => 'background-color: {{VALUE}}',
						],
				]
		);


		$this->end_controls_section();
	}

	private function hip_team_front_controls()
	{
		//controls
		$this->start_controls_section(
				'front-control-section',
				[
						'label' => __('Front', 'hip'),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT
				]
		);

		// team name
		$this->add_control(
				'front_show_team_name',
				[
						'label' => __('Show Name', 'hip'),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __('Show', 'hip'),
						'label_off' => __('Hide', 'hip'),
						'default' => 'yes',
						'separator' => 'before',
				]
		);
		// team Designation
		$this->add_control(
				'front_show_designation',
				[
						'label' => __('Show Designation', 'hip'),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __('Show', 'hip'),
						'label_off' => __('Hide', 'hip'),
						'default' => 'yes',
						'separator' => 'before',
				]
		);
		// team bio
		$this->add_control(
				'front_show_bio',
				[
						'label' => __('Show Bio', 'hip'),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __('Show', 'hip'),
						'label_off' => __('Hide', 'hip'),
						'default' => 'yes',
						'separator' => 'before',
				]
		);


		// team Image
		$this->add_control(
				'front_show_image',
				[
						'label' => __('Show Image', 'hip'),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __('Show', 'hip'),
						'label_off' => __('Hide', 'hip'),
						'default' => 'yes',
						'separator' => 'before',
				]
		);
		$this->end_controls_section();
	}

	private function hip_team_back_controls()
	{
		//controls
		$this->start_controls_section(
				'back-control-section',
				[
						'label' => __('Back', 'hip'),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT
				]
		);
		// hover image
		$this->add_control(
				'show_hover_image',
				[
						'label' => __('Show Hover image', 'hip'),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __('Show', 'hip'),
						'label_off' => __('Hide', 'hip'),
						'default' => 'yes',
						'return_value' => 'yes',
						'separator' => 'before',
				]
		);
		// team name
		$this->add_control(
				'back_show_team_name',
				[
						'label' => __('Show Name', 'hip'),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __('Show', 'hip'),
						'label_off' => __('Hide', 'hip'),
						'default' => 'yes',
						'separator' => 'before',
				]
		);
		// team Designation
		$this->add_control(
				'back_show_designation',
				[
						'label' => __('Show Designation', 'hip'),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __('Show', 'hip'),
						'label_off' => __('Hide', 'hip'),
						'default' => 'yes',
						'separator' => 'before',
				]
		);
		// team bio
		$this->add_control(
				'back_show_bio',
				[
						'label' => __('Show Bio', 'hip'),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __('Show', 'hip'),
						'label_off' => __('Hide', 'hip'),
						'default' => 'yes',
						'separator' => 'before',
				]
		);


		// team Image
		$this->add_control(
				'back_show_image',
				[
						'label' => __('Show Image', 'hip'),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __('Show', 'hip'),
						'label_off' => __('Hide', 'hip'),
						'default' => 'yes',
						'separator' => 'before',
				]
		);
		$this->end_controls_section();
	}

	private function style_layout_option()
	{
// Layout.
		$this->start_controls_section(
				'layout-section-style',
				[
						'label' => __('Layout', 'hip'),
						'tab' => Controls_Manager::TAB_STYLE,
				]
		);

		// Columns margin.
		$this->add_responsive_control(
				'grid_style_columns_margin',
				[
						'label' => __('Columns margin', 'hip'),
						'type' => Controls_Manager::SLIDER,
						'default' => [
								'size' => 15,
						],
						'range' => [
								'px' => [
										'min' => 0,
										'max' => 100,
								],
						],
						'selectors' => [
								'{{WRAPPER}} .hip-team-container' => 'grid-column-gap: {{SIZE}}{{UNIT}}',

						],
				]
		);
		// Row margin.
		$this->add_responsive_control(
				'grid_style_rows_margin',
				[
						'label' => __('Rows margin', 'post-grid-elementor-addon'),
						'type' => Controls_Manager::SLIDER,
						'default' => [
								'size' => 30,
						],
						'range' => [
								'px' => [
										'min' => 0,
										'max' => 100,
								],
						],
						'selectors' => [
								'{{WRAPPER}} .hip-team-container' => 'grid-row-gap: {{SIZE}}{{UNIT}}',
						],
				]
		);

		$this->end_controls_section();
	}

	private function front_style_option()
	{
// Front.
		$this->start_controls_section(
				'front-section-style',
				[
						'label' => __('Front', 'hip'),
						'tab' => Controls_Manager::TAB_STYLE,
				]
		);
		$this->add_responsive_control(
				'front_title',
				[
						'label' => __('Padding', 'hip'),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => ['px', 'em', '%'],
						'selectors' => [
								'{{WRAPPER}} .hip-team-box__layer.hip-team-box__front .team-name-designation ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
				]
		);
		$this->add_responsive_control(
				'front_title_alignment',
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
								'{{WRAPPER}} .hip-team-box__layer.hip-team-box__front' => 'text-align: {{VALUE}}',
						],
				]
		);
		//name bg
		$this->add_control(
				'front_name_bg',
				[
						'label' => __('Name Background', 'hip'),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
								'type' => \Elementor\Scheme_Color::get_type(),
								'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'selectors' => [
								'{{WRAPPER}} .hip-team-box__layer.hip-team-box__front .team-name-designation ' => 'background-color: {{VALUE}}',
						],
				]
		);
		//Bio  bg
		$this->add_control(
				'front_bio_bg',
				[
						'label' => __('Bio Background', 'hip'),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
								'type' => \Elementor\Scheme_Color::get_type(),
								'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'selectors' => [
								'{{WRAPPER}} .hip-team-box__layer.hip-team-box__front .team-bio' => 'background-color: {{VALUE}}',
						],
				]
		);

		//name color
		$this->add_control(
				'front_name_color',
				[
						'label' => __('Name Color', 'hip'),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
								'type' => \Elementor\Scheme_Color::get_type(),
								'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'selectors' => [
								'{{WRAPPER}} .hip-team-box__layer.hip-team-box__front .team-name ' => 'color: {{VALUE}}',
						],
				]
		);
		//name font
		$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
						'name' => 'front_team_name_typography',
						'label' => __('Name Typography', 'hip'),
						'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						'selector' => '{{WRAPPER}} .hip-team-box__layer.hip-team-box__front .team-name ',
				]
		);
		// designation color
		$this->add_control(
				'front_designation_color',
				[
						'label' => __('Designation Color', 'hip'),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
								'type' => \Elementor\Scheme_Color::get_type(),
								'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'selectors' => [
								'{{WRAPPER}} .hip-team-box__layer.hip-team-box__front .team-designation span' => 'color: {{VALUE}}',
						],
				]
		);
		//designation font
		$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
						'name' => 'front_designation_typography',
						'label' => __('Name Typography ', 'hip'),
						'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						'selector' => '{{WRAPPER}} .hip-team-box__layer.hip-team-box__front .team-designation span ',
				]
		);

		// team bio  color
		$this->add_control(
				'front_team_bio_color',
				[
						'label' => __('Bio Color', 'hip'),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
								'type' => \Elementor\Scheme_Color::get_type(),
								'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'selectors' => [
								'{{WRAPPER}} .hip-team-box__layer.hip-team-box__front .team-full-bio p' => 'color: {{VALUE}}',
						],
				]
		);
		//bio font
		$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
						'name' => 'front_team_bio_typography',
						'label' => __('Bio Typography ', 'hip'),
						'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						'selector' => '{{WRAPPER}} .hip-team-box__layer.hip-team-box__front .team-full-bio p ',
				]
		);
		$this->end_controls_section();
	}

	private function back_style_option()
	{
// Layout.
		$this->start_controls_section(
				'back-section-style',
				[
						'label' => __('Back', 'hip'),
						'tab' => Controls_Manager::TAB_STYLE,
				]
		);
		$this->add_responsive_control(
				'back_layer_box',
				[
						'label' => __('Padding', 'hip'),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => ['px', 'em', '%'],
						'selectors' => [
								'{{WRAPPER}} .hip-team-box__layer.hip-team-box__back .hip-team-bio_box__layer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
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
								'{{WRAPPER}} .hip-team-box__layer.hip-team-box__back' => 'text-align: {{VALUE}}',
						],
				]
		);
		//Bio  bg
		$this->add_control(
				'back_bio_bg',
				[
						'label' => __('Bio Background', 'hip'),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
								'type' => \Elementor\Scheme_Color::get_type(),
								'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'selectors' => [
								'{{WRAPPER}} .hip-team-box__layer.hip-team-box__back ' => 'background-color: {{VALUE}}',
						],
				]
		);
		//name bg
		$this->add_control(
				'back_name_bg',
				[
						'label' => __('Name Background', 'hip'),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
								'type' => \Elementor\Scheme_Color::get_type(),
								'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'selectors' => [
								'{{WRAPPER}} .hip-team-box__layer.hip-team-box__back .team-name' => 'background-color: {{VALUE}}',
						],
				]
		);


		//name color
		$this->add_control(
				'back_name_color',
				[
						'label' => __('Name Color', 'hip'),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
								'type' => \Elementor\Scheme_Color::get_type(),
								'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'selectors' => [
								'{{WRAPPER}} .hip-team-box__layer.hip-team-box__back .team-name ' => 'color: {{VALUE}}',
						],
				]
		);
		//name font
		$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
						'name' => 'back_name_typography',
						'label' => __('Name Typography', 'hip'),
						'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						'selector' => '{{WRAPPER}} .hip-team-box__layer.hip-team-box__back .team-name ',
				]
		);
		// designation color
		$this->add_control(
				'back_designation_color',
				[
						'label' => __('Designation Color', 'hip'),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
								'type' => \Elementor\Scheme_Color::get_type(),
								'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'selectors' => [
								'{{WRAPPER}} .hip-team-box__layer.hip-team-box__back .team-designation' => 'color: {{VALUE}}',
						],
				]
		);
		//designation font
		$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
						'name' => 'back_designation_typography',
						'label' => __('Name Typography ', 'hip'),
						'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						'selector' => '{{WRAPPER}} .hip-team-box__layer.hip-team-box__back .team-designation ',
				]
		);

		// team bio  color
		$this->add_control(
				'back_team_bio_color',
				[
						'label' => __('Bio Color', 'hip'),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
								'type' => \Elementor\Scheme_Color::get_type(),
								'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'selectors' => [
								'{{WRAPPER}} .hip-team-box__layer.hip-team-box__back .team-full-bio p' => 'color: {{VALUE}}',
						],
				]
		);
		//bio font
		$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
						'name' => 'back_team_bio_typography',
						'label' => __('Bio Typography ', 'hip'),
						'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						'selector' => '{{WRAPPER}} .hip-team-box__layer.hip-team-box__back .team-full-bio p ',
				]
		);
		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$post_per_page = $settings['post_per_page'];
		$grid_style = $settings['grid_style'];

		$columns_desktop = (!empty($settings['columns']) ? 'hip-team-desktop-' . $settings['columns'] : 'hip-team-desktop-3');

		$columns_tablet = (!empty($settings['columns_tablet']) ? ' hip-team-tablet-' . $settings['columns_tablet'] : 'hip-team-tablet-2');

		$columns_mobile = (!empty($settings['columns_mobile']) ? ' hip-team-mobile-' . $settings['columns_mobile'] : ' hip-team-mobile-1');
		?>

		<div class="hip-team-wrapper ">
			<div class="hip-team-container elementor-grid  <?php echo $columns_desktop . $columns_tablet . $columns_mobile ?>">
				<?php

				// Setup your custom query
				$args = array(
						'post_type' => 'team_member',
						'posts_per_page' => $post_per_page,
						'no_found_rows' => true,
						'ignore_sticky_posts' => true

				);

				$loop = new \WP_Query($args);
				global $blog;
				if ($loop->have_posts()) :
					if( 4 == $grid_style ){

						include( __DIR__ . '/layouts/layout-4.php' );

					}elseif( 3 == $grid_style ){

						include( __DIR__ . '/layouts/layout-3.php' );

					}elseif( 2 == $grid_style ){

						include( __DIR__ . '/layouts/layout-2.php' );

					}else{

						include( __DIR__ . '/layouts/layout-1.php' );

					}

				endif;
				?>
			</div>


		</div>


		<?php
	}

	/**
	 * render post thumbnails
	 */
	protected function render_post_thumbnails()
	{
		$settings = $this->get_settings();

		$grid_style = $settings['grid_style'];

		$team_feature_image = get_field('feature_image', get_the_ID());
		$team_hover_image = get_field('hover_image', get_the_ID());
		$show_hover_image = $settings['show_hover_image'];
		$show_image = $settings['front_show_image'];
		if ('yes' !== $show_image) {
			return;
		}


		?>
		<div class="team-image">

			<?php if ((1 == $grid_style) || (3 == $grid_style) || (4 == $grid_style)):
				if (!empty($team_hover_image)):?>
					<?php if ('yes' == $show_hover_image): ?>
						<div class=" team-hover-image bottom-image">
							<img src="<?php echo $team_hover_image; ?>" alt="<?php the_title(); ?>">
						</div>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
			<div class=" feature-image top-image">
				<img src="<?php echo $team_feature_image; ?>" alt="<?php the_title(); ?>">
			</div>
		</div>
		<?php
	}

	/**
	 * render post name
	 */
	protected function render_team_name()
	{
		$settings = $this->get_settings();
		$show_title = $settings['front_show_team_name'];
		if ('yes' !== $show_title) {
			return;
		}
		?>
		<div class="team-name">
			<?php the_title(); ?>
		</div>
		<?php
	}

	/**
	 * render team designation
	 */
	protected function render_team_designation()
	{
		$designation = get_field('designation', get_the_ID());
		$settings = $this->get_settings();
		$show_designation = $settings['front_show_designation'];
		if ('yes' !== $show_designation) {
			return;
		}

		?>
		<div class="team-designation">
			<?php if (!empty($designation)) : ?>
				<span><?php echo $designation; ?></span>
			<?php endif; ?>
		</div>
		<?php
	}

	/**
	 * render team bio
	 */
	protected function render_team_bio()
	{
		$bio = get_field('bio', get_the_ID());
		$settings = $this->get_settings();
		$show_bio = $settings['front_show_bio'];
		$limit_bio = $settings['team_bio_limit'];
		if ('yes' !== $show_bio) {
			return;
		}

		?>
		<div class="front team-bio">
			<?php echo wp_trim_words($bio, $limit_bio, ''); ?>
		</div>

		<?php
	}

	/**
	 * render back bio
	 */
	protected function render_team_back_bio()
	{
		$settings = $this->get_settings();
		$back_show_title = $settings['back_show_team_name'];
		$back_show_bio = $settings['back_show_bio'];
		$back_show_designation = $settings['back_show_designation'];
		$bio = get_field('bio', get_the_ID());
		$designation = !empty(get_field('designation', get_the_ID())) ? get_field('designation', get_the_ID()) : 'no designation';
		$grid_style = $settings['grid_style'];
		?>

		<div class="back team-bio hip-team-bio_box__layer">

			<?php if ('yes' === $back_show_title) { ?>
				<div class="team-name">
					<?php the_title(); ?>
				</div>
			<?php } ?>
			<?php if ('yes' === $back_show_designation) { ?>
				<div class="team-designation">
					<?php echo $designation; ?>
				</div>
			<?php } ?>
			<?php if ('yes' === $back_show_bio) { ?>
				<div class="team-full-bio">
					<?php echo $bio; ?>
				</div>
			<?php } ?>
		</div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new Hip_Team_Elementor_Widget());
