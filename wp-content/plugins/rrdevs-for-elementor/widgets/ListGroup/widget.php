<?php
namespace RRdevs_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Control_Media;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Icons_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Widget_Base;

class RRdevs_List_group extends Widget_Base {

	public function get_name() {
		return 'rrdevs-list-group';
	}

	public function get_title() {
		return esc_html__( 'RR List Group', 'rrdevs-addons' );
	}

	public function get_icon() {
		return 'eicon-editor-list-ol';
	}

	public function get_categories() {
		return [ 'rrdevs-addons' ];
	}

	public function get_keywords() {
		return [ 'rrdevs', 'information', 'group', 'list', 'icon', 'socail' ];
	}

	protected function register_controls() {

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'rrdevs_section_list_content',
			[
				'label' => esc_html__( 'Content', 'rrdevs-addons' )
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
            'rrdevs_list_icon_type',
            [
                'label' => __( 'Media Type', 'rrdevs-addons' ),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'icon',
				'options' => [
					'icon' => [
						'title' => __( 'Icon', 'rrdevs-addons' ),
						'icon' => 'eicon-star',
					],
					'number' => [
						'title' => __( 'Number', 'rrdevs-addons' ),
						'icon' => 'eicon-number-field',
					],
					'image' => [
						'title' => __( 'Image', 'rrdevs-addons' ),
						'icon' => 'eicon-image',
					],
				],
				'toggle' => false,
                'style_transfer' => true,
            ]
        );

		$repeater->add_control(
			'rrdevs_list_icon',
			[
				'label'       => __( 'Icon', 'rrdevs-addons' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'separator'   =>'after',
				'default'     => [
					'value'   => 'far fa-check-circle',
					'library' => 'fa-regular'
				],
				'condition' =>[
					'rrdevs_list_icon_type' => 'icon'
				]
			]
		);

		$repeater->add_control(
			'rrdevs_list_icon_number',
			[
				'label'   => esc_html__( 'Number', 'rrdevs-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( '1', 'rrdevs-addons' ),
				'separator'   =>'after',
				'condition' =>[
					'rrdevs_list_icon_type' => 'number'
				]
			]
		);

		$repeater->add_control(
			'rrdevs_list_icon_number_image',
			[
				'label' => __( 'Choose Image', 'rrdevs-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'separator'   =>'after',
				'dynamic' => [
					'active' => true,
				],
				'condition' =>[
					'rrdevs_list_icon_type' => 'image'
				]
			]
		);

        $repeater->add_control(
			'rrdevs_list_text',
			[
				'label'   => esc_html__( 'Text', 'rrdevs-addons' ),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'List Text', 'rrdevs-addons' ),
				'dynamic' => [ 'active' => true ]
			]
		);

		$repeater->add_control(
			'rrdevs_list_link',
			[
				'label' => __( 'List URL', 'rrdevs-addons' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'rrdevs-addons' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'rrdevs_list_group',
			[
				'label' => __( 'List Items', 'elementor' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' => [
					[
						'rrdevs_list_text' => __( 'List Item #1', 'elementor' ),
						'rrdevs_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
					[
						'rrdevs_list_text' => __( 'List Item #2', 'elementor' ),
						'rrdevs_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
					[
						'rrdevs_list_text' => __( 'List Item #3', 'elementor' ),
						'rrdevs_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
				],
				'title_field' => '{{{ elementor.helpers.renderIcon( this, rrdevs_list_icon, {}, "i", "panel" ) }}}{{{ rrdevs_list_text }}}'
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'rrdevs_section_list_style',
			[
				'label' => esc_html__( 'Container', 'rrdevs-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'rrdevs_section_list_layout',
			[
				'label' => __( 'Layout', 'rrdevs-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'layout_1',
				'options' => [
					'layout_1' => __( 'Layout 1', 'rrdevs-addons' ),
					'layout_2' => __( 'Layout 2', 'rrdevs-addons' ),
					'layout_3' => __( 'Layout 3', 'rrdevs-addons' ),
				],
			]
		);

		$this->add_responsive_control(
			'rrdevs_section_list_alignment',
			[
				'label'       => esc_html__( 'Alignment', 'rrdevs-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'rrdevs-list-group-left'   => [
						'title' => esc_html__( 'Left', 'rrdevs-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'rrdevs-list-group-center' => [
						'title' => esc_html__( 'Center', 'rrdevs-addons' ),
						'icon'  => 'eicon-text-align-center'
					],
					'rrdevs-list-group-right'  => [
						'title' => esc_html__( 'Right', 'rrdevs-addons' ),
						'icon'  => 'eicon-text-align-right'
					]
				],
				'selectors_dictionary' => [
					'rrdevs-list-group-left' => 'justify-content: flex-start; text-align: left;',
					'rrdevs-list-group-center' => 'justify-content: center; text-align: center;',
					'rrdevs-list-group-right' => 'justify-content: flex-end; text-align: right;',
				],
				'selectors' => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper' => '{{VALUE}};',
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item' => '{{VALUE}};',
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item a' => '{{VALUE}};',
				],
				'default'     => 'rrdevs-list-group-left',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'rrdevs_section_list_group_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .rrdevs-list-group',
			]
		);

		$this->add_responsive_control(
			'rrdevs_section_list_group_padding',
			[
				'label'      => __( 'Padding', 'rrdevs-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
                    'top'      => '0',
                    'right'    => '0',
                    'bottom'   => '0',
                    'left'     => '0',
                    'unit'     => 'px',
                    'isLinked' => true
                ],
				'selectors'  => [
					'{{WRAPPER}} .rrdevs-list-group' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'rrdevs_section_list_group_border',
				'selector'  => '{{WRAPPER}} .rrdevs-list-group'
			]
		);

		$this->add_responsive_control(
			'rrdevs_section_list_group_radius',
			[
				'label'        => __( 'Border Radius', 'rrdevs-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .rrdevs-list-group' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'rrdevs_section_list_group_shadow',
				'selector' => '{{WRAPPER}} .rrdevs-list-group'
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'rrdevs_section_list_item_style',
			[
				'label' => esc_html__( 'List Item', 'rrdevs-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'rrdevs_section_list_item_padding',
			[
				'label'        => __( 'Item Padding', 'rrdevs-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '10',
					'right'    => '10',
					'bottom'   => '10',
					'left'     => '10',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
			'rrdevs_section_list_item_separator',
            [
				'label'        => __( 'Item Separator', 'rrdevs-addons' ),
				'type'         =>  Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'rrdevs-addons' ),
				'label_off'    => __( 'Hide', 'rrdevs-addons' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => [
					'rrdevs_section_list_layout!' => 'layout_3'
				]
			]
        );

		$this->add_responsive_control(
			'rrdevs_section_list_item_separator_height',
			[
				'label' => __( 'Separator Height', 'rrdevs-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper.layout_1 .rrdevs-list-group-item:not(:last-child):after' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper.layout_2 .rrdevs-list-group-item:not(:last-child):after' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'rrdevs_section_list_item_separator' => 'yes',
					'rrdevs_section_list_layout!' => 'layout_3'
				]
			]
		);

		$this->add_control(
			'rrdevs_section_list_item_separator_color',
			[
				'label' => __( 'Separator Color', 'rrdevs-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#e5e5e5',
				'selectors' => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper.layout_1 .rrdevs-list-group-item:not(:last-child):after' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper.layout_2 .rrdevs-list-group-item:not(:last-child):after' => 'background: {{VALUE}}',
				],
				'condition' => [
					'rrdevs_section_list_item_separator' => 'yes',
					'rrdevs_section_list_layout!' => 'layout_3'
				]
			]
		);

		$this->add_responsive_control(
			'rrdevs_list_item_spacing',
			[
				'label' => __( 'Item Spacing', 'rrdevs-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper.layout_3 .rrdevs-list-group-item:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'rrdevs_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'rrdevs_list_item_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper.layout_3 .rrdevs-list-group-item',
				'condition' => [
					'rrdevs_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'rrdevs_list_item_border',
				'selector'  => '{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper.layout_3 .rrdevs-list-group-item',
				'fields_options'  => [
                    'border' 	  => [
                        'default' => 'solid'
                    ],
                    'width'  	  => [
                        'default' 	 => [
                            'top'    => '1',
                            'right'  => '1',
                            'bottom' => '1',
                            'left'   => '1'
                        ]
                    ],
                    'color' 	  => [
                        'default' => '#e5e5e5',
                    ]
                ],
				'condition' => [
					'rrdevs_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_responsive_control(
			'rrdevs_list_item_radius',
			[
				'label'        => __( 'Border Radius', 'rrdevs-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '10',
					'right'    => '10',
					'bottom'   => '10',
					'left'     => '10',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper.layout_3 .rrdevs-list-group-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'condition' => [
					'rrdevs_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'rrdevs_list_item_shadow',
				'selector' => '{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper.layout_3 .rrdevs-list-group-item',
				'condition' => [
					'rrdevs_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Icon Style
		*/
		$this->start_controls_section(
			'rrdevs_section_list_icon_style',
			[
				'label' => esc_html__( 'Icon', 'rrdevs-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'rrdevs_list_icon_position',
			[
				'label'       => esc_html__( 'Icon Position', 'rrdevs-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'rrdevs-icon-left'   => [
						'title' => esc_html__( 'Left', 'rrdevs-addons' ),
						'icon'  => 'eicon-h-align-left'
					],
					'rrdevs-icon-center' => [
						'title' => esc_html__( 'Center', 'rrdevs-addons' ),
						'icon'  => 'eicon-v-align-top'
					],
					'rrdevs-icon-right'  => [
						'title' => esc_html__( 'Right', 'rrdevs-addons' ),
						'icon'  => 'eicon-h-align-right'
					]
				],
				'default'     => 'rrdevs-icon-left'
			]
		);

		$this->add_responsive_control(
			'rrdevs_list_icon_alignment',
			[
				'label'       => esc_html__( 'Icon Vertical Alignment', 'rrdevs-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'rrdevs-icon-align-left'   => [
						'title' => esc_html__( 'Top', 'rrdevs-addons' ),
						'icon'  => 'eicon-v-align-top'
					],
					'rrdevs-icon-align-center' => [
						'title' => esc_html__( 'Center', 'rrdevs-addons' ),
						'icon'  => 'eicon-v-align-middle'
					],
					'rrdevs-icon-align-right'  => [
						'title' => esc_html__( 'Bottom', 'rrdevs-addons' ),
						'icon'  => 'eicon-v-align-bottom'
					]
				],
				'default'     => 'rrdevs-icon-align-left',
				'selectors_dictionary' => [
					'rrdevs-icon-align-left' => 'align-items: flex-start;',
					'rrdevs-icon-align-center' => 'align-items: center;',
					'rrdevs-icon-align-right' => 'align-items: flex-end;',
				],
				'selectors' => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item' => '{{VALUE}};',
				],
				'condition' => [
					'rrdevs_list_icon_position!' => 'rrdevs-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'rrdevs_list_icon_top_alignment',
			[
				'label'       => esc_html__( 'Icon Alignment', 'rrdevs-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'rrdevs-icon-top-align-left'   => [
						'title' => esc_html__( 'Left', 'rrdevs-addons' ),
						'icon'  => 'eicon-v-align-top'
					],
					'rrdevs-icon-top-align-center' => [
						'title' => esc_html__( 'Center', 'rrdevs-addons' ),
						'icon'  => 'eicon-v-align-middle'
					],
					'rrdevs-icon-top-align-right'  => [
						'title' => esc_html__( 'Right', 'rrdevs-addons' ),
						'icon'  => 'eicon-v-align-bottom'
					]
				],
				'default'     => 'rrdevs-icon-left',
				'selectors_dictionary' => [
					'rrdevs-icon-top-align-left' => 'text-align: left; margin-right: auto;',
					'rrdevs-icon-top-align-center' => 'text-align: center; margin-left: auto; margin-right: auto;',
					'rrdevs-icon-top-align-right' => 'text-align: right; margin-left: auto;',
				],
				'selectors' => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon' => '{{VALUE}};',
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon .rrdevs-list-group-icon-image' => '{{VALUE}};',
				],
				'condition' => [
					'rrdevs_list_icon_position' => 'rrdevs-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'rrdevs_section_list_item_icon_spacing',
			[
				'label' => __( 'Icon Right Spacing', 'rrdevs-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-text' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'rrdevs_list_icon_position' => 'rrdevs-icon-left'
				]
			]
		);
		$this->add_responsive_control(
			'rrdevs_section_list_item_icon_left_spacing',
			[
				'label' => __( 'Icon Left Spacing', 'rrdevs-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'rrdevs_list_icon_position' => 'rrdevs-icon-right'
				]
			]
		);
		$this->add_responsive_control(
			'rrdevs_section_list_item_icon_bottom_spacing',
			[
				'label' => __( 'Icon Bottom Spacing', 'rrdevs-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'rrdevs_list_icon_position' => 'rrdevs-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'rrdevs_section_list_item_icon_size',
			[
				'label' => __( 'Icon Size', 'rrdevs-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon svg' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon .rrdevs-list-group-icon-image' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'rrdevs_section_list_item_icon_color',
			[
				'label' => __( 'Icon Color', 'rrdevs-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon svg path' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rrdevs_section_list_item_icon_color_hover',
			[
				'label' => __( 'Icon Color Hover', 'rrdevs-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon:hover i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon:hover svg path' => 'fill: {{VALUE}}',
				],
			]
		);


		$this->add_responsive_control(
			'rrdevs_section_list_item_image_radius',
			[
				'label'        => __( 'Image Radius', 'rrdevs-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon .rrdevs-list-group-icon-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'rrdevs_list_item_icon_box_enable',
			[
				'label' => __( 'Enable Icon Box', 'rrdevs-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'rrdevs-addons' ),
				'label_off' => __( 'Hide', 'rrdevs-addons' ),
				'return_value' => 'yes',
				'default' => 'no',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'rrdevs_list_item_icon_box_width',
			[
				'label' => __( 'Icon Box Width', 'rrdevs-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon.yes' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper.layout_1 .rrdevs-list-group-item .rrdevs-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper.layout_2 .rrdevs-list-group-item .rrdevs-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper.layout_3 .rrdevs-list-group-item .rrdevs-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
				],
				'condition' => [
					'rrdevs_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'rrdevs_list_item_icon_box_height',
			[
				'label' => __( 'Icon Box Height', 'rrdevs-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon.yes' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'rrdevs_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'rrdevs_list_item_icon_box_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon.yes',
				'condition' => [
					'rrdevs_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'rrdevs_list_item_icon_box_background_hover',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon.yes:hover',
				'condition' => [
					'rrdevs_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'rrdevs_list_item_icon_box_border',
				'selector'  => '{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon.yes',
				'condition' => [
					'rrdevs_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'rrdevs_list_item_icon_box_radius',
			[
				'label'        => __( 'Border Radius', 'rrdevs-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon.yes' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'condition' => [
					'rrdevs_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'rrdevs_list_item_icon_box_shadow',
				'selector' => '{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-icon.yes',
				'condition' => [
					'rrdevs_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Text
		*/
		$this->start_controls_section(
			'rrdevs_section_list_text_style',
			[
				'label' => esc_html__( 'Text', 'rrdevs-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'rrdevs_section_list_text_alignment',
			[
				'label'       => esc_html__( 'Text Alignment', 'rrdevs-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'rrdevs-text-align-left'   => [
						'title' => esc_html__( 'Left', 'rrdevs-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'rrdevs-text-align-center' => [
						'title' => esc_html__( 'Center', 'rrdevs-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'rrdevs-text-align-right'  => [
						'title' => esc_html__( 'Right', 'rrdevs-addons' ),
						'icon'  => 'eicon-text-align-left'
					]
				],
				'default'     => 'rrdevs-text-align-left',
				'selectors_dictionary' => [
					'rrdevs-text-align-left' => 'text-align: left;',
					'rrdevs-text-align-center' => 'text-align: center;',
					'rrdevs-text-align-right' => 'text-align: right;',
				],
				'selectors' => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-text' => '{{VALUE}};',
				],
				'condition' => [
					'rrdevs_list_icon_position' => 'rrdevs-icon-center'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'rrdevs_section_list_text_typography',
				'label' => __( 'Typography', 'rrdevs-addons' ),
				'selector' => '{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-text',
			]
		);

		$this->add_control(
			'rrdevs_section_list_text_color',
			[
				'label' => __( 'Title Color', 'rrdevs-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rrdevs-list-group .rrdevs-list-group-wrapper .rrdevs-list-group-item .rrdevs-list-group-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
		<div class="rrdevs-list-group">
			<ul class="rrdevs-list-group-wrapper <?php echo $settings['rrdevs_section_list_layout']; ?>">
				<?php foreach( $settings['rrdevs_list_group'] as $list ) : ?>
				<?php
					$target = $list['rrdevs_list_link']['is_external'] ? ' target="_blank"' : '';
					$nofollow = $list['rrdevs_list_link']['nofollow'] ? ' rel="nofollow"' : '';
				?>
					<li class="rrdevs-list-group-item <?php echo $settings['rrdevs_list_icon_position']?>">
						<?php if ( !empty( $list['rrdevs_list_link']['url'] ) ) { ?>
						<a href="<?php echo $list['rrdevs_list_link']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?> >
						<?php } ?>
							<span class="rrdevs-list-group-icon <?php echo $settings['rrdevs_list_item_icon_box_enable']; ?>">
								<?php if ( $list['rrdevs_list_icon_type'] === 'icon' && !empty($list['rrdevs_list_icon']) ){ ?>
									<?php Icons_Manager::render_icon( $list['rrdevs_list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
								<?php } ?>
								<?php if ( $list['rrdevs_list_icon_type'] === 'number' && !empty($list['rrdevs_list_icon_type']) ){ ?>
									<div class="rrdevs-list-group-icon-number">
										<?php echo $list['rrdevs_list_icon_number']; ?>
									</div>
								<?php } ?>
								<?php if ( $list['rrdevs_list_icon_type'] === 'image' && !empty($list['rrdevs_list_icon_type']) ){ ?>
									<div class="rrdevs-list-group-icon-image">
										<img src="<?php echo $list['rrdevs_list_icon_number_image']['url'] ?>" alt="<?php echo $list['rrdevs_list_text']; ?>">
									</div>
								<?php } ?>
							</span>
							<?php if ( !empty( $list['rrdevs_list_text'] ) ) { ?>
								<span class="rrdevs-list-group-text">
									<?php echo $list['rrdevs_list_text']; ?>
								</span>
							<?php } ?>
						<?php if ( !empty( $list['rrdevs_list_link']['url'] ) ) { ?>
						</a>
						<?php } ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
	}
}
$widgets_manager->register_widget_type( new \RRdevs_Addons\Widgets\RRdevs_List_group() );