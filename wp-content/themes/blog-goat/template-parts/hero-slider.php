<?php
$args = [
  'post_type' => 'post',
  'posts_per_page' => 3,
  'post_status' => 'publish'
];
$hero_query = new WP_Query($args);
?>

<?php if ($hero_query->have_posts()) : ?>
<section class="hero_slider_section">
  <div class="hero_slider_wrapper">
    <?php while ($hero_query->have_posts()) : $hero_query->the_post(); 
      $categoria = get_the_category();
      $categoria_nome = $categoria ? $categoria[0]->name : '';
      $data = get_the_date('d \d\e F, Y');
      $img = get_the_post_thumbnail_url(get_the_ID(), 'full');
    ?>
    <div class="hero_slide" style="background-image: url('<?php echo esc_url($img); ?>');">
      <div class="hero_overlay">
        <div class="hero_slide_content wrapper_margin">
          <?php if ($categoria_nome): ?>
            <p class="hero_category"><?php echo esc_html($categoria_nome); ?></p>
          <?php endif; ?>
          <h2 class="hero_title"><?php the_title(); ?></h2>
          <div class="hero_meta">
            <p><i class="fa-solid fa-calendar"></i> <?php echo $data; ?></p>
            <p><i class="fa-solid fa-clock"></i> 20 minutos</p>
          </div>
          <a href="<?php the_permalink(); ?>" class="hero_button">Leia o artigo</a>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
</section>
<?php endif; wp_reset_postdata(); ?>
