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
       
        $this->end_controls_section();
        
    }
	protected function render() {
        $settings = $this->get_settings_for_display();
        include EXAM_REACTION_BUTTON_PATH_FRONTEND . '/views/reaction-view.php';
	}
}