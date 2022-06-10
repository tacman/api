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

use DateTime;
use Tmdb\Model\AbstractModel;
use Tmdb\Model\Image\BackdropImage;
use Tmdb\Model\Image\PosterImage;

/**
 * Class ListItem
 * @package Tmdb\Model\Lists
 */
class ListItem extends AbstractModel
{
    /**
     * @var array
     */
    public static $properties = [
        'backdrop_path',
        'id',
        'original_title',
        'release_date',
        'poster_path',
        'title',
        'vote_average',
        'vote_count'
    ];
    /**
     * @var string
     */
    private $backdropPath;
    /**
     * @var BackdropImage
     */
    private $backdropImage;
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $originalTitle;
    /**
     * @var DateTime
     */
    private $releaseDate;
    /**
     * @var string
     */
    private $posterPath;
    /**
     * @var PosterImage
     */
    private $posterImage;
    /**
     * @var string
     */
    private $title;
    /**
     * @var float
     */
    private $voteAverage;
    /**
     * @var int
     */
    private $voteCount;

    public function getBackdropImage(): \Tmdb\Model\Image\BackdropImage
    {
        return $this->backdropImage;
    }

    /**
     * @param BackdropImage $backdropImage
     * @return $this
     */
    public function setBackdropImage($backdropImage): self
    {
        $this->backdropImage = $backdropImage;

        return $this;
    }

    public function getBackdropPath(): string
    {
        return $this->backdropPath;
    }

    /**
     * @param string $backdropPath
     * @return $this
     */
    public function setBackdropPath($backdropPath): self
    {
        $this->backdropPath = $backdropPath;

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
     * @param DateTime $releaseDate
     * @return $this
     */
    public function setReleaseDate($releaseDate): self
    {
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

    public function getVoteAverage(): float
    {
        return $this->voteAverage;
    }

    /**
     * @param float $voteAverage
     * @return $this
     */
    public function setVoteAverage($voteAverage): self
    {
        $this->voteAverage = $voteAverage;

        return $this;
    }

    public function getVoteCount(): int
    {
        return $this->voteCount;
    }

    /**
     * @param int $voteCount
     * @return $this
     */
    public function setVoteCount($voteCount): self
    {
        $this->voteCount = $voteCount;

        return $this;
    }
}
