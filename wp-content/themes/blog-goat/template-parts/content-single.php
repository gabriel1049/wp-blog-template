<article class="single_post_article" itemscope itemtype="https://schema.org/Article">
  <h1 itemprop="headline"><?php the_title(); ?></h1>

  <?php if (has_post_thumbnail()) : ?>
    <figure class="post_thumbnail" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
      <img 
        src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" 
        alt="<?php the_title_attribute(); ?>" 
        itemprop="url"
      >
      <meta itemprop="width" content="1200">
      <meta itemprop="height" content="628">
    </figure>
  <?php endif; ?>

  <div class="post_text" itemprop="articleBody">
    <?php the_content(); ?>
  </div>
</article>
