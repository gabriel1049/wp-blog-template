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
      <h1 class="archive_title">Todos os Posts</h1>
    </header>

    <!-- Grade de posts -->
    <div class="archive_posts_grid">
      <?php
      $all_posts = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => -1, // Sem limite
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC'
      ]);

      if ($all_posts->have_posts()) :
        while ($all_posts->have_posts()) : $all_posts->the_post();
      ?>
      <article class="category_post_card">
        <a href="<?php the_permalink(); ?>" class="category_post_link">
          <figure class="category_post_image">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('large'); ?>
            <?php else : ?>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/no-image.jpg" alt="Sem imagem">
            <?php endif; ?>
            <span class="post_category_badge">
              <?php
              $cats = get_the_category();
              if (!empty($cats)) echo esc_html($cats[0]->name);
              ?>
            </span>
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
        echo '<p>Nenhum post encontrado.</p>';
      endif;
      ?>
    </div>
    
  </section>
</main>

<?php get_footer(); ?>
