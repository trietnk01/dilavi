<?php
/*
	acf create page
*/
if( ! class_exists('ACF') ) return;

//if ( p_get_current_user_role() == "subscriber" ) return;

// create page

acf_add_options_page(array(
	'page_title' 	=> 'PAGE Option',
	'menu_title'	=> 'PAGE Option',
	'menu_slug' 	=> 'p-option-page',
	'capability'	=> 'edit_posts',
	'redirect'		=> admin_url('admin.php?page=page_option') ,
));
acf_add_options_sub_page(array(
	'page_title' 	=> 'PAGE Option',
	'menu_title'	=> 'PAGE Option',
	'menu_slug' 	=> 'page_option',
	'parent_slug'	=> 'p-option-page',
));
acf_add_options_sub_page(array(
	'page_title' 	=> 'HomePage',
	'menu_title'	=> 'HomePage',
	'menu_slug' 	=> 'home_page',
	'parent_slug'	=> 'p-option-page',
));
acf_add_options_sub_page(array(
	'page_title' 	=> 'HomePage - En',
	'menu_title'	=> 'HomePage - En',
	'menu_slug' 	=> 'home_page_en',
	'parent_slug'	=> 'p-option-page',
));

acf_add_options_sub_page(array(
	'page_title' 	=> 'Banner trang con',
	'menu_title'	=> 'Banner trang con',
	'menu_slug' 	=> 'banner',
	'parent_slug'	=> 'p-option-page',
));
acf_add_options_sub_page(array(
	'page_title' 	=> 'Banner trang con - En',
	'menu_title'	=> 'Banner trang con - En',
	'menu_slug' 	=> 'banner_en',
	'parent_slug'	=> 'p-option-page',
));

acf_add_options_sub_page(array(
	'page_title' 	=> 'Trang giới thiệu',
	'menu_title'	=> 'Trang giới thiệu',
	'menu_slug' 	=> 'intro_about_us',
	'parent_slug'	=> 'p-option-page',
));

acf_add_options_sub_page(array(
	'page_title' 	=> 'Trang giới thiệu - En',
	'menu_title'	=> 'Trang giới thiệu - En',
	'menu_slug' 	=> 'intro_about_us_en',
	'parent_slug'	=> 'p-option-page',
));
acf_add_options_sub_page(array(
	'page_title' 	=> 'Địa chỉ',
	'menu_title'	=> 'Địa chỉ',
	'menu_slug' 	=> 'address_company',
	'parent_slug'	=> 'p-option-page',
));

acf_add_options_sub_page(array(
	'page_title' 	=> 'Địa chỉ - En',
	'menu_title'	=> 'Địa chỉ - En',
	'menu_slug' 	=> 'address_company_en',
	'parent_slug'	=> 'p-option-page',
));
acf_add_options_sub_page(array(
	'page_title' 	=> 'Trang hình ảnh - Video',
	'menu_title'	=> 'Trang hình ảnh - Video',
	'menu_slug' 	=> 'p_slider_video',
	'parent_slug'	=> 'p-option-page',
));
acf_add_options_sub_page(array(
    'page_title'    => 'Footer',
    'menu_title'    => 'Footer',
     'menu_slug'    => 'footer',
    'parent_slug'   => 'p-option-page',
));



