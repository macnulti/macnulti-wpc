<?php

function mdc_header_top() {
    if (!is_home() && !is_page()) {
        if (is_search()) {
            $text = 'Resultados para: ' . get_search_query();
        } else {
            $text = is_single() ? get_the_title() : preg_replace('/^.*(?=\:): (.*)$/', '$1', get_the_archive_title());
        }
        printf('<div class="current-location">%1$s</div>', $text);
    }
}
add_action( 'et_header_top', 'mdc_header_top' );