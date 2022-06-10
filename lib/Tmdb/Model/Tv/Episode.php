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
use Tmdb\Model\Collection\ResultCollection;
use Tmdb\Model\Collection\Videos;
use Tmdb\Model\Common\ExternalIds;
use Tmdb\Model\Common\GenericCollection;
use Tmdb\Model\Image\PosterImage;
use Tmdb\Model\Image\StillImage;

/**
 * Class Episode
 * @package Tmdb\Model\Tv
 */
class Episode extends AbstractModel
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
        'episode_number',
        'name',
        'overview',
        'id',
        'production_code',
        'season_number',
        'still_path',
        'vote_average',
        'vote_count'
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
     * @var GenericCollection
     */
    protected $translations;
    /**
     * @var StillImage
     */
    protected $still;
    /**
     * @var Videos
     */
    protected $videos;

    /**
     * @var \DateTime|null
     */
    private $airDate;

    /**
     * @var Changes
     */
    protected $changes;

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
    private $productionCode;

    /**
     * @var string
     */
    private $stillPath;

    /**
     * @var integer
     */
    private $seasonNumber;

    /**
     * @var integer
     */
    private $episodeNumber;

    /**
     * @var float
     */
    private $voteAverage;

    /**
     * @var integer
     */
    private $voteCount;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->credits = new CreditsCollection();
        $this->externalIds = new ExternalIds();
        $this->images = new Images();
        $this->translations = new GenericCollection();
        $this->videos = new Videos();
        $this->changes = new Changes();
    }

    public function getAirDate(): ?\DateTime
    {
        return $this->airDate;
    }

    /**
     * @param DateTime|string|null $airDate
     * @return $this
     */
    public function setAirDate($airDate = null): self
    {
        if (!$airDate instanceof DateTime && $airDate !== null) {
            $airDate = new DateTime($airDate);
        }

        $this->airDate = $airDate;

        return $this;
    }

    public function getEpisodeNumber(): int
    {
        return $this->episodeNumber;
    }

    /**
     * @param int $episodeNumber
     * @return $this
     */
    public function setEpisodeNumber($episodeNumber): self
    {
        $this->episodeNumber = (int)$episodeNumber;

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

    public function getProductionCode(): string
    {
        return $this->productionCode;
    }

    /**
     * @param string $productionCode
     * @return $this
     */
    public function setProductionCode($productionCode): self
    {
        $this->productionCode = $productionCode;

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
        $this->seasonNumber = (int)$seasonNumber;

        return $this;
    }

    public function getStillPath(): string
    {
        return $this->stillPath;
    }

    /**
     * @param string $stillPath
     * @return $this
     */
    public function setStillPath($stillPath): self
    {
        $this->stillPath = $stillPath;

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
        $this->voteAverage = (float)$voteAverage;

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
        $this->voteCount = (int)$voteCount;

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

    public function getTranslations(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->translations;
    }

    /**
     * @param GenericCollection $translations
     * @return $this
     */
    public function setTranslations($translations): self
    {
        $this->translations = $translations;

        return $this;
    }

    /**
     * @param StillImage $still
     * @return $this
     */
    public function setStillImage($still): self
    {
        $this->still = $still;

        return $this;
    }

    public function getStillImage(): \Tmdb\Model\Image\StillImage
    {
        return $this->still;
    }

    public function getVideos(): \Tmdb\Model\Collection\Videos
    {
        return $this->videos;
    }

    /**
     * @param Videos|ResultCollection $videos
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
