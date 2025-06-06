<?php 
// Template Name: Parceiros
?>
<?php get_header(); ?>

<main class="category_page_container wrapper_margin">
  <section class="category_content_area">

    <!-- Breadcrumb -->
    <?php include get_template_directory() . '/components/breadcrumb.php'; ?>

    <!-- Título e descrição da categoria -->
    <header class="category_header">
      <h1 class="category_title">Parceiros Oficiais</h1>
      <p class="category_description">Conheça os parceiros que caminham com a nossa marca.</p>
    </header>

    <!-- Lista de posts da categoria 'parceiros' -->
    <section class="category_posts_grid">
      <?php
      $args = [
        'post_type'      => 'post',
        'posts_per_page' => 12,
        'category_name'  => 'parceiros', // slug da categoria
        'post_status'    => 'publish',
      ];

      $query = new WP_Query($args);

      if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
      ?>
        <article class="category_post_card">
          <a href="<?php the_permalink(); ?>" class="category_post_link">
            <figure class="category_post_image">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large'); ?>
              <?php else : ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/no-image.jpg" alt="Sem imagem">
              <?php endif; ?>

              <?php
              $cat = get_the_category();
              if ($cat) {
                echo '<span class="post_category_badge">' . esc_html($cat[0]->name) . '</span>';
              }
              ?>
            </figure>

            <div class="category_post_content">
              <h3><?php the_title(); ?></h3>
              <div class="tempo_post">
                <time datetime="<?php the_time('Y-m-d'); ?>">
                  <i class="fa-solid fa-calendar"></i> <?php the_time('d \d\e F, Y'); ?>
                </time>
                <span><i class="fa-solid fa-clock"></i> <?php echo estimated_reading_time(get_the_content()); ?></span>
              </div>
              <p><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></p>
            </div>
          </a>
        </article>
      <?php
        endwhile;
        wp_reset_postdata();
      else :
        echo '<p>Nenhum post encontrado nesta categoria.</p>';
      endif;
      ?>
    </section>

  </section>
</main>

<?php get_footer(); ?>
