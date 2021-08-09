<?php
/**
 * gutenberg Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$title = get_field( 'title' );
$photo = get_field( 'photo' );
$description = get_field( 'description' );

