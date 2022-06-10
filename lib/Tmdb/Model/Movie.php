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
use Tmdb\Model\Collection\ResultCollection;
use Tmdb\Model\Collection\Videos;
use Tmdb\Model\Common\Country;
use Tmdb\Model\Common\ExternalIds;
use Tmdb\Model\Common\GenericCollection;
use Tmdb\Model\Common\SpokenLanguage;
use Tmdb\Model\Movie\AlternativeTitle;
use Tmdb\Model\Movie\Release;
use Tmdb\Model\Movie\ReleaseDate;

/**
 * Class Movie
 * @package Tmdb\Model
 */
class Movie extends AbstractModel
{
    /**
     * Properties that are available in the API
     *
     * These properties are hydrated by the ObjectHydrator, all the other properties are handled by the factory.
     *
     * @var array
     */
    public static $properties = [
        'adult',
        'backdrop_path',
        'belongs_to_collection',
        'budget',
        'homepage',
        'id',
        'imdb_id',
        'original_title',
        'original_language',
        'overview',
        'popularity',
        'poster_path',
        'release_date',
        'revenue',
        'runtime',
        'status',
        'tagline',
        'title',
        'vote_average',
        'vote_count',
    ];
    /**
     * @var GenericCollection
     */
    protected $alternativeTitles;
    /**
     * @var GenericCollection
     */
    protected $changes;
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
    private $externalIds;
    /**
     * Images
     *
     * @var Images
     */
    protected $images;
    /**
     * @var GenericCollection
     */
    protected $keywords;
    /**
     * @var GenericCollection
     */
    protected $lists;
    /**
     * @var GenericCollection
     * @deprecated Use $release_dates instead
     */
    protected $releases;
    /**
     * @var GenericCollection
     */
    protected $release_dates;
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
    protected $translations;
    /**
     * @var ResultCollection
     */
    protected $reviews;
    /**
     * @var Videos
     */
    protected $videos;
    /**
     * @var bool
     */
    private $adult = false;
    /**
     * @var string
     */
    private $backdropPath;
    /**
     * @var Image
     */
    private $backdrop;
    /**
     * @var GenericCollection
     */
    private $belongsToCollection;
    /**
     * @var int
     */
    private $budget;
    /**
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
     * @var string
     */
    private $imdbId;
    /**
     * @var string
     */
    private $originalTitle;
    /**
     * @var string
     */
    private $originalLanguage;
    /**
     * @var string
     */
    private $overview;
    /**
     * @var float
     */
    private $popularity;
    /**
     * @var Image
     */
    private $poster;
    /**
     * @var string
     */
    private $posterPath;
    /**
     * @var GenericCollection
     */
    private $productionCompanies;
    /**
     * @var GenericCollection
     */
    private $productionCountries;
    /**
     * @var DateTime
     */
    private $releaseDate;
    /**
     * @var int
     */
    private $revenue;
    /**
     * @var int
     */
    private $runtime;
    /**
     * @var GenericCollection
     */
    private $spokenLanguages;
    /**
     * @var string
     */
    private $status;
    /**
     * @var string
     */
    private $tagline;
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
        $this->productionCompanies = new GenericCollection();
        $this->productionCountries = new GenericCollection();
        $this->spokenLanguages = new GenericCollection();
        $this->alternativeTitles = new GenericCollection();
        $this->changes = new GenericCollection();
        $this->credits = new CreditsCollection();
        $this->externalIds = new ExternalIds();
        $this->images = new Images();
        $this->keywords = new GenericCollection();
        $this->lists = new GenericCollection();
        $this->releases = new GenericCollection();
        $this->release_dates = new GenericCollection();
        $this->similar = new GenericCollection();
        $this->recommendations = new GenericCollection();
        $this->translations = new GenericCollection();
        $this->videos = new Videos();
        $this->watchProviders = new GenericCollection();
    }

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
        $this->adult = (bool)$adult;

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

    public function getBelongsToCollection(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->belongsToCollection;
    }

    /**
     * @param null $belongsToCollection
     * @return $this
     */
    public function setBelongsToCollection($belongsToCollection): self
    {
        $this->belongsToCollection = $belongsToCollection;

        return $this;
    }

    /**
     * @return GenericCollection
     */
    public function getChanges(): GenericCollection
    {
        return $this->changes;
    }

    /**
     * @param GenericCollection $changes
     * @return $this
     */
    public function setChanges(GenericCollection $changes): self
    {
        $this->changes = $changes;

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
    public function setGenres(Genres $genres): self
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
     * @param mixed $id
     * @return $this
     */
    public function setId($id): self
    {
        $this->id = (int)$id;

        return $this;
    }

    /**
     * @return Images Image[]
     */
    public function getImages(): \Tmdb\Model\Collection\Images
    {
        return $this->images;
    }

    /**
     * @param Images $images
     * @return $this
     */
    public function setImages(Images $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getImdbId(): string
    {
        return $this->imdbId;
    }

    /**
     * @param string $imdbId
     * @return $this
     */
    public function setImdbId($imdbId): self
    {
        $this->imdbId = $imdbId;

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
     * @param mixed $popularity
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

    /**
     * @return GenericCollection|Company[]
     */
    public function getProductionCompanies(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->productionCompanies;
    }

    /**
     * @param GenericCollection $productionCompanies
     * @return $this
     */
    public function setProductionCompanies(GenericCollection $productionCompanies): self
    {
        $this->productionCompanies = $productionCompanies;

        return $this;
    }

    /**
     * @return GenericCollection|Country[]
     */
    public function getProductionCountries(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->productionCountries;
    }

    /**
     * @param GenericCollection $productionCountries
     * @return $this
     */
    public function setProductionCountries(GenericCollection $productionCountries): self
    {
        $this->productionCountries = $productionCountries;

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

    public function getRevenue(): int
    {
        return $this->revenue;
    }

    /**
     * @param mixed $revenue
     * @return $this
     */
    public function setRevenue($revenue): self
    {
        $this->revenue = (int)$revenue;

        return $this;
    }

    public function getRuntime(): int
    {
        return $this->runtime;
    }

    /**
     * @param mixed $runtime
     * @return $this
     */
    public function setRuntime($runtime): self
    {
        $this->runtime = (int)$runtime;

        return $this;
    }

    /**
     * @return GenericCollection|SpokenLanguage[]
     */
    public function getSpokenLanguages(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->spokenLanguages;
    }

    /**
     * @param GenericCollection $spokenLanguages
     * @return $this
     */
    public function setSpokenLanguages(GenericCollection $spokenLanguages): self
    {
        $this->spokenLanguages = $spokenLanguages;

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

    public function getTagline(): string
    {
        return $this->tagline;
    }

    /**
     * @param string $tagline
     * @return $this
     */
    public function setTagline($tagline): self
    {
        $this->tagline = $tagline;

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
     * @param mixed $voteAverage
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
     * @param mixed $voteCount
     * @return $this
     */
    public function setVoteCount($voteCount): self
    {
        $this->voteCount = (int)$voteCount;

        return $this;
    }

    /**
     * @return GenericCollection|AlternativeTitle[]
     */
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

    public function getBudget(): int
    {
        return $this->budget;
    }

    /**
     * @param int $budget
     * @return $this
     */
    public function setBudget($budget): self
    {
        $this->budget = $budget;

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
    public function setCredits(CreditsCollection $credits): self
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


    /**
     * @return GenericCollection|Keyword[]
     */
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

    public function getLists(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->lists;
    }

    /**
     * @param GenericCollection $lists
     * @return $this
     */
    public function setLists($lists): self
    {
        $this->lists = $lists;

        return $this;
    }

    /**
     * @return GenericCollection|Release[]
     * @deprecated Use the getReleaseDates instead
     */
    public function getReleases(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->releases;
    }

    /**
     * @param GenericCollection $releases
     * @return $this
     * @deprecated Use the setReleaseDates instead.
     */
    public function setReleases(GenericCollection $releases): self
    {
        $this->releases = $releases;

        return $this;
    }

    /**
     * @return GenericCollection|ReleaseDate[]
     */
    public function getReleaseDates(): \Tmdb\Model\Common\GenericCollection
    {
        return $this->release_dates;
    }

    /**
     * @param GenericCollection $release_dates
     * @return $this
     */
    public function setReleaseDates(GenericCollection $release_dates): self
    {
        $this->release_dates = $release_dates;

        return $this;
    }

    /**
     * @return GenericCollection|Movie[]
     */
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

    /**
     * @return GenericCollection|Movie[]
     * @deprecated Use getSimilar instead
     */
    public function getSimilarMovies()
    {
        return $this->getSimilar();
    }

    /**
     * @return GenericCollection|Movie[]
     */
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

    /**
     * @return GenericCollection
     */
    public function getTranslations(): GenericCollection
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
     * @param Image $backdrop
     * @return $this
     */
    public function setBackdropImage($backdrop): self
    {
        $this->backdrop = $backdrop;

        return $this;
    }

    public function getBackdropImage(): \Tmdb\Model\Image
    {
        return $this->backdrop;
    }

    /**
     * @param Image $poster
     * @return $this
     */
    public function setPosterImage($poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    public function getPosterImage(): \Tmdb\Model\Image
    {
        return $this->poster;
    }

    public function getReviews(): \Tmdb\Model\Collection\ResultCollection
    {
        return $this->reviews;
    }

    /**
     * @param ResultCollection $reviews
     * @return $this
     */
    public function setReviews($reviews): self
    {
        $this->reviews = $reviews;

        return $this;
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
