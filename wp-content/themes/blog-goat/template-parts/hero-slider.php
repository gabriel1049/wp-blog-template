<?php
$args = [
    'post_type'      => 'post',
    'posts_per_page' => 6,
    'post_status'    => 'publish'
];

$query = new WP_Query($args);

$posts_data = [];

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        $categoria = get_the_category();
        $categoria_nome = !empty($categoria) ? $categoria[0]->name : '';
        $imagem = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $link = get_permalink();
        $excerpt = wp_trim_words(get_the_excerpt(), 20, '...');

        $posts_data[] = [
            'categoria' => $categoria_nome,
            'titulo'    => get_the_title(),
            'excerpt'   => $excerpt,
            'link'      => $link,
            'imagem'    => $imagem
        ];
    endwhile;
    wp_reset_postdata();
endif;
?>

<section class="banner-hero-slider" data-posts='<?php echo json_encode($posts_data); ?>' data-total="<?php echo count($posts_data); ?>">
    <div class="content-banner-text wrapper_margin">
        <p class="banner-categoria"><?php echo esc_html($posts_data[0]['categoria']); ?></p>
        <h2 class="banner-titulo"><?php echo esc_html($posts_data[0]['titulo']); ?></h2>
        <p class="banner-excerpt"><?php echo esc_html($posts_data[0]['excerpt']); ?></p>
        <a href="<?php echo esc_url($posts_data[0]['link']); ?>" class="banner-link">
            Acessar conteúdo
        </a>
    </div>

    <div class="banner-img-content" style="background-image: url('<?php echo esc_url($posts_data[0]['imagem']); ?>');">
        <div class="btn-option-slide wrapper_margin">
            <div class="arrow-prox-slide">
                <i class="fa-solid fa-arrow-left" id="prev-slide"></i>
                <p id="slide-counter">1/<?php echo count($posts_data); ?></p>
                <i class="fa-solid fa-arrow-right" id="next-slide"></i>
            </div>

            <div class="btn-stop-play-slide" id="play-pause">
                <p>Reproduzir</p>
                <i class="fa-solid fa-circle-play"></i>
            </div>
        </div>
    </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const banner = document.querySelector('.banner-hero-slider');
    const posts = JSON.parse(banner.getAttribute('data-posts'));
    const total = posts.length;

    const categoriaEl = document.querySelector('.banner-categoria');
    const tituloEl = document.querySelector('.banner-titulo');
    const excerptEl = document.querySelector('.banner-excerpt');
    const linkEl = document.querySelector('.content-banner-text a');
    const imgContent = document.querySelector('.banner-img-content');
    const counterEl = document.querySelector('.arrow-prox-slide p');

    const prevButton = document.querySelector('.arrow-prox-slide .fa-arrow-left');
    const nextButton = document.querySelector('.arrow-prox-slide .fa-arrow-right');
    const playPauseButton = document.querySelector('.btn-stop-play-slide');

    let currentIndex = 0;
    let autoPlay = true;
    let interval = setInterval(nextSlide, 5000); // 10s

    function updateBanner(index) {
        const contentBanner = document.querySelector('.content-banner-text');
        contentBanner.classList.add('fade-out');

        setTimeout(() => {
            categoriaEl.textContent = posts[index].categoria;
            tituloEl.textContent = posts[index].titulo;
            excerptEl.textContent = posts[index].excerpt;
            linkEl.href = posts[index].link;
            imgContent.style.backgroundImage = `url('${posts[index].imagem}')`;
            counterEl.textContent = `${index + 1}/${total}`;

            contentBanner.classList.remove('fade-out');
        }, 300);
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % total;
        updateBanner(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + total) % total;
        updateBanner(currentIndex);
    }

    prevButton.addEventListener('click', () => {
        prevSlide();
        resetInterval();
    });

    nextButton.addEventListener('click', () => {
        nextSlide();
        resetInterval();
    });

    playPauseButton.addEventListener('click', () => {
        autoPlay = !autoPlay;

        if (autoPlay) {
            playPauseButton.querySelector('p').textContent = 'Pausar';
            playPauseButton.querySelector('i').className = 'fa-solid fa-circle-pause';
            interval = setInterval(nextSlide, 10000);
        } else {
            playPauseButton.querySelector('p').textContent = 'Reproduzir';
            playPauseButton.querySelector('i').className = 'fa-solid fa-circle-play';
            clearInterval(interval);
        }
    });

    function resetInterval() {
        clearInterval(interval);
        if (autoPlay) {
            interval = setInterval(nextSlide, 10000);
        }
    }

    updateBanner(currentIndex);
});

</script>