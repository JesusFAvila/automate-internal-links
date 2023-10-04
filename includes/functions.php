<?php

function ail_automate_internal_links($content) {
    $keywords_options = get_option('ail_keywords_options', []);
    $current_url = get_permalink();

    foreach ($keywords_options as $option) {
        $keyword = isset($option['keyword']) ? $option['keyword'] : '';
        $url = isset($option['url']) ? $option['url'] : '';

        if (empty($keyword) || empty($url) || $url == $current_url) {
            continue;
        }

        $pattern = '/\b' . preg_quote($keyword, '/') . '\b(?!([^<]+)?>|[^<]*<\/a>)/';
        $link = '<a href="' . esc_url($url) . '" title="' . esc_attr($keyword) . '">' . esc_html($keyword) . '</a>';
        $content = preg_replace($pattern, $link, $content, 1);
    }

    return $content;
}

// Aplica la función al contenido de las entradas y páginas de WordPress.
add_filter('the_content', 'ail_automate_internal_links');

// Si WooCommerce está activo:
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    // Aplica la función a las descripciones cortas de los productos.
    add_filter('woocommerce_short_description', 'ail_automate_internal_links');
    // Aplica la función a las descripciones de categorías de productos.
    add_filter('term_description', 'ail_automate_internal_links');
}
