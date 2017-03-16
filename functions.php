<?php

add_filter('wp_title', 'filterTitle');
function filterTitle($title) {
    return $title.' - Twenty Sixteen Child';
}
add_filter('the_content', 'filterTheContent');
function filterTheContent($content) {
    return $content.' - Twenty Sixteen Child';
}