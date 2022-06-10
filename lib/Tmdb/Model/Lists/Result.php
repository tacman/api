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

namespace Tmdb\Model\Lists;

use Tmdb\Model\AbstractModel;

/**
 * Class Result
 * @package Tmdb\Model\Lists
 */
class Result extends AbstractModel
{
    /**
     * @var array
     */
    public static $properties = [
        'status_code',
        'status_message'
    ];
    /**
     * @var int
     */
    private $statusCode;
    /**
     * @var string
     */
    private $statusMessage;

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function getStatusMessage(): string
    {
        return $this->statusMessage;
    }

    /**
     * @param string $statusMessage
     * @return $this
     */
    public function setStatusMessage($statusMessage): self
    {
        $this->statusMessage = $statusMessage;

        return $this;
    }
}
