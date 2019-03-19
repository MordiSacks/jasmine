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
    return mix($path, 'jasmine/' . $mix);
}