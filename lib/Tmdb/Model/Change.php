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

namespace Tmdb\Model;

/**
 * Class Change
 * @package Tmdb\Model
 */
class Change extends AbstractModel
{
    /**
     * @var array
     */
    public static $properties = [
        'id',
        'adult'
    ];
    /**
     * @var integer
     */
    private $id;
    /**
     * @var boolean
     */
    private $adult;

    public function getAdult(): bool
    {
        return $this->adult;
    }

    /**
     * @param boolean $adult
     * @return $this
     */
    public function setAdult($adult): self
    {
        $this->adult = (bool)$adult;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id): self
    {
        $this->id = (int)$id;

        return $this;
    }
}
