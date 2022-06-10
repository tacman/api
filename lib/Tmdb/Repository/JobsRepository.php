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

use Tmdb\Factory\JobsFactory;
use Tmdb\Model\Collection\Jobs;
use Tmdb\Model\Job;

/**
 * Class JobsRepository
 * @package Tmdb\Repository
 * @see http://docs.themoviedb.apiary.io/#jobs
 */
class JobsRepository extends AbstractRepository
{
    /**
     * @param array $parameters
     * @param array $headers
     *
     * @return Job[]|Jobs
     *
     * @psalm-return Jobs|array<array-key, Job>
     */
    public function load(array $parameters = [], array $headers = [])
    {
        return $this->loadCollection($parameters, $headers);
    }

    /**
     * Get the list of jobs.
     *
     * @param array $parameters
     * @param array $headers
     * @return Jobs|Job[]
     */
    public function loadCollection(array $parameters = [], array $headers = [])
    {
        return $this->createCollection(
            $this->getApi()->getJobs($parameters, $headers)
        );
    }

    /**
     * Create an collection of an array
     *
     * @param $data
     * @return Jobs|Job[]
     */
    private function createCollection($data): \Tmdb\Model\Common\GenericCollection
    {
        return $this->getFactory()->createCollection($data);
    }

    public function getFactory(): \Tmdb\Factory\JobsFactory
    {
        return new JobsFactory($this->getClient()->getHttpClient());
    }

    /**
     * Return the related API class
     */
    public function getApi(): \Tmdb\Api\Jobs
    {
        return $this->getClient()->getJobsApi();
    }
}
