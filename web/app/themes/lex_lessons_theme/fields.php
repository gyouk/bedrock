<?php
namespace Geniem\ACF;

$field_group =new Group('Block Guten');

$field_group->set_position('acf_after_title')
            ->hide_element('the_content');

$rule_group = new RuleGroup();
$rule_group->add_rule('block', '==', 'acf\gutenberg');

$field_group->add_rule_group( $rule_group);




$block = new \Geniem\ACF\Block('Gutenber block', 'Gutenber_block');
$block->set_category('common');
$block->add_post_type('post');
$block->set_mode('edit');

$render = new \Geniem\ACF\Renderer\CallableRenderer( function ( $data ) {
    return print_r( $data, true );
});

$block->set_renderer( $render );
$block->register();