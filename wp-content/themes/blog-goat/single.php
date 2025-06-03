<?php get_header(); ?>

<main class="post_page_container wrapper_margin">
  <section class="post_content_area">

    <!-- Breadcrumb modularizada -->
    <?php include get_template_directory() . '/components/breadcrumb.php'; ?>

    <!-- Conteúdo principal do post -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php get_template_part('template-parts/content', 'single'); ?>
    <?php endwhile; endif; ?>
    
  </section>

  <!-- Coluna lateral (aside) -->
  <aside class="post_sidebar">
    <?php include get_template_directory() . '/components/aside.php'; ?>
  </aside>
</main>

<?php get_footer(); ?>
