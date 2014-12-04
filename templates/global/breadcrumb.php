<?php
/**
 * Shop breadcrumb
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$breadcrumbs = new WC_Breadcrumb();

if ( $home ) {
	$breadcrumbs->add_crumb( $home, home_url() );
}
$breadcrumbs->generate();
$breadcrumb = $breadcrumbs->get_breadcrumb();

echo $wrap_before;

foreach ( $breadcrumb as $key => $crumb ) {
	echo $before;

	if ( ! empty( $crumb[1] ) && end( array_keys( $breadcrumb ) ) !== $key ) {
		echo '<a href="' . esc_url( $crumb[1] ) . '">';
	}

	echo esc_html( $crumb[0] );

	if ( ! empty( $crumb[1] ) && end( array_keys( $breadcrumb ) ) !== $key ) {
		echo '</a>';
	}

	echo $after;

	if ( end( array_keys( $breadcrumb ) ) !== $key ) {
		echo $delimiter;
	}
}

echo $wrap_after;