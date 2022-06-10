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

use Tmdb\Factory\FindFactory;
use Tmdb\Model\Find;

/**
 * Class FindRepository
 * @package Tmdb\Repository
 * @see http://docs.themoviedb.apiary.io/#find
 */
class FindRepository extends AbstractRepository
{
    /**
     * Find something
     *
     * @param $id
     * @param array $parameters
     * @param array $headers
     */
    public function findBy($id, array $parameters = [], array $headers = []): \Tmdb\Model\AbstractModel
    {
        return $this->getFactory()->create(
            $this->getApi()->findBy($id, $parameters, $headers)
        );
    }

    public function getFactory(): \Tmdb\Factory\FindFactory
    {
        return new FindFactory($this->getClient()->getHttpClient());
    }

    /**
     * Return the related API class
     */
    public function getApi(): \Tmdb\Api\Find
    {
        return $this->getClient()->getFindApi();
    }
}
