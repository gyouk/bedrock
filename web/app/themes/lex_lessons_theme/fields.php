<?php

use Geniem\ACF\Field\Color;
use Geniem\ACF\Field\Textarea;
use Geniem\ACF\Field\Text;
use Geniem\ACF\Field\Image;
use Geniem\ACF\Field\Accordion;
use Geniem\ACF\Block;
use Geniem\ACF\Renderer\CallableRenderer;

add_action( 'init', function() {
    $guten_field = new Textarea('guten');
    $autor_field = new Text('autor');
    $role_field = new Text('role');
    $image_field = new Image('role');
    $background_color_field = new Color('background_color');
    $text_color_field = new Color('text_color');


    $colors_acc = new Accordion('Colors');
    $colors_acc->set_placement('left')
        ->add_field($background_color_field)
        ->add_field($text_color_field);


    $gutenber_block = new Block('Gutenbers block', 'gutenber-block');
    $gutenber_block->set_category('common');
    $gutenber_block->add_post_type('page');
    $gutenber_block->set_mode('edit');
    $gutenber_block->add_field($guten_field)
        ->add_field($autor_field)
        ->add_field($role_field)
        ->add_field($image_field)
        ->add_field($colors_acc);

    $render = new CallableRenderer( function ( $data ) {
        return print_r( $data, true );
    });

    $gutenber_block->set_renderer( $render );
    $gutenber_block->register();
} );

