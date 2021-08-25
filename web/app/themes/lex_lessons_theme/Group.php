<?php

use Geniem\ACF\RuleGroup;

add_action('init', function () {
    $field = new \Will\WordPress\Theme\LexLessonsTheme\Groups\PrimerGroup();


    $rule_group = new RuleGroup();
    $rule_group->add_rule('post_type' , '==' , 'post_primer');

    $field->add_rule_group($rule_group);
    $field->register();
//    dump($field);
});
