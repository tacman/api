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

use DateTime;
use Tmdb\Model\Collection\CreditsCollection;
use Tmdb\Model\Collection\Genres;
use Tmdb\Model\Collection\Images;
use Tmdb\Model\Collection\Videos;
use Tmdb\Model\Common\ExternalIds;
use Tmdb\Model\Common\GenericCollection;
use Tmdb\Model\Common\SpokenLanguage;
use Tmdb\Model\Image\BackdropImage;
use Tmdb\Model\Image\PosterImage;
use Tmdb\Model\Tv\Episode;

/**
 * Class Tv
 * @package Tmdb\Model
 */
class Tv extends AbstractModel
{
    /**
     * Properties that are available in the API
     *
     * These properties are hydrated by the ObjectHydrator, all the other properties are handled by the factory.
     *
     * @var array
     */
    public static $properties = [
        'backdrop_path',
        'episode_run_time',
        'first_air_date',
        'homepage',
        'id',
        'in_production',
        'last_air_date',
        'name',
        'number_of_episodes',
        'number_of_seasons',
        'original_name',
        'original_language',
        'overview',
        'popularity',
        'poster_path',
        'status',
        'vote_average',
        'vote_count',
        'type',
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
     * @var BackdropImage
     */
    protected $backdrop;
    /**
     * @var PosterImage
     */
    protected $poster;
    /**
     * @var Videos
     */
    protected $videos;
    /**
     * @var GenericCollection
     */
    protected $changes;
    /**
     * @var GenericCollection
     */
    protected $keywords;
    /**
     * @var GenericCollection
     */
    protected $similar;
    /**
     * @var GenericCollection
     */
    protected $recommendations;
    /**
     * @var GenericCollection
     */
    protected $productionCompanies;
    /**
     * Alternative titles
     *
     * @var GenericCollection
     */
    protected $alternativeTitles;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string
     */
    private $backdropPath;
    /**
     * @var GenericCollection
     */
    private $createdBy = null;
    /**
     * @var GenericCollection
     */
    private $contentRatings;
    /**
     * @var array
     */
    private $episodeRunTime;
    /**
     * @var DateTime
     */
    private $firstAirDate;
    /**
     * Genres
     *
     * @var Genres
     */
    private $genres;
    /**
     * @var string
     */
    private $homepage;
    /**
     * @var int
     */
    private $id;
    /**
     * @var boolean
     */
    private $inProduction;
    /**
     * @var GenericCollection|SpokenLanguage[]
     */
    private $languages;
    /**
     * @var DateTime
     */
    private $lastAirDate;
    /**
     * @var string
     */
    private $name;
    /**
     * @var GenericCollection|Network[]
     */
    private $networks;
    /**
     * @var integer
     */
    private $numberOfEpisodes;
    /**
     * @var integer
     */
    private $numberOfSeasons;
    /**
     * @var Episode
     */
    private $lastEpisodeToAir;
    /**
     * @var Episode
     */
    private $nextEpisodeToAir;
    /**
     * @var string
     */
    private $originalName;
    /**
     * @var string
     */
    private $originalLanguage;
    /**
     * @var GenericCollection
     */
    private $originCountry;
    /**
     * @var string
     */
    private $overview;
    /**
     * @var float
     */
    private $popularity;
    /**
     * @var string
     */
    private $posterPath;
    /**
     * @var GenericCollection
     */
    private $seasons;
    /**
     * @var string
     */
    private $status;
    /**
     * @var float
     */
    private $voteAverage;
    /**
     * @var int
     */
    private $voteCount;
    /**
     * @var GenericCollection
     */
    private $watchProviders;

    /**
     * Constructor
     *
     * Set all default collections
     */
    public function __construct()
    {
        $this->genres = new Genres();
        $this->networks = new GenericCollection();
        $this->originCountry = new GenericCollection();
        $this->seasons = new GenericCollection();
        $this->credits = new CreditsCollection();
        $this->externalIds = new ExternalIds();
        $this->images = new Images();
        $this->translations = new GenericCollection();
        $this->videos = new Videos();
        $this->changes = new GenericCollection();
        $this->keywords = new GenericCollection();
        $this->similar = new GenericCollection();
        $this->recommendations = new GenericCollection();
        $this->contentRatings = new GenericCollection();
        $this->alternativeTitles = new GenericCollection();
        $this->languages = new GenericCollection();
        $this->watchProviders = new GenericCollection();
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

    public function getContentRatings(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->contentRatings;
    }

    /**
     * @param GenericCollection $contentRatings
     * @return $this
     */
    public function setContentRatings($contentRatings): self
    {
        $this->contentRatings = $contentRatings;

        return $this;
    }

    public function getCreatedBy(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->createdBy;
    }

    /**
     * @param GenericCollection $createdBy
     * @return $this
     */
    public function setCreatedBy($createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getEpisodeRunTime(): array
    {
        return $this->episodeRunTime;
    }

    /**
     * @param array $episodeRunTime
     * @return $this
     */
    public function setEpisodeRunTime($episodeRunTime): self
    {
        $this->episodeRunTime = $episodeRunTime;

        return $this;
    }

    public function getFirstAirDate(): \DateTime
    {
        return $this->firstAirDate;
    }

    /**
     * @param DateTime|string|null $firstAirDate
     * @return $this
     */
    public function setFirstAirDate($firstAirDate = null): self
    {
        if (!$firstAirDate instanceof DateTime && $firstAirDate !== null) {
            $firstAirDate = new DateTime($firstAirDate);
        }

        $this->firstAirDate = $firstAirDate;

        return $this;
    }

    public function getGenres(): \Tmdb\Model\Collection\Genres
    {
        return $this->genres;
    }

    /**
     * @param Genres $genres
     * @return $this
     */
    public function setGenres($genres): self
    {
        $this->genres = $genres;

        return $this;
    }

    public function getHomepage(): string
    {
        return $this->homepage;
    }

    /**
     * @param string $homepage
     * @return $this
     */
    public function setHomepage($homepage): self
    {
        $this->homepage = $homepage;

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

    public function getInProduction(): bool
    {
        return $this->inProduction;
    }

    /**
     * @param boolean $inProduction
     * @return $this
     */
    public function setInProduction($inProduction): self
    {
        $this->inProduction = $inProduction;

        return $this;
    }

    /**
     * @return GenericCollection
     */
    public function getLanguages(): GenericCollection
    {
        return $this->languages;
    }

    /**
     * @param GenericCollection $languages
     * @return $this
     */
    public function setLanguages($languages): self
    {
        $this->languages = $languages;

        return $this;
    }

    public function getLastAirDate(): \DateTime
    {
        return $this->lastAirDate;
    }

    /**
     * @param DateTime|string|null $lastAirDate
     * @return $this
     */
    public function setLastAirDate($lastAirDate = null): self
    {
        if (!$lastAirDate instanceof DateTime && $lastAirDate !== null) {
            $lastAirDate = new DateTime($lastAirDate);
        }

        $this->lastAirDate = $lastAirDate;

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

    /**
     * @return GenericCollection|Network[]
     *
     * @psalm-return GenericCollection|array<array-key, Network>
     */
    public function getNetworks()
    {
        return $this->networks;
    }

    /**
     * @param GenericCollection $networks
     * @return $this
     */
    public function setNetworks($networks): self
    {
        $this->networks = $networks;

        return $this;
    }

    public function getNumberOfEpisodes(): int
    {
        return $this->numberOfEpisodes;
    }

    /**
     * @param int $numberOfEpisodes
     * @return $this
     */
    public function setNumberOfEpisodes($numberOfEpisodes): self
    {
        $this->numberOfEpisodes = (int)$numberOfEpisodes;

        return $this;
    }

    public function getNumberOfSeasons(): int
    {
        return $this->numberOfSeasons;
    }

    /**
     * @param int $numberOfSeasons
     * @return $this
     */
    public function setNumberOfSeasons($numberOfSeasons): self
    {
        $this->numberOfSeasons = (int)$numberOfSeasons;

        return $this;
    }

    /**
     * @return ?Episode
     */
    public function getLastEpisodeToAir(): \Tmdb\Model\Tv\Episode
    {
        return $this->lastEpisodeToAir;
    }

    /**
     * @param  ?Episode   $lastEpisodeToAir
     * @return $this
     */
    public function setLastEpisodeToAir($lastEpisodeToAir): self
    {
        $this->lastEpisodeToAir = $lastEpisodeToAir;

        return $this;
    }

    /**
     * @return ?Episode
     */
    public function getNextEpisodeToAir(): \Tmdb\Model\Tv\Episode
    {
        return $this->nextEpisodeToAir;
    }

    /**
     * @param  ?Episode   $nextEpisodeToAir
     * @return $this
     */
    public function setNextEpisodeToAir($nextEpisodeToAir): self
    {
        $this->nextEpisodeToAir = $nextEpisodeToAir;

        return $this;
    }

    public function getOriginCountry(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->originCountry;
    }

    /**
     * @param GenericCollection $originCountry
     * @return $this
     */
    public function setOriginCountry($originCountry): self
    {
        $this->originCountry = $originCountry;

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

    public function getOriginalLanguage(): string
    {
        return $this->originalLanguage;
    }

    /**
     * @param string $originalLanguage
     * @return $this
     */
    public function setOriginalLanguage($originalLanguage): self
    {
        $this->originalLanguage = $originalLanguage;

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

    public function getPopularity(): float
    {
        return $this->popularity;
    }

    /**
     * @param float $popularity
     * @return $this
     */
    public function setPopularity($popularity): self
    {
        $this->popularity = (float)$popularity;

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

    public function getSeasons(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->seasons;
    }

    /**
     * @param GenericCollection $seasons
     * @return $this
     */
    public function setSeasons($seasons): self
    {
        $this->seasons = $seasons;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus($status): self
    {
        $this->status = $status;

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

    /**
     * @param BackdropImage $backdrop
     * @return $this
     */
    public function setBackdropImage(BackdropImage $backdrop): self
    {
        $this->backdrop = $backdrop;

        return $this;
    }

    public function getBackdropImage(): \Tmdb\Model\Image\BackdropImage
    {
        return $this->backdrop;
    }

    /**
     * @param PosterImage $poster
     * @return $this
     */
    public function setPosterImage(PosterImage $poster): self
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

    public function getChanges(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->changes;
    }

    /**
     * @param GenericCollection $changes
     * @return $this
     */
    public function setChanges($changes): self
    {
        $this->changes = $changes;

        return $this;
    }

    public function getKeywords(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->keywords;
    }

    /**
     * @param GenericCollection $keywords
     * @return $this
     */
    public function setKeywords($keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getSimilar(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->similar;
    }

    /**
     * @param GenericCollection $similar
     * @return $this
     */
    public function setSimilar($similar): self
    {
        $this->similar = $similar;

        return $this;
    }

    public function getRecommendations(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->recommendations;
    }

    /**
     * @param GenericCollection $recommendations
     * @return $this
     */
    public function setRecommendations($recommendations): self
    {
        $this->recommendations = $recommendations;

        return $this;
    }

    public function getProductionCompanies(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->productionCompanies;
    }

    /**
     * @param GenericCollection $productionCompanies
     * @return $this
     */
    public function setProductionCompanies($productionCompanies): self
    {
        $this->productionCompanies = $productionCompanies;

        return $this;
    }

    public function getAlternativeTitles(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->alternativeTitles;
    }

    /**
     * @param GenericCollection $alternativeTitles
     * @return $this
     */
    public function setAlternativeTitles($alternativeTitles): self
    {
        $this->alternativeTitles = $alternativeTitles;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return GenericCollection
     */
    public function getWatchProviders(): GenericCollection
    {
        return $this->watchProviders;
    }

    /**
     * @param GenericCollection $watchProviders
     * @return $this
     */
    public function setWatchProviders($watchProviders): self
    {
        $this->watchProviders = $watchProviders;

        return $this;
    }
}
