<?php

namespace Will\WordPress\Theme\LexLessonsTheme\Renderer;

use Geniem\ACF\Interfaces\Renderer;

class GutenTestimonianRender implements Renderer
{
    /**
     * @param array $data
     * @return string
     */
    public function render(array $data): string
    {
        return print_r($data, true);
    }
}