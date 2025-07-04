<aside class="column_info_hero" aria-label="Informações da lateral">

  <!-- Card de redirecionamento para loja -->
  <div class="card_loja_oficial">
    <h2>Contato com a <span class="highlight">GOAT BLOG</span></h2>
    <p>Acesse a loja oficial para tirar dúvidas ou comprar produtos diretamente.</p>
    <a href="https://sualojaoficial.com.br" target="_blank" class="btn_loja">Ir para a Loja Oficial</a>
  </div>

  <!-- Postagens recentes -->
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
          echo !empty($categories) ? esc_html($categories[0]->name) : 'Sem categoria';
          ?>
        </span>

        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>

        <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="data_post">
          <i class="fa-regular fa-calendar"></i> <?php echo get_the_date('d \d\e F, Y'); ?>
        </time>
      </div>
    </div>

    <?php endwhile; wp_reset_postdata(); else: ?>
      <p>Sem postagens recentes no momento.</p>
    <?php endif; ?>
  </section>

  <!-- Redes sociais -->
  <div class="social_links_aside">
    <a href="https://www.instagram.com/seuperfil" target="_blank" aria-label="Instagram">
      <i class="fa-brands fa-instagram"></i>
    </a>
    <a href="https://www.facebook.com/seuperfil" target="_blank" aria-label="Facebook">
      <i class="fa-brands fa-facebook-f"></i>
    </a>
  </div>

  <!-- Banner -->
  <!-- <div class="div-servico-banner-aside">
    <img src="<?php echo esc_url( get_option( 'css_banner_servico_aside' ) ); ?>" alt="">
  </div> -->

</aside>
