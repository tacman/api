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

use Tmdb\Exception\NotImplementedException;
use Tmdb\HttpClient\HttpClient;
use Tmdb\Model\Credits as Credits;
use Tmdb\Model\Genre;
use Tmdb\Model\Person;

/**
 * Class CreditsFactory
 * @package Tmdb\Factory
 */
class CreditsFactory extends AbstractFactory
{
    /**
     * @var TvSeasonFactory
     */
    private $tvSeasonFactory;

    /**
     * @var TvEpisodeFactory
     */
    private $tvEpisodeFactory;

    /**
     * @var PeopleFactory
     */
    private $peopleFactory;

    /**
     * Constructor
     *
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->tvSeasonFactory = new TvSeasonFactory($httpClient);
        $this->tvEpisodeFactory = new TvEpisodeFactory($httpClient);
        $this->peopleFactory = new PeopleFactory($httpClient);

        parent::__construct($httpClient);
    }

    /**
     * @param array $data
     *
     * @return Credits
     */
    public function create(array $data = []): ?Credits
    {
        $credits = new Credits();

        if (array_key_exists('media', $data)) {
            $credits->setMedia(
                $this->hydrate($credits->getMedia(), $data['media'])
            );

            if (array_key_exists('seasons', $data['media'])) {
                $episodes = $this->getTvSeasonFactory()->createCollection($data['media']['seasons']);
                $credits->getMedia()->setSeasons($episodes);
            }

            if (array_key_exists('episodes', $data['media'])) {
                $episodes = $this->getTvEpisodeFactory()->createCollection($data['media']['episodes']);
                $credits->getMedia()->setEpisodes($episodes);
            }
        }

        if (array_key_exists('person', $data)) {
            $person = $this->getPeopleFactory()->create($data['person']);

            if ($person instanceof Person) {
                $credits->setPerson($person);
            }
        }

        return $this->hydrate($credits, $data);
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

    /**
     * @throws NotImplementedException
     */
    public function createCollection(array $data = []): ?Credits
    {
        throw new NotImplementedException(
            'Credits are usually obtained through the PeopleFactory,
            however we might add a shortcut for that here.'
        );
    }
}
