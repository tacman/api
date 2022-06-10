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

namespace Tmdb\Factory;

use RuntimeException;
use Tmdb\HttpClient\HttpClient;
use Tmdb\Model\Find;

/**
 * Class FindFactory
 * @package Tmdb\Factory
 */
class FindFactory extends AbstractFactory
{
    /**
     * @var MovieFactory
     */
    private $movieFactory;

    /**
     * @var PeopleFactory
     */
    private $peopleFactory;

    /**
     * @var TvFactory
     */
    private $tvFactory;

    /**
     * @var TvSeasonFactory
     */
    private $tvSeasonFactory;

    /**
     * @var TvEpisodeFactory
     */
    private $tvEpisodeFactory;

    /**
     * Constructor
     *
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->movieFactory = new MovieFactory($httpClient);
        $this->peopleFactory = new PeopleFactory($httpClient);
        $this->tvFactory = new TvFactory($httpClient);
        $this->tvSeasonFactory = new TvSeasonFactory($httpClient);
        $this->tvEpisodeFactory = new TvEpisodeFactory($httpClient);

        parent::__construct($httpClient);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data = []): ?Find
    {
        $find = new Find();

        if (array_key_exists('movie_results', $data)) {
            $find->setMovieResults($this->getMovieFactory()->createCollection($data['movie_results']));
        }

        if (array_key_exists('person_results', $data)) {
            $find->setPersonResults($this->getPeopleFactory()->createCollection($data['person_results']));
        }

        if (array_key_exists('tv_results', $data)) {
            $find->setTvResults($this->getTvFactory()->createCollection($data['tv_results']));
        }

        if (array_key_exists('tv_season_results', $data)) {
            $find->setTvSeasonResults($this->getTvSeasonFactory()->createCollection($data['tv_season_results']));
        }

        if (array_key_exists('tv_episode_results', $data)) {
            $find->setTvEpisodeResults($this->getTvEpisodeFactory()->createCollection($data['tv_episode_results']));
        }

        return $find;
    }

    public function getMovieFactory(): \Tmdb\Factory\MovieFactory
    {
        return $this->movieFactory;
    }

    /**
     * @param MovieFactory $movieFactory
     * @return $this
     */
    public function setMovieFactory($movieFactory): self
    {
        $this->movieFactory = $movieFactory;

        return $this;
    }

    public function getPeopleFactory(): \Tmdb\Factory\PeopleFactory
    {
        return $this->peopleFactory;
    }

    /**
     * @param PeopleFactory $peopleFactory
     * @return $this
     */
    public function setPeopleFactory($peopleFactory): self
    {
        $this->peopleFactory = $peopleFactory;

        return $this;
    }

    public function getTvFactory(): \Tmdb\Factory\TvFactory
    {
        return $this->tvFactory;
    }

    /**
     * @param TvFactory $tvFactory
     * @return $this
     */
    public function setTvFactory($tvFactory): self
    {
        $this->tvFactory = $tvFactory;

        return $this;
    }

    public function getTvSeasonFactory(): \Tmdb\Factory\TvSeasonFactory
    {
        return $this->tvSeasonFactory;
    }

    /**
     * @param TvSeasonFactory $tvSeasonFactory
     * @return $this
     */
    public function setTvSeasonFactory($tvSeasonFactory): self
    {
        $this->tvSeasonFactory = $tvSeasonFactory;

        return $this;
    }

    public function getTvEpisodeFactory(): \Tmdb\Factory\TvEpisodeFactory
    {
        return $this->tvEpisodeFactory;
    }

    /**
     * @param TvEpisodeFactory $tvEpisodeFactory
     * @return $this
     */
    public function setTvEpisodeFactory($tvEpisodeFactory): self
    {
        $this->tvEpisodeFactory = $tvEpisodeFactory;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function createCollection(array $data = []): ?Find
    {
        throw new RuntimeException(sprintf(
            'Class "%s" does not support method "%s".',
            __CLASS__,
            __METHOD__
        ));
    }
}
