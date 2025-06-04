<?php
// Ativa suporte a menus no WordPress
function goat_theme_setup() {
    register_nav_menus([
        'menu-principal' => 'Menu Principal do Header',
    ]);
}
add_action('after_setup_theme', 'goat_theme_setup');


add_filter('use_block_editor_for_post_type', function($use_block_editor, $post_type) {
    if ($post_type === 'page') {
        return false; // desativa Gutenberg só em páginas
    }
    return $use_block_editor;
}, 10, 2);


add_theme_support('title-tag');
add_theme_support('post-thumbnails');

add_filter('body_class', function($classes) {
    if (is_single()) {
        $classes[] = 'is-single-post';
    }
    return $classes;
});

function estimated_reading_time($content) {
  $words = str_word_count(strip_tags($content));
  $minutes = ceil($words / 200); // 200 palavras por minuto
  return $minutes . ' min';
}

function xml_carrossel_injetar_carrossel() {
    $json_url = get_stylesheet_directory_uri() . '/produtos.json';
    $script_url = get_stylesheet_directory_uri() . '/produtos.js';

    ob_start(); // importante para shortcode funcionar
    ?>
    <section class="carousel-wrapper wrapper_margin">
      <div class="carousel-fade left"></div>
      <div class="carousel-fade right"></div>
      <div class="carousel-container" id="carousel-container" data-json="<?php echo esc_url($json_url); ?>"></div>
    </section>
    <script src="<?php echo esc_url($script_url); ?>"></script>
    <?php
    return ob_get_clean();
}
add_shortcode('carrossel_produtos', 'xml_carrossel_injetar_carrossel');
