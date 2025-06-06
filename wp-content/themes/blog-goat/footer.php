<footer class="footer-elegante">
  <div class="footer-content wrapper_padding">

    <!-- Coluna ESQUERDA -->
    <div class="footer-col footer-left">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="Logo" class="footer-logo" />

      <p class="footer-description">
        Conectando marcas ao digital com performance, estratégia e criatividade.
        Transformamos resultados com SEO, conteúdo e mídia inteligente.
      </p>

      <div class="footer-social">
        <a href="#" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
      </div>
    </div>

    <!-- Coluna DIREITA -->
    <div class="footer-col footer-right">
      <h4 class="footer-title">Categorias do Blog</h4>
      <ul class="footer-categories">
        <!-- Coluna DIREITA -->
          <?php
          wp_nav_menu([
            'theme_location' => 'footer_menu',
            'menu_class'     => 'footer-categories', // reutiliza sua classe atual
            'container'      => false,
          ]);
          ?>

      </ul>

      <a href="https://sualojaoficial.com.br" target="_blank" class="btn-loja-footer">Acessar Loja Oficial</a>
    </div>

  </div>

  <div class="footer-bottom">
    <p>&copy; <?php echo date('Y'); ?> GOAT Digital. Todos os direitos reservados.</p>
  </div>
</footer>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/nav.js"></script>

<!-- Footer WORDPRESS -->
<?php wp_footer(); ?>
<!-- Footer WORDPRESS -->
</body>

</html>