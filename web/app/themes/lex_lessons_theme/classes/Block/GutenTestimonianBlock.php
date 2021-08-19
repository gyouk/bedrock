<?php

namespace Will\WordPress\Theme\LexLessonsTheme\Block;

use Geniem\ACF\Block;
use Geniem\ACF\Field\Textarea;
use Geniem\ACF\Field\Text;
use Geniem\ACF\Field\Image;
use Geniem\ACF\Field\Accordion;
use Geniem\ACF\Field\Color;


class GutenTestimonianBlock extends Block
{
    /**
     * @param string $title
     * @param string $name
     * @throws \Geniem\ACF\Exception
     */
    public function __construct( string $title = 'title', string $name='name' ) {
        parent::__construct($title, $name);

        $guten = new Textarea('Title', 'Titles', 'Titles');
        $autor = new Text('Autor', 'Autors', 'Autors');
        $roles = new Text('Role', 'Roles', 'Roles');
        $image = new Image('roles');
        $background_color = new Color('background_colors');
        $text_color = new Color('text_colors');


        $this->add_fields(
            array(
                $guten,
                $autor,
                $roles,
                $image,
                $background_color,
                $text_color
            )
        );
    }
 }