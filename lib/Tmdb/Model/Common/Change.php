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

/**
 * Class Change
 * @package Tmdb\Model\Common
 */
class Change extends AbstractModel
{
    public static $properties = [
        'key',
    ];
    /**
     * @var string
     */
    private $key;
    /**
     * @var GenericCollection
     */
    private $items;

    public function __construct()
    {
        $this->items = new GenericCollection();
    }

    public function getItems(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->items;
    }

    /**
     * @param GenericCollection $items
     * @return $this
     */
    public function setItems($items): self
    {
        $this->items = $items;

        return $this;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return $this
     */
    public function setKey($key): self
    {
        $this->key = $key;

        return $this;
    }
}
