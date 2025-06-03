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
            <!-- Cada post é um article -->
            <article class="post">
                <figure class="img_post">
                    <span class="categoria">Destination</span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/post2.png" alt="Imagem da postagem 1">
                </figure>
                <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h3>
                <div class="tempo_post">
                    <time datetime="2025-05-26"><i class="fa-solid fa-calendar"></i> 26 de maio, 2025</time>
                    <span><i class="fa-solid fa-clock"></i> 20 minutos</span>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit optio...</p>
            </article>

            <!-- Repetição dos outros posts -->
            <article class="post">
                <figure class="img_post">
                    <span class="categoria">Destination</span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/post1.png" alt="Imagem da postagem 2">
                </figure>
                <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h3>
                <div class="tempo_post">
                    <time datetime="2025-05-26"><i class="fa-solid fa-calendar"></i> 26 de maio, 2025</time>
                    <span><i class="fa-solid fa-clock"></i> 20 minutos</span>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit optio...</p>
            </article>

            <article class="post">
                <figure class="img_post">
                    <span class="categoria">Destination</span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/post1.png" alt="Imagem da postagem 3">
                </figure>
                <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h3>
                <div class="tempo_post">
                    <time datetime="2025-05-26"><i class="fa-solid fa-calendar"></i> 26 de maio, 2025</time>
                    <span><i class="fa-solid fa-clock"></i> 20 minutos</span>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit optio...</p>
            </article>

            <article class="post">
                <figure class="img_post">
                    <span class="categoria">Destination</span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/post2.png" alt="Imagem da postagem 4">
                </figure>
                <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h3>
                <div class="tempo_post">
                    <time datetime="2025-05-26"><i class="fa-solid fa-calendar"></i> 26 de maio, 2025</time>
                    <span><i class="fa-solid fa-clock"></i> 20 minutos</span>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit optio...</p>
            </article>

            <article class="post">
                <figure class="img_post">
                    <span class="categoria">Destination</span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/post2.png" alt="Imagem da postagem 4">
                </figure>
                <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h3>
                <div class="tempo_post">
                    <time datetime="2025-05-26"><i class="fa-solid fa-calendar"></i> 26 de maio, 2025</time>
                    <span><i class="fa-solid fa-clock"></i> 20 minutos</span>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit optio...</p>
            </article>

            <article class="post">
                <figure class="img_post">
                    <span class="categoria">Destination</span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/post2.png" alt="Imagem da postagem 4">
                </figure>
                <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h3>
                <div class="tempo_post">
                    <time datetime="2025-05-26"><i class="fa-solid fa-calendar"></i> 26 de maio, 2025</time>
                    <span><i class="fa-solid fa-clock"></i> 20 minutos</span>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit optio...</p>
            </article>
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