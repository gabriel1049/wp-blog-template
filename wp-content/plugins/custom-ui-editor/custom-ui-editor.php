<?php
/**
 * Plugin Name: Custom UI Editor ACF Style
 * Description: UI Editor com campos personalizados, variáveis CSS nomeadas e opção de exclusão.
 * Version: 1.4
 * Author: Gabriel Barros - GabiGoat
 */

if (!defined('ABSPATH')) exit;

add_action('admin_menu', function () {
    add_menu_page('UI Editor', 'UI Editor', 'manage_options', 'ui-editor', 'ui_editor_page');
});

function ui_editor_page() {
    $custom_fields = get_option('ui_editor_custom_fields', []);

    // ✅ Exibe mensagem após salvar alterações
    if (isset($_GET['settings-updated']) && $_GET['settings-updated']) {
        echo '<div class="notice notice-success is-dismissible"><p>Alterações salvas com sucesso.</p></div>';
    }
?>
    <div class="wrap">
        <h1>Custom UI Editor</h1>

        <form method="post" action="options.php">
            <?php
            settings_fields('ui_editor_options');
            do_settings_sections('ui_editor');
            submit_button('Salvar alterações');
            ?>
        </form>

        <hr>
        <h2>Adicionar novo campo personalizado</h2>
        <form method="post">
            <input type="text" name="custom_field_key" placeholder="Nome do campo (ex: cor-texto-header)" required />
            <input type="text" name="custom_field_label" placeholder="Rótulo (ex: Cor Texto Header)" required />
            <select name="custom_field_type">
                <option value="text">Texto</option>
                <option value="color">Cor</option>
                <option value="image">Imagem</option>
            </select>
            <input type="submit" name="add_custom_field" class="button button-primary" value="Adicionar Campo" />
        </form>

        <?php if (!empty($custom_fields)): ?>
            <hr>
            <h2>Campos Personalizados Ativos</h2>
            <table class="widefat">
                <thead><tr><th>Campo</th><th>Tipo</th><th>Variável CSS</th><th>Ações</th></tr></thead>
                <tbody>
                <?php foreach ($custom_fields as $key => [$label, $type]): ?>
                    <tr>
                        <td><?php echo esc_html($label); ?> <code>(<?php echo esc_html($key); ?>)</code></td>
                        <td><?php echo esc_html($type); ?></td>
                        <td><code>var(--<?php echo esc_html($key); ?>)</code></td>
                        <td>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="delete_custom_field" value="<?php echo esc_attr($key); ?>">
                                <button type="submit" class="button button-small">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
<?php }

add_action('admin_init', function () {
    $default_fields = [
        'logo-image'        => ['Imagem da Logo', 'image'],
        'header-color'      => ['Cor do Header', 'color'],
        'footer-color'      => ['Cor do Footer', 'color'],
        'primary-color'     => ['Cor Primária', 'color'],
        'secondary-color'   => ['Cor Secundária', 'color'],
    ];

    // Processa exclusão
    if (!empty($_POST['delete_custom_field'])) {
        $key = sanitize_text_field($_POST['delete_custom_field']);
        $custom = get_option('ui_editor_custom_fields', []);
        if (isset($custom[$key])) {
            unset($custom[$key]);
            delete_option($key);
            update_option('ui_editor_custom_fields', $custom);
        }
    }

    // Processa adição
    if (isset($_POST['add_custom_field'])) {
        $key = sanitize_title($_POST['custom_field_key']);
        $label = sanitize_text_field($_POST['custom_field_label']);
        $type = sanitize_text_field($_POST['custom_field_type']);
        $custom_fields = get_option('ui_editor_custom_fields', []);
        $custom_fields[$key] = [$label, $type];
        update_option('ui_editor_custom_fields', $custom_fields);
        wp_redirect(admin_url('admin.php?page=ui-editor&settings-updated=true'));
        exit;
    }

    $custom_fields = get_option('ui_editor_custom_fields', []);
    $all_fields = array_merge($default_fields, $custom_fields);

    foreach ($all_fields as $key => [$label, $type]) {
        register_setting('ui_editor_options', $key);
        add_settings_field(
            $key,
            $label,
            $type === 'color' ? 'ui_editor_color_field' :
            ($type === 'image' ? 'ui_editor_image_field' : 'ui_editor_text_field'),
            'ui_editor',
            'ui_editor_section',
            ['id' => $key]
        );
    }

    add_settings_section('ui_editor_section', '', null, 'ui_editor');
});

function ui_editor_color_field($args) {
    $id = $args['id'];
    $val = get_option($id, '#FF5000');
    echo '<input type="color" name="' . esc_attr($id) . '" value="' . esc_attr($val) . '" />';
}

function ui_editor_text_field($args) {
    $id = $args['id'];
    $val = get_option($id);
    echo '<input type="text" name="' . esc_attr($id) . '" value="' . esc_attr($val) . '" style="width: 60%;" />';
}

function ui_editor_image_field($args) {
    $id = $args['id'];
    $val = get_option($id);
    ?>
    <input type="text" name="<?php echo esc_attr($id); ?>" id="<?php echo esc_attr($id); ?>" value="<?php echo esc_attr($val); ?>" style="width:70%;" />
    <input type="button" class="button upload_image_button" data-target="<?php echo esc_attr($id); ?>" value="Selecionar Imagem" />
    <?php
}

add_action('admin_enqueue_scripts', function ($hook) {
    if ($hook !== 'toplevel_page_ui-editor') return;
    wp_enqueue_media();
    wp_add_inline_script('jquery-core', "
        jQuery(document).ready(function($){
            $('.upload_image_button').click(function(e){
                e.preventDefault();
                var button = $(this);
                var custom_uploader = wp.media({
                    title: 'Selecionar imagem',
                    button: { text: 'Usar esta imagem' },
                    multiple: false
                }).on('select', function () {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    $('#' + button.data('target')).val(attachment.url);
                }).open();
            });
        });
    ");
});

add_action('wp_head', function () {
    $custom_fields = get_option('ui_editor_custom_fields', []);
    $defaults = [
        'logo-image', 'header-color', 'footer-color', 'primary-color', 'secondary-color'
    ];

    $fields = array_merge($defaults, array_keys($custom_fields));

    echo '<style>:root {';
    foreach ($fields as $key) {
        $val = get_option($key);
        if ($val && preg_match('/color|cor|text/i', $key)) {
            echo '--' . esc_attr($key) . ': ' . esc_attr($val) . ';';
        }
    }
    echo '}</style>';
});
