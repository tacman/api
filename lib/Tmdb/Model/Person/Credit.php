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

namespace Tmdb\Model\Person;

use DateTime;
use Tmdb\Model\AbstractModel;
use Tmdb\Model\Image\PosterImage;

/**
 * Class MovieCredit
 * @package Tmdb\Model\Person
 */
class Credit extends AbstractModel
{
    public static $properties = array(
        'adult',
        'character',
        'credit_id',
        'id',
        'original_title',
        'poster_path',
        'release_date',
        'title',
        'job',
        'department',
        'original_name',
        'name',
        'media_type',
        'episode_count',
        'first_air_date'
    );
    /**
     * @var bool
     */
    private $adult;
    /**
     * @var string
     */
    private $character;
    /**
     * @var string
     */
    private $creditId;
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $originalTitle;
    /**
     * @var string
     */
    private $posterPath;
    /**
     * @var DateTime
     */
    private $releaseDate;
    /**
     * @var string
     */
    private $title;
    /**
     * @var PosterImage
     */
    private $posterImage;
    /**
     * @var string
     */
    private $job;
    /**
     * @var string
     */
    private $department;
    /**
     * @var string
     */
    private $mediaType;
    /**
     * @var string
     */
    private $originalName;
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $episodeCount;
    /**
     * @var mixed
     */
    private $firstAirDate;

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
        $this->adult = $adult;

        return $this;
    }

    public function getCharacter(): string
    {
        return $this->character;
    }

    /**
     * @param string $character
     * @return $this
     */
    public function setCharacter($character): self
    {
        $this->character = $character;

        return $this;
    }

    public function getCreditId(): string
    {
        return $this->creditId;
    }

    /**
     * @param string $creditId
     * @return $this
     */
    public function setCreditId($creditId): self
    {
        $this->creditId = $creditId;

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

    public function getOriginalTitle(): string
    {
        return $this->originalTitle;
    }

    /**
     * @param string $originalTitle
     * @return $this
     */
    public function setOriginalTitle($originalTitle): self
    {
        $this->originalTitle = $originalTitle;

        return $this;
    }

    public function getPosterImage(): \Tmdb\Model\Image\PosterImage
    {
        return $this->posterImage;
    }

    /**
     * @param PosterImage $posterImage
     * @return $this
     */
    public function setPosterImage($posterImage): self
    {
        $this->posterImage = $posterImage;

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

    public function getReleaseDate(): \DateTime
    {
        return $this->releaseDate;
    }

    /**
     * @param DateTime|string|null $releaseDate
     * @return $this
     */
    public function setReleaseDate($releaseDate = null): self
    {
        if (!$releaseDate instanceof DateTime && $releaseDate !== null) {
            $releaseDate = new DateTime($releaseDate);
        }

        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getJob(): string
    {
        return $this->job;
    }

    /**
     * @param string $job
     * @return $this
     */
    public function setJob($job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @param string $department
     * @return $this
     */
    public function setDepartment($department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    /**
     * @param string $originalName
     * @return $this
     */
    public function setOriginalName($originalName): self
    {
        $this->originalName = $originalName;

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

    public function getMediaType(): string
    {
        return $this->mediaType;
    }

    /**
     * @param string $mediaType
     * @return $this
     */
    public function setMediaType($mediaType): self
    {
        $this->mediaType = $mediaType;

        return $this;
    }

    public function getEpisodeCount(): int
    {
        return $this->episodeCount;
    }

    /**
     * @param int $episodeCount
     * @return $this
     */
    public function setEpisodeCount($episodeCount): self
    {
        $this->episodeCount = $episodeCount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstAirDate()
    {
        return $this->firstAirDate;
    }

    /**
     * @param mixed $firstAirDate
     * @return $this
     */
    public function setFirstAirDate($firstAirDate): self
    {
        $this->firstAirDate = $firstAirDate;

        return $this;
    }
}
