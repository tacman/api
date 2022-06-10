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

namespace Tmdb\Model\Query\Discover;

use DateTime;
use Tmdb\Model\AbstractModel;
use Tmdb\Model\Collection\QueryParametersCollection;

/**
 * Class DiscoverTvQuery
 * @package Tmdb\Model\Query\Discover
 */
class DiscoverTvQuery extends QueryParametersCollection
{
    /** Transform args to an AND query */
    public const MODE_AND = 0;

    /** Transform args to an OR query */
    public const MODE_OR = 1;

    /**
     * Minimum value is 1, expected value is an integer.
     *
     * @param integer $page
     * @return $this
     */
    public function page($page = 1): self
    {
        $this->set('page', (int)$page);

        return $this;
    }

    /**
     * ISO 639-1 code.
     *
     * @param string $language
     * @return $this
     */
    public function language($language): self
    {
        $this->set('language', $language);

        return $this;
    }

    /**
     * An ISO 3166-1 code. Combine this filter with with_watch_providers in order to filter your results by a specific watch provider in a specific region.
     *
     * @param string $watchRegion
     * @return $this
     */
    public function watchRegion($watchRegion): self
    {
        $this->set('watch_region', $watchRegion);

        return $this;
    }

    /**
     * Only include movies with the specified watch providers. Combine with watch_region.
     *
     * @param array|string $watchProviders
     * @param int $mode
     * @return $this
     */
    public function withWatchProviders($watchProviders, $mode = self::MODE_OR): self
    {
        $this->set('with_watch_providers', $this->with($watchProviders, $mode));

        return $this;
    }

    /**
     * Only include movies with the specified monetization types. Combine with watch_region.
     *
     * Allowed Values: flatrate, free, ads, rent, buy
     *
     * @param array|string $watchProviders
     * @param int $mode
     * @return $this
     */
    public function withWatchMonetizationTypes($watchProviders, $mode = self::MODE_OR): self
    {
        $this->set('with_watch_monetization_types', $this->with($watchProviders, $mode));

        return $this;
    }

    /**
     * Available options are vote_average.desc, vote_average.asc, first_air_date.desc,
     * first_air_date.asc, popularity.desc, popularity.asc
     *
     * @param string $option
     * @return $this
     */
    public function sortBy($option): self
    {
        $this->set('sort_by', $option);

        return $this;
    }

    /**
     * Filter the results release dates to matches that include this value.
     * Expected value is a year.
     *
     * @param DateTime|integer $year
     * @return $this
     */
    public function firstAirDateYear($year): self
    {
        if ($year instanceof DateTime) {
            $year = $year->format('Y');
        }

        $this->set('first_air_date_year', (int)$year);

        return $this;
    }

    /**
     * Only include TV shows that are equal to, or have a vote count higher than this value.
     * Expected value is an integer.
     *
     * @param integer $count
     * @return $this
     */
    public function voteCountGte($count): self
    {
        $this->set('vote_count.gte', (int)$count);

        return $this;
    }

    /**
     * Only include TV shows that are equal to, or have a higher average rating than this value.
     * Expected value is a float.
     *
     * @param float $average
     * @return $this
     */
    public function voteAverageGte($average): self
    {
        $this->set('vote_average.gte', (float)$average);

        return $this;
    }

    /**
     * Format the with compatible parameters.
     *
     * @param array|string $with
     * @param int $mode
     *
     * @return null|string
     */
    protected function with($with = null, $mode = self::MODE_OR): ?string
    {
        if ($with instanceof GenericCollection) {
            $with = $with->toArray();
        }

        if (is_array($with)) {
            return $this->andWith((array)$with, $mode);
        }

        return $with;
    }

    /**
     * Creates an and query to combine an AND or an OR expression.
     *
     * @param array $with
     * @param int $mode
     */
    protected function andWith(array $with, $mode): string
    {
        return (
        implode(
            $mode === self::MODE_OR ? '|' : ',',
            array_map([$this, 'normalize'], $with)
        )
        );
    }

    /**
     * Creates an OR query for genres
     *
     * @param array $genres
     * @return $this
     */
    public function withGenresOr(array $genres = []): self
    {
        return $this->withGenres(
            implode('|', $genres)
        );
    }

    /**
     * Only include TV shows with the specified genres.
     * Expected value is an integer (the id of a genre).
     *
     * Multiple values can be specified.
     *
     * Comma separated indicates an 'AND' query,
     * while a pipe (|) separated value indicates an 'OR'.
     *
     * @param array|string $genres
     * @return $this
     */
    public function withGenres($genres): self
    {
        if (is_array($genres)) {
            $genres = $this->withGenresAnd($genres);
        }

        $this->set('with_genres', $genres);

        return $this;
    }

    /**
     * Creates an AND query for genres
     *
     * @param array $genres
     * @return $this
     */
    public function withGenresAnd(array $genres = []): self
    {
        return $this->withGenres(
            implode(',', $genres)
        );
    }

    /**
     * The minimum release to include. Expected format is YYYY-MM-DD.
     *
     * @param DateTime|string $date
     * @return $this
     */
    public function firstAirDateGte($date): self
    {
        if ($date instanceof DateTime) {
            $date = $date->format('Y-m-d');
        }

        $this->set('first_air_date.gte', $date);

        return $this;
    }

    /**
     * The maximum release to include. Expected format is YYYY-MM-DD.
     *
     * @param DateTime|string $date
     * @return $this
     */
    public function firstAirDateLte($date): self
    {
        if ($date instanceof DateTime) {
            $date = $date->format('Y-m-d');
        }

        $this->set('first_air_date.lte', $date);

        return $this;
    }

    /**
     * Filter TV shows to include a specific network.
     *
     * Expected value is an integer (the id of a network).
     * They can be comma separated to indicate an 'AND' query.
     *
     * Expected value is an integer (the id of a company).
     * They can be comma separated to indicate an 'AND' query.
     *
     * @param array|string $networks
     * @return $this
     */
    public function withNetworks($networks): self
    {
        if (is_array($networks)) {
            $networks = $this->withNetworksAnd($networks);
        }

        $this->set('with_networks', $networks);

        return $this;
    }

    /**
     * Creates an and query for networks
     *
     * @param array $networks
     * @return $this
     */
    public function withNetworksAnd(array $networks = []): self
    {
        return $this->withNetworks(
            implode(',', $networks)
        );
    }

    /**
     * Extract object id's if an collection was passed on.
     *
     * @param $mixed
     * @return mixed
     */
    protected function normalize($mixed)
    {
        if (is_object($mixed) && $mixed instanceof AbstractModel) {
            return $mixed->getId();
        }

        return $mixed;
    }
}
