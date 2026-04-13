<?php
$payment_methods = [
	[
		'icon' => '/applepay.svg',
		'alt' => __( 'Apple Pay', 'shopery' ),
	],
	[
		'icon' => '/visa.svg',
		'alt' => __( 'Visa', 'shopery' ),
	],
	[
		'icon' => '/discover.svg',
		'alt' => __( 'Discover', 'shopery' ),
	],
	[
		'icon' => '/mastercard.svg',
		'alt' => __( 'Mastercard', 'shopery' ),
	],
	[
		'icon' => '/cart.svg',
		'alt' => __( 'Cart payment', 'shopery' ),
	],
];
?>

<div class="footer__bottom">
	<p class="footer__copy">
		<span><?php bloginfo('name');?></span>
		<span><?php echo esc_html( wp_date( 'Y' ) );?></span>
		<span>All Rights Reserved</span>
	</p>
	<div class="footer__payment-methods">
		<?php
			foreach ( $payment_methods as $payment_method ) :
		?> 
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon' . $payment_method['icon'] );?>" alt="<?php echo esc_attr( $payment_method['alt'] );?>" loading="lazy"> 
		<?php
			endforeach;
		?>
	</div>
</div>