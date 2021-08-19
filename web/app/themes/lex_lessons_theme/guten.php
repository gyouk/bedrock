<?php
add_action( 'init', function () {
    $block = new \Will\WordPress\Theme\LexLessonsTheme\Block\GutenTestimonianBlock();

    $block->set_renderer(
        new \Will\WordPress\Theme\LexLessonsTheme\Renderer\GutenTestimonianRender()
    );
    $block->register();
} );