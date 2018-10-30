<?php
namespace Elementor;
/*
	Elementor register minera widget
*/
	add_action( "elementor/widgets/widgets_registered", "Elementor\minera_widget_elementor" );
	function minera_widget_elementor()
	{
		$widgets = glob(get_template_directory()."/elementor/widget/*.php");
		foreach ($widgets as $key => $value) {
			if ( file_exists( $value ) ) {
				require_once $value;
			}
		}
	}
/*
	Elementor add category
*/
	add_action( "elementor/elements/categories_registered", "Elementor\minera_category_widget_elementor" );
	function minera_category_widget_elementor( $elements_manager )
	{
		$elements_manager->add_category(
			'minera_category',
			array(
				'title' => __( 'Minera Category', 'minera' ),
			)
		 );
	}


/*
.*.Elementor add product
*/
	add_action( "elementor/elements/product_registered", "Elementor\minera_product_widget_elementor" );
	function minera_product_widget_elementor( $elements_product )
	{
		$elements_product->add_category(
			'minera_product',
			array(
				'title' => __( 'Minera produc', 'minera' ),
			)
		 );
	}