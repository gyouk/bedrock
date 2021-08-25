<?php

namespace Will\WordPress\Theme\LexLessonsTheme\Groups;

use Geniem\ACF\Field\Tab;
use Geniem\ACF\Group;
use Geniem\ACF\Field\Textarea;
use Geniem\ACF\Field\Text;
use Geniem\ACF\Field\Image;
use Geniem\ACF\Field\Color;

class PrimerGroup extends Group
{
    public function __construct(string $title = 'группа для примерчика', string $key = 'FieldsPrimers')
    {
        parent::__construct($title, $key);

        $guten_field = new Textarea('guten','guten','guten');
        $autor_field = new Text('autor','autor','autor');
        $role_field = new Text('role','role','role');
        $image_field = new Image('image', 'image', 'image');
        $background_color_field = new Color('background_color','background_color','background_color');
        $text_color_field = new Color('text_color','text_color','text_color');
        $tab_text = new Tab('text','text','text');
        $tab_text->add_fields(
            array(
                $guten_field,
                $autor_field,
                $role_field,
            )
        );
        $tab_img = new Tab('Image ore picture');
        $tab_img->add_fields(
            array(
                $image_field,
            )
        );
        $tab_color_picker = new Tab('Set color for text and background');
        $tab_color_picker->add_fields(
            array(
                $background_color_field,
                $text_color_field
            )
        );

        $this->add_fields(
            array(
                $tab_text,
                $tab_img,
                $tab_color_picker
            )
        );
    }
}
