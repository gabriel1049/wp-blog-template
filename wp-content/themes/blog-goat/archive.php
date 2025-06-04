<?php 
// Template Name: Arquivo de Posts
?>
<?php get_header(); ?>

<main class="archive_page_container wrapper_margin">
  <section class="archive_content_area">

    <!-- Breadcrumb -->
    <?php include get_template_directory() . '/components/breadcrumb.php'; ?>

    <!-- Título geral -->
    <header class="archive_header">
      <h1 class="archive_title">Todas as Categorias</h1>
    </header>

    <!-- Loop por categorias -->
    <?php
    $categories = get_categories([
      'orderby' => 'name',
      'order'   => 'ASC',
      'hide_empty' => true
    ]);

    foreach ($categories as $category) :
      $cat_query = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 6,
        'cat' => $category->term_id
      ]);

      if ($cat_query->have_posts()) :
    ?>
    <section class="categoria_bloco">
      <h2 class="titulo_categoria"><?php echo esc_html($category->name); ?></h2>

      <div class="archive_posts_grid">
        <?php while ($cat_query->have_posts()) : $cat_query->the_post(); ?>
        <article class="category_post_card">
          <a href="<?php the_permalink(); ?>" class="category_post_link">
            <figure class="category_post_image">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large'); ?>
              <?php else : ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/no-image.jpg" alt="Sem imagem">
              <?php endif; ?>
              <span class="post_category_badge"><?php echo esc_html($category->name); ?></span>
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
        <?php endwhile; ?>
      </div>
    </section>

    <?php
      wp_reset_postdata();
      endif;
    endforeach;
    ?>
  </section>
</main>

<?php get_footer(); ?>

<?php get_footer(); ?>
