<?php

/* This program is free software. It comes without any warranty, to
 * the extent permitted by applicable law. You can redistribute it
 * and/or modify it under the terms of the Do What The Fuck You Want
 * To Public License, Version 2, as published by Sam Hocevar. See
 * http://www.wtfpl.net/ for more details. */

require_once dirname(__DIR__).'/vendor/autoload.php';

define('CACHE_DATAS', dirname(__DIR__).'/app/cache/datas.php');

function generateCache()
{
    $files = glob(dirname(__DIR__).'/app/datas/*.md');

    $checklist = [];
    $parsedown = new Parsedown();

    foreach ($files as $filename) {
        $content = explode("\n", file_get_contents($filename));
        $tags = explode(',', array_shift($content));
        $title = array_shift($content);
        $checklist[] = [
            'filename' => $filename,
            'position' => (int) preg_replace('#.*\/([0-9]+)-.*#', '$1', $filename),
            'tags' => $tags,
            'title' => $title,
            'content' => $parsedown->text(implode("\n", $content)),
        ];
    }

    file_put_contents(CACHE_DATAS, '<?php $datas = '.var_export($checklist, true).';');
}

if (file_exists(CACHE_DATAS) === false) {
    generateCache();
}

include CACHE_DATAS;

$all_dirty_tags = array_column($datas, 'tags');
$all_tags = [];
foreach ($all_dirty_tags as $tags) {
    $all_tags = array_merge($all_tags, $tags);
}
$all_tags = array_unique($all_tags);

include dirname(__DIR__).'/app/template/layout.html';
