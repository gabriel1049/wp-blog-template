<?php 
// Template Name: Home Page
?>

<?php get_header(); ?>

<!-- Hero/banner introdutório -->
<section class="hero_banner wrapper_padding" role="banner">
    <div class="hero_banner_text">
        <p class="title_hero_post">Categoria do Post</p>
        <h1>Título do artigo do blog da GOAT</h1>
        <div class="info_text_banner">
            <p><i class="fa-solid fa-calendar"></i> 26 de maio, 2025</p>
            <p><i class="fa-solid fa-clock"></i> 20 minutos</p>
        </div>
    </div>
</section>

<!-- Destaques com cards principais -->
<section class="main_container_homepage wrapper_margin">
    <section class="sessao_principais_post" aria-label="Postagens em destaque">

        <article class="card_unico_post_section_hero_principal">
            <div class="info_card_principais_post">
                <h3 class="titulo_post_card">A Comprehensive Checklist For Running</h3>
                <time datetime="2024-08-27" class="data_post">
                    <i class="fa-regular fa-calendar"></i> 27 AUGUST, 2024
                </time>
            </div>

            <figure class="img_card_section_hero_principal">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/post1.png" alt="Imagem do post">
            </figure>
        </article>

        <article class="card_unico_post_section_hero_principal">
            <div class="info_card_principais_post">
                <h3 class="titulo_post_card">A Comprehensive Checklist For Running</h3>
                <time datetime="2024-08-27" class="data_post">
                    <i class="fa-regular fa-calendar"></i> 27 AUGUST, 2024
                </time>
            </div>

            <figure class="img_card_section_hero_principal">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/frame-banner.png" alt="Imagem do post">
            </figure>
        </article>

        <article class="card_unico_post_section_hero_principal">
            <div class="info_card_principais_post">
                <h3 class="titulo_post_card">A Comprehensive Checklist For Running</h3>
                <time datetime="2024-08-27" class="data_post">
                    <i class="fa-regular fa-calendar"></i> 27 AUGUST, 2024
                </time>
            </div>

            <figure class="img_card_section_hero_principal">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/post2.png" alt="Imagem do post">
            </figure>
        </article>


    </section>

    <section class="banner_servico1" aria-label="Banner promocional">
        <figure>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/banner_servico1.png" alt="Banner com serviço 1">
        </figure>
    </section>
</section>

<!-- Conteúdo principal do blog -->
<main class="container_hero wrapper_margin">
    <section class="container_posts" aria-labelledby="titulo-ultimas-postagens">
        <div class="ultimos_posts_container">
            <h2 id="titulo-ultimas-postagens">Últimas Postagens</h2>
            <a href="#" class="ver-todos">VER TODOS <i class="fa-regular fa-share-from-square"></i></a>
        </div>

        <section class="ultimos_posts">
    <?php
    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC'
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()):
        while ($query->have_posts()): $query->the_post();
            $categoria = get_the_category();
            $categoria_nome = !empty($categoria) ? $categoria[0]->name : '';
            $data_formatada = get_the_date('d \d\e F, Y');
            $imagem = get_the_post_thumbnail_url(get_the_ID(), 'medium');
    ?>
        <article class="post">
            <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                <figure class="img_post">
                    <?php if ($categoria_nome): ?>
                        <span class="categoria"><?php echo esc_html($categoria_nome); ?></span>
                    <?php endif; ?>
                    <img src="<?php echo esc_url($imagem); ?>" alt="<?php the_title_attribute(); ?>">
                </figure>

                <h3 class="titulo-resumido">
  <?php echo esc_html( mb_strimwidth( get_the_title(), 0, 30, '...' ) ); ?>
</h3>


                <div class="tempo_post">
                    <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                        <i class="fa-solid fa-calendar"></i> <?php echo esc_html($data_formatada); ?>
                    </time>
                    <span><i class="fa-solid fa-clock"></i> 20 minutos</span>
                </div>

                <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
            </a>
        </article>
    <?php
        endwhile;
        wp_reset_postdata();
    else:
        echo '<p>Nenhuma postagem encontrada.</p>';
    endif;
    ?>
</section>


    </section>

    <?php
    include "components/aside.php";
    ?>

</main>

<section class="banner_servico1 wrapper_margin" aria-label="Banner promocional">
    <figure>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/banner_servico1.png" alt="Banner com serviço 1">
    </figure>
</section>

<section class="carousel-wrapper wrapper_margin">
        <div class="carousel-fade left"></div> <!-- NOVO -->
        <div class="carousel-fade right"></div> <!-- Já existia -->
        <div class="carousel-container" id="carousel-container"></div>
</section>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/produtos.js"></script>

<?php get_footer(); ?>