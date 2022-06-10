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

namespace Tmdb\Model\Common\Change;

use DateTime;
use Tmdb\Model\AbstractModel;

/**
 * Class Item
 * @package Tmdb\Model\Common\Change
 */
class Item extends AbstractModel
{
    public static $properties = [
        'id',
        'action',
        'time',
        'value'
    ];
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $action;
    /**
     * @var DateTime
     */
    private $time;
    /**
     * @var array
     */
    private $value;

    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     * @return $this
     */
    public function setAction($action): self
    {
        $this->action = $action;

        return $this;
    }

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

    public function getTime(): \DateTime
    {
        return $this->time;
    }

    /**
     * @param string|DateTime|null $time
     * @return $this
     */
    public function setTime($time = null): self
    {
        if (!$time instanceof DateTime && $time !== null) {
            $time = new DateTime($time);
        }

        $this->time = $time;

        return $this;
    }

    public function getValue(): array
    {
        return $this->value;
    }

    /**
     * @param array $value
     * @return $this
     */
    public function setValue($value): self
    {
        $this->value = $value;

        return $this;
    }
}
