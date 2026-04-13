<?php
$is_mobile = ! empty( $args['is_mobile'] );
$top_classes = 'header__top';
$top_box_classes = 'header__top-box';
$controls_classes = 'header__controls';

if ( $is_mobile ) {
	$top_classes .= ' header__top--drawer';
	$top_box_classes .= ' header__top-box--drawer';
	$controls_classes .= ' header__controls--drawer';
}
?>

<div class="<?php echo esc_attr( $top_classes );?>">
	<div class="container">
		<div class="<?php echo esc_attr( $top_box_classes );?>">
			<div class="header__location">
				<img src="<?php echo esc_url( connect_image( 'icon/map-pin.svg' ) );?>" alt="<?php esc_attr_e( 'Map pin', 'shopery' );?>">
				<a href="https://maps.app.goo.gl/2Rw7heNNo1yHTzsd7" target="_blank" rel="noopener noreferrer">
					<?php esc_html_e( 'Store Location: Lincoln- 344, Illinois, Chicago, USA', 'shopery' );?>
				</a>
			</div>
			<div class="<?php echo esc_attr( $controls_classes );?>">
				<div class="header__dropdowns">
					<?php
					get_template_part(
						'/template/modules/dropdown',
						'',
						[
							'class' => 'lang',
							'current' => 'Eng',
							'items' => [
								'Uk',
								'Ru',
							],
						]
					);
					?>
					<?php
					get_template_part(
						'/template/modules/dropdown',
						'',
						[
							'class' => 'currency',
							'current' => 'USD',
							'items' => [
								'UAH',
							],
						]
					);
					?>
				</div>
				<span class="header__separator" aria-hidden="true">|</span>
				<div class="header__auth">
					<a href="#"><?php esc_html_e( 'Sign In', 'shopery' );?></a>
					<span class="header__auth-divider" aria-hidden="true">/</span>
					<a href="#"><?php esc_html_e( 'Sign Up', 'shopery' );?></a>
				</div>
			</div>
		</div>
	</div>
</div>