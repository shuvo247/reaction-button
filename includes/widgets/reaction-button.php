<?php

// use Elementor;

class Elementor_Reaction_Button_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'reaction_button_widget';
	}

	public function get_title() {
		return esc_html__( 'Reaction Button', 'exam-reaction-button' );
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'reaction', 'button' ];
	}
    protected function register_controls()
    {
        //Content Section Start
        $this->start_controls_section(
            'exam_reaction_button_general',
            [
                'label' => esc_html__('General', 'exam-reaction-button')
            ]
        );
        $this->add_control(
            'exam_reaction_button_general_title',
            [
                'label' => esc_html__('Title', 'exam-reaction-button'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Share your exparience with us!!', 'exam-reaction-button'),
                'label_block' => true,
            ]
        );
        $this->add_responsive_control(
			'exam_reaction_button_general_text_align',
			[
				'label' 		=> esc_html__( 'Text Align', 'exam-reaction-button' ),
				'type' 			=> \Elementor\Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 		=> [
						'title' => esc_html__( 'Left', 'exam-reaction-button' ),
						'icon' 	=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' => esc_html__( 'Center', 'exam-reaction-button' ),
						'icon' 	=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' => esc_html__( 'Right', 'exam-reaction-button' ),
						'icon' 	=> 'eicon-text-align-right',
					],
					'justify' 	=> [
						'title' => esc_html__( 'Justified', 'exam-reaction-button' ),
						'icon' 	=> 'eicon-text-align-justify',
					],
				],
				'default' 		=> 'center',
				'selectors' 	=> [
                    '{{WRAPPER}} .reaction-button-wrapper' =>'text-align: {{VALUE}};',
				],
			]
		);

        $this->add_responsive_control(
			'exam_reaction_button_general_icon_align',
			[
				'label' 		=> esc_html__( 'Icon Align', 'exam-reaction-button' ),
				'type' 			=> \Elementor\Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 		=> [
						'title' => esc_html__( 'Left', 'exam-reaction-button' ),
						'icon' 	=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' => esc_html__( 'Center', 'exam-reaction-button' ),
						'icon' 	=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' => esc_html__( 'Right', 'exam-reaction-button' ),
						'icon' 	=> 'eicon-text-align-right',
					],
					'justify' 	=> [
						'title' => esc_html__( 'Justified', 'exam-reaction-button' ),
						'icon' 	=> 'eicon-text-align-justify',
					],
				],
				'default' 		=> 'center',
				'selectors' 	=> [
                    '{{WRAPPER}} .reaction-button-wrapper .reaction-button' =>'justify-content: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'reaction_button_background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .reaction-button-wrapper',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'reaction_button_box_shadow',
				'selector' => '{{WRAPPER}} .reaction-button-wrapper',
			]
		);
        $this->end_controls_section();

		$this->start_controls_section(
			'reaction_button_title_style',
			[
				'label' => esc_html__('Title', 'exam-reaction-button'),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'reaction_button_title_style_color',
			[
				'label' => esc_html__( 'Color', 'exam-reaction-button' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reaction-button-wrapper h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'reaction_button_title_style_typography',
				'selector' => '{{WRAPPER}} .reaction-button-wrapper h3',
			]
		);

		$this->end_controls_section();

		// Default Icon
		$this->start_controls_section(
			'reaction_button_icon_style',
			[
				'label' => esc_html__('Icon', 'exam-reaction-button'),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'reaction_button_icon_style_color',
			[
				'label' => esc_html__( 'Color', 'exam-reaction-button' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reaction-button-wrapper .reaction-button .reaction-icon svg' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'reaction_button_icon_style_size_width',
			[
				'label' => esc_html__( 'Width', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .reaction-button-wrapper .reaction-button .reaction-icon svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'reaction_button_icon_style_size_height',
			[
				'label' => esc_html__( 'Height', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .reaction-button-wrapper .reaction-button .reaction-icon svg' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'reaction_button_icon_style_smile_active_color',
			[
				'label' => esc_html__( 'Smile Active Color', 'exam-reaction-button' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reaction-button-wrapper .reaction-button .reaction-icon.smile.active svg' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'reaction_button_icon_style_straight_active_color',
			[
				'label' => esc_html__( 'Straight Active Color', 'exam-reaction-button' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reaction-button-wrapper .reaction-button .reaction-icon.straight.active svg' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'reaction_button_icon_style_sad_active_color',
			[
				'label' => esc_html__( 'Sad Active Color', 'exam-reaction-button' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reaction-button-wrapper .reaction-button .reaction-icon.sad.active svg' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
        
    }
	protected function render() {
        $settings = $this->get_settings_for_display();
        include EXAM_REACTION_BUTTON_PATH_FRONTEND . '/views/reaction-view.php';
	}
}