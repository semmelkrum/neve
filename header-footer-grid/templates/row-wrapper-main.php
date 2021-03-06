<?php
/**
 * Template used for component rendering wrapper.
 *
 * Name:    Header Footer Grid
 *
 * @version 1.0.0
 * @package HFG
 */

namespace HFG;

$row_index  = current_row();
$device     = current_device();
$control_id = get_builders()->get_property( 'control_id' );

$skin_mode = get_theme_mod( $control_id . '_' . $row_index . '_skin', 'light-mode' );

$row_visibility = 'hide-on-desktop';
if ( $device === 'desktop' ) {
	$row_visibility = 'hide-on-mobile hide-on-tablet';
}

$row_classes = [
	'header--row',
	'header-' . $row_index,
	$row_visibility,
];

$row_classes[] = get_theme_mod( $control_id . '_' . $row_index . '_layout', 'layout-full-contained' );

$row_classes[] = 'nv-navbar';
?>

<nav class="<?php echo esc_attr( apply_filters( 'neve_nav_data_attrs', join( ' ', $row_classes ) ) ); ?> header--row"
	id="cb-row--header-<?php echo $row_index; ?>"
	data-row-id="<?php echo $row_index; ?>" data-show-on="<?php echo $device; ?>">

	<div class="header--row-inner header-<?php echo esc_attr( $row_index ); ?>-inner <?php echo esc_attr( $skin_mode ); ?>">
		<div class="container">
			<div class="row">
				<?php render_components(); ?>
			</div>
		</div>
	</div>
</nav>

