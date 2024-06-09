<?php

function customizar_register($wp_customize){

  //Header Area Function
  $wp_customize->add_section('header_area', array(
    'title' =>__('Header Area', 'techfarhana'),
    'description' => 'If you interested to update your header area, you can do it here.'
  ));

  $wp_customize->add_setting('logo', array(
    'default' => get_bloginfo('template_directory') . '/img/logo.png',
  ));

  $wp_customize-> add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
    'label' => 'Logo Upload',
    'description' => 'If you interested to change or update your logo you can do it.',
    'setting' => 'logo',
    'section' => 'header_area',
  ) ));

  // Menu Position Option
  $wp_customize->add_section('menu_option', array(
    'title' => __('Menu Position Option', 'techfarhana'),
    'description' => 'If you interested to change your menu position you can do it.'
  ));

  $wp_customize->add_setting('menu_position', array(
    'default' => 'right_menu',
  ));

  $wp_customize-> add_control('menu_position', array(
    'label' => 'Menu Position',
    'description' => 'Select your menu position',
    'setting' => 'menu_position',
    'section' => 'menu_option',
    'type' => 'radio',
    'choices' => array(
      'left_menu' => 'Left Menu',
      'right_menu' => 'Right Menu',
      'center_menu' => 'Center Menu',
    ),
  ));


  // Footer Option
  $wp_customize->add_section('footer_option', array(
    'title' => __('Footer Option', 'techfarhana'),
    'description' => 'If you interested to change or update your footer settings you can do it.'
  ));

  $wp_customize->add_setting('copyright_section', array(
    'default' => '&copy; Copyright 2021 | Procoder BD',
  ));

  $wp_customize-> add_control('copyright_section', array(
    'label' => 'Copyright Text',
    'description' => 'If need you can update your copyright text from here',
    'setting' => 'copyright_section',
    'section' => 'footer_option',
  ));

}

add_action('customize_register', 'customizar_register');
