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

use Tmdb\Api\Networks;
use Tmdb\Factory\NetworkFactory;
use Tmdb\Model\Network;

/**
 * Class NetworkRepository
 * @package Tmdb\Repository
 * @see http://docs.themoviedb.apiary.io/#networks
 */
class NetworkRepository extends AbstractRepository
{
    /**
     * This method is used to retrieve the basic information about a TV network.
     *
     * You can use this ID to search for TV shows with the discover.
     * At this time we don't have much but this will be fleshed out over time.
     *
     * @param $id
     * @param array $parameters
     * @param array $headers
     */
    public function load($id, array $parameters = [], array $headers = []): \Tmdb\Model\Network
    {
        return $this->getFactory()->create(
            $this->getApi()->getNetwork($id, $parameters, $headers)
        );
    }

    public function getFactory(): \Tmdb\Factory\NetworkFactory
    {
        return new NetworkFactory($this->getClient()->getHttpClient());
    }

    /**
     * Return the related API class
     */
    public function getApi(): \Tmdb\Api\Networks
    {
        return $this->getClient()->getNetworksApi();
    }
}
