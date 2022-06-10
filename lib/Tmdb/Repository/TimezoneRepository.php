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

use Tmdb\Factory\TimezoneFactory;
use Tmdb\Model\Collection\Timezones;

/**
 * Class TimezoneRepository
 * @package Tmdb\Repository
 * @see http://docs.themoviedb.apiary.io/#timezones
 */
class TimezoneRepository extends AbstractRepository
{
    /**
     * Get the list of supported timezones for the API methods that support them.
     */
    public function getTimezones(): \Tmdb\Model\Common\GenericCollection
    {
        $data = $this->getApi()->getTimezones();

        return $this->getFactory()->createCollection($data);
    }

    /**
     * Return the Collection API Class
     */
    public function getApi(): \Tmdb\Api\Timezones
    {
        return $this->getClient()->getTimezonesApi();
    }

    public function getFactory(): \Tmdb\Factory\TimezoneFactory
    {
        return new TimezoneFactory($this->getClient()->getHttpClient());
    }
}
