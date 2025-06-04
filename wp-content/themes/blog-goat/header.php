<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Fonts e ícones -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Estilo principal -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">

  <?php wp_head(); ?>
</head>


<body>
<!-- Cabeçalho principal do site -->
<header class="header_nav_bar wrapper_padding">
  <div class="img_logo_header">
    <a href="<?php echo home_url(); ?>">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="Logo da GOAT">
    </a>
  </div>

  <nav class="nav_bar" aria-label="Menu principal">
    <?php
    wp_nav_menu([
      'theme_location' => 'menu-principal',
      'container' => false,
      'menu_class' => '',
      'items_wrap' => '<ul>%3$s</ul>',
      'fallback_cb' => false
    ]);
    ?>
  </nav>

  <!-- Menu Hamburguer -->
  <div class="menu-toggle" id="menu-toggle" aria-label="Abrir menu">
    <span></span>
    <span></span>
    <span></span>
  </div>

  <!-- Overlay para fundo escuro no mobile -->
  <div class="menu-overlay" id="menu-overlay"></div>
</header>

