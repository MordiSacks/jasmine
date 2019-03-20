<?php

/**
 * @param $path
 * @param $mix
 *
 * @return \Illuminate\Support\HtmlString|string
 * @throws Exception
 */
function jMix($path, $mix)
{
    return asset(mix($path, 'jasmine/' . $mix));
}