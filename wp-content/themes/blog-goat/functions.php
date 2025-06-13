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
function carregar_scripts_hero() {
  wp_enqueue_script('hero-slider', get_stylesheet_directory_uri() . '/js/hero-slider.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'carregar_scripts_hero');

function registrar_menus_customizados() {
  register_nav_menus([
    'footer_menu' => 'Menu do Footer',
  ]);
}
add_action('after_setup_theme', 'registrar_menus_customizados');

function excluir_categoria_parceiros_globalmente($query) {
  if (is_admin()) return;

  // Verifica se a query é pública (inclusive WP_Query manual)
  $is_main = $query->is_main_query();
  $is_custom_loop = !isset($query->query_vars['category_name']) || $query->query_vars['category_name'] !== 'parceiros';
  $is_not_parceiros_page = !is_page_template('parceiros.php') && !is_page('parceiros');

  // Se não estiver na página parceiros e não for especificamente sobre ela
  if ($is_not_parceiros_page) {
    $id_categoria_parceiros = get_cat_ID('parceiros');

    // Pega categorias já excluídas (se houver) e adiciona a de parceiros
    $categorias_excluidas = $query->get('category__not_in');
    if (!is_array($categorias_excluidas)) {
      $categorias_excluidas = [];
    }

    // Garante que parceiros esteja entre as categorias excluídas
    if (!in_array($id_categoria_parceiros, $categorias_excluidas)) {
      $categorias_excluidas[] = $id_categoria_parceiros;
      $query->set('category__not_in', $categorias_excluidas);
    }
  }
}
add_action('pre_get_posts', 'excluir_categoria_parceiros_globalmente');
