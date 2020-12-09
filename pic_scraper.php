<?php

$data = file_get_contents('https://www.pornpics.com/recent/');

preg_match('/<img[^>]*src=[\'"]([^\'"]+)[\'"][^>]*>/i', $data, $matches);
$img = $matches[1];

echo $img;
?>