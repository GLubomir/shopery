<div class="header__midle">
	<div class="container">
		<div class="header__midle-box">
			<button
				class="header__menu-toggle"
				type="button"
				aria-expanded="false"
				aria-controls="header-drawer"
				aria-label="<?php esc_attr_e( 'Open mobile menu', 'shopery' );?>"
			>
				<span class="header__menu-toggle-line" aria-hidden="true"></span>
				<span class="header__menu-toggle-line" aria-hidden="true"></span>
				<span class="header__menu-toggle-line" aria-hidden="true"></span>
			</button>
			<div class="header__logo">
				<?php the_custom_logo();?>
			</div>
			<div class="header__search">
				<?php get_search_form();?>
			</div>
			<div class="header__actions">
				<div class="header__wishlist">
					<a href="/">
						<img src="<?php echo esc_url( connect_image( '/icon/heart.svg' ) );?>" alt="<?php esc_attr_e( 'Wishlist', 'shopery' );?>">
					</a>
				</div>
				<span class="header__separator" aria-hidden="true">|</span>
				<div class="header__cart-box">
					<div class="header__cart">
						<span class="header__cart-counter active">2</span>
						<a href="/">
							<img src="<?php echo esc_url( connect_image( '/icon/shopping-cart.svg' ) );?>" alt="<?php esc_attr_e( 'Shopping cart', 'shopery' );?>">
						</a>
					</div>
					<div class="header__card-info">
						<p class="header__hint"><?php esc_html_e( 'Shopping cart:', 'shopery' );?></p>
						<span class="header__price">$57.00</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>