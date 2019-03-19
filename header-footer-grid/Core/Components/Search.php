<?php
/**
 * Button Component class for Header Footer Grid.
 *
 * Name:    Header Footer Grid
 * Author:  Bogdan Preda <bogdan.preda@themeisle.com>
 *
 * @version 1.0.0
 * @package HFG
 */

namespace HFG\Core\Components;

use HFG\Main;
use WP_Customize_Manager;

/**
 * Class Button
 *
 * @package HFG\Core\Components
 */
class Search extends Abstract_Component {

	/**
	 * Button constructor.
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @param string $panel The panel name.
	 */
	public function __construct( $panel ) {
		$this->set_property( 'label', __( 'Search Field', 'hfg-module' ) );
		$this->set_property( 'id', 'header_search' );
		$this->set_property( 'width', 1 );
		$this->set_property( 'section', 'header_search' );
		$this->set_property( 'panel', $panel );
	}

	/**
	 * Called to register component controls.
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @param WP_Customize_Manager $wp_customize The Customize Manager.
	 *
	 * @return WP_Customize_Manager
	 */
	public function customize_register( WP_Customize_Manager $wp_customize ) {
		$fn       = array( $this, 'render_component' );
		$selector = 'a.item--' . $this->id;

		$wp_customize->add_section(
			$this->section, array(
				'title'    => $this->label,
				'priority' => 30,
				'panel'    => $this->panel,
			)
		);

		$wp_customize->add_setting(
			$this->id . '_placeholder', array(
				'theme_supports' => 'hfg_support',
				'default'        => __( 'Search for ...', 'hfg-module' ),
				'transport'      => 'refresh',
			)
		);

		$wp_customize->add_control(
			$this->id . '_placeholder', array(
				'name'            => $this->section . '_placeholder',
				'label'           => __( 'Placeholder', 'hfg-module' ),
				'type'            => 'text',
				'section'         => $this->section,
				'selector'        => $selector,
				'render_callback' => $fn,
				'settings'        => $this->section . '_placeholder',
			)
		);

		return parent::customize_register( $wp_customize );
	}

	/**
	 * The render method for the component.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function render_component() {
		Main::get_instance()->load( 'component-search' );
	}
}