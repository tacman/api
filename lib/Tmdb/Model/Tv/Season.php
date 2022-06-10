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

namespace Tmdb\Model\Tv;

use DateTime;
use Tmdb\Model\AbstractModel;
use Tmdb\Model\Collection\Changes;
use Tmdb\Model\Collection\CreditsCollection;
use Tmdb\Model\Collection\Images;
use Tmdb\Model\Collection\Videos;
use Tmdb\Model\Common\ExternalIds;
use Tmdb\Model\Common\GenericCollection;
use Tmdb\Model\Image\PosterImage;

/**
 * Class Season
 * @package Tmdb\Model\Tv
 */
class Season extends AbstractModel
{
    /**
     * Properties that are available in the API
     *
     * These properties are hydrated by the ObjectHydrator, all the other properties are handled by the factory.
     *
     * @var array
     */
    public static $properties = [
        'air_date',
        'name',
        'overview',
        'id',
        'poster_path',
        'season_number'
    ];
    /**
     * Credits
     *
     * @var CreditsCollection
     */
    protected $credits;
    /**
     * External Ids
     *
     * @var ExternalIds
     */
    protected $externalIds;
    /**
     * Images
     *
     * @var Images
     */
    protected $images;
    /**
     * @var PosterImage
     */
    protected $poster;
    /**
     * @var Videos
     */
    protected $videos;
    /**
     * @var Changes
     */
    protected $changes;
    /**
     * @var DateTime
     */
    private $airDate;
    /**
     * @var GenericCollection|Episode[]
     */
    private $episodes;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $overview;
    /**
     * @var integer
     */
    private $id;
    /**
     * @var string
     */
    private $posterPath;
    /**
     * @var integer
     */
    private $seasonNumber;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->credits = new CreditsCollection();
        $this->externalIds = new ExternalIds();
        $this->images = new Images();
        $this->episodes = new GenericCollection();
        $this->videos = new Videos();
        $this->changes = new Changes();
    }

    public function getAirDate(): \DateTime
    {
        return $this->airDate;
    }

    /**
     * @param DateTime $airDate
     * @return $this
     */
    public function setAirDate($airDate): self
    {
        $this->airDate = new DateTime($airDate);

        return $this;
    }

    /**
     * @return GenericCollection|Episode[]
     */
    public function getEpisodes()
    {
        return $this->episodes;
    }

    /**
     * @param GenericCollection $episodes
     * @return $this
     */
    public function setEpisodes($episodes): self
    {
        $this->episodes = $episodes;

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

    public function getName(): string
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

    public function getOverview(): string
    {
        return $this->overview;
    }

    /**
     * @param string $overview
     * @return $this
     */
    public function setOverview($overview): self
    {
        $this->overview = $overview;

        return $this;
    }

    public function getPosterPath(): string
    {
        return $this->posterPath;
    }

    /**
     * @param string $posterPath
     * @return $this
     */
    public function setPosterPath($posterPath): self
    {
        $this->posterPath = $posterPath;

        return $this;
    }

    public function getSeasonNumber(): int
    {
        return $this->seasonNumber;
    }

    /**
     * @param int $seasonNumber
     * @return $this
     */
    public function setSeasonNumber($seasonNumber): self
    {
        $this->seasonNumber = $seasonNumber;

        return $this;
    }

    public function getCredits(): \Tmdb\Model\Collection\CreditsCollection
    {
        return $this->credits;
    }

    /**
     * @param CreditsCollection $credits
     * @return $this
     */
    public function setCredits($credits): self
    {
        $this->credits = $credits;

        return $this;
    }

    public function getExternalIds(): \Tmdb\Model\Common\ExternalIds
    {
        return $this->externalIds;
    }

    /**
     * @param ExternalIds $externalIds
     * @return $this
     */
    public function setExternalIds($externalIds): self
    {
        $this->externalIds = $externalIds;

        return $this;
    }

    public function getImages(): \Tmdb\Model\Collection\Images
    {
        return $this->images;
    }

    /**
     * @param Images $images
     * @return $this
     */
    public function setImages($images): self
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @param PosterImage $poster
     * @return $this
     */
    public function setPosterImage($poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    public function getPosterImage(): \Tmdb\Model\Image\PosterImage
    {
        return $this->poster;
    }

    public function getVideos(): \Tmdb\Model\Collection\Videos
    {
        return $this->videos;
    }

    /**
     * @param Videos $videos
     * @return $this
     */
    public function setVideos($videos): self
    {
        $this->videos = $videos;

        return $this;
    }

    public function getChanges(): \Tmdb\Model\Collection\Changes
    {
        return $this->changes;
    }

    /**
     * @param Changes $changes
     * @return $this
     */
    public function setChanges($changes): self
    {
        $this->changes = $changes;

        return $this;
    }
}
