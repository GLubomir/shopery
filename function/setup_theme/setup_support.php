<?php 


function shopery_setup_theme(){

	add_theme_support('custom-logo');


	register_nav_menus([
		'header_nav' => 'Головне меню',
		'footer_my_account' => 'Меню мій акаунт',
		'footer_helps' => 'Меню інформація',
		'footer_proxy' => 'Меню про нас',
		'footer_categories' => 'Меню Кетегорій'
	]);
}

function shopery_customize_register($wp_customize){

	$wp_customize->add_setting('footer_logo', [
		'default' => '',
		'sanitize_callback' => 'absint',
	]);

	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo', array(
        'section' => 'title_tagline',
        'label' => 'Логотип для футера'
    )));

    $wp_customize->selective_refresh->add_partial('header_logo', array(
        'selector' => '.footer-logo',
        'render_callback' => function() {
            $logo = get_theme_mod('footer_logo');
            $img = wp_get_attachment_image_src($logo, 'full');
            if ($img) {
                return '<img src="' . $img[0] . '" alt="">';
            } else {
                return '';
            }
        }
    ));
}