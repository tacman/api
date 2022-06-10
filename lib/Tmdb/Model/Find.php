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

use Tmdb\Model\Collection\People;
use Tmdb\Model\Common\GenericCollection;

/**
 * Class Find
 * @package Tmdb\Model
 */
class Find extends AbstractModel
{
    /**
     * @var GenericCollection
     */
    private $movieResults;

    /**
     * @var People
     */
    private $personResults;

    /**
     * @var GenericCollection
     */
    private $tvResults;

    /**
     * @var GenericCollection
     */
    private $tvSeasonResults;

    /**
     * @var GenericCollection
     */
    private $tvEpisodeResults;

    public function getMovieResults(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->movieResults;
    }

    /**
     * @param GenericCollection $movieResults
     * @return $this
     */
    public function setMovieResults($movieResults): self
    {
        $this->movieResults = $movieResults;

        return $this;
    }

    public function getPersonResults(): \Tmdb\Model\Collection\People
    {
        return $this->personResults;
    }

    /**
     * @param People $personResults
     * @return $this
     */
    public function setPersonResults($personResults): self
    {
        $this->personResults = $personResults;

        return $this;
    }

    public function getTvResults(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->tvResults;
    }

    /**
     * @param GenericCollection $tvResults
     * @return $this
     */
    public function setTvResults($tvResults): self
    {
        $this->tvResults = $tvResults;

        return $this;
    }

    public function getTvSeasonResults(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->tvSeasonResults;
    }

    /**
     * @param GenericCollection $tvSeasonResults
     * @return $this
     */
    public function setTvSeasonResults($tvSeasonResults): self
    {
        $this->tvSeasonResults = $tvSeasonResults;

        return $this;
    }

    public function getTvEpisodeResults(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->tvEpisodeResults;
    }

    /**
     * @param GenericCollection $tvEpisodeResults
     * @return $this
     */
    public function setTvEpisodeResults($tvEpisodeResults): self
    {
        $this->tvEpisodeResults = $tvEpisodeResults;

        return $this;
    }
}
