<?php
	$footer_menus = [
		[		
			'class-section-menu' => 'menu__footer_my_account',
			'theme_location' => 'footer_my_account',
			'container_aria_label' => 'Меню мій акаунт',
			'is_footer_menu' => true,
		],
		[		
			'class-section-menu' => 'menu__footer_helps',
			'theme_location' => 'footer_helps',
			'container_aria_label' => 'Меню інформація',
			'is_footer_menu' => true,
		],
		[		
			'class-section-menu' => 'menu__footer_proxy',
			'theme_location' => 'footer_proxy',
			'container_aria_label' => 'Меню про нас',
			'is_footer_menu' => true,
		],
		[		
			'class-section-menu' => 'menu__footer_categoriest',
			'theme_location' => 'footer_categories',
			'container_aria_label' => 'Меню Кетегорій',
			'is_footer_menu' => true,
		],
	];
?>

<div class="footer__top-box">
	<div class="footer__info">
		<div class="footer__logo">
			<a href="<?php echo esc_url( home_url( '/' ) );?>">
				<?php
				$header_logo = get_theme_mod('footer_logo');
				$img = wp_get_attachment_image_src($header_logo, 'full');
				if ($img) :
					?>
					<img src="<?php echo esc_url( $img[0] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) );?>" loading="lazy">
				<?php endif; ?>
			</a>
		</div>
		<p class="footer__slogan">
			<?php bloginfo('description');?>
		</p>
		<div class="footer__contact">
			<a href="tel:2195550114">(219) 555-0114</a>
			<span>or</span>
			<a href="mailto:Proxy@gmail.com">Proxy@gmail.com</a>
		</div>
	</div>	

	<div class="footer__menus">
		
		<?php 
			foreach ($footer_menus as $menu) {
				get_template_part('/template/modules/menu', '', $menu);
			}
		?>
	</div>

</div>