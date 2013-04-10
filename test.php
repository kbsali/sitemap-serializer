<?php

require_once __DIR__.'/vendor/autoload.php';

use Sitemap\Sitemap;

$s = new Sitemap;
$s->addItem('http://blablabla.com');
$s->addItem('http://blablabla.com/123', '0.2');
$s->addItem('http://blablabla.com/234', .5, '2013-03-12');
$s->addItem('http://blablabla.com/345', .7, date('Y-m-d'), 'always');
die($s);