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

use Tmdb\Api\Reviews;
use Tmdb\Factory\ReviewFactory;
use Tmdb\Model\Review;

/**
 * Class ReviewRepository
 * @package Tmdb\Repository
 * @see http://docs.themoviedb.apiary.io/#reviews
 */
class ReviewRepository extends AbstractRepository
{
    /**
     * Get the full details of a review by ID.
     *
     * @param $id
     * @param array $parameters
     * @param array $headers
     */
    public function load($id, array $parameters = [], array $headers = []): \Tmdb\Model\AbstractModel
    {
        return $this->getFactory()->create(
            $this->getApi()->getReview($id, $parameters, $headers)
        );
    }

    public function getFactory(): \Tmdb\Factory\ReviewFactory
    {
        return new ReviewFactory($this->getClient()->getHttpClient());
    }

    /**
     * Return the related API class
     */
    public function getApi(): \Tmdb\Api\Reviews
    {
        return $this->getClient()->getReviewsApi();
    }
}
