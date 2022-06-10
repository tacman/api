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

namespace Tmdb\Model\Common\Trailer;

use Tmdb\Model\Common\AbstractTrailer;

/**
 * Class Youtube
 * @package Tmdb\Model\Common\Trailer
 */
class Youtube extends AbstractTrailer
{
    public const URL = 'http://www.youtube.com/watch?v=%s';
    public static $properties = [
        'name',
        'size',
        'source',
        'type'
    ];
    private $name;
    private $size;
    private $source;
    private $type;

    /**
     * Retrieve the url to the source
     */
    public function getUrl(): string
    {
        return sprintf(self::URL, $this->source);
    }

    public function getName(): ?string
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

    public function getSize(): ?string
    {
        return $this->size;
    }

    /**
     * @param string $size
     * @return $this
     */
    public function setSize($size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * @param string $source
     * @return $this
     */
    public function setSource($source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getType(): ?string
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
}
