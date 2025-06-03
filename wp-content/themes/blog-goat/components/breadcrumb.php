<?php
// components/breadcrumb.php
?>

<nav class="breadcrumb" aria-label="breadcrumb">
  <ul itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a href="<?php echo home_url(); ?>" itemprop="item">
        <span itemprop="name">Início</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <?php
    $position = 2;

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
    } elseif (is_category()) {
      echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span itemprop="name">' . single_cat_title('', false) . '</span>
              <meta itemprop="position" content="' . $position++ . '" />
            </li>';
    } elseif (is_page() && !is_front_page()) {
      $ancestors = array_reverse(get_post_ancestors(get_the_ID()));
      foreach ($ancestors as $ancestor_id) {
        echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="' . get_permalink($ancestor_id) . '" itemprop="item">
                  <span itemprop="name">' . get_the_title($ancestor_id) . '</span>
                </a>
                <meta itemprop="position" content="' . $position++ . '" />
              </li>';
      }
      echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span itemprop="name">' . get_the_title() . '</span>
              <meta itemprop="position" content="' . $position++ . '" />
            </li>';
    } elseif (is_search()) {
      echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span itemprop="name">Resultados de busca</span>
              <meta itemprop="position" content="' . $position++ . '" />
            </li>';
    } elseif (is_404()) {
      echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span itemprop="name">Erro 404</span>
              <meta itemprop="position" content="' . $position++ . '" />
            </li>';
    }
    ?>
  </ul>
</nav>
