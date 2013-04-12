Simple PHP Sitemap Serializer
=============================

A simple PHP5 library to generate Sitemaps base on [Symfony2 Serializer Component](http://symfony.com/doc/current/components/serializer.html).
The original idea comes from [Exemple d'utilisation du composant serializer de Symfony2: création d'un sitemap](http://www.mon-code.net/article/64/exemple-dutilisation-du-composant-serializer-de-symfony2-creation-dun-sitemap) by [metalmumu](https://github.com/metalmumu).

## Usage

### Add dependency to your project

```
php composer.phar require kbsali/sitemap-serializer
```

### Sample usage

```php
<?php

require_once __DIR__.'/vendor/autoload.php';

use Sitemap\Sitemap;

$s = new Sitemap;
$s->addItem('http://example.com');
$s->addItem('http://example.com/123', '0.2');
$s->addItem('http://example.com/234', .5, '2013-03-12');
$s->addItem('http://example.com/345', .7, date('Y-m-d'), 'always');
die($s);
```

## TODO :

* Ignore empty elements ( see `Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer::setIgnoredAttributes()` )
* Add missing attribute `xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"` in urlset root node (see `Symfony\Component\Serializer\Encoder\XmlEncoder::__construct()`)
* Add an optional to output *formatted XML* (http://php.net/manual/en/domdocument.savexml.php -> `$doc->formatOutput = true;`)