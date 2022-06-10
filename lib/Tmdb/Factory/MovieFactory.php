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

use Tmdb\Factory\Common\ChangeFactory;
use Tmdb\Factory\Common\VideoFactory;
use Tmdb\Factory\Movie\ListItemFactory;
use Tmdb\Factory\People\CastFactory;
use Tmdb\Factory\People\CrewFactory;
use Tmdb\HttpClient\HttpClient;
use Tmdb\Model\AbstractModel;
use Tmdb\Model\Common\Country;
use Tmdb\Model\Common\ExternalIds;
use Tmdb\Model\Common\GenericCollection;
use Tmdb\Model\Common\SpokenLanguage;
use Tmdb\Model\Common\Translation;
use Tmdb\Model\Company;
use Tmdb\Model\Movie;
use Tmdb\Model\Watch;

/**
 * Class MovieFactory
 * @package Tmdb\Factory
 */
class MovieFactory extends AbstractFactory
{
    /**
     * @var People\CastFactory
     */
    private $castFactory;

    /**
     * @var People\CrewFactory
     */
    private $crewFactory;

    /**
     * @var GenreFactory
     */
    private $genreFactory;

    /**
     * @var ImageFactory
     */
    private $imageFactory;

    /**
     * @var ChangeFactory
     */
    private $changeFactory;

    /**
     * @var ReviewFactory
     */
    private $reviewFactory;

    /**
     * @var ListItemFactory
     */
    private $listItemFactory;

    /**
     * @var KeywordFactory
     */
    private $keywordFactory;

    /**
     * @var Common\VideoFactory
     */
    private $videoFactory;

    /**
     * Constructor
     *
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->castFactory = new CastFactory($httpClient);
        $this->crewFactory = new CrewFactory($httpClient);
        $this->genreFactory = new GenreFactory($httpClient);
        $this->imageFactory = new ImageFactory($httpClient);
        $this->changeFactory = new ChangeFactory($httpClient);
        $this->reviewFactory = new ReviewFactory($httpClient);
        $this->listItemFactory = new ListItemFactory($httpClient);
        $this->keywordFactory = new KeywordFactory($httpClient);
        $this->videoFactory = new VideoFactory($httpClient);

        parent::__construct($httpClient);
    }

    /**
     * {@inheritdoc}
     */
    public function createCollection(array $data = []): ?AbstractModel
    {
        $collection = new GenericCollection();

        if (array_key_exists('results', $data)) {
            $data = $data['results'];
        }

        foreach ($data as $item) {
            $collection->add(null, $this->create($item));
        }

        return $collection;
    }

    /**
     * @param array $data
     *
     * @return AbstractModel|null
     */
    public function create(array $data = []): ?AbstractModel
    {
        if (!$data) {
            return null;
        }

        $movie = new Movie();

        if (array_key_exists('alternative_titles', $data) && array_key_exists('titles', $data['alternative_titles'])) {
            $movie->setAlternativeTitles(
                $this->createGenericCollection($data['alternative_titles']['titles'], new Movie\AlternativeTitle())
            );
        }

        if (array_key_exists('credits', $data)) {
            if (array_key_exists('cast', $data['credits'])) {
                $movie->getCredits()->setCast($this->getCastFactory()->createCollection($data['credits']['cast']));
            }

            if (array_key_exists('crew', $data['credits'])) {
                $movie->getCredits()->setCrew($this->getCrewFactory()->createCollection($data['credits']['crew']));
            }
        }

        /** External ids */
        if (array_key_exists('external_ids', $data)) {
            $movie->setExternalIds(
                $this->hydrate(new ExternalIds(), $data['external_ids'])
            );
        }

        /** Genres */
        if (array_key_exists('genres', $data)) {
            $movie->setGenres($this->getGenreFactory()->createCollection($data['genres']));
        }

        /** Genres */
        if (array_key_exists('genre_ids', $data)) {
            $formattedData = [];

            foreach ($data['genre_ids'] as $genreId) {
                $formattedData[] = [
                    'id' => $genreId
                ];
            }

            $movie->setGenres($this->getGenreFactory()->createCollection($formattedData));
        }

        /** Images */
        if (array_key_exists('backdrop_path', $data)) {
            $movie->setBackdropImage($this->getImageFactory()->createFromPath($data['backdrop_path'], 'backdrop_path'));
        }

        if (array_key_exists('images', $data)) {
            $movie->setImages($this->getImageFactory()->createCollectionFromMovie($data['images']));
        }

        if (array_key_exists('poster_path', $data)) {
            $movie->setPosterImage($this->getImageFactory()->createFromPath($data['poster_path'], 'poster_path'));
        }

        /** Keywords */
        if (array_key_exists('keywords', $data)) {
            $movie->setKeywords($this->getKeywordFactory()->createCollection($data['keywords']));
        }

        if (array_key_exists('releases', $data) && array_key_exists('countries', $data['releases'])) {
            $movie->setReleases($this->createGenericCollection($data['releases']['countries'], new Movie\Release()));
        }

        if (array_key_exists('release_dates', $data) && array_key_exists('results', $data['release_dates'])) {
            $release_dates = new GenericCollection();
            foreach ($data['release_dates']['results'] as $country_releases) {
                $iso_31661 = $country_releases['iso_3166_1'];
                foreach ($country_releases['release_dates'] as $release_date) {
                    $release_date['iso_3166_1'] = $iso_31661;
                    $release_dates->add(null, $this->hydrate(new Movie\ReleaseDate(), $release_date));
                }
            }
            $movie->setReleaseDates($release_dates);
        }

        if (array_key_exists('watch/providers', $data) && array_key_exists('results', $data['watch/providers'])) {
            $watchProviders = new GenericCollection();
            foreach ($data['watch/providers']['results'] as $iso31661 => $countryWatchData) {
                $countryWatchData['iso_3166_1'] = $iso31661;

                foreach (['flatrate', 'rent', 'buy'] as $providerType) {
                    $typeProviders = new GenericCollection();
                    foreach ($countryWatchData[$providerType] ?? [] as $providerData) {
                        if (isset($providerData['provider_id'])) {
                            $providerData['id'] = $providerData['provider_id'];
                        }
                        if (isset($providerData['provider_name'])) {
                            $providerData['name'] = $providerData['provider_name'];
                        }

                        $providerData['iso_3166_1'] = $iso31661;
                        $providerData['type'] = $providerType;
                        $typeProviders->add(null, $this->hydrate(new Watch\Provider(), $providerData));
                    }
                    $countryWatchData[$providerType] = $typeProviders;
                }

                $watchProviders->add($iso31661, $this->hydrate(new Watch\Providers(), $countryWatchData));
            }
            $movie->setWatchProviders($watchProviders);
        }

        if (array_key_exists('videos', $data)) {
            $movie->setVideos($this->getVideoFactory()->createCollection($data['videos']));
        }

        if (array_key_exists('translations', $data) && array_key_exists('translations', $data['translations'])) {
            $movie->setTranslations(
                $this->createGenericCollection(
                    $data['translations']['translations'],
                    new Translation()
                )
            );
        }

        if (array_key_exists('similar', $data)) {
            $movie->setSimilar($this->createResultCollection($data['similar']));
        }

        if (array_key_exists('recommendations', $data)) {
            $movie->setRecommendations($this->createResultCollection($data['recommendations']));
        }

        if (array_key_exists('reviews', $data)) {
            $movie->setReviews($this->getReviewFactory()->createResultCollection($data['reviews']));
        }

        if (array_key_exists('lists', $data)) {
            $movie->setLists($this->getListItemFactory()->createResultCollection($data['lists']));
        }

        if (array_key_exists('changes', $data)) {
            $movie->setChanges($this->getChangeFactory()->createCollection($data['changes']));
        }

        if (array_key_exists('production_companies', $data)) {
            $movie->setProductionCompanies(
                $this->createGenericCollection($data['production_companies'], new Company())
            );
        }

        if (array_key_exists('production_countries', $data)) {
            $movie->setProductionCountries(
                $this->createGenericCollection($data['production_countries'], new Country())
            );
        }

        if (array_key_exists('spoken_languages', $data)) {
            $movie->setSpokenLanguages(
                $this->createGenericCollection($data['spoken_languages'], new SpokenLanguage())
            );
        }

        return $this->hydrate($movie, $data);
    }

    public function getCastFactory(): \Tmdb\Factory\People\CastFactory
    {
        return $this->castFactory;
    }

    /**
     * @param CastFactory $castFactory
     * @return $this
     */
    public function setCastFactory($castFactory): self
    {
        $this->castFactory = $castFactory;

        return $this;
    }

    public function getCrewFactory(): \Tmdb\Factory\People\CrewFactory
    {
        return $this->crewFactory;
    }

    /**
     * @param CrewFactory $crewFactory
     * @return $this
     */
    public function setCrewFactory($crewFactory): self
    {
        $this->crewFactory = $crewFactory;

        return $this;
    }

    public function getGenreFactory(): \Tmdb\Factory\GenreFactory
    {
        return $this->genreFactory;
    }

    /**
     * @param GenreFactory $genreFactory
     * @return $this
     */
    public function setGenreFactory($genreFactory): self
    {
        $this->genreFactory = $genreFactory;

        return $this;
    }

    public function getImageFactory(): \Tmdb\Factory\ImageFactory
    {
        return $this->imageFactory;
    }

    /**
     * @param ImageFactory $imageFactory
     * @return $this
     */
    public function setImageFactory($imageFactory): self
    {
        $this->imageFactory = $imageFactory;

        return $this;
    }

    public function getKeywordFactory(): \Tmdb\Factory\KeywordFactory
    {
        return $this->keywordFactory;
    }

    /**
     * @param KeywordFactory $keywordFactory
     * @return $this
     */
    public function setKeywordFactory($keywordFactory): self
    {
        $this->keywordFactory = $keywordFactory;

        return $this;
    }

    public function getVideoFactory(): \Tmdb\Factory\Common\VideoFactory
    {
        return $this->videoFactory;
    }

    /**
     * @param VideoFactory $videoFactory
     * @return $this
     */
    public function setVideoFactory($videoFactory): self
    {
        $this->videoFactory = $videoFactory;

        return $this;
    }

    public function getReviewFactory(): \Tmdb\Factory\ReviewFactory
    {
        return $this->reviewFactory;
    }

    /**
     * @param ReviewFactory $reviewFactory
     * @return $this
     */
    public function setReviewFactory($reviewFactory): self
    {
        $this->reviewFactory = $reviewFactory;

        return $this;
    }

    public function getListItemFactory(): \Tmdb\Factory\Movie\ListItemFactory
    {
        return $this->listItemFactory;
    }

    /**
     * @param ListItemFactory $listItemFactory
     * @return $this
     */
    public function setListItemFactory($listItemFactory): self
    {
        $this->listItemFactory = $listItemFactory;

        return $this;
    }

    public function getChangeFactory(): \Tmdb\Factory\Common\ChangeFactory
    {
        return $this->changeFactory;
    }

    /**
     * @param ChangeFactory $changeFactory
     * @return $this
     */
    public function setChangeFactory($changeFactory): self
    {
        $this->changeFactory = $changeFactory;

        return $this;
    }
}
