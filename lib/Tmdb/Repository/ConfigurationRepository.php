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

use Tmdb\Factory\ConfigurationFactory;
use Tmdb\Model\Configuration;

/**
 * Class ConfigurationRepository
 * @package Tmdb\Repository
 * @see http://docs.themoviedb.apiary.io/#configuration
 */
class ConfigurationRepository extends AbstractRepository
{
    /**
     * Load up TMDB Configuration
     *
     * @param array $headers
     */
    public function load(array $headers = []): \Tmdb\Model\AbstractModel
    {
        $data = $this->getApi()->getConfiguration($headers);

        return $this->getFactory()->create($data);
    }

    /**
     * Return the Movies API Class
     */
    public function getApi(): \Tmdb\Api\Configuration
    {
        return $this->getClient()->getConfigurationApi();
    }

    public function getFactory(): \Tmdb\Factory\ConfigurationFactory
    {
        return new ConfigurationFactory($this->getClient()->getHttpClient());
    }
}
