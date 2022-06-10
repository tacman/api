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

namespace Tmdb\Repository;

use Tmdb\Api\Movies;
use Tmdb\Factory\ImageFactory;
use Tmdb\Factory\Movie\AlternativeTitleFactory;
use Tmdb\Factory\MovieFactory;
use Tmdb\Factory\PeopleFactory;
use Tmdb\Model\AbstractModel;
use Tmdb\Model\Collection\CreditsCollection;
use Tmdb\Model\Collection\Images;
use Tmdb\Model\Collection\ResultCollection;
use Tmdb\Model\Collection\Videos;
use Tmdb\Model\Common\GenericCollection;
use Tmdb\Model\Common\Translation;
use Tmdb\Model\Common\Video;
use Tmdb\Model\Keyword;
use Tmdb\Model\Movie;
use Tmdb\Model\Movie\QueryParameter\AppendToResponse;

/**
 * Class MovieRepository
 * @package Tmdb\Repository
 * @see http://docs.themoviedb.apiary.io/#movies
 */
class MovieRepository extends AbstractRepository
{
    /**
     * @var ImageFactory
     */
    private $imageFactory;

    /**
     * @var AlternativeTitleFactory
     */
    private $alternativeTitleFactory;

    /**
     * @var PeopleFactory
     */
    private $peopleFactory;

    /**
     * Load a movie with the given identifier
     *
     * If you want to optimize the result set/bandwidth you
     * should define the AppendToResponse parameter
     *
     * @param $id
     * @param $parameters
     * @param $headers
     * @return null|AbstractModel
     */
    public function load($id, array $parameters = [], array $headers = []): ?\Tmdb\Model\AbstractModel
    {
        if (!isset($parameters['append_to_response'])) {
            $parameters = array_merge($parameters, [
                new AppendToResponse([
                    AppendToResponse::ALTERNATIVE_TITLES,
                    AppendToResponse::EXTERNAL_IDS,
                    AppendToResponse::CHANGES,
                    AppendToResponse::CREDITS,
                    AppendToResponse::IMAGES,
                    AppendToResponse::KEYWORDS,
                    AppendToResponse::LISTS,
                    AppendToResponse::RELEASE_DATES,
                    AppendToResponse::REVIEWS,
                    AppendToResponse::SIMILAR,
                    AppendToResponse::RECOMMENDATIONS,
                    AppendToResponse::TRANSLATIONS,
                    AppendToResponse::VIDEOS,
                    AppendToResponse::WATCH_PROVIDERS,
                ])
            ]);
        }

        $data = $this->getApi()->getMovie($id, $this->parseQueryParameters($parameters), $headers);

        return $this->getFactory()->create($data);
    }

    /**
     * Return the Movies API Class
     */
    public function getApi(): \Tmdb\Api\Movies
    {
        return $this->getClient()->getMoviesApi();
    }

    /**
     * Return the Movie Factory
     */
    public function getFactory(): \Tmdb\Factory\MovieFactory
    {
        return new MovieFactory($this->getClient()->getHttpClient());
    }

    /**
     * Get the alternative titles for a specific movie id.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     *
     * @return GenericCollection|Movie\AlternativeTitle[]
     *
     * @psalm-return GenericCollection|array<array-key, Movie\AlternativeTitle>
     */
    public function getAlternativeTitles($id, array $parameters = [], array $headers = [])
    {
        $data = $this->getApi()->getAlternativeTitles($id, $this->parseQueryParameters($parameters), $headers);
        $movie = $this->getFactory()->create(['alternative_titles' => $data]);

        return $movie->getAlternativeTitles();
    }

    /**
     * Get the cast and crew information for a specific movie id.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     *
     * @return CreditsCollection
     */
    public function getCredits($id, array $parameters = [], array $headers = []): CreditsCollection
    {
        $data = $this->getApi()->getCredits($id, $this->parseQueryParameters($parameters), $headers);
        $movie = $this->getFactory()->create(['credits' => $data]);

        return $movie->getCredits();
    }

    /**
     * Get the images (posters and backdrops) for a specific movie id.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     *
     * @return Images
     */
    public function getImages($id, array $parameters = [], array $headers = []): Images
    {
        $data = $this->getApi()->getImages($id, $this->parseQueryParameters($parameters), $headers);
        $movie = $this->getFactory()->create(['images' => $data]);

        return $movie->getImages();
    }

    /**
     * Get the plot keywords for a specific movie id.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     *
     * @return GenericCollection|Keyword[]
     *
     * @psalm-return GenericCollection|array<array-key, \Tmdb\Model\Keyword>
     */
    public function getKeywords($id, array $parameters = [], array $headers = [])
    {
        $data = $this->getApi()->getKeywords($id, $this->parseQueryParameters($parameters), $headers);
        $movie = $this->getFactory()->create(['keywords' => $data]);

        return $movie->getKeywords();
    }

    /**
     * Get the release date and certification information by country for a specific movie id.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     *
     * @return GenericCollection|Movie\Release[]
     *
     * @psalm-return GenericCollection|array<array-key, Movie\Release>
     */
    public function getReleases($id, array $parameters = [], array $headers = [])
    {
        $data = $this->getApi()->getReleases($id, $this->parseQueryParameters($parameters), $headers);
        $movie = $this->getFactory()->create(['releases' => $data]);

        return $movie->getReleases();
    }

    /**
     * Get the translations for a specific movie id.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     *
     * @return GenericCollection|Translation[]
     *
     * @psalm-return array<array-key, \Tmdb\Model\Common\Translation>
     */
    public function getTranslations($id, array $parameters = [], array $headers = []): GenericCollection
    {
        $data = $this->getApi()->getTranslations($id, $this->parseQueryParameters($parameters), $headers);
        $movie = $this->getFactory()->create(['translations' => $data]);

        return $movie->getTranslations();
    }

    /**
     * Get the similar movies for a specific movie id.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     *
     * @return GenericCollection|Movie[]
     *
     * @deprecated Will be removed in one of the upcoming versions, has been updated to getSimilar ( following TMDB ).
     *
     * @psalm-return GenericCollection|array<array-key, Movie>
     */
    public function getSimilarMovies($id, array $parameters = [], array $headers = []): GenericCollection
    {
        return $this->getSimilar($id, $parameters, $headers);
    }

    /**
     * Get the similar movies for a specific movie id.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     *
     * @return GenericCollection|Movie[]
     *
     * @psalm-return GenericCollection|array<array-key, Movie>
     */
    public function getSimilar($id, array $parameters = [], array $headers = []): GenericCollection
    {
        $data = $this->getApi()->getSimilar($id, $this->parseQueryParameters($parameters), $headers);
        $movie = $this->getFactory()->create(['similar' => $data]);

        return $movie->getSimilar();
    }

    /**
     * Get the recommended movies for a specific movie id.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     *
     * @return GenericCollection|Movie[]
     *
     * @psalm-return GenericCollection|array<array-key, Movie>
     */
    public function getRecommendations($id, array $parameters = [], array $headers = []): GenericCollection
    {
        $data = $this->getApi()->getRecommendations($id, $this->parseQueryParameters($parameters), $headers);
        $movie = $this->getFactory()->create(['recommendations' => $data]);

        return $movie->getRecommendations();
    }

    /**
     * Get the reviews for a particular movie id.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     *
     * @return ResultCollection
     */
    public function getReviews($id, array $parameters = [], array $headers = []): ResultCollection
    {
        $data = $this->getApi()->getReviews($id, $this->parseQueryParameters($parameters), $headers);
        $movie = $this->getFactory()->create(['reviews' => $data]);

        return $movie->getReviews();
    }

    /**
     * Get the lists that the movie belongs to.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     *
     * @return GenericCollection
     */
    public function getLists($id, array $parameters = [], array $headers = []): GenericCollection
    {
        $data = $this->getApi()->getLists($id, $this->parseQueryParameters($parameters), $headers);
        $movie = $this->getFactory()->create(['lists' => $data]);

        return $movie->getLists();
    }

    /**
     * Get the changes for a specific movie id.
     * Changes are grouped by key, and ordered by date in descending order.
     *
     * By default, only the last 24 hours of changes are returned.
     * The maximum number of days that can be returned in a single request is 14.
     *
     * The language is present on fields that are translatable.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     * @return null|AbstractModel
     */
    public function getChanges($id, array $parameters = [], array $headers = []): ?\Tmdb\Model\AbstractModel
    {
        $data = $this->getApi()->getChanges($id, $this->parseQueryParameters($parameters), $headers);
        $movie = $this->getFactory()->create(['changes' => $data]);

        return $movie->getChanges();
    }

    /**
     * Get the latest movie.
     *
     * @param array $options
     * @return null|AbstractModel
     */
    public function getLatest(array $options = []): ?\Tmdb\Model\AbstractModel
    {
        return $this->getFactory()->create(
            $this->getApi()->getLatest($options)
        );
    }

    /**
     * Get the list of upcoming movies. This list refreshes every day.
     * The maximum number of items this list will include is 100.
     *
     * @param array $options
     *
     * @return ResultCollection
     */
    public function getUpcoming(array $options = []): ResultCollection
    {
        return $this->getFactory()->createResultCollection(
            $this->getApi()->getUpcoming($options)
        );
    }

    /**
     * Get the list of movies playing in theatres. This list refreshes every day.
     * The maximum number of items this list will include is 100.
     *
     * @param array $options
     *
     * @return ResultCollection
     */
    public function getNowPlaying(array $options = []): ResultCollection
    {
        return $this->getFactory()->createResultCollection(
            $this->getApi()->getNowPlaying($options)
        );
    }

    /**
     * Get the list of popular movies on The Movie Database.
     * This list refreshes every day.
     *
     * @param array $options
     *
     * @return ResultCollection
     */
    public function getPopular(array $options = []): ResultCollection
    {
        return $this->getFactory()->createResultCollection(
            $this->getApi()->getPopular($options)
        );
    }

    /**
     * Get the list of top rated movies.
     *
     * By default, this list will only include movies that have 10 or more votes.
     * This list refreshes every day.
     *
     * @param array $options
     *
     * @return ResultCollection
     */
    public function getTopRated(array $options = []): ResultCollection
    {
        return $this->getFactory()->createResultCollection(
            $this->getApi()->getTopRated($options)
        );
    }

    /**
     * This method lets users get the status of whether or not the movie has been rated
     * or added to their favourite or watch lists. A valid session id is required.
     *
     * @param integer $id
     *
     * @return AbstractModel
     */
    public function getAccountStates($id): AbstractModel
    {
        return $this->getFactory()->createAccountStates(
            $this->getApi()->getAccountStates($id)
        );
    }

    /**
     * This method lets users rate a movie. A valid session id or guest session id is required.
     *
     * @param integer $id
     * @param float $rating
     *
     * @return AbstractModel
     */
    public function rate($id, $rating): AbstractModel
    {
        return $this->getFactory()->createResult(
            $this->getApi()->rateMovie($id, $rating)
        );
    }

    /**
     * Get the videos (trailers, teasers, clips, etc...) for a specific movie id.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     * @return Videos|Video[]
     */
    public function getVideos($id, array $parameters = [], array $headers = [])
    {
        $data = $this->getApi()->getVideos($id, $this->parseQueryParameters($parameters), $headers);
        $movie = $this->getFactory()->create(['videos' => $data]);

        return $movie->getVideos();
    }

    /**
     * Get the watch providers (by region) for a specific movie id.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     */
    public function getWatchProviders($id, array $parameters = [], array $headers = []): \Tmdb\Model\Common\GenericCollection
    {
        $data = $this->getApi()->getWatchProviders($id, $this->parseQueryParameters($parameters), $headers);
        $movie = $this->getFactory()->create(['watch/providers' => $data]);

        return $movie->getWatchProviders();
    }

    /**
     * Get the external ids that we have stored for a movie.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     * @return null|AbstractModel
     */
    public function getExternalIds($id, array $parameters = [], array $headers = []): ?\Tmdb\Model\AbstractModel
    {
        $data = $this->getApi()->getExternalIds($id, $this->parseQueryParameters($parameters), $headers);
        $movie = $this->getFactory()->create(['external_ids' => $data]);

        return $movie->getExternalIds();
    }

    public function getAlternativeTitleFactory(): \Tmdb\Factory\Movie\AlternativeTitleFactory
    {
        return $this->alternativeTitleFactory;
    }

    /**
     * @param AlternativeTitleFactory $alternativeTitleFactory
     * @return $this
     */
    public function setAlternativeTitleFactory($alternativeTitleFactory): self
    {
        $this->alternativeTitleFactory = $alternativeTitleFactory;

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
}
