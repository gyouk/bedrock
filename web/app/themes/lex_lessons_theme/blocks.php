<?php

add_action( 'init', function () {
	$block = new \Will\WordPress\Theme\LexLessonsTheme\Block\ImageAndTextBlock();

	$block->set_renderer(
		new \Will\WordPress\Theme\LexLessonsTheme\Renderer\ImageAndTextRenderer()
	);
	$block->register();
} );