<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head();?>
</head>
<body <?php body_class();?>>
	<?php wp_body_open();?>

	<div class="wrapper">

		<header class="header">
			<button
				class="header__overlay"
				type="button"
				hidden
				aria-label="<?php esc_attr_e( 'Close mobile menu', 'shopery' );?>"
			></button>
			<div class="header__box">
				<?php 
					get_template_part('/template/components/header/header', 'top');
					get_template_part('/template/components/header/header', 'midle');
					get_template_part('/template/components/header/header', 'bottom');
				?>
				<div
					class="header__drawer"
					id="header-drawer"
					aria-hidden="true"
				>
					<div class="header__drawer-panel">
						<div class="header__drawer-head">
							<p class="header__drawer-title"><?php esc_html_e( 'Menu', 'shopery' );?></p>
							<button
								class="header__drawer-close"
								type="button"
								aria-label="<?php esc_attr_e( 'Close mobile menu', 'shopery' );?>"
							>
								<span class="header__drawer-close-line" aria-hidden="true"></span>
								<span class="header__drawer-close-line" aria-hidden="true"></span>
							</button>
						</div>
						<?php
							get_template_part(
								'/template/components/header/header',
								'top',
								[
									'is_mobile' => true,
								]
							);
							get_template_part(
								'/template/components/header/header',
								'bottom',
								[
									'is_mobile' => true,
								]
							);
						?>
					</div>
				</div>
			</div>
		</header>