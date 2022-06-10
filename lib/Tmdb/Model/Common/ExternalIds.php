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
 * Class ExternalIds
 * @package Tmdb\Model\Common
 */
class ExternalIds extends AbstractModel
{
    public static $properties = [
        'imdb_id',
        'freebase_id',
        'freebase_mid',
        'id',
        'tvdb_id',
        'tvrage_id',
    ];
    private $imdbId;
    private $freebaseId;
    private $freebaseMid;
    private $id;
    private $tvdbId;
    private $tvrageId;

    /**
     * @return mixed
     */
    public function getFreebaseId()
    {
        return $this->freebaseId;
    }

    /**
     * @param mixed $freebaseId
     * @return $this
     */
    public function setFreebaseId($freebaseId): self
    {
        $this->freebaseId = $freebaseId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFreebaseMid()
    {
        return $this->freebaseMid;
    }

    /**
     * @param mixed $freebaseMid
     * @return $this
     */
    public function setFreebaseMid($freebaseMid): self
    {
        $this->freebaseMid = $freebaseMid;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id): self
    {
        $this->id = (int)$id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImdbId()
    {
        return $this->imdbId;
    }

    /**
     * @param mixed $imdbId
     * @return $this
     */
    public function setImdbId($imdbId): self
    {
        $this->imdbId = $imdbId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTvdbId()
    {
        return $this->tvdbId;
    }

    /**
     * @param mixed $tvdbId
     * @return $this
     */
    public function setTvdbId($tvdbId): self
    {
        $this->tvdbId = $tvdbId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTvrageId()
    {
        return $this->tvrageId;
    }

    /**
     * @param mixed $tvrageId
     * @return $this
     */
    public function setTvrageId($tvrageId): self
    {
        $this->tvrageId = $tvrageId;

        return $this;
    }
}
