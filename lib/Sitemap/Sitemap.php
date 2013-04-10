<?php

namespace Sitemap;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class Sitemap
{
    private $urls = array();

    /**
     * Adds a URL object to the array of urls
     * @param string $loc
     * @param string $priority
     * @param string $lastmod
     * @param string $changefreq
     */
    public function addItem($loc, $priority = null, $lastmod = null, $changefreq = null)
    {
        $u = new Url();
        $u->setLoc($loc);
        $u->setPriority($priority);
        $u->setLastmod($lastmod);
        $u->setChangefreq($changefreq);
        $this->urls[] = $u;
    }

    /**
     * returns the xml sitemap
     * @return string sitemap in xml format
     */
    public function __toString()
    {
        // Missing attribute xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" in urlset node
        $encoders    = array(new XmlEncoder('urlset'));
        // anyway to use setIgnoredAttributes() dynamicly on each Url object?
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer  = new Serializer($normalizers, $encoders);

        return (string) $serializer->serialize(array('url' => $this->urls), 'xml');
    }
}
