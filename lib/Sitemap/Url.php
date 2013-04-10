<?php

namespace Sitemap;

class Url
{
    private $loc, $lastmod, $priority = 0.5, $changefreq;

    /**
     * @param  string           $loc absolute url
     * @throws SitemapException If $loc is longer than 2048 chars
     */
    public function setLoc($loc)
    {
        if (strlen($loc) > 2048) {
            throw new SitemapException('loc should be 2048 chars long or less');
        }
        $this->loc = $loc;
    }

    public function getLoc()
    {
        return $this->loc;
    }

    /**
     * @param string $lastmod format YYYY-MM-DD
     */
    public function setLastmod($lastmod = null)
    {
        if (null === $lastmod) {
            return;
        }
        $this->lastmod = $lastmod;
    }

    public function getLastmod()
    {
        return $this->lastmod;
    }

    /**
     * @param  float|string     $priority
     * @throws SitemapException If $priority is NOT between 0 and 1
     */
    public function setPriority($priority = null)
    {
        if (null === $priority) {
            return;
        }
        $priority = (float) $priority;
        if (!(0 < $priority && $priority < 1)) {
            throw new SitemapException('Priority value should be between 0 and 1, given : '.$priority);
        }
        $this->priority = $priority;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param  string           $changefreq
     * @throws SitemapException If wrong $changefreq given
     */
    public function setChangefreq($changefreq = null)
    {
        if (null === $changefreq) {
            return;
        }
        $freqs = array(
            'always',
            'hourly',
            'daily',
            'weekly',
            'monthly',
            'yearly',
            'never'
        );
        if (false === array_search($changefreq, $freqs)) {
            throw new SitemapException(sprintf('Wrong changefreq "%s" given; valid values : "%s"', $changefreq, implode(', ', $freqs)));
        }
        $this->changefreq = $changefreq;
    }
    public function getChangefreq()
    {
        return $this->changefreq;
    }
}
