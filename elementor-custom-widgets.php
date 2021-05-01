<?php 

/**
 * Plugin Name: My Custom Widgets
 * Description: My Custom Widgets for Elementor
 * Author:      Fernando Mariano
 * Author URI:  https://fndomariano.github.io
 */

namespace MyCustomWidgets;


class Plugin {

    public function __construct() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );		
	}

    private function include_widgets() {		        
		require_once( __DIR__ . '/widgets/products/widget.php' );        
	}

    public function register_widgets() {
		
        $this->include_widgets();
		        
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Products() );
	}
 }

 new Plugin();