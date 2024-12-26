<?php
function get_dynamic_tags():array
{
    $tags=get_field('dynamic_tag');
    return [
        $tags,
    ];
}
