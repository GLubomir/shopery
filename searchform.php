<form class="search" action="<?php echo esc_url( home_url( '/' ) );?>" method="get" role="search">
	<div class="search__box input-wrapper">
		<img src="<?php echo esc_url( connect_image( '/icon/magnifying-glass.svg' ) );?>" alt="<?php esc_attr_e( 'Search icon', 'shopery' );?>">
		<label class="screen-reader-text" for="header-search"><?php esc_html_e( 'Search for:', 'shopery' );?></label>
		<input
			class="search__input input-element"
			id="header-search"
			type="search"
			name="s"
			value="<?php echo esc_attr( get_search_query() );?>"
			placeholder="<?php esc_attr_e( 'Search products...', 'shopery' );?>"
		>
		<button class="search__button button button--primary" type="submit"><?php esc_html_e( 'Search', 'shopery' );?></button>
	</div>
</form>