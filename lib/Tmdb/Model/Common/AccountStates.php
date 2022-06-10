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
 * Class AccountStates
 * @package Tmdb\Model\Common
 */
class AccountStates extends AbstractModel
{
    public static $properties = [
        'id',
        'favorite',
        'watchlist',
    ];
    /**
     * @var integer
     */
    private $id;
    /**
     * @var boolean
     */
    private $favorite;
    /**
     * @var Rating|boolean
     */
    private $rated;
    /**
     * @var boolean
     */
    private $watchlist;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rated = new Rating();
    }

    public function getFavorite(): bool
    {
        return $this->favorite;
    }

    /**
     * @param boolean $favorite
     * @return $this
     */
    public function setFavorite($favorite): self
    {
        $this->favorite = $favorite;

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
        $this->id = $id;

        return $this;
    }

    /**
     * @return Rating|bool
     */
    public function getRated()
    {
        return $this->rated;
    }

    /**
     * @param Rating|bool $rated
     * @return $this
     */
    public function setRated($rated): self
    {
        $this->rated = $rated;

        return $this;
    }

    public function getWatchlist(): bool
    {
        return $this->watchlist;
    }

    /**
     * @param boolean $watchlist
     * @return $this
     */
    public function setWatchlist($watchlist): self
    {
        $this->watchlist = $watchlist;

        return $this;
    }
}
