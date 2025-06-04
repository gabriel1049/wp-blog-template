<!-- Coluna lateral com formulário de contato/newsletter -->
<aside class="column_info_hero" aria-label="Formulário de contato">
    <form class="form-container">
        <h2>Contato Com A <span class="highlight">LOJA</span></h2>
        <p>Get All The Top Stories From<br>Blogs To Keep Track.</p>
        <input type="email" placeholder="Enter your e-mail" required>
        <button type="submit" class="subscribe">SUBSCRIBE NOW</button>
        <label class="checkbox-container">
            <input type="checkbox" required>
            <span class="checkmark"></span>
            I agree to the terms & conditions
        </label>
    </form>

    <section class="container_card_aside_home">
  <h3 class="h3_principais_postagens">Principais Postagens</h3>

  <?php
  $args = [
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
  ];
  $aside_query = new WP_Query($args);

  if ($aside_query->have_posts()):
    while ($aside_query->have_posts()): $aside_query->the_post();
  ?>
  
  <div class="card_post_aside">
    <div class="text_content_post_aside">
      <span>
        <?php
        $categories = get_the_category();
        if (!empty($categories)) {
          echo esc_html($categories[0]->name);
        } else {
          echo 'Sem categoria';
        }
        ?>
      </span>
      
      <h3>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h3>

      <p>
        <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
      </p>

      <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="data_post">
        <i class="fa-regular fa-calendar"></i> <?php echo get_the_date('d \d\e F, Y'); ?>
      </time>
    </div>
  </div>

  <?php
    endwhile;
    wp_reset_postdata();
  else:
  ?>
    <p>Sem postagens recentes no momento.</p>
  <?php endif; ?>
</section>


    <div class="div-servico-banner-aside">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/banner-servico23.png" alt="">
    </div>
</aside>