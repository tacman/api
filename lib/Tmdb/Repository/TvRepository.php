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

use Tmdb\Factory\TvFactory;
use Tmdb\Model\AbstractModel;
use Tmdb\Model\Collection\CreditsCollection;
use Tmdb\Model\Collection\Images;
use Tmdb\Model\Collection\ResultCollection;
use Tmdb\Model\Collection\Videos;
use Tmdb\Model\Common\AccountStates;
use Tmdb\Model\Common\GenericCollection;
use Tmdb\Model\Common\Video;
use Tmdb\Model\Lists\Result;
use Tmdb\Model\Tv;
use Tmdb\Model\Tv\QueryParameter\AppendToResponse;

/**
 * Class TvRepository
 * @package Tmdb\Repository
 * @see http://docs.themoviedb.apiary.io/#tv
 */
class TvRepository extends AbstractRepository
{
    /**
     * Load a tv with the given identifier
     *
     * If you want to optimize the result set/bandwidth you should
     * define the AppendToResponse parameter
     *
     * @param integer $id
     * @param $parameters
     * @param $headers
     * @return null|AbstractModel
     */
    public function load($id, array $parameters = [], array $headers = []): ?\Tmdb\Model\AbstractModel
    {
        if (!isset($parameters['append_to_response'])) {
            $parameters = array_merge($parameters, [
                new AppendToResponse([
                    AppendToResponse::CREDITS,
                    AppendToResponse::EXTERNAL_IDS,
                    AppendToResponse::IMAGES,
                    AppendToResponse::TRANSLATIONS,
                    AppendToResponse::SIMILAR,
                    AppendToResponse::RECOMMENDATIONS,
                    AppendToResponse::KEYWORDS,
                    AppendToResponse::CHANGES,
                    AppendToResponse::CONTENT_RATINGS,
                    AppendToResponse::ALTERNATIVE_TITLES,
                    AppendToResponse::VIDEOS,
                    AppendToResponse::WATCH_PROVIDERS,
                ])
            ]);
        }

        $data = $this->getApi()->getTvshow($id, $this->parseQueryParameters($parameters), $headers);

        return $this->getFactory()->create($data);
    }

    /**
     * Return the Tvs API Class
     */
    public function getApi(): \Tmdb\Api\Tv
    {
        return $this->getClient()->getTvApi();
    }

    public function getFactory(): \Tmdb\Factory\TvFactory
    {
        return new TvFactory($this->getClient()->getHttpClient());
    }

    /**
     * Get the cast & crew information about a TV series.
     *
     * Just like the website, we pull this information from the last season of the series.
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
        $tv = $this->getFactory()->create(['credits' => $data]);

        return $tv->getCredits();
    }

    /**
     * Get the content ratings for a specific TV show id.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     *
     * @return GenericCollection
     */
    public function getContentRatings($id, array $parameters = array(), array $headers = array()): GenericCollection
    {
        $data = $this->getApi()->getContentRatings($id, $this->parseQueryParameters($parameters), $headers);
        $tv = $this->getFactory()->create(['content_ratings' => $data]);

        return $tv->getContentRatings();
    }

    /**
     * Get the external ids that we have stored for a TV series.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     * @return null|AbstractModel
     */
    public function getExternalIds($id, array $parameters = [], array $headers = []): ?\Tmdb\Model\AbstractModel
    {
        $data = $this->getApi()->getExternalIds($id, $this->parseQueryParameters($parameters), $headers);
        $tv = $this->getFactory()->create(['external_ids' => $data]);

        return $tv->getExternalIds();
    }

    /**
     * Get the images (posters and backdrops) for a TV series.
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
        $tv = $this->getFactory()->create(['images' => $data]);

        return $tv->getImages();
    }

    /**
     * Get the similar TV shows for a specific TV show id.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     *
     * @return GenericCollection
     */
    public function getSimilar($id, array $parameters = [], array $headers = []): GenericCollection
    {
        $data = $this->getApi()->getSimilar($id, $this->parseQueryParameters($parameters), $headers);
        $movie = $this->getFactory()->create(['similar' => $data]);

        return $movie->getSimilar();
    }

    /**
     * Get the recommended TV shows for a specific movie id.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     *
     * @return GenericCollection
     */
    public function getRecommendations($id, array $parameters = [], array $headers = []): GenericCollection
    {
        $data = $this->getApi()->getRecommendations($id, $this->parseQueryParameters($parameters), $headers);
        $movie = $this->getFactory()->create(['recommendations' => $data]);

        return $movie->getRecommendations();
    }

    /**
     * Get the list of translations that exist for a TV series.
     *
     * These translations cascade down to the episode level.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     *
     * @return GenericCollection
     */
    public function getTranslations($id, array $parameters = [], array $headers = []): GenericCollection
    {
        $data = $this->getApi()->getTranslations($id, $this->parseQueryParameters($parameters), $headers);
        $tv = $this->getFactory()->create(['translations' => $data]);

        return $tv->getTranslations();
    }

    /**
     * Get the images (posters and backdrops) for a TV series.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     * @return Videos|Video[]
     */
    public function getVideos($id, array $parameters = [], array $headers = [])
    {
        $data = $this->getApi()->getVideos($id, $this->parseQueryParameters($parameters), $headers);
        $tv = $this->getFactory()->create(['videos' => $data]);

        return $tv->getVideos();
    }

    /**
     * Get the watch providers (by region) for a TV series.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     */
    public function getWatchProviders($id, array $parameters = [], array $headers = []): \Tmdb\Model\Common\GenericCollection
    {
        $data = $this->getApi()->getWatchProviders($id, $this->parseQueryParameters($parameters), $headers);
        $tv = $this->getFactory()->create(['watch/providers' => $data]);

        return $tv->getWatchProviders();
    }

    /**
     * Get the alternative titles for a specific show ID.
     *
     * @param $id
     * @param $parameters
     * @param $headers
     * @return GenericCollection|Tv\AlternativeTitle[]
     */
    public function getAlternativeTitles($id, array $parameters = [], array $headers = [])
    {
        $data = $this->getApi()->getAlternativeTitles($id, $this->parseQueryParameters($parameters), $headers);
        $tv = $this->getFactory()->create(['alternative_titles' => $data]);

        return $tv->getAlternativeTitles();
    }

    /**
     * Get the list of popular tvs on The Tv Database. This list refreshes every day.
     *
     * @param array $options
     * @param array $headers
     *
     * @return ResultCollection
     */
    public function getPopular(array $options = [], array $headers = []): ResultCollection
    {
        return $this->getFactory()->createResultCollection(
            $this->getApi()->getPopular($options, $headers)
        );
    }

    /**
     * Get the list of top rated tvs. By default, this list will only include tvs that have 10 or more votes.
     * This list refreshes every day.
     *
     * @param array $options
     * @param array $headers
     *
     * @return ResultCollection
     */
    public function getTopRated(array $options = [], array $headers = []): ResultCollection
    {
        return $this->getFactory()->createResultCollection(
            $this->getApi()->getTopRated($options, $headers)
        );
    }

    /**
     * Get the list of top rated tvs. By default, this list will only include tvs that have 10 or more votes.
     * This list refreshes every day.
     *
     * @param array $options
     * @param array $headers
     *
     * @return ResultCollection
     */
    public function getOnTheAir(array $options = [], array $headers = []): ResultCollection
    {
        return $this->getFactory()->createResultCollection(
            $this->getApi()->getOnTheAir($options, $headers)
        );
    }

    /**
     * Get the list of TV shows that air today.
     *
     * Without a specified timezone, this query defaults to EST (Eastern Time UTC-05:00).
     *
     * @param array $options
     * @param array $headers
     *
     * @return ResultCollection
     */
    public function getAiringToday(array $options = [], array $headers = []): ResultCollection
    {
        return $this->getFactory()->createResultCollection(
            $this->getApi()->getAiringToday($options, $headers)
        );
    }

    /**
     * Get the latest tv-show.
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
     * This method lets users get the status of whether or not the TV show has been rated
     * or added to their favourite or watch lists.
     *
     * A valid session id is required.
     *
     * @param integer $id
     */
    public function getAccountStates($id): \Tmdb\Model\AbstractModel
    {
        return $this->getFactory()->createAccountStates(
            $this->getApi()->getAccountStates($id)
        );
    }

    /**
     * This method lets users rate a TV show.
     *
     * A valid session id or guest session id is required.
     *
     * @param integer $id
     * @param float $rating
     */
    public function rate($id, $rating): \Tmdb\Model\AbstractModel
    {
        return $this->getFactory()->createResult(
            $this->getApi()->rateTvShow($id, $rating)
        );
    }
}
