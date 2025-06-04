<?php
// components/breadcrumb.php
?>

<nav class="breadcrumb" aria-label="breadcrumb">
  <ul itemscope itemtype="https://schema.org/BreadcrumbList">
    <?php
    $position = 1;

    // Início
    echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="' . esc_url(home_url()) . '" itemprop="item">
              <span itemprop="name">Início</span>
            </a>
            <meta itemprop="position" content="' . $position++ . '" />
          </li>';

    // Se for um post
    if (is_singular('post')) {
      $category = get_the_category();
      if (!empty($category)) {
        $cat = $category[0];
        echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="' . esc_url(get_category_link($cat->term_id)) . '" itemprop="item">
                  <span itemprop="name">' . esc_html($cat->name) . '</span>
                </a>
                <meta itemprop="position" content="' . $position++ . '" />
              </li>';
      }

      // Título do post (sem link)
      echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span itemprop="name">' . esc_html(get_the_title()) . '</span>
              <meta itemprop="position" content="' . $position++ . '" />
            </li>';

    } elseif (is_category()) {
      // Página de categoria
      echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span itemprop="name">' . single_cat_title('', false) . '</span>
              <meta itemprop="position" content="' . $position++ . '" />
            </li>';

    } elseif (is_page() && !is_front_page()) {
      // Página comum (com hierarquia)
      $ancestors = array_reverse(get_post_ancestors(get_the_ID()));
      foreach ($ancestors as $ancestor_id) {
        echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="' . get_permalink($ancestor_id) . '" itemprop="item">
                  <span itemprop="name">' . get_the_title($ancestor_id) . '</span>
                </a>
                <meta itemprop="position" content="' . $position++ . '" />
              </li>';
      }

      // Página atual (sem link)
      echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span itemprop="name">' . get_the_title() . '</span>
              <meta itemprop="position" content="' . $position++ . '" />
            </li>';

    } elseif (is_search()) {
      echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span itemprop="name">Resultados da busca por "' . esc_html(get_search_query()) . '"</span>
              <meta itemprop="position" content="' . $position++ . '" />
            </li>';

    } elseif (is_404()) {
      echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span itemprop="name">Erro 404 - Página não encontrada</span>
              <meta itemprop="position" content="' . $position++ . '" />
            </li>';
    }
    ?>
  </ul>
</nav>
