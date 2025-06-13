<?php
if (!defined('ABSPATH')) {
    exit;
}

function css_inject_dynamic_css() {
    $extra_fields = get_option('css_extra_fields', []);
    if (!is_array($extra_fields)) {
        $extra_fields = [];
    }
    ?>
    <style type="text/css">
    :root {
        --header-color: <?php echo esc_attr(get_option('css_header_color')); ?>;
        --footer-color: <?php echo esc_attr(get_option('css_footer_color')); ?>;
        --primary-text-color: <?php echo esc_attr(get_option('css_primary_text_color')); ?>;
        --secondary-text-color: <?php echo esc_attr(get_option('css_secondary_text_color')); ?>;
        --tertiary-text-color: <?php echo esc_attr(get_option('css_tertiary_text_color')); ?>;
        <?php foreach ($extra_fields as $field): ?>
            <?php if ($field['type'] === 'color' && !empty($field['name']) && !empty($field['value'])): ?>
                --<?php echo esc_html($field['name']); ?>: <?php echo esc_attr($field['value']); ?>;
            <?php endif; ?>
        <?php endforeach; ?>
    }
    </style>
    <?php
}
add_action('wp_head', 'css_inject_dynamic_css');
