<?php
if (!defined('ABSPATH')) {
    exit;
}

// Registra as opções
function css_register_settings() {
    register_setting('css_options_group', 'css_logo_image', 'esc_url_raw');
    register_setting('css_options_group', 'css_footer_logo_image', 'esc_url_raw');
    register_setting('css_options_group', 'css_header_color', 'sanitize_hex_color');
    register_setting('css_options_group', 'css_footer_color', 'sanitize_hex_color');
    register_setting('css_options_group', 'css_primary_text_color', 'sanitize_hex_color');
    register_setting('css_options_group', 'css_secondary_text_color', 'sanitize_hex_color');
    register_setting('css_options_group', 'css_tertiary_text_color', 'sanitize_hex_color');
    register_setting('css_options_group', 'css_banner_servico_1', 'esc_url_raw');
    register_setting('css_options_group', 'css_banner_servico_2', 'esc_url_raw');
    register_setting('css_options_group', 'css_banner_servico_aside', 'esc_url_raw');
}
add_action('admin_init', 'css_register_settings');

// Adiciona item de menu
function css_add_admin_menu() {
    add_menu_page(
        'Custom Site Style',
        'Custom Site Style',
        'manage_options',
        'custom-site-style',
        'css_render_admin_page',
        'dashicons-admin-customizer',
        81
    );
}
add_action('admin_menu', 'css_add_admin_menu');

// Enfileira o color picker e media uploader no admin
function css_admin_enqueue_scripts($hook_suffix) {
    if ($hook_suffix === 'toplevel_page_custom-site-style') {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'css_admin_enqueue_scripts');

// Renderiza a página admin
function css_render_admin_page() {
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1>Editar arquivos do blog GOAT</h1>
        <?php if (isset($_GET['settings-updated']) && $_GET['settings-updated']): ?>
            <div id="message" class="updated notice is-dismissible">
                <p>Configurações salvas com sucesso!</p>
            </div>
        <?php endif; ?>

        <form method="post" action="options.php">
            <?php settings_fields('css_options_group'); ?>
            <?php do_settings_sections('css_options_group'); ?>

            <h2>Imagens</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Imagem do Logo</th>
                    <td>
                        <input type="url" id="css_logo_image" name="css_logo_image" value="<?php echo esc_url(get_option('css_logo_image')); ?>" class="regular-text image-url-input" />
                        <button type="button" class="button select-image-button" data-target="#css_logo_image">Selecionar Imagem</button>
                        <p>Use no seu tema:</p>
<pre><code>&lt;img src="&lt;?php echo esc_url( get_option( 'css_logo_image' ) ); ?&gt;" alt=""&gt;</code></pre>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Imagem do Logo do Footer</th>
                    <td>
                        <input type="url" id="css_footer_logo_image" name="css_footer_logo_image" value="<?php echo esc_url(get_option('css_footer_logo_image')); ?>" class="regular-text image-url-input" />
                        <button type="button" class="button select-image-button" data-target="#css_footer_logo_image">Selecionar Imagem</button>
                        <p>Use no seu tema:</p>
<pre><code>&lt;img src="&lt;?php echo esc_url( get_option( 'css_footer_logo_image' ) ); ?&gt;" alt=""&gt;</code></pre>
                    </td>
                </tr>
            </table>

            <h2>Banners de Serviço</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Banner Serviço 1</th>
                    <td>
                        <input type="url" id="css_banner_servico_1" name="css_banner_servico_1" value="<?php echo esc_url(get_option('css_banner_servico_1')); ?>" class="regular-text image-url-input" />
                        <button type="button" class="button select-image-button" data-target="#css_banner_servico_1">Selecionar Imagem</button>
                        <p>Use no seu tema:</p>
<pre><code>&lt;img src="&lt;?php echo esc_url( get_option( 'css_banner_servico_1' ) ); ?&gt;" alt=""&gt;</code></pre>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Banner Serviço 2</th>
                    <td>
                        <input type="url" id="css_banner_servico_2" name="css_banner_servico_2" value="<?php echo esc_url(get_option('css_banner_servico_2')); ?>" class="regular-text image-url-input" />
                        <button type="button" class="button select-image-button" data-target="#css_banner_servico_2">Selecionar Imagem</button>
                        <p>Use no seu tema:</p>
<pre><code>&lt;img src="&lt;?php echo esc_url( get_option( 'css_banner_servico_2' ) ); ?&gt;" alt=""&gt;</code></pre>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Banner Serviço Aside</th>
                    <td>
                        <input type="url" id="css_banner_servico_aside" name="css_banner_servico_aside" value="<?php echo esc_url(get_option('css_banner_servico_aside')); ?>" class="regular-text image-url-input" />
                        <button type="button" class="button select-image-button" data-target="#css_banner_servico_aside">Selecionar Imagem</button>
                        <p>Use no seu tema:</p>
<pre><code>&lt;img src="&lt;?php echo esc_url( get_option( 'css_banner_servico_aside' ) ); ?&gt;" alt=""&gt;</code></pre>
                    </td>
                </tr>
            </table>

            <h2>Cores</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Cor do Header</th>
                    <td>
                        <input type="text" name="css_header_color" value="<?php echo esc_attr(get_option('css_header_color')); ?>" class="color-picker" data-default-color="#ffffff" />
                        <p>Use no seu CSS:</p>
<pre><code>var(--header-color)</code></pre>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Cor do Footer</th>
                    <td>
                        <input type="text" name="css_footer_color" value="<?php echo esc_attr(get_option('css_footer_color')); ?>" class="color-picker" data-default-color="#ffffff" />
                        <p>Use no seu CSS:</p>
<pre><code>var(--footer-color)</code></pre>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Cor Principal dos Textos</th>
                    <td>
                        <input type="text" name="css_primary_text_color" value="<?php echo esc_attr(get_option('css_primary_text_color')); ?>" class="color-picker" data-default-color="#000000" />
                        <p>Use no seu CSS:</p>
<pre><code>var(--primary-text-color)</code></pre>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Cor Secundária dos Textos</th>
                    <td>
                        <input type="text" name="css_secondary_text_color" value="<?php echo esc_attr(get_option('css_secondary_text_color')); ?>" class="color-picker" data-default-color="#000000" />
                        <p>Use no seu CSS:</p>
<pre><code>var(--secondary-text-color)</code></pre>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Terceira Cor dos Textos</th>
                    <td>
                        <input type="text" name="css_tertiary_text_color" value="<?php echo esc_attr(get_option('css_tertiary_text_color')); ?>" class="color-picker" data-default-color="#000000" />
                        <p>Use no seu CSS:</p>
<pre><code>var(--tertiary-text-color)</code></pre>
                    </td>
                </tr>
            </table>

            <?php submit_button('Salvar Alterações'); ?>

            <?php wp_nonce_field('css_extra_fields_nonce_action', 'css_extra_fields_nonce_field'); ?>
        </form>
    </div>

    <script>
    jQuery(document).ready(function($){
        $('.color-picker').wpColorPicker();

        // Botão selecionar imagem
        $(document).on('click', '.select-image-button', function(e){
            e.preventDefault();
            var $button = $(this);
            var targetSelector = $button.data('target');
            var $input = $(targetSelector);
            var mediaUploader = wp.media({
                title: 'Selecionar Imagem',
                button: {
                    text: 'Usar esta imagem'
                },
                multiple: false
            });
            mediaUploader.on('select', function(){
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $input.val(attachment.url);
            });
            mediaUploader.open();
        });
    });
    </script>
<?php
} // fecha a função css_render_admin_page
