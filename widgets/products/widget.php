<?php

namespace MyCustomWidgets\Widgets;

use Elementor\Controls_Manager;

class Products extends \Elementor\Widget_Base {
    
    public function get_name() {
		return 'products';
	}

    public function get_title() {
		return 'Products';
	}

    public function get_icon() {
		return 'fa fa-pencil';
	}

    public function get_categories() {
		return [ 'general' ];
	}

    protected function _register_controls() {
		
        $this->start_controls_section(
			'section_content',
			[
				'label' => 'Content',
			]
		);

		$this->add_control(
			'number_registers',
			[
				'label' => 'Number registers',
				'type' => Controls_Manager::NUMBER,
				'default' => 5
			]
		);

		$this->end_controls_section();
	}

    protected function render() {
		
		$this->getHtml();
	}

	private function getHtml() {
		
		$products = $this->getProducts();

		include 'html.php';
	}
 
	private function getProducts() {

		$settings = $this->get_settings_for_display();

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$query = new \WP_Query([
			'post_type'      => 'product',
			'post_status'    => 'publish',
			'posts_per_page' => $settings['number_registers'],
			'paged'          => $paged
		]);

		return $query;
	}
}