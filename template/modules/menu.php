<?php
$is_footer_menu = ! empty( $args['is_footer_menu'] );
$menu_name = wp_get_nav_menu_name( $args['theme_location'] );
$section_classes = [ 'menu' ];

if ( ! empty( $args['class-section-menu'] ) ) {
	$section_classes[] = sanitize_html_class( $args['class-section-menu'] );
}

if ( $is_footer_menu ) {
	$section_classes[] = 'menu--footer';
}

$section_attributes = $is_footer_menu ? ' data-footer-accordion-item' : '';
$panel_id = $is_footer_menu ? 'footer-menu-panel-' . sanitize_html_class( $args['theme_location'] ) : '';
$toggle_id = $is_footer_menu ? 'footer-menu-toggle-' . sanitize_html_class( $args['theme_location'] ) : '';
$container_class = 'menu__nav';

if ( $is_footer_menu ) {
	$container_class .= ' menu__panel';
}
?>

<div class="<?php echo esc_attr( implode( ' ', $section_classes ) );?>"<?php echo $section_attributes;?>>
	<?php if ( $is_footer_menu ) : ?>
		<button
			class="menu__name-menu menu__toggle"
			type="button"
			id="<?php echo esc_attr( $toggle_id );?>"
			aria-expanded="true"
			aria-controls="<?php echo esc_attr( $panel_id );?>"
			data-footer-accordion-toggle
		>
			<span class="menu__name-text"><?php echo esc_html( $menu_name );?></span>
			<span class="menu__toggle-icon" aria-hidden="true"></span>
		</button>
	<?php else : ?>
		<p class="menu__name-menu">
			<?php echo esc_html( $menu_name );?>
		</p>
	<?php endif; ?>

	<?php
	wp_nav_menu(
		[
			'theme_location' => $args['theme_location'],
			'container' => 'nav',
			'container_class' => $container_class,
			'container_id' => $panel_id,
			'menu_class' => 'menu__list',
			'container_aria_label' => ! empty( $args['container_aria_label'] ) ? esc_attr( $args['container_aria_label'] ) : '',
		]
	);
	?>
</div>