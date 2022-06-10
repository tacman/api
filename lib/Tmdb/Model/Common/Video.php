<?php

/**
 * This file is part of the Tmdb PHP API created by Michael Roterman.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package Tmdb
 * @author Michael Roterman <michael@wtfz.net>
 * @copyright (c) 2013, Michael Roterman
 * @version 4.0.0
 */

namespace Tmdb\Model\Common;

use Tmdb\Model\AbstractModel;
use Tmdb\Model\Filter\CountryFilter;
use Tmdb\Model\Filter\LanguageFilter;

/**
 * Class Video
 * @package Tmdb\Model\Common
 */
class Video extends AbstractModel implements CountryFilter, LanguageFilter
{
    public static $properties = [
        'id',
        'iso_639_1',
        'iso_3166_1',
        'key',
        'name',
        'site',
        'size',
        'type'
    ];
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $iso6391;
    /**
     * @var string
     */
    private $iso31661;
    /**
     * @var mixed
     */
    private $key;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $site;
    /**
     * @var int
     */
    private $size;
    /**
     * @var string
     */
    private $type;
    /**
     * Holds the format of the url
     *
     * @var string
     */
    private $url_format;

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getIso6391(): string
    {
        return $this->iso6391;
    }

    /**
     * @param string $iso6391
     * @return $this
     */
    public function setIso6391($iso6391): self
    {
        $this->iso6391 = $iso6391;

        return $this;
    }

    public function getIso31661(): string
    {
        return $this->iso31661;
    }

    /**
     * @param string $iso31661
     * @return $this
     */
    public function setIso31661($iso31661): self
    {
        $this->iso31661 = $iso31661;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSite(): string
    {
        return $this->site;
    }

    /**
     * @param string $site
     * @return $this
     */
    public function setSite($site): self
    {
        $this->site = $site;

        return $this;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return $this
     */
    public function setSize($size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Retrieve the url to the source
     */
    public function getUrl(): string
    {
        return sprintf($this->getUrlFormat(), $this->getKey());
    }

    public function getUrlFormat(): string
    {
        return $this->url_format;
    }

    /**
     * @param string $url_format
     * @return $this
     */
    public function setUrlFormat($url_format): self
    {
        $this->url_format = $url_format;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     * @return $this
     */
    public function setKey($key): self
    {
        $this->key = $key;

        return $this;
    }
}
